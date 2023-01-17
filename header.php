<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>

    <?php if( is_page('contact') ){ ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/verif.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js">
    </script>
    <?php }?>



    <!-- //     removed the title tag here because it will be added the theme_support function -->
</head>

<body <?php body_class(); ?>>
    <header class="container">
        <div class="">
            <a href="/home" class="site-logo"><img src="<?php echo WP_CONTENT_URL . "/uploads/2023/01/logo_v1.png" ?>"
                    alt=""></a>
            <h1>The Multidisciplinary Center on Childhood,
                Public Policy, and Sustainable Society</h1>
            <button class="check-button">
                <div class="menu-icon">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </button>
        </div>
        <nav class="page-menu">
            <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'mccppss_main_menu',
                                // 'menu_class' => 'menu', //default class is 'menu'
                                'depth' => 1, #how many submenus you want to show
                                'container' => false
                            ));
                            ?>
        </nav>
    </header>