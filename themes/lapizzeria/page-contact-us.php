<?php get_header(); ?>

<h1 style="display: none;">page.php</h1>
<?php while (have_posts()) : the_post();
    if (has_post_thumbnail()) {
        $thumbnailURL = get_the_post_thumbnail_url();
    }
?>
    <div class="hero" style="background-image: url(<?php echo $thumbnailURL ?>)">
        <div class="hero-text text-center">
            <h2><?php the_title() ?></h2>
        </div>
    </div>
    <div class="reservation main-content container ">   
        <?php get_template_part("templates/reservation","form") ?>
    </div>
<?php endwhile;
wp_reset_postdata(); ?>
<?php get_footer(); ?>