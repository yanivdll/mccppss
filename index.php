<?php get_header();?>
<img src="<?php echo header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
    width="<?php echo get_custom_header()->width; ?>" alt="" />
<div id="content" class="site-content">
    <div id="primar" class="content-area">
        <main id="main" class="site-main">
            <section class="home-blog">
                <h1>Blog</h1>
                <div class="container">
                    <!-- WordPress Loop! -->
                    <div class="blog-items">
                        <?php
                    if(have_posts()):
                        while(have_posts()): the_post();
                        ?>
                        <article>
                            <h2><a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a></h2>
                            <a href="<?php the_permalink() ; ?>"><?php the_post_thumbnail('thumbnail'); ?></a>

                            <div class="meta-info">
                                <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
                                <p>Categories: <?php the_category(' '); ?></p>
                                <p><?php the_tags('Tags: ', ', '); ?></p>
                            </div>
                            <?php the_content(); ?>
                        </article>
                        <?php 
                endwhile;
                else: ?>
                        <p>No content found</p>

                        <?php endif;
                ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </section>
        </main>
    </div>
</div>
<?php get_footer();?>