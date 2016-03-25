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
		$link = bp_loggedin_user_domain() . $bp->profile->slug . 'profile/change-cover-image/';
		$text = esc_html__( 'Change Your Cover Photo', 'wefoster' );

		$action = '<div class="cover-photo-action vertical-center site-description my-profile"><a data-toggle="tooltip" data-placement="right" title="' . $text . '" data-container="body" href=' . $link . '><i class="fa fa-camera-retro"></i></a></div>';
	}

	//No photo set? Show default + message
	if ( empty( $cover_image_url ) ) {
		$cover_image_url = WEFOSTER_DEFAULT_MEMBER_COVER_PHOTO;
		if ( bp_is_my_profile() ) {
			$link = bp_loggedin_user_domain() . $bp->profile->slug . 'profile/change-cover-image/';
			$text = esc_html__( 'Upload Your Cover Photo', 'wefoster' );

			$action = '<div class="cover-photo-action vertical-center site-description my-profile"><a data-toggle="tooltip" data-placement="right" title="' . $text . '" data-container="body" href=' . $link . '><i class="fa fa-camera-retro"></i></a></div>';
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
	if ( groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id() ) ) {
		$link = bp_get_group_permalink( buddypress()->groups->current_group ) . 'admin/group-cover-image/';
		$text = esc_html__( 'Change Group Cover Photo', 'wefoster' );

		$action = '<div class="cover-photo-action vertical-center site-description my-profile"><a data-toggle="tooltip" data-placement="right" title="' . $text . '" data-container="body" href=' . $link . '><i class="fa fa-camera-retro"></i></a></div>';
	}

	//No photo set? Show default image + change upload message
	if ( empty( $cover_image_url ) ) {
		$cover_image_url = WEFOSTER_DEFAULT_GROUP_COVER_PHOTO;
		if ( groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id() ) ) {

			$link = bp_get_group_permalink( buddypress()->groups->current_group ) . 'admin/group-cover-image/';
			$text = esc_html__( 'Upload Group Cover Photo', 'wefoster' );

			$action = '<div class="cover-photo-action vertical-center site-description my-profile"><a data-toggle="tooltip" data-placement="right" title="' . $text . '" data-container="body" href=' . $link . '><i class="fa fa-camera-retro"></i></a></div>';

		}
	}
}

//Check for the default image sizes.
$option = get_theme_mod( 'wf_plus_bp_cover_photo_default_sizes' );

if ( $option == 'custom' ) {
	$settings['width']  = get_theme_mod( 'wf_plus_bp_cover_photo_width' );
	$settings['height'] = get_theme_mod( 'wf_plus_bp_cover_photo_height' );
} else {
	$settings['width']  = WEFOSTER_DEFAULT_BP_COVER_WIDTH;
	$settings['height'] = WEFOSTER_DEFAULT_BP_COVER_HEIGHT;
};

$src = wpthumb( $cover_image_url, 'width=' . $settings['width'] . '&height=' . $settings['height'] . '&crop=true' );
?>


<div style="height:<?php echo $settings['height'] ?>px;" class="bp-cover-photo box-vertical-full margin-bottom-none margin-left-none margin-right-none">

	<?php echo $action; ?>

	<?php do_action( 'wf_open_bp_cover_photo' ); ?>

	<div class="<?php do_action( 'wf_cover_photo_class' ); ?> bp-cover-image-wrap"
	     style="background-image: url(<?php echo $src; ?> );"
	>
		<?php do_action( 'wf_inside_bp_cover_photo' ); ?>
	</div>

	<?php do_action( 'wf_close_bp_cover_photo' ); ?>
</div>
