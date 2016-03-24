<?php
// This is the navigation top left on mobile. It triggers the off-canvas slide-out sidebar.
// When BuddyPress is active it show the avatar and notifications as well.
?>

<a id="buddypress-mobile-user-navigation-trigger" class="visible-xs navigation-trigger" href="#buddypress-mobile-user-navigation">
	<button type="button" class="navbar-toggle navbar-toggle-left bp-navbar-toggle">
		<span class="sr-only"><?php _e( 'Toggle Sidebar', 'wefoster' ); ?> </span>
		<span class="icon-bar top-bar"></span>
		<span class="icon-bar middle-bar"></span>
		<span class="icon-bar bottom-bar"></span>
	</button>

	<div class="bp-nav-avatar">
		<?php if ( class_exists( 'BuddyPress' ) && is_user_logged_in() ): ?>
			<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
		<?php else: ?>
			<i class="fa fa-user"></i>
		<?php endif; ?>
	</div>
</a>

<?php if ( class_exists( 'BuddyPress' ) && is_user_logged_in() ): ?>
	<div class="mobile-notifications visible-xs">
		<?php wff_bp_notifications_menu(); ?>
	</div>
<?php endif; ?>
