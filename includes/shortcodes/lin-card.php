<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// ---------------------------------------------------------------------------
// Card Shortcodes
// ---------------------------------------------------------------------------

/**
 * Helper: Build inline style safely
 */
function lin_build_inline_style($styles = array())
{
    $output = '';

    foreach ($styles as $property => $value) {
        if (!empty($value)) {
            $output .= $property . ':' . esc_attr($value) . ';';
        }
    }

    return $output ? ' style="' . $output . '"' : '';
}

/**
 * Helper: Clean shortcode content
 */
function lin_clean_shortcode_content($content)
{
    return do_shortcode(shortcode_unautop($content));
}

// ---------------------------------------------------------------------------
// Main Card Shortcode
// Usage: [lin_card border="1px solid #ddd"]...[/lin_card]
// ---------------------------------------------------------------------------
function lin_card_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'border' => '',
        ),
        $atts,
        'lin_card'
    );

    $style = lin_build_inline_style(array(
        'border' => $atts['border'],
    ));

    $output  = '<div class="lin-card"' . $style . '>';
    $output .= '<div class="lin-card-body">';
    $output .= lin_clean_shortcode_content($content);
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}
add_shortcode('lin_card', 'lin_card_shortcode');

// ---------------------------------------------------------------------------
// Card Image
// Usage: [lin_card_img src="image.jpg" alt="Image"]
// ---------------------------------------------------------------------------
function lin_card_img_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'src' => '',
            'alt' => '',
        ),
        $atts,
        'lin_card_img'
    );

    if (empty($atts['src'])) return '';

    return '<img class="lin-card-img" src="' . esc_url($atts['src']) . '" alt="' . esc_attr($atts['alt']) . '">';
}
add_shortcode('lin_card_img', 'lin_card_img_shortcode');

// ---------------------------------------------------------------------------
// Card Title
// Usage: [lin_card_title color="#333"]Title[/lin_card_title]
// ---------------------------------------------------------------------------
function lin_card_title_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'color' => '#333333',
        ),
        $atts,
        'lin_card_title'
    );

    $style = lin_build_inline_style(array(
        'color' => $atts['color'],
    ));

    return '<h3 class="lin-card-title"' . $style . '>' . esc_html($content) . '</h3>';
}
add_shortcode('lin_card_title', 'lin_card_title_shortcode');

// ---------------------------------------------------------------------------
// Card Subtitle
// Usage: [lin_card_subtitle color="#666"]Subtitle[/lin_card_subtitle]
// ---------------------------------------------------------------------------
function lin_card_subtitle_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'color' => '#666666',
        ),
        $atts,
        'lin_card_subtitle'
    );

    $style = lin_build_inline_style(array(
        'color' => $atts['color'],
    ));

    return '<h4 class="lin-card-subtitle"' . $style . '>' . esc_html($content) . '</h4>';
}
add_shortcode('lin_card_subtitle', 'lin_card_subtitle_shortcode');

// ---------------------------------------------------------------------------
// Card Description
// Usage: [lin_card_desc color="#333"]Description[/lin_card_desc]
// ---------------------------------------------------------------------------
function lin_card_desc_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'color' => '#333333',
        ),
        $atts,
        'lin_card_desc'
    );

    $style = lin_build_inline_style(array(
        'color' => $atts['color'],
    ));

    return '<p class="lin-card-desc"' . $style . '>' . esc_html($content) . '</p>';
}
add_shortcode('lin_card_desc', 'lin_card_desc_shortcode');

// ---------------------------------------------------------------------------
// Card Button
// Usage: [lin_card_btn url="https://example.com"]Read More[/lin_card_btn]
// ---------------------------------------------------------------------------
function lin_card_btn_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'url' => '#',
        ),
        $atts,
        'lin_card_btn'
    );

    return '<a href="' . esc_url($atts['url']) . '" class="lin-card-btn">' . esc_html($content) . '</a>';
}
add_shortcode('lin_card_btn', 'lin_card_btn_shortcode');
