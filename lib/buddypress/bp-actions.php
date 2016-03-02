<?php
/**
 * This file loads some custom BuddyPress templates in our sidebar
 */

 /**
  * Change Default Avatar.
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'wff_default_avatar' ) ) {
 	function wff_default_avatar() {

 		define( 'BP_AVATAR_DEFAULT', WEFOSTER_ASSETS_URL.'/assets/img/avatar-member.jpg' );
 	}
 	add_action( 'bp_init', 'wff_default_avatar' );
 }

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

		if ( bp_is_blogs_component() && bp_is_directory() && is_user_logged_in() ) :  ?>

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

			if ( function_exists('bp_disable_cover_image_uploads') && bp_disable_cover_image_uploads() == false && ! bp_is_group_create()  ) {
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

		if ( function_exists('bp_disable_cover_image_uploads') && bp_is_user() || bp_is_group() ) :
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
}

/**
 * Add Member Photo to Member Pages
 */
if ( ! function_exists( 'wff_theme_member_actions' ) ) {
	function wff_theme_member_actions() {

		if ( bp_is_user() ) :
 			bp_has_members();
			get_template_part( 'buddypress/members/profile-actions' );
	  endif;
	}
	add_action( 'before_bp_profile_sidebar_navigation', 'wff_theme_member_actions',1 );
}


/**
 * Add Member Navigation to Member Pages
 */
if ( ! function_exists( 'wff_theme_member_navigation' ) ) {
	function wff_theme_member_navigation() {

		if ( bp_is_user() ) :

			get_template_part( 'buddypress/members/profile-header' );
			get_template_part( 'buddypress/members/sidebar-navigation' );

	  endif;
	}
	add_action( 'open_sidebar', 'wff_theme_member_navigation' );
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


/**
 * This function checks if we are on a mobile device. If so it adds some template parts.
 */
if ( ! function_exists( 'wff_bp_add_mobile_template_parts' ) ) {
function wff_bp_add_mobile_template_parts() {

			if ( is_handheld() || WEFOSTER_MOBILE_OPTIMISATION == 'off'  ) {
				//Add Actions
				add_action( 'open_bp_mobile_sidebar', 'wff_theme_group_navigation' );
				add_action( 'open_bp_mobile_sidebar', 'wff_theme_activity_tabs',1 );
		 		//add_action( 'open_bp_mobile_sidebar', 'wff_theme_group_photo', 1 );
				add_action( 'open_bp_mobile_sidebar', 'wff_theme_member_navigation' );
				//add_action( 'open_bp_mobile_sidebar', 'wff_theme_member_photo',1 );
				//Remove Actions on Desktop
				remove_action( 'open_sidebar', 'wff_theme_activity_tabs' );
				remove_action( 'open_sidebar', 'wff_theme_group_navigation' );
		 		remove_action( 'before_bp_group_navigation', 'wff_theme_group_photo', 1 );
				remove_action( 'open_sidebar', 'wff_theme_member_navigation' );
				remove_action( 'before_bp_profile_sidebar_navigation', 'wff_theme_member_photo' );
			}
	}
	add_action('template_redirect','wff_bp_add_mobile_template_parts', 1);
}

if ( ! function_exists( 'wff_bp_mobile_sidebar' ) ) {
	/**
	 * Load our BuddyPress Navigation on Mobile
	 */
	function wff_bp_mobile_sidebar() {
		if ( is_handheld() || WEFOSTER_MOBILE_OPTIMISATION == 'off' ) :
			//Our User Navigation
			get_template_part( 'templates/sidebar/buddypress-mobile-user-navigation' );
			//Our Member/Group Navigation
			get_template_part('templates/sidebar/buddypress-mobile-sidebar');
	  endif;
	}
	add_action( 'after_footer', 'wff_bp_mobile_sidebar' );
}


/**
 * Profile / Group Sidebar Triggers
 *
 */
function bp_mobile_sidebar_triggers() {
if ( is_handheld() || WEFOSTER_MOBILE_OPTIMISATION == 'off' ) :
?>
	<div class="mobile-content-trigger">
			<?php if ( bp_is_groups_component() && bp_is_group() ): ?>
			<a id="buddypress-mobile-sidebar-trigger" href="#buddypress-mobile-sidebar">
					<i class="fa fa-group"></i>
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
				    <path d="M25,2C12.318,2,2,12.318,2,25c0,12.683,10.318,23,23,23c12.683,0,23-10.317,23-23C48,12.318,37.683,2,25,2z M35,32H15 c-0.552,0-1-0.447-1-1s0.448-1,1-1h20c0.553,0,1,0.447,1,1S35.553,32,35,32z M35,26H15c-0.552,0-1-0.448-1-1s0.448-1,1-1h20 c0.553,0,1,0.448,1,1S35.553,26,35,26z M35,20H15c-0.552,0-1-0.448-1-1s0.448-1,1-1h20c0.553,0,1,0.448,1,1S35.553,20,35,20z"></path>
				</svg>
		  </a>
			<?php elseif ( bp_is_user() && ! bp_is_my_profile()  ) : ?>
				<a id="buddypress-mobile-sidebar-trigger" href="#buddypress-mobile-sidebar">
					<i class="fa fa-user"></i>
					<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
							<path d="M25,2C12.318,2,2,12.318,2,25c0,12.683,10.318,23,23,23c12.683,0,23-10.317,23-23C48,12.318,37.683,2,25,2z M35,32H15 c-0.552,0-1-0.447-1-1s0.448-1,1-1h20c0.553,0,1,0.447,1,1S35.553,32,35,32z M35,26H15c-0.552,0-1-0.448-1-1s0.448-1,1-1h20 c0.553,0,1,0.448,1,1S35.553,26,35,26z M35,20H15c-0.552,0-1-0.448-1-1s0.448-1,1-1h20c0.553,0,1,0.448,1,1S35.553,20,35,20z"></path>
					</svg>
				</a>
			<?php endif; ?>
	</div>

<?php
endif;
}
add_action( 'after_footer','bp_mobile_sidebar_triggers',-999 );
