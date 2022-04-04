<?php

// ===================================================================================================
// FUNCTIONS.PHP
// ---------------------------------------------------------------------------------------------------
// Overwrite or add your own custom functions to X-Theme in this file.
// ===================================================================================================
//
// ===================================================================================================
// TABLE OF CONTENTS
// ---------------------------------------------------------------------------------------------------
//   01. Global functions
//   02. Enque scripts and styles
//   03. Custom login
//   04. Custom widgets/sidebars
//   05. If posts disabled in Site Settings removes post functionality from site
//   06. If posts enabled activates custom widget for blog posts via a shortcode
//   07. If enabled in Site Settings, displays a right-hand sidebar on blog and archive pages
//   08. Displays "last modified" text after $content
//   09. Enables a secondary navigation menu that's not included in X-Theme
//   10. Disables extra miage sizes
//   11. Disabled commenting functionality site-wide
//   12. Customizes REST query for custom post types and custom meta data
//   13. Removes all standard WP dashboard widgets
//   14. Disables Portfolio CPT included with X-Theme
//   15. Adds CSS classes to <basename(path)ody> for greater CSS specificity. Adds .vsoe to
//       all posts/pages/archives. Also adds .cs-layout for Cornerstone layout chosen in Site
//       Options or .wp-layout for standard WordPress layout. Adds .single-[slug] or
//       .page-[slug] to posts and pages. Adds .breadcrumbs-on if X Customizer option is set
//       to display breadcrumbs.
//   16. Displays update alert in WP admin on Mondays
//   17. Gives editors admin rights to Redirection plugin
//   18. Enables 'Read More' links on automatic post excerpts
//   19. Adds sortable 'last modified' column in WP admin
//   20. 'vsoe_back_button()' function that can be called from post/page templates
//       to display a 'Back' button to navigate to referring URL
//   21. Customizes HTML markup of default X-Theme breadcrumbs for compatability
//       with Viterbi School child theme markup and styling
//   22. Displays 'Read More' link on manually created excerpts
//   23. Enables assigning 'sticky' attribute in post editor; if assigned, post
//       will always appear first in archive view
//   24. Enables execution of shortcodes in widgets
//   25. Modifies post meta to display only post date
//   26. Creates 3 user roles: Author Plus, Editor Plus, Former Staff/Student
//   27. Extend posts preview to 30 days
//   28. Checks for instance of Gravity Forms plugin. If enabled, prevents email
//       to admin account on new form creation, and allows optional display of
//       form labels.
//   29. Creates the "Site Settings" options page
//   30. Creates 'Courses' CPT with custom taxonomies and widget and template displays
//   31. Widget to query for events by specified department URL and display via Appearance > Widgets
//   32. Folder Sizes Dashboard Widget
//   33. Creates 'Tutorials' CPT with custom taxonomies and template displays
//   34. Creates 'Forum' CPT with custom taxonomies and template displays
//   35. Creates 'Question' CPT with custom taxonomies and template displays
// ---------------------------------------------------------------------------------------------------

// ===================================================================================================
//   01. Global functions
// ===================================================================================================

    global $vsoe_layout;
    global $vsoe_bc;
    global $vsoe_pb;
    global $vsoe_ss;
    global $vsoe_sec_nav;
    global $vsoe_search_type;
    global $vsoe_ai;
    global $vsoe_courses_cpt;
    global $vsoe_events_feed;
    global $vsoe_blog_sidebar;
    global $vsoe_last_updated;

    global $vsoe_facebook;
    global $vsoe_twitter;
    global $vsoe_instagram;
    global $vsoe_youtube;
    global $vsoe_vimeo;
    global $vsoe_google;
    global $vsoe_pinterest;
    global $vsoe_linkedin;

    $vsoe_layout = get_field('vsoe_site_layout', 'option');
    $vsoe_bc = get_field('vsoe_enable_breadcrumbs', 'option');
    $vsoe_pb = get_field('vsoe_enable_postsblog', 'option');
    $vsoe_comments = get_field('vsoe_enable_comments', 'option');
    $vsoe_comments = get_field('vsoe_enable_comments', 'option');
    $vsoe_tutorials_cpt = get_field('enable_tutorials_custom_post_type');
    $vsoe_ss = get_field('vsoe_enable_social_media_sharing_widget', 'option');
    $vsoe_sec_nav = get_field('vsoe_add_secondary_navigation', 'option');
    $vsoe_search_type = get_field('vsoe_search', 'option');
    $vsoe_ai = get_field('vsoe_enable_author_images', 'option');
    $vsoe_courses_cpt = get_field('vsoe_enable_courses_custom_post_type', 'option');
    $vsoe_tutorials_cpt = get_field('enable_tutorials_custom_post_type', 'option');
    $vsoe_questions_cpt = get_field('enable_questions_custom_post_type', 'option');
    $vsoe_forum_cpt = get_field('enable_forum_custom_post_type', 'option');
    $vsoe_events_feed = get_field('vsoe_enable_events_feed', 'option');
    $vsoe_blog_sidebar = get_field('vsoe_sidebar_on_blog_landing_page', 'option');

    $vsoe_facebook = get_field('vsoe_footer_social_facebook', 'option');
    $vsoe_twitter = get_field('vsoe_footer_social_twitter', 'option');
    $vsoe_instagram = get_field('vsoe_footer_social_instagram', 'option');
    $vsoe_youtube = get_field('vsoe_footer_social_youtube', 'option');
    $vsoe_vimeo = get_field('vsoe_footer_social_vimeo', 'option');
    $vsoe_google = get_field('vsoe_footer_social_google', 'option');
    $vsoe_pinterest = get_field('vsoe_footer_social_pinterest', 'option');
    $vsoe_linkedin = get_field('vsoe_footer_social_linkedin', 'option');
    $vsoe_last_updated = get_field('vsoe_display_last_updated_text', 'option');

// =================================================================================================
//   02. Enque scripts and styles
// =================================================================================================

    require_once( __DIR__ . '/lib/base-functions/scripts-styles.php');

// =================================================================================================
//   03. Custom login
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/custom-login.php');

// =================================================================================================
//   04. Custom widgets/sidebars
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/custom-widgets.php');

// =================================================================================================
//   05. If posts disabled in Site Settings removes post functionality from site
// =================================================================================================
    
    if ($vsoe_pb == '0') {
      require_once( __DIR__ . '/lib/base-functions/disable-posts.php');
    }
    
// =================================================================================================
//   06. If posts enabled activates custom widget for blog posts via a shortcode
// =================================================================================================

    if ($vsoe_pb == '1') {
        require_once( __DIR__ . '/lib/extended-functions/vsoe-blog-feed/vsoe-blog-feed.php');
    }

// =================================================================================================
//   07. If enabled in Site Settings, displays a right-hand sidebar on blog and archive pages
// =================================================================================================
    
    if ($vsoe_blog_sidebar == '1') {
      require_once( __DIR__ . '/lib/base-functions/blog-sidebar.php');
    }
    
// =================================================================================================
//   08. Displays "last modified" text after $content
// =================================================================================================
    
    if ($vsoe_last_updated == '1') {
        require_once( __DIR__ . '/lib/base-functions/display_last_modified.php');
    }

// =================================================================================================
//   09. Enables secondary navigation menu that's not included in X-Theme
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/register-nav-menus.php');

// =================================================================================================
//   10. Disables extra miage sizes
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/remove-extra-image-sizes.php');

// =================================================================================================
//   11. Disabled commenting functionality site-wide
// =================================================================================================
    
    if ($vsoe_comments == '0' ) {
        require_once( __DIR__ . '/lib/base-functions/disable-comments.php');
    }

// =================================================================================================
//   12. Customizes REST query for custom post types and custom meta data
// =================================================================================================

    require_once( __DIR__ . '/lib/base-functions/rest-query-vars.php');

// =================================================================================================
//   13. Removes all standard WP dashboard widgets
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/remove-dashboard-widgets.php');

// =================================================================================================
//   14. Disables Portfolio CPT included with X-Theme
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/remove-portfolio-cpt.php');

// =================================================================================================
//   15. Adds CSS classes to <basename(path)ody> for greater CSS specificity. Adds .vsoe to
//       all posts/pages/archives. Also adds .cs-layout for Cornerstone layout chosen in Site
//       Options or .wp-layout for standard WordPress layout. Adds .single-[slug] or
//       .page-[slug] to posts and pages. Adds .breadcrumbs-on if X Customizer option is set
//       to display breadcrumbs.
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/add-body-class.php');

// =================================================================================================
//   16. Displays update alert in WP admin on Mondays
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/admin-notice.php');

    
// =================================================================================================
//   17. Gives editors admin rights to Redirection plugin
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/redirection-role.php');

// =================================================================================================
//   18. Enables 'Read More' links on automatic post excerpts
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/excerpt-more.php');

// =================================================================================================
//   19. Adds sortable 'last modified' column in WP admin
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/admin-columns.php');

// =================================================================================================
//   20. 'vsoe_back_button()' function that can be called from post/page templates
//       to display a 'Back' button to navigate to referring URL
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/back-button.php');
    
// =================================================================================================
//   21. Customizes HTML markup of default X-Theme breadcrumbs for compatability
//       with Viterbi School child theme markup and styling
// =================================================================================================

    require_once( __DIR__ . '/lib/base-functions/x-breadcrumbs.php');

// =================================================================================================
//   22. Displays 'Read More' link on manually created excerpts
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/manual-excerpt-more.php');

// =================================================================================================
//   23. Enables assigning 'sticky' attribute in post editor; if assigned, post
//       will always appear first in archive view
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/sticky-archive-class.php');

// =================================================================================================
//   24. Enables execution of shortcodes in widgets
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/shortcode-in-widget.php');

// =================================================================================================
//   25. Modifies post meta to display only post date
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/custom-post-meta.php');
    
// =================================================================================================
//   26. Creates 3 user roles: Author Plus, Editor Plus, Former Staff/Student
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/user-roles.php');

// =================================================================================================
//   27. Extend posts preview to 30 days
// =================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/posts-preview.php');

// =================================================================================================
//   28. Checks for instance of Gravity Forms plugin. If enabled, prevents email
//       to admin account on new form creation, and allows optional display of
//       form labels.
// =================================================================================================
    
    if ( class_exists( 'GFCommon' ) ) {
        require_once( __DIR__ . '/lib/base-functions/disable-gforms-notification.php');
    }
	
// =================================================================================================
//   29. Creates the "Site Settings" options page
// =================================================================================================
    
    require_once( __DIR__ . '/lib/extended-functions/vsoe-site-settings/vsoe-site-options.php');

// =================================================================================================
//   30. Creates 'Courses' CPT with custom taxonomies and widget and template displays
// =================================================================================================
    
    if ($vsoe_courses_cpt == '1') {
        require_once( __DIR__ . '/lib/extended-functions/vsoe-courses-cpt/vsoe-courses-cpt.php');
    }

// ===================================================================================================
//   31. Widget to query for events by specified department URL and display via Appearance > Widgets
// ===================================================================================================
    
    require_once( __DIR__ . '/lib/extended-functions/vsoe-events-widget/vsoe-events-widget.php');

// ===================================================================================================
//   32. Folder Sizes Dashboard Widget
// ===================================================================================================
    
    require_once( __DIR__ . '/lib/base-functions/folder-sizes-dashboard-widget.php');
    
// ===================================================================================================
//   33. Creates 'Tutorials' CPT with custom taxonomies and template displays
// ===================================================================================================
    
    if ($vsoe_tutorials_cpt == '1') {
        require_once( __DIR__ . '/lib/extended-functions/tutorial-cpt/tutorial-cpt.php');
    }

// =================================================================================================
//   34. Creates 'Forum' CPT with custom taxonomies and template displays
// =================================================================================================
    
    if ($vsoe_forum_cpt == '1') {
        require_once( __DIR__ . '/lib/extended-functions/forum-cpt/forum-cpt.php');
    }
    
// =================================================================================================
//   35. Creates 'Question' CPT with custom taxonomies and template displays
// =================================================================================================

    if($vsoe_questions_cpt == '1') {
      require_once( __DIR__ . '/lib/extended-functions/vsoe-question-cpt/vsoe-question-cpt.php');
    }
