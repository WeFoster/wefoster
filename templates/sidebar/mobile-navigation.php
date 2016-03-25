<div id="mobile-primary-navigation" class="sidebar js-flash">
	<?php do_action( 'wf_before_mobile_sidebar' ); ?>

	<div class="inner-sidebar <?php do_action( 'wf_class_inner_sidebar' ); ?> inner-sidebar-mobile">

		<a id="close-mobile-primary-navigation" class="close-panel-button" href="#">
			<i class="fa fa-times-circle"></i> Close menu
		</a>

		<h4>
			<?php
			$menu_location  = 'primary_navigation';
			$menu_locations = get_nav_menu_locations();
			$menu_object    = ( isset( $menu_locations[ $menu_location ] ) ? wp_get_nav_menu_object( $menu_locations[ $menu_location ] ) : null );
			$menu_name      = ( isset( $menu_object->name ) ? $menu_object->name : '' );
			echo esc_html( $menu_name );
			?>
		</h4>

		<?php get_template_part( 'templates/header/primary-navigation' ); ?>

		<h4>
			<?php
			$menu_location  = 'secondary_navigation';
			$menu_locations = get_nav_menu_locations();
			$menu_object    = ( isset( $menu_locations[ $menu_location ] ) ? wp_get_nav_menu_object( $menu_locations[ $menu_location ] ) : null );
			$menu_name      = ( isset( $menu_object->name ) ? $menu_object->name : '' );
			echo esc_html( $menu_name );
			?>
		</h4>


		<?php get_template_part( 'templates/header/secondary-navigation' ); ?>


	</div>
	<?php do_action( 'wf_after_mobile_sidebar' ); ?>
</div>
