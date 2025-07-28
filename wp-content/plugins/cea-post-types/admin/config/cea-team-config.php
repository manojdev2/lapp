<?php

//Team Tab
ceaPluginOptions::ceaSetSection( array(
	'title'      => esc_html__( 'Team', 'cea-post-types' ),
	'id'         => 'cea-team-tab',
	'fields'	 => array(
		array(
			'id'       => 'team-title-opt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Team Title', 'cea-post-types' ),
			'subtitle' => esc_html__( 'Enable/Disable team title on single team( not page title ).', 'cea-post-types' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enable', 'cea-post-types' ),
			'off'      => esc_html__( 'Disable', 'cea-post-types' ),
		),
		array(
			'id'       => 'cpt-team-slug',
			'type'     => 'text',
			'title'    => esc_html__( 'Team Slug', 'cea-post-types' ),
			'desc'     => esc_html__( 'Enter team slug for register custom post type.', 'cea-post-types' ),
			'default'  => 'team'
		),
		array(
			'id'       => 'cpt-team-sidebars',
			'type'     => 'select',
			'title'    => esc_html__( 'Team Sidebar', 'cea-post-types' ),
			'desc'     => esc_html__( 'Select single team sidebar.', 'cea-post-types' ),
			'sidebars'  => true
		)
	)
) );