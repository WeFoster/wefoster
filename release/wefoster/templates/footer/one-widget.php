<?php if ( is_active_sidebar( 'footer_widget_one' ) ) : ?>
  <!-- footer widgets -->
    <div class="col-sm-12 <?php do_action('footer_widget_class'); ?>" id="footer-widget-one">
      <?php
        dynamic_sidebar( 'footer_widget_one' );
      ?>
    </div>
<?php endif;?>
