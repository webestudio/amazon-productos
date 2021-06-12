<?php
/**
* Plugin Name: Amazon Affiliates Product Insert
* Plugin URL: https://jorgebravo.info
* Description: Amazon Productos de afiliados para WordPress, inserta productos fácilmente desde el editor de Wordpress y muestralos con un diseño atractivo y visual.
* Version: 1.0
* Author: Jorge Bravo
* Author URI: https://jorgebravo.info
* License: GPL2
**/

define ('ABSPATH') or die("Bye bye");
define ('WPA_PATH', plugin_dir_path(__FILE__));
define ('WPA_NAME', 'Inserta Productos de Amazon Afiliados');

add_action('init', 'wpafp019_shortcode_button_init');
function wpafp019_shortcode_button_init() {
    //Si el usuario no carga el plugin TinyMCE, abortamos la función
    if (! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
    return;

    //Añadimos la llamada al plugin tinymce
    add_filter("mce_external_plugins", "wpafp019_register_tinymce_plugin");
    // Añadimos la respuesta para añadir nuestro botón a la barra del TinyMCE
    add_filter('mce_buttons', 'wpafp019_add_tinymce_button');
}

//Esta llamada registra el plugin.
function wpafp019_register_tinymce_plugin($plugin_array) {	
    $plugin_array['wpafp019_button'] = '/wp-content/plugins/amazon-productos/js/wp-amazon-product.js';
    return $plugin_array;
}

//Esta llamada añadirá el botón a la barra
function wpafp019_add_tinymce_button($buttons) {
    //Añadimos el ID del botón al array
    $buttons[] = "wpafp019_button";
    return $buttons;
}


// Register Style
function wpafp019_add_style() {
    //wp_enqueue_style ('amazon-productos', plugins_url('css/wpafp.css', __FILE__));
    wp_enqueue_style ('amazon-productos', plugin_dir_url( __FILE__ ).'css/wpafp.css');              
}
add_action('wp_enqueue_scripts', 'wpafp019_add_style');

include(WPA_PATH.'/app/funciones.php');