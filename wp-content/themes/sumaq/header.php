<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-body','text-sm'); ?>>
    <header class="bg-primary py-[30px] items-center">
        <div class="container mx-auto flex flex-row items-center gap-[30px] justify-between">
            <div>
                <a href="<?php echo home_url()?>">
                    <img class="4k:w-[180px] 3xl:w-[180px] 2xl:w-[180px] xl:w-[180px] lg:w-[180px] md:w-[150px] sm:w-[150px] xs:w-[150px]"
                        src="<?php echo esc_url( get_field( 'logo', 'options' ) ); ?>" alt="Logo de SUMAQ">
                </a>
            </div>
            <?php
if (has_nav_menu('general')) {
    wp_nav_menu([
        'theme_location' => 'general',
        'menu_class'     => 'flex-1 4k:!flex 3xl:!flex 2xl:!flex xl:!flex lg:!flex md:!hidden sm:!hidden xs:!hidden ',
        'container'      => 'nav',
        'container_class' => 'menu_general ',
        'fallback_cb'    => false,
    ]);
} else {
    echo '<p>No hay un menú asignado a la ubicación "general".</p>';
}
?>
            <div
                class="icoMobileMenu 4k:!hidden 3xl:!hidden 2xl:!hidden xl:!hidden lg:!hidden md:!block sm:!block xs:!block sm:!block">
                <img class="4k:w-[40px] 3xl:w-[40px] 2xl:w-[40px] xl:w-[40px] lg:w-[40px] md:w-[40px] sm:w-[40px] xs:w-[40px] cursor-pointer !mb-0"
                    id="toggleMenu" src="<?php echo get_template_directory_uri(); ?>/assets/images/icoMenu.png"
                    alt="Logo de SUMAQ">

            </div>
        </div>

        </div>
    </header>