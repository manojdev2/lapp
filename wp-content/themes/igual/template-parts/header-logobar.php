<?php 
	$class_array = array(
		'left'		=> ' element-left',
		'center'	=> ' pull-center justify-content-center',
		'right'		=> ' pull-right justify-content-end'
	);
	$header_keys = array(
		'chk' => 'header-chk',
		'fields' => array(
			'header_layout' => 'header-layout'
		)			
	);
	$header_values = Igual_Wp_Elements::igual_get_meta_and_option_values( $header_keys );
	$keys = array(
		'chk' => 'header-logobar-chk',
		'fields' => array(
			'header_logobar_items' => 'logobar-items',
			'header_logobar_text_1' => 'logobar-custom-text-1',
			'header_logobar_text_2' => 'logobar-custom-text-2'
		)			
	);
	$logobar_values = Igual_Wp_Elements::igual_get_meta_and_option_values( $keys );
	$logobar_items = $logobar_values['header_logobar_items'];
	if( !empty( $logobar_items ) ):	
		if( isset( $logobar_items['disabled'] ) ) unset( $logobar_items['disabled'] );
		
		$layout = $header_values['header_layout'];
		$container_class = $layout == 'wider' ? 'container-fluid' : 'container';
?>
		<div class="header-logobar navbar elements-<?php echo esc_attr( count( $logobar_items ) ); ?>">
			<div class="<?php echo esc_attr( $container_class ); ?>">
				<?php
				foreach( $logobar_items as $key => $value ){
					$logobar_class = $class_array[$key];
					$logobar_class .= isset( $logobar_items['right'] ) && !empty( $logobar_items['right'] ) ? ' right-element-exist' : '';
					echo '<ul class="nav logobar-ul'. esc_attr( $logobar_class ) .'">';
						foreach( $value as $element => $label ){
							switch( $element ){
								case "custom-text-1":
									if( $logobar_values['header_logobar_text_1'] )
									echo '<li>'. do_shortcode( stripslashes( force_balance_tags( wp_kses_post( get_option( 'igual_options' )['logobar-custom-text-1'] ) ) ) ) .'</li>';
								break;
								case "custom-text-2":
									if( $logobar_values['header_logobar_text_2'] )
									echo '<li>'. do_shortcode( stripslashes( force_balance_tags( wp_kses_post( get_option( 'igual_options' )['logobar-custom-text-2'] ) ) ) ) .'</li>';
								break;
								case "social":
									if( class_exists( 'Igual_Custom_Functions' ) ):
										echo '<li>';
										Igual_Custom_Functions::igual_social_links();
										echo '</li>';
									endif;
								break;
								case "email":
									echo '<li>';
									Igual_Wp_Framework::igual_email_link( Igual_Wp_Elements::igual_options('header-email') );
									echo '</li>';
								break;
								case "address":
									echo '<li>';
									Igual_Wp_Framework::igual_address( Igual_Wp_Elements::igual_options('header-address') );
									echo '</li>';
								break;
								case "search":
									$keys = array(
										'chk' => 'header-chk',
										'fields' => array(
											'search_type' => 'search-type'
										)			
									);
									$search_values = Igual_Wp_Elements::igual_get_meta_and_option_values( $keys );
									$search_type = $search_values['search_type'];
									echo '<li>';
									Igual_Wp_Framework::igual_search_modal( $search_type, 'logobar' );
									echo '</li>';
								break;
									case "logo": ?>
									<li class="header-titles-wrapper">
										<div class="header-titles">
											<?php
												// Site title or logo.
												Igual_Wp_Framework::igual_site_logo();
												// Sticky logo
												Igual_Wp_Framework::igual_sticky_logo();
												// Site description.
												Igual_Wp_Framework::igual_site_description();
											?>
										</div><!-- .header-titles -->
									</li><!-- .header-titles-wrapper -->
								<?php
								break;
								case "primary-menu": ?>
									<li class="header-navigation-wrapper">
										<?php
											$menu_name = '';
											$page_option = get_post_meta( get_the_ID(), 'igual_post_meta', true );
											if( isset( $page_option['header-one-page-menu'] ) && $page_option['header-one-page-menu'] != 'none' ) {
												$menu_name = $page_option['header-one-page-menu'];
											}
										?>
										<?php if ( has_nav_menu( 'primary' ) || !empty( $menu_name ) ) { ?>
											<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'igual' ); ?>">
												<ul class="nav wp-menu primary-menu">
													<?php
														$menu_args = array(
															'container'  => '',
															'items_wrap' => '%3$s',
															'theme_location' => 'primary'
														);
														if( $menu_name ) {
															$menu_args['theme_location'] = '';
															$menu_args['menu'] = $menu_name;
														}
														wp_nav_menu( $menu_args );
													?>
												</ul>
											</nav><!-- .primary-menu-wrapper -->
										<?php }  else { 
											echo sprintf( 
												'<a href="%1$s">%2$s</a>',
												admin_url( 'nav-menus.php' ),
												esc_html__( 'Add a menu', 'igual' )					
											); } 
										?>
									</li><!-- .header-navigation-wrapper -->
								<?php
								break;
								case "secondary-bar": ?>
									<li class="secondary-toggle-wrapper">
										<a href="<?php echo esc_url( site_url() ); ?>" class="secondary-menu-toggle igual-toggle"><span></span><span></span><span></span></a>
									</li>
									<?php add_action( 'igual_footer_after', array( 'Igual_Wp_Elements', 'igual_secondary_bar' ), 10 ); ?>
								<?php
								break;
							}
						}
					echo '</ul>';
				}
				?>
			</div><!-- .container -->
			<?php
				/*
				 * Igual Topbar After Action 
				 * 10 - igual_fullbar_search_form
				 */
				do_action( 'igual_logobar_after' );
			?>
		</div><!-- .header-logobar -->
<?php endif; ?>