<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <!-- //     removed the title tag here because it will be added the theme_support function -->
</head>

<body <?php body_class(); ?>>
    <div class="org-name centered" style="height:10vh;">
        <h1>The Multidisciplinary Center on Childhood,
            Public Policy, and Sustainable Society</h1>
    </div>
    <header>
        <a href="/home" class="site-logo centered">MCCPPSS</a>
        <nav class="page-menu">
            <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'ngo_main_menu',
                                // 'menu_class' => 'menu', //default class is 'menu'
                                'depth' => 1, #how many submenus you want to show
                                'container' => false
                            ));
                            ?>
        </nav>

        <button class="check-button">
            <div class="menu-icon">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </button>
    </header>