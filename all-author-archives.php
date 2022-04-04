<?php
/**
 * Template Name: All Author Archives
 * Code: Scott Bressler (http://www.scottbressler.com/blog)
 * Explanation: http://www.scottbressler.com/blog/2011/03/wordpress-archive-page-with-all-authors-and-all-posts
 */
get_header();
$breadcrumbs = x_get_option( 'x_breadcrumb_display' );?>

<div class="x-container max width offset">

    <?php if ( x_get_option( 'x_breadcrumb_display' ) ) : x_breadcrumbs(); endif; ?>

    <div class="x-main full" id="main" role="main">

        <div class="x-container author-landing">

            <div id="cs-content" class="cs-content" style="margin-bottom: 30px;">
                <div id="x-section-1"  class="x-section cs-ta-center bg-image"  style="margin: 0px;padding: 50px 0px; background-image: url(/wp-content/uploads/2017/08/blog-header_AP.jpg); background-color: transparent;"   data-x-element="section" data-x-params="{&quot;type&quot;:&quot;image&quot;,&quot;parallax&quot;:false}">
                    <div  class="x-container max width"  style="margin: 0px auto;padding: 0px;"   >
                        <div  class="x-column x-sm x-1-1" style="padding: 0px;" >
                            <h2 class="h-custom-headline cs-ta-center h2 accent" style="color: hsl(0, 100%, 30%);">
                            <span>VITERBI PULSE<br /> USC Graduate Student Blog</span></h2>
                        </div> <!-- x-column x-sm x-1-1 -->
                    </div> <!--x-container max width -->
                </div> <!-- x-section-1 -->
            </div><!-- cs-content -->
			<?php
			// Arguments to pass to get_users
			$args = array( 'role' => 'author', 'hide_empty' => true, 'fields' => 'all', 'paged' => $paged, 'posts_per_page' => 12 );
			// Query for the users
			$authors = get_users( $args ); ?>

			<div id="authors-listing" class="author-landing">

				<?php
				// Loop through all the users, printing all of their posts as we go
				foreach ( $authors as $author ) { ?>
					<a name="<?php echo $author->user_nicename; ?>"></a>

					<?php //echo get_the_author_meta( 'vsoe_author_inactive' ); ?>
					<div class="x-column x-sm x-1-3" id="author-<?php echo $author->ID; ?>-posts-wrapper">
						<a href="<?php echo get_author_posts_url( $author->ID ); ?>">
						<?php $image = $author->vsoe_author_image;
						$size = 'author-image';
						if( $image ) { echo '<div class="author-image">' . wp_get_attachment_image( $image, $size ) . '</div>'; } ?>
						<div class="author-posts" id="author-<?php echo $author->ID; ?>-posts">
							<h5><?php echo $author->display_name; ?></a></h5>
							<p><?php echo $author->vsoe_author_department; ?><br />
							<?php echo $author->vsoe_author_academic_status; ?></p>

						</div><!-- #author-posts -->
					</div><!-- x-column x-sm x-1-3 #author-posts-wrapper -->
				<?php } // End looping over all users ?>
			</div>
		</div><!-- x-container author-landing -->
		<p style="text-align: right;""><a href="/viterbi-pulse/archive/"  style="text-align: right;">See the alumni blogs &raquo;</a></p>
	</div><!-- x-main -->
</div><!-- #container -->
<?php get_footer();
?>
