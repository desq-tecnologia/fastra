<?php
/**
 * Header template part
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get user-defined logo settings
$logo_position = get_theme_mod('fastra_logo_position', 'left');
$logo_size = get_theme_mod('fastra_logo_size', 'tiny');
?>

<header class="site-header">

    <div class="container">
        <div class="header-logo <?php echo esc_attr(get_theme_mod('meu_tema_logo_position', 'left')); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link">
                <?php if (has_custom_logo()) : ?>
                    <?php
                    $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
                    ?>
                    <img src="<?php echo esc_url($logo[0]); ?>" 
                        class="custom-logo <?php echo esc_attr($logo_size); ?>" 
                        alt="<?php bloginfo('name'); ?>">
                <?php endif; ?>
                <span class="site-title"><?php bloginfo('name'); ?></span>
            </a>
        </div>

        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
        </nav>
    </div>
</header>
