<?php

/*
 * legal Enqueue css and js files
 */

function legal_enqueue() {
    wp_enqueue_style('legal-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array());
    wp_enqueue_style('legal-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array());
    wp_enqueue_style('legal-style', get_stylesheet_uri(), array());
    
    wp_enqueue_script('legal-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
    wp_enqueue_script('legal-deafult', get_template_directory_uri() . '/js/deafult.js');
    wp_enqueue_script('legal-base', get_template_directory_uri() . '/js/base.js', array('jquery-masonry'));
    
    if (is_singular())
        wp_enqueue_script("comment-reply");
    
    if(is_page_template('page-template/front-page.php')){
        wp_enqueue_style('legal-owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array());
        wp_enqueue_script('legal-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));
    }
}

add_action('wp_enqueue_scripts', 'legal_enqueue');
