<?php
/**
 * Define the metabox and field configurations.
 */

 // custom metaboxes
 add_action( 'cmb2_init', 'cmb2_gallery' );

function cmb2_gallery() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_gallery_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'gallery_metabox',
        'title'         => __( 'Galería de fotos', 'cmb2' ),
        'object_types'  => array( 'page', 'post' ), // post type
        //'object_types' => array( 'gallery'),
        //'show_on'       => array( 'key' => 'page-template', 'value' => 'page-gallery.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );
    /*
    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Teléfono', 'cmb2' ),
        'desc'       => __( 'agregar un telefono (opcional)', 'cmb2' ),
        'id'         => $prefix . 'phone',
        'type'       => 'text',
        'repeatable' => true,
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );
    */

    // Regular text field
    $cmb->add_field( array(
        'name'            => 'Imágenes de la Galería',
        'desc'            => 'Subir y administrar imágenes',
        'button'          => 'Administrar Galería', // Optionally set button label
        'id'              => $prefix . 'images',
        'type'            => 'pw_gallery',
        'sanitization_cb' => 'pw_gallery_field_sanitise',
    ));
}

?>
