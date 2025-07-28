<?php
/**
 * Header file for the Igual WordPress theme.
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); // For wp wp_body_open action hook ?>

		<?php
			/*
			* Set igual page meta
			*/
			if( is_singular() ){
				Igual_Wp_Elements::$igual_page_options = get_post_meta( get_the_ID(), 'igual_post_meta', true );
			}
			$keys = array(
				'chk' => 'general-chk',
				'fields' => array(
					'site_layout' => 'site-layout'
				)			
			);
			$layout = Igual_Wp_Elements::igual_get_meta_and_option_values( $keys );
			$pageloader_opt = Igual_Wp_Elements::igual_options('page-loader-option');
		?>

		<div class="igual-body-inner<?php if( $layout['site_layout'] == 'boxed' ) echo esc_attr( ' container' ); ?>">
		
			<?php if( $pageloader_opt == '1' ) : ?>
			<div class="page-loader"><span class="page-loader-divider"></span></div>
			<?php endif; ?>	

			<?php
			/*
			 * Igual Header Before Action 
			 * 10 - igual_mobile_header
			 */
			do_action( 'igual_header_before' );
			?>
			
			<?php
			/*
			 * Igual Header Action 
			 * 10 - igual_desktop_header
			 */
			do_action( 'igual_header' );
			?>
			
			<?php
			/*
			 * Igual Header After Action 
			 * 10 - igual_header_slider
			 */
			do_action( 'igual_header_after' );
			?>