<div id="mobile-sidebar" class="sidebar">

	<?php do_action('before_mobile_sidebar'); ?>
		<div class="inner-sidebar <?php do_action('class_inner_sidebar'); ?> inner-sidebar-mobile">

			  <a id="close-mobile-sidebar" class="close-panel-button" href="#">
					<i class="fa fa-times-circle"></i> Close menu
				</a>

				<?php do_action( 'open_mobile_sidebar' ); ?>
				<?php wff_base_sidebars(); ?>
				<?php do_action( 'close_mobile_sidebar' ); ?>

		</div>
	<?php do_action('after_mobile_sidebar'); ?>
</div>
