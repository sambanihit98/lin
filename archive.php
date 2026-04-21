<?php get_header(); ?>

<section class="page-hero" style="
    background: url('<?php echo esc_url(get_theme_mod('page_hero_bg', get_template_directory_uri() . '/images/main-hero-bg-default.jpg')); ?>') center center / cover no-repeat;
">
    <div>
        <div>
            <h1 style="
                margin-top: 40px;
                font-size: <?php echo get_theme_mod('page_title_font_size', 60) ?>px; 
                font-weight: <?php echo get_theme_mod('page_title_font_weight', 600); ?>;
            ">
                Blog
            </h1>
        </div>
    </div>
</section>

<section class="page-wrap">
    <div class="container" style="padding: 40px 0px 80px 0px;">
        <?php get_template_part('includes/section', 'archive'); ?>

        <div style="display:flex; justify-content:end; gap:10px; margin-top:30px;">

            <?php previous_posts_link(
                '<span style="
            display:inline-block;
            padding:10px 16px;
            background:#7c3aed;
            color:#fff;
            border-radius:6px;
            text-decoration:none;
            font-size:14px;
        ">« Previous</span>'
            ); ?>

            <?php next_posts_link(
                '<span style="
            display:inline-block;
            padding:10px 16px;
            background:#7c3aed;
            color:#fff;
            border-radius:6px;
            text-decoration:none;
            font-size:14px;
        ">Next »</span>'
            ); ?>

        </div>

        <?php
        // global $wp_query;
        // $big = 999999999; // need an unlikely integer

        // echo paginate_links(array(
        //     'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        //     'format' => '?paged=%#%',
        //     'current' => max(1, get_query_var('paged')),
        //     'total' => $wp_query->max_num_pages
        // ));
        ?>

        <?php
        // global $wp_query;

        // $links = paginate_links(array(
        //     'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        //     'format' => '?paged=%#%',
        //     'current' => max(1, get_query_var('paged')),
        //     'total' => $wp_query->max_num_pages,
        //     'prev_text' => '«',
        //     'next_text' => '»',
        //     'type' => 'array', // keep this
        // ));

        // if ($links) {

        //     echo '<div style="display:flex; justify-content:center; flex-wrap:wrap; gap:8px; margin-top:30px;">';

        //     foreach ($links as $link) {

        //         $is_active = strpos($link, 'current') !== false;

        //         $style = $is_active
        //             ? 'background:#7c3aed;color:#fff;border:1px solid #7c3aed;'
        //             : 'background:transparent;color:#7c3aed;border:1px solid #7c3aed;';

        //         echo '<span style="
        //     display:inline-block;
        //     padding:10px 14px;
        //     border-radius:6px;
        //     font-size:14px;
        //     text-decoration:none;
        //     ' . $style . '
        // ">';

        //         echo $link;

        //         echo '</span>';
        //     }

        //     echo '</div>';
        // }
        ?>

    </div>
</section>


<?php get_footer(); ?>