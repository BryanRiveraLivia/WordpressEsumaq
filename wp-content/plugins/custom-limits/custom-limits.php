<?php
/*
Plugin Name: Custom Limits
Description: Incrementa los límites de WordPress.
*/
add_filter('upload_size_limit', function() {
    return 99999999 * 1024 * 1024; // Tamaño máximo de carga en bytes
});

@ini_set('max_execution_time', '99999999');
@ini_set('memory_limit', '99999999M');
@ini_set('post_max_size', '99999999M');
@ini_set('upload_max_filesize', '99999999M');
@ini_set('max_input_vars', '99999999');
@ini_set('max_input_time', '99999999');
?>
