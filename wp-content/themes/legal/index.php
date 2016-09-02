<?php
/**
 * The main template file
 * */
get_header();
?>
<!--Blogs posts start-->
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php _e('our latest blog','legal'); ?></span></h2>
                </div>
                <?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <?php get_template_part('content'); ?>
</section>
<!--Blogs posts end-->
<?php get_footer(); ?>
