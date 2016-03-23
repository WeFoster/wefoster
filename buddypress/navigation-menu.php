<?php do_action('before_bp_navigation_menu'); ?>
<?php  if ( function_exists( 'bp_is_member' ) ):  ?>

<ul id="bp-user-navigation" class="nav navbar-nav <?php do_action('class_bp_menu'); ?>">

	<?php do_action('open_bp_navigation_menu'); ?>
	<?php if ( is_user_logged_in() ): ?>

		<?php wff_bp_notifications_menu(); ?>

		<li id="bp-profile-menu" class="dropdown menu-groups">

			<a href="<?php echo bp_get_loggedin_user_link(); ?>" data-target="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo bp_loggedin_user_avatar( 'type=thumb&width=70&height=70' ); ?>
					<?php if ( get_theme_mod( 'wf_plus_bp_menu_user_name', 'no') == 'yes' ) :?>
						<span class="bp-profile-menu-name">
						 <?php echo bp_core_get_user_displayname( bp_loggedin_user_id() );?>
						</span>
					<?php else : ?>
						<span class="visible-xs bp-profile-menu-name">
						<?php echo bp_core_get_user_displayname( bp_loggedin_user_id() );?>
					</span>
					<?php endif;?>
			</a>

		<?php wff_bp_navigation_menu(); ?>

		</li>

	<?php do_action('inside_logged_in_menu'); ?>

	<?php else: ?>

		<li class="dropdown menu-groups">

			<a href="/menu/" data-target="#" data-toggle="dropdown" class="dropdown-toggle">
				<i class="fa fa-sign-in"></i> <?php _e('Log In', 'wefoster'); ?>
			</a>

				<ul class="dropdown-menu">
					<li>

						<div>
							<?php wp_login_form();?>
						</div>

						<?php do_action('inside_logged_out_menu'); ?>

					</li>
				</ul>
		</li>

		<?php if ( get_option( 'users_can_register' ) ): ?>
			<li class="menu-register">

				<a href="<?php echo bp_get_signup_page()?>">
					<i class="fa fa-user"></i> <?php _e('Register', 'wefoster'); ?>
				</a>

			</li>
		<?php endif; ?>

	<?php endif; ?>
	<?php do_action('close_bp_navigation_menu'); ?>

</ul>

<?php endif; ?>
