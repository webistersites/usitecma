<?php

/*
 * Legal Main Sidebar
 */

function legal_widgets_init() {

    register_sidebar(array(
        'name' => __('Main Sidebar', 'legal'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on the right.', 'legal'),
        'before_widget' => '<aside id="%1$s" class="sidebar-widget widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="sidebar-widget"><h3>',
        'after_title' => '</h3></div>',
        ));
    
    register_sidebar(array(
        'name' => __('Footer Area One', 'legal'),
        'id' => 'footer-1',
        'description' => __('Footer Area One that appears on footer.', 'legal'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Area Two', 'legal'),
        'id' => 'footer-2',
        'description' => __('Footer Area Two that appears on footer.', 'legal'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Area Three', 'legal'),
        'id' => 'footer-3',
        'description' => __('Footer Area Three that appears on footer.', 'legal'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Area Four', 'legal'),
        'id' => 'footer-4',
        'description' => __('Footer Area Four that appears on footer.', 'legal'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'legal_widgets_init');


/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function legal_entry_meta() {

	$legal_categories_list = get_the_category_list(', ','');
	
	$legal_tag_list = get_the_tag_list('', ', ' );
	
	$legal_author= ucfirst(get_the_author());
	
	$legal_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	
	$legal_comments = wp_count_comments(get_the_ID()); 	
	
	$legal_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('d M, Y')));
?>	
	<ul>
               <li><?php _e('Post by : ', 'legal'); ?><a href="<?php echo $legal_author_url; ?>" rel="tag"><?php echo $legal_author; ?></a></li>
                
               
                <li><?php printf( __( 'Date : %s', 'legal' ), $legal_date ); ?></li>
                
                <li><?php if(!empty($legal_categories_list)) { ?><?php _e('Category : ', 'legal'); ?><?php echo $legal_categories_list; ?></li><?php } ?>                
                <?php if(!empty($legal_tag_list)) { ?><li><?php _e('Tags : ', 'legal'); ?><?php echo $legal_tag_list; ?></li><?php } ?>
                <li><?php $legal_comment = comments_number(__('Comment : 0', 'legal'), __('Comment : 1', 'legal'), __('Comments : %', 'legal')); ?></li>
        </ul>	
<?php 	
}

/*
 * Comments placeholder function
 * 
**/
add_filter( 'comment_form_default_fields', 'legal_comment_placeholders' );
function legal_comment_placeholders( $fields )
{
	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="'
		. _x(
		'Name *',
		'comment form placeholder',
		'legal'
		)
		. '" required',
		
	$fields['author']
	);
	$fields['email'] = str_replace(
		'<input',
		'<input id="email" name="email" type="text" placeholder="'
		. _x(
		'Email Id *',
		'comment form placeholder',
		'legal'
		)
		. '" required',
	$fields['email']
	);
	$fields['url'] = str_replace(
		'<input',
		'<input id="url" name="url" type="text" placeholder="'
		. _x(
		'Website URL',
		'comment form placeholder',
		'legal'
		)
		. '" required',
	$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_defaults', 'legal_textarea_insert' );
	function legal_textarea_insert( $fields )
	{
		$fields['comment_field'] = str_replace(
			'<textarea',
			'<textarea id="comment" aria-required="true" rows="8" cols="45" name="comment" placeholder="'
			. _x(
			'Comment',
			'comment form placeholder',
			'legal'
			)
		. '" ',
		$fields['comment_field']
		);
	return $fields;
	}
