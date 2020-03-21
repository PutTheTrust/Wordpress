<?php

//adding the css and js files

function gt_setup(){
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab');
    wp_enqueue_style('google-fonts', '//use.fontawesome.com/releases/v5.1.0/css/all.css');
    wp_enqueue_style('style', get_stylesheet_uri()); //microtime for development pruposes
    wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'gt_setup');

function gt_init(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag'); // will change header text
    add_theme_support('html5',
        array('comment-list', 'comment-form', 'search-form') //Where html 5 is to be implemented
    );
}

add_action( 'after_setup_theme', 'gt_init');

//Project Post Type

function gt_custom_post_type() {
    register_post_type( 'project',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
    );
}

add_action( 'init', 'gt_custom_post_type' );


// SIdebar

function gt_widget() {
    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id' => 'main_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
        );
}

add_action('widgets_init', 'gt_widget');

//Filters
function search_filter($query){
    if($query->is_search()){
        $query->set('post_type', array('post', 'project'));
    }
}

add_filter('pre_get_posts', 'search_filter')
?>