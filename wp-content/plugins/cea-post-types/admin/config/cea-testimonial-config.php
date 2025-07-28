<?php

//Testimonial Tab
ceaPluginOptions::ceaSetSection( array(
	'title'      => esc_html__( 'Testimonial', 'cea-post-types' ),
	'id'         => 'cea-testimonial-tab',
	'fields'	 => array(
		array(
			'id'       => 'testimonial-title-opt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Testimonial Title', 'cea-post-types' ),
			'subtitle' => esc_html__( 'Enable/Disable testimonial title on single testimonial( not page title ).', 'cea-post-types' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enable', 'cea-post-types' ),
			'off'      => esc_html__( 'Disable', 'cea-post-types' ),
		),
		array(
			'id'       => 'cpt-testimonial-slug',
			'type'     => 'text',
			'title'    => esc_html__( 'Testimonial Slug', 'cea-post-types' ),
			'desc'     => esc_html__( 'Enter testimonial slug for register custom post type.', 'cea-post-types' ),
			'default'  => 'testimonial'
		),
		array(
			'id'       => 'cpt-testimonial-sidebars',
			'type'     => 'select',
			'title'    => esc_html__( 'Testimonial Sidebar', 'cea-post-types' ),
			'desc'     => esc_html__( 'Select single testimonial sidebar.', 'cea-post-types' ),
			'sidebars'  => true
		)
	)
) );