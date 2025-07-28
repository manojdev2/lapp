<?php

Igual_Options::$igual_options = get_post_meta( get_the_ID(), 'igual_post_meta', true );

// General
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'General', 'igual-addon' ),
	'id'         => 'general-tab'
) );

Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Site General', 'igual-addon' ),
	'id'         => 'site-general',
	'fields'	 => array(
		array(
			'id'			=> 'general-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Site General Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit site general settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
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
			'default' => 'wide',
			'required'		=> array( 'general-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'content-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Content Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'Assign content padding. If need no padding means just leave this empty. Example 10 10 10 10', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'general-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-slider',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Header Slider', 'igual-addon' ),
			'description'	=> esc_html__( 'Enter shortcode for header slider.', 'igual-addon' ),
			'default'		=> '',
		)		
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Logo Settings', 'igual-addon' ),
	'id'         => 'site-logo',
	'fields'	 => array(
		array(
			'id'			=> 'logo-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Site General Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit site logo settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'logo-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Logo Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for site logo.', 'igual-addon' ),
			'seperator'		=> 'after',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'site-logo',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Default Logo', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose site logo image.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'site-logo-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Site Logo Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of logo. if you want original width leave this field empty.', 'igual-addon' ),
			'only_dimension' => 'width',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'site-logo-desc',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable Site Logo Description', 'igual-addon' ),
			'description'	=> esc_html__( 'This is logo description options for this site. You can enable or disable.', 'igual-addon' ),
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'sticky-logo',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Sticky Logo', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose site sticky logo image.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'sticky-logo-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Sticky Logo Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of sticky logo. if you want original width leave this field empty.', 'igual-addon' ),
			'only_dimension' => 'width',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'mobile-logo',
			'type'			=> 'image',
			'title'			=> esc_html__( 'Mobile Logo', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose site mobile logo image.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'mobile-logo-width',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Mobile Logo Maximum Width', 'igual-addon' ),
			'description'	=> esc_html__( 'This is maximum width of mobile logo. if you want original width leave this field empty.', 'igual-addon' ),
			'only_dimension' => 'width',
			'required'		=> array( 'logo-chk', '=', array( 'custom' ) )
		),
	)
) );

Igual_Options::igual_set_end_section( array(
	'id'		=> 'general-tab-end'	
));

$igual_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
$igual_nav_menus = array( "none" => esc_html__( "None", "igual-addon" ) );
foreach( $igual_menus as $menu ){
	$igual_nav_menus[$menu->slug] = $menu->name;
}

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
			'id'			=> 'header-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Header Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'header-one-page-menu',
			'type'			=> 'select',
			'title'			=> esc_html__( 'One Page Menu', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header settings options.', 'igual-addon' ),
			'choices'		=> $igual_nav_menus,
			'default'		=> 'none'
		),
		array(
			'id'			=> 'header-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Header Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose header layout either wide or boxed.', 'igual-addon' ),
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
			'default' => 'wide',
			'required'		=> array( 'header-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Header Bars', 'igual-addon' ),
			'description'	=> esc_html__( 'These are header items. Drag which items you want to display normal and sticky.', 'igual-addon' ),
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
			),
			'required'		=> array( 'header-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-absolute',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Header Absolute', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable/Disable header absolute. Like floating on slider', 'igual-addon' ),
			'default'		=> false,
			'required'		=> array( 'header-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'search-type',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Search Toggle Modal', 'igual-addon' ),
			'description'	=> esc_html__( 'Slect search box type', 'igual-addon' ),
			'choices'		=> array(
				'1'	=> esc_html__( 'Full Screen Search', 'igual-addon' ),
				'2' => esc_html__( 'Text Box Toggle Search', 'igual-addon' ),
				'3' => esc_html__( 'Full Bar Toggle Search', 'igual-addon' ),
				'4' => esc_html__( 'Bottom Seach Box Toggle', 'igual-addon' )
			),
			'default'		=> '1',
			'required'		=> array( 'header-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-style-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Header Style Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header style settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'header-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Header Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Header Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Header Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for header', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Header padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for header', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Header margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for header', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-style-chk', '=', array( 'custom' ) )
		)
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Topbar', 'igual-addon' ),
	'id'         => 'header-topbar',
	'fields'	 => array(
		array(
			'id'			=> 'header-topbar-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Header Topbar Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header topbar settings.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'topbar-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Topbar Custom Text 1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is topbar custom text field. Here you can place shortcodes too', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'topbar-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Topbar Custom Text 2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is topbar custom text field. Here you can place shortcodes too', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'topbar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Topbar Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are topbar items. You can make your own layout by drag and drop', 'igual-addon' ),
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
			),
			'required'		=> array( 'header-topbar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Topbar Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header topbar styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-topbar-style-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Topbar Style Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header topbar style settings.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'header-topbar-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Topbar Height', 'igual-addon' ),
			'description'	=> esc_html__( 'This is height property of header topbar.', 'igual-addon' ),
			'only_dimension' => 'height',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-sticky-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Topbar Sticky Height', 'igual-addon' ),
			'description'	=> esc_html__( 'This is height property of header sticky topbar.', 'igual-addon' ),
			'only_dimension' => 'height'
		),
		array(
			'id'			=> 'header-topbar-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Topbar Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header topbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Topbar Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header topbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Topbar Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for header topbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Topbar padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for header topbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Topbar margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for header topbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),	
		array(
			'id'			=> 'header-topbar-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Topbar Sticky Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header topbar sticky styles.', 'igual-addon' ),
			'seperator'		=> 'before',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Topbar Sticky Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header topbar on sticky', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-topbar-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Topbar Sticky Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header topbar on sticky', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-topbar-style-chk', '=', array( 'custom' ) )
		),	
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Logo bar', 'igual-addon' ),
	'id'         => 'header-logobar',
	'fields'	 => array(
		array(
			'id'			=> 'header-logobar-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Header Logo bar Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header logo bar settings.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'logobar-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Logobar Custom Text1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is logo custom text field. Here you can place shortcodes too', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'logobar-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Logobar Custom Text2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is logo custom text field. Here you can place shortcodes too', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'logobar-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'Logo bar Items', 'igual-addon' ),
			'description'	=> esc_html__( 'These all are logobar items. You can make your own layout by drag and drop', 'igual-addon' ),
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
			),
			'required'		=> array( 'header-logobar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Logo bar Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header logobar styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-logobar-style-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Logo bar Style Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header logo bar style settings.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'header-logobar-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Logo bar Height', 'igual-addon' ),
			'description'	=> esc_html__( 'This is height property of header logobar.', 'igual-addon' ),
			'only_dimension' => 'height',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-sticky-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Logo bar Sticky Height', 'igual-addon' ),
			'description'	=> esc_html__( 'This is height property of header sticky logobar.', 'igual-addon' ),
			'only_dimension' => 'height'
		),
		array(
			'id'			=> 'header-logobar-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Logo bar Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header logobar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Header Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header logobar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Logo bar Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for header logobar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Logo bar padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for header logobar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Logo bar margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for header logobar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),	
		array(
			'id'			=> 'header-logobar-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Logobar Sticky Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header logobar sticky styles.', 'igual-addon' ),
			'seperator'		=> 'before',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Logobar Sticky Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header logobar on sticky', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-logobar-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Logobar Sticky Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header logobar on sticky', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-logobar-style-chk', '=', array( 'custom' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Navbar', 'igual-addon' ),
	'id'         => 'header-navbar',
	'fields'	 => array(
		array(
			'id'			=> 'header-navbar-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Header Navbar Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header navbar settings.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'navbar-custom-text-1',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Navbar Custom Text 1', 'igual-addon' ),
			'description'	=> esc_html__( 'This is nav custom text field. Here you can place shortcodes too', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'navbar-custom-text-2',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Navbar Custom Text 2', 'igual-addon' ),
			'description'	=> esc_html__( 'This is nav custom text field. Here you can place shortcodes too', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-chk', '=', array( 'custom' ) )
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
			),
			'required'		=> array( 'header-navbar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Navbar Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header navbar styles.', 'igual-addon' ),
			'seperator'		=> 'before'
		),
		array(
			'id'			=> 'header-navbar-style-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Navbar Style Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit header logo bar style settings.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'header-navbar-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Navbar Height', 'igual-addon' ),
			'description'	=> esc_html__( 'This is height property of header navbar.', 'igual-addon' ),
			'only_dimension' => 'height',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-sticky-height',
			'type'			=> 'hw',
			'title'			=> esc_html__( 'Header Navbar Sticky Height', 'igual-addon' ),
			'description'	=> esc_html__( 'This is height property of header sticky navbar.', 'igual-addon' ),
			'only_dimension' => 'height'
		),
		array(
			'id'			=> 'header-navbar-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Navbar Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header navbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Header Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header navbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-border',
			'type'			=> 'border',
			'title'			=> esc_html__( 'Navbar Border', 'igual-addon' ),
			'description'	=> esc_html__( 'This is border setting for header navbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Navbar padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding setting for header navbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-margin',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Navbar margin', 'igual-addon' ),
			'description'	=> esc_html__( 'This is margin setting for header navbar', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),	
		array(
			'id'			=> 'header-navbar-sticky-style-label-field',
			'type'			=> 'label',
			'title'			=> esc_html__( 'Navbar Sticky Styles', 'igual-addon' ),
			'description'	=> esc_html__( 'Here you can set all the type of header navbar sticky styles.', 'igual-addon' ),
			'seperator'		=> 'before',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-sticky-links-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'Navbar Sticky Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for header navbar on sticky', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'header-navbar-sticky-background',
			'type'			=> 'background',
			'title'			=> esc_html__( 'Navbar Sticky Background Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background setting for header navbar on sticky', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'header-navbar-style-chk', '=', array( 'custom' ) )
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'header-tab-end'	
));

//Layout Settings
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'Layout', 'igual-addon' ),
	'id'         => 'post-layout'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Page Title', 'igual-addon' ),
	'id'         => 'page-title-options',
	'fields'	 => array(
		array(
			'id'			=> 'page-title-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit page title options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'page-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable blog page title section', 'igual-addon' ),
			'default'		=> true,
			'required'		=> array( 'page-title-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'page-title-items',
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
			'id'			=> 'page-title-custom-class',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Page Title Custom Class', 'igual-addon' ),
			'description'	=> esc_html__( 'This is setting for add custom class name to page title wrapper.', 'igual-addon' ),
			'required'		=> array( 'page-title', '=', array( 'true' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Sidebar Layout', 'igual-addon' ),
	'id'         => 'sidebar-layout-options',
	'fields'	 => array(
		array(
			'id'			=> 'sidebar-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Sidebar', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit sidebar layout options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose sidebar layout.', 'igual-addon' ),
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
			'default' => 'right-sidebar',
			'required'		=> array( 'sidebar-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		)
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'post-layout-end'	
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
			'id'			=> 'footer-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Footer Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit footer settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
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
			'default' => 'wide',
			'required'		=> array( 'footer-chk', '=', array( 'custom' ) )
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
			),
			'required'		=> array( 'footer-chk', '=', array( 'custom' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Footer Top', 'igual-addon' ),
	'id'         => 'footer-insta',
	'fields'	 => array(
		array(
			'id'			=> 'insta-footer-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Footer Top Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit insta footer settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
		array(
			'id'			=> 'insta-footer-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'Footer Top Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose insta footer layout either wide or boxed.', 'igual-addon' ),
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
			'default' => 'wide',
			'required'		=> array( 'insta-footer-chk', '=', array( 'custom' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Footer Widgets', 'igual-addon' ),
	'id'         => 'footer-widgets',
	'fields'	 => array(
		array(
			'id'			=> 'footer-middle-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Footer Widgets Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit footer middle settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
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
			'default' => 'boxed',
			'required'		=> array( 'footer-middle-chk', '=', array( 'custom' ) )
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
			'default' => '12',
			'required'		=> array( 'footer-middle-chk', '=', array( 'custom' ) )
		),
		array(
			'id'			=> 'footer-widget-1',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Footer Widgets Area 1', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for footer widget area 1', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'footer-middle-chk', '=', array( 'custom' ) )
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
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'Copyright Section', 'igual-addon' ),
	'id'         => 'copyright-section',
	'fields'	 => array(
		array(
			'id'			=> 'footer-bottom-chk',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Footer Widgets Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose custom to edit footer middle settings options.', 'igual-addon' ),
			'choices'		=> array(
				'default'	=> esc_html__( 'Default', 'igual-addon' ),
				'custom'	=> esc_html__( 'Custom', 'igual-addon' )
			),
			'default'		=> 'default'
		),
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
			'default' => 'boxed',
			'required'		=> array( 'footer-bottom-chk', '=', array( 'custom' ) )
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'footer-end'	
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