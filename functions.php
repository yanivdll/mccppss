<?php 

function ngo_load_scripts(){
    wp_enqueue_style('ngo-style', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', false);
    wp_enqueue_script('dropdown', get_template_directory_uri().'/js/dropdown.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'ngo_load_scripts');            



function ngo_config(){
register_nav_menus(
    array(
        'wp_devs_main_menu' => 'Main Menu',
        'wp_devs_footer_menu' => 'Footer Menu'
    )
);
$args = array(
    'height' => 225,
    'width' => 1920
);
add_theme_support('custom-header', $args); 
add_theme_support('post-thumbnails');
add_theme_support('custom-logo', array(
    'height' => 24,
    'width' => 24,
    'flex-height' => true,
    'flex-width' => true
));
}
add_action('after_setup_theme', 'ngo_config', 0); //0 is the highest priority

function ngo_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-blog',
            'description' => 'Drag and drop your widgets here',
            'before_widget' => '<div class="widget_wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'sidebar-page',
            'description' => 'Drag and drop your widgets here',
            'before_widget' =>'<div class="widget_wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )) ;
}
add_action('widgets_init', 'ngo_sidebars');
?>