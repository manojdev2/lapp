<?php 

class Igual_Custom_Fonts {
	
	private static $_instance = null;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'igual_addon_admin_menu' ) );		
	}
	
	public static function igual_addon_admin_menu(){
		add_submenu_page( 
			'igual-welcome', 
			esc_html__( 'Custom Fonts', 'igual-addon' ),
			esc_html__( 'Custom Fonts', 'igual-addon' ), 
			'manage_options', 
			'igual-fonts', 
			array( 'Igual_Custom_Fonts', 'igual_fonts_admin_page' )
		);
	}
	
	public static function igual_fonts_admin_page(){
		$igual_theme = wp_get_theme();
	?>
		<div class="igual-settings-wrap">
			<div class="igual-header-bar">
				<div class="igual-header-left">
					<div class="igual-admin-logo-inline">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand-logo.png' ); ?>" alt="igual-logo">
					</div><!-- .igual-admin-logo-inline -->
					<h2 class="title"><?php esc_html_e( 'Igual Custom Fonts', 'igual-addon' ); ?><span class="igual-version"><?php echo esc_attr( $igual_theme->get( 'Version' ) ); ?></span></h2>
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
										<h3 class="admin-box-title"><?php esc_html_e( 'Add Custom Fonts', 'igual-addon' ); ?></h3>
										<div class="admin-box-content">
											<?php esc_html_e( 'You can add custom fonts here. Also we give you option to remove or delete custom fonts.', 'igual-addon' ); ?>
										</div>	
										<form action="" method="post" enctype="multipart/form-data">
											<?php wp_nonce_field( 'igual-)(&(*@#*%@*', 'igual_custom_font_nonce' ); ?>
											<input type="file" name="igual_custom_fonts" id="igual-custom-fonts" class="igual-custom-fonts" />
										</form>
										<a href="#" class="igual-btn btn-default igual-custom-fonts-upload"><?php esc_html_e( 'Upload Font', 'igual-addon' ); ?></a>
										<ol class="admin-instruction-list">
											<li><?php esc_html_e( 'Notes: Custom fonts should be in this following format. .eot, .otf, .svg, .ttf, .wof', 'igual-addon' ) ?></li>
											<li><?php esc_html_e( 'Font folder name only show as font name in theme option. So make folder name and font name are should be the same but font name like slug type.', 'igual-addon' ) ?></li>
											<li><?php printf( '%1$s <strong>%2$s</strong> %3$s <strong>%4$s</strong>', esc_html__( 'Eg: Font folder name is -', 'igual-addon' ), esc_html__( 'Wonder Land', 'igual-addon' ), esc_html__( ' font name like', 'igual-addon' ), esc_html__( ' wonder-land.eot, wonder-land.otf ...', 'igual-addon' ) ); ?></li>
										</ol>
									</div>
								</div>
							</div>
							<div class="col-8">
								<div class="admin-box">
									<h3 class="admin-box-title font-title"><?php esc_html_e( 'Custom Fonts', 'igual-addon' ); ?></h3>
									<?php
										//delete_option( 'igual_custom_fonts' );
										if ( isset( $_POST['igual_custom_font_nonce'] ) && wp_verify_nonce( $_POST['igual_custom_font_nonce'], 'igual-)(&(*@#*%@*' ) ) {
											Igual_Custom_Fonts::igual_upload_font();
										}
										
										if ( isset( $_POST['igual_custom_font_remove_nonce'] ) && wp_verify_nonce( $_POST['igual_custom_font_remove_nonce'], 'igual-(*&^&%^%@!' ) 
										) {
											Igual_Custom_Fonts::igual_font_delete();
										}
										
										$custom_fonts = get_option( 'igual_custom_fonts' );
									?>
									<?php if( !empty( $custom_fonts ) ): ?>
									<form action="" method="post" enctype="multipart/form-data">
									<?php wp_nonce_field( 'igual-(*&^&%^%@!', 'igual_custom_font_remove_nonce' ); ?>
									<input type="hidden" name="igual_font_remove_name" id="igual-font-remove-name" value="" />									
									<table class="igual-admin-table igual-custom-font-table">
										<thead>
											<tr>
												<td><?php esc_html_e( 'Font Name', 'igual-addon' ); ?></td>
												<td><?php esc_html_e( 'CSS', 'igual-addon' ); ?></td>
												<td><?php esc_html_e( 'Delete', 'igual-addon' ); ?></td>
											</tr>
										</thead>
										<tbody>
										<?php
											foreach( $custom_fonts as $font_slug => $font_name ){
											?>
												<tr>
													<td><?php echo esc_html( $font_name ); ?></td>
													<td>font-family: '<?php echo esc_html( $font_name ); ?>';</td>
													<td class="text-center"><a href="#" data-font="<?php echo esc_attr( $font_slug ); ?>" class="igual-font-remove"><span class="dashicons dashicons-trash"></span></a></td>
												</tr>
											<?php
											}
										?>
										</tbody>
									</table>
									</form>
									<?php else: ?>
									<p><?php esc_html_e( 'Sorry! No custom fonts available.', 'igual-addon' ); ?></p>
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
	
	public static function igual_upload_font(){
		if ( isset( $_FILES['igual_custom_fonts'] ) ) {
			// The nonce was valid and the user has the capabilities, it is safe to continue.
			
			$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/octet-stream', 'application/x-rar-compressed');
			$file_type = $_FILES['igual_custom_fonts']['type'];
			
			if( in_array( $file_type, $accepted_types ) ){
				// These files need to be included as dependencies when on the front end.
				
				require_once( ABSPATH . 'wp-admin/includes/image.php' ); 
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				require_once( ABSPATH . 'wp-admin/includes/media.php' );
				
				// Let WordPress handle the upload.
				//delete_option( 'igual_custom_fonts' );
				// Remember, 'pharmy_image_upload' is the name of our file input in our form above.
				$font_name = pathinfo($_FILES['igual_custom_fonts']['name'], PATHINFO_FILENAME);
				$font_slug = sanitize_title( $font_name );
				if ( get_option( 'igual_custom_fonts' ) ) {
					$custom_fonts_names = get_option( 'igual_custom_fonts' ); 
					$custom_fonts_names = array_merge( $custom_fonts_names, array( $font_slug => $font_name ) );
				}else{
					$custom_fonts_names = array( $font_slug => $font_name );
				}
				WP_Filesystem();
				$destination = wp_upload_dir();
				$destination_path = $destination['basedir'] . '/custom-fonts/';
				$unzipfile = unzip_file( $_FILES['igual_custom_fonts']['tmp_name'], $destination_path);
				
				update_option( 'igual_custom_fonts', $custom_fonts_names );				
			}else{
				echo esc_html__( 'Invalid File Type', 'igual-addon' );
			}
		}
	}
	
	public static function igual_font_delete(){			
		$font_id = esc_attr( $_POST['igual_font_remove_name'] );		
		$destination = wp_upload_dir();
		$custom_fonts = get_option( 'igual_custom_fonts' );		
		if ( array_key_exists( $font_id, $custom_fonts ) ){
			$font_name = $custom_fonts[$font_id];
			$destination_path = $destination['basedir'] . '/custom-fonts/' . $font_name;	
			unset($custom_fonts[$font_id]);
			update_option( 'igual_custom_fonts', $custom_fonts );
			self::rmdir_recurse( $destination_path );
		}
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
	
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

} Igual_Custom_Fonts::get_instance();