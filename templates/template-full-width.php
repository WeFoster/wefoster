<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_template_part( 'header' ); ?>

<div id="main-content" class="main <?php do_action( 'wf_class_main' ); ?> col-sm-12" role="main">

	<?php
	//Use to Load to Page Title. see lib/actions.php
	do_action( 'wf_open_page_content' );
	do_action( 'wf_before_page_content' );
	?>

	<?php get_template_part( 'templates/loops/content', 'page' ); ?>

	<?php do_action( 'wf_close_page_content' ); ?>

</div><!-- /.main -->

<?php get_template_part( 'footer' ); ?>
