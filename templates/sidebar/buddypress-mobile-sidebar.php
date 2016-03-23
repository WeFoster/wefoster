<div id="buddypress-mobile-sidebar" class="sidebar js-flash">

	<?php do_action('before_bp_mobile_sidebar'); ?>
		<div class="inner-sidebar <?php do_action('class_inner_sidebar'); ?> inner-sidebar-mobile">


			  <a id="close-buddypress-mobile-sidebar" class="close-panel-button" href="#">
					<i class="fa fa-times-circle"></i> Close menu
				</a>

				<?php if ( bp_is_user() ): ?>
					<div id="user-sidebar-menu" class="widget">
								<?php bp_displayed_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
									 <?php $userLink = bp_get_displayed_user_link();?>
									 <strong><?php echo bp_core_get_user_displayname( bp_displayed_user_id() );?></strong>
									 <br>
					</div>
				<?php endif; ?>

				<?php do_action( 'open_bp_mobile_sidebar' ); ?>
				<?php do_action( 'close_mobile_sidebar' ); ?>

		</div>
	<?php do_action('after_bp_mobile_sidebar'); ?>
</div>
