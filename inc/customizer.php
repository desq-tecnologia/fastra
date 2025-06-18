<?php
/**
 * Theme Customizer - Basic Customization Options
 */

if (!defined('ABSPATH')) {
    exit;
}

function fastra_customize_register($wp_customize) {
    
    // =======================
    // SECTION: General Colors
    // =======================
    $wp_customize->add_section('fastra_colors', array(
        'title'       => __('Theme Colors', 'fastra'),
        'priority'    => 30,
    ));

    // Primary Color
    $wp_customize->add_setting('fastra_primary_color', array(
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fastra_primary_color', array(
        'label'    => __('Primary Color', 'fastra'),
        'section'  => 'fastra_colors',
        'settings' => 'fastra_primary_color',
    )));

    // Secondary Color
    $wp_customize->add_setting('fastra_secondary_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fastra_secondary_color', array(
        'label'    => __('Secondary Color', 'fastra'),
        'section'  => 'fastra_colors',
        'settings' => 'fastra_secondary_color',
    )));

    // =============
    // SECTION: Logo
    // =============
    $wp_customize->add_section('fastra_logo_settings', array(
        'title'    => __('Logo Settings', 'fastra'),
        'priority' => 35,
    ));

    // Logo Size Option
    $wp_customize->add_setting('fastra_logo_size', array(
        'default'           => 'medium',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'fastra_logo_size', array(
        'label'   => __('Logo Size', 'fastra'),
        'section' => 'fastra_logo_settings',
        'type'    => 'radio',
        'choices' => array(
            'big'    => 'Big (1000x400)',
            'medium' => 'Medium (500x200)',
            'small'  => 'Small (250x100)',
            'tiny'   => 'Tiny (125x50)',
        ),
    )));

    // Stretch or Keep Proportion
    $wp_customize->add_setting('fastra_logo_stretch', array(
        'default'           => 'keep',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fastra_logo_stretch', array(
        'label'   => __('Logo Resize Mode', 'fastra'),
        'section' => 'fastra_logo_settings',
        'type'    => 'radio',
        'choices' => array(
            'stretch' => 'Stretch',
            'keep'    => 'Keep Proportion',
        ),
    ));

    // Logo Position Option
    $wp_customize->add_setting('fastra_logo_position', array(
        'default'           => 'left',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fastra_logo_position', array(
        'label'   => __('Logo Position', 'fastra'),
        'section' => 'fastra_logo_settings',
        'type'    => 'radio',
        'choices' => array(
            'left'   => 'Left',
            'center' => 'Center',
            'right'  => 'Right',
        ),
    ));

    // =======================
    // SECTION: Typography
    // =======================
    $wp_customize->add_section('fastra_typography', array(
        'title'       => __('Typography', 'fastra'),
        'priority'    => 31,
    ));

    // Font Family
    $wp_customize->add_setting('fastra_font_family', array(
        'default'           => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fastra_font_family', array(
        'label'    => __('Font Family', 'fastra'),
        'section'  => 'fastra_typography',
        'type'     => 'select',
        'choices'  => array(
            'Arial, sans-serif'          => 'Arial',
            '"Helvetica Neue", sans-serif' => 'Helvetica Neue',
            '"Times New Roman", serif'   => 'Times New Roman',
            '"Courier New", monospace'   => 'Courier New',
        ),
    ));

    // Font Size
    $wp_customize->add_setting('fastra_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('fastra_font_size', array(
        'label'    => __('Font Size (px)', 'fastra'),
        'section'  => 'fastra_typography',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 30,
            'step' => 1,
        ),
    ));

    // =======================
    // SECTION: Header & Footer
    // =======================
    $wp_customize->add_section('fastra_layout', array(
        'title'       => __('Header & Footer', 'fastra'),
        'priority'    => 32,
    ));

    // Header Layout
    $wp_customize->add_setting('fastra_header_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fastra_header_layout', array(
        'label'    => __('Header Layout', 'fastra'),
        'section'  => 'fastra_layout',
        'type'     => 'select',
        'choices'  => array(
            'default'   => 'Default Header',
            'minimal'   => 'Minimal Header',
            'centered'  => 'Centered Logo Header',
        ),
    ));

    // Footer Layout
    $wp_customize->add_setting('fastra_footer_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('fastra_footer_layout', array(
        'label'    => __('Footer Layout', 'fastra'),
        'section'  => 'fastra_layout',
        'type'     => 'select',
        'choices'  => array(
            'default'   => 'Default Footer',
            'simple'    => 'Simple Footer',
            'columns'   => '3-Column Footer',
        ),
    ));
}

add_action('customize_register', 'fastra_customize_register');

/**
 * Apply Customizer Styles
 */
function fastra_custom_styles() {
    $primary_color   = get_theme_mod('fastra_primary_color', '#0073aa');
    $secondary_color = get_theme_mod('fastra_secondary_color', '#333333');
    $font_family     = get_theme_mod('fastra_font_family', 'Arial, sans-serif');
    $font_size       = get_theme_mod('fastra_font_size', '16');

    ?>
    <style>
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
            --font-family: <?php echo esc_attr($font_family); ?>;
            --font-size: <?php echo esc_attr($font_size); ?>px;
        }

        body {
            font-family: var(--font-family);
            font-size: var(--font-size);
        }

        a {
            color: var(--primary-color);
        }

        .site-footer {
            background-color: var(--secondary-color);
        }
    </style>
    <?php
}
add_action('wp_head', 'fastra_custom_styles');


function fastra_custom_logo_styles() {
    $logo_size = get_theme_mod('meu_tema_logo_size', 'tiny');
    $logo_stretch = get_theme_mod('meu_tema_logo_stretch', 'keep');
    $logo_position = get_theme_mod('meu_tema_logo_position', 'left');

    $size_map = array(
        'big'    => '1000px 400px',
        'medium' => '500px 200px',
        'small'  => '250px 100px',
        'tiny'   => '125px 50px',
    );

    $size_values = isset($size_map[$logo_size]) ? $size_map[$logo_size] : '125px 50px';
    $object_fit = ($logo_stretch === 'stretch') ? 'fill' : 'contain';

    ?>
    <style>
        .header-logo img {
            width: <?php echo explode(' ', $size_values)[0]; ?>;
            height: <?php echo explode(' ', $size_values)[1]; ?>;
            object-fit: <?php echo esc_attr($object_fit); ?>;
        }

        .header-logo {
            text-align: <?php echo esc_attr($logo_position); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'fastra_custom_logo_styles');


