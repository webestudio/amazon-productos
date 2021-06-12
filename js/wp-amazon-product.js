jQuery(document).ready(function($) {
    tinymce.create('tinymce.plugins.wpafp019_plugin', {
        init: function(ed, url) {
            // Registramos el comando de click sobre el botón
            ed.addCommand('wpafp019_insert_product', function() {
                selected = tinyMCE.activeEditor.selection.getContent();
                /* Si hay un texto seleccionado al pulsar el botón el código lo rodeará. */
                var $start = '[amzp_ins nombre="Nombre producto" imagen="#" url="#" precio="65" moneda="€"]';
                var $end = '[/amzp_ins]';
                var content = (selected) ? $start + selected + $end : '[amzp_ins nombre="Nombre producto" imagen="#" url="#" precio="65" moneda="€"]-- Descripción --[/amzp_ins]';
                tinymce.execCommand('mceInsertContent', false, content);
            });
            /* Registramos el botón, y la función del click. También especificaremos el icono del botón	*/
            ed.addButton('wpafp019_button', { nombre: 'Insertar Producto', cmd: 'wpafp019_insert_product', image: url + '/../img/amazon-icn.png' });
        }
    });

    /* El primer parámetro es el ID del botón, El segundo debe ser la función */
    tinymce.PluginManager.add('wpafp019_button', tinymce.plugins.wpafp019_plugin);
});