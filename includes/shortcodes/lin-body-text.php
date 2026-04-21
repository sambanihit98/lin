<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Body Text Shortcode
// Usage: [lin_body_text size="16" color="#333" align="center"]Your text[/lin_body_text]
// ---------------------------------------------------------------------------
function lin_body_text_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'size'  => '',        // font size in px, empty = use theme default
        'color' => '#333333', // default text color
        'align' => '',        // text alignment: left, center, right
    ), $atts, 'lin_body_text');

    // Sanitize attributes
    $size  = $atts['size'] !== '' ? intval($atts['size']) : '';
    $color = sanitize_hex_color($atts['color']) ?: '#333333';
    $align = in_array($atts['align'], ['left', 'center', 'right', 'justify']) ? $atts['align'] : 'left';

    // Build inline styles
    $styles = array(
        'color:' . $color,
        'line-height:1.6',
    );

    if ($size) {
        $styles[] = 'font-size:' . $size . 'px';
    }

    $style_attr = 'style="' . implode('; ', $styles) . ';"';

    // Clean content to remove unwanted <p> or <br> added by WP
    $clean_content = trim(do_shortcode(shortcode_unautop($content)));

    // Use a single div container
    $output  = '<div style="text-align:' . esc_attr($align) . ';">';
    $output .= '<span ' . $style_attr . '>' . $clean_content . '</span>';
    $output .= '</div>';

    return $output;
}

add_shortcode('lin_body_text', 'lin_body_text_shortcode');
