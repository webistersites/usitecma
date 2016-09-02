<?php
/*
 * Category Template File.
 */
get_header();
?>
<!--category posts start-->
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php echo single_cat_title('', false); ?></span></h2>
                </div>
                <?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <?php get_template_part('content'); ?>
</section>
<!--category posts end-->
<?php get_footer(); ?>
