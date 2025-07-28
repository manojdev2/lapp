 <?php

/**
 * Igual Theme Options CSS
 */

require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/class.options-style.php' );
$igual_styles = new Igual_Theme_Styles;

ob_start();

echo "\n/* Igual Theme Options CSS */";

echo "\n/* General Styles */\n";

//site width
$site_width = $igual_styles->igual_dimension_settings( 'site-width', 'width' );
if( $site_width ){
	echo '@media (min-width: 1400px){
		.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
			max-width: '. esc_attr( $site_width ) .';
		}
	}';
}

//primary color
$primary_color = $igual_styles->igual_get_option( 'primary-color' );
$rgb = $igual_styles->igual_hex2rgba( $primary_color, 'none' );

/*
 * Theme Color -> $primary-color
 * Secondary Color -> $secondary_color
 * Theme RGBA -> $rgb example -> echo 'body{ background: rgba('. esc_attr( $rgb ) .', 0.5); }';
 * Theme Secondary RGBA -> $rgb example -> echo 'body{ background: rgba('. esc_attr( $secondary_rgb ) .', 0.5); }';
 */

if( $primary_color ){
	echo '.primary-color, .theme-color, a:focus, a:hover, a:active {
		color: '. esc_attr( $primary_color ) .';
	}';
	echo '.primary-bg, .theme-bg {
		background-color: '. esc_attr( $primary_color ) .';
	}';
	echo '.service-style-classic-pro .post-details-outer:before {
		background: rgba('. esc_attr( $rgb ) .', 0.14);
	}';
	echo '.border-shape-top:before, .border-shape-top-left:before {
		background: linear-gradient(to bottom, '. esc_attr( $primary_color ) .' -24%, rgb(58 123 213 / 0%));
	}';
	echo '.border-shape-top:after, .border-shape-top-left:after {
		background: linear-gradient(to top, '. esc_attr( $primary_color ) .' 0%, rgb(58 123 213 / 0%));
	}';	
	echo '.section-title-wrapper .title-wrap > *.sub-title:before,
	.insta-footer-wrap .sub-title:before {
		background: linear-gradient(to right, '. esc_attr( $primary_color ) .', rgb(184 151 128 / 6%));
	}';
	echo '.section-title-wrapper .title-wrap > *.sub-title:after,
	.insta-footer-wrap .sub-title:after {
		background: linear-gradient(to left, '. esc_attr( $primary_color ) .', rgb(184 151 128 / 6%));
	}';
	echo '.footer-widget.contact-widget:before {
		background: linear-gradient(to right, '. esc_attr( $primary_color ) .' 0%, rgb(184 151 128 / 6%));
	}';
	echo '.team-wrapper.team-style-default .team-inner:after,
	.testimonial-style-default .testimonial-inner:before {
		background: linear-gradient(to bottom, rgba('. esc_attr( $rgb ) .', 0.30), rgb(58 123 213 / 0%));
	}';
	echo '.service-style-default .service-inner:before {
		background: linear-gradient(to left, rgba('. esc_attr( $rgb ) .', 0.38), rgb(58 123 213 / 0%));
	}';
	echo '.service-style-default .service-inner:hover:before {
		background: linear-gradient(to left, '. esc_attr( $primary_color ) .', rgb(58 123 213 / 0%));
	}';
	echo '.section-title-wrapper span.elementor-divider-separator {
		border-image: linear-gradient(to right, '. esc_attr( $primary_color ) .', rgb(58 123 213 / 0%));
    	border-image-slice: 1;
	}';
	echo '.rtl .section-title-wrapper span.elementor-divider-separator {
		border-image: linear-gradient(to left, '. esc_attr( $primary_color ) .', rgb(58 123 213 / 0%));
    	border-image-slice: 1;
	}';
	echo '.page-title-wrap:before {
		background: linear-gradient(to bottom, rgba('. esc_attr( $rgb ) .', 0.35), rgb(255 255 255 / 0%));
		background: -webkit-linear-gradient(to bottom, rgba('. esc_attr( $rgb ) .', 0.35), rgb(255 255 255 / 0%));
	}';
	echo '.page-title-wrap:after {
		background: linear-gradient(to top, rgba('. esc_attr( $rgb ) .', 0.61), rgb(255 255 255 / 0%));
		background: -webkit-linear-gradient(to top, rgba('. esc_attr( $rgb ) .', 0.61), rgb(255 255 255 / 0%));
	}';
	echo '.elementor-widget-container.feature-box-wrapper.feature-box-classic:before {
		background: linear-gradient(to bottom, rgba('. esc_attr( $rgb ) .', 0.31), rgb(184 151 128 / 4%));
		background: -webkit-linear-gradient(to bottom, rgba('. esc_attr( $rgb ) .', 0.31), rgb(184 151 128 / 4%));
	}';
	echo 'aside.footer-widget-2 h5:before, .widget .widgettitle:before,	.widget .widget-title:before, .widget-area-right .wp-block-group__inner-container h1:before, .widget-area-right .wp-block-group__inner-container h2:before, .widget-area-right .wp-block-group__inner-container h3:before, .widget-area-right .wp-block-group__inner-container h4:before, .widget-area-right .wp-block-group__inner-container h5:before, .widget-area-right .wp-block-group__inner-container h6:before, .widget-area-left .widget .widget-title:before {
		background: linear-gradient(to right, '. esc_attr( $primary_color ) .', rgb(184 151 128 / 0%));
	}';
	
	echo '.calendar_wrap th, tfoot td, ul.nav.wp-menu > li > a:before,.elementor-widget-container.feature-box-wrapper.feature-box-classic:after,  ul[id^="nv-primary-navigation"] li.button.button-primary > a, .menu li.button.button-primary > a, span.animate-bubble-box:after, span.animate-bubble-box:before, .owl-dots button.owl-dot, .team-style-classic-pro .team-social-wrap ul.social-icons > li > a,
.header-navbar.navbar .wp-menu li > ul.sub-menu li a:before,.pagination-single-inner > h6 > a span.arrow, ::selection,.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot,.content-widgets .widget .menu-service-sidebar-menu-container ul > li.current-menu-item > a, .content-widgets .widget .menu-service-sidebar-menu-container ul > li > a:after, .igual-masonry .top-meta-wrap, .comments-pagination.pagination .page-numbers.current, .blog-wrapper.blog-style-default .blog-inner .post-date a, .portfolio-meta ul.nav.social-icons > li > a:hover, span.cea-popup-modal-dismiss.ti-close, blockquote:after,
.wp-block-quote.is-large:after, .wp-block-quote.is-style-large:after, .wp-block-quote.is-style-large:not(.is-style-plain):after,.wp-block-quote.has-text-align-right:after, .wp-block-quote:after, p.quote-author::before, nav.post-nav-links .post-page-numbers.current, blockquote cite::before, .single-post .comments-wrapper.section-inner input.submit,
.page .comments-wrapper.section-inner input.submit, .widget-area-right .widget p.wp-block-tag-cloud a.tag-cloud-link:hover, .widget .tagcloud > a:hover, .widget .tagcloud > a:focus, .widget .tagcloud > a:active, .section-title-wrapper.title-theme .title-wrap > *.sub-title:after, .single .row.team, .team-style-default .team-inner .post-overlay-items > .team-social-wrap, .blog-wrapper.blog-style-default .blog-inner .post-date a, .cea-tab-elementor-widget.tab-style-2.cea-vertical-tab a.nav-item.nav-link:before, .portfolio-single .portfolio-video.post-video-wrap .video-play-icon, .portfolio-wrapper.portfolio-style-default .isotope-filter ul.nav li a:before, .isotope-filter ul.nav.m-auto.d-block li.active a, .call-us-team a.cea-button-link:hover, .call-us-team a.cea-button-link span.cea-button-num, .header-navbar .cea-button-link.elementor-size-sm.elementor-button, .cea-button-link.elementor-size-sm:hover .cea-button-icon, .header-sticky .header-navbar .cea-button-link.elementor-size-sm:hover .cea-button-icon, blockquote:before,
.wp-block-quote.is-large:before, .wp-block-quote.is-style-large:before, .wp-block-quote.is-style-large:not(.is-style-plain):before,.wp-block-quote.has-text-align-right:before, .wp-block-quote:before, .single-post .top-meta-wrap ul.nav.post-meta li.post-date a, .single-post .top-meta-wrap:first-child ul.nav.post-meta li.post-date a, .content-widgets .widget .menu-service-sidebar-menu-container ul > li > a:hover, .single-post ul.nav.post-meta > li.post-category:before, .custom-post-nav .prev-nav-link > a:hover > i, .custom-post-nav .next-nav-link > a:hover > i, .team-wrapper.team-style-default .team-inner .social-icons > li > a, .elementor-widget-ceaposts .blog-style-classic-pro .blog-inner .post-date a, .widget-area-left .contact-widget-info > p > span.bi,
.widget-area-right .contact-widget-info > p > span.bi, .row.portfolio-details .col-sm-4 > .portfolio-meta span.portfolio-meta-icon, .portfolio-style-default .portfolio-inner .post-thumb:before, .portfolio-single .portfolio-sub-title, .testimonial-wrapper.testimonial-style-default .owl-item .testimonial-inner:hover:before, .timeline > li > .timeline-sep-title:before, .feature-box-style-5 .feature-box-wrapper .fbox-number, .header-navbar a.h-phone:before {
		background-color: '. esc_attr( $primary_color ) .';
	}';
	echo '.theme-color-bg, .icon-theme-color-bg, .flip-box-wrapper:hover .icon-theme-hcolor-bg, .contact-info-style-classic-pro .contact-info-title, .contact-info-wrapper.contact-info-style-classic:before, .testimonial-wrapper.testimonial-style-modern .testimonial-inner:after, .isotope-filter ul.nav li.active a:after, .isotope-filter ul.nav li a:after, .blog-wrapper.blog-style-modern .blog-inner .top-meta .post-category, .blog-wrapper .post-overlay-items .post-date a, .event-style-classic .top-meta .post-date, .blog-layouts-wrapper .post-overlay-items .post-date a, .portfolio-content-wrap .portfolio-title h3, .custom-post-nav  a,
	.service-style-classic .entry-title:after,.service-style-classic .entry-title:before,.team-style-default .team-inner .post-overlay-items > .team-social-wrap > ul,
.team-style-default .team-inner:hover .post-overlay-items > .team-social-wrap,.back-to-top:after,
.portfolio-style-classic .post-thumb.post-overlay-active:after, .elementor-widget-container.feature-box-wrapper.feature-box-classic:after, h2.we-stand__top-title, span.zozo-product-favoured {
		background-color: '. esc_attr( $primary_color ) .' !important;
	}';
	echo '.full-search-wrapper .search-form .input-group .btn:hover, .testimonial-style-list .testimonial-inner:after,.team-details-icon,ul.nav.post-meta > li span,
.comment-metadata time, .comments-wrap span:before, .comment-body .reply a.comment-reply-link, .blog .igual-masonry .post-meta .post-more a, .igual-masonry .bottom-meta-wrap .post-meta .post-more a .widget.widget_nav_menu li a:before, .igual-masonry > article .top-meta-wrap a, h2.entry-title a:hover, .woocommerce-message::before, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce div.product p.price, .woocommerce div.product span.price,ul.pricing-features-list.list-group li:before, .doc-icon, .sidebar-broucher .icon-box a:hover, p.quote-author, .feature-box-wrapper .fbox-content a:hover, ul.nav.post-meta > li.post-tag > a:hover, blockquote cite, .wp-block-quote cite, .wp-block-quote footer, .bottom-meta-wrap ul.nav.post-meta > li.post-date a:hover,
.single-post .top-meta-wrap ul.nav.post-meta li a:hover, .cus-img-menu .menu-item .widget .wp-block-image:hover figcaption a, .single-post blockquote cite, .single-post blockquote cite a, .content-widgets-wrapper .widget_categories ul li a:before, .content-widgets-wrapper .widget_archive ul li a:before, .content-widgets-wrapper .wp-block-categories li a:before, footer button.input-group-addon.zozo-mc.btn.btn-default, .cus-contact a:first-child, .pagination-single-inner > h6 > a:hover span.title, .igual-masonry .bottom-meta-wrap .post-meta li.post-share-wrap .social-share a:hover i, .post-share-wrap ul.social-share > li > a:hover > i, .team-style-classic-pro .team-designation, .pricing-style-classic.pricing-table-wrapper ul > li:after, .igual-masonry .bottom-meta-wrap .post-meta .post-more a, .widget-content-bx a i, .elementor-widget-ceaposts .blog-inner .read-more:hover:after, .blog .igual-masonry .post-meta .post-more a:hover:after, .igual-masonry .bottom-meta-wrap .post-meta .post-more a:hover:after, .widget-area-left .contact-widget-info > p a:hover, .widget-area-right .contact-widget-info > p a:hover, .testimonial-style-default .testimonial-inner::after, i.breadcrumb-delimiter, .sticky-head.header-sticky .header-navbar a.h-phone:hover {
		color: '. esc_attr( $primary_color ) .';
	}';
	echo '.widget.widget_nav_menu li a:before, .igual-masonry .bottom-meta-wrap .post-meta li.post-share-wrap .social-share a:hover, .single-post ul.social-share > li > a:hover, .post-share-wrap ul.social-share > li > a {
			color: '. esc_attr( $primary_color ) .' !important;
		}';
	echo 'blockquote,
.wp-block-quote.is-large, .wp-block-quote.is-style-large, .wp-block-quote.is-style-large:not(.is-style-plain),.wp-block-quote.has-text-align-right, .wp-block-quote,.woocommerce-message,
.woocommerce #content div.product .woocommerce-tabs ul.tabs, .woocommerce div.product .woocommerce-tabs ul.tabs, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs, .woocommerce-page div.product .woocommerce-tabs ul.tabs, .contact-form-wrapper span.wpcf7-form-control-wrap input:focus, .contact-form-wrapper span.wpcf7-form-control-wrap select:focus, .contact-form-wrapper span.wpcf7-form-control-wrap textarea:focus, .single-post .comments-wrapper.section-inner input:focus, .single-post .comments-wrapper.section-inner textarea:focus, .modal-popup-body input.wpcf7-form-control:focus, 
.modal-popup-body textarea.wpcf7-form-control:focus, .wp-block-search__input:focus, footer .mailchimp-wrapper .input-group input#zozo-mc-email:focus, .single-cea-testimonial .testimonial-info img, .cus-float-img .float-parallax img, .comments-wrapper.section-inner input:focus, .comments-wrapper.section-inner textarea:focus, ul.nav.pagination.post-pagination > li > a, ul.nav.pagination.post-pagination > li > span, .comments-pagination.pagination .page-numbers, .team-wrapper.team-style-default .team-inner > .post-thumb img.img-fluid.rounded-circle, .testimonial-wrapper.testimonial-style-list .post-thumb img, .timeline > li:hover .timeline-panel, nav.post-nav-links .post-page-numbers {
		border-color: '. esc_attr( $primary_color ) .';
	}';	
	echo '.testimonial-wrapper.testimonial-style-default .owl-item .testimonial-inner,
	.full-search-wrapper form.form-inline.search-form .form-control:focus {
		border-bottom-color: '. esc_attr( $primary_color ) .';
	}';	
	echo '.timeline:before {
		border-right-color: '. esc_attr( $primary_color ) .';
	}';	
	echo '.cea-counter-wrapper.cea-counter-style-modern .counter-value > *,
	.pricing-style-classic .pricing-table-info > *.price-text span {
		-webkit-text-stroke: 1px '. esc_attr( $primary_color ) .';
	}';		
}

//secondary color
$secondary_color = $igual_styles->igual_get_option( 'secondary-color' );
if( $secondary_color ){
	echo '.secondary-color {
		color: '. esc_attr( $secondary_color ) .';
	}';
	echo '.secondary-bg {
		background-color: '. esc_attr( $secondary_color ) .';
	}';
	echo '.close:hover,.team-style-classic-pro .team-social-wrap ul.social-icons > li > a:hover,
header a.btn.btn-primary:hover, .search-form .input-group .btn:hover, .full-search-wrapper {
		background-color: '. esc_attr( $secondary_color ) .';
	}';
	echo '.custom-post-nav a:hover {
		background-color: '. esc_attr( $secondary_color ) .' !important;
	}';	
}


echo '.igual-page-header::before {
     background-image: url('. esc_url( get_template_directory_uri() . '/assets/images/inner-bannerwave.png' ) .'); 
	 
}';
echo '.single .row.team::before {
	background-image: url('. esc_url( get_template_directory_uri() . '/assets/images/lawyer-ties.png' ) .'); 
	
}';

echo '.cus-testimonial-page .testimonial-wrapper.testimonial-style-list .testimonial-inner .post-excerpt::before {
	background-image: url('. esc_url( get_template_directory_uri() . '/assets/images/left-quote-1.png' ) .'); 
	
}';
//body background if boxed
$igual_styles->igual_bg_settings( 'site-bg', 'body' );

//button color keys -> fore, bg, border, hfore, hbg, hborder
echo '.btn, button, .back-to-top,.header-navbar a.btn.btn-primary, .widget_search .search-form .input-group .btn,button.wp-block-search__button,.btn.bordered:hover,.close,
button.wp-block-search__button,ul.nav.pagination.post-pagination > li > span,.comment-respond input[type="submit"],.wp-block-button__link,input[type="submit"],.button.button-primary, input[type=button], input[type="submit"], header .mini-cart-dropdown ul.cart-dropdown-menu > li.mini-view-cart a, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,a.zozo-woo-compare-ajax.zozo-btn, .mini-view-wishlist a, .mini-view-cart a,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button, .woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button, a.zozo-compare-close, a.zozo-sticky-cart-close, a.zozo-sticky-wishlist-close  {';
	$igual_styles->igual_button_color( 'button-color', 'fore' );
	$igual_styles->igual_button_color( 'button-color', 'bg' );
	$igual_styles->igual_button_color( 'button-color', 'border' );
echo '}';
echo '.btn:hover, button:hover, .post-category a:hover, .back-to-top:hover, .header-navbar a.btn.btn-primary:hover, .widget_search .search-form .input-group .btn:hover, button.wp-block-search__button:hover, .btn:focus, button:focus, .post-category a:focus, .back-to-top:focus,.header-navbar a.btn.btn-primary:focus, .widget_search .search-form .input-group .btn:focus, button.wp-block-search__button:focus, .btn:active, button:active, .post-category a:active, .back-to-top:active,.header-navbar a.btn.btn-primary:active, .widget_search .search-form .input-group .btn:active, button.wp-block-search__button:active,.contact-form-wrapper input.wpcf7-form-control.wpcf7-submit:hover, input[type="submit"]:hover, header .mini-cart-dropdown ul.cart-dropdown-menu > li.mini-view-cart a:hover,nav.post-nav-links .post-page-numbers:hover, .wp-block-button__link:hover,.wp-block-button.is-style-outline a.wp-block-button__link:hover, .pagination-single-inner > h6 > a span.arrow:hover,ul.nav.pagination.post-pagination > li > a:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,a.zozo-woo-compare-ajax.zozo-btn:hover, .mini-view-wishlist a:hover, .mini-view-cart a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover, .woocommerce-page .woocommerce-error .button:hover, .woocommerce-page .woocommerce-info .button:hover, .woocommerce-page .woocommerce-message .button:hover, a.zozo-compare-close:hover, a.zozo-sticky-cart-close:hover, a.zozo-sticky-wishlist-close:hover {';
	$igual_styles->igual_button_color( 'button-color', 'hfore' );
	$igual_styles->igual_button_color( 'button-color', 'hbg' ) ;
	$igual_styles->igual_button_color( 'button-color', 'hborder' );
echo '}';

//site link color
$igual_styles->igual_link_color( 'link-color', 'regular', '.header-topbar a' );
$igual_styles->igual_link_color( 'link-color', 'hover', '.header-topbar a:hover' );
$igual_styles->igual_link_color( 'link-color', 'active', '.header-topbar a:active, .header-topbar a:focus' );

//site padding
$igual_styles->igual_padding_settings( 'site-padding', '.igual-content-wrap' );

//mobile header style
$mobilebar_from = $igual_styles->igual_get_option( 'mobilebar-responsive' );
$mobilebar_from = $mobilebar_from ? absint( $mobilebar_from ) : 767;
echo '@media only screen and ( max-width: '. esc_attr( $mobilebar_from ) .'px ) {';
	echo '.header-mobilebar { display: flex; }';
	echo '.site-header { display: none; }';
echo '}';
echo '@media only screen and ( min-width: '. esc_attr( $mobilebar_from + 1 ) .'px ) {';
	echo '.site-header { display: block; }';
	echo '.header-mobilebar { display: none; }';
echo '}';

//page loader
$page_loader = $igual_styles->igual_image_settings('page_loader');
if( isset( $page_loader['url'] ) && !empty( $page_loader['url'] ) ){
	echo '.page-loader { background-image: url('. esc_url( $page_loader['url']  ) .'); }';
}

//body typo styles
$igual_styles->igual_typo_settings( 'content-typography', 'body' );

//lead typo styles
$igual_styles->igual_typo_settings( 'lead-typography', '.lead' );

//h1 typo styles
$igual_styles->igual_typo_settings( 'h1-typography', 'h1, .h1' );

//h2 typo styles
$igual_styles->igual_typo_settings( 'h2-typography', 'h2, .h2' );

//h3 typo styles
$igual_styles->igual_typo_settings( 'h3-typography', 'h3, .h3' );

//h4 typo styles
$igual_styles->igual_typo_settings( 'h4-typography', 'h4, .h4' );

//h5 typo styles
$igual_styles->igual_typo_settings( 'h5-typography', 'h5, .h5' );

//h6 typo styles
$igual_styles->igual_typo_settings( 'h6-typography', 'h6, .h6' );

//header typo styles & link color
$igual_styles->igual_typo_settings( 'header-typography', '.site-header' );
$igual_styles->igual_link_color( 'header-links-color', 'regular', '.site-header a' );
$igual_styles->igual_link_color( 'header-links-color', 'hover', '.site-header a:hover' );
$igual_styles->igual_link_color( 'header-links-color', 'active', '.site-header a:active' );
$igual_styles->igual_bg_settings( 'header-background', '.site-header' );
$igual_styles->igual_padding_settings( 'header-padding', '.site-header' );
$igual_styles->igual_margin_settings( 'header-margin', '.site-header' );
$igual_styles->igual_border_settings( 'header-border', '.site-header' );

//dropdown style
$igual_styles->igual_bg_settings( 'dropdown-background', '.primary-menu .menu-item-has-children ul.sub-menu' );
$igual_styles->igual_link_color( 'dropdown-links-color', 'regular', '.primary-menu .menu-item-has-children ul.sub-menu li a' );
$igual_styles->igual_link_color( 'dropdown-links-color', 'hover', '.primary-menu .menu-item-has-children ul.sub-menu li a:hover' );
$igual_styles->igual_link_color( 'dropdown-links-color', 'active', '.primary-menu .menu-item-has-children ul.sub-menu li a:active, .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-item > a,
.primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-ancestor.current-menu-item > a, ul.wp-menu ul.sub-menu li.menu-item.current-menu-ancestor.menu-item-has-children > a' );



//dropdown on sticky style
$igual_styles->igual_bg_settings( 'dropdown-sticky-background', '.sticky-head.header-sticky .primary-menu .menu-item-has-children ul.sub-menu li' );
$igual_styles->igual_link_color( 'dropdown-sticky-links-color', 'regular', '.sticky-head.header-sticky .primary-menu .menu-item-has-children ul.sub-menu li a' );
$igual_styles->igual_link_color( 'dropdown-sticky-links-color', 'hover', '.sticky-head.header-sticky .primary-menu .menu-item-has-children ul.sub-menu li a:hover' );
$igual_styles->igual_link_color( 'dropdown-sticky-links-color', 'active', '.sticky-head.header-sticky .primary-menu .menu-item-has-children ul.sub-menu li a:active, .sticky-head.header-sticky .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-item > a, .sticky-head.header-sticky .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-ancestor.current-menu-item > a,.sticky-head.header-sticky ul.wp-menu ul.sub-menu li.menu-item.current-menu-ancestor.menu-item-has-children > a' );

//header topbar typo styles
$igual_styles->igual_typo_settings( 'header-topbar-typography', '.header-topbar' );

//header topbar styles & link color
$topbar_height = $igual_styles->igual_get_option('header-topbar-height');
if( !empty( $topbar_height ) && isset( $topbar_height['height'] ) && !empty( $topbar_height['height'] ) ){
	echo '.header-topbar {';
		echo 'line-height: '. esc_attr( $topbar_height['height'] ) .'px;';
	echo '}';
}

$topbar_sticky_height = $igual_styles->igual_get_option('header-topbar-sticky-height');
if( !empty( $topbar_sticky_height ) && isset( $topbar_sticky_height['height'] ) && !empty( $topbar_sticky_height['height'] ) ){
	echo '.header-sticky .header-topbar {';
		echo 'line-height: '. esc_attr( $topbar_sticky_height['height'] ) .'px;';
	echo '}';
}

$igual_styles->igual_bg_settings( 'header-topbar-background', '.header-topbar' );
$igual_styles->igual_padding_settings( 'header-topbar-padding', '.header-topbar' );
$igual_styles->igual_margin_settings( 'header-topbar-margin', '.header-topbar' );
$igual_styles->igual_border_settings( 'header-topbar-border', '.header-topbar' );
$igual_styles->igual_link_color( 'header-topbar-links-color', 'regular', '.header-topbar a' );
$igual_styles->igual_link_color( 'header-topbar-links-color', 'hover', '.header-topbar a:hover' );
$igual_styles->igual_link_color( 'header-topbar-links-color', 'active', '.header-topbar a:active, .header-topbar ul.wp-menu > li.current-menu-item > a,.header-topbar ul.nav.wp-menu > li.menu-item-has-children.current_page_parent > a, .header-topbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a' );

//topbar on sticky style
$igual_styles->igual_bg_settings( 'header-topbar-sticky-background', '.sticky-head.header-sticky .header-topbar' );
$igual_styles->igual_link_color( 'header-topbar-sticky-links-color', 'regular', '.sticky-head.header-sticky .header-topbar a' );
$igual_styles->igual_link_color( 'header-topbar-sticky-links-color', 'hover', '.sticky-head.header-sticky .header-topbar a:hover' );
$igual_styles->igual_link_color( 'header-topbar-sticky-links-color', 'active', '.sticky-head.header-sticky .header-topbar a:active, .sticky-head.header-sticky .header-topbar ul.wp-menu > li.current-menu-item > a, .sticky-head.header-sticky .header-topbar ul.nav.wp-menu > li.menu-item-has-children.current_page_parent > a,.sticky-head.header-sticky .header-topbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a'  );

//header logobar typo styles
$igual_styles->igual_typo_settings( 'header-logobar-typography', '.header-logobar' );

//header logobar styles & link color
$logobar_height = $igual_styles->igual_get_option('header-logobar-height');
if( !empty( $logobar_height ) && isset( $logobar_height['height'] ) && !empty( $logobar_height['height'] ) ){
	echo '.header-logobar {';
		echo 'line-height: '. esc_attr( $logobar_height['height'] ) .'px;';
	echo '}';
}

$logobar_sticky_height = $igual_styles->igual_get_option('header-logobar-sticky-height');
if( !empty( $logobar_sticky_height ) && isset( $logobar_sticky_height['height'] ) && !empty( $logobar_sticky_height['height'] ) ){
	echo '.header-sticky .header-logobar {';
		echo 'line-height: '. esc_attr( $logobar_sticky_height['height'] ) .'px;';
	echo '}';
}

$igual_styles->igual_bg_settings( 'header-logobar-background', '.header-logobar' );
$igual_styles->igual_padding_settings( 'header-logobar-padding', '.header-logobar' );
$igual_styles->igual_margin_settings( 'header-logobar-margin', '.header-logobar' );
$igual_styles->igual_border_settings( 'header-logobar-border', '.header-logobar' ); 
$igual_styles->igual_link_color( 'header-logobar-links-color', 'regular', '.header-logobar a' );
$igual_styles->igual_link_color( 'header-logobar-links-color', 'hover', '.header-logobar a:hover' );
$igual_styles->igual_link_color( 'header-logobar-links-color', 'active', '.header-logobar a:active, .header-logobar ul.wp-menu > li.current-menu-item > a,.header-logobar ul.nav.wp-menu > li.menu-item-has-children.current_page_parent > a, .header-logobar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a' );

//logobar on sticky style
$igual_styles->igual_bg_settings( 'header-logobar-sticky-background', '.sticky-head.header-sticky .header-logobar' );
$igual_styles->igual_link_color( 'header-logobar-sticky-links-color', 'regular', '.sticky-head.header-sticky .header-logobar a' );
$igual_styles->igual_link_color( 'header-logobar-sticky-links-color', 'hover', '.sticky-head.header-sticky .header-logobar a:hover' );
$igual_styles->igual_link_color( 'header-logobar-sticky-links-color', 'active', '.sticky-head.header-sticky .header-logobar a:active, .sticky-head.header-sticky .header-logobar ul.wp-menu > li.current-menu-item > a, .sticky-head.header-sticky .header-logobar ul.nav.wp-menu > li.menu-item-has-children.current_page_parent > a,.sticky-head.header-sticky .header-logobar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a' );

//header navbar typo styles
$igual_styles->igual_typo_settings( 'header-navbar-typography', '.header-navbar' );

//header navbar styles & link color
$navbar_height = $igual_styles->igual_get_option('header-navbar-height');
if( !empty( $navbar_height ) && isset( $navbar_height['height'] ) && !empty( $navbar_height['height'] ) ){
	echo '.header-navbar {';
		echo 'line-height: '. esc_attr( $navbar_height['height'] ) .'px;';
	echo '}';
}

$navbar_sticky_height = $igual_styles->igual_get_option('header-navbar-sticky-height');
if( !empty( $navbar_sticky_height ) && isset( $navbar_sticky_height['height'] ) && !empty( $navbar_sticky_height['height'] ) ){
	echo '.header-sticky .header-navbar {';
		echo 'line-height: '. esc_attr( $navbar_sticky_height['height'] ) .'px;';
	echo '}';
}

$igual_styles->igual_bg_settings( 'header-navbar-background', '.header-navbar' );
$igual_styles->igual_padding_settings( 'header-navbar-padding', '.header-navbar' );
$igual_styles->igual_margin_settings( 'header-navbar-margin', '.header-navbar' );
$igual_styles->igual_border_settings( 'header-navbar-border', '.header-navbar' );
$igual_styles->igual_link_color( 'header-navbar-links-color', 'regular', '.header-navbar a' );
$igual_styles->igual_link_color( 'header-navbar-links-color', 'hover', '.header-navbar a:hover' );
$igual_styles->igual_link_color( 'header-navbar-links-color', 'active', '.header-navbar a:active, .header-navbar ul.wp-menu > li.current-menu-item > a, .header-navbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a' );

//navbar on sticky style
$igual_styles->igual_bg_settings( 'header-navbar-sticky-background', '.sticky-head.header-sticky .header-navbar' );
$igual_styles->igual_link_color( 'header-navbar-sticky-links-color', 'regular', '.sticky-head.header-sticky .header-navbar a' );
$igual_styles->igual_link_color( 'header-navbar-sticky-links-color', 'hover', '.sticky-head.header-sticky .header-navbar a:hover' );
$igual_styles->igual_link_color( 'header-navbar-sticky-links-color', 'active', '.sticky-head.header-sticky .header-navbar a:active, .sticky-head.header-sticky .header-navbar ul.wp-menu > li.current-menu-item > a, .sticky-head.header-sticky .header-navbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a, .sticky-head.header-sticky .header-navbar a.active' );

//logo styles
$site_logo_width = $igual_styles->igual_get_option('site-logo-width');
if( !empty( $site_logo_width ) && isset( $site_logo_width['width'] ) && !empty( $site_logo_width['width'] ) ){
	echo 'img.site-logo { max-width: '. esc_attr( $site_logo_width['width'] ) .'px; }';
}
$sticky_logo_width = $igual_styles->igual_get_option('sticky-logo-width');
if( !empty( $sticky_logo_width ) && isset( $sticky_logo_width['width'] ) && !empty( $sticky_logo_width['width'] ) ){
	echo 'img.sticky-logo { max-width: '. esc_attr( $sticky_logo_width['width'] ) .'px; }';
}
$mobile_logo_width = $igual_styles->igual_get_option('mobile-logo-width');
if( !empty( $mobile_logo_width ) && isset( $mobile_logo_width['width'] ) && !empty( $mobile_logo_width['width'] ) ){
	echo 'img.mobile-logo { max-width: '. esc_attr( $mobile_logo_width['width'] ) .'px; }';
}


//blog page title settings
$igual_styles->igual_color( 'blog-title-color', '.blog .page-title-wrap .page-title, .blog .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'blog-title-desc-color', '.blog .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'blog-title-link-color', 'regular', '.blog .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'blog-title-link-color', 'hover', '.blog .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'blog-title-link-color', 'active', '.blog .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'blog-title-bg', '.blog .igual-page-header' );
$igual_styles->igual_padding_settings( 'blog-title-padding', '.blog .page-title-wrap' );

//archive page title settings
$igual_styles->igual_color( 'archive-title-color', '.archive .page-title-wrap .page-title, .archive .page-title-wrap .breadcrumb li, .search .page-title-wrap .page-title, .search .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'archive-title-desc-color', '.archive .page-title-wrap .page-subtitle, .search .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'archive-title-link-color', 'regular', '.archive .page-title-wrap .breadcrumb a, .search .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'archive-title-link-color', 'hover', '.archive .page-title-wrap .breadcrumb a:hover, .search .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'archive-title-link-color', 'active', '.archive .page-title-wrap .breadcrumb a:active, .search .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'archive-title-bg', '.archive .igual-page-header, .search .igual-page-header' );
$igual_styles->igual_padding_settings( 'archive-title-padding', '.archive .page-title-wrap, .search .page-title-wrap' );

//single post page title settings
$igual_styles->igual_color( 'single-title-color', '.single-post .page-title-wrap .page-title, .single-post .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'single-title-desc-color', '.single-post .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'single-title-link-color', 'regular', '.single-post .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'single-title-link-color', 'hover', '.single-post .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'single-title-link-color', 'active', '.single-post .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'single-title-bg', '.single-post .igual-page-header' );
$igual_styles->igual_padding_settings( 'single-title-padding', '.single-post .page-title-wrap' );

//page title settings
$igual_styles->igual_color( 'page-title-color', '.page .page-title-wrap .page-title, .page .page-title-wrap .breadcrumb li, .error404 .page-title-wrap .page-title, .error404 .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'page-title-desc-color', '.page .page-title-wrap .page-subtitle, .error404 .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'page-title-link-color', 'regular', '.page .page-title-wrap .breadcrumb a, .error404 .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'page-title-link-color', 'hover', '.page .page-title-wrap .breadcrumb a:hover, .error404 .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'page-title-link-color', 'active', '.page .page-title-wrap .breadcrumb a:active, .error404 .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'page-title-bg', '.page .igual-page-header, .error404 .igual-page-header' );
$igual_styles->igual_padding_settings( 'page-title-padding', '.page .page-title-wrap, .error404 .page-title-wrap' );

//single product page title settings
$igual_styles->igual_color( 'product-title-color', '.single-product .page-title-wrap .page-title' );
$igual_styles->igual_color( 'product-title-desc-color', '.single-product .page-title-wrap .page-subtitle, .single-product .page-title-wrap .breadcrumb li' );
$igual_styles->igual_link_color( 'product-title-link-color', 'regular', '.single-product .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'product-title-link-color', 'hover', '.single-product .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'product-title-link-color', 'active', '.single-product .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'product-title-bg', '.single-product .igual-page-header' );
$igual_styles->igual_padding_settings( 'product-title-padding', '.single-product .page-title-wrap' );

//Custom Post Single title settings
$igual_styles->igual_color( 'custom-single-title-color', '.single[class*="single-cea-"] .page-title-wrap .page-title, .single[class*="single-cea-"] .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'custom-single-title-desc-color', '.single[class*="single-cea-"] .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'custom-single-title-link-color', 'regular', '.single[class*="single-cea-"] .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'custom-single-title-link-color', 'hover', '.single[class*="single-cea-"] .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'custom-single-title-link-color', 'active', '.single[class*="single-cea-"] .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'custom-single-title-bg', '.single[class*="single-cea-"] .igual-page-header' );
$igual_styles->igual_padding_settings( 'custom-single-title-padding', '.single[class*="single-cea-"] .page-title-wrap' );

//Custom Post Service Single title settings
$igual_styles->igual_color( 'cea-service-title-color', '.single.single-cea-service .page-title-wrap .page-title, .single-cea-service .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'cea-service-title-desc-color', '.single.single-cea-service .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'cea-service-title-link-color', 'regular', '.single.single-cea-service .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'cea-service-title-link-color', 'hover', '.single.single-cea-service .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'cea-service-title-link-color', 'active', '.single.single-cea-service .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'cea-service-title-bg', '.single.single-cea-service .igual-page-header' );
$igual_styles->igual_padding_settings( 'cea-service-title-padding', '.single.single-cea-service .page-title-wrap' );

//Custom Post Team Single title settings
$igual_styles->igual_color( 'cea-team-title-color', '.single.single-cea-team .page-title-wrap .page-title, .single-cea-team .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'cea-team-title-desc-color', '.single.single-cea-team .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'cea-team-title-link-color', 'regular', '.single.single-cea-team .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'cea-team-title-link-color', 'hover', '.single.single-cea-team .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'cea-team-title-link-color', 'active', '.single.single-cea-team .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'cea-team-title-bg', '.single.single-cea-team .igual-page-header' );
$igual_styles->igual_padding_settings( 'cea-team-title-padding', '.single.single-cea-team .page-title-wrap' );

//Custom Post Testimonial Single title settings
$igual_styles->igual_color( 'cea-testimonial-title-color', '.single.single-cea-testimonial .page-title-wrap .page-title, .single-cea-testimonial .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'cea-testimonial-title-desc-color', '.single.single-cea-testimonial .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'cea-testimonial-title-link-color', 'regular', '.single.single-cea-testimonial .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'cea-testimonial-title-link-color', 'hover', '.single.single-cea-testimonial .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'cea-testimonial-title-link-color', 'active', '.single.single-cea-testimonial .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'cea-testimonial-title-bg', '.single.single-cea-testimonial .igual-page-header' );
$igual_styles->igual_padding_settings( 'cea-testimonial-title-padding', '.single.single-cea-testimonial .page-title-wrap' );

//Custom Post Portfolio Single title settings
$igual_styles->igual_color( 'cea-portfolio-title-color', '.single.single-cea-portfolio .page-title-wrap .page-title, .single-cea-portfolio .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'cea-portfolio-title-desc-color', '.single.single-cea-portfolio .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'cea-portfolio-title-link-color', 'regular', '.single.single-cea-portfolio .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'cea-portfolio-title-link-color', 'hover', '.single.single-cea-portfolio .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'cea-portfolio-title-link-color', 'active', '.single.single-cea-portfolio .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'cea-portfolio-title-bg', '.single.single-cea-portfolio .igual-page-header' );
$igual_styles->igual_padding_settings( 'cea-portfolio-title-padding', '.single.single-cea-portfolio .page-title-wrap' );


//Custom Post Event Single title settings
$igual_styles->igual_color( 'cea-event-title-color', '.single.single-cea-event .page-title-wrap .page-title, .single-cea-event .page-title-wrap .breadcrumb li' );
$igual_styles->igual_color( 'cea-event-title-desc-color', '.single.single-cea-event .page-title-wrap .page-subtitle' );
$igual_styles->igual_link_color( 'cea-event-title-link-color', 'regular', '.single.single-cea-event .page-title-wrap .breadcrumb a' );
$igual_styles->igual_link_color( 'cea-event-title-link-color', 'hover', '.single.single-cea-event .page-title-wrap .breadcrumb a:hover' );
$igual_styles->igual_link_color( 'cea-event-title-link-color', 'active', '.single.single-cea-event .page-title-wrap .breadcrumb a:active' );
$igual_styles->igual_bg_settings( 'cea-event-title-bg', '.single.single-cea-event .igual-page-header' );
$igual_styles->igual_padding_settings( 'cea-event-title-padding', '.single.single-cea-event .page-title-wrap' );




//footer styles and link color
$igual_styles->igual_typo_settings( 'footer-typography', '.site-footer' );
$igual_styles->igual_bg_settings( 'footer-background', '.site-footer' );
$igual_styles->igual_padding_settings( 'footer-padding', '.site-footer' );
$igual_styles->igual_margin_settings( 'footer-margin', '.site-footer' );
$igual_styles->igual_border_settings( 'footer-border', '.site-footer' );
$igual_styles->igual_link_color( 'footer-links-color', 'regular', '.site-footer a' );
$igual_styles->igual_link_color( 'footer-links-color', 'hover', '.site-footer a:hover' );
$igual_styles->igual_link_color( 'footer-links-color', 'active', '.site-footer a:active' );

//footer top styles and link color
$igual_styles->igual_typo_settings( 'insta-footer-typography', '.insta-footer-wrap' );
$igual_styles->igual_bg_settings( 'insta-footer-background', '.insta-footer-wrap' );
$igual_styles->igual_padding_settings( 'insta-footer-padding', '.insta-footer-wrap' );
$igual_styles->igual_margin_settings( 'insta-footer-margin', '.insta-footer-wrap' );
$igual_styles->igual_border_settings( 'insta-footer-border', '.insta-footer-wrap' );
$igual_styles->igual_link_color( 'insta-footer-links-color', 'regular', '.insta-footer-wrap a' );
$igual_styles->igual_link_color( 'insta-footer-links-color', 'hover', '.insta-footer-wrap a:hover' );
$igual_styles->igual_link_color( 'insta-footer-links-color', 'active', '.insta-footer-wrap a:active' );

//footer widgets part styles and link color
$igual_styles->igual_typo_settings( 'footer-widgets-typography', '.footer-widgets-wrap' );
$igual_styles->igual_bg_settings( 'footer-widgets-background', '.footer-widgets-wrap' );
$igual_styles->igual_padding_settings( 'footer-widgets-padding', '.footer-widgets-wrap' );
$igual_styles->igual_margin_settings( 'footer-widgets-margin', '.footer-widgets-wrap' );
$igual_styles->igual_border_settings( 'footer-widgets-border', '.footer-widgets-wrap' );
$igual_styles->igual_link_color( 'footer-widgets-links-color', 'regular', '.footer-widgets-wrap a' );
$igual_styles->igual_link_color( 'footer-widgets-links-color', 'hover', '.footer-widgets-wrap a:hover' );
$igual_styles->igual_link_color( 'footer-widgets-links-color', 'active', '.footer-widgets-wrap a:active' );

//footer bottom styles and link color
$igual_styles->igual_typo_settings( 'copyright-section-typography', '.footer-bottom-wrap' );
$igual_styles->igual_bg_settings( 'copyright-section-background', '.footer-bottom-wrap' );
$igual_styles->igual_padding_settings( 'copyright-section-padding', '.footer-bottom-wrap' );
$igual_styles->igual_margin_settings( 'copyright-section-margin', '.footer-bottom-wrap' );
$igual_styles->igual_border_settings( 'copyright-section-border', '.footer-bottom-wrap' );
$igual_styles->igual_link_color( 'copyright-section-links-color', 'regular', '.footer-bottom-wrap a' );
$igual_styles->igual_link_color( 'copyright-section-links-color', 'hover', '.footer-bottom-wrap a:hover' );
$igual_styles->igual_link_color( 'copyright-section-links-color', 'active', '.footer-bottom-wrap a:active' );

//secondary bar styles
if( $primary_color && $secondary_color ){
	echo '.secondary-bar-wrapper { background: linear-gradient(90deg, '. esc_attr( $primary_color ) .' 0%, '. esc_attr( $secondary_color ) .' 100%); }';
	
	
	echo '.page-load-initiate .page-loader:before, .page-load-end .page-loader:before, .page-load-initiate .page-loader:after, .page-load-end .page-loader:after { 
		background: linear-gradient(90deg, '. esc_attr( $primary_color ) .' 0%, '. esc_attr( $secondary_color ) .' 100%);
		background: -webkit-gradient(linear, left top, right top, from('. esc_attr( $secondary_color ) .'), to('. esc_attr( $primary_color ) .'));
		background: -webkit-linear-gradient(left, '. esc_attr( $secondary_color ) .' 0%, '. esc_attr( $primary_color ) .' 100%);
		background: -o-linear-gradient(left, '. esc_attr( $secondary_color ) .' 0%, '. esc_attr( $primary_color ) .' 100%);
		background: linear-gradient(to right, '. esc_attr( $secondary_color ) .' 0%, '. esc_attr( $primary_color ) .' 100%);
	}';
}
$secondary_sidebar_width = $igual_styles->igual_dimension_settings( 'secondary-sidebar-width', 'width' );
if( $secondary_sidebar_width ){
	echo '.secondary-bar-inner {
		width: '. esc_attr( $secondary_sidebar_width ) .';
	}';
	echo '.secondary-bar-wrapper.from-left .secondary-bar-inner {
		left: -'. esc_attr( $secondary_sidebar_width ) .';
	}';
	echo '.secondary-bar-wrapper.from-right .secondary-bar-inner {
		right: -'. esc_attr( $secondary_sidebar_width ) .';
	}';
}

//End style

$styles = ob_get_clean();

$gf_arr = Igual_Theme_Styles::$igual_gf_array;
update_option( 'igual_google_fonts_list', $gf_arr );
update_option( 'igual_custom_styles', wp_slash( $styles ) );