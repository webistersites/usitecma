<?php
/*
 * Template Name: Home Page
 */
$legal_options = get_option('legal_theme_options');
?>
<?php get_header(); ?>
<!--section start-->
<section class="section-main home-page">
    <div class="theme-banner">
        <div id="myCarousel" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php
                for ($legal_slider = 1; $legal_slider <= 5; $legal_slider++): if (empty($legal_options['slider-img-' . $legal_slider])) {
                        continue;
                    }
                    ?>
                    <?php if (!empty($legal_options['slider-img-' . $legal_slider])) { ?>  
                        <div class="item <?php
                        if ($legal_slider == 1) {
                            echo'active';
                        }
                        ?>">
                            <img  src="<?php echo esc_url($legal_options['slider-img-' . $legal_slider]); ?>" alt="<?php echo $legal_slider; ?>">
                            <div class="blur-effect"></div>
                            <div class="banner-inner-content">
                                <?php if (!empty($legal_options['faicon-slider-' . $legal_slider])) { ?>
                                    <i class="fa <?php echo esc_attr($legal_options['faicon-slider-' . $legal_slider]); ?>"></i>
                                <?php } ?>

                                <?php if (!empty($legal_options['slidecaption-one-' . $legal_slider])) { ?>
                                    <h1><?php echo esc_attr($legal_options['slidecaption-one-' . $legal_slider]); ?></h1>
                                <?php } ?>

                                <?php if (!empty($legal_options['slidecaption-second-' . $legal_slider])) { ?>
                                    <p><?php echo esc_attr($legal_options['slidecaption-second-' . $legal_slider]); ?></p>
                                <?php } ?>

                                <?php if (!empty($legal_options['slidebuttontext-' . $legal_slider])) { ?>
                                    <div class="banner-button">
                                        <a href="<?php
                                        if (!empty($legal_options['slidebuttonlink-' . $legal_slider])) {
                                            echo esc_url($legal_options['slidebuttonlink-' . $legal_slider]);
                                        } else {
                                            echo '#';
                                        }
                                        ?>">
                                               <?php echo esc_attr($legal_options['slidebuttontext-' . $legal_slider]); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                <?php endfor; ?>
            </div>
            <!-- Carousel nav -->
            <?php for ($legal_slider = 2; $legal_slider <= 5; $legal_slider++): if (!empty($legal_options['slider-img-' . $legal_slider])) { ?>
                    <a class="carousel-control left nav-left" href="#myCarousel" data-slide="prev"></a>
                    <a class="carousel-control right nav-right" href="#myCarousel" data-slide="next"></a>
                <?php } endfor; ?>
        </div> 
    </div>
    <!--banner end-->
    <!--our best-->
    <div class="home-practise-section">
        <div class="container theme-container">
            <?php if (!empty($legal_options['home-title']) || !empty($legal_options['home-content'])) { ?>
                <div class="home-title">
                    <?php if (!empty($legal_options['home-title'])) { ?>
                        <h2><span><?php echo esc_attr($legal_options['home-title']); ?></span></h2>
                    <?php } ?>
                    <?php if (!empty($legal_options['home-content'])) { ?>
                        <p><?php echo esc_attr($legal_options['home-content']); ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (!empty($legal_options['benifits-title']) || (function_exists('appointment')) ) { ?>
            <div class="row section-column">
                <?php if (!empty($legal_options['benifits-title'])) { ?>
                    <div <?php if (function_exists('appointment')) { ?>class="col-sm-6 col-md-6 column-company" <?php } else { ?>class="col-sm-12 col-md-12 column-company" <?php } ?> >

                        <div class="home-title">
                            <h2><span><?php echo esc_attr($legal_options['benifits-title']); ?></span></h2>
                        </div>
                        <div class="company-col1">
                            <ul>
                                <?php for ($legal_section_fafaicons = 1; $legal_section_fafaicons <= 8; $legal_section_fafaicons++): ?>
                                    <?php if (!empty($legal_options['faicons-' . $legal_section_fafaicons]) && !empty($legal_options['section-title-' . $legal_section_fafaicons])) { ?>
                                        <li <?php if (function_exists('appointment')) { ?> class="col-md-6 col-sm-12" <?php } else { ?> class="col-md-3 col-sm-6" <?php } ?>>
                                            <i class="fa <?php echo esc_attr($legal_options['faicons-' . $legal_section_fafaicons]); ?>"></i>
                                            <span><?php echo esc_attr($legal_options['section-title-' . $legal_section_fafaicons]); ?></span>
                                        </li>
                                    <?php } ?>
                                <?php endfor; ?>
                            </ul>
                            <?php if (!empty($legal_options['benifits-content'])) { ?>
                                <p><?php echo esc_attr($legal_options['benifits-content']); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (function_exists('appointment')) { ?>
                    <div class="col-md-6 col-sm-6 column-book" >
                        <div class="row"> <?php echo do_shortcode('[fastbook]'); ?></div>    
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>    
    <!--end-->
    <!--home section image bg-->
    <?php if (!empty($legal_options['bg-img'])) { ?>
        <div class="home-image-section">
            <div class="blur-effect">
                <div class="container theme-container">
                    <?php if (!empty($legal_options['bg-title'])) { ?>
                        <h2><?php echo esc_attr($legal_options['bg-title']); ?></h2>
                    <?php } ?>
                    <?php if (!empty($legal_options['bg-btn-title'])) { ?>
                        <div class="banner-button">
                            <a href="<?php
                            if (!empty($legal_options['bg-btn-link'])) {
                                echo esc_url($legal_options['bg-btn-link']);
                            } else {
                                echo "#";
                            }
                            ?>"><?php echo esc_attr($legal_options['bg-btn-title']); ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>     
        </div>
    <?php } ?>
    <!--end-->
    <!--our section strat-->
    <div class="home-our-blog">
        <div class="container theme-container">
            <div class="home-title">
                <?php if (!empty($legal_options['post-title'])) { ?>
                    <h2><span><?php echo esc_attr($legal_options['post-title']); ?></span></h2>
                <?php } ?>
                <?php if (!empty($legal_options['post-content'])) { ?>
                    <p><?php echo esc_attr($legal_options['post-content']); ?></p>
                <?php } ?>
            </div>
            <div class="masonry-container masonry">
                <div class="row our-latest-blog">
                    <?php
                    $legal_args = array('posts_per_page' => $legal_options['posts-per-page-home'],
                        'cat' => $legal_options['post-category'],
                        'meta_query' => array(
                            array(
                                'key' => '_thumbnail_id',
                                'compare' => 'EXISTS'
                            ),
                        )
                    );
                    $legal_query = new wp_query($legal_args);

                    if ($legal_query->have_posts()) {
                        ?>
                        <?php
                        while ($legal_query->have_posts()) {
                            $legal_query->the_post();
                            ?>
                            <div class="col-md-4 col-sm-6 our-latest-box">
                                <div class="latest-blog-img">
                                    <div class="inner-grid">
                                        <?php $legal_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'legal-thumbnail-image', true); ?>
                                        <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_url($legal_image[0]); ?>" width="<?php echo $legal_image[1]; ?>" height="<?php echo $legal_image[2]; ?>" alt="<?php the_title_attribute(); ?>" /></a>
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
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--end-->
</section>
<!--section end-->
<?php get_footer(); ?>

