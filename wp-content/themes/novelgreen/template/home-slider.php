<?php 
$novelgreen_parent_theme = get_template(); 
$i = 0;
if(!empty($novelgreen_parent_theme) && $novelgreen_parent_theme =='novelpro'):
?>
<div id="slides_full" class="novelpro_slider">  
<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('novelpro_slider_speed','') != '') { echo stripslashes(get_theme_mod('novelpro_slider_speed')); } else { ?>3000<?php } ?>"/>
<?php else: ?>
<div id="slides_full" class="NovelLite_slider"> 
<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('NovelLite_slider_speed','') != '') { echo esc_html(get_theme_mod('NovelLite_slider_speed')); } else { ?>3000<?php } ?>"/>
<?php endif; ?>
    <ul class="slides-container">
        <li>
            <?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>
                <a href="<?php
                if (get_theme_mod('first_slider_link','') != '') {
                    echo esc_html(get_theme_mod('first_slider_link'));
                }
                ?>" >
                    <img  src="<?php echo esc_url(get_theme_mod('first_slider_image')); ?>" alt="Slide Image 1"/></a>
            <?php } else { ?>
                <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/main.jpg" alt="<?php _e('Slide Image 1','novelgreen'); ?>"/>
            <?php } ?>
            <div class="slider_overlay"></div>
            <div class="container container_caption">
                <?php if (get_theme_mod('first_slider_heading','') != '') { ?>
                    <h1><a href="<?php
                        if (get_theme_mod('first_slider_link','') != '') {
                            echo  esc_url(get_theme_mod('first_slider_link'));
                        }
                        ?>"><?php echo esc_html(get_theme_mod('first_slider_heading')); ?></a></h1>
                    <?php } else { ?>
                    <h1><?php _e('Business Theme','novelgreen'); ?></h1>
                <?php } ?> 
                <div class="clearfix"></div>
                <?php if (get_theme_mod('first_slider_desc') != '') { ?>
                    <p>                    
                        <?php echo get_theme_mod('first_slider_desc'); ?>
                    </p>
                <?php } else { ?>
                    <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br/>Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.','novelgreen'); ?></p>
                <?php } ?>
                
                
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('first_button_text','') != '') { ?>
                <a href="<?php
                                if (get_theme_mod('first_button_link','') != '') {
                                    echo esc_url(get_theme_mod('first_button_link'));
                                } else {
                                    echo "#";
                                }
                                ?>" class="theme-slider-button">
                <?php echo esc_html(get_theme_mod('first_button_text')); ?>
                
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button"><?php _e('Buy Now!','novelgreen'); ?></a>
                <?php } ?>
                </div>  
            </div>
        </li>
        <?php if (get_theme_mod('second_slider_image','') != '') {  $i++; ?>
            <li>
                <?php if (get_theme_mod('second_slider_image','') != '') { ?>
                    <a href="<?php
                    if (get_theme_mod('second_slider_link','') != '') {
                        echo esc_url(get_theme_mod('second_slider_link'));
                    }
                    ?>" >
                        <img  src="<?php echo get_theme_mod('second_slider_image'); ?>" alt="<?php _e('Slide Image 2','novelgreen'); ?>"/></a>
                <?php } else { ?>
                <?php } ?>
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                    <div class="container container_caption">
                        <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('second_slider_link','') != '') {
                                    echo esc_url(get_theme_mod('second_slider_link'));
                                }
                                ?>"><?php echo esc_html(get_theme_mod('second_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php
                            } else {
                                
                            }
                            ?>
                            <?php if (get_theme_mod('second_slider_desc','') != '') { ?>
                            <p>                    
                                <?php echo get_theme_mod('second_slider_desc'); ?>
                            </p>
                            <?php
                        } else {
                            
                        }
                        ?>  
            <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('second_button_text','') != '') { ?>
                <a href="<?php
                                if (get_theme_mod('second_button_link','') != '') {
                                    echo esc_url(get_theme_mod('second_button_link',"#"));
                                } ?>" class="theme-slider-button">
                <?php echo esc_html(get_theme_mod('second_button_text')); ?>
                
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button"><?php _e('Buy Now!','novelgreen'); ?></a>
                <?php } ?>
                </div>
 </div>
                <?php } ?>
                <div class="slider_overlay"></div>
            </li>
        <?php } ?>

<?php if(!empty($novelgreen_parent_theme) && $novelgreen_parent_theme =='novelpro'): ?>

<!-- Third Slider -->
        <?php if (get_theme_mod('third_slider_image','') != '') { $i++; ?>
            <li>
                <?php if (get_theme_mod('third_slider_image','') != '') { ?>
                    <a href="<?php
                    if (get_theme_mod('third_slider_link','') != '') {
                        echo get_theme_mod('third_slider_link');
                    }
                    ?>" >
                        <img  src="<?php echo get_theme_mod('third_slider_image'); ?>" alt="Slide Image 3"/></a>
                <?php } ?>
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('third_slider_heading','') != '') { ?>
                    <div class="container slider3 container_caption">
                        <?php if (get_theme_mod('third_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('third_slider_link','') != '') {
                                    echo get_theme_mod('third_slider_link');
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('third_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php } ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('third_slider_desc')); ?>
                            </p>
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('third_button_text','') != '') { ?>
                <a href="<?php  if (get_theme_mod('third_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('third_button_link'));
                                } else { echo "#"; }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('third_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
                </div>
                <?php } ?>
            </li>
        <?php } ?>

        <!-- Fourth Slider -->
        <?php if (get_theme_mod('fourth_slider_image','') != '') { $i++; ?>
            <li>
                <?php if (get_theme_mod('fourth_slider_image','') != '') { ?>
                    <a href="<?php
                    if (get_theme_mod('fourth_slider_link','') != '') {
                        echo get_theme_mod('fourth_slider_link');
                    }
                    ?>" >
                        <img  src="<?php echo get_theme_mod('fourth_slider_image'); ?>" alt="Slide Image 4"/></a>
                <?php } ?>
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('fourth_slider_heading','') != '') { ?>
                    <div class="container slider4 container_caption">
                        <?php if (get_theme_mod('fourth_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('fourth_slider_link','') != '') {
                                    echo get_theme_mod('fourth_slider_link');
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('fourth_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php } ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('fourth_slider_desc')); ?>
                            </p>
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('fourth_button_text','') != '') { ?>
                <a href="<?php  if (get_theme_mod('fourth_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('fourth_button_link'));
                                } else { echo "#"; }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('fourth_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
                </div>
                <?php } ?>
            </li>
        <?php } ?>

         <!-- Fifth Slider -->
        <?php if (get_theme_mod('fifth_slider_image','') != '') { $i++; ?>
            <li>
                <?php if (get_theme_mod('fifth_slider_image','') != '') { ?>
                    <a href="<?php
                    if (get_theme_mod('fifth_slider_link','') != '') {
                        echo get_theme_mod('fifth_slider_link');
                    }
                    ?>" >
                        <img  src="<?php echo get_theme_mod('fifth_slider_image'); ?>" alt="Slide Image 5"/></a>
                <?php } ?>
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('fifth_slider_heading','') != '') { ?>
                    <div class="container slider5 container_caption">
                        <?php if (get_theme_mod('fifth_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('fifth_slider_link','') != '') {
                                    echo get_theme_mod('fifth_slider_link');
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('fifth_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php } ?>
                            <?php if (get_theme_mod('fifth_slider_desc','') != '') { ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('fifth_slider_desc')); ?>
                            </p>
                            <?php } ?>  
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('fifth_button_text','') != '') { ?>
                <a href="<?php  if (get_theme_mod('fifth_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('fifth_button_link'));
                                } else { echo "#"; }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('fifth_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
                </div>
                <?php } ?>
            </li>
        <?php } ?>

        <!-- Sixth slider -->
        <?php if (get_theme_mod('sixth_slider_image','') != '') { $i++; ?>
            <li>
                <?php if (get_theme_mod('sixth_slider_image','') != '') { ?>
                    <a href="<?php
                    if (get_theme_mod('sixth_slider_link','') != '') {
                        echo get_theme_mod('sixth_slider_link');
                    }
                    ?>" >
                        <img  src="<?php echo get_theme_mod('sixth_slider_image'); ?>" alt="Slide Image 6"/></a>
                <?php } ?>
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('sixth_slider_heading','') != '') { ?>
                    <div class="container slider6 container_caption">
                        <?php if (get_theme_mod('sixth_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('sixth_slider_link','') != '') {
                                    echo get_theme_mod('sixth_slider_link');
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('sixth_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php } ?>
                            <?php if (get_theme_mod('sixth_slider_desc','') != '') { ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('sixth_slider_desc')); ?>
                            </p>
                            <?php } ?>  
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('sixth_button_text','') != '') { ?>
                <a href="<?php  if (get_theme_mod('sixth_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('sixth_button_link'));
                                } else { echo "#"; }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('sixth_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
                </div>
                <?php } ?>
            </li>
        <?php } ?>
<?php endif; ?>
    </ul>
    <nav class="slides-navigation">
        <a href="#" class="next"><?php _e('Next','novelgreen'); ?></a>
        <a href="#" class="prev"><?php _e('Previous','novelgreen'); ?></a>
    </nav>
</div> 
<?php if(!empty($novelgreen_parent_theme) && $novelgreen_parent_theme =='novelpro'): ?>
 <div id ="slspeed" sliderspeed="<?php if ($i > 1 ) { echo 2; } else { echo 0;  } ?>"></div>
<?php endif; ?>