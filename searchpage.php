<?php
/*
* Template Name: Search Page Template
*/
get_header(); 

$url = preg_replace('#^h+t+p+s+?://#i', '', get_site_url() );
$dept_name = substr(get_bloginfo( 'name' ), 14 ); 
$vsoe_site_search = get_field('vsoe_site_search_id', 'option');
$vsoe_viterbi_search = get_field('vsoe_viterbi_search_id', 'option');
$vsoe_usc_search = get_field('vsoe_usc_search_id', 'option');
$search_type = (get_field('vsoe_search', 'option')); 
?>

<?php if ($search_type == '0' ) : ?>

<script>
    // This script differs from the one in the site header in that it gets the cx value from the form below rather than from Site Settings
    (function() {
        var cx = '<?php echo "{$_GET['siteSearch']}"; ?>'; // get value from form below
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();
</script>



<div class="x-container max width offset">


    <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>

    <div class="x-main full" id="main" role="main" id="main" style="padding-top: 3%; padding-bottom: 3%;">

        <div class="search-header">

            <div class="searchFilter">

                <h5>New Search</h5>

                <p style="margin-bottom: .5em;">You can search this site only, all Viterbi School of Engineering sites, or all USC sites by entering a new search term and making a selection below.</p>

                <form name="SiteSelectSearch" method="get" action=""> <!-- Depending on radio button selection, sets value of siteSearch to ID of site, Viterbi, or USC CSE for script -->

                    <span class="fields"><input onchange="submit()" name="siteSearch" type="radio" checked value="<?php echo $vsoe_site_search; ?>" <?php if($_GET['siteSearch']==$vsoe_site_search) echo "checked=checked"; ?> > <span><?php echo $dept_name; ?></span></span>

                     <span class="fields"><input onchange="submit()" name="siteSearch" type="radio" value="<?php echo $vsoe_viterbi_search; ?>" <?php if($_GET['siteSearch']==$vsoe_viterbi_search) echo "checked=checked"; ?> > <span>Viterbi School Sites</span></span>

                    <span class="fields"> <input onchange="submit()" name="siteSearch" type="radio" value="<?php echo $vsoe_usc_search; ?>" <?php if($_GET['siteSearch']==$vsoe_usc_search) echo "checked=checked"; ?> > <span>All USC Sites</span></span>

                </form>

            </div> <!-- /searchFilter --> 

            <!-- <div class="gcse page"> -->
            <div class="gcse page" id="google-search-form">

                <gcse:searchbox></gcse:searchbox>

            </div>  <!-- /gcse page -->

        </div> <!-- /search-header -->  

        <div id="searchResults">

            <h4>Search Results</h4>

            <gcse:searchresults></gcse:searchresults>

        </div> <!-- /searchResults -->

    </div> <!-- /x-main full -->

</div> <!-- x-container max width offset -->

<?php endif; ?>

<?php if ($search_type == '1' ) : ?>

<?php

global $query_string;

$search_query = wp_parse_str( $query_string );
$search = new WP_Query( $search_query );
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<div class="x-container max width offset">

    <?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>

    <div class="x-main full" id="main" role="main">

        <div class="search-container">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">

                <span class="search-page-title"><?php printf( esc_html__( 'There are %s search results for %s', vsoe ), '<span>' . $total_results, '<strong>' .get_search_query() . '</strong>' . '</span>' ); ?></span>

                </header><!-- .page-header -->

                <div class="search-results-body">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <span class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br />

                    <?php endwhile; ?>

                </div>

                <div class="navigation">

                    <p><?php posts_nav_link('&ensp;|&ensp;','&laquo; Previous','Next &raquo;'); ?></p>

                </div>

            <?php else : ?>

                <div class="no-search-results">

                    <h4>No results found</h4>

                    <p>There is no content matching your search term <strong><?php echo get_search_query(); ?></strong>. Try a new search?</p>

                    <div class="search-page-form" id="ss-search-page-form"><?php get_search_form(); ?></div>

                </div> <!-- .no-results -->

            <?php endif; ?> <!-- if have posts -->

        </div> <!-- .search-container -->

    </div> <!-- .x-main -->

</div> <!-- ."x-container -->


<?php endif; ?>

<?php get_footer(); ?>