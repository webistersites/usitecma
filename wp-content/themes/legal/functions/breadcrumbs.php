<?php

/*
 * Legal Breadcrumbs
 */
global $legal_options;

function legal_custom_breadcrumbs() {

    $legal_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $legal_delimiter = '/'; // legal_delimiter between crumbs
    $legal_home = __('Home', 'legal'); // text for the 'Home' link
    $legal_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $legal_before = ' '; // tag before the current crumb
    $legal_after = ' '; // tag after the current crumb

    global $post;
    $legal_homelink = esc_url(home_url('/'));

    if (is_home() || is_front_page()) {

        if ($legal_showonhome == 1)
            echo '<ol class="breadcrumb breadcrumb-menubar"><li><a href="' . $legal_homelink . '">' . $legal_home . '</a></li></ol>';
    } else {

        echo '<ol class="breadcrumb breadcrumb-menubar"><li><a href="' . $legal_homelink . '">' . $legal_home . '</a> ' . $legal_delimiter . ' ';
        if (is_category()) {
            $legal_thisCat = get_category(get_query_var('cat'), false);
            if ($legal_thisCat->parent != 0)
                echo get_category_parents($legal_thisCat->parent, TRUE, ' ' . $legal_delimiter . ' ');
            echo $legal_before . __('Archive by category', 'legal') . ' " ' . single_cat_title('', false) . ' "' . $legal_after;
        } elseif (is_search()) {
            echo $legal_before . __('Search Results For ', 'legal') . ' " ' . get_search_query() . ' "' . $legal_after;
        } elseif (is_day()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $legal_delimiter . ' ';
            echo '<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_time('F') . '</a> ' . $legal_delimiter . ' ';
            echo $legal_before . get_the_time('d') . $legal_after;
        } elseif (is_month()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $legal_delimiter . ' ';
            echo $legal_before . get_the_time('F') . $legal_after;
        } elseif (is_year()) {
            echo $legal_before . get_the_time('Y') . $legal_after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $legal_post_type = get_post_type_object(get_post_type());
                $legal_slug = $legal_post_type->rewrite;
                echo '<a href="' . $legal_homelink . '/' . $legal_slug['slug'] . '/">' . $legal_post_type->labels->singular_name . '</a>';
                if ($legal_showcurrent == 1)
                    echo ' ' . $legal_delimiter . ' ' . $legal_before . get_the_title() . $legal_after;
            } else {
                $legal_cat = get_the_category();
                $legal_cat = $legal_cat[0];
                $legal_cats = get_category_parents($legal_cat, TRUE, ' ' . $legal_delimiter . ' ');
                if ($legal_showcurrent == 0)
                    $legal_cats =
                            preg_replace("#^(.+)\s$legal_delimiter\s$#", "$1", $legal_cats);
                echo $legal_cats;
                if ($legal_showcurrent == 1)
                    echo $legal_before . get_the_title() . $legal_after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $legal_post_type = get_post_type_object(get_post_type());
            echo $legal_before . $legal_post_type->labels->singular_name . $legal_after;
        } elseif (is_attachment()) {
            $legal_parent = get_post($post->post_parent);
            $legal_cat = get_the_category($legal_parent->ID);
            $legal_cat = $legal_cat[0];
            echo get_category_parents($legal_cat, TRUE, ' ' . $legal_delimiter . ' ');
            echo '<a href="' . get_permalink($legal_parent) . '">' . $legal_parent->post_title . '</a>';
            if ($legal_showcurrent == 1)
                echo ' ' . $legal_delimiter . ' ' . $legal_before . get_the_title() . $legal_after;
        } elseif (is_page() && !$post->post_parent) {
            if ($legal_showcurrent == 1)
                echo $legal_before . get_the_title() . $legal_after;
        } elseif (is_page() && $post->post_parent) {
            $legal_parent_id = $post->post_parent;
            $legal_breadcrumbs = array();
            while ($legal_parent_id) {
                $legal_page = get_page($legal_parent_id);
                $legal_breadcrumbs[] = '<a href="' . get_permalink($legal_page->ID) . '">' . get_the_title($legal_page->ID) . '</a>';
                $legal_parent_id = $legal_page->post_parent;
            }
            $legal_breadcrumbs = array_reverse($legal_breadcrumbs);
            for ($legal_i = 0; $legal_i < count($legal_breadcrumbs); $legal_i++) {
                echo $legal_breadcrumbs[$legal_i];
                if ($legal_i != count($legal_breadcrumbs) - 1)
                    echo ' ' . $legal_delimiter . ' ';
            }
            if ($legal_showcurrent == 1)
                echo ' ' . $legal_delimiter . ' ' . $legal_before . get_the_title() . $legal_after;
        } elseif (is_tag()) {
            echo $legal_before . _e('Posts tagged', 'legal') . ' " ' . single_tag_title('', false) . ' "' . $legal_after;
        } elseif (is_author()) {
            global $author;
            $legal_userdata = get_userdata($author);
            echo $legal_before . _e('Articles Published by', 'legal') . ' " ' . $legal_userdata->display_name . ' "' . $legal_after;
        } elseif (is_404()) {
            echo $legal_before . _e('Error 404', 'legal') . $legal_after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo __('Page', 'legal') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</li></ol>';
    }
}

// end legal_custom_breadcrumbs()
?>
