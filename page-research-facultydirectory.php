<?php

// =============================================================================
// PAGE.PHP
// Template Name: Directory for Research Faculty 
// -----------------------------------------------------------------------------
// Handles output of individual pages.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's pages, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-page.php," where you'll be able to find the
// appropriate output.
// =============================================================================

// THis is DANA

get_header(); ?>

<div class="x-container max width offset faculty-directory">

    <div class="<?php x_main_content_class(); ?>" id="main" role="main">

<!-- Start Directory Faculty Listing Code -->

<?PHP
  $_POST['department'] = array();
  array_push($_POST['department'],'Ming Hsieh Department of Electrical Engineering');
?>

    <div class="contentDetail">
        <div class = "searchModule">
            <form action = "<?php echo $_SERVER['REQUEST_URI']; ?>" method = "post" id = "search">
                <div class = "searchContainer" >
                    <div class = "bySearch">
                    <?php
                    if(!isset($_POST['namefaculty']))
                    {
                    $_POST['namefaculty'] = ""; 
                    }
                    if(!isset($_POST['topic']))
                    {
                    $_POST['topic'] = ""; 
                    }
                    if(!isset($_POST['department']) )
                    {
                    $_POST['department'] = array(); 
                    }
                    echo"<h4> By Name </h4>";
                    echo "<input type = 'text' name = 'namefaculty' size = '28' value = '".$_POST['namefaculty']."'/>";
                    ?>
                    </div>
                    <div class = "bySearch">
                        <?php
                        echo "<h4> By Topic/Keyword </h4>";
                        echo "<input type = 'text' name = 'topic' size = '28' value = '".$_POST['topic']."'/>";
                        ?>
                    </div> 
                </div>
                
<!-- Catgory div was here -->


                    <div class = "submissionButton">
                        <input type ="submit" name = "submit" value = "Search Faculty" class="findfaculty">
                        <a href="#" class = "tooltip" title="Choose a category or type a name or keyword to search through faculty." onclick = "showtip('tooltip')"><span>Search Tips</span></a>
                        <span id = "tooltip" style="display:none;">Choose a category or type a name or keyword to search through faculty.</span>
                        <script type = "text/javascript">
                        function showtip(id)
                        {
                        var e = document.getElementById(id);
                        if(e.style.display == 'block')
                            e.style.display = 'none';
                        else
                            e.style.display = 'block';
                        }
                        </script>
                </div>
            </form>             
            
        </div> <!--ENDS: search module -->
    </div> <!-- End of contentDetail -->
    <p></p> <!--SPACE BREAK --> 
    <br />
    <hr>  
    <br />

    <div class = "contentDetail"> 
        <div class = "resultsModule">
            <?php
            if(!$xml = simplexml_load_file("http://viterbi.usc.edu/directory/xml/directory.xml"))
            {
                exit("Error: Issue with the database."); 
            }
            ?>
            <table id = "results" border="0">
                <?php
                $counter = 0; 
                //input check, no point in doing a search if there is no input
                if(!empty($_POST['namefaculty']) || (count($_POST['department']) >= 0) || !empty($_POST['topic'])) 
                {
                    $maxCounter = count($xml->xpath('//faculty')); 
                    if(!empty($_POST['topic'])) //Only load the research xml if you 
                    {
                        if(!$keywords = simplexml_load_file('http://viterbi.usc.edu/directory/xml/research.xml'))
                        {
                        exit("Error: Issue with the database."); 
                        }
                    }
                foreach($xml->xpath('//faculty') as $facultyMember)
                {   
                    if(!$facultyMember->fname) //If no first name, move on
                    {
                    continue; 
                    }
                    $currentFullName = $facultyMember->fname." ".$facultyMember->mname." ".$facultyMember->lname; 
                    $namematch = false; 
                    $deptmatch = false; 
                    $topicmatch = false; 
                    $tenure = false; 
                    $id = $facultyMember->attributes();
                    $id = $id['id']; 
                    $arrayofnameinput = (explode(" ", $_POST['namefaculty']));
                    $arrayofFacultyDepartments = array(); 
                    //comparing departments of faculty member to checkboxed departments
                    if(isset($facultyMember->appointments) && (count($_POST['department']) > 0) ) 
                    {

                        if(isset($facultyMember->appointments->appointment) && count($_POST['department']) >= 0)
                        {
                            foreach($facultyMember->appointments->appointment as $appointment)
                            { 
                                if(stristr($appointment->department, "Electrical Engineering") !== FALSE)
                                {
                                    array_push($arrayofFacultyDepartments, "Ming Hsieh Department of Electrical Engineering"); 
                                    $deptmatch = true;	// D. Morita, added for EE, 2/8/2017
                                }
                                else
                                {
                                    array_push($arrayofFacultyDepartments, $appointment->department); 
                                }
                            }
                            $categoryIntersect = array_intersect($arrayofFacultyDepartments,$_POST['department'] ); 
                        }
                        if(count($categoryIntersect) > 0)
                        {
                        $deptmatch = true; 
                        }
                    }

                    if(count($_POST['department']) == 0)
                    {
                        $deptmatch = true; 
                    }

                    //searching through name for name keyword   
                    if(isset($_POST['namefaculty']))
                    {
                        foreach ($arrayofnameinput as $tempChecker)
                        {
                            if(stripos($currentFullName, $tempChecker) !== false )
                            {
                            $namematch = true; 
                            break; 
                            }
                        }
                    }

                    if(empty($_POST['namefaculty']))
                    {
                    $namematch = true; 
                    }

                    if(isset($facultyMember->tenure_type))
                    {
                    	if (((string)$facultyMember->tenure_type === 'T') || ((string)$facultyMember->tenure_type === 'TT') || ((string)$facultyMember->tenure_type === 'NTT')) {
                    		$tenure = true; 
                    	}
                    }

                    if(empty($_POST['topic']) || !isset($_POST['topic']))
                    {
                    $topicmatch = true;
                    }
                    else
                    {
                        $keywordArray = explode(" ", $_POST['topic']); //split search input into array
                        $facultyMemberTopics = $keywords->xpath("//faculty[@id='".$id."']");
                        if(count($facultyMemberTopics) > 0 )
                        {
                            $contents = $facultyMemberTopics[0]->bio." ".$facultyMemberTopics[0]->research;
                            foreach($keywordArray as $query)
                            {
                                $pos = stripos($contents,$query);
                                if($pos !== false)
                                {
                                    $topicmatch = true;
                                    break; 
                                }
                                else
                                {
                                    $topicmatch = false; 
                                }
                            }
                        }
                    }    
             
                    //Only print in these cairo_font_options_set_subpixel_order(options, subpixel_order)
                    //echo "NAME:".$namematch."DEPT:".$deptmatch."TOPIC".$topicmatch."SUBMIT:".$_POST['submit']."<br>"; 
                    if($namematch && $deptmatch && $topicmatch && $tenure)
                    { 
                        if($counter%3 == 0)
                        {
	                        echo "<tr>";
                        }
    
	                    echo "<td style=\"width:33%\">";
											
						// Convert the URLs to display correctly
						$facultyMember_lname = str_replace("-", "_", $facultyMember->lname);
						$facultyMember_fname = str_replace("-", "_", $facultyMember->fname);

						$facultyMember_lname = str_replace("'", "_", $facultyMember_lname);
						$facultyMember_fname = str_replace("'", "_", $facultyMember_fname);

						$facultyMember_lname = str_replace('.', "_", $facultyMember_lname);
						$facultyMember_fname = str_replace('.', "_", $facultyMember_fname);

						$facultyMember_lname = str_replace(' ', "_", $facultyMember_lname);
						$facultyMember_fname = str_replace(' ', "_", $facultyMember_fname);


                        //echo "<a href = '/directory/faculty/".$facultyMember_lname."/".$facultyMember_fname."'>";
                        echo "<a href = '/directory/faculty/profile/?lname=".$facultyMember_lname."&amp;fname=".$facultyMember_fname."'>";
                        
	                if(isset($facultyMember->headshot))
                        {
                            echo "<img src= '//viterbi.usc.edu/directory/images/".$facultyMember->headshot."' alt = 'No Picture Available'>"; 
                        }
                        else
                        {
                            echo "<img src= '//viterbi.usc.edu/directory/images/noprofile.png' alt = 'No Picture Available'>"; 
                        }
                        echo "</a>"; 
                        echo "<div>";

												
                        //echo "<a href = '/directory/faculty/".$facultyMember_lname."/".$facultyMember_fname."'>";
                        echo "<a href = '/directory/faculty/profile/?lname=".$facultyMember_lname."&amp;fname=".$facultyMember_fname."'>";

                        //echo "<a href = 'profile.php?faculty=".$facultyMember->xml."'>";
                        echo "<h5 class = \"resultName\">".$facultyMember->fname;
                        if(!empty($facultyMember->mname))
                        {
                            echo " ".$facultyMember->mname;
                        }
                        echo " ".$facultyMember->lname."</h5>"; 
                        echo "</a>";
                        echo "<div>";

echo $facultyMember->academic_title;

/*
                        if(isset($facultyMember->appointments->appointment ))
                        {
                            foreach($facultyMember->appointments->appointment as $appointment)
                            {
                                if(isset($appointment->department))
                                {
                                    echo $appointment->department; 
                                    echo "<br>";
                                }
                            }
                        }
*/
                        echo "</div>"; 
                        echo "</div>";
						
						
						
                        echo "</td>";

                        if($counter%3 == 1 || $counter == $maxCounter-1)
                        {
                          //  echo "</tr>";
                        }
                        $counter++;     
                    }
                } //End of the giant For each
                } //End of giant if-statement
                if($counter == 0 && isset($_POST['submit']))
                {
                    echo "<h5 style = 'margin:0 40%'>No Results</h5>"; 
                }
                ?>
            </table>                                                                    
        </div>  <!-- ENd of Results Module -->
        </div> <!-- End of Second ContentDetails -->
    </div> <!-- End of Col Main --> 
<style>
    .searchModule
    {
        margin: 5px 0;
        width:100%; 
        height:160px; 
    }

    .bySearch
    {
        float:right;
        clear:both;
        height:50%;
        width:100%; 
        padding: 0;
    }

    .searchContainer
    {
        float:left;
        width:35%;
        height:75%; 
    }

    .byCategory
    {
        float:left;  
        height:60%; 
        width:65%;
    }

    .searchContainer h4
    {
        font-size: .85em;
        margin: 0px !important;
    }

    .byCategory .leftCategory,.byCategory .rightCategory
    {
        float:left;
        margin:5px 5px; 
        padding: 0;
		width: 32%;
    }

    .byCategory .rightCategory
    { 
        float:right;
    }

    .byCategory label
    {
        display:block;
        vertical-align:middle;
        margin: 3px;  
    }

    .byCategory label input
    {
        margin: 3px;  
        vertical-align:middle;
    }

    .categories
    {
        height: 100%; 
        width:100%; 
        border: 2px solid grey; 
    }

    .submissionButton
    {   
        width:25% !important; 
        height:10% !important; 
    }

   .resultsModule
    {
        height1:3000px;
        width:100%; 
        overflow-y1:auto;
    }

    #results
    {
        width:100%;
        table-layout: fixed;
    }

    #results tr
    {
        height:175px; 
        overflow: hidden;
    }

    #results td
    {   
        padding: 0 2px 0 0 ;
        margin:0;
        height:175px;
        width:33.3%;
		vertical-align: text-top;
    }

    #results td div div
    {
        font-size:.9em;
        float:left;
        width:47%;
        margin-left:3px;
    }

    #results tr td div a h5
    {
        float:left;
        font-size: .85em;
        margin-left:3px;
        display:inline; 
        width:47%;
        word-wrap:break-word;
    }
	
    #results td img
    {

        float:left;
        height:130px;
        width:130px;  
		margin-right: 5px;
    }

    .resultName
    {
        margin:0;
        padding:0;
        clear: none;
    }
    /* Everything for the Faculty profile */

    .profileModule

    {

        margin: 5px;

        width:100%; 
    }

    .profileModule>div>img

    {

        max-width:100%;

        max-height:100%; 

    }

    .profileModule ul 

    {

        list-style: none; 

    }

    .profileImage

    {
        float:left;
        height:150px;
        width:150px; 
        margin-right: 5px;
    }
    .profileImage img
    {
        height:150px;
        width:150px;
    }

    .contactInformation

    {

        float:right;    

        height:400px;

        width:30%; 

        padding:1em 1em; 

        margin: 0 0 1em 1em;

        background:#A8A8A8; 
    }
    .contactInformation h6
    {
        margin:0;
    }

    .education-piece

    { 

        width:31%;

        float:left; 

        margin:0; 

        padding:5px 5px;

    }

    .biography-piece,.research-piece,.awards-piece,.byCategory label,.byCategory input,.profileModule ul 

    {
        margin:0;
        padding:0;

    }
    .research-piece
    {
        overflow:auto;
    }
    .research-piece p

    {
        float:left; 
    }
    .research-piece>p>img
    {
        float:left; 
        width:30%; 
        height:170px;
        margin:10px 5px;
    }
	
	.findfaculty {
    font-size: 14px !important;
    background: #990000 !important;
    font-weight: 300 !important;
    color: #fff !important;
    text-transform: uppercase !important;
    padding: 5px 10px !important;
    border: none !important;
    outline: none !important;
    border-radius: 4px !important;
	margin-right: 10px !important;
	margin-bottom: 100px !important;
	}
	
	.tooltip
	{
		z-index: 500;
		position: relative;
    	left: 0px;
	    top: 0px;	
	}
    </style>
</table>                                                                    
</div>  
</div> 


<!-- End Directory Faculty Listing Code -->
</div>
</div>
<?php get_footer(); ?>