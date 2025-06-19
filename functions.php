<?php
/**
 * Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/enqueue.php';

require get_template_directory() . '/inc/customizer.php';



// Theme setup
function fastra_setup() {
    // Enable featured images
    add_theme_support('post-thumbnails');

    // Add title tag support
    add_theme_support('title-tag');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'fastra')
    ));
}
add_action('after_setup_theme', 'fastra_setup');

// Remove unnecessary WordPress bloat
function fastra_cleanup() {
    remove_action('wp_head', 'wp_generator'); // Remove WordPress version
    remove_action('wp_head', 'wlwmanifest_link'); // Remove Windows Live Writer
    remove_action('wp_head', 'rsd_link'); // Remove RSD link
    remove_action('wp_head', 'wp_shortlink_wp_head'); // Remove shortlink
    remove_action('wp_head', 'rest_output_link_wp_head'); // Remove REST API link
}
add_action('init', 'fastra_cleanup');

function fastra_register_sidebar() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'fastra'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets added here will appear in the sidebar.', 'fastra'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'fastra_register_sidebar');

// Disable emojis for performance
function fastra_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'fastra_disable_emojis');

// Custom excerpt length
function fastra_excerpt_length($length) {
    return 20; // Change the number of words in excerpts
}
add_filter('excerpt_length', 'fastra_excerpt_length', 999);

// Remove unnecessary scripts/styles from WordPress core
function fastra_optimize_scripts() {
    wp_deregister_script('wp-embed'); // Disable oEmbed script
}
add_action('wp_footer', 'fastra_optimize_scripts');


/**
 * Ensure WooCommerce pages have a consistent layout
 */
function fastra_before_main_content() {
    echo '<main class="woocommerce-page container">';
}
add_action('woocommerce_before_main_content', 'fastra_before_main_content', 5);

function fastra_after_main_content() {
    echo '</main>';
}
add_action('woocommerce_after_main_content', 'fastra_after_main_content', 5);
