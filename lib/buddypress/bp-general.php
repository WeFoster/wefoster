<?php
/**
 * Common BuddyPress functions
 */

if ( ! function_exists( 'wff_base_wordpress_page' ) ) {
	/**
	 * Add class when it's not a BuddyPress page
	 *
	 * @since 1.0.0
	 */
	function wff_base_wordpress_page( $classes ) {
		if ( ! is_buddypress() && ! is_front_page() ) {
			// *append* class to the array
			$classes[] = 'wordpress-page';
		}

		// return it!
		return $classes;
	}

	add_filter( 'body_class', 'wff_base_wordpress_page' );
}

/**
 * Make sure BuddyPress items that are attached to 'bp_head' are added to WeFoster
 * Theme.
 *
 * 'bp_head' is a hook that is hardcoded in bp-default's header.php.  So we
 * add the same hook here attached to the 'wp_head' action.
 *
 * This hook is used by BP to add activity item feeds.  Other plugins like
 * BuddyPress Courseware also uses this hook.
 */
function wff_add_bp_head() {
	do_action( 'bp_head' );
}

add_action( 'wp_head', 'wff_add_bp_head' );


/**
 * Populate the $groups_template global for use outside the loop
 *
 * We build the group navigation outside the groups loop. In order to use BP's
 * group template functions while building the nav, we must have the template
 * global populated. In this function, we fill in any missing data, based on
 * the current group.
 *
 * This issue should be fixed more elegantly upstream in BuddyPress, ideally
 * by making the template functions fall back on the current group when the
 * loop global is not populated.
 */
 function wff_populate_group_global() {
 	global $groups_template;
 	if ( bp_is_group() && isset( $groups_template->groups[0]->group_id ) && empty( $groups_template->groups[0]->name ) ) {
 		$current_group = groups_get_current_group();
 		// Fill in all missing properties
 		foreach ( $current_group as $cur_key => $cur_value ) {
 			if ( ! isset( $groups_template->groups[0]->{$cur_key} ) ) {
 				$groups_template->groups[0]->{$cur_key} = $cur_value;
 			}
 		}
 	}
 }

/**
 * Activity Stream Conditional
 *
 * @since 1.0.0
 */
if ( false == function_exists( 'wff_is_activity_page' ) ) {
	function wff_is_activity_page() {
		return ( bp_is_activity_component() && ! bp_is_user() );
	}
}

/**
 * Roll our custom Bootstrap Notifications
 *
 * @since 1.0
 */
function wff_bp_notifications_menu() {

	if ( ! is_user_logged_in() ) {
		return false;
	}

	echo '<li class="dropdown menu-groups notification-nav" id="bp-adminbar-notifications-menu"><a data-toggle="dropdown" class="dropdown-toggle has-submenu" href="' . esc_url( bp_loggedin_user_domain() ) . '"><i class="fa fa-bell"></i>';
	_e( '', 'buddypress' );

	if ( $notification_count = bp_notifications_get_unread_notification_count( bp_loggedin_user_id() ) ) : ?>
		<span id="notification-counter"><?php echo bp_core_number_format( $notification_count ); ?></span>
		<?php
	endif;

	echo '</a>';
	echo '<ul class="dropdown-menu">';

	if ( $notifications = bp_notifications_get_notifications_for_user( bp_loggedin_user_id() ) ) {
		$counter = 0;
		for ( $i = 0, $count = count( $notifications ); $i < $count; ++ $i ) {
			$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : ''; ?>

			<li<?php echo $alt ?>><?php echo $notifications[ $i ] ?></li>

			<?php $counter ++;
		}
	} else { ?>

		<li>
			<a href="<?php echo esc_url( bp_loggedin_user_domain() ); ?>">
				<?php _e( 'No new notifications.', 'buddypress' ); ?>
			</a>
		</li>

		<?php
	}

	echo '</ul>';
	echo '</li>';
}

/**
 * Roll our our Bootstrap powered BuddyPress navigation
 *
 * @since 1.0
 */
function wff_bp_navigation_menu() {
	global $bp;

	if ( ! $bp->bp_nav || ! is_user_logged_in() ) {
		return false;
	}

	echo '<ul class="dropdown-menu">';

	// Loop through each navigation item
	$counter = 0;
	foreach ( (array) $bp->bp_nav as $nav_item ) {
		$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : '';

		if ( - 1 == $nav_item['position'] ) {
			continue;
		}

		echo '<li' . $alt . '>';
		echo '<a id="bp-admin-' . $nav_item['css_id'] . '" href="' . $nav_item['link'] . '">' . $nav_item['name'] . '</a>';

		if ( isset( $bp->bp_options_nav[ $nav_item['slug'] ] ) && is_array( $bp->bp_options_nav[ $nav_item['slug'] ] ) ) {
			echo '<ul class="dropdown-menu">';
			$sub_counter = 0;

			foreach ( (array) $bp->bp_options_nav[ $nav_item['slug'] ] as $subnav_item ) {
				$link = $subnav_item['link'];
				$name = $subnav_item['name'];

				if ( bp_displayed_user_domain() ) {
					$link = str_replace( bp_displayed_user_domain(), bp_loggedin_user_domain(), $subnav_item['link'] );
				}

				if ( isset( $bp->displayed_user->userdata->user_login ) ) {
					$name = str_replace( $bp->displayed_user->userdata->user_login, $bp->loggedin_user->userdata->user_login, $subnav_item['name'] );
				}

				$alt = ( 0 == $sub_counter % 2 ) ? ' class="alt"' : '';
				echo '<li' . $alt . '><a id="bp-admin-' . $subnav_item['css_id'] . '" href="' . $link . '">' . $name . '</a></li>';
				$sub_counter ++;
			}
			echo '</ul>';
		}

		echo '</li>';

		$counter ++;
	}

	$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : '';

	echo '<li' . $alt . '><a id="bp-admin-logout" class="logout" href="' . wp_logout_url( home_url() ) . '">' . __( 'Log Out', 'buddypress' ) . '</a></li>';
	echo '</ul>';
}

/**
 * Roll our our Bootstrap powered BuddyPress navigation
 *
 * @since 1.0
 */
function wff_bp_sidebar_navigation_menu() {
	global $bp;

	if ( ! $bp->bp_nav || ! is_user_logged_in() ) {
		return false;
	}

	echo '<ul class="bp-sidebar-navigation sm sm-vertical">';

	// Loop through each navigation item
	$counter = 0;
	foreach ( (array) $bp->bp_nav as $nav_item ) {
		$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : '';

		if ( - 1 == $nav_item['position'] ) {
			continue;
		}

		echo '<li' . $alt . '>';
		echo '<a id="user-' . $nav_item['css_id'] . '" href="' . $nav_item['link'] . '">' . $nav_item['name'] . '</a>';

		if ( isset( $bp->bp_options_nav[ $nav_item['slug'] ] ) && is_array( $bp->bp_options_nav[ $nav_item['slug'] ] ) ) {
			echo '<ul class="sub-menu">';
			$sub_counter = 0;

			foreach ( (array) $bp->bp_options_nav[ $nav_item['slug'] ] as $subnav_item ) {
				$link = $subnav_item['link'];
				$name = $subnav_item['name'];

				if ( bp_displayed_user_domain() ) {
					$link = str_replace( bp_displayed_user_domain(), bp_loggedin_user_domain(), $subnav_item['link'] );
				}

				if ( isset( $bp->displayed_user->userdata->user_login ) ) {
					$name = str_replace( $bp->displayed_user->userdata->user_login, $bp->loggedin_user->userdata->user_login, $subnav_item['name'] );
				}

				$alt = ( 0 == $sub_counter % 2 ) ? ' class="alt"' : '';
				echo '<li' . $alt . '><a id="user-' . $subnav_item['css_id'] . '" href="' . $link . '">' . $name . '</a></li>';
				$sub_counter ++;
			}
			echo '</ul>';
		}

		echo '</li>';

		$counter ++;
	}
	$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : '';
	echo '<li' . $alt . '><a id="bp-admin-logout" class="logout" href="' . wp_logout_url( home_url() ) . '">' . __( 'Log Out', 'buddypress' ) . '</a></li>';
	echo '</ul>';
}
