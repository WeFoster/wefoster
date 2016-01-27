<?php
// This is the navigation top right on mobile. It shows our navigation menus on tab/click
?>

<a id="mobile-primary-navigation-menu" href="#mobile-primary-navigation-menu">
<button type="button" class="navbar-toggle">
  <span class="sr-only"><?php _e('Toggle Navigation', 'wefoster'); ?></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
</a>



<div class="hidden-md hidden-lg">
<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <?php echo apply_filters( 'wff_mobile_logo', $logo ); ?>
</a>
</div>
