<?php
/**
 * Add a Google Font selection to the Kirki font settings.
 *
 * @since 1.0.0
 *
 */
function wefoster_plus_google_fonts() {

	$wf_google_fonts =  array (
	  'ABeeZee' =>
	  array (
	    'label' => 'ABeeZee',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Abel' =>
	  array (
	    'label' => 'Abel',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Amaranth' =>
	  array (
	    'label' => 'Amaranth',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Anonymous Pro' =>
	  array (
	    'label' => 'Anonymous Pro',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'greek',
	      3 => 'latin',
	    ),
	  ),
	  'Archivo Narrow' =>
	  array (
	    'label' => 'Archivo Narrow',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Arimo' =>
	  array (
	    'label' => 'Arimo',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	      7 => 'hebrew',
	    ),
	  ),
	  'Arvo' =>
	  array (
	    'label' => 'Arvo',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Arya' =>
	  array (
	    'label' => 'Arya',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	      2 => 'devanagari',
	    ),
	  ),
	  'Bitter' =>
	  array (
	    'label' => 'Bitter',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Cardo' =>
	  array (
	    'label' => 'Cardo',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'greek',
	      2 => 'latin',
	      3 => 'greek-ext',
	    ),
	  ),
	  'Carme' =>
	  array (
	    'label' => 'Carme',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Crimson Text' =>
	  array (
	    'label' => 'Crimson Text',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '600',
	      3 => '600italic',
	      4 => '700',
	      5 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Donegal One' =>
	  array (
	    'label' => 'Donegal One',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Droid Sans' =>
	  array (
	    'label' => 'Droid Sans',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Droid Serif' =>
	  array (
	    'label' => 'Droid Serif',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Josefin Sans' =>
	  array (
	    'label' => 'Josefin Sans',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '100italic',
	      2 => '300',
	      3 => '300italic',
	      4 => 'regular',
	      5 => 'italic',
	      6 => '600',
	      7 => '600italic',
	      8 => '700',
	      9 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Josefin Slab' =>
	  array (
	    'label' => 'Josefin Slab',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '100italic',
	      2 => '300',
	      3 => '300italic',
	      4 => 'regular',
	      5 => 'italic',
	      6 => '600',
	      7 => '600italic',
	      8 => '700',
	      9 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Lato' =>
	  array (
	    'label' => 'Lato',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '100italic',
	      2 => '300',
	      3 => '300italic',
	      4 => 'regular',
	      5 => 'italic',
	      6 => '700',
	      7 => '700italic',
	      8 => '900',
	      9 => '900italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Libre Baskerville' =>
	  array (
	    'label' => 'Libre Baskerville',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Lora' =>
	  array (
	    'label' => 'Lora',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'latin',
	    ),
	  ),
	  'Merriweather' =>
	  array (
	    'label' => 'Merriweather',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => '300italic',
	      2 => 'regular',
	      3 => 'italic',
	      4 => '700',
	      5 => '700italic',
	      6 => '900',
	      7 => '900italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Merriweather Sans' =>
	  array (
	    'label' => 'Merriweather Sans',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => '300italic',
	      2 => 'regular',
	      3 => 'italic',
	      4 => '700',
	      5 => '700italic',
	      6 => '800',
	      7 => '800italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Montserrat' =>
	  array (
	    'label' => 'Montserrat',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Old Standard TT' =>
	  array (
	    'label' => 'Old Standard TT',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Oldenburg' =>
	  array (
	    'label' => 'Oldenburg',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Open Sans' =>
	  array (
	    'label' => 'Open Sans',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => '300italic',
	      2 => 'regular',
	      3 => 'italic',
	      4 => '600',
	      5 => '600italic',
	      6 => '700',
	      7 => '700italic',
	      8 => '800',
	      9 => '800italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	    ),
	  ),
	  'Open Sans Condensed' =>
	  array (
	    'label' => 'Open Sans Condensed',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => '300italic',
	      2 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	    ),
	  ),
	  'PT Sans' =>
	  array (
	    'label' => 'PT Sans',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'latin',
	    ),
	  ),
	  'PT Sans Caption' =>
	  array (
	    'label' => 'PT Sans Caption',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'latin',
	    ),
	  ),
	  'PT Sans Narrow' =>
	  array (
	    'label' => 'PT Sans Narrow',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'latin',
	    ),
	  ),
	  'PT Serif' =>
	  array (
	    'label' => 'PT Serif',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'latin',
	    ),
	  ),
	  'Pacifico' =>
	  array (
	    'label' => 'Pacifico',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Poppins' =>
	  array (
	    'label' => 'Poppins',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => 'regular',
	      2 => '500',
	      3 => '600',
	      4 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	      2 => 'devanagari',
	    ),
	  ),
	  'Raleway' =>
	  array (
	    'label' => 'Raleway',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '200',
	      2 => '300',
	      3 => 'regular',
	      4 => '500',
	      5 => '600',
	      6 => '700',
	      7 => '800',
	      8 => '900',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Roboto' =>
	  array (
	    'label' => 'Roboto',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '100italic',
	      2 => '300',
	      3 => '300italic',
	      4 => 'regular',
	      5 => 'italic',
	      6 => '500',
	      7 => '500italic',
	      8 => '700',
	      9 => '700italic',
	      10 => '900',
	      11 => '900italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	    ),
	  ),
	  'Roboto Condensed' =>
	  array (
	    'label' => 'Roboto Condensed',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => '300italic',
	      2 => 'regular',
	      3 => 'italic',
	      4 => '700',
	      5 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	    ),
	  ),
	  'Roboto Mono' =>
	  array (
	    'label' => 'Roboto Mono',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '100italic',
	      2 => '300',
	      3 => '300italic',
	      4 => 'regular',
	      5 => 'italic',
	      6 => '500',
	      7 => '500italic',
	      8 => '700',
	      9 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	    ),
	  ),
	  'Roboto Slab' =>
	  array (
	    'label' => 'Roboto Slab',
	    'variants' =>
	    array (
	      0 => '100',
	      1 => '300',
	      2 => 'regular',
	      3 => '700',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'vietnamese',
	      6 => 'greek-ext',
	    ),
	  ),
	  'Ubuntu' =>
	  array (
	    'label' => 'Ubuntu',
	    'variants' =>
	    array (
	      0 => '300',
	      1 => '300italic',
	      2 => 'regular',
	      3 => 'italic',
	      4 => '500',
	      5 => '500italic',
	      6 => '700',
	      7 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'cyrillic',
	      1 => 'latin-ext',
	      2 => 'cyrillic-ext',
	      3 => 'greek',
	      4 => 'latin',
	      5 => 'greek-ext',
	    ),
	  ),
	  'Varela' =>
	  array (
	    'label' => 'Varela',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin-ext',
	      1 => 'latin',
	    ),
	  ),
	  'Varela Round' =>
	  array (
	    'label' => 'Varela Round',
	    'variants' =>
	    array (
	      0 => 'regular',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  'Vollkorn' =>
	  array (
	    'label' => 'Vollkorn',
	    'variants' =>
	    array (
	      0 => 'regular',
	      1 => 'italic',
	      2 => '700',
	      3 => '700italic',
	    ),
	    'subsets' =>
	    array (
	      0 => 'latin',
	    ),
	  ),
	  '' =>
	  array (
	    'label' => NULL,
	    'variants' => NULL,
	    'subsets' => NULL,
	  ),
	);

	$google_fonts = $wf_google_fonts;

	return $google_fonts;



}
add_filter( 'kirki/fonts/google_fonts', 'wefoster_plus_google_fonts' );
