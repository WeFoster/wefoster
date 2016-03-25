<?php do_action( 'wf_before_primary_navigation' ); ?>
<nav class="collapse navbar-collapse primary-nav-wrap <?php do_action( 'wf_class_navbar' ); ?>" role="navigation">
	<?php do_action( 'wf_open_primary_navigation' ); ?>

	<div class="nav navbar-nav navbar-primary <?php do_action( 'wf_class_primary_menu' ); ?>">
		<?php do_action( 'wf_inside_primary_navigation' ); ?>
		<?php
		wp_nav_menu( array(
			             'theme_location' => 'primary_navigation',
			             'menu'           => 'Primary Navigation',
			             'fallback_cb'    => 'wf_menu_fallback',
			             'menu_class'     => 'nav navbar-nav navbar-primary',
			             'container'      => false
		             ) );
		?>
	</div>
	<?php do_action( 'wf_close_primary_navigation' ); ?>
</nav>
