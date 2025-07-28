<?php
/**
 * The template for displaying pages.
 */

get_header();

Igual_Wp_Elements::$template = apply_filters( 'igual_define_page_template', 'page' );
Igual_Wp_Elements::$igual_page_options = get_post_meta( get_the_ID(), 'igual_post_meta', true );

?>

<main id="site-content">

	<?php 
		/*
		* Page title template call
		*/
		get_template_part( 'template-parts/page', 'title' );
	?>

	<div class="igual-content-wrap container page">
		<div class="row">
			<?php
				$content_col_class = Igual_Wp_Elements::igual_get_content_class();
			?>
			<div class="<?php echo esc_attr( $content_col_class ); ?>">
				<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content' );
						}
					}
				?>
			</div><!-- .col -->
			<?php get_template_part( 'template-parts/content-sidebar' ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
</main><!-- #site-content -->

<?php get_footer(); ?>
