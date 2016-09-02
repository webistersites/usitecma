<?php
/**
 * The default template for displaying content
 */
?>
<div class="container theme-container">
    <div class="page-article">
        <div class="row blog-page">
            <div class="col-md-9 col-sm-8">
                <div class="masonry-container masonry">
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-md-6 col-sm-6 our-latest-box">
                            <div class="latest-blog-img">
                                <div class="inner-grid">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php $legal_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail-image', true); ?>
                                        <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_url($legal_image[0]); ?>" width="<?php echo $legal_image[1]; ?>" height="<?php echo $legal_image[2]; ?>" alt="<?php the_title_attribute(); ?>" /></a>
                                    <?php } else { ?> 
                                        <a href="<?php the_permalink(); ?>"><img class="no-img" src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
                                    <?php } ?>
                                    <div class="post-meta">
                                                <ul>
                                                    <?php
                                                    $legal_author = ucfirst(get_the_author());
                                                    $legal_author_url = esc_url(get_author_posts_url(get_the_author_meta('ID')));
                                                    $legal_comments = wp_count_comments(get_the_ID());
                                                    $legal_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('d M, Y')));
                                                    ?>	 <li><?php _e('Post by : ', 'legal'); ?><a href="<?php echo $legal_author_url; ?>" rel="tag"><?php echo $legal_author; ?></a></li>
                                                    <li><?php _e('Date : ', 'legal'); ?><?php echo $legal_date; ?></li>
                                                    <li><?php $legal_comment = comments_number(__('Comment : 0', 'legal'), __('Comment : 1', 'legal'), __('Comments : %', 'legal')); ?></li>
                                                </ul>
                                            </div>
                                </div>
                                <div class="latest-blog-inner">
                                    <a class="latest-blog-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="col-md-12 site-pagination">
                    <div class="site-pagination">
                        <ul>						
                            <?php
                            // Previous/next page navigation.
                            the_posts_pagination();
                            ?></ul>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
