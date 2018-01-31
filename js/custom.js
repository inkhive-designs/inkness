!function(a){a.fn.equalHeights=function(){var b=0,c=a(this);return c.each(function(){var c=a(this).innerHeight();c>b&&(b=c)}),c.css("height",b)},a("[data-equal]").each(function(){var b=a(this),c=b.data("equal");b.find(c).equalHeights()})}(jQuery);
jQuery(document).ready(function() {

	jQuery(window).bind('scroll', function(e) {
		hefct();
	});

	if (jQuery(window).width() > 992 ) {
		       //  jQuery('#primary-home article').css( 'height', jQuery(this).parent('.row').height() );
		       //  jQuery('#primary-home article').css( 'height', jQuery(this).parent('.row').height() );
	       }

});
function hefct() {
	var scrollPosition = jQuery(window).scrollTop();
	jQuery('#parallax-bg').css('top', (0 - (scrollPosition * .2)) + 'px');
}

//Mobile Menu
jQuery('.menu-link').bigSlide({
    menu: '#menu',
    easyClose: true
});
