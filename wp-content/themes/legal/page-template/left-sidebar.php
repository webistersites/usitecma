<?php
/**
 * Template Name: Left Sidebar
 * */
get_header();
?>
<!--Blogs posts start-->
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
    <div class="container theme-container">
        <div class="page-article">
            <div class="row blog-page">
                <?php get_sidebar(); ?>
                <div class="col-md-9 col-sm-8 no-padding">                        
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-md-12 col-sm-12 our-latest-box">
                            <div class="latest-blog-img">
                                <div class="inner-grid">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php $legal_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>    
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($legal_image[0]); ?>" width="<?php echo $legal_image[1]; ?>" height="<?php echo $legal_image[2]; ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
                                    <?php } ?>
                                </div>
                                <div class="latest-blog-inner">
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                            <?php comments_template( '', true ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blogs posts end-->
<?php get_footer(); ?>
