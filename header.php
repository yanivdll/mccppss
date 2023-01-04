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

    <div class="container">
        <header>
            <a href="index.html" class="site-logo centered">MCCPPSS</a>
            <nav class="page-menu">
                <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'wp_devs_main_menu',
                                // 'menu_class' => 'menu', //default class is 'menu'
                                'depth' => 1 #how many submenus you want to show
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