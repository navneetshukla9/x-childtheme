<?php

// =============================================================================
// VIEWS/RENEW/TEMPLATE-BLANK-1.PHP (Container | Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main full" id="main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php x_get_view( 'global', '_content', 'the-content' ); ?>
        </article>

      <?php endwhile; ?>

    </div>
  </div>

<?php get_footer(); ?>