<?php
// Enqueue Scripts and Styles
function sumaq_enqueue_scripts() {
    // Obtener la última fecha de modificación del archivo style.css
    $style_version = filemtime(get_template_directory() . '/style.css');
    
    // Registrar estilo principal con versión dinámica
    wp_enqueue_style('sumaq-style', get_template_directory_uri() . '/style.css', [], $style_version);
    
    // Registrar Google Fonts
     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Work+Sans:wght@300;400;600&display=swap', [], null);
    
    // Registrar script principal
    wp_enqueue_script('sumaq-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], $style_version, true);
}
add_action('wp_enqueue_scripts', 'sumaq_enqueue_scripts');

// Seguridad: Deshabilitar REST API para usuarios no autenticados
add_filter('rest_authentication_errors', function($result) {
    if (!is_user_logged_in()) {
        return new WP_Error('rest_forbidden', __('REST API no está disponible para usuarios no autenticados.'), ['status' => 401]);
    }
    return $result;
});

// Seguridad: Quitar versión de WordPress del frontend
remove_action('wp_head', 'wp_generator');

// Seguridad: Deshabilitar XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Seguridad: Limitar intentos de login (brute force protection)
function sumaq_limit_login_attempts($username, $error) {
    sleep(2); // Retardo para proteger contra ataques de fuerza bruta
}
add_action('wp_login_failed', 'sumaq_limit_login_attempts', 10, 2);

// Seguridad: Ocultar errores de login
function sumaq_no_login_error_messages() {
    return 'Error: Verifique sus credenciales.';
}
add_filter('login_errors', 'sumaq_no_login_error_messages');

// Seguridad: Deshabilitar edición de archivos desde el panel de administración
define('DISALLOW_FILE_EDIT', true);

// Seguridad: Requerir contraseñas fuertes en los usuarios
add_action('user_profile_update_errors', function($errors, $update, $user) {
    if (empty($_POST['pass1']) || strlen($_POST['pass1']) < 12) {
        $errors->add('weak_password', __('La contraseña debe tener al menos 12 caracteres.'));
    }
}, 10, 3);

// Deslimitar WordPress (Recursos ilimitados)
@ini_set('upload_max_size', '9999M');
@ini_set('post_max_size', '9999M');
@ini_set('memory_limit', '9999M');
@ini_set('max_execution_time', '99999');
@ini_set('max_input_vars', '99999');

// Volver al editor clásico (Eliminar Gutenberg)
add_filter('use_block_editor_for_post', '__return_false', 10);
add_action('admin_init', function() {
    remove_action('welcome_panel', 'wp_welcome_panel');
});
add_filter('use_widgets_block_editor', '__return_false'); // Volver al editor clásico de widgets

// Deshabilitar emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Optimización: Deshabilitar scripts innecesarios
function sumaq_remove_scripts() {
    wp_dequeue_style('wp-block-library'); // Deshabilitar estilos de Gutenberg
}
add_action('wp_enqueue_scripts', 'sumaq_remove_scripts', 100);

function sumaq_theme_setup() {
    // Habilitar soporte para títulos automáticos
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'sumaq_theme_setup');

function sumaq_register_menus() {
    register_nav_menus([
        'general' => __('Menú General', 'sumaq-grupo'),
    ]);
}
add_action('after_setup_theme', 'sumaq_register_menus');

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}

function register_custom_menus() {
    register_nav_menus([
        'nosotros' => __('Menú Nosotros', 'textdomain'), // Registrar la ubicación del menú
    ]);
}
add_action('init', 'register_custom_menus');

function register_custom_menus_sumate() {
    register_nav_menus([
        'sumate' => __('Súmate a SUMAQ', 'textdomain'), // Registrar la ubicación del menú
    ]);
}
add_action('init', 'register_custom_menus_sumate');

function register_custom_menus_proyectos() {
    register_nav_menus([
        'proyectos' => __('Proyectos', 'textdomain'), // Registrar la ubicación del menú
    ]);
}
add_action('init', 'register_custom_menus_proyectos');

function register_custom_menus_servicios() {
    register_nav_menus([
        'servicios' => __('Servicios', 'textdomain'), // Registrar la ubicación del menú
    ]);
}
add_action('init', 'register_custom_menus_servicios');

class Custom_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Obtén las clases y los atributos del enlace
        $classes = !empty($item->classes) ? implode(' ', $item->classes) : '';
        $url = !empty($item->url) ? $item->url : '#';
        $title = !empty($item->title) ? $item->title : '';

        // Aquí puedes personalizar los íconos según el título o clases del menú
        $icon_src = get_template_directory_uri() . '/assets/images/quienesSomosIco.png'; // Ícono predeterminado
        if (strpos(strtolower($title), 'quienes') !== false) {
            $icon_src = get_template_directory_uri() . '/assets/images/quienesSomosIco.png';
        } elseif (strpos(strtolower($title), 'historia') !== false) {
            $icon_src = get_template_directory_uri() . '/assets/images/historiaIco.png';
        }

        // Genera el HTML del elemento
        $output .= '<li>';
        $output .= '<a href="' . esc_url($url) . '" class="flex flex-row gap-[12px] items-baseline transition-all hover:text-[#7190C9]">';
        $output .= '<img class="w-[27px] object-contain h-[27px]" src="' . esc_url($icon_src) . '" alt="' . esc_attr($title) . '">';
        $output .= '<span>' . esc_html($title) . '</span>';
        $output .= '</a>';
        $output .= '</li>';
    }
}

add_filter('show_admin_bar', '__return_false');


?>