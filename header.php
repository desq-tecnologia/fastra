<?php
/**
 * Header template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo esc_attr(get_the_excerpt() ?: get_bloginfo('description')); ?>">
	<meta property="og:title" content="<?php the_title(); ?>">
	<meta property="og:description" content="<?php echo esc_attr(get_the_excerpt() ?: get_bloginfo('description')); ?>">
	<meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>">
	
	<link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">

	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "WebSite",
		"name": "<?php bloginfo('name'); ?>",
		"url": "<?php echo esc_url(home_url('/')); ?>",
		"description": "<?php bloginfo('description'); ?>"
	}
	</script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
// Hook for adding scripts or tracking codes after opening <body>
do_action('wp_body_open');
?>

<?php
/**
    * Load the modular header from template-parts/header.php
    * This keeps the main header structured and modular
    */
get_template_part('template-parts/header');
?>

<main class="site-main">
