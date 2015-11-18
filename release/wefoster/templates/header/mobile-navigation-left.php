<?php
// This is the navigation top left on mobile. It triggers the off-canvas slide-out sidebar.
// When BuddyPress is active it show the avatar and notifications as well.
?>

<button type="button" class="navbar-toggle navbar-toggle-left" data-toggle="offcanvas">
  <span class="sr-only"><?php _e('Toggle Sidebar', 'wefoster'); ?>  </span>
      <?php if ( class_exists( 'BuddyPress' ) && is_user_logged_in() ): ?>
        <?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
      <?php endif; ?>
    <i class="fa fa-chevron-circle-right"></i>
</button>

<?php if ( class_exists( 'BuddyPress' ) && is_user_logged_in() ): ?>
  <div class="mobile-notifications hidden-md hidden-lg">
    <?php wff_bp_notifications_menu(); ?>
  </div>
<?php endif; ?>
