<?php 

class Igual_Admin_Class {
	
	private static $_instance = null;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'igual_admin_menu' ) );		
		add_action( 'admin_menu', array( $this, 'change_admin_menu_name' ), 99 );
		add_action( 'admin_enqueue_scripts', array( $this, 'igual_framework_admin_scripts' ), 10 );
		
		//Call plugin page
		$this->igual_plugin_menu_connect();
	}
	
	public static function igual_framework_admin_scripts(){
		if( isset( $_GET['page'] ) && ( $_GET['page'] == 'igual-welcome' || $_GET['page'] == 'igual-options' || $_GET['page'] == 'igual-sidebars' || $_GET['page'] == 'igual-fonts' || $_GET['page'] == 'igual-plugins' || $_GET['page'] == 'igual-importer' || $_GET['page'] == 'igual-verification' ) ){
			wp_enqueue_style( 'igual-admin', get_template_directory_uri() . '/admin/assets/css/igual-admin-page.css', array(), '1.0', 'all' );
		}
		if( isset( $_GET['page'] ) && $_GET['page'] == 'igual-welcome' ) {
			wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl-carousel.min.css', array(), '2.3.4', 'all' );
			wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
		}
		wp_enqueue_style( 'igual-admin-common', get_template_directory_uri() . '/admin/assets/css/igual-admin-common.css', array(), '1.0', 'all' );	
		wp_enqueue_script( 'igual-admin-js', esc_url( get_template_directory_uri() . '/admin/assets/js/igual-admin-script.js' ), array( 'jquery' ), '1.0' );
		
		if( isset( $_GET['page'] ) && $_GET['page'] == 'igual-plugins' ){
			require_once IGUAL_DIR . '/admin/theme-plugins/tgm-init.php';			
			$plugins = TGM_Plugin_Activation::$instance->plugins;
			$args = array( 'tgm_plugins' => $plugins );
			$admin_local_args = apply_filters( 'igual_admin_local_js_args', $args );
			wp_localize_script('igual-admin-js', 'igual_admin_ajax_var', $admin_local_args );
		}
		
		if( isset( $_GET['page'] ) && $_GET['page'] == 'igual-verification' ){
			$html = '<p><strong>This purchase code already registered with another domain</strong></p><p>Please go to your previous working environment and deactivate the purchase code to use it again ( WP dashboard -> Igual -> Token Verification -> click on the button "Deactivate" ).</p>';
			$args = array( 'already_used' => $html );
			$admin_local_args = apply_filters( 'igual_admin_local_js_args', $args );
			wp_localize_script('igual-admin-js', 'igual_admin_ajax_var', $admin_local_args );
		}
	}
	
	public static function igual_admin_menu(){
		add_menu_page( 
			esc_html__( 'Igual', 'igual' ),
			esc_html__( 'Igual', 'igual' ),
			'manage_options',
			'igual-welcome', 
			array( 'Igual_Admin_Class', 'igual_admin_page' ),
			get_template_directory_uri() . '/assets/images/brand-icon.png',
			6
		);
		add_submenu_page( 
			'igual-welcome', 
			esc_html__( 'Token Verification', 'igual' ),
			esc_html__( 'Token Verification', 'igual' ), 
			'manage_options', 
			'igual-verification', 
			array( 'Igual_Admin_Class', 'igual_verification_admin_page' )
		);
	}
	
	public static function change_admin_menu_name(){
		global $submenu;
		if(isset($submenu['igual-welcome'])){
			$submenu['igual-welcome'][0][0] = esc_html__( 'Welcome', 'igual' );
		}
	}
	
	public static function igual_admin_page(){
	
		$igual_theme = wp_get_theme();
		
		?>
		<div class="igual-settings-wrap">
			<div class="igual-header-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Igual', 'igual' ); ?><span class="igual-version"><?php echo esc_attr( $igual_theme->get( 'Version' ) ); ?></span></h2>
				</div><!-- .igual-header-left -->
				<div class="igual-header-right">
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=igual-verification' ) ) ?>" class="button igual-btn"><?php esc_html_e( 'Verify Token', 'igual' ); ?></a>
				</div><!-- .igual-header-right -->
			</div><!-- .igual-header-bar -->
			
			<div class="igual-settings-tabs">
				<div id="igual-general" class="igual-settings-tab igual-elements-list active">
					<div class="container">
						<div class="row">
							<div class="col-8">
								<div class="row">
									<div class="col-6 mb-4">
										<div class="banner-img-wrap">
											<img class="igual-preview-img img-fluid" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/banner.png' ); ?>" alt="essential-addons-for-elementor-featured">
										</div>
									</div><!-- .col -->
									<div class="col-6 mb-4">
										<div class="media admin-box">
											<div class="admin-box-icon mr-3">
												<span class="dashicons dashicons-admin-generic"></span>								
											</div>
											<div class="media-body admin-box-info">
												<h3 class="admin-box-title"><?php esc_html_e( 'Requirements', 'igual' ); ?></h3>
												<div class="admin-box-content">
												<?php
													$php_version = phpversion();
													$php_version_class = version_compare( $php_version, '5.4.7', '>=') ? ' success' : ' warning';
													$wp_version = get_bloginfo('version');
													$wp_version_class = version_compare( $wp_version, '4.5', '>=') ? ' success' : ' warning';
													
													ob_start();
													phpinfo(INFO_MODULES);
													$info = ob_get_contents();
													ob_end_clean();
													$info = stristr($info, 'Client API version');
													preg_match('/[1-9].[0-9].[1-9][0-9]/', $info, $match);
													$mysql_version = $match[0]; 
													$mysql_version_class = version_compare( $mysql_version, '5', '>=') ? ' success' : ' warning';
													
													$post_max_size = ini_get('post_max_size');
													$post_max = str_replace("M","",$post_max_size);
													$post_max_class = $post_max >= 10 ? ' success' : ' warning';
													
													$max_execution_time = ini_get('max_execution_time');
													$max_exe_class = $max_execution_time >= 300 ? ' success' : ' warning';
													
													$max_input_vars = ini_get('max_input_vars');
													$max_input_class = $max_input_vars >= 2000 ? ' success' : ' warning';
													
												?>
													<table class="igual-admin-table no-spacing-table">
														<thead>
															<tr>
																<td><?php esc_html_e( 'Core', 'igual' ); ?></td>
																<td><?php esc_html_e( 'Required', 'igual' ); ?></td>
																<td><?php esc_html_e( 'Current', 'igual' ); ?></td>
																<td><?php esc_html_e( 'Status', 'igual' ); ?></td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td><?php esc_html_e( 'PHP', 'igual' ); ?></td>
																<td>5.4.7</td>
																<td><?php echo esc_attr( $php_version ); ?></td>
																<td class="text-center"><span class="requirement-icon <?php echo esc_attr( $php_version_class ); ?>"></span></td>
															</tr>
															<tr>
																<td><?php esc_html_e( 'MySQL', 'igual' ); ?></td>
																<td>5</td>
																<td><?php echo esc_attr( $mysql_version ); ?></td>
																<td class="text-center"><span class="requirement-icon <?php echo esc_attr( $mysql_version_class ); ?>"></span></td>
															</tr>
															<tr>
																<td><?php esc_html_e( 'WordPress', 'igual' ); ?></td>
																<td>4.5</td>
																<td><?php echo esc_attr( $wp_version ); ?></td>
																<td class="text-center"><span class="requirement-icon <?php echo esc_attr( $wp_version_class ); ?>"></span></td>
															</tr>															
															<tr>
																<td><?php esc_html_e( 'post_max_size', 'igual' ); ?></td>
																<td>10M</td>
																<td><?php echo esc_attr( $post_max_size ); ?></td>
																<td class="text-center"><span class="requirement-icon <?php echo esc_attr( $post_max_class ); ?>"></span></td>
															</tr>
															<tr>
																<td><?php esc_html_e( 'max_input_vars', 'igual' ); ?></td>
																<td>2000</td>
																<td><?php echo esc_attr( $max_input_vars ); ?></td>
																<td class="text-center"><span class="requirement-icon <?php echo esc_attr( $max_input_class ); ?>"></span></td>
															</tr>
															<tr>
																<td><?php esc_html_e( 'max_execution_time', 'igual' ); ?></td>
																<td>300</td>
																<td><?php echo esc_attr( $max_execution_time ); ?></td>
																<td class="text-center"><span class="requirement-icon <?php echo esc_attr( $max_exe_class ); ?>"></span></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div><!-- .col -->
									<div class="col-6 mb-4">
										<div class="media admin-box">
											<div class="admin-box-icon mr-3">
												<span class="dashicons dashicons-media-document"></span>								
											</div>
											<div class="media-body admin-box-info">
												<h3 class="admin-box-title"><?php esc_html_e( 'Documention', 'igual' ); ?></h3>
												<div class="admin-box-content">
													<?php esc_html_e( 'Get started by spending some time with the documentation to get familiar with Iguals. Build awesome websites for you or your clients with ease.', 'igual' ); ?>
												</div>
												<a href="https://docs.zozothemes.com/igual/" class="igual-btn btn-default"><?php esc_html_e( 'Go Here', 'igual' ); ?></a>
											</div>
										</div>
									</div><!-- .col -->
									<div class="col-6">
										<div class="media admin-box">
											<div class="admin-box-icon mr-3">
												<span class="dashicons dashicons-admin-users"></span>								
											</div>
											<div class="media-body admin-box-info">
												<h3 class="admin-box-title"><?php esc_html_e( 'Need Help?', 'igual' ); ?></h3>
												<div class="admin-box-content">
													<?php esc_html_e( 'Stuck with something? Get help from the community on WordPress.org Forum initiate a live chat at Iguals website and get support.', 'igual' ); ?>
												</div>
												<a href="https://zozothemes.ticksy.com/" class="igual-btn btn-default"><?php esc_html_e( 'Get Support', 'igual' ); ?></a>
											</div>
										</div>
									</div><!-- .col -->
									<div class="col-12">								
										<div class="admin-box-slide-wrap text-center">	
											<?php										
												//Banner
											?>
										</div>
									</div><!-- .col -->
								</div><!-- .row -->
							</div><!-- .col -->
							<div class="col-4">
							<?php
								if( !class_exists( 'Zozothemes_API' ) ){
									require_once ( IGUAL_DIR . '/admin/class.zozo-api.php' );
								}
								$zozo_api = new Zozothemes_API;
								$response = $zozo_api->get_response();
							?>
								<div class="admin-box">
									<div class="admin-box-info">
										<h3 class="admin-box-title"><?php esc_html_e( 'Live Updates', 'igual' ); ?></h3>
										<div class="admin-box-pro text-center">
											
										</div>									
											<div class="full-logo-wrap"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand.png' ); ?>" alt="igual-logo"></div>
										
										<h3 class="admin-box-title my-4"><?php esc_html_e( 'Featured Themes', 'igual' ); ?></h3>
										<div class="admin-box-slide-wrap">
										<?php	
										if( !is_wp_error( $response ) ){										
											if( !empty( $response ) && isset( $response['products'] ) ) {
												echo '<div class="owl-carousel">';
												foreach( $response['products'] as $key => $product ){
													echo '<a href="'. esc_url( $product['link'] ) .'" target="_blank"><img src="'. esc_url( $product['img'] ) .'" alt="'. esc_url( $product['alt'] ) .'"></a>';
												}
												echo '</div>';
											}
										}else{ ?>
											<p><?php esc_html_e( 'Featured products will show here..', 'igual' ); ?></p>
										<?php
										}
										?>
										</div>
									</div>
								</div>
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .igual-settings-tab -->
			</div><!-- .igual-settings-tabs -->
			
		</div><!-- .igual-settings-wrap -->
		<?php
	}

	public static function igual_verification_admin_page(){		
	
		$igual_theme = wp_get_theme();		
	?>
		<div class="igual-settings-wrap">
		
			<div class="igual-header-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Purchase Code Verification', 'igual' ); ?><span class="igual-version"><?php echo esc_attr( $igual_theme->get( 'Version' ) ); ?></span></h2>
				</div><!-- .igual-header-left -->
				<div class="igual-header-right">
					<a href="<?php echo esc_url( 'https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-' ); ?>" class="button igual-btn"><?php esc_html_e( 'Get Purchase Code', 'igual' ); ?></a>
				</div><!-- .igual-header-right -->
			</div><!-- .igual-header-bar -->
			
			<div class="igual-inner-wrap">
				<div class="igual-settings-tabs">
					<div id="igual-general" class="igual-settings-tab igual-elements-list active">
						<div class="container">
							<?php 
								$verfied_stat = get_option('verified_purchase_status');
							?>
							<div class="zozo-envato-registration-form-wrap">
								<?php if( !$verfied_stat ): ?>
								<h2 class="text-center"><?php esc_html_e( "Activate your Licence", "igual" ); ?></h2>
								<p class="text-center"><?php esc_html_e( "Welcome and thank you for Choosing Igual Theme!
The Igual theme needs to be activated to enable demo import installation and customer support service.", "igual" ); ?></p>	
								<a href="<?php echo esc_url( 'https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-' ); ?>" target="_blank"><?php esc_html_e( "How to find purchase code?", "igual" ); ?></a>
								<form id="zozo-envato-registration-form" class="zozo-envato-registration-form" method="post">
									<?php wp_nonce_field( 'igual_theme_verify^%&^%', 'zozo_verify_nonce' ); ?>
									<div class="form-fields">
										<div class="zozo-input-group">
											<input type="text" name="zozo_registration_email" value="" placeholder="<?php esc_html_e( 'Enter E-mail address', 'igual' ); ?>">
											<input type="text" name="zozo_purchase_code" value="" placeholder="<?php esc_html_e( 'Enter your theme purchase code', 'igual' ); ?>">
										</div>
										<div class="submit-group">
											<input type="submit" name="submit" id="submit" class="button igual-btn" value="<?php esc_html_e( 'Activate', 'igual' ); ?>" />
											<span class="process-loader"><img src="<?php echo esc_url( IGUAL_URI . '/admin/assets/images/loader.gif' ); ?>" alt="<?php esc_html_e( 'Loader', 'igual' ) ?>" /></span>
										</div>
									</div>	

									<div class="verfication-alert text-center"><span class="verfication-txt"></span></div>
									
								</form>
								<?php else: ?>
								<div class="theme-activated-wrap text-center">
									<h2><?php esc_html_e( 'Thank you!', 'igual' ) ?></h2>
									<p><strong><?php esc_html_e( 'Your theme\'s license is activated successfully.', 'igual' ) ?></strong></p>
								</div>
								<form id="zozo-envato-deactivation-form" class="zozo-envato-deactivation-form text-center" method="post">
									<?php wp_nonce_field( 'igual_theme_deactivate^%&^%', 'zozo_deactivate_nonce' ); ?>
									<div class="submit-group">
										<input type="submit" name="submit" class="button igual-btn" value="<?php esc_html_e( 'Deactivate', 'igual' ); ?>" />
										<span class="process-loader"><img src="<?php echo esc_url( IGUAL_URI . '/admin/assets/images/loader.gif' ); ?>" alt="<?php esc_html_e( 'Loader', 'igual' ) ?>" /></span>
									</div>
								</form>
								<?php endif; ?>
								
								<div class="registration-token-instruction">
									<p class="text-center"><strong><?php esc_html_e( '1 license = 1 domain = 1 website', 'igual' ); ?></strong></p>
									<p class="text-center"><?php printf( '%1$s <a href="%2$s" target="_blank">%3$s</a>',
										esc_html__( 'You can always buy more licences for this product:', 'igual' ),
										esc_url( 'https://themeforest.net/user/zozothemes/portfolio' ),
										esc_html__( 'ThemeForest ZOZOTHEMES', 'igual' )
										); ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	
	public static function igual_plugin_menu_connect(){
		require_once IGUAL_DIR . '/admin/class.token-verification.php';
		$verfied_stat = Zozo_Purchase_Code_Verification::check_theme_activated();
		if( !empty( $verfied_stat ) && !is_array( $verfied_stat ) ) {
			require_once IGUAL_DIR . '/admin/class.plugin-settings.php';	
		}
	}
	
	public static function igual_theme_verification(){
		
		$nonce = $_POST['zozo_verify_nonce'];		  
		if ( ! wp_verify_nonce( $nonce, 'igual_theme_verify^%&^%' ) )
			wp_die ( esc_html__( 'Busted', 'igual' ) );
				
		if( isset( $_POST['zozo_registration_email'] ) && isset( $_POST['zozo_purchase_code'] ) ){
			require_once( IGUAL_DIR . '/admin/class.token-verification.php' );
			$verfy_obj = new Zozo_Purchase_Code_Verification;
			$status = $verfy_obj->verify_token();
			wp_send_json($status);
		}
		
		wp_die('finshed');
	}
	
	public static function igual_theme_deactivate(){
		
		$nonce = $_POST['zozo_deactivate_nonce'];		  
		if ( ! wp_verify_nonce( $nonce, 'igual_theme_deactivate^%&^%' ) )
			wp_die ( esc_html__( 'Busted', 'igual' ) );
				
		require_once( IGUAL_DIR . '/admin/class.token-verification.php' );
		$verfy_obj = new Zozo_Purchase_Code_Verification;
		$status = $verfy_obj->deactivate_api_call();
		wp_send_json($status);
		
		wp_die('finshed');
	}
	
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

} Igual_Admin_Class::get_instance();

//Theme verification ajax functions
add_action( 'wp_ajax_igual_theme_verify', array( 'Igual_Admin_Class', 'igual_theme_verification' ) );
add_action( 'wp_ajax_nopriv_igual_theme_verify', array( 'Igual_Admin_Class', 'igual_theme_verification' )  );

//Theme deactivate
add_action( 'wp_ajax_igual_theme_deactivate', array( 'Igual_Admin_Class', 'igual_theme_deactivate' ) );
add_action( 'wp_ajax_nopriv_igual_theme_deactivate', array( 'Igual_Admin_Class', 'igual_theme_deactivate' )  );