<?php
// This is the navigation top right on mobile. It shows our navigation menus on tab/click
?>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  <span class="sr-only"><?php _e('Toggle Navigation', 'wefoster'); ?></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>


<div class="hidden-md hidden-lg">
<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <?php echo apply_filters( 'wff_mobile_logo', $logo ); ?>
</a>
</div>
