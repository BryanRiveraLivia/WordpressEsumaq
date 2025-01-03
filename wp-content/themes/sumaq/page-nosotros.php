<?php
/*
 * Template Name: Página Nosotros
 */

// Llama al encabezado
get_header();
?>
<?php
// Obtén el valor del campo personalizado
$titulo_opcional_para_banner = get_field('titulo_opcional_para_banner');
$foco_de_la_imagen = get_field('foco_de_la_imagen');
?>
<!-- Aquí puedes escribir el contenido único de tu página "Nosotros" -->
<div class="contenido-nosotros bg-[#cbcbcb]">
    <?php
    if($titulo_opcional_para_banner){
    ?>
    <div class="banner !bg-cover bg-center 4k:h-[182px] 3xl:4k:h-[182px] 2xl:4k:h-[182px] xl:h-[182px] lg:h-[182px] md:h-[150px] sm:h-[150px] xs:h-[150px] items-center justify-center flex bg-<?php echo $foco_de_la_imagen ?>"
        style="background-image: url(<?php echo esc_url( get_field( 'banner_del_titulo' ) ); ?>);">
        <div class="container">
            <h1 class="font-title text-[#373435] 4k:text-[70px] 3xl:text-[70px] 2xl:text-[70px] xl:text-[70px] lg:text-[70px] md:text-[50px] sm:text-[50px] xs:text-[50px] font-black 4k:leading-[70px] 3xl:leading-[70px] 2lx:leading-[70px] xl:leading-[70px] lg:leading-[70px] md:leading-[50px] sm:leading-[50px] xs:leading-[50px] 4k:p-[15%] 3xl:p-[15%] 2xl:p-[15%] xl:p-[15%] lg:p-[15%] md:p-[0%] sm:p-[0%] xs:p-[0%] tracking-[-4px] 4k:text-left 3xl:text-left 2xl:text-left xl:text-left lg:text-left md:text-center sm:text-center xs:text-center"
                style="text-shadow: -11px 0px 11px rgb(65 139 166); font-family: Arial;">
                <?php


// Comprueba si el campo tiene valor
if ( $titulo_opcional_para_banner ) :
    // Muestra el valor del campo personalizado
    echo $titulo_opcional_para_banner;
else :
    // Muestra el título de la página
    echo esc_html( get_the_title() );
endif;
?>
            </h1>
        </div>
    </div>
    <?php }else{?>
    <img src="<?php echo esc_url( get_field( 'banner_del_titulo' ) ); ?>"
        class="w-full object-cover h-[182px] bg-<?php echo $foco_de_la_imagen ?>" alt="">
    <?php }?>
    <div class="contenido py-[50px]">
        <div class="container">
            <div class="bloqueQuienesSomos max-w-[400px] mx-auto mb-[100px]">
                <h2 class="text-[#373435] font-[700] text-[42px] leading-[50px] block mb-[50px] text-center">
                    <span class="underline">¿Quiénes</span> <span class="uppercase">SOMOS?</span>
                </h2>
                <div class="card-container">
                    <div class="card">
                        <!-- Cara frontal -->
                        <div class="side front">
                            <img src="<?php echo esc_url( get_field( 'imagen_card__quienes_somos' ) ); ?>"
                                alt="Presentación">
                        </div>
                        <!-- Cara trasera -->
                        <div class="side back">
                            <span>
                                <?php if ( $texto_card__quienes_somos = get_field( 'texto_card__quienes_somos' ) ) : ?>
                                <?php echo $texto_card__quienes_somos; ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bloqueNuestraFilosofia max-w-[810px] mx-auto mb-[100px]">
                <h2 class="text-[#373435] font-[700] text-[42px] leading-[50px] block mb-[50px] text-center">
                    <span class="underline">Nuestra</span> <span class="uppercase">FILOSOFÍA</span>
                </h2>
                <div class="flex flex-row gap-[30px] items-center justify-center">
                    <div class="flex flex-row  items-center justify-center">
                        <div class="min-w-[45px] flex items-end justify-end">
                            <img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/nro1.png"
                                alt="Logo de SUMAQ">
                        </div>
                        <div>
                            <h3 class="text-[#373435] font-[700] text-[24px] leading-[29px]  text-center mb-3">
                                <span>MISIÓN</span>
                            </h3>
                            <div class="card-container">
                                <div class="card !w-[248px] !w-[269px]">
                                    <!-- Cara frontal -->
                                    <div class="side front">
                                        <img class="w-[70%]"
                                            src="<?php echo esc_url( get_field( 'imagen_card__mision' ) ); ?>"
                                            alt="Presentación">
                                    </div>
                                    <!-- Cara trasera -->
                                    <div class="side back">
                                        <span class="!text-[10px]">
                                            <?php if ( $texto_card__mision = get_field( 'texto_card__mision' ) ) : ?>
                                            <?php echo $texto_card__mision; ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row  items-center justify-center">
                        <div class="min-w-[45px] flex items-end justify-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nro2.png"
                                alt="Logo de SUMAQ">
                        </div>
                        <div>
                            <h3 class="text-[#373435] font-[700] text-[24px] leading-[29px]  text-center mb-3">
                                <span>VISIÓN</span>
                            </h3>
                            <div class="card-container">
                                <div class="card !w-[248px] !w-[269px]">
                                    <!-- Cara frontal -->
                                    <div class="side front">
                                        <img class="w-[70%]"
                                            src="<?php echo esc_url( get_field( 'imagen_card__vision' ) ); ?>"
                                            alt="Presentación">
                                    </div>
                                    <!-- Cara trasera -->
                                    <div class="side back">
                                        <span class="!text-[10px]">
                                            <?php if ( $texto_card__vision = get_field( 'texto_card__vision' ) ) : ?>
                                            <?php echo $texto_card__vision; ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row  items-center justify-center">
                        <div class="min-w-[45px] flex items-end justify-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nro3.png"
                                alt="Logo de SUMAQ">
                        </div>
                        <div>
                            <h3 class="text-[#373435] font-[700] text-[24px] leading-[29px]  text-center mb-3">
                                <span>VALORES</span>
                            </h3>
                            <div class="card-container">
                                <div class="card !w-[248px] !w-[269px]">
                                    <!-- Cara frontal -->
                                    <div class="side front">
                                        <img class="w-[70%]"
                                            src="<?php echo esc_url( get_field( 'imagen_card__valores' ) ); ?>"
                                            alt="Presentación">
                                    </div>
                                    <!-- Cara trasera -->
                                    <div class="side back">
                                        <span class="!text-[10px]">
                                            <?php if ( $texto_card__valores = get_field( 'texto_card__valores' ) ) : ?>
                                            <?php echo $texto_card__valores; ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Llama al pie de página
get_footer();
?>