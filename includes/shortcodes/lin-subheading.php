<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Subheading Shortcode
// Usage: [lin_subheading tag="h5" size="18px" color="#666"]Your Subheading[/lin_subheading]
// ---------------------------------------------------------------------------
function lin_subheading_shortcode($atts, $content = null)
{
    // Default attributes
    $atts = shortcode_atts(array(
        'tag'          => 'h5',
        'align'        => 'center',
        'fontweight'   => '600',  // semibold is usually 600 in CSS
        'color'        => '#6b6b6b',
        'marginbottom' => '10px',
        'size'         => '20px',
    ), $atts, 'lin_subheading');

    // Sanitize attributes
    $tag          = in_array(strtolower($atts['tag']), ['h1', 'h2', 'h3', 'h4', 'h5', 'h6']) ? strtolower($atts['tag']) : 'h5';
    $align        = esc_attr($atts['align']);
    $fontweight   = esc_attr($atts['fontweight']);
    $color        = esc_attr($atts['color']);
    $marginbottom = esc_attr($atts['marginbottom']);
    $size         = esc_attr($atts['size']);

    // Clean content to remove unwanted <p> or <br>
    $subheading_text = trim(do_shortcode(shortcode_unautop($content)));

    // Build inline styles
    $style = 'style="'
        . 'color:' . $color . ';'
        . 'text-align:' . $align . ';'
        . 'font-size:' . $size . ';'
        . 'font-weight:' . $fontweight . ';'
        . 'margin-bottom:' . $marginbottom . ';'
        . '"';

    // Build output
    $output  = "<{$tag} {$style}>";
    $output .= $subheading_text;
    $output .= "</{$tag}>";

    return $output;
}

add_shortcode('lin_subheading', 'lin_subheading_shortcode');
