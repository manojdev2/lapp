<?php

//Event Tab
ceaPluginOptions::ceaSetSection( array(
	'title'      => esc_html__( 'Event', 'cea-post-types' ),
	'id'         => 'cea-event-tab',
	'fields'	 => array(
		array(
			'id'       => 'event-title-opt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Event Title', 'cea-post-types' ),
			'subtitle' => esc_html__( 'Enable/Disable event title on single event( not page title ).', 'cea-post-types' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enable', 'cea-post-types' ),
			'off'      => esc_html__( 'Disable', 'cea-post-types' ),
		),
		array(
			'id'       => 'cpt-event-slug',
			'type'     => 'text',
			'title'    => esc_html__( 'Event Slug', 'cea-post-types' ),
			'desc'     => esc_html__( 'Enter event slug for register custom post type.', 'cea-post-types' ),
			'default'  => 'event'
		),
		array(
			'id'       => 'cpt-event-sidebars',
			'type'     => 'select',
			'title'    => esc_html__( 'Event Sidebar', 'cea-post-types' ),
			'desc'     => esc_html__( 'Select single event sidebar.', 'cea-post-types' ),
			'sidebars'  => true
		)
	)
) );