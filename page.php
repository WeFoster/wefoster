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

    <div class="main <?php do_action('class_main'); ?>" role="main">
        <?php
        //Use to Load to Page Title. see lib/actions.php
        do_action('before_page_content');
        ?>

        <?php get_template_part('templates/loops/content', 'page'); ?>

        <!-- My Custom Content -->
              <p>This is some custom content after my page content is shown. I'm adding this by overwriting my template via a Child Theme!</p>
        <!-- My Custom Content -->

        <?php do_action('close_page_content'); ?>
    </div><!-- /.main -->

   <?php do_action('after_page'); ?>

<?php get_template_part('sidebar'); ?>
<?php get_template_part('footer'); ?>
