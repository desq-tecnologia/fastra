<?php
/**
 * Template for displaying WooCommerce products
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article <?php wc_product_class(); ?>>
    <a href="<?php the_permalink(); ?>">
        <?php woocommerce_template_loop_product_thumbnail(); ?>
    </a>
    <div class="product-price"><?php woocommerce_template_loop_price(); ?></div>
    <div class="product-add-to-cart"><?php woocommerce_template_loop_add_to_cart(); ?></div>
</article>
