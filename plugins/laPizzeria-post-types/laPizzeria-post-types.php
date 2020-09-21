<?php
/* 
Plugin Name: La Pizzeria - Post Types
Plugin URI:
Description: Adds a new Post type to the admin panel in WordPress
Version: 1.0
Author: Roi Ravia
Text Domain: la-pizzeria
*/

if (!defined('ABSPATH')) die();

//Register new post type
function laPizzeria_pizzas_post_type()
{
    $labels = array(
        'name'                  => _x('Pizzas', 'Post Type General Name', 'la-pizzeria'),
        'singular_name'         => _x('Pizza', 'Post Type Singular Name', 'la-pizzeria'),
        'menu_name'             => __('Pizzas', 'la-pizzeria'),
        'name_admin_bar'        => __('Pizzas', 'la-pizzeria'),
        'archives'              => __('Archive', 'la-pizzeria'),
        'attributes'            => __('Attributes', 'la-pizzeria'),
        'parent_item_colon'     => __('Parent Pizza', 'la-pizzeria'),
        'all_items'             => __('All Pizzas', 'la-pizzeria'),
        'add_new_item'          => __('Add Pizza', 'la-pizzeria'),
        'add_new'               => __('Add Pizza', 'la-pizzeria'),
        'new_item'              => __('New Pizza', 'la-pizzeria'),
        'edit_item'             => __('Edit Pizza', 'la-pizzeria'),
        'update_item'           => __('Update Pizza', 'la-pizzeria'),
        'view_item'             => __('View Pizza', 'la-pizzeria'),
        'view_items'            => __('View Pizza', 'la-pizzeria'),
        'search_items'          => __('Search Pizza', 'la-pizzeria'),
        'not_found'             => __('Not found', 'la-pizzeria'),
        'not_found_in_trash'    => __('Not found in trash', 'la-pizzeria'),
        'featured_image'        => __('Featured Image', 'la-pizzeria'),
        'set_featured_image'    => __('Save Featured Image', 'la-pizzeria'),
        'remove_featured_image' => __('Remove Featured Image', 'la-pizzeria'),
        'use_featured_image'    => __('Use as Featured Image', 'la-pizzeria'),
        'insert_into_item'      => __('Insert in Pizza', 'la-pizzeria'),
        'uploaded_to_this_item' => __('Add in Pizza', 'la-pizzeria'),
        'items_list'            => __('Pizzas List', 'la-pizzeria'),
        'items_list_navigation' => __('Navigate to Pizzas', 'la-pizzeria'),
        'filter_items_list'     => __('Filter Pizzas', 'la-pizzeria'),
    );
    $args = array(
        'label'                 => __('Pizza', 'la-pizzeria'),
        'description'           => __('Pizzas for La Pizzeria Menu', 'la-pizzeria'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        "rewrite"               => array("slug", "specialties"),
        'hierarchical'          => false,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'capability_type'       => 'page',
        'taxonomies'            => array('category')
    );
    register_post_type('la-pizzeria_Pizzas', $args);
}
add_action('init', 'laPizzeria_pizzas_post_type', 0);
