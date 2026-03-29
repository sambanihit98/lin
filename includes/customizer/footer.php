<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// FOOTER CUSTOMIZER
// -------------------------------------------------------------------------
function lin_customizer_footer($wp_customize)
{

    $wp_customize->add_section('footer_section', array(
        'title'    => 'Footer Settings',
        'priority' => 80,
    ));

    // Company Name
    $wp_customize->add_setting('footer_company_name', array(
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_company_name', array(
        'label'    => 'Company Name',
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Company Description / Quote
    $wp_customize->add_setting('footer_company_desc', array(
        'default'           => 'We create modern web solutions, social media strategies, and creative designs that help your business grow online.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_company_desc', array(
        'label'    => 'Company Description / Quote',
        'section'  => 'footer_section',
        'type'     => 'textarea',
    ));

    // Email
    $wp_customize->add_setting('footer_email', array(
        'default'           => 'sambanihit@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email', array(
        'label'   => 'Email Address',
        'section' => 'footer_section',
        'type'    => 'email',
    ));

    // Phone
    $wp_customize->add_setting('footer_phone', array(
        'default'           => '+63 912 345 6789',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_phone', array(
        'label'   => 'Phone Number',
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Address
    $wp_customize->add_setting('footer_address', array(
        'default'           => 'Cebu City, Philippines',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_address', array(
        'label'   => 'Address',
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Background Color
    $wp_customize->add_setting('footer_bg_color', array(
        'default'           => '#28104e',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'   => 'Footer Background Color',
        'section' => 'footer_section',
    )));

    // ------------------------
    // Footer Font Color
    // ------------------------
    $wp_customize->add_setting('footer_font_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_font_color', array(
        'label'   => 'Footer Font Color',
        'section' => 'footer_section',
    )));
}
add_action('customize_register', 'lin_customizer_footer');
