<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Font Awesome Icon Shortcode
// Usage: [lin_icon icon="fa-solid fa-star" color="#4f46e5" size="24px"]
// ---------------------------------------------------------------------------
function lin_icon_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'icon'      => 'fa-solid fa-star',
        'color'     => '#333333',
        'size'      => '40px',
        'bg'        => '',
        'padding'   => '0',
        'radius'    => '0',
        'class'     => '',
        'margin'    => '0',
        'display'   => 'inline-flex',
        'width'     => 'auto',
        'height'    => 'auto',
        'align'     => 'center',
        'justify'   => 'center',
    ), $atts, 'lin_icon');

    $output = '<span 
                    class="' . esc_attr($atts['class']) . '" 
                    style="
                        display:' . esc_attr($atts['display']) . ';
                        align-items:' . esc_attr($atts['align']) . ';
                        justify-content:' . esc_attr($atts['justify']) . ';
                        color:' . esc_attr($atts['color']) . ';
                        font-size:' . esc_attr($atts['size']) . ';
                        background:' . esc_attr($atts['bg']) . ';
                        padding:' . esc_attr($atts['padding']) . ';
                        border-radius:' . esc_attr($atts['radius']) . ';
                        margin:' . esc_attr($atts['margin']) . ';
                        width:' . esc_attr($atts['width']) . ';
                        height:' . esc_attr($atts['height']) . ';
                        line-height:1;
                        vertical-align:middle;
                    ">
                    <i class="' . esc_attr($atts['icon']) . '"></i>
                </span>';

    return trim($output);
}
add_shortcode('lin_icon', 'lin_icon_shortcode');
