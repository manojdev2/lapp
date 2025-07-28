<?php 

class Igual_Custom_Sidebars {
	
	private static $_instance = null;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'igual_addon_admin_menu' ) );	
		add_action( 'wp_ajax_igual-custom-sidebar-export', array( $this, 'igual_custom_sidebar_export' ) );
	}
	
	public static function igual_addon_admin_menu(){
		add_submenu_page( 
			'igual-welcome', 
			esc_html__( 'Custom Sidebars', 'igual-addon' ),
			esc_html__( 'Custom Sidebars', 'igual-addon' ), 
			'manage_options', 
			'igual-sidebars', 
			array( 'Igual_Custom_Sidebars', 'igual_sidebar_admin_page' )
		);
	}
	
	public static function igual_sidebar_admin_page(){
		$igual_theme = wp_get_theme();
	?>
		<div class="igual-settings-wrap">
			<div class="igual-header-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Igual Custom Sidebars', 'igual-addon' ); ?><span class="igual-version"><?php echo esc_attr( $igual_theme->get( 'Version' ) ); ?></span></h2>
				</div><!-- .igual-header-left -->
				<div class="igual-header-right">
					<a href="<?php echo esc_url( 'https://wordpress.zozothemes.com/igual/' ); ?>" class="button igual-btn"><?php esc_html_e( 'Live Demo', 'igual-addon' ); ?></a>
				</div><!-- .igual-header-right -->
			</div><!-- .igual-header-bar -->
			
			<div class="igual-settings-tabs igual-custom-sidebar-wrap">
				<div id="igual-general" class="igual-settings-tab active">
					<div class="container">
						<div class="row">
							<div class="col-4">
								<div class="media admin-box">
									<div class="admin-box-icon mr-3">
										<span class="dashicons dashicons-welcome-widgets-menus"></span>								
									</div>
									<div class="media-body admin-box-info">
										<h3 class="admin-box-title"><?php esc_html_e( 'Add New Sidebar', 'igual-addon' ); ?></h3>
										<div class="admin-box-content">
											<?php esc_html_e( 'You can add new custom sidebar here. Also we give you option to remove or delete custom sidebars.', 'igual-addon' ); ?>
										</div>
										<?php
											$sidebars = '';
											$sidebar_opt_name = 'igual_custom_sidebars';
											$sidebars = get_option( $sidebar_opt_name );
											
											if ( isset( $_POST['igual_custom_sidebar_nonce'] ) && wp_verify_nonce( $_POST['igual_custom_sidebar_nonce'], 'igual-()@)(*^#@!' ) 
											) {
												if( isset( $_POST['igual_sidebar_name'] ) && !empty( $_POST['igual_sidebar_name'] ) ){
													
													$sidebar_name = $_POST['igual_sidebar_name'];
													$sidebar_slug = sanitize_title( $sidebar_name );
													
													if( !empty( $sidebars ) ){
														$sidebars[$sidebar_slug] = $sidebar_name;
													}else{
														$sidebars = array( $sidebar_slug => $sidebar_name );
													}	
													update_option( 'igual_custom_sidebars', $sidebars );
												}
											}
											
											if ( isset( $_POST['igual_custom_sidebar_remove_nonce'] ) && wp_verify_nonce( $_POST['igual_custom_sidebar_remove_nonce'], 'igual-()I*^*^%@!' ) 
											) {
												$remove_sidebar = isset( $_POST['igual_sidebar_remove_name'] ) && !empty( $_POST['igual_sidebar_remove_name'] ) ? $_POST['igual_sidebar_remove_name'] : '';
												unset( $sidebars[$remove_sidebar] );
												update_option( 'igual_custom_sidebars', $sidebars );
												$sidebars = get_option( $sidebar_opt_name );
											}
											
										?>
										<form action="" method="post" enctype="multipart/form-data">
											<?php wp_nonce_field( 'igual-()@)(*^#@!', 'igual_custom_sidebar_nonce' ); ?>
											<input type="input" name="igual_sidebar_name" class="custom-sidebar-name" value="" />
										</form>
										<a href="#" class="igual-btn btn-default custom-sidebar-create"><?php esc_html_e( 'Add', 'igual-addon' ); ?></a>
									</div>
								</div>
							</div>
							<div class="col-8">
								<div class="admin-box">
									<h3 class="admin-box-title sidebar-title"><?php esc_html_e( 'Custom Sidebars', 'igual-addon' ); ?></h3>
									<?php if( !empty( $sidebars ) ): ?>
									<form action="" method="post" enctype="multipart/form-data">
									<?php wp_nonce_field( 'igual-()I*^*^%@!', 'igual_custom_sidebar_remove_nonce' ); ?>
									<input type="hidden" name="igual_sidebar_remove_name" id="igual-sidebar-remove-name" value="" />									
									<table class="igual-admin-table igual-custom-sidebar-table">
										<thead>
											<tr>
												<td><?php esc_html_e( 'Name', 'igual-addon' ); ?></td>
												<td><?php esc_html_e( 'Slug', 'igual-addon' ); ?></td>
												<td><?php esc_html_e( 'Delete', 'igual-addon' ); ?></td>
											</tr>
										</thead>
										<tbody>
										<?php
											foreach( $sidebars as $sidebar_slug => $sidebar_name ){
											?>
												<tr>
													<td><?php echo esc_html( $sidebar_name ); ?></td>
													<td><?php echo esc_html( $sidebar_slug ); ?></td>
													<td class="text-center"><a href="#" data-sidebar="<?php echo esc_attr( $sidebar_slug ); ?>" class="igual-sidebar-remove"><span class="dashicons dashicons-trash"></span></a></td>
												</tr>
											<?php
											}
										?>
										</tbody>
									</table>
									</form>
									<a href="#" class="igual-btn btn-default custom-sidebar-export"><?php esc_html_e( 'Export as JSON', 'igual-addon' ); ?></a>
									<?php else: ?>
										<p><?php esc_html_e( 'Sorry! No custom sidebars available.', 'igual-addon' ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	<?php
	}
		
	public static function rmdir_recurse($path) {
		$path = rtrim($path, '/').'/';
		$handle = opendir($path);
		while(false !== ($file = readdir($handle))) {
			if($file != '.' and $file != '..' ) {
				$fullpath = $path.$file;
				if(is_dir($fullpath)) self::rmdir_recurse($fullpath); else unlink($fullpath);
			}
		}
		closedir($handle);
		rmdir($path);
	}	
	
	public static function igual_custom_sidebar_export(){
		$nonce = $_POST['nonce'];  
		if ( ! wp_verify_nonce( $nonce, 'igual-()@)(*^#@!' ) )
			wp_die ( esc_html__( 'F***', 'igual-addon' ) );
		
		$sidebars = get_option( 'igual_custom_sidebars' );
		if( !empty( $sidebars ) ){
			//wp_send_json( $sidebars );
			echo json_encode( $sidebars );
		}else{
			echo '';
		}	
		wp_die();
	}
	
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

} Igual_Custom_Sidebars::get_instance();