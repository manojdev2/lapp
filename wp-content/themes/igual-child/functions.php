<?php
/* =========================================
 * Enqueues parent theme stylesheet
 * ========================================= */

add_action( 'wp_enqueue_scripts', 'igual_enqueue_child_theme_styles', 30 );
function igual_enqueue_child_theme_styles() {
	wp_enqueue_style( 'igual-child-theme-style', get_stylesheet_uri(), array(), null );
}
