<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <!-- //     removed the title tag here because it will be added the theme_support function -->
</head>
<!--    body_class() is a function that will add the class to the body tag -->

<body <?php body_class();?>>
    <div id="page" class="site">
        <header>
            <section class="top-bar">
                <div class="container">
                    <div class="logo">
                        <?php 
                        if (has_custom_logo()){
                            the_custom_logo();
                        } else {
                            ?>
                        <span><a href="<?php echo home_url(); ?>"><span><?php bloginfo('name'); ?></span></a>
                            <?php
                        }
                            ?>
                    </div>
                    <div class=" searchbox">
                        Searchbox
                    </div>
                </div>
            </section>
            <section class="menu-area">
                <div class="container">
                    <nav class="main-menu">
                        <button class="check-button">
                            <div class="menu-icon">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </button>

                        <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'wp_devs_main_menu',
                                // 'menu_class' => 'menu', //default class is 'menu'
                                'depth' => 2 #how many submenus you want to show
                            ));
                            ?>
                    </nav>
                </div>
            </section>
        </header>