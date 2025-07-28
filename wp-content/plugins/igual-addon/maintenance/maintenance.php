<?php
/**
 * Template maintenance
 */
 
 // Activate Maintenance or Coming Soon Mode
 add_action( 'template_redirect', 'igual_activate_maintenance_mode' );
 
 function igual_activate_maintenance_mode(){

	 $maintenance_mode = Igual_Theme_Option::igual_options('maintenance-opt');
	 $maintenance_mode = $maintenance_mode ? true : false;
	 
	 if(  $maintenance_mode && ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) ):
	 
	 	$maintenance_type = Igual_Theme_Option::igual_options('maintenance-type');
		$maintenance_type = $maintenance_type ? $maintenance_type : "cs";
		
		if( $maintenance_type == 'cs' ){
			require_once( IGUAL_ADDON_DIR . 'maintenance/templates/coming-soon.php' );
			die;
		}elseif( $maintenance_type == 'mn' ){
			require_once( IGUAL_ADDON_DIR . 'maintenance/templates/maintenance-mode.php' );
			die;
		}elseif( $maintenance_type == 'cus' ){

			$current_page_id = get_the_ID();
			$maintenance_custom = Igual_Theme_Option::igual_options('maintenance-custom');
			$maintenance_page_url = $maintenance_custom ? get_permalink( $maintenance_custom ) : '';
			
			if( $current_page_id != $maintenance_custom ){
				wp_redirect( $maintenance_page_url );
			}
			
		}else{
			die;
		}
		
		
	 endif; // Maintenance Mode Check
 }
