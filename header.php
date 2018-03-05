<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header  container-fluid">
		<div class="site-branding row">
			<?php the_custom_logo(); ?>
            <h1 class="site-title text-center col-md-3 col-xs-4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

            <?php $description = get_bloginfo( 'description', 'display' ); ?>
            <? if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<? endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-container">
                <!-- <span class="navbar-toggler-icon"></span> -->
                菜单
            </button>
			<?php
				wp_nav_menu( array(
                    'theme_location' => 'top-menu',
                    'depth'          => 2,
                    'container'		 => 'div',
                    'container_class'      => 'navbar-collapse collapse',
                    'container_id'   => 'navbar-container',
                    'menu_id'   => 'navbar-menu',
                    'menu_class'     => 'nav navbar-nav',
                    'fallback_cb'	 => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'		 => new WP_Bootstrap_Navwalker()                    
				) );
            ?>
        </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
        <div class="row">
