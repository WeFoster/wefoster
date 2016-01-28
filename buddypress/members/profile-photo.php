<div id="member-photo" class="widget">
  <div id="item-header-avatar">
      <?php
      $userLink = bp_get_loggedin_user_link();
      if ( bp_is_my_profile() ): ?>
      <a href="<?php echo $userLink ?>profile/change-avatar/">
        <i class="fa fa-camera"></i>
      </a>
    <?php endif; ?>

    <?php bp_displayed_user_avatar( 'type=full' ); ?>

  </div>
</div>
