<?php
/**
 * BuddyPress Pages
 *
 * The default template that is used to display our BuddyPress Pages
 *
 * @since 1.0
 *
 * @package WeFoster Framework
 */
?>

<?php get_template_part( 'header' ); ?>

<?php do_action( 'wf_before_bp_page' ); ?>

<div id="main-content" class="main <?php do_action( 'wf_class_main' ); ?>" role="main">

	<?php
	//This action is used to load the Page Header for BuddyPress
	do_action( 'wf_open_bp_page_content' );
	?>

	<?php do_action( 'wf_before_bp_page_header' ); ?>

	<?php do_action( 'wf_after_bp_page_header' ); ?>

	<?php get_template_part( 'buddypress/content', 'page' ); ?>

	<?php do_action( 'wf_close_bp_page_content' ); ?>

</div><!-- /.main -->

<?php do_action( 'wf_after_bp_page' ); ?>

<?php get_template_part( 'sidebar' ); ?>
<?php get_template_part( 'footer' ); ?>
