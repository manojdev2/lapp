<?php
/**
 * Template coming soon default
 */
 
 //get maintenance header
 require_once( IGUAL_ADDON_DIR . 'maintenance/header.php' );

 $address = Igual_Theme_Option::igual_options( 'maintenance-address' );
 $email = Igual_Theme_Option::igual_options( 'maintenance-email' );
 $phone = Igual_Theme_Option::igual_options( 'maintenance-phone' );
 
?>
<div class="container text-center maintenance-wrap">
	<div class="row">
		<div class="col-md-12">
			<h1 class="maintenance-title"><?php esc_html_e( 'Under Maintenance', 'igual-addon' ); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4><?php esc_html_e( 'Phone', 'igual-addon' ); ?></h4>
			<div class="maintenance-phone">
				<?php echo esc_html(  $phone ); ?>
			</div>
		</div>
		<div class="col-md-4">
			<h4><?php esc_html_e( 'Address', 'igual-addon' ); ?></h4>
			<div class="maintenance-address">
				<?php echo wp_kses_post( $address ); ?>
			</div>
		</div>
		<div class="col-md-4">
			<h4><?php esc_html_e( 'Email', 'igual-addon' ); ?></h4>
			<div class="maintenance-email">
				<?php echo esc_html(  $email ); ?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 maintenance-footer">
			<p><?php esc_html_e( 'We are currently in maintenance mode. We will be back soon.', 'igual-addon' ); ?></p>
		</div>
	</div>
	
</div>
<?php
 //get maintenance header
 require_once( IGUAL_ADDON_DIR . 'maintenance/footer.php' );
?>
