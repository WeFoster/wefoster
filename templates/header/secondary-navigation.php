<?php
if ( has_nav_menu( 'secondary_navigation' ) ) {
do_action('before_secondary_header_navigation');
?>
<div class="secondary-nav-wrap navbar-collapse container-fluid <?php do_action('class_container_secondary_navbar'); ?> box-light" role="navigation">
<div class="container">
		<nav class="collapse navbar navbar-collapse <?php do_action('class_navbar'); ?>" role="navigation">
				 <?php do_action('open_header_navigation_secondary'); ?>
		          <?php
		              wp_nav_menu(array(
											'theme_location' => 'secondary_navigation',
		              		'menu' => 'Secondary Navigation',
		              		'fallback_cb'    => 'secondary_navigation',
		              		'menu_class' => 'nav navbar-nav navbar-secondary'));
		          ?>

		          <?php do_action('close_header_navigation_secondary'); ?>

		</nav>
</div>
</div>
<?php
}
do_action('after_secondary_header_navigation');
?>
