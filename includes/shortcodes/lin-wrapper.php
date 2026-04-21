<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Wrapper
// ---------------------------------------------------------------------------
function lin_wrapper_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'bg-color' => '',
    ), $atts, 'lin_wrapper');

    $color = esc_attr($atts['bg-color']);

    $output  = "<div class='lin-wrapper' style='background-color:{$color};'>";
    $output .= "<div class='container'>";
    $output .= do_shortcode(shortcode_unautop($content));
    $output .= "</div>";
    $output .= "</div>";

    return $output;
}
add_shortcode('lin_wrapper', 'lin_wrapper_shortcode');
add_filter('the_content', 'shortcode_unautop');
