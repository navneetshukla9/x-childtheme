<?php

// =============================================================================
// Template Name: AJAX Test Page
// -----------------------------------------------------------------------------
// =============================================================================

get_header(); ?>

  <div class="x-container max width offset">
  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="x-main full" id="main" role="main">

  <div class=giar>
    <h1>Loading...</h1>
    <div class=votes>
      <span class=down>0</span><span class=up>0</span>
    </div>
    <div class="reading-list">
      <h2>Reading List</h2>
      <ul>
        <li>Items will be added here</li>
      </ul>
    </div>
    <a href="#" class="clear-list">clear</a>
  </div>
   <!-- <div class="entry-content">

      <button data-page="1" data-per-page="7" id="btn">Load More </button>

      </div> -->

    </div>
  </div>

<!--<script>
jQuery(document).ready(function($) {
var $wpURL = "https://viterbischool.usc.edu/wp-json/wp/v2/news-api?";

  $('#btn').on('click', function() {

      var $this = $(this);
      var nextPageToRetrieve = $this.data('page') + 1;
      var dataPerPage = $this.data('per-page');
      $wpURL = $wpURL + "per_page=" + nextPageToRetrieve + "&page=" + dataPerPage;

      $.ajax({
          type: 'GET',
          url: $wpURL,
          data: { action: 'createHTML' },
          function(data, textStatus, request) {
              request.getResponseHeader('X-WP-TotalPages');
              request.getResponseHeader('X-WP-Total');
              //Figure out the logic whether the next fetch should happen :) 
              // and disable the button if so.
          },
          error: function(request, textStatus, errorThrown) {
              //FailSafe for WP API Failing
          }
      });
    function createHTML(postData) {
      var ourHTMLString = '';
      for(i=0; i<postData.length; i++) {
        ourHTMLString += '<p>' + postData[i].title.rendered + '</h2>';
        ourHTMLString +=  postData[i].title.rendered;
      }
    $(".entry-content").append(ourHTMLString);
   }
  });
});
</script> -->

<?php get_footer(); ?>