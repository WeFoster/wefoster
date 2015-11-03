<?php
/**
 * The footer of our theme.
 *
 * This is the template that closes the <div class="main"> and end our markup for the theme
 *
 * @since 1.0
 *
 * @package WeFoster Framework
 */
 ?>

</div><!-- /.content -->
</div><!-- /.wrap -->

  <footer class="content-info <?php do_action('class_footer'); ?>" role="contentinfo">

    <div class="<?php do_action('class_container'); do_action('class_container_footer'); ?>">

      <?php do_action('open_footer'); ?>

      <div class="row">

        <?php get_template_part( 'templates/footer/' . wff_get_footer_type() ); ?>

        <div class="col-sm-12 bottom-links text-center">

          <?php if ( get_theme_mod('wf_plus_footer_text', 'default') == 'default'  ): ?>

            <?php printf( __( "Powered by WordPress. Theme developed by %s",'wefoster' ), '<a href="http://wefoster.co">WeFoster</a>' );?>

          <?php else: ?>

            <?php echo get_theme_mod( 'wf_plus_footer_text' ); ?>
            
          <?php endif; ?>

        </div>



        <?php do_action('close_footer'); ?>

      </div>

  </footer>

  <?php do_action('after_footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
