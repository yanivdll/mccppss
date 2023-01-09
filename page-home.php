<?php get_header();?>
<div class="hero-image"></div>
<div class="container">
    <section class="hero"><mark>
            The Multidisciplinary Center on Childhood,
            Public Policy, and Sustainable Society
        </mark></section>
    <section class="mission">
        <h1 class="title">Mission</h1>
        <div>
            <p>Every living species is dependent on the ability of its continuing generation to thrive (reproductive
                continuation). Humans are no different. </p>
        </div>
        <a href="<?php echo get_permalink(11); ?>" class="button">
            Read More
        </a>
    </section>
    <section class="projects">
        <h1>Projects</h1>
        <div class="card-container">
            <div class="card">
                <?php $page_info = cn_include_content(103); ?>
                <a href="<?php echo $page_info['url'] ;?>"><img class="card-image"
                        src="<?php echo $page_info['thumbnail_url']; ?>"></a>
                <a href="<?php echo $page_info['url'] ;?>">
                    <p class="card-title"><?php echo $page_info['title']; ?></p>
                </a>
            </div>
            <div class="card">
                <?php $page_info = cn_include_content(94); ?>
                <a href="<?php echo $page_info['url'] ;?>"><img class="card-image"
                        src="<?php echo $page_info['thumbnail_url']; ?>"></a>
                <a href="<?php echo $page_info['url'] ;?>">
                    <p class="card-title"><?php echo $page_info['title']; ?></p>
                </a>
            </div>
            <div class="card">
                <?php $page_info = cn_include_content(100); ?>
                <a href="<?php echo $page_info['url'] ;?>"><img class="card-image"
                        src="<?php echo $page_info['thumbnail_url']; ?>"></a>
                <a href="<?php echo $page_info['url'] ;?>">
                    <p class="card-title"><?php echo $page_info['title']; ?></p>
                </a>
            </div>
        </div>
        <a href="#" class="button">
            All Projects
        </a>
    </section>

    <section class="partners">
        <h1>Partners</h1>
        <div class="card-container">
            <div class="card">
                <?php if(is_active_sidebar('partner-1')){
                    dynamic_sidebar('partner-1');
                };?>
            </div>
            <div class="card">
                <?php if(is_active_sidebar('partner-2')){
                    dynamic_sidebar('partner-2');
                };?>
            </div>
            <div class="card">
                <?php if(is_active_sidebar('partner-3')){
                    dynamic_sidebar('partner-3');
                };?>
            </div>
        </div>
        <a href="#" class="button">
            All Partners
        </a>
    </section>
</div>
<?php get_footer();?>