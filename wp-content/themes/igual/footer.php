<?php

/*
 * Igual Footer Action 
 * 10 - igual_site_footer
 */
do_action('igual_footer');

/*
 * Igual Footer After Action 
 * 10 - igual_overlay_search_form
 * 20 - igual_mobile_menu
 * 30 - igual_secondary_bar
 * 40 - igual_back_to_top
 */
do_action('igual_footer_after');
?>
</div><!-- .igual-body-inner -->
<?php wp_footer(); ?>
</body>

</html>