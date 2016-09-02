<?php $legal_options = get_option('legal_theme_options'); ?>
<footer class="page-footer">
    <div class="container theme-container">
        <div class="footer-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
        </div>
        <?php if (!empty($legal_options['facebook']) || !empty($legal_options['twitter']) || !empty($legal_options['pinterest']) || !empty($legal_options['gplus'])) { ?>
            <div class="social-widget">
                <ul>
                    <?php if (!empty($legal_options['facebook'])) { ?>
                        <li><a href="<?php echo esc_url($legal_options['facebook']); ?>" class='twitter-icon'><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($legal_options['twitter'])) { ?>
                        <li><a href="<?php echo esc_url($legal_options['twitter']); ?>" class='twitter-icon'><i class="fa fa-twitter"></i></a></li>
                    <?php } ?> 
                    <?php if (!empty($legal_options['pinterest'])) { ?>
                        <li><a href="<?php echo esc_url($legal_options['pinterest']); ?>" class='twitter-icon'><i class="fa fa-pinterest-square"></i></a></li>
                    <?php } ?> 
                    <?php if (!empty($legal_options['gplus'])) { ?>
                        <li><a href="<?php echo esc_url($legal_options['gplus']); ?>" class='twitter-icon'><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php if (( is_active_sidebar('footer-1') ) || ( is_active_sidebar('footer-2') ) || ( is_active_sidebar('footer-3') ) || ( is_active_sidebar('footer-4') )) { ?> 
            <div class="footer-top">
                <div class="row footer-row">
                    <div class="col-md-3 col-sm-6">
                        <?php if (is_active_sidebar('footer-1')) { ?> 
                            <div class="footer-widget">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        <?php } ?>
                    </div>    
                    <div class="col-md-3 col-sm-6">    
                        <?php if (is_active_sidebar('footer-2')) { ?> 
                            <div class="footer-widget">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        <?php } ?>
                    </div>  
                    <div class="col-md-3 col-sm-6">    
                        <?php if (is_active_sidebar('footer-3')) { ?> 
                            <div class="footer-widget">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        <?php } ?>
                    </div> 
                    <div class="col-md-3 col-sm-6">    
                        <?php if (is_active_sidebar('footer-4')) { ?> 
                            <div class="footer-widget">
                                <?php dynamic_sidebar('footer-4'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> 
        <?php } ?>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p><?php
                        if (!empty($legal_options['copyright-text'])) {
                            echo esc_html($legal_options['copyright-text']) . '. ';
                        }
                        printf(__('Powered by %1$s and %2$s.', 'legal'), '<a href="http://wordpress.org" target="_blank">WordPress</a>', '<a href="http://fasterthemes.com/wordpress-themes/legal" target="_blank">Legal</a>');
                        ?></p> 
                </div> 
                <?php
                if (has_nav_menu('footer-menu')) {
                    $legal_defaults = array(
                    'theme_location' => 'footer-menu',
                    'container' => 'div',
                    'container_class' => 'col-md-6 col-sm-6 terms widget',
                    'echo' => true,
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 1,
                );
                    wp_nav_menu($legal_defaults);
                }
                ?> 
            </div> 
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>