<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Classic_Elementor_Addons\Helper\Post_Helper as Cea_Post_Helper;
/**
 * Classic Elementor Addon Testimonial Widget
 *
 * @since 1.0.0
 */
 
class CEA_Elementor_Testimonial_Widget extends Widget_Base {
	use Cea_Post_Helper;
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Testimonial widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "ceatestimonial";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Testimonial widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Testimonial", "cea-post-types" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Testimonial widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "cea-default-icon ti-layout-cta-center";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Testimonial widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "classic-elements" ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'owl-carousel', 'imagesloaded', 'infinite-scroll', 'isotope', 'cea-custom-front'  ];
	}
	
	public function get_style_depends() {
		return [ 'owl-carousel' ];
	}

	/**
	 * Register Animated Text widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$helper_instance = new CEA_Elementor_Testimonial_Widget(); 
		//get authors
		$authors = $helper_instance->cea_get_authors();
		//get post titles
		$post_titles = $helper_instance->cea_get_post_titles( 'cea-testimonial' );
		
		//orderby options
		$order_by = $helper_instance->cea_get_post_orderby_options();
		
		//General Section
		$this->start_controls_section(
			"general_section",
			[
				"label"	=> esc_html__( "General", "cea-post-types" ),
				"tab"	=> Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Default testimonial options.", "cea-post-types" ),
			]
		);
		$this->add_control(
			"extra_class",
			[
				"type"			=> Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Extra Class", "cea-post-types" ),
				"description"	=> esc_html__( "Put extra class for some additional styles.", "cea-post-types" ),
			]
		);
		$this->end_controls_section();
		
		//Query Section
		$this->start_controls_section(
			"query_section",
			[
				"label"	=> esc_html__( "Query", "cea-post-types" ),
				"tab"	=> Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Testimonial query options.", "cea-post-types" ),
			]
		);
		$this->add_control(
			"post_per_page",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Post Per Page", "cea-post-types" ),
				"description"	=> esc_html__( "Here you can define post limits per page. Example 10", "cea-post-types" ),
				"default" 		=> "10",
				"placeholder"	=> "10"
			]
		);
		$this->add_control(
			'include_author',
			[
				'label' 		=> __( 'Author', 'cea-post-types' ),
				"description"	=> esc_html__( "This is filter author posts.", "cea-post-types" ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $authors,
				'default' 		=> '',
			]
		);
		$this->add_control(
			'include_posts',
			[
				'label' 		=> __( 'Include Posts', 'cea-post-types' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $post_titles,
				'default' 		=> '',
			]
		);
		$this->add_control(
			'exclude_posts',
			[
				'label' 		=> __( 'Exclude Posts', 'cea-post-types' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $post_titles,
				'default' 		=> '',
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' 		=> __( 'Order By', 'cea-post-types' ),
				
				'type' 			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' 		=> $order_by,
				'default' 		=> 'none',
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> __( 'Order', 'cea-post-types' ),
				'type' 			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending',
                ],
				'default' 		=> 'desc',
			]
		);
		$this->end_controls_section();
		
		//Layouts Section
		$this->start_controls_section(
			"layouts_section",
			[
				"label"			=> esc_html__( "Layouts", "cea-post-types" ),
				"tab"			=> Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Post layout options here available.", "cea-post-types" ),
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'cea-post-types' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'cea-post-types' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'cea-post-types' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'cea-post-types' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'cea-post-types' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrapper .testimonial-inner' => 'text-align: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			"excerpt_length",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Excerpt Length", "cea-post-types" ),
				"description"	=> esc_html__( "Here you can define post excerpt length. Example 10", "cea-post-types" ),
				"default" 		=> "15"
			]
		);
		$this->add_control(
			"testimonial_layout",
			[
				"label"			=> esc_html__( "Post Layout", "cea-post-types" ),
				"type"			=> Controls_Manager::SELECT,
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "cea-post-types" ),
					"classic"		=> esc_html__( "Classic", "cea-post-types" ),
					"modern"		=> esc_html__( "Modern", "cea-post-types" ),
					"classic-pro"		=> esc_html__( "Classic Pro", "cea-post-types" ),
					"list"	=> esc_html__( "List", "cea-post-types" ),
				]
			]
		);
		$this->add_control(
			"testimonial_cols",
			[
				"type"			=> Controls_Manager::SELECT,
				"label"			=> esc_html__( "Post Columns", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial columns.", "cea-post-types" ),
				"default"		=> "6",
				"options"		=> [
					"3"			=> esc_html__( "4 Columns", "cea-post-types" ),
					"4"			=> esc_html__( "3 Columns", "cea-post-types" ),
					"6"			=> esc_html__( "2 Columns", "cea-post-types" ),
					"12"		=> esc_html__( "1 Column", "cea-post-types" )
				]
			]
		);
		$this->add_control(
			"more_text",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Read More Text", "cea-post-types" ),
				"description"	=> esc_html__( "Here you can enter read more text instead of default text.", "cea-post-types" ),
				"default" 		=> esc_html__( "Read More", "cea-post-types" )
			]
		);		
		$this->add_control(
			"testimonial_masonry",
			[
				"label" 		=> esc_html__( "Post Masonry", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial masonry or normal.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no",
				"condition" 	=> [
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"testimonial_gutter",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Post Masonry Gutter", "cea-post-types" ),
				"description"	=> esc_html__( "Here you can mention testimonial masonry gutter size. Example 30", "cea-post-types" ),
				"default" 		=> "10",
				"condition" 	=> [
					"testimonial_masonry" 		=> "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"lazy_load",
			[
				"label"			=> esc_html__( "Lazy Load", "cea-post-types" ),
				"description"	=> esc_html__( "Enabel lazy load option for load isotope grids lazy with animation.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no",
				"condition" 	=> [
					"testimonial_masonry" => "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"masonry_layout",
			[
				"label"			=> esc_html__( "Masonry Layout", "cea-post-types" ),
				"type"			=> Controls_Manager::SELECT,
				"default"		=> "masonry",
				"options"		=> [
					"masonry"		=> esc_html__( "Masonry", "cea-post-types" ),
					"fitRows"		=> esc_html__( "Fit Rows", "cea-post-types" )
				],
				"condition" 	=> [
					"testimonial_masonry" => "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"testimonial_infinite",
			[
				"label"			=> esc_html__( "Post Masonry Infinite", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial masonry infinite scroll.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no",
				"condition" 	=> [
					"testimonial_masonry" => "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"loading_msg",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Infinite Loading Message", "cea-post-types" ),
				"description"	=> esc_html__( "Here you can mention infinite loading post message.", "cea-post-types" ),
				"default" 		=> esc_html__( "Loading posts..", "cea-post-types" ),
				"condition" 	=> [
					"testimonial_infinite" 		=> "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"loading_end",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Infinite Ending Message", "cea-post-types" ),
				"description"	=> esc_html__( "Here you can mention infinite loading ending message.", "cea-post-types" ),
				"default" 		=> esc_html__( "No more post.", "cea-post-types" ),
				"condition" 	=> [
					"testimonial_infinite" 		=> "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			'loading_img',
			[
				'label' => __( 'Infinite Loader Image URL', 'cea-post-types' ),
				"description"	=> esc_html__( "Here you can choose infinite loader image.", "cea-post-types" ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				"condition" 	=> [
					"testimonial_infinite" 		=> "yes",
					"testimonial_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"testimonial_pagination",
			[
				"label" 		=> esc_html__( "Post Pagination", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no",
				"condition" 	=> [
					"testimonial_masonry" 		=> "no"
				]
			]
		);
		$this->add_control(
			"variation",
			[
				"type"			=> Controls_Manager::SELECT,
				"label"			=> esc_html__( "Post Variation", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial variatoin either dark or light.", "cea-post-types" ),
				"default"		=> "light",
				"options"		=> [
					"light"			=> esc_html__( "Light", "cea-post-types" ),
					"dark"			=> esc_html__( "Dark", "cea-post-types" )
				]
			]
		);
		$this->add_control(
			"post_items",
			[
				"label"				=> "Post Items",
				"description"		=> esc_html__( "This is settings for testimonial custom layout. here you can set your own layout. Drag and drop needed testimonial items to Enabled part.", "cea-post-types" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 		=> [ 
						"thumb"			=> esc_html__( "Feature Image", "cea-post-types" ),
						"title"			=> esc_html__( "Title", "cea-post-types" ),
						"excerpt"		=> esc_html__( "Excerpt", "cea-post-types" )
					],
					"disabled"		=> [
						"top-meta"		=> esc_html__( "Top Meta", "cea-post-types" ),
						"bottom-meta"	=> esc_html__( "Bottom Meta", "cea-post-types" ),
						"category"		=> esc_html__( "Category", "cea-post-types" ),
						"author"		=> esc_html__( "Author", "cea-post-types" )
					]
				]
			]
		);
		$this->add_control(
			"post_overlay_items_opt",
			[
				"label" 		=> esc_html__( "Post Overlay Items Options", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"post_overlay_items",
			[
				"label"			=> "Post Overlay Items",
				"description"	=> esc_html__( "This is settings for testimonial shortcode post overlay items.", "cea-post-types" ),
				"type"			=> "dragdrop",
				"ddvalues"		=> [ 
					esc_html__( "Enabled", "cea-post-types" ) => [],
					esc_html__( "disabled", "cea-post-types" ) => [
						'author'	=> esc_html__( 'Author', 'cea-post-types' ),
						'more'	=> esc_html__( 'Read More', 'cea-post-types' ),
						'date'	=> esc_html__( 'Date', 'cea-post-types' ),
						'title'	=> esc_html__( 'Title', 'cea-post-types' ),
						"top-meta"		=> esc_html__( "Top Meta", "cea-post-types" ),
						"bottom-meta"	=> esc_html__( "Bottom Meta", "cea-post-types" )
					]
				],
				"condition" 	=> [
					"post_overlay_items_opt" 		=> "yes"
				]
			]
		);
		$this->add_control(
			"top_meta",
			[
				"label"			=> "Post Top Meta",
				"description"	=> esc_html__( "This is settings for testimonial shortcode post top meta.", "cea-post-types" ),
				"type"			=> "dragdrop",
				"ddvalues"		=> [ 
					esc_html__( "Left", "cea-post-types" ) => [
						'author'	=> esc_html__( 'Author', 'cea-post-types' )
					],
					esc_html__( "Right", "cea-post-types" ) => [],
					esc_html__( "disabled", "cea-post-types" ) => [
						'date'	=> esc_html__( 'Date', 'cea-post-types' ),
						'more'	=> esc_html__( 'Read More', 'cea-post-types' ),						
						'designation'	=> esc_html__( 'Designation', 'cea-post-types' ),
						'info'	=> esc_html__( 'Info', 'cea-post-types' ),
						'rate'	=> esc_html__( 'Rate', 'cea-post-types' )
					]
				]
			]
		);
		$this->add_control(
			"bottom_meta",
			[
				"label"			=> "Post Bottom Meta",
				"description"	=> esc_html__( "This is settings for testimonial shortcode post bottom meta.", "cea-post-types" ),
				"type"			=> "dragdrop",
				"ddvalues"		=> [ 
					esc_html__( "Left", "cea-post-types" ) => [
						'date'	=> esc_html__( 'Date', 'cea-post-types' )
					],
					esc_html__( "Right", "cea-post-types" ) => [],
					esc_html__( "disabled", "cea-post-types" ) => [						
						'more'	=> esc_html__( 'Read More', 'cea-post-types' ),
						'author' => esc_html__( 'Author', 'cea-post-types' ),
						'designation'	=> esc_html__( 'Designation', 'cea-post-types' ),
						'info'	=> esc_html__( 'Info', 'cea-post-types' ),
						'rate'	=> esc_html__( 'Rate', 'cea-post-types' )
					]
				]
			]
		);
		$this->end_controls_section();
		
		//Title Section
		$this->start_controls_section(
			"title_section",
			[
				"label"			=> esc_html__( "Title", "cea-post-types" ),
				"tab"			=> Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Title options here available.", "cea-post-types" ),
			]
		);
		$this->add_control(
			"post_heading",
			[
				"label"			=> esc_html__( "Post Heading Tag", "cea-post-types" ),
				"type"			=> Controls_Manager::SELECT,
				"default"		=> "h3",
				"options"		=> [
					"h1"		=> esc_html__( "h1", "cea-post-types" ),
					"h2"		=> esc_html__( "h2", "cea-post-types" ),
					"h3"		=> esc_html__( "h3", "cea-post-types" ),
					"h4"		=> esc_html__( "h4", "cea-post-types" ),
					"h5"		=> esc_html__( "h5", "cea-post-types" ),
					"h6"		=> esc_html__( "h6", "cea-post-types" )
				]
			]
		);		
		$this->end_controls_section();
		
		//Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"			=> esc_html__( "Image", "cea-post-types" ),
				"tab"			=> Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Image options here available.", "cea-post-types" ),
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
			]
		);
		$this->end_controls_section();
		
		//Slide Section
		$this->start_controls_section(
			"slide_section",
			[
				"label"			=> esc_html__( "Slide", "cea-post-types" ),
				"tab"			=> Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Testimonial slide options here available.", "cea-post-types" ),
			]
		);
		$this->add_control(
			"slide_opt",
			[
				"label" 		=> esc_html__( "Slide Option", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider option.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"slide_item",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Slide Items", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slide items shown on large devices.", "cea-post-types" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_tab",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Tab", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slide items shown on tab.", "cea-post-types" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_mobile",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Mobile", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slide items shown on mobile.", "cea-post-types" ),
				"default" 		=> "1",
			]
		);
		$this->add_control(
			"slide_item_autoplay",
			[
				"label" 		=> esc_html__( "Auto Play", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider auto play.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"slide_item_loop",
			[
				"label" 		=> esc_html__( "Loop", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider loop.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"slide_center",
			[
				"label" 		=> esc_html__( "Items Center", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider center, for this option must active loop and minimum items 2.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"slide_nav",
			[
				"label" 		=> esc_html__( "Navigation", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider navigation.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"slide_dots",
			[
				"label" 		=> esc_html__( "Pagination", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider pagination.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"slide_margin",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Margin", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider margin space.", "cea-post-types" ),
				"default" 		=> "",
			]
		);
		$this->add_control(
			"slide_duration",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Duration", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider duration.", "cea-post-types" ),
				"default" 		=> "5000",
			]
		);
		$this->add_control(
			"slide_smart_speed",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Smart Speed", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider smart speed.", "cea-post-types" ),
				"default" 		=> "250",
			]
		);
		$this->add_control(
			"slide_slideby",
			[
				"type"			=> Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Slideby", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for testimonial slider scroll by.", "cea-post-types" ),
				"default" 		=> "1",
			]
		);
		$this->end_controls_section();
		
		// Link Section
		$this->start_controls_section(
			'section_link',
			[
				'label' => __( 'Links', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB,
			]
		);
		$this->add_control(
			'image_link',
			[
				'label' => __( 'Image', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			"image_target",
			[
				"label" 		=> esc_html__( "Target Blank", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"image_nofollow",
			[
				"label" 		=> esc_html__( "No Follow", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			'title_link',
			[
				'label' => __( 'Title', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			"title_target",
			[
				"label" 		=> esc_html__( "Target Blank", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"title_nofollow",
			[
				"label" 		=> esc_html__( "No Follow", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			'more_link',
			[
				'label' => __( 'Read More', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			"more_target",
			[
				"label" 		=> esc_html__( "Target Blank", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			"more_nofollow",
			[
				"label" 		=> esc_html__( "No Follow", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->end_controls_section();
		
		// Style Post Section
		$this->start_controls_section(
			'section_style_post',
			[
				'label' => __( 'Post Grid', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->start_controls_tabs( 'tabs_post_style' );
		$this->start_controls_tab(
			'tab_post_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'post_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_bg_color',
			[
				'label' => esc_html__( 'Background', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_shadow',
				'selector' => '{{WRAPPER}} .testimonial-inner',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_post_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'post_hcolor',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_bg_hcolor',
			[
				'label' => esc_html__( 'Background', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_hshadow',
				'selector' => '{{WRAPPER}} .testimonial-inner:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'post_padding',
			[
				'label' => esc_html__( 'Padding', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			"title_text_trans",
			[
				"label"			=> esc_html__( "Title Transform", "cea-post-types" ),
				"type"			=> Controls_Manager::SELECT,
				"description"	=> esc_html__( "Set title text-transform property.", "cea-post-types" ),
				"default"		=> "none",
				"options"		=> [
					"none"			=> esc_html__( "Default", "cea-post-types" ),
					"capitalize"	=> esc_html__( "Capitalized", "cea-post-types" ),
					"uppercase"		=> esc_html__( "Upper Case", "cea-post-types" ),
					"lowercase"		=> esc_html__( "Lower Case", "cea-post-types" )
				],
				'selectors' => [
					'{{WRAPPER}} .post-title-head .post-title' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->start_controls_tabs( 'tabs_title_style' );
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-title-head .post-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_scale',
			[
				'label' => esc_html__( 'Scale', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'transform: scale({{SIZE}});'
				],
			]
		);	
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);		
		$this->add_control(
			'title_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner:hover .post-title-head .post-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_hscale',
			[
				'label' => esc_html__( 'Scale', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner:hover .post-title-head' => 'transform: scale({{SIZE}});'
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'margin', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__( 'Spacing', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .post-title-head' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .post-title-head'
			]
		);		
		$this->end_controls_section();
		
		// Style Link Section
		$this->start_controls_section(
			'section_style_link',
			[
				'label' => __( 'Links', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'post_links',
			[
				'label' => __( 'Default Post Links', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_link_style' );
		$this->start_controls_tab(
			'tab_link_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_link_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);		
		$this->add_control(
			'link_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'post_tmetalinks',
			[
				'label' => __( 'Top Meta Links', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_tmetalink_style' );
		$this->start_controls_tab(
			'tab_tmetalink_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'tmetalink_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .top-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_tmetalink_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);		
		$this->add_control(
			'tmetalink_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .top-meta a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'post_bmetalinks',
			[
				'label' => __( 'Bottom Meta Links', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_bmetalink_style' );
		$this->start_controls_tab(
			'tab_bmetalink_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'bmetalink_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bottom-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_bmetalink_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);		
		$this->add_control(
			'bmetalink_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bottom-meta a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'post_ometalinks',
			[
				'label' => __( 'Overlay Links', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_ometalink_style' );
		$this->start_controls_tab(
			'tab_ometalink_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'ometalink_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_ometalink_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);		
		$this->add_control(
			'ometalink_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Style Image Section
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			"img_style",
			[
				"label"			=> esc_html__( "Image Style", "cea-post-types" ),
				"type"			=> Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose image style.", "cea-post-types" ),
				"default"		=> "squared",
				"options"		=> [
					"squared"			=> esc_html__( "Squared", "cea-post-types" ),
					"rounded"			=> esc_html__( "Rounded", "cea-post-types" ),
					"rounded-circle"	=> esc_html__( "Circled", "cea-post-types" )
				]
			]
		);
		$this->add_control(
			"resize_opt",
			[
				"label" 		=> esc_html__( "Resize Option", "cea-post-types" ),
				"description"	=> esc_html__( "Enable resize option.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_responsive_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .post-thumb > a > img' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;'
				],
			]
		);
		$this->add_responsive_control(
			'image_spacing',
			[
				'label' => esc_html__( 'Image Spacing', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
			]
		);	
		$this->add_control(
			'img_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-thumb > a > img' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'img_padding',
			[
				'label' => esc_html__( 'Padding', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .post-thumb > a > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'img_border',
					'label' => esc_html__( 'Border', 'cea-post-types' ),
					'selector' => '{{WRAPPER}} .post-thumb > a > img'
				]
		);
		$this->end_controls_section();
		
		// Style Button Section
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => esc_html__( 'Read More Button', 'cea-post-types' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .read-more',
			]
		);
		$this->add_control(
			"btn_text_trans",
			[
				"label"			=> esc_html__( "Transform", "cea-post-types" ),
				"type"			=> Controls_Manager::SELECT,
				"description"	=> esc_html__( "Set read more button text-transform property.", "cea-post-types" ),
				"default"		=> "none",
				"options"		=> [
					"none"			=> esc_html__( "Default", "cea-post-types" ),
					"capitalize"	=> esc_html__( "Capitalized", "cea-post-types" ),
					"uppercase"		=> esc_html__( "Upper Case", "cea-post-types" ),
					"lowercase"		=> esc_html__( "Lower Case", "cea-post-types" )
				],
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );		
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .read-more:hover, {{WRAPPER}} .read-more:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .read-more:hover svg, {{WRAPPER}} .read-more:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .read-more:hover, {{WRAPPER}} .read-more:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .read-more:hover, {{WRAPPER}} .read-more:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .read-more',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .read-more',
			]
		);
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .read-more'
			]
		);
		$this->end_controls_section();	
		
		// Style Meta Section
		$this->start_controls_section(
			'section_style_meta',
			[
				'label' => __( 'Meta', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_control(
			'top_meta_style',
			[
				'label' => __( 'Top Meta', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'topmeta_typography',
				'selector' 		=> '{{WRAPPER}} .top-meta'
			]
		);	
		$this->add_responsive_control(
			'topmeta_spacing',
			[
				'label' => esc_html__( 'Spacing', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .top-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .top-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bottom_meta_style',
			[
				'label' => __( 'Bottom Meta', 'cea-post-types' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'bottommeta_typography',
				'selector' 		=> '{{WRAPPER}} .bottom-meta'
			]
		);	
		$this->add_responsive_control(
			'bottommeta_spacing',
			[
				'label' => esc_html__( 'Spacing', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bottom-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .bottom-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Content Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->start_controls_tabs( 'tabs_content_style' );
		$this->start_controls_tab(
			'tab_content_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner .post-excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_content_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'content_hcolor',
			[
				'label' => esc_html__( 'Color', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner:hover .post-excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .post-excerpt'
			]
		);	
		$this->add_responsive_control(
			'content_spacing',
			[
				'label' => esc_html__( 'Spacing', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Overlay Section
		$this->start_controls_section(
			'section_style_overlay',
			[
				'label' => __( 'Overlay', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'ovelay_typography',
				'selector' 		=> '{{WRAPPER}} .post-overlay-items'
			]
		);	
		$this->add_responsive_control(
			'overlay_padding',
			[
				'label' => esc_html__( 'Padding', 'cea-post-types' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'overlay_position_top',
			[
				'label' => esc_html__( 'Position Top', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items' => 'position: absolute; top: {{SIZE}}%;',
				],
			]
		);
		$this->add_responsive_control(
			'overlay_position_left',
			[
				'label' => esc_html__( 'Position Left', 'cea-post-types' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items' => 'left: {{SIZE}}%;',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_overlay_style' );
		$this->start_controls_tab(
			'tab_overlay_normal',
			[
				'label' => esc_html__( 'Normal', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'overlay_bg_color',
			[
				'label' => esc_html__( 'Background', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-thumb.post-overlay-active:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_overlay_hover',
			[
				'label' => esc_html__( 'Hover', 'cea-post-types' ),
			]
		);
		$this->add_control(
			'overlay_bg_hcolor',
			[
				'label' => esc_html__( 'Background', 'cea-post-types' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-thumb.post-overlay-active:hover:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();	
		
		// Style Tilt Section
		$this->start_controls_section(
			'section_style_tilt',
			[
				'label' => __( 'Tilt', 'cea-post-types' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			"tilt_opt",
			[
				"label" 		=> esc_html__( "Tilt Option", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for enable tilt animation option.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_control(
			'max_tilt',
			[
				'label' => esc_html__( 'maxTilt', 'cea-post-types' ),
				'type' => Controls_Manager::TEXT,
				'default' => 20
			]
		);
		$this->add_control(
			'perspective',
			[
				'label' => esc_html__( 'Perspective', 'cea-post-types' ),
				'type' => Controls_Manager::TEXT,
				'default' => 500
			]
		);
		$this->add_control(
			'tilt_scale',
			[
				'label' => esc_html__( 'Scale', 'cea-post-types' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1.1
			]
		);
		$this->add_control(
			'tilt_speed',
			[
				'label' => esc_html__( 'Speed', 'cea-post-types' ),
				'type' => Controls_Manager::TEXT,
				'default' => 400
			]
		);
		$this->add_control(
			"tilt_transition",
			[
				"label" 		=> esc_html__( "Tilt Transition", "cea-post-types" ),
				"description"	=> esc_html__( "This is option for tilt transition.", "cea-post-types" ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->end_controls_section();	

	}

	/**
	 * Render Animated Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	public function render_content() {
		/**
		 * Before widget render content.
		 *
		 * Fires before Elementor widget is being rendered.
		 *
		 * @since 1.0.0
		 *
		 * @param Widget_Base $this The current widget.
		 */
		do_action( 'elementor/widget/before_render_content', $this );
	
		ob_start();
	
		$skin = $this->get_current_skin();
		if ( $skin ) {
			$skin->set_parent( $this );
			$skin->render();
		} else {
			$this->render();
		}
	
		$widget_content = ob_get_clean();
		
		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$testimonial_layout = isset( $testimonial_layout ) && $testimonial_layout != '' ? $testimonial_layout : 'default';
		$slide_opt = isset( $slide_opt ) && $slide_opt == 'yes' ? true : false;
		$testimonial_masonry = isset( $testimonial_masonry ) && $testimonial_masonry == 'yes' ? true : false;
		
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$class_names .= isset( $testimonial_layout ) ? ' testimonial-style-' . $testimonial_layout : ' testimonial-style-1';
		$class_names .= isset( $variation ) ? ' testimonial-' . $variation : '';
		
		if( !$testimonial_masonry && !$slide_opt ){
			$class_names .= ' testimonial-normal-model';
		}elseif( $slide_opt ) {
			$class_names .= ' testimonial-slide-model';
		}elseif( $testimonial_masonry ){
			$class_names .= ' testimonial-isotope-model';
		}
			
		?>
		
		<div class="elementor-widget-container testimonial-wrapper<?php echo esc_attr( $class_names ); ?>">
		
			<?php
			/**
			 * Render widget content.
			 *
			 * Filters the widget content before it's rendered.
			 *
			 * @since 1.0.0
			 *
			 * @param string      $widget_content The content of the widget.
			 * @param Widget_Base $this           The widget.
			 */
			$widget_content = apply_filters( 'elementor/widget/render_content', $widget_content, $this );
	
			echo $widget_content; // XSS ok.
			?>
			
		</div>
		<?php
	}

	/**
	 * Render Animated Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		extract( $settings );
		$output = '';

		//Defined Variable
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 10;
		$this->excerpt_len = $excerpt_length;
		$include_author = isset( $include_author ) ? $include_author : '';
		$include_posts = isset( $include_posts ) ? $include_posts : '';
		$exclude_posts = isset( $exclude_posts ) ? $exclude_posts : '';
		$orderby = isset( $orderby ) ? $orderby : '';
		$order = isset( $order ) ? $order : '';
		
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$testimonial_pagination = isset( $testimonial_pagination ) && $testimonial_pagination == 'yes' ? true : false;
		$testimonial_masonry = isset( $testimonial_masonry ) && $testimonial_masonry == 'yes' ? true : false;
		$masonry_layout = isset( $masonry_layout ) && $masonry_layout != '' ? $masonry_layout : 'masonry';
		$testimonial_infinite = isset( $testimonial_infinite ) && $testimonial_infinite == 'yes' ? true : false;
		$testimonial_gutter = isset( $testimonial_gutter ) && $testimonial_gutter != '' ? $testimonial_gutter : 20;
		$slide_opt = isset( $slide_opt ) && $slide_opt == 'yes' ? true : false;
		$lazy_load = isset( $lazy_load ) && $lazy_load == 'yes' ? true : false;
		$post_heading = isset( $post_heading ) && $post_heading != '' ? $post_heading : 'h3';
		
		//Tilt options
		$tilt_opt = isset( $settings['tilt_opt'] ) && $settings['tilt_opt'] == 'yes' ? true : false;
		$tilt_transition = isset( $settings['tilt_transition'] ) && $settings['tilt_transition'] == 'yes' ? true : false;
		$max_tilt = isset( $settings['max_tilt'] ) ? $settings['max_tilt'] : '';
		$perspective = isset( $settings['perspective'] ) ? $settings['perspective'] : '';
		$tilt_scale = isset( $settings['tilt_scale'] ) ? $settings['tilt_scale'] : '';
		$tilt_speed = isset( $settings['tilt_speed'] ) ? $settings['tilt_speed'] : '';
		
		if( $tilt_opt ){
			$this->add_render_attribute( 'cea-testimonial-tilt', 'data-tilt_trans', $tilt_transition );
			$this->add_render_attribute( 'cea-testimonial-tilt', 'data-max_tilt', $max_tilt );
			$this->add_render_attribute( 'cea-testimonial-tilt', 'data-tilt_perspective', $perspective );
			$this->add_render_attribute( 'cea-testimonial-tilt', 'data-tilt_scale', $tilt_scale );
			$this->add_render_attribute( 'cea-testimonial-tilt', 'data-tilt_speed', $tilt_speed );
		}
		
		if( $slide_opt ){
			$gal_atts = array(
				'data-loop="'. ( isset( $slide_item_loop ) && $slide_item_loop == 'yes' ? 1 : 0 ) .'"',
				'data-margin="'. ( isset( $slide_margin ) && $slide_margin != '' ? absint( $slide_margin ) : 0 ) .'"',
				'data-center="'. ( isset( $slide_center ) && $slide_center == 'yes' ? 1 : 0 ) .'"',
				'data-nav="'. ( isset( $slide_nav ) && $slide_nav == 'yes' ? 1 : 0 ) .'"',
				'data-dots="'. ( isset( $slide_dots ) && $slide_dots == 'yes' ? 1 : 0 ) .'"',
				'data-autoplay="'. ( isset( $slide_item_autoplay ) && $slide_item_autoplay == 'yes' ? 1 : 0 ) .'"',
				'data-items="'. ( isset( $slide_item ) && $slide_item != '' ? absint( $slide_item ) : 1 ) .'"',
				'data-items-tab="'. ( isset( $slide_item_tab ) && $slide_item_tab != '' ? absint( $slide_item_tab ) : 1 ) .'"',
				'data-items-mob="'. ( isset( $slide_item_mobile ) && $slide_item_mobile != '' ? absint( $slide_item_mobile ) : 1 ) .'"',
				'data-duration="'. ( isset( $slide_duration ) && $slide_duration != '' ? absint( $slide_duration ) : 5000 ) .'"',
				'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
				'data-scrollby="'. ( isset( $slide_slideby ) && $slide_slideby != '' ? absint( $slide_slideby ) : 1 ) .'"',
				'data-autoheight="0"',
			);
			$data_atts = implode( " ", $gal_atts );
		}

		$thumb_size = $settings[ 'thumbnail_size' ];
		$image_sizes = get_intermediate_image_sizes();
		
		$this->add_render_attribute( 'image-link', 'class', 'post-image-link' );
		if( isset( $image_target ) && $image_target == 'yes' ) $this->add_render_attribute( 'image-link', 'target', '_blank' );
		if( isset( $image_nofollow ) && $image_nofollow == 'yes' ) $this->add_render_attribute( 'image-link', 'rel', 'nofollow' );
		
		$this->add_render_attribute( 'title-link', 'class', 'post-title' );
		if( isset( $title_target ) && $title_target == 'yes' ) $this->add_render_attribute( 'title-link', 'target', '_blank' );
		if( isset( $title_nofollow ) && $title_nofollow == 'yes' ) $this->add_render_attribute( 'title-link', 'rel', 'nofollow' );
		
		$this->add_render_attribute( 'more-link', 'class', 'read-more elementor-button' );
		if( isset( $more_target ) && $more_target == 'yes' ) $this->add_render_attribute( 'more-link', 'target', '_blank' );
		if( isset( $more_nofollow ) && $more_nofollow == 'yes' ) $this->add_render_attribute( 'more-link', 'rel', 'nofollow' );

		$default_items = array( 
			"thumb"			=> esc_html__( "Feature Image", "cea-post-types" ),
			"title"			=> esc_html__( "Title", "cea-post-types" ),
			"excerpt"		=> esc_html__( "Excerpt", "cea-post-types" )
		);
		$elemetns = isset( $post_items ) && !empty( $post_items ) ? json_decode( $post_items, true ) : array( 'Enabled' => $default_items );
		$overlay_opt = isset( $post_overlay_items_opt ) && $post_overlay_items_opt == 'yes' ? true : false;
		$overlay_items = isset( $post_overlay_items ) && !empty( $post_overlay_items ) ? json_decode( $post_overlay_items, true ) : array( 'Enabled' => '' );
		$top_meta = isset( $top_meta ) && $top_meta != '' ? $top_meta : array( 'Enabled' => '' );
		$bottom_meta = isset( $bottom_meta ) && $bottom_meta != '' ? $bottom_meta : array( 'Enabled' => '' );

		$cols = isset( $testimonial_cols ) ? $testimonial_cols : 12;
		$col_class = "col-lg-". absint( $cols );
		$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
		
		$list_layout = isset( $testimonial_layout ) && $testimonial_layout == 'list' ? 1 : 0;
		
		//Query Start
		global $wp_query;
		$paged = 1;
		if( get_query_var('paged') ){
			$paged = get_query_var('paged');
		}elseif( get_query_var('page') ){
			$paged = get_query_var('page');
		}
				
		$ppp = $post_per_page != '' ? $post_per_page : 2;
		$args = array(
			'post_type' => 'cea-testimonial',
			'posts_per_page' => absint( $ppp ),
			'paged' => $paged,
			'ignore_sticky_posts' => 1
			
		);
		
		//Include Author
		if( !empty( $include_author ) ){
			$args['author__in'] = $include_author;
		}
		
		//Include Posts
		if( !empty( $include_posts ) ){
			$args['post__in'] = $include_posts;
		}
		
		//Exclude Posts
		if( !empty( $exclude_posts ) ){
			$args['post__not_in'] = $exclude_posts;
		}
		
		//Order by
		if( !empty( $orderby ) ){
			$args['orderby'] = $orderby;
		}
		
		//Order
		if( !empty( $order ) ){
			$args['order'] = $order;
		}
		
		$query = new \WP_Query( $args );
			
		if ( $query->have_posts() ) {

			add_filter( 'excerpt_more', 'cea_excerpt_more', 99 );
			add_filter( 'excerpt_length', array( $this, 'cea_excerpt_length' ), 99 );
		
			$row_stat = 0;
		
			if( $slide_opt ) {
				echo '<div class="cea-carousel owl-carousel" '. ( $data_atts ) .'>';	
				$col_class = 'owl-carousel-item';
			}elseif( $testimonial_masonry ){
			
				$loading_msg = isset( $loading_msg ) && $loading_msg != '' ? $loading_msg : esc_html__( 'Loading..', 'cea-post-types' );
				$loading_end = isset( $loading_end ) && $loading_end != '' ? $loading_end : esc_html__( 'No more posts..', 'cea-post-types' );
				$loading_img = isset( $loading_img ) && $loading_img != '' ? $loading_img['url'] : CEA_CORE_URL . 'assets/images/infinite-loader.gif';
			
				$isotope_class = ' isotope-col-'. esc_attr( 12 / absint( $cols ) );
				echo '<div class="isotope'. esc_attr( $isotope_class ) .'" data-cols="'. esc_attr( 12 / absint( $cols ) ) .'" data-gutter="'. esc_attr( $testimonial_gutter ) .'" data-layout="'. esc_attr( $masonry_layout ) .'" data-infinite="'. esc_attr( $testimonial_infinite ) .'" data-lazyload="'. esc_attr( $lazy_load ) .'" data-loadmsg="'. esc_attr( $loading_msg ) .'" data-loadend="'. esc_attr( $loading_end ) .'" data-loadimg="'. esc_attr( $loading_img ) .'">';
				$col_class = 'isotope-item';
				$col_class .= $lazy_load ? ' cea-animate' : '';
			}
			
			// Testimonial items array
			$testimonial_array = array(
				'cols' => $cols,
				'post_heading' => $post_heading,
				'overlay_opt' => $overlay_opt,
				'overlay_items' => $overlay_items,
				'more_text' => $more_text,
				'top_meta' => $top_meta,
				'bottom_meta' => $bottom_meta,				
				'thumb_size' => $thumb_size,
				'image_sizes' => $image_sizes
			);
			
			if( $list_layout || $testimonial_layout == 'classic-pro' ){
				if(	isset( $elemetns['Enabled']['thumb'] ) ) unset( $elemetns['Enabled']['thumb'] );
			}
			
			if( $tilt_opt ){
				$col_class .= ' cea-tilt';
			}
		
			// Start the Loop
			while ( $query->have_posts() ) : $query->the_post();
				
				$post_id = get_the_ID();
				$testimonial_array['post_id'] = $post_id;
				
				$cat_class = '';
				if( !$testimonial_masonry && !$slide_opt ){
					if( $row_stat == 0 ) :
						echo '<div class="row">';
					endif;
				}elseif( $testimonial_masonry && $isotope_filter && $filter_catoutput != '' ){
					$terms = get_the_terms( $post_id, 'testimonial-categories' );
					if ( $terms && ! is_wp_error( $terms ) ) :
						foreach ( $terms as $term ) {
							$cat_class .= ' testimonial-filter-' . $term->term_id;
						}
					endif;
				}
				
				echo '<div class="'. esc_attr( $col_class . $cat_class ) .'" '. $this->get_render_attribute_string( 'cea-testimonial-tilt' ) .'>';
					echo '<div class="testimonial-inner">';
						
						if( $list_layout ){
							echo '<div class="media">';
								echo $this->cea_testimonial_shortcode_elements('thumb', $testimonial_array, $settings);
								echo '<div class="media-body">';
						}elseif( $testimonial_layout == 'classic-pro' ){
							echo $this->cea_testimonial_shortcode_elements('thumb', $testimonial_array, $settings);
							echo '<div class="post-details-outer">';
						}

						if( isset( $elemetns['Enabled'] ) ) :
							foreach( $elemetns['Enabled'] as $element => $value ){
								echo $this->cea_testimonial_shortcode_elements( $element, $testimonial_array, $settings);
							}
						endif;
						
						if( $list_layout ){
								echo '</div><!-- .media -->';
							echo '</div><!-- .media-body -->';
						}elseif( $testimonial_layout == 'classic-pro' ){
							echo '</div><!-- .post-details-outer -->';
						}
					echo '</div><!-- .testimonial-inner -->';
				echo '</div><!-- .col / .owl-carousel-item / .isotope -->';
				
				if( !$testimonial_masonry && !$slide_opt ){
					$row_stat++;
					if( $row_stat == ( 12/ $cols ) ) :
						echo '</div><!-- .row -->';
						$row_stat = 0;
					endif;
				}
				
			endwhile;
			
			if( !$testimonial_masonry && !$slide_opt ){
				if( $row_stat != 0 ){
					echo '</div><!-- .row -->'; // Unexpected row close
				}
			}elseif( $slide_opt ) {
				echo '</div><!-- .owl-carousel -->';
			}elseif( $testimonial_masonry ){
				echo '</div><!-- .isotope -->';
			}
			
			if( ( !$slide_opt ) && $testimonial_infinite ) {
				echo $testimonial_infinite ? '<div class="infinite-load">' : '';
					require_once CEA_PT_CORE_DIR . '/inc/cpt.basic-functions.php';
					echo CPT_Other::CeaBootstrapPagination( $args, $query->max_num_pages, false );
				echo $testimonial_infinite ? '</div><!-- infinite-load -->' : '';
				echo '<div class="page-load-status">';
					if( $loading_img ) echo '<img src="'. esc_url( $loading_img ) .'" alt="'. esc_attr( 'Loading...', 'cea-post-types' ) .'" />';
					if( $loading_msg ) echo '<p class="infinite-scroll-request">'. esc_html( $loading_msg ) .'</p>';
					if( $loading_end ) echo '<p class="infinite-scroll-last">'. esc_html( $loading_end ) .'</p>';
				echo '</div>';
			}elseif( ( !$slide_opt ) && $testimonial_pagination ){
				require_once CEA_PT_CORE_DIR . '/inc/cpt.basic-functions.php';
				echo CPT_Other::CeaBootstrapPagination( $args, $query->max_num_pages, false );
			}	
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();
		

	}
	
	function cea_testimonial_shortcode_elements( $element, $opts = array(), $settings = null ){
		$output = '';
		switch( $element ){		
			
			case "title":
				$head = isset( $opts['post_heading'] ) ? $opts['post_heading'] : 'h3';
				$output .= '<' . esc_attr( $head ) . ' class="post-title-head"><a href="'. esc_url( get_the_permalink() ) .'" class="client-name post-title">'. esc_html( get_the_title() ) .'</a></' . esc_attr( $head ) . '>';
			break;
			
			case "designation":
				$designation = get_post_meta( get_the_ID(), 'cea_testimonial_designation', true );
				if( $designation ) :					
					$output .= '<div class="testimonial-designation">';
						$output .= '<span class="d-block">'. esc_html( $designation ) .'</span>';
					$output .= '</div><!-- .testimonial-designation -->';
				endif;
			break;
			
			case "info":
				$output .= '<div class="testimonial-info">';			
					$designation = get_post_meta( get_the_ID(), 'cea_testimonial_designation', true );
					if( $designation ) :
						$output .= '<span class="client-designation d-block">'. esc_html( $designation ) .'</span>';
					endif;
					
					$company_url = get_post_meta( get_the_ID(), 'cea_testimonial_company_url', true );
					if( $company_url ) :
						$output .= '<a href="'. esc_url( $company_url ) .'" class="company-url">'. esc_url( $company_url ) .'</a>';
					endif;
				$output .= '</div><!-- .testimonial-info -->';		
			break;
			
			case "thumb":
				if ( has_post_thumbnail() ) {
					
					$overlay_opt = isset( $opts['overlay_opt'] ) && $opts['overlay_opt'] == 'yes' ? true : false;
					$thumb_wrap_class = $overlay_opt ? ' post-overlay-active' : '';
					
					$output .= '<div class="post-thumb'. esc_attr( $thumb_wrap_class ) .'">';
						$img_id = get_post_thumbnail_id( get_the_ID() );
						$size = $opts['thumb_size'];
						$image_sizes = $opts['image_sizes'];
						$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );		
						$this->add_render_attribute( 'image_class', 'class', $settings['img_style'] );
						
						if( in_array( $size, $image_sizes ) ){
							$this->add_render_attribute( 'image_class', 'class', "attachment-$size size-$size" );
							$img_attr = $this->get_render_attributes( 'image_class' );
							$img_attr['class'] = implode( " ", $img_attr['class'] );
							$output .= '<a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'image-link' ) .'>';
								$output .= wp_get_attachment_image( $img_id, $size, false, $img_attr );
							$output .= '</a>';
						}else{
							$image_src = Group_Control_Image_Size::get_attachment_image_src( $img_id, 'thumbnail', $settings );
							if ( ! empty( $image_src ) ) {
								$img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
								$output .= '<a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'image-link' ) .'>';
								$output .= sprintf( '<img src="%s" title="%s" alt="%s" %s />', esc_attr( $image_src ), esc_attr( get_the_title( $img_id ) ), esc_attr( $img_alt ), $this->get_render_attribute_string( 'image_class' ) );
								$output .= '</a>';
							}
						}						
						
						if( $overlay_opt ){
							$post_overlay_items = isset( $opts['overlay_items'] ) ? $opts['overlay_items'] : array( 'Enabled' => '' );
							$output .= '<div class="post-overlay-items">';
								foreach( $post_overlay_items['Enabled'] as $element => $value ){
									$output .= $this->cea_testimonial_shortcode_elements( $element, $opts );
								}
							$output .= '</div>';

						}													
					$output .= '</div><!-- .post-thumb -->';
				}
			break;
						
			case "author":
				$output .= '<div class="post-author">';
					$output .= '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) .'">';
						$output .= '<span class="author-img">'. get_avatar( get_the_author_meta('email'), '30', null, null, array( 'class' => 'rounded-circle' ) ) .'</span>';
						$output .= '<span class="author-name">'. get_the_author() .'</span>';
					$output .= '</a>';
				$output .= '</div>';
			break;
			
			case "date":
				$archive_year  = get_the_time('Y');
				$archive_month = get_the_time('m'); 
				$archive_day   = get_the_time('d');
				$output = '<div class="post-date"><a href="'. esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) .'" ><i class="icon icon-calendar"></i> '. get_the_time( get_option( 'date_format' ) ) .'</a></div>';
			break;
			
			case "more":
				$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'cea-post-types' );
				$output = '<div class="post-more"><a href="'. esc_url( get_permalink( get_the_ID() ) ) . '" '. $this->get_render_attribute_string( 'more-link' ) .'>'. esc_html( $read_more_text ) .'</a></div>';
			break;
						
			case "excerpt":
				$output = '';
				$output .= '<div class="post-excerpt">';
					ob_start();
					the_excerpt();
					$excerpt_cont = ob_get_clean();
					$output .= $excerpt_cont;
				$output .= '</div><!-- .post-excerpt -->';	
			break;		
			
			case "top-meta":
				$output = '';
				$top_meta = $opts['top_meta'];
				$elemetns = isset( $top_meta ) ? json_decode( $top_meta, true ) : array( 'Left' => '' );
				$output .= '<div class="top-meta clearfix">';
				foreach( $elemetns as $ele_key => $ele_part ){
					if( isset( $ele_part ) && !empty( $ele_part ) && $ele_key != 'disabled' ) :
						$part_class = $ele_key == 'Left' || $ele_key == 'Right' ? ' meta-' . strtolower( $ele_key ) : '';
						$output .= '<ul class="nav top-meta-list'. esc_attr( $part_class ) .'">';
							foreach($ele_part as $element => $value ){
								$testimonial_array = array( 'more_text' => $opts['more_text'] );
								$output .= '<li>'. $this->cea_testimonial_shortcode_elements( $element, $testimonial_array ) .'</li>';
							}
						$output .= '</ul>';
					endif;
				}
				$output .= '</div>';
			break;
			
			case "bottom-meta":
				$output = '';
				$bottom_meta = $opts['bottom_meta'];
				$elemetns = isset( $bottom_meta ) ? json_decode( $bottom_meta, true ) : array( 'Left' => '' );
				$output .= '<div class="bottom-meta clearfix">';
				foreach( $elemetns as $ele_key => $ele_part ){
					if( isset( $ele_part ) && !empty( $ele_part ) && $ele_key != 'disabled' ) :
						$part_class = $ele_key == 'Left' || $ele_key == 'Right' ? ' meta-' . strtolower( $ele_key ) : '';
						$output .= '<ul class="nav bottom-meta-list'. esc_attr( $part_class ) .'">';
							foreach($ele_part as $element => $value ){
								$testimonial_array = array( 'more_text' => $opts['more_text'] );
								$output .= '<li>'. $this->cea_testimonial_shortcode_elements( $element, $testimonial_array ) .'</li>';
							}
						$output .= '</ul>';
					endif;
				}
				$output .= '</div>';
			break;
			
			case "rate":
				$rate = get_post_meta( get_the_ID(), 'cea_testimonial_rating', true );
				if( $rate ) :
					$output .= '<div class="testimonial-rating">';
						$output .= '<p>'. cea_star_rating( $rate ) .'</p>';
					$output .= '</div><!-- .testimonial-rating -->';	
				endif;	
			break;
			
		}
		return $output; 
	}
	
	function cea_excerpt_length( $length ) {
		return $this->excerpt_len;
	}

}