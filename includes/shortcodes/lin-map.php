<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Google Map Shortcode
// Usage:
// [lin_map src="https://www.google.com/maps/embed?..."]
// [lin_map src="..." width="100%" height="400px"]
// ---------------------------------------------------------------------------
function lin_map_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'src'    => '',
        'width'  => '100%',
        'height' => '300px',
    ), $atts, 'lin_map');

    $src    = esc_url($atts['src']);
    $width  = esc_attr($atts['width']);
    $height = esc_attr($atts['height']);

    if (empty($src)) {
        return '<p style="color:red;">Google Map source is missing.</p>';
    }

    $output  = '<div class="contact-map" style="width:' . $width . '; height:' . $height . '; border-radius:12px; overflow:hidden;">';
    $output .= '<iframe 
                    src="' . $src . '" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>';
    $output .= '</div>';

    return $output;
}
add_shortcode('lin_map', 'lin_map_shortcode');
