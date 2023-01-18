<?php 

function mccppss_load_scripts(){
    wp_enqueue_style('mccppss-style', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', false);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap', false);
    wp_enqueue_script('dropdown', get_template_directory_uri().'/js/dropdown.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mccppss_load_scripts');            


function mccppss_config(){
register_nav_menus(
    array(
        'mccppss_main_menu' => 'Main Menu',
        'mccppss_footer_menu' => 'Footer Menu'
    )
);
$args = array(
    'height' => 225,
    'width' => 1920
);
add_image_size( 'homepage-thumbnails', 300, 200, TRUE );
add_theme_support('custom-header', $args); 
add_theme_support('post-thumbnails');
add_theme_support('custom-logo', array(
    'height' => 24,
    'width' => 24,
    'flex-height' => true,
    'flex-width' => true
));

}
add_action('after_setup_theme', 'mccppss_config', 0); //0 is the highest priority

function mccppss_sidebars()
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
        )
    );
    register_sidebar(    
        array(
            'name' => 'Partner 1',
            'id' => 'partner-1',
            'description' => 'First partner area',
            'before_widget' =>'<div class="widget_wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
        ) ;
        register_sidebar(
        array(
            'name' => 'Partner 2',
            'id' => 'partner-2',
            'description' => 'Second partner area',
            'before_widget' =>'<div class="widget_wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )) ;
        register_sidebar(
        array(
            'name' => 'Partner 3',
            'id' => 'partner-3',
            'description' => 'Third partner area',
            'before_widget' =>'<div class="widget_wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )) ;
}
add_action('widgets_init', 'mccppss_sidebars');

// Path: wp-content/themes/ngo/functions.php
// This function is used to return an array of page information
function cn_include_content($pid) {
// Assign page information to the $page_info array
    $page_info = array(
        'url' => get_permalink( $pid ),
        'title' => get_the_title( $pid ),
        'thumbnail_id' => get_post_thumbnail_id( $pid ),
        'thumbnail_url' => wp_get_attachment_image_src( get_post_thumbnail_id( $pid ), 'homepage-thumbnails' )[0],
);
// Return the $page_info array
    return $page_info;
}

// Path: wp-content/themes/ngo/page.php
// This function is used to display a list of subpages of the current page
function mccppss_show_subpages( $pid ) {
    $subpages = array(); // Initialize the array of sub pages
    $args = array(
        'child_of' => $pid, // Get the sub pages of the specified post
        'title_li' => '', // Don't show the page title
        'sort_column' => 'menu_order', // Sort the pages by their menu order
        'echo' => 0 // Return the results as a string, rather than printing them
    );
    $pages = get_pages( $args );
    foreach ( $pages as $page ) {
        // Get the post thumbnail
        $thumbnail = get_the_post_thumbnail( $page->ID, 'homepage-thumbnails', array( 'class' => 'card-image' ) );
        // Get the 'description' custom field value
        $description = get_post_meta( $page->ID, 'description', true );
        $subpage = array(
            'title' => $page->post_title, // The title of the subpage
            'permalink' => get_permalink( $page->ID ), // The permalink of the subpage
            'thumbnail' => $thumbnail, // The thumbnail of the subpage, or an empty string if there is no thumbnail
            'description' => $description // The 'description' custom field value, or an empty string if the custom field is not set
        );
        $subpages[] = $subpage; // Add the subpage data to the array
    }
    return $subpages; // Return the array of sub pages
}
add_shortcode('mccppss_childpages', 'mccppss_show_subpages');

// // function that process the form in page-contact.php

function mccppss_contact_form() {
    $name = sanitize_text_field($_POST["contactName"]);
    $email = sanitize_email($_POST["email"]);
    $message = esc_textarea($_POST["comments"]);
    $to = get_option('admin_email');
    $subject = "Contact from " . $name;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    if (wp_mail($to, $subject, $message, $headers)) {
        echo '<div>';
        echo '<p>Thanks for contacting us, expect a response soon.</p>';
        echo '</div>';
    } else {
        echo '<p>An unexpected error occurred</p>';
    }
    die();
}
add_action( 'admin_post_mccppss_contact_form', 'mccppss_contact_form' );


function mail_smtp( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = SMTP_USER;
    $phpmailer->Password = SMTP_PASS;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_NAME;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
}
add_action( 'phpmailer_init', 'mail_smtp' );