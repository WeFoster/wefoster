<?php if ( is_user_logged_in() ) : ?>
	<div id="user-sidebar-menu" class="widget hidden-sm">
		<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
		<?php $userLink = bp_get_loggedin_user_link(); ?>
		<?php echo bp_core_get_user_displayname( bp_loggedin_user_id() ); ?><br>
		<a class="no-ajax" href="<?php echo $userLink; ?>"><?php _e( 'View Profile.', 'wefoster' ); ?>    </a>
	</div>
<?php endif; ?>


<div id="vertical-activity-tabs" class="activity-type-tabs item-list-tabs widget vertical-list-tabs" role="navigation">
	<?php if ( ! is_user_logged_in() ) : ?>
		<h4><?php _e( 'Activity Filters', 'wefoster' ); ?></h4>
	<?php endif; ?>
	<ul>
		<?php do_action( 'wf_bp_before_activity_type_tab_all' ); ?>

		<li class="selected" id="activity-all"><a href="<?php bp_activity_directory_permalink(); ?>"
		                                          title="<?php esc_attr_e( 'The public activity for everyone on this site.', 'buddypress' ); ?>"><?php printf( __( 'All Members <span>%s</span>', 'buddypress' ), bp_get_total_member_count() ); ?></a>
		</li>

		<?php if ( is_user_logged_in() ) : ?>

			<?php do_action( 'wf_bp_before_activity_type_tab_friends' ); ?>

			<?php if ( bp_is_active( 'friends' ) ) : ?>

				<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>

					<li id="activity-friends"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>"
					                             title="<?php esc_attr_e( 'The activity of my friends only.', 'buddypress' ); ?>"><?php printf( __( 'My Friends <span>%s</span>', 'buddypress' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a>
					</li>

				<?php endif; ?>

			<?php endif; ?>

			<?php do_action( 'wf_bp_before_activity_type_tab_groups' ); ?>

			<?php if ( bp_is_active( 'groups' ) ) : ?>

				<?php if ( bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

					<li id="activity-groups"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_groups_slug() . '/'; ?>"
					                            title="<?php esc_attr_e( 'The activity of groups I am a member of.', 'buddypress' ); ?>"><?php printf( __( 'My Groups <span>%s</span>', 'buddypress' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a>
					</li>

				<?php endif; ?>

			<?php endif; ?>

			<?php do_action( 'wf_bp_before_activity_type_tab_favorites' ); ?>

			<?php if ( bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ) : ?>

				<li id="activity-favorites"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/favorites/'; ?>"
				                               title="<?php esc_attr_e( "The activity I've marked as a favorite.", 'buddypress' ); ?>"><?php printf( __( 'My Favorites <span>%s</span>', 'buddypress' ), bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ); ?></a>
				</li>

			<?php endif; ?>

			<?php if ( bp_activity_do_mentions() ) : ?>

				<?php do_action( 'wf_bp_before_activity_type_tab_mentions' ); ?>

				<li id="activity-mentions"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/mentions/'; ?>"
				                              title="<?php esc_attr_e( 'Activity that I have been mentioned in.', 'buddypress' ); ?>"><?php _e( 'Mentions', 'buddypress' ); ?><?php if ( bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ) : ?>
							<strong>
							<span><?php printf( _nx( '%s new', '%s new', bp_get_total_mention_count_for_user( bp_loggedin_user_id() ), 'Number of new activity mentions', 'buddypress' ), bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ); ?></span>
							</strong><?php endif; ?></a></li>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'wf_bp_activity_type_tabs' ); ?>

	</ul>

</div>
