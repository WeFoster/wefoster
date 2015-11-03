<?php
define( 'MOBILE_PATH', dirname( __FILE__ ) );

if ( ! class_exists( 'Mobile_Detect' ) ) {
	include MOBILE_PATH . '/Mobile_Detect.php';
}

$useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : "";
$mobile_detect = new mobile_Detect();
$mobile_detect->setDetectionType( 'extended' );

/***************************************************************
* Function is_iphone
* Detect the iPhone
***************************************************************/

function is_iphone() {
	global $mobile_detect;
	return $mobile_detect->isIphone();
}

/***************************************************************
* Function is_ipad
* Detect the iPad
***************************************************************/

function is_ipad() {
	global $mobile_detect;
	return $mobile_detect->isIpad();
}

/***************************************************************
* Function is_ipod
* Detect the iPod, most likely the iPod touch
***************************************************************/

function is_ipod() {
	global $mobile_detect;
	return $mobile_detect->is( 'iPod' );
}

/***************************************************************
* Function is_android
* Detect an android device.
***************************************************************/

function is_android() {
	global $mobile_detect;
	return $mobile_detect->isAndroidOS();
}

/***************************************************************
* Function is_blackberry
* Detect a blackberry device
***************************************************************/

function is_blackberry() {
	global $mobile_detect;
	return $mobile_detect->isBlackBerry();
}

/***************************************************************
* Function is_opera_mobile
* Detect both Opera Mini and hopefully Opera Mobile as well
***************************************************************/

function is_opera_mobile() {
	global $mobile_detect;
	return $mobile_detect->isOpera();
}

/***************************************************************
* Function is_palm - to be phased out as not using new detect library?
* Detect a webOS device such as Pre and Pixi
***************************************************************/

function is_palm() {
	_deprecated_function( 'is_palm', '1.2', 'is_webos' );
	global $mobile_detect;
	return $mobile_detect->is( 'webOS' );
}

/***************************************************************
* Function is_webos
* Detect a webOS device such as Pre and Pixi
***************************************************************/

function is_webos() {
	global $mobile_detect;
	return $mobile_detect->is( 'webOS' );
}

/***************************************************************
* Function is_symbian
* Detect a symbian device, most likely a nokia smartphone
***************************************************************/

function is_symbian() {
	global $mobile_detect;
	return $mobile_detect->is( 'Symbian' );
}

/***************************************************************
* Function is_windows_mobile
* Detect a windows smartphone
***************************************************************/

function is_windows_mobile() {
	global $mobile_detect;
	return $mobile_detect->is( 'WindowsMobileOS' ) || $mobile_detect->is( 'WindowsPhoneOS' );
}

/***************************************************************
* Function is_lg
* Detect an LG phone
***************************************************************/

function is_lg() {
	_deprecated_function( 'is_lg', '1.2' );
	global $useragent;
	return preg_match( '/LG/i', $useragent );
}

/***************************************************************
* Function is_motorola
* Detect a Motorola phone
***************************************************************/

function is_motorola() {
	global $mobile_detect;
	return $mobile_detect->is( 'Motorola' );
}

/***************************************************************
* Function is_nokia
* Detect a Nokia phone
***************************************************************/

function is_nokia() {
	_deprecated_function( 'is_nokia', '1.2' );
	global $useragent;
	return preg_match( '/Series60/i', $useragent ) || preg_match( '/Symbian/i', $useragent ) || preg_match( '/Nokia/i', $useragent );
}

/***************************************************************
* Function is_samsung
* Detect a Samsung phone
***************************************************************/

function is_samsung() {
	global $mobile_detect;
	return $mobile_detect->is( 'Samsung' );
}

/***************************************************************
* Function is_samsung_galaxy_tab
* Detect the Galaxy tab
***************************************************************/

function is_samsung_galaxy_tab() {
	_deprecated_function( 'is_samsung_galaxy_tab', '1.2', 'is_samsung_tablet' );
	return is_samsung_tablet();
}

/***************************************************************
* Function is_samsung_tablet
* Detect the Galaxy tab
***************************************************************/

function is_samsung_tablet() {
	global $mobile_detect;
	return $mobile_detect->is( 'SamsungTablet' );
}

/***************************************************************
* Function is_kindle
* Detect an Amazon kindle
***************************************************************/

function is_kindle() {
	global $mobile_detect;
	return $mobile_detect->is( 'Kindle' );
}

/***************************************************************
* Function is_sony_ericsson
* Detect a Sony Ericsson
***************************************************************/

function is_sony_ericsson() {
	global $mobile_detect;
	return $mobile_detect->is( 'Sony' );
}

/***************************************************************
* Function is_nintendo
* Detect a Nintendo DS or DSi
***************************************************************/

function is_nintendo() {
	global $useragent;
	return preg_match( '/Nintendo DSi/i', $useragent ) || preg_match( '/Nintendo DS/i', $useragent );
}


/***************************************************************
* Function is_smartphone
* Grade of phone A = Smartphone - currently testing this
***************************************************************/

function is_smartphone() {
	global $mobile_detect;
	$grade = $mobile_detect->mobileGrade();
	if ( $grade == 'A' || $grade == 'B' ) {
		return true;
	} else {
		return false;
	}
}

/***************************************************************
* Function is_handheld
* Wrapper function for detecting ANY handheld device
***************************************************************/

function is_handheld() {
	return is_mobile() || is_iphone() || is_ipad() || is_ipod() || is_android() || is_blackberry() || is_opera_mobile() || is_webos() || is_symbian() || is_windows_mobile() || is_motorola() || is_samsung() || is_samsung_tablet() || is_sony_ericsson() || is_nintendo();
}

/***************************************************************
* Function is_mobile
* For detecting ANY mobile phone device
***************************************************************/

function is_mobile() {
	global $mobile_detect;
	if ( is_tablet() ) return false;
	return $mobile_detect->isMobile();
}

/***************************************************************
* Function is_ios
* For detecting ANY iOS/Apple device
***************************************************************/

function is_ios() {
	global $mobile_detect;
	return $mobile_detect->isiOS();
}

/***************************************************************
* Function is_tablet
* For detecting tablet devices (needs work)
***************************************************************/

function is_tablet() {
	global $mobile_detect;
	return $mobile_detect->isTablet();
}

/***************************************************************
* Function mobile_defaults
* Setup default settings on theme activation
***************************************************************/

function mobile_defaults() {

	$tmp = get_option( 'mobile_body_class' );
	if ( ! $tmp ) { update_option( 'mobile_body_class', 1 ); }
}


/***************************************************************
* Function mobile_body_class
* Add MOBILE info to the body class if activated in settings
***************************************************************/

if ( ! is_admin() ) {
	add_filter( 'body_class', 'wf_mobile_body_class' );
}

function wf_mobile_body_class( $classes ) {

	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $mobile_detect;

	// top level
	if ( is_handheld() ) { $classes[] = "handheld"; };
	if ( is_mobile() ) { $classes[] = "mobile"; };
	if ( is_ios() ) { $classes[] = "ios"; };
	if ( is_tablet() ) { $classes[] = "tablet"; };

	// specific
	if ( is_iphone() ) { $classes[] = "iphone"; };
	if ( is_ipad() ) { $classes[] = "ipad"; };
	if ( is_ipod() ) { $classes[] = "ipod"; };
	if ( is_android() ) { $classes[] = "android"; };
	if ( is_blackberry() ) { $classes[] = "blackberry"; };
	if ( is_opera_mobile() ) { $classes[] = "opera-mobile";}
	if ( is_webos() ) { $classes[] = "webos";}
	if ( is_symbian() ) { $classes[] = "symbian";}
	if ( is_windows_mobile() ) { $classes[] = "windows-mobile"; }
	//if (is_lg()) { $classes[] = "lg"; }
	if ( is_motorola() ) { $classes[] = "motorola"; }
	//if (is_smartphone()) { $classes[] = "smartphone"; }
	//if (is_nokia()) { $classes[] = "nokia"; }
	if ( is_samsung() ) { $classes[] = "samsung"; }
	if ( is_samsung_tablet() ) { $classes[] = "samsung-tablet"; }
	if ( is_sony_ericsson() ) { $classes[] = "sony-ericsson"; }
	if ( is_nintendo() ) { $classes[] = "nintendo"; }

	// bonus
	if ( ! is_handheld() ) { $classes[] = "desktop"; }

	if ( $is_lynx ) { $classes[] = "lynx"; }
	if ( $is_gecko ) { $classes[] = "gecko"; }
	if ( $mobile_detect->is( 'Gecko' ) ) { $classes[] = "gecko"; }
	if ( $is_opera ) { $classes[] = "opera"; }
	if ( $mobile_detect->is( 'Opera' ) ) { $classes[] = "opera"; }
	if ( $is_NS4 ) { $classes[] = "ns4"; }
	if ( $is_safari ) { $classes[] = "safari"; }
	if ( $mobile_detect->is( 'Safari' ) ) { $classes[] = "safari"; }
	if ( $is_chrome ) { $classes[] = "chrome"; }
	if ( $mobile_detect->is( 'Chrome' ) ) { $classes[] = "chrome"; }
	if ( $is_IE ) { $classes[] = "ie"; }
	if ( $mobile_detect->is( 'IE' ) ) { $classes[] = "ie"; }

	return $classes;
}
