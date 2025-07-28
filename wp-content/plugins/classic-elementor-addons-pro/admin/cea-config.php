<?php

//General Tab
ceaPluginOptions::ceaSetSection( array(
	'title'      => esc_html__( 'General', 'classic-elementor-addons-pro' ),
	'id'         => 'cea-general-tab',
	'fields'	 => array(
		array(
			'id'       => 'cpt-gmap-api',
			'type'     => 'text',
			'title'    => esc_html__( 'Google Map API', 'classic-elementor-addons-pro' ),
			'desc'     => esc_html__( 'Enter google map api.', 'classic-elementor-addons-pro' ) .'<a href="https://developers.google.com/maps/documentation/embed/get-api-key" target="_blank"> '. esc_html__( 'Get google map api key here.', 'classic-elementor-addons-pro' ) .'</a>',
			'default'  => ''
		),
		array(
			'id'       => 'mailchimp-api',
			'type'     => 'text',
			'title'    => esc_html__( 'Mailchimp API', 'classic-elementor-addons-pro' ),
			'desc'     => esc_html__( 'Enter mailchimp api.', 'classic-elementor-addons-pro' ) .'<a href="https://mailchimp.com/" target="_blank"> '. esc_html__( 'Get mailchimp api key here.', 'classic-elementor-addons-pro' ) .'</a>',
			'default'  => ''
		),
	)
) );

//Social Tab
ceaPluginOptions::ceaSetSection( array(
	'title'      => esc_html__( 'Social Share', 'cea-post-types' ),
	'id'         => 'cea-social-tab',
	'fields'	 => array( 
		array(
			'id'      => 'social-shares',
			'type'    => 'dragdrop',
			'title'   => esc_html__( 'Social Share', 'cea-post-types' ),
			'desc'    => esc_html__( 'Needed social items drag from disabled and put enabled part.', 'cea-post-types' ),
			'options' => array(
				'Enabled'  => array(
					'fb'		=> esc_html__( 'Facebook', 'cea-post-types' ),
					'twitter'	=> esc_html__( 'Twitter', 'cea-post-types' ),
					'linkedin'	=> esc_html__( 'Linkedin', 'cea-post-types' ),
					'pinterest'	=> esc_html__( 'Pinterest', 'cea-post-types' ),
				),
				'disabled' => array(
				)
			)
		),
	)
) );

do_action( 'cea_post_type_config' );