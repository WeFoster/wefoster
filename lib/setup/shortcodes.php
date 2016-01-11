<?php
// Font Awesome Shortcodes
function wf_font_awesome_sc($atts) {
    extract(shortcode_atts(array(
    'type'  => '',
    'size' => '',
    'rotate' => '',
    'flip' => '',
    'pull' => '',
    'animated' => '',
    'class' => '',

    ), $atts));

    $classes  = ($type) ? 'fa-'.$type. '' : 'fa-star';
    $classes .= ($size) ? ' fa-'.$size.'' : '';
    $classes .= ($rotate) ? ' fa-rotate-'.$rotate.'' : '';
    $classes .= ($flip) ? ' fa-flip-'.$flip.'' : '';
    $classes .= ($pull) ? ' pull-'.$pull.'' : '';
    $classes .= ($animated) ? ' fa-spin' : '';
    $classes .= ($class) ? ' '.$class : '';

    $theAwesomeFont = '<i class="fa '.esc_html($classes).'"></i>';

    return $theAwesomeFont;
}

add_shortcode('fa-icon', 'wf_font_awesome_sc');

// Allow shortcodes in Widget (Titles)
add_filter( 'widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
add_filter( 'widget_title', 'shortcode_unautop');
add_filter('widget_title', 'do_shortcode');
