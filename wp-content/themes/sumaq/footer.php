    <footer class="bg-primary py-[50px] items-center">
        <div
            class="container mx-auto flex 4k:flex-row 3xl:flex-row 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col xs:flex-col items-center gap-[30px]">
            <div
                class="4k:w-[500px] 3xl:w-[500px] 2xl:w-[500px] xl:w-[400px] lg:w-[350px] md:w-[100%] sm:w-[100%] xs:w-[100%] flex flex-col gap-[20px] 4k:order-1 3xl:order-1 2xl:order-1 xl:order-1 lg:order-1 md:order-1 sm:order-1 xs:order-1">
                <div>
                    <a href="<?php echo home_url()?>">
                        <img class="w-[200px] 4k:ms-0 3xl:ms-0 2xl:ms-0 xl:ms-0 lg:ms-0 md:mx-auto sm:mx-auto xs:mx-auto"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                            alt="Logo de SUMAQ">
                    </a>

                </div>
                <div class="flex flex-col gap-[15px] ">
                    <div>
                        <p
                            class="font-title text-sm font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold  font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold ">
                            <?php if ( $contactanos = get_field( 'contactanos', 'options' ) ) : ?>
                            <?php echo esc_html( $contactanos ); ?>
                            <?php endif; ?></p>
                    </div>
                    <div class="flex flex-col gap-[25px]">
                        <div
                            class="flex 4k:flex-row 3xl:flex-row 2xl:flex-row xl:flex-col lg:flex-col md:flex-col sm:flex-col xs:flex-col items-center">
                            <div
                                class="4k:w-[30%] 3xl:w-[30%] 2xl:w-[30%] xl:w-[100%] md:w-[100%] sm:w-[100%] xs:w-[100%] 4k:mb-0 3xl:mb-0 2xl:mb-0 xl:mb-3 md:mb-3 sm:mb-3 xs:mb-3">
                                <p
                                    class="font-title text-sm font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold ">
                                    <?php if ( have_rows( 'ventas', 'options' ) ) : ?>
                                    <?php while ( have_rows( 'ventas', 'options' ) ) :
		the_row(); ?>

                                    <?php if ( $titulo_grupo = get_sub_field( 'titulo_grupo', 'options' ) ) : ?>
                                    <?php echo esc_html( $titulo_grupo ); ?>
                                    <?php endif; ?>
                                    <?php endwhile; ?>
                                    <?php endif; ?></p>
                            </div>
                            <div
                                class="4k:flex-1 3xl:flex-1 2xl:flex-1 xl:w-[100%] md:w-[100%] sm:w-[100%] xs:w-[100%]">
                                <ul class="flex flex-col gap-[10px]">
                                    <?php
// Obtén el grupo "ventas"
$ventas = get_field('ventas', 'options');

// Verifica si el grupo existe y tiene datos
if ($ventas && is_array($ventas)) {
    // Obtén el título del grupo
    $titulo_grupo = $ventas['titulo_grupo'] ?? null;

    // Obtén la información de contacto (repetidor)
    $informacion_de_contacto = $ventas['informacion_de_contacto'] ?? null;

  

    // Itera sobre el repetidor para mostrar cada fila
    if ($informacion_de_contacto && is_array($informacion_de_contacto)) {
        foreach ($informacion_de_contacto as $contacto) {
            // Obtén el tipo (email o teléfono)
            $tipo = $contacto['tipo_ventas'] ?? '';
            $icono = ($tipo === 'email') ? 'icoEmail.png' : 'icoFono.png';

            // Obtén el contenido del campo "email / teléfono"
            $contenido = $contacto['email__telefono'] ?? '';

            // Renderiza el HTML de cada ítem
            if (!empty($contenido)) {
                echo '<li>
                        <a href="' . (($tipo === 'email') ? 'mailto:' . esc_attr($contenido) : 'tel:' . esc_attr($contenido)) . '" 
                           class="flex flex-row gap-[10px] items-center transition-all hover:text-[#7190C9]">
                            <img class="w-[24px] h-[24px] object-contain border-[#7190C9] border-2 rounded-full"
                                 src="' . get_template_directory_uri() . '/assets/images/' . esc_attr($icono) . '" 
                                 alt="Icono">
                            <span>' . esc_html($contenido) . '</span>
                        </a>
                      </li>';
            }
        }
    } else {
        echo 'No hay información de contacto disponible.';
    }
} else {
    // Este mensaje solo aparece si el grupo no existe o está vacío
    echo 'No se encontró el grupo "ventas".';
}
?>

                                </ul>
                            </div>
                        </div>
                        <div
                            class="flex 4k:flex-row 3xl:flex-row 2xl:flex-row xl:flex-col lg:flex-col md:flex-col sm:flex-col xs:flex-col items-center">
                            <div
                                class="4k:w-[30%] 3xl:w-[30%] 2xl:w-[30%] xl:w-[100%] md:w-[100%] sm:w-[100%] xs:w-[100%] 4k:mb-0 3xl:mb-0 2xl:mb-0 xl:mb-3 md:mb-3 sm:mb-3 xs:mb-3">
                                <p
                                    class="font-title text-sm font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold ">
                                    <?php if ( have_rows( '', 'options' ) ) : ?>
                                    <?php while ( have_rows( '', 'options' ) ) :
		the_row(); ?>

                                    <?php if ( $titulo_grupo_postventa = get_sub_field( 'titulo_grupo_postventa', 'options' ) ) : ?>
                                    <?php echo esc_html( $titulo_grupo_postventa ); ?>
                                    <?php endif; ?>

                                    <?php endwhile; ?>
                                    <?php endif; ?></p>
                            </div>
                            <div
                                class="4k:flex-1 3xl:flex-1 2xl:flex-1 xl:w-[100%] md:w-[100%] sm:w-[100%] xs:w-[100%]">
                                <ul>
                                    <?php
// Obtén el grupo "postventa"
$postventa = get_field('postventa', 'options');

// Verifica si el grupo existe y tiene datos
if ($postventa && is_array($postventa)) {
    // Obtén el título del grupo
    $titulo_grupo_postventa = $postventa['titulo_grupo_postventa'] ?? null;

    // Obtén la información de contacto (repetidor)
    $informacion_de_contacto_postventa = $postventa['informacion_de_contacto_postventa'] ?? null;


    // Itera sobre el repetidor para mostrar cada fila
    if ($informacion_de_contacto_postventa && is_array($informacion_de_contacto_postventa)) {
        foreach ($informacion_de_contacto_postventa as $contacto) {
            // Obtén el tipo (email o teléfono)
            $tipo_postventa = $contacto['tipo_postventa'] ?? '';
            $icono = ($tipo_postventa === 'email') ? 'icoEmail.png' : 'icoTelefono.png';

            // Obtén el contenido del campo "email / teléfono"
            $contenido = $contacto['email__telefono'] ?? '';

            // Renderiza el HTML de cada ítem
            if (!empty($contenido)) {
                echo '<li>
                        <a href="' . (($tipo_postventa === 'email') ? 'mailto:' . esc_attr($contenido) : 'tel:' . esc_attr($contenido)) . '" 
                           class="flex flex-row gap-[10px] items-center transition-all hover:text-[#7190C9]">
                            <img class="w-[24px] h-[24px] object-contain border-[#7190C9] border-2 rounded-full"
                                 src="' . get_template_directory_uri() . '/assets/images/' . esc_attr($icono) . '" 
                                 alt="Icono">
                            <span>' . esc_html($contenido) . '</span>
                        </a>
                      </li>';
            }
        }
    } else {
        echo 'No hay información de contacto disponible.';
    }
} else {
    // Este mensaje solo aparece si el grupo no existe o está vacío
    echo 'No se encontró el grupo "postventa".';
}
?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-center gap-[30px] ">
                    <?php if (have_rows('redes_sociales', 'options')) : ?>
                    <?php while (have_rows('redes_sociales', 'options')) : the_row(); ?>
                    <!-- Facebook -->
                    <?php
        $logo_facebook = get_sub_field('logo_facebook', 'options');
        $url_facebook = get_sub_field('url_facebook', 'options');
        if ($logo_facebook && $url_facebook) : ?>
                    <a target="_new" href="<?php echo esc_url($url_facebook); ?>"
                        class="flex flex-col gap-[3px] items-center text-center">
                        <img class="w-[100px] object-contain h-[70px]" src="<?php echo esc_url($logo_facebook); ?>"
                            alt="Logo Facebook">
                    </a>
                    <?php endif; ?>

                    <!-- Instagram -->
                    <?php
        $logo_instagram = get_sub_field('logo_instagran', 'options');
        $url_instagram = get_sub_field('url_instagram', 'options');
        if ($logo_instagram && $url_instagram) : ?>
                    <a target="_new" href="<?php echo esc_url($url_instagram); ?>"
                        class="flex flex-col gap-[3px] items-center text-center">
                        <img class="w-[100px] object-contain h-[70px]" src="<?php echo esc_url($logo_instagram); ?>"
                            alt="Logo Instagram">
                    </a>
                    <?php endif; ?>

                    <!-- TikTok -->
                    <?php
        $logo_tiktok = get_sub_field('logo_tiktok', 'options');
        $url_tiktok = get_sub_field('url_tiktok', 'options');
        if ($logo_tiktok && $url_tiktok) : ?>
                    <a target="_new" href="<?php echo esc_url($url_tiktok); ?>"
                        class="flex flex-col gap-[3px] items-center text-center">
                        <img class="w-[100px] object-contain h-[50px]" src="<?php echo esc_url($logo_tiktok); ?>"
                            alt="Logo TikTok">
                    </a>
                    <?php endif; ?>

                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
            <div
                class="border-r-2 border-[#7190C9] h-[330px] 4k:order-2 3xl:order-2 2xl:order-2 xl:order-2 lg:order-2 md:order-2 sm:order-2 xs:order-2 4k:block 3xl:block 2xl:block xl:block lg:block md:hidden sm:hidden xs:hidden">
            </div>
            <div
                class="border-t-2 w-full border-[#7190C9] h-[2px] 4k:order-2 3xl:order-2 2xl:order-2 xl:order-2 lg:order-2 md:order-2 sm:order-2 xs:order-2 4k:hidden 3xl:hidden 2xl:hidden xl:hidden lg:hidden md:hidden sm:hidden xs:hidden">
            </div>
            <div
                class="flex-1 flex-col gap-[10px] flex 4k:order-3 3xl:order-3 2xl:order-3 xl:order-3 lg:order-3 md:order-3 sm:order-3 xs:order-3">
                <div class="flex flex-col mb-[40px]">
                    <div
                        class="flex 4k:flex-row 3xl:flex-row 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-[40px] 4k:items-start 3xl:items-start 2xl:items-start xl:items-start lg:items-start md:items-start sm:items-start xs:items-start">
                        <div
                            class="flex flex-col 4K:w-[248px] 3xl:w-[248px] 2xl:w-[248px] xl:w-[50%] lg:w-[50%] md:w-[100%] sm:w-[100%] xs:w-[100%] sm:w-[100%]">
                            <p
                                class="font-title text-sm font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold  pl-10">
                                NOSOTROS</p>
                            <div class="border-t-2 border-[#7190C9] mb-2 "></div>
                            <?php
if (has_nav_menu('nosotros')) {
    wp_nav_menu([
        'theme_location'  => 'nosotros',
        'menu_class'      => 'grid 4k:grid-cols-1 3xl:grid-cols-1 2xl:grid-cols-1 gap-4', // Clases para el contenedor UL
        'container'       => false, // Evita el contenedor adicional
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>', // Personaliza el envoltorio
        'fallback_cb'     => false,
        'walker'          => new Custom_Nav_Walker(), // Usa un Walker personalizado
    ]);
} else {
    echo '<p>No hay un menú asignado a la ubicación "nosotros".</p>';
}
?>
                        </div>
                        <div
                            class="4k:flex-1 3xl:flex-1 2xl:flex-1  xl:w-[50%] lg:w-[50%]  md:w-[100%] sm:w-[100%] xs:w-[100%] sm:w-[100%]">
                            <p class=" font-title text-sm font-normal first-line:uppercase first-letter:text-slate-900
                            first-letter:text-[18px] first-letter:leading-none first-letter:font-bold pl-10">
                                SÚMATE A SUMAQ</p>
                            <div class="border-t-2 border-[#7190C9] mb-2 "></div>
                            <?php
if (has_nav_menu('sumate')) {
    wp_nav_menu([
        'theme_location'  => 'sumate',
        'menu_class'      => 'grid 4k:grid-cols-3 3xl:grid-cols-3 2xl:grid-cols-2 gap-4', // Clases para el contenedor UL
        'container'       => false, // Evita el contenedor adicional
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>', // Personaliza el envoltorio
        'fallback_cb'     => false,
        'walker'          => new Custom_Nav_Walker(), // Usa un Walker personalizado
    ]);
} else {
    echo '<p>No hay un menú asignado a la ubicación "sumate".</p>';
}
?>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="flex flex-col mb-[40px]">
                    <div
                        class="flex 4k:flex-row 3xl:flex-row 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-[40px] 4k:items-start 3xl:items-start 2xl:items-start xl:items-start lg:items-start md:items-start sm:items-start xs:items-start">
                        <div
                            class="flex flex-col 4k:w-[50%] 3xl:w-[50%] 2xl:w-[50%] xl:w-[50%] lg:w-[50%]  md:w-[100%] sm:w-[100%] xs:w-[100%] sm:w-[100%]">
                            <p
                                class="font-title text-sm font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold  pl-10">
                                PROYECTOS</p>
                            <div class="border-t-2 border-[#7190C9] mb-2 "></div>
                            <?php
if (has_nav_menu('proyectos')) {
    wp_nav_menu([
        'theme_location'  => 'proyectos',
        'menu_class'      => 'grid 4k:grid-cols-3 3xl:grid-cols-3 2xl:grid-cols-2 gap-4', // Clases para el contenedor UL
        'container'       => false, // Evita el contenedor adicional
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>', // Personaliza el envoltorio
        'fallback_cb'     => false,
        'walker'          => new Custom_Nav_Walker(), // Usa un Walker personalizado
    ]);
} else {
    echo '<p>No hay un menú asignado a la ubicación "proyectos".</p>';
}
?>
                        </div>
                        <div
                            class="flex flex-col 4k:w-[50%] 3xl:w-[50%] 2xl:w-[50%] xl:w-[50%] lg:w-[50%]  md:w-[100%] sm:w-[100%] xs:w-[100%] sm:w-[100%]">
                            <p
                                class="font-title text-sm font-normal first-line:uppercase  first-letter:text-slate-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold  pl-10">
                                SERVICIOS</p>
                            <div class="border-t-2 border-[#7190C9] mb-2 "></div>
                            <?php
if (has_nav_menu('servicios')) {
    wp_nav_menu([
        'theme_location'  => 'servicios',
        'menu_class'      => 'grid 4k:grid-cols-3 3xl:grid-cols-3 2xl:grid-cols-2 gap-4', // Clases para el contenedor UL
        'container'       => false, // Evita el contenedor adicional
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>', // Personaliza el envoltorio
        'fallback_cb'     => false,
        'walker'          => new Custom_Nav_Walker(), // Usa un Walker personalizado
    ]);
} else {
    echo '<p>No hay un menú asignado a la ubicación "servicios".</p>';
}
?>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div
                    class="border-t-2 border-[#7190C9] mb-[30px] 4k:block 3xl:block 2xl:block xl:block lg:block md:hidden sm:hidden xs:hidden">
                </div>
                <div class=" flex gap-[30px] flex items-center 4k:flex-row 3xl:flex-row 2xl:flex-row xl:flex-row
                    lg:flex-row md:flex-col sm:flex-col xs:flex-col">
                    <div
                        class="flex-1 4k:order-1 3xl:order-1 2xl:order-1 xl:order-1 lg:order-1 md:order-2 sm:order-2 xs:order-2">
                        <span>Todas las imágenes y planes fueron elaborados con fines estrictamente ilustrativos,
                            sus características y dimensiones son aproximadas, no constituyen necesariamente una
                            representación exacta de la realidad. Su único objetivo es mostrar una visualización
                            general del proyecto y no cada uno de sus detalles. </span>
                    </div>
                    <div
                        class="4k:order-2 3xl:order-2 2xl:order-2 xl:order-2 lg:order-2 md:order-1 sm:order-1 xs:order-1">
                        <a href="<?php echo home_url()?>/libro-de-reclamaciones"
                            class="flex flex-row gap-4 items-center bg-[#666666] py-2 px-3 rounded-md hover:opacity-75 transition-all"><img
                                class="w-[80px]"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/libroReclamaciones2.png"
                                alt="Logo de SUMAQ">
                            <div class="flex flex-col">
                                <p
                                    class="text-white font-title text-[13px] text-sm font-normal first-line:uppercase  first-letter:text-white-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold">
                                    Libro de</p>
                                <p
                                    class="text-white font-title text-[13px] text-sm font-normal first-line:uppercase  first-letter:text-white-900 first-letter:text-[18px] first-letter:leading-none first-letter:font-bold">
                                    Reclamaciones</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    </footer>
    <div id="menuMobile"
        class="menuMobile transition-transform transform -translate-x-full absolute top-0 left-0  !h-full w-full shadow-lg z-50 ">
        <div class="flex flex-row h-full">
            <div class="w-[70%] bg-white p-6 items-center flex flex-col justify-center overflow-y-auto">
                <a href="<?php echo home_url()?>" class="mx-auto block mb-6">
                    <img class="w-[200px] mx-auto" src="<?php echo esc_url( get_field( 'logo', 'options' ) ); ?>"
                        alt="Logo de SUMAQ">
                </a>

                <?php
    if (has_nav_menu('general')) {
        wp_nav_menu([
            'theme_location' => 'general',
            'menu_class'     => 'flex-1 flex flex-col w-full',
            'container_class' => 'sidebarMenu_menu_general w-full',
            'fallback_cb'    => false,
        ]);
    } else {
        echo '<p>No hay un menú asignado a la ubicación "general".</p>';
    }
    ?>

            </div>
            <div class="overlayMenu flex-1  cursor-pointer bg-[#03030312]"></div>
        </div>
    </div>


    <?php wp_footer(); ?>
    </body>

    </html>