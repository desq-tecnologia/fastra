<?php
/**
 * Single Post Template
 */

get_header(); ?>

<main class="site-single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

		<nav class="breadcrumb">
			<a href="<?php echo home_url(); ?>">Home</a> »
			<?php if (is_single()) { ?>
				<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">News</a> »
				<span><?php the_title(); ?></span>
			<?php } ?>
		</nav>


            <p class="post-meta">
                Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
            </p>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
					<?php 
					if (has_post_thumbnail()) {
						$thumb_id = get_post_thumbnail_id();
						$thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
						echo '<img src="' . get_the_post_thumbnail_url(null, 'large') . '" alt="' . esc_attr($thumb_alt ?: get_the_title()) . '">';
					}
					?>
                </div>
            <?php endif; ?>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <div class="post-navigation">
                <div class="prev-post"><?php previous_post_link('%link', '← Previous Post'); ?></div>
                <div class="next-post"><?php next_post_link('%link', 'Next Post →'); ?></div>
            </div>

            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="post-comments">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
