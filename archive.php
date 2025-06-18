<?php
/**
 * Template for displaying archive pages
 */

get_header(); ?>

<main class="archive-page">
    <header class="archive-header">
        <h1>
            <?php the_archive_title(); ?>
        </h1>
        <?php the_archive_description('<p class="archive-description">', '</p>'); ?>
    </header>

    <?php if (have_posts()) : ?>
        <section class="archive-posts">
            <?php while (have_posts()) : the_post(); ?>
                <article class="archive-post">
                    <h2>
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
        <p class="no-posts">No posts found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
