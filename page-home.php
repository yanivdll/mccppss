<?php get_header();?>
<div id="content" class="site-content">
    <div id="primar" class="content-area">
        <main id="main" class="site-main">
            <section class="hero">
                Hero
            </section>
            <section class="services">
                <h2>Services</h2>
                <div class="container">


                    <?php if(is_active_sidebar('sidebar-page')){
                            dynamic_sidebar('sidebar-page');
                    }
                         ?>

                </div>
            </section>
            <section class="home-blog">
                <h2>Latest News</h2>
                <div class="container">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3
                        );
                        $post_list = new WP_Query($args);

                        if($post_list->have_posts()):
                            while($post_list->have_posts()): $post_list->the_post();
                    ?>
                    <article class="latest-news">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="meta-info">
                            <p>
                                by <span><?php the_author_posts_link(); ?></span>
                                Categories: <span><?php the_category( ' ' ); ?></span>
                                Tags: <?php the_tags( '', ', ' ); ?>
                            </p>
                            <p><span><?php echo get_the_date(); ?></p>
                        </div>
                        <?php the_excerpt(); ?>
                    </article>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    else: ?>
                    <p>No content found</p>

                    <?php endif;
                ?>
                </div>
            </section>
        </main>
    </div>
</div>
<?php get_footer();?>