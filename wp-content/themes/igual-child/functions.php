<?php
/* =========================================
 * Enqueues parent theme stylesheet
 * ========================================= */

add_action('wp_enqueue_scripts', 'igual_enqueue_child_theme_styles', 30);
function igual_enqueue_child_theme_styles()
{
    wp_enqueue_style('igual-child-theme-style', get_stylesheet_uri(), array(), null);
}

/* =========================================
 * Get team email and enable in Contact Form 7
 * ========================================= */
function get_team_email()
{
    $post_id = isset($_POST['_wpcf7_container_post']) ? (int) $_POST['_wpcf7_container_post'] : get_the_ID();
    $email = get_post_meta($post_id, 'cea_team_email', true);

    return (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) ? $email : get_option('admin_email');
}
add_shortcode('get_team_email', 'get_team_email');

// Enable shortcodes in mail fields
add_filter('wpcf7_mail_components', function ($components) {
    if (isset($components['recipient'])) {
        $components['recipient'] = do_shortcode($components['recipient']);
    }
    return $components;
});

// Email notification for new CEA events and posts
add_action('transition_post_status', 'cea_content_email_notification', 10, 3);

function cea_content_email_notification($new_status, $old_status, $post)
{
    // Check if it's a CEA event or post type
    if (!in_array($post->post_type, ['cea-event', 'post'])) {
        return;
    }

    // Only send when content is published for the first time
    if ($new_status == 'publish' && $old_status != 'publish') {

        if ($post->post_type === 'cea-event') {
            send_simplified_cea_event_notification($post);
        } elseif ($post->post_type === 'post') {
            send_cea_post_notification($post);
        }
    }
}

// Simplified function for CEA event notifications with PDF attachments
function send_simplified_cea_event_notification($post)
{
    $subject = 'New Event: ' . $post->post_title;
    $event_details = get_cea_event_details_from_your_meta($post->ID);
    $featured_image = get_event_featured_image($post->ID);
    $pdf_links = get_pdf_links_only($post->ID);
    $pdf_attachments = get_pdf_attachments($post->ID);

    $message = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { 
                font-family: Arial, sans-serif; 
                line-height: 1.6; 
                color: #333; 
                margin: 0; 
                padding: 0; 
                background-color: #f4f4f4; 
            }
            .container { 
                max-width: 600px; 
                margin: 20px auto; 
                background: #fff; 
                border-radius: 8px; 
                box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
                overflow: hidden; 
            }
            .header { 
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); 
                color: white; 
                padding: 25px; 
                text-align: center; 
            }
            .content { padding: 30px; }
            .event-title { 
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); 
                padding: 20px; 
                margin: 0 0 25px 0; 
                border-left: 5px solid #007cba; 
                border-radius: 0 5px 5px 0; 
                text-align: center;
            }
            .featured-image { 
                text-align: center; 
                margin: 20px 0; 
                padding: 15px; 
                background: #f8f9fa; 
                border-radius: 8px; 
            }
            .featured-image img { 
                max-width: 100%; 
                height: auto; 
                border-radius: 5px; 
                box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
            }
            .detail-row { 
                margin: 12px 0; 
                padding: 8px 0; 
                border-bottom: 1px dotted #ddd; 
                font-size: 16px; 
            }
            .about-section { 
                margin: 25px 0; 
                padding: 20px; 
                background: #f8f9fa; 
                border-radius: 8px; 
            }
            .pdf-section {
                margin: 20px 0; 
                padding: 15px; 
                background: #fff3cd; 
                border-radius: 8px; 
            }
            .pdf-link {
                display: inline-block;
                color: #007cba !important;
                text-decoration: none !important;
                font-weight: bold;
                padding: 5px 0;
            }
            .button-container { text-align: center; margin: 30px 0; }
            .footer { 
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); 
                color: white; 
                padding: 25px; 
                text-align: center; 
            }
        </style>
    </head>
    <body>
        <div class="container">
            
            <!-- Header -->
            <div class="header">
                <h1>🎉 New Event Published</h1>
            </div>
            
            <!-- Content -->
            <div class="content">
                <div class="event-title">
                    <h2 style="margin: 0; color: #2c3e50;">' . $post->post_title . '</h2>
                </div>';

    // Enhanced Featured Image Section
    // if (!empty($featured_image) && !empty($featured_image['url'])) {
    //     $message .= '
    //             <div class="featured-image" style="text-align: center; margin: 20px 0; padding: 15px; background: #f8f9fa; border-radius: 8px;">
    //                 <img src="' . esc_url($featured_image['url']) . '" 
    //                      alt="' . htmlspecialchars($post->post_title) . '" 
    //                      style="max-width: 100%; height: auto; display: block; margin: 0 auto; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" 
    //                      width="500" />
    //             </div>';
    // }

    // Event Details with corrected field access
    if (!empty($event_details['start_date'])) {
        $message .= '<div class="detail-row"><strong>📅 Date:</strong> ' . date('F j, Y', strtotime($event_details['start_date'])) . '</div>';
    }

    if (!empty($event_details['time'])) {
        $message .= '<div class="detail-row"><strong>⏰ Time:</strong> ' . $event_details['time'] . '</div>';
    }

    if (!empty($event_details['venue_name'])) {
        $message .= '<div class="detail-row"><strong>📍 Venue:</strong> ' . $event_details['venue_name'] . '</div>';
    }

    if (!empty($event_details['venue_address'])) {
        $message .= '<div class="detail-row"><strong>🗺️ Address:</strong> ' . $event_details['venue_address'] . '</div>';
    }

    if (!empty($event_details['cost'])) {
        $currency = !empty($event_details['currency_symbol']) ? $event_details['currency_symbol'] : '$';
        $message .= '<div class="detail-row"><strong>💰 Cost:</strong> ' . $currency . $event_details['cost'] . '</div>';
    }


    // Event Description
    $excerpt = get_the_excerpt($post->ID);
    if (!empty($excerpt)) {
        $message .= '<div class="about-section">
                        <h3 style="color: #2c3e50; margin: 0 0 15px 0;">📋 About This Event</h3>
                        <p style="margin: 0; line-height: 1.6;">' . wp_strip_all_tags($excerpt) . '</p>
                    </div>';
    }

    // PDF Links and Attachment Notice (with p tags content removed)
    if (!empty($pdf_links)) {
        $message .= '
            <div class="pdf-section" style="margin: 20px 0; padding: 15px; background: #fff3cd; border-radius: 8px;">
                <h3 style="color: #856404; margin: 0 0 15px 0;">📄 Event Documents</h3>';

        foreach ($pdf_links as $pdf) {
            $message .= '<div style="margin: 8px 0;">
                        📄 <strong>' . $pdf['name'] . '</strong>
                    </div>';
        }

        $message .= '</div>';
    }


    $message .= '
                <!-- Call to Action -->
                <div class="button-container" style="text-align: center; margin: 30px 0;">
                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                        <tr>
                            <td style="
                                background: linear-gradient(135deg, #007cba 0%, #0056b3 100%); 
                                border-radius: 25px; 
                                box-shadow: 0 4px 15px rgba(0, 124, 186, 0.3);
                            ">
                                <a href="' . get_permalink($post->ID) . '" style="
                                    display: inline-block; 
                                    color: #ffffff !important; 
                                    padding: 15px 35px; 
                                    text-decoration: none !important; 
                                    font-size: 16px; 
                                    font-weight: bold; 
                                    text-transform: uppercase; 
                                    font-family: Arial, sans-serif;
                                ">
                                    🎫 View Event Details
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white; padding: 25px; text-align: center;">
                <p style="margin: 8px 0; color: #bdc3c7;">Best regards,</p>
                <p style="margin: 0; color: #f1c40f; font-size: 20px; font-weight: bold;">' . get_bloginfo('name') . '</p>
            </div>
            
        </div>
    </body>
    </html>';

    $recipients = get_user_emails();

    if (!empty($recipients)) {
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        // Send email with PDF attachments
        wp_mail($recipients, $subject, $message, $headers, $pdf_attachments);
    }
}

// Function to get PDF file paths for email attachments
function get_pdf_attachments($post_id)
{
    $attachment_paths = [];

    // Get all PDF attachments for this post
    $args = array(
        'post_type' => 'attachment',
        'post_parent' => $post_id,
        'post_status' => 'inherit',
        'post_mime_type' => 'application/pdf',
        'numberposts' => -1
    );

    $pdf_attachments = get_posts($args);

    foreach ($pdf_attachments as $pdf) {
        $file_path = get_attached_file($pdf->ID);

        if ($file_path && file_exists($file_path)) {
            $attachment_paths[] = $file_path;
            error_log("Adding PDF attachment: " . basename($file_path));
        }
    }

    return $attachment_paths;
}

// Function to get only PDF links (no attachments)
function get_pdf_links_only($post_id)
{
    $pdf_links = [];

    // Get all PDF attachments for this post
    $args = array(
        'post_type' => 'attachment',
        'post_parent' => $post_id,
        'post_status' => 'inherit',
        'post_mime_type' => 'application/pdf',
        'numberposts' => -1
    );

    $pdf_attachments = get_posts($args);

    foreach ($pdf_attachments as $pdf) {
        $pdf_url = wp_get_attachment_url($pdf->ID);

        if ($pdf_url) {
            $pdf_links[] = [
                'name' => $pdf->post_title ? $pdf->post_title : basename(get_attached_file($pdf->ID)),
                'url' => $pdf_url
            ];
        }
    }

    return $pdf_links;
}

// Enhanced function to get featured image with absolute URLs
function get_event_featured_image($post_id)
{
    $thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);

    if ($thumbnail_id) {
        // Get the absolute URL
        $image_url = wp_get_attachment_image_url($thumbnail_id, 'large');

        // Ensure it's a full absolute URL
        if ($image_url && !filter_var($image_url, FILTER_VALIDATE_URL)) {
            $image_url = home_url($image_url);
        }

        // Force HTTPS if your site uses it
        if (is_ssl()) {
            $image_url = str_replace('http://', 'https://', $image_url);
        }

        if ($image_url) {
            return [
                'url' => $image_url,
                'id' => $thumbnail_id
            ];
        }
    }

    return null;
}

// Function to get CEA event details
function get_cea_event_details_from_your_meta($post_id)
{
    $event_details = [];

    // Updated meta fields to include all the fields used in your email template
    $meta_fields = [
        'cea_event_venue_name' => 'venue_name',
        'cea_event_venue_address' => 'venue_address',
        'cea_event_start_date' => 'start_date',
        'cea_event_time' => 'time',
        'cea_event_cost' => 'cost',
        'cea_event_end_date' => 'end_date',
        'cea_event_organiser_name' => 'organiser_name',
        'cea_event_duration' => 'duration',
        'cea_event_currency_symbol' => 'currency_symbol'
    ];

    foreach ($meta_fields as $meta_key => $detail_key) {
        $value = get_post_meta($post_id, $meta_key, true);
        if (!empty($value)) {
            $event_details[$detail_key] = $value;
        }
    }

    return $event_details;
}

function send_cea_post_notification($post)
{
    $subject = 'New News & Article Published: ' . $post->post_title;
    $featured_image = get_event_featured_image($post->ID);
    $pdf_links = get_pdf_links_only($post->ID);
    $pdf_attachments = get_pdf_attachments($post->ID);

    $message = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { 
                font-family: Arial, sans-serif; 
                line-height: 1.6; 
                color: #333; 
                margin: 0; 
                padding: 0; 
                background-color: #f4f4f4; 
            }
            .container { 
                max-width: 600px; 
                margin: 20px auto; 
                background: #fff; 
                border-radius: 8px; 
                box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
                overflow: hidden; 
            }
            .header { 
                background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); 
                color: white; 
                padding: 25px; 
                text-align: center; 
            }
            .content { padding: 30px; }
            .post-title { 
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); 
                padding: 20px; 
                margin: 0 0 25px 0; 
                border-left: 5px solid #e74c3c; 
                border-radius: 0 5px 5px 0; 
                text-align: center;
            }
            .featured-image { 
                text-align: center; 
                margin: 20px 0; 
                padding: 15px; 
                background: #f8f9fa; 
                border-radius: 8px; 
            }
            .featured-image img { 
                max-width: 100%; 
                height: auto; 
                border-radius: 5px; 
                box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
            }
            .detail-row { 
                margin: 12px 0; 
                padding: 8px 0; 
                border-bottom: 1px dotted #ddd; 
                font-size: 16px; 
            }
            .about-section { 
                margin: 25px 0; 
                padding: 20px; 
                background: #f8f9fa; 
                border-radius: 8px; 
            }
            .pdf-section {
                margin: 20px 0; 
                padding: 15px; 
                background: #fff3cd; 
                border-radius: 8px; 
            }
            .button-container { text-align: center; margin: 30px 0; }
            .footer { 
                background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); 
                color: white; 
                padding: 25px; 
                text-align: center; 
            }
        </style>
    </head>
    <body>
        <div class="container">
            
            <!-- Header -->
            <div class="header">
                <h1>📝 New News & Article Published</h1>
            </div>
            
            <!-- Content -->
            <div class="content">
                <div class="post-title">
                    <h2 style="margin: 0; color: #2c3e50;">' . $post->post_title . '</h2>
                </div>';

    // Featured Image Section (if exists)
    // if (!empty($featured_image) && !empty($featured_image['url'])) {
    //     $message .= '
    //             <div class="featured-image" style="text-align: center; margin: 20px 0; padding: 15px; background: #f8f9fa; border-radius: 8px;">
    //                 <img src="' . esc_url($featured_image['url']) . '" 
    //                      alt="' . htmlspecialchars($post->post_title) . '" 
    //                      style="max-width: 100%; height: auto; display: block; margin: 0 auto; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" 
    //                      width="500" />
    //             </div>';
    // }

    // Post author
    $author_name = get_the_author_meta('display_name', $post->post_author);
    if (!empty($author_name)) {
        $message .= '<div class="detail-row"><strong>👤 Author:</strong> ' . $author_name . '</div>';
    }

    // Post Details
    $message .= '<div class="detail-row"><strong>📅 Published:</strong> ' . get_the_date('F j, Y g:i A', $post->ID) . '</div>';

    // Post category
    $categories = get_the_category($post->ID);
    if (!empty($categories)) {
        $category_names = array_map(function ($cat) {
            return $cat->name;
        }, $categories);
        $message .= '<div class="detail-row"><strong>📂 Category:</strong> ' . implode(', ', $category_names) . '</div>';
    }

    // Post tags
    $tags = get_the_tags($post->ID);
    if (!empty($tags)) {
        $tag_names = array_map(function ($tag) {
            return $tag->name;
        }, $tags);
        $message .= '<div class="detail-row"><strong>🏷️ Tags:</strong> ' . implode(', ', $tag_names) . '</div>';
    }

    // Post Content/Excerpt
    $excerpt = get_the_excerpt($post->ID);
    if (!empty($excerpt)) {
        $message .= '<div class="about-section">
                        <h3 style="color: #2c3e50; margin: 0 0 15px 0;">📋 News & Article Summary</h3>
                        <p style="margin: 0; line-height: 1.6;">' . wp_strip_all_tags($excerpt) . '</p>
                    </div>';
    }

    // PDF Links Section (if any PDFs exist)
    if (!empty($pdf_links)) {
        $message .= '
                <div class="pdf-section" style="margin: 20px 0; padding: 15px; background: #fff3cd; border-radius: 8px;">
                    <h3 style="color: #856404; margin: 0 0 15px 0;">📄 Post Documents</h3>';

        foreach ($pdf_links as $pdf) {
            $message .= '<div style="margin: 8px 0;">
                            📄 <strong>' . $pdf['name'] . '</strong>
                        </div>';
        }

        $message .= '</div>';
    }

    $message .= '
                <!-- Call to Action -->
                <div class="button-container" style="text-align: center; margin: 30px 0;">
                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                        <tr>
                            <td style="
                                background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); 
                                border-radius: 25px; 
                                box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
                            ">
                                <a href="' . get_permalink($post->ID) . '" style="
                                    display: inline-block; 
                                    color: #ffffff !important; 
                                    padding: 15px 35px; 
                                    text-decoration: none !important; 
                                    font-size: 16px; 
                                    font-weight: bold; 
                                    text-transform: uppercase; 
                                    font-family: Arial, sans-serif;
                                ">
                                    📖 Read Article
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white; padding: 25px; text-align: center;">
                <p style="margin: 8px 0; color: #f8f8f8;">Best regards,</p>
                <p style="margin: 0; color: #f1c40f; font-size: 20px; font-weight: bold;">' . get_bloginfo('name') . '</p>
                <p style="color: #f8f8f8; font-size: 13px; margin-top: 15px; font-style: italic;">Thank you for being part of our community!</p>
            </div>
            
        </div>
    </body>
    </html>';

    $recipients = get_user_emails();

    if (!empty($recipients)) {
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        // Send email with PDF attachments if any
        wp_mail($recipients, $subject, $message, $headers, $pdf_attachments);
    }
}


// Function to get all user emails
function get_user_emails()
{
    global $wpdb;

    $emails = $wpdb->get_col("
        SELECT user_email 
        FROM {$wpdb->users} 
        WHERE user_email != '' 
        AND user_email IS NOT NULL
        AND user_email != '0'
        AND user_status = 0
    ");

    $valid_emails = [];
    foreach ($emails as $email) {
        if (is_email($email)) {
            $valid_emails[] = sanitize_email($email);
        }
    }

    return $valid_emails;
}