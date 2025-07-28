<?php 

if( ! function_exists('cea_star_rating') ) {
	function cea_star_rating( $rate ){
		$out = '';
		for( $i=1; $i<=5; $i++ ){
			
			if( $i == round($rate) ){
				if ( $i-0.5 == $rate ) {
					$out .= '<i class="fa fa-star-half-o"></i>';
				}else{
					$out .= '<i class="fa fa-star"></i>';
				}
			}else{
				if( $i < $rate ){
					$out .= '<i class="fa fa-star"></i>';
				}else{
					$out .= '<i class="fa fa-star-o"></i>';
				}
			}
		}// for end
		return $out;
	}
}

function cea_enqueue_custom_admin_style() {
	wp_register_style( 'cea_wp_admin_css', CEA_CORE_URL . 'assets/css/admin-style.css', false, '1.0.0' );
	wp_enqueue_style( 'cea_wp_admin_css' );
	
	//wp_register_script( 'jquery-ui', CEA_CORE_URL . 'assets/js/jqueryui.js', array( 'jquery' ), '1.12.1', true ); // old jqueryui.js
	wp_register_script( 'jquery-ui', CEA_CORE_URL . 'assets/js/jquery-ui.min.js',  array( 'jquery' ), '1.11.4', true );
	wp_register_script( 'cea_wp_admin_script', CEA_CORE_URL . 'assets/js/admin-script.js', array( 'jquery', 'jquery-ui' ), '1.0', true );
	
	$translation_array = array(
		'confirm_str' => esc_html__( 'Are you sure want to save?', 'classic-elementor-addons-pro' )
	);
	wp_localize_script( 'cea_wp_admin_script', 'cea_ajax_var', $translation_array );
	
	wp_enqueue_script( 'cea_wp_admin_script' );
		
	
}
add_action( 'admin_enqueue_scripts', 'cea_enqueue_custom_admin_style' );

function cea_excerpt_more( $more ) {
    return '..';
}

function cea_shortcode_rand_id() {
	static $shortcode_rand = 1;
	return $shortcode_rand++;
}

/*Custom Shortcodes*/
require_once( CEA_CORE_DIR . 'inc/shortcodes.php' );

/*Image Size Check*/
require_once( CEA_CORE_DIR . 'inc/aq_resizer.php' );
function cea_get_custom_size_image( $custom_size = array(), $hard_crop = false, $img_id = '' ){
	$img_sizes = $img_width = $img_height = $src = '';
	$img_stat = 0;
	$custom_img_size = '';
	
	$img_id = $img_id != '' ? $img_id : get_post_thumbnail_id( get_the_ID() );

	if( class_exists('Aq_Resize') ) {
		$src = wp_get_attachment_image_src( $img_id, "full", false, '' );
		$img_width = $img_height = '';
		if( !empty( $custom_size ) ){
			$img_width = isset( $custom_size[0] ) ? $custom_size[0] : '';
			$img_height = isset( $custom_size[1] ) ? $custom_size[1] : '';
			
			$cropped_img = aq_resize( $src[0], $img_width, $img_height, $hard_crop, false );
			if( $cropped_img ){
				$img_src = isset( $cropped_img[0] ) ? $cropped_img[0] : '';
				$img_width = isset( $cropped_img[1] ) ? $cropped_img[1] : '';
				$img_height = isset( $cropped_img[2] ) ? $cropped_img[2] : '';
			}else{
				$img_stat = 1;
			}
		}else{
			$img_stat = 1;
		}
		
	}
	if( $img_stat ){
		
		$src = wp_get_attachment_image_src( $img_id, 'large', false, '' );
		$img_src = $src[0];
		$img_width = isset( $src[1] ) ? $src[1] : '';
		$img_height = isset( $src[2] ) ? $src[2] : '';
	}
	
	return array( $img_src, $img_width, $img_height );
}

function cea_menuFaIcons(){
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$fontawesome_path = CEA_CORE_URL . 'assets/css/font-awesome.css';  
		
	$response = wp_remote_get( $fontawesome_path );
	if( is_array($response) ) {
		$file = $response['body']; // use the content
		preg_match_all($pattern, $file, $str, PREG_SET_ORDER);
		return $str;
	}
	return '';
}

function cea_menuTiIcons(){
	$pattern = '/\.(ti-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$ti_path = CEA_CORE_URL . 'assets/css/themify-icons.css';
		
	$response = wp_remote_get( $ti_path );
	if( is_array( $response ) ) {
		$file = $response['body']; // use the content
		preg_match_all($pattern, $file, $str, PREG_SET_ORDER);
		return $str;
	}	
	return '';
}

function cea_menu_bi_icons(){
	$pattern = '/\.(bi-(?:\w+(?:-)?)+)::before\s+{\s*content:\s*"(.+)";\s+}/';
	$bi_path = CEA_CORE_URL . 'assets/css/bootstrap-icons.css';  
		
	$response = wp_remote_get( $bi_path );
	if( is_array($response) ) {
		$file = $response['body']; // use the content
		preg_match_all($pattern, $file, $str, PREG_SET_ORDER);
		return $str;
	}
	return '';
}

// Hook the custom controls function for both sections and containers
add_action('elementor/element/section/section_typo/after_section_end', 'my_custom_elementor_controls_section', 10, 2);
add_action('elementor/element/container/section_layout/after_section_end', 'my_custom_elementor_controls_section', 10, 2);

// Callback function to add custom controls for sections
function my_custom_elementor_controls_section($element, $args) {

	if (('section' === $element->get_name()) || ('container' === $element->get_name())){
	//Rain Drops Settings
	$element->start_controls_section(
		'section_rain_drops',
		[
			'label' => __( 'Rain Drops Settings', 'classic-elementor-addons-pro' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	$element->add_control(
		"rd_opt",
		[
			"label" 		=> esc_html__( "Enable/Disable Rain Drops", 'classic-elementor-addons-pro' ),
			"type" 			=> \Elementor\Controls_Manager::SWITCHER,
			"label_off" 	=> esc_html__( 'Off', 'classic-elementor-addons-pro' ),
			"label_on" 		=> esc_html__( 'On', 'classic-elementor-addons-pro' ),
			"default" 		=> "no"
		]
	);
	$element->add_control(
		'rd_color',
		[
			'label' => __( 'Canvas Color', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			"description"	=> esc_html__( "Here you can define rain drop canvas color. Example #333333", 'classic-elementor-addons-pro' ),
			'placeholder' => "#333333",
			"default" 		=> "#333333"
		]
	);		
	$element->add_control(
		'rd_height',
		[
			'label' => __( 'Canvas Height', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			"description"	=> esc_html__( "Here you can define rain drop canvas height. Example 100", 'classic-elementor-addons-pro' ),
			'placeholder' => '100',
			"default" => "100"
		]
	);
	$element->add_control(
		'rd_speed',
		[
			'label' => __( 'Rain Drop Speed', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			"description"	=> esc_html__( "Here you can define rain drop speed. Example 0.01", 'classic-elementor-addons-pro' ),
			'placeholder' => "0.01",
			"default" 		=> "0.01"
		]
	);
	$element->add_control(
		'rd_frequency',
		[
			'label' => __( 'Rain Drop Frequency', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			"description"	=> esc_html__( "Here you can define rain drop frequency. Example 1", 'classic-elementor-addons-pro' ),
			'placeholder' => "1",
			"default" 		=> "1"
		]
	);
	$element->add_control(
		'rd_density',
		[
			'label' => __( 'Rain Drop Density', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			"description"	=> esc_html__( "Here you can define rain drop density. Example 0", 'classic-elementor-addons-pro' ),
			'placeholder' => "0",
			"default" 		=> "0"
		]
	);
	$element->add_control(
		'rd_pos',
		[
			'label' => __( 'Rain Drop Canvas Position', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'top',
			'options' => [
				'top' 		=> __( 'Top', 'classic-elementor-addons-pro' ),
				'bottom' 	=> __( 'Bottom', 'classic-elementor-addons-pro' )
			]
		]
	);	
	$element->end_controls_section();
	
	//Floating Image Settings
	$element->start_controls_section(
		'section_float_img',
		[
			'label' => __( 'Float Image Settings', 'classic-elementor-addons-pro' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	$element->add_control(
		"float_img_opt",
		[
			"label" 		=> esc_html__( "Float Image Option", 'classic-elementor-addons-pro' ),
			"type" 			=> \Elementor\Controls_Manager::SWITCHER,
			"label_off" 	=> esc_html__( 'Off', 'classic-elementor-addons-pro' ),
			"label_on" 		=> esc_html__( 'On', 'classic-elementor-addons-pro' ),
			"default" 		=> "no"
		]
	);
	$repeater = new \Elementor\Repeater();	
	$repeater->add_control(
		"float_title",
		[
			"type"			=> \Elementor\Controls_Manager::TEXT,
			"label" 		=> esc_html__( "Float Image Title", 'classic-elementor-addons-pro' ),
			"description"	=> esc_html__( "Float image title.", 'classic-elementor-addons-pro' ),
			"default"		=> "50"
		]
	);
	$repeater->add_control(
		"float_img",
		[
			"type" => \Elementor\Controls_Manager::MEDIA,
			"label" => __( "Floating Image", 'classic-elementor-addons-pro' ),
			"description"	=> esc_html__( "Choose float image.", 'classic-elementor-addons-pro' ),
			"dynamic" => [
				"active" => true,
			]
		]
	);

	$repeater->add_control(
		"float_width",
		[
			"type"			=> \Elementor\Controls_Manager::TEXT,
			"label" 		=> esc_html__( "Float Width", 'classic-elementor-addons-pro' ),
			"description"	=> esc_html__( "Mention here float image width. Example 30", 'classic-elementor-addons-pro' ),
			"default"		=> "30"
		]
	);
	$repeater->add_control(
		"float_left",
		[
			"type"			=> \Elementor\Controls_Manager::TEXT,
			"label" 		=> esc_html__( "Left Position", 'classic-elementor-addons-pro' ),
			"description"	=> esc_html__( "Float image left position. Example 80", 'classic-elementor-addons-pro' ),
			"default"		=> "50"
		]
	);
	$repeater->add_control(
		"float_top",
		[
			"type"			=> \Elementor\Controls_Manager::TEXT,
			"label" 		=> esc_html__( "Top Position", 'classic-elementor-addons-pro' ),
			"description"	=> esc_html__( "Float image top position. Example 300", 'classic-elementor-addons-pro' ),
			"default"		=> "300"
		]
	);
	$repeater->add_control(
		"float_distance",
		[
			"type"			=> \Elementor\Controls_Manager::TEXT,
			"label" 		=> esc_html__( "Float Distance", 'classic-elementor-addons-pro' ),
			"description"	=> esc_html__( "Float image float distance. This option only use for when you active mousemove animation Example 100", 'classic-elementor-addons-pro' ),
			"default"		=> "100"
		]
	);
	$repeater->add_control(
		'float_animation',
		[
			'label' => __( 'Float Animation', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '0',
			'options' => [
				'0'		=> __( 'None', 'classic-elementor-addons-pro' ),
				'1' 	=> __( 'Bounce', 'classic-elementor-addons-pro' ),
				'2' 	=> __( 'Slow Rotate', 'classic-elementor-addons-pro' ),
				'3' 	=> __( 'Speed Rotate', 'classic-elementor-addons-pro' )
			]
		]
	);	
	$repeater->add_control(
		"float_mouse",
		[
			"label" 		=> esc_html__( "Mouse Animation", 'classic-elementor-addons-pro' ),
			'type' 			=> \Elementor\Controls_Manager::SELECT,
			"default" 		=> "0",
			'options' => [
				'0'		=> __( 'Disable', 'classic-elementor-addons-pro' ),
				'1' 	=> __( 'Enable', 'classic-elementor-addons-pro' )
			]
		]
	);	
	$element->add_control(
		"float_details",
		[
			"type"			=> \Elementor\Controls_Manager::REPEATER,
			"label"			=> esc_html__( "Floating Details", 'classic-elementor-addons-pro' ),
			"fields"		=> $repeater->get_controls(),
			"default" 		=> [
				[
					"float_title" 		=> esc_html__( "Floating Image", 'classic-elementor-addons-pro' ),
					"float_img" 		=> "",
					"float_width"		=> "30",
					"float_left" 		=> "50",
					"float_top" 		=> "30",
					"float_animation" 	=> "0",
					"float_distance" 	=> "100"
				]
			],
			"title_field"	=> "{{{ float_title }}}"
		]
	);
	$element->end_controls_section();
	
	//Parallax Settings
	$element->start_controls_section(
		'section_parallax',
		[
			'label' => __( 'Parallax Settings', 'classic-elementor-addons-pro' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);
	$element->add_control(
		"parallax_opt",
		[
			"label" 		=> esc_html__( "Enable/Disable Parallax", 'classic-elementor-addons-pro' ),
			"type" 			=> \Elementor\Controls_Manager::SWITCHER,
			"label_off" 	=> esc_html__( 'Off', 'classic-elementor-addons-pro'  	),
			"label_on" 		=> esc_html__( 'On', 'classic-elementor-addons-pro' ),
			"default" 		=> "no"
		]
	);
	$element->add_control(
		'parallax_ratio',
		[
			'label' => __( 'Parallax Speed', 'classic-elementor-addons-pro' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			"description"	=> esc_html__( "Here you can define parallax factor ratio. Example 2", 'classic-elementor-addons-pro' ),
			'placeholder' => "2",
			"default" 		=> "2",
			"condition" 	=> [
				"parallax_opt" 		=> "yes"
			]
		]
	);	
	$element->end_controls_section();
}
};

add_action('elementor/frontend/section/before_render', 'cea_section_custom_options', 10, 2);
add_action('elementor/frontend/container/before_render', 'cea_section_custom_options', 10, 2);
function cea_section_custom_options( $element ) {

    if ( $element->get_name() !== 'section' && $element->get_name() !== 'container' ) {
        return;
    }

    if ( ( 'section' === $element->get_name() ) || 'container' === $element->get_name() ){
		$rd_opt = $element->get_settings( 'rd_opt' );
        $paroller_opt = $element->get_settings( 'parallax_opt' );
        $float_img_opt = $element->get_settings( 'float_img_opt' );
    
		if( $float_img_opt == 'yes' ){
			
			wp_enqueue_script( array( 'cea-float-parallax', 'cea-custom-front' ) );
			
			$float_details = $element->get_settings( 'float_details' );
			$float_details = isset( $float_details ) ? $float_details : '';
			
			if( $float_details ){
				
				$floats_array = array();
				$i = 0;
				
				foreach( $float_details as $float_detail ){
				
					$float_title = isset( $float_detail['float_title'] ) && $float_detail['float_title'] != '' ? $float_detail['float_title'] : '';
					$float_img = isset( $float_detail['float_img'] ) && $float_detail['float_img']['url'] != '' ? $float_detail['float_img']['url'] : '';
					$float_left = isset( $float_detail['float_left'] ) && $float_detail['float_left'] != '' ? $float_detail['float_left'] : '';
					$float_top = isset( $float_detail['float_top'] ) && $float_detail['float_top'] != '' ? $float_detail['float_top'] : '';
					$float_distance = isset( $float_detail['float_distance'] ) && $float_detail['float_distance'] != '' ? $float_detail['float_distance'] : '';
					$float_animation = isset( $float_detail['float_animation'] ) && $float_detail['float_animation'] != '' ? $float_detail['float_animation'] : '';
					$float_mouse = isset( $float_detail['float_mouse'] ) && $float_detail['float_mouse'] != '0' ? '1' : '0';
					$float_width = isset( $float_detail['float_width'] ) && $float_detail['float_width'] != '' ? $float_detail['float_width'] . 'px' : '20px';
					
					$float_array = array(
						'float_title' => $float_title,
						'float_img' => $float_img,
						'float_left' => $float_left,
						'float_top' => $float_top,
						'float_distance' => $float_distance,
						'float_animation' => $float_animation,
						'float_mouse' => $float_mouse,
						'float_width' => $float_width
					);
					if( $float_img ){
						$floats_array[$i++] = $float_array;
					}
				}
				$element->add_render_attribute( '_wrapper', 'data-cea-float', htmlspecialchars( json_encode( $floats_array ), ENT_QUOTES, 'UTF-8' ) );
			}
		}
		
		if( $rd_opt == 'yes' ){
		
			wp_enqueue_script('jquery-ui');
			wp_enqueue_script('jquery-ease');
			wp_enqueue_script('raindrops');
			wp_enqueue_script('cea-custom-front');
		
			$id = 'shortcode-rand-' . cea_shortcode_rand_id();
			$rd_color = $element->get_settings( 'rd_color' );
			$rd_height = $element->get_settings( 'rd_height' );
			$rd_speed = $element->get_settings( 'rd_speed' );
			$rd_freq = $element->get_settings( 'rd_frequency' );
			$rd_density = $element->get_settings( 'rd_density' );
			$rd_pos = $element->get_settings( 'rd_pos' );
			
			$rd_array = array(
				'id' => $id,
				'rd_color' => $rd_color,
				'rd_height' => $rd_height,
				'rd_speed' => $rd_speed,
				'rd_freq' => $rd_freq,
				'rd_density' => $rd_density,
				'rd_pos' => $rd_pos	
			);
			
			$element->add_render_attribute( '_wrapper', 'data-cea-raindrops', htmlspecialchars( json_encode( $rd_array ), ENT_QUOTES, 'UTF-8' ) );
		}

		if( $paroller_opt == 'yes' ){
			
			wp_enqueue_script('cea-custom-front');
				
			$parallax_ratio = $element->get_settings( 'parallax_ratio' );
			$parallax_image = $element->get_settings( 'background_image' ); // parallax_image
			$img_url = is_array( $parallax_image ) && isset( $parallax_image['url'] ) ? $parallax_image['url'] : '';
			
			$parallax_array = array(
				'parallax_ratio' => $parallax_ratio,
				'parallax_image' => $img_url
			);

			$element->add_render_attribute( '_wrapper', 'data-cea-parallax-data', htmlspecialchars( json_encode( $parallax_array ), ENT_QUOTES, 'UTF-8' ) );
		}
	}
};