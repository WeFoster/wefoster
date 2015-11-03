<?php
/**
* This file contains all the action that load a lot of our template parts.
* Maybe you're wondering why we use hooks instead of just adding them to the templates?
* By using hooks we are giving you a lot more flexibility in moving or removing the parts you don't need.
* It also has the benefit of keeping our templates clean and easy to manage.
* Read our developer docs at https://wefoster.co/documentation
 */

 // Change Default Avatar
 if ( ! function_exists ( 'wff_default_avatar' ) ) {

 	function wff_default_avatar() {
 		define ( 'BP_AVATAR_DEFAULT', WEFOSTER_ASSETS_URL . '/assets/img/avatar-member.jpg' );
 	}
 	add_action( 'bp_init', 'wff_default_avatar' );

 }

//Load our Header Type. This can be filtered if needed. See filters.php
if ( ! function_exists ( 'wff_load_full_header_template' ) ) {
  function wff_load_full_header_template()
  {
    get_template_part( 'templates/header/' . wff_get_header_type() );
  }

  $header_settings = get_theme_mod( 'wf_plus_header_menu_position' );

  if ( $header_settings == 'above')  {
    add_action( 'close_header', 'wff_load_full_header_template' );
  } else {
    add_action( 'open_header', 'wff_load_full_header_template' );
  }
}

/**
 * Hook the primary navigation into our minimal and full header template.
 */
if ( ! function_exists ( 'wff_primary_navigation_location' ) ) {
  function wff_primary_navigation_location()
  {
    get_template_part( 'templates/header/primary-navigation' );
  }
  add_action( 'before_header_navigation', 'wff_primary_navigation_location' );
}


/**
 * Hook the secondary navigation into our full header template.
 */
if ( ! function_exists ( 'wff_secondary_navigation_location' ) ) {
  function wff_secondary_navigation_location()
  {
    get_template_part( 'templates/header/secondary-navigation' );
  }
  add_action( 'after_full_header', 'wff_secondary_navigation_location' );
}

/**
 * Hook the post thumbnails into our pages and posts.
 */
if ( ! function_exists ( 'wff_post_thumbnail_location' ) ) {
  function wff_post_thumbnail_location()
  {
    get_template_part( 'templates/parts/post-thumbnail' );
  }
  add_action( 'before_single_content', 'wff_post_thumbnail_location' );
  add_action( 'before_page_header', 'wff_post_thumbnail_location' );
}

/**
 * Hook the Post Meta template.
 */
if ( ! function_exists ( 'wff_entry_meta_location' ) ) {
  function wff_entry_meta_location()
  {
    get_template_part( 'templates/parts/entry-meta' );
  }
  add_action( 'after_single_header', 'wff_entry_meta_location' );
}

if ( ! function_exists ( 'wff_entry_tags_location' ) ) {
  function wff_entry_tags_location()
  {
    get_template_part( 'templates/parts/entry-tags' );
  }
  add_action( 'after_entry_content', 'wff_entry_tags_location' );
}

if ( ! function_exists ( 'wff_author_box_location' ) ) {
  function wff_author_box_location()
  {
    get_template_part( 'templates/parts/author-box' );
  }
  add_action( 'after_entry_content', 'wff_author_box_location' );
}


// Hide Admin bar by default for regular users
if ( ! function_exists ( 'wff_hide_admin_bar' ) ) {
  function wff_hide_admin_bar() {
      add_filter('show_admin_bar', '__return_false');
  }
  //add_action( 'init','wff_hide_admin_bar' );
}
