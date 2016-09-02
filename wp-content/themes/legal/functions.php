<?php
/*
 * Set up the content width value based on the theme's design.
 */
if (!function_exists('legal_setup')) :

    function legal_setup() {

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 870;
        }

        // Make legal theme available for translation.
        load_theme_textdomain('legal', get_template_directory() . '/languages');

        // This theme styles the visual editor to resemble the theme style.
        add_editor_style(array('css/editor-style.css', legal_font_url()));

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');

        // register menu 
        register_nav_menus(array(
            'top-header-menu' => __('Top Header Menu', 'legal'),
            'footer-menu' => __('Footer Menu', 'legal')
        ));

        // Featured image support
        add_theme_support('post-thumbnails');

        // Crop image for home page posts 
        add_image_size('legal-thumbnail-image', 420, 247, true);

        // Crop image for widget 
        add_image_size('legal-widget-image', 90, 60, true);

        // Switch default core markup for search form, comment form, and commen, to output valid HTML5.
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list',
        ));

        add_theme_support('custom-background', apply_filters('legal_custom_background_args', array(
            'default-color' => 'f5f5f5',
        )));

        // Add support for featured content.
        add_theme_support('featured-content', array(
            'featured_content_filter' => 'legal_get_featured_posts',
            'max_posts' => 6,
        ));

        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style', '__return_false');

        /* slug setup */
        add_theme_support('title-tag');
    }

endif; // legal_setup
add_action('after_setup_theme', 'legal_setup');

/**
 * Register OpenSans Google font for legal.
 */
function legal_font_url() {
    $legal_font_url = '';
    /*
     * Translators: If there are characters in your language that are not supported
     * by OpenSans, translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'OpenSans font: on or off', 'legal')) {
        $legal_font_url = add_query_arg('family', urlencode('OpenSans:300,400,700,900,300italic,400italic,700italic'), "//fonts.googleapis.com/css?family=Open+Sans");
    }
    return $legal_font_url;
}

/* thumbnail list */

function legal_thumbnail_image($content) {
    if (has_post_thumbnail())
        return the_post_thumbnail('thumbnail');
}

/* Set size of characher in excerpt */

function legal_excerpt_length($length) {
    return 35;
}

add_filter('excerpt_length', 'legal_excerpt_length', 999);

/* readmore button if more content */

function legalt_excerpt_more() {
    return '...<div class="button-div"><a href="' . get_permalink() . '" class="button-read">' . __('Read more', 'legal') . '</a></div>';
}

add_filter("excerpt_more", "legalt_excerpt_more");

/* Background Image on Home Page */
add_action('wp_head', 'legal_home_bgimg');

function legal_home_bgimg() {
    $legal_options = get_option('legal_theme_options');

    $legal_home_bgimg = "<style> .home-image-section { background :url('" . $legal_options['bg-img'] . "'); } </style>";
    echo $legal_home_bgimg;
}

/* * * Enqueue css and js files ** */
require_once('functions/enqueue-files.php');
require_once('theme-options/themeoptions.php');
require_once('functions/theme-default-setup.php');
require_once('functions/breadcrumbs.php');
require_once('functions/custom-header.php');
require_once('functions/tgm-plugins.php');
require_once('functions/recent_post.php');
