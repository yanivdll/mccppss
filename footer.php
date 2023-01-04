<footer class="site-footer" style="display: flow-root;">
    <div class="container">
        <div class="contact-us"><a href="mailto:contact@mccppss.org">Contact Us</a></div>
    </div>
    <div class="container">
        <div class=" copywrite">
            <p>© 2022 MCCPPSS</p>
        </div>
        <nav class="footer-menu">
            <?php 
            wp_nav_menu(
                array(
                    'theme_location' => 'ngo_footer_menu',
                    'depth' => 1
                ));
        ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>