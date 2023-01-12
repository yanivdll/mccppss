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

// This is the function that is responsible to validate and process the form. Still need to connect to the database and to the page-contact.php.
function ngo_contact_form(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    //validate name
    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    } else {
        $name = $_POST['name'];
    }

    //validate email
    if (empty($_POST['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address';
    } else {
        $email = $_POST['email'];
    }

    //validate subject
    if (empty($_POST['subject'])) {
        $errors[] = 'Subject is required';
    } else {
        $subject = $_POST['subject'];
    }

    //validate message
    if (empty($_POST['message'])) {
        $errors[] = 'Message is required';
    } else {
        $message = $_POST['message'];
    }

    if (empty($errors)) {
        // recipient email address
        $to = 'your@email.com';

        // subject
        $subject = 'Contact Form Submission: ' . $subject;

        // message
        $message = "Name: $name\n" .
                   "Email: $email\n" .
                   "Subject: $subject\n" .
                   "Message: $message";

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = "To: $to";
        $headers[] = "From: $name <$email>";

        // Send email
        if (mail($to, $subject, $message, implode("\r\n", $headers))) {
            echo 'Your message has been sent.';
        } else {
            echo 'An error occurred while sending your message.';
        }
    } else {
        // print errors
        echo implode('<br>', $errors);
    }
}
}