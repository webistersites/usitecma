<?php
/*
 * Tag Template File.
 */
get_header();
?>
<!--Blogs posts start-->
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php _e('Tag', 'legal'); echo " : " . single_tag_title('', false); ?></span></h2>
                </div>
                <?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <?php get_template_part('content'); ?>
</section>
<!--Blogs posts end-->
<?php get_footer(); ?>
