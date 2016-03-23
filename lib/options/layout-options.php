<?php
/**
 * Check theme options for layout type set by constant.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_layout_type() {

	$option = get_theme_mod( 'wf_layout_type', 'default' );

	if ( $option == 'default' ) {
			$value = WEFOSTER_LAYOUT_PRESET;
	} else {
			//Use our set option
			$value = $option;
	}

	return $value;

}
add_filter( 'wf_header_type', 'wefoster_plus_change_layout_type' );


/**
 * Check theme options for layout container class set by constant.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_layout_class() {

	$option = get_theme_mod( 'wf_layout_class', 'default' );

	if ( $option == 'default' ) {

			$classes = WEFOSTER_LAYOUT_CLASS;

	}

	else {

		$classes = $option;

	}

	return $classes;

}
add_filter( 'wff_container_class', 'wefoster_plus_change_layout_class' );
add_filter( 'wff_content_wrapper_class', 'wefoster_plus_change_layout_class' );

/**
 * Check theme options for sidebar position
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_sidebar_class() {

		$option = get_theme_mod( 'wf_plus_sidebar_position', 'default' );

		if ( $option == 'default' ) {
				$classes = WEFOSTER_SIDEBAR_POSITION;
		}
		else {
	    $classes = $option;
		}

		return $classes;

}
add_filter( 'wff_sidebar_position', 'wefoster_plus_change_sidebar_class' );

//Check theme options for sidebar position
function wefoster_plus_show_site_description() {

		$option = get_theme_mod( 'wf_plus_header_show_description', 'default' );

		if ( $option == 'default' ) {
				$classes = WEFOSTER_SHOW_SITE_TITLE_DESCRIPTION;
		}
		else {
	    $classes = $option;
		}

		return $classes;

}
add_filter( 'wf_site_description', 'wefoster_plus_show_site_description' );

/**
 * Check theme options for navbar style
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_navbar_class() {

		$option = get_theme_mod( 'wf_plus_header_style', 'default' );

		if ( $option == 'default' ) {
					$classes = WEFOSTER_HEADER_STYLE;
		}

		else {
	    $classes = ' ' . $option  . ' ';
		}

		return $classes;

}
add_filter( 'wff_navbar_inverse_class', 'wefoster_plus_change_navbar_class' );

/**
 * Check theme options for navbar style
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_navbar_class_position() {

		$option = get_theme_mod( 'wf_plus_header_navigation_class', 'default' );

		if ( $option == 'default' ) {
					$classes = WEFOSTER_NAVBAR_POSITION_CLASS;
		}

		else {
	    $classes = ' ' . $option  . ' ';
		}

		return $classes;

}
add_filter( 'wff_navbar_position_class', 'wefoster_plus_change_navbar_class_position' );

/**
 * Check theme options for layout size
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_content_width() {

	//Retrieve our option
		$option = get_theme_mod( 'wf_plus_content_width', 'default' );

		if ( $option == 'default' || $option == 0 ) {
	    $content_width = WEFOSTER_MAIN_CLASS;
	  }

    if ( $option == 'col-sm-6' ) {
      $content_width = 'col-xs-12 col-sm-6';
    }

    if ( $option == 'col-sm-7' ) {
      $content_width = 'col-xs-12 col-sm-7';
    }

    if ( $option == 'col-sm-8' ) {
      $content_width = 'col-xs-12 col-sm-8';
    }

    if ( $option == 'col-sm-9' ) {
      $content_width = 'col-xs-12 col-sm-9';
    }

    if ( $option == 'col-sm-10' ) {
      $content_width = 'col-xs-12 col-sm-10';
    }

    return $content_width;
}
add_filter( 'wff_main_class', 'wefoster_plus_change_content_width' );

/**
 * Check theme options for Sidebar/Content Width
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_sidebar_width() {

	$option = get_theme_mod( 'wf_plus_content_width', 'default' );

	if ( $option == 'default' || $option == 0 ) {
    $content_width = WEFOSTER_SIDEBAR_CLASS;
  }

  if ( $option == 'col-sm-6' ) {
    $content_width = 'col-xs-12 col-sm-6';
  }

  if ( $option == 'col-sm-7' ) {
    $content_width = 'col-xs-12 col-sm-5';
  }

  if ( $option == 'col-sm-8' ) {
    $content_width = 'col-xs-12 col-sm-4';
  }

  if ( $option == 'col-sm-9' ) {
    $content_width = 'col-xs-12 col-sm-3';
  }

  if ( $option == 'col-sm-10' ) {
    $content_width = 'col-xs-12 col-sm-2';
  }

    return $content_width;

}
add_filter( 'wff_sidebar_class', 'wefoster_plus_change_sidebar_width' );

/**
 * Check theme options for Footer Class
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_footer_class() {

		$option = get_theme_mod( 'wf_plus_footer_style', 'default' );

		if ( $option == 'default' ) {
				$classes = WEFOSTER_FOOTER_CLASS;
		}
		else {
	    $classes = ' ' . $option . ' ';
		}

		return $classes;

}
add_filter( 'wff_footer_class', 'wefoster_plus_change_footer_class' );

/**
 * Set the amount of footer widgets
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_footer_widgets() {

	$option = get_theme_mod( 'wf_plus_footer_widgets', WEFOSTER_FOOTER_WIDGETS );

	if ( $option == 'default' ) {
			$widgets = WEFOSTER_FOOTER_WIDGETS;
	}
	else {
		$widgets = $option;
	}

	return $widgets;

}
add_filter( 'wf_footer_type', 'wefoster_plus_change_footer_widgets' );


/**
 * Check theme options for custom logo. And overwrite the default one using the provided filter.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_custom_logo() {

	//Retrieve our option
	$logo_type = get_theme_mod( 'wf_plus_logo_type', WEFOSTER_LOGO_TYPE );


	if ( $logo_type == 0 || $content_option == 'default' ) {
	  $logo = '<img src="' . WEFOSTER_DEFAULT_LOGO . '">';
	}

	if ( $logo_type== 'text-description' ) {
    $logo = get_bloginfo('name') . '<span>' . get_bloginfo('description') . '</span>';
  }

	if ( $logo_type == 'text' ) {
      $logo = get_bloginfo('name');
  }

  if ( $logo_type == 'custom-logo' ) {
    $logo = '<img src="' . get_theme_mod( 'wf_plus_custom_logo','default') . '">';
  }

	if ( $logo_type == 'minimal-regular' ) {
    $logo = '<img src="' . WEFOSTER_MINIMAL_LOGO_REGULAR . '">';
  }

  if ( $logo_type == 'minimal-inverse' ) {
    $logo = '<img src="' . WEFOSTER_MINIMAL_LOGO_INVERSE . '">';
  }

	if ( $logo_type == 'full-regular' ) {
    $logo = '<img src="' . WEFOSTER_FULL_LOGO_REGULAR . '">';
  }

  if ( $logo_type == 'full-inverse' ) {
    $logo = '<img src="' . WEFOSTER_FULL_LOGO_INVERSE . '">';
  }

  return $logo;

}
add_filter( 'wff_logo', 'wefoster_plus_custom_logo', 11 );

/**
 * Check theme options and see if the logo should be completely hidden.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_hide_logo_desktop()
{
		if ( get_theme_mod('wf_plus_logo_type') == 'hide' ){
			echo 'hidden-sm hidden-md hidden-lg';
		}
}
add_action( 'class_navbar_header', 'wefoster_plus_hide_logo_desktop' );

/**
 * Check theme options for custom mobile logo. Overwrite the default logo if set.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_custom_mobile_logo() {

	//Retrieve our option
	$logo_type = get_theme_mod( 'wf_plus_mobile_logo_type', 'default' );


	if ( $logo_type == 0 || $content_option == 'default' ) {
	  $logo = '<img src="' . WEFOSTER_DEFAULT_MOBILE_LOGO . '">';
	}

	if ( $logo_type == 'text' ) {
      $logo = get_bloginfo('name');
  }

  if ( $logo_type == 'custom-logo' ) {
    $logo = '<img src="' . get_theme_mod( 'wf_plus_custom_logo','default') . '">';
  }

	if ( $logo_type == 'minimal-regular' ) {
    $logo = '<img src="' . WEFOSTER_MINIMAL_LOGO_REGULAR . '">';
  }

  if ( $logo_type == 'minimal-inverse' ) {
    $logo = '<img src="' . WEFOSTER_MINIMAL_LOGO_INVERSE . '">';
  }

	if ( $logo_type == 'full-regular' ) {
    $logo = '<img src="' . WEFOSTER_FULL_LOGO_REGULAR . '">';
  }

  if ( $logo_type == 'full-inverse' ) {
    $logo = '<img src="' . WEFOSTER_FULL_LOGO_INVERSE . '">';
  }

  return $logo;

}
add_filter( 'wff_mobile_logo', 'wefoster_plus_custom_mobile_logo', 11 );

////////////////
// Header
///////////////

/**
 * Check theme options to see if the Header should Stick.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_fixed_navbar() {

	//Retrieve our option
	$option = get_theme_mod( 'wf_plus_header_fixed', 'default' );

	if ( $option == 0 || $option == 'default' ) {
	  $navbar_fixed =  ' ' . WEFOSTER_HEADER_STICKY . ' ' ;
	}

	if ( $option == 'navbar-fixed-top' ) {
    $navbar_fixed = ' navbar-fixed-top ';
  }

  if ( $option == 'navbar-fixed-static' ) {
    $navbar_fixed = ' ';
  }

  return $navbar_fixed;

}
add_filter( 'wff_navbar_fixed_class', 'wefoster_plus_change_fixed_navbar' );


/**
 * Check theme options to see if the Header should Stick and add the body class.
 *
 * @since 1.0.0
 *
 */
function wff_plus_fixed_body_class( $classes ) {

	//Retrieve our option
	$option = get_theme_mod( 'wf_plus_header_fixed', 'default' );

	if ( $option == 0 || $option == 'default' ) {
	  $classes = 'wefoster-'. WEFOSTER_HEADER_STICKY . ' ';
	}

  if ( $option == 'navbar-fixed-top' ) {
    $classes = 'wefoster-' . $option . ' ' ;
  }

  if ( $option == 'navbar-fixed-static' ) {
    $classes = 'wefoster-' . $option . ' ';
  }

  return $classes;

}
add_filter( 'wff_navbar_fixed_body_class', 'wff_plus_fixed_body_class',11 );


/**
 * Check theme options and add the CSS classes to Body to enabled the Headroom Script.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_headroom_navbar() {

	//Retrieve our option
	$option = get_theme_mod( 'wf_plus_header_headroom', 'default' );

	if ( $option == 0 || $option == 'default' ) {
	  $navbar_headroom = ' ' . WEFOSTER_HEADER_HIDE ;
	}

  if ( get_theme_mod( 'wf_plus_header_headroom') == 'navbar-headroom' ) {
    $navbar_headroom = ' navbar-headroom ';
  }

  if ( get_theme_mod( 'wf_plus_header_headroom') == 'navbar-no-headroom' ) {
    $navbar_headroom = '';
  }

    return $navbar_headroom;

}
add_filter( 'wff_navbar_headroom_class', 'wefoster_plus_change_headroom_navbar' );

////////////////
// Post Layout
///////////////

/**
 * Check theme options to see if Custom Post Thumbnail sizes should be set.
 *
 * @since 1.0.0
 *
 */
$option = get_theme_mod( 'wf_plus_featured_image_default_sizes' );
if ( $option == 'custom' ) {

		function wefoster_plus_thumb_sizes( $sizes ){
		 return array(
			 'width' => get_theme_mod ('wf_plus_featured_image_width'),
			 'height' => get_theme_mod ('wf_plus_featured_image_height'),
			 'width_full' => get_theme_mod ('wf_plus_featured_full_image_width'),
			 'height_full' => get_theme_mod ('wf_plus_featured_full_image_height')
		);
		}
		add_filter( 'wff_post_thumbnail_sizes', 'wefoster_plus_thumb_sizes', 11 );
}

/**
 * Check theme options to see if the WordPress Admin bar should be hidden for non-admins.
 *
 * @since 1.0.0
 *
 */
$option = get_theme_mod( 'wf_plus_hide_admin_bar', 'hide' );
if ( $option == 'hide'  ) {

		if (!current_user_can('administrator') && !is_admin()) {
			add_filter('show_admin_bar', '__return_false');
		}
}
