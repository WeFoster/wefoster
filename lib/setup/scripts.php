<?php
/**
* Register our styles and scripts
*
* @since 1.0
* @package WeFoster Framework
*/

/**
 * Enqueue scripts and stylesheets
 *
 */
function wff_scripts() {

  if ( WEFOSTER_DEVELOPER == 'on' ) {
    $enq_path = get_template_directory_uri() . '/assets/css/min-';
  } else {
    $enq_path = get_template_directory_uri() . '/assets/css/';
  }

  //First let's remove the default BuddyPress CSS
  wp_deregister_style( 'bp-child-css' );
  wp_deregister_style( 'bp-parent-css' );
  wp_deregister_style( 'bp-legacy-css' );

  //Enqueue our Main Stylesheet.
  wp_enqueue_style('wff_main', $enq_path . 'main.css', false, '6ee17105aaae3d20bb56ee840e0cabcd');

  //Load our BuddyPress Stylesheet based on being active (on root or multiblog)
  if ( class_exists( 'BuddyPress') && bp_is_root_blog() || class_exists( 'BuddyPress') && defined('BP_ENABLE_MULTIBLOG')   ) {
    wp_enqueue_style('wff_buddypress', $enq_path . 'buddypress.css', false, '731ef031f390528505ab02fds023b2c7a7');
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // Add jQuery Fastclick for mobile devices
  if (wp_is_mobile() ) {
     wp_register_script('cf-fastclick', get_template_directory_uri() . '/assets/vendor/fastclick/lib/fastclick.js', array(), null, false);
     wp_enqueue_script('cf-fastclick');
  }
  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', array(), null, false);

 wp_register_script('wff_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), '203e8b93c26651fecb88e8c703ec9460', true);

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('wff_scripts');
}
add_action('wp_enqueue_scripts', 'wff_scripts', 100);
