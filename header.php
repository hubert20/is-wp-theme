<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package is-wp-theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="top-header" role="banner">
        <!-- Top header -->
        <div class="top-header-menu">
            <div class="container px-xl-4">
                <nav class="navbar navbar-expand-xl navbar-theme py-lg-0 justify-content-end justify-content-xl-center">
                    <!-- Left logo SzP -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand top-logo top-logo--szp d-block d-lg-none p-0">
                        <img src="<?php echo esc_url(str_replace('http://', 'https://', get_theme_mod('is_wp_theme_logo_left'))); ?>" alt="">
                    </a>

                    <!-- Right logo AP -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand top-logo top-logo--ap d-block d-lg-none p-0">
                        <img src="<?php echo esc_url(str_replace('http://', 'https://', get_theme_mod('is_wp_theme_logo_right'))); ?>" alt="">
                    </a>

                    <button class="navbar-toggler rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth' => 3,
                            'walker' => new bs5_Walker()
                        ));
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>