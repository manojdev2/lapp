<?php 

/*
 * Igual custom functions 
 */

class Igual_Custom_Functions {
	
	private static $_instance = null;

	private static $igual_options = null;
		
	public function __construct() {
		
		self::$igual_options = Igual_Theme_Option::$igual_options;
						
		add_filter( 'single_template', array( $this, 'igual_cea_cpt_custom_template' ), 99 );
		
		add_filter( 'taxonomy_template', array( $this, 'igual_cea_cpt_custom_tax_template' ), 99 );
		
		add_action( 'save_post', array( $this, 'igual_save_post_options' ), 10, 1 );
		
		add_action( 'wp_enqueue_scripts', array( $this, 'igual_addon_register_scripts' ) );
		
		add_action( 'wp_body_open', array( $this, 'igual_addon_wp_body_open' ), 10 );
		
		add_filter( 'excerpt_length', array( $this, 'igual_custom_excerpt_length' ), 10 );
		
		add_filter( 'igual_trigger_to_save_custom_styles', array( $this, 'igual_trigger_to_save_custom_styles_fun' ), 10 );
		
		//Year shortcode
		add_shortcode( 'year', function($atts){ return date("Y"); } );
		//Copyright icon shortcode
		add_shortcode( 'copy', function($atts){ return '&copy;'; } );
		
		// Remove single cpt templates
		remove_filter( 'single_template', 'cea_cpt_custom_template', 10 );
		
	}
	
	function igual_trigger_to_save_custom_styles_fun( $styles ){
		require_once IGUAL_ADDON_DIR . 'admin/extension/theme-options/googlefonts.php';
		require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/theme-options-css.php' );
		$custom_css = Igual_Theme_Option::igual_minify_css( $styles );
		return $styles .' '. $custom_css;
	}
	
	function igual_addon_register_scripts(){
		wp_enqueue_style( 'font-awesome', IGUAL_ADDON_URL . '/assets/css/themify-icons.css', array(), '4.7.0', 'all' );
	}
	
	function igual_custom_excerpt_length( $length ){
		$igual_options = self::$igual_options;
		if( isset( $igual_options['blog-post-excerpt-length'] ) && !empty( $igual_options['blog-post-excerpt-length'] ) ) {
			return absint( $igual_options['blog-post-excerpt-length'] );
		}
		return $length;
	}
	
	function igual_addon_wp_body_open(){
		$igual_options = self::$igual_options;	
		$dark_light = isset( $igual_options['dark-light'] ) ? $igual_options['dark-light'] : false;
		if( $dark_light ): ?>
			<div class="dar-light-sticky">
				<div class="dar-light-inner">
					<span class="round-ball-switch"></span>
					<i class="bi bi-sun light-mode"></i>
					<i class="bi bi-moon-fill dark-mode"></i>
				</div>
			</div>
		<?php
		endif;
	}
	
	function igual_save_post_options($post_id){
		
		if ( ! current_user_can( 'manage_options' ) ) {
			return $post_id;
		}
		if ( isset( $_POST['igual_options'] ) ) {
			//update_post_meta( $post_id, 'igual_post_custom_styles', 'This is custom post styles' );
			require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/post-options-css.php' );
		}
		
	}
	
	function igual_cea_cpt_custom_template( $single ) {

		global $post;
				
		/* Checks for single template by post type */
		if( $post->post_type == 'cea-portfolio' || $post->post_type == 'cea-team' || $post->post_type == 'cea-event' || $post->post_type == 'cea-service' || $post->post_type == 'cea-testimonial' ) {
			if( file_exists( IGUAL_ADDON_DIR . '/classic-elementor-addons-pro/custom-singular.php' ) ) {
				return apply_filters( 'cea_portfolio_template_path', IGUAL_ADDON_DIR . '/classic-elementor-addons-pro/custom-singular.php' );
			}		
		}

		return $single;
	}
	
	function igual_cea_cpt_custom_tax_template( $archive ){
		if( is_tax('portfolio-categories') || is_tax('portfolio-tags') || is_tax('service-categories') || is_tax('service-tags') ){
			require_once ( IGUAL_ADDON_DIR . 'inc/cpt.elements.php' );
			if( file_exists( IGUAL_ADDON_DIR . '/classic-elementor-addons-pro/custom-archive.php' ) ) {
				return IGUAL_ADDON_DIR . '/classic-elementor-addons-pro/custom-archive.php';
			}		
		}
	}

	public static function igual_social_links() {
		$igual_options = self::$igual_options;		
		$social_links = isset( $igual_options['social-links'] ) ? $igual_options['social-links'] : '';
		$social_url = isset( $social_links['url'] ) ? $social_links['url'] : '';		
		$social_links = isset( $social_links['enabled'] ) && !empty( $social_links['enabled'] ) ? $social_links['enabled'] : '';
		$social_links = apply_filters( 'igual_available_social_links', $social_links );		
		if( !empty( $social_links ) && is_array( $social_links ) ){
			wp_enqueue_style('font-awesome');
			$social_class = '';
			$social_class .= isset( $igual_options['social-icons-layout'] ) ? ' social-' . $igual_options['social-icons-layout'] : '';
			$social_class .= isset( $igual_options['social-icons-fore'] ) ? ' social-' . $igual_options['social-icons-fore'] : '';
			$social_class .= isset( $igual_options['social-icons-hfore'] ) ? ' social-' . $igual_options['social-icons-hfore'] : '';
			$social_class .= isset( $igual_options['social-icons-bg'] ) ? ' social-' . $igual_options['social-icons-bg'] : '';
			$social_class .= isset( $igual_options['social-icons-hbg'] ) ? ' social-' . $igual_options['social-icons-hbg'] : '';

			$target_window = isset( $igual_options['social-icon-window'] ) ? $igual_options['social-icon-window'] : ''; ?>

			<ul class="nav social-icons<?php echo esc_attr( $social_class ); ?>"<?php if( !empty( $target_window ) ) echo ' target="'. esc_attr( $target_window ) .'"'; ?>><?php
			foreach( $social_links as $key => $icon_class ){
				if( isset( $social_links[$key] ) ){
					$url = isset( $social_url[$key] ) ? $social_url[$key] : '#';
					echo '<li><a class="social-'. esc_attr( $key ) .'" href="'. esc_url( $url ) .'"><span class="'. esc_attr( $icon_class ) .'"></span></a>';
				}
			} ?>
			</ul><!-- .social-icons --><?php
		}
	}
	
	public static function igual_social_share() { //Igual_Wp_Elements::igual_social_share()
		$igual_options = self::$igual_options;		
		$social_share = isset( $igual_options['social-share'] ) ? $igual_options['social-share'] : '';	
		$social_share = isset( $social_share['enabled'] ) && !empty( $social_share['enabled'] ) ? $social_share['enabled'] : '';
		$social_share = apply_filters( 'igual_available_social_share', $social_share );		
		if( !empty( $social_share ) && is_array( $social_share ) ){
			$post_id = get_the_ID();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
			$image_url = !empty( $image ) && isset( $image[0] ) ? $image[0] : '';
			$post_title = get_the_title();
			$site_name = get_bloginfo( 'name' );
			wp_enqueue_style('font-awesome');
			echo '<ul class="nav social-share">';
			foreach( $social_share as $key => $icon_class ){
				switch($key){
					case "facebook":
						echo sprintf( 
							'<li class="nav-item"><a href="%s" data-href="http://www.facebook.com/sharer.php?u=%s&t=%s" target="_blank" rel="nofollow" class="social-facebook share-fb"><i class="%s"></i></a></li>',
							esc_url( home_url( '/' ) ),
							urlencode( get_permalink( $post_id ) ),
							urlencode( $post_title ),
							esc_attr( $icon_class )
					 	);
					break;
					case "twitter":
						echo sprintf( 
							'<li class="nav-item"><a href="%s" data-href="https://twitter.com/share?hashtags=sharing&text=%s&via=%s - %s" class="social-twitter share-twitter" title="%s" target="_blank" rel="nofollow"><i class="%s"></i></a></li>', 
							esc_url( home_url( '/' ) ),
							urlencode( $post_title ),
							urlencode( $site_name ),
							esc_url( get_permalink( $post_id ) ),
							esc_html__( 'Click to send this page to Twitter!', 'igual-addon' ),
							esc_attr( $icon_class )
						);
					break;
					case "linkedin":						
						echo sprintf( 
							'<li class="nav-item"><a href="%s" data-href="http://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s&summary=&source=%s" class="social-linkedin share-linkedin" target="_blank" rel="nofollow"><i class="%s"></i></a></li>',
							esc_url( home_url( '/' ) ),
							esc_url( get_permalink( $post_id ) ),
							urlencode( $post_title ),
							get_bloginfo('name'),
							esc_attr( $icon_class )	
						);
					break;
					case "instagram":
						echo sprintf( 
							'<li class="nav-item"><a href="%s" data-href="https://www.instagram.com/?url=%s" class="social-instagram share-instagram" target="_blank" rel="nofollow"><i class="%s"></i></a></li>',
							esc_url( home_url( '/' ) ),
							esc_url( get_permalink( $post_id ) ),
							esc_attr( $icon_class )	
						);
					break;
					case "pinterest":
						echo sprintf( 
							'<li class="nav-item"><a href="%s" data-href="http://pinterest.com/pin/create/button/?url=%s&amp;media=%s&description=%s" class="social-pinterest share-pinterest" target="_blank" rel="nofollow"><i class="%s"></i></a></li>',
							esc_url( home_url( '/' ) ),
							esc_url( get_permalink( $post_id ) ),
							esc_url( $image_url ),
							urlencode( $post_title ),
							esc_attr( $icon_class )
						);
					break;
					case "whatsapp":
						echo sprintf( 
							'<li class="nav-item"><a href="%s" data-href="https://api.whatsapp.com/send?text=%s %s" target="_blank" rel="nofollow" class="social-whatsapp share-whatsapp"><i class="%s"></i></a></li>',
							esc_url( home_url( '/' ) ),
							urlencode( $post_title ),
							urlencode( get_permalink( $post_id ) ),
							esc_attr( $icon_class )
						);
					break;
				}
			}
			echo '</ul><!-- .social-share -->';
		}
	}

    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}
Igual_Custom_Functions::instance();