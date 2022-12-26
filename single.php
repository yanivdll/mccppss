<?php get_header(); ?>
<div class="pramary">
    <div class="main">
        <div class="container">

            <?php  ;

                while(have_posts()): the_post();
                ?>
            <article id="post-<?php  the_ID(); ?>" <?php post_class(); ?>>
                <header>
                    <h2><?php the_title(); ?></h2>
                    <div class="meta-info">
                        <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
                        <p>Categories: <?php the_category(' '); ?></p>
                        <p><?php the_tags('Tags: ', ', '); ?></p>
                    </div>
                </header>
                <?php the_content(); ?>
                <?php

                    if(comments_open() || get_comments_number()):
                        comments_template();
                    endif;
endwhile;
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>