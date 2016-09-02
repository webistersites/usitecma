<?php
/**
 * Archive Page template file
 * */
get_header();
?>
<!--Archive posts start-->
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php the_archive_title(); ?></span></h2>
                </div>
                <?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
     <?php get_template_part('content'); ?>
</section>
<!--Archive posts end-->
<?php get_footer(); ?>
