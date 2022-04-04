<?php

// =============================================================================
// VIEWS/RENEW/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single course output for Renew.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );
$layout = get_field('vsoe_site_layout', 'option');
$bc = get_field('vsoe_enable_breadcrumbs', 'option');
$pb = get_field('vsoe_enable_postsblog', 'option');
$ss = get_field('vsoe_enable_social_media_sharing_widget', 'option');
$breadcrumbs = x_get_option( 'x_breadcrumb_display' );

$vsoe_course_start_date = get_field('vsoe_course_start_date');
$vsoe_course_end_date = get_field('vsoe_course_end_date');

$vsoe_course_start_date_month = date('M', strtotime($vsoe_course_start_date));
$vsoe_course_start_date_date = date('d', strtotime($vsoe_course_start_date));
$vsoe_course_start_date_day = date('D', strtotime($vsoe_course_start_date));


$vsoe_course_course_delivery = get_field('vsoe_course_course_delivery');
$vsoe_course_academic_discipline = get_field('vsoe_course_academic_discipline');
$vsoe_course_course_number = get_field('vsoe_course_course_number');
$vsoe_course_link = get_field('vsoe_course_link');




?>

<?php get_header(); ?>
  
  <div class="x-container max width offset">
  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="<?php x_main_content_class(); ?>" id="main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
       

        <div class="post-card event">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="date-time-wrap">
        <span><?php echo $vsoe_course_start_date_month; ?></span>
        <span><?php echo $vsoe_course_start_date_date; ?></span>
        <span><?php echo $vsoe_course_start_date_day; ?></span>
        </div>
        <div class="event-content">
          <div class="entry-wrap">
            <header class="entry-header">
              <p style="margin-bottom: 0;"><strong><?php the_title(); ?></strong></p>
            </header>
            <div class="content entry-content" style="margin-top: 0;">
            <?php
              printf('<p>%s to %s<br />', substr($vsoe_course_start_date, 5), substr($vsoe_course_end_date, 5 ) );
              printf('Course #: %s</p>', $vsoe_course_course_number);
              printf('<p style="margin-top: 10px;">%s</p>', the_excerpt() );
             // printf('<p>For more information and to register, please <a href="%s">click here</a></span></p>.', $vsoe_course_link );
            ?>
            <p>For more information and to register, <a href="<?php echo $vsoe_course_link; ?>" class="vsoe-inline">visit the course page</a>.</p>

            </div>
          </div>
          </div>
        </article>
        </div>


      <?php endwhile; ?>

    </div>

    <?php if ( $fullwidth != 'on' ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>

  </div>

<?php get_footer(); ?>