<?php
/**
 * The template for displaying Author archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="x-container max width offset">

    <?php if ( x_get_option( 'x_breadcrumb_display' ) ) : x_breadcrumbs(); endif; ?>

    <div class="x-main full" id="main" role="main">

	    <div class="author-single">
	    	<?php
			$image = get_the_author_meta( 'vsoe_author_image' );
			$description = get_the_author_meta( 'description' );
	            $size = 'author-image';
	            if (!$image) { 
	            	echo '<div style="min-height: 100%;"><h5>There are no posts by this author.</h5></div>';
	            	echo '</div>';
	            } else {
	    	?>

	        <div class="left">



	            <?php if( $image ) { echo '<div class="author-image">' . wp_get_attachment_image( $image, $size ); } ?>

                    <!-- <span> -->

                    <h5><?php echo get_the_author_meta( 'display_name' ); ?></h5>


                    <p><?php echo get_the_author_meta( 'vsoe_author_department' ); ?><br />

                    <?php echo get_the_author_meta( 'vsoe_author_academic_status' ); ?></p></div>
                    <?php if($description) { ?>
                   <div id="author-description"><h5>About</h5>
                   <p><?php echo get_the_author_meta( 'description' ); ?></p>

                   </div>
	             <?php } ?>

			</div><!-- x-column x-md x-1-4 -->

            <div class="right">

				<?php

				/*
				 * Since we called the_post() above, we need to rewind
				 * the loop back to the beginning that way we can run
				 * the loop properly, in full.
				 */
				rewind_posts();

				global $query_string;

				query_posts( $query_string . '&posts_per_page=12' );

				while (have_posts()) : the_post(); ?>
				<div class="post-card">

		            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a><?php the_excerpt(); ?>

		        </div>

				<?php endwhile; ?>

				<p style="text-align: center;"><?php posts_nav_link( ' | ', '&laquo; Newer Posts', 'Older Posts &raquo;' ); ?></p>

				<?php //vsoe_back_button(); ?>

<!--  				<p style="text-align: center;"><a href="/viterbi-pulse"><button class="x-btn x-btn-mini" style="text-transform: uppercase;">&laquo; Back to Viterbi Pulse</button></a></p>
 -->				
	            </div><!-- x-column x-md x-3-4 -->

		</div><!-- author-single -->
	<?php }; ?>
	</div><!-- x-main full -->
</div><!-- x-container max width offset -->

<?php get_footer();