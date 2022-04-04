
<?php

// =============================================================================
// PAGE-EVENT.PHP
/* Template Name: Single Author Page */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
// =============================================================================

/* URLs
https://viterbi.usc.edu/rss/vsoe_calendar_masters.json.txt
https://viterbi.usc.edu/rss/vsoe_calendar_docprof.json.txt
https://viterbi.usc.edu/rss/vsoe_calendar_gapp.json.txt

*/

get_header(); ?>

<div class="x-container max width offset">
    <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
    <div class="x-main full" id="main" role="main">
    <div class="author-single">
        <div class="x-column x-md x-1-4">

            <?php $user_query = new WP_User_Query( array( 'role' => 'author', 'hide_empty' => false, 'fields' => 'all' ) );

            // User Loop
            if ( ! empty( $user_query->results ) ) {

                foreach ( $user_query->results as $user ) {

                    if ($user->user_nicename == 'anureet') {
                    //var_dump($user);

                        $image = $user->vsoe_author_image;

                        $size = 'author-image';  ?>


                        <?php if( $image ) { echo '<div class="author-image">' . wp_get_attachment_image( $image, $size ) . '</div>'; } ?>


                        <span>

                        <h5><?php echo $user->display_name; ?></h5>


                        <p><?php echo $user->vsoe_author_department; ?><br />

                        <?php echo $user->vsoe_author_academic_status; ?></p>

                       <strong><span style="font-size: 24px;">About</span></strong><br />
                        <?php echo nl2br($user->description); ?>
                        </span>

                    <?php } 
                }

                } else {

                echo 'No users found.';
                } ?>
            </div>
            <div class="x-column x-md x-3-4">
            <h4 class="widgettitle">Posts</h4>
            <ul>
            <?php global $post;
            $image = $author_name->vsoe_author_image;

            $size = 'author-image'; 

            $author_name = 'anureet';
            $user = $author_name;
            $args = array( 'posts_per_page' => -1, 'post_type'=> 'post', 'author_name' => $author_name );
            $myposts = get_posts( $args );
            if( $image ) { echo '<div class="author-image">' . wp_get_attachment_image( $image, $size ) . '</div>'; }
            echo $user->display_name;

            foreach( $myposts as $post ) : setup_postdata($post); ?>

            <li><a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a><p><?php the_excerpt(); ?></p></li>

            <?php endforeach; wp_reset_postdata(); ?>

            </ul>

            </div>

        </div>
    </div>
</div>
</div>


<?php get_footer(); ?>