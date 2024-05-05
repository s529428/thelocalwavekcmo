<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php if (is_front_page() && is_home()) : ?>
                <h1 class="site-title"><?php bloginfo('name'); ?></h1>
            <?php else : ?>
                <p class="site-title"><?php bloginfo('name'); ?></p>
            <?php endif; ?>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'header',
                'menu_id'        => 'header-menu',
            ]);
            ?>
        </nav>
    </header><!-- #masthead -->

    <div id="content" class="site-content">