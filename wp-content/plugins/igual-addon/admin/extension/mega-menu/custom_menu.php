<?php

class Igual_Custom_Menu {
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	 
	private $mega_fields;
	 
	function __construct() {
		// load the plugin translation files
		
		add_action( 'admin_enqueue_scripts', array( $this, 'igual_menu_enqueue_scripts' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'igual_add_custom_nav_fields' ) );
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'igual_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'igual_edit_walker'), 10, 2 );
		
	} // end constructor
	
	
	/**
	 * Register Megamenu stylesheets and scripts		
	 */
	function igual_menu_enqueue_scripts( $hook ) {
		// style/scripts
		if ( 'nav-menus.php' == $hook ) {
			wp_enqueue_style( 'magnific-popup', IGUAL_ADDON_URL . 'admin/extension/mega-menu/css/magnific-popup.css', '1.1.0');
			wp_enqueue_style( 'igual-megamenu', IGUAL_ADDON_URL . 'admin/extension/mega-menu/css/megamenu.css', '1.0');
			wp_enqueue_style( 'themify-icons', IGUAL_ADDON_URL . 'assets/css/themify-icons.css', '1.0');
			wp_enqueue_script( 'magnific-popup', IGUAL_ADDON_URL . 'admin/extension/mega-menu/js/jquery.magnific-popup.min.js' , array( 'jquery' ), '1.1.0', true );
			wp_enqueue_script( 'igual-megamenu', IGUAL_ADDON_URL . 'admin/extension/mega-menu/js/megamenu.js' , array( 'jquery' ), '1.0', true );

			$menu_icons = $this->igual_menu_ti_icons();
			
			wp_localize_script( 'igual-megamenu', 'igual_object', array( 'icons' => $menu_icons ) );

			do_action( 'igual_connect_fonts_css_menu_page' );

			add_action( 'admin_footer', array( $this, 'admin_footer_custom' ), 10 );
		}
	}

	public function admin_footer_custom(){
	?>
	<form id="igual-general-settings-form" class="mfp-hide white-popup-block">
		<h1><?php esc_html_e( 'Igual General Menu Item Settings', 'igual-addon' ); ?></h1>
		<fieldset>			
			<p class="igual-menu-icon-wrap">
				<label><?php esc_html_e( 'Choose Menu Item Icon', 'igual-addon' ); ?></label>
				<select class="igual-menu-icons">
					<option value=""><?php esc_html_e( 'None', 'igual-addon' ); ?></option>
				</select>
			</p>
			<p class="igual-megamenu-wrap">
				<label><?php esc_html_e( 'Enable Megamenu', 'igual-addon' ); ?> <input type="checkbox" class="igual-megamenu-option"></label>
			</p>
			<p class="igual-megamenu-col-wrap">
				<label><?php esc_html_e( 'Megamenu Column', 'igual-addon' ); ?></label>
				<select class="igual-megamenu-col">
					<option value="12"><?php esc_html_e( '1/1', 'igual-addon' ); ?></option>
					<option value="6"><?php esc_html_e( '1/2', 'igual-addon' ); ?></option>
					<option value="4"><?php esc_html_e( '1/3', 'igual-addon' ); ?></option>
					<option value="3"><?php esc_html_e( '1/4', 'igual-addon' ); ?></option>
					<option value="2"><?php esc_html_e( '1/6', 'igual-addon' ); ?></option>
				</select>
			</p>
			<p class="igual-megamenu-widget-wrap">
				<label><?php esc_html_e( 'Megamenu Item Widget', 'igual-addon' ); ?></label>
				<select class="igual-megamenu-widget">
					<option value=""><?php esc_html_e( 'Choose Widget', 'igual-addon' ); ?></option>
					<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
							<option value="<?php echo ucwords( $sidebar['id'] ); ?>">
							<?php echo ucwords( $sidebar['name'] ); ?>
							</option>
					<?php } ?>
				</select>
			</p>
		</fieldset>
	</form>
	<?php
	}

	public function igual_menu_ti_icons(){
		$pattern = '/\.(ti-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
		$icon_css_path = IGUAL_ADDON_URL . 'assets/css/themify-icons.css';  
			
		$response = wp_remote_get( $icon_css_path );
		if( is_array($response) ) {
			$file = $response['body']; // use the content
		}
		preg_match_all($pattern, $file, $str, PREG_SET_ORDER);
		return $str;
	}
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function igual_add_custom_nav_fields( $menu_item ) {
	
		$menu_item->igualmenu = get_post_meta( $menu_item->ID, '_menu_item_igualmenu', true );	
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function igual_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
		$opt_value = isset( $_REQUEST['menu-item-igualmenu'][$menu_item_db_id] ) ? $_REQUEST['menu-item-igualmenu'][$menu_item_db_id] : '' ;
		update_post_meta( $menu_item_db_id, '_menu_item_igualmenu', $opt_value );
    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function igual_edit_walker($walker,$menu_id) {
	
	    require_once ( IGUAL_ADDON_DIR . 'admin/extension/mega-menu/class-walker-nav-menu-edit.php' );
		return 'Igual_Walker_Nav_Menu_Edit';
	    
	}
	
}
$igual_cm = new Igual_Custom_Menu();