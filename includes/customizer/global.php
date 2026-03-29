<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// GLOBAL SETTINGS CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_global_settings($wp_customize)
{
    $wp_customize->add_section('global_settings', ['title' => 'Global Settings', 'priority' => 70]);

    // --------------------------------------
    // Typography
    // --------------------------------------
    $wp_customize->add_setting('global_settings_divider_typography', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'global_settings_divider_typography', [
        'label'   => 'Typography',
        'section' => 'global_settings',
    ]));

    $fonts = ['desktop' => 'body_font_size_desktop', 'tablet' => 'body_font_size_tablet', 'mobile' => 'body_font_size_mobile'];
    $defaults = ['desktop' => 16, 'tablet' => 16, 'mobile' => 14];

    foreach ($fonts as $key => $id) {
        $wp_customize->add_setting($id, ['default' => $defaults[$key], 'sanitize_callback' => 'absint']);
        $wp_customize->add_control($id, ['label' => "Body Font Size (" . ucfirst($key) . ")", 'section' => 'global_settings', 'type' => 'number']);
    }

    // --------------------------------------
    // Color Palettes
    // --------------------------------------
    $wp_customize->add_setting('global_settings_divider_color', [
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control(new Lin_Customize_Separator_Control($wp_customize, 'global_settings_divider_color', [
        'label'   => 'Color Palettes (not yet working)',
        'section' => 'global_settings',
    ]));

    // --------------------------------------
    // Global Colors
    // --------------------------------------
    $colors = [
        'primary'       => '#7c3aed',
        'secondary'     => '#22d3ee',
        'accent'        => '#f472b6',
        'neutral_light' => '#efeaf7',
        'neutral_dark'  => '#28104e',
        'text'          => '#333333',
    ];

    foreach ($colors as $id => $default) {
        $wp_customize->add_setting("global_color_{$id}", [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "global_color_{$id}", [
            'label'   => ucfirst(str_replace('_', ' ', $id)),
            'section' => 'global_settings',
        ]));
    }
}
add_action('customize_register', 'lin_customizer_global_settings');
