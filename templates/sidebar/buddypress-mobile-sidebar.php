<div id="buddypress-mobile-sidebar" class="sidebar">
	<?php do_action('before_sidebar'); ?>
		<div class="inner-sidebar <?php do_action('class_inner_sidebar'); ?>">


			<?php
			//This action is used to load the profile avatar.
			do_action('before_bp_profile_sidebar_navigation');
			?>

			<div id="user-sidebar-menu" class="widget">
						<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
							 <?php $userLink = bp_get_loggedin_user_link();?>
							 <?php echo bp_core_get_user_displayname( bp_loggedin_user_id() );?><br>
							<a class="no-ajax" href="<?php echo $userLink; ?>"><?php _e('View Profile.', 'wefoster'); ?>	</a>
			</div>

			<div id="buddypress-sidebar-navigation">
					<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
							<?php
								wff_bp_sidebar_navigation_menu();
							 ?>
					</div>
			</div>

		</div>
	<?php do_action('after_sidebar'); ?>
</div>
