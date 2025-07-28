<?php
/**
 * Archive template
 */

get_header();

Igual_Wp_Elements::$template = 'archive';

?>

<main id="site-content">

	<?php 
		/*
		* Page title template call
		*/
		get_template_part( 'template-parts/page', 'title' );
	?>

	<div class="igual-content-wrap container">
		<div class="row">
			<?php
				$content_col_class = Igual_Wp_Elements::igual_get_content_class();
			?>
			<div class="<?php echo esc_attr( $content_col_class ); ?>">
				<?php				
				if ( have_posts() ) { 
					echo '<div class="igual-masonry" data-columns="2" data-gutter="30">';
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', 'excerpt' );
						} 
					echo '</div>';		
				} elseif ( is_search() ) { ?>
					<div class="no-search-results-form">
						<div class="container">
							<h2 class="no-search-title"><?php esc_html_e( 'Nothing Found', 'igual' ); ?></h2>
							<p class="no-search-results-desc"><?php esc_html_e( 'It seems we can not find what you are looking for. Perhaps searching can help. ', 'igual' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .container -->
					</div><!-- .no-search-results -->
					<?php
				}
				?>
				<?php get_template_part( 'template-parts/pagination' ); ?>
			</div><!-- .col -->
			<?php get_template_part( 'template-parts/content-sidebar' ); ?>
		</div><!-- .row -->
	</div><!-- .igual-content-wrap -->

</main><!-- #site-content -->

<?php
get_footer();
