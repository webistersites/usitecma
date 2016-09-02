<?php
/**
 * The Header template for our theme
 */
$legal_options = get_option('legal_theme_options');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <!--[if lt IE 9]>
                <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->
        <?php if (!empty($legal_options['favicon'])) { ?>
            <link rel="shortcut icon" href="<?php echo esc_url($legal_options['favicon']); ?>">
        <?php } ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <?php if (!empty($legal_options['email']) || !empty($legal_options['number-title']) || !empty($legal_options['number']) || !empty($legal_options['facebook']) || !empty($legal_options['twitter']) || !empty($legal_options['pinterest']) || !empty($legal_options['gplus'])) { ?>
                <div class="top-header">
                    <div class="container theme-container"> 
                        <div class="col-md-6 col-sm-7 social-part">
                            <?php if (!empty($legal_options['email'])) { ?>
                                <p class="top-header-email">
                                    <i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($legal_options['email']); ?>"><?php echo esc_attr($legal_options['email']); ?></a>
                                </p> <?php } ?>
                            <ul>
                                <?php if (!empty($legal_options['facebook'])) { ?>
                                    <li><a href="<?php echo esc_url($legal_options['facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($legal_options['twitter'])) { ?>
                                    <li><a href="<?php echo esc_url($legal_options['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php } ?> 
                                <?php if (!empty($legal_options['pinterest'])) { ?>
                                    <li><a href="<?php echo esc_url($legal_options['pinterest']); ?>"><i class="fa fa-pinterest-square"></i></a></li>
                                <?php } ?> 
                                <?php if (!empty($legal_options['gplus'])) { ?>
                                    <li><a href="<?php echo esc_url($legal_options['gplus']); ?>"><i class="fa fa-google-plus"></i></a></li>
                                <?php } ?> 
                            </ul>                               
                        </div>
                        <div class="col-md-6 col-sm-5 callus-part">
                            <p>
                                <?php if (!empty($legal_options['number-title'])) { ?><span><?php echo esc_attr($legal_options['number-title']); ?> :</span> <?php } ?>
                                <?php
                                if (!empty($legal_options['number'])) {
                                    echo esc_attr($legal_options['number']);
                                }
                                ?>
                            </p>     
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="bottom-header">
                <div class="container theme-container">
                    <div class="col-md-3 theme-logo">
                        <?php if (empty($legal_options['logo'])) { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                        <?php } else { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($legal_options['logo']); ?>" alt="<?php  the_title_attribute(); ?>" class="img-responsive" /></a>
                        <?php } ?>
                    </div>
                    <div class="col-md-9 header-navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle navbar-toggle-top sort-menu-icon collapsed" 
                                    data-toggle="collapse" data-target=".navbar-collapse"> 
                                <span class="sr-only"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <?php
                        if (has_nav_menu('top-header-menu')) {
                            $legal_defaults = array(
                            'theme_location' => 'top-header-menu',
                            'container' => 'div',
                            'container_class' => 'theme-nav navbar-collapse collapse',
                            'container_id' => 'example-navbar-collapse',
                            'echo' => true,
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                        );
                            wp_nav_menu($legal_defaults);
                        }
                        ?> 
                    </div>    
                </div>
            </div>
        </header>
        <?php if (get_header_image()) { ?>
                <div class="custom-header-img">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php the_title_attribute(); ?>">
                    </a>
                </div>
<?php }     ?>
