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
        return $retval;
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
            return $retval;
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
              return $retval;
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
  $member_intro = get_theme_mod( 'wf_plus_buddypress_member_intro', 'default' );
?>
    <div id="item-meta" class="directory-intro margin-bottom-full margin-top-full">

      <?php if ($member_intro == 'default'): ?>
          <?php _e('This is your Member Introduction text. Use this space to tell your members something about the members displayed below! You can edit this text via the WordPress customizer.', 'wefoster'); ?>
      <?php else:
        // Data validation: Allow anchor and strong tags
          echo wp_kses( $member_intro,
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
      <?php endif; ?>
    </div>

  <?php
  }
add_action( 'bp_before_directory_members_tabs', 'wff_add_members_intro' );

function wff_add_groups_intro() {
    if ( !bp_is_user() && bp_is_current_component( 'groups' ) && ! bp_is_group() && ! bp_is_group_create() ) {

    $group_intro = get_theme_mod( 'wf_plus_buddypress_groups_intro', 'default' );

?>
    <div id="item-meta" class="directory-intro margin-bottom-full margin-top-full">

      <?php  if ($group_intro == 'default'): ?>

        <?php _e('    This is your Group Introduction text. Use this space to tell your members something about the groups displayed below! You can edit this text via the WordPress customizer.', 'wefoster'); ?>

      <?php else:
        echo wp_kses( $group_intro,
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

      <?php endif; ?>

    </div>
  <?php } ?>
  <?php
  }
add_action( 'template_notices', 'wff_add_groups_intro' );

/**
 * Check theme options for navbar style
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_bp_navbar_class_position() {

		$option = get_theme_mod( 'wf_plus_bp_navigation_class', 'default' );

		if ( $option == 'default' ) {
					$classes = WEFOSTER_BP_NAVBAR_POSITION_CLASS;
		}

		else {
	    $classes = ' ' . $option  . ' ';
		}

		return $classes;

}
add_filter( 'wff_bp_navbar_position_class', 'wefoster_plus_change_bp_navbar_class_position' );

/**
 * Check theme options for sidebar position
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_activity_sidebar_class() {

    if ( !bp_is_user() && bp_is_current_component( 'activity' ) ) {

  		$option = get_theme_mod( 'wf_plus_activity_sidebar_position', 'default' );

  		if ( $option == 'default' ) {
  				$classes = WEFOSTER_ACTIVITY_SIDEBAR_POSITION;
  		}
  		else {
  	    $classes = $option;
  		}

  		return $classes;

    }

}
add_filter( 'wff_bp_activity_sidebar_position', 'wefoster_plus_change_activity_sidebar_class' );

/**
 * Check theme options for sidebar position
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_member_sidebar_class() {

    if ( !bp_is_user() && bp_is_current_component( 'members' ) ) {

  		$option = get_theme_mod( 'wf_plus_member_sidebar_position', 'default' );

  		if ( $option == 'default' ) {
  				$classes = WEFOSTER_MEMBER_SIDEBAR_POSITION;
  		}
  		else {
  	    $classes = $option;
  		}

  		return $classes;

    }

}
add_filter( 'wff_bp_member_sidebar_position', 'wefoster_plus_change_member_sidebar_class' );

/**
 * Check theme options for sidebar position
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_change_group_sidebar_class() {

    if ( !bp_is_user() && bp_is_current_component( 'groups' ) ) {

  		$option = get_theme_mod( 'wf_plus_group_sidebar_position', 'default' );

  		if ( $option == 'default' ) {
  				$classes = WEFOSTER_GROUP_SIDEBAR_POSITION;
  		}
  		else {
  	    $classes = $option;
  		}

  		return $classes;

    }

}
add_filter( 'wff_bp_group_sidebar_position', 'wefoster_plus_change_group_sidebar_class' );
