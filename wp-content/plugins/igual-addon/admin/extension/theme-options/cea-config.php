<?php 

//CEA Templates Fields
Igual_Options::igual_set_section( array(
	'title'      => esc_html__( 'CEA Templates', 'igual-addon' ),
	'id'         => 'cea-templates'
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'CEA Service', 'igual-addon' ),
	'id'         => 'cea-service-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'cea-service-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Service Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA service title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-service-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable CEA service title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'cea-service-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'CEA Service Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are CEA service page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
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
			'required'		=> array( 'cea-service-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-service-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Service Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA service title.', 'igual-addon' ),
			'required'		=> array( 'cea-service-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-service-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Service Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA service description.', 'igual-addon' ),
			'required'		=> array( 'cea-service-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-service-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'CEA Service Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for CEA service title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-service-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-service-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common CEA service title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-service-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-service-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'CEA Service Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of CEA service title.', 'igual-addon' ),
			'required'		=> array( 'cea-service-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-service-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Service Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA service page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-service-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'CEA Service Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose CEA service sidebar layout.', 'igual-addon' ),
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
			'id'			=> 'cea-service-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA service right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-service-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'cea-service-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA service left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-service-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'CEA Team', 'igual-addon' ),
	'id'         => 'cea-team-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'cea-team-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Team Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA team page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-team-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable CEA team page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'cea-team-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'CEA Team Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are CEA team page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
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
			'required'		=> array( 'cea-team-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-team-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Team Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA team title.', 'igual-addon' ),
			'required'		=> array( 'cea-team-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-team-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Team Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA team page description.', 'igual-addon' ),
			'required'		=> array( 'cea-team-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-team-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'CEA Team Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for CEA team page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-team-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-team-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common CEA team title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-team-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-team-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'CEA Team Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of CEA team page title.', 'igual-addon' ),
			'required'		=> array( 'cea-team-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-team-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Team Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA team layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-team-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'CEA Team Sidebar Layout', 'igual-addon' ),
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
			'id'			=> 'cea-team-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA team right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-team-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'cea-team-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA team left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-team-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'CEA Testimonial', 'igual-addon' ),
	'id'         => 'cea-testimonial-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'cea-testimonial-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Testimonial Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA testimonial page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-testimonial-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable CEA testimonial page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'cea-testimonial-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'CEA Testimonial Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are CEA testimonial title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
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
			'required'		=> array( 'cea-testimonial-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-testimonial-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Testimonial Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA testimonial title.', 'igual-addon' ),
			'required'		=> array( 'cea-testimonial-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-testimonial-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Testimonial Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA testimonial page description.', 'igual-addon' ),
			'required'		=> array( 'cea-testimonial-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-testimonial-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'CEA Testimonial Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for CEA testimonial page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-testimonial-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-testimonial-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common CEA testimonial title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-testimonial-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-testimonial-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'CEA Testimonial Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of CEA testimonial page title.', 'igual-addon' ),
			'required'		=> array( 'cea-testimonial-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-testimonial-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Testimonial Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA testimonial page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-testimonial-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'CEA Testimonial Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose CEA testimonial sidebar layout.', 'igual-addon' ),
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
			'id'			=> 'cea-testimonial-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA testimonial right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-testimonial-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'cea-testimonial-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA testimonial left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-testimonial-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'CEA Portfolio', 'igual-addon' ),
	'id'         => 'cea-portfolio-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'cea-portfolio-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Portfolio Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA portfolio page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-portfolio-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable CEA portfolio page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'cea-portfolio-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'CEA Portfolio Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are CEA portfolio page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
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
			'required'		=> array( 'cea-portfolio-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-portfolio-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Portfolio Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA portfolio page title.', 'igual-addon' ),
			'required'		=> array( 'cea-portfolio-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-portfolio-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Portfolio Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA portfolio post page description.', 'igual-addon' ),
			'required'		=> array( 'cea-portfolio-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-portfolio-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'CEA Portfolio Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for CEA portfolio post page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-portfolio-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-portfolio-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common CEA portfolio title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-portfolio-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-portfolio-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'CEA Portfolio Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of CEA portfolio post page title.', 'igual-addon' ),
			'required'		=> array( 'cea-portfolio-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-portfolio-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Portfolio Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA portfolio page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-portfolio-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'CEA Portfolio Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose CEA portfolio sidebar layout.', 'igual-addon' ),
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
			'id'			=> 'cea-portfolio-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA portfolio right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-portfolio-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'cea-portfolio-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA portfolio left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-portfolio-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_sub_section( array(
	'title'      => esc_html__( 'CEA Event', 'igual-addon' ),
	'id'         => 'cea-event-single-tab',
	'fields'	 => array(
		array(
			'id'			=> 'cea-event-pt-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Event Page Title Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA event page title.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-event-title',
			'type'			=> 'toggle',
			'title'			=> esc_html__( 'Enable/Disabe Page Title', 'igual-addon' ),
			'description'	=> esc_html__( 'Enable or disable CEA event page title section', 'igual-addon' ),
			'default'		=> true
		),
		array(
			'id'			=> 'cea-event-title-items',
			'type'			=> 'dragdrop',
			'title'			=> esc_html__( 'CEA Event Page Title Elements', 'igual-addon' ),
			'description'	=> esc_html__( 'These are CEA event page title elements. Drag which items you want to display left, center and right part.', 'igual-addon' ),
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
			'required'		=> array( 'cea-event-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-event-title-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Event Title Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA event page title.', 'igual-addon' ),
			'required'		=> array( 'cea-event-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-event-title-desc-color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'CEA Event Title Description Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is color settings of CEA event page description.', 'igual-addon' ),
			'required'		=> array( 'cea-event-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-event-title-link-color',
			'type'			=> 'link',
			'title'			=> esc_html__( 'CEA Event Title Link Color', 'igual-addon' ),
			'description'	=> esc_html__( 'This is link color setting for CEA event page title links. Like breadcrumbs color.', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-event-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-event-title-padding',
			'type'			=> 'dimension',
			'title'			=> esc_html__( 'Custom Single Title Padding', 'igual-addon' ),
			'description'	=> esc_html__( 'This is padding for common CEA event title. Example 10 for all side', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-event-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-event-title-bg',
			'type'			=> 'background',
			'title'			=> esc_html__( 'CEA Event Page Title Background', 'igual-addon' ),
			'description'	=> esc_html__( 'This is background settings of CEA event page title.', 'igual-addon' ),
			'required'		=> array( 'cea-event-title', '=', array( 'true' ) )
		),
		array(
			'id'			=> 'cea-event-pl-settings',
			'type'			=> 'label',
			'title'			=> esc_html__( 'CEA Event Page Layout Settings', 'igual-addon' ),
			'description'	=> esc_html__( 'This is settings for CEA event page layout.', 'igual-addon' ),
			'seperator'		=> 'after'
		),
		array(
			'id'			=> 'cea-event-sidebar-layout',
			'type'			=> 'radioimage',
			'title'			=> esc_html__( 'CEA Event Sidebar Layout', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose CEA event sidebar layout.', 'igual-addon' ),
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
			'id'			=> 'cea-event-right-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Right Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA event right widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-event-sidebar-layout', '=', array( 'right-sidebar', 'both-sidebar' ) )
		),
		array(
			'id'			=> 'cea-event-left-sidebar',
			'type'			=> 'sidebars',
			'title'			=> esc_html__( 'Left Widgets Area', 'igual-addon' ),
			'description'	=> esc_html__( 'Choose widget for CEA event left widget area', 'igual-addon' ),
			'default'		=> '',
			'required'		=> array( 'cea-event-sidebar-layout', '=', array( 'left-sidebar', 'both-sidebar' ) )
		),
	)
) );
Igual_Options::igual_set_end_section( array(
	'id'		=> 'cea-templates-tab-end'	
));