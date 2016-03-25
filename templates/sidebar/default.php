<aside id="sidebar-content" class="sidebar sidebar-offcanvas <?php do_action( 'wf_class_sidebar' ); ?>" role="complementary">
	<?php do_action( 'wf_before_sidebar' ); ?>
	<div class="inner-sidebar <?php do_action( 'wf_class_inner_sidebar' ); ?>">

		<?php do_action( 'wf_open_sidebar' ); ?>
		<?php wff_base_sidebars(); ?>
		<?php do_action( 'wf_close_sidebar' ); ?>

	</div>
	<?php do_action( 'wf_after_sidebar' ); ?>
</aside><!-- /.sidebar -->
