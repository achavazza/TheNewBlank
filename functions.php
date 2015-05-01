<?php
    
    /*
     * INIT
     * ========================================================================================================
     */
    
    /*
     * Properly enqueue of styles and scripts
     */
    function theme_name_scripts() {

        wp_enqueue_style( 'qs'      , get_template_directory_uri().'/css/quickstarter.min.css' );
        wp_enqueue_style( 'opensans', '//fonts.googleapis.com/css?family=Open+Sans:400' );

        //wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
        if ( !is_admin() ) {
           wp_deregister_script('jquery');
           wp_register_script('jquery', ("//code.jquery.com/jquery-1.9.2.min.js"), array(), '1.9.2', true);
        }
        wp_register_script('scripts', (get_template_directory_uri().'/js/scripts.js'), 'jquery');
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
     * Custom post types
     * ========================================================================================================
     */

    //include('inc/post-types/projects.php');

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
     include('inc/admin/site-options.php');

?>