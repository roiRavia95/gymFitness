<?php

function laPizzeria_menu($category = "pizzas")
{
    $args = array(
        "post_type" => "la-pizzeria_Pizzas",
        "posts_per_page" => 10,
        "order_by" => "title",
        "order" => "ASC",
        "category_name" => "$category"
    );
    $pizzas = new WP_query($args);
    while ($pizzas->have_posts()) : $pizzas->the_post();
?>
        <div class="column2-4 text-center">
            <div class="menu-image">
                <a href="<?php echo the_permalink(); ?>">
                    <?php the_post_thumbnail('specialties') ?>
                </a>
            </div>
            <h4><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a> <span>$<?php the_field("price"); ?></span></h4>
            <?php the_content(); ?>
        </div>
<?php
    endwhile;
    wp_reset_postdata();
};
