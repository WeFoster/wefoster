<?php
/**
* Changes default BuddyPress behavior through filters. Has some overlap with bp-custom.php
*
*/

/**
* Set proper default sizes
* TODO: Move to a plugin
* @since 1.0
*/
function wff_bp_cover_image_sizes( $settings = array() ) {

	$option = get_theme_mod( 'wf_plus_featured_image_default_sizes' );

	if ( $option == 'custom' ) {
    $settings['width']  = WEFOSTER_POST_THUMBNAIL_WIDTH;
    $settings['height'] = WEFOSTER_POST_THUMBNAIL_HEIGHT;
	} else {
		$settings['width']  = get_theme_mod ('wf_plus_featured_image_width');
		$settings['height'] = get_theme_mod ('wf_plus_featured_image_height');
	}

    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'wff_bp_cover_image_sizes', 10, 1 );
add_filter( 'bp_before_groups_cover_image_settings_parse_args', 'wff_bp_cover_image_sizes', 10, 1 );


function wff_bp_group_cover_image_default( $settings = array() ) {
    $settings['default_cover'] = WEFOSTER_DEFAULT_GROUP_COVER_PHOTO;
    return $settings;
}
add_filter( 'bp_before_groups_cover_image_settings_parse_args', 'wff_bp_group_cover_image_default', 10, 1 );

function wff_bp_member_cover_image_default( $settings = array() ) {
    $settings['default_cover'] = WEFOSTER_DEFAULT_MEMBER_COVER_PHOTO;
    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'wff_bp_member_cover_image_default', 10, 1 );

/**
* Replace default group avatar
* TODO: Move to a plugin
* @since 1.0
*/
if ( ! function_exists ( 'wff_default_group_avatar' ) ) {
	function wff_default_group_avatar($avatar)
	{
		global $bp, $groups_template;
		if ( strpos($avatar,'group-avatars') )
		{
			return $avatar;
		}
		else {
			$custom_avatar = get_template_directory_uri() .'/assets/img/avatar-group.jpg';

			if ( $bp->current_action == "" )
			{
				return '<img width="'.BP_AVATAR_THUMB_WIDTH.'" height="'.BP_AVATAR_THUMB_HEIGHT.'" src="'.$custom_avatar.'" class="avatar" alt="' . esc_attr( $groups_template->group->name ) . '" />';
			}
			else {
				return '<img width="'.BP_AVATAR_FULL_WIDTH.'" height="'.BP_AVATAR_FULL_HEIGHT.'" src="'.$custom_avatar.'" class="avatar" alt="' . esc_attr( $groups_template->group->name ) . '" />';
			}
		}
	}
	add_filter( 'bp_get_group_avatar', 'wff_default_group_avatar', 1);
	add_filter( 'bp_get_new_group_avatar', 'wff_default_group_avatar', 1 );
}
