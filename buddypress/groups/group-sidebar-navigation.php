<?php do_action('before_bp_group_navigation'); ?>
<div id="group-navigation" class="widget"> 
<?php do_action('open_bp_group_navigation'); ?>
        <div id="item-header-avatar">
          <?php bp_group_avatar() ?>
          <div class="wf-group-action-button">
          <?php do_action( 'bp_group_header_actions' ); ?>
          </div>
        </div>
</div>  
<?php do_action('before_bp_group_sidebar_navigation'); ?>   
<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
<?php do_action('open_bp_group_sidebar_navigation'); ?>
	<ul id="object-nav" class="sidebar-nav">
		<?php bp_get_options_nav(); ?>
		<?php do_action( 'bp_group_options_nav' ); ?>
	</ul>
<?php do_action('close_bp_group_sidebar_navigation'); ?>
</div>
<?php do_action('after_bp_group_sidebar_navigation'); ?>
