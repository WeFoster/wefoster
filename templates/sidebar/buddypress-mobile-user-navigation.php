<div id="buddypress-mobile-user-navigation" class="sidebar js-flash">
	<?php do_action( 'before_sidebar' ); ?>
	<div class="inner-sidebar <?php do_action( 'class_inner_sidebar' ); ?>">

		<a id="close-buddypress-mobile-user-navigation" class="close-panel-button" href="#">
			<i class="fa fa-times-circle"></i> Close menu
		</a>

		<?php if ( is_user_logged_in() ): ?>

			<div id="user-sidebar-menu" class="widget">
				<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
				<?php $userLink = bp_get_loggedin_user_link(); ?>
				<?php echo bp_core_get_user_displayname( bp_loggedin_user_id() ); ?><br>
			</div>

			<div id="buddypress-sidebar-navigation">
				<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
					<?php
					wff_bp_sidebar_navigation_menu();
					?>
				</div>
			</div>

		<?php else: ?>

			<div class="buddypress-login-menu widget">

				<h4><i class="fa fa-sign-in"></i><?php _e( 'Log In', 'wefoster' ); ?></h4>
				<?php wp_login_form(); ?>
				<?php do_action( 'inside_logged_out_menu' ); ?>

				<hr>
				<?php if ( get_option( 'users_can_register' ) ): ?>
					<a class="btn btn-success" href="<?php echo bp_get_signup_page() ?>">
						<i class="fa fa-user"></i> <?php _e( 'Create Your Account', 'wefoster' ); ?>
					</a>
				<?php endif; ?>
			</div>

		<?php endif; ?>

	</div>
	<?php do_action( 'after_sidebar' ); ?>
</div>
