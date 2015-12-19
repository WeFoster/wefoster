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
 * Configuration for Kirki
 *
 * @since 1.0
 */
function wf_theme_customizer_tweaks( $config ) {

	$config['description']  = __( 'WeFoster', 'wefoster' );
	$config['width']        = '23%';

	return $config;

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
