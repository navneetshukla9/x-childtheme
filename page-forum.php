
<?php

// =============================================================================
// PAGE-FORUM.PHP
/* Template Name: Forums Archive */
// -----------------------------------------------------------------------------

get_header();  
$dept_name = substr(get_bloginfo( 'name' ), 14 ); 
$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );
$layout = get_field('vsoe_site_layout', 'option');
$bc = get_field('vsoe_enable_breadcrumbs', 'option');
$pb = get_field('vsoe_enable_postsblog', 'option');
$ss = get_field('vsoe_enable_social_media_sharing_widget', 'option');
$breadcrumbs = x_get_option( 'x_breadcrumb_display' ); 

?>

<div class="x-container max width offset">
  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="x-main full" id="main" role="main">
        <div class="x-section archive" style="padding: 30px 0 0;">
            <div class="x-container max">
                <div class="x-column x-sm x-1-1">
                    <h1 class="archive-page-title" ><span><h6 style="margin-bottom: 0; color: #555">VSOE Web Team</h6></span> Open Forums</h1>
                </div>
            </div>
        </div>
        <div class="x-section loop-archive" style="padding: 0">
            <div class="x-container max">

                <?php 

                $args = array(
                    'post_type'=>'forum',
                    'posts_per_page' => 24,
                    'paged' => $paged,
                    'meta_key' => 'vsoe_forum_video_display_order',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                ); 

                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="x-column x-sm x-1-4">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <a href="<?php the_permalink(); ?>" title="View story">
                                    <p>Read More</p>
                                <?php the_post_thumbnail('full'); ?>
                                </a>
                            </header>
                            <div class="entry-content eh">
                                <a href="<?php the_permalink(); ?>" title="View story">
                                <h5><?php esc_html( the_title() ); ?></a> <span class="runtime">(<?php echo get_field('vsoe_forum_video_run_time'); ?>)</span></h5>
                               <?php the_excerpt(); ?>                      
                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->
                    </div>
                    <?php endwhile; ?>
                    <div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
                    <div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>
                    <?php wp_reset_postdata(); ?>
                </div>      
                <?php } ?>
            </div>
        </div>
    </div>        
</div>

<?php get_footer(); ?>
