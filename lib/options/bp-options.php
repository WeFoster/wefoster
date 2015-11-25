<?php
/**
 * This file constains the BuddyPress Theme Options
 */

/**
*  Change the default Member Avatar based on option.
*
* @since 1.0.0
*
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

/**
*  Change the default Group Avatar based on option.
*
* @since 1.0.0
*
*/
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

/**
 * Change default loop length for Groups
 *
 * @since 1.0.0
 *
 */
function wf_plus_change_groups_loop( $retval ) {

        //do not exclude in admin
        if( is_admin() && ! defined( 'DOING_AJAX' ) ) {
            return $args;
        }

        $retval['per_page'] = get_theme_mod( 'wf_plus_group_loop_amount', '20' );

    return $retval;
}
add_filter( 'bp_after_has_groups_parse_args', 'wf_plus_change_groups_loop' );

/**
 * Change default loop length for Activity
 *
 * @since 1.0.0
 *
 */
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
* Change the default (English) BuddyPress Activity Page Title.
*
* @since 1.0.0
*
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

/**
* Change the default (English) BuddyPress Members Page Title.
*
* @since 1.0.0
*
*/
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

/**
* Change the default (English) BuddyPress Groups Page Title.
*
* @since 1.0.0
*
*/
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

function wff_add_members_intro() {
?>

    <div id="item-meta" class="directory-intro margin-bottom-full margin-top-full">

      <?php // Data validation: Allow anchor and strong tags
        echo wp_kses( get_theme_mod( 'wf_plus_buddypress_members_intro' ),
          array(
              'strong' => array(),
              'a' => array(
              'href' => true,
              'rel' => true,
              'rev' => true,
              'name' => true,
              'target' => true,
              'img' => true,
            )
          )
          );
      ?>
    </div>

  <?php
  }
add_action( 'bp_before_directory_members_tabs', 'wff_add_members_intro' );

function wff_add_groups_intro() {
?>
  <?php if ( !bp_is_user() && bp_is_current_component( 'groups' ) && ! bp_is_group() && ! bp_is_group_create() ) { ?>
    <div id="item-meta" class="directory-intro margin-bottom-full margin-top-full">

      <?php // Data validation: Allow anchor and strong tags
        echo wp_kses( get_theme_mod( 'wf_plus_buddypress_groups_intro' ),
          array(
              'br' => array(),
              'em' => array(),
              'strong' => array(),
              'a' => array(
                  'href' => true,
                  'rel' => true,
                  'rev' => true,
                  'name' => true,
                  'target' => true
              ),
            )
          );
      ?>
    </div>
  <?php } ?>
  <?php
  }
add_action( 'template_notices', 'wff_add_groups_intro' );
