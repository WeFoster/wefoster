<?php
/**
 * Add Textures to choose from in the Customizer.
 *
 * @since 1.0.0
 */
function wefoster_plus_background_textures() {

	if ( ! defined( 'WEFOSTER_PLUS_PLUGIN_DIR' ) ) {

		$url = get_stylesheet_directory_uri() . '/assets/img/patterns/';
		$bg_textures = array(
			'none'                          => 'No Background',
			$url . 'black_lozenge_@2X.png'  => 'Black Lozenge',
			$url . 'brickwall_@2X.png'      => 'Brick Wall',
			$url . 'bright_squares_@2X.png' => 'Bright Squares',
			$url . 'concrete_seamless.png'  => 'Concrete',
		);

		return $bg_textures;

	} else {
		// Load the fonts from WeFoster Plus
		return wefoster_plus_textures();
	}

}

/**
 * Add Image Effects to choose from in the Customizer.
 *
 * @since 1.0.0
 */
function wefoster_plus_image_effects() {

	if ( ! defined( 'WEFOSTER_PLUS_PLUGIN_DIR' ) ) {

		$effects = array(
			'default'   => 'No Effect',
			'greyscale' => 'Black & White',
		);

		return $effects;

	} else {
		// Load the fonts from WeFoster Plus
		return wefoster_plus_effects();
	}

}

/**
 * Add Background Pictures to choose from in the Customizer.
 *
 * @since 1.0.0
 */
function wefoster_plus_background_pictures() {

	if ( ! defined( 'WEFOSTER_PLUS_PLUGIN_DIR' ) ) {

		$url = get_stylesheet_directory_uri() . '/assets/img/backgrounds/';

		$bg_pictures = array(
			'none'                        => 'No Background',
			WEFOSTER_BODY_BACKGROUND      => 'Default',
			$url . 'bridge-skyler-smith.jpeg'     => 'The Bridge',
			$url . 'into-the-wild.jpeg' => 'Into the Wild',
			$url . 'cape-town-dusk.jpeg'  => 'Cape Town Dusk',
			$url . 'outlook.jpeg'         => 'Outlook',
			$url . 'back-to-school-jeff-sheldon.jpeg' => 'Back to School',
			$url . 'notebook-luis-llerena.jpeg' => 'Notebook',
			$url . 'snow-mountains-ales-krivec.jpeg' => 'Snow Mountains',
		);

		return $bg_pictures;

	} else {
		// Load the fonts from WeFoster Plus
		return wefoster_plus_backgrounds();
	}

}


/**
 * Do not KSES footer output. This is taken care of in the footer template.
 *
 * @since 1.0.0
 */
function do_not_filter_anything( $value ) {
	return $value;
}

function wf_plus_navigation_css_selectors() {
	return '.wefoster-framework .navbar-nav li a,.wefoster-framework .item-list-tabs li a,.wefoster-framework .item-title a,.wefoster-framework .post-meta,.widget h4,.post-entry-bottom,#subnav,.dropdown-menu,.item-options,#item-header-content,#item-actions h3,.btn,.button,input[type=submit],#whats-new-post-in-box,.pag-count,.activity-greeting,.bottom-links,.generic-button,.meta,.activity-header,.acomment-meta,.acomment-options,label,#message-recipients,.message-metadata,.thread-info a,.thread-options a,.thread-star a,.thread-from, thead tr th,.media-heading,.load-more,.show-all,#user-sidebar-menu,#activity-filter-notice,.navigation-font';
}
