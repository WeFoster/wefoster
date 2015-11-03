<?php
/**
 * All the basic theme setup functionality for our Framework.
 * Big props to the Roots/Sage team for providing the foundation
 */
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]

/**
* Add theme support for Responsive Videos.
*/
if ( ! function_exists ( 'wff_jetpack_responsive_videos_setup' ) ) {
  function wff_jetpack_responsive_videos_setup() {
      add_theme_support( 'jetpack-responsive-videos' );
  }
  add_action( 'after_setup_theme', 'wff_jetpack_responsive_videos_setup' );
}


/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }


/**
 * wefoster initial setup and constants
 */
function wff_setup_theme() {
  // Make theme available for translation
  load_theme_textdomain('wefoster', get_template_directory() . '/languages');

  //Add post thumbnails
  add_theme_support('post-thumbnails');

  //Registed extra thumbnail size
  add_image_size( 'post-thumbnail-size', 400, 400 ); //

  //Add extra stuff we support.
  add_theme_support( 'title-tag');
  add_theme_support( 'automatic-feed-links');
  add_theme_support( 'html5');

  //Add the new WP 4.4 Title tags
  add_theme_support( 'title-tag' );

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'wff_setup_theme');



/**
 * Add Bootstrap thumbnail styling to images with captions
 * Use <figure> and <figcaption>
 *
 * @link http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
 */
if ( ! function_exists ( 'wff_caption' ) ) {
  function wff_caption($output, $attr, $content) {
    if (is_feed()) {
      return $output;
    }

    $defaults = array(
      'id'      => '',
      'align'   => 'alignnone',
      'width'   => '',
      'caption' => ''
    );

    $attr = shortcode_atts($defaults, $attr);

    // If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
    if ($attr['width'] < 1 || empty($attr['caption'])) {
      return $content;
    }

    // Set up the attributes for the caption <figure>
    $attributes  = (!empty($attr['id']) ? ' id="' . esc_attr($attr['id']) . '"' : '' );
    $attributes .= ' class="thumbnail wp-caption ' . esc_attr($attr['align']) . '"';
    $attributes .= ' style="width: ' . (esc_attr($attr['width']) + 10) . 'px"';

    $output  = '<figure' . $attributes .'>';
    $output .= do_shortcode($content);
    $output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
    $output .= '</figure>';

    return $output;
  }
  add_filter('img_caption_shortcode', 'wff_caption', 10, 3);
}

/**
 * Clean up the_excerpt()
 */
if ( ! function_exists ( 'wff_excerpt_more' ) ) {
  // custom excerpt length
  function wff_excerpt_more( $length ) {
     return 80;
  }
  add_filter( 'excerpt_length', 'wff_excerpt_more', 999 );
}

/**
 * Page titles
 */
if ( ! function_exists ( 'wff_title' ) ) {
  function wff_title() {
    if (is_home()) {
      if (get_option('page_for_posts', true)) {
        return get_the_title(get_option('page_for_posts', true));
      } else {
        return __('Latest Posts', 'wefoster');
      }
    } elseif (is_archive()) {
      $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
      if ($term) {
        return apply_filters('single_term_title', $term->name);
      } elseif (is_post_type_archive()) {
        return apply_filters('the_title', get_queried_object()->labels->name);
      } elseif (is_day()) {
        return sprintf(__('Daily Archives: %s', 'wefoster'), get_the_date());
      } elseif (is_month()) {
        return sprintf(__('Monthly Archives: %s', 'wefoster'), get_the_date('F Y'));
      } elseif (is_year()) {
        return sprintf(__('Yearly Archives: %s', 'wefoster'), get_the_date('Y'));
      } elseif (is_author()) {
        $author = get_queried_object();
        return sprintf(__('Author Archives: %s', 'wefoster'), $author->display_name);
      } else {
        return single_cat_title('', false);
      }
    } elseif (is_search()) {
      return sprintf(__('Search Results for %s', 'wefoster'), get_search_query());
    } elseif (is_404()) {
      return __('Not Found', 'wefoster');
    } else {
      return get_the_title();
    }
  }
}

/**
 * Add class="thumbnail img-thumbnail" to attachment items
 */
if ( ! function_exists ( 'wff_attachment_link_class' ) ) {
  function wff_attachment_link_class($html) {
    $postid = get_the_ID();
    $html = str_replace('<a', '<a class="thumbnail img-thumbnail"', $html);
    return $html;
  }
  add_filter('wp_get_attachment_link', 'wff_attachment_link_class', 10, 1);
}


/**
 * Utility functions
 */
function add_filters($tags, $function) {
  foreach($tags as $tag) {
    add_filter($tag, $function);
  }
}

function is_element_empty($element) {
  $element = trim($element);
  return empty($element) ? false : true;
}

if ( ! function_exists( 'wff_comments_template' ) ) :
function wff_comments_template() {
	/**
	 *	Style the comment form and comments to match Bootstrap
	 * 	Also includes schema.org microdata
	 */

	// Custom comment
	function wff_comment_callback($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		}

		?>

 <?php include(locate_template('templates/parts/single-comment.php')); ?>


		<?php
	}
	// Change comment reply link style
	function wff_comment_reply_link_class($class){
    	$class = str_replace("class='comment-reply-link", "class='comment-reply-link", $class);
    	return $class;
	}
	add_filter('comment_reply_link', 'wff_comment_reply_link_class');
	// End custom comment
	function wff_comment_close() {
		echo '</article>';
	}

	// Add bootstrap3 styling to comment form
	function wff_comment_form_fields( $fields ) {
	    $commenter = wp_get_current_commenter();

	    $req      = get_option( 'require_name_email' );
	    $aria_req = ( $req ? " aria-required='true'" : '' );
	    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

	    $fields   =  array(
	        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' , 'wefoster' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
	                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
	        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'wefoster' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
	                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
	        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'wefoster' ) . '</label> ' .
	                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
	    );

	    return $fields;
	}
	add_filter( 'comment_form_default_fields', 'wff_comment_form_fields' );

	// Add bootstrap3 styling to comment form
	function wff_comment_form( $args ) {
	    $args['comment_field'] = '<div class="form-group comment-form-comment">
	            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
	            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" width="100%" aria-required="true"></textarea>
	        </div>';
	    $args['class_submit'] = 'btn btn-default';

	    return $args;
	}
	add_filter( 'comment_form_defaults', 'wff_comment_form' );

}
add_action( 'after_setup_theme', 'wff_comments_template' );
endif;
