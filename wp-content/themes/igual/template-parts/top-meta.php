<?php
/**
 * Top Meta
 */

$top_meta_opt = Igual_Wp_Elements::igual_options('single-top-meta-enable');
if( $top_meta_opt ):
	Igual_Wp_Elements::igual_get_post_meta( Igual_Wp_Elements::$template, 'top' );
endif;