<?php
/**
* This file is only here to comply with the WP.org theme guidelines. Not cool.
*
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
