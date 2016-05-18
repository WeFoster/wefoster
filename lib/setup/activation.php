<?php
/**
 * This file sets up some default settings on theme activation.
 *  Props to Marshall Sorenson, Boone Gorges and the rest of the CBOX Team.
 */

if ( WEFOSTER_AUTO_SETUP == 'true' ) {
	/**
	 * This function automatically sets up some sensible defaults.
	 * Want to disable the auto setup? add:
	 * define('WEFOSTER_AUTO_SETUP', FALSE );
	 * To your child theme/stylekit or wp-config.php
	 *
	 * @since 1.0.0
	 */
	function wf_theme_magic_setup() {
		// load requirements
		require_once WEFOSTER_THEME_DIR . '/lib/classes/widget-setter.php';

		// auto sidebar population
		wf_theme_populate_sidebars();

		global $blog_id;

		//Set up BuddyPress Menu
		if ( class_exists( 'BuddyPress' ) && BP_ROOT_BLOG == $blog_id ) {
			// auto populate menu
			wf_theme_add_default_menu();

			$locations = get_theme_mod( 'nav_menu_locations' );
			set_theme_mod( 'nav_menu_locations', 'primary_navigation' );
		}

	}

	// Only assign when the theme is activated.
	add_action( 'after_switch_theme', 'wf_theme_magic_setup' );


/**
 * Populates sidebars throughout the theme on activation
 *
 * When activating wefoster, this function is triggered. It checks each of
 * wefoster's sidebars, and for each one that is empty, it sets up a number
 * of default widgets. Note that this will not override changes you've made
 * to any of these sidebars, unless you've cleared them out completely.
 *
 * @uses WeFoster_Widget_Setter
 * @since 1.0
 */
function wf_theme_populate_sidebars() {

	if ( class_exists( 'BuddyPress' ) ) {

		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-center-widget' ) ) {

			$center_text = sprintf( __( '<h2 class="box-light padding-full box-full margin-bottom-half text-align-center">What is happening  in our community?</h2>', 'wefoster' ) );

			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'text',
				                                    'sidebar_id' => 'homepage-top-center',
				                                    'settings'   => array(
					                                    'title'  => '',
					                                    'text'   => $center_text,
					                                    'filter' => false,
				                                    ),
			                                    ) );
		} // End homepage-center-widget
		// Homepage Left
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-left' ) ) {
			if ( bp_is_active( 'groups' ) ) {
				WeFoster_Widget_Setter::set_widget( array(
					                                    'id_base'    => 'bp_groups_widget',
					                                    'sidebar_id' => 'homepage-left',
					                                    'settings'   => array(
						                                    'title'         => __( 'Groups', 'wefoster' ),
						                                    'max_groups'    => 5,
						                                    'link_title'    => 1,
						                                    'group_default' => 'newest',
						                                    'filter'        => false,
					                                    ),
				                                    ) );
			}
		} // End homepage-left
		// Homepage Middle
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-middle' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'bp_core_members_widget',
				                                    'sidebar_id' => 'homepage-middle',
				                                    'settings'   => array(
					                                    'title'          => __( 'Members', 'wefoster' ),
					                                    'max_members'    => 5,
					                                    'link_title'     => 1,
					                                    'member_default' => 'newest',
					                                    'filter'         => false,
				                                    ),
			                                    ) );
		} // End homepage-middle
		// Homepage Right
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-right' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'recent-posts',
				                                    'sidebar_id' => 'homepage-right',
				                                    'settings'   => array(
					                                    'title'  => __( 'Recent Blog Posts', 'wefoster' ),
					                                    'filter' => false,
					                                    'number' => '15'
				                                    ),
			                                    ) );
		} // End homepage-right

	} else {

		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-center-widget' ) ) {
			$center_text = sprintf( __( '<h2 class="box-light padding-full box-full margin-bottom-half text-align-center">Check out our most recent content</h2>', 'wefoster' ) );

			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'text',
				                                    'sidebar_id' => 'homepage-center-widget',
				                                    'settings'   => array(
					                                    'title'  => '',
					                                    'text'   => $center_text,
					                                    'filter' => false,
				                                    ),
			                                    ) );
		} // End homepage-center-widget

		// Homepage Left
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-left' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'pages',
				                                    'sidebar_id' => 'homepage-left',
				                                    'settings'   => array(
					                                    'title'  => __( 'Pages', 'wefoster' ),
					                                    'filter' => false,
				                                    ),
			                                    ) );
		} // End homepage-left
		// Homepage Middle
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-middle' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'archives',
				                                    'sidebar_id' => 'homepage-middle',
				                                    'settings'   => array(
					                                    'title'  => __( 'Archives', 'wefoster' ),
					                                    'filter' => false,
				                                    ),
			                                    ) );
		} // End homepage-middle
		// Homepage Right
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'homepage-right' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'recent-posts',
				                                    'sidebar_id' => 'homepage-right',
				                                    'settings'   => array(
					                                    'title'  => __( 'Recent Blog Posts', 'wefoster' ),
					                                    'filter' => false,
				                                    ),
			                                    ) );
		} // End homepage-right

	}


	// Blog Sidebar
	if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'blog-sidebar' ) ) {
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'search',
			                                    'sidebar_id' => 'blog-sidebar',
			                                    'settings'   => array(
				                                    'title'  => __( 'Search', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'archives',
			                                    'sidebar_id' => 'blog-sidebar',
			                                    'settings'   => array(
				                                    'title'  => __( 'Archives', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'recent-posts',
			                                    'sidebar_id' => 'blog-sidebar',
			                                    'settings'   => array(
				                                    'title'  => __( 'Recent Blog Posts', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
	} // End blog-sidebar
	// Page Sidebar
	if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'page-sidebar' ) ) {
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'pages',
			                                    'sidebar_id' => 'page-sidebar',
			                                    'settings'   => array(
				                                    'title'  => __( 'Pages', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
	} // End page-sidebar
	// Footer Left
	if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'footer_widget_one' ) ) {
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'text',
			                                    'sidebar_id' => 'footer_widget_one',
			                                    'settings'   => array(
				                                    'title'  => __( 'Contact Us', 'wefoster' ),
				                                    'text'   => __( 'You can put your contact information in this widget or some information about your community. Footer content shows on every page of your site, so use this space wisely.', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
	} // End footer-left
	// Footer Middle
	if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'footer_widget_two' ) ) {
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'text',
			                                    'sidebar_id' => 'footer_widget_two',
			                                    'settings'   => array(
				                                    'title'  => __( 'About', 'wefoster' ),
				                                    'text'   => __( 'What is the most important thing you want people to know about your site when their first visit? Tell them about your mission and add a link to your about page.', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
	} // End footer-middle
	// Footer Right
	if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'footer_widget_three' ) ) {
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'text',
			                                    'sidebar_id' => 'footer_widget_three',
			                                    'settings'   => array(
				                                    'title'  => __( 'Social Links', 'wefoster' ),
				                                    'text'   => __( 'This could be a good place to ask people to connect with your brand on others social media platforms. Share some links and increase your exposure.', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
	} // End footer-right
	// Footer Right
	if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'footer_widget_four' ) ) {
		WeFoster_Widget_Setter::set_widget( array(
			                                    'id_base'    => 'text',
			                                    'sidebar_id' => 'footer_widget_four',
			                                    'settings'   => array(
				                                    'title'  => __( 'Recent Posts', 'wefoster' ),
				                                    'text'   => __( 'This would be a great place to show the most recent articles from your blog. The Recent Posts widget does exactly this.', 'wefoster' ),
				                                    'filter' => false,
			                                    ),
		                                    ) );
	} // End footer-right

	if ( class_exists( 'BuddyPress' ) ) {

		// Activity Sidebar
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'activity-sidebar' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'bp_core_whos_online_widget',
				                                    'sidebar_id' => 'activity-sidebar',
				                                    'settings'   => array(
					                                    'title'       => __( 'Who\'s Online', 'wefoster' ),
					                                    'max_members' => 20,
					                                    'filter'      => false,
				                                    ),
			                                    ) );
		} // End activity-sidebar
		// Activity Sidebar
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'member-sidebar' ) ) {
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'bp_core_whos_online_widget',
				                                    'sidebar_id' => 'member-sidebar',
				                                    'settings'   => array(
					                                    'title'       => __( 'Who\'s Online', 'wefoster' ),
					                                    'max_members' => 20,
					                                    'filter'      => false,
				                                    ),
			                                    ) );
			WeFoster_Widget_Setter::set_widget( array(
				                                    'id_base'    => 'bp_core_recently_active_widget',
				                                    'sidebar_id' => 'member-sidebar',
				                                    'settings'   => array(
					                                    'title'       => __( 'Recently Active Members', 'wefoster' ),
					                                    'max_members' => 20,
					                                    'filter'      => false,
				                                    ),
			                                    ) );
		} // End member-sidebar
		// Group Sidebar
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'groups-sidebar' ) ) {
			if ( function_exists( 'bp_is_active' ) && bp_is_active( 'groups' ) ) {
				WeFoster_Widget_Setter::set_widget( array(
					                                    'id_base'    => 'bp_groups_widget',
					                                    'sidebar_id' => 'groups-sidebar',
					                                    'settings'   => array(
						                                    'title'      => __( 'Groups', 'wefoster' ),
						                                    'max_groups' => 5,
						                                    'link_title' => '1',
						                                    'filter'     => false,
					                                    ),
				                                    ) );
			}
		} // End groups-sidebar
		// Homepage Right
		if ( ! WeFoster_Widget_Setter::is_sidebar_populated( 'forums-sidebar' ) ) {
			if ( function_exists( 'bbpress' ) ) {
				WeFoster_Widget_Setter::set_widget( array(
					                                    'id_base'    => 'bbp_views_widget',
					                                    'sidebar_id' => 'forums-sidebar',
					                                    'settings'   => array(
						                                    'title'  => __( 'Topic View List', 'wefoster' ),
						                                    'filter' => false,
					                                    ),
				                                    ) );
				WeFoster_Widget_Setter::set_widget( array(
					                                    'id_base'    => 'bbp_topics_widget',
					                                    'sidebar_id' => 'forums-sidebar',
					                                    'settings'   => array(
						                                    'title'     => __( 'Recent Topics', 'wefoster' ),
						                                    'max_shown' => 6,
						                                    'filter'    => false,
					                                    ),
				                                    ) );
				WeFoster_Widget_Setter::set_widget( array(
					                                    'id_base'    => 'bbp_replies_widget',
					                                    'sidebar_id' => 'forums-sidebar',
					                                    'settings'   => array(
						                                    'title'     => __( 'Recent Replies', 'wefoster' ),
						                                    'max_shown' => 6,
						                                    'filter'    => false,
					                                    ),
				                                    ) );
			}
		} // End forums-sidebar

	}

}


/**
 * Sets up a default sub menu in the WeFoster theme.
 *
 * This function is fired on 'get_header' on the frontend.
 */
function wf_theme_add_default_menu() {
	global $blog_id;

	if ( function_exists( 'bp_core_get_directory_pages' ) && BP_ROOT_BLOG == $blog_id ) {

		// setup pages
		$pages = array(
			array(
				'title'    => _x( 'Home', 'the link in the header navigation bar', 'wefoster' ),
				'position' => 0,
				'url'      => home_url( '/' ),
			),
			array(
				'title'        => _x( 'Members', 'the link in the header navigation bar', 'wefoster' ),
				'position'     => 10,
				'bp_directory' => 'members',
			),
			array(
				'title'        => _x( 'Groups', 'the link in the header navigation bar', 'wefoster' ),
				'position'     => 20,
				'bp_directory' => 'groups',
			),
			array(
				'title'        => _x( 'Sites', 'the link in the header navigation bar', 'wefoster' ),
				'position'     => 30,
				'bp_directory' => 'blogs',
			),
			array(
				'title'        => _x( 'Activity', 'the link in the header navigation bar', 'wefoster' ),
				'position'     => 50,
				'bp_directory' => 'activity',
			),
		);

	} else {
		// setup pages
		$pages = array(
			array(
				'title'    => _x( 'Home', 'the link in the header navigation bar', 'wefoster' ),
				'position' => 0,
				'url'      => home_url( '/' ),
			)
		);
	}

	// register our default sub-menu
	wf_register_default_menu( array(
		                          'menu_name' => 'Primary Navigation',
		                          'location'  => 'primary_navigation',
		                          'pages'     => $pages,
	                          ) );
}

/**
 * Register and create a default menu in WeFoster.
 *
 * @param array $args Arguments to register the default menu:
 *  'menu_name' - The internal menu name we should give our new menu.
 *  'location' - The nav menu location we want our new menu to reside.
 *  'pages' - Associative array of pages. Sample looks like this:
 *       array(
 *            array(
 *                 'title'    => 'Home',
 *                 'position' => 0,
 *                 'url'      => home_url( '/' ) // custom url
 *            ),
 *            array(
 *                 'title'        => 'Members',
 *                 'position'     => 10,
 *                 'bp_directory' => 'members'   // match bp component
 *            ),
 *       )
 */
function wf_register_default_menu( $args = array() ) {
	global $blog_id;
	if ( empty( $args['menu_name'] ) || empty( $args['location'] ) || empty( $args['pages'] ) ) {
		return false;
	}
	if ( ! is_array( $args['pages'] ) ) {
		return false;
	}
	// check BP reqs and if our custom default menu already exists
	if ( ! is_nav_menu( $args['menu_name'] ) ) {
		// menu doesn't exist, so create it
		$menu_id = wp_create_nav_menu( $args['menu_name'] );
		// get bp pages
		$bp_pages = bp_core_get_directory_pages();
		// now, add the pages to our menu
		foreach ( $args['pages'] as $page ) {
			// default args
			$params = array(
				'menu-item-status'   => 'publish',
				'menu-item-title'    => $page['title'],
				// 'menu-item-attr-title' => ! empty( $page['attr-title'] ) ? $page['attr-title'] : $page['title'],
				'menu-item-classes'  => 'icon-' . ! empty( $page['bp_directory'] ) ? $page['bp_directory'] : sanitize_title( $page['title'] ),
				'menu-item-position' => $page['position'],
			);
			// support custom menu type
			if ( ! empty( $page['type'] ) ) {
				$params['menu-item-type'] = $page['type'];
			}
			// support custom url
			if ( ! empty( $page['url'] ) ) {
				$params['menu-item-url'] = $page['url'];
			}
			// add additional args for bp directories
			if ( ! empty( $page['bp_directory'] ) ) {
				// bp directory page doesn't exist, so stop!
				if ( ! array_key_exists( $page['bp_directory'], get_object_vars( $bp_pages ) ) ) {
					continue;
				}
				// yep, add page as a nav item
				$params['menu-item-type']      = 'post_type';
				$params['menu-item-object']    = 'page';
				$params['menu-item-object-id'] = $bp_pages->{$page['bp_directory']}->id;
			}
			wp_update_nav_menu_item( $menu_id, 0, $params );
			$params = array();
		}
		// get location settings
		$locations = get_theme_mod( 'nav_menu_locations' );
		// is our menu location set yet?
		if ( empty( $locations[ $args['location'] ] ) ) {
			// nope, set it
			$locations[ $args['location'] ] = $menu_id;
			// update theme mode
			set_theme_mod( 'nav_menu_locations', $locations );
		}

		return true;
	}
}

/**
 * Default Welcome Text on the Hero Homepage
 *
 */
function wff_homepage_welcome_text() {
	if ( function_exists( 'bp_is_active' ) ) {
		printf( __( '<p>You can use this space to welcome new and returning visitors! Maybe tell them something about your community and why they should become a member? What is the most important thing you want people to know about your site when they first visit? This is the place to do it!</p>
		<p>You can edit the text in this header by editing your Homepage template in the WordPress Admin.</p>
		<p>
		<a class="btn btn-success btn-lg" href="%s"><i class="fa fa-user-plus"></i> Create Your Account</a></p>', 'wefoster' ), bp_get_root_domain() . '/' . bp_get_signup_slug() . '/', wp_login_url() );
	} else {
		printf( __( '<p>You can use this space to welcome new and returning visitors! Maybe tell them something about your community and why they should become a member? What is the most important thing you want people to know about your site when they first visit? This is the place to do it!</p>
		<p>You can edit the text in this header by editing your Homepage template in the WordPress Admin.</p>
		<p>
		<a class="btn btn-primary btn-success" href="%s">Read More About Us</a></p>', 'wefoster' ), get_site_url() . '/about-us' );
	}
}

}
