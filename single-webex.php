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

/*$vsoe_course_start_date = get_field('vsoe_course_start_date');
$vsoe_course_end_date = get_field('vsoe_course_end_date');

$vsoe_course_start_date_month = date('M', strtotime($vsoe_course_start_date));
$vsoe_course_start_date_date = date('d', strtotime($vsoe_course_start_date));
$vsoe_course_start_date_day = date('D', strtotime($vsoe_course_start_date));


$vsoe_course_course_delivery = get_field('vsoe_course_course_delivery');
$vsoe_course_academic_discipline = get_field('vsoe_course_academic_discipline');
$vsoe_course_course_number = get_field('vsoe_course_course_number');
$vsoe_course_link = get_field('vsoe_course_link');*/

$type = get_field( 'vsoe_wx_type' );
$cat = get_field( 'vsoe_wx_category' );
$date = get_field( 'vsoe_wx_date' );
$starttime = get_field( 'vsoe_wx_start_time' );
$endtime = get_field( 'vsoe_wx_end_time' );
$upload = get_field( 'vsoe_wx_upload' );
$presdate = get_field( 'vsoe_wx_presentation_date' );
$link = get_field( 'vsoe_wx_webex_link' );
$linktext = get_field( 'vsoe_wx_webex_link_text' );
$password = get_field( 'vsoe_wx_webex_password' );

get_header(); ?>
  
  <div class="x-container max width offset">
  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="<?php x_main_content_class(); ?>" id="main" role="main">
      <?php while ( have_posts() ) : the_post(); ?>       
        <div class="webex-header">
          <span>Date/Time</span>
          <span>Topic</span>
          <span>Registration</span>
          <span>Password</span>
        </div>
        <div id="post-<?php the_ID(); ?>" <?php post_class() . 'webex'; ?>>
          <div class="date-time">
            <span class="label">Date &amp; Time<br></span>
            <?php echo date('l, F jS, Y', strtotime($date)) . '<br>'; ?>
            <?php echo date('h:i:s A', strtotime($starttime)); ?>
          </div>
          <div class="topic">
            <span class="label">Topic<br></span>
            <span><h3><?php esc_html(the_title() ); ?></h3></span>
          </div>
          <div class="rsvp">
            <span class="label">Registration &amp; Password<br></span>
            <span><a class="x-btn x-btn-square x-btn-small" href="<?php echo esc_url($link); ?>"><?php echo esc_html($linktext); ?></a></span>
            <span><?php echo esc_html($password); ?></span>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <?php if ( $fullwidth != 'on' ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>
  </div>

<?php get_footer(); ?>