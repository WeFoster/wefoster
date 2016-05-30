<?php
/**
 * Provide Support for BuddyPress Media
 * https://rtmedia.io/docs/developers/themes/theme-media-tab/
 * @since 1.0.0
 */
if ( ! function_exists( 'rtmedia_autoloader' ) ) {
	function wff_rtmedia_main_template_include($template, $new_rt_template){
			global $wp_query;
			$wp_query->is_page = true;
			return locate_template('buddypress.php');
	}
	add_filter('rtmedia_main_template_include', 'wff_rtmedia_main_template_include', 20, 2);
}
