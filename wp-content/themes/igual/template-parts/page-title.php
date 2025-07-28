<?php 
/*
 * Page title template definition
 */

$keys = array(
	'chk' => 'page-title-chk',
	'fields' => array(
		'page_title_opt' => array( 'page-title', Igual_Wp_Elements::$template.'-title' ),
		'page_title_items' => array( 'page-title-items', Igual_Wp_Elements::$template.'-title-items' )
	)			
);
$page_title_values = Igual_Wp_Elements::igual_get_meta_and_option_values( $keys );
if( $page_title_values['page_title_opt'] ):
	do_action( 'igual_page_title_before' );
	
	$pt_custom_class = isset( $page_title_values['pt_custom_class'] ) ? $page_title_values['pt_custom_class'] : '';
?>
	<header class="igual-page-header <?php echo esc_attr( $pt_custom_class ); ?>"> 
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php Igual_Wp_Elements::igual_show_page_title( $page_title_values['page_title_items'] ); ?>
				</div>
			</div>
		</div><!-- .container -->
	</header><!-- .igual-page-header -->
<?php
	do_action( 'igual_page_title_after' );
endif;
