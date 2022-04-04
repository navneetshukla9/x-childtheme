<?php

// =============================================================================
/* Template Name: Faculty Directory */ 
// -----------------------------------------------------------------------------

get_header(); 

/*
ID      Department Name
1	Aerospace and Mechanical Engineering 	AME
2	Astronautical Engineering	ASTE
3	Biomedical Engineering 	BME
4	The Mork Family Department of Chemical Engineering and Materials Science	CHEMS
5	Sonny Astani Department of Civil and Environmental Engineering 	CEE
6	Computer Science 	CS
7	Ming Hsieh Department of Electrical Engineering 	EE
8	Daniel J. Epstein Department of Industrial and Systems Engineering 	ISE
20	Informatics	INF
50	Information Sciences Institute	ISI
60	Viterbi Admission and Student Affairs	VASA
70	Information Technology Program	ITP
80	Graduate and Professional Programs (GAPP)	GAPP
99	Deans Level (All Departments)	DEANS
*/

// Curl function to get data from Viterbi/directory/dept_faculty.php
function curl_wrapper($url)
{
	// Create a new cURL resource
	$ch = curl_init();	
	$headers = array();
	$headers[] = 'Content-Type: text/html';
	
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,0);
	curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	
		
	// Grab URL and pass it to the browser
	$html = curl_exec($ch);
	
	// Check for errors and display the error message, added 11/1/2016
	if($errno = curl_errno($ch)) {
		$error_message = curl_strerror($errno);
		echo "cURL error ({$errno}):\n {$error_message}";
	}		
	
	// Close cURL resource, and free up system resources
	curl_close($ch);
	
	return $html;
}

?>
<?php $subnav = get_field('vsoe_show_subnavigation'); ?>

<div id="viterbi-faculty">


	<?php if (has_post_thumbnail( $post->ID)) : ?>

		<div class="x-container faculty-image-header" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
			<div class="faculty-directory-page">
				<div class="x-container max width faculty-directory">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>

	<?php else : ?>
	<?php if ( x_get_option( 'x_breadcrumb_display' ) ) : ?>
	<div class="x-container max width offset faculty-directory" style="margin-bottom: 0;">
		<?php x_breadcrumbs(); ?>
	</div>
	<?php endif; ?>

		<div class="x-container max width offset faculty-directory" style="margin-top: 20px;">
			<div class="faculty-directory-page">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>

	<?php endif;

	if ($subnav == 1) { echo get_field('vsoe_select_subnavigation'); }

	if ($subnav == 0) { echo '&nbsp;<br />'; } ?>

	<div class="x-container">

		<div class="faculty-directory-page">

			<div class="x-main full" id="main" role="main">

				<?PHP

					$local_dept = get_field('vsoe_local_department');
					$global_dept = get_field('vsoe_department', 'option');		// Because the field is a site setting, it needs the 'option' parameter
					
					if(isset($local_dept) and $local_dept)
						$dept = $local_dept;
					else if(isset($global_dept) and $global_dept)
						$dept = $global_dept;
					else
						$dept = 0;

					$custom_faculty_directory = get_field('vsoe_fd_display_type');
					
					$research_area_ee = get_field('research_area_ame');	
					$research_area_aste = get_field('research_area_aste');	
					$research_area_bme = get_field('research_area_bme');	
					$research_area_chems = get_field('research_area_chems');	
					$research_area_cee = get_field('research_area_cee');	
					$research_area_cs = get_field('research_area_cs');	
					$research_area_ee = get_field('research_area_ee');	
					$research_area_ise = get_field('research_area_ise');	

					$toggle_name_keyword = get_field('toggle_name_keyword');
					$toggle_academic_unit = get_field('toggle_academic_unit');
					$toggle_affiliation_type = get_field('toggle_affiliation_type');
					$toggle_area_affiliation = get_field('toggle_area_affiliation');
					$toggle_research_center = get_field('toggle_research_center');
					$toggle_profile_link = get_field('toggle_profile_link');		// 0 - internal, 1 - external (Viterbi)
					
					$faculty_type = get_field('faculty_type');
					$research_centers = get_field('research_centers');
				    
					
					$after_header_text = get_field('vsoe_faculty_after_header_text');
					$before_footer_text = get_field('vsoe_faculty_before_footer_text');
					
					$fd_section_header = get_field('faculty_directory_section_header');
					$fd_section_header = urlencode($fd_section_header);
					
					if(!isset($toggle_name_keyword))
						$toggle_name_keyword = 1;
					if(!isset($toggle_academic_unit))
						$toggle_name_academic_unit = 0;
					if(!isset($toggle_affiliation_type))
						$toggle_name_affiliation_type = 1;
					if(!isset($toggle_area_affiliation))
						$toggle_area_affiliation = 1;
					
					/*echo '<pre>';
					echo 'POST';
					print_r($_POST);
					echo 'GET';
					print_r($_GET);
					echo '</pre>';
					*/
					/*
					echo 'DEBUG:<pre>';

					echo 'local_dept: ' . $local_dept . '<br />';
					echo 'global_dept: ' . $global_dept . '<br />';
					echo 'dept_id: ' . $dept . '<br />';

					echo 'custom faculty directory: ' . $custom_faculty_directory . '<br />';

					echo 'POST';
					print_r($_POST);
					echo 'GET';
					print_r($_GET);

					

					echo '<strong>Dept ID:</strong> ' . $dept;		
					echo '<hr />';		
					echo '<strong>Search Box Options</strong><br />';
					echo '<strong>Toggle Name - Keyword:</strong> '	. $toggle_name_keyword  . '<br />';
					echo '<strong>Toggle Academic Unit:</strong> '	. $toggle_academic_unit  . '<br />';
					echo '<strong>Toggle Affiliation Type:</strong> '	. $toggle_affiliation_type  . '<br />';
					echo '<strong>Toggle Area of Affiliation:</strong> '	. $toggle_area_affiliation  . '<br />';
					echo '<strong>Toggle Research Center:</strong> '	. $toggle_research_center  . '<br />';	
					echo '<strong>Toggle Profile Link:</strong> '	. $toggle_profile_link  . '<br />';	
					echo '<hr />';	
					
					if($research_area_ame)
					{
						echo '<strong>Area of Affiliation - AME:</strong><br />'	. $research_area_ame . '<br />';
						print_r($research_area_ame);
					}
					if($research_area_aste)
					{
						echo '<strong>Area of Affiliation - ASTE:</strong><br />'	. $research_area_aste . '<br />';
						print_r($research_area_aste);
					}
					if($research_area_bme)
					{
						echo '<strong>Area of Affiliation - BME:</strong><br />'	. $research_area_bme . '<br />';
						print_r($research_area_bme);
					}
					if($research_area_chems)
					{
						echo '<strong>Area of Affiliation - CHEMS:</strong><br />'	. $research_area_chems . '<br />';
						print_r($research_area_chems);
					}
					if($research_area_cee)
					{
						echo '<strong>Area of Affiliation - CEE:</strong><br />'	. $research_area_cee . '<br />';
						print_r($research_area_cee);
					}	
					if($research_area_cs)
					{
						echo '<strong>Area of Affiliation - CS:</strong><br />'	. $research_area_cs . '<br />';
						print_r($research_area_cs);
					}
					if($research_area_ee)
					{
						echo '<strong>Area of Affiliation - EE:</strong><br />';
						print_r($research_area_ee);
					}
					if($research_area_ise)
					{
						echo '<strong>Area of Affiliation - ISE:</strong><br />'	. $research_area_ise . '<br />';
						print_r($research_area_ise);
					}
					
					echo '<strong>Faculty Type(s):</strong><br />';
					print_r($faculty_type);
					echo '<strong>Research Center(s):</strong><br />';
					print_r($research_centers);
					echo '</pre>';
					echo '<br /><br />';

					*/
				    $filters = '';

					if(isset($_POST['namefaculty']))
						$fname = urlencode($_POST['namefaculty']);		// Name search, added urlencode(), 10/19/2017
					else
						$fname = '';
						
					if(isset($_POST['topic']))	 
						$topic = urlencode($_POST['topic']);			// Topic/Keyword Search, added urlencode(), 10/19/2017
					else
						$topic = '';

					if(isset($_POST['research_area']))
				        $researcharea_array = http_build_query($_POST['research_area'], 'researcharea_');
					else if(isset($research_area_ame) and $research_area_ame)
						$researcharea_array = http_build_query($research_area_ame, 'researcharea_');
					else if(isset($research_area_aste) and $research_area_aste)
						$researcharea_array = http_build_query($research_area_aste, 'researcharea_');
					else if(isset($research_area_bme) and $research_area_bme)
						$researcharea_array = http_build_query($research_area_bme, 'researcharea_');
					else if(isset($research_area_chems) and $research_area_chems)
						$researcharea_array = http_build_query($research_area_chems, 'researcharea_');
					else if(isset($research_area_cee) and $research_area_cee)
						$researcharea_array = http_build_query($research_area_cee, 'researcharea_');
					else if(isset($research_area_cs) and $research_area_cs)
						$researcharea_array = http_build_query($research_area_cs, 'researcharea_');
					else if(isset($research_area_ee) and $research_area_ee)
						$researcharea_array = http_build_query($research_area_ee, 'researcharea_');
					else if(isset($research_area_ise) and $research_area_ise)
						$researcharea_array = http_build_query($research_area_ise, 'researcharea_');
					else
						$researcharea_array = '';

					// New Research Area, D. Morita, 3/16/2018
					if(isset($_POST['research_center']))
				        $researchcenter_array = http_build_query($_POST['research_center'], 'researchcenter_');
					else if(isset($research_centers) and $research_centers)
				        $researchcenter_array = http_build_query($research_centers, 'researchcenter_');
					else
						$researchcenter_array = '';


					// Faculty type List, D. Morita, 8/30/2017
					if(isset($_POST['faculty_type']))
					   $facultytype_array = http_build_query($_POST['faculty_type'], 'facultytype_');
					else if(isset($faculty_type) and $faculty_type)
					   $facultytype_array = http_build_query($faculty_type, 'facultytype_');
					else
						$facultytype_array = '';
				
				    // Department List, D. Morita, 1/28/2021
				    if(isset($_POST['department']))
						$dept_array = http_build_query($_POST['department'], 'department_');
				    else 
						$dept_array = '';

					// For the direct links, D. Morita, 9/13/2017
					if(isset($_GET['adjunct-parttime']))
						$filters = 'adjunct-parttime';

					if(isset($_GET['adjunct']))		// Added, 10/19/2017
						$filters = 'adjunct';

					if(isset($_GET['emeritus']))	// Added, 10/19/2017
						$filters = 'emeritus';
					
					if(isset($_GET['joint']))
						$filters = 'joint';

					if(isset($_GET['parttime']))	// Added, 10/19/2017
						$filters = 'parttime';
					
					if(isset($_GET['research']))
						$filters = 'research';

					if(isset($_GET['teaching']))
						$filters = 'teaching';

					if(isset($_GET['clinical-practice']))
						$filters = 'clinical-practice';

					if(isset($_GET['teaching-practice']))
						$filters = 'teaching-practice';

					if(isset($_GET['tenured-tenuretrack']))
						$filters = 'tenured-tenuretrack';

					if(isset($_GET['visiting']))
						$filters = 'visiting';

					if(isset($_GET['tenured-joint']))
				            $filters = 'tenured-joint';

					if ($after_header_text) { echo '<div class="faculty-custom-text top">' . $after_header_text . '</div>'; }
					//echo '<div class="x-container max width offset" style="clear: both; width: 100%!important">' . $custom_text . '</div><br />';
					

					if($filters != '')
					{
						echo curl_wrapper("https://viterbi.usc.edu/directory/dept_faculty.php?dept_id=$dept&$filters");					
					}
					else
					{
						// Added &$facultytype_array, D. Morita, 8/30/2017
						echo curl_wrapper("https://viterbi.usc.edu/directory/dept_faculty.php?dept_id=$dept&fname=$fname&topic=$topic&$researcharea_array&$researchcenter_array&$facultytype_array&$dept_array&toggle_name_keyword=$toggle_name_keyword&toggle_academic_unit=$toggle_academic_unit&toggle_affiliation_type=$toggle_affiliation_type&toggle_area_affiliation=$toggle_area_affiliation&toggle_research_center=$toggle_research_center&custom_faculty_directory=$custom_faculty_directory&toggle_profile_link=$toggle_profile_link&fd_section_header=$fd_section_header$filters");
					}
					
					// faculty_directory_section_header=$faculty_directory_section_header&
					if ($before_footer_text) { echo '<div class="faculty-custom-text bottom"><hr style="margin-top: 0;" />' . $before_footer_text . '</div>'; }
				?>
			</div>  <!-- "x-main ful -->
		</div>  <!-- faculty-directory-page -->
	</div>  <!-- x-container max width offset faculty-director -->
</div>  <!-- viterbi-faculty -->

<?php get_footer(); ?>