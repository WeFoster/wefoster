<div id="mobile-sidebar" class="sidebar">
	<?php do_action('before_sidebar'); ?>
		<div class="inner-sidebar <?php do_action('class_inner_sidebar'); ?>">

				<?php do_action( 'open_sidebar' ); ?>
				<?php wff_base_sidebars(); ?>
				<?php do_action( 'close_sidebar' ); ?>

		</div>
	<?php do_action('after_sidebar'); ?>
</div>
