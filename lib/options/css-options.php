<?php
/**
 * Add the CSS that is needed for our image manipulation.
 *
 * @since 1.0.0
 *
 */
function wf_plus_css_output() {
?><style type="text/css"><?php do_action('wefoster_inline_css'); ?></style><?php
}
add_action( 'wp_head', 'wf_plus_css_output',1 );

/**
 * Body CSS Output
 *
 * @since 1.0.0
 *
 */
function wf_plus_body_background_div() {
	//Retrieve our option and set default if empty.
	$bg_image_type = get_theme_mod( 'wf_body_background_type', 'picture' );

	//Is the image a preset picture?
	if ( $bg_image_type == 'picture' ) {

		//Is a default picture set? Set it as default
		if ( defined('WEFOSTER_BODY_BACKGROUND') ) {
			$bg_picture = get_theme_mod( 'wf_body_background_picture', WEFOSTER_BODY_BACKGROUND );
		}
		//Nothing? Set as none.
		else {
			$bg_picture = get_theme_mod( 'wf_body_background_picture', 'none' );
		}
		$image_cropped = '<img src="' . wpthumb( $bg_picture, 'width=1600&crop=0') . '">' ;

	}
	//Or a custom upload?
	elseif ( $bg_image_type == 'upload' ) {

			$bg_picture = get_theme_mod( 'wf_body_background_image', 'none' );
			$image_cropped = '<img src="' . wpthumb( $bg_picture, 'width=1600&crop=0') . '">' ;

	}
	//Or a custom upload?
	elseif ( $bg_image_type == 'upload' ) {

			$bg_picture = get_theme_mod( 'wf_body_background_image', 'none' );
			$image_cropped = '<img src="' . wpthumb( $bg_picture, 'width=1600&crop=0') . '">' ;

	}
	//Do not output an image when it's set to none.
	$bg_picture = get_theme_mod( 'wf_body_background_picture', 'none' );



	// Enable the image effects for pictures and uploads, but not for textures
	if ( $bg_image_type != 'none' ) {
		$color = get_theme_mod('wf_body_background_image_color');
	} else {
			$color = 'color';
	}
	?>
	<div class="wefoster-plus-background-overlay <?php echo $bg_image_type ?> <?php echo $color ?>">
		<?php if ( $bg_image_type != 'none' || $bg_image_type != ''  ) : ?>
			<?php echo $image_cropped; ?>
		<?php endif; ?>
	</div>
  <?php
}
add_action( 'open_body', 'wf_plus_body_background_div' );

/**
 * Output Background Texture
 *
 * @since 1.0.0
 *
 */
function wf_plus_body_background_texture() {
	//Background Texture
	$image_cropped = wpthumb( get_theme_mod('wf_body_background_texture') );
	$bg_texture = 'url("' . $image_cropped . '")';
	$bg_texture_opacity = get_theme_mod('wf_body_background_texture_opacity');
?>
<?php if ( get_theme_mod('wf_body_background_texture') != 'default' ) : ?>
.wefoster-plus-background-overlay:before {
	background: <?php echo $bg_texture; ?>;
	<?php if ( $bg_texture_opacity != 1 ) : ?>
		opacity: <?php echo $bg_texture_opacity ?>;
	<?php endif; ?>
}
<?php endif; ?>
<?php
}
add_action( 'wefoster_inline_css', 'wf_plus_body_background_texture' );

/**
 * Output Body ackground Effects
 *
 * @since 1.0.0
 *
 */
function wf_plus_body_background_effects() {
	//Body background
	$bg_image_type = get_theme_mod( 'wf_body_background_type', 'upload' );
	$bg_blur = get_theme_mod( 'wf_body_background_image_blur', 'inherit' );
	$bg_opacity = get_theme_mod( 'wf_body_background_image_opacity', '1' );

	if ( $bg_image_type != 'none' || $bg_image_type != ''  ) {
?>

	.wefoster-plus-background-overlay img {
		<?php if ( $bg_blur != 0 ) : ?>
					-webkit-filter: blur(<?php echo $bg_blur ?>px);
					-moz-filter: blur(<?php echo $bg_blur ?>px);
					-ms-filter: blur(<?php echo $bg_blur ?>px);
					-o-filter: blur(<?php echo $bg_blur ?>px);
					/* FF doesn't support blur filter, but SVG */
					filter: url("data:image/svg+xml;utf8,<svg height='0' xmlns='http://www.w3.org/2000/svg'><filter id='svgBlur' x='-5%' y='-5%' width='110%' height='110%'><feGaussianBlur in='SourceGraphic' stdDeviation='10'/></filter></svg>#svgBlur");
					filter: progid: DXImageTransform.Microsoft.Blur(PixelRadius = '10');
					filter: blur(<?php echo $bg_blur ?>px);
		<?php endif; ?>

		<?php if ( $bg_opacity != 1 ) : ?>
			opacity: <?php echo $bg_opacity ?>;
		<?php endif; ?>
			}
  <?php
}
}
add_action( 'wefoster_inline_css', 'wf_plus_body_background_effects' );


/**
 * Output Header CSS
 *
 * @since 1.0.0
 *
 */
function wf_plus_header_background_effects() {
	$header_image_type = get_theme_mod( 'wf_header_background_type', 'picture' );

	//Is the header background image a preset PICTURE?
	if ( $header_image_type == 'picture' ) {

		//Is a default picture set? Set it as default
		if ( defined('WEFOSTER_HEADER_BACKGROUND') ) {
			$header_image_url = get_theme_mod( 'wf_header_background_picture', WEFOSTER_HEADER_BACKGROUND );
		}
		//Nothing? Set as none.
		else {
			$header_image_url = get_theme_mod( 'wf_header_background_picture', 'none' );
		}
		$header_image_cropped = 'url("' . wpthumb( $header_image_url, 'width=1600&crop=0') . '")';

	}
	//Or is it a preset TEXTURE?
	elseif ($header_image_type == 'texture' ) {
		$header_image_cropped = 'url("' . get_theme_mod( 'wf_header_background_texture' ) . '")';
	}
	//Nope? Then it must be a custom UPLOAD.
	else {
			$header_image_url = get_theme_mod( 'wf_header_background_image');
			$header_image_cropped = 'url("' . wpthumb( $header_image_url, 'width=1600&crop=0') . '")';
	}
	$header_image_background_position = get_theme_mod( 'header_image_background_position');
	$header_blur = get_theme_mod( 'wf_header_background_image_blur', 'inherit' );
	$header_opacity = get_theme_mod( 'wf_header_background_image_opacity', '1' );
?>

.wefoster-plus-header-overlay {
				<?php if ( $header_opacity != 1 ) : ?>
				opacity: <?php echo $header_opacity ?>;
				<?php endif; ?>
				background-image: <?php echo $header_image_cropped ?>;
			}
			.wefoster-framework .wefoster-plus-header-overlay.upload,
			.wefoster-framework .wefoster-plus-header-overlay.picture {
			background-position-y: <?php echo $header_image_background_position ?>%;
}

<?php
}
add_action( 'wefoster_inline_css', 'wf_plus_header_background_effects' );

/**
 * Add an extra div for our header image or texture
 *
 * @since 1.0.0
 *
 */
function wf_plus_header_div() {
	$header_image_type = get_theme_mod( 'wf_header_background_type', 'upload' );
	$color = get_theme_mod( 'wf_header_background_image_color', 'default' );
?>
	<div class="wefoster-plus-header-overlay <?php echo $header_image_type ?> <?php echo $color ?>"></div>
  <?php
}
add_action( 'open_full_header', 'wf_plus_header_div', 1 );


/**
 * Output the CSS for our Custom Logo.
 *
 * @since 1.0.0
 *
 */
function wf_plus_logo_css() {
		$logo_position = get_theme_mod( 'wf_plus_custom_logo_position', 'default' );
		$logo_height = get_theme_mod( 'wf_plus_custom_logo_height', 'default' );
?>

	<?php if ( get_theme_mod('wf_plus_logo_type') == 'custom-logo') : ?>
			.wefoster-framework .navbar .navbar-brand img,
			.wefoster-framework .site-description img {
				<?php if (	$logo_position != 'default' ) : ?>
				top: <?php echo $logo_position ?>px;
				<?php endif; ?>
				<?php if (	$logo_height != 'default' )  : ?>
						height: <?php echo $logo_height ?>px;
				<?php endif; ?>
	}
	<?php endif; ?>

  <?php
}
add_action( 'wefoster_inline_css', 'wf_plus_logo_css' );
