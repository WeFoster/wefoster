<?php
/**
* Changes default BuddyPress behavior through filters. Has some overlap with bp-custom.php
*
*/

/**
* Set the default cover image sizes. This is to be able to resize them to any size later using WP Thumb
*
* @since 1.0
*/
function wff_bp_cover_image_sizes( $settings = array() ) {

	  $settings['width']  = 2000;
	  $settings['height'] = 2000;

    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'wff_bp_cover_image_sizes', 10, 1 );
add_filter( 'bp_before_groups_cover_image_settings_parse_args', 'wff_bp_cover_image_sizes', 10, 1 );

/**
 * Set default BP Cover Photos for Groups
 *
 * @since 1.0.0
 *
 */
function wff_bp_group_cover_image_default( $settings = array() ) {
    $settings['default_cover'] = WEFOSTER_DEFAULT_GROUP_COVER_PHOTO;
    return $settings;
}
add_filter( 'bp_before_groups_cover_image_settings_parse_args', 'wff_bp_group_cover_image_default', 10, 1 );

/**
 * Set default BP Cover Photos for Members
 *
 * @since 1.0.0
 *
 */
function wff_bp_member_cover_image_default( $settings = array() ) {
    $settings['default_cover'] = WEFOSTER_DEFAULT_MEMBER_COVER_PHOTO;
    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'wff_bp_member_cover_image_default', 10, 1 );

/**
 * Set default BP Cover Photos for Groups and Members
 *
 * @since 1.0.0
 *
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

// Add specific CSS class by filter
add_filter( 'body_class', 'wff_bp_is_active_body_class' );
function wff_bp_is_active_body_class( $classes ) {
	// add 'class-name' to the $classes array
	$classes[] = 'buddypress-active';
	// return the $classes array
	return $classes;
}

// Apply a filter only when a condition is met.
// https://codex.wordpress.org/Conditional_Tags
function wf_change_bp_register_page_width()
{
  // Our Conditional Tags
  if ( bp_is_register_page() ) {
    function wf_profile_main_filter() {
    	//Change our class for .main
    	$class = 'col-sm-12';
    	//Return it
    	return $class;
    }
    //Add the filter.
    add_filter( 'wff_main_class', 'wf_profile_main_filter' );
    function wf_profile_sidebar_filter() {
    	//Change our class for the sidebar
    	$class = 'hidden';
    	//Return it
    	return $class;
    }
    //Add the filter.
    add_filter( 'wff_sidebar_class', 'wf_profile_sidebar_filter' );
  }
}
// Hook our function at the right place.
add_action('init', 'wf_change_bp_register_page_width');
