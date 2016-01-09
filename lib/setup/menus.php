<?php
/**
 * Register our custom menus and walker for Bootstrap menus
 *
 * @since 1.0
 * @package WeFoster Framework
 */

/**
 * Set up the menus (including the different language menus)
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_setup_menu' ) ) {
	function wff_setup_menu() {
		// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
   register_nav_menu( 'primary_navigation', __( 'Primary Navigation', 'wefoster' ) );

		// Register a second navigation menu for our full header layout
		if ( WEFOSTER_LAYOUT_PRESET == 'full' || get_theme_mod( 'wf_layout_type' ) == 'full' ) {
   		register_nav_menu( 'secondary_navigation', __( 'Secondary Navigation', 'wefoster' ) );
		}

	}
	add_action( 'after_setup_theme', 'wff_setup_menu' );
}


/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * wff_Nav_Walker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 */
class wff_Nav_Walker extends Walker_Nav_Menu {
	function check_current( $classes ) {
		return preg_match( '/(current[-_])|active|dropdown/', $classes );
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $item, $depth, $args );

		if ( $item->is_dropdown && ($depth === 0) ) {
			$item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html );
			$item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
		} elseif ( stristr( $item_html, 'li class="divider' ) ) {
			$item_html = preg_replace( '/<a[^>]*>.*?<\/a>/iU', '', $item_html );
		} elseif ( stristr( $item_html, 'li class="dropdown-header' ) ) {
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html );
		}

		$item_html = apply_filters( 'wff_wp_nav_menu_item', $item_html );
		$output .= $item_html;
	}

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->is_dropdown = (( ! empty( $children_elements[ $element->ID ] ) && (($depth + 1) < $max_depth || ($max_depth === 0))));

		if ( $element->is_dropdown ) {
			$element->classes[] = 'dropdown';
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}


/**
 * Remove the id="" on nav menu items
 * Return 'menu-slug' for nav menu classes
 */
function wff_nav_menu_css_class( $classes, $item ) {
	$slug = sanitize_title( $item->title );
	$classes = preg_replace( '/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes );
	$classes = preg_replace( '/^((menu|page)[-_\w+]+)+/', '', $classes );

	$classes[] = 'menu-' . $slug;

	$classes = array_unique( $classes );

	return array_filter( $classes, 'is_element_empty' );
}
add_filter( 'nav_menu_css_class', 'wff_nav_menu_css_class', 100, 2 );
add_filter( 'nav_menu_item_id', '__return_null' );

function add_filters( $tags, $function ) {
	foreach ( $tags as $tag ) {
		add_filter( $tag, $function );
	}
}

function is_element_empty( $element ) {
	$element = trim( $element );
	return empty( $element ) ? false : true;
}

/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 * Use wff_Nav_Walker() by default
 */
function wff_nav_menu_args( $args = '' ) {
	$wff_nav_menu_args['container'] = false;

	if ( ! $args['items_wrap'] ) {
		$wff_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
	}

	$wff_nav_menu_args['depth'] = 2;

	if ( ! $args['walker'] ) {
		$wff_nav_menu_args['walker'] = new wff_Nav_Walker();
	}

	return array_merge( $args, $wff_nav_menu_args );
}
add_filter( 'wp_nav_menu_args', 'wff_nav_menu_args' );

/**
 * Fix the annoying highlighing of Blog menu items.
 *
 * @since 1.0.0
 */
function wff_wp_nav_menu_objects( $sorted_menu_items, $args ) {
	// check if the current page is really a blog post.
	global $wp_query;
	global $post;
	$current_page = $post;
	if ( ! empty( $wp_query->queried_object_id ) ) {
		if ( $current_page && $current_page->post_type == 'post' ) {
			// yes!
		} else {
			$current_page = false;
		}
	} else {
		$current_page = false;
	}

	$home_page_id = (int) get_option( 'page_for_posts' );
	foreach ( $sorted_menu_items as $id => $menu_item ) {
		if ( ! empty( $home_page_id ) && 'post_type' == $menu_item->type && empty( $wp_query->is_page ) && $home_page_id == $menu_item->object_id ) {
			if ( ! $current_page ) {
				foreach ( $sorted_menu_items[ $id ]->classes as $classid => $classname ) {
					if ( $classname == 'current_page_parent' ) {
						unset( $sorted_menu_items[ $id ]->classes[ $classid ] );
					}
				}
			}
		}
	}
	return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects','wff_wp_nav_menu_objects',10,2 );
