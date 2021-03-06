<?php
/**
 * This is our Stylekit boilerplate where we can set default values that are applied automatically.
 *
 * @since 1.0
 * @package WeFoster Plus
 */
//Add our custom setting for color presets.
$stylekit = get_theme_mod( 'wf_stylekit', 'default' );


/**
 * This is our Stylekit boilerplate where we can set default values that are applied automatically.
 *
 * @since 1.0
 * @package WeFoster Plus
 */
function default_stylekit_settings( $fields ) {
	Kirki::add_field( 'wefoster_plus', array(
		'type'     => 'radio',
		'settings' => 'stylekit_color_scheme',
		'label'    => __( 'Color Scheme', 'wefoster' ),
		'section'  => 'wf_plus_stylekit_section',
		'default'  => 'blue',
		'priority' => 30,
		'choices'  => array(
			'default'    => __( 'Green (Default)', 'wefoster' ),
			'blue'       => __( 'Blue', 'wefoster' ),
			'accessible' => __( 'Accessibility Friendly', 'wefoster' ),
			'black'      => __( 'Black', 'wefoster' ),
			'purple'     => __( 'Purple', 'wefoster' ),
			'red'        => __( 'Red', 'wefoster' ),
		),
		'required' => array(
			array(
				'setting'  => 'wf_stylekit',
				'operator' => '==',
				'value'    => 'default',
			),
		)
	) );


	Kirki::add_field( 'wefoster_plus', array(
		'type'     => 'radio',
		'settings' => 'stylekit_layout_preset',
		'label'    => __( 'Layout Preset', 'wefoster' ),
		'section'  => 'wf_plus_stylekit_section',
		'default'  => 'boxed-full',
		'priority' => 20,
		'choices'  => array(
			'boxed-full'    => __( 'Boxed Layout with Full Header', 'wefoster' ),
			'fluid-full'       => __( 'Fluid Layout with Full Header', 'wefoster' ),
			'boxed-inversed-full' => __( 'Boxed Layout with Inversed (Dark) Header', 'wefoster' ),
			'fluid-minimal'      => __( 'Fluid Layout with Minimal Header', 'wefoster' ),
			'boxed-minimal-inversed'     => __( 'Boxed Layout with Inversed Header', 'wefoster' )
		)
	) );
}

add_filter( 'kirki/fields', 'default_stylekit_settings' );

$color = get_theme_mod( 'stylekit_color_scheme', 'default' );
if ( $color == 'accessible' ) {
	// Set the Default Font size.
	define( 'WEFOSTER_FONT_SIZE', '18px' );
	//
	// //Roboto for Readability
	define( 'WEFOSTER_FONT_FAMILY', 'Roboto' );
	define( 'WEFOSTER_NAVIGATION_FONT_FAMILY', 'Roboto' );
	define( 'WEFOSTER_HEADINGS_FONT_FAMILY', 'Roboto' );
}