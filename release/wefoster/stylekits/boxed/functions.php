<?php
/**
* This is our Stylekit boilerplate where we can set default values that are applied automatically.
*
* @since 1.0
* @package WeFoster Plus
*/

//Load our Constants and Settings
require_once( dirname(__FILE__). '/constants.php' );
require_once( dirname(__FILE__). '/settings.php' );

//Load our custom stylesheet
function wefoster_plus_load_preset() {

	//Remove our stylesheets
	wp_dequeue_style( 'wff_main' );
	wp_dequeue_style( 'wff_buddypress' );

	//Retrieve our option and set default if empty.
	$color_scheme = get_theme_mod( WEFOSTER_PLUS_STYLEKIT_NAME . '_color_scheme', 'default');

	wp_enqueue_style('wff_plus_stylekit_' . WEFOSTER_PLUS_STYLEKIT_NAME . '', WEFOSTER_THEME_URL . '/stylekits/ ' . WEFOSTER_PLUS_STYLEKIT_NAME . '/css/' . WEFOSTER_PLUS_STYLEKIT_NAME . '-' . $color_scheme . '.css', false);
}
add_action('wp_enqueue_scripts', 'wefoster_plus_load_preset', 10000);
