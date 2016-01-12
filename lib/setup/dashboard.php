<?php
/**
 * Enqueue the stylesheet.
 */
function wf_admin_welcome_css() {

		// Register path
		$path = get_template_directory_uri() . '/assets';

		wp_register_script( 'wff_scripts_admin', $path . '/js/scripts.min.js' );
		// Enqueue our Main Stylesheet.
		wp_enqueue_style( 'wff_admin_css', $path . '/css/admin.css' );

}
add_action( 'admin_enqueue_scripts', 'wf_admin_welcome_css' );

function wff_enqueue_admin_scripts() {
		$path = get_template_directory_uri() . '/assets';
    wp_enqueue_script( 'wff_scripts_admin', $path . '/js/scripts.min.js' );
}
add_action( 'admin_enqueue_scripts', 'wff_enqueue_admin_scripts' );


function wff_welcome_screen_activate() {
  set_transient( '_wf_welcome_screen_activation_redirect', true, 30 );
}
add_action( 'after_switch_theme', 'wff_welcome_screen_activate' );

function wff_welcome_screen_do_activation_redirect() {
  // Bail if no activation redirect
    if ( ! get_transient( '_wf_welcome_screen_activation_redirect' ) ) {
    return;
  }

  // Delete the redirect transient
  delete_transient( '_wf_welcome_screen_activation_redirect' );

  // Bail if activating from network, or bulk
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    return;
  }

  // Redirect to WeFoster Welcome Page
  wp_safe_redirect( add_query_arg( array( 'page' => 'wefoster-welcome' ), admin_url( 'index.php' ) ) );

}
add_action( 'admin_init', 'wff_welcome_screen_do_activation_redirect' );

add_action('admin_menu', 'wff_welcome_screen_pages');
function wff_welcome_screen_pages() {
  add_dashboard_page(
    'Thank you for using the WeFoster Theme',
    'Thank you for using the WeFoster Theme',
    'read',
    'wefoster-welcome',
    'wff_welcome_wefoster_content'
  );
}

function wff_welcome_wefoster_content() {
	require_once WEFOSTER_THEME_DIR . '/lib/setup/dashboard-templates/index.php';
}

add_action( 'admin_head', 'wff_welcome_screen_remove_menus' );
function wff_welcome_screen_remove_menus() {
    remove_submenu_page( 'index.php', 'wefoster-welcome' );
}
?>
