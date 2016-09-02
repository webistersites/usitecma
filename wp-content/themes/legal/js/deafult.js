jQuery(window).scroll(function()
{
    /******header*****/
    if (jQuery(document).width() > 980) {
        if (jQuery(window).scrollTop() >= 0) {
            jQuery(".top-header").slideUp();
            jQuery("header").css({'position': 'fixed', 'top': '32'});
            jQuery("section").css({'margin-top': jQuery("header").height()});
}
        if (jQuery(window).scrollTop() <= 0) {
            jQuery(".top-header").slideDown();
            jQuery("header").css({'position': 'relative'});
            jQuery("section").css({'margin-top': '0px'});
        }
    }
});



