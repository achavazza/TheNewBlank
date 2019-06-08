<?php

    /*
     * INIT
     * ========================================================================================================
     */

    function pr($out){
        echo '<pre>';
        print_r($out);
        echo '</pre>';
    }

    function check($out){
        if(isset($out) && !empty($out)){
            return true;
        }
        return false;
    }

    /*
     * Properly enqueue of styles and scripts
     */
    function theme_name_scripts() {

        wp_enqueue_style( 'qs'      , get_template_directory_uri().'/css/qs.min.css' );
        wp_enqueue_style( 'opensans', '//fonts.googleapis.com/css?family=Open+Sans:400' );

        //wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
        if ( !is_admin() ) {
           wp_deregister_script('jquery');
           wp_register_script('jquery', ("//code.jquery.com/jquery-1.9.1.min.js"), array(), '1.9.1', true);
        }
        wp_register_script('scripts', (get_template_directory_uri().'/js/scripts.js'), 'jquery');

        wp_enqueue_script('scripts');
    }

    add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

    function register_menus() {
        register_nav_menus(
            array(
                'header-menu' => __( 'Menu Header' )
            )
        );
    }

    add_action( 'init', 'register_menus' );

    /*
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Sidebar Widgets',
            'id'   => 'sidebar-widgets',
            'description'   => 'These are widgets for the sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    }
    */

    /*
     * Add support RSS feed, thumbnails and stuff
     * ========================================================================================================
     */
    include('inc/admin/add-support.php');

    /*
     * Custom meta boxes types
     * ========================================================================================================
     */

    $base_path    = str_replace('\\', '/', dirname( __FILE__ ) ."/inc/cmb2");
    $plugins_path = str_replace('\\', '/', dirname( __FILE__ ) ."/inc/cmb2-plugins");

    define("CMB_PATH", $base_path);
    define("CMB_PLUGINS", $plugins_path);

    if ( file_exists(  CMB_PATH . '/init.php' ) ) {

        require_once  CMB_PATH . '/init.php';
        //custom show_on
        //include(CMB_PLUGINS . '/cmb-show-on/show_on.php');

        //custom post search field
        //include(CMB_PLUGINS . '/cmb-post-search-field/cmb2_post_search_field.php');

        //gallery plugin
        //include(CMB_PLUGINS . '/cmb-field-gallery/cmb-field-gallery.php');

        //gallery plugin
        //include(CMB_PLUGINS . '/cmb_field_map/cmb-field-map.php');

        //MetaTabs
        include(CMB_PLUGINS . '/cmb-metatabs-options/cmb2-metatabs-options.php');



        //metaboxes list
        //include('inc/custom-metaboxes/contact.php');

        //include('inc/post-types/internal.php');
    }
    /*
     * Widgets
     * ========================================================================================================
     */

    /*if (function_exists('register_sidebar')) {
         register_sidebar(array(
             'name' => 'Sidebar Widgets',
             'id'   => 'sidebar-widgets',
             'description'   => 'These are widgets for the sidebar.',
             'before_widget' => '<div id="%1$s" class="widget %2$s">',
             'after_widget'  => '</div>',
             'before_title'  => '<h2>',
             'after_title'   => '</h2>'
         ));
     }*/

     //unregister all default WP Widgets
     function unregister_default_wp_widgets() {
         unregister_widget('WP_Widget_Pages');
         unregister_widget('WP_Widget_Calendar');
         unregister_widget('WP_Widget_Archives');
         unregister_widget('WP_Widget_Links');
         unregister_widget('WP_Widget_Meta');
         unregister_widget('WP_Widget_Search');
         unregister_widget('WP_Widget_Text');
         unregister_widget('WP_Widget_Categories');
         unregister_widget('WP_Widget_Recent_Posts');
         unregister_widget('WP_Widget_Recent_Comments');
         unregister_widget('WP_Widget_RSS');
         unregister_widget('WP_Widget_Tag_Cloud');
     }
     add_action('widgets_init', 'unregister_default_wp_widgets', 1);


    /*
     * Theme Options
     * ========================================================================================================
     */
     include('inc/admin/disable-comments.php');
     include('inc/admin/wp-cpt-archives-in-menu.php');
     //include('inc/admin/theme-options.php');
     include('inc/admin/theme-options-tabs.php');

?>
