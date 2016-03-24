<?php
/**
 * All the basic theme setup functionality for our Framework.
 * Big props to the Roots/Sage team for providing parts of the foundation.
 */
add_theme_support( 'bootstrap-gallery' );     // Enable Bootstrap's thumbnails component on [gallery]

/**
 * Add theme support for Responsive Videos.
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'wff_jetpack_responsive_videos_setup' ) ) {
	function wff_jetpack_responsive_videos_setup() {
		add_theme_support( 'jetpack-responsive-videos' );
	}

	add_action( 'after_setup_theme', 'wff_jetpack_responsive_videos_setup' );
}


/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 * @since 1.0.0
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}


/**
 * wefoster initial setup and constants
 *
 * @since 1.0.0
 *
 */
function wff_setup_theme() {
	// Make theme available for translation
	load_theme_textdomain( 'wefoster', get_template_directory() . '/languages' );

	//Add post thumbnails
	add_theme_support( 'post-thumbnails' );

	//Registed extra thumbnail size
	add_image_size( 'post-thumbnail-size', 400, 400 ); //

	//Add extra stuff we support.
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5' );

	//Add the new WP 4.4 Title tags
	add_theme_support( 'title-tag' );

	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style( '/assets/css/editor-style.css' );
}

add_action( 'after_setup_theme', 'wff_setup_theme' );


//Render our Title on Older Installations
if ( ! function_exists( '_wp_render_title_tag' ) ) :
	function wff_render_legacy_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}

	add_action( 'wp_head', 'wff_render_legacy_title' );
endif;

/**
 *    Style the comment form and comments to match Bootstrap
 *    Also includes schema.org microdata
 */
if ( ! function_exists( 'wff_comments_template' ) ) :
	function wff_comments_template() {
		// Custom comment
		function wff_comment_callback( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			extract( $args, EXTR_SKIP );

			if ( 'article' == $args['style'] ) {
				$tag       = 'article';
				$add_below = 'comment';
			} else {
				$tag       = 'article';
				$add_below = 'comment';
			}

			?>

			<?php include( locate_template( 'templates/parts/single-comment.php' ) ); ?>


			<?php
		}

		// Change comment reply link style
		function wff_comment_reply_link_class( $class ) {
			$class = str_replace( "class='comment-reply-link", "class='comment-reply-link", $class );

			return $class;
		}

		add_filter( 'comment_reply_link', 'wff_comment_reply_link_class' );
		// End custom comment
		function wff_comment_close() {
			echo '</article>';
		}

		/**
		 * Add bootstrap3 styling to comment form
		 *
		 * @since 1.0.0
		 *
		 */
		function wff_comment_form_fields( $fields ) {
			$commenter = wp_get_current_commenter();

			$req      = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

			$fields = array(
				'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'wefoster' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				            '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
				'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'wefoster' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				            '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
				'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'wefoster' ) . '</label> ' .
				            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
			);

			return $fields;
		}

		add_filter( 'comment_form_default_fields', 'wff_comment_form_fields' );

		/**
		 * Add bootstrap3 styling to comment form
		 *
		 * @since 1.0.0
		 *
		 */
		function wff_comment_form( $args ) {
			$args['comment_field'] = '<div class="form-group comment-form-comment">
	            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
	            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" width="100%" aria-required="true"></textarea>
	        </div>';
			$args['class_submit']  = 'btn btn-default';

			return $args;
		}

		add_filter( 'comment_form_defaults', 'wff_comment_form' );

	}

	add_action( 'after_setup_theme', 'wff_comments_template' );
endif;
