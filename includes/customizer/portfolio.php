<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// PORTFOLIO SETTINGS CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_portfolio($wp_customize)
{
    $wp_customize->add_section('portfolio_settings', array('title' => 'Portfolio Settings', 'priority' => 50));

    $portfolio_controls = [
        'portfolio_filter_active_color' => ['label' => 'Filter Button Active Color', 'default' => '#7c3aed', 'sanitize' => 'sanitize_hex_color'],
        'portfolio_filter_inactive_color' => ['label' => 'Filter Button Inactive Border Color', 'default' => '#7c3aed', 'sanitize' => 'sanitize_hex_color'],
        'portfolio_filter_text_color' => ['label' => 'Filter Button Text Color', 'default' => '#7c3aed', 'sanitize' => 'sanitize_hex_color'],
    ];

    foreach ($portfolio_controls as $id => $args) {
        $wp_customize->add_setting($id, ['default' => $args['default'], 'sanitize_callback' => $args['sanitize']]);
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, ['label' => $args['label'], 'section' => 'portfolio_settings', 'settings' => $id]));
    }
}
add_action('customize_register', 'lin_customizer_portfolio');
