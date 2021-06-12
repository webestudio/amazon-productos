<?php
// Elimina las opciones del plugin almacenadas en BD
$option = 'wpafp019';

if ( !defined('WP_UNINSTALL_PLUGIN') ) {
	delete_option ($option);
	delete_site_option ($option);
  	die;
}