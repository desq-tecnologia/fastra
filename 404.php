<?php
/**
 * Template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<main class="error-404">
    <section class="not-found">
        <h1>Oops! Page Not Found</h1>
        <p>Sorry, the page you are looking for does not exist.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-back-home">Go Back Home</a>
    </section>
</main>

<?php get_footer(); ?>
