<?php

// =============================================================================
// VIEWS/RENEW/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single post output for Renew.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true ); // from X theme options
$sidebar = get_field('vsoe_sidebar_on_single_blog_posts', 'option'); // from Site Settings option page
$vsoe_comments = get_field('vsoe_enable_comments', 'option');
$vsoe_post_nav = get_field('vsoe_enable_post_navigation', 'option');

get_header(); ?>

<div class="x-container max width offset" style="padding-top: 30px; padding-bottom: 30px;">
	<?php //conditional display of breadcrumbs
	if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; 
	// Check if sidebar is enabled and populated and change markup for content left sidebar right
	if (is_active_sidebar('ups-sidebar-single-post-sidebar') && $sidebar == '1' ) { ?>
		<div class="x-main left" id="main" role="main">
	<?php }
	else { // Standard markup if no sidebar set up ?>
		<div class="<?php x_main_content_class(); ?>" id="main" role="main">
	<?php } ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php x_get_view( 'renew', 'content', get_post_format() ); ?>
	<?php if ($vsoe_comments == '1' ) { x_get_view( 'global', '_comments-template' ); }
	if ($vsoe_post_nav == '1') {
	$prev = get_previous_post();
	$next = get_next_post(); ?>
	<nav class="post-nav">
	<?php if (!empty($prev)) { ?>
	<div class="prev-post">
	<span class="dashicons dashicons-arrow-left-alt2" style="position: absolute; margin: -11px 0 0; font-size: 30px; left: 2px;"></span><a href="<?php echo get_permalink( $prev->ID ); ?>">
	<?php echo apply_filters( 'the_title', $prev->post_title ); ?>
	</a>
	</div>
	<?php }
	if (!empty($next)) { ?>
	<div class="next-post">
	<a href="<?php echo get_permalink( $next->ID ); ?>">
		<?php echo apply_filters( 'the_title', $next->post_title ); ?>
	</a>
	<span class="dashicons dashicons-arrow-right-alt2" style="position: absolute; margin: -11px 0 0; font-size: 30px; right: 9px;"></span></div>
	<?php } ?>
	</nav>

	<?php }
	endwhile; ?>
	<?php if ((get_field('vsoe_enable_social_media_sharing_widget', 'option') == '1' && ! is_front_page() && ! x_is_portfolio() ) ) :
	echo '<p>' . do_shortcode('[share title="Share this Post" facebook="true" twitter="true" google_plus="true" linkedin="true" pinterest="true" reddit="true" email="true"]') . '</p>';
	endif; ?>      
	</div>
	<?php if ( $fullwidth != 'on' ) :
	get_sidebar();
	endif;
	// Sidebar was created in theme appearance and is only dispayed if enabled and populated, ID assigned there must match here
	if (is_active_sidebar('ups-sidebar-single-post-sidebar')  && $sidebar == '1' ) {
	echo '<aside class="x-sidebar right" role="complementary">';
	dynamic_sidebar( 'ups-sidebar-single-post-sidebar' );
	echo '</aside>';
	}
	if (is_active_sidebar('post-before-footer-content') ) {
	echo '<div class="above-footer">';
	dynamic_sidebar( 'post-before-footer-content' );
	echo '</div>';
	} ?>
</div>
<?php get_footer(); ?>