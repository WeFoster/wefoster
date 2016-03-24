<?php
/**
 * See: https://github.com/humanmade/hm-core/blob/1204806c83497d04379d287753cbe3b6c7c66a9b/hm-core.functions.php#L1236
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the tempalte as $template_args array
 * @since 1.0
 */
function wf_get_template_part( $file, $template_args = array(), $cache_args = array() ) {

	$template_args = wp_parse_args( $template_args );
	$cache_args    = wp_parse_args( $cache_args );

	if ( $cache_args ) {

		foreach ( $template_args as $key => $value ) {
			if ( is_scalar( $value ) || is_array( $value ) ) {
				$cache_args[ $key ] = $value;
			} else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
				$cache_args[ $key ] = call_user_method( 'get_id', $value );
			}
		}

		if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {

			if ( ! empty( $template_args['return'] ) ) {
				return $cache;
			}

			echo $cache;

			return;
		}
	}

	$file_handle = $file;

	do_action( 'start_operation', 'wf_template_part::' . $file_handle );

	if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) ) {
		$file = get_stylesheet_directory() . '/' . $file . '.php';
	} elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) ) {
		$file = get_template_directory() . '/' . $file . '.php';
	}

	ob_start();
	$return = require( $file );
	$data   = ob_get_clean();

	do_action( 'end_operation', 'wf_template_part::' . $file_handle );

	if ( $cache_args ) {
		wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
	}

	if ( ! empty( $template_args['return'] ) ) {
		if ( $return === false ) {
			return false;
		}
	} else {
		return $data;
	}

	echo $data;
}


/**
 * Add Bootstrap thumbnail styling to images with captions
 * Use <figure> and <figcaption>
 *
 * @link http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
 */
if ( ! function_exists( 'wff_caption' ) ) {
	function wff_caption( $output, $attr, $content ) {
		if ( is_feed() ) {
			return $output;
		}

		$defaults = array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => '',
		);

		$attr = shortcode_atts( $defaults, $attr );

		// If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
		if ( $attr['width'] < 1 || empty( $attr['caption'] ) ) {
			return $content;
		}

		// Set up the attributes for the caption <figure>
		$attributes = ( ! empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
		$attributes .= ' class="thumbnail wp-caption ' . esc_attr( $attr['align'] ) . '"';
		$attributes .= ' style="width: ' . ( esc_attr( $attr['width'] ) + 10 ) . 'px"';

		$output = '<figure' . $attributes . '>';
		$output .= do_shortcode( $content );
		$output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
		$output .= '</figure>';

		return $output;
	}

	add_filter( 'img_caption_shortcode', 'wff_caption', 10, 3 );
}

/**
 * Clean up the_excerpt()
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_excerpt_more' ) ) {
	// custom excerpt length
	function wff_excerpt_more( $length ) {
		return 80;
	}

	add_filter( 'excerpt_length', 'wff_excerpt_more', 999 );
}

/**
 * Page titles
 */
if ( ! function_exists( 'wff_title' ) ) {
	function wff_title() {
		if ( is_home() ) {
			if ( get_option( 'page_for_posts', true ) ) {
				return get_the_title( get_option( 'page_for_posts', true ) );
			} else {
				return __( 'Latest Posts', 'wefoster' );
			}
		} elseif ( is_archive() ) {
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			if ( $term ) {
				return apply_filters( 'single_term_title', $term->name );
			} elseif ( is_post_type_archive() ) {
				return apply_filters( 'the_title', get_queried_object()->labels->name );
			} elseif ( is_day() ) {
				return sprintf( __( 'Daily Archives: %s', 'wefoster' ), get_the_date() );
			} elseif ( is_month() ) {
				return sprintf( __( 'Monthly Archives: %s', 'wefoster' ), get_the_date( 'F Y' ) );
			} elseif ( is_year() ) {
				return sprintf( __( 'Yearly Archives: %s', 'wefoster' ), get_the_date( 'Y' ) );
			} elseif ( is_author() ) {
				$author = get_queried_object();

				return sprintf( __( 'Author Archives: %s', 'wefoster' ), $author->display_name );
			} else {
				return single_cat_title( '', false );
			}
		} elseif ( is_search() ) {
			return sprintf( __( 'Search Results for %s', 'wefoster' ), get_search_query() );
		} elseif ( is_404() ) {
			return __( 'Not Found', 'wefoster' );
		} else {
			return get_the_title();
		}
	}
}

/**
 * Add class="thumbnail img-thumbnail" to attachment items
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_attachment_link_class' ) ) {
	function wff_attachment_link_class( $html ) {
		$postid = get_the_ID();
		$html   = str_replace( '<a', '<a class="thumbnail img-thumbnail"', $html );

		return $html;
	}

	add_filter( 'wp_get_attachment_link', 'wff_attachment_link_class', 10, 1 );
}

/**
 * Use excerpts as smart as possible. Props Matt from WordImpress
 * https://www.mattcromwell.com/smart-excerpts-in-wordpress-themes/
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_smart_excerpt' ) ) {
	function wff_smart_excerpt() {
		global $post;
		$yoastdesc     = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
		$excerptlength = get_theme_mod( 'wf_plus_excerpt_length', 50 );
		$excerpt       = get_the_excerpt();
		$content       = get_the_content();
		$screenreader  = ' <a href="' . get_permalink() . '"> <span class="screen-reader-text">' . get_the_title() . '</span><span class="hidden">Read More &hellip;</span>[....] <i class="fa fa-long-arrow-right"></i></a>';

		if ( ! empty( $yoastdesc ) ) {
			$trimyoast = wp_trim_words( $yoastdesc, $excerptlength, $screenreader );
			echo $trimyoast;
		} elseif ( has_excerpt() == true ) {
			$trimexcerpt = wp_trim_words( $excerpt, $excerptlength, $screenreader );
			echo strip_shortcodes( $trimexcerpt );
		} else {
			$trimmed_content = wp_trim_words( $content, $excerptlength, $screenreader );
			echo strip_shortcodes( $trimmed_content );
		}
	}
}
