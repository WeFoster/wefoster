<?php
// Retrieve our option and set default if empty.
$stylekit = get_theme_mod( 'wf_stylekit', 'default' );

// No option set? Set default
if ( empty( $stylekit ) ) { $stylekit = 'default'; }

//Define our Stylekit directory so it can be changed if needed.
if ( ! defined( 'WEFOSTER_PLUS_STYLEKIT_DIR' ) ) {
	define( 'WEFOSTER_PLUS_STYLEKIT_DIR', WEFOSTER_THEME_DIR . '/stylekits' . '/' . $stylekit );
}

//Define Stylekit name,
if ( ! defined( 'WEFOSTER_PLUS_STYLEKIT_NAME' ) ) {
		define( 'WEFOSTER_PLUS_STYLEKIT_NAME', $stylekit );
}

// Load the right Stylekit based on choice of the user
$file = WEFOSTER_PLUS_STYLEKIT_DIR . '/functions.php';

if ( file_exists( $file ) ) {
	require_once( WEFOSTER_PLUS_STYLEKIT_DIR . '/functions.php' );
}

/**
 * Add Stylekits Selections
 *
 * @since 1.0.0
 */
function wefoster_stylekits() {

	if ( ! defined( 'WEFOSTER_PLUS_PLUGIN_DIR' ) ) {
			$stylekits = array(
				'default'        => 'Classic',
			);

			return $stylekits;

	} else {
		// Load the fonts from WeFoster Plus
		return wefoster_stylekits_plus();
	}
}
?>
