<footer class="site-footer">
    <div class="container">
        <div class=" copywrite">
            <p>© 2022 MCCPPSS</p>
        </div>
        <nav class="footer-menu">
            <?php 
            wp_nav_menu(
                array(
                    'theme_location' => 'mccppss_footer_menu',
                    'depth' => 1
                ));
        ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>