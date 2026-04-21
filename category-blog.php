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

    </div>
</section>


<?php get_footer(); ?>