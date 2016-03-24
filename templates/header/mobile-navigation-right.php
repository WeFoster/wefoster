<?php
// This is the navigation top right on mobile. It shows our navigation menus on tab/click
?>
<a id="mobile-primary-navigation-menu-trigger" class="visible-xs navigation-trigger right" href="#mobile-primary-navigation">
	<button type="button" class="navbar-toggle collapsed active" data-toggle="collapse" data-target="#navigation">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar top-bar"></span>
		<span class="icon-bar middle-bar"></span>
		<span class="icon-bar bottom-bar"></span>
	</button>
</a>

<div class="visible-xs">
	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php echo apply_filters( 'wff_mobile_logo', $logo ); ?>
	</a>
</div>
