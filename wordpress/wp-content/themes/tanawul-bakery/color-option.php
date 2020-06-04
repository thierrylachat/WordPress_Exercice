<?php
	$tanawul_bakery_theme_color_first = get_theme_mod('tanawul_bakery_theme_color_first');

	$tanawul_bakery_custom_css = '';

	if($tanawul_bakery_theme_color_first != false){
		$tanawul_bakery_custom_css .='.header-menu, span.cart-value, .readbutton a:hover, #we-offer hr, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, .post-link span:hover, .post-link span:hover a, .post-info, #sidebox h2, button.search-submit:hover, .search-form button.search-submit, .copyright, .widget .tagcloud a:hover,.widget .tagcloud a:focus,.widget.widget_tag_cloud a:hover,.widget.widget_tag_cloud a:focus,.wp_widget_tag_cloud a:hover,.wp_widget_tag_cloud a:focus, .main-navigation.toggled-on > div > ul,button,input[type="button"],input[type="submit"],.prev.page-numbers:focus,.prev.page-numbers:hover,.scrollup i,.page-numbers,.tags p a,.post-navigation .nav-previous a,.post-navigation .nav-next a,.comment-reply-link ,.social-icon i:hover, .readbutton span:hover, .readbutton span:hover a, .site-footer button:hover,#sidebox h3, #sidebox .widget_price_filter .ui-slider-horizontal .ui-slider-range, #sidebox .widget_price_filter .ui-slider .ui-slider-handle, .site-footer .widget_price_filter .ui-slider-horizontal .ui-slider-range, .site-footer .widget_price_filter .ui-slider .ui-slider-handle{';
			$tanawul_bakery_custom_css .='background-color: '.esc_html($tanawul_bakery_theme_color_first).';';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_first != false){
		$tanawul_bakery_custom_css .=' .contact-detail i, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, #we-offer p, .logo-text h1 a, a, .woocommerce-MyAccount-content a,#sidebox ul li a:hover,.text code, .logo-text h1 a, .logo-text p.site-title a{';
			$tanawul_bakery_custom_css .='color: '.esc_html($tanawul_bakery_theme_color_first).';';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_first != false){
		$tanawul_bakery_custom_css .='.readbutton span:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .post-link span:hover,.scrollup i{';
			$tanawul_bakery_custom_css .='border-color: '.esc_html($tanawul_bakery_theme_color_first).';';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_first != false){
		$tanawul_bakery_custom_css .='.site-footer ul li a:hover{';
			$tanawul_bakery_custom_css .='color: '.esc_html($tanawul_bakery_theme_color_first).'!important;';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_first != false){
		$tanawul_bakery_custom_css .='.woocommerce button.button:hover{';
			$tanawul_bakery_custom_css .='background-color: '.esc_html($tanawul_bakery_theme_color_first).'!important;';
		$tanawul_bakery_custom_css .='}';
	}

	/*-----------Theme color option-------------------*/
	$tanawul_bakery_theme_color_second = get_theme_mod('tanawul_bakery_theme_color_second');

	if($tanawul_bakery_theme_color_second != false){
		$tanawul_bakery_custom_css .='button:hover,button:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="submit"]:hover,input[type="submit"]:focus, .site-footer,.main-navigation li li a.focus, button:hover,#masthead,.comment-reply-link:hover,.page-numbers:hover, .prev.page-numbers:hover,.post-navigation .nav-next a:hover, .post-navigation .nav-previous a:hover,.tags p a:hover, #sidebox .widget_price_filter .price_slider_wrapper .ui-widget-content{';
			$tanawul_bakery_custom_css .='background-color: '.esc_html($tanawul_bakery_theme_color_second).';';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_second != false){
		$tanawul_bakery_custom_css .='#we-offer h3, #we-offer h4 a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .blogger h2 a, .post-link a, .main-navigation li li:focus > a,h2.woocommerce-loop-product__title,.woocommerce div.product .product_title, #slider .inner_carousel h2, .readbutton a,#slider .inner_carousel h2, h1, h2, h3, h4, h5, h6, .page .panel-content .entry-title, .page-title, body.page:not(.tanawul-bakery-front-page) .entry-title, .main-navigation li li:focus > a, .main-navigation li li:hover > a,.main-navigation ul ul li a,#slider .inner_carousel h1,#we-offer h2,#we-offer h3 a{';
			$tanawul_bakery_custom_css .='color: '.esc_html($tanawul_bakery_theme_color_second).';';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_second != false){
		$tanawul_bakery_custom_css .='.main-navigation ul ul,.post-link a, #sidebox .widget, .readbutton a, .post-link span, .readbutton span{';
			$tanawul_bakery_custom_css .='border-color: '.esc_html($tanawul_bakery_theme_color_second).';';
		$tanawul_bakery_custom_css .='}';
	}
	if($tanawul_bakery_theme_color_second != false){
		$tanawul_bakery_custom_css .='.main-navigation ul ul li:hover{';
			$tanawul_bakery_custom_css .='border-left-color: '.esc_html($tanawul_bakery_theme_color_second).';';
		$tanawul_bakery_custom_css .='}';
	}

	/*------------------ Width Layout -------------------*/
	$tanawul_bakery_theme_lay = get_theme_mod( 'tanawul_bakery_theme_options','Default');
    if($tanawul_bakery_theme_lay == 'Default'){
		$tanawul_bakery_custom_css .='body{';
			$tanawul_bakery_custom_css .='max-width: 100%;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='.page-template-custom-home-page .middle-header{';
			$tanawul_bakery_custom_css .='width: 97.3%';
		$tanawul_bakery_custom_css .='}';
	}else if($tanawul_bakery_theme_lay == 'Wide Layout'){
		$tanawul_bakery_custom_css .='body{';
			$tanawul_bakery_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='.page-template-custom-home-page .middle-header{';
			$tanawul_bakery_custom_css .='width: 97.7%';
		$tanawul_bakery_custom_css .='}';
	}else if($tanawul_bakery_theme_lay == 'Box Layout'){
		$tanawul_bakery_custom_css .='body{';
			$tanawul_bakery_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$tanawul_bakery_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$tanawul_bakery_slider_layout = get_theme_mod( 'tanawul_bakery_slider_opacity_color','0.6');
	if($tanawul_bakery_slider_layout == '0'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.1'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.1';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.2'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.2';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.3'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.3';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.4'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.4';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.5'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.5';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.6'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.6';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.7'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.7';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.8'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.8';
		$tanawul_bakery_custom_css .='}';
		}else if($tanawul_bakery_slider_layout == '0.9'){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='opacity:0.9';
		$tanawul_bakery_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/
	$tanawul_bakery_slider_layout = get_theme_mod( 'tanawul_bakery_slider_content_option','Left');
    if($tanawul_bakery_slider_layout == 'Left'){
		$tanawul_bakery_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$tanawul_bakery_custom_css .='text-align:left; left:15%; right:45%;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='
		@media screen and (max-width: 320px){
		.readbutton span{';
		$tanawul_bakery_custom_css .='padding:12px;';
		$tanawul_bakery_custom_css .='} }';
		$tanawul_bakery_custom_css .='
		@media screen and (max-width: 1024px){
		#slider .inner_carousel p{';
		$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
	}else if($tanawul_bakery_slider_layout == 'Center'){
		$tanawul_bakery_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$tanawul_bakery_custom_css .='text-align:center; left:20%; right:20%;';
		$tanawul_bakery_custom_css .='}';
	}else if($tanawul_bakery_slider_layout == 'Right'){
		$tanawul_bakery_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$tanawul_bakery_custom_css .='text-align:right; left:45%; right:15%;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='
		@media screen and (max-width: 1024px){
		#slider .inner_carousel p{';
		$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
		$tanawul_bakery_custom_css .='
		@media screen and (max-width: 320px){
		.readbutton span{';
		$tanawul_bakery_custom_css .='padding:12px;';
		$tanawul_bakery_custom_css .='} }';
	}

	// css
	$tanawul_bakery_show_header = get_theme_mod( 'tanawul_bakery_slider_arrows', false);
	if($tanawul_bakery_show_header == false){
		$tanawul_bakery_custom_css .='.page-template-home-custom #masthead{';
			$tanawul_bakery_custom_css .='position:static; background: #1a7e83; padding-bottom: 3em;';
		$tanawul_bakery_custom_css .='}';
	}

	/*------------------------------ Button Settings option-----------------------*/
	$tanawul_bakery_top_bottom_padding = get_theme_mod('tanawul_bakery_top_bottom_padding');
	$tanawul_bakery_left_right_padding = get_theme_mod('tanawul_bakery_left_right_padding');
	if($tanawul_bakery_top_bottom_padding != false || $tanawul_bakery_left_right_padding != false){
		$tanawul_bakery_custom_css .='.post-link a, #slider .readbutton a, .form-submit input[type="submit"]{';
			$tanawul_bakery_custom_css .='padding-top: '.esc_html($tanawul_bakery_top_bottom_padding).'px; padding-bottom: '.esc_html($tanawul_bakery_top_bottom_padding).'px; padding-left: '.esc_html($tanawul_bakery_left_right_padding).'px; padding-right: '.esc_html($tanawul_bakery_left_right_padding).'px; display:inline-block;';
		$tanawul_bakery_custom_css .='}';
	}

	$tanawul_bakery_border_radius = get_theme_mod('tanawul_bakery_border_radius');
		$tanawul_bakery_custom_css .='.post-link a,#slider .readbutton a, .form-submit input[type="submit"],.post-link span, .readbutton span{';
			$tanawul_bakery_custom_css .='border-radius: '.esc_html($tanawul_bakery_border_radius).'px;';
		$tanawul_bakery_custom_css .='}';

	/*---------------------------Blog Layout -------------------*/
	$tanawul_bakery_theme_lay = get_theme_mod( 'tanawul_bakery_blog_post_layout','Default');
    if($tanawul_bakery_theme_lay == 'Default'){
		$tanawul_bakery_custom_css .='.blogger{';
			$tanawul_bakery_custom_css .='';
		$tanawul_bakery_custom_css .='}';
	}else if($tanawul_bakery_theme_lay == 'Center'){
		$tanawul_bakery_custom_css .='.blogger, .blogger h2, .post-info, .text p, .blogger .post-link{';
			$tanawul_bakery_custom_css .='text-align:center;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='.post-info{';
			$tanawul_bakery_custom_css .='margin-top:10px;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='.blogger .post-link{';
			$tanawul_bakery_custom_css .='margin-top:25px;';
		$tanawul_bakery_custom_css .='}';
	}else if($tanawul_bakery_theme_lay == 'Image and Content'){
		$tanawul_bakery_custom_css .='.blogger, .blogger h2, .post-info, .text p, #our-services p{';
			$tanawul_bakery_custom_css .='text-align:Left;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='.blogger .post-link{';
			$tanawul_bakery_custom_css .='text-align:right;';
		$tanawul_bakery_custom_css .='}';
		$tanawul_bakery_custom_css .='.post-info span{';
			$tanawul_bakery_custom_css .='font-size:13px;';
		$tanawul_bakery_custom_css .='}';
	}

	/*--------- Preloader Color Option -------*/
	$tanawul_bakery_loader_color_setting = get_theme_mod('tanawul_bakery_loader_color_setting');

	if($tanawul_bakery_loader_color_setting != false){
		$tanawul_bakery_custom_css .=' .circle .inner{';
			$tanawul_bakery_custom_css .='border-color: '.esc_html($tanawul_bakery_loader_color_setting).';';
		$tanawul_bakery_custom_css .='} ';
	}

	$tanawul_bakery_loader_background_color = get_theme_mod('tanawul_bakery_loader_background_color');

	if($tanawul_bakery_loader_background_color != false){
		$tanawul_bakery_custom_css .=' #pre-loader{';
			$tanawul_bakery_custom_css .='background-color: '.esc_html($tanawul_bakery_loader_background_color).';';
		$tanawul_bakery_custom_css .='} ';
	}

	$tanawul_bakery_theme_lay = get_theme_mod( 'tanawul_bakery_preloader_types','Default');
    if($tanawul_bakery_theme_lay == 'Default'){
		$tanawul_bakery_custom_css .='{';
			$tanawul_bakery_custom_css .='';
		$tanawul_bakery_custom_css .='}';
	}elseif($tanawul_bakery_theme_lay == 'Circle'){
		$tanawul_bakery_custom_css .='.circle .inner{';
			$tanawul_bakery_custom_css .='width:unset;';
		$tanawul_bakery_custom_css .='}';
	}elseif($tanawul_bakery_theme_lay == 'Two Circle'){
		$tanawul_bakery_custom_css .='.circle .inner{';
			$tanawul_bakery_custom_css .='width:80%;
    border-right: 5px;';
		$tanawul_bakery_custom_css .='}';
	}

	// Slider Height 
	$tanawul_bakery_slider_height_option = get_theme_mod('tanawul_bakery_slider_height_option');
	if($tanawul_bakery_slider_height_option != false){
		$tanawul_bakery_custom_css .='#slider img{';
			$tanawul_bakery_custom_css .='height: '.esc_html($tanawul_bakery_slider_height_option).'px;';
		$tanawul_bakery_custom_css .='}';
	}

	// scroll to top setting
	$tanawul_bakery_scroll_border_radius = get_theme_mod('tanawul_bakery_scroll_border_radius');
	if($tanawul_bakery_scroll_border_radius != false){
		$tanawul_bakery_custom_css .='.scrollup i{';
			$tanawul_bakery_custom_css .='border-radius: '.esc_html($tanawul_bakery_scroll_border_radius).'px;';
		$tanawul_bakery_custom_css .='}';
	}

	$tanawul_bakery_scroll_top_fontsize = get_theme_mod('tanawul_bakery_scroll_top_fontsize');
	if($tanawul_bakery_scroll_top_fontsize != false){
		$tanawul_bakery_custom_css .='.scrollup i{';
			$tanawul_bakery_custom_css .='font-size: '.esc_html($tanawul_bakery_scroll_top_fontsize).'px;';
		$tanawul_bakery_custom_css .='}';
	}

	$tanawul_bakery_scroll_top_bottom_padding = get_theme_mod('tanawul_bakery_scroll_top_bottom_padding');
	$tanawul_bakery_scroll_left_right_padding = get_theme_mod('tanawul_bakery_scroll_left_right_padding');
	if($tanawul_bakery_scroll_top_bottom_padding != false || $tanawul_bakery_scroll_left_right_padding != false){
		$tanawul_bakery_custom_css .='.scrollup i{';
			$tanawul_bakery_custom_css .='padding-top: '.esc_html($tanawul_bakery_scroll_top_bottom_padding).'px; padding-bottom: '.esc_html($tanawul_bakery_scroll_top_bottom_padding).'px; padding-left: '.esc_html($tanawul_bakery_scroll_left_right_padding).'px; padding-right: '.esc_html($tanawul_bakery_scroll_left_right_padding).'px;';
		$tanawul_bakery_custom_css .='}';
	}

	// Responsive Media
	$tanawul_bakery_sidebar = get_theme_mod( 'tanawul_bakery_enable_disable_sidebar',true);
    if($tanawul_bakery_sidebar == true){
    	$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='#sidebox{';
			$tanawul_bakery_custom_css .='display:block;';
		$tanawul_bakery_custom_css .='} }';
	}else if($tanawul_bakery_sidebar == false){
		$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='#sidebox{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
	}

	$tanawul_bakery_stickyheader = get_theme_mod( 'tanawul_bakery_enable_disable_topbar', true);
	if($tanawul_bakery_stickyheader == true && get_theme_mod( 'tanawul_bakery_show_hide_topbar', true) == false){
    	$tanawul_bakery_custom_css .='.topbar{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} ';
	}
    if($tanawul_bakery_stickyheader == true){
    	$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='.topbar{';
			$tanawul_bakery_custom_css .='display:block;';
		$tanawul_bakery_custom_css .='} }';
	}else if($tanawul_bakery_stickyheader == false){
		$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='.topbar{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
	}

	$tanawul_bakery_sliderbutton = get_theme_mod( 'tanawul_bakery_enable_disable_slider', false);
	if($tanawul_bakery_sliderbutton == true && get_theme_mod( 'tanawul_bakery_slider_arrows', false) == false){
    	$tanawul_bakery_custom_css .='#slider{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} ';
	}
    if($tanawul_bakery_sliderbutton == true){
    	$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='#slider{';
			$tanawul_bakery_custom_css .='display:block;';
		$tanawul_bakery_custom_css .='} }';
	}else if($tanawul_bakery_sliderbutton == false){
		$tanawul_bakery_custom_css .='@media screen and (max-width:575px){';
		$tanawul_bakery_custom_css .='#slider{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
	}

	$tanawul_bakery_sliderbutton = get_theme_mod( 'tanawul_bakery_show_hide_slider_button', true);
	if($tanawul_bakery_sliderbutton == true && get_theme_mod( 'tanawul_bakery_slider_button', true) != true){
    	$tanawul_bakery_custom_css .='#slider .readbutton{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} ';
	}
    if($tanawul_bakery_sliderbutton == true){
    	$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='#slider .readbutton{';
			$tanawul_bakery_custom_css .='display:block;';
		$tanawul_bakery_custom_css .='} }';
	}else if($tanawul_bakery_sliderbutton == false){
		$tanawul_bakery_custom_css .='@media screen and (max-width:575px){';
		$tanawul_bakery_custom_css .='#slider .readbutton{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
	}

	$tanawul_bakery_sliderbutton = get_theme_mod( 'tanawul_bakery_enable_disable_scrolltop', true);
	if($tanawul_bakery_sliderbutton == true && get_theme_mod( 'tanawul_bakery_hide_show_scroll', true) != true){
    	$tanawul_bakery_custom_css .='.scrollup i{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} ';
	}
    if($tanawul_bakery_sliderbutton == true){
    	$tanawul_bakery_custom_css .='@media screen and (max-width:575px) {';
		$tanawul_bakery_custom_css .='.scrollup i{';
			$tanawul_bakery_custom_css .='display:block;';
		$tanawul_bakery_custom_css .='} }';
	}else if($tanawul_bakery_sliderbutton == false){
		$tanawul_bakery_custom_css .='@media screen and (max-width:575px){';
		$tanawul_bakery_custom_css .='.scrollup i{';
			$tanawul_bakery_custom_css .='display:none;';
		$tanawul_bakery_custom_css .='} }';
	}

	// Copyright top-bottom padding setting 
	$tanawul_bakery_copyright_top_bottom_padding = get_theme_mod('tanawul_bakery_copyright_top_bottom_padding');
	if($tanawul_bakery_copyright_top_bottom_padding != false){
		$tanawul_bakery_custom_css .='.copyright{';
			$tanawul_bakery_custom_css .='padding-top: '.esc_html($tanawul_bakery_copyright_top_bottom_padding).'px; padding-bottom: '.esc_html($tanawul_bakery_copyright_top_bottom_padding).'px;';
		$tanawul_bakery_custom_css .='}';
	}




