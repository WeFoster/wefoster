<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_template_part('header'); ?>

    <div id="main-content" class="main <?php do_action('class_main'); ?> col-sm-12" role="main">

      <?php
      //Use to Load to Page Title. see lib/actions.php
      do_action('open_page_content');
      ?>

      <?php get_template_part('templates/loops/content', 'page'); ?>

      <?php do_action('close_page_content'); ?>

    </div><!-- /.main -->

<?php get_template_part('footer'); ?>
