<?php

// =============================================================================
// VIEWS/GLOBAL/_INDEX.PHP
// -----------------------------------------------------------------------------
// Includes the index output.
// =============================================================================

$stack = x_get_stack();

if ( is_home() ) :
  $style     = x_get_option( 'x_blog_style' );
  $cols      = x_get_option( 'x_blog_masonry_columns' );
  $condition = is_home() && $style == 'masonry';
elseif ( is_archive() ) :
  $style     = x_get_option( 'x_archive_style' );
  $cols      = x_get_option( 'x_archive_masonry_columns' );
  $condition = is_archive() && $style == 'masonry';
elseif ( is_search() ) :
  $condition = false;
endif;
if (is_active_sidebar('blog-page-top-content') && is_archive('blog') && is_category('blog') ) {
        echo '<div class="blog-intro" style="margin-bottom: 1.75em;">';
          dynamic_sidebar( 'blog-page-top-content' );
        echo '</div>';
      }

      if ( $condition ) :

  x_get_view( 'global', '_script', 'isotope-index' ); ?>

  <div id="x-iso-container" class="x-iso-container x-iso-container-posts cols-<?php echo $cols; ?>">

    <?php if ( have_posts() ) :

      while ( have_posts() ) : the_post();
        if ( $stack != 'ethos' ) :
          x_get_view( $stack, 'content', get_post_format() );
        else :
          x_ethos_entry_cover( 'main-content' );
        endif;
      endwhile;
    else :
      x_get_view( 'global', '_content-none' );
    endif; ?>

  </div>

<?php else :

  if ( have_posts() ) :

      if (is_active_sidebar('blog-page-top-content') && is_archive('blog') && is_category('blog') ) {
        echo '<div class="blog-intro">';
          dynamic_sidebar( 'blog-page-top-content' );
        echo '</div>';
      }
    while ( have_posts() ) : the_post();
      x_get_view( $stack, 'content', get_post_format() );
    endwhile;
  else :
    x_get_view( 'global', '_content-none' );
  endif;

endif; 

pagenavi(); ?>
