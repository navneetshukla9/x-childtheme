<?php

// =============================================================================
// PAGE-CALENDAR.PHP
/* Template Name: Calendar */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's pages, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-page.php," where you'll be able to find the
// appropriate output.
// =============================================================================

?>

<?php get_header(); 

$cal = get_field('vsoe_calendar', 'option'); ?>

<div class="x-container max width offset faculty-directory">

  <?php if ( x_get_option( 'x_breadcrumb_display' ) ) :  x_breadcrumbs(); endif; ?>

  <div class="x-main full" id="main" role="main">

    <iframe src="//viterbi.usc.edu/news/events/calendar/?calendar=<?php echo $cal; ?>&amp;month"></iframe>

  </div>

</div>


<?php get_footer(); ?> 
