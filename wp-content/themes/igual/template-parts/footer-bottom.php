<?php

/**
 * Footer bottom
 */
$class_array = array(
    'left'        => ' element-left',
    'center'    => ' pull-center justify-content-center',
    'right'        => ' pull-right justify-content-end'
);
$keys = array(
    'chk' => 'footer-bottom-chk',
    'fields' => array(
        'footer_bottom_layout' => 'footer-bottom-layout'
    )
);
$footer_bottom_values = Igual_Wp_Elements::igual_get_meta_and_option_values($keys);
$container_class = isset($footer_bottom_values['footer_bottom_layout']) && $footer_bottom_values['footer_bottom_layout'] == 'boxed' ? 'container' : 'container-fluid';
/*
 * Hook: igual_top_footer_bottom.
 *
 */
do_action('igual_top_footer_bottom');
?>

<div class="footer-bottom-wrap">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="row">
            <div class="col-12">
                <?php
                $copyright_items = [
                    'left' => [
                        'copyright-text' => '© 2025 My Company. All rights reserved.',
                    ],
                    'right' => [
                        'copyright-widgets' => 'Test Widget Area',
                    ],
                ];

                $class_array = [
                    'left' => ' left-element',
                    'right' => ' right-element',
                ];

                foreach (['left', 'right'] as $position) {
                    if (!empty($copyright_items[$position])) {
                        $cr_bar_class = $class_array[$position];

                        // Add class if right side has content
                        if ($position === 'right' && !empty($copyright_items['right'])) {
                            $cr_bar_class .= ' right-element-exist';
                        }

                        echo '<ul class="nav copyright-bar-ul' . esc_attr($cr_bar_class) . '">';

                        foreach ($copyright_items[$position] as $element => $label) {
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
                                ?>
                                    <li>
                                        <aside class="copyright-widget">
                                            <div class="widget zozo_social_widget">
                                                <div class="widget-content">
                                                    <ul class="nav social-icons social-widget widget-content social-squared social-white social-h-white social-bg-dark social-hbg-own">
                                                        <li><a href="https://www.facebook.com" target="_blank" class="social-facebook"><i class="bi bi-facebook"></i></a></li>
                                                        <li><a href="https://twitter.com" target="_blank" class="social-twitter"><i class="bi bi-twitter-x"></i></a></li>
                                                        <li><a href="https://www.instagram.com" target="_blank" class="social-instagram"><i class="bi bi-instagram"></i></a></li>
                                                        <li><a href="https://www.youtube.com" target="_blank" class="social-youtube"><i class="bi bi-youtube"></i></a></li>
                                                        <li><a href="https://in.linkedin.com" target="_blank" class="social-linkedin"><i class="bi bi-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </aside>
                                    </li>
                <?php
                                    break;
                            }
                        }

                        echo '</ul>';
                    }
                }
                ?>
            </div><!-- .col-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .footer-bottom-wrap -->

<?php
/*
	Hook: igual_after_footer_bottom.
*
*/
do_action('igual_after_footer_bottom');
