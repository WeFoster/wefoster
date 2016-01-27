<?php
/**
* @since 1.0
* @package WeFoster Framework
*/
//
//Load our default sidebar. See our developer docs to learn more about
// conditionally loading sidebars.
?>

<?php
	get_template_part( 'templates/sidebar/' . wff_get_sidebar_type() );
?>
