<?php
/**
 * Change the URL that will be used by Kirki
 * to load its assets in the customizer.
 *
 * @since 1.0
 */
function kirki_update_url( $config ) {

	 $config['url_path'] = WEFOSTER_CUSTOMIZER_URL . '/lib/vendor/kirki/';
	 return $config;

}
add_filter( 'kirki/config', 'kirki_update_url' );

/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */
function wf_theme_customizer_tweaks( $config ) {
	return wp_parse_args( array(
		'description'  => esc_attr__( 'Build Better Communities', 'kirki' ),
		'width' => '25%'
	), $config );
}
add_filter( 'kirki/config', 'wf_theme_customizer_tweaks' );


/**
 * Enqueue a custom stylesheet for our customizer.
 *
 * @since 1.0
 */
function wf_theme_customizer_stylesheet() {
	wp_register_style( 'wf-theme-customizer-css', WEFOSTER_CUSTOMIZER_URL . '/lib/customiser/assets/css/customizer.css', null, null, 'all' );
	wp_enqueue_style( 'wf-theme-customizer-css' );
}
add_action( 'customize_controls_print_styles', 'wf_theme_customizer_stylesheet' );


/**
 * This function adds some styles to the WordPress Customizer
 */
function my_customizer_styles() { ?>
    <style>
		.kirki-customizer-loading-wrapper {
		  background-image: inherit !important;
			display: none !important;
		}
    </style>
    <?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );

/**
 * Display upgrade notice on customizer page
 *
 * @since 1.0
 */
function wf_plus_upgrade_notice() {
		// Enqueue the script
		wp_enqueue_script(
			'wefoster-customizer-custom',
			WEFOSTER_CUSTOMIZER_URL . '/lib/customiser/assets/js/custom.js',
			array(), '1.0.0',
			true
		);

		// Localize the script
		wp_localize_script(
			'wefoster-customizer-custom',
			'prefixL10n',
			array(
				'prefixURL'	=> esc_url( 'https://wefoster.co/products/wefoster-plus' ),
				'prefixLabel'	=> __( 'Upgrade to WeFoster +', 'wefoster' ),
			)
		);

}
add_action( 'customize_controls_enqueue_scripts', 'wf_plus_upgrade_notice' );
?>
