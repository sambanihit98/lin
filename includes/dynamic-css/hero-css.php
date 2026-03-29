<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// DYNAMIC HERO CSS
// -------------------------------------------------------------------------
function lin_dynamic_hero_css()
{
    $hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/images/main-hero-bg-default.jpg');

    $hero_heading_size = get_theme_mod('hero_heading_font_size_desktop', 64);
    $hero_subheading_size = get_theme_mod('hero_subheading_font_size_desktop', 24);

    $button_shadow = get_theme_mod('hero_button_shadow', true);
    $shadow_css = $button_shadow ? 'box-shadow: 0 8px 20px rgba(0,0,0,0.3);' : 'box-shadow: none;';

    $css = "
        .hero-section {
            background: url('{$hero_image}') center center / cover no-repeat;
        }
        .hero-content h1 {
            font-size: {$hero_heading_size}px;
        }
        .hero-content p {
            font-size: {$hero_subheading_size}px;
        }
    ";

    // Loop through hero buttons
    for ($i = 1; $i <= 2; $i++) {
        $btn_bg = get_theme_mod("hero_button_{$i}_bg_color", $i === 1 ? '#7c3aed' : '#f45aaa');
        $btn_hover = get_theme_mod("hero_button_{$i}_hover_bg_color", $i === 1 ? '#9259f3' : '#f978bb');
        $btn_text = get_theme_mod("hero_button_{$i}_text_color", '#ffffff');

        $css .= "
        .btn-hero-{$i} {
            background-color: {$btn_bg};
            color: {$btn_text};
            {$shadow_css}
        }
        .btn-hero-{$i}:hover {
            background-color: {$btn_hover};
        }
        ";
    }

    wp_add_inline_style('main', $css);
}
add_action('wp_enqueue_scripts', 'lin_dynamic_hero_css');

// -------------------------------------------------------------------------
// RESPONSIVE HERO FONT CSS
// -------------------------------------------------------------------------
function lin_dynamic_hero_responsive_styles()
{
    $h_tablet = get_theme_mod('hero_heading_font_size_tablet', 48);
    $h_mobile = get_theme_mod('hero_heading_font_size_mobile', 48);
    $p_tablet = get_theme_mod('hero_subheading_font_size_tablet', 20);
    $p_mobile = get_theme_mod('hero_subheading_font_size_mobile', 16);

    $css = "
    @media(max-width:991px){.hero-content h1{font-size:{$h_tablet}px!important;}.hero-content p{font-size:{$p_tablet}px!important;}}
    @media(max-width:767px){.hero-content h1{font-size:{$h_mobile}px!important;}.hero-content p{font-size:{$p_mobile}px!important;}}
    ";
    wp_add_inline_style('main', $css);
}
add_action('wp_enqueue_scripts', 'lin_dynamic_hero_responsive_styles');
