<?php
if ( $option == 'custom' ) {
  $settings['width']  = get_theme_mod ('wf_plus_bp_cover_photo_width') - 30;
  $settings['height'] = get_theme_mod ('wf_plus_bp_cover_photo_height') - 30;
} else {
  $settings['width']  = WEFOSTER_DEFAULT_BP_COVER_WIDTH - 30;
  $settings['height'] = WEFOSTER_DEFAULT_BP_COVER_HEIGHT - 30;
};
?>

<div class="<?php do_action('class_content_wrapper');?> bp-cover-photo-content">
  <div class="inner-cover-photo <?php do_action('class_main'); ?>">
    <div class="page-header buddypress-component-title">


  <h1>
    bowe  	  		<span class="user-nicename">@bowe</span>
      <span class="activity">active 1 minute ago</span>
  	  </h1>


</div>
    <div class="wf-member-action-button">
    <?php //do_action( 'bp_member_header_actions' ); ?>
    </div>
  </div>

  <div class="sidebar <?php do_action('class_sidebar'); ?>">
    <div id="item-header-avatar" style="height:<?php echo $settings['height'] ?>px;">
        <?php
        $userLink = bp_get_loggedin_user_link();
        if ( bp_is_my_profile() ): ?>
        <a href="<?php echo $userLink ?>profile/change-avatar/">
          <i class="fa fa-camera"></i>
      </a>
    <?php endif; ?>


    <?php bp_displayed_user_avatar( 'type=full' ); ?>




    </div><!-- #item-header-avatar -->
  </div>
</div>
