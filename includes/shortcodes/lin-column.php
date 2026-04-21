<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Column Shortcode
// ---------------------------------------------------------------------------
function lin_column_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'col'      => '12',
        'col-sm'   => '',
        'col-md'   => '',
        'col-lg'   => '',
        'col-xl'   => '',
        'display'  => '',

        // Order
        'order'    => '',
        'order-sm' => '',
        'order-md' => '',
        'order-lg' => '',
        'order-xl' => '',
    ), $atts, 'lin_column');

    $classes = array();

    if (!empty($atts['col']))     $classes[] = 'col-' . sanitize_html_class($atts['col']);
    if (!empty($atts['col-sm']))  $classes[] = 'col-sm-' . sanitize_html_class($atts['col-sm']);
    if (!empty($atts['col-md']))  $classes[] = 'col-md-' . sanitize_html_class($atts['col-md']);
    if (!empty($atts['col-lg']))  $classes[] = 'col-lg-' . sanitize_html_class($atts['col-lg']);
    if (!empty($atts['col-xl']))  $classes[] = 'col-xl-' . sanitize_html_class($atts['col-xl']);

    if (!empty($atts['order']))    $classes[] = 'order-' . sanitize_html_class($atts['order']);
    if (!empty($atts['order-sm'])) $classes[] = 'order-sm-' . sanitize_html_class($atts['order-sm']);
    if (!empty($atts['order-md'])) $classes[] = 'order-md-' . sanitize_html_class($atts['order-md']);
    if (!empty($atts['order-lg'])) $classes[] = 'order-lg-' . sanitize_html_class($atts['order-lg']);
    if (!empty($atts['order-xl'])) $classes[] = 'order-xl-' . sanitize_html_class($atts['order-xl']);

    $style = '';
    if (!empty($atts['display'])) {
        $style = ' style="display:' . esc_attr($atts['display']) . ';"';
    }

    $output  = '<div class="' . implode(' ', $classes) . '"' . $style . '>';
    $output .= do_shortcode(shortcode_unautop($content));
    $output .= '</div>';

    return $output;
}
add_shortcode('lin_column', 'lin_column_shortcode');
add_filter('the_content', 'shortcode_unautop');
