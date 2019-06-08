<?php
/*
 * Register a Custom Post Type (slide)
 */
add_action('init', 'slide_init');

function slide_init() {
    $labels = array(
        'name'               => _x('Slides', 'post type general name'),
        'singular_name'      => _x('Slide', 'post type singular name'),
        'add_new'            => _x('Agregar Nuevo', 'slide'),
        'add_new_item'       => __('Agregar Nuevo Slide'),
        'edit_item'          => __('Editar slide'),
        'new_item'           => __('Nuevo slide'),
        'view_item'          => __('Ver slide'),
        'search_items'       => __('Buscar slides'),
        'not_found'          => __('No se encontraron slides'),
        'not_found_in_trash' => __('No no se encontraron slides en la papelera'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Slides'
    );
    $args = array(
        'labels'             => $labels,
        //'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => 'slide',
        'hierarchical'       => false,
        'menu_position'      => 3,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array('title', 'excerpt', 'thumbnail'),
        'taxonomies'         => array('slide-category', 'slide-tag')
    );
    register_post_type('slide', $args);
}

/* Update slide Messages */
add_filter('post_updated_messages', 'slide_updated_messages');
function slide_updated_messages($messages) {
    global $post, $post_ID;
    $messages['slide'] = array(
        0 => '',
        1 => sprintf(__('slide actualizado.'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field actualizado.'),
        3 => __('Custom field deleted.'),
        4 => __('slide actualizado.'),
        5 => isset($_GET['revision']) ? sprintf(__('slide restaurado de revisión desde %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('slide publicado.'), esc_url(get_permalink($post_ID))),
        7 => __('slide guardada.'),
        8 => sprintf(__('slide publicado.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('slide archivado para: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('slide en borrador actualizado.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

/* Update slide Help */
add_action('contextual_help', 'slide_help_text', 10, 3);
    function slide_help_text($contextual_help, $screen_id, $screen) {
    if ('slide' == $screen->id) {
        $contextual_help =
        '<p>' . __('Cosas para recordar a la hora de agregar un slide:') . '</p>' .
        '<ul>' .
        '<li>' . __('Darle un título. El título sea usado como cabecera') . '</li>' .
        '<li>' . __('Agregar una imagen destacada.') . '</li>' .
        '<li>' . __('Agregar texto. El texto aparecerá en cada slide.') . '</li>' .
        '</ul>';
    }
    elseif ('edit-slide' == $screen->id) {
        $contextual_help = '<p>' . __('Una lista de todos los slides del home aparece debajo. para editar un slide haga click en el título.') . '</p>';
    }
    return $contextual_help;
}
?>
