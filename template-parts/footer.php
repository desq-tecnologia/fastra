<?php
/**
 * Footer template part
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer-widgets')) : ?>
                <?php dynamic_sidebar('footer-widgets'); ?>
            <?php endif; ?>
        </div>

        <p class="footer-text">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
        </p>
    </div>
</footer>

<?php wp_footer(); ?>

</div>
</body>
</html>
