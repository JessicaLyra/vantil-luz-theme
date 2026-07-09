<?php

if (!defined('ABSPATH')) {
    exit;
}

function vantil_luz_customize_register($wp_customize) {

    $wp_customize->add_setting('transparent_logo', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'transparent_logo',
            array(
                'label'      => __('Logo Transparente', 'vantil-luz'),
                'section'    => 'title_tagline',
                'mime_type'  => 'image',
            )
        )
    );

}

add_action('customize_register', 'vantil_luz_customize_register');