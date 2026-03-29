<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// -------------------------------------------------------------------------
// PORTFOLIO CSS
// -------------------------------------------------------------------------
function lin_portfolio_custom_css()
{ ?>
    <style>
        .portfolio-filters .filter-btn.active {
            background-color: <?php echo get_theme_mod('portfolio_filter_active_color', '#7c3aed'); ?> !important;
            color: #fff !important;
            border: 1px solid <?php echo get_theme_mod('portfolio_filter_active_color', '#7c3aed'); ?> !important;
        }

        .portfolio-filters .filter-btn:not(.active) {
            background-color: transparent !important;
            color: <?php echo get_theme_mod('portfolio_filter_text_color', '#7c3aed'); ?> !important;
            border: 1px solid <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
        }

        .portfolio-filters .filter-btn:not(.active):hover {
            background-color: <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
            color: #fff !important;
        }

        #portfolio-pagination .filter-btn:not(.active):hover {
            background-color: <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
            color: #fff !important;
            border-color: <?php echo get_theme_mod('portfolio_filter_inactive_color', '#7c3aed'); ?> !important;
        }
    </style>
<?php }
add_action('wp_head', 'lin_portfolio_custom_css');
