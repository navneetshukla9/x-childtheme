<?php

// =============================================================================
// VIEWS/GLOBAL/_CONTENT-404.PHP
// -----------------------------------------------------------------------------
// Output for the 404 page.
// =============================================================================

$search_type = get_field('vsoe_search', 'option'); ?>

<?php if ($search_type == '0') : ?>

    <script>
      (function() {
        var cx = '<?php echo $vsoe_site_search; ?>';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
      })();
    </script>

<?php endif; ?>

<style>table.gsc-search-box td.gsc-input {padding-right: 0; }#gs_id52 { margin-bottom: 0; } td.gsc-search-button {padding-left: 0; }</style>

<div class="x-container max width offset" style="max-width: 600px;">
    <div class="<?php x_main_content_class(); ?>" id="main" role="main">
		<p class="center-text"><?php _e( '<h2 class="entry-title">Page not found</h2>The page you are looking for does not exist. <a href="/">Return to the home page</a> or search the site using the form below.', '__x__' ); ?></p>

		<?php if ($search_type == '0') : ?>

		    <gcse:searchbox-only></gcse:searchbox-only> 

		<?php endif; ?>

		<?php if ($search_type == '1') : ?>

		    <?php get_search_form(); ?> 

		<?php endif; ?> 

	</div>

</div>