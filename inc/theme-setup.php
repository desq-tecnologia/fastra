<?php
/**
 * Theme Setup - Configurations and Features
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

function fastra_setup() {
    // Enable support for title tag (SEO-friendly)
    add_theme_support('title-tag');

    // Enable support for featured images (thumbnails)
    add_theme_support('post-thumbnails');

    // Enable support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));

    // Enable support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Enable WooCommerce support (optional)
    add_theme_support('woocommerce');

    // Enable post formats (optional)
    add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'video'));

    // Enable automatic feed links
    add_theme_support('automatic-feed-links');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'fastra'),
        'footer'  => __('Footer Menu', 'fastra')
    ));

    // Define default image sizes
    add_image_size('custom-thumbnail', 800, 600, true);
}
add_action('after_setup_theme', 'fastra_setup');

/**
 * Register widget areas
 */
function fastra_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'fastra'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets added here will appear in the sidebar.', 'fastra'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widgets', 'fastra'),
        'id'            => 'footer-widgets',
        'description'   => __('Widgets added here will appear in the footer.', 'fastra'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'fastra_widgets_init');


/**
 * Improve WooCommerce Compatibility
 */
function fastra_woocommerce_support() {
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 600,
        'single_image_width'    => 1200,
    ));

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'fastra_woocommerce_support');
