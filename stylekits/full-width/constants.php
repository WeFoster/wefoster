<?php
//Retrieve our option and set default if empty.
$layout = get_theme_mod( 'stylekit_layout', 'minimal-header');


if ( $layout == 'full-width' ) {

  if ( !defined( 'WEFOSTER_LAYOUT_PRESET' ) ) {
  		// 'minimal' or 'full'
  		define('WEFOSTER_LAYOUT_PRESET', 'full');
  }

  if ( !defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
    define('WEFOSTER_LAYOUT_CLASS', 'container-fluid');
  }
  if ( !defined( 'WEFOSTER_MAIN_CLASS' ) ) {
    define('WEFOSTER_MAIN_CLASS', 'col-sm-9');
  }
  if ( !defined( 'WEFOSTER_SIDEBAR_CLASS' ) ) {
    define('WEFOSTER_SIDEBAR_CLASS', 'col-sm-3');
  }
  if ( !defined( 'WEFOSTER_SIDEBAR_POSITION' ) ) {
    define('WEFOSTER_SIDEBAR_POSITION', 'wefoster-sidebar-left');
  }


} elseif ( $layout == 'minimal-header' ) {

  if ( !defined( 'WEFOSTER_LAYOUT_PRESET' ) ) {
  		// 'minimal' or 'full'
  		define('WEFOSTER_LAYOUT_PRESET', 'minimal');
  }


  if ( !defined( 'WEFOSTER_LAYOUT_CLASS' ) ) {
    define('WEFOSTER_LAYOUT_CLASS', 'container');
  }
  if ( !defined( 'WEFOSTER_MAIN_CLASS' ) ) {
    define('WEFOSTER_MAIN_CLASS', 'col-sm-9');
  }
  if ( !defined( 'WEFOSTER_SIDEBAR_CLASS' ) ) {
    define('WEFOSTER_SIDEBAR_CLASS', 'col-sm-3');
  }
  if ( !defined( 'WEFOSTER_SIDEBAR_POSITION' ) ) {
    define('WEFOSTER_SIDEBAR_POSITION', 'wefoster-sidebar-right');
  }

  if ( !defined( 'WEFOSTER_HEADER_STICKY' ) ) {
  		// 'navbar-fixed-top' or 'navbar-static'
  		define('WEFOSTER_HEADER_STICKY', 'navbar-fixed-top');
  }

  if ( !defined( 'WEFOSTER_HEADER_HIDE' ) ) {
  		// 'navbar-no-headroom' or 'navbar-headroom'
  		define('WEFOSTER_HEADER_HIDE', 'navbar-headroom');
  }


}



////////////////
// Default Logos
///////////////
?>
