<?php
/**
 * The template for displaying single events
 *
 */

get_header();
Igual_Wp_Elements::$template = 'blog';
$t = new CEACPTElements();
$event_sidebars = $t->ceaGetThemeOpt('cpt-event-sidebars');
$sidebar_class = array('12', '8', '4');
$sidebar_stat = false;
if (!empty($event_sidebars) && is_active_sidebar($event_sidebars)) {
    $sidebar_stat = true;
}
?>

<main id="site-content">

    <?php get_template_part('template-parts/page', 'title'); ?>

    <div class="igual-content-wrap container">
        <div class="row">
            <div class="wrap cea-content">

                <?php do_action('cea_event_before_content'); ?>

                <div class="event-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-<?php echo esc_attr($sidebar_stat ? $sidebar_class[1] : $sidebar_class[0]); ?>">

                                <?php while (have_posts()): the_post();

                                    $event_date   = get_post_meta(get_the_ID(), 'cea_event_start_date', true);
                                    $end_date     = get_post_meta(get_the_ID(), 'cea_event_end_date', true);
                                    $date_exist   = !empty($end_date) ? $end_date : $event_date;
                                    $event_time   = get_post_meta(get_the_ID(), 'cea_event_time', true);
                                    $date_format  = get_post_meta(get_the_ID(), 'cea_event_date_format', true);
                                    $title_opt    = $t->ceaGetThemeOpt('event-title-opt');
                                ?>

                                <article class="event-single card shadow-lg p-4 mb-5 bg-white rounded">

                                    <!-- Event Status -->
                                    <?php if ($date_exist && (time() - (60 * 60 * 24)) > strtotime($date_exist)): ?>
                                        <div class="alert alert-warning mb-4 text-center fw-bold" role="alert">
                                            <i class="fa fa-exclamation-triangle me-2"></i><?php echo apply_filters('cea_event_close', esc_html('Event closed.', 'cea-post-types')); ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-success mb-3 align-self-start">Upcoming Event!!!</span>
                                    <?php endif; ?>

                                    <!-- Event Header -->
                                    <header class="event-header text-center mb-4">
                                        <?php if ($title_opt): ?>
                                            <h1 class="event-title display-5 fw-bold mb-3"><?php the_title(); ?></h1>
                                        <?php endif; ?>
                                        <?php if ($event_date): ?>
                                            <div class="event-meta text-muted small text-left">
                                                <i class="fa fa-calendar-alt me-2"></i>
                                                <?php echo !empty($date_format) ? date($date_format, strtotime($event_date)) : $event_date; ?>
                                                <?php if (!empty($event_time)): ?>
                                                    <span class="ms-3"><i class="fa fa-clock me-1"></i><?php echo esc_html($event_time); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </header>

                                    <!-- Featured Image -->
                                    <?php if (has_post_thumbnail(get_the_ID())): ?>
                                        <div class="event-featured mb-4 text-center">
                                            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded shadow']); ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Content -->
                                    <section class="event-description mb-5">
                                        <?php the_content(); ?>
                                    </section>

                                    <!-- Event Info Sections -->
<section class="event-info-sections row g-4">
    <?php
    $event_elements_json = get_post_meta(get_the_ID(), 'cea_event_event_info_items', true);
    $event_elements = json_decode(stripslashes($event_elements_json), true);
    $event_elements = $event_elements['Enable'];
    $event_col = get_post_meta(get_the_ID(), 'cea_event_col_layout', true);
    $event_col = $event_col != '' ? explode("-", $event_col) : array('6', '6', '12');

    // Common meta
    $organizer      = get_post_meta(get_the_ID(), 'cea_event_organiser_name', true);
    $organizer_desg = get_post_meta(get_the_ID(), 'cea_event_organiser_designation', true);
    $event_cost     = get_post_meta(get_the_ID(), 'cea_event_cost', true);
    $event_prefix     = get_post_meta(get_the_ID(), 'cea_event_prefix', true);
    $event_link     = get_post_meta(get_the_ID(), 'cea_event_link', true);
    $event_text     = get_post_meta(get_the_ID(), 'cea_event_link_text', true);
    $event_target   = get_post_meta(get_the_ID(), 'cea_event_link_target', true);

    $venue_name     = get_post_meta(get_the_ID(), 'cea_event_venue_name', true);
    $venue_address  = get_post_meta(get_the_ID(), 'cea_event_venue_address', true);
    $email          = get_post_meta(get_the_ID(), 'cea_event_email', true);
    $phone          = get_post_meta(get_the_ID(), 'cea_event_phone', true);
    $website        = get_post_meta(get_the_ID(), 'cea_event_website', true);

    $lat            = get_post_meta(get_the_ID(), 'cea_event_gmap_latitude', true);
    $lang           = get_post_meta(get_the_ID(), 'cea_event_gmap_longitude', true);
    $marker         = get_post_meta(get_the_ID(), 'cea_event_gmap_marker', true);
    $map_style      = get_post_meta(get_the_ID(), 'cea_event_gmap_style', true);
    $map_height     = get_post_meta(get_the_ID(), 'cea_event_gmap_height', true);
    $map_height     = !empty($map_height) ? $map_height : '400';

    $contact        = get_post_meta(get_the_ID(), 'cea_event_contact_form', true);


if (isset($_GET['cea-event'])) {
    $cea_event    = sanitize_text_field($_GET['cea-event']);
    $event_cost   = get_post_meta(get_the_ID(), 'cea_event_cost', true);
    $event_prefix = get_post_meta(get_the_ID(), 'cea_event_prefix', true);
    $event_title = get_the_title();

    $cea_data = json_encode([
        'slug'   => $cea_event,
        'cost'   => $event_cost,
        'prefix' => $event_prefix,
        'event_id' => get_the_ID(),
        'event_title' => $event_title,
    ]);
    setcookie('cea_event_data', $cea_data, time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
}

function cea_event_slug_to_label($slug) {
    return ucwords(str_replace('-', ' ', $slug));
}

global $wpdb;
$current_user = wp_get_current_user();
$registration_email = $current_user->user_email;

$user_entry = false;
$is_approved = false;

if (!empty($registration_email) && !empty($cea_event)) {
    $event_label = cea_event_slug_to_label($cea_event);

    $user_entry = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT e.entry_id
             FROM {$wpdb->prefix}frmt_form_entry e
             INNER JOIN {$wpdb->prefix}frmt_form_entry_meta m_email ON e.entry_id = m_email.entry_id
             INNER JOIN {$wpdb->prefix}frmt_form_entry_meta m_event ON e.entry_id = m_event.entry_id
             WHERE m_email.meta_key = 'email-1' AND m_email.meta_value = %s
               AND m_event.meta_key = 'text-3' AND LOWER(TRIM(m_event.meta_value)) = %s
             LIMIT 1",
            $registration_email,
            strtolower(trim($event_label))
        )
    );

    if ($current_user->ID) {
        $account_status = get_user_meta($current_user->ID, 'account_status', true);
        $is_approved = ($account_status === 'approved' || $account_status === 'yes');
    }
}

    ?>
    <?php

    foreach ($event_elements as $elem => $val):
        switch ($elem):
            case "event-details":
    ?>
                <div class="col-md-<?php echo esc_attr($event_col[0]); ?>">
                    <div class="event-info card h-100 border-0 shadow-sm p-3">
                        <h4 class="h5 mb-3">
                            <i class="fa fa-info-circle me-2 text-primary"></i>
                            <?php echo apply_filters('cea_event_info_details', 'Event Details'); ?>
                        </h4>
                        <ul class="list-unstyled">
                            <?php if ($organizer): ?>
                                <li><i class="fa fa-user me-2 text-muted"></i><strong>Organizer:</strong> <?php echo esc_html($organizer); ?> <?php if ($organizer_desg) echo " – <em>" . esc_html($organizer_desg) . "</em>"; ?></li>
                            <?php endif; ?>
                            <?php if ($event_date): ?>
                                <li><i class="fa fa-calendar-check me-2 text-muted"></i><strong>Event Start Date:</strong> <?php echo !empty($date_format) ? date($date_format, strtotime($event_date)) : $event_date; ?></li>
                            <?php endif; ?>
                            <?php if ($end_date): ?>
                                <li><i class="fa fa-calendar-times me-2 text-muted"></i><strong>Event End Date:</strong> <?php echo !empty($date_format) ? date($date_format, strtotime($end_date)) : $end_date; ?></li>
                            <?php endif; ?>
                            <?php if ($event_cost): ?>
                               <li>
                                  <i class="fa fa-ticket-alt me-2 text-muted"></i>
                                  <strong>Cost:</strong> ₹<?php echo number_format((float)$event_cost); ?>
                                </li>
                            <?php endif; ?>
                            <?php if ($event_link): ?>
                                <li class="mt-2">
                                    <?php if ($date_exist && (time() - (60 * 60 * 24)) > strtotime($date_exist)): ?>
                                        <button class="btn btn-secondary btn-sm" disabled>
                                            <?php echo esc_html('Registration Closed'); ?>
                                        </button>
                                    <?php elseif ($user_entry && $is_approved): ?>
                                        <button class="btn btn-success btn-sm" disabled>
                                            Registered
                                        </button>
                                    <?php else: ?>
                                        <a class="btn btn-primary btn-sm" href="<?php echo esc_url($event_link); ?>" target="<?php echo esc_attr($event_target); ?>">
                                            <?php echo esc_html($event_text ? $event_text : 'Register Now'); ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
    <?php
            break;

            case "event-venue":
    ?>
                <div class="col-md-<?php echo esc_attr($event_col[1]); ?>">
                    <div class="event-venue card h-100 border-0 shadow-sm p-3">
                        <h4 class="h5 mb-3"><i class="fa fa-map-marker-alt me-2 text-danger"></i><?php echo apply_filters('cea_event_venue_name', 'Event Venue'); ?></h4>
                        <ul class="list-unstyled">
                            <?php if ($venue_name): ?>
                                <li><i class="fa fa-building me-2 text-muted"></i><strong>Venue:</strong> <?php echo esc_html($venue_name); ?></li>
                            <?php endif; ?>
                            <?php if ($venue_address): ?>
                                <li><i class="fa fa-map me-2 text-muted"></i><?php echo esc_textarea($venue_address); ?></li>
                            <?php endif; ?>
                            <?php if ($phone): ?>
                                <li><i class="fa fa-phone me-2 text-muted"></i><?php echo esc_html($phone); ?></li>
                            <?php endif; ?>
                            <?php if ($email): ?>
                                <li><i class="fa fa-envelope me-2 text-muted"></i><?php echo esc_html($email); ?></li>
                            <?php endif; ?>
                            <?php if ($website): ?>
                                <li><i class="fa fa-globe me-2 text-muted"></i><a href="<?php echo esc_url($website); ?>" target="_blank"><?php echo esc_url($website); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
    <?php
            break;

            case "event-map":
                if ($lat):
                    wp_enqueue_script('cea-gmaps');
    ?>
                    <div class="col-12">
                        <div class="event-map card border-0 shadow-sm p-3">
                            <h4 class="h5 mb-3"><i class="fa fa-map me-2 text-success"></i>Location Map</h4>
                            <div id="ceagmap" class="rounded" style="width:100%;height:<?php echo absint($map_height); ?>px;"
                                data-map-lat="<?php echo esc_attr($lat); ?>"
                                data-map-lang="<?php echo esc_attr($lang); ?>"
                                data-map-style="<?php echo esc_attr($map_style); ?>"
                                data-map-marker="<?php echo esc_url($marker); ?>"></div>
                        </div>
                    </div>
    <?php
                endif;
            break;

            case "event-form":
                if ($contact):
    ?>
                    <div class="col-12">
                        <div class="event-contact card border-0 shadow-sm p-3">
                            <h4 class="h5 mb-3"><i class="fa fa-envelope-open me-2 text-info"></i>Contact</h4>
                            <?php echo do_shortcode($contact); ?>
                        </div>
                    </div>
    <?php
                endif;
            break;

        endswitch;
    endforeach;
    ?>
</section>

                                </article>

                                <?php endwhile; ?>
                            </div>

                            <?php if ($sidebar_stat): ?>
                                <div class="col-md-<?php echo esc_attr($sidebar_class[2]); ?>">
                                    <aside class="sidebar-widget widget-area">
                                        <?php dynamic_sidebar($event_sidebars); ?>
                                    </aside>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php do_action('cea_event_after_content'); ?>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
