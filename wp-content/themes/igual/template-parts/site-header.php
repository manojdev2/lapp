<?php
/*
 * Desktop Header
 */
$keys = array(
	'chk' => 'header-chk',
	'fields' => array(
		'header_layout' => 'header-layout',
		'header_items' => 'header-items',
		'header_absolute' => 'header-absolute',
		'search_type' => 'search-type'
	)
);

$header_values = Igual_Wp_Elements::igual_get_meta_and_option_values($keys);

$header_class = '';
$header_class .= (isset($header_values['header_layout']) && $header_values['header_layout'] === 'boxed') ? ' container p-0' : '';
$header_class .= (isset($header_values['header_absolute']) && $header_values['header_absolute']) ? ' header-absolute' : '';
?>

<header id="site-header" class="site-header<?php echo esc_attr($header_class); ?>">

	<?php
	$header_items = $header_values['header_items'];

	if (!empty($header_items)):

		// Remove disabled items
		if (isset($header_items['disabled'])) {
			unset($header_items['disabled']);
		}

		// If sticky not defined, assign only 'navbar'
		if (!isset($header_items['sticky']) || empty($header_items['sticky'])) {
			$header_items['sticky'] = array();

			if (isset($header_items['normal']['navbar'])) {
				$header_items['sticky']['navbar'] = $header_items['normal']['navbar'];
			}
		}

		// Render sticky header
		if (!empty($header_items['sticky'])):
			$sticky_opt = Igual_Wp_Elements::igual_options('header-sticky');
			?>
			<div class="sticky-outer" data-stickyup="<?php echo esc_attr($sticky_opt === 'on_scrollup' ? "1" : "0"); ?>">
				<div class="sticky-head">
					<?php
					foreach ($header_items['sticky'] as $key => $value) {
						get_template_part('template-parts/header', $key);
					}
					?>
				</div> <!-- .sticky-head -->
			</div> <!-- .sticky-outer -->
			<?php
		endif;

	endif;
	?>

</header><!-- #site-header -->