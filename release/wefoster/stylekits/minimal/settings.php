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
    'settings'  => $stylekit . '_color_scheme',
    'label'     => __( 'Color Scheme', 'translation_domain' ),
    'section'   => 'wf_plus_stylekit_section',
    'default'   => 'blue',
    'priority'  => 30,
		'choices'     => array(
			'blue' => __( 'Blue', 'kirki' ),
			'green' => __( 'Green', 'kirki' ),
		),
    'required'  => array(
        array(
            'setting'  => 'wefoster_plus_wf_stylekit',
            'operator' => '==',
            'value'    => 'blue',
        ),
    )
) );
?>
