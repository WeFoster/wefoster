<?php

/**
 * This file contains all the action that load a lot of our template parts.
 * Maybe you're wondering why we use hooks instead of just adding them to the templates?
 * By using hooks we are giving you a lot more flexibility in moving or removing the parts you don't need.
 * It also has the benefit of keeping our templates clean and easy to manage.
 * Read our developer docs at https://wefoster.co/documentation.
 */

/*
* Load our Header Type. This can be filtered if needed. See filters.php
*
* @since 1.0.0
*/
if ( ! function_exists( 'wff_load_full_header_template' ) ) {
	function wff_load_full_header_template() {
		get_template_part( 'templates/header/'.wff_get_header_type() );
	}

	$header_settings = get_theme_mod( 'wf_plus_header_menu_position' );

	if ( $header_settings == 'above' ) {
		add_action( 'close_header', 'wff_load_full_header_template' );
	} else {
		add_action( 'open_header', 'wff_load_full_header_template' );
	}
}

/*
 * Hook the primary navigation into our minimal and full header template.
 */
if ( ! function_exists( 'wff_primary_navigation_location' ) ) {
	function wff_primary_navigation_location() {
		get_template_part( 'templates/header/primary-navigation' );
	}

	$header_settings = get_theme_mod( 'wf_plus_header_menu_position', 'inside' );

	if ( $header_settings == 'inside' ) {
		add_action( 'after_site_description', 'wff_primary_navigation_location' );
	} else {
		add_action( 'before_header_navigation', 'wff_primary_navigation_location' );
	}

}

/*
* Hook the secondary navigation into our full header template. The position changes based on
*
* @since 1.0.0
*/
if ( ! function_exists( 'wff_secondary_navigation_location' ) ) {

	function wff_secondary_navigation_location() {
		get_template_part( 'templates/header/secondary-navigation' );
	}

	$header_settings = get_theme_mod( 'wf_plus_header_menu_position', 'below' );
	$secondary_menu_position = get_theme_mod( 'wf_plus_secondary_menu_position', WEFOSTER_LAYOUT_FULL_SECONDARY_MENU_POSITION );

	if ( $header_settings == 'above' ) {
		add_action( 'after_full_header', 'wff_secondary_navigation_location', 1 );
	}
	if ( $header_settings == 'below' ) {
		add_action( 'open_header', 'wff_secondary_navigation_location', 1 );
	}
	if ( $header_settings == 'inside' && $secondary_menu_position == 'above'  ) {
		add_action( 'open_header', 'wff_secondary_navigation_location', 1 );
	}
	if ( $header_settings == 'inside' && $secondary_menu_position == 'below'  ) {
		add_action( 'after_full_header', 'wff_secondary_navigation_location', 1 );
	}
}

/*
* Display our Logo
*/
if ( ! function_exists( 'wff_branding' ) ) {
	function wff_branding() {
			if (empty($logo)) {
				$logo = WEFOSTER_DEFAULT_LOGO;
			}
			echo apply_filters( 'wff_logo', $logo );
	}

	$header_settings = get_theme_mod( 'wf_plus_header_menu_position', 'inside' );

	if ( $header_settings == 'inside' ) {
		add_action( 'inside_site_description', 'wff_branding' );
	} else {
		add_action( 'inside_branding', 'wff_branding' );
	}
}

/*
* Add the Hero Header to our Homepage.
*
* @since 1.0.0
*/
if ( ! function_exists( 'wff_homepage_hero' ) ) {
	function wff_homepage_hero() {
	//Load our Homepage Hero Header
	if ( get_theme_mod( 'wf_hero_header', 'yes' ) == 'yes' && is_page_template( 'templates/homepage-template.php' ) ) :
			get_template_part( 'templates/parts/hero-homepage' );
	endif;
	}
	add_action( 'before_container', 'wff_homepage_hero' );
}

	/*
 * Hook the Page Titles into our pages and posts.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_page_header' ) ) {
	function wff_page_header() {
		get_template_part( 'templates/parts/page-header' );
	}
	add_action( 'before_page_content', 'wff_page_header' );
}

if ( ! function_exists( 'wff_post_header' ) ) {
	function wff_post_header() {

		get_template_part( 'templates/parts/post-header' );
	}
	add_action( 'before_entry_content', 'wff_post_header' );
}

	/*
 * Hook the post thumbnails into our pages and posts.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_post_thumbnail_location' ) ) {
	function wff_post_thumbnail_location() {
		if ( is_single() || is_page() ) {
			get_template_part( 'templates/parts/post-thumbnail' );
		}
	}
	add_action( 'before_entry_content', 'wff_post_thumbnail_location', 1 );
	add_action( 'before_page_content', 'wff_post_thumbnail_location', 1 );
}

	/*
 * Hook the post author avatar into our Post Thumbnail template.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_post_author_avatar' ) ) {
	function wff_post_author_avatar() {
		//Don't show avatars on pages.
		if ( ! is_page() ) {
				get_template_part( 'templates/parts/author-avatar' );
		}
	}
	add_action( 'open_post_thumbnail', 'wff_post_author_avatar' );
}

	/*
 * Hook the Archive Intro into our Template
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_archive_intro' ) ) {
	function wff_archive_intro() {

		get_template_part( 'templates/parts/archive-intro' );
	}
	add_action( 'before_page_content', 'wff_archive_intro', 20 );
}

	/*
 * Hook the Post Meta template
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_entry_meta_location' ) ) {
	function wff_entry_meta_location() {

		get_template_part( 'templates/parts/entry-meta' );
	}
	add_action( 'before_entry_content', 'wff_entry_meta_location', 11 );
}

	/*
 * Hook the Entry Tags template
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_entry_tags_location' ) ) {
	function wff_entry_tags_location() {

		get_template_part( 'templates/parts/entry-tags' );
	}
	add_action( 'after_entry_content', 'wff_entry_tags_location' );
}

	/*
 * Hook the Author Box template
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_author_box_location' ) ) {
	function wff_author_box_location() {

		get_template_part( 'templates/parts/author-box' );
	}
	add_action( 'after_entry_content', 'wff_author_box_location' );
}


// Mobile Templates.
if ( ! function_exists( 'wff_mobile_sidebars' ) ) {
	/**
	 * Load our Mobile Navigation on Handhelds.
	 */
	function wff_mobile_sidebars() {
  	get_template_part('templates/sidebar/mobile-navigation');
	}
	if ( is_handheld() || WEFOSTER_MOBILE_OPTIMISATION == 'off' ) {
		add_action( 'after_footer', 'wff_mobile_sidebars' );
	}
}

/*
 * Hide Admin bar by default for regular users.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_hide_admin_bar' ) ) {
	function wff_hide_admin_bar() {

		add_filter( 'show_admin_bar', '__return_false' );
	}
	// add_action( 'init','wff_hide_admin_bar' );
}
