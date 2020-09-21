<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- IOS compatible -->
    <meta name='apple-mobile-web-app-capable' content="yes">
    <meta name='apple-mobile-web-app-title' content='La Pizzeria Restaurant'>
    <link rel='apple-touch-icon' href="<?php echo get_template_directory_uri()?>/apple-touch-icon.jpg">    
    <!-- Android Compatible -->
    <meta name="theme-color" content="#a61206">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="La Pizzeria Restaurant">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()?>/icon.png" sizes="192x192">

    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>

    <header class='site-header'>
        <div class="container">


            <div class='logo'>
                <a href='<?php echo esc_url(home_url()) ?>'>
                    <?php
                    if(function_exists('the_custom_logo')){
                        the_custom_logo();
                    }
                    ?>
                </a>
            </div>
            <div class='header-information'>
                <div class='social-header'>
                    <?php
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container' => 'nav',
                        'container_class' => 'socials',
                        'container_id' => 'socials',
                        'link_before' => '<span class="sr-text">',
                        'link_after' => '</span>'
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
                <div class='address'>
                    <p><?php echo esc_html(get_option('laPizzeria_options_address'))?></p>
                    <p>Phone Number: <?php echo esc_html(get_option('laPizzeria_options_phone'))?></p>
                </div>
            </div>
        </div>
    </header>
    <div class='main-menu '>
        <div class='navigation container'>
            <div class="mobile-menu">
                <a href="#" class="mobile"><i class="fa fa-bars"></i>Menu</a>
            </div>
            <?php
            $args = array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'site-nav'
            );
            wp_nav_menu($args);

            ?>
        </div>
    </div>