<?php
/**
 * WooCommerce Template
 *
 * This file ensures WooCommerce pages follow the theme structure.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<main class="woocommerce-page container">
    <?php woocommerce_content(); ?>
</main>

<?php get_footer(); ?>
