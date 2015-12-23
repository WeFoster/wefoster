<?php

/**
 * Add controls using the 'kirki/fields' filter.
 *
 * @since 1.0.0
 */
function wf_plus_register_settings($fields)
{
		//
		// Stylekit
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio',
		    'settings' => 'wf_stylekit',
		    'label' => __('Apply Stylekit', 'wefoster'),
		    'description' => __('Choose a stylekit below...', 'wefoster'),
		    'section' => 'wf_plus_stylekit_section',
		    'default' => 'default',
		    'priority' => 10,
		    'choices' => wefoster_stylekits()
		));

		Kirki::add_field('', array(
		    'type' => 'custom',
		    'settings' => 'wf_stylekit_message',
		    'label' => __('Instructions', 'wefoster'),
		    'description' => __('', 'wefoster'),
		    'section' => 'wf_plus_stylekit_section',
		    'default' => '<div style="padding: 15px;background-color: #EFEFEF; border-radius: 2px;">
		  	<ol>
					<li>Select a Stylekit</li>
					<li>Press <strong>"Save & Publish"</strong></li>
					<li>Browse to a new page inside the customizer. (for example by clicking on a menu item)</li>
					<li>Have fun!</li>
					<li>You can import, export and share Stylekits with <a target="_blank" href="https://wefoster.co/products/wefoster-plus">WeFoster Plus</a></li>
				</ol>
		  </div>',
		    'priority' => 1000
		));

		//
		// Layout
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio',
		    'settings' => 'wf_layout_class',
		    'label' => __('Layout Width', 'wefoster'),
		    'description' => __('Choose a layout width', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'default' => WEFOSTER_LAYOUT_CLASS,
		    'priority' => 1,
		    'choices' => array(
		        'container' => __('Boxed', 'wefoster'),
		        'container-fluid' => __('Fluid', 'wefoster')
		    )
		));

		//
		// BACKGROUND TYPE
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio',
		    'settings' => 'wf_body_background_type',
		    'label' => __('Body Background Image', 'kirki'),
		    'section' => 'wf_plus_body_section',
		    'default' => 'picture',
		    'description' => __('A beautiful background image or pattern does wonders for the look of your site. You can select one of our carefully picked photos or textures, or upload your own.', 'wefoster'),
		    'priority' => 10,
		    'choices' => array(
		        'upload' => __('Upload your own image', 'kirki'),
		        'picture' => __('Choose a background image', 'kirki'),
		        'none' => __('No Background Image', 'kirki')
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'image',
		    'settings' => 'wf_body_background_image',
		    'label' => __('Upload a background image', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'priority' => 10,
		    'required' => array(
		        array(
		            'setting' => 'wf_body_background_type',
		            'operator' => '==',
		            'value' => 'upload'
		        )
		    )
		));

		//
		// PICTURES
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'select',
		    'settings' => 'wf_body_background_picture',
		    'label' => __('Choose a background picture', 'kirki'),
		    'section' => 'wf_plus_body_section',
		    'description' => __('All pictures are handpicked from Unsplash.com and come with a unlimited license. This means they can be used for personal or commercial use.', 'wefoster'),
		    'default' => WEFOSTER_BODY_BACKGROUND,
		    'priority' => 10,
		    'transport' => 'postMessage',
		    'choices' => wefoster_plus_background_pictures(),
		    'required' => array(
		        array(
		            'setting' => 'wf_body_background_type',
		            'operator' => '=',
		            'value' => 'picture'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio',
		    'settings' => 'wf_body_background_image_color',
		    'label' => __('Image Effect', 'wefoster'),
		    'description' => __('Apply an image effect to your header. Note: Some of these effects will not work on Internet Explorer. In these cases the image will be shown without the effect.', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'default' => 'color',
		    'transport' => 'postMessage',
		    'priority' => 10,
		    'choices' => wefoster_plus_image_effects(),
		    'required' => array(
		        array(
		            'setting' => 'wf_body_background_type',
		            'operator' => '!=',
		            'value' => 'none'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'slider',
		    'settings' => 'wf_body_background_image_blur',
		    'label' => __('Image Blur', 'wefoster'),
		    'description' => __('Blur your image.', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    // 'transport'    => 'postMessage',
		    'default' => '0',
		    'priority' => 10,
		    'choices' => array(
		        'min' => 0,
		        'max' => 10,
		        'step' => 1
		    ),
		    'required' => array(
		        array(
		            'setting' => 'wf_body_background_type',
		            'operator' => '!=',
		            'value' => 'none'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'slider',
		    'settings' => 'wf_body_background_image_opacity',
		    'label' => __('Image Opacity', 'wefoster'),
		    'description' => __('Change the opacity of your image.', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'transport' => 'postMessage',
		    'default' => '1',
		    'priority' => 10,
		    'choices' => array(
		        'min' => 0,
		        'max' => 1,
		        'step' => 0.1
		    ),
		    'required' => array(
		        array(
		            'setting' => 'wf_body_background_type',
		            'operator' => '!=',
		            'value' => 'none'
		        )
		    )
		));

		//
		// TEXTURES
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'color',
		    'setting' => 'wf_body_background_color',
		    'label' => __('Background Color', 'wefoster'),
		    'description' => __('Set a background color.', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'default' => '#f0f0f0',
		    'priority' => 10,
		    'output' => array(
		        array(
		            'element' => '.wefoster-framework',
		            'property' => 'background-color'
		        )
		    ),
		    'transport' => 'postMessage',
		    'js_vars' => array(
		        array(
		            'element' => '.wefoster-framework',
		            'function' => 'css',
		            'property' => 'background-color'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'select',
		    'settings' => 'wf_body_background_texture',
		    'label' => __('Background Pattern', 'kirki'),
		    'description' => __('Choose from a collection of patterns taken from Subtlepaterns.com. You can achieve some great looking results by setting a background color or picture and overlaying it with a pattern!', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'default' => 'none',
		    'priority' => 10,
		    // 'transport'    => 'postMessage',
		    'choices' => wefoster_plus_background_textures()
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'slider',
		    'settings' => 'wf_body_background_texture_opacity',
		    'label' => __('Pattern Opacity', 'wefoster'),
		    'description' => __('Change the opacity of your pattern..', 'wefoster'),
		    'section' => 'wf_plus_body_section',
		    'default' => '1',
		    'required' => array(
		        array(
		            'setting' => 'wf_body_background_texture',
		            'operator' => '!=',
		            'value' => 'none'
		        )
		    ),
		    // 'transport'    => 'postMessage',
		    'priority' => 10,
		    'choices' => array(
		        'min' => 0,
		        'max' => 1,
		        'step' => 0.1
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio',
		    'settings' => 'wf_plus_hide_admin_bar',
		    'label' => __('Hide Admin Bar', 'wefoster'),
		    'description' => __('Do you want to hide the WordPress Admin bar for all users except site administrators?', 'wefoster'),
		    'section' => 'wf_plus_admin_bar_section',
		    'default' => 'hide',
		    'priority' => 10,
		    'choices' => array(
		        'hide' => __('Hide Adminbar for all members', 'wefoster'),
		        'show' => __('Show Adminbar to all members', 'wefoster')
		    )
		));

		//
		// Content
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio-image',
		    'settings' => 'wf_plus_content_width',
		    'label' => __('Content Width', 'wefoster'),
		    'description' => __('The size of your content area in relation to your sidebar.', 'wefoster'),
		    'section' => 'wf_plus_content_section',
		    'default' => WEFOSTER_MAIN_CLASS,
		    'priority' => 10,
		    'choices' => array(
		        'col-sm-6' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/col-sm-6.png',
		        'col-sm-7' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/col-sm-7.png',
		        'col-sm-8' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/col-sm-8.png',
		        'col-sm-9' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/col-sm-9.png',
		        'col-sm-10' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/col-sm-10.png',
		        'default' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/default.png'
		    )
		));

		//
		// Sidebar
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio-image',
		    'settings' => 'wf_plus_sidebar_position',
		    'label' => __('Sidebar Position', 'wefoster'),
		    'description' => __('Where do you want to show the sidebar?', 'wefoster'),
		    'section' => 'wf_plus_sidebar_section',
		    'default' => WEFOSTER_SIDEBAR_POSITION,
		    'priority' => 10,
		    'choices' => array(
		        'wefoster-sidebar-left' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/sidebar-left.png',
		        'wefoster-sidebar-right' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/sidebar-right.png',
		        'default' => WEFOSTER_THEME_URL . '/lib/customiser/assets/img/default.png'
		    )
		));

		//
		// LOGO OPTIONS
		//
		Kirki::add_field('wefoster_plus', array(
		    'section' => 'wf_plus_logo_section',
		    'type' => 'radio',
		    'settings' => 'wf_plus_logo_type',
		    'label' => __('Logo Type', 'wefoster'),
		    'description' => __('What type of logo do you like to display?', 'wefoster'),
		    'default' => WEFOSTER_DEFAULT_LOGO,
		    'priority' => 10,
		    'choices' => array(
		        'custom-logo' => __('Upload a Logo', 'wefoster'),
		        'minimal-inverse' => __('Minimal Logo Inversed', 'wefoster'),
		        'minimal-regular' => __('Minimal Logo Regular', 'wefoster'),
		        'full-inverse' => __('Full Logo Inversed', 'wefoster'),
		        'full-regular' => __('Full Logo Regular', 'wefoster'),
		        'text' => __('Text', 'wefoster'),
		        'hide' => __('Hide Logo', 'wefoster'),
		        'default' => __('Default', 'wefoster')
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'image',
		    'settings' => 'wf_plus_custom_logo',
		    'label' => __('Your Custom Logo', 'wefoster'),
		    'description' => __('Upload a custom logo for your site.', 'wefoster'),
		    'section' => 'wf_plus_logo_section',
		    'priority' => 10,
		    'required' => array(
		        array(
		            'setting' => 'wf_plus_logo_type',
		            'operator' => '=',
		            'value' => 'custom-logo'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'slider',
		    'settings' => 'wf_plus_custom_logo_height',
		    'label' => __('Logo Height', 'wefoster'),
		    'description' => __('Set the height of your logo', 'wefoster'),
		    'section' => 'wf_plus_logo_section',
		    'priority' => 10,
		    'default' => 50,
		    'choices' => array(
		        'min' => 30,
		        'max' => 300,
		        'step' => 1
		    ),
		    'transport' => 'postMessage',
		    'js_vars' => array(
		        array(
		            'element' => '.wefoster-framework .navbar .navbar-brand img',
		            'property' => 'height',
		            'function' => 'css',
		            'units' => 'px'
		        )
		    ),
		    'required' => array(
		        array(
		            'setting' => 'wf_plus_logo_type',
		            'operator' => '=',
		            'value' => 'custom-logo'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'type' => 'slider',
		    'settings' => 'wf_plus_custom_logo_position',
		    'label' => __('Logo Position', 'wefoster'),
		    'description' => __('Set the position of your logo', 'wefoster'),
		    'section' => 'wf_plus_logo_section',
		    'priority' => 10,
		    'default' => 20,
		    'choices' => array(
		        'min' => -100,
		        'max' => 100,
		        'step' => 1
		    ),
		    'required' => array(
		        array(
		            'setting' => 'wf_plus_logo_type',
		            'operator' => '=',
		            'value' => 'custom-logo'
		        )
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'section' => 'wf_plus_logo_section',
		    'type' => 'radio',
		    'settings' => 'wf_plus_mobile_logo_type',
		    'label' => __('Mobile Logo', 'wefoster'),
		    'description' => __('What type of logo do you like to display on mobile devices?', 'wefoster'),
		    'default' => WEFOSTER_DEFAULT_MOBILE_LOGO,
		    'priority' => 10,
		    'choices' => array(
		        'custom-logo' => __('Upload a Logo', 'wefoster'),
		        'minimal-inverse' => __('Minimal Logo Inversed', 'wefoster'),
		        'minimal-regular' => __('Minimal Logo Regular', 'wefoster'),
		        'full-inverse' => __('Full Logo Inversed', 'wefoster'),
		        'full-regular' => __('Full Logo Regular', 'wefoster'),
		        'text' => __('Text', 'wefoster'),
		        'default' => __('Default', 'wefoster')
		    )
		));

		//
		// Header Options
		//
		Kirki::add_field('wefoster_plus', array(
		    'type' => 'radio',
		    'settings' => 'wf_layout_type',
		    'label' => __('Header Design', 'wefoster'),
		    'description' => __('Choose a Header Design', 'wefoster'),
		    'description' => __('You can make your header as fancy as you wish. Choose between a minimal design or choose the Full Header to add some extra branding and flair to your site!', 'wefoster'),
		    'section' => 'wf_plus_header_section',
		    'default' => WEFOSTER_LAYOUT_PRESET,
		    'priority' => 1,
		    'choices' => array(
		        'minimal' => __('Minimal Header', 'wefoster'),
		        'full' => __('Full Header', 'wefoster'),
		        'default' => __('Default', 'wefoster')
		    )
		));

		Kirki::add_field('wefoster_plus', array(
		    'section' => 'wf_plus_header_section',
		    'type' => 'radio',
		    'settings' => 'wf_plus_header_menu_position',
		    'label' => __('Navigation Menu Position', 'wefoster'),
		    'description' => __('Where do you want to show your primary navigation menu?', 'wefoster'),
		    'default' => WEFOSTER_LAYOUT_FULL_PRIMARY_MENU_POSITION,
		    'priority' => 2,
		    'choices' => array(
		        'above' => __('Above Header', 'wefoster'),
		        'below' => __('Below Header', 'wefoster'),
		        'default' => __('Default', 'wefoster')
		    ),
		    'required' => array(
		        array(
		            'setting' => 'wf_layout_type',
		            'operator' => '=',
		            'value' => 'full'
		        )
		    )
		));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_header_section',
      'type' => 'radio',
      'settings' => 'wf_plus_header_navigation_class',
      'label' => __('Navigation Menu Position', 'wefoster'),
      'description' => __('Where do you want to show your menu?', 'wefoster'),
      'default' => WEFOSTER_NAVBAR_POSITION_CLASS,
      'priority' => 2,
      'choices' => array(
          'navbar-left' => __('Left', 'wefoster'),
          'navbar-right' => __('Right', 'wefoster'),
          'navbar-center' => __('Center', 'wefoster')
      )
  ));

  if (class_exists('BuddyPress')) {

      Kirki::add_field('wefoster_plus', array(
          'section' => 'wf_plus_header_section',
          'type' => 'radio',
          'settings' => 'wf_plus_bp_navigation_class',
          'label' => __('BuddyPress Navigation Menu Position', 'wefoster'),
          'description' => __('Where do you want to show your BuddyPress Menu?', 'wefoster'),
          'default' => WEFOSTER_BP_NAVBAR_POSITION_CLASS,
          'priority' => 2,
          'choices' => array(
              'navbar-left' => __('Left', 'wefoster'),
              'navbar-right' => __('Right', 'wefoster'),
              'navbar-center' => __('Center', 'wefoster'),
              'hidden' => __('Hidden', 'wefoster')
          )
      ));

  }

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_header_section',
      'type' => 'radio',
      'settings' => 'wf_plus_header_style',
      'label' => __('Color Style', 'wefoster'),
      'default' => WEFOSTER_HEADER_STYLE,
      'priority' => 10,
      'transport' => 'postMessage',
      'choices' => array(
          'navbar-inverse' => __('Inversed Color', 'wefoster'),
          'navbar-default' => __('Regular Color', 'wefoster')
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_header_section',
      'type' => 'radio',
      'settings' => 'wf_plus_header_fixed',
      'label' => __('Sticky Header', 'wefoster'),
      'description' => __('Stick your header to the top of the page?', 'wefoster'),
      'default' => WEFOSTER_HEADER_STICKY,
      'priority' => 10,
      'choices' => array(
          'navbar-fixed-top' => __('Yes', 'wefoster'),
          'navbar-fixed-static' => __('No', 'wefoster')
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'minimal'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_header_section',
      'type' => 'radio',
      'settings' => 'wf_plus_header_headroom',
      'label' => __('Hide Header on Scroll', 'wefoster'),
      'description' => __('Hide the header when you scroll down?', 'wefoster'),
      'default' => WEFOSTER_HEADER_HIDE,
      'priority' => 10,
      'choices' => array(
          'navbar-headroom' => __('Yes', 'wefoster'),
          'navbar-no-headroom' => __('No', 'wefoster'),
          'default' => __('Default', 'wefoster')
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'minimal'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'wf_header_background_height',
      'label' => __('The height of your header', 'wefoster'),
      'description' => __('Change the height of your header.', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'default' => '200',
      'priority' => 10,
      'choices' => array(
          'min' => 50,
          'max' => 600,
          'step' => 10
      ),
      'output' => array(
          array(
              'element' => '.wefoster-framework .full-header-wrap',
              'property' => 'height',
              'units' => 'px'
          )
      ),
      'transport' => 'postMessage',
      'js_vars' => array(
          array(
              'element' => '.wefoster-framework .full-header-wrap',
              'function' => 'css',
              'property' => 'height',
              'units' => 'px'
          )
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_header_section',
      'type' => 'radio',
      'settings' => 'wf_plus_header_show_description',
      'label' => __('Show Site Description?', 'wefoster'),
      'description' => __('Do you want to show the site description and title?', 'wefoster'),
      'default' => WEFOSTER_SHOW_SITE_TITLE_DESCRIPTION,
      'priority' => 10,
      'choices' => array(
          'title-description' => __('Show', 'wefoster'),
          'hide-title-description' => __('Hide', 'wefoster'),
          'default' => __('Default', 'wefoster')
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'type' => 'color',
      'settings' => 'wf_header_font_color',
      'label' => __('Header Text Color', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'priority' => 10,
      'output' => array(
          array(
              'element' => '.site-description, .site-description h1',
              'property' => 'color'
          )
      ),
      'transport' => 'postMessage',
      'js_vars' => array(
          array(
              'element' => '.site-description, .site-description h1',
              'property' => 'color',
              'function' => 'css'
          )
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          ),
          array(
              'setting' => 'wf_plus_header_show_description',
              'operator' => '=',
              'value' => 'title-description'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_header_section',
      'type' => 'slider',
      'settings' => 'wf_plus_header_description_font_size',
      'label' => __('Title Font Size', 'wefoster'),
      'description' => __('The font size of the description', 'wefoster'),
      'priority' => 10,
      'transport' => 'postMessage',
      'choices' => array(
          'min' => 16,
          'max' => 50,
          'step' => 1
      ),
      'default' => 32,
      'js_vars' => array(
          array(
              'element' => '.site-description, .site-description',
              'property' => 'font-size',
              'function' => 'css',
              'units' => 'px'
          )
      ),
      'output' => array(
          array(
              'element' => '.site-description, .site-description',
              'property' => 'font-size',
              'units' => 'px'
          )
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          ),
          array(
              'setting' => 'wf_plus_header_show_description',
              'operator' => '=',
              'value' => 'title-description'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'type' => 'radio',
      'settings' => 'wf_header_background_type',
      'label' => __('Header Background Image', 'kirki'),
      'description' => __('A beautiful background image or pattern does wonders for the look of your site. You can select one of our carefully picked photos or textures, or upload your own.', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'default' => 'picture',
      'priority' => 10,
      'choices' => array(
          'upload' => __('Upload a background', 'kirki'),
          'picture' => __('Choose a Background Photo', 'kirki'),
          'texture' => __('Choose a Background Pattern/Texture', 'kirki')
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'select',
      'settings' => 'wf_header_background_picture',
      'label' => __('Choose a background picture', 'kirki'),
      'description' => __('All pictures are handpicked from Unsplash.com and come with a unlimited license. This means they can be used for personal or commercial use.', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'default' => WEFOSTER_HEADER_BACKGROUND,
      'priority' => 10,
      'transport' => 'postMessage',
      'choices' => wefoster_plus_background_pictures(),
      'required' => array(
          array(
              'setting' => 'wf_header_background_type',
              'operator' => '=',
              'value' => 'picture'
          ),
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'header_image_background_position',
      'label' => __('Background Position', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'description' => 'Change the focus on your image..',
      'default' => '0',
      'priority' => 10,
      'choices' => array(
          'min' => 0,
          'max' => 100,
          'step' => 1
      ),
      'transport' => 'postMessage',
      'js_vars' => array(
          array(
              'element' => '.wefoster-plus-header-overlay',
              'function' => 'css',
              'property' => 'background-position-y',
              'units' => '%'
          )
      ),
      'required' => array(
          array(
              'setting' => 'wf_header_background_type',
              'operator' => '=',
              'value' => 'picture'
          ),
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'select',
      'settings' => 'wf_header_background_texture',
      'label' => __('Choose a background texture', 'kirki'),
      'description' => __('Choose a background texture or pattern to use for your header', 'kirki'),
      'section' => 'wf_plus_header_section',
      'default' => 'default',
      'priority' => 10,
      'choices' => wefoster_plus_background_textures(),
      'required' => array(
          array(
              'setting' => 'wf_header_background_type',
              'operator' => '=',
              'value' => 'texture'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'image',
      'settings' => 'wf_header_background_image',
      'label' => __('Upload a background image', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'priority' => 10,
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          ),
          array(
              'setting' => 'wf_header_background_type',
              'operator' => '!=',
              'value' => 'picture'
          ),
          array(
              'setting' => 'wf_header_background_type',
              'operator' => '!=',
              'value' => 'texture'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'radio',
      'settings' => 'wf_header_background_image_color',
      'label' => __('Image Effect', 'wefoster'),
      'description' => __('Apply an image effect to your background. Note: Some of these effects will not work on Internet Explorer. In these cases the image will be shown without the effect.', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'default' => 'color',
      'transport' => 'postMessage',
      'priority' => 10,
      'choices' => wefoster_plus_image_effects(),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'color',
      'setting' => 'wf_header_background_color',
      'label' => __('Background Color', 'wefoster'),
      'description' => __('Set a background color.', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'default' => '#454A54',
      'priority' => 10,
      'output' => array(
          array(
              'element' => '.full-header-wrap',
              'property' => 'background-color'
          )
      ),
      'transport' => 'postMessage',
      'js_vars' => array(
          array(
              'element' => '.full-header-wrap',
              'function' => 'css',
              'property' => 'background-color'
          )
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));
  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'wf_header_background_image_opacity',
      'label' => __('Image Opacity', 'wefoster'),
      'description' => __('Change the opacity of your image.', 'wefoster'),
      'section' => 'wf_plus_header_section',
      'default' => '1',
      'transport' => 'postMessage',
      'priority' => 10,
      'choices' => array(
          'min' => 0,
          'max' => 1,
          'step' => 0.1
      ),
      'required' => array(
          array(
              'setting' => 'wf_layout_type',
              'operator' => '=',
              'value' => 'full'
          )
      )
  ));

  //
  // Footer
  //
  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_footer_section',
      'type' => 'radio',
      'settings' => 'wf_plus_footer_widgets',
      'label' => __('Footer Widgets', 'wefoster'),
      'description' => __('How many widgets do you want for your footer?', 'wefoster'),
      'default' => 'default',
      'priority' => 10,
      'choices' => array(
          'one-widget' => __('One Widget', 'wefoster'),
          'two-widgets' => __('Two Widgets', 'wefoster'),
          'three-widgets' => __('Three Widgets', 'wefoster'),
          'four-widgets' => __('Four Widgets', 'wefoster'),
          'default' => __('Default', 'wefoster')
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_footer_section',
      'type' => 'radio',
      'settings' => 'wf_plus_footer_style',
      'label' => __('Footer Style', 'wefoster'),
      'description' => __('Choose the colors for your footer', 'wefoster'),
      'default' => WEFOSTER_FOOTER_CLASS,
      'priority' => 10,
      'transport' => 'postMessage',
      'choices' => array(
          'footer-inverse' => __('Inversed', 'wefoster'),
          'footer-regular' => __('Regular', 'wefoster'),
          'default' => __('Default', 'wefoster')
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'section' => 'wf_plus_footer_section',
      'type' => 'text',
      'settings' => 'wf_plus_footer_text',
      'label' => __('Footer Text', 'wefoster'),
      'description' => __('Change the text displayed in your footer. You can use hyperlinks as well.', 'wefoster'),
      'priority' => 10,
      'sanitize_callback' => 'do_not_filter_anything'
  ));

  //
  // Typography
  //
  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'base_typography_font_size',
      'label' => __('Global Font Style', 'wefoster'),
      'section' => 'wf_plus_typography_body_section',
      'description' => 'Choose a font size..',
      'default' => '16',
      'priority' => 10,
      'choices' => array(
          'min' => 13,
          'max' => 22,
          'step' => 1
      ),
      'output' => array(
          array(
              'element' => 'body.wefoster-framework',
              'property' => 'font-size',
              'units' => 'px'
          )
      ),
      'transport' => 'postMessage',
      'js_vars' => array(
          array(
              'element' => 'body.wefoster-framework',
              'function' => 'css',
              'property' => 'font-size',
              'units' => 'px'
          )
      )
  ));

  Kirki::add_field('kirki_demo', array(
      'type' => 'typography',
      'settings' => 'base_typography_font_family',
      'label' => __('Typography Control', 'kirki'),
      'description' => 'Customize the font style...',
      'section' => 'wf_plus_typography_body_section',
      'default' => array(
          'font-style' => array(
              'bold',
              'italic'
          ),
          'font-family' => WEFOSTER_FONT_FAMILY,
          'font-size' => WEFOSTER_FONT_SIZE,
          'font-weight' => 'inherit',
          'letter-spacing' => 'inherit'
      ),
      'priority' => 10,
      'choices' => array(
          'font-style' => false,
          'font-family' => true,
          'font-size' => false,
          'font-weight' => true,
          'line-height' => false,
          'letter-spacing' => false
      ),
      'output' => array(
          array(
              'element' => 'body.wefoster-framework'
          )
      )
  ));

  //
  // BuddyPress General
  //
  if (class_exists('BuddyPress')) {

      Kirki::add_field('wefoster_plus', array(
          'type' => 'radio',
          'settings' => 'wf_plus_bp_cover_photo_default_sizes',
          'label' => __('Cover Photos', 'wefoster'),
          'description' => __('Do you want to set custom image sizes for your BuddyPress Cover Photos?', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'default' => 'default',
          'priority' => 10,
          'choices' => array(
              'default' => __('No, use default sizes', 'wefoster'),
              'custom' => __('Yes, set custom image sizes', 'wefoster')
          )
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'slider',
          'settings' => 'wf_plus_bp_cover_photo_width',
          'default' => WEFOSTER_DEFAULT_BP_COVER_WIDTH,
          'label' => __('Cover Image Width', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'priority' => 10,
          'choices' => array(
              'min' => 50,
              'max' => 2000,
              'step' => 10
          ),
          'required' => array(
              array(
                  'setting' => 'wf_plus_bp_cover_photo_default_sizes',
                  'operator' => '==',
                  'value' => 'custom'
              )
          )
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'slider',
          'settings' => 'wf_plus_bp_cover_photo_height',
          'label' => __('Cover Image Height', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'default' => WEFOSTER_DEFAULT_BP_COVER_HEIGHT,
          'priority' => 10,
          'choices' => array(
              'min' => 50,
              'max' => 2000,
              'step' => 10
          ),
          'required' => array(
              array(
                  'setting' => 'wf_plus_bp_cover_photo_default_sizes',
                  'operator' => '==',
                  'value' => 'custom'
              )
          )
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'radio',
          'settings' => 'wf_plus_bp_cover_photo_effect',
          'label' => __('Image Effects', 'wefoster'),
          'description' => __('Apply an image effect to your featured images. Note: Some of these effects will not work on Internet Explorer. In these cases the image will be shown without the effect.', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'default' => 'default',
          'transport' => 'postMessage',
          'priority' => 10,
          'choices' => wefoster_plus_image_effects()
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'image',
          'settings' => 'wf_plus_default_member_avatar',
          'label' => __('Default Member Photo', 'wefoster'),
          'description' => __('The default picture that is shown for new members who have not set a profile picture yet.', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'priority' => 10
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'image',
          'settings' => 'wf_plus_default_group_avatar',
          'label' => __('Default Group Avatar', 'wefoster'),
          'description' => __('The default picture that is shown for new group who have not set a group photo yet.', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'priority' => 10
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'radio',
          'settings' => 'wf_plus_bp_menu_user_name',
          'label' => __('Show User Name in Menu', 'wefoster'),
          'description' => __('Do you want show the full name of the user in the Profile Navigation Menu?', 'wefoster'),
          'section' => 'wf_plus_bp_general_section',
          'default' => 'no',
          'priority' => 10,
          'choices' => array(
              'no' => __('No, only show the avatar', 'wefoster'),
              'yes' => __('Yes, show name and avatar', 'wefoster')
          )
      ));

      //
      // Members
      //
      Kirki::add_field('wefoster_plus', array(
          'type' => 'text',
          'settings' => 'wf_plus_members_title',
          'label' => __('Page Title', 'wefoster'),
          'description' => __('Change the title of the Members page', 'wefoster'),
          'section' => 'wf_plus_members_section',
          'transport' => 'refresh',
          'default' => '',
          'priority' => 1
      ));

      Kirki::add_field('wefoster_plus', array(
          'section' => 'wf_plus_members_section',
          'type' => 'editor',
          'settings' => 'wf_plus_buddypress_member_intro',
          'label' => __('Intro Text', 'wefoster'),
          'description' => __('Change the text displayed in your footer. You can use hyperlinks as well.', 'wefoster'),
          'priority' => 10,
          'sanitize_callback' => 'do_not_filter_anything',
          'default' => __('This is your Member Introduction text.', 'wefoster')
      ));

      Kirki::add_field('wefoster_plus', array(
          'section' => 'wf_plus_groups_section',
          'type' => 'editor',
          'settings' => 'wf_plus_buddypress_groups_intro',
          'label' => __('Intro Text', 'wefoster'),
          'description' => __('Change the text displayed on your Groups Directory page. You can use hyperlinks as well.', 'wefoster'),
          'priority' => 10,
          'sanitize_callback' => 'do_not_filter_anything',
          'default' => __('This is your Group Introduction text.', 'wefoster')
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'select',
          'settings' => 'wf_plus_member_loop_amount',
          'label' => __('Directory Display', 'wefoster'),
          'description' => __('Choose how you want your directory to look', 'wefoster'),
          'section' => 'wf_plus_members_section',
          'default' => '20',
          'priority' => 10,
          'choices' => array(
              '10' => __('10 Members', 'wefoster'),
              '20' => __('20 Members', 'wefoster'),
              '30' => __('30 Members', 'wefoster'),
              '40' => __('40 Members', 'wefoster'),
              '50' => __('50 Members', 'wefoster'),
              '60' => __('60 Members', 'wefoster'),
              '70' => __('70 Members', 'wefoster'),
              '80' => __('80 Members', 'wefoster'),
              '90' => __('90 Members', 'wefoster'),
              '100' => __('100 Members', 'wefoster')
          )
      ));

      //
      // Groups
      //
      Kirki::add_field('wefoster_plus', array(
          'type' => 'text',
          'settings' => 'wf_plus_groups_title',
          'label' => __('Page Title', 'wefoster'),
          'description' => __('Change the title of the Groups page', 'wefoster'),
          'section' => 'wf_plus_groups_section',
          'default' => '',
          'priority' => 1
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'select',
          'settings' => 'wf_plus_group_loop_amount',
          'label' => __('Groups Per Page', 'wefoster'),
          'description' => __('How many Groups do you want to display per page?', 'wefoster'),
          'section' => 'wf_plus_groups_section',
          'default' => '20',
          'priority' => 10,
          'choices' => array(
              '10' => __('10 Groups', 'wefoster'),
              '20' => __('20 Groups', 'wefoster'),
              '30' => __('30 Groups', 'wefoster'),
              '40' => __('40 Groups', 'wefoster'),
              '50' => __('50 Groups', 'wefoster'),
              '60' => __('60 Groups', 'wefoster'),
              '70' => __('70 Groups', 'wefoster'),
              '80' => __('80 Groups', 'wefoster'),
              '90' => __('90 Groups', 'wefoster'),
              '100' => __('100 Groups', 'wefoster')
          )
      ));

      //
      // Activity
      //
      Kirki::add_field('wefoster_plus', array(
          'type' => 'select',
          'settings' => 'wf_plus_activity_loop_amount',
          'label' => __('Entries Per Page', 'wefoster'),
          'description' => __('How many Activity entries do you want to display by default?', 'wefoster'),
          'section' => 'wf_plus_activity_section',
          'default' => '20',
          'priority' => 10,
          'choices' => array(
              '10' => __('10 Entries', 'wefoster'),
              '20' => __('20 Entries', 'wefoster'),
              '30' => __('30 Entries', 'wefoster'),
              '40' => __('40 Entries', 'wefoster'),
              '50' => __('50 Entries', 'wefoster'),
              '60' => __('60 Entries', 'wefoster'),
              '70' => __('70 Entries', 'wefoster'),
              '80' => __('80 Entries', 'wefoster'),
              '90' => __('90 Entries', 'wefoster'),
              '100' => __('100 Entries', 'wefoster')
          )
      ));

      Kirki::add_field('wefoster_plus', array(
          'type' => 'text',
          'settings' => 'wf_plus_activity_title',
          'label' => __('Page Title', 'wefoster'),
          'description' => __('Change the title of the Activity page', 'wefoster'),
          'default' => 'Sitewide Activity',
          'section' => 'wf_plus_activity_section',
          'priority' => 1
      ));

  }

  // Posts and Pages (WordPress)
  Kirki::add_field('wefoster_plus', array(
      'type' => 'radio',
      'settings' => 'wf_plus_featured_image_default_sizes',
      'label' => __('Featured Images', 'wefoster'),
      'description' => __('Do you want to set custom image sizes for your posts, pages and full width template pages?', 'wefoster'),
      'section' => 'wf_plus_featured_images_section',
      'default' => 'default',
      'priority' => 10,
      'choices' => array(
          'default' => __('No, use default sizes', 'wefoster'),
          'custom' => __('Yes, set custom image sizes', 'wefoster')
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'wf_plus_featured_image_width',
      'default' => WEFOSTER_POST_THUMBNAIL_WIDTH,
      'label' => __('Posts/Pages Image Width', 'wefoster'),
      'section' => 'wf_plus_featured_images_section',
      'priority' => 10,
      'choices' => array(
          'min' => 50,
          'max' => 2000,
          'step' => 10
      ),
      'required' => array(
          array(
              'setting' => 'wf_plus_featured_image_default_sizes',
              'operator' => '==',
              'value' => 'custom'
          )
      )
  ));

  // Posts and Pages (WordPress)
  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'wf_plus_featured_image_height',
      'label' => __('Posts/Pages Image Height', 'wefoster'),
      'section' => 'wf_plus_featured_images_section',
      'default' => WEFOSTER_POST_THUMBNAIL_HEIGHT,
      'priority' => 10,
      'choices' => array(
          'min' => 50,
          'max' => 2000,
          'step' => 10
      ),
      'required' => array(
          array(
              'setting' => 'wf_plus_featured_image_default_sizes',
              'operator' => '==',
              'value' => 'custom'
          )
      )
  ));

  // Posts and Pages (WordPress)
  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'wf_plus_featured_full_image_width',
      'label' => __('Full Width Page Image Width', 'wefoster'),
      'section' => 'wf_plus_featured_images_section',
      'priority' => 10,
      'default' => WEFOSTER_POST_THUMBNAIL_WIDTH_FULL,
      'choices' => array(
          'min' => 50,
          'max' => 2000,
          'step' => 10
      ),
      'required' => array(
          array(
              'setting' => 'wf_plus_featured_image_default_sizes',
              'operator' => '==',
              'value' => 'custom'
          )
      )
  ));

  // Posts and Pages (WordPress)
  Kirki::add_field('wefoster_plus', array(
      'type' => 'slider',
      'settings' => 'wf_plus_featured_full_image_height',
      'label' => __('Full Width Pages Image Height', 'wefoster'),
      'section' => 'wf_plus_featured_images_section',
      'priority' => 10,
      'default' => WEFOSTER_POST_THUMBNAIL_HEIGHT_FULL,
      'choices' => array(
          'min' => 50,
          'max' => 2000,
          'step' => 10
      ),
      'required' => array(
          array(
              'setting' => 'wf_plus_featured_image_default_sizes',
              'operator' => '==',
              'value' => 'custom'
          )
      )
  ));

  Kirki::add_field('wefoster_plus', array(
      'type' => 'radio',
      'settings' => 'wf_plus_featured_image_effect',
      'label' => __('Image Effects', 'wefoster'),
      'description' => __('Apply an image effect to your featured images. Note: Some of these effects will not work on Internet Explorer. In these cases the image will be shown without the effect.', 'wefoster'),
      'section' => 'wf_plus_featured_images_section',
      'default' => 'default',
      'transport' => 'postMessage',
      'priority' => 10,
      'choices' => wefoster_plus_image_effects()
  ));

	Kirki::add_field('wefoster_plus', array(
      'type' => 'text',
      'settings' => 'wf_plus_excerpt_length',
      'label' => __('Excerpt Length', 'wefoster'),
      'description' => __('How many words should the excerpts on your Post Archive contain?', 'wefoster'),
      'section' => 'wf_plus_archives_section',
      'priority' => 10,
	    'default' => 50,
  ));

}
add_filter('kirki/fields', 'wf_plus_register_settings');
