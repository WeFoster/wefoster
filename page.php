<?php
/**
 * This is the template that is used to display single Pages
 *
 * @since 1.0
 * @package WeFoster Framework
 */
?>

<?php get_template_part( 'header' ); ?>

<?php do_action( 'wf_before_page' ); ?>

<div id="main-content" class="main <?php do_action( 'wf_class_main' ); ?>" role="main">
	<?php
	//Use to Load to Page Title. see lib/actions.php
	do_action( 'wf_before_page_content' );
	?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'templates/loops/content', 'page' ); ?>

	<?php endwhile; ?>

	<?php do_action( 'wf_close_page_content' ); ?>

</div><!-- /.main -->

<?php do_action( 'wf_after_page' ); ?>

<?php get_template_part( 'sidebar' ); ?>
<?php get_template_part( 'footer' ); ?>
