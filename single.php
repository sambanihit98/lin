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
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
</section>

<section class="page-wrap">
    <div class="container" style="padding: 40px 0px 80px 0px;">

        <?php if (has_post_thumbnail()): ?>

            <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail" style="display:block; margin:0 auto;">

            <!-- <div class="post-thumbnail">
                <?php //the_post_thumbnail('large'); 
                ?>
            </div> -->
        <?php endif; ?>

        <?php get_template_part('includes/section', 'blogcontent'); ?>
    </div>
</section>


<?php get_footer(); ?>