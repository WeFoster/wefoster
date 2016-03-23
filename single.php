<?php
/**
* This template displays single posts.
*
* @since 1.0
* @package WeFoster Framework
*/
?>
<?php get_template_part('header'); ?>

<div id="main-content" class="main <?php do_action('class_main'); ?>" role="main">

    <?php
      // Used for the Post Thumbnails see lib/layout.php
      do_action('before_single_content');
    ?>

    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/loops/content-single', get_post_type()); ?>
    <?php endwhile; ?>

    <?php do_action('after_single_content'); ?>

</div><!-- /.main -->

<?php get_template_part('sidebar'); ?>
<?php get_template_part('footer'); ?>
