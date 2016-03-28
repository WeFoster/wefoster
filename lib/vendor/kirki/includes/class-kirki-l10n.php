<?php


if ( ! class_exists( 'Kirki_l10n' ) ) {

	class Kirki_l10n {

		protected $textdomain = 'wefoster';

		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * @return string
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 *
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'wefoster' ),
				'background-image'      => esc_attr__( 'Background Image', 'wefoster' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'wefoster' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'wefoster' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'wefoster' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'wefoster' ),
				'inherit'               => esc_attr__( 'Inherit', 'wefoster' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'wefoster' ),
				'cover'                 => esc_attr__( 'Cover', 'wefoster' ),
				'contain'               => esc_attr__( 'Contain', 'wefoster' ),
				'background-size'       => esc_attr__( 'Background Size', 'wefoster' ),
				'fixed'                 => esc_attr__( 'Fixed', 'wefoster' ),
				'scroll'                => esc_attr__( 'Scroll', 'wefoster' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'wefoster' ),
				'left-top'              => esc_attr__( 'Left Top', 'wefoster' ),
				'left-center'           => esc_attr__( 'Left Center', 'wefoster' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'wefoster' ),
				'right-top'             => esc_attr__( 'Right Top', 'wefoster' ),
				'right-center'          => esc_attr__( 'Right Center', 'wefoster' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'wefoster' ),
				'center-top'            => esc_attr__( 'Center Top', 'wefoster' ),
				'center-center'         => esc_attr__( 'Center Center', 'wefoster' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'wefoster' ),
				'background-position'   => esc_attr__( 'Background Position', 'wefoster' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'wefoster' ),
				'on'                    => esc_attr__( 'ON', 'wefoster' ),
				'off'                   => esc_attr__( 'OFF', 'wefoster' ),
				'all'                   => esc_attr__( 'All', 'wefoster' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'wefoster' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'wefoster' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'wefoster' ),
				'greek'                 => esc_attr__( 'Greek', 'wefoster' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'wefoster' ),
				'khmer'                 => esc_attr__( 'Khmer', 'wefoster' ),
				'latin'                 => esc_attr__( 'Latin', 'wefoster' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'wefoster' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'wefoster' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'wefoster' ),
				'arabic'                => esc_attr__( 'Arabic', 'wefoster' ),
				'bengali'               => esc_attr__( 'Bengali', 'wefoster' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'wefoster' ),
				'tamil'                 => esc_attr__( 'Tamil', 'wefoster' ),
				'telugu'                => esc_attr__( 'Telugu', 'wefoster' ),
				'thai'                  => esc_attr__( 'Thai', 'wefoster' ),
				'serif'                 => _x( 'Serif', 'font style', 'wefoster' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'wefoster' ),
				'monospace'             => _x( 'Monospace', 'font style', 'wefoster' ),
				'font-family'           => esc_attr__( 'Font Family', 'wefoster' ),
				'font-size'             => esc_attr__( 'Font Size', 'wefoster' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'wefoster' ),
				'line-height'           => esc_attr__( 'Line Height', 'wefoster' ),
				'font-style'            => esc_attr__( 'Font Style', 'wefoster' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'wefoster' ),
				'top'                   => esc_attr__( 'Top', 'wefoster' ),
				'bottom'                => esc_attr__( 'Bottom', 'wefoster' ),
				'left'                  => esc_attr__( 'Left', 'wefoster' ),
				'right'                 => esc_attr__( 'Right', 'wefoster' ),
				'color'                 => esc_attr__( 'Color', 'wefoster' ),
				'add-image'             => esc_attr__( 'Add Image', 'wefoster' ),
				'change-image'          => esc_attr__( 'Change Image', 'wefoster' ),
				'remove'                => esc_attr__( 'Remove', 'wefoster' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'wefoster' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'wefoster' ),
				'variant'               => esc_attr__( 'Variant', 'wefoster' ),
				'subsets'               => esc_attr__( 'Subset', 'wefoster' ),
				'size'                  => esc_attr__( 'Size', 'wefoster' ),
				'height'                => esc_attr__( 'Height', 'wefoster' ),
				'spacing'               => esc_attr__( 'Spacing', 'wefoster' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'wefoster' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'wefoster' ),
				'light'                 => esc_attr__( 'Light 200', 'wefoster' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'wefoster' ),
				'book'                  => esc_attr__( 'Book 300', 'wefoster' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'wefoster' ),
				'regular'               => esc_attr__( 'Normal 400', 'wefoster' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'wefoster' ),
				'medium'                => esc_attr__( 'Medium 500', 'wefoster' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'wefoster' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'wefoster' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'wefoster' ),
				'bold'                  => esc_attr__( 'Bold 700', 'wefoster' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'wefoster' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'wefoster' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'wefoster' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'wefoster' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'wefoster' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'wefoster' ),
				'add-new-row'           => esc_attr__( 'Add new row', 'wefoster' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'wefoster' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}

	}

}
