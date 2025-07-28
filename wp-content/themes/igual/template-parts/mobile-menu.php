<?php
/*
 * Mobile Menu Template
 */
?>
<div class="mobile-menu-floating">
	<a href="<?php echo esc_url( site_url() ); ?>" class="mobile-menu-toggle"><i class="close-icon"></i></a>

	<?php
	do_action( 'igual_mobile_menu_before' );
	$mobilebar_items = Igual_Wp_Elements::igual_options('mobilebar-menu-items');
	$mobilebar_items = isset( $mobilebar_items['enabled'] ) ? $mobilebar_items['enabled'] : ''; 
	$mkeys = array(
		'chk' => 'mobile-bar-chk',
		'fields' => array(
			'mobilebar-menu-items' => 'mobilebar-menu-items',
			'mobile_menu_custom_text_1' => 'mobile-menu-custom-text-1',
			'mobile_menu_custom_text_2' => 'mobile-menu-custom-text-2'
		)			
	);
	
	$mobile_menu_bar_values = Igual_Wp_Elements::igual_get_meta_and_option_values( $mkeys );
	if( !empty( $mobilebar_items ) && is_array( $mobilebar_items ) ):	
		foreach( $mobilebar_items as $element => $value ){
			switch($element){ 

				case "logo": ?>
				<div class="header-titles">
					<?php
						// Site title or logo.
						Igual_Wp_Framework::igual_mobile_logo( array(), 'div' );
					?>
				</div><!-- .header-titles --> <?php
				break;

				case "menu":
					$menu_name = '';
					$page_option = get_post_meta( get_the_ID(), 'igual_post_meta', true );
					if( isset( $page_option['header-one-page-menu'] ) && $page_option['header-one-page-menu'] != 'none' ) {
						$menu_name = $page_option['header-one-page-menu'];
					}
					if ( has_nav_menu( 'mobile' ) || !empty( $menu_name ) ) { ?>						
						<nav class="mobile-menu-wrapper">
							<ul class="wp-menu mobile-menu">
								<?php
									$menu_args = array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'mobile'
									);
									if( $menu_name ) {
										$menu_args['theme_location'] = '';
										$menu_args['menu'] = $menu_name;
									}	
									wp_nav_menu( $menu_args );
								?>
							</ul>
						</nav><!-- .mobile-menu-wrapper --> <?php
					}
				break;

				case "search": ?>
					<form role="search" class="form-inline search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="<?php esc_attr_e( 'Search', 'igual' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
							<span class="input-group-btn">
								<button class="btn btn-outline-success" type="submit"><span class="bi bi-search"></span></button>
							</span>
						</div>
					</form>
				<?php
				break;

				case "social": 
					if( class_exists( 'Igual_Custom_Functions' ) ):
				?>
					<div class="mobile-menu-social-wrap">
						<?php
							// Mobile menu social links.
							Igual_Custom_Functions::igual_social_links();
						?>
					</div>
				<?php
					endif;
				break;
				case "mobile-menu-custom-text-1":					
					if( $mobile_menu_bar_values['mobile_menu_custom_text_1'] )
					echo '<div class="custom-text-1">'. do_shortcode( stripslashes( force_balance_tags( wp_kses_post( get_option( 'igual_options' )['mobile-menu-custom-text-1'] ) ) ) ) .'</div>';
				break;
				case "mobile-menu-custom-text-2":
					if( $mobile_menu_bar_values['mobile_menu_custom_text_2'] )
					echo '<div class="custom-text-2">'. do_shortcode( stripslashes( force_balance_tags( wp_kses_post( get_option( 'igual_options' )['mobile-menu-custom-text-2'] ) ) ) ) .'</div>';
				break;

			} //switch	
		} //foreach
	endif; 	
	do_action( 'igual_mobile_menu_after' ); 
	?>

</div><!-- .mobile-menu-floating -->