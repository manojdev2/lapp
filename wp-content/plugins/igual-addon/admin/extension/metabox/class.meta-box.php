<?php
/**
 * The Class.
 */
class Igual_Meta_Box {

    private static $_instance = null;
 
    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );

        add_action( 'admin_enqueue_scripts', array( $this, 'igual_post_options_admin_scripts' ) );
    }

    public function igual_post_options_admin_scripts(){
        wp_register_style( 'igual-theme-options', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/css/theme-options.css', array(), '1.0', 'all' );			
        wp_register_style( 'igual_theme_options_css', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/css/theme-options.css' );
        wp_register_script( 'wp-color-picker-alpha', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/js/wp-color-picker-alpha.min.js', array( 'jquery', 'wp-color-picker' ), '3.0.0' );
        wp_register_script( 'igual_theme_options_js', IGUAL_ADDON_URL . 'admin/extension/theme-options/assets/js/theme-options.js' );
    }
 
    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'post', 'page' );
 
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'igual_metabox',
                esc_html__( 'Igual Options', 'textdomain' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
                'high'
            );
        }
    }
 
    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {
 
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
 
        // Check if our nonce is set.
        if ( ! isset( $_POST['igual_metabox_security'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['igual_metabox_security'];
 
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'igual_metabox_nonce_*&%$' ) ) {
            return $post_id;
        }
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
 
        // Check the user's permissions.
        //if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $post_data = $_POST['igual_options'];
 
        // Update the meta field.
        update_post_meta( $post_id, 'igual_post_meta', $post_data );
    }
 
 
    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {

        wp_enqueue_style( 'igual-theme-options' );
        wp_enqueue_media();
        wp_enqueue_style( 'igual_theme_options_css' );
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker-alpha' );
        wp_enqueue_script( 'igual_theme_options_js' );
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'igual_metabox_nonce_*&%$', 'igual_metabox_security' );
        
        /*
        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta( $post->ID, 'igual_post_meta_value', true );
 
        // Display the form, using the current value.
        ?>
        <label for="myplugin_new_field">
            <?php _e( 'Description for this field', 'textdomain' ); ?>
        </label>
        <input type="text" id="myplugin_new_field" name="igual_post_meta_value" value="<?php echo esc_attr( $value ); ?>" size="25" />
        <?php
        */

        if( !class_exists( 'Igual_Options' ) ) require_once( IGUAL_ADDON_DIR . 'admin/extension/theme-options/framework.php' );
        require_once( IGUAL_ADDON_DIR . 'admin/extension/metabox/meta-config.php' );

        ?>
        <div class="igual-settings-wrap">
        <div class="igual-inner-wrap">
        <div class="igual-admin-content-wrap">
                <?php wp_nonce_field( 'igual_theme_options*&^&*$', 'save_igual_theme_options' ); ?>
                <div class="igual-tab">
                    <div class="igual-tab-list">
                        <ul class="tablinks-list">
                            <?php Igual_Options::igual_put_section(); ?>
                        </ul>
                    </div><!-- .igual-tab-list -->
                    
                    <?php Igual_Options::igual_put_field(); ?>
                    
                </div><!-- .igual-tab -->							
        </div><!-- .igual-admin-content-wrap -->
        </div>
        </div>
    <?php
    }

    public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}
Igual_Meta_Box::get_instance();