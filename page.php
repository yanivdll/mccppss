<?php get_header();?>
<!-- <img src="<?php echo header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
    width="<?php echo get_custom_header()->width; ?>" alt="" /> -->
<main id="content">
    <div class="container">
        <div class="page-item">
            <?php
                        while(have_posts()): the_post();
                        ?>
            <article>
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if ( has_post_thumbnail() ) : ?>
                <img class="page-hero" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" alt="">
                <?php endif; ?>
                <?php $content = the_content();?>
            </article>
            <?php 
                endwhile;?>
        </div>
    </div>
    <!-- A back button to parent page, in case this is a sub-page -->
    <?php
    if ( is_page() && $post->post_parent ) {
        $parent_id = wp_get_post_parent_id( $post->ID );
        $parent_permalink = get_permalink( $parent_id );
        $parent_page = get_post( $parent_id );

        echo '<button class="btn btn-primary"><a href="' . $parent_permalink . '">Back to ' . $parent_page->post_title . '</a></button>';
    }
?>
</main>
<?php get_footer();?>