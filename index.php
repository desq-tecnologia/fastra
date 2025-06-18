<?php
/**
 * Main template file
 */

get_header(); ?>

<main class="site-main">
    <?php if (have_posts()) : ?>
        <section class="post-list">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="post-meta">
                        Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
                    </p>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </article>
            <?php endwhile; ?>
        </section>

        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>

    <?php else : ?>
        <section class="no-posts">
            <h2>No posts found</h2>
            <p>It seems we can’t find what you’re looking for. Try searching or browsing recent posts.</p>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
