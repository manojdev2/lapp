<?php 

class Igual_Plugin_Info {
	
	private static $_parent_instance = null;
	
	public function __construct() {
		require_once IGUAL_DIR . '/admin/theme-plugins/tgm-init.php';
	}
		
	public static function igual_get_plugins(){
		return get_plugins();
	}
		
	public static function igual_does_plugin_require_update( $file_path ) {
		$repo_updates = get_site_transient( 'update_plugins' );
		$available_version = '';
		if ( isset( $repo_updates->response[ $file_path ]->new_version ) ) {
			$available_version = $repo_updates->response[ $file_path ]->new_version;			
		}
		return $available_version;
	}
		
	public static function igual_tgm_install(){
		
		if ( ! isset( $_POST['igual_bulk_nonce'] ) || ! wp_verify_nonce( $_POST['igual_bulk_nonce'], 'igual-bulk-plugin-install' ) ) wp_die("failed");
				
		require_once IGUAL_DIR . '/admin/theme-plugins/tgm-init.php';			
		$plugins = isset( $_POST['plugins'] ) ? $_POST['plugins'] : TGM_Plugin_Activation::$instance->plugins;
		if( isset( $_POST['igual_bulk_plugins'] ) ) {
			$bulk_plugins = $_POST['igual_bulk_plugins'];
			$bulk_action = isset( $_POST['igual_bulk_action'] ) && !empty( $_POST['igual_bulk_action'] ) ? $_POST['igual_bulk_action'] : 'install';
			$tgm = new TGM_Plugin_Activation;			
			$tgm->plugins = $plugins;
			if( $bulk_action == 'install' ){
				foreach( $bulk_plugins as $plugin_name ){
					$tgm->igual_do_plugin_install( $plugin_name );
				}
			}elseif( $bulk_action == 'active' ){
				foreach( $bulk_plugins as $plugin_name ){
					$tgm->igual_do_plugin_activate( $plugin_name );
				}
			}elseif( $bulk_action == 'install-active' ){
				foreach( $bulk_plugins as $plugin_name ){
					$tgm->igual_do_plugin_install( $plugin_name, true );
				}
			}elseif( $bulk_action == 'deactive' ){
				foreach( $bulk_plugins as $plugin_name ){
					$tgm->igual_force_deactivation( $plugin_name );
				}
			}
		}
		wp_die("success");
	}
	
	public static function igual_plugin_link( $item ) {
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		$installed_plugins = Igual_Plugin_Info::igual_get_plugins();
		$item['sanitized_plugin'] = $item['name'];
		 $is_plug_act = 'is_plugin_active';
		 
		if ( $is_plug_act( $item['file_path'] ) ) {
			
			$available_version = $item['source'] == 'repo' ? Igual_Plugin_Info::igual_does_plugin_require_update( $item['file_path'] ) : $item['version'];
			
			if ( version_compare( $available_version, $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
				$actions = array(
					'update' => sprintf(
						'<a href="%1$s" class="igual-btn btn-default" title="%3$s %2$s">%3$s</a>',
						wp_nonce_url(
							add_query_arg(
								array(
									'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'		=> urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'plugin_source' => urlencode( $item['source'] ),
									'tgmpa-update' 	=> 'update-plugin',
									'version' 		=> urlencode( $item['version'] ),
									'return_url' 	=> 'igual-plugins'
								),
								admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-update',
							'tgmpa-nonce'
						),
						$item['sanitized_plugin'],
						esc_html__( 'Update', 'igual' )
					),
				);
			}else{
				$actions = array(
					'deactivate' => sprintf(
						'<a href="%1$s" class="igual-btn btn-default" title="%3$s %2$s">%3$s</a>',
						esc_url( add_query_arg(
							array(
								'plugin'					=> urlencode( $item['slug'] ),
								'plugin_name'		  		=> urlencode( $item['sanitized_plugin'] ),
								'plugin_source'				=> urlencode( $item['source'] ),
								'igual-deactivate'	   		=> 'deactivate-plugin',
								'igual-deactivate-nonce' 	=> wp_create_nonce( 'igual-deactivate' ),
							),
							admin_url( 'admin.php?page=igual-plugins' )
						) ),
						$item['sanitized_plugin'],
						esc_html__( 'Deactivate', 'igual' )
					),
				);
			}
		}elseif ( ! isset( $installed_plugins[$item['file_path']] ) ) {
			$actions = array(
				'install' => sprintf(
					'<a href="%1$s" class="igual-btn btn-default" title="%3$s %2$s">%3$s</a>',
					esc_url( wp_nonce_url(
						add_query_arg(
							array(
								'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'		=> urlencode( $item['slug'] ),
								'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
								'plugin_source' => urlencode( $item['source'] ),
								'tgmpa-install' => 'install-plugin',
								'return_url' 	=> 'igual-plugins'
							),
							admin_url( TGM_Plugin_Activation::$instance->parent_slug )
						),
						'tgmpa-install',
						'tgmpa-nonce'
					) ),
					$item['sanitized_plugin'],
					esc_html__( 'Install', 'igual' )
				),
			);
		}elseif ( is_plugin_inactive( $item['file_path'] ) ) {

			if ( version_compare( $item['version'], $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
				$actions = array(
					'update' => sprintf(
						'<a href="%1$s" class="igual-btn btn-default" title="%3$s %2$s">%3$s</a>',
						wp_nonce_url(
							add_query_arg(
								array(
									'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'		=> urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'plugin_source' => urlencode( $item['source'] ),
									'tgmpa-update' 	=> 'update-plugin',
									'version' 		=> urlencode( $item['version'] ),
									'return_url' 	=> 'igual-plugins'
								),
								admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-update',
							'tgmpa-nonce'
						),
						$item['sanitized_plugin'],
						esc_html__( 'Update', 'igual' )
					),
				);
			} else {
				$actions = array(
					'activate' => sprintf(
						'<a href="%1$s" class="igual-btn btn-default" title="%3$s %2$s">%3$s</a>',
						esc_url( add_query_arg(
							array(
								'plugin'			   	=> urlencode( $item['slug'] ),
								'plugin_name'		  	=> urlencode( $item['sanitized_plugin'] ),
								'plugin_source'			=> urlencode( $item['source'] ),
								'igual-activate'	   		=> 'activate-plugin',
								'igual-activate-nonce' 	=> wp_create_nonce( 'igual-activate' ),
							),
							admin_url( 'admin.php?page=igual-plugins' )
						) ),
						$item['sanitized_plugin'],
						esc_html__( 'Activate', 'igual' )
					),
				);
			}
		}elseif ( version_compare( $item['version'], $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
			$actions = array(
				'update' => sprintf(
					'<a href="%1$s" class="igual-btn btn-default" title="%3$s %2$s">%3$s</a>',
					wp_nonce_url(
						add_query_arg(
							array(
								'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'		=> urlencode( $item['slug'] ),
								'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
								'plugin_source' => urlencode( $item['source'] ),
								'tgmpa-update' 	=> 'update-plugin',
								'version' 		=> urlencode( $item['version'] ),
								'return_url' 	=> 'igual-plugins'
							),
							admin_url( TGM_Plugin_Activation::$instance->parent_slug )
						),
						'tgmpa-update',
						'tgmpa-nonce'
					),
					$item['sanitized_plugin'],
					esc_html__( 'Update', 'igual' )
				),
			);
		}
		
		return $actions;
	}
	
	public static function get_parent_instance() {
		if ( is_null( self::$_parent_instance ) ) {
			self::$_parent_instance = new self();
		}
		return self::$_parent_instance;
	}
	
}

class Igual_Plugins {
	
	private static $_instance = null;

	public function __construct() {
		Igual_Plugin_Info::get_parent_instance();
		add_action( 'admin_menu', array( $this, 'igual_admin_menu' ) );
	}
	
	public static function igual_admin_menu(){
		add_submenu_page( 
			'igual-welcome', 
			esc_html__( 'Theme Plugins', 'igual' ),
			esc_html__( 'Theme Plugins', 'igual' ), 
			'manage_options', 
			'igual-plugins', 
			array( 'Igual_Plugins', 'igual_plugins_admin_page' )
		);		
	}
	
	public static function igual_plugins_admin_page(){
		$igual_theme = wp_get_theme(); ?>
		<div class="igual-settings-wrap">	
			<div class="igual-header-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Igual Plugins', 'igual' ); ?><span class="igual-version"><?php echo esc_attr( $igual_theme->get( 'Version' ) ); ?></span></h2>
				</div><!-- .igual-header-left -->
				<div class="igual-header-right">
					<a href="<?php echo class_exists( 'Igual_Addon' ) ? esc_url( admin_url( 'admin.php?page=igual-importer' ) ) : '#'; ?>" class="button igual-btn"><?php esc_html_e( 'Import Demo', 'igual' ); ?></a>
				</div><!-- .igual-header-right -->
			</div><!-- .igual-header-bar -->
			
			<div class="igual-inner-wrap">
			<?php 
				require_once IGUAL_DIR . '/admin/theme-plugins/tgm-init.php';			
				$plugins = TGM_Plugin_Activation::$instance->plugins;
				$plugin_custom_order = array(
					'elementor' 		=> $plugins['elementor'],
					'igual-addon' 	=> $plugins['igual-addon'],
					'classic-elementor-addons-pro' => $plugins['classic-elementor-addons-pro'],
					'cea-post-types' => $plugins['cea-post-types'],
					'zozo-header-footer' => $plugins['zozo-header-footer'],
					'revslider'			=> $plugins['revslider'],
					'contact-form-7' 	=> $plugins['contact-form-7'],
					'envato-market' 	=> $plugins['envato-market']
				);
			
				$installed_plugins = Igual_Plugin_Info::igual_get_plugins();
				
				if( isset( $_GET['igual-deactivate'] ) && $_GET['igual-deactivate'] == 'deactivate-plugin' ) {
					check_admin_referer( 'igual-deactivate', 'igual-deactivate-nonce' );
					$plugins = TGM_Plugin_Activation::$instance->plugins;
					foreach( $plugins as $plugin ) {
						if( $plugin['slug'] == $_GET['plugin'] ) {
							deactivate_plugins( $plugin['file_path'] );
						}
					}
				}
				if( isset( $_GET['igual-activate'] ) && $_GET['igual-activate'] == 'activate-plugin' ) {
					check_admin_referer( 'igual-activate', 'igual-activate-nonce' );
					$plugins = TGM_Plugin_Activation::$instance->plugins;
					foreach( $plugins as $plugin ) {
						if( $plugin['slug'] == $_GET['plugin'] ) {
							activate_plugin( $plugin['file_path'] );
						}
					}
				}
				$plugins = $plugin_custom_order;
				
			?>
			
				<div class="igual-settings-tabs">
					<div id="igual-general" class="igual-settings-tab igual-elements-list active">
						<div class="container">
							<form id="multi-plugins-active-form" method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=igual-plugins' ) ); ?>" enctype="multipart/form-data">
								<input type="hidden" name="action" value="igual_tgm_install" />
								<?php wp_nonce_field( 'igual-bulk-plugin-install', 'igual_bulk_nonce' ); ?>
								<p class="igual-settings-msg"><?php echo esc_html__('Bulk Action', 'igual'); ?>
									<select class="bulk-plugins-action-trigger btn btn-default" name="igual_bulk_action">
										<option value="install"><?php echo esc_html__('Install', 'igual'); ?></option>
										<option value="active"><?php echo esc_html__('Activate', 'igual'); ?></option>
										<option value="install-active"><?php echo esc_html__('Install & Activate', 'igual'); ?></option>
										<option value="deactive"><?php echo esc_html__('Deactivate', 'igual'); ?></option>
									</select>
									<a href="#" class="button igual-bulk-action"><?php echo esc_html__('Apply', 'igual'); ?></a>
									<img src="<?php echo esc_url( IGUAL_URI . '/admin/assets/images/loader.gif' ); ?>" alt="<?php echo esc_html__('Loader', 'igual'); ?>" class="bulk-process-loader" />
								</p>
								<?php echo wp_nonce_field( 'igual_activate_nonce', 'igual-multi-plugin*^*' ); ?>
							</form>
							<div class="row multi-cols">
							<?php
								$active_action = '';
								if( isset( $_GET['plugin_status'] ) ) {
									$active_action = $_GET['plugin_status'];
								}
								$req_plugs = array();						
					
								foreach( $plugins as $plugin ):
									$class = '';
									$plugin_status = '';
									$active_action_class = '';
									$file_path = $plugin['file_path'];
									$plugin_action = Igual_Plugin_Info::igual_plugin_link( $plugin );
									foreach( $plugin_action as $action => $value ) {
										if( $active_action == $action ) {
											$active_action_class = ' plugin-' .$active_action. '';
										}
									}
									
									$is_plug_act = 'is_plugin_active';
									if( $is_plug_act( $file_path ) ) {
										$plugin_status = 'active';
										$class = ' active';
										$req_plugs[] = esc_html( $plugin['slug'] );
									}
									
									$class .= $active_action_class;
							?>
								<div class="col-4<?php echo esc_attr( $class ); ?>">
									<div class="media admin-box igual-plugins-box">
										<div class="admin-box-icon p-0 mr-3">
											<span class="plugin-image-wrap"><img src="<?php echo esc_url( $plugin['image_url'] ); ?>" alt="<?php echo esc_attr( $plugin['name'] ); ?>" /></span>								
										</div>
										<div class="media-body admin-box-info">
											<h3 class="admin-box-title"><?php echo esc_html( $plugin['name'] ); ?></h3>
											<div class="admin-box-content">
												<?php if( $plugin['required'] ): ?>
												<div class="plugin-required"><span class="dashicons dashicons-star-filled" title="<?php echo esc_attr__('Required', 'igual'); ?>"></span></div>
												<?php endif; ?>
												<?php if( isset( $installed_plugins[$plugin['file_path']] ) ): ?> 
												<div class="plugin-info"><?php 
													$current_version = $installed_plugins[$plugin['file_path']]['Version'];
													$available_version = $current_version;
													if( $plugin['source'] == 'repo' ){
														$available_version = Igual_Plugin_Info::igual_does_plugin_require_update( $plugin['file_path'] );
													}
												?>
													<?php echo sprintf( 'v%s | %s', $installed_plugins[$plugin['file_path']]['Version'], $installed_plugins[$plugin['file_path']]['Author'] ); ?>
												</div>
												<?php endif; ?>
												<div class="theme-actions--">
													<?php foreach( $plugin_action as $action ) { echo ( ''. $action ); } ?>
												</div>
												<?php if( $plugin['source'] == 'repo' && version_compare( $available_version, $current_version, '>' ) ): ?>
													<div class="theme-update"><?php echo esc_html__('Update Available: Version', 'igual'); ?> <?php echo esc_attr( $available_version ); ?></div>
												<?php
												elseif( isset( $plugin_action['update'] ) && $plugin_action['update'] ): ?>
													<div class="theme-update"><?php echo esc_html__('Update Available: Version', 'igual'); ?> <?php echo esc_attr( $plugin['version'] ); ?></div>
												<?php endif; ?>
												
												<span class="multi-active-wrap"><input type="checkbox" class="bulk-activator" value="<?php echo esc_attr( $plugin['slug'] ); ?>" /></span>
												
											</div>
										</div>
									</div>
								</div><!-- .col -->
							<?php endforeach; ?>
							</div><!-- .row -->
						</div><!-- .container -->
					</div><!-- .igual-settings-tab -->
				</div><!-- .igual-settings-tabs -->
			
			</div><!-- .igual-inner-wrap -->
		</div><!-- .igual-settings-wrap -->
	<?php
	}
	
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

} Igual_Plugins::get_instance();

//Plugin ajax functions
add_action( 'wp_ajax_igual_tgm_install', array( 'Igual_Plugin_Info', 'igual_tgm_install' ) );
add_action( 'wp_ajax_nopriv_igual_tgm_install', array( 'Igual_Plugin_Info', 'igual_tgm_install' )  );
