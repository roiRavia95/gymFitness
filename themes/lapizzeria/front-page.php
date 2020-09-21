<?php get_header();
?>
<section class="hero-section">
    <div class="hero text-center" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
        <div class="hero-text ">
            <h2><?php echo esc_html(get_option('blogdescription')) ?></h2>
            <?php the_content();
            $url = get_page_by_title('About Us');
            ?>
        </div>
        <a class="button secondary" href="<?php echo get_permalink($url->ID) ?>">
            More Info
        </a>
    </div>
</section>

<section class="specialties-section">
    <div class='main-content container'>
        <?php $menuURL =  get_page_by_title('Menu')?>
        <h2 class="text-center primary-text"><a class = "title-link" href="<?php echo get_permalink($menuURL->ID)?>">Our Specialties</a></h2>
        <main class="content-text container-grid">
            <?php
            $args = array(
                'post_type' => 'la-pizzeria_Pizzas',
                'posts_per_page' => 3,
                'category_name' => 'pizzas',
                'orderby' => 'rand',
            );
            $specialties = new WP_query($args);

            while ($specialties->have_posts()) : $specialties->the_post();
            ?>
                <div class="text-center specialties-content">
                    <?php the_post_thumbnail('specialties-portrait') ?>
                    <div class="specialties-information">
                        <h2><?php the_title() ?> </h2>
                        <?php the_content(); ?>
                        <h2><span>$<?php the_field("price"); ?></span></h2>
                        <a href="<?php the_permalink() ?>" class="button primary"> Read More</a>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata(); ?>
        </main>
    </div>
</section>

<section class="ingredients-section">
    <div class="container-grid container">
        <div class="ingredient-information">
            <h1><?php echo the_field("ingredients_title") ?></h1>
            <p><?php echo the_field("ingredients_content") ?></p>
            <?php
            $url = get_page_by_title('about us'); ?>
            <a class="button primary" href="<?php get_permalink($url->ID) ?>">More info</a>
        </div>
        <img src="<?php echo the_field("right_image") ?>" alt="Right image">
    </div>
</section>

<section class="gallery-container main-content text-center">
<?php $galleryURL =  get_page_by_title('Gallery')?>
    <h2 class="primary-text"><a class = "title-link" href="<?php echo get_permalink($galleryURL->ID)?>">Gallery</a></h2>
    <?php
    $url = get_page_by_title('gallery');
    $images = get_post_gallery_images($url->ID);
    foreach ($images as $image) {
    ?>
        <a class="gallery-image" href="<?php echo $image; ?>">
            <img src="<?php echo $image ?>" alt="image">
        </a>
    <?php
    }
    ?>
</section>

<section class="location-reservation container">
    <?php $contactURL = get_page_by_title('Contact Us') ?>
    <h2 class="text-center primary-text"> <a class="title-link" href="<?php echo get_permalink($contactURL->ID)?>">Make a reservation! </a></h2>
    <div class="container-grid">
        <div class="reservation-div">
        <?php get_template_part("templates/reservation","form") ?>
        </div>
        <div id="map">
            
        </div>
    </div>
</section>

<?php get_footer() ?>