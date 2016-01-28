<?php
/**
 * This file loads some custom BuddyPress templates in our sidebar
 */


if ( ! function_exists( 'wff_theme_activity_tabs' ) ) {
	/**
	 * Add Activity Tabs
	 */
	function wff_theme_activity_tabs() {

		if ( bp_is_activity_component() && bp_is_directory() ) :
			get_template_part( 'buddypress/activity/activity-tabs' );
	  endif;
	}
	add_action( 'open_sidebar', 'wff_theme_activity_tabs' );

	if ( is_handheld() ) {
		add_action( 'open_mobile_sidebar', 'wff_theme_activity_tabs',1 );
	}
}

/**
 * Add Group Creation Button to Header
 */
if ( ! function_exists( 'wff_group_creation_button' ) ) {
	function wff_group_creation_button() {

		if ( bp_is_groups_component() && bp_is_directory() && is_user_logged_in() && bp_user_can_create_groups() ) :  ?>

		  <div class="btn btn-primary create-group-button hidden-xs">
			<i class="fa fa-user-plus"></i> <?php bp_group_create_button(); ?>
		  </div>

			<?php endif;
	}
	add_action( 'close_bp_page_header', 'wff_group_creation_button' );
}

if ( ! function_exists( 'wff_blog_creation_button' ) ) {
	function wff_blog_creation_button() {

		if ( bp_is_blogs_component() && bp_is_directory() && user_is_logged_in() ) :  ?>

		  <div class="btn btn-primary create-group-button hidden-xs">
			<i class="fa fa-desktop"></i> <?php bp_blog_create_button(); ?>
		  </div>

			<?php endif;
	}
	add_action( 'close_bp_page_header', 'wff_blog_creation_button' );
}

/*
* Hook the BuddyPress Page Titles into our pages and posts.
*
* @since 1.0.0
*/
if ( ! function_exists( 'wff_bp_page_header' ) ) {
function wff_bp_page_header() {
	get_template_part( 'buddypress/page-header' );
}
	add_action( 'open_bp_page_content', 'wff_bp_page_header' );
}


if ( ! function_exists( 'wff_theme_cover_photos' ) ) {
	/**
	 * Add Cover Photos to BuddyPress.
	 */
	function wff_theme_cover_photos() {

		if ( bp_is_user() || bp_is_group() ) :

			if ( bp_disable_cover_image_uploads() == false && ! bp_is_group_create()  ) {
				get_template_part( 'buddypress/parts/cover-photo' );
			}
	endif;
	}
	add_action( 'before_container', 'wff_theme_cover_photos' );
}

/**
 * Add Full Width Cover Photo Template
 */
if ( ! function_exists( 'wff_cover_photo_member_content' ) ) {
	function wff_cover_photo_member_content() {

		if ( bp_is_user() || bp_is_group() ) :
				get_template_part( 'buddypress/parts/cover-photo-content' );
	  endif;
	}
	add_action( 'close_bp_cover_photo', 'wff_cover_photo_member_content' );
}

if ( ! function_exists( 'wff_theme_group_navigation' ) ) {
	/**
	 * Add Group Navigation Items to Group Pages
	 */
	function wff_theme_group_navigation() {

		if ( bp_is_group() ) :
			wff_populate_group_global();
			get_template_part( 'buddypress/groups/group-sidebar-navigation' );
	  endif;
	}
	add_action( 'open_sidebar', 'wff_theme_group_navigation' );

	if ( is_handheld() ) {
			add_action( 'open_mobile_sidebar', 'wff_theme_group_navigation' );
	}
}

if ( ! function_exists( 'wff_theme_group_photo' ) ) {
	/**
	 * This Loads the Group Photo.
	 */
	function wff_theme_group_photo() {

		if ( bp_is_group() ) :
			get_template_part( 'buddypress/groups/group-photo' );
	  endif;
	}
	add_action( 'before_bp_group_navigation', 'wff_theme_group_photo', 1 );

	if ( is_handheld() ) {
		 add_action( 'open_mobile_sidebar', 'wff_theme_group_photo', 1 );
	}
}

/**
 * Add Member Photo to Member Pages
 */
if ( ! function_exists( 'wff_theme_member_photo' ) ) {
	function wff_theme_member_photo() {

		if ( bp_is_user() ) :

			get_template_part( 'buddypress/members/profile-photo' );

	  endif;
	}
	add_action( 'before_bp_profile_sidebar_navigation', 'wff_theme_member_photo' );

	if ( is_handheld() ) {
		add_action( 'open_mobile_sidebar', 'before_bp_profile_sidebar_navigation', 1 );
	}
}

/**
 * Add Member Photo to Member Pages
 */
if ( ! function_exists( 'wff_theme_member_actions' ) ) {
	function wff_theme_member_actions() {

		if ( bp_is_user() ) :

			get_template_part( 'buddypress/members/profile-actions' );

	  endif;
	}
	add_action( 'before_bp_profile_sidebar_navigation', 'wff_theme_member_actions',1 );

	if ( is_handheld() ) {
		add_action( 'open_mobile_sidebar', 'wff_theme_member_actions', 1 );
	}

}


/**
 * Add Member Navigation to Member Pages
 */
if ( ! function_exists( 'wff_theme_member_navigation' ) ) {
	function wff_theme_member_navigation() {

		if ( bp_is_user() ) :

			if ( ! is_handheld() || is_tablet() ) {
				get_template_part( 'buddypress/members/profile-header' );
			}
			get_template_part( 'buddypress/members/sidebar-navigation' );

	  endif;
	}
	add_action( 'open_sidebar', 'wff_theme_member_navigation' );

	if ( is_handheld() ) {
		add_action( 'open_mobile_sidebar', 'wff_theme_member_navigation' );
	}
}
/**
 * Add our avatar/title to the cover photo template (only if enabled)
 */
if ( ! function_exists( 'wff_cover_photo_member_content' ) ) {
	function wff_cover_photo_content() {

		if ( bp_is_user() ) :
				get_template_part( 'buddypress/parts/cover-photo-members' );
	  endif;
	}
	add_action( 'close_bp_cover_photo', 'wff_cover_photo_member_content' );
}


if ( ! function_exists( 'wff_theme_mobile_member_navigation' ) ) {
	function wff_theme_mobile_member_navigation() {

		if ( bp_is_user() && is_handheld() && ! bp_is_my_profile() && ! is_tablet() ) : ?>

			<div class="mobile-profile-header">
				<?php get_template_part( 'buddypress/members/profile-header' ); ?>
			</div>

		<?php endif;
	}
	//add_action( 'bp_before_member_header', 'wff_theme_mobile_member_navigation' );
}


if ( ! function_exists( 'wff_theme_user_navigation' ) ) {
	/**
	 * Add User Navigation/Notifications menus to Header Navigation
	 */
	function wff_theme_user_navigation() {

		get_template_part( 'buddypress/navigation-menu' );
	}
	add_action( 'close_primary_navigation', 'wff_theme_user_navigation' );
}

/**
 * This function checks the currently active Cover Photo layout and removes some template parts if needed.
 */
if ( ! function_exists( 'wff_buddypress_cover_photo_layout' ) ) {
function wff_buddypress_cover_photo_layout() {
		// First check the layout being used.
		if ( WEFOSTER_BUDDYPRESS_COVER_PHOTO_LAYOUT == 'full'  ) {
			//Only apply on Group & Member Pages
			if ( bp_is_user() || bp_is_group() ) {
				remove_action( 'open_bp_page_content', 'wff_bp_page_header' );
				remove_action( 'before_bp_group_navigation', 'wff_theme_group_photo', 1 );
				remove_action( 'before_bp_profile_sidebar_navigation', 'wff_theme_member_photo' );
			}
		}

	}
	add_action('template_redirect','wff_buddypress_cover_photo_layout', 11);
}

if ( ! function_exists( 'wff_buddypress_cover_photo_css' ) ) {
function wff_buddypress_cover_photo_css() {

	//Check for the default image sizes.
	$option = get_theme_mod( 'wf_plus_bp_cover_photo_default_sizes' );

	if ( $option == 'custom' ) {
	  $settings['height'] = get_theme_mod ('wf_plus_bp_cover_photo_height') * 0.7;
	} else {
	  $settings['height'] = WEFOSTER_DEFAULT_BP_COVER_HEIGHT * 0.7;
	};
		// First check the layout being used.
		if ( WEFOSTER_BUDDYPRESS_COVER_PHOTO_LAYOUT == 'full'  ) {
			//Only apply on Group & Member Pages
			if ( bp_is_user() || bp_is_group() ) {
				echo '<style>
					@media (max-width:768px) {
						.wefoster-framework .bp-cover-photo,
						.avatar-height-wrapper {
							height: ' . $settings['height'] . 'px !important;
						}
					}
				</style>';
			}
		}

	}
	add_action('wp_head','wff_buddypress_cover_photo_css', 11);
}

// Mobile Templates.
if ( ! function_exists( 'wff_bp_mobile_sidebar' ) ) {
	/**
	 * Load our BuddyPress Navigation on Mobile
	 */
	function wff_bp_mobile_sidebar() {
		if ( is_handheld()  ) :
			//Our User Navigation
			get_template_part( 'templates/sidebar/buddypress-mobile-user-navigation' );

			//Our Member/Group Navigation
			get_template_part('templates/sidebar/buddypress-mobile-sidebar');
	  endif;
	}
	add_action( 'after_footer', 'wff_bp_mobile_sidebar' );
}
