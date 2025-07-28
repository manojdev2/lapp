<?php

/**
 * Igual Theme Options
 * @since 1.0.0
 */
final class Igual_Plugin_Options { //igual_admin_menu_out
	
	private static $_instance = null;
	
	public function __construct() {	
		add_action( 'admin_menu', array( $this, 'igual_addon_options_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'igual_framework_admin_scripts' ) );
		$this->init();

		//import
		add_action( 'wp_ajax_bridddge-theme-option-import', array( $this, 'igual_redux_themeopt_import' ) );

		//export
		add_action('wp_ajax_igual-theme-options-export', array( $this, 'igual_theme_options_export' ) );
		
	}
	
	public static function igual_addon_options_menu(){
		add_submenu_page( 
			'igual-welcome', 
			esc_html__( 'Theme Options', 'igual-addon' ),
			esc_html__( 'Theme Options', 'igual-addon' ), 
			'manage_options', 
			'igual-options', 
			array( 'Igual_Plugin_Options', 'igual_options_admin_page' )
		);
	}
	
	public static function igual_framework_admin_scripts(){
		if( isset( $_GET['page'] ) && $_GET['page'] == 'igual-options' ){
			wp_enqueue_style( 'font-awesome', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );			
			wp_enqueue_style( 'bootstrap-icons', IGUAL_URI . '/assets/css/bootstrap-icons.css', array(), '1.9.1', 'all' );
			
			wp_enqueue_media();
			wp_enqueue_style( 'igual_theme_options_css', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/css/theme-options.css', array(), '1.0', 'all' );
			wp_enqueue_style( 'wp-color-picker');
			wp_enqueue_script( 'wp-color-picker-alpha', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/js/wp-color-picker-alpha.min.js', array( 'jquery', 'wp-color-picker' ), '3.0.0' );
			wp_enqueue_script( 'igual_theme_options_js', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/js/theme-options.js', array( 'jquery' ), '1.0', true );

			wp_localize_script( 'igual_theme_options_js', 'igual_ajax_object',
				array(
					'import_nonce' => wp_create_nonce( 'igual-import-*&^F&' ),
					'export_nonce' => wp_create_nonce( 'igual-export-&^%$)' ),
				)
			);

			require_once IGUAL_ADDON_DIR . 'admin/extension/theme-options/googlefonts.php';
			$google_fonts = Igual_Google_Fonts_Function::$_google_fonts;
			$google_fonts_arr = json_decode( $google_fonts, true );
			
			$extra_gf = array(
				"Spartan" => array(
					"variants" => array(
						array( "id" => "400", "name" => "Thin 100" ),
						array( "id" => "400", "name" => "Extra-light 200" ),
						array( "id" => "400", "name" => "Light 300" ),
						array( "id" => "400", "name" => "Regular 400" ),
						array( "id" => "400", "name" => "Medium 500" ),
						array( "id" => "400", "name" => "Semi-bold 600" ),
						array( "id" => "400", "name" => "Bold 700" ),
						array( "id" => "400", "name" => "Extra-bold 800" ),
						array( "id" => "400", "name" => "Black 900" )
					)
				)
			);
			if( is_array( $extra_gf ) && !empty( $extra_gf ) ){
				foreach( $extra_gf as $font => $details ) $google_fonts_arr[$font] = $details;
			}
			
			$google_fonts = json_encode( $google_fonts_arr );
			$google_fonts_vars = array(
				'google_fonts' => $google_fonts,
				'standard_font_variants' => Igual_Google_Fonts_Function::$_standard_font_variants,
				'font_variants_default' => esc_html__( 'Font Weight &amp; Style', 'igual-addon' ),
				'font_sub_default' => esc_html__( 'Font Subsets', 'igual-addon' )
			);
			wp_localize_script( 'igual_theme_options_js', 'google_fonts_vars', $google_fonts_vars );
			
		}
	}
	
	public function init() {
		require_once( IGUAL_ADDON_DIR . 'admin/extension/theme-options/framework.php' );
		Igual_Options::$opt_name = 'igual_options';
	}
	
	public static function igual_check_zhf(){
		/**
		 * Detect plugin. For frontend only.
		 */
		include_once ABSPATH . 'wp-admin/includes/plugin.php';

		// check zozo header footer actived
		if ( is_plugin_active( 'zozo-header-footer/zozo-header-footer.php' ) ) { ?>
			<div class="igual-header-bar zhf-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( ZOZO_HF_CORE_URL . '/assets/images/zozo-logo.png' ); ?>" alt="zozo-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Zozo Header Footer Builder', 'igual-addon' ); ?></h2>
				</div><!-- .igual-header-left -->
				<div class="igual-header-right">
					<p><strong><?php esc_html_e( 'You can make custom header through this elementor builder here', 'igual-addon' ); ?> <span class="dashicons dashicons-arrow-right-alt"></span> </strong></p>
					<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=zozo-hf' ) ); ?>" class="button igual-btn"><?php esc_html_e( 'Goto Settings', 'igual-addon' ); ?></a>
				</div><!-- .igual-header-right -->
			</div><!-- .igual-header-bar -->
		<?php
		} 
	}
		
	public static function igual_options_admin_page(){	
		$igual_theme = wp_get_theme(); ?>	
		<form method="post" action="#" enctype="multipart/form-data" id="igual-plugin-form-wrapper">
			<div class="igual-settings-wrap">
			
				<div class="igual-header-bar">
					<div class="igual-header-left">
						<div class="igual-admin-logo-inline">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
						</div><!-- .igual-admin-logo-inline -->
						<h2 class="title"><?php esc_html_e( 'Igual Options', 'igual-addon' ); ?><span class="igual-version"><?php echo esc_attr( $igual_theme->get( 'Version' ) ); ?></span></h2>
					</div><!-- .igual-header-left -->
					<div class="igual-header-right">
						<button type="submit" class="button igual-btn"><?php esc_html_e( 'Save Settings', 'igual-addon' ); ?></button>
					</div><!-- .igual-header-right -->
				</div><!-- .igual-header-bar -->				
				
				<?php
					// check zhf installed
					self::igual_check_zhf();				
				?>
				
				<div class="igual-inner-wrap">
						
					<?php
						
						if ( isset( $_POST['save_igual_theme_options'] ) && wp_verify_nonce( $_POST['save_igual_theme_options'], 'igual_theme_options*&^&*$' ) ) {
							update_option( 'igual_options', $_POST['igual_options'] );
							require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/theme-options-css.php' );
						}
						
						//Get updated theme option
						Igual_Options::$igual_options = get_option('igual_options');
						
						if( class_exists( 'Classic_Elementor_Addon' ) ){
							add_action( 'igual_custom_template_options', function(){
								require_once IGUAL_ADDON_DIR . 'admin/extension/theme-options/cea-config.php';
							});
						}
						
						//Theme config
						require_once IGUAL_ADDON_DIR . 'admin/extension/theme-options/config.php';
						
					?>
					
					<div class="igual-admin-content-wrap">
						<?php wp_nonce_field( 'igual_theme_options*&^&*$', 'save_igual_theme_options' ); ?>
						<div class="igual-tab">
							<div class="igual-tab-list">
								<ul class="tablinks-list">
									<?php Igual_Options::igual_put_section(); ?>
								</ul>
							</div><!-- .igual-tab-list -->
							<div class="igual-tab-contents">
								<?php Igual_Options::igual_put_field(); ?>
							</div><!-- .igual-tab-contents -->
						</div><!-- .igual-tab -->							
					</div><!-- .igual-admin-content-wrap -->					
				</div><!-- .igual-inner-wrap -->
			</div><!-- .igual-settings-wrap -->
		</form>	
	<?php
	}

	public static function igual_theme_options_export(){
		$nonce = $_POST['nonce'];	
		if ( ! wp_verify_nonce( $nonce, 'igual-export-&^%$)' ) )
			die ( esc_html__( 'Busted!', 'igual-addon' ) );
		
		$igual_options = get_option( 'igual_options');
		$igual_options = is_array( $igual_options ) ? array_map( 'stripslashes_deep', $igual_options ) : stripslashes( $igual_options );
		echo json_encode( $igual_options );
		
		exit;
	}

	public static function igual_redux_themeopt_import(){
		$nonce = $_POST['nonce'];		  
		if ( ! wp_verify_nonce( $nonce, 'igual-import-*&^F&' ) )
			die ( esc_html__( 'Busted', 'igual-addon' ) );
		
		$json_data = isset( $_POST['json_data'] ) ? stripslashes( urldecode( $_POST['json_data'] ) ) : '';
		$theme_opt_arr = json_decode( $json_data, true );
		if( !empty( $theme_opt_arr ) ){
			update_option( 'igual_options', $theme_opt_arr );
		}
		
		wp_die('success');
	}
	
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}

Igual_Plugin_Options::instance();