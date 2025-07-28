<?php

//Service Tab
ceaPluginOptions::ceaSetSection( array(
	'title'      => esc_html__( 'Service', 'cea-post-types' ),
	'id'         => 'cea-service-tab',
	'fields'	 => array(
		array(
			'id'       => 'service-title-opt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Service Title', 'cea-post-types' ),
			'subtitle' => esc_html__( 'Enable/Disable service title on single service( not page title ).', 'cea-post-types' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enable', 'cea-post-types' ),
			'off'      => esc_html__( 'Disable', 'cea-post-types' ),
		),
		array(
			'id'       => 'cpt-service-slug',
			'type'     => 'text',
			'title'    => esc_html__( 'Service Slug', 'cea-post-types' ),
			'desc'     => esc_html__( 'Enter service slug for register custom post type.', 'cea-post-types' ),
			'default'  => 'service'
		),
		array(
			'id'       => 'service-grid-cols',
			'type'     => 'select',
			'title'    => esc_html__( 'Grid Columns', 'cea-post-types' ),
			'desc'     => esc_html__( 'Select grid columns.', 'cea-post-types' ),
			'options'  => array(
				'4'		=> esc_html__( '4 Columns', 'cea-post-types' ),
				'3'		=> esc_html__( '3 Columns', 'cea-post-types' ),
				'2'		=> esc_html__( '2 Columns', 'cea-post-types' ),
			),
			'default'  => '2'
		),
		array(
			'id'       => 'service-grid-gutter',
			'type'     => 'text',
			'title'    => esc_html__( 'Services Archive Grid Gutter', 'cea-post-types' ),
			'subtitle' => esc_html__( 'Enter grid gutter size. Example 20.', 'cea-post-types' ),
			'default'  => '20'
		),
		array(
			'id'       => 'service-grid-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Grid Type', 'cea-post-types' ),
			'desc'     => esc_html__( 'Select grid type normal or isotope.', 'cea-post-types' ),
			'options'  => array(
				'normal'		=> esc_html__( 'Normal Grid', 'cea-post-types' ),
				'isotope'		=> esc_html__( 'Isotope Grid', 'cea-post-types' ),
			),
			'default'  => 'isotope'
		),
		array(
			'id'       => 'cpt-service-sidebars',
			'type'     => 'select',
			'title'    => esc_html__( 'Service Sidebar', 'cea-post-types' ),
			'desc'     => esc_html__( 'Select single service sidebar.', 'cea-post-types' ),
			'sidebars'  => true
		)
	)
) );