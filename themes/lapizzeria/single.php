<?php get_header(); ?>

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
        <main class="content-text">
            <div class="entry-information date">
                <time>
                    <p><?php echo the_time('d') ?></p>
                    <span><?php echo the_time('M') ?></span>
                </time>
                <p class="author"> <i class="fa fa-user" aria-hidden="true"></i><?php the_author() ?></p>
            </div>
            <?php the_content() ?>
        </main>
    </div>
    <div class="container comment-form">
        <?php comment_form() ?>
    </div>
    <div class="container comment-list">
        <ol class="comment-list-ol">

            <?php
            $comments = get_comments(array(
                'post_id' => $post->ID,
                'status' => 'approve'
            ));
            wp_list_comments(array(
                'per_page' => 10,
                'reverse_top_level' => false
            ), $comments)



            ?>
        </ol>
    </div>
<?php endwhile;
wp_reset_postdata(); ?>
<?php get_footer(); ?>