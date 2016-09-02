<?php
/**
 * Single Post template file
 * */
get_header();
?>
<!--section start-->
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php the_title(); ?></span></h2>
                </div>
                <?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <!--single post start-->
    <div class="container theme-container">
        <div class="page-article">
            <div class="row">
                <div id="post-<?php the_ID(); ?>" <?php post_class("col-md-9 col-sm-8"); ?>>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="our-latest-box single-blog-page">
                            <div class="latest-blog-img">
                                <div class="inner-grid">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php $legal_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>    
                                        <img src="<?php echo esc_url($legal_image[0]); ?>" width="<?php echo $legal_image[1]; ?>" height="<?php echo $legal_image[2]; ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
                                    <?php } ?> 
                                    <div class="post-meta">
                                        <?php legal_entry_meta(); ?>
                                    </div>
                                </div>	
                                <div class="latest-blog-inner">

                                    <h3 class="latest-blog-title"><?php the_title(); ?></h3>
                                    <?php
                                    the_content();
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'legal') . '</span>',
                                        'after' => '</div>',
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                    ));
                                    ?>
                                </div>                                      
                            </div>
                        </div>
                        <div class="col-md-12 site-pagination no-padding">
                            <div class="site-pagination">
                                <?php
                                the_post_navigation(array(
                                    'next_text' =>
                                    '<span class="page-numbers pre"> %title </span>',
                                    'prev_text' =>
                                    '<span class="page-numbers nex"> %title </span>',
                                ));
                                ?>

                            </div>
                        <?php comments_template('', true); ?>
                        </div>  
<?php endwhile; ?>

                </div>
<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    <!--single post end-->
</section>
<!--section end-->
<?php get_footer(); ?>
