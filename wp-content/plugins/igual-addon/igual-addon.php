<?php 
/*
	Plugin Name: Igual Addon
	Plugin URI: https://zozothemes.com/
	Description: This is addon for Igual theme.
	Version: 1.0.5
	Author: zozothemes
	Author URI: https://zozothemes.com/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// check theme 
$cur_theme = wp_get_theme();	
$token = get_option( 'verified_token' );
if( $cur_theme->get( 'Name' ) != 'Igual' && $cur_theme->get( 'Name' ) != 'Igual Child' ){
	return;
}
// check token
if( empty( $token ) ) return;

define( 'IGUAL_ADDON_DIR', plugin_dir_path( __FILE__ ) );
define( 'IGUAL_ADDON_URL', plugin_dir_url( __FILE__ ) );

/*
* Intialize and Sets up the plugin
*/
class Igual_Addon {
	
	private static $_instance = null;
		
	/**
	* Sets up needed actions/filters for the plug-in to initialize.
	* @since 1.0.0
	* @access public
	* @return void
	*/
	public function __construct() {

		//$this->igual_template_direct();

		// Get option
		$this->igual_get_option_class();

		//Igual addon setup page
		add_action('plugins_loaded', array( $this, 'igual_elementor_addon_setup') );
		
		//Igual addon shortcodes
		if( is_admin() ) add_action( 'init', array( $this, 'init_addons' ), 20 );
		
		add_action( 'init', array( $this, 'init_front_addons' ), 10 );

		//Create cuatom sidebars
		add_action( 'widgets_init', array( $this, 'igual_sidebar_registration' ), 1 );
		
		//Connect all widgets
		$this->igual_register_widgets();
		
		//Call all widgets
		add_action( 'widgets_init', array( $this, 'igual_init_widgets' ), 1 );
		
		//WP actions
		$this->igual_wp_action_setup();		

		//Custom functions
		$this->Igual_Custom_Functions_setup();
		
		//WP admin tool bar menu
		add_action( 'admin_bar_menu', array( $this, 'igual_add_toolbar_items' ), 100 );
		
	}
	
	/**
	* Installs translation text domain and checks if Elementor is installed
	* @since 1.0.0
	* @access public
	* @return void
	*/
	public function igual_elementor_addon_setup() {
		//Load text domain
		$this->load_domain();
	}
	
	/**
	 * Load plugin translated strings using text domain
	 * @since 2.6.8
	 * @access public
	 * @return void
	 */
	public function load_domain() {
		load_plugin_textdomain( 'igual-addon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	public function igual_template_direct(){
		/**
		* Maintenance or coming soon mode
		*/
		require_once ( IGUAL_ADDON_DIR . 'maintenance/maintenance.php' );
	}

	public function igual_get_option_class(){
		/**
		* Gte Theme options class
		*/
		require_once ( IGUAL_ADDON_DIR . 'inc/class.theme-options.php' );

		/**
		* Maintenance or coming soon mode
		*/
		require_once ( IGUAL_ADDON_DIR . 'maintenance/maintenance.php' );
	}
	
	
	/**
	* Load required file for addons integration
	* @return void
	*/
	public function init_addons() {
		
		/**
		* Plugin options class
		*/
		require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/class.plugin-options.php' );

		/**
		* Post/Page options class
		*/
		require_once ( IGUAL_ADDON_DIR . 'admin/extension/metabox/class.meta-box.php' );
		
		/**
		* Custom sidebar class
		*/
		require_once ( IGUAL_ADDON_DIR . 'admin/extension/class.custom-sidebars.php' );
		
		/**
		* Custom fonts class
		*/
		require_once ( IGUAL_ADDON_DIR . 'admin/extension/class.custom-fonts.php' );
		
		/**
		* Demo importer class
		*/
		require_once ( IGUAL_ADDON_DIR . 'admin/extension/demo-importer/class.demo-importer.php' );

		$menu_type = Igual_Theme_Option::igual_options('menu-type');
		if( $menu_type == 'mega' ){
			require_once ( IGUAL_ADDON_DIR . 'admin/extension/mega-menu/custom_menu.php' );
		}
				
	}

	public function init_front_addons(){
		$menu_type = Igual_Theme_Option::igual_options('menu-type');
		if( $menu_type == 'mega' ){
			require_once ( IGUAL_ADDON_DIR . 'inc/class.mega-menu.php' );
		}
	}
	
	public function igual_wp_action_setup(){
		
		/**
		* Wp actions
		*/
		require_once ( IGUAL_ADDON_DIR . 'inc/wp-actions.php' );
		
	}

	public function igual_sidebar_registration(){
		/**
		* Wp actions
		*/
		require_once ( IGUAL_ADDON_DIR . 'inc/class.widgets-register.php' );		
	}

	public function igual_register_widgets(){
		foreach ( glob( IGUAL_ADDON_DIR . "widgets/*.php" ) as $filename) {
			include $filename;
		}
	}
	
	public function igual_init_widgets(){
		//Call all widgets
		register_widget( 'Igual_About_Widget' );
		register_widget( 'Igual_Author_Widget' );
		register_widget( 'Igual_Contact_Infos_Widget' );
		register_widget( 'Igual_Latest_Post_Widget' );
		register_widget( 'Igual_Mailchimp_Widget' );
		register_widget( 'Igual_Popular_Post_Widget' );
		register_widget( 'Igual_Social_Widget' );
		register_widget( 'Igual_Advance_Tab_Post_Widget' );
	}

	public function Igual_Custom_Functions_setup(){

		require_once ( IGUAL_ADDON_DIR . 'inc/class.custom-functions.php' );	
		
		/**
		 * Detect plugin. For frontend only.
		 */
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		//Woo function
		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			require_once ( IGUAL_ADDON_DIR . 'inc/woo-functions.php' );	
		}
		
	}
	
	public function igual_add_toolbar_items($admin_bar){
		$admin_bar->add_menu( array(
			'id'    => 'igual-options',
			'title' => 'Igual Options',
			'href'  => admin_url( 'admin.php?page=igual-options' ),
			'meta'  => array(
				'title' => esc_html__( 'Igual Options', 'igual-addon' ),            
			),
		));
	}
	
	/**
	 * Creates and returns an instance of the class
	 * @since 2.6.8
	 * @access public
	 * return object
	 */
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

} Igual_Addon::get_instance();