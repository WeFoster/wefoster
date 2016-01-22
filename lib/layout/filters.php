<?php
////
/// Filters that are used to load template parts.
///

/**
 * Load default header template. used in header-content.php
 *
 * @since 1.0.0
 *
 */
function wff_get_header_type() {
   return apply_filters( 'wf_header_type', WEFOSTER_LAYOUT_PRESET );
}

/**
 * Load default Footer Type
 *
 * @since 1.0.0
 *
 */
function wff_get_footer_type() {
   return apply_filters( 'wf_footer_type', WEFOSTER_FOOTER_WIDGETS );
}

/**
 * Load default Sidebar Type
 *
 * @since 1.0.0
 *
 */
function wff_get_sidebar_type() {
   return apply_filters( 'wff_sidebar_type', WEFOSTER_SIDEBAR );
}

/**
 * Show the site description and title if constant is set?
 *
 * @since 1.0.0
 *
 */
function wff_get_site_description() {
   return apply_filters( 'wf_site_description', WEFOSTER_SHOW_SITE_TITLE_DESCRIPTION );
}


////
//// Filters that add CSS classes
///


/**
 * Add our Bootstrap grid classes for our .main div
 *
 * @since 1.0.0
 *
 */
function wff_container_class() {
  echo apply_filters( 'wff_container_class', ' ' . WEFOSTER_LAYOUT_CLASS );
}
add_action( 'class_container','wff_container_class' );

/**
 * Add our Bootstrap grid classes for our .main div
 */
function wff_content_wrapper_class() {
  echo apply_filters( 'wff_content_wrapper_class', ' ' . WEFOSTER_CONTENT_WRAPPER_CLASS );
}
add_action( 'class_content_wrapper','wff_content_wrapper_class' );


/**
 * Add our Bootstrap grid classes for our .main div
 *
 * @since 1.0.0
 *
 */
function wff_main_class() {
  echo apply_filters( 'wff_main_class', ' ' . WEFOSTER_MAIN_CLASS );
}
add_action( 'class_main','wff_main_class' );


/**
 * Add our Bootstrap grid classes for our .sidebar div
 *
 * @since 1.0.0
 *
 */
function wff_sidebar_class() {
  echo apply_filters( 'wff_sidebar_class', ' ' . WEFOSTER_SIDEBAR_CLASS );
}
add_action( 'class_sidebar','wff_sidebar_class' );


/**
 * Add an extra class for our <footer>
 *
 * @since 1.0.0
 *
 */
function wff_footer_class() {
  echo apply_filters( 'wff_footer_class', ' ' . WEFOSTER_FOOTER_CLASS );
}
add_action( 'class_footer','wff_footer_class' );


/**
 * Allow developers and theme options to set the navbar style
 *
 * @since 1.0.0
 *
 */
function wff_navbar_inverse() {
  echo apply_filters( 'wff_navbar_inverse_class', ' ' . WEFOSTER_HEADER_STYLE . ' ' );
}
add_action( 'class_header','wff_navbar_inverse' );

/**
 * Allow developers and theme options to set the navbar menu position
 *
 * @since 1.0.0
 *
 */
function wff_navbar_position() {
  echo apply_filters( 'wff_navbar_position_class', ' ' . WEFOSTER_NAVBAR_POSITION_CLASS . ' ' );
}
add_action( 'class_primary_menu','wff_navbar_position' );


if ( WEFOSTER_LAYOUT_PRESET == 'minimal'  ) {
  /**
   * Use our constants to see if we should stick to the top.
   *
   * @since 1.0.0
   *
   */
  function wff_navbar_fixed_top() {
    echo apply_filters( 'wff_navbar_fixed_class', ' ' . WEFOSTER_HEADER_STICKY . ' ' );
  }
  add_action( 'class_header','wff_navbar_fixed_top' );

  /**
   * Should we hide on scroll?
   *
   * @since 1.0.0
   *
   */
  function wff_navbar_headroom() {
    echo apply_filters( 'wff_navbar_headroom_class', ' ' . WEFOSTER_HEADER_HIDE . ' ' );
  }
  add_action( 'class_header','wff_navbar_headroom' );



  /**
   * Add a body class to add styling for a fixed navbar. See assets/less/layout/header.less
   *
   * @since 1.0.0
   *
   */
    if ( ! function_exists ( 'wff_navbar_fixed_body_class' ) ) {
      function wff_navbar_fixed_body_class( $classes ) {
      	// add a body class
      	$classes[] = apply_filters( 'wff_navbar_fixed_body_class', 'wefoster-'. WEFOSTER_HEADER_STICKY );

      	// return the $classes array
      	return $classes;
      }
      add_filter( 'body_class', 'wff_navbar_fixed_body_class' );
    }
}

/**
 * Add a body class to enable Bootstrap Select functionality (for pretty select boxes on desktop)
 *
 * @since 1.0.0
 *
 */
if ( WEFOSTER_SELECT_BOXES == 'wefoster-bootstrap-select') {
	if ( ! function_exists ( 'wff_bootstrap_select_dropdown' ) ) {
	  function wff_bootstrap_select_dropdown( $classes ) {
	  	// add a body class
	  	$classes[] = apply_filters( 'wff_bootstrap_select', ' ' . WEFOSTER_SELECT_BOXES . ' ' );
	  	// return the $classes array
	  	return $classes;
	  }
	  add_filter( 'body_class', 'wff_bootstrap_select_dropdown' );
  }
}


if ( ! function_exists ( 'wff_enable_font_awesome' ) ) {
  function wff_enable_font_awesome( $classes ) {
  	// add a body class
  	$classes[] = apply_filters( 'wff_font_awesome', 'wf-icon-' . WEFOSTER_ICON_FONT . ' ' );
  	// return the $classes array
  	return $classes;
  }
  add_filter( 'body_class', 'wff_enable_font_awesome' );
}


/**
 * Add a body class to enable Bootstrap Tooltip functionality.
 *
 * @since 1.0.0
 *
 */
if ( WEFOSTER_TOOLTIPS == 'wefoster-bootstrap-tooltips') {
	if ( ! function_exists ( 'wff_bootstrap_tooltips' ) ) {
	  function wff_bootstrap_tooltips( $classes ) {
	  	// add a body class
	  	$classes[] = apply_filters( 'wff_bootstrap_tooltips', ' ' . WEFOSTER_TOOLTIPS . ' ' );
	  	// return the $classes array
	  	return $classes;
	  }
	  add_filter( 'body_class', 'wff_bootstrap_tooltips' );
  }
}

/**
 * Add a body class to change the sidebar
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists ( 'wff_sidebar_position' ) ) {
   function wff_sidebar_position( $classes ) {
   	// add a body class
   	$classes[] = apply_filters( 'wff_sidebar_position', ' ' . WEFOSTER_SIDEBAR_POSITION . ' ' );
   	// return the $classes array
   	return $classes;
   }
   add_filter( 'body_class', 'wff_sidebar_position' );
 }

/**
*
* Add a general wefoster-framework class. Use this class to easily overwrite/add CSS without having
* to get super specific with your selectors. You know what I'm talking about ;-)
*
* @since 1.0.0
*
*/
if ( ! function_exists ( 'wff_framework_body_class' ) ) {
  function wff_framework_body_class( $classes ) {
  	// add a body class
  	$classes[] = apply_filters( 'wff_framework_body_class', 'wefoster-framework' );
  	// return the $classes array
  	return $classes;
  }
  add_filter( 'body_class', 'wff_framework_body_class' );
}

/**
 * Use a filter to load the proper logo.
 * We are checking the constants to try and figure out the best logo to use.
 * If stuff gets complicated then we'll fall back to the default logo set by the theme.
 * Used in templates/header-branding.php and WeFoster+
 *
 * @since 1.0.0
 *
 */
function wff_get_site_logo() {

  if ( WEFOSTER_LOGO_TYPE == 'text' ){
    $logo = get_bloginfo('name');
  }
	elseif ( WEFOSTER_LOGO_TYPE == 'full' && WEFOSTER_HEADER_STYLE == 'navbar-inverse' ) {
		$logo = '<img src="' . WEFOSTER_FULL_LOGO_INVERSE . '">';
	}
	elseif ( WEFOSTER_LOGO_TYPE == 'full' && WEFOSTER_HEADER_STYLE == 'navbar-regular' ) {
		$logo = '<img src="' . WEFOSTER_FULL_LOGO_REGULAR . '">';
	}
	elseif ( WEFOSTER_LOGO_TYPE == 'minimal' && WEFOSTER_HEADER_STYLE == 'navbar-inverse' )  {
		$logo = '<img src="' . WEFOSTER_MINIMAL_LOGO_INVERSE . '">';
	}
	elseif ( WEFOSTER_LOGO_TYPE == 'minimal' && WEFOSTER_HEADER_STYLE == 'navbar-inverse' ){
		$logo = '<img src="' . WEFOSTER_MINIMAL_LOGO_REGULAR . '">';
	}
  elseif ( WEFOSTER_LOGO_TYPE == 'text' ){
    $logo = get_bloginfo('name');
  }
  elseif ( WEFOSTER_LOGO_TYPE == 'text-description' ){
    $logo = get_bloginfo('name') . '<span>' . get_bloginfo('description') . '</span>';
  }
	else {
		$logo = '<img src="' . WEFOSTER_DEFAULT_LOGO . '">';
	}

	return $logo;

}
add_filter( 'wff_logo_url', 'wff_get_site_logo' );

/**
 * Add Full Header Class Filter.
 *
 * @since 1.0.0
 *
 */
function wff_full_header() {
  echo apply_filters( 'wff_full_header_class', 'hello' );
}
add_action( 'full_header_class','wff_full_header' );

// Is the header set to boxed? Add our extea
if ( WEFOSTER_LAYOUT_CLASS == 'container'  ) {

  function wf_full_header_class_fixed_layout(){

    $classes = 'container-fluid';

   	return $classes;
  }
  add_filter( 'wff_full_header_class', 'wf_full_header_class_fixed_layout' );

}

/**
 * Is the header set to boxed? Add our extra classes
 *
 * @since 1.0.0
 *
 */
if ( WEFOSTER_HEADER == 'boxed'  ) {

  function wf_boxed_header_class_boxed(){

    $classes = ' container header-boxed ';

   	return $classes;
  }
  add_filter( 'wff_boxed_header_class', 'wf_boxed_header_class_boxed' );

}


/**
 * Add special "admin bar is showing" body class
 *
 * @since 1.0.0
 *
 */
function wff_base_admin_bar_class( $classes )
{
	if ( is_admin_bar_showing() ) {
		// *append* class to the array
		$classes[] = 'admin-bar-showing';
	}

	// return it!
	return $classes;
}
add_filter( 'body_class', 'wff_base_admin_bar_class' );

/**
 * Add class when there is a post thumbnail
 *
 * @since 1.0.0
 *
 */
function wff_add_featured_image_body_class( $classes ) {
    global $post;

    if ( isset ( $post->ID ) && get_the_post_thumbnail($post->ID)) {
      $classes[] = 'has-featured-image';
    }

    return $classes;
}
add_filter( 'body_class', 'wff_add_featured_image_body_class' );

/**
 * Add class based on Post Category
 *
 * @since 1.0.0
 *
 */
function wff_add_category_body_class( $classes ) {

  if (is_single() ) {
		global $post;
		foreach((get_the_category($post->ID)) as $category) {
			// add category slug to the $classes array
			$classes[] = 'post-category-' . $category->category_nicename;
		}
	}
  if (is_singular('post') ) {
	  $classes[] = 'single-post';
  }
	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'wff_add_category_body_class' );

/**
 * Add Body Class when the Inside Menu is used.
 *
 * @since 1.0.0
 *
 */
function wff_inside_menu_navigation_body_class( $classes ) {

	$header_settings = get_theme_mod( 'wf_plus_header_menu_position', 'inside' );
  $layout_type = get_theme_mod( 'wf_layout_type', WEFOSTER_LAYOUT_PRESET );

	if (
    $header_settings == 'inside' && $layout_type == 'full'
  ) {
		  $classes[] = 'wf-inside-navigation-menu';
	}
	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'wff_inside_menu_navigation_body_class' );

/**
 * Add filterable class to post author box.
 *
 * @since 1.0.0
 *
 */
function wff_author_bio() {
  echo apply_filters( 'wff_author_bio_class', 'box-light margin-vertical-full' );
}
add_action( 'author_bio_class','wff_author_bio' );

/**
 * Add filterable class to post entry meta.
 *
 * @since 1.0.0
 *
 */
function wff_post_meta() {
  echo apply_filters( 'wff_post_meta_class', 'box-light' );
}
add_action( 'post_meta_class','wff_post_meta' );
