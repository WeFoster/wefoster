<div class="<?php do_action( 'wf_class_container' ); ?> site-description-wrap">
	<?php do_action( 'wf_open_site_description' ); ?>
	<div class="site-description-wrap wf-grid wf-grid--align-center">
		<div class="site-description navigation-font">
			<a href="<?php echo get_home_url() ?>">
				<?php do_action( 'wf_inside_site_description' ); ?>
			</a>
		</div>

		<div class="inside-menu">
			<?php do_action( 'wf_after_site_description' ); ?>
		</div>
	</div>
	<?php do_action( 'wf_close_site_description' ); ?>
</div>
