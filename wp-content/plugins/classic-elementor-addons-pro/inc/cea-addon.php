<?php 

namespace Elementor;

/**
 * Classic Addons for Elementor Main Class
 *
 * The main class that initiates and runs the plugin. 
 *
 * @since 1.0.0
 */
final class Classic_Elementor_Extension {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Classic_Elementor_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Classic_Elementor_Extension An instance of the class.
	 */
	 
	private static $shortcodes_list = array();
	 
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		
		//Call Classic Elementor Addons Shortcode and Scripts
		$this->init();

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {		
		
		//Create classic elementor addon category
		$this->create_classic_elementor_category();
		
		//Init elementor supported files
		$this->classic_elementor_addon_init_files();
		
		//Call elementor custom addons
		$this->cea_set_shortcodes();
		
		// Register controls
		add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		
		// Register Editor Styles
		add_action( 'elementor/editor/before_enqueue_scripts', [$this, 'editor_enqueue_scripts'] );

	}	
	
	/**
	* Installs translation text domain and checks if Elementor is installed
	* @since 1.0.0
	* @access public
	* @return void
	*/
	public function classic_elementor_addon_init_files() {
		
		//Init admin page files
		$this->init_files(); 
	}
	
	/**
     * Register plugin shortcode category
	 * @since 2.6.8
	 * @access public
	 * @return void
	 */
	public function create_classic_elementor_category() {
	   Plugin::instance()->elements_manager->add_category(
			'classic-elements',
			array(
				'title' => esc_html__( 'Classic Addons', 'classic-elementor-addons-pro' )
			),
		1);
	}
	
	/**
	 * Require initial necessary files
	 * @since 2.6.8
	 * @access public
	 * @return void
	 */
	public function init_files(){
		
		if ( is_admin() ) {
			require_once ( CEA_CORE_DIR . 'admin/cea-settings.php');
		}
		
		//Include Custom Icons
		add_filter( 'elementor/icons_manager/native', array( $this, 'cea_custom_icons_include' ), 1 );
		
		require_once ( CEA_CORE_DIR . 'inc/traits/helper.php' );
		
		require_once ( CEA_CORE_DIR . 'inc/function.php' );
	}
	
	public function cea_custom_icons_include( $fonts_array ){
		$fonts_array['themify'] = [
			'name' => 'themify',
			'label' => __( 'Themify Icons', 'elementor' ),
			'url' => CEA_CORE_URL . 'assets/css/themify-icons.css',
			'enqueue' => [ CEA_CORE_URL . 'assets/css/themify-icons.css' ],
			'prefix' => 'ti-',
			'displayPrefix' => '',
			'labelIcon' => 'ti-heart',
			'ver' => '1.0',
			'fetchJson' => CEA_CORE_URL . 'assets/js/themify-icons.js',
			'native' => false,
		];
		$fonts_array['bootstrap'] = [
			'name' => 'bootstrap',
			'label' => __( 'Bootstrap Icons', 'elementor' ),
			'url' => CEA_CORE_URL . 'assets/css/bootstrap-icons.css',
			'enqueue' => [ CEA_CORE_URL . 'assets/css/bootstrap-icons.css' ],
			'prefix' => '',
			'displayPrefix' => '',
			'labelIcon' => 'bi-bootstrap',
			'ver' => '1.0',
			'fetchJson' => CEA_CORE_URL . 'assets/js/bootstrap-icons.js',
			'native' => false,
		];
		
		return $fonts_array;
	}
	
	public function editor_enqueue_scripts(){
		wp_enqueue_style( 'cea-editor', CEA_CORE_URL .'assets/css/editor-style.css', array(), '1.0', 'all');
	}
		
	public function widget_scripts() {

		wp_enqueue_style('bootstrap', CEA_CORE_URL .'assets/css/bootstrap.min.css', array(), '4.5.3', 'all');
		wp_enqueue_style('owl-carousel', CEA_CORE_URL .'assets/css/owl.carousel.min.css', array(), '2.3.4', 'all');
		
		wp_register_style( 'magnific-popup', CEA_CORE_URL .'assets/css/magnific-popup.min.css', array(), '1.0', 'all');
		wp_register_style( 'image-hover', CEA_CORE_URL .'assets/css/image-hover.min.css', array(), '1.0', 'all');
		wp_register_style( 'zozoimgc', CEA_CORE_URL .'assets/css/zozoimgc.css', array(), '1.0', 'all');
		wp_register_style( 'pannellum', CEA_CORE_URL .'assets/css/pannellum.min.css', array(), '2.3.2', 'all');
		wp_register_style( 'cea-table', CEA_CORE_URL . 'assets/css/front-end/data-table.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'image-hover' );
		
		wp_enqueue_style( 'fontawesome', CEA_CORE_URL . 'assets/css/font-awesome.css', false, '4.7.0' );
		wp_enqueue_style( 'themify-icons', CEA_CORE_URL . 'assets/css/themify-icons.css', false, '1.0' );
		wp_enqueue_style( 'bootstrap-icons', CEA_CORE_URL . 'assets/css/bootstrap-icons.css', false, '1.0' );
		
		wp_enqueue_style( 'cea-style', CEA_CORE_URL .'assets/css/style.css', array(), '1.0', 'all');
		wp_enqueue_style( 'cea-shortcode-style', CEA_CORE_URL .'assets/css/shortcode-styles.css', array(), '1.0', 'all');
		
		$addon_styles = get_option('cea_addon_styles'); 
		if( $addon_styles ){
			wp_add_inline_style( 'cea-style', $addon_styles );
		}
		
		wp_register_script( 'jquery-ui', CEA_CORE_URL . 'assets/js/jquery-ui.min.js',  array( 'jquery' ), '1.12.1', true );
		wp_register_script( 'jquery-ease', CEA_CORE_URL . 'assets/js/jquery.easing-1.3.min.js',  array( 'jquery' ), '1.0', true );
		
		wp_register_script( 'bootstrap', CEA_CORE_URL . 'assets/js/bootstrap.min.js', array( 'jquery', 'popper' ), '4.5.3', true );
		wp_register_script( 'isotope', CEA_CORE_URL . 'assets/js/isotope.pkgd.min.js',  array( 'jquery' ), '3.0.3', true );
		wp_register_script( 'infinite-scroll', CEA_CORE_URL . 'assets/js/infinite-scroll.pkgd.min.js',  array( 'jquery' ), '4.0.1', true );
		wp_register_script( 'typed', CEA_CORE_URL . 'assets/js/typed.min.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'owl-carousel', CEA_CORE_URL . 'assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
		wp_register_script( 'appear', CEA_CORE_URL . 'assets/js/jquery.appear.min.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'circle-progress', CEA_CORE_URL . 'assets/js/jquery.circle.progress.min.js',  array( 'jquery' ), '1.2.2', true );
		wp_register_script( 'countdown', CEA_CORE_URL . 'assets/js/jquery.countdown.min.js',  array( 'jquery' ), '2.2.0', true );
		wp_register_script( 'chart-bundle', CEA_CORE_URL . 'assets/js/Chart.bundle.min.js',  array( 'jquery' ), '2.7.2', true );
		wp_register_script( 'magnific-popup', CEA_CORE_URL . 'assets/js/jquery.magnific.popup.min.js',  array( 'jquery' ), '1.1.0', true );		
		wp_register_script( 'raindrops', CEA_CORE_URL . 'assets/js/raindrops.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-event-move', CEA_CORE_URL . 'assets/js/jquery.event.move.js',  array( 'jquery' ), '2.0.0', true );
		wp_register_script( 'jquery-zozoimgc', CEA_CORE_URL . 'assets/js/jquery.zozoimgc.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-pannellum', CEA_CORE_URL . 'assets/js/pannellum.min.js',  array( 'jquery' ), '2.3.2', true );
		wp_register_script( 'tilt', CEA_CORE_URL . 'assets/js/tilt.jquery.js',  array( 'jquery' ), '1.1.19', true );
		wp_register_script( 'cea-float-parallax', CEA_CORE_URL . 'assets/js/cea-float-parallax.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'cea-data-table', CEA_CORE_URL . 'assets/js/cea.datatable.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'cea-data-table-frontend', CEA_CORE_URL . 'assets/js/front-end/cea-table.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'cea-custom-front', CEA_CORE_URL . 'assets/js/cea-custom-front.js',  array( 'jquery' ), '1.0', true );
		
		wp_localize_script( 'cea-custom-front', 'cea_ajax_var', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		));
		
		$cea_options = get_option('cea_options'); 
		if( empty( $cea_options ) ) classic_elementor_addons_options_detault();
		if( isset( $cea_options['cpt-gmap-api'] ) && !empty( $cea_options['cpt-gmap-api'] ) ){ 
			wp_register_script( 'cea-gmaps', '//maps.google.com/maps/api/js?key='. esc_attr( $cea_options['cpt-gmap-api'] ) , array('jquery'), null, true );
		}
		wp_register_script( 'cea-timeline', CEA_CORE_URL . 'assets/js/timeline.min.js',  array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'cea-elementor-custom', CEA_CORE_URL . 'assets/js/custom.js' ,  array( 'jquery' ), '1.0', true );
	
	}	

	public function cea_set_shortcodes(){
	
		$shortcode_stat = array(
		
			//Common Shortcodes
			'animated-text' 	=> esc_html__( 'Elementor AnimateText Widget', 'classic-elementor-addons-pro' ),
			'popover'			=> esc_html__( 'Elementor Popover', 'classic-elementor-addons-pro' ),
			'contact-info' 		=> esc_html__( 'Elementor Contact Info Widget', 'classic-elementor-addons-pro' ),
			'google-map' 		=> esc_html__( 'Elementor Google Map Widget', 'classic-elementor-addons-pro' ),
			'recent-popular' 	=> esc_html__( 'Elementor Recent Popular Widget', 'classic-elementor-addons-pro' ),
			'button' 			=> esc_html__( 'Elementor Button Widget', 'classic-elementor-addons-pro' ),
			'icon-list' 		=> esc_html__( 'Elementor Icon List Widget', 'classic-elementor-addons-pro' ),
			'icon' 				=> esc_html__( 'Elementor Icon Widget', 'classic-elementor-addons-pro' ),
			'feature-box' 		=> esc_html__( 'Elementor Feature Box Widget', 'classic-elementor-addons-pro' ),
			'flip-box' 			=> esc_html__( 'Elementor Flip Box Widget', 'classic-elementor-addons-pro' ),			
			'section-title' 	=> esc_html__( 'Elementor Section Title Widget', 'classic-elementor-addons-pro' ),
			'chart' 			=> esc_html__( 'Elementor Chart Widget', 'classic-elementor-addons-pro' ),
			'circle-progress'	=> esc_html__( 'Elementor Circle Progress Widget', 'classic-elementor-addons-pro' ),
			'counter' 			=> esc_html__( 'Elementor Counter Widget', 'classic-elementor-addons-pro' ),
			'day-counter' 		=> esc_html__( 'Elementor Day Counter Widget', 'classic-elementor-addons-pro' ),
			'pricing-table' 	=> esc_html__( 'Elementor Pricing Table Widget', 'classic-elementor-addons-pro' ),
			'timeline' 			=> esc_html__( 'Elementor Timeline Widget', 'classic-elementor-addons-pro' ),
			'timeline-slide' 	=> esc_html__( 'Elementor Timeline Slide Widget', 'classic-elementor-addons-pro' ),	
			'offcanvas' 		=> esc_html__( 'Elementor Offcanvas Widget', 'classic-elementor-addons-pro' ),			
			'image-grid' 		=> esc_html__( 'Elementor Image Grid Widget', 'classic-elementor-addons-pro' ),
			'social-links' 		=> esc_html__( 'Elementor Social Links Widget', 'classic-elementor-addons-pro' ),
			'modal-popup' 		=> esc_html__( 'Elementor Modal Popup Widget', 'classic-elementor-addons-pro' ),
			'mailchimp' 		=> esc_html__( 'Elementor Mailchimp Widget', 'classic-elementor-addons-pro' ),
			'image-before-after' => esc_html__( 'Elementor Image Before After Widget', 'classic-elementor-addons-pro' ),				
			
			//Container Shortcodes
			'accordion' 		=> esc_html__( 'Elementor Accordion Widget', 'classic-elementor-addons-pro' ),
			'tab' 				=> esc_html__( 'Elementor Tab Widget', 'classic-elementor-addons-pro' ),
			'popup-anything'	=> esc_html__( 'Elementor Popup Anything', 'classic-elementor-addons-pro' ),
			'content-carousel' 	=> esc_html__( 'Elementor Content Carousel Widget', 'classic-elementor-addons-pro' ),
			'switcher-content' 	=> esc_html__( 'Elementor Switcher Content Widget', 'classic-elementor-addons-pro' ),
			'toggle-content' 	=> esc_html__( 'Elementor Toggle Content Widget', 'classic-elementor-addons-pro' ),
			'data-table' 		=> esc_html__( 'Elementor Table Widget', 'classic-elementor-addons-pro' ),
			
			//Contact Form 7 Shortcode
			'contact-form' 		=> esc_html__( 'Elementor Contact Form Widget', 'classic-elementor-addons-pro' ),
			
			//Post
			'posts'				=> esc_html__( 'Elementor Posts Widget', 'classic-elementor-addons-pro' ),
				
		);
				
		self::$shortcodes_list = $shortcode_stat;
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets( $widgets_manager ) {

		$shortcode_stat = self::$shortcodes_list;
		$cea_shortcodes = get_option('cea_shortcodes');
		
		$shortcode_emty_stat = false;
		if( empty( $cea_shortcodes ) ){
			$cea_shortcodes = $shortcode_stat;
			$shortcode_emty_stat = true;
		}
		
		//require_once( CEA_CORE_DIR . 'widgets/image-before-after.php' );
		//Plugin::instance()->widgets_manager->register( new CEA_Elementor_Image_Before_After_Widget() );
		
		foreach( $shortcode_stat as $key => $value ){
			
			$shortcode_name = !$shortcode_emty_stat ? str_replace( "-", "_", $key ) : $key;
			
			if( !empty( $cea_shortcodes ) ){
				if( isset( $cea_shortcodes[$shortcode_name] ) ){
					$saved_val = true;
				}else{
					$saved_val = false;
				}
			}else{
				$saved_val = false;
			}
			
			if( $saved_val ){
				
				require_once( CEA_CORE_DIR . 'widgets/'. esc_attr( $key ) .'.php' );
				
				switch( $key ){
										
					case 'button': $widgets_manager->register( new CEA_Elementor_Button_Widget() );  break;
					case 'icon-list': $widgets_manager->register( new CEA_Elementor_Icon_List_Widget() );  break;
					case 'icon': $widgets_manager->register( new CEA_Elementor_Icon_Widget() );  break;
					case 'feature-box': $widgets_manager->register( new CEA_Elementor_Feature_Box_Widget() );  break;
					case 'flip-box': $widgets_manager->register( new CEA_Elementor_Flip_Box_Widget() );  break;
					case 'animated-text': $widgets_manager->register( new CEA_Elementor_AnimateText_Widget() );  break; 
					case 'section-title': $widgets_manager->register( new CEA_Elementor_Section_Title_Widget() );  break;
					case 'accordion': $widgets_manager->register( new CEA_Elementor_Accordion_Widget() );  break;
					case 'tab': $widgets_manager->register( new CEA_Elementor_Tab_Widget() );  break;
					case 'chart': $widgets_manager->register( new CEA_Elementor_Chart_Widget() );  break;
					case 'circle-progress': $widgets_manager->register( new CEA_Elementor_Circle_Progress_Widget() );  break;
					case 'counter': $widgets_manager->register( new CEA_Elementor_Counter_Widget() );  break;
					case 'day-counter': $widgets_manager->register( new CEA_Elementor_Day_Counter_Widget() );  break;
					case 'pricing-table': $widgets_manager->register( new CEA_Elementor_Pricing_Table_Widget() );  break;
					case 'popup-anything': $widgets_manager->register( new CEA_Elementor_Popup_Anything_Widget() );  break;
					case 'content-carousel': $widgets_manager->register( new CEA_Elementor_Content_Carousel_Widget() ); break;
					case 'switcher-content': $widgets_manager->register( new CEA_Elementor_Switcher_Content_Widget() );  break;
					case 'toggle-content': $widgets_manager->register( new CEA_Elementor_Toggle_Content_Widget() );  break;
					case 'timeline': $widgets_manager->register( new CEA_Elementor_Timeline_Widget() );  break;
					case 'offcanvas': $widgets_manager->register( new CEA_Elementor_Offcanvas_Widget() );  break;
					case 'popover': $widgets_manager->register( new CEA_Elementor_Popover_Widget() );  break;
					case 'contact-info': $widgets_manager->register( new CEA_Elementor_Contact_Info_Widget() );  break;
					case 'contact-form': $widgets_manager->register( new CEA_Elementor_Contact_Form_Widget() );  break;
					case 'google-map': $widgets_manager->register( new CEA_Elementor_Google_Map_Widget() );  break;
					case 'data-table': $widgets_manager->register( new CEA_Elementor_DataTable_Widget() );  break;
					case 'image-grid': $widgets_manager->register( new CEA_Elementor_Image_Grid_Widget() );  break;
					case 'social-links': $widgets_manager->register( new CEA_Elementor_Social_Links_Widget() );  break;
					case 'modal-popup': $widgets_manager->register( new CEA_Elementor_Modal_Popup_Widget() );  break;	
					case 'timeline-slide': $widgets_manager->register( new CEA_Elementor_Timeline_Slide_Widget() );  break;
					case 'recent-popular': $widgets_manager->register( new CEA_Elementor_Recent_Popular_Widget() );  break;
					case 'posts': $widgets_manager->register( new CEA_Elementor_Posts_Widget() );  break;
					case 'image-before-after': $widgets_manager->register( new CEA_Elementor_Image_Before_After_Widget() );  break;
					case 'mailchimp': $widgets_manager->register( new CEA_Elementor_Mailchimp_Widget() );  break;
					
				}
				
			}
			
		}
		
	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register_controls( $controls_manager ) {

		// Include Control
		require_once( CEA_CORE_DIR . 'controls/drag-drop.php' );
		require_once( CEA_CORE_DIR . 'controls/items-spacing.php' );
		require_once( CEA_CORE_DIR . 'controls/themify-icon.php' );
		require_once( CEA_CORE_DIR . 'controls/bootstrap-icon.php' );

		// Register control
		$controls_manager->register( new DragDrop_Control() );
		$controls_manager->register( new ItemSpacing_Control() );
		$controls_manager->register( new Control_Themify_Icon() );
		$controls_manager->register( new Control_Bootstrap_Icon() );
		
	}
	
	public static function cea_get_attachment_image_html($settings, $image_size_key = 'image', $image_key = null) {
    if (!$image_key) {
        $image_key = $image_size_key;
    }
    $image = $settings[$image_key];
    if (!isset($settings[$image_size_key . '_size'])) {
        $settings[$image_size_key . '_size'] = '';
    }
    $size = $settings[$image_size_key . '_size'];
    $html = '';

    $image_sizes = get_intermediate_image_sizes();
    $image_sizes[] = 'full';

    if (!empty($image['id']) && in_array($size, $image_sizes)) {
        $img_attr = array(
            'class' => "attachment-$size size-$size",
        );
        $html .= wp_get_attachment_image($image['id'], $size, false, $img_attr);
    } else {
        $image_src = Group_Control_Image_Size::get_attachment_image_src($image['id'], $image_size_key, $settings);
        if (!$image_src && isset($image['url'])) {
            $image_src = $image['url'];
        }
        if (!empty($image_src)) {
            $img_attr = array(
                'title' => esc_attr(Control_Media::get_image_title($image)),
                'alt'   => esc_attr(Control_Media::get_image_alt($image)),
            );
            $html .= sprintf('<img src="%s" %s />', esc_attr($image_src), implode(' ', $img_attr));
        }
    }

    return $html;
}

}
Classic_Elementor_Extension::instance();