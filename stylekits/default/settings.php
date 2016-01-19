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
function default_stylekit_settings($fields) {
Kirki::add_field( 'wefoster_plus', array(
    'type'      => 'preset',
    'settings'  => 'preset_demo',
    'label'     => __( 'Pre-made Layouts', 'translation_domain' ),
    'description' => __('Get started quickly by choosing a pre-made layout below. These layouts simply serve as a starting point and can be completely customised to your liking via the options under "Appearance inside this customiser."', 'wefoster'),
    'section'   => 'wf_plus_stylekit_section',
    'priority'  => 30,
    'required'  => array(
        array(
            'setting'  => 'wf_stylekit',
            'operator' => '==',
            'value'    => 'default',
        ),
    ),
    'choices'     => array(
      '1' => array(
        'label'    => esc_attr__( 'Fluid Width with Full Header', 'kirki-demo' ),
        'settings' => array(
          'wf_header_background_image_color' => 'greyscale',
          'wf_header_background_image_opacity' => '0.2',
          'wf_header_background_picture' => 'https://cdn.wefoster.co/backgrounds/notebook-luis-llerena.jpeg',
          'wf_header_background_type' => 'picture',
          'wf_layout_class' => 'container-fluid',
          'wf_layout_type' => 'full',
          'wf_plus_bp_navigation_class' => 'navbar-right',
          'wf_plus_header_navigation_class' => 'navbar-left',
          'wf_plus_header_style' => 'navbar-default',
          'wf_plus_header_fixed' => 'navbar-fixed-static',
          'wf_plus_header_headroom' => 'navbar-no-headroom',
          'wf_plus_logo_type' => 'hide',
          'wf_plus_header_show_description' => 'title-description',
        ),
      ),
      '2' => array(
        'label'    => esc_attr__( 'Fluid Width with Minimal Header', 'kirki-demo' ),
        'settings' => array(
          'wf_plus_header_fixed' => 'navbar-fixed-top',
          'wf_plus_header_headroom' => 'navbar-headroom',
          'wf_layout_type' => 'minimal',
          'wf_plus_header_style' => 'navbar-default',
          'wf_plus_logo_type' => 'full-regular',
          'wf_layout_class' => 'container-fluid',
          'wf_plus_bp_navigation_class' => 'navbar-right',
          'wf_plus_header_navigation_class' => 'navbar-left',
          'wf_plus_header_style' => 'navbar-default',
        ),
      ),
      '3' => array(
        'label'    => esc_attr__( 'Fluid Width with Inversed Full Header', 'kirki-demo' ),
        'settings' => array(
          'header_image_background_position' => '44',
          'wf_header_background_height' => '180',
          'wf_header_background_color' => '#545454',
          'wf_header_background_image_color' => 'greyscale',
          'wf_header_background_image_opacity' => '0.2',
          'wf_plus_header_fixed' => 'navbar-fixed-static',
          'wf_plus_header_headroom' => 'navbar-no-headroom',
          'wf_header_background_type' => 'picture',
          'wf_header_background_picture' => 'https://cdn.wefoster.co/backgrounds/misty-mountains-luca-zanon.jpeg',
          'wf_layout_type' => 'full',
          'wf_plus_header_style' => 'navbar-inverse',
          'wf_layout_class' => 'container-fluid',
          'wf_plus_bp_navigation_class' => 'navbar-left',
          'wf_plus_header_navigation_class' => 'navbar-right',
          'wf_plus_header_menu_position' => 'above',
          'wf_plus_header_show_description' => 'hide-title-description',
          'wf_plus_logo_type' => 'minimal-inverse',
          'wf_plus_sidebar_position' => 'wefoster-sidebar-left'
        ),
      ),
      '4' => array(
        'label'    => esc_attr__( 'Fixed Width with Full Header', 'kirki-demo' ),
        'settings' => array(
          'wf_header_background_color' => '#FFF',
          'wf_header_background_image_color' => 'color',
          'wf_header_background_image_opacity' => '1',
          'wf_header_background_type' => 'picture',
          'header_image_background_position' => '26',
          'wf_header_background_picture' => 'https://cdn.wefoster.co/backgrounds/snow-mountains-ales-krivec.jpeg',
          'wf_layout_class' => 'container',
          'wf_layout_type' => 'full',
          'wf_plus_bp_navigation_class' => 'navbar-right',
          'wf_plus_header_navigation_class' => 'navbar-left',
          'wf_plus_header_style' => 'navbar-default',
          'wf_plus_header_fixed' => 'navbar-fixed-static',
          'wf_plus_header_headroom' => 'navbar-no-headroom',
          'wf_plus_logo_type' => 'minimal-regular',
          'wf_plus_header_show_description' => 'hide-title-description',
        ),
      ),
      '5' => array(
        'label'    => esc_attr__( 'Fixed Width with Minimal Header', 'kirki-demo' ),
        'settings' => array(
          'wf_plus_header_fixed' => 'navbar-fixed-top',
          'wf_plus_header_headroom' => 'navbar-headroom',
          'wf_layout_type' => 'minimal',
          'wf_plus_header_style' => 'navbar-default',
          'wf_plus_logo_type' => 'full-regular',
          'wf_layout_class' => 'container',
          'wf_plus_bp_navigation_class' => 'navbar-right',
          'wf_plus_header_navigation_class' => 'navbar-left',
          'wf_plus_header_style' => 'navbar-default',
        ),
      ),
    ),
) );

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
            'value'    => 'default',
        ),
    )
) );


  Kirki::add_field( 'wefoster_plus', array(
      'type'      => 'radio',
      'settings'  => 'stylekit_color_scheme',
      'label'     => __( 'Color Scheme', 'translation_domain' ),
      'section'   => 'wf_plus_stylekit_section',
      'default'   => 'blue',
      'priority'  => 30,
  		'choices'     => array(
  			'blue' => __( 'Blue', 'wefoster' ),
  			'accessible' => __( 'Accessibility Friendly', 'wefoster' ),
  			'black' => __( 'Black', 'wefoster' ),
  			'purple' => __( 'Purple', 'wefoster' ),
  			'red' => __( 'Red', 'wefoster' ),
  		)
  ) );
}
add_filter('kirki/fields', 'default_stylekit_settings');

$color = get_theme_mod( 'stylekit_color_scheme', 'default' );

if ( $color == 'accessible' ) {
  // Set the Default Font size.
  define('WEFOSTER_FONT_SIZE', '18px');
  //
  // //Roboto for Readability
  define('WEFOSTER_FONT_FAMILY', 'Roboto');
  define('WEFOSTER_NAVIGATION_FONT_FAMILY', 'Roboto');
  define('WEFOSTER_HEADINGS_FONT_FAMILY', 'Roboto');
}
?>
