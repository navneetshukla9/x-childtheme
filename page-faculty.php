<?php

// =============================================================================
// PAGE-faculty.PHP
// Template Name: Faculty Profile
// -----------------------------------------------------------------------------
// Handles output of individual pages.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's pages, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-page.php," where you'll be able to find the
// appropriate output.
// =============================================================================

get_header(); 

// Curl function to get data from Viterbi/directory/dept_faculty_profile.php
function curl_wrapper($url) {
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

// Variables
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$scriptPath = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];	// Added 6/1/2017, D. Morita
$scriptPath = str_replace("&", "-and-", $scriptPath);
$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );
$layout = get_field('vsoe_site_layout', 'option');
$bc = get_field('vsoe_enable_breadcrumbs', 'option');
$pb = get_field('vsoe_enable_postsblog', 'option');
$ss = get_field('vsoe_enable_social_media_sharing_widget', 'option');
$breadcrumbs = x_get_option( 'x_breadcrumb_display' ); ?>

<div class="x-container max width offset">
  <?php if ( x_get_option( 'x_breadcrumb_display' ) ) :  x_breadcrumbs(); endif; ?>
    <div class="x-main full" id="main" role="main" style="padding-top: 20px; padding-bottom: 20px;">
		<div class="col main">

			<?php

			    // If the names are defined, D. Morita, 6/5/2016
			    if($fname and $lname) 
					echo curl_wrapper("https://viterbi.usc.edu/directory/dept_faculty_profile.php?fname=$fname&lname=$lname&script_path=$scriptPath");
			    else
			    {
					//header("HTTP/1.0 404 Not Found");
					echo '<h4> The faculty profile you requested could not be loaded.  Please try using the <a href="/directory/faculty/">Faculty Directory Page</a>
						to locate the profile you are looking for.   If the error persists please contact Andreas Tillmann (tillmann@usc.edu). </h4>';
				}
			?>

	    </div> <!--END COL MAIN --> 
	</div><!-- END X-MAIN FULL -->
</div></div><!-- END X-CONTAINER -->
<?php get_footer(); ?>