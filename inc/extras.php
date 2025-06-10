<?php


function is_wp_theme_customize_register($wp_customize)
{
    // Lewy logotyp
    $wp_customize->add_setting('is_wp_theme_logo_left', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'is_wp_theme_logo_left', array(
        'label'    => __('Upload Left Logo', 'is-wp-theme'),
        'section'  => 'title_tagline',
        'settings' => 'is_wp_theme_logo_left',
    )));

    // Prawy logotyp
    $wp_customize->add_setting('is_wp_theme_logo_right', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'is_wp_theme_logo_right', array(
        'label'    => __('Upload Right Logo', 'is-wp-theme'),
        'section'  => 'title_tagline',
        'settings' => 'is_wp_theme_logo_right',
    )));
}

add_action('customize_register', 'is_wp_theme_customize_register');

