<?php
// This template adds the BuddyPress Cover Photos into Member and Group headers.
// The size is based on the Default Post Thumb sizes OR the customizer settings.
// If no image is found a default fallback is used based on the constants you've set.

//
// Member Cover Photos
//
if ( bp_is_user() ) {
  //Grab the cover photo
  $cover_image_url = bp_attachments_get_attachment( 'url', array(
    'object_dir' => 'members',
    'item_id'    => bp_displayed_user_id(),
  ) );

  // is our profile? Show Change Button
  if ( bp_is_my_profile() ) {
    $action = '<div class="no-cover-photo site-description my-profile">' . sprintf( __( "<a href='%s'><i class='fa fa-camera-retro'></i>  Change Cover Photo</a>", 'wefoster' ), bp_loggedin_user_domain() . $bp->profile->slug . 'profile/change-cover-image/' ) . '</div>';
  }

  //No photo set? Show default + message
  if ( empty($cover_image_url)) {
    $cover_image_url = WEFOSTER_DEFAULT_MEMBER_COVER_PHOTO;
    if ( bp_is_my_profile() ) {
      $action = '<div class="no-cover-photo site-description">' . sprintf( __( "<a href='%s'><i class='fa fa-camera-retro'></i>  Upload Your Cover Photo</a>", 'wefoster' ), bp_loggedin_user_domain() . $bp->profile->slug . 'profile/change-cover-image/' ) . '</div>';
    }
}

//
//Group Cover Photos
//
} else {
  $cover_image_url = bp_attachments_get_attachment( 'url', array(
    'object_dir' => 'groups',
    'item_id'    => bp_get_current_group_id(),
    ) );

    // is the current user a Group Admin? Allow the user to change.
    if ( groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id()  ) ) {

      $action = '<div class="no-cover-photo site-description my-profile">' . sprintf( __( "<a href='%s'><i class='fa fa-camera-retro'></i>  Change Cover Photo</a>", 'wefoster' ), bp_get_group_permalink(buddypress()->groups->current_group ) . 'admin/group-cover-image/' ) . '</div>';

    }

    //No photo set? Show default image + change upload message
    if ( empty($cover_image_url)) {
      $cover_image_url = WEFOSTER_DEFAULT_GROUP_COVER_PHOTO;
      if ( groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id()  ) ) {

      $action = '<div class="no-cover-photo site-description">' . sprintf( __( "<a href='%s'><i class='fa fa-camera-retro'></i>  Upload a Group Cover Photo</a>", 'wefoster' ), bp_get_group_permalink(buddypress()->groups->current_group ) . 'admin/group-cover-image/' ) . '</div>';

    }
  }
}

//Check for the default image sizes.
$option = get_theme_mod( 'wf_plus_featured_image_default_sizes' );

if ( $option == 'custom' ) {
  $settings['width']  = get_theme_mod ('wf_plus_featured_image_width');
  $settings['height'] = get_theme_mod ('wf_plus_featured_image_height');
} else {
  $settings['width']  = WEFOSTER_DEFAULT_BP_COVER_WIDTH;
  $settings['height'] = WEFOSTER_DEFAULT_BP_COVER_HEIGHT;
};

$src = wpthumb( $cover_image_url, 'width=' . $settings['width'] .'&height=' . $settings['height'] . '&crop=true');

?>

<div class="negative-row no-padding postthumb <?php do_action('postthumb_class'); ?>"
    style="height:<?php echo $settings['height'] ?>px; background-image: url(<?php echo $src; ?> );"
  >
    <?php echo $action;?>
    <?php do_action('open_post_thumbnail'); ?>

</div>
