<?php
add_action('widgets_init', 'legal_recentpost_widget');
function legal_recentpost_widget() {
    register_widget('legal_recent_widget');
}
class legal_recent_widget extends WP_Widget {
    function legal_recent_widget() {
        $legal_widget_ops = array('classname' => 'legal_recent', 'description' => __('A widget that display recent posts. ', 'legal'));
        $legal_control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'legal-recent-widget');
        $this->WP_Widget('legal-recent-widget', __('Legal Recent Posts', 'legal'), $legal_widget_ops, $legal_control_ops);
    }
    function widget($legal_args, $legal_instance) {
        extract($legal_args);
        //Our variables from the widget settings.
        $legal_title = apply_filters('widget_title', $legal_instance['title']);
        $legal_noofpost = $legal_instance['noofpost'];
        $legal_hidedate = $legal_instance['hidedate'];
        if (empty($legal_noofpost) || $legal_noofpost == 0)
            $legal_noofpost = 2;

        $legal_post_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $legal_noofpost,
            'order' => 'DESC',
            'orderby' => 'post_date',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
            )
        );
        global $wp_query;
        $legal_query = new WP_Query($legal_post_args);
        echo $before_widget;
        //Display widget
        ?>
        <?php if ($legal_query->have_posts()):
            if (!empty($legal_instance['title'])):
                echo $legal_args['before_title'] . apply_filters( 'widget_title', $legal_instance['title'] ). $legal_args['after_title'];
            else:
                echo $legal_args['before_title'] . apply_filters( 'widget_title', 'Recent Post'). $legal_args['after_title'];
            endif;


                while ($legal_query->have_posts()): $legal_query->the_post(); ?>
                <?php
                $apusfeatured = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                if (!empty($apusfeatured)):
                    ?>
                    <div class="footer-recent-post">
                        <ul>
                            <li>
                                <div class="footer-recent-img">
                                  <?php $legal_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'legal-widget-image'); ?>    
                                    <a href="<?php echo get_permalink(); ?>">
                                    <img src="<?php echo esc_url($legal_image[0]); ?>" width="<?php echo $legal_image[1]; ?>" height="<?php echo $legal_image[2]; ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="post-date">
                                        <a href="<?php echo get_permalink(); ?>"><?php the_title_attribute(); ?></a>
                                        <?php if (empty($legal_instance['hidedate'])) { ?>
                                        <p><?php echo get_the_date("M d,Y", get_the_ID()); ?></p>
                                        <?php } ?>
                                </div>
                            </li>
                        </ul>
                        </div>
                        
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif;
        wp_reset_query(); ?>
        <?php
        echo $after_widget;
    }
    //Update the widget
    function update($new_instance, $old_instance) {
        $legal_instance = $old_instance;
        $legal_instance['title'] = strip_tags($new_instance['title']);
        $legal_instance['noofpost'] = strip_tags($new_instance['noofpost']);
        $legal_instance['hidedate'] = strip_tags($new_instance['hidedate']);
        return $legal_instance;
    }
    function form($legal_instance) {
        if (empty($legal_instance['noofpost']) || $legal_instance['noofpost'] == 0)
            $legal_instance['noofpost'] = 2;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php _e('Title', 'legal');
        echo ":"; ?>
            </label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (!empty($legal_instance['title'])) {
            echo $legal_instance['title'];
        } ?>" style="width:100%;" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('noofpost'); ?>">
        <?php _e('Number of posts to show', 'legal');
        echo ":"; ?>
            </label>
            <input id="<?php echo $this->get_field_id('noofpost'); ?>" name="<?php echo $this->get_field_name('noofpost'); ?>" value="<?php if (!empty($legal_instance['noofpost'])) {
            echo $legal_instance['noofpost'];
        } ?>" size="3" type="text" />
        </p>
        <p>
           <input id="<?php echo $this->get_field_id('hidedate'); ?>" name="<?php echo $this->get_field_name('hidedate'); ?>" value="yes" 
                   <?php if (!empty($legal_instance['hidedate'])) { ?> checked="checked" <?php } ?>size="3" type="checkbox" />
            <label for="<?php echo $this->get_field_id('hidedate'); ?>">
        <?php _e('Check to hide post date', 'legal');?>
        </label>
        </p>
        <?php
    }
}
?>
