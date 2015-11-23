<?php
/**
* This is our Stylekit boilerplate where we can set default values that are applied automatically.
*
* @since 1.0
* @package WeFoster Plus
*/
//Add our custom setting for color presets.
$stylekit = get_theme_mod( 'wf_stylekit', 'default' );

Kirki::add_field( 'wefoster_plus', array(
    'type'      => 'radio',
    'settings'  => 'stylekit_color_scheme',
    'label'     => __( 'Color Scheme', 'translation_domain' ),
    'section'   => 'wf_plus_stylekit_section',
    'default'   => 'blue',
    'priority'  => 30,
		'choices'     => array(
			'blue' => __( 'Blue', 'wefoster' ),
			'green' => __( 'Green', 'wefoster' ),
			'black' => __( 'Black', 'wefoster' ),
			'purple' => __( 'Purple', 'wefoster' ),
			'red' => __( 'Red', 'wefoster' ),
		),
    'required'  => array(
        array(
            'setting'  => 'wf_stylekit',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    )
) );
?>
