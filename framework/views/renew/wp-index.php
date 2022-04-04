<?php

// =============================================================================
// VIEWS/RENEW/WP-INDEX.PHP
// -----------------------------------------------------------------------------
// Index page output for Renew.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container max width offset">
  	
  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>

    <div class="<?php x_main_content_class(); ?>" id="main" role="main">

      <?php x_get_view( 'global', '_index' ); ?>

    </div>

    <?php get_sidebar(); ?>

  </div>

<?php get_footer(); ?>