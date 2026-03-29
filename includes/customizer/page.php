<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// PAGE SETTINGS CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_page($wp_customize)
{
    $wp_customize->add_section('page_settings', array(
        'title'    => "Page Settings",
        'priority' => 40,
    ));

    $page_controls = [
        'page_hero_bg' => ['label' => 'Page Hero Background Image', 'type' => 'image', 'default' => get_template_directory_uri() . '/images/main-hero-bg-default.jpg', 'description' => 'Select the background image for the hero section on pages.'],
        'page_title_font_size' => ['label' => 'Page Title Font Size', 'type' => 'number', 'default' => 60],
        'page_title_font_weight' => ['label' => 'Page Title Font Weight', 'type' => 'number', 'default' => 600]
    ];

    $wp_customize->add_setting('page_hero_bg', ['default' => $page_controls['page_hero_bg']['default'], 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'page_hero_bg', ['label' => $page_controls['page_hero_bg']['label'], 'description' => $page_controls['page_hero_bg']['description'], 'section' => 'page_settings', 'settings' => 'page_hero_bg']));

    lin_add_customizer_controls($wp_customize, 'page_settings', [
        'page_title_font_size' => $page_controls['page_title_font_size'],
        'page_title_font_weight' => $page_controls['page_title_font_weight']
    ]);
}
add_action('customize_register', 'lin_customizer_page');
