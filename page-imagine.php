<?php

// =============================================================================
// 
/* Template Name: Viterbi Imagine Page */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's pages, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-page.php," where you'll be able to find the
// appropriate output.
// =============================================================================

get_header(); 
$count_posts = wp_count_posts('question')->publish;

?>

<?php while(have_posts()): the_post(); ?>
<div class="x-main full" id="main" role="main">
    <div class="viterbi-imagine-hero" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>); ">
        <h1 class="viterbi-imagine-hero-title"><?php echo the_title(); ?></h1>
    </div>
    <div class="viterbi-imagine" id="ve2">
        <div class="x-container max width offset">
        <?php if(get_field('question_section')): ?>
            <?php while(have_rows('question_section')): the_row(); ?> 
            <div class="viterbi-imagine-form">
                <?php
                    $question_form = get_sub_field('form');
                    $question_title = get_sub_field('title');
                ?>
                <?php echo do_shortcode($question_form); ?>
            </div>
            <div class="viterbi-question">
                <h2 class="imagine-section-title"><span><?php echo $question_title; ?></span></h2>
                <div class="viterbi-question-nav">
                    <?php
                        $question_categories = get_terms('question_category'); 
                    ?>
                    <ul>
                        <li>
                            <button data-filter="*" class="js-filter-button is-active">All Questions</button>
                        </li>
                        <?php foreach($question_categories as $question_category): ?>
                        <li>
                            <button data-filter=".<?php echo $question_category->slug; ?>" class="js-filter-button"><?php echo $question_category->name; ?></button>
                        </li>
                        <?php endforeach; ?>
                        <?php while(have_rows('other_buttons')): the_row(); ?>
                            <li>
                                <a href="<?php echo the_sub_field('url'); ?>" target="_blank"><?php echo the_sub_field('text'); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <ul class="viterbi-question-list js-grid">
                <?php 
                    $args = array( 'posts_per_page' => -1, 'post_type' => 'question', 'order' => 'ASC');
                    $myposts = get_posts( $args );
                    $post_count = 0; 
                    
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                    $terms = get_the_terms(get_the_ID(), 'question_category');
                    $author_id = get_the_author_meta( 'ID' );
                    if($terms != null) {
                        $output = array();
                        $output_slug = array();
                        foreach($terms as $term) {
                            $output[] = $term->name;
                            $output_slug[] = $term->slug;
                            unset($term);
                        }
                    }
                ?>
                    <li class="viterbi-question-item js-grid-item <?php echo implode(" ", $output_slug); ?>">
                        <article class="viterbi-question-card">
                            <a href="<?php echo the_permalink(); ?>" class="viterbi-question-link">
                                <div class="viterbi-question-upper">
                                    <?php foreach($output as $output_item): ?>
                                        <span class="viterbi-question-tag"><?php echo $output_item; ?></span>
                                    <?php endforeach; ?>
                                    <h2 class="viterbi-question-title"><?php echo the_title(); ?></h2>
                                </div>
                            </a>
                        </article>
                    </li>
                <?php $post_count++; endforeach; wp_reset_postdata(); ?>
                </ul>
                <?php if($count_posts > 12): ?>
                <div class="viterbi-question-load">
                    <button class="js-question-load">Load More</button>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if(get_field('quick_links_section')): ?>
        <?php while(have_rows('quick_links_section')): the_row(); ?> 
        <div class="imagine-quick-link" id="ve3">
            <div class="x-container max width offset">
                <h2 class="imagine-section-title"><span><?php echo get_sub_field('title'); ?></span></h2>
                <ul class="imagine-quick-link-list">
                    <?php while(have_rows('quick_links')): the_row(); ?>
                    <li>
                        <a href="<?php echo the_sub_field('url'); ?>">
                            <span><?php echo the_sub_field('text'); ?></span>
                            <i>
                                <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.9001 7.99974L14.9667 1.06641M21.9001 7.99974L14.9667 14.9331M21.9001 7.99974H0.233398" stroke="black" stroke-width="2"/>
                                </svg>
                            </i>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
<!--     <?php if(get_field('video_highlights')): ?>
        <?php while(have_rows('video_highlights')): the_row(); $title = get_sub_field('title'); ?> 
            <?php if(have_rows('video_item')): ?>
                <div class="imagine-section" id="ve4">
                    <div class="x-container max width offset">
                        <h2 class="imagine-section-title"><span><?php echo $title; ?></span></h2>
                        <ul class="imagine-section-video">
                            <?php while(have_rows('video_item')): the_row(); ?> 
                            <li>
                                <div class="imagine-section-container">
                                    <?php echo the_sub_field('item'); ?>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?> -->
    <?php if(get_field('imagine_podcast')): ?>
        <?php while(have_rows('imagine_podcast')): the_row(); $background_image = get_sub_field('background_image'); ?> 
            <div class="imagine-podcast" style="background-image: url(<?php echo $background_image; ?>)" id="ve5">
                <div class="x-container max width offset">
                    <div class="imagine-podcast-container">
                        <div class="imagine-podcast-left">
                            <div class="imagine-podcast-icon">
                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M53.3334 31.9998V27.4478C53.3334 15.6025 44.056 5.68518 32.6534 5.34118C26.776 5.20518 21.3174 7.30384 17.144 11.3572C15.0865 13.3394 13.4519 15.7178 12.3386 18.349C11.2254 20.9801 10.6566 23.8095 10.6667 26.6665V31.9998C7.72537 31.9998 5.33337 34.3918 5.33337 37.3332V47.9998C5.33337 50.9412 7.72537 53.3332 10.6667 53.3332H16V26.6665C15.9922 24.5238 16.4184 22.4017 17.253 20.4282C18.0876 18.4548 19.3132 16.6708 20.856 15.1838C22.3924 13.6883 24.2146 12.5181 26.2138 11.7433C28.2129 10.9685 30.3478 10.605 32.4907 10.6745C41.0454 10.9305 48 18.4558 48 27.4478V53.3332H53.3334C56.2747 53.3332 58.6667 50.9412 58.6667 47.9998V37.3332C58.6667 34.3918 56.2747 31.9998 53.3334 31.9998Z" fill="black"/>
                                    <path d="M18.6666 32H24V53.3333H18.6666V32ZM40 32H45.3333V53.3333H40V32Z" fill="black"/>
                                </svg>
                            </div>
                            <?php if(have_rows('left_content')): ?>
                                <?php while(have_rows('left_content')): the_row(); ?>
                                    <div class="imagine-podcast-content">
                                        <h2><?php echo the_sub_field('title'); ?></h2>
                                        <p><?php echo the_sub_field('description'); ?></p>
<!--                                         <?php if(have_rows('apple_podcast_button')): ?>
                                            <?php while(have_rows('apple_podcast_button')): the_row(); ?>
                                                <a href="<?php echo the_sub_field('url'); ?>">
                                                    <i>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.9898 12.6832C18.9779 10.7159 19.8974 9.2333 21.7543 8.14007C20.7157 6.69782 19.1446 5.90458 17.0735 5.7517C15.1125 5.60171 12.9671 6.85935 12.1815 6.85935C11.3513 6.85935 9.45279 5.80362 7.959 5.80362C4.8762 5.84977 1.59998 8.18622 1.59998 12.9399C1.59998 14.3446 1.86481 15.7955 2.39448 17.2897C3.10269 19.2569 5.65583 24.0769 8.31906 23.9991C9.71168 23.9673 10.6966 23.0414 12.5088 23.0414C14.2674 23.0414 15.178 23.9991 16.7313 23.9991C19.4183 23.9616 21.7275 19.58 22.4 17.607C18.7964 15.96 18.9898 12.7841 18.9898 12.6832ZM15.8624 3.88543C17.3711 2.14895 17.2342 0.568247 17.1896 0C15.8565 0.0749971 14.3151 0.879774 13.4372 1.86916C12.4701 2.93066 11.9018 4.2431 12.0238 5.72285C13.464 5.82958 14.7793 5.11134 15.8624 3.88543Z" fill="#333333"/>
                                                        </svg>
                                                    </i>
                                                    <span><?php echo the_sub_field('text'); ?></span>
                                                </a>
                                            <?php endwhile; ?>
                                        <?php endif; ?> -->
                                        <?php if(have_rows('soundcloud_podcast_button')): ?>
                                            <?php while(have_rows('soundcloud_podcast_button')): the_row(); ?>
                                                <a href="<?php echo the_sub_field('url'); ?>">
                                                    <i>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M21.75 0H2.25C1.0125 0 0 1.0125 0 2.25V21.75C0 22.9875 1.0125 24 2.25 24H21.75C22.9875 24 24 22.9875 24 21.75V2.25C24 1.0125 22.9875 0 21.75 0ZM4.125 16.5H3.375L3 14.25L3.375 12H4.125L4.5 14.25L4.125 16.5ZM7.125 16.5H6.375L6 13.5L6.375 10.5H7.125L7.5 13.5L7.125 16.5ZM10.125 16.5H9.375L9 12L9.375 7.5H10.125L10.5 12L10.125 16.5ZM19.341 16.5L12.2775 16.4955C12.2032 16.4869 12.1344 16.4519 12.0837 16.3968C12.0331 16.3417 12.0039 16.2703 12.0015 16.1955V8.1045C12.0015 7.9545 12.0525 7.8795 12.2445 7.8045C12.8951 7.55166 13.5955 7.45362 14.2905 7.51813C14.9855 7.58264 15.656 7.80793 16.2489 8.1762C16.8418 8.54446 17.3409 9.0456 17.7068 9.64C18.0727 10.2344 18.2953 10.9058 18.357 11.601C18.7447 11.4393 19.1663 11.3757 19.5844 11.416C20.0025 11.4563 20.4042 11.5993 20.7538 11.8321C21.1034 12.0649 21.3901 12.3805 21.5885 12.7507C21.7869 13.121 21.8908 13.5345 21.891 13.9545C21.891 15.3615 20.748 16.5 19.341 16.5Z" fill="#333333"/>
                                                        </svg>
                                                    </i>
                                                    <span><?php echo the_sub_field('text'); ?></span>
                                                </a>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php if(have_rows('right_content')): ?>
                            <?php while(have_rows('right_content')): the_row(); ?>
                                <div class="imagine-podcast-right">
                                    <?php echo the_sub_field('podcast_iframe'); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if(get_field('events')): ?>
        <?php while(have_rows('events')): the_row(); ?> 
        <div class="imagine-section" id="ve6">
            <div class="x-container max width offset">
                <h2 class="imagine-section-title"><span><?php echo get_sub_field('title'); ?></span></h2>
                <div class="imagine-section-calendar">
                <?php while(have_rows('event')): the_row(); ?>
                    <?php
                        $unixtimestamp = strtotime( get_sub_field('date') );
                        $month = date_i18n( "M", $unixtimestamp );
                        $day = date_i18n( "d", $unixtimestamp );
                        $year = date_i18n( "Y", $unixtimestamp );
                    ?>
                    <div class="imagine-section-calendar-box">
                        <span class="date">
                            <span>
                                <?php echo $month; ?><br>
                                <?php echo $day; ?>
                            </span>
                            <span><?php echo $year; ?></span>
                        </span>
                        <div class="content">
                            <h3><?php echo the_sub_field('title'); ?></h3>
                            <p><?php echo the_sub_field('description'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if(have_rows('about_the_viterbi_exchange')): ?>
        <?php while(have_rows('about_the_viterbi_exchange')): the_row(); ?>
            <div class="viterbi-about" id="ve7" style="background-image: url(<?php echo the_sub_field('background_image'); ?>)">
                <div class="viterbi-about-content">
                    <h2><?php echo the_sub_field('title'); ?></h2>
                    <p><?php echo the_sub_field('description'); ?></p>
                </div>
            </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php if(have_rows('about_us_bio')): ?>
        <?php while(have_rows('about_us_bio')): the_row(); ?>
        <div class="imagine-bio" id="ve8">
            <div class="x-container max width offset">
                <h2 class="imagine-section-title"><span><?php echo get_sub_field('title'); ?></span></h2>
                <div class="imagine-bio-list">
                    <?php $count = 0; while(have_rows('bios')): the_row(); $name = get_sub_field('name'); ?>
                    <?php 
                        $array = explode(' ', $name);
                    ?>
                    <div class="imagine-bio-item">
                        <article class="imagine-bio-card" id="<?php echo strtolower($array[1]); ?>">
                            <div class="imagine-bio-image">
                                <img src="<?php echo the_sub_field('image')?>" alt="">
                            </div>
                            <h2 class="imagine-bio-name"><?php echo the_sub_field('name'); ?></h2>
                            <p class="imagine-bio-position"><?php echo the_sub_field('description'); ?></p>
                            <div class="imagine-bio-share"`>
                                <?php while(have_rows('contact_information')): the_row(); ?>
                                <a href="mailto:<?php echo the_sub_field('email'); ?>">
                                    <i>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 3.99961C0 2.67413 1.07452 1.59961 2.4 1.59961H21.6C22.9255 1.59961 24 2.67413 24 3.99961V5.93174L12 12.6817L0 5.93171V3.99961Z" fill="#777777"/>
                                            <path d="M0 7.76747V19.9996C0 21.3251 1.07452 22.3996 2.4 22.3996H21.6C22.9255 22.3996 24 21.3251 24 19.9996V7.76749L12 14.5175L0 7.76747Z" fill="#777777"/>
                                        </svg>
                                    </i>
                                </a>
                                <?php endwhile; ?>
                            </div>
                            <button class="imagine-bio-info js-imagine-bio-button<?php echo $count == 0 ? ' is-active' : ''; ?>" data-target="#js-imagine-bio-content-<?php echo $count; ?>">
                                <span>Show More Info</span>
                                <span>Hide Info</span>
                            </button>
                        </article>
                    </div>
                    <?php $count++; endwhile; ?>
                </div>
            </div>
            <div class="imagine-bio-lower">
                <div class="imagine-bio-content">
                    <div class="x-container max width offset">
                        <?php $count = 0; while(have_rows('bios')): the_row(); ?>
                            <p class="js-imagine-bio-content" id="js-imagine-bio-content-<?php echo $count; ?>" <?php echo $count == 0 ? 'style="display: block;"' : 'style="display: none;"'; ?>><?php echo the_sub_field('bio_description'); ?></p>
                        <?php $count++; endwhile; ?>
                    </div>
                </div>
            </div>
            <?php $count = 0; while(have_rows('bios')): the_row(); ?>
            <div class="imagine-bio-modal js-imagine-bio-modal" data-modal-target="#js-imagine-bio-content-<?php echo $count; ?>">
                <div class="x-container max width offset">
                    <div class="close"></div>
                    <p><?php echo the_sub_field('bio_description') ?></p>
                </div>
            </div>
            <?php $count++; endwhile; ?>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php echo the_content(); ?>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>