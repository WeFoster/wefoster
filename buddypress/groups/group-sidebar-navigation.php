<?php do_action( 'wf_before_bp_group_sidebar_navigation' ); ?>
<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
	<?php do_action( 'wf_open_bp_group_sidebar_navigation' ); ?>
	<ul id="object-nav" class="sidebar-nav">
		<?php do_action( 'wf_before_group_options_nav' ); ?>
		<?php bp_get_options_nav(); ?>
		<?php do_action( 'wf_bp_group_options_nav' ); ?>
	</ul>
	<?php do_action( 'wf_close_bp_group_sidebar_navigation' ); ?>
</div>
<?php do_action( 'wf_after_bp_group_sidebar_navigation' ); ?>
