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
		'chk' => 'header-topbar-chk',
		'fields' => array(
			'header_topbar_items' => 'topbar-items',
			'header_topbar_text_1' => 'topbar-custom-text-1',
			'header_topbar_text_2' => 'topbar-custom-text-2'
		)			
	);
	$topbar_values = Igual_Wp_Elements::igual_get_meta_and_option_values( $keys );
	$topbar_items = $topbar_values['header_topbar_items'];
	if( !empty( $topbar_items ) ):
		if( isset( $topbar_items['disabled'] ) ) unset( $topbar_items['disabled'] );
		
		$layout = $header_values['header_layout'];
		$container_class = $layout == 'wider' ? 'container-fluid' : 'container'; //justify-content-between class removed
?>
		<div class="header-topbar navbar elements-<?php echo esc_attr( count( $topbar_items ) ); ?>">
			<?php
				/*
				* Igual Topbar Before Action 
				*/
				do_action( 'igual_topbar_before' );
			?>
			<div class="<?php echo esc_attr( $container_class ); ?>">
				<?php 
					foreach( $topbar_items as $key => $value ){
						$topbar_class = $class_array[$key];
						$topbar_class .= isset( $topbar_items['right'] ) && !empty( $topbar_items['right'] ) ? ' right-element-exist' : '';
						echo '<ul class="nav topbar-ul'. esc_attr( $topbar_class ) .'">';
							foreach( $value as $element => $label ){
								switch( $element ){
									case "custom-text-1":
										if( $topbar_values['header_topbar_text_1'] )
										echo '<li>'. do_shortcode( stripslashes( force_balance_tags( wp_kses_post( get_option( 'igual_options' )['topbar-custom-text-1'] ) ) ) ) .'</li>';
									break;
									case "custom-text-2":
										if( $topbar_values['header_topbar_text_2'] )
										echo '<li>'. do_shortcode( stripslashes( force_balance_tags( wp_kses_post( get_option( 'igual_options' )['topbar-custom-text-2'] ) ) ) ) .'</li>';
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
										Igual_Wp_Framework::igual_address( get_option( 'igual_options' )['header-address'] );
										echo '</li>';
									break;
									case "top-menu":
										echo '<li>';
										$top_menu_args = apply_filters( 'igual_top_menu_args', array(
											'menu' => 'top-menu',
											'menu_class' => 'nav top-menu'
										) );
										wp_nav_menu( $top_menu_args );
										echo '</li>';
									break;
									case "search":
										echo '<li>';
										Igual_Wp_Framework::igual_search_modal( Igual_Wp_Elements::igual_options('search-type'), 'topbar' );
										echo '</li>';
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
				do_action( 'igual_topbar_after' );
			?>
		</div><!-- .header-topbar -->
<?php endif; ?>