<?php
/**
 * Create Sidebars for the theme (including the ones for BP components)
 * Big thanks to Marshall Sorenson from PressCrew for most of the magic.
 *
 * @since 1.0
 */
function wff_base_widgets_setup()
{
	// sidebars enabled?
		// yep, register base sidebars
		wff_base_register_sidebars();
		// BuddyPress sidebars enabled?
		if ( function_exists( 'bp_is_member' ) ) {
		// yep, register BP sidebars
		wff_base_register_bp_sidebars();
		}
}
add_action( 'widgets_init', 'wff_base_widgets_setup' );

/**
 * Register one sidebar
 *
 * @since 1.0
 */
function wff_base_register_sidebar( $id, $name, $desc )
{
	register_sidebar( array(
		'id' => $id,
		'name' => $name,
		'description' => $desc,
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}

/**
 * Register base sidebars
 *
 * @since 1.0
 */
function wff_base_register_sidebars()
{
	// Global
	wff_base_register_sidebar(
		'sitewide-sidebar',
		'Sitewide Sidebar',
		'Sitewide widget area'
	);
	// page
	wff_base_register_sidebar(
		'home-sidebar',
		'Home Sidebar',
		'The home widget area'
	);
	// blog
	wff_base_register_sidebar(
		'blog-sidebar',
		'Blog Sidebar',
		'The blog widget area'
	);
	// page
	wff_base_register_sidebar(
		'page-sidebar',
		'Page Sidebar',
		'The page widget area'
	);
	// First Widget
	wff_base_register_sidebar(
		'footer_widget_one',
		'Footer Widget One',
		'The first footer widget'
	);
	// 2nd Footer Widget
	wff_base_register_sidebar(
		'footer_widget_two',
		'Footer Widget Two',
		'The second footer widget'
	);
	// The 3rd Footer Widget
	wff_base_register_sidebar(
		'footer_widget_three',
		'Footer Widget Three',
		'The third footer widget'
	);
	// The 4th Footer Widget
	wff_base_register_sidebar(
		'footer_widget_four',
		'Footer Widget Four',
		'The fourth footer widget'
	);

}

/**
 * Register BuddyPress sidebars
 *
 * @since 1.0
 */
function wff_base_register_bp_sidebars()
{
	// activity sidebar
	wff_base_register_sidebar(
		'activity-sidebar',
		'Activity Sidebar',
		'The Activity widget area'
	);
	// member sidebar
	wff_base_register_sidebar(
		'member-sidebar',
		'Member Sidebar',
		'The Members widget area'
	);
	// blogs sidebar
	wff_base_register_sidebar(
		'blogs-sidebar',
		'Blogs Sidebar',
		'The Blogs Sidebar area'
	);
	// groups sidebar
	wff_base_register_sidebar(
		'groups-sidebar',
		'Groups Sidebar',
		'The Groups widget area'
	);
	// forums sidebar
	wff_base_register_sidebar(
		'forums-sidebar',
		'Forums Sidebar',
		'The Forums widget area'
	);
}

/**
 * Show one sidebar
 *
 * @since 1.0
 */
function wff_base_sidebar( $index, $admin_text )
{
	// check if its active
	if ( is_active_sidebar( $index ) ) {
		// yep spit it out
		dynamic_sidebar( $index );
		// sidebar was loaded
		return true;
	// can current user monkey with widgets?
	} elseif ( current_user_can( 'edit_theme_options' ) ) {
		// yep, spit out a nice link ?>
	<?php
	}

	// sidebar not loaded
	return false;
}

/**
 * Show sidebars based on page type (including BP components)
 *
 * @since 1.0
 */
function wff_base_sidebars()
{

		// show global sidebar (always try to load this one)
		wff_base_sidebar( 'sitewide-sidebar', 'Sitewide Sidebar' );

		if ( function_exists( 'bp_is_member' ) ) {
		// any profile page, or any members component page?
		if ( bp_is_user() || bp_is_current_component( 'members' ) ) {

			// show member sidebar
			return wff_base_sidebar( 'member-sidebar', 'BP Member Sidebar' );

		// any groups component page, except member groups?
		} elseif ( !bp_is_user() && bp_is_current_component( 'groups' ) ) {

			// show groups sidebar
			return wff_base_sidebar( 'groups-sidebar', 'BP Group Sidebar' );

		// any forums component page, except profile pages?
		} elseif ( !bp_is_user() && bp_is_current_component( 'forums' ) ) {

			// show forums sidebar
			return wff_base_sidebar( 'forums-sidebar', 'BP Forums Sidebar' );

		// any blogs component page, except member blogs?
		} elseif ( !bp_is_user() && bp_is_current_component( 'blogs' )) {

			// show blogs sidebar
			return wff_base_sidebar( 'blogs-sidebar', 'BP Blogs Sidebar' );

		// any activity component page, except member activity?
		} elseif ( !bp_is_user() && bp_is_current_component( 'activity' ) ) {

			// show activity sidebar
			return wff_base_sidebar( 'activity-sidebar', 'Activity Sidebar' );
		}
	}
	// if a BP sidebar was output, this function
	// would have been exited by this point!!!

	// front page?
	if ( is_page() && is_front_page() ) {

		// show home sidebar
		return wff_base_sidebar( 'home-sidebar', 'Home Sidebar' );

	} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {

		// show forums sidebar
		return wff_base_sidebar( 'forums-sidebar', 'Forums Sidebar' );

	// any other page?
	} elseif ( is_page() ) {

		// show page sidebar
		return wff_base_sidebar( 'page-sidebar', 'Page Sidebar' );

	// assume its the "blog" (posts)
	} else {

		// show blog sidebar
		return wff_base_sidebar( 'blog-sidebar', 'Blog Sidebar' );
	}


	// only show global sidebar
	return true;

}
