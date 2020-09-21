<?php get_header(); ?>

<?php
if (has_post_thumbnail()) {
    $blog_page_id = get_option("page_for_posts");
    $image = get_post_thumbnail_id($blog_page_id);
    $image = wp_get_attachment_image_src($image, "full");
}
?>
<div class="hero" style="background-image: url(<?php echo $image[0] ?>)">
    <div class="hero-text text-center">
        <h2><?php echo get_the_title($blog_page_id) ?></h2>
    </div>
</div>
<div class="main-content container with-sidebar">
    <main class="content-text">
        <?php while (have_posts()) : the_post();
        ?>
            <article class="entry">
                <a href="<?php the_permalink() ?>">
                    <?php echo the_post_thumbnail('specialties') ?>
                </a>
                <header class="entry-header clear">
                    <div class="date">
                        <time>
                            <p><?php echo the_time('d') ?></p>
                            <span><?php echo the_time('M') ?></span>
                        </time>
                    </div>
                    <div class="entry-title">
                        <h2><?php echo the_title() ?></h2>
                        <p> <i class="fa fa-user" aria-hidden="true"></i><?php the_author() ?></p>
                    </div>
                    <div class="entry-content">
                        <?php the_excerpt() ?>
                        <a href="<?php the_permalink() ?>" class="button primary"> Read More</a>
                    </div>
                </header>
            </article>
        <?php
        endwhile; ?>
    </main>
    <?php get_sidebar() ?>
</div>
<?php
get_footer(); ?>