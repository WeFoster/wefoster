<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @since 1.0.0
 */
function wff_scripts() {

	// Register path
	$path = get_template_directory_uri() . '/assets';

	// First let's remove the default BuddyPress CSS
	wp_deregister_style( 'bp-child-css' );
	wp_deregister_style( 'bp-parent-css' );
	wp_deregister_style( 'bp-legacy-css' );


	// Enqueue our Main Stylesheet.
	wp_enqueue_style( 'wff_main', $path . '/css/main.css', false, '6ee17105aaae3sffd20bb56ee840e0cabcd' );

	// Load our BuddyPress Stylesheet based on being active (on root or multiblog)
	if (
			class_exists( 'BuddyPress' ) && bp_is_root_blog() ||
			class_exists( 'BuddyPress' ) && defined( 'BP_ENABLE_MULTIBLOG' ) ||
			WEFOSTER_MS_LOAD_BUDDYPRESS_STYLES == 'on' ) {
			wp_enqueue_style( 'wff_buddypress', $path . '/css/buddypress.css', false, '9ad14980d2d75af2ed431fe686bad3f0' );
	}

	if ( WEFOSTER_ICON_FONT == 'font-awesome' ) {
		// Enqueue Font Awesome
		wp_enqueue_style( 'wff_font_awesome', $path . '/css/font-awesome.css', false, '6ee17105aaae3sffd20bb56ee840e0cabcd' );
  }

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Add jQuery Fastclick for mobile devices
	if ( wp_is_mobile() ) {
		wp_register_script( 'wff-fastclick', $path . '/vendor/fastclick/lib/fastclick.js', array(), null, false );
		wp_enqueue_script( 'wff-fastclick' );
	}

	// Modernizr
	wp_register_script( 'modernizr', $path . '/js/vendor/modernizr-2.7.0.min.js', array(), null, false );

	//Mobile Scripts
	wp_register_script( 'touchswipe_js', '//cdn.jsdelivr.net/jquery.touchswipe/1.6.15/jquery.touchSwipe.min.js', array(), null, false );
	wp_register_script( 'sidr_js', '//cdn.jsdelivr.net/jquery.sidr/2.1.0/jquery.sidr.min.js', array(), null, false );
	wp_register_script( 'perfect_scrollbar', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.10/js/perfect-scrollbar.jquery.js', array(), null, false );
	// Enqueue Font Awesome

	// Custom Scripts
	wp_register_script( 'wff_scripts', $path . '/js/scripts.min.js', array(), '2592531929b0a0de360daca45107315b', true );
	wp_enqueue_script( 'modernizr' );

	if ( is_handheld() || WEFOSTER_MOBILE_OPTIMISATION == 'off'  ) {
		//Only load our scripts on mobile
		wp_enqueue_script( 'touchswipe_js' );
		wp_enqueue_script( 'sidr_js' );
		wp_enqueue_script( 'perfect_scrollbar' );
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wff_scripts' );

}
add_action( 'wp_enqueue_scripts', 'wff_scripts', 100 );
