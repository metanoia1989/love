<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
    if ( !is_active_sidebar( 'sidebar-primary' ) ) : 
        return;
    endif; 
?>


<aside id="sidebar" class="widget-area col-md-3 col-sm-12">
        <?php dynamic_sidebar( 'sidebar-primary' ); ?>
</aside><!-- #sidebar -->
