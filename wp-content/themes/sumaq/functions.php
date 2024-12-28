<?php
// Enqueue Scripts and Styles
function sumaq_enqueue_scripts() {
    // Registrar estilo principal
    wp_enqueue_style('sumaq-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
    
    // Registrar Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;600&display=swap', [], null);
    
    // Registrar script principal
    wp_enqueue_script('sumaq-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.0', true);
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

?>