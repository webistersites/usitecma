<?php
/**
 * Author Page template file
 * */
get_header();
?>
<!--Author posts start-->
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php
                            _e('Published by', 'legal');
                            echo " : " . get_the_author();
                            ?></span></h2>
                </div>
<?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div> 
<?php get_template_part('content'); ?>
</section>
<!--Author posts end-->
<?php get_footer(); ?>
