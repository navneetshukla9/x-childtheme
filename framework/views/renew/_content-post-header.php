<?php

// =============================================================================
// VIEWS/RENEW/_CONTENT-POST-HEADER.PHP
// -----------------------------------------------------------------------------
// Standard <header> output for various posts.
// =============================================================================

$featured = get_field( 'vsoe_display_featured_image', 'option' ); ?>

<header class="entry-header">

	<?php if ( ( is_front_page() || is_home() ) || is_archive() ) {

		if ( (is_plugin_active('vsoe-author-post-thumbnails/vsoe-author-post-thumbnails.php') ) && ( get_field('vsoe_upload_author_image') !='' )  ) { ?>
				<div class="wrap author-img">
					<a href="<?php the_permalink();?>">
					<img class="author-img" src="<?php echo get_field('vsoe_upload_author_image'); ?>" />
					<h2 class="entry-title no-icon" style="margin-bottom: 5px;"><?php the_title();?></h2></a>
				</div>
					<?php x_renew_entry_meta(); ?>
		<?php }

		if ( ( get_field('vsoe_upload_author_image') == ''  ) ) { ?>

				<div class="wrap">

					<a href="<?php the_permalink();?>">

						<h2 class="entry-title" style="margin-bottom: 5px;"><?php the_title();?></h2>

					</a>

					<?php x_renew_entry_meta(); ?>

					<?php if ( has_post_thumbnail() && $featured != '1' ) : ?>

						<a href="<?php the_permalink();?>">

							<div class="entry-featured">

								<?php x_featured_image(); ?>

							</div>

						</a>

					<?php endif; ?>

				</div>
		<?php }

	  // Default homepage

	} elseif ( is_front_page() ) {

	  // static homepage

	} elseif ( is_home() ) {

	  // blog page

	} else { ?>

		<h1 class="entry-title"><?php the_title();?></h1>

		<?php x_renew_entry_meta(); ?>
		
		<?php if (has_post_thumbnail()  && $featured != '2' ) { ?>

			<div class="entry-featured">

				<?php the_post_thumbnail('large'); ?>
			</div>

		<?php } ?>

	  <?php //everything else
	} ?>

</header>