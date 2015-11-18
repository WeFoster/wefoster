<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @since 1.0.0
 *
 */
function wff_scripts() {

  //Register path
  $path = get_template_directory_uri() . '/assets';

  //First let's remove the default BuddyPress CSS
  wp_deregister_style( 'bp-child-css' );
  wp_deregister_style( 'bp-parent-css' );
  wp_deregister_style( 'bp-legacy-css' );

  //Enqueue our Main Stylesheet.
  wp_enqueue_style('wff_main', $path . '/css/main.css', false, '6ee17105aaae3sffd20bb56ee840e0cabcd');

  //Load our BuddyPress Stylesheet based on being active (on root or multiblog)
  if ( class_exists( 'BuddyPress') && bp_is_root_blog() || class_exists( 'BuddyPress') && defined('BP_ENABLE_MULTIBLOG')   ) {
    wp_enqueue_style('wff_buddypress', $path . '/css/buddypress.css', false, '9d5bd7a6a2c6a8cfb750ac360d0edd40');
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // Add jQuery Fastclick for mobile devices
  if (wp_is_mobile() ) {
     wp_register_script('wff-fastclick', $path . '/vendor/fastclick/lib/fastclick.js', array(), null, false);
     wp_enqueue_script('wff-fastclick');
  }

  //Modernizr
  wp_register_script('modernizr', $path . '/js/vendor/modernizr-2.7.0.min.js', array(), null, false);

  //Custom Scripts
  wp_register_script('wff_scripts', $path . '/js/scripts.min.js', array(), '673d39e853c8a843815c427814ece320', true);

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('wff_scripts');
}
add_action('wp_enqueue_scripts', 'wff_scripts', 100);
