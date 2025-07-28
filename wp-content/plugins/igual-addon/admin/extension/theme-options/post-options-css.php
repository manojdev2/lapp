 <?php

/**
 * Igual Post Options CSS
 */

require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/class.options-style.php' );
$igual_styles = new Igual_Theme_Styles;

$post_id = get_the_ID();
$igual_options = $_POST['igual_options'];//get_post_meta( $post_id, 'igual_options', true );
$igual_styles->igual_options = $igual_options;

ob_start();

echo "\n/* Igual Post Options Styles */";
$igual_styles->igual_padding_settings( 'content-padding', '.igual-content-wrap' );

$igual_styles->igual_bg_settings( 'page-title-bg', 'body .igual-page-header' );

//logo styles
$logo_chk = $igual_styles->igual_get_option('logo-chk');
if( $logo_chk == 'custom' ){
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
}

//header styles
$header_style_chk = $igual_styles->igual_get_option('header-style-chk');
if( $header_style_chk == 'custom' ){
	$igual_styles->igual_link_color( 'header-links-color', 'regular', '.site-header a' );
	$igual_styles->igual_link_color( 'header-links-color', 'hover', '.site-header a:hover' );
	$igual_styles->igual_link_color( 'header-links-color', 'active', '.site-header a:active' );
	$igual_styles->igual_bg_settings( 'header-background', '.site-header' );
	$igual_styles->igual_padding_settings( 'header-padding', '.site-header' );
	$igual_styles->igual_margin_settings( 'header-margin', '.site-header' );
	$igual_styles->igual_border_settings( 'header-border', '.site-header' );
}

//header topbar styles & link color
$topbar_style_chk = $igual_styles->igual_get_option('header-topbar-style-chk');
if( $topbar_style_chk == 'custom' ){
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
	$igual_styles->igual_link_color( 'header-topbar-links-color', 'active', '.header-topbar a:active,.header-topbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a' );

	//topbar on sticky style
	$igual_styles->igual_bg_settings( 'header-topbar-sticky-background', '.sticky-head.header-sticky .header-topbar' );
	$igual_styles->igual_link_color( 'header-topbar-sticky-links-color', 'regular', '.sticky-head.header-sticky .header-topbar a' );
	$igual_styles->igual_link_color( 'header-topbar-sticky-links-color', 'hover', '.sticky-head.header-sticky .header-topbar a:hover' );
	$igual_styles->igual_link_color( 'header-topbar-sticky-links-color', 'active', '.sticky-head.header-sticky .header-topbar a:active, .sticky-head.header-sticky .header-topbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a' );
}

$logobar_style_chk = $igual_styles->igual_get_option('header-logobar-style-chk');
if( $logobar_style_chk == 'custom' ){
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
	$igual_styles->igual_link_color( 'header-logobar-links-color', 'regular', '.header-logobar a, .header-logobar .primary-menu .menu-item-has-children ul.sub-menu li a' );
	$igual_styles->igual_link_color( 'header-logobar-links-color', 'hover', '.header-logobar a:hover,.header-logobar .primary-menu .menu-item-has-children ul.sub-menu li a:hover' );
	$igual_styles->igual_link_color( 'header-logobar-links-color', 'active', '.header-logobar a:active, .header-logobar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a,.header-logobar .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-item > a, .header-logobar ul.wp-menu ul.sub-menu li.menu-item.current-menu-ancestor.menu-item-has-children > a' );

	//logobar on sticky style
	$igual_styles->igual_bg_settings( 'header-logobar-sticky-background', '.sticky-head.header-sticky .header-logobar' );
	$igual_styles->igual_link_color( 'header-logobar-sticky-links-color', 'regular', '.sticky-head.header-sticky .header-logobar a, .sticky-head.header-sticky .header-logobar .primary-menu .menu-item-has-children ul.sub-menu li a' );
	$igual_styles->igual_link_color( 'header-logobar-sticky-links-color', 'hover', '.sticky-head.header-sticky .header-logobar a:hover, .sticky-head.header-sticky .header-logobar .primary-menu .menu-item-has-children ul.sub-menu li a:hover' );
	$igual_styles->igual_link_color( 'header-logobar-sticky-links-color', 'active', '.sticky-head.header-sticky .header-logobar a:active,.sticky-head.header-sticky .header-logobar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a,.sticky-head.header-sticky .header-logobar .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-item > a, .sticky-head.header-sticky .header-logobar ul.wp-menu ul.sub-menu li.menu-item.current-menu-ancestor.menu-item-has-children > a' );
}

$navbar_style_chk = $igual_styles->igual_get_option('header-navbar-style-chk');
if( $navbar_style_chk == 'custom' ){
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
	$igual_styles->igual_link_color( 'header-navbar-links-color', 'regular', '.header-navbar a, .header-navbar .primary-menu .menu-item-has-children ul.sub-menu li a' );
	$igual_styles->igual_link_color( 'header-navbar-links-color', 'hover', '.header-navbar a:hover, .header-navbar .primary-menu .menu-item-has-children ul.sub-menu li a:hover' );
	$igual_styles->igual_link_color( 'header-navbar-links-color', 'active', '.header-navbar a:active, .header-navbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a,.header-navbar .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-item > a, .header-navbar ul.wp-menu ul.sub-menu li.menu-item.current-menu-ancestor.menu-item-has-children > a' );

	//navbar on sticky style
	$igual_styles->igual_bg_settings( 'header-navbar-sticky-background', '.sticky-head.header-sticky .header-navbar' );
	$igual_styles->igual_link_color( 'header-navbar-sticky-links-color', 'regular', '.sticky-head.header-sticky .header-navbar a, .sticky-head.header-sticky .header-navbar .primary-menu .menu-item-has-children ul.sub-menu li a' );
	$igual_styles->igual_link_color( 'header-navbar-sticky-links-color', 'hover', '.sticky-head.header-sticky .header-navbar a:hover, .sticky-head.header-sticky .header-navbar .primary-menu .menu-item-has-children ul.sub-menu li a:hover' );
	$igual_styles->igual_link_color( 'header-navbar-sticky-links-color', 'active', '.sticky-head.header-sticky .header-navbar a:active, .sticky-head.header-sticky .header-navbar ul.nav.wp-menu > li.menu-item-has-children.current-menu-ancestor > a,.sticky-head.header-sticky .header-navbar .primary-menu li.current-menu-parent > ul.sub-menu > li.current-menu-item > a, .sticky-head.header-sticky .header-navbar ul.wp-menu ul.sub-menu li.menu-item.current-menu-ancestor.menu-item-has-children > a' );

}

//Style end

$styles = ob_get_clean();
update_post_meta( $post_id, 'igual_post_custom_styles', wp_slash( $styles ) );