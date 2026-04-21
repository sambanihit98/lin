<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Row shortcode with justify and align
// ---------------------------------------------------------------------------
function lin_row_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'justify' => '',  // start, center, end, around, between, evenly
            'align'   => '',  // start, center, end, baseline, stretch
            'g'       => '4', // gutter
        ),
        $atts,
        'lin_row'
    );

    $classes = array('row');

    if (!empty($atts['justify'])) {
        $classes[] = 'justify-content-' . sanitize_html_class($atts['justify']);
    }

    if (!empty($atts['align'])) {
        $classes[] = 'align-items-' . sanitize_html_class($atts['align']);
    }

    if (!empty($atts['g'])) {
        $classes[] = 'g-' . sanitize_html_class($atts['g']);
    }

    $output  = '<div class="' . implode(' ', $classes) . '">';
    $output .= do_shortcode(shortcode_unautop($content));
    $output .= '</div>';

    return $output;
}
add_shortcode('lin_row', 'lin_row_shortcode');
add_filter('the_content', 'shortcode_unautop');
