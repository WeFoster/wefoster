<?php
/*
Customizer Reset class. Based on the excellent work of WPZoom
*/
if ( ! class_exists( 'WeFoster_Customizer_Reset' ) ) {
	final class WeFoster_Customizer_Reset {
		/**
		 * @var WeFoster_Customizer_Reset
		 */
		private static $instance = null;

		/**
		 * @var WP_Customize_Manager
		 */
		private $wp_customize;

		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		private function __construct() {
			add_action( 'customize_controls_print_scripts', array( $this, 'customize_controls_print_scripts' ) );
			add_action( 'wp_ajax_customizer_reset', array( $this, 'ajax_customizer_reset' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
		}

		public function customize_controls_print_scripts() {
			wp_enqueue_script( 'wefoster-customizer-reset', WEFOSTER_THEME_URL . '/lib/customiser/reset/js/customizer-reset.js', array( 'jquery' ), '20150120' );
			wp_localize_script( 'wefoster-customizer-reset', '_WeFosterCustomizerReset', array(
				'reset'   => __( 'Reset', 'wefoster' ),
				'confirm' => __( "Attention! This will reset your theme back to it's default settings. You will lose your current design and settings. \n\nThis action is irreversible!", 'wefoster' ),
				'nonce'   => array(
					'reset' => wp_create_nonce( 'wefoster' ),
				)
			) );
		}

		/**
		 * Store a reference to `WP_Customize_Manager` instance
		 *
		 * @param $wp_customize
		 */
		public function customize_register( $wp_customize ) {
			$this->wp_customize = $wp_customize;
		}

		public function ajax_customizer_reset() {
			if ( ! $this->wp_customize->is_preview() ) {
				wp_send_json_error( 'not_preview' );
			}

			if ( ! check_ajax_referer( 'wefoster', 'nonce', false ) ) {
				wp_send_json_error( 'invalid_nonce' );
			}

			$this->reset_customizer();

			wp_send_json_success();
		}

		public function reset_customizer() {
			$settings = $this->wp_customize->settings();

			// remove theme_mod settings registered in customizer
			foreach ( $settings as $setting ) {
				if ( 'theme_mod' == $setting->type ) {
					remove_theme_mod( $setting->id );
				}
			}
		}
	}
}

WeFoster_Customizer_Reset::get_instance();
