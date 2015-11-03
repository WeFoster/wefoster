<?php do_action('before_primary_navigation'); ?>
<nav class="collapse navbar-collapse <?php do_action('class_navbar'); ?>" role="navigation">
		 <?php do_action('open_primary_navigation'); ?>
          <?php
              wp_nav_menu(array(
									'theme_location' => 'primary_navigation',
              		'menu' => 'Primary Navigation',
              		'fallback_cb'    => 'primary_navigation',
              		'menu_class' => 'nav navbar-nav navbar-primary'));
          ?>

          <?php do_action('close_primary_navigation'); ?>

</nav>
<?php do_action('before_primary_navigation'); ?>
