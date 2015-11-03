<?php
/**
 * Changes default BuddyPress behavior through filters. Has some overlap with bp-custom.php
 */
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
