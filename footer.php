<footer class="site-footer">
    <div class="container">
        <div class="copywrite">
            <p>Copyright X - All Rights Reserved</p>
        </div>
        <nav class="footer-menu">
            <?php 
            wp_nav_menu(
                array(
                    'theme_location' => 'wp_devs_footer_menu',
                    'depth' => 1
                ));
        ?>
        </nav>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>