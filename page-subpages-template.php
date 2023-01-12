<?php
/*

Template Name: Page and Subpages Template

*/
?>

<?php get_header();?>
<main>
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>
        <?php
        
        $subpages = mccppss_show_subpages($post->ID); //get_pages( $args );
        
        if ( ! empty( $subpages ) ) {
        // The current page has sub pages
        echo '<div class="card-container">';
        foreach ( $subpages as $subpage ) {
            // Get the post thumbnail
            // $thumbnail = get_the_post_thumbnail( $subpage->ID, 'thumbnail' );
            if ( ! empty($subpage['thumbnail']) ) {
                // The subpage has a thumbnail
                echo '<div class="card"><a href="' . $subpage['permalink'] . '">' . $subpage['thumbnail'] .'</a>';
            } else {
                // The subpage doesn't have a thumbnail
                echo '<div>';
            }
            // Show the subpage title
            echo '<a href="' . $subpage['permalink'] . '"><p class="card-title">' . $subpage['title'] . '</a></a>';
            echo '<p class="card-description">' . $subpage['description'] . ' <a href="' . $subpage['permalink'] . '"><span class="read-more">Read more...</span></a></p></div>';
        }
        echo '</div>';
        }
        ?>
    </div>
</main>
<?php get_footer();?>