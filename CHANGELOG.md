**Viterbi Sub-site Theme Change Log**

**5.0 - January 21, 2022**
* TH - Theme cleanup as documented here: https://uscedu.sharepoint.com/:w:/s/viterbi-it/ER5cQSVy_2xOpOmAPWOL-mQBJ023CXf1sHyuS3fsNPRJQA?e=J4XJfi

**4.3.8 - November 10, 2021**
* EH - Converted (/css/site-header.css) to (/stylesheets/partials/_site-header.scss) and merged SASS file to (/stylesheets/site.scss)
* EH - Removed (/css/site-header.css) and (/css/site-header.css.map)
* EH - Renamed theme to Viterbi Sub-site Theme from viterbischool to avoid confusion. Rewrote main (style.css) header to WP standardization.

**4.3.7 - November 8, 2021**
* Updated "Last Modified" text to include "Published on" date (lib/base-functions/display_last_modified.php) (assets/stylesheets/partials/_customizations.scss:158)

**4.3.6 - November 2, 2021**
* EH - Updated ACF json file for new Areas of Affiliation: CHEMs field's `Harnessing Data Science` to `Harnessing Data Science and Machine Learning` (/acf-json/group_5aa94aa3b8985.json)
* EH - Updated ACF json file for new Areas of Affiliation: CHEMs field's `Harnessing Data Science` to `Harnessing Data Science and Machine Learning` (/acf-json/group_5ce808c8d8992.json)

**4.3.5 - October 19, 2021**
* EH - Updated ACF json file for new Areas of Affiliation: CHEMs field's `Developing Advanced Manufacturing Methods and Materials` to `Developing Advanced Materials and Manufacturing Methods` (/acf-json/group_5aa94aa3b8985.json)
* EH - Updated ACF json file for new Areas of Affiliation: CHEMs field's `Developing Advanced Manufacturing Methods and Materials` to `Developing Advanced Materials and Manufacturing Methods` (/acf-json/group_5ce808c8d8992.json)

**4.3.4 - October 14, 2021**
* EH - Updated ACF json file for new Areas of Affiliation: CHEMs field and modified Research Center field (/acf-json/group_5aa94aa3b8985.json)
* EH - Updated ACF json file for new Areas of Affiliation: CHEMs field and modified Research Center field (/acf-json/group_5ce808c8d8992.json)

**4.3.3 - September 2021**
* EH - FIXED: Transition issue with last child in the top navigation. (\lib\extended-functions\vsoe-site-settings\functions\header-style.php)
* EH - FIXED: Fixed onclick issue with menu item with nested sub-menus. (\assets\js\vsoe.js)

**4.3.2**
* FIXED: Removed Portfolio CPT in /lib/base-functions/remove-portfolio-cpt.php that stopped working.
* UPDATE: Updated admin notice to change our software update hours from 8:00am to 10:00am to 9:00am to 11:00am.

**4.3.1.2**

**July 2021**
* UPDATE: Commented out conflicting CSS in the lib > Extended Functions > VSOE Site Settings > Functions > header-style.php file.

**4.3.1.1**

**July 2021**
* EH - UPDATE: Commented out JS function in vsoe.js that was opening outside links in a new tab. This is no longer supported by Chrome as of v88.
* EH - UPDATE: Uncommented JS in vsoe.js that was changed in previous update.

**4.3.1**

**July 2021**
* UPDATE: Removed the ordering function Miles created for the Video Tutorials CPT.
* UPDATE: Removed browser warning Javascript in vsoe.js.
* FIXED: Commented out Javascript in vsoe.js that was causing custom links to open pop ups.

**4.2.9**

**April 2021**
* NEW: Added function to remove 1536x1536 and 2048x2048 images sizes that were added to WP 5.3.0

**4.2.8**

**April 2021**
* NEW: Created CSS to hide various bullets throughout the site

**4.2.7**
* FIXED: Added custom Javascript to vsoe.js to fix primary links clicking issues.
* FIXED: Added custom CSS to site.css to fix the x-megamenu's child element style issues.

**4.2.5**
* FIXED: Added custom Javascript fix to resolve primary links clickthrough issues
* FIXED: Added custom CSS to site.css to add cursor: pointer to primary links
* FIXED: Added new page-faculty-directory.php file created by Dana to fix missing administration filter
* NEW: Additional CSS fixes for The Viterbi Exchange page 

**4.2.4**
* NEW: Created a page template for the Viterbi Exchange Page. Named the page template file to page-imagine.php.
* NEW: Created a php file for Question Detail page. Named the newly added single php file to single-question.php. 
* NEW: Created CSS file for both Viterbi Exchange Page template and Question Detail page. Added viterbi-exchange.css and single-question.css in /assets/css.
* NEW: Created a JS file for both Viterbi Exchange Page template and Question Detail page. Added the imagine.js in /assets/js.
* NEW: Added a JS Library for the filter feature. We are using Isotope. A JS Library that will help us create a cool filter feature. Created a lib file under assets folder. Added the minified Isotope js file in /assets/lib.
* NEW: Created a CPT for Question Posts. Registered the Question Post Type in /lib/extended-functions/vsoe-question-cpt and imported this directory in functions.php line 168-169.
* UPDATE: Enqueue viterbi-exchange.css, single-question.css and imagine.js in /lib/base-functions/scripts-styles.php line 41-51. Also, created an if-condition statement that these enqueque scripts and styles are being called only for the page-imagine.php page template.
* UPDATE: Add CSS fixes from Theme Options to /assets/css/site.css for the hover issue. Line 2976 - 3015

**4.2.2**

**November 2020**

* NEW: ACF Pro meta fields added to Tutorial and Forum editor screens for display order
* NEW: Custom ‘orderly’ query arg to use display order in archive loop
* NEW: Breadcrumbs for Tutorial and Forum CPT added to /lib/base-functions/x-breadcrumbs.php

**4.2.1**

**November 2020**

* NEW: ‘Forum’ CPT activation added to Site Settings
* NEW: ACF Pro meta fields added to Forum editor screen for video run time and embed code
* NEW: Single and archive views for ‘Forum’ CPT

**4.2.0**

**November 2020**

* NEW: ‘Tutorial’ CPT activation added to Site Settings
* NEW: ACF Pro meta fields added to Tutorial editor screen for video run time and embed code
* NEW: Single and archive views for ‘Tutorial’ CPT

**4.1.5**

**September 2020**

* NEW: Added option to Site Settings to toggle sidebar on single blog posts
* NEW: Added conditional logic to single.php template for optional sidebar display
* NEW: Added radio buttons to Site Settings to enable comments if posts are enabled
* NEW: Added conditional comments template display to wp-single.php

**4.1.4**

**June 2020**

* NEW: Script added to functions.php to display ‘last updated’ date after $content output
* NEW: CSS for 'last updated' text added to _customizations.scss
* NEW: CSS to suppress #main .x-accordion-inner>ul>li::before added to _customizations.scss

**4.1.3**

**June 2020**

* NEW: Line 148 in _customizations.scss partial to style Gravity Forms labels
* NEW: Consolidated Customizer and stylesheet CSS for calendar icon for Courses
* NEW: Lines 107-108 in _search-page.scss to fix position of Google background image in search page search box
* NEW: Line 428 in _search-page.scss to fix position of Google background image in site header search box

**4.1.2**

**June 2020**

* NEW: Line 130 in _customizations.scss setting font weight of tab headers to bold
NEW: /lib/advanced-functions/vsoe-site-settings/header-style.php line 253 change font weight of top-level main nav items to bold

**4.1.1**

**June 2020**

* NEW: .x-ul-icons li::before { display: none !important; } added to _customizations.scss

**4.1.0**

**May 2020**

* NEW: custom user profile field with radio buttons to select display on users archives e.g. Viterbi Pulse Blog on Graduate Admission. Removes dependencies on two custom user roles (now deprecated)

* CHANGE: Author archive and single author templates with modified query to use meta field from new radio buttons

* CHANGE: Revised group_598331a41231b.json in acvf-json folder with meta fields for radio buttons

*CHANGE: Added _authors.scss and _calendar.scss partial to site.scss

* NEW: _customizations.scss partial added to site.scss comprising changes from ‘ongoing theme revisions’ doc

**4.0.4**

**April 2020**

* CHANGE: new CSS for sidebar nav menus to match Alumni and Giving sections of Viterbi School site

**4.0.2**

**December 2019**

* CHANGE: added inline CSS for 20px top and bottom padding of outer container "x-container max width offset" on page-event.php template

**4.0.1**

**November 2019**

* CHANGE: font size and margin adjustments in header.php and header-styles.php to compensate for system font x-heights

* CHANGE: fixed floats and hover color on footer social media icons

**4.0.0**

**First release version**

**November 2019**

*CHANGE: reverted opening div and breadcrumbs on page templates

**4.0.beta05**

**November 2019**

* REMOVED: CSS (site.scss): `header.masthead+div.x-container.offset { margin: 20px auto; }`

* NEW: added line 23 to page template page-combined-news-mediacoverage.php: `$year_filter = ‘’;`

* NEW: added if(isset($_GET['tenured-joint'])) $filters = 'tenured-joint’; to page-faculty-directory.php and page-faculty-directory-template2.php



**4.0.beta04**

**November 2019**

* NEW: Image max-width issue solution for IE:
.x-image { max-width: 100%; }

* NEW: Remove bullets on Gravity Forms input headlines: http://programewp.staging.wpengine.com/about/contact/

* NEW: Remove bullets on list items in news and events at bottom of the page: http://programsae.staging.wpengine.com/

* NEW: Add image box shadow and css on images inside text elements: https://viterbimulti.staging.wpengine.com/services/digital-communication-services/wordpress/viterbi-wordpress-tutorials/how-to-edit-a-page-from-the-backend/
box-shadow: 0em 0.15em 0.65em 0em rgba(0, 0, 0, 0.25);​

**4.0.beta03**

**October 2019**
* CHANGE: reduced single line header branding text from 32px to 30px
* CHANGE: replaced text on 404 page, added conditional (WordPress vs Google) display of search box under 404 text

**4.0.beta02**

**October 2019**
* FIXED: Year sorting on News and Media Coverage archive pages added ‘name’ attribute to ‘year’ 


**4.0.beta01**

**October 2019**
* NEW: accessibility features targeting ADA compliance
* NEW: aria-labels and image alt text are programmatically generated on elements using custom loops
* REMOVED: old app.css stylesheet
* NEW: site.css stylesheet written to work with newly styles Cornerstone elements
* CHANGE: site footer restyling for color contrast
* CHANGE: News and Media Coverage archive styling
* CHANGE: equal height function added to vsoe.js with target class added to `` <article>`` elements on News and Media Coverage archive 

**3.8.4**
* NEW: custom templates for The Events Calendar for feature request from AME

**3.8.3**
* CHANGE: new CSS for alternative faculty directory page to fix image display bug on iOS

**3.8.1**
* CHANGE: fixed font size on second line of donor format site header
* CHANGE: removed dash from theme folder name

**3.8.0 release version**
* CHANGE: faculty directory CSS reverted to floats due to grid problems in IE

**3.8.0.beta2 08/2019**
* CHANGE: faculty directory CSS refactored for grid

**3.8.0.beta1 08/2019**
* CHANGE: new mobile header text formatting
* CHANGE: faculty directory CSS refactored for flexbox
* NEW: alt and title attributes on logo images and text in site header
* NEW: alt and title attributes on images and story title links on News, Media Coverage, and combined News and Media Coverage archive pages

**3.7.1 07/2019**
* CHANGE: revised _authors.scss and _directory.scss partials with code cleanup
* REMOVED: extraneous app.css and app.css.map in subdirectories, new files compiled to theme root level

**#3.7.0 07/2019**
* NEW: custom faculty directory template for Mork only

**3.6.2 06/2019**
* NEW: ACF Pro field group for VSOE Research Faculty Shortcode plugin
* NEW: two user roles, vsoe_author_archive and vsoe_alumni_author_archive for Viterbi Pulse blog on Viterbi Grad Admission
* CHANGE: updated user archive templates to query for new user roles
* CHANGE: added check in archive template to display “There are no posts…” rather than rendering blank gray sidebar on empty archive pages
* CHANGE: refactored CSS to use flex box on archive page
* CHANGE: refactored template and CSS on author.php to clean up

**3.6.1 04/2019**
* NEW: added year filtering to combined News and Media Coverage archive page

**3.6.0 04/2019**
* NEW: added year filtering to News and Media Coverage archive pages

**3.5.2 02/2019**
* CHANGE: Added Google Analytics role in `/lib/base-functions/user-roles.php` NOTE: change plugin settings to assign access to Administrators and Google Analytics roles only

**3.5.1 01/2019**
* CHANGE: Removed Gravity Forms function to add hidden labels as function is now native to the plugin
* BUGFIX: commented out line 131 in `functions.php` to eliminate deprecated `add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );``
* BUGFIX: fixed Redirection not showing up in Tools by changing ``/lib/base-functions/redirection-role.php`` to the following:

``add_filter( 'redirection_role', 'redirection_to_editor' );
function redirection_to_editor() {
    return 'edit_pages';
}``

See post #9 at https://wordpress.stackexchange.com/questions/202076/redirection-plugin-how-to-let-the-editor-access-the-redirection-menu

**3.5 01/2019**
* CHANGE: Adding New User Roles via functions.php: Gravity Forms, Events Calendar, Former Staff/Student
* CHANGE: Extending post preview window to 30 days per Andreas

**3.3 07/2018**
* CHANGE: rewrote `/lib/base-functions/remove-extra-image-sizes.php` to remove from duplicate x_setup_theme function

**3.2.1 06/2018**
* BUGFIX: removed featured image from `content.php`
* CHANGE: set top margin to 0 on .entry-featured in `_blog.scss` partial
* CHANGE: added radio buttons to Site Settings for toggling featured images in archive and single views
* Wrapped post thumbnails in conditional code per site settings
* Refactored `/framework/views/renew/_content-post-header.php` to rearrange header title and meta and featured image


**3.2 05/2018**
* Refactored `/framework/views/renew/_content-post-header.php` to include post meta if enabled in Customizer
* Customized post meta to show only post date via `/lib/base-functions/custom-post-meta.php`
* Added new SASS partial `_blog.scss`
* Changed sidebar widgets to use only bottom margins
* Restyled sidebar list items to remove borders, margins, and padding; changed line height to be more proportional with other page content
* Darkened border on Masonry entries
* Changed post title to 18px in three-column Masonry view
* Removed redundant “Blog Page Top Content” widget from `/lib/base-functions/custom-widgets.php`
* Added inline comments for `/lib` function calls in `functions.php`
* Added link to developer documentation to `style.css`
* Changed Author URI in `style.css` to link to `https://viterbiit.usc.edu/services/digital-communication-services/wordpress/`
* Edited instruction text for blog page top content widget to indicate it’s for autogenerated `/category/blog` archive only and is intended mostly for EE
* Changed `%button` SASS placeholder in `variables-mixins.scss` to use National font
* Changed `.x-btn, .x-btn-mini, .x-btn-large` to use same top and bottom padding
* Reduced font size and line height for 3-col Masonry items
* Added bottom border to sidebar headlines
* Removed top border from sidebar ULs
* Restyled page navigation with flex elements to fix weird wrapping issue in certain states


**3.0 05/01/2018**
* Same as 2.10.2; renumbered since it breaks backward compatibility with VSOE Syndicated Content

**2.10.2 04/2018**
* Moved `/assets/stylesheets/partials/_swiper-slider.scss`, `/assets/stylesheets/partials/_calendar.scss`, and `/assets/stylesheets/partials/_syndicated-content.scss` to VSOE Syndicated Content plugin folder to detach plugin content from theme
* Added `manual-excerpt-more.php` to `/lib/base-functions/` and added include line to `functions.php`
* Moved `sticky-archive-class.php` to `/lib/base-functions/` and added include line to `functions.php`
* Added `shortcode-in-widget.php` to `/lib/base-functions/` and added include line to `functions.php`
* Added conditional logic to Faculty Directory custom fields to display secondary nav dropdown only if ‘show subnav’ is set to ‘true’
* `/framework/views/renew/_content-post-header.php`: added post date if “show post meta” is enabled in Customizer
* Added radio buttons in Site Settings > Extras to enable additional post meta (not implemented in template yet)

**2.10.1 04/19/2018**
* Updated page-faculty-directory.php template -- added case for if $filters are set, then we do not need the other parameters in the curl function (Dana)
* `search.php`: deleted lines 82-85: `global $query_string; $search_query = wp_parse_str( $query_string ); $search = new WP_Query( $search_query );` to fix `PHP Warning: Missing argument 2 for wp_parse_str(), called in /nas/content/live/centermagics/wp-content/themes/viterbi-school.2.10/search.php on line 84` logged error

**2.10 04/2018**
* Cumulative updates since 2.9.4

**2.9.5beta2 04/2018**
* New search styles in `/lib/extended-functions/vsoe-site-settings/functions/header-style.php`
* Edited `/assets/stylesheets/partials/_directory.scss`: styling for optional faculty directory subnavigation, changed hr weights to 4px, fixed side margin and padding on desktop and mobile  

**2.9.5beta1 04/2018**
* New ACF Pro custom meta boxes to work with customizable Faculty Directory pages
* page-faculty-directory.php: added queries and conditional code for page customizations from new ACF Pro custom meta boxes
* Added plugin dependency: Advanced Custom Fields: Nav Menu Field to allow selection of WP Nav menu on custom Faculty Directory pages
* Added: `add_filter(gform_upload_root_htaccess_rules', '__return_false');` to `/lib/base-functions/disable-gforms-notification.php` in order to resolve warning in WP Engine Error Log.
* Added "Disable Nested Pages Clone Button" function to functions.php.

**2/9.4 03/12/18**

* CSS change: `_global.scss` starting line 843: changed inactive tab text color to #777
* Removed: `functions.php` line 47 calling `/lib/extended-functions/vsoe-site-settings/functions/header-style.php`
* Added: `include( plugin_dir_path( __FILE__ ) . '/functions/header-style.php’);`
 to `/lib/extended-functions/vsoe-site-settings/`

* Added: lines 22-53 to `/lib/extended-functions/vsoe-site-settings/functions/header-style.php` to fix overlapping third-level nav menu

**2.9.3 01/25/18**

* header.php: removed lines 20 and 21:
  $logo_nav_layout > x_get_logo_navigation_layout();

  $is_one_page_nav >   x_is_one_page_navigation();
* Added: new page template: page-events-calendar.php

**2.9.2**

* header.php: removed line 20, "$navbar_position ** x_get_navbar_positioning();" to clear log error

**2.9.1**

* Cleaned up CSS for Google search elements


**2.8.4**

* Moved wp-header.php out of /framework/views/renew folder to theme root folder and renamed to header.php
* Added register-nav-menus.php, called from functions.php, to wrap primary nav in correct tags
* New Google search functionality to replace deprecated Google Search Appliance with Google Custom Search Engine
* Added "Search" tab to VSOE Site Settings with fields for GCSE IDs
* Created /lib/extended-functions/vsoe-site-settings/functions/header-style.php with styling for GCSE elements
* Removed "Add Secondary Navigation?" field from VSOE Site Settings > Header (all sites now get secondary navigation)
* Removed conditional logic for displaying secondary navigation in header.php

**2.8.3**

* Removed /lib/base-functions/theme-setup.php -- moved functionality to plugin
* Removed call to /lib/base-functions/theme-setup.php from functions.php line 50
* Optimized images in the theme assets folder: 404_bg.jpg / Footer-Map.jpg / Small-Use-Shield_BlackOnTrans.png / tommy-trojan-login.jpg / USC-Shield.png / USC-Viterbi.png / viterbi-logo-one-line.png

**2.8.2**

* Changes to Courses CPT setup:
* /lib/extended-functions/vsoe-courses-cpt/vsoe-coursts-cpt.php: added Chemical Engineering & Materials Science (ID: 24) to widget selection checkboxes
* /lib/base-functions/custom-widgets.php to v2.7.7 to keep widgets from moving on theme update

**2.8.1**  

* /framework/views/renew/content-post-header: conditional logic for display post author thumbnails
* /framework/views/global/_index.php: added conditional sidebar display for 'sidebar-blog-page-top-content'
* /lib/base-functions/custom-widgets.php: removed 'sidebar-weather-widget'

**2.8**  

* Site settings: added ACF field for WeChat
* Site settings: added WeChat icon to /lib/extended/functions/vsoe-site-settings/functions/social-shortcode.php
* Site settings: added radio button for production/staging environment
* Added national.css in /assets/css to load National font from web-app.usc.edu for staging
* /lib/base-functions/scripts-styles: conditional loading of national.css for staging environment

** 2.7.8 ** 

* html CSS: box-sizing: border-box;
* body CSS: box-sizing: inherit;
* Removed 15px side padding on News and Media Coverage posts

** 2.7.7 **  

* Changed font path in _global.scss to www.usc.edu base url
* New page-faculty-directory.php template

** 2.7.6 **  

* vsoe-events-widget.php and page-event.php: added regex URL matching to linkify event description text   

** 2.7.5 **  

* page-search.php: changed x-main div to fixed full width  
* page-faculty-directory.php: changed x-main div to fixed full width
* page-faculty-directory.php: removed extra divs
* page-faculty-directory.php 'Faculty Type' additions from Dana
* page-faculty.php: removed extra closing div tag before footer
* page-events.php: removed debug code
* page-event.php: removed debug code
* page-combined-news-mediacoverage: changed x-main div to fixed full width
* page-mediacoverage: changed x-main div to fixed full width
* page-mediacoverage: removed inline styling from x-container
* page-mediacoverage: removed sidebar code
* page-news: changed x-main div to fixed full width
* page-news: removed sidebar code
* page-news: removed debug code

** 2.7.4 **   

* Added widget area for blog page top content  
* Added custom Blog page template with top content   widget area and pagination

** 2.7. 3 **  

* CSS adjustment for nav hover state in /lib/extended-functions/vsoe-site-settings/functions/header-style.php  

** 2.7.2 **  

* Added post pagination for Authors pages    

** 2.7.1 **    

* Template tweaks for external content templates  
* Header styling for search results page  


** 2.7 **  

* Added Authors archive and single archive screen   
* Added ACF Pro custom meta boxes for ‘Academic Department’ and ‘Academic Status’ in user screen  


** 2.6.1 **  

* Added body class 'breadcrumbs-on' and CSS to adjust top margin of first x-section with background image

** 2.6 **  

* Created README.txt
* Restyled search box.
* Added ACF Pro image uploader and academic department and academic status input boxes for user profile edit screen.
* Added author page templates.
* Added CSS for author pages (SASS file at /assets/stylesheets/partials/_authors.scss).
