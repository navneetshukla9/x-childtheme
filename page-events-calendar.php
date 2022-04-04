<?php

// =============================================================================
// PAGE-EVENTS-CALENDAR.PHP
/* Template Name: Events Calendar */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
// =============================================================================

/* URLs
https://viterbi.usc.edu/rss/vsoe_calendar_masters.json.txt
https://viterbi.usc.edu/rss/vsoe_calendar_docprof.json.txt
https://viterbi.usc.edu/rss/vsoe_calendar_gapp.json.txt

*/

get_header(); 

// Curl function to get data from Viterbi/directory/dept_faculty.php
function curl_wrapper($url)
{
	// Create a new cURL resource
	$ch = curl_init();	
	$headers = array();
	$headers[] = 'Content-Type: text/html';
	
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,0);
	curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	
		
	// Grab URL and pass it to the browser
	$html = curl_exec($ch);
	
	// Check for errors and display the error message, added 11/1/2016
	if($errno = curl_errno($ch)) {
		$error_message = curl_strerror($errno);
		echo "cURL error ({$errno}):\n {$error_message}";
	}		
	
	// Close cURL resource, and free up system resources
	curl_close($ch);
	
	return $html;
}


?>

<div class="x-container max width offset">
    <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>



    <?php if ( $fullwidth != 'on' ) : ?>

	<?php 
		$calendarType = $_GET['calendar'];
		$theDate = $_GET['date'];

		echo curl_wrapper("https://viterbi.usc.edu/calendar/dana_index.php?calendar=$calendarType&date=$theDate"); 
	?>

      <?php //get_sidebar(); ?>
    <?php endif;  ?>


    <div class="<?php x_main_content_class(); ?>" id="main" role="main">


            <h1 class="entry-title no-icon" style="margin-bottom: 20px;">Event Details</h1>

<?php

$theDate = date('m/d/Y');

?>

<form method="get" action="">
<strong>Select a Calendar: </strong> 
<select id="calendar_sel" name="calendar" onchange="this.form.submit()">
<option value=""> - all calendars - </option>
<option value="3" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 3) { echo 'selected'; } ?>>Aerospace and Mechanical Engineering</option>
<option value="23" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 23) { echo 'selected'; } ?>>Astronautical Engineering</option>
<option value="21" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 21) { echo 'selected'; } ?>>Aviation Safety and Security Program</option>
<option value="4" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 4) { echo 'selected'; } ?>>Biomedical Engineering</option>
<option value="7" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 7) { echo 'selected'; } ?>>Computer Science</option>
<option value="8" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 8) { echo 'selected'; } ?>>Daniel J. Epstein Department of Industrial and Systems Engineering</option>
<option value="24" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 24) { echo 'selected'; } ?>>Executive Education</option>
<option value="10" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 10) { echo 'selected'; } ?>>Information Sciences Institute</option>
<option value="18" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 18) { echo 'selected'; } ?>>Information Technology Program (ITP)</option>
<option value="2" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 2) { echo 'selected'; } ?>>Ming Hsieh Department of Electrical Engineering</option>
<option value="9" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 9) { echo 'selected'; } ?>>Mork Family Department of Chemical Engineering and Materials Science</option>
<option value="6" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 6) { echo 'selected'; } ?>>Sonny Astani Department of Civil and Environmental Engineering</option>
<option value="1" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 1) { echo 'selected'; } ?>>USC Viterbi School of Engineering</option>
<option value="14" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 14) { echo 'selected'; } ?>>Viterbi School of Engineering Alumni</option>
<option value="13" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 13) { echo 'selected'; } ?>>Viterbi School of Engineering Career Connections</option>
<option value="26" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 26) { echo 'selected'; } ?>>Viterbi School of Engineering Doctoral Programs</option>
<option value="16" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 16) { echo 'selected'; } ?>>Viterbi School of Engineering Graduate Admission</option>
<option value="28" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 28) { echo 'selected'; } ?>>Viterbi School of Engineering Masters Programs</option>
<option value="25" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 25) { echo 'selected'; } ?>>Viterbi School of Engineering STEM Educational Outreach Programs</option>
<option value="15" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 15) { echo 'selected'; } ?>>Viterbi School of Engineering Student Affairs</option>
<option value="5" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 5) { echo 'selected'; } ?>>Viterbi School of Engineering Student Organizations</option>
<option value="17" <?php if(isset($_GET['calendar']) and $_GET['calendar'] == 17) { echo 'selected'; } ?>>Viterbi School of Engineering Undergraduate Admission</option></select>    
<input type="hidden" name="date" id="date" value="<?php echo $theDate; ?>">
</form>


            <?php // begin REST

$event_url_prefix = 'https://viterbi.usc.edu/rss/vsoe_calendar_';
$event_url_postfix = '.json.txt';
$vsoe_events_name = '';

	switch($_GET['calendar'])
    {
		case 1:
			$vsoe_events_name = 'all_events';
			break;
		case 2:
			$vsoe_events_name = 'ee';
			break;
		case 3:
			$vsoe_events_name = 'ame';
			break;
		case 4:
			$vsoe_events_name = 'bme';
			break;
		case 5:
			$vsoe_events_name = 'student_organizations';
			break;
		case 6:
			$vsoe_events_name = 'cee';
			break;
		case 7:
			$vsoe_events_name = 'cs';
			break;
		case 8:
			$vsoe_events_name = 'ise';
			break;
		case 9:
			$vsoe_events_name = 'mork';
			break;
		case 10:
			$vsoe_events_name = 'isi';
			break;
		case 13:
			$vsoe_events_name = 'career';
			break;
		case 14:
			$vsoe_events_name = 'alumni';
			break;
		case 15:
			$vsoe_events_name = 'student_affairs';
			break;
		case 16:
			$vsoe_events_name = 'graduate_admission';
			break;
		case 17:
			$vsoe_events_name = 'undergrad_admission';
			break;
		case 18:
			$vsoe_events_name = 'itp';
			break;
		case 21:
			$vsoe_events_name = 'aviation';
			break;
		case 22:
			$vsoe_events_name = 'all_today';
			break;
		case 23:
			$vsoe_events_name = 'aste';
			break;
		case 24:
			$vsoe_events_name = 'professionalprograms';
			break;
		case 25:
			$vsoe_events_name = 'stem';
			break;
		case 26:
			$vsoe_events_name = 'gapp';
			break;
		case 27:
			$vsoe_events_name = 'gapp';
			break;
		case 28:
			$vsoe_events_name = 'masters';
			break;

		case 0:
		default:
              $vsoe_events_name = 'all_today';

	}



		

		// If a date was choose or month selected, we need to get the json file with all events for all calendars., D. Morita, 10/26/2017
		if($_GET['date'] and ($vsoe_events_name == 'all_today'))
			$vsoe_events_name = 'all_events';

				$vsoe_events_feed_url = $event_url_prefix . $vsoe_events_name . $event_url_postfix;

				echo 'DEBUG: ' .$vsoe_events_feed_url;

                $vsoe_events_error = '<p>There are no currently scheduled events that meet your criteria.</p><a href="https://viterbi.usc.edu/calendar/" target="_blank"><button class="x-btn-sm aligncenter">View All Viterbi School Events</button></a>';
                //$response = wp_remote_get( 'https://viterbi.usc.edu/rss/vsoe_calendar_all_events.json.txt' );

				$response = wp_remote_get($vsoe_events_feed_url);

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
                        //if($post->events_id == $_GET['event'])
                        //{
					
                    $length = '1';
                    $e_events_name = $post->event_name;
                    $e_events_date = $post->event_date;
                    $e_events_date_out = date('D, M d, Y', strtotime($e_events_date));
                    $e_events_date_day = date('D', strtotime($e_events_date));
                    $e_events_date_month = date('M', strtotime($e_events_date));
                    $e_events_date_date = date('d', strtotime($e_events_date));
                    $e_events_date_year = date('Y', strtotime($e_events_date));
                    $e_events_start_time = $post->event_start_time;
                    $e_events_start_time_out = date('H:i', strtotime($e_events_start_time));
                    $e_events_end_time = $post->event_end_time;
                    $e_events_end_time_out = date('H:i', strtotime($e_events_end_time));
                    $e_events_desc = $post->event_description;
                    $e_events_desc = preg_replace('/((\w+:\/\/)[-a-zA-Z0-9:@;?&=\/%\+\.\*!\',\$_\{\}\^~\[\]`#|]+)/', '<a href="$1"  target="_blank" class="vsoe-inline">$1</a> ',$e_events_desc);
                    $e_events_id = $post->events_id;
                    $e_events_location = $post->location;
                    $e_events_all_day = $post->all_day;


					$selected_day   = date('D', strtotime($_GET['date']));
					$selected_month = date('M', strtotime($_GET['date']));
					$selected_year  = date('Y', strtotime($_GET['date']));

//echo "Month: $selected_month - $e_events_date_month - and Year: $selected_year - $e_events_date_year<br />";

//echo '<br />event time: ' . strtotime($post->event_date) . ' ----- date selected: ' . strtotime($_GET['date']) . '<br /><br />';

					if(isset($_GET['date']) and isset($_GET['theday']) and ($e_events_date_day == $selected_day)
						and ($selected_month == $e_events_date_month) and ($selected_year == $e_events_date_year))
					{
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
                    
						echo  nl2br($e_events_desc) . '</p></div></div></div>';
					}
					
					else if(isset($_GET['date']) and isset($_GET['theday']))
					{
						// Do nothing
					}

					else if(isset($_GET['date']) and ($selected_month == $e_events_date_month) and ($selected_year == $e_events_date_year))
					{
//echo 'same month and year';
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
                    
						echo  nl2br($e_events_desc) . '</p></div></div></div>';
					}

/*
					else if(isset($_GET['date']) and (strtotime($post->event_date) >= strtotime($_GET['date'])))
					{
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
                    
						echo  nl2br($e_events_desc) . '</p></div></div></div>';
					}
*/
					else if(!isset($_GET['date']))
					{
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
                    
						echo  nl2br($e_events_desc) . '</p></div></div></div>';
					}
	
                        //}
                   } ?>

                    <script>// <![CDATA[
                    function goBack() { window.history.back() }
                    // ]]></script>
                    <button class="x-btn x-btn-mini" style="text-transform: uppercase; padding-top: 5px; padding-bottom: 5px; line-height: 1; vertical-align: middle;" onclick="goBack()">&laquo; Return to Previous Page</button>
    </div>

    <?php /* if ( $fullwidth != 'on' ) : ?>

	<?php 
		$calendarType = $_GET['calendar'];
		$theDate = $_GET['date'];

		echo curl_wrapper("https://viterbi.usc.edu/calendar/dana_index.php?calendar=$calendarType&date=$theDate"); 
	?>

      <?php //get_sidebar(); ?>
    <?php endif;  */ ?>

</div>

<?php

// Function to display the calendar content
function print_calendar_data($e_events_id, $e_events_date_month, $e_events_date_date, $e_events_date_day, $e_events_name, 
	$e_events_date_out, $e_events_start_time_out, $e_events_end_time_out, $e_events_all_day, $e_events_location,
	$e_events_desc, $e_events_thumbnail)
{
	$display = $imageThumbnail = '';
	$display .= '<div class="event post-card" id="'.$e_events_id.'"><div class="wrap">';
    $display .= '<div class="date-time-wrap">';
	$display .= '<span class="event-month">'.$e_events_date_month.'</span>';
	$display .= '<span class="event-date">'.$e_events_date_date.'</span>';
	$display .= '<span class="event-day">'.$e_events_date_day.'</span>';
	$display .= '</div>';
    $display .= '<div class="event-content">';

	if($e_events_thumbnail)
	{
		$thumbnail = preg_replace ('/calendar/files/', '/calendar/calendar_support/files',$e_events_thumbnail); 
		$imageThumbnail = '<img align="right" src="' . $thumbnail . '" /> ';
	}
    $display .= '<h3 class="entry-title no-icon">'. $imageThumbnail . esc_html($e_events_name) .'</strong></h3>';
    $display .= '<p><strong>' . esc_html($e_events_date_out ) .'</strong><br />';
        	
    if (($e_events_start_time_out != '00:00') && ($e_events_end_time_out != '00:00') ) {
        $display .= '<strong>' . date('g:i A', strtotime($e_events_start_time_out)) . ' - ' . date('g:i A', strtotime($e_events_end_time_out)) . '</strong><br />';
    }
    else if ($e_events_all_day == '1') {
        $display .= '<strong>All Day Event</strong><br />';
    }
    if ($e_events_location) 
	{
        $display .= '<strong>Location: </strong>'. $e_events_location .'<br />';
    }
                    
	$display .= nl2br($e_events_desc) . '</p></div></div></div>';

	return $display;
}

?>


<?php get_footer(); ?>