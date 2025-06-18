<?php
/**
 * Enqueue Styles and Scripts for the theme
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

function fastra_enqueue_assets() {
    // Get theme version to use as cache buster
    $theme_version = wp_get_theme()->get('Version');

    // Enqueue Styles
    wp_enqueue_style('fastra-style', get_stylesheet_uri(), array(), $theme_version);
    wp_enqueue_style('fastra-main', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');

    // Enqueue Scripts
    wp_enqueue_script('fastra-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);

    // Remove unnecessary WordPress default scripts for better performance
    wp_deregister_script('wp-embed'); // Disable wp-embed.js
}
add_action('wp_enqueue_scripts', 'fastra_enqueue_assets');
