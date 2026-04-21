<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Anchor Shortcode
// Usage: [lin_anchor href="https://example.com"]Click Here[/lin_anchor]
// ---------------------------------------------------------------------------
function lin_anchor_shortcode($atts, $content = null)
{
    // Attributes with defaults
    $atts = shortcode_atts(array(
        'href'             => '#',
        'color'            => '#333333',
        'font-weight'      => '600',
        'text-decoration'  => 'none',
        'target'           => '_self',
        'rel'              => '',
    ), $atts, 'lin_anchor');

    // Sanitize values
    $href             = esc_url($atts['href']);
    $color            = esc_attr($atts['color']);
    $font_weight      = esc_attr($atts['font-weight']);
    $text_decoration  = esc_attr($atts['text-decoration']);
    $target           = esc_attr($atts['target']);
    $rel              = !empty($atts['rel']) ? ' rel="' . esc_attr($atts['rel']) . '"' : '';

    // Clean content to prevent unwanted <p> and <br>
    $anchor_text = trim($content);
    $anchor_text = wp_strip_all_tags($anchor_text); // remove any tags like <p> or <br>
    $anchor_text = do_shortcode($anchor_text); // allow nested shortcodes

    // Inline style
    $style = 'style="color:' . $color . '; font-weight:' . $font_weight . '; text-decoration:' . $text_decoration . ';"';

    // Build output
    $output  = '<a href="' . $href . '" class="lin-anchor" target="' . $target . '"' . $rel . ' ' . $style . '>';
    $output .= $anchor_text;
    $output .= '</a>';

    return $output;
}

add_shortcode('lin_anchor', 'lin_anchor_shortcode');
