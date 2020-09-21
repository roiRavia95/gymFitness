<?php

// Link scripts instead of writing them here -
//Link to the queries file & functions
require get_template_directory() . "/inc/queries.php";
//Link SQL DB to wp
require get_template_directory() . "/inc/database.php";
//Link the script with the function for saving reservation to db
require get_template_directory() . "/inc/reservations.php";
//Create and options page in the wp admin
require get_template_directory() . "/inc/options.php";

function laPizzeriaMenu()
{
    register_nav_menus(array(
        "header-menu" => __("Header Menu", "lapizzeria"),
        "social-menu" => __("Social Menu", "lapizzeria"),
        "footer-menu" => __("footer Menu", "lapizzeria"),

    ));
};
add_action("init", "laPizzeriaMenu");



function laPizzeriaScripts()
{
    //Styles
    //Normalize  
    wp_enqueue_style("normalize", get_template_directory_uri() . "/css/normalize.css", array(), "8.0.1");
    //Font Awesome
    wp_enqueue_style("fontawesome", get_template_directory_uri() . "/css/all.css", array(), "5.14.0");
    //Main Stylesheet
    wp_enqueue_style("style", get_stylesheet_uri(), array("normalize"), "1.0.0");
    //Google fonts 
    wp_enqueue_style("googlefonts", "//fonts.googleapis.com/css?family=Open+Sans:wght@400;700;800&display=swap", array(), "1.0.0");
    //Google fonts again because of bug
    wp_enqueue_style("googlefonts2", "//fonts.googleapis.com/css?family=Raleway:wght@400;700;900&display=swap", array(), "1.0.0");
    //fluidboxCSS 
    wp_enqueue_style("fluidboxcss",  get_template_directory_uri() . "/css/fluidbox.min.css", array(), "2.0.5");
    //Local-time polyfill
    wp_enqueue_style('datetime-local', get_template_directory_uri() . '/css/datetime-local-polyfill.css', array(), '1.0.0');
    //Scripts
    //fluidboxJS
    wp_enqueue_script("fluidboxjs", get_template_directory_uri() . "/js/jquery.fluidbox.min.js", array("jquery"), "2.0.5", true);

    //local-time polyfill
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('modernizr', "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js", array("jquery"), "2.8.3", true);
    wp_enqueue_script('datetime-loca-polyfill', get_template_directory_uri() . "/js/datetime-local-polyfill.js", array("jquery", "jquery-ui-core", "jquery-ui-datepicker", "modernizr"), "1.0.0", true);
    //Google Maps
    $apikey = esc_html(get_option('laPizzeria_gmaps_apikey'));
    wp_enqueue_script("googlemaps", "https://maps.googleapis.com/maps/api/js?key=" . $apikey . "&callback=initMap&libraries=&v=weekly", array(), '', true);
    //Main JS
    wp_enqueue_script("scripts", get_template_directory_uri() . "/js/scripts.js", array("jquery"), "1.0.0", true);
    //Pass data from a defined php object to the js script file
    wp_localize_script(
        'scripts',
        'options',
        array(
            'latitude' => esc_html(get_option('laPizzeria_gmaps_latitude')),
            'longitude' => esc_html(get_option('laPizzeria_gmaps_longitude')),
            'zoom' => esc_html(get_option('laPizzeria_gmaps_zoom'))
        )
    );
}

add_action("wp_enqueue_scripts", "laPizzeriaScripts");

function laPizzeriaSetup()
{

    add_image_size("box", 437, 291, true);
    add_image_size("specialties", 553, 479, true);
    add_image_size("specialties-portrait", 435, 530, true);

    //add featured image in posts and pages
    add_theme_support("post-thumbnails");

    //SEO - title in tab
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "laPizzeriaSetup");

//Custom Logo
function laPizzeria_Logo()
{
    $args = array(
        "height" => 200,
        "width" => 250,
    );
    add_theme_support("custom-logo", $args);
}
add_action("after_setup_theme", "laPizzeria_Logo");

//Create and connect Widgets

function laPizzeria_Widgets()
{
    register_sidebar([
        "name" => "Sidebar",
        "id" => "sidebar",
        "before_widget" => "<div class='widget'>",
        "after_widget" => "</div>",
        "before_title" => "<h3 class='title'>",
        "after_title" => "</h3>"
    ]);
}

//Hook it
add_action("widgets_init", "laPizzeria_Widgets");


//Google maps

function add_async_defer($tag, $handle)
{
    if ('googlemaps' !== $handle) {
        return $tag;
    }
    return str_replace(' src', 'async="async" defer="defer" src', $tag);
};
add_filter('script_loader_tag', 'add_async_defer', 10, 2);


//Admin scripts

function laPizzeria_admin_scripts()
{
    wp_enqueue_script("adminjs", get_template_directory_uri() . "/js/admin_ajax.js", array("jquery"), "1.0", true);
    //Sweet Alert 2
    wp_enqueue_style("sweetalertcss", get_template_directory_uri() . "/css/sweetalert2.min.css");
    wp_enqueue_script("sweetalertjs", get_template_directory_uri() . "/js/sweetalert2.min.js", array("jquery"), "5.5.1");
    wp_localize_script("adminjs", "admin_ajax", array(
        "ajaxurl" => admin_url('admin-ajax.php'),
    ));
};

add_action("admin_enqueue_scripts", "laPizzeria_admin_scripts");
