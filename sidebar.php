<?php
/**
 * Sidebar template
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside class="site-sidebar">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
