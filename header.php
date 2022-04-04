    <?php

// =============================================================================
// VIEWS/RENEW/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Renew.
// =============================================================================

x_get_view( 'global', '_header' );
x_get_view( 'global', '_slider-above' );

// Variables
$site_url = preg_replace("(^https?://)", "", site_url() );
$header_type = get_field('vsoe_header_identity_format', 'option');
$header_single = get_field('vsoe_header_single_line', 'option');
$header_dept_1 = get_field('vsoe_header_department_name_1', 'option');
$header_dept_2 = get_field('vsoe_header_department_name_2', 'option');
$header_donor_1 = get_field('vsoe_header_donor_name', 'option');
$header_donor_2 = get_field('vsoe_header_donor_department_name', 'option');
$url = preg_replace('#^h+t+p+s+?://#i', '', get_site_url() );
$dept_name = substr(get_bloginfo( 'name' ), 14 );
$sec_nav = get_field('vsoe_add_secondary_navigation', 'option');
$search_type = get_field('vsoe_search', 'option');
$url = preg_replace('#^h+t+p+s+?://#i', '', get_site_url() );
$vsoe_site_search = get_field('vsoe_site_search_id', 'option');
?>

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
<ul class="vsoe-skip-link screen-reader-text">
    <li><a href="#menu-primary-navigation" class="screen-reader-shortcut">Skip to primary navigation</a></li>
    <li><a href="#main" class="screen-reader-shortcut">Skip to main content</a></li>
    <li><a href="#site-footer" class="screen-reader-shortcut">Skip to footer</a></li>
</ul>

<header class="masthead masthead-inline masthead-custom" role="banner">

    <div class="row logo"> <!-- this row displays the USC Viterbi logo and the USC logo with shield, with desktop/mobile styling via responsive CSS. Don't edit. -->

        <a href="http://viterbi.usc.edu/" target="_blank" class="header-logo" aria-label="USC Viterbi School of Engineering">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/USC-Viterbi.png" alt="USC Viterbi School of Engineering" >
        </a>

        <a href="http://www.usc.edu/" target="_blank" class="header-shield-desktop" aria-label="University of Southern California">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/USC-Shield.png" alt="University of Southern California">
        </a>

        <a href="http://www.usc.edu/" class="header-shield-mobile" aria-label="University of Southern California">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Small-Use-Shield_BlackOnTrans.png" alt="University of Southern California">
        </a>

    </div> <!-- /row logo -->

    <div class="row identity-nav"> <!-- this row displays the identity text, nav menus, and search box. Don't edit. -->

        <?php // Identity text is displayed according to the format selected in Site Settings.

            if ( $header_type == 'single' ) { printf('<div class="identity single"><a class="x-brand" href="/" aria-label="USC Viterbi School of Engineering '.$header_single.'">%s</a></div>',$header_single ); }

            if ( $header_type == 'department' ) { printf('<div class="identity double"><a class="x-brand" href="/" aria-label="USC Viterbi School of Engineering '.$header_dept_1 . ' ' . $header_dept_2 .'"><span style="font-size: 15.5px;">%s </span><br />%s</a></div>', $header_dept_1, $header_dept_2 ); }

            if ( $header_type == 'donor' ) { printf('<div class="identity double named"><span style="font-weight: bold; font-size: 22px;""><a class="x-brand" href="/"  aria-label="USC Viterbi School of Engineering '.$header_donor_1 . ' ' . $header_donor_2 .'"></span><span>%s </span><br /><span style="font-weight: normal; font-size: 15.5px; line-height: 1.4;">%s</span></a></div>', $header_donor_1, $header_donor_2 ); } 

        // /identity text ?>

        <div class="x-navbar-wrap"> <!-- Navigation and search box start here -->

            <div class="x-navbar"> <!-- Start navbars -->

                <div class="x-navbar-inner">

                    <div class="x-container max width">

                        <a href="#" class="x-btn-navbar collapsed" data-toggle="collapse" data-target=".x-nav-wrap.mobile"> <!-- Start mobile menu toggle stuff -->
                          <i class="x-icon-bars" data-x-icon="&#xf0c9;"></i> <!-- Hamburget -->
                          <span class="visually-hidden"><?php _e( 'Navigation', '__x__' ); ?></span>
                        </a> <!-- /mobile menu toggle stuff -->

                        <nav class="x-nav-wrap desktop" role="navigation"> <!-- Outer wrapper for desktop nav menus and search box -->

                                <?php if ($search_type == '0') : ?>

                                    <div class="gcse header"><!-- Wrapper for desktop Google CSE search box -->

                                        <gcse:searchbox-only></gcse:searchbox-only> 

                                   </div> <!-- /wrapper for desktop Google CSE search box --> 

                                <?php endif; ?> 

                                <?php if ($search_type == '1') : ?>

                                    <div class="wp header"> <!-- Wrapper for desktop Google CSE search box -->

                                        <?php get_search_form(); ?> 

                                    </div> <!-- /wrapper for desktop Google CSE search box --> 

                                <?php endif; ?> 

                               <?php wp_nav_menu( array( 'theme_location' => 'header-submenu', 'container' => false, 'menu_class' => 'x-nav sub-nav', 'link_before' => '<span>', 'link_after' => '</span>', 'style' => 'clear: none' ) ); ?> <!-- Secondary nav menu -->




                            <?php if (is_active_sidebar('sidebar-header-vsoe-widget')) { echo '<div id="vsoe-header-widget">'; dynamic_sidebar('sidebar-header-vsoe-widget'); echo '</div>';  } ?> <!-- Desktop social media widget if enabled in Site Settings -->


                            <?php wp_nav_menu( array( 'theme_location' => 'primary-navigation', 'container' => false, 'menu_class' => 'x-nav', 'menu_id' => 'menu-primary-navigation', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?> <!-- Primary nav menu -->


                        </nav> <!-- /outer wrapper for desktop nav menus and search box -->

                        <nav class="x-nav-wrap mobile collapse"> <!-- Outer wrapper for mobile nav menus and search box -->

                            <?php wp_nav_menu( array( 'theme_location' => 'primary-navigation', 'container' => false, 'menu_class' => 'x-nav', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?> <!-- Mobile primary nav -->

                            <?php wp_nav_menu( array( 'theme_location' => 'header-submenu', 'container' => false, 'menu_class' => 'x-nav sub-nav', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?> <!-- Mobile secondary nav -->

                            <?php if ($search_type == '0') : ?>

    							<div class="gcse header mobile"> <!-- Wrapper for desktop Google CSE search box -->

                                    <gcse:searchbox-only></gcse:searchbox-only> 

    	                        </div>  <!-- /wrapper for mobile Google CSE search box -->

                            <?php endif; ?> 

                            <?php if ($search_type == '1') : ?>

                                <div class="wp header mobile"> <!-- Wrapper for desktop Google CSE search box -->

                                    <?php get_search_form(); ?> 

                                </div>  <!-- /wrapper for mobile Google CSE search box -->

                            <?php endif; ?>

                            <?php if (is_active_sidebar('sidebar-header-vsoe-widget')) { echo '<div id="vsoe-header-widget">'; dynamic_sidebar('sidebar-header-vsoe-widget'); echo '</div>';  }?> <!-- Mobile social media widget if enabled in Site Settings -->

                        </nav><!-- /outer wrapper for mobile nav menus and search box -->

                    </div> <!-- /x-container max width -->

                </div> <!-- /x-navbar-inner -->

            </div> <!-- /navbars -->

        </div> <!-- /navigation and search box -->

    </div> <!-- /row identity-nav -->

</header>
<?php x_get_view( 'global', '_slider-below' ); ?>