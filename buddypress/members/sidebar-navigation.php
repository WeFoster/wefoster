<?php
//This action is used to load the profile avatar.
do_action('before_bp_profile_sidebar_navigation');
?>
<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
<?php do_action('open_bp_profile_sidebar_navigation'); ?>
   <ul id="object-nav" class="sidebar-nav">
      <?php bp_get_displayed_user_nav(); ?>
  </ul>
<?php do_action('close_bp_profile_sidebar_navigation'); ?>
</div>
<?php do_action('after_bp_profile_sidebar'); ?>
