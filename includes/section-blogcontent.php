<?php if (have_posts()): while (have_posts()): the_post(); ?>

        <?php the_content(); ?>

        <?php
        $fname = get_the_author_meta('first_name');
        $lname = get_the_author_meta('last_name');
        ?>

        <div style="margin-top: 40px; font-size: 14px; color: #555;">
            Posted by <?php echo $fname . ' ' . $lname; ?> on <?php echo get_the_date(); ?>
        </div>

        <?php
        $tags = get_the_tags();

        if ($tags) {
            echo '<div style="margin:10px 0;">';

            foreach ($tags as $tag): ?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>" style="
            display:inline-block;
            background:#7c3aed;
            color:#fff;
            padding:4px 12px;
            border-radius:20px;
            font-size:12px;
            text-decoration:none;
            margin:5px 5px 0 0;
            transition:all 0.3s ease;
        ">
                    <?php echo esc_html($tag->name); ?>
                </a>
        <?php endforeach;

            echo '</div>';
        } else {
            echo '<p style="font-size:13px; color:#888;">No tags</p>';
        }
        ?>

        <?php comments_template(); ?>

<?php endwhile;
else: endif; ?>