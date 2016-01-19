<div class="<?php do_action('class_container');?> site-description-wrap">



    <div class="site-description-wrap wf-grid wf-grid--align-center">

        <div class="site-description">
          <?php do_action('inside_site_description'); ?>
          <?php echo get_bloginfo('name'); ?>
          <span><?php echo get_bloginfo('description'); ?></span>
        </div>

        <div class="inside-menu">
            <?php do_action('after_site_description'); ?>
        </div>

    </div>

</div>
