<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @since 1.0
 *
 * @package WeFoster Framework
 */
?>

<?php get_template_part( 'header' ); ?>

<div id="main-content" class="main <?php do_action( 'class_main' ); ?>" role="main">

	<div class="page-header">
		<h1><?php _e( 'This is pretty lame, we found nothing here!', 'wefoster' ); ?></h1>
	</div>

	<p>
		<?php _e( 'It looks like this was the result of either:', 'wefoster' ); ?>
	</p>

	<ul>
		<li><?php _e( 'a mistyped address', 'wefoster' ); ?></li>
		<li><?php _e( 'an out-of-date link', 'wefoster' ); ?></li>
	</ul>

	<?php do_action( 'before_404_alert' ); ?>

	<h2>
		<?php _e( 'How about you try using our search form?', 'wefoster' ); ?>
	</h2>

	<?php get_search_form(); ?>
	<?php do_action( 'after_404_alert' ); ?>

</div><!-- /.main -->

<?php get_template_part( 'sidebar' ); ?>
<?php get_template_part( 'footer' ); ?>
