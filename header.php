<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="main-content" class="main">
 *
 * @since 1.0
 *
 * @package WeFoster Framework
 */
?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<?php do_action( 'wf_open_head' ); ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php do_action( 'wf_wff_head' ); ?>
	<?php wp_head(); ?>
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo( 'name' ); ?> Feed" href="<?php echo esc_url( get_feed_link() ); ?>">
	<?php do_action( 'wf_close_head' ); ?>
</head>

<body <?php body_class(); ?>>
<a href="#site-content" class="sr-only sr-only-focusable"><?php _e( 'Skip to main content', 'wefoster' ); ?></a>
<?php do_action( 'wf_open_body' ); ?>
<!--[if lt IE 8]>
<div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>
	to improve your experience.', 'wefoster'); ?>
</div><![endif]-->

<div class="layout-wrapper">

	<?php
	// Content inside the header (navigation and extra content based on header type)
	get_template_part( 'templates/header/content' );
	?>

	<?php do_action( 'wf_before_container' ); ?>

	<div class="content-wrapper <?php do_action( 'wf_class_content_wrapper' ); ?>">

		<?php do_action( 'wf_before_content' ); ?>

		<div id="site-content" class="content row row-offcanvas row-offcanvas-left <?php do_action( 'wf_class_content' ); ?>">
