<?php
/**
 * Footer bottom
 */
$class_array = array(
    'left' => ' element-left',
    'center' => ' pull-center justify-content-center',
    'right' => ' pull-right justify-content-end'
);
$keys = array(
    'chk' => 'footer-bottom-chk',
    'fields' => array(
        'footer_bottom_layout' => 'footer-bottom-layout'
    )
);
$footer_bottom_values = Igual_Wp_Elements::igual_get_meta_and_option_values($keys);
$container_class = (isset($footer_bottom_values['footer_bottom_layout']) && $footer_bottom_values['footer_bottom_layout'] === 'boxed') ? 'container' : 'container-fluid';

do_action('igual_top_footer_bottom');
?>

<div class="footer-bottom-wrap">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="row">
            <div class="col-12">
                <?php
                $copyright_items = Igual_Wp_Elements::igual_options('copyright-bar-items');
                $igual_options = get_option('igual_options'); // fetch once
                if (!empty($copyright_items)) :
                    if (isset($copyright_items['disabled'])) unset($copyright_items['disabled']);

                    foreach ($copyright_items as $key => $value) {
                        $cr_bar_class = $class_array[$key] ?? '';
                        $cr_bar_class .= (isset($copyright_items['right']) && !empty($copyright_items['right'])) ? ' right-element-exist' : '';

                        echo '<ul class="nav copyright-bar-ul' . esc_attr($cr_bar_class) . '">';

                        foreach ($value as $element => $label) {
                            switch ($element) {
                                case "copyright-text":
                                    ?>
                                    <li>
                                        <p class="footer-copyright">
                                            © Copyright <?php echo date('Y'); ?>. All rights reserved.
                                            <a href="#" target="_blank">RBA</a>. Designed by
                                            <a href="https://www.krossark.com" target="_blank">Krossark</a>
                                        </p>
                                    </li>
                                    <?php
                                    break;

                                case "copyright-widgets":
                                    $cr_sidebar_name = $igual_options['copyright-widget'] ?? '';
                                    if ($cr_sidebar_name && is_active_sidebar($cr_sidebar_name)) : ?>
                                        <li>
                                            <aside class="copyright-widget">
                                                <?php dynamic_sidebar($cr_sidebar_name); ?>
                                            </aside>
                                        </li>
                                    <?php
                                    endif;
                                    break;
                            }
                        }

                        echo '</ul>';
                    }
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php
do_action('igual_after_footer_bottom');
?>
