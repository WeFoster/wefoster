<div class="container bp-cover-photo-content">
  <div class="inner-cover-photo col-sm-9">
    <div class="page-header buddypress-component-title">


  <h1>
    bowe  	  		<span class="user-nicename">@bowe</span>
      <span class="activity">active 1 minute ago</span>
  	  </h1>


</div>
    <div class="wf-member-action-button">
    <?php //do_action( 'bp_member_header_actions' ); ?>
    </div>
  </div>

  <div class="sidebar col-sm-3">
    <div id="item-header-avatar">
        <?php
        $userLink = bp_get_loggedin_user_link();
        if ( bp_is_my_profile() ): ?>
        <a href="<?php echo $userLink ?>profile/change-avatar/">
          <i class="fa fa-camera"></i>
      </a>
    <?php endif; ?>


    <?php bp_displayed_user_avatar( 'type=full' ); ?>




    </div><!-- #item-header-avatar -->
  </div>
</div>
