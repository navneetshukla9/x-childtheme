<?php
/**
* Template Name: News Archive Page
* The template for the News CPT archive page.
*
*/
get_header(); ?>

<?php
/*
Viterbi School News Categories			
Name												Slug			ID
Academics											academics		251
Advancement											advancement		252
Aerospace and Mechanical Engineering						ase			253
Alumni											alumni		254
Astronautical Engineering								aste			255
Biomedical Engineering									bme			256
Computer Science										cs			257
Daniel J. Epstein Department of Industrial and Systems Engineering	ise			258
Distinction											distinction		259
Faculty											faculty		260
Graduate and Professional Programs							gapp			261
Information Sciences Institute							isi			262
Information Technology Program							itp			263
Innovation											innovation		264
Institute for Creative Technologies							ict			265
Ming Hsieh Department of Electrical Engineering					ee			266
Mork Family Department of Chemical Engineering and Materials Science	chems			267
Oureach											outreach		268
Research											research		269
Sonny Astani Department of Civil and Environmental Engineering		cee			270
Students											students		271
Video												video			272
Viterbi School										viterbi-school	1110
*/

?>

<style> .syndicated-year-select {clear: both; display: block; position: relative; width: 100%; margin: 0 auto 1.5em; padding: .25em 0; content: ""; line-height: 25px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;} .syndicated-year-select:before, .syndicated-year-select:after  {clear: both; display: table; width: 100%; content: ""; } .syndicated-year-select label, .syndicated-year-select input, .syndicated-year-select button, .syndicated-year-select select, .syndicated-year-select textarea { text-shadow: none; clear: none; display: inline-block; float: left; padding: 0; line-height: 25px; height: 25px; margin-top: 0; margin-left: .25em; margin-bottom: 0; border-radius: 0; vertical-align: middle; font-size: .8em; } .syndicated-year-select select {display: inline-block; margin-left: .5em; margin-right: 1em; height: 27px; line-height: 27px; float: left; width: auto; } .syndicated-year-select input[type="submit"], input[type="button"] { line-height: 24px; font-size: 14px; font-weight: bold; } .syndicated-year-select select:first-of-type, .syndicated-year-select select:nth-child(even) {max-width: 20%; } .syndicated-year-select select:nth-of-type(2), .syndicated-year-select select:nth-child(odd) {max-width: 15%; } .syndicated-year-select input {padding: 0 .6em; border: 1px solid #cccccc; margin: 1px 0 0; text-transform: uppercase; } nav.pagination { clear: both; display: block; position: relative; width: 100%; margin: 0 auto; content: ""; text-align: center; font-size: .9em;  } nav.pagination a {padding: 0 .25em;} nav.pagination:before; nav.pagination:after { clear: both; display: table; width: 100%; content: ""; } input.clear { background: #ffcc00; margin-left: 2em; } input.clear:hover { -webkit-transition: all .4s ease-in-out; transition: all .4s ease-in-out; background: #000; color: #fff; } a.logout { font-size: 14px; line-height: 25px; font-weight: bold; margin-left: 2em; -webkit-transition: .4s ease-in-out; transition: .4s ease-in-out;  }  a.logout span { color: #000; } a.logout:hover { -webkit-transition: .4s ease-in-out; transition: .4s ease-in-out; } .logout input[type="button"] { background: #000; color: #fff; margin-left: 2em; -webkit-transition: all .4s ease-in-out; transition: all .4s ease-in-out; } .logout input[type="button"]:hover { -webkit-transition: all .4s ease-in-out; transition: all .4s ease-in-out; background: #777; } @media screen and (max-width: 767px) {.syndicated-year-select label, .syndicated-year-select select, .syndicated-year-select textarea {clear: both; display: block; position: relative; width: 100%; min-width: 100%; margin: 0 auto .5em; content: ""; } .syndicated-year-select input[type="submit"] { margin-bottom: .5rem }}</style>

<div class="x-container max archive" style="max-width: 1220px; padding-left: 10px; padding-right: 10px;">
	<h1 class="page-title"><span><?php single_cat_title(); ?></span>News</h1>

	<form method="get" action="<?php get_site_url(); ?>/news/page/1/" class="syndicated-year-select" id="category_filter">

		<?php session_start();

		if(isset($_GET['post_dept'])) { $_SESSION['post_dept'] = $_GET['post_dept']; $news_deptval = $_SESSION['post_dept']; }
		if(isset($_GET['post_topic'])) { $_SESSION['post_topic'] = $_GET['post_topic']; $_SESSION['post_topic']; }
		if(isset($_GET['post_year'])) { $_SESSION['post_year'] = $_GET['post_year']; $_SESSION['post_year']; }

		$news_deptval = $_SESSION['post_dept'];
		$news_topicval = $_SESSION['post_topic'];
		$news_yearval = $_SESSION['post_year']; ?>

		<label for="post_dept"><strong><span style="color: #333;">FILTER: </span>Department</strong></label>

		<select name="post_dept" id="post_dept" class="syndicated-year-select">
			<option value=''<?php if ($news_deptval=='') echo ' selected="selected"'; ?>>All</option>
	            <option value="253"<?php if ($news_deptval==253) echo ' selected="selected"'; ?>>Aerospace and Mechanical Engineering</option>
	            <option value="255"<?php if ($news_deptval==255) echo ' selected="selected"'; ?>>Astronautical Engineering</option>
	            <option value="256"<?php if ($news_deptval==256) echo ' selected="selected"'; ?>>Biomedical Engineering</option>
	            <option value="257"<?php if ($news_deptval==257) echo ' selected="selected"'; ?>>Computer Science</option>
	            <option value="258"<?php if ($news_deptval==258) echo ' selected="selected"'; ?>>Daniel J. Epstein Department of Industrial and Systems Engineering</option>
	            <option value="266"<?php if ($news_deptval==266) echo ' selected="selected"'; ?>>Ming Hsieh Department of Electrical and Computer Engineering</option>
	            <option value="267"<?php if ($news_deptval==267) echo ' selected="selected"'; ?>>Mork Family Department of Chemical Engineering and Materials Science</option>
	            <option value="270"<?php if ($news_deptval==270) echo ' selected="selected"'; ?>>Sonny Astani Department of Civil and Environmental Engineering</option>
	            <option value="262"<?php if ($news_topicval==262) echo ' selected="selected"'; ?>>Information Sciences Institute</option>
	            <option value="263"<?php if ($news_topicval==263) echo ' selected="selected"'; ?>>Information Technology Program</option>	            
	            <option value="265"<?php if ($news_topicval==265) echo ' selected="selected"'; ?>>Institute for Creative Technologies</option>
		</select>

		<label for="post_topic"><strong>Topic</strong></label>

		<select name="post_topic" id="post_topic">
			<option value=''<?php if ($news_topicval=='') echo ' selected="selected"'; ?>>All</option>
	            <option value="251"<?php if ($news_topicval==251) echo ' selected="selected"'; ?>>Academics</option>
	            <option value="252"<?php if ($news_topicval==252) echo ' selected="selected"'; ?>>Advancement</option>
	            <option value="254"<?php if ($news_topicval==254) echo ' selected="selected"'; ?>>Alumni</option>
	            <option value="259"<?php if ($news_topicval==259) echo ' selected="selected"'; ?>>Distinction</option>
	            <option value="260"<?php if ($news_topicval==260) echo ' selected="selected"'; ?>>Faculty</option>
	            <option value="261"<?php if ($news_topicval==261) echo ' selected="selected"'; ?>>Graduate and Professional Programs</option>
	            <option value="264"<?php if ($news_topicval==264) echo ' selected="selected"'; ?>>Innovation</option>
	            <option value="111"<?php if ($news_topicval==111) echo ' selected="selected"'; ?>>Media Coverage</option>
	            <option value="268"<?php if ($news_topicval==268) echo ' selected="selected"'; ?>>Outreach</option>
	            <option value="269"<?php if ($news_topicval==269) echo ' selected="selected"'; ?>>Research</option>
	            <option value="271"<?php if ($news_topicval==271) echo ' selected="selected"'; ?>>Students</option>
	            <option value="272"<?php if ($news_topicval==272) echo ' selected="selected"'; ?>>Video</option>
		</select>

		<label for="post_year"><strong>Year</strong></label>

		<select name="post_year" id="post_year">
			<option value=''<?php if ($news_yearval=='') echo ' selected="selected"'; ?>>All</option>
			<?php for($news_year = date("Y"); $news_year >= 2016; $news_year--) { ?>
				<option value="<?php echo $news_year; ?>" <?php if ($news_yearval==$news_year) echo 'selected="selected"'; ?>><?php echo $news_year; ?></option>;
			<?php } ?>
		</select>

		<input type="hidden" name="form_submitted" value="1" />
		<input type="submit" value="Submit">
		<a class="logout" href="<?=$_SERVER[''.get_site_url().'']?>?logout=1"><input type="button" class="button" value="RESET" /></a>

		<?php 
		if (isset($_GET['logout'])) 
		    { 
		    $_SESSION = array(); 
		    session_destroy(); 
		    header('Location:'.get_site_url().'/news/'); 
		    exit; 
		    } 
		?>

	</form>

	<div class="x-section loop-archive" style="padding-top: 10px!important; padding-bottom: 0!important;">
		<div class="x-container max">
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if (!$news_yearval) {
				$news_yearval = array('year' => null );
			}
			if (!$news_deptval && !$news_topicval)  {
				$args = array(
					'post_type'=>'news',
					'posts_per_page' => 24,
					'paged' => $paged,
					'tax_query' => array(
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => 1110,	
						),
					),
					'date_query' => array(
						array('year' => $news_yearval),
					),
				);
			}
			if ($news_deptval && $news_topicval)  {
				$args = array(
					'post_type'=>'news',
					'posts_per_page' => 24,
					'paged' => $paged,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => 1110,	
						),
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => array($news_deptval),	
						),
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => array($news_topicval),	
						),
					),
					'date_query' => array(
						array('year' => $news_yearval),
					),
				);
			}
			if ($news_deptval && !$news_topicval)  {
				$args = array(
					'post_type'=>'news',
					'posts_per_page' => 24,
					'paged' => $paged,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => 1110,	
						),
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => array($news_deptval),	
						),
					),
					'date_query' => array(
						array('year' => $news_yearval),
					),
				);
			}
			if (!$news_deptval && $news_topicval)  {
				$args = array(
					'post_type'=>'news',
					'posts_per_page' => 24,
					'paged' => $paged,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => 1110,	
						),
						array(
							'taxonomy' => 'news_category',
							'field'    => 'term_id',
							'terms'    => array($news_topicval),	
						),
					),
					'date_query' => array(
						array('year' => $news_yearval),
					),
				);
			}

			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="x-column x-sm x-1-4">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<a href="<?php the_permalink(); ?>" title="View story">
								<p>Read More</p>
							<?php the_post_thumbnail('full'); ?>
							</a>
						</header>
						<div class="entry-content">
							<a href="<?php the_permalink(); ?>" title="View story">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</a>
							<span class="meta-author"><?php the_time(get_option('date_format')); ?> <?php edit_post_link(__('{Edit}'), ''); ?></span>
							<p><?php the_excerpt(); ?></p>						
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				</div>
				<?php endwhile; ?>
				<nav class="pagination">
				      <?php pagination_bar( $loop ); ?>
			      </nav>
			</div>		
			<?php  }
			else {
				echo '<div class="row" style="text-align: center;"><p>There are no posts that meet your criteria.</p></div>';
			}
			wp_reset_postdata(); 
		      $_SESSION = array(); 
		      session_destroy(); ?>
			<div class="row">
				<p style="text-align: center; font-size: 14px; margin-bottom: 0;"><strong><a href="http://viterbi.usc.edu/news/news/" target="_blank">Click here to view News items released prior to June 2016</a></strong></p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>