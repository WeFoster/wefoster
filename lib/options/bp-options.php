<?php
/**
 * This file constains the BuddyPress Theme Options
 */

$wf_plus_default_member_avatar = get_theme_mod( 'wf_plus_default_member_avatar');
if ( $wf_plus_default_member_avatar == '') {
    function wff_default_avatar() {
     	define ( 'BP_AVATAR_DEFAULT', get_theme_mod('wf_plus_default_member_avatar' ) );
    }
  }
  else {
    function wff_default_avatar() {
    define ( 'BP_AVATAR_DEFAULT', get_template_directory_uri() . '/assets/img/avatar-member.jpg' );
  }
add_action( 'bp_init', 'wff_default_avatar' );
}


 function wff_plus_default_group_avatar($avatar)
 {
   global $bp, $groups_template;
   if ( strpos($avatar,'group-avatars') )
   {
     return $avatar;
   }
   else {

     $wf_plus_default_group_avatar = get_theme_mod( 'wf_plus_default_group_avatar') ;


   if ( $wf_plus_default_group_avatar == '') {
      $custom_avatar = WEFOSTER_DEFAULT_GROUP_AVATAR ;
   } else {
     $custom_avatar = get_theme_mod( 'wf_plus_default_group_avatar' );
   }

     if ( $bp->current_action == "" )
     {
       return '<img width="'.BP_AVATAR_THUMB_WIDTH.'" height="'.BP_AVATAR_FULL_HEIGHT.'" src="'.$custom_avatar.'" class="avatar" alt="' . esc_attr( $groups_template->group->name ) . '" />';
     }
     else {
       return '<img width="'.BP_AVATAR_FULL_WIDTH.'" height="'.BP_AVATAR_FULL_HEIGHT.'" src="'.$custom_avatar.'" class="avatar" alt="' . esc_attr( $groups_template->group->name ) . '" />';
     }
   }
 }
 add_filter( 'bp_get_group_avatar', 'wff_plus_default_group_avatar');
 add_filter( 'bp_get_new_group_avatar', 'wff_plus_default_group_avatar' );


// Change default loop length for Members
function wf_plus_change_members_loop( $retval ) {

    //do not exclude in admin
    if( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return $args;
    }

    $retval['per_page'] = get_theme_mod( 'wf_plus_member_loop_amount', '20' );

    return $retval;
}
add_filter( 'bp_after_has_members_parse_args', 'wf_plus_change_members_loop' );

// Change default loop length for Groups
function wf_plus_change_groups_loop( $retval ) {

        //do not exclude in admin
        if( is_admin() && ! defined( 'DOING_AJAX' ) ) {
            return $args;
        }

        $retval['per_page'] = get_theme_mod( 'wf_plus_group_loop_amount', '20' );

    return $retval;
}
add_filter( 'bp_after_has_groups_parse_args', 'wf_plus_change_groups_loop' );

// Change default loop length for Activity
function wf_plus_change_activity_loop( $retval ) {

        //do not exclude in admin
        if( is_admin() && ! defined( 'DOING_AJAX' ) ) {
            return $args;
        }

        $retval['per_page'] = get_theme_mod( 'wf_plus_activity_loop_amount','20' );

    return $retval;
}
add_filter( 'bp_after_has_activities_parse_args', 'wf_plus_change_activity_loop' );

/**
 * Change the default (English) BuddyPress page titles.
 */
$wf_plus_activity_title = get_theme_mod( 'wf_plus_activity_title' );

if ( ! empty ( $wf_plus_activity_title )  ) {
  function wf_plus_change_activity_title($data) {

  	if( $data == 'Site-Wide Activity' ) {
  		$data = get_theme_mod( 'wf_plus_activity_title','default' );
  	}
  	return $data;

  }
  add_filter( 'bp_get_directory_title', 'wf_plus_change_activity_title' );
}

$wf_plus_members_title = get_theme_mod( 'wf_plus_members_title' );

if ( ! empty ( $wf_plus_members_title )  ) {
  function wf_plus_change_members_title($data) {

  	if( $data == 'Members' ) {
  		$data = get_theme_mod( 'wf_plus_members_title','default' );
  	}
  	return $data;

  }
  add_filter( 'bp_get_directory_title', 'wf_plus_change_members_title' );
}

$wf_plus_groups_title = get_theme_mod( 'wf_plus_groups_title' );

if ( ! empty ( $wf_plus_groups_title )  ) {
  function wf_plus_change_groups_title($data) {

  	if( $data == 'Groups' ) {
  		$data = get_theme_mod( 'wf_plus_groups_title','default' );
  	}
  	return $data;

  }
  add_filter( 'bp_get_directory_title', 'wf_plus_change_groups_title' );
}
