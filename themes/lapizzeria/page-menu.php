<?php
/* 
* Template Name: Our Specialties
*/

get_header(); ?>

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
<?php endwhile;
wp_reset_postdata(); ?>
<div class="our-specialties container">
    <h3>Pizzas</h3>
    <div class="container-grid">
        <?php laPizzeria_menu() ?>
    </div>
</div>

<div class="our-specialties container">
    <h3 class="">Others</h3>
    <div class="container-grid">
        <?php laPizzeria_menu("others") ?>
    </div>
</div>

<?php get_footer(); ?>