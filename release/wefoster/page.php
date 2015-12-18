<?php
/**
* This is the template that is used to display single Pages
*
* @since 1.0
* @package WeFoster Framework
*/
?>

<?php get_template_part('header'); ?>

   <?php do_action('before_page'); ?>

    <div id="main-content" class="main <?php do_action('class_main'); ?>" role="main">
      <?php do_action('open_page_content'); ?>

        <?php do_action('before_page_header'); ?>

        <?php get_template_part('templates/parts/page', 'header'); ?>

        <?php do_action('after_page_header'); ?>

        <?php get_template_part('templates/loops/content', 'page'); ?>

        <?php do_action('close_page_content'); ?>
    </div><!-- /.main -->

   <?php do_action('after_page'); ?>

<?php get_template_part('sidebar'); ?>
<?php get_template_part('footer'); ?>
