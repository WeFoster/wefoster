<?php
/**
 * This file loads some custom BuddyPress templates in our sidebar
 */
 /**


 * Add Activity Tabs on the Stream Directory
 */
if ( ! function_exists ( 'wff_theme_activity_tabs' ) ) {
  function wff_theme_activity_tabs()
  {
      if ( bp_is_activity_component() && bp_is_directory() ):
          get_template_part( 'buddypress/activity/activity-tabs' );
      endif;
  }
  add_action( 'open_sidebar', 'wff_theme_activity_tabs' );
}


/**
 * Add Group Navigation Items to Group Pages
 */
if ( ! function_exists ( 'wff_theme_group_navigation' ) ) {
  function wff_theme_group_navigation()
  {
      if ( bp_is_group() ) :
          wff_populate_group_global();
          get_template_part( 'buddypress/groups/group-sidebar-navigation' );
      endif;
  }
  add_action( 'open_sidebar', 'wff_theme_group_navigation' );
}


/**
 * Add Member Navigation to Member Pages
 */
if ( ! function_exists ( 'wff_theme_member_navigation' ) ) {
  function wff_theme_member_navigation()
  {
      if ( bp_is_user() ) :

          if ( ! is_handheld() || is_tablet() ) {
            get_template_part( 'buddypress/members/profile-header' );
          }
          get_template_part( 'buddypress/members/sidebar-navigation' );

      endif;
  }
  add_action( 'open_sidebar', 'wff_theme_member_navigation' );
}

if ( ! function_exists ( 'wff_theme_mobile_member_navigation' ) ) {
  function wff_theme_mobile_member_navigation()
  {
    if ( bp_is_user() && is_handheld() && ! bp_is_my_profile() && ! is_tablet() ) : ?>

        <div class="mobile-profile-header">
            <?php get_template_part( 'buddypress/members/profile-header' ); ?>
        </div>

    <?php endif;
  }
  add_action( 'bp_before_member_header', 'wff_theme_mobile_member_navigation' );
}


/**
 * Add User Navigation/Notifications menus to Header Navigation
 */
if ( ! function_exists ( 'wff_theme_user_navigation' ) ) {
  function wff_theme_user_navigation()
  {
    get_template_part( 'buddypress/navigation-menu' );
  }
  add_action( 'close_primary_navigation', 'wff_theme_user_navigation' );
}

/**
 * Add User Navigation/Notifications menus to Sidebar for mobile
 */
if ( ! function_exists ( 'wff_theme_user_mobile_navigation' ) ) {
  function wff_theme_user_mobile_navigation()
  {?>
    <div class="widget bp-user-navigation-widget sidebar-member-nav">
      <?php get_template_part( 'buddypress/navigation-menu' ); ?>
      <div style="clear:both;"></div>
    </div>
    <?php
  }
  add_action( 'open_sidebar', 'wff_theme_user_mobile_navigation', 1 );
}
