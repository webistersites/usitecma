<?php

function legal_options_init() {
    register_setting('legal_options', 'legal_theme_options', 'legal_options_validate');
}

add_action('admin_init', 'legal_options_init');

function legal_options_validate($input) {

    /* Basic Settings */
    $input['logo'] = legal_image_validation(esc_url_raw($input['logo']));
    $input['favicon'] = legal_image_validation(esc_url_raw($input['favicon']));
    $input['email'] = sanitize_email($input['email']);
    $input['number-title'] = sanitize_text_field($input['number-title']);
    $input['number'] = sanitize_text_field($input['number']);

    /* Home Page Settings */
    for ($legal_section_slider = 1; $legal_section_slider <= 5; $legal_section_slider++):
        $input['slider-img-' . $legal_section_slider] = legal_image_validation(esc_url_raw($input['slider-img-' . $legal_section_slider]));
        $input['faicon-slider-' . $legal_section_slider] = sanitize_text_field($input['faicon-slider-' . $legal_section_slider]);
        $input['slidecaption-one-' . $legal_section_slider] = sanitize_text_field($input['slidecaption-one-' . $legal_section_slider]);
        $input['slidecaption-second-' . $legal_section_slider] = sanitize_text_field($input['slidecaption-second-' . $legal_section_slider]);
        $input['slidebuttontext-' . $legal_section_slider] = sanitize_text_field($input['slidebuttontext-' . $legal_section_slider]);
        $input['slidebuttonlink-' . $legal_section_slider] = esc_url_raw($input['slidebuttonlink-' . $legal_section_slider]);
    endfor;

    $input['home-title'] = sanitize_text_field($input['home-title']);
    $input['home-content'] = sanitize_text_field($input['home-content']);

    $input['benifits-title'] = sanitize_text_field($input['benifits-title']);
    $input['benifits-content'] = sanitize_text_field($input['benifits-content']);

    for ($legal_section_fafaicons = 1; $legal_section_fafaicons <= 8; $legal_section_fafaicons++):
        $input['faicons-' . $legal_section_fafaicons] = sanitize_text_field($input['faicons-' . $legal_section_fafaicons]);
        $input['section-title-' . $legal_section_fafaicons] = sanitize_text_field($input['section-title-' . $legal_section_fafaicons]);
    endfor;

    $input['bg-img'] = legal_image_validation(esc_url_raw($input['bg-img']));
    $input['bg-title'] = sanitize_text_field($input['bg-title']);
    $input['bg-btn-title'] = sanitize_text_field($input['bg-btn-title']);
    $input['bg-btn-link'] = esc_url_raw($input['bg-btn-link']);

    $input['post-title'] = sanitize_text_field($input['post-title']);
    $input['post-content'] = sanitize_text_field($input['post-content']);

    /* Social Setings */
    $input['facebook'] = esc_url_raw($input['facebook']);
    $input['twitter'] = esc_url_raw($input['twitter']);
    $input['pinterest'] = esc_url_raw($input['pinterest']);
    $input['gplus'] = esc_url_raw($input['gplus']);

    /* Footer Settings  */
    $input['copyright-text'] = sanitize_text_field($input['copyright-text']);
    return $input;
}

/* Validation for uploaded image */

function legal_image_validation($legal_imge_url) {
    $legal_filetype = wp_check_filetype($legal_imge_url);

    $legal_supported_image = array('gif', 'jpg', 'jpeg', 'png', 'ico');

    if (in_array($legal_filetype['ext'], $legal_supported_image)) {
        return $legal_imge_url;
    } else {
        return '';
    }
}

function legal_framework_load_scripts() {
    wp_enqueue_media();
    wp_enqueue_style('themeoptions_framework', get_template_directory_uri() . '/theme-options/css/themeoptions_framework.css', false, '1.0.0');
    // Enqueue custom option panel JS
    wp_enqueue_script('options-custom', get_template_directory_uri() . '/theme-options/js/themeoptions-custom.js', array('jquery'));
    wp_enqueue_script('media-uploader', get_template_directory_uri() . '/theme-options/js/media-uploader.js', array('jquery'));
}

add_action('admin_enqueue_scripts', 'legal_framework_load_scripts');

function legal_framework_menu_settings() {
    $legal_menu = array(
        'page_title' => __('Theme Options', 'legal'),
        'menu_title' => __('Theme Options', 'legal'),
        'capability' => 'edit_theme_options',
        'menu_slug' => 'themeoptions_framework',
        'callback' => 'legal_framework_page'
    );
    return apply_filters('legal_framework_menu', $legal_menu);
}

add_action('admin_menu', 'legal_add_page');

function legal_add_page() {
    $legal_menu = legal_framework_menu_settings();
    add_theme_page($legal_menu['page_title'], $legal_menu['menu_title'], $legal_menu['capability'], $legal_menu['menu_slug'], $legal_menu['callback']);
}

function legal_framework_page() {
    global $select_options;
    if (!isset($_REQUEST['settings-updated']))
        $_REQUEST['settings-updated'] = false;
    ?>
    <div class="themeoptions-themes">
        <form method="post" action="options.php" id="form-option" class="theme_option_ft">
            <div class="themeoptions-header">
                <div class="logo">
                    <?php
                    $legal_image = get_template_directory_uri() . '/theme-options/images/logo.png';
                    echo "<a href='http://fasterthemes.com/' target='_blank'><img src='" . esc_url($legal_image) . "' alt='" . __('FasterThemes', 'legal') . "' /></a>";
                    ?>
                </div>
                <div class="header-right">
                    <?php
                    echo "<h1>" . __('Theme Options', 'legal') . "</h1>";
                    echo "<div class='btn-save'><input type='submit' class='button-primary' value='" . __('Save Options', 'legal') . "' /></div>";
                    ?>
                </div>
            </div>
            <div class="themeoptions-details">
                <div class="themeoptions-options">
                    <div class="right-box">
                        <div class="nav-tab-wrapper">
                            <ul>
                                <li><a id="options-group-1-tab" class="nav-tab headerettings-tab" title="<?php _e('Basic Settings', 'legal'); ?>" href="#options-group-1"><?php _e('Basic Settings', 'legal'); ?></a></li>
                                <li><a id="options-group-2-tab" class="nav-tab homepagesettings-tab" title="<?php _e('Home Page Settings', 'legal'); ?>" href="#options-group-2"><?php _e('Home Page Settings', 'legal'); ?></a></li>
                                <li><a id="options-group-3-tab" class="nav-tab footersettings-tab" title="<?php _e('Social Settings', 'legal'); ?>" href="#options-group-3"><?php _e('Social Settings', 'legal'); ?></a></li>
                                <li><a id="options-group-4-tab" class="nav-tab footersettings-tab" title="<?php _e('Footer Settings', 'legal'); ?>" href="#options-group-4"><?php _e('Footer Settings', 'legal'); ?></a></li>
                                <li><a id="options-group-5-tab" class="nav-tab profeatures-tab" title="Pro Settings" href="#options-group-5"><?php _e('PRO Theme Features','legal'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="right-box-bg"></div>
                    <div class="postbox left-box"> 
                        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
                        <?php
                        settings_fields('legal_options');
                        $legal_options = get_option('legal_theme_options');
                        ?>
                        <!-------------- Header group ----------------->
                        <div id="options-group-1" class="group faster-inner-tabs">   
                            <div class="section theme-tabs theme-logo">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Site Logo (Recommended Size : 239px * 55px)', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input id="logo-img" class="upload" type="text" name="legal_theme_options[logo]" 
                                               value="<?php
                                               if (!empty($legal_options['logo'])) {
                                                   echo esc_url($legal_options['logo']);
                                               }
                                               ?>" placeholder="<?php _e('No file chosen', 'legal'); ?>" />
                                        <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'legal'); ?>" />
                                        <div class="screenshot" id="logo-image">
                                            <?php
                                            if (!empty($legal_options['logo'])) {
                                                echo "<img src='" . esc_url($legal_options['logo']) . "' /><a class='remove-image'></a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-favicon">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Favicon (Recommended Size : 32px * 32px)', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="explain"><?php _e('Size of favicon should be exactly 32x32px for best results.', 'legal'); ?></div>
                                    <div class="ft-control">
                                        <input id="favicon-img" class="upload" type="text" name="legal_theme_options[favicon]" 
                                               value="<?php
                                               if (!empty($legal_options['favicon'])) {
                                                   echo esc_url($legal_options['favicon']);
                                               }
                                               ?>" placeholder="<?php _e('No file chosen', 'legal'); ?>" />
                                        <input id="upload_image_button1" class="upload-button button" type="button" value="<?php _e('Upload', 'legal'); ?>" />
                                        <div class="screenshot" id="favicon-image">
                                            <?php
                                            if (!empty($legal_options['favicon'])) {
                                                echo "<img src='" . esc_url($legal_options['favicon']) . "' /><a class='remove-image'></a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>     
                            <div id="section-footertext" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Contact Information', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input id="email" class="of-input" placeholder="<?php _e('Enter Email address here', 'legal') ?>" name="legal_theme_options[email]" type="text" size="30" value="<?php
                                        if (!empty($legal_options['email'])) {
                                            echo esc_attr($legal_options['email']);
                                        }
                                        ?>" />
                                    </div> 
                                    <div class="ft-control">
                                        <input maxlength="15" type="text" id="number" class="of-input" name="legal_theme_options[number-title]" size="32" placeholder="<?php _e('Enter Contact Title Here', 'legal') ?>"  value="<?php
                                        if (!empty($legal_options['number-title'])) {
                                            echo esc_attr($legal_options['number-title']);
                                        }
                                        ?>">
                                    </div>
                                    <div class="ft-control">
                                        <input maxlength="15" type="text" id="number" class="of-input" name="legal_theme_options[number]" size="32" placeholder="<?php _e('Enter Phone Number Here', 'legal') ?>"  value="<?php
                                        if (!empty($legal_options['number'])) {
                                            echo esc_attr($legal_options['number']);
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                        </div>          
                        <!-------------- Home Page group ----------------->
                        <div id="options-group-2" class="group faster-inner-tabs">
                            <h3><?php _e('Banner Slider', 'legal'); ?></h3>
    <?php for ($legal_section_slider = 1; $legal_section_slider <= 5; $legal_section_slider++): ?>
                                <div class="section theme-tabs"> 
                                    <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('slider', 'legal'); ?> <?php echo $legal_section_slider; ?> <?php _e('(Recommended Size', 'legal');
        echo ' : 1350px * 539px)'; ?></a> 
                                    <div class="faster-inner-tab-group">
                                        <div class="ft-control">
                                            <input id="slider-img-<?php echo $legal_section_slider; ?>" class="upload" type="text" name="legal_theme_options[slider-img-<?php echo $legal_section_slider; ?>]" 
                                                   value="<?php
                                                   if (!empty($legal_options['slider-img-' . $legal_section_slider])) {
                                                       echo esc_url($legal_options['slider-img-' . $legal_section_slider]);
                                                   }
                                                   ?>" placeholder="<?php _e('No file chosen', 'legal'); ?>" />
                                            <input id="1upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'legal'); ?>" />
                                            <div class="screenshot" id="slider-img-<?php echo $legal_section_slider; ?>">
                                                <?php
                                                if (!empty($legal_options['slider-img-' . $legal_section_slider])) {
                                                    echo "<img src='" . esc_url($legal_options['slider-img-' . $legal_section_slider]) . "' /><a class='remove-image'>";

                                                    echo "</a>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="ft-control">
                                            <input type="text" placeholder="<?php
                                                   _e('Enter icon class name ( i.e. ', 'legal');
                                                   echo 'fa-inr )';
                                                   ?>" id="faicon-slider-<?php echo $legal_section_slider; ?>" class="of-input" name="legal_theme_options[faicon-slider-<?php echo $legal_section_slider; ?>]" size="32"  value="<?php
                                                   if (!empty($legal_options['faicon-slider-' . $legal_section_slider])) {
                                                       echo esc_attr($legal_options['faicon-slider-' . $legal_section_slider]);
                                                   }
                                                   ?>">
                                            <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e('View all icons', 'legal'); ?></a>
                                        </div>
                                        <div class="ft-control">
                                            <input maxlength="30" type="text" placeholder="<?php _e('Slide First Caption', 'legal'); ?>" id="slidecaption-one-<?php echo $legal_section_slider; ?>" class="of-input" name="legal_theme_options[slidecaption-one-<?php echo $legal_section_slider; ?>]" size="32"  value="<?php
                                            if (!empty($legal_options['slidecaption-one-' . $legal_section_slider])) {
                                                echo esc_attr($legal_options['slidecaption-one-' . $legal_section_slider]);
                                            }
                                            ?>">
                                        </div>
                                        <div class="ft-control">
                                            <input maxlength="40" type="text" placeholder="<?php _e('Slide Second Caption', 'legal'); ?>" id="slidecaption-second-<?php echo $legal_section_slider; ?>" class="of-input" name="legal_theme_options[slidecaption-second-<?php echo $legal_section_slider; ?>]" size="32"  value="<?php
                                            if (!empty($legal_options['slidecaption-second-' . $legal_section_slider])) {
                                                echo esc_attr($legal_options['slidecaption-second-' . $legal_section_slider]);
                                            }
                                            ?>">
                                        </div>
                                        <div class="ft-control">
                                            <input maxlength="35" type="text" placeholder="<?php _e('Slide Button Text', 'legal'); ?>" id="slidebuttontext-<?php echo $legal_section_slider; ?>" class="of-input" name="legal_theme_options[slidebuttontext-<?php echo $legal_section_slider; ?>]" size="32"  value="<?php
                                            if (!empty($legal_options['slidebuttontext-' . $legal_section_slider])) {
                                                echo esc_attr($legal_options['slidebuttontext-' . $legal_section_slider]);
                                            }
                                            ?>">
                                        </div>

                                        <div class="ft-control">
                                            <input type="text" placeholder="<?php _e('Slide Button Link', 'legal'); ?>" id="slidebuttonlink-<?php echo $legal_section_slider; ?>" class="of-input" name="legal_theme_options[slidebuttonlink-<?php echo $legal_section_slider; ?>]" size="32"  value="<?php
                                            if (!empty($legal_options['slidebuttonlink-' . $legal_section_slider])) {
                                                echo esc_url($legal_options['slidebuttonlink-' . $legal_section_slider]);
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                </div>
    <?php endfor; ?>
                            <h3><?php _e('Title Bar', 'legal'); ?></h3>
                            <div id="section-title" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Title', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input placeholder="<?php _e('Enter Home Page Title Here', 'legal') ?>" maxlength="100" id="title" class="of-input" name="legal_theme_options[home-title]"  type="text" size="32" value="<?php
                                        if (!empty($legal_options['home-title'])) {
                                            echo esc_attr($legal_options['home-title']);
                                        }
                                        ?>" />
                                    </div>                
                                </div>
                            </div>
                            <div class="section theme-tabs theme-short_description">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Short Description', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <textarea maxlength="600" placeholder="<?php _e('Enter Home Page Description Here', 'legal'); ?>" name="legal_theme_options[home-content]" rows="6" id="home-content1" class="of-input"><?php
                                            if (!empty($legal_options['home-content'])) {
                                                echo esc_attr($legal_options['home-content']);
                                            }
                                            ?></textarea>
                                    </div>                
                                </div>
                            </div>
                            <h3><?php _e('Benefits Section', 'legal'); ?></h3>
                            <div class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Title', 'legal'); ?> </a> 
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input type="text" maxlength="50"   placeholder="<?php _e('Enter title here', 'legal'); ?>" id="benifits-title" class="of-input" name="legal_theme_options[benifits-title]" size="32"  value="<?php
                                        if (!empty($legal_options['benifits-title'])) {
                                            echo esc_attr($legal_options['benifits-title']);
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-slider-img">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Content', 'legal'); ?> </a> 
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <textarea maxlength="400"  name="legal_theme_options[benifits-content]" rows="6" id="benifits-content" placeholder="<?php _e('Enter Content here', 'legal'); ?>" class="of-input"><?php
                                            if (!empty($legal_options['benifits-content'])) {
                                                echo esc_attr($legal_options['benifits-content']);
                                            }
                                            ?></textarea>
                                    </div>

                                </div>
                            </div>
    <?php for ($legal_section_fafaicons = 1; $legal_section_fafaicons <= 8; $legal_section_fafaicons++): ?>
                                <div class="section theme-tabs theme-slider-img">
                                    <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Tab', 'legal'); ?> <?php echo $legal_section_fafaicons; ?></a>
                                    <div class="faster-inner-tab-group">
                                        <div class="ft-control">
                                            <div class="explain"><?php
                                                _e('Enter any font-awesome icon name here. i.e. ', 'legal');
                                                echo 'fa-inr *';
                                                ?></div>
                                            <input placeholder="<?php
                                                   _e('Enter icon class i.e. ', 'legal');
                                                   echo 'fa-inr';
                                                   ?>" type="text" maxlength="50" class="of-input" name="legal_theme_options[faicons-<?php echo $legal_section_fafaicons; ?>]" size="32"  value="<?php
                                                   if (!empty($legal_options['faicons-' . $legal_section_fafaicons])) {
                                                       echo esc_attr($legal_options['faicons-' . $legal_section_fafaicons]);
                                                   }
                                                   ?>">
                                            <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e('View all icons', 'legal'); ?></a>
                                        </div>
                                        <div class="ft-control">
                                            <input placeholder="<?php
                                                   _e('Enter Benefits Title Here', 'legal');
                                                   ?>" type="text" maxlength="50" class="of-input" name="legal_theme_options[section-title-<?php echo $legal_section_fafaicons; ?>]" size="32"  value="<?php
                                                   if (!empty($legal_options['section-title-' . $legal_section_fafaicons])) {
                                                       echo esc_attr($legal_options['section-title-' . $legal_section_fafaicons]);
                                                   }
                                                   ?>">
                                        </div>
                                    </div>
                                </div>
    <?php endfor; ?>
                            <h3><?php _e('Background Section', 'legal'); ?></h3>
                            <div class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Background Image (Recommended Size', 'legal');
    echo ' : 362px * 400px)'; ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input id="bg-img" class="upload" type="text" name="legal_theme_options[bg-img]" 
                                               value="<?php
                                               if (!empty($legal_options['bg-img'])) {
                                                   echo esc_url($legal_options['bg-img']);
                                               }
                                               ?>" placeholder="<?php _e('No file chosen', 'legal'); ?>" />
                                        <input  id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'legal'); ?>" />
                                        <div class="screenshot" id="bg-img">
                                            <?php
                                            if (!empty($legal_options['bg-img'])) {
                                                echo "<img src='" . esc_url($legal_options['bg-img']) . "' /><a class='remove-image'></a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Title', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input placeholder="<?php _e('Enter Background Title Here', 'legal') ?>" maxlength="100" id="bg-title" class="of-input" name="legal_theme_options[bg-title]" type="text" size="32" value="<?php
                                               if (!empty($legal_options['bg-title'])) {
                                                   echo esc_attr($legal_options['bg-title']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>
                            <div class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Enter Button Title here', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input maxlength="70" placeholder="<?php _e('Enter Background Button Title Here', 'legal') ?>" id="bg-btn-title" class="of-input" name="legal_theme_options[bg-btn-title]" type="text" size="32" value="<?php
                                               if (!empty($legal_options['bg-btn-title'])) {
                                                   echo esc_attr($legal_options['bg-btn-title']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>
                            <div id="howitwork-desc" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Enter Button link here', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input maxlength="70" placeholder="<?php _e('Enter Background Button Link Here', 'legal'); ?>" id="bg-btn-link" class="of-input" name="legal_theme_options[bg-btn-link]" type="text" size="32" value="<?php
                                               if (!empty($legal_options['bg-btn-link'])) {
                                                   echo esc_url($legal_options['bg-btn-link']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>
                            <h3><?php _e('Recent Post', 'legal'); ?></h3>
                            <div id="section-recent-title" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Recent Post Title and Content', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input placeholder="<?php _e('Enter Recent Post Title Here', 'legal'); ?>" maxlength="40" id="post" class="of-input" name="legal_theme_options[post-title]" type="text" size="32" value="<?php
                                               if (!empty($legal_options['post-title'])) {
                                                   echo esc_attr($legal_options['post-title']);
                                               }
                                               ?>" />
                                    </div>
                                    <div class="ft-control">
                                        <textarea placeholder="<?php _e('Enter Recent Post Content Here', 'legal'); ?>" maxlength="400" id="post" class="of-input" name="legal_theme_options[post-content]" size="32" value="<?php
                                                  if (!empty($legal_options['post-content'])) {
                                                      echo esc_attr($legal_options['post-content']);
                                                  }
                                                  ?>" />
                                        </textarea>
                                    </div>  
                                </div>
                            </div>
                            <div class="section theme-tabs theme-short_description">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Category', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <select name="legal_theme_options[post-category]" id="category">
                                            <option value=""><?php echo esc_attr(__('Select Category', 'legal')); ?></option>
                                            <?php
                                            $legal_args = array(
                                                'meta_query' => array(
                                                    array(
                                                        'key' => '_thumbnail_id',
                                                        'compare' => 'EXISTS'
                                                    ),
                                                )
                                            );
                                            $legal_post = new WP_Query($legal_args);
                                            $legal_cat_id = array();
                                            while ($legal_post->have_posts()) {
                                                $legal_post->the_post();
                                                $legal_post_categories = wp_get_post_categories(get_the_id());
                                                foreach ($legal_post_categories as $legal_post_category)
                                                    $legal_cat_id[] = $legal_post_category;
                                            }
                                            $legal_cat_id = array_unique($legal_cat_id);
                                            $legal_args = array(
                                                'orderby' => 'name',
                                                'parent' => 0,
                                                'include' => $legal_cat_id
                                            );
                                            $legal_categories = get_categories($legal_args);
                                            foreach ($legal_categories as $legal_category) {
                                                if ($legal_category->term_id == $legal_options['post-category'])
                                                    $legal_selected = "selected=selected";
                                                else
                                                    $legal_selected = '';
                                                $legal_option = '<option value="' . $legal_category->term_id . '" ' . $legal_selected . '>';
                                                $legal_option .= $legal_category->cat_name;
                                                $legal_option .= '</option>';
                                                echo $legal_option;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter number of blog items , you would like to display in the home page.', 'legal'); ?></div>
                                        <input type="number" name="legal_theme_options[posts-per-page-home]" min=0 max=99 value="<?php
                                               if (!empty($legal_theme_options['posts-per-page-home'])) {
                                                   echo $impressive_options['bolg-post-number-home'];
                                               }
                                               ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <!-------------- Social group ----------------->
                        <div id="options-group-3" class="group faster-inner-tabs">

                            <div id="section-facebook" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Facebook', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Facebook profile or page URL i.e. ', 'legal'); ?>http://facebook.com/username/ </div>                
                                        <input id="facebook" class="of-input" name="legal_theme_options[facebook]" size="30" type="text" value="<?php
                                               if (!empty($legal_options['facebook'])) {
                                                   echo esc_url($legal_options['facebook']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>
                            <div id="section-twitter" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Twitter', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Twitter profile or page URL i.e. ', 'legal'); ?>http://www.twitter.com/username/</div>                
                                        <input id="twitter" class="of-input" name="legal_theme_options[twitter]" type="text" size="30" value="<?php
                                               if (!empty($legal_options['twitter'])) {
                                                   echo esc_url($legal_options['twitter']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>
                            <div id="section-pinterest" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Pinterest', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Pinterest profile or page URL i.e.', 'legal'); ?> https://pinterest.com/username/</div>                
                                        <input id="pinterest" class="of-input" name="legal_theme_options[pinterest]" type="text" size="30" value="<?php
                                               if (!empty($legal_options['pinterest'])) {
                                                   echo esc_url($legal_options['pinterest']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>
                            <div id="gplus" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Google+', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Google+ profile or page URL i.e.', 'legal'); ?> https://pinterest.com/username/</div>                
                                        <input id="gplus" class="of-input" name="legal_theme_options[gplus]" type="text" size="30" value="<?php
                                               if (!empty($legal_options['gplus'])) {
                                                   echo esc_url($legal_options['gplus']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div>

                        </div>
                        <!-------------- footer section----------------->
                        <div id="options-group-4" class="group faster-inner-tabs">
                            <div id="copyright-text" class="section theme-tabs">
                                <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Copyright text', 'legal'); ?></a>
                                <div class="faster-inner-tab-group">
                                    <div class="ft-control">
                                        <input placeholder="<?php _e('Enter Copyright Text Here ', 'legal') ?>" id="copyright-text" class="of-input" name="legal_theme_options[copyright-text]" type="text" size="30" value="<?php
                                               if (!empty($legal_options['copyright-text'])) {
                                                   echo esc_attr($legal_options['copyright-text']);
                                               }
                                               ?>" />
                                    </div>                
                                </div>
                            </div> 
                        </div>
						
						<div id="options-group-5" class="group legal-inner-tabs fasterthemes-pro-image">
							<div class="fasterthemes-pro-header">
							  <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/legal_logopro_features.png" class="fasterthemes-pro-logo" />
							  <a href="http://fasterthemes.com/checkout/get_checkout_details?theme=legal" target="_blank">
							  <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/buy-now.png" class="fasterthemes-pro-buynow" /></a>
							  </div>
							<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/legal_pro_features.png" />
						  </div>
                       
                       <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
                    </div>
                </div>
            </div>
            <div class="themeoptions-footer">
                <ul>
                    <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save Options', 'legal'); ?>" /></li>
                </ul>
            </div>
        </form>    
    </div>
    <div class="save-options"><h2><?php _e('Options saved successfully.', 'legal'); ?></h2></div>
<?php } ?>
