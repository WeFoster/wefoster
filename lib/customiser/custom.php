<?php
function wefoster_plus_background_textures() {

  if ( ! defined('WEFOSTER_PLUS_PLUGIN_DIR') ) {

	$cdn = 'http://cdn.wefoster.co/textures/';
	$bg_textures = array(
		 'none' => 'No Background',
			$cdn . 'black_lozenge_@2X.png'  => 'Black Lozenge',
			$cdn . 'brickwall_@2X.png'  => 'Brick Wall',
			$cdn . 'bright_squares_@2X.png'  => 'Bright Squares',
			$cdn . 'concrete_seamless.png'  => 'Concrete'
	);

  return $bg_textures;

  } else {
    //Load the fonts from WeFoster Plus
    return wefoster_plus_textures();
  }

}

function wefoster_plus_image_effects() {

  if ( ! defined('WEFOSTER_PLUS_PLUGIN_DIR') ) {

	$effects = array(
		'default'  => 'No Effect',
    'greyscale'  => 'Black & White',
	);

  return $effects;

  } else {
    //Load the fonts from WeFoster Plus
    return wefoster_plus_effects();
  }

}

function wefoster_plus_background_pictures() {

  if ( ! defined('WEFOSTER_PLUS_PLUGIN_DIR') ) {

	$cdn = 'http://cdn.wefoster.co/backgrounds/';

	$bg_pictures = array(
		'none' => 'No Background',
		 WEFOSTER_BODY_BACKGROUND  => 'Default',
		 $cdn . 'autumn-desk.jpeg' => 'Black Waves by Samual Zeller',
		 $cdn . 'appartment-grid.jpeg' => 'Apartment Grid by  Roman Kraft',
		 $cdn . 'cape-town-dusk.jpeg' =>  'Cape Town Dusk by Fred Viljoen',
		 $cdn . 'outlook.jpeg' =>  'Outlook by Joshua Earle'
	);

  return $bg_pictures;

  } else {
    //Load the fonts from WeFoster Plus
    return wefoster_plus_backgrounds();
  }

}
