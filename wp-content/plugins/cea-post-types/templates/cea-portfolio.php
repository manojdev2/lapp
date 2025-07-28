<?php
/**
 * The template for displaying all single portfolio
 *
 */

get_header();
Igual_Wp_Elements::$template = 'blog';
$t = new CEACPTElements();
$portfolio_sidebars = $t->ceaGetThemeOpt('cpt-portfolio-sidebars');
$sidebar_class = array('12', '8', '4');
$sidebar_stat = false;
if (!empty($portfolio_sidebars) && is_active_sidebar($portfolio_sidebars)) {
	$sidebar_stat = true;
}

?>

<main id="site-content">

	<?php
	/*
	 * Page title template call
	 */
	get_template_part('template-parts/page', 'title');
	?>

	<div class="igual-content-wrap container">
		<div class="row">
			<?php
			$content_col_class = Igual_Wp_Elements::igual_get_content_class();
			?>
			<div class="col-md-12 order-md-2">
				<div class="wraps cea-content">

					<?php do_action('cea_portfolio_before_content'); ?>

					<div class="portfolio-content-area">
						<div class="container">
							<div class="row">
								<div
									class="col-md-<?php echo esc_attr($sidebar_stat ? $sidebar_class[1] : $sidebar_class[0]); ?>">
									<?php
									while (have_posts()):
										the_post();

										$sticky_col = get_post_meta(get_the_ID(), 'cea_portfolio_sticky', true);
										$sticky_lclass = $sticky_rclass = '';
										if (!empty($sticky_col) && $sticky_col != 'none') {
											$sticky_lclass = $sticky_col == 'left' ? ' cea-sticky-obj' : '';
											$sticky_rclass = $sticky_col == 'right' ? ' cea-sticky-obj' : '';
										}

										?>
										<div class="portfolio-single portfolio-model-2">

											<!-- .row -->
											<div class="portfolio-details">

												<div class="portfolio-content-wrap<?php echo esc_attr($sticky_lclass); ?>">
													<?php $t->ceaCPTPortfolioTitle(); ?>
													<?php $t->ceaCPTPortfolioContent(); ?>
													<?php $t->ceaCPTNav(); ?>
												</div>
											</div><!-- .row -->
										</div><!-- .portfolio-single -->
										<?php

										//Portfolio Related Slider
										$t->ceaCPTPortfolioRelated();

									endwhile; // End of the loop.
									?>
								</div><!-- .col -->

								<?php if ($sidebar_stat): ?>
									<div class="col-md-<?php echo esc_attr($sidebar_class[2]); ?>">
										<aside class="sidebar-widget widget-area">
											<?php dynamic_sidebar($portfolio_sidebars); ?>
										</aside><!-- #secondary -->
									</div><!-- .col -->
								<?php endif; ?>

							</div><!-- .row -->
						</div><!-- .container -->
					</div><!-- .portfolio-content-area -->

					<?php do_action('cea_portfolio_after_content'); ?>

				</div><!-- .wrap -->
			</div>
		</div>

	</div>
</main>

<?php
get_footer();