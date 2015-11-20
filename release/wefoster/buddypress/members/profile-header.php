<?php do_action('before_bp_profile_sidebar'); ?>
<div id="profile-sidebar" class="widget">
<?php do_action('open_bp_profile_sidebar'); ?>
    <div id="item-header-avatar">
        <?php
        $userLink = bp_get_loggedin_user_link();
        if ( bp_is_my_profile() ): ?>
        <a href="<?php echo $userLink ?>profile/change-avatar/">
          <i class="fa fa-camera"></i>
      </a>
    <?php endif; ?>

    <a href="<?php bp_user_link(); ?>">
        <?php bp_displayed_user_avatar( 'type=full' ); ?>
    </a>

    <div class="wf-member-action-button">
    <?php do_action( 'bp_member_header_actions' ); ?>
    </div>

    </div><!-- #item-header-avatar -->

   <?php /* Show Quick Menu for own Profile page */ if ( bp_is_my_profile() ) : ?>
                <div id="quick-menu-wrap" class="js-flash">
                <div id="profile-quick-menu">
                    <?php $userLink = bp_get_loggedin_user_link();?>
                    <select name="forma" onchange="location = this.options[this.selectedIndex].value;">

                    <optgroup label="<?php _e('Quick Links', 'wefoster'); ?>">
                        <option value="<?php echo $userLink; ?>profile/edit/"><?php _e('Edit Profile', 'wefoster'); ?></option>
                        <option value="<?php echo $userLink; ?>profile/change-avatar/"><?php _e('Change Avatar', 'wefoster'); ?></option>
                    </optgroup>
                    <optgroup label="<?php _e('Settings', 'wefoster'); ?>">
                        <option value="<?php echo $userLink; ?>settings/"><?php _e('Email and Password settings', 'wefoster'); ?> </option>
                        <option value="<?php echo wp_logout_url( wp_guess_url() ); ?>"><?php _e('Log Out', 'buddypress'); ?>   </option>
                    </optgroup>

                      </select>
                </div>
                </div>
    <?php endif; ?>
</div>
