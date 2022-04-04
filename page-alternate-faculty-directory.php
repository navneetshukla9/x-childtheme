<?php

// =============================================================================
/* Template Name: Alternate Faculty Directory */ 
// -----------------------------------------------------------------------------

get_header(); ?>

<!-- start CSS revisions by Miles 07162019 -->

<style> .alt-faculty .facultymember { clear: both; display: block; margin: 0 auto 1.5em; content: ""; } .x-main.full h3 { margin-bottom: .5em; } .alt-faculty .faculty-photo { display: inline-block; width: 17%; float: left; margin: 0 2% 0 0; } .alt-faculty .alt-faculty .faculty-photo a, .alt-faculty .faculty-photo img { clear: both; display: block; width: 100%; margin: 0 auto; content: ""; } .alt-faculty .bottom-border { margin: 0 auto 1em; content: ""; padding-bottom: 1.5em; border-bottom: 4px solid #990000; } .alt-faculty .faculty-text p { font-size: .9em; margin-bottom: 0; line-height: 1.5; clear: both; display: block; position: relative; } .alt-faculty .faculty-text { display: inline-block; float: left; width: 81%; } .alt-faculty .faculty-text p:first-child { font-size: 1.2em; margin-top: -7px; } .alt-faculty .faculty-text p:nth-child(2) { font-size: 1em; } .alt-faculty p { margin-bottom: 0; } .alt-faculty form { clear: both; display: block; position: relative; width: 100%; margin: 0 auto; content: ""; } .alt-faculty form:after { clear: both; display: table; width: 100%; content: ""; } .alt-faculty form .one-third:first-child { margin-left: 0; } .alt-faculty form input[type="text"] { width: 100%; border-width: 1px; } .alt-faculty input[type="radio"] { float: left; margin: 0 .5em 0 0; line-height: 1.5; } .alt-faculty input[type="radio"] + label { margin: 0; padding: 0; line-height: 1.5; } @media screen and (max-width: 979px) { .alt-faculty .facultymember, .alt-faculty h3 { width: 96%; } .alt-faculty .faculty-photo { width: 30%; } .alt-faculty .faculty-text { width: 64%; } } @media screen and (max-width: 680px) { form .one-third { clear: both; display: block; width: 100%; margin: 0 auto; content: ""; } input[type="submit"] { margin-top: 1em; } } form .one-third .row label { display: inline-block; width: auto; float: left; } .info-icon { float: right; font-size: 18px; text-align: center; width: 20px; height: 20px; line-height: 20px; margin: 5px 0 0; border: 1px solid #990000; color: #990000; border-radius: 50%; margin-right: 39px;} .row.info {display: block; position: absolute; margin: 0; top: 50px; right: 0; width: 320px; background: #990000; color: white; padding: .5em; font-size: 15px; z-index: 20; opacity: 0; visibility: hidden; transition: all .4s ease-in-out; } .row.info.show {opacity: 1; visibility: visible; } .row.info::before {content:''; position:absolute; margin: 0; width:18px; height:18px; top: -18px; right:30px; transform:translate(-50%,50%) rotate(45deg); background-color:#990000; } .row.info p {line-height: 1.4; margin-bottom: .5em; } .row.info p:last-child { margin-bottom: 0; } </style>

<!-- end CSS revisions by Miles 07162019 -->

<div class="x-container max width offset alt-faculty">
<?php if ( x_get_option( 'x_breadcrumb_display' ) )  :  x_breadcrumbs(); endif; ?>
<div class="x-main full" id="main" role="main">
	<div class="facultymember bottom-border" style="margin-top: 1em;"><!-- first faculty member starts here -->
		<div class="row">
			<div class="faculty-photo">
				<a href="#"><img src="https://viterbi.usc.edu/directory/images/48f345debeed509f811dc11eddc45aa4.jpeg" alt="Richard Roberts" /></a>
			</div>
			<div class="faculty-text">
				<p><strong>Richard Roberts</strong></p>
				<p><strong>Professor of Chemistry, Chemical Engineering and Materials Science, Biomedical Engineering, and Molecular and Computational Biology</strong></p>	
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,</p>
				<p style="margin-top: 1em; font-size: 1em;"><strong><a href="#">Research Website</a></strong></p>
			</div>
		</div>
	</div><!-- first faculty member ends here -->
	<h3>Faculty Directory Search/Filter</h3><!-- search form section starts here -->
	<div class="facultymember bottom-border">

		<!-- begin form revisions by Miles 07162019 -->

		<form>
			<div class="one-third">
				<strong><label for="name">Name</label></strong>
				<input type="text" name="name" />
			</div>
			<div class="one-third">
				<strong><label for="keyword">Topic/Keyword</label></strong>
				<input type="text" name="keyword" />
			</div>
			<div class="one-third">
				<div class="row">
					<strong><label>View:</label></strong><span class="info-icon" id="info-toggle">I</span>
					<div class="row info">
						<p><strong>Regular Faculty</strong> includes Tenure/Tenure Track, Research, Joint, Adjunct, Courtesy and Emeritus Faculty.</p>
						<p><strong>Instructional Faculty</strong> includes Full/Part-Time Instructional, Teaching Faculty and Lecturers</p>			
					</div>
				</div>
				<input type="radio" id="all_faculty" name="all_faculty" value="all_faculty" checked>
				<label for="all_faculty">Tenure/Tenure-track and ​Research Faculty</label>
				<input type="radio" id="regular_faculty" name="regular_faculty" value="aregular_faculty">
				<label for="regular_faculty">Regular Faculty Only</label>
				<input type="radio" id="instructional_faculty" name="instructional_faculty" value="instructional_faculty">
				<label for="instructional_faculty">Instructional Faculty Only</label>
			</div>
			<input type="submit" class="x-btn" value="Find Faculty" />
		</form>

		<!-- end form revisions by Miles 07162019 -->

	</div><!-- search form section ends here -->
	<h3>Faculty</h3><!-- faculty loop starts here -->
		<div class="facultymember"><!-- faculty member starts here -->
			<div class="row">
				<div class="faculty-photo">
					<a href="#"><img src="https://viterbi.usc.edu/directory/images/3e1d7962eccf2223bcff4877dff30e8c.jpg" alt="Andrea Martin Armani" /></a>
				</div>
				<div class="faculty-text">
					<p><strong>Andrea Martin Armani</strong></p>
					<p><strong>Ray Irani Chair in Chemical Engineering and Materials Science and Professor of Chemical Engineering and Materials Science, Biomedical Engineering, Electrical and Computer Engineering-Electrophysics, Aerospace and Mechanical Engineering, and Chemistry</strong></p>	
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu</p>
					<p style="margin-top: 1em;"><strong><a href="#">Research Website</a></strong></p>
				</div>
			</div>
		</div><!-- faculty member ends here -->
		<div class="facultymember"><!-- faculty member starts here -->
			<div class="row">
				<div class="faculty-photo">
					<a href="#"><img src="https://viterbi.usc.edu/directory/images/5404c83fdc9b2a22d7941f38bd42627b.jpg" alt="Virgil Adumitroaie" /></a>
				</div>
				<div class="faculty-text">
					<p><strong>Virgil Adumitroaie</strong></p>
					<p><strong>Part-Time Lecturer of Chemical Engineering and Materials Science</strong></p>	
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu</p>
					<p style="margin-top: 1em;"><strong><a href="#">Research Website</a></strong></p>
				</div>
			</div>
		</div><!-- faculty member ends here -->
	</div><!-- faculty loop ends here -->        
</div>

<!-- start tooltip toggle script added by Miles 07162019 -->

<script>
jQuery(document).ready(function($){
	$("#info-toggle").on({
		mouseover: function(){
			//do on mouse hover
			$('.row.info').addClass('show');
		},
		mouseleave: function(){
			//do on mouse hover
			$('.row.info').removeClass('show');
		},  
		click: function(){
			//do on mouse click
			$('.row.info').toggleClass('show');
		}  
	});
});
</script>

<!-- end tooltip toggle script added by Miles 07162019 -->

<?php get_footer(); ?>