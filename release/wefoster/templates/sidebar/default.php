<?php do_action('before_sidebar'); ?>

		<aside class="sidebar sidebar-offcanvas <?php do_action('class_sidebar'); ?>" role="complementary">

			<div class="inner-sidebar">

					<?php do_action( 'open_sidebar' ); ?>
					<?php wff_base_sidebars(); ?>
					<?php do_action( 'close_sidebar' ); ?>

			</div>

		</aside><!-- /.sidebar -->

<?php do_action('after_sidebar'); ?>
