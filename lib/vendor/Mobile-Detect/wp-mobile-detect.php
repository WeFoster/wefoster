<?php
/*
Plugin Name: WP Mobile Detect
Version: 2.0
Plugin URI: http://jes.se.com/wp-mobile-detect
Description: A WordPress plugin based on the PHP Mobile Detect class (Original author Victor Stanciu now maintained by Serban Ghita) incorporates functions and shortcodes to empower User Admins to have better control of when content is served on mobile
Author: Jesse Friedman
Author URI: http://jes.se.com
License: GPL v3

WP Mobile Detect
Copyright (C) 2012, Jesse Friedman - http://jes.se.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



/********************************************//**
* PHP Mobile Detect class used to detect browser or device type
***********************************************/
require_once('mobile-detect.php');

$detect = new Mobile_Detect();

/********************************************//**
* Returns true when on desktops or tablets
***********************************************/
function wff_is_notphone() {
	global $detect;
	if( ! $detect->isMobile() || $detect->isTablet() ) return true;
}


/********************************************//**
* Returns true when on desktops or phones
***********************************************/
function wff_is_nottab() {
	global $detect;
	if( ! $detect->isTablet() ) return true;
}


/********************************************//**
* Returns true when on desktops only
***********************************************/
function wff_is_notdevice() {
	global $detect;
	if( ! $detect->isMobile() && ! $detect->isTablet() ) return true;
}

/********************************************//**
* Returns true when on phones ONLY
***********************************************/
function wff_is_phone() {
	global $detect;
	if( $detect->isMobile() && ! $detect->isTablet() ) return true;
}

/********************************************//**
* Returns true when on Tablets ONLY
***********************************************/
function wff_is_tablet() {
	global $detect;
	if( $detect->isTablet() ) return true;
}

/********************************************//**
* Returns true when on phones or tablets but NOT destkop
***********************************************/
function wff_is_device() {
	global $detect;
	if( $detect->isMobile() || $detect->isTablet() ) return true;
}


/********************************************//**
* Returns true when on iOS
***********************************************/
function wff_is_ios() {
	global $detect;
	if( $detect->isiOS() ) return true;
}


/********************************************//**
* Returns true when on iPhone
***********************************************/
function wff_is_iphone() {
	global $detect;
	if( $detect->isiPhone() ) return true;
}
/********************************************//**
* Returns true when on iPad
***********************************************/
function wff_is_ipad() {
	global $detect;
	if( $detect->isiPad() ) return true;
}

/********************************************//**
* Returns true when on Android OS
***********************************************/
function wff_is_android() {
	global $detect;
	if( $detect->isAndroidOS() ) return true;
}

/********************************************//**
* Returns true when on a Blackberry device
***********************************************/
function wff_is_blackberry() {
	global $detect;
	if( $detect->isBlackBerry() ) return true;
}

/********************************************//**
* Returns true when on Windows OS
***********************************************/
function wff_is_windows_mobile() {
	global $detect;
	if( $detect->isWindowsMobileOS() ) return true;
}


/********************************************//**
* Returns true when in a Chrome browser
***********************************************/
function wff_is_chrome_browser() {
	global $detect;
	if( $detect->isChrome() ) return true;
}


/********************************************//**
* Returns true when in a Opera browser
***********************************************/
function wff_is_opera_browser() {
	global $detect;
	if( $detect->isOpera() ) return true;
}


/********************************************//**
* Returns true when in a IE browser
***********************************************/
function wff_is_ie_browser() {
	global $detect;
	if( $detect->isIE() ) return true;
}



/********************************************//**
* Returns true when in a Firefox browser
***********************************************/
function wff_is_firefox_browser() {
	global $detect;
	if( $detect->isFirefox() ) return true;
}


/********************************************//**
* Returns true when in a Safari browser
***********************************************/
function wff_is_safari_browser() {
	global $detect;
	if( $detect->isSafari() ) return true;
}
