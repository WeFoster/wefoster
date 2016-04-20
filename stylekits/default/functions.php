<?php
//Load our Constants and Settings
require_once( dirname( __FILE__ ) . '/constants.php' );
require_once( dirname( __FILE__ ) . '/settings.php' );

//Load our custom stylesheet
function wefoster_plus_load_preset() {

	//Retrieve our option and set default if empty.
	$color_scheme = get_theme_mod( 'stylekit_color_scheme', 'default' );

	//Remove our stylesheets
	if ( $color_scheme != 'default' ) {
		wp_dequeue_style( 'wff_main' );
		wp_dequeue_style( 'wff_buddypress' );
		wp_dequeue_style( 'wff_child_custom_main_less' );
		wp_dequeue_style( 'wff_child_custom_bp_less' );
		wp_enqueue_style( 'wff_plus_bp_stylekit_' . WEFOSTER_PLUS_STYLEKIT_NAME . '', WEFOSTER_THEME_URL . '/stylekits/' . WEFOSTER_PLUS_STYLEKIT_NAME . '/css/' . $color_scheme . '/style-bp.css', false );
		wp_enqueue_style( 'wff_plus_stylekit_' . WEFOSTER_PLUS_STYLEKIT_NAME . '', WEFOSTER_THEME_URL . '/stylekits/' . WEFOSTER_PLUS_STYLEKIT_NAME . '/css/' . $color_scheme . '/style.css', false );
	}

}

add_action( 'wp_enqueue_scripts', 'wefoster_plus_load_preset', 10000 );
?>
