<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_template_part('header'); ?>

    <div class="main <?php do_action('class_main'); ?> col-sm-12" role="main">

        <?php do_action('before_page_header'); ?>
        <?php get_template_part('templates/parts/page', 'header'); ?>
        <?php do_action('after_page_header'); ?>
        <?php get_template_part('templates/loops/content', 'page'); ?>
        <?php do_action('after_page_content'); ?>

    </div><!-- /.main -->

<?php get_template_part('footer'); ?>
