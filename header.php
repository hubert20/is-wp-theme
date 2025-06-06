<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mariolahairstylist-wp-theme
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
    <!-- MailerLite Universal -->
    <script>
        (function(w, d, e, u, f, l, n) {
            w[f] = w[f] || function() {
                    (w[f].q = w[f].q || [])
                    .push(arguments);
                }, l = d.createElement(e), l.async = 1, l.src = u,
                n = d.getElementsByTagName(e)[0], n.parentNode.insertBefore(l, n);
        })
        (window, document, 'script', 'https://assets.mailerlite.com/js/universal.js', 'ml');
        ml('account', '1456878');
    </script>
    <!-- End MailerLite Universal -->
</head>

<body <?php body_class(); ?>>
    <header id="top-header" class="fixed-lg-top bg-white" role="banner">
        <!-- Top Toolbar -->
        <div class="toolbar-area d-none d-lg-block px-xl-4">
            <?php if (is_active_sidebar('top-toolbar')) : ?>
                <?php dynamic_sidebar('top-toolbar'); ?>
            <?php endif; ?>
        </div>
        <!-- Top center Logo -->
        <div class="top-logo text-center py-4 container-fluid d-none d-lg-block">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="row justify-content-center">
                        <?php if (get_theme_mod('mariolahairstylist_wp_theme_logo')) : ?>
                            <div class="col-lg-3">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="d-none d-lg-block">
                                    <img src="<?php echo esc_url(str_replace('http://', 'https://', get_theme_mod('mariolahairstylist_wp_theme_logo'))); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="img-fluid">
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="col-lg-6">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="" class="d-none d-lg-block">
                                    <span class="standard-title-6 playfair-display-900 top-logo--pink text-pink-strong">Strefa Twojej urody</span>
                                    <span class="standard-title-6 playfair-display-600 fst-italic text-dark top-logo--dark text-dark">Mariola Widlak</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top header -->
        <div class="top-header-menu">
            <div class="container px-xl-4">
                <nav class="navbar navbar-expand-xl navbar-theme chakra-petch-font py-lg-0">
                    <?php if (get_theme_mod('mariolahairstylist_wp_theme_logo')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="navbar-brand align-items-center top-logo flex-column d-block d-lg-none">
                            <img src="<?php echo esc_url(str_replace('http://', 'https://', get_theme_mod('mariolahairstylist_wp_theme_logo'))); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    <?php endif; ?>
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