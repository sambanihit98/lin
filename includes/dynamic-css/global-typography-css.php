<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// GLOBAL TYPOGRAPHY
// -------------------------------------------------------------------------
function lin_global_typography_css()
{
    $desktop = get_theme_mod('body_font_size_desktop', 16);
    $tablet  = get_theme_mod('body_font_size_tablet', 15);
    $mobile  = get_theme_mod('body_font_size_mobile', 14);
    echo "<style>
        body{font-size:{$desktop}px;}
        @media(max-width:991px){body{font-size:{$tablet}px;}}
        @media(max-width:576px){body{font-size:{$mobile}px;}}
    </style>";
}
add_action('wp_head', 'lin_global_typography_css');
