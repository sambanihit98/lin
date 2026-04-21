<?php
// ----------------------------
// LIN Accordion Shortcode
// ----------------------------

// Global storage for wrapper styles
$GLOBALS['lin_accordion_wrapper_styles'] = array();

// Main accordion wrapper
function lin_accordion_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'bg-color' => '#ffffff',
        'border'   => '1px solid #e5e7eb',
    ), $atts, 'lin_accordion');

    // Store wrapper styles globally
    $GLOBALS['lin_accordion_wrapper_styles'] = array(
        'bg_color' => $atts['bg-color'],
        'border'   => $atts['border'],
    );

    // Prevent unwanted <p> and <br>
    $content = shortcode_unautop($content);
    $content = do_shortcode($content);

    // Convert markers into accordion items
    $details_html = lin_accordion_wrap_details($content);

    return '<div class="lin-accordion">' . $details_html . '</div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const accordions = document.querySelectorAll(".lin-accordion details summary");

        accordions.forEach(summary => {
            summary.addEventListener("click", function() {
                const icon = this.querySelector("span");
                if (this.parentElement.open) {
                    icon.textContent = "+";
                } else {
                    icon.textContent = "-";
                }
            });
        });
    });
    </script>';
}
add_shortcode('lin_accordion', 'lin_accordion_shortcode');


// Accordion title shortcode
function lin_accordion_title_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'size'        => '18px',
        'font-weight' => '600',
        'color'       => '#333333',
    ), $atts, 'lin_accordion_title');

    $title = trim($content);

    return '[[LIN_ACC_TITLE]]<summary class="lin-accordion-title" style="
                font-size:' . esc_attr($atts['size']) . ';
                font-weight:' . esc_attr($atts['font-weight']) . ';
                color:' . esc_attr($atts['color']) . ';
            ">'
        . $title .
        '<span>+</span></summary>[[/LIN_ACC_TITLE]]';
}
add_shortcode('lin_accordion_title', 'lin_accordion_title_shortcode');


// Accordion description shortcode
function lin_accordion_desc_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'size'  => '16px',
        'color' => '#333333',
    ), $atts, 'lin_accordion_desc');

    $desc = trim($content);

    return '[[LIN_ACC_DESC]]<div class="lin-accordion-desc" style="
                font-size:' . esc_attr($atts['size']) . ';
                color:' . esc_attr($atts['color']) . ';
            ">'
        . $desc .
        '</div>[[/LIN_ACC_DESC]]';
}
add_shortcode('lin_accordion_desc', 'lin_accordion_desc_shortcode');


// Wrap each title + desc safely
function lin_accordion_wrap_details($content)
{
    $wrapper_styles = $GLOBALS['lin_accordion_wrapper_styles'];

    $bg_color = isset($wrapper_styles['bg_color']) ? $wrapper_styles['bg_color'] : '#ffffff';
    $border   = isset($wrapper_styles['border']) ? $wrapper_styles['border'] : '1px solid #e5e7eb';

    // Match title + desc pairs
    preg_match_all('/\[\[LIN_ACC_TITLE\]\](.*?)\[\[\/LIN_ACC_TITLE\]\]\s*\[\[LIN_ACC_DESC\]\](.*?)\[\[\/LIN_ACC_DESC\]\]/s', $content, $matches, PREG_SET_ORDER);

    $output = '';

    foreach ($matches as $match) {
        $title = $match[1];
        $desc  = $match[2];

        $output .= '<details class="lin-accordion-wrapper" style="
                        background-color:' . esc_attr($bg_color) . ';
                        border:' . esc_attr($border) . ';
                    ">'
            . $title . $desc .
            '</details>';
    }

    return $output;
}
