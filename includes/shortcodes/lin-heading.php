<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Heading Shortcode
// Usage: [lin_heading tag="h2" size="40px" color="#7c3aed"]Your Heading[/lin_heading]
// ---------------------------------------------------------------------------
function lin_heading_shortcode($atts, $content = null)
{
    // Default attributes
    $atts = shortcode_atts(array(
        'tag'          => 'h1',
        'align'        => 'center', // text alignment
        'fontweight'   => 'bold',
        'color'        => '#333333',
        'marginbottom' => '10px',
        'size'         => '50px',
    ), $atts, 'lin_heading');

    // Sanitize attributes
    $tag          = in_array(strtolower($atts['tag']), ['h1', 'h2', 'h3', 'h4', 'h5', 'h6']) ? strtolower($atts['tag']) : 'h1';
    $align        = esc_attr($atts['align']);
    $fontweight   = esc_attr($atts['fontweight']);
    $color        = esc_attr($atts['color']);
    $marginbottom = esc_attr($atts['marginbottom']);
    $size         = esc_attr($atts['size']);

    // Clean content to remove unwanted <p> or <br>
    $heading_text = trim(do_shortcode(shortcode_unautop($content)));

    // Build style
    $style = 'style="'
        . 'color:' . $color . ';'
        . 'text-align:' . $align . ';'
        . 'font-size:' . $size . ';'
        . 'font-weight:' . $fontweight . ';'
        . 'margin-bottom:' . $marginbottom . ';'
        . '"';

    // Build output using $output pattern
    $output  = "<{$tag} {$style}>";
    $output .= $heading_text;
    $output .= "</{$tag}>";

    return $output;
}

add_shortcode('lin_heading', 'lin_heading_shortcode');
