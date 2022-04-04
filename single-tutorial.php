<?php

// =============================================================================
// VIEWS/RENEW/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single Tutorial output for Renew.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );
$layout = get_field('vsoe_site_layout', 'option');
$bc = get_field('vsoe_enable_breadcrumbs', 'option');
$pb = get_field('vsoe_enable_postsblog', 'option');
$ss = get_field('vsoe_enable_social_media_sharing_widget', 'option');
$video = get_field('vsoe_tutorial_video_embed_code');
$runtime = get_field('vsoe_tutorial_video_run_time');
$breadcrumbs = x_get_option( 'x_breadcrumb_display' );
?>

<?php get_header(); ?>
  
  <div class="x-container max width offset">

  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>

    <div class="<?php x_main_content_class(); ?>" id="main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('tutorial'); ?>>

            <header class="entry-header">

                <h1 class="entry-title" ><span><h6 style="margin-bottom: 0; color: #555">VSOE Web Team Tutorial</h6></span> <?php esc_html( the_title() ); ?><span class="runtime"><?php echo $runtime; ?></span></h1>

              <?php printf('<div class="video-wrapper">%s</div>', $video ); ?>

            </header>

            <div class="content entry-content">

            <!-- <span class="excerpt"><?php esc_html(the_excerpt()); ?></span> -->

            <?php the_content(); ?>

            </div>

        </article>

      <?php endwhile; ?>

    </div>

    <?php if ( $fullwidth != 'on' ) : ?>

      <?php get_sidebar(); ?>

    <?php endif; ?>

  </div>

<?php get_footer(); ?>