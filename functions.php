<?php
/**
* Thank you for using the WeFoster framework! If you're reading this it means you're probably interested
* in creating awesome BuddyPress communities for yourself our your clients. Please take a look at our
* Developer documentation at https://documentation.wefoster.co/ to get started <3
*
* @since 1.0
* @package WeFoster Framework
*/
define( 'WEFOSTER_VERSION', '1.0' );

if ( !defined( 'WEFOSTER_THEME_DIR' ) ) {
	define( 'WEFOSTER_THEME_DIR', get_template_directory() );
}
if ( !defined( 'WEFOSTER_THEME_URL' ) ) {
	define( 'WEFOSTER_THEME_URL', get_template_directory_uri() );
}

//This constant can be overwritten to load your own customiser configuration.
if ( !defined( 'WEFOSTER_CUSTOMIZER_DIR' ) ) {
	define( 'WEFOSTER_CUSTOMIZER_DIR', get_template_directory() );
}
if ( !defined( 'WEFOSTER_CUSTOMIZER_URL' ) ) {
	define( 'WEFOSTER_CUSTOMIZER_URL', get_template_directory_uri() );
}

/**
 * Set up Kirki
 *
 * @since 1.0.0
 *
 */
if ( !defined( 'WEFOSTER_PLUS_PLUGIN_DIR' ) ) {

	require( WEFOSTER_CUSTOMIZER_DIR . '/lib/vendor/kirki/kirki.php' );

	Kirki::add_config( 'wefoster_plus', array(
	 'capability'    => 'edit_theme_options',
	 'option_type' => 'theme_mod',
	) );
}

/**
 * Load our Files
 *
 * @since 1.0.0
 *
 */


require_once WEFOSTER_THEME_DIR . '/lib/setup/stylekits.php';         // Set up our constants.

require WEFOSTER_THEME_DIR . '/lib/constants.php';         // Set up our constants.


//Setting up the theme
require_once WEFOSTER_THEME_DIR . '/lib/setup/init.php';             // Initial theme setup
require_once WEFOSTER_THEME_DIR . '/lib/setup/scripts.php';          // Scripts and stylesheets
require_once WEFOSTER_THEME_DIR . '/lib/setup/menus.php';            // BP Menu Walker
require_once WEFOSTER_THEME_DIR . '/lib/setup/sidebars.php';         // BP Sidebars
require_once WEFOSTER_THEME_DIR . '/lib/setup/activation.php';       // Automagically set up widgets and homepage
require_once WEFOSTER_THEME_DIR . '/lib/setup/helpers.php';          // Helper functions

//Our Customiser Options
require_once ( WEFOSTER_THEME_DIR . '/lib/customiser/init.php' );

// Allow developer to hide settings. See constants.php
if ( WEFOSTER_CUSTOMIZER_SETTINGS == 'true') {
	require_once( WEFOSTER_THEME_DIR . '/lib/customiser/panels.php' );
	require_once( WEFOSTER_THEME_DIR . '/lib/customiser/sections.php' );
}
require_once( WEFOSTER_THEME_DIR . '/lib/customiser/custom.php' ) ;
require_once( WEFOSTER_THEME_DIR . '/lib/customiser/fonts.php' ) ;
require_once( WEFOSTER_THEME_DIR . '/lib/customiser/settings.php' );

// Using our Customizer Values. Developers can disable most of these settings. See constants.php
if ( WEFOSTER_CUSTOMIZER_VALUES == 'true') {
	require_once(  WEFOSTER_THEME_DIR . '/lib/options/css-options.php' );
	require_once(  WEFOSTER_THEME_DIR . '/lib/options/layout-options.php' );
	require_once  WEFOSTER_THEME_DIR . '/lib/options/bp-options.php';
}

//Our layout actions, filters. a lot of these contain our constants.
require_once WEFOSTER_THEME_DIR . '/lib/layout/filters.php';           // Set up our filters.
require_once WEFOSTER_THEME_DIR . '/lib/layout/custom-login.php';      			// Make the login pretty.
require_once WEFOSTER_THEME_DIR . '/lib/layout/actions.php';           // Set up our actions.

/**
 * BuddyPress Specific
 *
 * @since 1.0.0
 *
 */
if ( class_exists( 'BuddyPress' ) ) {
	require_once WEFOSTER_THEME_DIR . '/lib/buddypress/bp-general.php';
	require_once WEFOSTER_THEME_DIR . '/lib/buddypress/bp-actions.php';
	require_once WEFOSTER_THEME_DIR . '/lib/buddypress/bp-hooks.php';
	require_once WEFOSTER_THEME_DIR . '/lib/buddypress/bp-filters.php';
}

// Our Thumbnail Class.
if( !class_exists( 'WP_Thumb' ) ){
    require_once WEFOSTER_THEME_DIR .  '/lib/vendor/WPThumb/wpthumb.php' ;
}
// Our Mobile Devices Class that helps with loading responsive template parts and CSS
if( ! function_exists ( 'is_iphone' ) ){
    require_once WEFOSTER_THEME_DIR .  '/lib/vendor/Mobile-Detect/conditionals.php' ;
}
?>
