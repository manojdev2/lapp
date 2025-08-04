<?php
/* =========================================
 * Enqueues parent theme stylesheet
 * ========================================= */

add_action( 'wp_enqueue_scripts', 'igual_enqueue_child_theme_styles', 30 );
function igual_enqueue_child_theme_styles() {
	wp_enqueue_style( 'igual-child-theme-style', get_stylesheet_uri(), array(), null );
}

/* =========================================
 * Get team email and enable in Contact Form 7
 * ========================================= */
function get_team_email() {
    $post_id = isset($_POST['_wpcf7_container_post']) ? (int) $_POST['_wpcf7_container_post'] : get_the_ID();
    $email = get_post_meta($post_id, 'cea_team_email', true);
    
    return (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) ? $email : get_option('admin_email');
}
add_shortcode('get_team_email', 'get_team_email');

// Enable shortcodes in mail fields
add_filter('wpcf7_mail_components', function($components) {
    if (isset($components['recipient'])) {
        $components['recipient'] = do_shortcode($components['recipient']);
    }
    return $components;
});