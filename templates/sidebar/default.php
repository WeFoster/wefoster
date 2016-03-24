<aside id="sidebar-content" class="sidebar sidebar-offcanvas <?php do_action( 'class_sidebar' ); ?>" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<div class="inner-sidebar <?php do_action( 'class_inner_sidebar' ); ?>">

		<?php do_action( 'open_sidebar' ); ?>
		<?php wff_base_sidebars(); ?>
		<?php do_action( 'close_sidebar' ); ?>

	</div>
	<?php do_action( 'after_sidebar' ); ?>
</aside><!-- /.sidebar -->
