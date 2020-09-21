<?php get_header(); ?>

<h1 style="display: none;">page.php</h1>
<?php while (have_posts()) : the_post();
    if (has_post_thumbnail()) {
        $thumbnailURL = get_the_post_thumbnail_url();
        $gallery = get_post_gallery(get_the_ID(), false);
        $gallery_images_id = explode(",", $gallery['ids']);
    }
?>
    <div class="hero" style="background-image: url(<?php echo $thumbnailURL ?>)">
        <div class="hero-text text-center">
            <h2><?php the_title() ?></h2>
        </div>
    </div>
    <div class="gallery-container main-content container">
        <main class="gallery text-center content-text">
            <?php
            foreach ($gallery_images_id as $id) {
                
                $imageThumb = wp_get_attachment_image_src($id, "medium");
                $image = wp_get_attachment_image_src($id, 'large'); ?>
        
                <a class="gallery-image" href="<?php echo $image[0]; ?>">
                    <img src="<?php echo $imageThumb[0] ?>">
                </a>
            <?php
            }
            ?>
        </main>
    </div>
<?php endwhile;
wp_reset_postdata(); ?>
<?php get_footer(); ?>