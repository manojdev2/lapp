<?php

// General
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'General', 'igual-addon' ),
	'id'         => 'general-tab'
) );

// -> Site Settings
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Site Settings', 'igual-addon' ),
	'id'         => 'site-general-settings',
	'fields'	 => array(
		array(
			'id'			=> 'loader-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Loader Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for site page loader. If you have did not uploaded means default page loader will work.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'page-loader-option',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Loader', 'igual-addon' ),
			'description'	=> esc_html__( 'This is the control to enable / disable Page Loader.', 'igual-addon' )	
		),
		array(
			'id'			=> 'page_loader',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Page Loader', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose site page loader image.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'page-loader-option', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'site-layout-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is site layout settings.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'site-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Site Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose site layout either wide or boxed.', 'igual-addon' ),
			'items'		=> array(
				'wide' => array(
					'title' => esc_html__( 'Wide', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/header/header-wide.png'
				),
				'boxed' => array(
					'title' => esc_html__( 'Boxed', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/header/header-boxed.png'
				)
			),
			'default'		=> 'wide'
		),
		array(
			'id'			=> 'site-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Site Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, ex: 1200.', 'igual-addon' ),
			'only_dimension' => 'width',
			'default'		=> array( 'width' => '1200' )
		),
		array(
			'id'			=> 'site-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Site Content Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the top/bottom padding for page content. Enter values like, ex: 60, 60.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'site-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Body Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of body, This will work behind your boxed layout.', 'igual-addon' ),
			'required'		=> array( 'site-layout', '=', array( 'boxed' ) )
		),
		array(
			'id'			=> 'site-api-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'API Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is site API settings.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'mailchimp-api',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Mailchimp API', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can add yout Mailchimp API key. you have to select list id in your mailchimp widget to work mailchimp properly.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'site-rtl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'RTL Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is the control to enable / disable RTL mode of your entire site.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'rtl',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable RTL', 'igual-addon' ),
			'description'	=> esc_html__( 'This is the control to enable / disable RTL mode of your entire site.', 'igual-addon' )
		),
		array(
			'id'			=> 'dark-light',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable Dark/Light', 'igual-addon' ),
			'description'	=> esc_html__( 'This is dark or light floating button options for this site. You can enable or disable.', 'igual-addon' )
		)
	)
) );
// -> Logo Settings
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Logo Settings', 'igual-addon' ),
	'id'         => 'site-logo-settings',
	'fields'	 => array(
		array(
			'id'			=> 'logo-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Logo Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for site logo.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'site-logo',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Default Logo', 'igual-addon' ),
			'description'	=> esc_html__( 'Select an image file for your logo.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'site-logo-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Site Logo Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of logo. if you want original width leave this field empty.', 'igual-addon' ),
			'only_dimension' => 'width'
		),
		array(
			'id'			=> 'site-logo-desc',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable Site Logo Description', 'igual-addon' ),
			'description'	=> esc_html__( 'This is logo description options for this site. You can enable or disable.', 'igual-addon' )
		),
		array(
			'id'			=> 'sticky-logo',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Sticky Logo', 'igual-addon' ),
			'description'	=> esc_html__( 'Select an image file for your sticky header logo.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'sticky-logo-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Sticky Logo Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of sticky logo. if you want original width leave this field empty.', 'igual-addon' ),
			'only_dimension' => 'width'
		),
		array(
			'id'			=> 'mobile-logo',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Mobile Logo', 'igual-addon' ),
			'description'	=> esc_html__( 'Select an image file for your mobile logo.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'mobile-logo-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Mobile Logo Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of mobile logo. if you want original width leave this field empty.', 'igual-addon' ),
			'only_dimension' => 'width'
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'general-end'
));

// Typography
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Typography', 'igual-addon' ),
	'id'         => 'typography-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Site Typography', 'igual-addon' ),
	'id'         => 'site-typo-settings',
	'fields'	 => array(
		array(
			'id'			=> 'content-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Site Common Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all body text.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'lead-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Lead Text Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'This is typography settigs for lead text.', 'igual-addon' ),
			'default'		=> ''
		)
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Heading Typography', 'igual-addon' ),
	'id'         => 'heading-typo-settings',
	'fields'	 => array(
		array(
			'id'			=> 'h1-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'H1 Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all H1 headings.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'h2-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'H2 Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all H2 headings.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'h3-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'H3 Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all H3 headings.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'h4-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'H4 Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all H4 headings.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'h5-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'H5 Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all H5 headings.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'h6-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'H6 Fonts', 'igual-addon' ),
			'description'	=> esc_html__( 'These settings control the typography for all H6 headings.', 'igual-addon' ),
			'default'		=> ''
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Header Typography', 'igual-addon' ),
	'id'         => 'header-typo-settings',
	'fields'	 => array(
		array(
			'id'			=> 'header-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Header Typography', 'igual-addon' ),
			'default'		=> ''
		),		
		array(
			'id'			=> 'header-topbar-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Topbar Typography', 'igual-addon' ),
			'default'		=> ''
		),		
		array(
			'id'			=> 'header-logobar-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Logo bar Typography', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Navbar Typography', 'igual-addon' ),
			'default'		=> ''
		)
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Footer Typography', 'igual-addon' ),
	'id'         => 'footer-typo-settings',
	'fields'	 => array(
		array(
			'id'			=> 'footer-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Footer Typography', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'insta-footer-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Footer Top Typography', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-widgets-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Footer Widgets Typography', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'copyright-section-typography',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Copyright Section Typography', 'igual-addon' ),
			'default'		=> ''
		)
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'typography-end'
));

// Colors
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Colors', 'igual-addon' ),
	'id'         => 'colors-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Theme Colors', 'igual-addon' ),
	'id'         => 'theme-colors',
	'fields'	 => array(
		array(
			'id'			=> 'primary-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Theme Primary Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is primary color of the theme. Selected color will work in entire website.', 'igual-addon' ),
			'alpha'			=> false,
			'default'		=> '#3845ab'
		),
		array(
			'id'			=> 'secondary-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Theme Secondary Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is secondary color of the theme. Selected color will work in few places of the website. you can update to leave it as empty.', 'igual-addon' ),
			'alpha'			=> false,
			'default'		=> '#b043ba'
		),
		array(
			'id'			=> 'link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Theme Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the links color of the entire website.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'button-color',
			'type'			=> 'btn_color',
			'title'			=> esc_html__( 'Button Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the button color of the entire website.', 'igual-addon' ),
			'default'		=> ''
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'theme-colors-end'	
));

// Header
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Header', 'igual-addon' ),
	'id'         => 'header-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'General', 'igual-addon' ),
	'id'         => 'header-general',
	'fields'	 => array(
		array(
			'id'			=> 'header-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Header Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the header layout. either wide or boxed.', 'igual-addon' ),
			'items'		=> array(
				'wide' => array(
					'title' => esc_html__( 'Wide', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/header/header-wide.png'
				),
				'wider' => array(
					'title' => esc_html__( 'Wider', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/header/header-wider.png'
				),
				'boxed' => array(
					'title' => esc_html__( 'Boxed', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/header/header-boxed.png'
				)
			),
			'default' => 'wide'
		),
		array(
			'id'			=> 'header-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Header Bars', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the header items. Drag which items you want to display header normal and header sticky area.', 'igual-addon' ),
			'default'		=> array(
				'normal' => array(
					'topbar' => esc_html__( 'Topbar', 'igual-addon' ),
					'logobar' => esc_html__( 'Logo bar', 'igual-addon' )
				),
				'sticky' => array(
					'navbar' => esc_html__( 'Navbar', 'igual-addon' )
				),
				'disabled' => array(
				)
			)
		),
		array(
			'id'			=> 'header-absolute',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Header Absolute', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable/Disable header absolute. Like floating on Slider / Page title bar and you have to select RGBA background color for yout header or header items to display header like that.', 'igual-addon' ),
			'default'		=> false
		),
		array(
			'id'			=> 'header-sticky',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Choose Header Sticky', 'igual-addon' ),
			'description'	=> esc_html__( 'Control to show the sticky header while scroll or on while scrollup.', 'igual-addon' ),
			'choices'		=> array(
				'normal'		=> esc_html__( 'Normal', 'igual-addon' ),
				'on_scrollup'	=> esc_html__( 'On Scroll Up', 'igual-addon' )
			),
			'default'		=> 'normal'
		),
		array(
			'id'			=> 'menu-type',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Main Menu Type', 'igual-addon' ),
			'description'	=> esc_html__( 'This is an option for to enable your main menu as megamenu. otherwise normal menu will display in default.', 'igual-addon' ),
			'choices'		=> array(
				'normal'	=> esc_html__( 'Normal', 'igual-addon' ),
				'mega'		=> esc_html__( 'Mega menu', 'igual-addon' )
			),
			'default'		=> 'normal'
		),
		array(
			'id'			=> 'header-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Header Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),		
		array(
			'id'			=> 'header-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Header Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the color of the header links.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Header Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the background color of header.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Header Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for header.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Header padding', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the top/bottom/left/right padding for Header.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Header margin', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the top/bottom/left/right margin for Header.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'dropdown-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Dropdown Menu Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control all type of dropdown menu styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'dropdown-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Dropdown Menu Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the color for menus in dropdown menu.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'dropdown-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Dropdown Menu Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the background settings of dropdown menu area.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'dropdown-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Dropdown Menu Styles on Sticky', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of menu dropdown styles on sticky.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'dropdown-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Dropdown Menu Link Color on Sticky', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control link colors for menu dropdown on sticky.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'dropdown-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Dropdown Menu Background Color on Sticky', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control background color for menu dropdown on sticky.', 'igual-addon' ),
			'default'		=> ''
		),	
		array(
			'id'			=> 'header-other-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Other Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'These are extra header options.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'header-email',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Header Email', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can add your email id to show in your header. Here you can place shortcodes too.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-address',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Header Address', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can add your address to show in your header. Here you can place shortcodes too.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'search-type',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Search Toggle Modal', 'igual-addon' ),
			'description'	=> esc_html__( 'Select search box layout type to show in your header area.', 'igual-addon' ),
			'choices'		=> array(
				'1'	=> esc_html__( 'Full Screen Search', 'igual-addon' ),
				'2' => esc_html__( 'Text Box Toggle Search', 'igual-addon' ),
				'3' => esc_html__( 'Full Bar Toggle Search', 'igual-addon' ),
				'4' => esc_html__( 'Bottom Seach Box Toggle', 'igual-addon' )
			),
			'default'		=> '1'
		),
		array(
			'id'			=> 'header-offset',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Scroll Offset', 'igual-addon' ),
			'description'	=> esc_html__( 'This is header bottom offset while one page scroll.', 'igual-addon' ),
			'only_dimension' => 'height',
			'default'		=> array( 'height' => '0' )
		),
		array(
			'id'			=> 'mobile-header-offset',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Mobile Header Scroll Offset', 'igual-addon' ),
			'description'	=> esc_html__( 'This is mobile header bottom offset while one page scroll.', 'igual-addon' ),
			'only_dimension' => 'height',
			'default'		=> array( 'height' => '0' )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Topbar', 'igual-addon' ),
	'id'         => 'header-topbar',
	'fields'	 => array(
		array(
			'id'			=> 'topbar-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Topbar Custom Text 1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is topbar custom text field. Here you can place custom text and shortcodes too', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'topbar-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Topbar Custom Text 2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is topbar custom text field. Here you can place custom text and shortcodes too', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'topbar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Topbar Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are header topbar items. You can make your own layout by drag and drop', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
					'custom-text-1' => esc_html__( 'Custom Text 1', 'igual-addon' )
				),
				'center' => array(					
				),
				'right' => array(
					'social' => esc_html__( 'Social', 'igual-addon' )
				),
				'disabled' => array(
					'address' => esc_html__( 'Address', 'igual-addon' ),
					'email' => esc_html__( 'Email', 'igual-addon' ),
					'search' => esc_html__( 'Search', 'igual-addon' ),
					'top-menu' => esc_html__( 'Top Menu', 'igual-addon' ),
					'custom-text-2' => esc_html__( 'Custom Text 2', 'igual-addon' )
				)
			)
		),
		array(
			'id'			=> 'header-topbar-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Topbar Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header topbar styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-topbar-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Topbar Height', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the height of header topbar. In pixels.', 'igual-addon' ),
			'only_dimension' => 'height'
		),
		array(
			'id'			=> 'header-topbar-sticky-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Topbar Sticky Height', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the height of header sticky topbar.', 'igual-addon' ),
			'only_dimension' => 'height'
		),		
		array(
			'id'			=> 'header-topbar-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Topbar Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the link color settings for header topbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-topbar-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Topbar Background Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Control background settings for header topbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-topbar-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Topbar Border', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control the border settings for header topbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-topbar-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Topbar padding', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control padding settings for header topbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-topbar-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Topbar margin', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control margin settings for header topbar', 'igual-addon' ),
			'default'		=> ''
		),	
		array(
			'id'			=> 'header-topbar-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Topbar Sticky Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control all the type of header topbar sticky styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-topbar-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Topbar Sticky Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the link color settings for header topbar on sticky', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-topbar-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Topbar Sticky Background Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the background settings for header topbar on sticky', 'igual-addon' ),
			'default'		=> ''
		),	
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Logo bar', 'igual-addon' ),
	'id'         => 'header-logobar',
	'fields'	 => array(
		array(
			'id'			=> 'logobar-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Logobar Custom Text1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is logobar custom text field. Here you can place custom text and shortcodes too', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'logobar-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Logobar Custom Text2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is logobar custom text field. Here you can place custom text and shortcodes too', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'logobar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Logo bar Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are header logobar items. You can make your own layout by drag and drop', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'logo' => esc_html__( 'Logo', 'igual-addon' )
				),
				'right' => array(					
				),
				'disabled' => array(
					'social' => esc_html__( 'Social', 'igual-addon' ),
					'address' => esc_html__( 'Address', 'igual-addon' ),
					'email' => esc_html__( 'Email', 'igual-addon' ),
					'search' => esc_html__( 'Search', 'igual-addon' ),
					'primary-menu' => esc_html__( 'Primary Menu', 'igual-addon' ),
					'secondary-bar' => esc_html__( 'Secondary Bar', 'igual-addon' ),
					'signin' => esc_html__( 'Signin/Register', 'igual-addon' ),
					'custom-text-2' => esc_html__( 'Custom Text 2', 'igual-addon' ),
					'custom-text-1' => esc_html__( 'Custom Text 1', 'igual-addon' ),
				)
			)
		),
		array(
			'id'			=> 'header-logobar-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Logo bar Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header logobar styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-logobar-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Logo bar Height', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the height of header logobar. In pixels.', 'igual-addon' ),
			'only_dimension' => 'height'
		),
		array(
			'id'			=> 'header-logobar-sticky-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Logo bar Sticky Height', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the sticky height of header logobar. In pixels.', 'igual-addon' ),
			'only_dimension' => 'height'
		),		
		array(
			'id'			=> 'header-logobar-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Logo bar Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the link color settings for header logobar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-logobar-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Logo bar Background Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Control background settings for header logobar.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-logobar-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Logo bar Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for header logobar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-logobar-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Logo bar padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for header logobar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-logobar-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Logo bar margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for header logobar', 'igual-addon' ),
			'default'		=> ''
		),	
		array(
			'id'			=> 'header-logobar-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Logobar Sticky Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header logobar sticky styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-logobar-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Logobar Sticky Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header logobar on sticky', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-logobar-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Logobar Sticky Background Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings for header logobar on sticky', 'igual-addon' ),
			'default'		=> ''
		),		
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Navbar', 'igual-addon' ),
	'id'         => 'header-navbar',
	'fields'	 => array(
		array(
			'id'			=> 'navbar-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Navbar Custom Text 1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is navbar custom text field. Here you can place custom text and shortcodes too.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'navbar-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Navbar Custom Text 2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is navbar custom text field. Here you can place custom text and shortcodes too.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'navbar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Nav bar Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are navbar items. You can make your own layout by drag and drop', 'igual-addon' ),
			'default'		=> array(
				'left' => array(	
					'logo' => esc_html__( 'Logo', 'igual-addon' ),
					'primary-menu' => esc_html__( 'Primary Menu', 'igual-addon' )
				),
				'center' => array(					
				),
				'right' => array(	
					'search' => esc_html__( 'Search', 'igual-addon' ),
				),
				'disabled' => array(
					'social' => esc_html__( 'Social', 'igual-addon' ),
					'address' => esc_html__( 'Address', 'igual-addon' ),
					'email' => esc_html__( 'Email', 'igual-addon' ),
					'secondary-bar' => esc_html__( 'Secondary Bar', 'igual-addon' ),
					'signin' => esc_html__( 'Signin/Register', 'igual-addon' ),
					'custom-text-2' => esc_html__( 'Custom Text 2', 'igual-addon' ),
					'custom-text-1' => esc_html__( 'Custom Text 1', 'igual-addon' ),
				)
			)
		),
		array(
			'id'			=> 'header-navbar-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Navbar Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header navbar styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-navbar-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Navbar Height', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the height of header navbar. In pixels.', 'igual-addon' ),
			'only_dimension' => 'height'
		),
		array(
			'id'			=> 'header-navbar-sticky-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Navbar Sticky Height', 'igual-addon' ),
			'description'	=> esc_html__( 'Controls the height of header sticky navbar. In pixels.', 'igual-addon' ),
			'only_dimension' => 'height'
		),		
		array(
			'id'			=> 'header-navbar-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Navbar Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the link color settings for header navbar.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Header Navbar Background', 'igual-addon' ),
			'description'	=> esc_html__( 'Control background  settings for header navbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Navbar Border', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the border settings for header navbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Navbar padding', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the padding settings for header navbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Navbar margin', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the margin settings for header navbar', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Navbar Sticky Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can control all the type of header navbar sticky styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-navbar-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Navbar Sticky Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the link color settings for header navbar on sticky.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'header-navbar-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Navbar Sticky Background', 'igual-addon' ),
			'description'	=> esc_html__( 'Control the background settings for header navbar on sticky.', 'igual-addon' ),
			'default'		=> ''
		),	
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Mobile Header', 'igual-addon' ),
	'id'         => 'header-mobileheader',
	'fields'	 => array(
		array(
			'id'			=> 'mobilebar-responsive',
			'type'			=> 'number',
			'title'			=> esc_html__( 'Mobile Bar From', 'igual-addon' ),
			'description'	=> esc_html__( 'This is mobile bar show option from which window width. Example 767', 'igual-addon' ),
			'default'		=> '767'
		),
		array(
			'id'			=> 'mobilebar-sticky',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Choose Mobile Bar Sticky', 'igual-addon' ),
			'description'	=> esc_html__( 'This is option to sticky mobile bar on or off or on while scrollup', 'igual-addon' ),
			'choices'		=> array(
				'off'	=> 'Off',
				'on'	=> 'On',
				'on_scrollup'	=> 'On Scroll Up'
			),
			'default'		=> 'off'
		),
		array(
			'id'			=> 'mobile-menu-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Mobile menu Custom Text 1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is Mobile custom text field. Here you can place custom text and shortcodes too.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'mobile-menu-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Mobile menu Custom Text 2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is Mobile custom text field. Here you can place custom text and shortcodes too.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'mobilebar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Mobile Header Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are mobile header items. You can make your own layout by drag and drop', 'igual-addon' ),
			'default'		=> array(
				'left' => array(					
					'menu-toggle' => esc_html__( 'Mobile Menu Trigger', 'igual-addon' ),					
				),
				'center' => array(		
					'logo' => esc_html__( 'Logo', 'igual-addon' ),
				),
				'right' => array(	
					'search' => esc_html__( 'Search Trigger', 'igual-addon' ),
				),
				'disabled' => array(
					'mobile-menu-custom-text-1' => esc_html__( 'Mobile Custom Text 1', 'igual-addon' )
				)
			)
		),
		array(
			'id'			=> 'mobilebar-menu-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Mobile Menu Part Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are mobile menu part items. You can make your own layout by drag and drop', 'igual-addon' ),
			'default'		=> array(
				'enabled' => array(					
					'logo' => esc_html__( 'Logo', 'igual-addon' ),
					'menu' => esc_html__( 'Mobile Menu', 'igual-addon' )
				),
				'disabled' => array(
					'search' => esc_html__( 'Search', 'igual-addon' ),
					'social' => esc_html__( 'Social Links', 'igual-addon' ),
					'mobile-menu-custom-text-1' => esc_html__( 'Mobile menu Custom Text 1', 'igual-addon' ),
					'mobile-menu-custom-text-2' => esc_html__( 'Mobile menu Custom Text 2', 'igual-addon' ),
				)
			)
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Secondary Area', 'igual-addon' ),
	'id'         => 'secondary-area',
	'fields'	 => array(
		array(
			'id'			=> 'secondary-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Secondary Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for secondary widget area. This part only works when you active secondary bar item on nav/logo bars.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'secondary-sidebar-from',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Animation From', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose secondary bar animation from.', 'igual-addon' ),
			'choices'		=> array(
				'right'	=> esc_html__( 'Right', 'igual-addon' ),
				'left'	=> esc_html__( 'Left', 'igual-addon' )
			),
			'default'		=> 'right'
		),
		array(
			'id'			=> 'secondary-sidebar-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Secondary Sidebar Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of secondary sidebar. Example 300', 'igual-addon' ),
			'only_dimension' => 'width',
			'default'		=> array( 'width' => '300' )
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'header-tab-end'	
));

// Footer
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Footer', 'igual-addon' ),
	'id'         => 'footer-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'General', 'igual-addon' ),
	'id'         => 'footer-general',
	'fields'	 => array(
		array(
			'id'			=> 'footer-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Footer Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose footer layout either wide or boxed.', 'igual-addon' ),
			'items'		=> array(
				'wide' => array(
					'title' => esc_html__( 'Wide', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-wide.png'
				),
				'boxed' => array(
					'title' => esc_html__( 'Boxed', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-boxed.png'
				)
			),
			'default' => 'wide'
		),
		array(
			'id'			=> 'footer-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Footer Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These are footer items. Drag which items you want to display Enabled and Disabled.', 'igual-addon' ),
			'default'		=> array(
				'enabled' => array(
					'footer-middle' => esc_html__( 'Footer Widgets', 'igual-addon' ),
					'footer-bottom' => esc_html__( 'Copyright Section', 'igual-addon' )
				),
				'disabled' => array(
					'footer-top' => esc_html__( 'Footer Top', 'igual-addon' ),
				)
			)
		),
		array(
			'id'			=> 'footer-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of footer styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),		
		array(
			'id'			=> 'footer-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Footer Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Footer Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Footer Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Footer padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Footer margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for footer', 'igual-addon' ),
			'default'		=> ''
		),
	)	
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Footer Top', 'igual-addon' ),
	'id'         => 'footer-insta',
	'fields'	 => array(
		array(
			'id'			=> 'insta-footer-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Footer Top Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose footer top layout either wide or boxed.', 'igual-addon' ),
			'items'		=> array(
				'wide' => array(
					'title' => esc_html__( 'Wide', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-wide.png'
				),
				'boxed' => array(
					'title' => esc_html__( 'Boxed', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-boxed.png'
				)
			),
			'default' => 'wide'
		),
		array(
			'id'			=> 'insta-footer-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of footer styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),		
		array(
			'id'			=> 'insta-footer-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Footer Top Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for footer top area.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'insta-footer-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Footer Top Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for footer top area.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'insta-footer-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Footer Top Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for footer top area.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'insta-footer-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Footer Top Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for footer top area.', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'insta-footer-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Footer Top Margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for footer top area.', 'igual-addon' ),
			'default'		=> ''
		),
		
	)	
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Footer Widgets', 'igual-addon' ),
	'id'         => 'footer-widgets',
	'fields'	 => array(
		array(
			'id'			=> 'widgets-footer-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Widgets Footer Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widgets footer layout either wide or boxed.', 'igual-addon' ),
			'items'		=> array(
				'wide' => array(
					'title' => esc_html__( 'Wide', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-wide.png'
				),
				'boxed' => array(
					'title' => esc_html__( 'Boxed', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-boxed.png'
				)
			),
			'default' => 'boxed'
		),
		array(
			'id'			=> 'footer-widgets-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Footer Widgets Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose footer widgets layout.', 'igual-addon' ),
			'items'		=> array(
				'3-3-3-3' => array(
					'title' => esc_html__( 'Column 3/3/3/3', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-3-3-3-3.png'
				),
				'3-3-6' => array(
					'title' => esc_html__( 'Column 3/3/6', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-3-3-6.png'
				),
				'12' => array(
					'title' => esc_html__( 'Column 12', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-12.png'
				),
				'4-4-4' => array(
					'title' => esc_html__( 'Column 4/4/4', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-4-4-4.png'
				),
				'4-8' => array(
					'title' => esc_html__( 'Column4/8', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-4-8.png'
				),
				'6-3-3' => array(
					'title' => esc_html__( 'Column 6/3/3', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-6-3-3.png'
				),
				'8-4' => array(
					'title' => esc_html__( 'Column 8/4', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/widget-8-4.png'
				)
			),
			'default' => '12'
		),
		array(
			'id'			=> 'footer-widget-1',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Footer Widgets Area 1', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for footer widget area 1', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-widget-2',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Footer Widgets Area 2', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for footer widget area 2', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'footer-widgets-layout', '!=', array( '12' ) )
		),
		array(
			'id'			=> 'footer-widget-3',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Footer Widgets Area 3', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for footer widget area 3', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'footer-widgets-layout', '=', array( '3-3-3-3', '3-3-6', '4-4-4', '6-3-3' ) )
		),
		array(
			'id'			=> 'footer-widget-4',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Footer Widgets Area 4', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for footer widget area 4', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'footer-widgets-layout', '=', array( '3-3-3-3' ) )
		),
		array(
			'id'			=> 'footer-widgets-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of footer widgets styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),		
		array(
			'id'			=> 'footer-widgets-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( ' Footer Widgets Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for widgets footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-widgets-background',
			'type'			=> 'background',
			'title'			=> esc_html__( ' Footer Widgets Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for widgets footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-widgets-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Footer Widgets Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for widgets footer', 'igual-addon' ),
			'default'		=> ''
		), 
		array(
			'id'			=> 'footer-widgets-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Footer Widgets padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for widgets footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'footer-widgets-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Footer Widgets margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for widgets footer', 'igual-addon' ),
			'default'		=> ''
		),
		
	)	
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Copyright Section', 'igual-addon' ),
	'id'         => 'copyright-section',
	'fields'	 => array(
		array(
			'id'			=> 'footer-bottom-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Footer Bottom Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose footer bottom layout either wide or boxed.', 'igual-addon' ),
			'items'		=> array(
				'wide' => array(
					'title' => esc_html__( 'Wide', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-wide.png'
				),
				'boxed' => array(
					'title' => esc_html__( 'Boxed', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/footer/footer-boxed.png'
				)
			),
			'default' => 'boxed'
		),
		array(
			'id'			=> 'copyright-text',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Copyright Text', 'igual-addon' ),
			'description'	=> esc_html__( 'Enter copyright text. Use [year] and [copy] to show year and copyright icon', 'igual-addon' ),
			'default' 		=> esc_html__( '[copy] Copyright [year]. All rights reserved.', 'igual-addon' )
		),
		array(
			'id'			=> 'copyright-widget',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Copyright Custom Widgets', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for copyright widget area', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'copyright-bar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Copyright Bar Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are copyright bar items. You can make your own layout by drag and drop', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
					
				),
				'center' => array(	
					'copyright-text' => esc_html__( 'Copyright Text', 'igual-addon' )
				),
				'right' => array(					
				),
				'disabled' => array(
					'copyright-widgets' => esc_html__( 'Custom Widgets', 'igual-addon' )
				)
			)
		),
		array(
			'id'			=> 'copyright-section-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of copyright section styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),		
		array(
			'id'			=> 'copyright-section-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( ' Copyright Section Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for widgets footer', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'copyright-section-background',
			'type'			=> 'background',
			'title'			=> esc_html__( ' Copyright Section Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for copyright section', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'copyright-sections-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Copyright Section Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for copyright section', 'igual-addon' ),
			'default'		=> ''
		), 
		array(
			'id'			=> 'copyright-section-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Copyright Section padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for copyright section', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'copyright-section-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Copyright Section', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for copyright section', 'igual-addon' ),
			'default'		=> ''
		),
		
	)	
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'footer-tab-end'	
));

//Templates Fields
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Templates', 'igual-addon' ),
	'id'         => 'templates'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Blog Posts', 'igual-addon' ),
	'id'         => 'blog-tab',
	'fields'	 => array(
		array(
			'id'			=> 'blog-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Blog Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for blog page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'blog-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable blog page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'blog-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Blog Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are blog page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'title' => esc_html__( 'Title', 'igual-addon' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'igual-addon' )
				),
				'right' => array(
				),
				'disabled' => array(
					'description' => esc_html__( 'Description', 'igual-addon' )
				)
			),
			'required'		=> array( 'blog-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-page-title',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable blog page title section', 'igual-addon' ),
			'default'		=> esc_html__( 'Latest Posts', 'igual-addon' )
		),
		array(
			'id'			=> 'blog-page-description',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable blog page title section', 'igual-addon' ),
			'default'		=> esc_html__( 'You become sound knowledge by our latest posts.', 'igual-addon' )
		),
		array(
			'id'			=> 'blog-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Blog Page Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of blog page title.', 'igual-addon' ),
			'required'		=> array( 'blog-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Blog Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of blog page description.', 'igual-addon' ),
			'required'		=> array( 'blog-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Blog Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for blog page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'blog-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Blog Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common blog title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'blog-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Blog Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of blog page title.', 'igual-addon' ),
			'required'		=> array( 'blog-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Blog Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for blog page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'blog-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Blog Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose blog sidebar layout.', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'right-sidebar'
		),
		array(
			'id'			=> 'blog-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Blog Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for blog right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'blog-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'blog-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Blog Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for blog left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'blog-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'blog-top-meta-enable',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Top Meta', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable blog post top meta', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'blog-top-meta-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Blog Post Top Meta Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are blog post top meta elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
					'author' => esc_html__( 'Author', 'igual-addon' )
				),
				'right' => array(
					'category' => esc_html__( 'Category', 'igual-addon' )
				),
				'disabled' => array(
					'date' => esc_html__( 'Date', 'igual-addon' ),
					'tag' => esc_html__( 'Tag', 'igual-addon' ),
					'share' => esc_html__( 'Social Share', 'igual-addon' ),
					'more' => esc_html__( 'Read More', 'igual-addon' )
				)
			),
			'required'		=> array( 'blog-top-meta-enable', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-bottom-meta-enable',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Bottom Meta', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable blog post bottom meta', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'blog-bottom-meta-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Blog Post Bottom Meta Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are blog post bottom meta elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'right' => array(		
					'more' => esc_html__( 'Read More', 'igual-addon' )
				),
				'disabled' => array(
					'tag' => esc_html__( 'Tag', 'igual-addon' ),
					'author' => esc_html__( 'Author', 'igual-addon' ),
					'category' => esc_html__( 'Category', 'igual-addon' ),
					'date' => esc_html__( 'Date', 'igual-addon' ),
					'share' => esc_html__( 'Social Share', 'igual-addon' )
				)
			),
			'required'		=> array( 'blog-bottom-meta-enable', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'blog-post-excerpt-length',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Excerpt Length', 'igual-addon' ),
			'description'	=> esc_html__( 'Enter excerpt length of blog post. Leave this empty to set wp default excerpt length of posts.', 'igual-addon' ),
			'default'		=> 20
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Posts Archive', 'igual-addon' ),
	'id'         => 'archive-tab',
	'fields'	 => array(
		array(
			'id'			=> 'archive-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Archive Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for archive page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'archive-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable archive page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'archive-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Archive Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are archive page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'title' => esc_html__( 'Title', 'igual-addon' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'igual-addon' )
				),
				'right' => array(
				),
				'disabled' => array(
					'description' => esc_html__( 'Description', 'igual-addon' )
				)
			),
			'required'		=> array( 'archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Archive Page Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of archive page title.', 'igual-addon' ),
			'required'		=> array( 'archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Archive Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of archive page description.', 'igual-addon' ),
			'required'		=> array( 'archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Archive Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for archive page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Archive Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common archive title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Archive Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of archive page title.', 'igual-addon' ),
			'required'		=> array( 'archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Archive Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for archive page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'archive-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Archive Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose archive sidebar layout.', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'right-sidebar'
		),
		array(
			'id'			=> 'archive-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Archive Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for archive right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'archive-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'archive-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Archive Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for archive left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'archive-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'archive-top-meta-enable',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Top Meta', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable archive post top meta', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'archive-top-meta-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Archive Post Top Meta Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are archive post top meta elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
					'author' => esc_html__( 'Author', 'igual-addon' )
				),
				'right' => array(
					'category' => esc_html__( 'Category', 'igual-addon' )
				),
				'disabled' => array(
					'date' => esc_html__( 'Date', 'igual-addon' ),
					'tag' => esc_html__( 'Tag', 'igual-addon' ),
					'share' => esc_html__( 'Social Share', 'igual-addon' )
				)
			),
			'required'		=> array( 'archive-top-meta-enable', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'archive-bottom-meta-enable',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Bottom Meta', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable archive post bottom meta', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'archive-bottom-meta-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Archive Post Bottom Meta Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are archive post bottom meta elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'right' => array(		
					'more' => esc_html__( 'Read More', 'igual-addon' )
				),
				'disabled' => array(
					'tag' => esc_html__( 'Tag', 'igual-addon' ),
					'author' => esc_html__( 'Author', 'igual-addon' ),
					'category' => esc_html__( 'Category', 'igual-addon' ),
					'date' => esc_html__( 'Date', 'igual-addon' ),
					'share' => esc_html__( 'Social Share', 'igual-addon' )
				)
			),
			'required'		=> array( 'archive-bottom-meta-enable', '=', array( 'true' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Post Single', 'igual-addon' ),
	'id'         => 'post-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'single-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Single Post Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for single post page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'single-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable single post page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'single-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Single Post Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are single post page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'title' => esc_html__( 'Title', 'igual-addon' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'igual-addon' )
				),
				'right' => array(
				),
				'disabled' => array(
					'description' => esc_html__( 'Description', 'igual-addon' )
				)
			),
			'required'		=> array( 'single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Single Post Page Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of single page title.', 'igual-addon' ),
			'required'		=> array( 'single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Single Post Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of single page description.', 'igual-addon' ),
			'required'		=> array( 'single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Single Post Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for single post page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common single title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Single Post Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of single post page title.', 'igual-addon' ),
			'required'		=> array( 'single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Single Post Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for single blog post page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'single-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Single Post Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose archive sidebar layout.', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'right-sidebar'
		),
		array(
			'id'			=> 'single-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Single Post Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for single post right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'single-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'single-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Single Post Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for single post left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'single-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'single-top-meta-enable',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Top Meta', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable single post top meta', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'single-top-meta-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Single Post Top Meta Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are single post top meta elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
					'author' => esc_html__( 'Author', 'igual-addon' )
				),
				'right' => array(
					'category' => esc_html__( 'Category', 'igual-addon' )
				),
				'disabled' => array(
					'date' => esc_html__( 'Date', 'igual-addon' ),
					'tag' => esc_html__( 'Tag', 'igual-addon' ),
					'share' => esc_html__( 'Social Share', 'igual-addon' )
				)
			),
			'required'		=> array( 'single-top-meta-enable', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'single-bottom-meta-enable',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Bottom Meta', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable single post bottom meta', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'single-bottom-meta-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Single Post Bottom Meta Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are single post bottom meta elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
					'tag' => esc_html__( 'Tag', 'igual-addon' ),
				),
				'right' => array(		
					'share' => esc_html__( 'Social Share', 'igual-addon' )			
				),
				'disabled' => array(
					'author' => esc_html__( 'Author', 'igual-addon' ),
					'category' => esc_html__( 'Category', 'igual-addon' ),
					'date' => esc_html__( 'Date', 'igual-addon' )
				)
			),
			'required'		=> array( 'single-bottom-meta-enable', '=', array( 'true' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Page', 'igual-addon' ),
	'id'         => 'post-page-tab',
	'fields'	 => array(
		array(
			'id'			=> 'page-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for single post page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'page-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'page-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'title' => esc_html__( 'Title', 'igual-addon' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'igual-addon' )
				),
				'right' => array(
				),
				'disabled' => array(
					'description' => esc_html__( 'Description', 'igual-addon' )
				)
			),
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'page-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Page Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of page title.', 'igual-addon' ),
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'page-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Page Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of page description.', 'igual-addon' ),
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'page-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Page Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'page-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Page Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common page title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'page-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of page title.', 'igual-addon' ),
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'page-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for post page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'page-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Single Page Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Single Post sidebar layout.', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'right-sidebar'
		),
		array(
			'id'			=> 'page-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Page Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for page right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'page-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'page-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Page Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for page left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'page-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		)
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Custom Posts Archive', 'igual-addon' ),
	'id'         => 'custom-posts-tab',
	'fields'	 => array(
		array(
			'id'			=> 'custom-archive-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Custom Archive Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for custom archive page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'custom-archive-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable custom archive page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'custom-archive-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Custom Archive Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are custom archive page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'title' => esc_html__( 'Title', 'igual-addon' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'igual-addon' )
				),
				'right' => array(
				),
				'disabled' => array(
					'description' => esc_html__( 'Description', 'igual-addon' )
				)
			),
			'required'		=> array( 'custom-archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-archive-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Custom Archive Page Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of custom archive page title.', 'igual-addon' ),
			'required'		=> array( 'custom-archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-archive-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Custom Archive Page Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of custom archive page description.', 'igual-addon' ),
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-archive-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Custom Archive Page Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for custom archive page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-archive-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Archive Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common custom archive title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-archive-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Custom Archive Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of custom archive page title.', 'igual-addon' ),
			'required'		=> array( 'custom-archive-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-archive-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Custom Archive Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for custom archive page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'custom-archive-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Archive Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose archive sidebar layout.', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'right-sidebar'
		),
		array(
			'id'			=> 'custom-archive-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for custom archive right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-archive-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'custom-archive-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for custom archive left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-archive-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Custom Post Single', 'igual-addon' ),
	'id'         => 'custom-post-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'custom-single-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Custom Single Post Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for custom single post page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'custom-single-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable custom single post page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'custom-single-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Custom Single Post Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are custom single post page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
			'default'		=> array(
				'left' => array(
				),
				'center' => array(
					'title' => esc_html__( 'Title', 'igual-addon' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'igual-addon' )
				),
				'right' => array(
				),
				'disabled' => array(
					'description' => esc_html__( 'Description', 'igual-addon' )
				)
			),
			'required'		=> array( 'custom-single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-single-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Custom Single Post Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of custom single page title.', 'igual-addon' ),
			'required'		=> array( 'custom-single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-single-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Custom Single Post Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of custom single post page description.', 'igual-addon' ),
			'required'		=> array( 'custom-single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-single-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Custom Single Post Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for custom single post page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-single-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common custom single title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-single-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Custom Single Post Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of custom single post page title.', 'igual-addon' ),
			'required'		=> array( 'custom-single-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'custom-single-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Custom Single Post Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for archive page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'custom-single-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Custom Single Post Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose archive sidebar layout.', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'right-sidebar'
		),
		array(
			'id'			=> 'custom-single-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for custom single right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-single-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'custom-single-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for custom single left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'custom-single-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'templates-tab-end'	
));

do_action( 'igual_custom_template_options' );

// Social
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Social', 'igual-addon' ),
	'id'         => 'social-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Social Links', 'igual-addon' ),
	'id'         => 'social-links-tab',
	'fields'	 => array(
		array(
			'id'			=> 'social-icons-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Social Icons Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose social icons layout normal/radius or circle layout. this style will display in your header and footer social links.', 'igual-addon' ),
			'items'		=> array(
				'normal' => array(
					'title' => esc_html__( 'Normal', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/social-icons/normal.png'
				),
				'radius' => array(
					'title' => esc_html__( 'Radius', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/social-icons/radius.png'
				),
				'circle' => array(
					'title' => esc_html__( 'Circle', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/social-icons/circle.png'
				),
				'transparent' => array(
					'title' => esc_html__( 'Transparent', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/social-icons/transparent.png'
				)
			),
			'default' => 'transparent'
		),
		array(
			'id'			=> 'social-icon-window',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Target Window', 'igual-addon' ),
			'description'	=> esc_html__( 'Select the target window open into same window or blank window.', 'igual-addon' ),
			'choices'		=> array(
				''			=> esc_html__( 'Default', 'igual-addon' ),
				'_self'		=> esc_html__( 'Self', 'igual-addon' ),
				'_blank'	=> esc_html__( 'Blank', 'igual-addon' ),
				'_parent'	=> esc_html__( 'Parent', 'igual-addon' )
			),
			'default'		=> ''
		),
		array(
			'id'       => 'social-icons-fore',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Fore', 'igual-addon' ),
			'desc'     => esc_html__( 'Social icons fore color settings.', 'igual-addon' ),
			'choices'  => array(
				'black'		=> esc_html__( 'Black', 'igual-addon' ),
				'white'		=> esc_html__( 'White', 'igual-addon' ),
				'own'		=> esc_html__( 'Own Color', 'igual-addon' ),
			),
			'default'  => 'black'
		),
		array(
			'id'       => 'social-icons-hfore',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Fore Hover', 'igual-addon' ),
			'desc'     => esc_html__( 'Social icons fore hover color settings.', 'igual-addon' ),
			'choices'  => array(
				'h-black'		=> esc_html__( 'Black', 'igual-addon' ),
				'h-white'		=> esc_html__( 'White', 'igual-addon' ),
				'h-own'		=> esc_html__( 'Own Color', 'igual-addon' ),
			),
			'default'  => 'h-own'
		),
		array(
			'id'       => 'social-icons-bg',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Background', 'igual-addon' ),
			'desc'     => esc_html__( 'Social icons background color settings.', 'igual-addon' ),
			'choices'  => array(
				'bg-black'		=> esc_html__( 'Black', 'igual-addon' ),
				'bg-white'		=> esc_html__( 'White', 'igual-addon' ),
				'bg-light'		=> esc_html__( 'RGBA Light', 'igual-addon' ),
				'bg-dark'		=> esc_html__( 'RGBA Dark', 'igual-addon' ),
				'bg-own'		=> esc_html__( 'Own Color', 'igual-addon' ),
			),
			'default'  => ''
		),
		array(
			'id'       => 'social-icons-hbg',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Background Hover', 'igual-addon' ),
			'desc'     => esc_html__( 'Social icons background hover color settings.', 'igual-addon' ),
			'choices'  => array(
				'hbg-black'		=> esc_html__( 'Black', 'igual-addon' ),
				'hbg-white'		=> esc_html__( 'White', 'igual-addon' ),
				'hbg-light'		=> esc_html__( 'RGBA Light', 'igual-addon' ),
				'hbg-dark'		=> esc_html__( 'RGBA Dark', 'igual-addon' ),
				'hbg-own'		=> esc_html__( 'Own Color', 'igual-addon' ),
			),
			'default'  => ''
		),
		array(
			'id'			=> 'social-links',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Social Links', 'igual-addon' ),
			'description'	=> esc_html__( 'These are social links settings. Drag and drop needed social links to enabled part', 'igual-addon' ),
			'html'			=> true,
			'default'		=> array(
				'enabled' => array(
					'facebook' => 'fa fa-facebook',
					'twitter' => 'bi bi-twitter-x',
					'linkedin' => 'fa fa-linkedin',
					'instagram' => 'fa fa-instagram'
				),
				'disabled' => array(
					'vimeo' => 'fa fa-vimeo',
					'yahoo' => 'fa fa-yahoo',
					'youtube' => 'fa fa-youtube-play',
					'tumblr ' => 'fa fa-tumblr',
					'stack-overflow' => 'fa fa-stack-overflow',
					'pinterest' => 'fa fa-pinterest-p',
					'jsfiddle' => 'fa fa-jsfiddle',
					'reddit' => 'fa fa-reddit-alien',
					'soundcloud' => 'fa fa-soundcloud',
					'xing' => 'fa fa-xing',
					'wikipedia' => 'fa fa-wikipedia-w',
					'whatsapp' => 'fa fa-whatsapp',
					'tiktok' => 'bi bi-tiktok',
				)
			)
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Social Share', 'igual-addon' ),
	'id'         => 'social-share-tab',
	'fields'	 => array(
		array(
			'id'			=> 'social-share',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Social Share', 'igual-addon' ),
			'description'	=> esc_html__( 'These are social share links settings. Drag and drop needed social share to enabled part', 'igual-addon' ),
			'html'			=> true,
			'icons_only'	=> true,
			'default'		=> array(
				'enabled' => array(
					'facebook' => 'fa fa-facebook',
					'twitter' => 'bi bi-twitter-x',
					'linkedin' => 'fa fa-linkedin',
					'instagram' => 'fa fa-instagram'
				),
				'disabled' => array(
					'pinterest' => 'fa fa-pinterest-p'
				)
			)
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'social-tab-end'
));

/**
 * Detect plugin. For frontend only.
 */
include_once ABSPATH . 'wp-admin/includes/plugin.php';
 
// check for plugin using plugin name
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/woo-config.php' );
} 

// Maintenance or Coming Soon Mode
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Maintenance', 'igual-addon' ),
	'id'         => 'maintenance-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Maintenance', 'igual-addon' ),
	'id'         => 'maintenance-general-tab',
	'fields'	 => array(
		array(
			'id'			=> 'maintenance-opt',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Maintenance Mode Option', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or Disable maintenance mode.', 'igual-addon' ),
			'default'		=> false
		),
		array(
			'id'       => 'maintenance-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Maintenance Type', 'igual-addon' ),
			'desc'     => esc_html__( 'Select maintenance mode page coming soon or maintenance.', 'igual-addon' ),
			'choices'  => array(
				'cs'		=> esc_html__( 'Coming Soon', 'igual-addon' ),
				'mn'		=> esc_html__( 'Maintenance', 'igual-addon' ),
				'cus'		=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'  => 'cs',
			'required'		=> array( 'maintenance-opt', '=', array( 'true' ) )
		),
		array(
			'id'       => 'maintenance-custom',
			'type'     => 'pages',
			'title'    => esc_html__( 'Maintenance Custom Page', 'igual-addon' ),
			'desc'     => esc_html__( 'Enter service slug for register custom post type.', 'igual-addon' ),
			'default'  => '',
			'required'		=> array( 'maintenance-type', '=', array( 'cus' ) )
		),
		array(
			'id'			=> 'maintenance-phone',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Phone', 'igual-addon' ),
			'description'	=> esc_html__( 'Enter phone number shown on when maintenance mode actived.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'maintenance-opt', '=', array( 'true' ) )
		),		
		array(
			'id'			=> 'maintenance-email',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Email', 'igual-addon' ),
			'description'	=> esc_html__( 'Enter email id shown on when maintenance mode actived', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'maintenance-opt', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'maintenance-address',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Address', 'igual-addon' ),
			'description'	=> esc_html__( 'Place here your address and info', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'maintenance-opt', '=', array( 'true' ) )
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'maintenance-tab-end'
) );

// Import/Export
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Import/Export', 'igual-addon' ),
	'id'         => 'ie-tab'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Import', 'igual-addon' ),
	'id'         => 'import-tab',
	'fields'	 => array(
		array(
			'id'			=> 'igual-import',
			'type'			=> 'import',
			'title'			=> esc_html__( 'Theme Option Json', 'igual-addon' ),
			'description'	=> esc_html__( 'Paste theme options json value here and press import button and wait untill process complete. Once saved theme options please hard refresh your frontend, so only dynamically generated CSS will update.', 'igual-addon' ),
			'default'		=> ''
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Export', 'igual-addon' ),
	'id'         => 'export-tab',
	'fields'	 => array(
		array(
			'id'			=> 'igual-export',
			'type'			=> 'export',
			'title'			=> esc_html__( 'Export Theme Option Json', 'igual-addon' ),
			'description'	=> esc_html__( 'Get your theme option json values by click export button. Once click export button wait few seconds.', 'igual-addon' ),
			'default'		=> ''
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'ie-tab-end'	
));

/*
//All Fields
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'All Fields', 'igual-addon' ),
	'id'         => 'all-fields'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Fields', 'igual-addon' ),
	'id'         => 'un-fields-tab',
	'fields'	 => array(
		array(
			'id'			=> 'test_text_field',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Text Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is text field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'test_textarea_field',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Textarea Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is textarea field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'test_select_field',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Select Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is select field', 'igual-addon' ),
			'choices'		=> array(
				'1'	=> 'One',
				'2'	=> 'Two',
				'3'	=> 'Three'
			),
			'default'		=> '2'
		),
		array(
			'id'			=> 'test_color_field',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Color Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color field', 'igual-addon' ),
			'alpha'			=> false,
			'default'		=> '#111111'
		),
		array(
			'id'			=> 'test_link_field',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Link Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'ajax-trigger-fonts-test',
			'type'			=> 'fonts',
			'title'			=> esc_html__( 'Google Fonts Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is fonts field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'background_test',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Background Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'image_test',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Image Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is image field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'border_test',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Border Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'dimension_test',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Dimension Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is dimension field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'hw_test',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Width/Height Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is width height field', 'igual-addon' ),
			'only_dimension' => 'both'
		),
		array(
			'id'			=> 'toggle_test',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Toggle Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is toggle field', 'igual-addon' )
		),
		array(
			'id'			=> 'sidebars_test',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Sidebars Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is sidebars field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'pages_test',
			'type'			=> 'pages',
			'title'			=> esc_html__( 'Pages Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is pages field', 'igual-addon' ),
			'default'		=> ''
		),
		array(
			'id'			=> 'multicheck_test',
			'type'			=> 'multicheck',
			'title'			=> esc_html__( 'Multi Check Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is multi check box field', 'igual-addon' ),
			'items'		=> array(
				'one' => esc_html__( 'One', 'igual-addon' ),
				'two' => esc_html__( 'Two', 'igual-addon' ),
				'three' => esc_html__( 'Three', 'igual-addon' ),
				'four' => esc_html__( 'Four', 'igual-addon' ),
				'five' => esc_html__( 'Five', 'igual-addon' )
			)
		),
		array(
			'id'			=> 'radioimage_test',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Radio Image Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is radio image field', 'igual-addon' ),
			'items'		=> array(
				'right-sidebar' => array(
					'title' => esc_html__( 'Right Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-right.png'
				),
				'left-sidebar' => array(
					'title' => esc_html__( 'Left Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-left.png'
				),
				'both-sidebar' => array(
					'title' => esc_html__( 'Both Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/sidebar-both.png'
				),
				'no-sidebar' => array(
					'title' => esc_html__( 'No Sidebar', 'igual-addon' ),
					'url' => IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/images/sidebars/no-sidebar.png'
				)
			),
			'default' => 'left-sidebar'
		),
		array(
			'id'			=> 'dragdrop_test',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Drag Drop Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is drag and drop field', 'igual-addon' ),
			'default'		=> array(
				'enabled' => array(
					'one' => esc_html__( 'One', 'igual-addon' ),
					'two' => esc_html__( 'Two', 'igual-addon' )
				),
				'disabled' => array(
					'three' => esc_html__( 'Three', 'igual-addon' ),
					'four' => esc_html__( 'Four', 'igual-addon' ),
					'five' => esc_html__( 'Five', 'igual-addon' )
				)
			)
		),
		array(
			'id'			=> 'test_label_field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Label Field', 'igual-addon' ),
			'description'	=> esc_html__( 'This is label field', 'igual-addon' ),
			'seperator'		=> 'after'
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'all-fields-end'	
));*/