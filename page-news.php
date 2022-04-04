
<?php

// =============================================================================
// PAGE-REST-API.PHP
/* Template Name: News Archive */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's pages, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-page.php," where you'll be able to find the
// appropriate output.
// =============================================================================



get_header();  
$dept_name = substr(get_bloginfo( 'name' ), 14 ); 
$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );
$layout = get_field('vsoe_site_layout', 'option');
$bc = get_field('vsoe_enable_breadcrumbs', 'option');
$pb = get_field('vsoe_enable_postsblog', 'option');
$ss = get_field('vsoe_enable_social_media_sharing_widget', 'option');
$breadcrumbs = x_get_option( 'x_breadcrumb_display' ); ?>

<div class="x-container max width offset">
  <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="x-main full" id="main" role="main">
        <div class="x-section archive" style="padding: 30px 0 0;">
            <div class="x-container max">
                <div class="x-column x-sm x-2-3">
                    <h1 class="archive-page-title" ><span><h6 style="margin-bottom: 0; color: #555"><?php echo $dept_name; ?></h6></span> News</h1>
                </div>
                <div class="x-column x-sm x-1-3">
                    <?php include 'lib/base-functions/year-select-form.php'; ?>         
                </div>
            </div>
        </div>
        <div class="x-section loop-archive" style="padding: 0">
                <div class="x-container max">
                <?php // begin REST
                $query_cat = get_field('vsoe_news_department', 'option');
                if ($year) {
	                $before = $year+1;
	                $after = $year-1;
	                $year_filter = '&before='.$before.'-01-01T00:00:00&after='.$after.'-12-31T23:59:59';	                
	                // var_dump($year_filter); // debugging only
	          }
                $response = wp_remote_get( 'https://viterbischool.usc.edu/wp-json/wp/v2/news-api?news_category=' . $query_cat . $year_filter . '&per_page=100&orderby=date' );
                if( is_wp_error( $response ) ) {
                    echo '<p>There are no News entries to display.</p>';
                    return;
                }

                $posts = json_decode( wp_remote_retrieve_body( $response ) );

                if( empty( $posts ) ) {
                    echo '<p>There are no News entries to display.</p>';
                    return;
                }

                if( !empty( $posts ) ) {
                    foreach( $posts as $post ) {
                        $link = $post->link; 
                        $title = $post->title->rendered;
                        $excerpt = $post->excerpt->rendered;
                        $image = $post->featured_image_src;
                        $id = $post->id;
                        $content = $post->content->rendered;
                        $category = $post->news_category;
                        $date = $post->date;
                        $date_out = date('M d, Y', strtotime($date));
                        $alt = ' alt="' . $title . '"';
                        $link_title = 'Open this story on the main Viterbi School of Engineering site in a new tab or window';
                        echo '<div class="x-column x-sm x-1-4"><article class="hentry eh"><header class="entry-header"><a href="' . $link . '" target="_blank" title="'.$link_title.'"><p>Read More</p><img src="'.$image.'"'.$alt.'></header>' . '<div class="entry-content"><h3 class="entry-title">' . $title.'</h3></a><span class="meta-author">' . $date_out . '</span>' . $excerpt . '</div></article></div>';
                    }
                } // End REST ?>
            </div>
        </div>
    </div>        
</div>

<?php get_footer(); ?>
