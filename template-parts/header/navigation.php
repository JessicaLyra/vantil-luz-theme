<header class="site-header">

    <div class="container">

        <?php

$transparent_logo = get_theme_mod('transparent_logo');

$custom_logo_id = get_theme_mod('custom_logo');

$default_logo = wp_get_attachment_image_src($custom_logo_id,'full');

?>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">

            <?php if($transparent_logo): ?>

                <img
                    class="logo-transparent"
                    src="<?php echo wp_get_attachment_url($transparent_logo); ?>"
                    alt="<?php bloginfo('name'); ?>"
                >

            <?php endif; ?>


            <?php if($default_logo): ?>

                <img
                    class="logo-default"
                    src="<?php echo esc_url($default_logo[0]); ?>"
                    alt="<?php bloginfo('name'); ?>"
                >

            <?php endif; ?>

        </a>

        <button class="menu-toggle" aria-label="Abrir Menu" aria-expanded="false">

            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="4" y1="7" x2="24" y2="7"/>
            <line x1="4" y1="14" x2="24" y2="14"/>
            <line x1="4" y1="21" x2="24" y2="21"/>
            </svg>

        </button>

        <?php

        wp_nav_menu(array(

            'theme_location' => 'primary',

            'container' => false,

            'menu_class' => 'nav-menu',

            'fallback_cb' => false,

        ));

        ?>

        <a
            href="#contato"
            class="header-button"
        >
            Orçamento Grátis <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/circle-arrow-down.svg" alt="">
        </a>

    </div>

</header>