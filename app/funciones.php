<?php
// Activar los shortcodes en los widgets de texto
//add_filter('widget_text','do_shortcode');

// Top level menu del plugin
function wpafp_menu_administrador() {
 add_menu_page(WPA_NAME,WPA_NAME,'manage_options',WPA_PATH.'/app/configuracion.php');
 //add_submenu_page(WPA_PATH.'/app/configuracion.php','Submenu','Submenu','manage_options',WPA_PATH.'/app/ejemplo-submenu.php');
}
add_action( 'admin_menu', 'wpafp_menu_administrador' );

// Shortcode function
function amzp_ins($atts, $content = null) {
	$args = shortcode_atts(array(
		'nombre' => 'Nombre Producto',
		'imagen' => '#',
		'url' => '#',
		'precio' => '65,50',
		'moneda' => '€'
	),$atts);

	$img = ($args[imagen] == '' || $args[imagen] == '#') ? '/wp-content/plugins/amazon-productos/img/imagen_no_disponible.png' : trim($args[imagen]);
	$product = '<div class="amazon_product">
		<div class="product_img"><img src="'.$img.'" alt="'.$args[nombre].'"></div>
		<a rel="nofollow noopener noreferrer" class="product_title" title="'.strip_tags($args[nombre]).'" href="'.trim($args[url]).'" target="_blank"><h2>'.strip_tags($args[nombre]).'</h2></a>	
		<div class="product_descript">'.$content.'</div>
		<div class="product_price">'.strip_tags($args[precio]).''.trim($args[moneda]).'</div>
		<a rel="nofollow noopener noreferrer" class="product_btn" title="'.strip_tags($args[nombre]).'" href="'.trim($args[url]).'" target="_blank">Comprar en Amazon</a>
		<div class="product_notice">Precio a la hora de escribir este artículo (Precio incl. tasas, condiciones de envio en Amazon)</div>
	</div>';
	return $product;
}
add_shortcode('amzp_ins', 'amzp_ins');

