<?php get_header();?>
<img src="<?php echo header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
    width="<?php echo get_custom_header()->width; ?>" alt="" />
<div id="content" class="site-content">
    <div id="primar" class="content-area">
        <section class="home-blog">
            <div class="container">
                <div class="page-item">
                    <?php
                        while(have_posts()): the_post();
                        ?>
                    <article>
                        <header>
                            <h1><?php the_title(); ?></h1>
                        </header>
                        <?php the_content(); ?>
                    </article>
                    <?php 
                endwhile;?>
                </div>
                <?php get_sidebar('page'); ?>
            </div>

        </section>
        </main>
    </div>
</div>
<?php get_footer();?>