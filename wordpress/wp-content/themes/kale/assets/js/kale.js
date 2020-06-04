/*** Kale - JS ***/
jQuery(document).ready(function($){

	if (jQuery('.single-content iframe, .page-content iframe').length) {
		kale_responsive_videos('.single-content iframe, .page-content iframe');
	}

    $("#toggle-main_search").on("click", function (event) {
        var x = setTimeout('jQuery(".main_search .form-control").focus()', 700);
    });

	fluidBox();
	$(window).load(function(){fluidBox();})
	$(window).resize(function(){fluidBox();});
	$('body').addClass('js');
	$(".owl-carousel").owlCarousel({
		lazyContent:true,
		loop:true,
		nav:true,
		dots:false,
        autoplay: true,
		items:1,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn'
	});
	$("select.form-control").selectpicker();
	$(".header-row-1-toggle").click(function(){
		$(this).toggleClass('open');
		$('.header-row-1').toggleClass('open');
		return false;
	});
	$('.checkbox label,.checkbox-inline label,.radio label,.radio-inline label').click(function(){
		setupLabel();
	});
	setupLabel();

	$('.search-trigger').on( 'click', function() {
		$(this).siblings('form').find('.search-field').toggleClass('visible').focus();
	});

    if ( $('.header-row-1 .widget_nav_menu li').hasClass( 'menu-item-has-children' ) ) {
        $('.header-row-1 .menu-item-has-children').addClass('dropdown')
            .find('> a').addClass('dropdown-toggle has-submenu')
            .append('<span class="caret 0"></span>');
    }
});
function setupLabel() {
	if (jQuery('.checkbox,.checkbox-inline').length) {
		jQuery('.checkbox label,.checkbox-inline label').each(function(){
			jQuery(this).removeClass('on');
		});
		jQuery('.checkbox input:checked,.checkbox-inline input:checked').each(function(){
			jQuery(this).parent('label').addClass('on');
		});
	};
	if (jQuery('.radio,.radio-inline').length) {
		jQuery('.radio label,.radio-inline label').each(function(){
			jQuery(this).removeClass('on');
		});
		jQuery('.radio input:checked,.radio-inline input:checked').each(function(){
			jQuery(this).parent('label').addClass('on');
		});
	};
};

function fluidBox(){
	if(jQuery('[data-fluid]').length>0){
		jQuery('[data-fluid]').each(function(){
			var data = jQuery(this).attr('data-fluid');
			var dataFloat = jQuery(this).attr('data-float');
			var _container = jQuery(this);
			var dataSplit = data.split(',');
			if(_container.hasClass('carousel')){
				_container.find('.item').addClass('show');
			}
			for(i=0;i<dataSplit.length;i++){
				if(dataSplit[i]!=''){
					if(jQuery(dataSplit[i],_container).length>0){
						jQuery(dataSplit[i],_container).css('min-height','inherit');
						if( dataFloat=='true' && jQuery(dataSplit[i],_container).parent().css('float')!='none' ){
							var newH = 0;
							if(jQuery(dataSplit[i],_container).length>0){
								jQuery(dataSplit[i],_container).each(function(){
									var thisH = jQuery(this).innerHeight();
									if( newH<thisH ) newH = thisH;
								});
								jQuery(dataSplit[i],_container).css('min-height',newH);
							}
						}else if(dataFloat!='true'){
							var newH = 0;
							if(jQuery(dataSplit[i],_container).length>0){
								jQuery(dataSplit[i],_container).each(function(){
									var thisH = jQuery(this).innerHeight();
									if( newH<thisH ) newH = thisH;
								});
								jQuery(dataSplit[i],_container).css('min-height',newH);
							}
						}
					}
				}
			}
			if(_container.hasClass('carousel')){
				_container.find('.item').removeClass('show');
			}
		});
	}
}

function kale_responsive_videos(element){
	jQuery(element)
		.wrap( '<div class="embedded embedded--16by9"></div>' );
}
