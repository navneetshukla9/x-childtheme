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
global $post;
global $wp;

$post_id = $post->ID;
$author_id = $post->post_author;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
?>

<?php get_header(); ?>
  
<div class="single-question-container">
    <div class="x-container max width offset">
        <div class="<?php x_main_content_class(); ?>" id="main" role="main" class="single-question-content">
            <a href="<?php echo home_url() . '/the-viterbi-exchange'; ?>" class="single-question-back">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.59994 12.9999L9.53327 6.06659M2.59994 12.9999L9.53327 19.9333M2.59994 12.9999H24.2666" stroke="black" stroke-width="2"/>
                </svg>
                <span>Back to The Viterbi Exchange Page</span>
            </a>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php
                    $terms = get_the_terms($post_id, 'question_category');
                    if($terms != null) {
                        $output = array();
                        $output_slug = array();
                        foreach($terms as $term) {
                            $output[] = $term->name;
                            $output_slug[] = $term->slug;
                            unset($term);
                        }
                    }
                ?>
                <article id="post-<?php the_ID(); ?>" class="single-question-article">
                    <div class="single-question-upper">
                        <div class="single-question-detail">
                            <?php echo get_avatar( $post_id , 32 )?>
                            <span class="name">
                                <?php echo the_author_meta( 'first_name', $author_id ) . ' ' . the_author_meta( 'last_name', $author_id ); ?>
                            </span>
                            <span class="separator"></span>
                            <span class="time"><?php echo get_the_time('F j, Y'); ?></span>
                        </div>
                        <div class="single-question-right">
                            <?php foreach($output as $output_item): ?>
                                <span class="tag"><?php echo $output_item; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <header class="entry-header">
                        <h1 class="entry-title" ><?php esc_html( the_title() ); ?><span class="runtime"><?php echo $runtime; ?></span></h1>
                    </header>
                    <div class="content entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <aside class="x-sidebar right single-question-sidebar" role="complementary">
            <h2>Next Questions</h2>
            <div class="single-question-sidebar-list">
                <?php 
                    $args = array( 'posts_per_page' => 3, 'post__not_in' => array($post_id), 'post_type' => 'question', 'order' => 'ASC');
                    $myposts = get_posts( $args ); 
                    
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                    $terms = get_the_terms(get_the_ID(), 'question_category');
                    $author_id = get_the_author_meta( 'ID' );
                    if($terms != null) {
                        $output = array();
                        $output_slug = array();
                        foreach($terms as $term) {
                            $output[] = $term->name;
                            $output_slug[] = $term->slug;
                            unset($term);
                        }
                    }
                ?>
                <div class="single-question-sidebar-item">
                    <article class="viterbi-question-card">
                        <a href="<?php echo the_permalink(); ?>" class="viterbi-question-link">
                            <div class="viterbi-question-upper">
                                <?php foreach($output as $output_item): ?>
                                    <span class="viterbi-question-tag"><?php echo $output_item; ?></span>
                                <?php endforeach; ?>
                                <h2 class="viterbi-question-title"><?php echo the_title(); ?></h2>
                            </div>
                        </a>
                    </article>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </aside>
    </div>
</div>

<?php get_footer(); ?>