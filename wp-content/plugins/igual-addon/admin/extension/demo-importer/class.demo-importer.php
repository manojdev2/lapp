<?php 

class Igual_Demo_Importer {
	
	private static $_instance = null;
	
	public static $ins_demo_stat;
	
	public static $ins_demo_id;

	public function __construct() {
		
		$this->set_installed_demo_details();
		
		add_action( 'admin_menu', array( $this, 'igual_addon_admin_menu' ) );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'igual_enqueue_admin_script' ) );
		
	}
	
	public static function igual_addon_admin_menu(){
		add_submenu_page( 
			'igual-welcome', 
			esc_html__( 'Demo Importer', 'igual-addon' ),
			esc_html__( 'Demo Importer', 'igual-addon' ), 
			'manage_options', 
			'igual-importer', 
			array( 'Igual_Demo_Importer', 'igual_demo_import_admin_page' )
		);
	}
	
	private function set_installed_demo_details(){
		self::$ins_demo_stat = get_theme_mod( 'igual_demo_installed' );
		self::$ins_demo_id = get_theme_mod( 'igual_installed_demo_id' );
	}
	
	public function igual_enqueue_admin_script(){
		
		if( isset( $_GET['page'] ) && $_GET['page'] == 'igual-importer' ){
		
			wp_enqueue_style( 'igual-confirm', IGUAL_ADDON_URL . 'admin/extension/demo-importer/assets/css/jquery-confirm.min.css' );
			wp_enqueue_script( 'igual-confirm', IGUAL_ADDON_URL . 'admin/extension/demo-importer/assets/js/jquery-confirm.min.js', array( 'jquery' ), '1.0', true ); 
			
			wp_enqueue_script( 'igual-import-scripts', IGUAL_ADDON_URL . 'admin/extension/demo-importer/assets/js/demo-import.js', array( 'jquery' ), '1.7.5', true ); 
			
			//Import Localize Script
			$demo_import_args = array(
				'admin_ajax_url' => esc_url( admin_url('admin-ajax.php') ),
				'nonce' => wp_create_nonce('igual-options-import'),		
				'proceed' => esc_html__('Proceed', 'igual'),
				'cancel' => esc_html__('Cancel', 'igual'),
				'process' => esc_html__( 'Processing', 'igual-addon' ),
				'uninstalling' => esc_html__('Uninstalling...', 'igual'),
				'uninstalled' => esc_html__('Uninstalled.', 'igual'),
				'unins_pbm' => esc_html__('Uninstall Problem!.', 'igual'),
				'downloading' => esc_html__('Demo import process running...', 'igual'), 
				'igual_import_url' => admin_url( 'admin.php?page=igual-importer' ),
				'regenerate_thumbnails_url' => admin_url( 'plugin-install.php?tab=plugin-information&plugin=regenerate-thumbnails' )				
			);
			$demo_import_args = apply_filters( 'igual_demo_import_args', $demo_import_args );
			wp_localize_script( 'igual-import-scripts', 'igual_admin_ajax_var', $demo_import_args );
		}
		
	}
	
	public static function igual_demo_div_generater( $demo_array ){
		
		$ins_demo_stat = self::$ins_demo_stat;
		$ins_demo_id = self::$ins_demo_id;
		
		$demo_class = '';
		if( $ins_demo_stat == 1 ){
			if( $ins_demo_id == $demo_array['demo_id'] ){
				$demo_class .= ' demo-actived';
			}else{
				$demo_class .= ' demo-inactive';
			}
		}else{
			$demo_class .= ' demo-active';
		}
	
		$revslider = isset( $demo_array['revslider'] ) && $demo_array['revslider'] != '' ? $demo_array['revslider'] : '';
		$media_parts = isset( $demo_array['media_parts'] ) && $demo_array['media_parts'] != '' ? $demo_array['media_parts'] : '';
		
		?>
		
		
		<div class="admin-box demo-wrap">
			<div class="install-plugin-wrap theme zozothemes-demo-item<?php echo esc_attr( $demo_class ); ?>">
				<div class="install-plugin-inner">
				
					<div class="zozo-demo-import-loader zozo-preview-<?php echo esc_attr( $demo_array['demo_id'] ); ?>"><i class="dashicons dashicons-admin-generic"></i></div>
					
					<div class="installation-progress">
						<span class="progress-text"></span>
						<div class="progress">
							<div class="progress-bar" style="width:0%"></div>
						</div>
					</div>
				
					<div class="theme-screenshot zozotheme-screenshot">
						<a href="<?php echo esc_url( $demo_array['demo_url'] ); ?>" target="_blank"><img src="<?php echo esc_url( IGUAL_ADDON_URL . 'admin/extension/demo-importer/assets/images/demo/' . $demo_array['demo_img'] ); ?>" class="demo-img" /></a>
					</div>
					<div class="install-plugin-right">
						<div class="install-plugin-right-inner">
							<h3 class="theme-name" id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>"><?php echo esc_attr( $demo_array['demo_name'] ); ?></h3>
							
							<a href="#" class="theme-demo-install-custom"><?php esc_html_e( "Custom Choice", "igual" ); ?></a>
							
							<div class="theme-demo-install-parts" id="<?php echo esc_attr( 'demo-install-parts-'. $demo_array['demo_id'] ); ?>">
							
								<div class="demo-install-instructions">
									<ul class="install-instructions">
										<li><strong><?php esc_html_e( "General", "igual" ); ?></strong></li>
										<li><?php esc_html_e( 'Choose "Media" -> All the media\'s are ready to be import.', "igual" ); ?></li>
										<li><?php esc_html_e( 'Choose "Theme Options" -> Theme options are ready to be import.', "igual" ); ?></li>
										<li><?php esc_html_e( 'Choose "Widgets" -> Custom sidebars and widgets are ready to be import.', "igual" ); ?></li>
										<?php if( $revslider ) : ?>
										<li><?php esc_html_e( 'Choose "Revolution Sliders" -> Revolution slides are ready to be import.', "igual" ); ?></li>
										<?php endif; ?>
										<li><?php esc_html_e( 'Choose "All Posts" -> Posts, menus, custom post types are ready to be import.', "igual" ); ?></li>
										<li><p class="lead"><strong>*</strong><?php esc_html_e( 'If you check "All Posts" and Uncheck any of page, then menu will not imported.', "igual" ); ?></p></li>
										
										<li><strong><?php esc_html_e( "Pages", "igual" ); ?></strong></li>
										<li><?php esc_html_e( 'Choose pages which you want to show on your site. If you choose all the pages and check "All Post" menu will be import. If any one will not check even page or All posts, then menu will not import.', "igual" ); ?></li>
									</ul>
								</div>
							
								<div class="zozo-col-3">
									<h5><?php esc_html_e( "General", "igual" ); ?></h5>
									<?php
									if( isset( $demo_array['general'] )	 ){
										echo '<ul class="general-install-parts-list">';
										foreach( $demo_array['general'] as $key => $value ){
											echo '<li><input type="checkbox" value="'. esc_attr( $key ) .'" data-text="'. esc_attr( $value ) .'" /> '. esc_html( $value ) .'</li>';
										}
										echo '</ul>';
									}						
									?>
								</div><!-- .zozo-col-3 -->
								<div class="zozo-col-3">
									<h5><?php esc_html_e( "Pages", "igual" ); ?></h5>
									<?php
									if( isset( $demo_array['pages'] )	 ){
										echo '<ul class="page-install-parts-list">';
										foreach( $demo_array['pages'] as $key => $value ){
											echo '<li><input type="checkbox" value="'. esc_attr( $key ) .'" data-text="'. esc_attr( $value ) .'" /> '. esc_html( $value ) .'</li>';
										}
										echo '</ul>';
									}						
									?>
								</div><!-- .zozo-col-3 -->
								<a href="#" class="theme-demo-install-checkall"><?php esc_html_e( "Check/Uncheck All", "igual" ); ?></a>
								<p><?php esc_html_e( "Leave empty/uncheck all to full install.", "igual" ); ?></p>
							</div><!-- .theme-demo-install-parts -->
							<div class="theme-actions theme-buttons">
								<a class="button button-primary button-install-demo" data-demo-id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>" data-revslider="<?php echo esc_attr( $revslider ); ?>" data-media="<?php echo esc_attr( $media_parts ); ?>" href="#">
								<?php esc_html_e( "Import", "igual" ); ?>
								</a>
								<a class="button button-primary button-uninstall-demo" data-demo-id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>" href="#">
								<?php esc_html_e( "Uninstall", "igual" ); ?>
								</a>
								<a class="button button-primary" target="_blank" href="<?php echo esc_url( $demo_array['demo_url'] ); ?>">
								<?php esc_html_e( "Preview", "igual" ); ?>
								</a>
							</div>
							
						</div><!-- .install-plugin-right-inner -->
					</div><!-- .install-plugin-right -->
				</div>
			</div><!-- .admin-box -->
		<?php
	}
	
	public static function igual_demo_import_admin_page(){
		$igual_theme = wp_get_theme();
	?>
		<div class="igual-settings-wrap">
		
			<?php wp_nonce_field( 'igual_demo_import_*&^^$#(*', 'igual_demo_import_nonce' ); ?>
		
			<div class="igual-header-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Igual Demo Importer', 'igual-addon' ); ?></h2>
				</div><!-- .igual-header-left -->
				<div class="igual-header-right">
					<a href="<?php echo esc_url( 'https://wordpress.zozothemes.com/igual/' ); ?>" class="button igual-btn"><?php esc_html_e( 'Live Demo', 'igual-addon' ); ?></a>
				</div><!-- .igual-header-right -->
			</div><!-- .igual-header-bar -->
			
			<div class="igual-settings-tabs igual-demo-import-wrap">
				<div id="igual-general" class="igual-settings-tab active">
					<div class="container">
						<div class="row">
							<div class="col-6">							
							<?php
								
								//Demo Classic
								$demo_array = array(
									'demo_id' 	=> 'demo',
									'demo_name' => esc_html__( 'Igual Main Demo', 'igual-addon' ),
									'demo_img'	=> 'demo-1.jpg',
									'demo_url'	=> 'https://wordpress.zozothemes.com/igual/',
									'revslider'	=> '8',
									'media_parts'	=> '26',
									'general'	=> array(
										'media' 		=> esc_html__( "Media", "igual" ),
										'theme-options' => esc_html__( "Theme Options", "igual" ),
										'widgets' 		=> esc_html__( "Widgets", "igual" ),
										'revslider' 	=> esc_html__( "Revolution Sliders", "igual" ),
										'post' 			=> esc_html__( "All Posts", "igual" )
									),
									'pages'=> array(
										'1'		=> esc_html__( "Contact Us", "igual" ),
										'2'	=> esc_html__( "Practice Areas", "igual" ),						
										'3'	=> esc_html__( "About  Us", "igual" ),
										'4'	=> esc_html__( "Our Team", "igual" ),
										'5'	=> esc_html__( "Blog", "igual" ),
										'6'	=> esc_html__( "Blog List", "igual" ),
										'7'	=> esc_html__( "Case Studies", "igual" ),
										'8'	=> esc_html__( "Career", "igual" ),
										'9'	=> esc_html__( "Portfolio No Gutter", "igual" ),
										'10'	=> esc_html__( "Portfolio Slider", "igual" ),
										'11' 	=> esc_html__( "Coming Soon", "igual" ),
										'12'		=> esc_html__( "Who We Are", "igual" ),
										'13' 	=> esc_html__( "2 Columns", "igual" ),
										'14' 	=> esc_html__( "2 Columns + Sidebar", "igual" ),
										'15'		=> esc_html__( "3 Columns", "igual" ),
										'16' 	=> esc_html__( "4 Columns Fullwidth", "igual" ),
										'17'		=> esc_html__( "Refund and Returns Policy", "igual" ),
										'18' 	=> esc_html__( "Case Studies Grid 2", "igual" ),
										'19' 	=> esc_html__( "Case Studies Grid 3", "igual" ),
										'20'	=> esc_html__( "Case Studies Grid 4", "igual" ),						
										'21'	=> esc_html__( "Case Studies Masonry", "igual" ),
										'22'	=> esc_html__( "Portfolio Masonry Classic", "igual" ),
										'23'	=> esc_html__( "Portfolio Masonry Modern", "igual" ),
										'24'	=> esc_html__( "Portfolio Masonry Classic Pro", "igual" )	,
										'25'	=> esc_html__( "Privacy Policy", "igual" )	,
										'26'	=> esc_html__( "Home", "igual" )	,
										'27'	=> esc_html__( "Testimonials", "igual" )	,
										'28'	=> esc_html__( "Blogs", "igual" )	,
										'29'	=> esc_html__( "Charts", "igual" )	,
										'30'	=> esc_html__( "Circle Progress", "igual" )	,
										'31'	=> esc_html__( "Progress Bar", "igual" )	,
										'32'	=> esc_html__( "Day Counter", "igual" ) ,
										'33'	=> esc_html__( "Feature Box", "igual" )	,
										'34'	=> esc_html__( "Tabs", "igual" )	,
										'35'	=> esc_html__( "Mailchimp", "igual" )	,
										'36'	=> esc_html__( "Modal Popup", "igual" )	,
										'37'	=> esc_html__( "Flipbox", "igual" )	,
										'38'	=> esc_html__( "Pricing Table", "igual" )	,
										'39'	=> esc_html__( "Contact Forms", "igual" )	,
										'40'	=> esc_html__( "Testimonials Styles", "igual" )	,
										'41'	=> esc_html__( "Teams", "igual" )	,
										'42'	=> esc_html__( "Portfolios", "igual" )	,
										'43'	=> esc_html__( "Practice Area Styles", "igual" )	,
										'44'	=> esc_html__( "Google Maps", "igual" )	,
										'45'	=> esc_html__( "Video Popup", "igual" )	,
										'46'	=> esc_html__( "Popover", "igual" )	,
										'47'	=> esc_html__( "Timeline", "igual" )	,
										'48'	=> esc_html__( "Counters", "igual" )	,
										'49'	=> esc_html__( "Frequently Asked Question", "igual" )	,
										'50'	=> esc_html__( "Our History", "igual" )	,
										'51'	=> esc_html__( "Unlimited Headers", "igual" )	,
										'52'	=> esc_html__( "Service", "igual" )	,
										'53'	=> esc_html__( "Home 2", "igual" )	,
										'54'	=> esc_html__( "Home 3", "igual" )	,
										'55'	=> esc_html__( "Home 4", "igual" )	,
										'56'	=> esc_html__( "Unlimited Footers", "igual" )	,
										'57'	=> esc_html__( "Blog Grid + Overlay", "igual" )	,
										'58'	=> esc_html__( "Practice Area Styles 1", "igual" )	,
										'59'	=> esc_html__( "Practice Area Styles 2", "igual" )	,
										'60'	=> esc_html__( "Practice Area Styles 3", "igual" )	,
										'61'	=> esc_html__( "Home 5", "igual" )	,
										'62'	=> esc_html__( "Home 6", "igual" )	,
										'63'	=> esc_html__( "Home 7", "igual" )	,
										'64'	=> esc_html__( "Practice Areas Grid", "igual" )	,
										'65'	=> esc_html__( "Headers Test", "igual" )	,
										'66'	=> esc_html__( "Home Landing Page", "igual" )	,
										'67'	=> esc_html__( "Home 8", "igual" )	,
										'68'	=> esc_html__( "Home 9", "igual" )									
									)
									
								);
								self::igual_demo_div_generater( $demo_array );								
							?>
							
								<div class="theme-requirements" data-requirements="<?php 
									printf( '<h2>%1$s</h2> <p>%2$s</p> <h3>%3$s</h3> <ol><li>%4$s</li></ol>', 
										esc_html__( 'WARNING:', 'igual-addon' ), 
										esc_html__( 'Importing demo content will give you pages, posts, theme options, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minutes to complete.', 'igual-addon' ),
										esc_html__( 'DEMO REQUIREMENTS:', 'igual-addon' ),
										esc_html__( 'Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.', 'igual-addon' )
									);
								?>">
								</div>							
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	<?php
	}
	
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

} Igual_Demo_Importer::get_instance();

/* Demo Import AJAX */
if( ! function_exists('igual_demo_import_fun') ) {
    function igual_demo_import_fun() {
		
		if( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'igual_demo_import_*&^^$#(*' ) ) {
			echo "!security issue";
			wp_die(); 
		}
		
		$process = isset( $_POST['process'] ) ? $_POST['process'] : '';
		
		if( $process ){
			
			include IGUAL_ADDON_DIR . 'admin/extension/demo-importer/zozo-importer.php';
			
			if( $process == 'permission' ){
				igualZozoImporterModule::igual_check_file_access_permission();
			}elseif( $process == 'general_download' ){
				igualZozoImporterModule::igual_general_file_ajax();
			}elseif( $process == 'xml_download' ){
				igualZozoImporterModule::igual_xml_file_ajax();
			}elseif( $process == 'general_install' ){
				igualZozoImporterModule::igual_general_file_install_ajax();
			}elseif( $process == 'xml_install' ){
				igualZozoImporterModule::igual_xml_file_install_ajax();
			}elseif( $process == 'final' ){
				igualZozoImporterModule::igual_import_set_default_settings();
			}elseif( $process == 'uninstall' ){
				igualZozoImporterModule::igual_uninstall_demo();
			}
			
		}
		
		wp_die();
		
    }
    add_action('wp_ajax_igual_demo_import', 'igual_demo_import_fun');
}