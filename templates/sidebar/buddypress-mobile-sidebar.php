<div id="buddypress-mobile-sidebar" class="sidebar">

	<?php do_action('before_bp_mobile_sidebar'); ?>
		<div class="inner-sidebar <?php do_action('class_inner_sidebar'); ?> inner-sidebar-mobile">

			  <a id="close-buddypress-mobile-sidebar" class="close-panel-button" href="#">
					<i class="fa fa-times-circle"></i> Close menu
				</a>

				<?php do_action( 'open_bp_mobile_sidebar' ); ?>
				<?php do_action( 'close_mobile_sidebar' ); ?>

		</div>
	<?php do_action('after_bp_mobile_sidebar'); ?>
</div>
