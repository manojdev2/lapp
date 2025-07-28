<?php
/**
 * Bottom Meta
 */

$bottom_meta_opt = Igual_Wp_Elements::igual_options('single-bottom-meta-enable');
if( $bottom_meta_opt ):
	Igual_Wp_Elements::igual_get_post_meta( Igual_Wp_Elements::$template, 'bottom' );
endif;