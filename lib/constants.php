<?php
/**
 * This file contains all the constants you can use in your Child Themes.
 * @since 1.0
 * @package WeFoster Framework
 */

// Take a look at our GitHub snippet library for some handy snippets: https://github.com/WeFoster/developer-library
// The Constants below are used to build our basic layout.
// They can be easily overwritten inside your Child Theme to rapidly buid custom layouts.
// If you are using WeFoster Plus and building your own Stylekits these Constants can also be applied inside your stylekits.
// You can also take a look at /lib/filters to see how we're using these contants inside our filters.
// Take a look at our documentation for a full guide and instruction videos.

// Note: To keep things easy we are working from top to bottom according to the HTML structure.

$layout = get_theme_mod( 'stylekit_layout_preset', 'boxed-full' );

// Fluid Full
if ( $layout == 'fluid-full' ) {
	if ( ! defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
		define( 'WEFOSTER_LAYOUT_CLASS', 'container-fluid' );
	}
}

// Boxed Inversed Full
if ( $layout == 'boxed-inversed-full' ) {

	if ( ! defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
		define( 'WEFOSTER_LAYOUT_CLASS', 'container' );
	}

	if ( ! defined( 'WEFOSTER_HEADER_STYLE' ) ) {
		define( 'WEFOSTER_HEADER_STYLE', 'navbar-inverse' );
	}

}

// Fluid Minimal
if ( $layout == 'fluid-minimal' ) {

	if ( ! defined( 'WEFOSTER_LAYOUT_FULL_PRIMARY_MENU_POSITION' ) ) {
		define( 'WEFOSTER_LAYOUT_FULL_PRIMARY_MENU_POSITION', 'outside' );
	}

	if ( ! defined( 'WEFOSTER_LAYOUT_PRESET' ) ) {
		define( 'WEFOSTER_LAYOUT_PRESET', 'minimal' );
	}

	if ( ! defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
		define( 'WEFOSTER_LAYOUT_CLASS', 'container-fluid' );
	}

	if ( ! defined( 'WEFOSTER_HEADER_STICKY' ) ) {
		define( 'WEFOSTER_HEADER_STICKY', 'navbar-static-top' );
	}

	if ( ! defined( 'WEFOSTER_HEADER_HIDE' ) ) {
		define( 'WEFOSTER_HEADER_HIDE', 'navbar-headroom' );
	}

}

// Boxed Minimal Inversed
if ( $layout == 'boxed-minimal-inversed' ) {

	if ( ! defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
		define( 'WEFOSTER_LAYOUT_CLASS', 'container' );
	}

	if ( ! defined( 'WEFOSTER_HEADER_STICKY' ) ) {
		define( 'WEFOSTER_HEADER_STICKY', 'navbar-static-top' );
	}

	if ( ! defined( 'WEFOSTER_HEADER_HIDE' ) ) {
		define( 'WEFOSTER_HEADER_HIDE', 'navbar-headroom' );
	}

	if ( ! defined( 'WEFOSTER_HEADER_STYLE' ) ) {
		define( 'WEFOSTER_HEADER_STYLE', 'navbar-inverse' );
	}

}

// Layout Class: Choose our main container class that is wrapped around our main elements.
if ( ! defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
	// 'container' or 'container-fluid'
	define( 'WEFOSTER_LAYOUT_CLASS', 'container' );
}

// Header Type: Choose between a boxed header or a regular (full width) one.
if ( ! defined( 'WEFOSTER_HEADER' ) ) {
	// 'boxed' or 'regular'
	define( 'WEFOSTER_HEADER', 'regular' );
}

// Header Style: Show a regular or inversed color header?
if ( ! defined( 'WEFOSTER_HEADER_STYLE' ) ) {
	// 'navbar-inverse' or 'navbar-regular'
	define( 'WEFOSTER_HEADER_STYLE', 'navbar-regular' );
}

if ( ! defined( 'WEFOSTER_HEADER_HEIGHT' ) ) {
	// The default height of the full header
	define( 'WEFOSTER_HEADER_HEIGHT', 110 );
}

// Our Content Wrapper Class.
if ( ! defined( 'WEFOSTER_CONTENT_WRAPPER_CLASS' ) ) {
	// Choose any Bootstrap column class
	define( 'WEFOSTER_CONTENT_WRAPPER_CLASS', 'container' );
}

// Main Size: The size of your main area.
if ( ! defined( 'WEFOSTER_MAIN_CLASS' ) ) {
	// Choose any Bootstrap column class
	define( 'WEFOSTER_MAIN_CLASS', 'col-sm-9' );
}

//Specify the default sidebar that should be loaded from templates/sidebar/
if ( ! defined( 'WEFOSTER_SIDEBAR' ) ) {
	define( 'WEFOSTER_SIDEBAR', 'default' );
}

// Sidebar Size: The grid class that controls your sidebar. In most cases you want to make this match up your MAIN CLASS size. But what do we know. Get creative!
if ( ! defined( 'WEFOSTER_SIDEBAR_CLASS' ) ) {
	// Choose any Bootstrap column class
	define( 'WEFOSTER_SIDEBAR_CLASS', 'col-sm-3' );
}

// Where do you want to show the sidebar?
if ( ! defined( 'WEFOSTER_SIDEBAR_POSITION' ) ) {
	// 'wefoster-sidebar-right' or 'wefoster-sidebar-left'
	define( 'WEFOSTER_SIDEBAR_POSITION', 'wefoster-sidebar-right' );
}

//The Default Position of our Navigation Menu
if ( ! defined( 'WEFOSTER_NAVBAR_POSITION_CLASS' ) ) {
	// 'navbar-left' or 'navbar-right' or 'navbar-center'
	define( 'WEFOSTER_NAVBAR_POSITION_CLASS', 'navbar-left' );
}

//Specify the default footer widgets that should be loaded from templates/footer/
if ( ! defined( 'WEFOSTER_FOOTER_WIDGETS' ) ) {
	define( 'WEFOSTER_FOOTER_WIDGETS', 'four-widgets' );
}

//Footer: Footer Class
if ( ! defined( 'WEFOSTER_FOOTER_CLASS' ) ) {
	// 'footer-regular' or 'footer-inverse'
	define( 'WEFOSTER_FOOTER_CLASS', 'footer-inverse' );
}

/////////////// 										  ///////////////
/////////////// LAYOUT PRESETS			  ///////////////
/////////////// 										  ///////////////

// Based on your project needs you can choose a layout starting point.
if ( ! defined( 'WEFOSTER_LAYOUT_PRESET' ) ) {
	// 'minimal' or 'full'
	define( 'WEFOSTER_LAYOUT_PRESET', 'full' );
}

/////////////// 											///////////////
/////////////// MAIN LAYOUT ONLY 			///////////////
/////////////// 											///////////////

// Where do you want to primary menu to show? This only applies to the Full Layout
if ( ! defined( 'WEFOSTER_LAYOUT_FULL_PRIMARY_MENU_POSITION' ) ) {
	// choose between 'above' or 'below' or 'inside'.
	define( 'WEFOSTER_LAYOUT_FULL_PRIMARY_MENU_POSITION', 'inside' );
}

if ( ! defined( 'WEFOSTER_LAYOUT_FULL_SECONDARY_MENU_POSITION' ) ) {
	// choose between 'above' or 'below' or 'inside'.
	define( 'WEFOSTER_LAYOUT_FULL_SECONDARY_MENU_POSITION', 'above' );
}

// Show site description and title? This only applies to the Full Layout.
if ( ! defined( 'WEFOSTER_SHOW_SITE_TITLE_DESCRIPTION' ) ) {
	define( 'WEFOSTER_SHOW_SITE_TITLE_DESCRIPTION', 'title-description' );
}


/////////////// 										 ///////////////
/////////////// MINIMAL LAYOUT ONLY  ///////////////
/////////////// 										 ///////////////


// Header Style: Stick to the top of the page at all times??
if ( ! defined( 'WEFOSTER_HEADER_STICKY' ) ) {
	// 'navbar-fixed-top' or 'navbar-static'
	define( 'WEFOSTER_HEADER_STICKY', 'navbar-static' );
}

// If it's sticky should we hide on scroll?
// Note: This is only applied when the header is set as being sticky.
if ( ! defined( 'WEFOSTER_HEADER_HIDE' ) ) {
	// 'navbar-no-headroom' or 'navbar-headroom'
	define( 'WEFOSTER_HEADER_HIDE', 'navbar-no-headroom' );
}

/////////////// 										 ///////////////
///////////////     DEFAULT ASSETS	 ///////////////
/////////////// 										 ///////////////

// Path: You can easily overwrite the default images by telling WeFoster to look for them in a different place.
// The most obvious example would be get_stylesheet_directory_uri or your plugin folder.
// Note: We would not recommend to overwrite CSS/JS files. Use wp_dequeue for that.

if ( ! defined( 'WEFOSTER_ASSETS_URL' ) ) {
	define( 'WEFOSTER_ASSETS_URL', get_template_directory_uri() );
}

//This is the default logo used in the header.
// Need just one logo sitewide? This is the way to go.
if ( ! defined( 'WEFOSTER_DEFAULT_LOGO' ) ) {
	define( 'WEFOSTER_DEFAULT_LOGO', WEFOSTER_ASSETS_URL . '/assets/img/logos/regular-full.png' );
}

if ( ! defined( 'WEFOSTER_DEFAULT_MOBILE_LOGO' ) ) {
	define( 'WEFOSTER_DEFAULT_MOBILE_LOGO', WEFOSTER_ASSETS_URL . '/assets/img/logos/minimal-regular-inverse.png' );
}

// Show a logo by default? Or use text+description? See lib/customiser/settings.php at wf_plus_logo_type
if ( ! defined( 'WEFOSTER_LOGO_TYPE' ) ) {
	// 'full' or 'minimal'
	define( 'WEFOSTER_LOGO_TYPE', 'full' );
}

// The regular full sized logo.
if ( ! defined( 'WEFOSTER_FULL_LOGO_REGULAR' ) ) {
	define( 'WEFOSTER_FULL_LOGO_REGULAR', WEFOSTER_ASSETS_URL . '/assets/img/logos/regular-full.png' );
}

// A full size logo for use in a inversed (dark) Navigation
if ( ! defined( 'WEFOSTER_FULL_LOGO_INVERSE' ) ) {
	define( 'WEFOSTER_FULL_LOGO_INVERSE', WEFOSTER_ASSETS_URL . '/assets/img/logos/inverse-full.png' );
}
// A minimal logo for use in a regular (light) Navigation
if ( ! defined( 'WEFOSTER_MINIMAL_LOGO_REGULAR' ) ) {
	define( 'WEFOSTER_MINIMAL_LOGO_REGULAR', WEFOSTER_ASSETS_URL . '/assets/img/logos/minimal-regular-inverse.png' );
}
// A minimal size logo for use in a inverse (dark) Navigation
if ( ! defined( 'WEFOSTER_MINIMAL_LOGO_INVERSE' ) ) {
	define( 'WEFOSTER_MINIMAL_LOGO_INVERSE', WEFOSTER_ASSETS_URL . '/assets/img/logos/minimal-regular-inverse.png' );
}

// Enable pretty select boxes?
if ( ! defined( 'WEFOSTER_SELECT_BOXES' ) ) {
	// 'wefoster-bootstrap-select' or 'wefoster-no-bootstrap-select'
	define( 'WEFOSTER_SELECT_BOXES', 'wefoster-bootstrap-select' );
}

// Enable Bootstrap Tooltips?
if ( ! defined( 'WEFOSTER_TOOLTIPS' ) ) {
	// 'wefoster-bootstrap-select' or 'wefoster-no-bootstrap-tooltips'
	define( 'WEFOSTER_TOOLTIPS', 'wefoster-bootstrap-tooltips' );
}

//Post Thumbnail Sizes
if ( ! defined( 'WEFOSTER_POST_THUMBNAIL_WIDTH' ) ) {
	define( 'WEFOSTER_POST_THUMBNAIL_WIDTH', 880 );
}

if ( ! defined( 'WEFOSTER_POST_THUMBNAIL_HEIGHT' ) ) {
	define( 'WEFOSTER_POST_THUMBNAIL_HEIGHT', 270 );
}

if ( ! defined( 'WEFOSTER_POST_THUMBNAIL_WIDTH_FULL' ) ) {
	define( 'WEFOSTER_POST_THUMBNAIL_WIDTH_FULL', 1170 );
}

if ( ! defined( 'WEFOSTER_POST_THUMBNAIL_HEIGHT_FULL' ) ) {
	define( 'WEFOSTER_POST_THUMBNAIL_HEIGHT_FULL', 320 );
}

/////////////// 											///////////////
///////////////     TYPOGRAPHY  			///////////////
/////////////// 											///////////////

if ( ! defined( 'WEFOSTER_FONT_SIZE' ) ) {
	// Set the Default Font size.
	define( 'WEFOSTER_FONT_SIZE', '16px' );
}

if ( ! defined( 'WEFOSTER_FONT_FAMILY' ) ) {
	// Choose a default Font that is present on Google Fonts.
	define( 'WEFOSTER_FONT_FAMILY', 'Lato' );
}
if ( ! defined( 'WEFOSTER_FONT_WEIGHT' ) ) {
	// Choose a default Font Weight
	define( 'WEFOSTER_FONT_WEIGHT', '400' );
}

if ( ! defined( 'WEFOSTER_HEADINGS_FONT_FAMILY' ) ) {
	// Choose a default Font that is present on Google Fonts.
	define( 'WEFOSTER_HEADINGS_FONT_FAMILY', 'Montserrat' );
}

if ( ! defined( 'WEFOSTER_HEADINGS_FONT_WEIGHT' ) ) {
	// Choose a default Font Weight
	define( 'WEFOSTER_HEADINGS_FONT_WEIGHT', '400' );
}

if ( ! defined( 'WEFOSTER_NAVIGATION_FONT_FAMILY' ) ) {
	// Choose a default Font that is present on Google Fonts.
	define( 'WEFOSTER_NAVIGATION_FONT_FAMILY', 'Montserrat' );
}

if ( ! defined( 'WEFOSTER_NAVIGATION_FONT_WEIGHT' ) ) {
	// Choose a default Font Weight
	define( 'WEFOSTER_NAVIGATION_FONT_WEIGHT', '400' );
}

//Enable Font Awesome?
if ( ! defined( 'WEFOSTER_FONTS' ) ) {
	define( 'WEFOSTER_ICON_FONT', 'font-awesome' );
}


// Choose a default image for your backgrounds.
// If the image is found it will be resized, saved and cached locally. Note: Ideal width is between 1300/1600px;
// Keep the value empty to use the default

if ( ! defined( 'WEFOSTER_BODY_BACKGROUND' ) ) {
	//Local
	//define('WEFOSTER_BODY_BACKGROUND', WEFOSTER_ASSETS_URL . '/assets/img/bg.jpg' );
	//External
	define( 'WEFOSTER_BODY_BACKGROUND', '' );
}

if ( ! defined( 'WEFOSTER_HEADER_BACKGROUND' ) ) {
	//Local
	define( 'WEFOSTER_HEADER_BACKGROUND', WEFOSTER_ASSETS_URL . '/assets/img/bg.jpg' );
	//External: You can put in the link to a remotely hosted image as well.
}

if ( ! defined( 'WEFOSTER_HERO_BACKGROUND' ) ) {
	define( 'WEFOSTER_HERO_BACKGROUND', WEFOSTER_ASSETS_URL . '/assets/img/hero-background.jpg' );
}

// Don't want your clients to mess up your expertly designed layout?
// You can disable the Customizer settings completely by setting the constant below to false.
if ( ! defined( 'WEFOSTER_CUSTOMIZER_SETTINGS' ) ) {
	define( 'WEFOSTER_CUSTOMIZER_SETTINGS', 'true' );
}

// Have you made an awesome design using the customizer but want prevent your client from changing them?
// Then set the constant below to false.
if ( ! defined( 'WEFOSTER_CUSTOMIZER_VALUES' ) ) {
	define( 'WEFOSTER_CUSTOMIZER_VALUES', 'true' );
}


/////////////// 											///////////////
///////////////     BUDDYPRESS 				///////////////
/////////////// 											///////////////

//By default BuddyPress CSS is only loaded on the main site in a Multisite installation.
// If you want you can enable the stylesheet to be loaded on every page
if ( ! defined( 'WEFOSTER_MS_LOAD_BUDDYPRESS_STYLES' ) ) {
	// options are 'on' or 'off'
	define( 'WEFOSTER_LOAD_BUDDYPRESS_STYLES', 'off' );
}

//The Default Position of our BP Navigation Menu
if ( ! defined( 'WEFOSTER_BP_NAVBAR_POSITION_CLASS' ) ) {
	// 'navbar-left' or 'navbar-right' or 'navbar-center'
	define( 'WEFOSTER_BP_NAVBAR_POSITION_CLASS', 'navbar-right' );
}

//The Default Position of the Sidebar on the Actity Page
if ( ! defined( 'WEFOSTER_ACTIVITY_SIDEBAR_POSITION' ) ) {
	// 'navbar-left' or 'navbar-right' or 'navbar-center'
	define( 'WEFOSTER_ACTIVITY_SIDEBAR_POSITION', WEFOSTER_SIDEBAR_POSITION );
}

//The Default Position of the Sidebar on the Groups Page
if ( ! defined( 'WEFOSTER_GROUP_SIDEBAR_POSITION' ) ) {
	// 'navbar-left' or 'navbar-right' or 'navbar-center'
	define( 'WEFOSTER_GROUP_SIDEBAR_POSITION', WEFOSTER_SIDEBAR_POSITION );
}


//The Default Position of the Sidebar on the Members Page
if ( ! defined( 'WEFOSTER_MEMBER_SIDEBAR_POSITION' ) ) {
	// 'navbar-left' or 'navbar-right' or 'navbar-center'
	define( 'WEFOSTER_MEMBER_SIDEBAR_POSITION', WEFOSTER_SIDEBAR_POSITION );
}


// Change Default Avatar Size
if ( ! defined( 'BP_AVATAR_THUMB_WIDTH' ) ) {
	define( 'BP_AVATAR_THUMB_WIDTH', 120 );
}

if ( ! defined( 'BP_AVATAR_THUMB_HEIGHT' ) ) {
	define( 'BP_AVATAR_THUMB_HEIGHT', 120 );
}

if ( ! defined( 'BP_AVATAR_FULL_WIDTH' ) ) {
	define( 'BP_AVATAR_FULL_WIDTH', 400 );
}

if ( ! defined( 'BP_AVATAR_FULL_HEIGHT' ) ) {
	define( 'BP_AVATAR_FULL_HEIGHT', 400 );
}

if ( ! defined( 'BP_AVATAR_ORIGINAL_MAX_WIDTH' ) ) {
	define( 'BP_AVATAR_ORIGINAL_MAX_WIDTH', 800 );
}

if ( ! defined( 'BP_AVATAR_ORIGINAL_MAX_FILESIZE' ) ) {
	define( 'BP_AVATAR_ORIGINAL_MAX_FILESIZE', 5120000 );
}

if ( ! defined( 'WEFOSTER_DEFAULT_GROUP_AVATAR' ) ) {
	define( 'WEFOSTER_DEFAULT_GROUP_AVATAR', WEFOSTER_ASSETS_URL . '/assets/img/avatar-group.jpg' );
}


/////////////// 											///////////////
///////////////     COVER PHOTOS 			///////////////
/////////////// 											///////////////

// By default these will be based on your Post Thumbnails settings.
if ( ! defined( 'WEFOSTER_DEFAULT_BP_COVER_WIDTH' ) ) {
	define( 'WEFOSTER_DEFAULT_BP_COVER_WIDTH', 1600 );
}

if ( ! defined( 'WEFOSTER_DEFAULT_BP_COVER_HEIGHT' ) ) {
	define( 'WEFOSTER_DEFAULT_BP_COVER_HEIGHT', 380 );
}


//Set our Default Cover Photo if none is set
if ( ! defined( 'WEFOSTER_DEFAULT_GROUP_COVER_PHOTO' ) ) {
	define( 'WEFOSTER_DEFAULT_GROUP_COVER_PHOTO', WEFOSTER_ASSETS_URL . '/assets/img/default-cover-photo.png' );
}

//Change this value if you'd like different default cover photos for Members & Groups.
if ( ! defined( 'WEFOSTER_DEFAULT_MEMBER_COVER_PHOTO' ) ) {
	define( 'WEFOSTER_DEFAULT_MEMBER_COVER_PHOTO', WEFOSTER_DEFAULT_GROUP_COVER_PHOTO );
}

//Choose the Cover Photo layout you'd like to use.
if ( ! defined( 'WEFOSTER_BUDDYPRESS_COVER_PHOTO_LAYOUT' ) ) {
	//Options: 'full' and 'off'
	define( 'WEFOSTER_BUDDYPRESS_COVER_PHOTO_LAYOUT', 'full' );
}

/////////////// 											///////////////
///////////////     DEVELOPERS 				///////////////
/////////////// 											///////////////

// By default the WeFoster Theme sets up widgets and menus.
// You can disable this by setting the contant below to false.
// This is handy if you want to set up your own custom default menu and widgets.
// More Documentation coming soon!

if ( ! defined( 'WEFOSTER_DEVELOPER' ) ) {
	define( 'WEFOSTER_DEVELOPER', 'off' );
}

if ( ! defined( 'WEFOSTER_AUTO_SETUP' ) ) {
	define( 'WEFOSTER_AUTO_SETUP', 'true' );
}

// By default we are conditionally loading template parts and assets based on whether we are on
// a mobile device. You can choose to disable this debugging or if you run into problems with mobile detection.
if ( ! defined( 'WEFOSTER_MOBILE_OPTIMISATION' ) ) {
	//Options: 'on' or 'off'
	define( 'WEFOSTER_MOBILE_OPTIMISATION', 'off' );
}

//If you are using WordPress Multisite and would like to load the BP stylesheet on every blog
// turn this constant "on".
if ( ! defined( 'WEFOSTER_MS_LOAD_BUDDYPRESS_STYLES' ) ) {
	//Options: 'on' or 'off'
	define( 'WEFOSTER_MS_LOAD_BUDDYPRESS_STYLES', 'off' );
}
