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
    <div class="main-content container">
        <main class="text-center content-text">
            <?php the_content() ?>
        </main>
    </div>
    <div class="box-information container">
        <div class="box">
            <?php
            $image_id = get_field("image_1");
            $image = wp_get_attachment_image_src($image_id, "box");
            ?>
            <img src="<?php echo $image[0]; ?>" alt="image_1">
            <div class="box-content">
                <?php the_field("description_1") ?>
            </div>
        </div>
        <div class="box">
            <?php
            $image_id = get_field("image_2");
            $image = wp_get_attachment_image_src($image_id, "box");
            ?>
            <img src="<?php echo $image[0]; ?>" alt="image_1">
            <div class="box-content">
                <?php the_field("description_2");
                ?>
            </div>
        </div>
        <div class="box">
            <?php
            $image_id = get_field("image_3");
            $image = wp_get_attachment_image_src($image_id, "box"); ?>

            <img src="<?php echo $image[0]; ?>" alt="image_1">
            <div class="box-content">
                <?php
                the_field("description_3");
                ?>
            </div>
        </div>
    </div>
<?php endwhile;
wp_reset_postdata(); ?>
<?php get_footer(); ?>