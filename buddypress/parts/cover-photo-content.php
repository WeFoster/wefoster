<?php
if ( $option == 'custom' ) {
  $settings['width']  = get_theme_mod ('wf_plus_bp_cover_photo_width') - 40;
  $settings['height'] = get_theme_mod ('wf_plus_bp_cover_photo_height') - 40;
} else {
  $settings['width']  = WEFOSTER_DEFAULT_BP_COVER_WIDTH - 40;
  $settings['height'] = WEFOSTER_DEFAULT_BP_COVER_HEIGHT - 40;
};
?>

<div class="<?php do_action('class_content_wrapper');?> bp-cover-photo-content">

  <div class="inner-cover-photo <?php do_action('class_main'); ?>">
      <?php get_template_part('buddypress/page-header');?>
  </div>

  <div class="sidebar <?php do_action('class_sidebar'); ?>">
        <div style="height:<?php echo $settings['height'] ?>px;">
          <?php if ( bp_is_user() ) {
              get_template_part('buddypress/members/profile-photo');
            } else {
              get_template_part('buddypress/groups/group-photo');
            }
          ?>
        </div>
  </div>

</div>
