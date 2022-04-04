<?php

// =============================================================================
// PAGE-EVENT.PHP
/* Template Name: Single Event */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
// =============================================================================

/* URLs
https://viterbi.usc.edu/rss/vsoe_calendar_masters.json.txt
https://viterbi.usc.edu/rss/vsoe_calendar_docprof.json.txt
https://viterbi.usc.edu/rss/vsoe_calendar_gapp.json.txt

*/

get_header(); ?>

<div class="x-container max width offset" style="padding-top: 20px; padding-bottom: 20px;">
    <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="<?php x_main_content_class(); ?>" id="main" role="main">


            <h1 class="entry-title no-icon" style="margin-bottom: 20px;">Event Details</h1>
            <?php // begin REST


              $vsoe_events_feed_url = 'https://viterbi.usc.edu/rss/vsoe_calendar_all_events.json.txt';
                $vsoe_events_error = '<p>There are no currently scheduled events that meet your criteria.</p><a href="https://viterbi.usc.edu/calendar/" target="_blank"><button class="x-btn-sm aligncenter">View All Viterbi School Events</button></a>';
                $response = wp_remote_get( 'https://viterbi.usc.edu/rss/vsoe_calendar_all_events.json.txt' );
                if( is_wp_error( $response ) ) {
                    echo $vsoe_events_error;
                    return;
                }
                $posts = json_decode( wp_remote_retrieve_body( $response, true ) );
                if( empty( $posts ) ) {
                    echo $vsoe_events_error;
                    return;
                }
                $num_items = count($posts);
                $i = 1;

                   foreach($posts as $post)
                   {
                        if($post->events_id == $_GET['event'])
                        {
                    $length = '1';
                    $e_events_name = $post->event_name;
                    $e_events_date = $post->event_date;
                    $e_events_date_out = date('D, M d, Y', strtotime($e_events_date));
                    $e_events_date_day = date('D', strtotime($e_events_date));
                    $e_events_date_month = date('M', strtotime($e_events_date));
                    $e_events_date_date = date('d', strtotime($e_events_date));
                    $e_events_start_time = $post->event_start_time;
                    $e_events_start_time_out = date('H:i', strtotime($e_events_start_time));
                    $e_events_end_time = $post->event_end_time;
                    $e_events_end_time_out = date('H:i', strtotime($e_events_end_time));
                    $e_events_desc = $post->event_description;
                    $e_events_desc = preg_replace('/((\w+:\/\/)[-a-zA-Z0-9:@;?&=\/%\+\.\*!\',\$_\{\}\^~\[\]`#|]+)/', '<a href="$1"  target="_blank" class="vsoe-inline">$1</a> ',$e_events_desc);
                    $e_events_id = $post->events_id;
                    $e_events_location = $post->location;
                    $e_events_all_day = $post->all_day;
                    echo '<div class="event post-card" id="'.$e_events_id.'"><div class="wrap">';
                    echo '<div class="date-time-wrap">';
                    echo '<span class="event-month">'.$e_events_date_month.'</span>';
                    echo '<span class="event-date">'.$e_events_date_date.'</span>';
                    echo '<span class="event-day">'.$e_events_date_day.'</span>';
                    echo '</div>';
                    echo '<div class="event-content">';
                    printf('<h3 class="entry-title no-icon">%s</strong></h3>', esc_html($e_events_name ) );
                    printf('<p><strong>%s</strong><br />', esc_html($e_events_date_out ) );
                    if (($e_events_start_time_out != '00:00') && ($e_events_end_time_out != '00:00') ) {
                        printf('<strong>%s - %s</strong><br />', date('g:i A', strtotime($e_events_start_time_out)), date('g:i A', strtotime($e_events_end_time_out)) );
                    }
                    else if ($e_events_all_day == '1') {
                        printf('<strong>All Day Event</strong><br />');
                    }
                    if ($e_events_location) {
                        printf('<strong>Location: </strong>%s<br />', $e_events_location);
                    }
                    echo  nl2br($e_events_desc) . '</p></div></div></div>';		// Added nl2br(), 10/18/2017
                        }
                   } ?>

                    <script>// <![CDATA[
                    function goBack() { window.history.back() }
                    // ]]></script>
                    <button class="x-btn x-btn-mini" style="text-transform: uppercase; padding-top: 5px; padding-bottom: 5px; line-height: 1; vertical-align: middle;" onclick="goBack()">&laquo; Return to Previous Page</button>
    </div>
    <?php if ( $fullwidth != 'on' ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>
</div>


<?php get_footer(); ?>