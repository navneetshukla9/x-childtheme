<?php
/**
 * Template Name: All Alumni Authors Archives
 * Code: Scott Bressler (http://www.scottbressler.com/blog)
 * Explanation: http://www.scottbressler.com/blog/2011/03/wordpress-archive-page-with-all-authors-and-all-posts
 */
get_header();
$breadcrumbs = x_get_option( 'x_breadcrumb_display' );?>

<div class="x-container max width offset">
    <?php if ( x_get_option( 'x_breadcrumb_display' ) ) : x_breadcrumbs(); endif; ?>
    <div class="x-main full" role="main">
        <div class="x-container author-landing">
            <div id="cs-content" class="cs-content" style="margin-bottom: 30px; width: 100%;">
                <div id="x-section-1"  class="x-section"  style="margin: 0px; background-image: url(/wp-content/uploads/2017/08/blog-header_AP.jpg); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 0; background-color: transparent;">
                    <div  class="x-container max width"  style="margin: 0px auto;padding: 0px;"   >
                        <div  class="x-column x-sm x-1-1" style="padding: 0px;" >
                            <h2 class="h-custom-headline cs-ta-center h2 accent" style="color: hsl(0, 100%, 30%); margin-bottom: 0; padding: 3vw 0;">
                            <span>VITERBI PULSE<br /> USC Graduate Student Blog</span></h2>
                        </div> <!-- x-column x-sm x-1-1 -->
                    </div> <!--x-container max width -->
                </div> <!-- x-section-1 -->
            </div><!-- cs-content -->
		<?php
		// Arguments to pass to get_users
		$args = array( 'meta_key' => 'vsoe_pulse_blog', 'meta_value' => 2, 'paged' => $paged, 'posts_per_page' => 6 );
		// Query for the users
		$users = get_users( $args ); ?>
			<div id="authors-listing" class="author-landing">
				<?php
				// Loop through all the users, printing all of their posts as we go
				foreach ( $users as $user ) { ?>
					<a name="<?php echo $user->user_nicename; ?>"></a>
					<div class="author" id="author-<?php echo $user->ID; ?>-posts-wrapper">
						<a href="<?php echo get_author_posts_url( $user->ID ); ?>">
						<?php $image = $user->vsoe_author_image;
						$size = 'author-image';
						if( $image ) { echo '<div class="author-image">' . wp_get_attachment_image( $image, $size ) . '</div>'; } ?>
						<div class="author-posts" id="author-<?php echo $author->ID; ?>-posts">
							<h5><?php echo $user->display_name; ?></a></h5>
							<p><?php echo $user->vsoe_author_department; ?><br />
							<?php echo $user->vsoe_author_academic_status; ?></p>

						</div><!-- #author-posts -->
					</div><!-- #author-posts-wrapper -->
				<?php } // End looping over all users ?>
			</div>
		</div><!-- #all-authors-archive -->
		<p style="text-align: right;"><a href="/viterbi-pulse/">See the current student blogs &raquo;</a></p>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer();
?>
