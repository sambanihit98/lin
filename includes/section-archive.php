<?php if (have_posts()): while (have_posts()): the_post(); ?>

        <div class="card mb-4">
            <div class="card-body d-flex justify-content-center align-items-center gap-4">

                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title(); ?>" class="img-fluid img-thumbnail">
                <?php endif; ?>

                <div class="blog-content">
                    <h3 style="font-size: 24px; font-weight: 600;">
                        <?php the_title(); ?>
                    </h3>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="lin-card-btn">Read More</a>
                </div>

            </div>
        </div>

<?php endwhile;
else: endif; ?>