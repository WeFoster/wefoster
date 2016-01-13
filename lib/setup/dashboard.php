<?php
/**
 * Enqueue a custom stylesheet and script for our Admin page
 */
function wf_admin_welcome_css() {

	$screen = get_current_screen();
	if (is_object($screen) && $screen->id == 'dashboard_page_wefoster-welcome') {

		// Register path
		$path = get_template_directory_uri() . '/assets';

		wp_register_script( 'wff_scripts_admin', $path . '/js/scripts.min.js' );
		// Enqueue our Main Stylesheet.
		wp_enqueue_style( 'wff_admin_css', $path . '/css/admin.css' );

		wp_enqueue_script( 'wff_scripts_admin' );

	}

}
add_action( 'admin_enqueue_scripts', 'wf_admin_welcome_css' );

//
function wff_welcome_screen_activate() {
  set_transient( '_wff_welcome_screen_activation_redirect', true, 30 );
}
add_action( 'after_switch_theme', 'wff_welcome_screen_activate' );

function wff_welcome_screen_do_activation_redirect() {
  // Bail if no activation redirect
    if ( ! get_transient( '_wff_welcome_screen_activation_redirect' ) ) {
    return;
  }

  // Delete the redirect transient
  delete_transient( '_wff_welcome_screen_activation_redirect' );

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

function wff_welcome_screen_remove_menus() {
    remove_submenu_page( 'index.php', 'wefoster-welcome' );
}
add_action( 'admin_head', 'wff_welcome_screen_remove_menus' );

// Grab the latest posts from our community via a REST API or transient.
function wff_get_community_posts() {
	$posts = get_transient( 'wf_community_news' );
	if( empty( $posts ) ) {
		$response = wp_remote_get( 'https://wefoster.co/wp-json/wp/v2/posts/?filter[orderby]=date&per_page=6' );
		if( is_wp_error( $response ) ) {
			return array();
		}

		$posts = json_decode( wp_remote_retrieve_body( $response ) );

		if( empty( $posts ) ) {
			return array();
		}

		set_transient( 'wf_community_news', $posts, HOUR_IN_SECONDS * 24 );
	}

	return $posts;
}

// Grab the latest Docs from documentation via REST API or transient.
function wff_get_theme_docs() {
	$posts = get_transient( 'wf_theme_docs' );
	if( empty( $posts ) ) {
		$response = wp_remote_get( 'https://documentation.wefoster.co/wp-json/wp/v2/wpkb-article?filter[taxonomy]=wpkb-category&filter[term]=wefoster-theme' );
		if( is_wp_error( $response ) ) {
			return array();
		}

		$posts = json_decode( wp_remote_retrieve_body( $response ) );

		if( empty( $posts ) ) {
			return array();
		}

		set_transient( 'wf_theme_docs', $posts, HOUR_IN_SECONDS * 24 );
	}

	return $posts;
}

// Grab the latest developer docs from our Documentation via a REST API or transient.
function wff_get_developer_docs() {
	$posts = get_transient( 'wf_developer_docs' );
	if( empty( $posts ) ) {
		$response = wp_remote_get( 'https://documentation.wefoster.co/wp-json/wp/v2/wpkb-article?filter[taxonomy]=wpkb-category&filter[term]=developers' );
		if( is_wp_error( $response ) ) {
			return array();
		}

		$posts = json_decode( wp_remote_retrieve_body( $response ) );

		if( empty( $posts ) ) {
			return array();
		}

		set_transient( 'wf_developer_docs', $posts, HOUR_IN_SECONDS * 24 );
	}

	return $posts;
}
?>
