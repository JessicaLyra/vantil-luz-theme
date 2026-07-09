<?php

if (!defined('ABSPATH')) {
    exit;
}
require get_template_directory() . '/inc/customizer.php';
/**
 * Configuração do tema
 */
function vantil_luz_setup() {

    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    register_nav_menus(array(
        'primary' => __('Menu Principal', 'vantil-luz'),
    ));


}

add_action('after_setup_theme', 'vantil_luz_setup');


/**
 * Carregar CSS e JS
 */
function vantil_luz_assets() {

    $version = wp_get_theme()->get('Version');

    $styles = [
        'global',
        'header',
        'hero',
        'about',
        'benefits',
        'how it works',
        'services',
        'testimonials',
        'faq',
        'cta',
        'contact',
        'footer',
    ];
     foreach ($styles as $style) {
        wp_enqueue_style(
            "vantil-{$style}",
            get_template_directory_uri() . "/assets/css/{$style}.css",
            [],
            $version
        );
    }

    wp_enqueue_style(
        'vantil-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'vantil-main',
        get_template_directory_uri() . '/assets/js/main.js',
       [],
        $version,
        true
    );

    wp_enqueue_style(
    'aos',
    'https://unpkg.com/aos@2.3.1/dist/aos.css',
    [],
    '2.3.4'
    );

    wp_enqueue_script(
        'aos',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        [],
        '2.3.4',
        true
    );
}

add_action('wp_enqueue_scripts', 'vantil_luz_assets');