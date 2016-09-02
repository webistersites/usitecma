<?php
/**
 * 404 page template file
 * */
get_header();
?>
<section class="section-main">
    <div class="breadcrumb-bg">
        <div class="container theme-container">
            <div class="site-breadcrumb">
                <div class="home-title">
                    <h2><span><?php _e('404 - Article Not Found', 'legal'); ?></span></h2>
                </div>
                <?php legal_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>    
    <!-- 404 Content Start -->
    <div class="container theme-container">
        <div class="page-article">
            <div class="row blog-page">
                <div class="col-md-12 col-sm-12 no-padding">
                    <div class="jumbotron">
                        <h1><?php _e('Epic 404 - Article Not Found', 'legal') ?></h1>
                        <p><?php _e("This is embarassing. We can't find what you were looking for.", "legal") ?></p>
                        <p><?php _e('Whatever you were looking for was not found, but maybe try looking again or search using the form below.', 'legal') ?></p>
                        <div class="row">
                            <div class="col-sm-12 search-formmain">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>            
                </div>
            </div> </div>
    </div>
    <!-- 404 Content End -->
</section>
<?php get_footer(); ?>