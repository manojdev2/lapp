<?php
/**
 * Igual functions and definitions
 */
 

define('IGUAL_DIR', get_template_directory() );
define('IGUAL_URI', get_template_directory_uri() );

function igual_theme_support() {
	
	/* Text domain */
	load_theme_textdomain( 'igual', IGUAL_DIR . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1140;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );
	
	update_option( 'large_size_w', 1170 );
	update_option( 'large_size_h', 694 );
	update_option( 'large_crop', 1 );
	update_option( 'medium_size_w', 768 );
	update_option( 'medium_size_h', 456 );
	update_option( 'medium_crop', 1 );
	update_option( 'thumbnail_size_w', 80 );
	update_option( 'thumbnail_size_h', 80 );
	update_option( 'thumbnail_crop', 1 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	load_theme_textdomain( 'igual' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );

	// Editor color palette.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Dark Gray', 'igual' ),
				'slug'  => 'dark-gray',
				'color' => '#111',
			),
			array(
				'name'  => esc_html__( 'Light Gray', 'igual' ),
				'slug'  => 'light-gray',
				'color' => '#767676',
			),
			array(
				'name'  => esc_html__( 'White', 'igual' ),
				'slug'  => 'white',
				'color' => '#FFF',
			),
		)
	);

	// Add support for responsive embedded content.
	//add_theme_support( 'responsive-embeds' );

}

add_action( 'after_setup_theme', 'igual_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php'; 

//Elements
require get_template_directory() . '/classes/class.igual-wp-elements.php';
//Framework
require get_template_directory() . '/classes/class.igual-wp-framework.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-igual-walker-comment.php';

if ( is_admin() ) {
	require_once ( IGUAL_DIR . '/admin/class.admin-settings.php');
}

if( !class_exists('Igual_Theme_Option') ){
	require_once ( IGUAL_DIR . '/inc/theme-default.php');
}

/**
 * Register and Enqueue Scripts.
 */
function igual_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_register_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl-carousel.min.css', array(), '1.8.0', 'all' );
	wp_enqueue_style( 'bootstrap-5', IGUAL_URI . '/assets/css/bootstrap.min.css', array(), '5.0.2' );
	wp_enqueue_style( 'bootstrap-icons', IGUAL_URI . '/assets/css/bootstrap-icons.css', false, '1.9.1' );
	
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'igual-style', get_template_directory_uri() . '/style.css', array(), $theme_version );
	wp_style_add_data( 'igual-style', 'rtl', 'replace' );

	if( !class_exists('Igual_Theme_Option') ){
		wp_enqueue_style( 'igual-google-fonts', igual_theme_default_fonts_url(), array(), null, 'all' );
		wp_enqueue_style( 'igual-custom', IGUAL_URI . '/assets/css/theme-custom-default.css', array(), '1.0' );
	}else{
		$custom_css = '';
		$custom_style = get_option( 'igual_custom_styles' );
		if( class_exists( 'Igual_Theme_Option' ) ){
			if( $custom_style ){
				$custom_css .= Igual_Theme_Option::igual_minify_css( $custom_style );
			}else{
				$custom_css = apply_filters( 'igual_trigger_to_save_custom_styles', $custom_css );
			}
			if( is_singular() ){
				$post_id = get_the_ID();
				$post_styles = get_post_meta( $post_id, 'igual_post_custom_styles', true );
				if( $post_styles ){
					$custom_css .= $post_styles; //Igual_Theme_Option::igual_minify_css( $post_styles );
				}
			}
		}
		if( $custom_css ) wp_add_inline_style( 'igual-style', stripslashes_deep( $custom_css ) );
	}

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.8.0', false );
	wp_enqueue_script( 'igualjs', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $theme_version, false );
	wp_script_add_data( 'igualjs', 'async', true );
	
	$header_offset = Igual_Wp_Elements::igual_options("header-offset");
	$header_offset_y = is_array( $header_offset ) && isset( $header_offset['height'] ) ? $header_offset['height'] : 0;
	$mheader_offset = Igual_Wp_Elements::igual_options("mobile-header-offset");
	$mheader_offset_y = is_array( $mheader_offset ) && isset( $mheader_offset['height'] ) ? $mheader_offset['height'] : 0;
	$res_width = Igual_Wp_Elements::igual_options("mobilebar-responsive");

	$igual_js_args = array(
		'ajax_url' => esc_url( admin_url('admin-ajax.php') ),
		'add_to_cart' => wp_create_nonce('igual-add-to-cart(*$#'),
		'remove_from_cart' => wp_create_nonce('igual-remove-from-cart(*$#'),
		'cart_update_pbm' => esc_html__('Cart Update Problem.', 'igual'),
		'wishlist_remove' => wp_create_nonce('igual-wishlist-{}@@%^@'),
		'product_view' => wp_create_nonce('igual-product-view-@%^&#'),
		'mc_nounce' => wp_create_nonce( 'igual-mailchimp' ), 
		'must_fill' => esc_html__( 'Must Fill Required Details.', 'igual' ),
		'valid_email' => esc_html__( 'Enter Valid Email ID.', 'igual' ),
		'header_offset' => $header_offset_y,
		'mheader_offset' => $mheader_offset_y,
		'res_width' => $res_width
	);
	$igual_js_args = apply_filters( 'igual_wp_localize_args', $igual_js_args );
	wp_localize_script('igualjs', 'igual_ajax_var', $igual_js_args );


}

add_action( 'wp_enqueue_scripts', 'igual_register_scripts' );

/**
 * Enqueue supplemental block editor styles.
 */
function igual_editor_customizer_styles() {
	if( !class_exists('Igual_Options') ){
		require_once ( IGUAL_DIR . '/inc/theme-default.php');
		wp_enqueue_style( 'igual-customizer-google-fonts', igual_theme_default_fonts_url(), array(), null, 'all' );
	}
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'igual-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.0', 'all' );	
	if( class_exists('Igual_Options') ){
		ob_start();
		require_once ( IGUAL_ADDON_DIR . '/admin/extension/theme-options/theme-editor-css.php');
		$custom_styles = ob_get_clean();
		wp_add_inline_style( 'igual-editor-customizer-styles', $custom_styles );
		add_action( 'admin_head', function(){ Igual_Wp_Actions::igual_google_fonts_con(); }, 10 );
	}
}
add_action( 'enqueue_block_editor_assets', 'igual_editor_customizer_styles' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function igual_menus() {

	$locations = array(
		'primary'  => __( 'Primary Menu', 'igual' ),
		'mobile'   => __( 'Mobile Menu', 'igual' ),
		'top-menu'  => __( 'Top Menu', 'igual' ),
		'footer'   => __( 'Footer Menu', 'igual' )
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'igual_menus' );

/**
 * Register widget areas.
 */
function igual_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h3 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h3>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Right Sidebar
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Right Sidebar', 'igual' ),
				'id'          => 'right-sidebar',
				'description' => esc_html__( 'Widgets in this area will be displayed in the right side column in the content area.', 'igual' ),
			)
		)
	);
	
	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer #1', 'igual' ),
				'id'          => 'footer-1',
				'description' => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'igual' ),
			)
		)
	);

	// Footer #2
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer #2', 'igual' ),
				'id'          => 'footer-2',
				'description' => esc_html__( 'Widgets in this area will be displayed in the second column in the footer.', 'igual' ),
			)
		)
	);

	// Footer #3
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer #3', 'igual' ),
				'id'          => 'footer-3',
				'description' => esc_html__( 'Widgets in this area will be displayed in the third column in the footer.', 'igual' ),
			)
		)
	);
	
	// Footer #4
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer #4', 'igual' ),
				'id'          => 'footer-4',
				'description' => esc_html__( 'Widgets in this area will be displayed in the third column in the footer.', 'igual' ),
			)
		)
	);

}

add_action( 'widgets_init', 'igual_sidebar_registration' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 *
 * @return string $html
 */
function igual_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}
add_filter( 'the_content_more_link', 'igual_read_more_tag' );

//Excerpt more
add_filter( 'excerpt_more', function($length) {
    return '..';
} );

// Add the custom columns to the book post type:
add_filter( 'manage_posts_columns', 'igual_set_custom_edit_columns' );
add_filter( 'manage_pages_columns', 'igual_set_custom_edit_columns' );
function igual_set_custom_edit_columns( $columns ) {
	unset( $columns['author'] );
    $columns['views'] = __( 'Views', 'igual' );
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_posts_custom_column' , 'igual_custom_post_column', 10, 2 );
add_action( 'manage_pages_custom_column' , 'igual_custom_post_column', 10, 2 );
function igual_custom_post_column( $column, $post_id ) {
	switch ( $column ) {
		case 'views' :
			echo get_post_meta( $post_id , 'igual_post_views_count' , true ); 
		break;
    }
}

// Igual Mobile Header
add_action( 'igual_header_before', 'igual_mobile_header', 10 );
function igual_mobile_header(){
	get_template_part( 'template-parts/mobile', 'header' );
}

// Igual Header
add_action( 'igual_header', 'igual_desktop_header', 10 );
function igual_desktop_header(){
	get_template_part( 'template-parts/site', 'header' );
}

// Header slider action 
add_action( 'igual_header_after', 'igual_header_slider', 10 );
function igual_header_slider(){	
	$page_options = Igual_Wp_Elements::$igual_page_options;	
	if( !empty( $page_options ) && is_array( $page_options ) ):
		if( isset( $page_options['header-slider'] ) && !empty( $page_options['header-slider'] ) ){
			echo '<div class="igual-slider-wrapper">';
				echo do_shortcode( $page_options['header-slider'] );
			echo '</div> <!-- .igual-slider-wrapper -->';
		}
	endif;
}

add_action( 'igual_footer', 'igual_site_footer', 10 );
function igual_site_footer(){
	get_template_part( 'template-parts/site', 'footer' );
}

add_action( 'template_redirect', function() {
    if ( is_user_logged_in() ) {
        $login_page_id = 39180; 
        $target_page_id = 25511;
        if ( is_page( $login_page_id ) ) {
            wp_safe_redirect( get_permalink( $target_page_id ) );
            exit;
        }
    }
});

add_filter( 'um_password_reset_form_primary_btn_classes', function( $classes, $args ) {
    return array();
}, 10, 2 );

add_filter( 'um_content_restriction_post_types', function( $post_types ) {
    if ( isset( $post_types['cea-event'] ) ) {
        unset( $post_types['cea-event'] );
    }
    return $post_types;
});

if( !class_exists( 'Igual_Addon' ) ){
	add_filter( 'excerpt_length', 'igual_default_excerpt_length', 10 );
	function igual_default_excerpt_length( $length ){
		$igual_options = get_option( 'igual_options' );
		if( isset( $igual_options['blog-post-excerpt-length'] ) && !empty( $igual_options['blog-post-excerpt-length'] ) ) {
			return absint( $igual_options['blog-post-excerpt-length'] );
		}
		return $length;
	}
}

function display_dynamic_event_heading() {
    if (is_page('event-register')) {
        if (isset($_COOKIE['cea_event_data']) && !empty($_COOKIE['cea_event_data'])) {
            $cea_data = isset($_COOKIE['cea_event_data']) ? json_decode(stripslashes($_COOKIE['cea_event_data']), true) : [];
    $cea_event    = isset($cea_data['slug'])   ? sanitize_text_field($cea_data['slug'])   : '';
            $event_slug = $cea_event ;
            if (!empty($event_slug)) {
                return '
                    <div style="text-align:center; margin-bottom:1.5em; color:#3c332b;">
                        <span 
                            style="
                                display:inline-block;
                                background:#b3916e;
                                color:#ffffff !important;
                                border-radius:50%;
                                width:50px;
                                height:50px;
                                line-height:50px;
                                font-size:26px;
                                font-weight:700;
                                margin: 0 auto 0.5em;
                                user-select:none;
                            "
                            aria-hidden="true"
                        >
                            <i class="fa fa-user" style="vertical-align:middle;"></i>
                        </span>
                        <div style="font-size:1.5em;font-weight:600;color: white;font-family:Source Sans Pro;">
                            ' . ucwords(str_replace('-', ' ', $event_slug)) . ' Registration
                        </div>
                    </div>
                ';
            }
        }
        return '
            <div style="text-align:center; margin-bottom:1.5em; color:#3c332b;">
                <span 
                    style="
                        display:inline-block;
                        background:#b3916e;
                        color:#ffffff;
                        border-radius:50%;
                        width:50px;
                        height:50px;
                        line-height:50px;
                        font-size:26px;
                        font-weight:700;
                        margin: 0 auto 0.5em;
                        user-select:none;
                    "
                    aria-hidden="true"
                >
                    <i class="fa fa-user" style="vertical-align:middle;"></i>
                </span>
                <div style="font-size:1.5em; font-weight:600;">
                    Event Register
                </div>
            </div>
        ';
    }
    return '';
}
add_shortcode('event_heading', 'display_dynamic_event_heading');

function enqueue_event_type_autofill_script() {
    if (is_page('event-register')) {
        $custom_js = <<<JS
        // Helper to get cookie value by name
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
            return '';
        }

        document.addEventListener("DOMContentLoaded", function () {
            var ceaEventDataRaw = getCookie('cea_event_data');
            var ceaEvent = '';
            var eventCost = '';
            if (ceaEventDataRaw) {
                try {
                    var ceaEventData = JSON.parse(decodeURIComponent(ceaEventDataRaw));
                    if (ceaEventData.slug) {
                        ceaEvent = ceaEventData.slug;
                    }
                    if (ceaEventData.cost) {
                        eventCost = ceaEventData.cost;
                    }
                } catch(e) {
                    console.error('Failed to parse cea_event_data cookie JSON:', e);
                }
            }
            if (!ceaEvent) return;

            // Convert slug back to readable label (e.g. "rba-60-celebration" -> "Rba 60 Celebration")
            var readableEvent = ceaEvent.replace(/-/g, ' ');
            readableEvent = readableEvent.replace(/\\b\\w/g, function(l) { return l.toUpperCase(); });

            // Autofill for event type input
            var container = document.querySelector('.event-type-autofill');
            if (container) {
                var input = container.querySelector('input[type="text"], input[type="hidden"], input[type="email"], input[type="search"]');
                if (input) {
                    input.value = readableEvent;
                    input.setAttribute('readonly', 'readonly');
                    input.style.background = "#f4e9dc";
                    input.style.color = "#222";
                    input.style.cursor = "not-allowed";
                    input.style.width = "100%";
                    input.style.boxSizing = "border-box";
                    input.style.whiteSpace = "nowrap";
                    input.style.overflow = "hidden";
                    input.style.textOverflow = "ellipsis";
                    input.setAttribute('title', readableEvent);
                }
            }

            // Autofill for event cost input (name="text-4")
            var costInput = document.querySelector('input[name="text-4"]');
            if (costInput && eventCost) {
                costInput.value = eventCost;
                costInput.setAttribute('readonly', 'readonly');
                costInput.style.background = "#f4e9dc";
                costInput.style.color = "#222";
                costInput.style.cursor = "not-allowed";
                costInput.style.width = "100%";
                costInput.style.boxSizing = "border-box";
                costInput.style.whiteSpace = "nowrap";
                costInput.style.overflow = "hidden";
                costInput.style.textOverflow = "ellipsis";
                costInput.setAttribute('title', eventCost);
            }

        });
JS;

        wp_register_script('custom-event-type-autofill', false);
        wp_enqueue_script('custom-event-type-autofill');
        wp_add_inline_script('custom-event-type-autofill', $custom_js);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_event_type_autofill_script');


// Razorpay Integration for Order Id creation
use Razorpay\Api\Api;

require_once WP_CONTENT_DIR . '/plugins/razorpay-php/Razorpay.php';

add_action('wp_ajax_create_razorpay_order', 'create_razorpay_order_callback');
add_action('wp_ajax_nopriv_create_razorpay_order', 'create_razorpay_order_callback');

function create_razorpay_order_callback() {
    if ( ! isset($_POST['amount']) || empty($_POST['amount']) ) {
        wp_send_json_error('Amount not specified');
    }

    $amount = intval($_POST['amount']);

    $key_id = 'rzp_test_RAkTALYcjrAMsc';
    $key_secret = 'lW33gwB7nPdFurYp54jfMjUB';

    $api = new Api($key_id, $key_secret);

    try {
        $order  = $api->order->create([
            'receipt' => 'receipt_' . time(),
            'amount' => $amount, 
            'currency' => 'INR',
            'payment_capture' => 1 
        ]);
        wp_send_json_success([ 'order_id' => $order['id'] ]);
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
    }
}


add_action('wp_ajax_get_user_data', 'get_user_data_callback');
add_action('wp_ajax_nopriv_get_user_data', 'get_user_data_callback');
function get_user_data_callback() {
    if (empty($_POST['user_id'])) {
        wp_send_json_error('User ID not specified');
    }
    $user_id = intval($_POST['user_id']);

    $user_info = get_userdata($user_id);
    if (!$user_info) {
        wp_send_json_error('Invalid user ID');
    }

    $name = $user_info->display_name;
    $email = $user_info->user_email;

    $phone = get_user_meta($user_id, 'phone_number', true);
    if (empty($phone)) {
        $phone = get_user_meta($user_id, 'billing_phone', true);
    }
    if (empty($phone)) {
        $serialized_data = get_user_meta($user_id, 'custom_serialized_meta_key', true);
        $user_data = maybe_unserialize($serialized_data);

        if (is_array($user_data) && !empty($user_data['phone_number'])) {
            $phone = $user_data['phone_number'];
        }
    }
    if (empty($phone)) {
        $phone = '';
    }

    if (!isset($name) && !empty($user_data['first_name'])) {
        $name = $user_data['first_name'];
    }

    wp_send_json_success([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
    ]);
}

add_action('wp_ajax_activate_user_after_payment', 'activate_user_after_payment_callback');
add_action('wp_ajax_nopriv_activate_user_after_payment', 'activate_user_after_payment_callback');

function activate_user_after_payment_callback() {
    if (empty($_POST['user_id']) || empty($_POST['razorpay_payment_id']) || empty($_POST['razorpay_order_id']) || empty($_POST['amount'])) {
        wp_send_json_error('Missing required data');
    }

    $user_id = intval($_POST['user_id']);
    $payment_id = sanitize_text_field($_POST['razorpay_payment_id']);
    $order_id = sanitize_text_field($_POST['razorpay_order_id']);
    $amount = intval($_POST['amount']);

    update_user_meta($user_id, 'razorpay_payment_id', $payment_id);
    update_user_meta($user_id, 'razorpay_order_id', $order_id);

    $role = '';
    if ($amount === 200) {
        $role = 'um_one_time_member';
    } elseif ($amount === 10000) {
        $role = 'um_life_time_member';
    }

    if ($role) {
        $user = new WP_User($user_id);
        foreach ($user->roles as $existing_role) {
            $user->remove_role($existing_role);
        }
        $user->add_role($role);
    }
    if (function_exists('UM')) {
        UM()->common()->users()->approve($user_id, true);
    }

    wp_send_json_success('User activated, role assigned, and payment info saved.');
}

add_action('wp_ajax_check_user_registration', 'handle_check_user_registration');
add_action('wp_ajax_nopriv_check_user_registration', 'handle_check_user_registration');
function handle_check_user_registration() {
    global $wpdb;

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $event_slug = isset($_POST['event']) ? sanitize_text_field($_POST['event']) : '';

    if (empty($email) || empty($event_slug)) {
        wp_send_json_error(['message' => 'Missing parameters']);
        wp_die();
    }

    // Convert slug to label, lowercase and trim for consistency
    $event_label = strtolower(trim(ucwords(str_replace('-', ' ', $event_slug))));

    // Log for debugging (check PHP error log)
    error_log("Checking email: $email; Event: $event_slug; Converted label: $event_label");

    $entry_exists = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(*)
             FROM {$wpdb->prefix}frmt_form_entry e
             INNER JOIN {$wpdb->prefix}frmt_form_entry_meta m_email ON e.entry_id = m_email.entry_id
             INNER JOIN {$wpdb->prefix}frmt_form_entry_meta m_event ON e.entry_id = m_event.entry_id
             WHERE m_email.meta_key = 'email-1' AND m_email.meta_value = %s
               AND m_event.meta_key = 'text-3' AND LOWER(TRIM(m_event.meta_value)) = %s",
            $email,
            $event_label
        )
    );

    if ($entry_exists) {
        wp_send_json_success(['registered' => true]);
    } else {
        wp_send_json_success(['registered' => false]);
    }

    wp_die();
}

add_action('wp_ajax_get_next_prefix_number', 'get_next_prefix_number_callback');
add_action('wp_ajax_nopriv_get_next_prefix_number', 'get_next_prefix_number_callback');

function get_next_prefix_number_callback() {
    global $wpdb;

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $event_slug = isset($_POST['event_slug']) ? sanitize_text_field($_POST['event_slug']) : '';
    $prefix = isset($_POST['event_prefix']) ? sanitize_text_field($_POST['event_prefix']) : '';

    if (empty($email) || empty($event_slug) || empty($prefix)) {
        wp_send_json_error(['message' => 'Missing parameters']);
        wp_die();
    }

$prefix_only = $prefix;

$event_slug_db = strtolower(str_replace('-', ' ', $event_slug));

$max_num = $wpdb->get_var(
    $wpdb->prepare(
        "SELECT MAX(CAST(SUBSTRING_INDEX(m_value.meta_value, '/', -1) AS UNSIGNED))
         FROM {$wpdb->prefix}frmt_form_entry_meta AS m_value
         INNER JOIN {$wpdb->prefix}frmt_form_entry_meta AS m_email ON m_value.entry_id = m_email.entry_id
         INNER JOIN {$wpdb->prefix}frmt_form_entry_meta AS m_event ON m_value.entry_id = m_event.entry_id
         WHERE m_value.meta_key = 'text-5'
           AND m_value.meta_value LIKE %s
           AND m_email.meta_key = 'email-1'
           AND m_event.meta_key = 'text-3'
           AND LOWER(TRIM(m_event.meta_value)) = %s",
        $prefix_only . '%',
        $event_slug_db
    )
);

$next_number = $max_num ? $max_num + 1 : 1001;
$next_formatted = $prefix_only . sprintf("%04d", $next_number);



    wp_send_json_success(['next_prefix_number' => $next_formatted]);
    wp_die();
}

add_action('wp_footer', function () {
    if (is_page('event-register')) : ?>
        <style>
            .rzp-btn-loading {
                position: relative;
                pointer-events: none;
                opacity: 0.6;
            }
            .rzp-btn-spinner {
                width: 20px;
                height: 20px;
                border: 2px solid #eee;
                border-top: 2px solid #3399cc;
                border-radius: 50%;
                animation: rzp-spin 0.8s linear infinite;
                display: inline-block;
                vertical-align: middle;
                margin-left: 10px;
            }
            @keyframes rzp-spin {
                0% { transform: rotate(0deg);}
                100% { transform: rotate(360deg);}
            }
            .rz-error {
                color: red;
                font-size: 0.9em;
                display: none;
                margin-top: 2px;
            }
        </style>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
        jQuery(document).ready(function($) {
            function addErrorDivs() {
                if ($('#error-name').length === 0)
                    $('[name="name-1-first-name"]').after('<div class="rz-error" id="error-name">Please enter your name.</div>');
                if ($('#error-email').length === 0)
                    $('[name="email-1"]').after('<div class="rz-error" id="error-email">Please enter a valid email address.</div>');
                if ($('#error-phone').length === 0)
                    $('[name="phone-1"]').after('<div class="rz-error" id="error-phone">Please enter a valid phone number</div>');
                // if ($('#error-amount').length === 0)
                //     $('[name="select-5"]').after('<div class="rz-error" id="error-amount">Please select an amount.</div>');
                if ($('#error-city').length === 0)
                    $('[name="address-1-city"]').after('<div class="rz-error" id="error-city">Please enter your city.</div>');
            }
            addErrorDivs();
function showCustomPopup(message) {
    // Create the modal HTML
    var modalHtml = `
    <div id="custom-popup-overlay" style="
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;">
      <div style="
          background: white;
          padding: 20px 30px;
          border-radius: 8px;
          max-width: 400px;
          text-align: center;
          box-shadow: 0 2px 10px rgba(0,0,0,0.2);
          font-family: Arial, sans-serif;">
        <p style="margin-bottom: 20px; font-size: 1.1em;">${message}</p>
        <button id="custom-popup-ok" style="
            background-color: #b48d64;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
          ">OK</button>
      </div>
    </div>`;

    // Append modal to body
    $('body').append(modalHtml);

    // Bind click event to remove the modal
    $('#custom-popup-ok').on('click', function() {
        $('#custom-popup-overlay').fadeOut(200, function() {
            $(this).remove();
        });
    });
}
            var fields = [
                {name:'name-1-first-name', err:'#error-name'},
                {name:'email-1', err:'#error-email'},
                {name:'phone-1', err:'#error-phone'},
                {name:'address-1-city', err:'#error-city'},
                // {name:'select-5', err:'#error-amount'}
            ];

            fields.forEach(function(field){
                $('[name="'+field.name+'"]').data('touched', false);
                $('[name="'+field.name+'"]').on('blur change', function() {
                    $(this).data('touched', true);
                    validateField(field.name, field.err);
                });
                $('[name="'+field.name+'"]').on('input', function(){
                    if ($(this).data('touched')) {
                        validateField(field.name, field.err);
                    }
                });
            });

            function validateField(fieldName, errorSelector) {
                var val = $('[name="'+fieldName+'"]').val().trim();
                var valid = true;
                if (fieldName === 'name-1-first-name') {
                    valid = val !== '';
                } else if (fieldName === 'email-1') {
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    valid = val !== '' && emailPattern.test(val);
                } else if (fieldName === 'phone-1') {
                    var phonePattern = /^[1-9]\d{9}$/; // 10 digits, does not start with 0
                    valid = val !== '' && phonePattern.test(val);
                } else if (fieldName === 'address-1-city') {
                    valid = val !== '';
                } 
                // else if (fieldName === 'select-5') {
                //     var amount = $('[name="select-5"] option:selected').text().trim();
                //     valid = amount !== '' && !isNaN(amount);
                // }
                if (!valid) {
                    $(errorSelector).show();
                } else {
                    $(errorSelector).hide();
                }
                return valid;
            }

            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length === 2) return parts.pop().split(";").shift();
                return '';
            }

            $(document).on('click', '#rzp-button', function(e) {
                e.preventDefault();
                var allValid = true;
                fields.forEach(function(field){
                    $('[name="'+field.name+'"]').data('touched', true);
                    if(!validateField(field.name, field.err)){
                        allValid = false;
                    }
                });
                if (!allValid) return;

                var $btn = $(this);
                var originalHtml = $btn.html();

                var userName = $('[name="name-1-first-name"]').val().trim();
                var userEmail = $('[name="email-1"]').val().trim();
                var userPhone = $('[name="phone-1"]').val().trim();
                var amountVal = '';
                var razorpayAmount = 0
                var ceaEventDataRaw = getCookie('cea_event_data');
                var eventSlug = '';
                var eventPrefix = '';
                if (ceaEventDataRaw) {
                    try {
                        var ceaEventData = JSON.parse(decodeURIComponent(ceaEventDataRaw));
                        if (ceaEventData.slug) {
                            eventSlug = ceaEventData.slug;
                            amountVal = ceaEventData.cost;  
                            razorpayAmount = parseInt(parseFloat(amountVal) * 100);
                            eventPrefix = ceaEventData.prefix;
                        }
                    } catch(e) {
                        console.error('Failed to parse cea_event_data cookie JSON:', e);
                    }
                }

                if (!userEmail || !eventSlug) {
                    alert('Email or event information missing.');
                    return;
                }

                $btn.addClass('rzp-btn-loading').prop('disabled', true).html('Checking...');

                // Check if user already registered
                $.ajax({
                    url: '<?php echo admin_url("admin-ajax.php"); ?>',
                    type: 'POST',
                    data: {
                        action: 'check_user_registration',
                        email: userEmail,
                        event: eventSlug
                    },
                    success: function(response) {
                        if (response.success && response.data && response.data.registered) {
                            showCustomPopup('You are already registered for this event.');
                            $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                            return;
                        }
                        startRazorpay();
                    },
                    error: function() {
                        showCustomPopup('Could not verify registration. Please try again.');
                        $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                    }
                });

                function startRazorpay() {
                    $btn.html('Processing<span class="rzp-btn-spinner"></span>');

                    $.ajax({
                        url: '<?php echo admin_url("admin-ajax.php"); ?>',
                        type: 'POST',
                        data: {
                            action: 'create_razorpay_order',
                            amount: razorpayAmount
                        },
                        success: function(response) {
                            if (response.success && response.data.order_id) {
                                var options = {
                                    key: "rzp_test_RAkTALYcjrAMsc",
                                    amount: razorpayAmount.toString(),
                                    currency: "INR",
                                    name: "Event Registration",
                                    description: "Pay to register",
                                    order_id: response.data.order_id,
                                    // handler: function (response) {
                                    //     $('[name="text-1"]').val(response.razorpay_payment_id);
                                    //     $('[name="text-2"]').val(response.razorpay_order_id);
                                    //     $(".forminator-button-submit").trigger("click");
                                    // },
                                    handler: function (response) {
                                        // Set payment IDs as before
                                            $('[name="text-1"]').val(response.razorpay_payment_id);
                                            $('[name="text-2"]').val(response.razorpay_order_id);

                                            $.ajax({
                                                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                                                type: 'POST',
                                                async: false, 
                                                data: {
                                                    action: 'get_next_prefix_number',
                                                    email: userEmail,
                                                    event_slug: eventSlug,
                                                    event_prefix: eventPrefix
                                                },
                                                success: function(res) {
                                                    console.log('Next prefix number response:', res);
                                                    if(res.success && res.data.next_prefix_number) {
                                                        $('[name="text-5"]').val(res.data.next_prefix_number);
                                                    } else {
                                                        console.error('Failed to get next prefix number');
                                                    }
                                                },
                                                error: function() {
                                                    console.error('AJAX error getting next prefix number');
                                                }
                                            });
                                        
                                            $(".forminator-button-submit").trigger("click");
                                        },

                                    prefill: {
                                        name: userName,
                                        email: userEmail,
                                        contact: userPhone
                                    },
                                    theme: { "color": "#b48d64" }
                                };
                                $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                                var rzp1 = new Razorpay(options);
                                rzp1.open();
                            } else {
                                $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                                alert('Unable to create payment order. Please try again.');
                            }
                        },
                        error: function () {
                            $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                            alert('AJAX error creating payment order.');
                        }
                    });
                }
            });
        });
        </script>
    <?php endif;
});



add_action('wp_footer', function () {
    if ( is_page('pricing-table') ) : ?>
    <style>
    .rzp-btn-loading {
        position: relative;
        pointer-events: none;
        opacity: 0.6;
    }
    .rzp-btn-spinner {
        width: 20px;
        height: 20px;
        border: 2px solid #eee;
        border-top: 2px solid #3399cc;
        border-radius: 50%;
        animation: rzp-spin 0.8s linear infinite;
        display: inline-block;
        vertical-align: middle;
        margin-left: 10px;
    }
    @keyframes rzp-spin {
        0% { transform: rotate(0deg);}
        100% { transform: rotate(360deg);}
    }
    </style>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    jQuery(document).ready(function($) {
        // Append loader overlay if not exists
        if ($('#ajaxLoader').length === 0) {
            $('body').append(`
                <div id="ajaxLoader" style="
                    display:none;
                    position: fixed;
                    top:0; left:0; right:0; bottom:0;
                    background: rgba(0,0,0,0.5);
                    z-index: 99999;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                ">
                    <div style="
                        width: 60px;
                        height: 60px;
                        border: 6px solid #ddd;
                        border-top: 6px solid #3399cc;
                        border-radius: 50%;
                        animation: spin 1s linear infinite;
                    "></div>
                </div>
            `);
        }

        $('<style>').prop('type', 'text/css').html(`
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        `).appendTo('head');
		$('#ajaxLoader').hide();
        var ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';
        var userId = <?php echo intval($_GET['user_id'] ?? 0); ?>;
        if (!userId) {
            console.warn('User ID missing in URL parameters');
        }

        function getUserData(userId) {
            return $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'get_user_data',
                    user_id: userId
                }
            });
        }

        function startPayment(amount) {
            if (!userId) {
                alert('User ID missing');
                return;
            }

            var $btn = $('#pay' + amount);
            var originalHtml = $btn.html();
            var razorpayAmount = parseInt(amount, 10) * 100;

            $btn.addClass('rzp-btn-loading').prop('disabled', true)
                .html('Processing<span class="rzp-btn-spinner"></span>');

            getUserData(userId).done(function(userResponse) {
                if (!userResponse.success) {
                    alert('Could not fetch user data.');
                    $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                    return;
                }
                var userData = userResponse.data;

                $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'create_razorpay_order',
                        amount: razorpayAmount,
                        user_id: userId
                    },
                    success: function(orderResponse) {
                        if (orderResponse.success && orderResponse.data.order_id) {
                            var options = {
                                key: "rzp_test_RAkTALYcjrAMsc",
                                amount: razorpayAmount.toString(),
                                currency: "INR",
                                name: userData.name,
                                order_id: orderResponse.data.order_id,
                                handler: function(response) {
                                    // Show loader during activation AJAX
                                    $('#ajaxLoader').show();

                                    $.ajax({
                                        url: ajaxUrl,
                                        type: 'POST',
                                        data: {
                                            action: 'activate_user_after_payment',
                                            user_id: userId,
                                            razorpay_payment_id: response.razorpay_payment_id,
                                            razorpay_order_id: response.razorpay_order_id,
                                            amount: parseInt(razorpayAmount / 100)
                                        },
                                        success: function(activateResponse) {
                                            $('#ajaxLoader').hide();

                                            if (activateResponse.success) {
                                                if ($('#activationModal').length === 0) {
                                                    $('body').append(`
                                                        <div id="activationModal" style="
                                                            position: fixed;
                                                            top: 0; left: 0; right: 0; bottom: 0;
                                                            background: rgba(0,0,0,0.5);
                                                            display: flex;
                                                            justify-content: center;
                                                            align-items: center;
                                                            z-index: 9999;
                                                        ">
                                                            <div style="
                                                                background: white;
                                                                padding: 30px;
                                                                border-radius: 10px;
                                                                text-align: center;
                                                                max-width: 400px;
                                                                box-shadow: 0 2px 10px rgba(0,0,0,0.3);
                                                            ">
                                                                <h2>Account Activated Successfully!</h2>
                                                                <p>Your account has been activated. Please login to continue.</p>
                                                                <button id="loginContinueBtn" style="
                                                                    padding: 10px 20px;
                                                                    background: #b48d64;
                                                                    color: white;
                                                                    border: none;
                                                                    border-radius: 5px;
                                                                    cursor: pointer;
                                                                    font-size: 16px;
                                                                ">Login to Continue</button>
                                                            </div>
                                                        </div>
                                                    `);
                                                }
                                                $('#activationModal').fadeIn();

                                                // Remove previous handler to prevent multiple bindings
                                                $(document).off('click', '#loginContinueBtn').on('click', '#loginContinueBtn', function() {
                                                    window.location.href = '<?php echo esc_url(home_url('/')); ?>';
                                                });
                                            } else {
                                                alert('Activation failed: ' + activateResponse.data);
                                            }
                                        },
                                        error: function() {
                                            $('#ajaxLoader').hide();
                                            alert('Error activating user.');
                                        }
                                    });
                                },
                                prefill: {
                                    name: userData.name,
                                    email: userData.email,
                                    contact: userData.phone
                                },
                                theme: {
                                    color: "#b48d64"
                                }
                            };

                            $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                        } else {
                            $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                            alert('Unable to create payment order. Please try again.');
                        }
                    },
                    error: function() {
                        $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
                        alert('AJAX error creating payment order.');
                    }
                });

            }).fail(function() {
                alert('Error contacting server to fetch user data.');
                $btn.removeClass('rzp-btn-loading').prop('disabled', false).html(originalHtml);
            });
        }

        jQuery(document).on('click', '#pay200', function(e) {
            e.preventDefault();
            startPayment(200);
        });

        jQuery(document).on('click', '#pay10000', function(e) {
            e.preventDefault();
            startPayment(10000);
        });
    });
    </script>
    <?php endif;
});
