<?php

// =============================================================================
// PAGE-CALENDAR.PHP
/* Template Name: Development Calendar */
// -----------------------------------------------------------------------------
// Handles output of individual pages.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's pages, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-page.php," where you'll be able to find the
// appropriate output.
// =============================================================================

?>

<?php get_header(); 

$cal = get_field('vsoe_calendar', 'option'); ?>

<div class="x-container max width offset faculty-directory">

  <?php if ( x_get_option( 'x_breadcrumb_display' ) ) :  x_breadcrumbs(); endif; ?>

  <div class="x-main full" id="main" role="main">

<script type="text/javascript">
// <![CDATA[
var themeRootDirectory = "";
// ]]>
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/scripts/jquery1.7.2.js"><\\/script>')</script>
<script src="/scripts/common.js"></script>
<!--[if lte IE 6]>
<script src="/scripts/supersleight.js"></script>
<![endif]-->
</head>
<body>
﻿<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/scripts/jquery1.7.2.js"><\\/script>')</script>

<link type="text/css" href="//viterbi.usc.edu/calendar/calendar_support/jquery-ui/css/custom-theme/jquery-ui-1.8rc3.custom.css" rel="stylesheet" />
<link href="/calendar/calendar_support/main.css" rel="stylesheet" type="text/css"></link>	
<script src="https://www.google.com/jsapi"></script>
<script type="text/javascript" charset="utf-8">
	google.load("jqueryui", "1.8.2");
</script>
<script type="text/javascript" src="/calendar/calendar_support/main.js"></script>
<div id="user_options"><ul id="cal_nav"><li><b>Subscribe:</b></li><li><a href="//viterbi.usc.edu/news/events/subscribe.htm" target="_parent" title="Subscribe to the weekly event notification email that goes out Monday morning."><img src="//viterbi.usc.edu/calendar/calendar_support/images/email_icon.gif" /></a></li><li><a href="//viterbi.usc.edu/calendar/calendar_support/subscribe.php?&amp;calendar=16" target="_blank"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical-icon-16.gif" alt="ical feed" title="iCal feed" /></a></li><li><a href="//viterbi.usc.edu/calendar/calendar_support/feed.php?&amp;calendar=16" target="_blank"><img src="//viterbi.usc.edu/calendar/calendar_support/images/feed-icon-16.gif" alt="rss feed" title="RSS feed" /></a></li><li><a href="//viterbi.usc.edu/resources/vit/services/calendar-tutorial.htm?#ImportEventGeneral" target="_blank"><img src="//viterbi.usc.edu/calendar/calendar_support/images/question-mark.png" alt="subscribe help" title="How to Subscribe to your personal calendars." /></a></li><li><a href="//viterbi.usc.edu/news/events/calendar_authenticate.php" target="_parent">Login</a></li></ul></div>
<div id="content">

<div id="event_type_filter">
<h4>Select a calendar:</h4>
<form method="get" action="">
	<select id="calendar_sel" name="calendar" onChange="this.form.submit()"><option value=""> - all calendars - </option><option value="3" >Aerospace and Mechanical Engineering</option><option value="22" >Alfred E Mann Institute</option><option value="23" >Astronautical Engineering</option><option value="21" >Aviation Safety and Security Program</option><option value="4" >Biomedical Engineering</option><option value="19" >Center for Engineering Diversity</option><option value="7" >Computer Science</option><option value="8" >Daniel J. Epstein Department of Industrial and Systems Engineering</option><option value="24" >Executive Education</option><option value="10" >Information Sciences Institute</option><option value="18" >Information Technology Program(ITP)</option><option value="11" >Integrated Media Systems Center</option><option value="2" >Ming Hsieh Department of Electrical Engineering</option><option value="9" >Mork Family Department of Chemical Engineering and Materials Science</option><option value="6" >Sonny Astani Department of Civil and Environmental Engineering</option><option value="27" >Systems Architecting and Engineering</option><option value="1" >USC Viterbi School of Engineering</option><option value="14" >Viterbi School of Engineering Alumni</option><option value="13" >Viterbi School of Engineering Career Connections</option><option value="26" >Viterbi School of Engineering Doctoral Programs</option><option value="16" selected="">Viterbi School of Engineering Graduate Admission</option><option value="28" >Viterbi School of Engineering Masters Programs</option><option value="25" >Viterbi School of Engineering Pre-College Programs  </option><option value="15" >Viterbi School of Engineering Student Affairs</option><option value="5" >Viterbi School of Engineering Student Organizations</option><option value="17" >Viterbi School of Engineering Undergraduate Admission</option></select>    <input type="hidden" name="date" id="date" value="08/15/2017" />
</form><br /><br />                    

<h4>Filter August Events by Event Type:</h4>
    <ul><li><a  href="?calendar=16&event_type=4" title="View Workshops & Infosessions Events">Workshops & Infosessions (8)</a></li></ul></div>

<div id="calendar">
    <div id="cal_top">
    <div class="mt">
        <input type="hidden" name="day_num" id="day_num" value="15" />
        <select class="date_drop" name="month_num" id="month_num"> 
		<option value="01" >January</option> 
		<option value="02" >February</option> 
		<option value="03" >March</option> 
		<option value="04" >April</option> 
		<option value="05" >May</option> 
		<option value="06" >June</option> 
		<option value="07" >July</option> 
		<option value="08" selected="">August</option> 
		<option value="09" >September</option> 
		<option value="10" >October</option> 
		<option value="11" >November</option> 
		<option value="12" >December</option> 
		</select> 
		<select class="date_drop" name="year" id="year"> 
    	<option value="2015" >2015</option><option value="2016" >2016</option><option value="2017" selected="">2017</option><option value="2018" >2018</option><option value="2019" >2019</option>	</select> 
        </div>
        <div class="pm">
                <a href="?calendar=16&date=07/15/2017" title="previous month">&lt;&lt; Previous Month</a>
                </div>
        
        <div class="nm">
        <a href="?calendar=16&date=09/15/2017" title="next month">Next Month &gt;&gt;</a><br />
        </div>
        <br />
    </div>
    <div id="cal_gutter">
        <div id="cal_days"><small>SUN</small><small>MON</small><small>TUE</small><small>WED</small><small>THU</small><small>FRI</small><small>SAT</small><br class="clearleft" /></div>
        <div id="cal_dates" class="this_month">
        <div class="cal_week"><div class="not_month">30</div><div class="not_month">31</div><div class="">1</div><div class="">2</div><div class=""><a href="?date=08/03/2017&calendar=16&" >3<br />(1)</a></div><div class="">4</div><div class=""><a href="?date=08/05/2017&calendar=16&" >5<br />(1)</a></div><br /></div><div class="cal_week"><div class=""><a href="?date=08/06/2017&calendar=16&" >6<br />(1)</a></div><div class="">7</div><div class=""><a href="?date=08/08/2017&calendar=16&" >8<br />(1)</a></div><div class=""><a href="?date=08/09/2017&calendar=16&" >9<br />(1)</a></div><div class="">10</div><div class=""><a href="?date=08/11/2017&calendar=16&" >11<br />(1)</a></div><div class=""><a href="?date=08/12/2017&calendar=16&" >12<br />(1)</a></div><br /></div><div class="cal_week"><div class="">13</div><div class="">14</div><div class="today_date">15</div><div class="">16</div><div class="">17</div><div class="">18</div><div class="">19</div><br /></div><div class="cal_week"><div class="">20</div><div class="">21</div><div class="">22</div><div class=""><a href="?date=08/23/2017&calendar=16&" >23<br />(1)</a></div><div class="">24</div><div class="">25</div><div class="">26</div><br /></div><div class="cal_week"><div class="">27</div><div class="">28</div><div class="">29</div><div class="">30</div><div class="">31</div><div class="not_month">1</div><div class="not_month">2</div><br /></div>        <span class="clear"></span>
        </div>
    </div>
    <div id="event_views" class="clearleft center" style="padding-top:4px;margin-bottom:5px;">
        <ul>
        <li>View Events for:</li>
        <li><a href="?calendar=16&">Today</a></li>
        <li><a href="?week&calendar=16&">The Week</a></li>
        <li><a href="?month&calendar=16&">The Month</a></li>
        </ul>
    </div>
</div>

<br />
<div id="events">
<h2>Events for August</h2><ul><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">03</a></p></div>
	<h3><a href="?event=15614#user_options">USC Graduate Engineering Info Session: Chennai, India</a></h3><div class="event_stats"><p><strong>Thu, Aug 03, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<a href="https://www.eventbrite.com/e/graduate-engineering-information-session-chennai-registration-36095227798" target="blank"> Register to Attend</a></blockquote><p>Location: The Raintree Anna Salai 636, Anna Salai Teynampet Chennai<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Chennai%2C+India&dates=20170803T150000/20170803T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%3Ca+href%3D%22https%3A%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-chenn&location=+The+Raintree+Anna+Salai+636%2C+Anna+Salai+Teynampet+Chennai&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15614&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15614&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">05</a></p></div>
	<h3><a href="?event=15615#user_options">USC Graduate Engineering Info Session: Bangalore, India</a></h3><div class="event_stats"><p><strong>Sat, Aug 05, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<a href="https://www.eventbrite.com/e/graduate-engineering-information-session-bangalore-registration-35997048140" target="blank"> Register to Attend</a></blockquote><p>Location: Hyatt Bangalore M.G Road 1/1, Swami Vivekananda Road, Someshwarpura, Ulsoor, Bangalore<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Bangalore%2C+India&dates=20170805T150000/20170805T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%3Ca+href%3D%22https%3A%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-banga&location=+Hyatt+Bangalore+M.G+Road+1%2F1%2C+Swami+Vivekananda+Road%2C+Someshwarpura%2C+Ulsoor%2C+Bangalore&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15615&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15615&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">06</a></p></div>
	<h3><a href="?event=15616#user_options">USC Graduate Engineering Info Session: Mumbai, India</a></h3><div class="event_stats"><p><strong>Sun, Aug 06, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<a href="https://www.eventbrite.com/e/graduate-engineering-information-session-mumbai-registration-36095497605" target="blank">Register to Attend</a></blockquote><p>Location: Courtyard by Marriott International Airport, C.T.S No 215 Andheri Kurla Road Andheri East, Mumbai<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Mumbai%2C+India&dates=20170806T150000/20170806T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%3Ca+href%3D%22https%3A%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-mumba&location=+Courtyard+by+Marriott+International+Airport%2C+C.T.S+No+215+Andheri+Kurla+Road+Andheri+East%2C+Mumbai&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15616&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15616&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">08</a></p></div>
	<h3><a href="?event=15617#user_options">USC Graduate Engineering Info Session: Pune, India</a></h3><div class="event_stats"><p><strong>Tue, Aug 08, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<a href="https://www.eventbrite.com/e/graduate-engineering-information-session-pune-registration-36092244876" target="blank"> Register to Attend</a></blockquote><p>Location: Grand Sheraton Pune Bund Garden Hotel, Raja Bahadur Mill Rd., Sangamvadi, Pune<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Pune%2C+India&dates=20170808T150000/20170808T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%3Ca+href%3D%22https%3A%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-pune-&location=+Grand+Sheraton+Pune+Bund+Garden+Hotel%2C+Raja+Bahadur+Mill+Rd.%2C+Sangamvadi%2C+Pune&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15617&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15617&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">09</a></p></div>
	<h3><a href="?event=15618#user_options">USC Graduate Engineering Info Session: Delhi, India</a></h3><div class="event_stats"><p><strong>Wed, Aug 09, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<br />
<a href="//www.eventbrite.com/e/graduate-engineering-information-session-delhi-registration-36220095280?ref=ebtn">Register to Attend</a><br />
</blockquote><p>Location: Le Meridien Delhi  Windsor Place  Delhi, Delhi  110 001<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Delhi%2C+India&dates=20170809T150000/20170809T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%0D%0A%3Ca+href%3D%22%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-delhi-r&location=+Le+Meridien+Delhi++Windsor+Place++Delhi%2C+Delhi++110+001&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15618&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15618&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">11</a></p></div>
	<h3><a href="?event=15619#user_options">USC Graduate Engineering Info Session: Ahmedabad, India</a></h3><div class="event_stats"><p><strong>Fri, Aug 11, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<br />
<a href="//www.eventbrite.com/e/graduate-engineering-information-session-ahmedabad-tickets-35973073431?ref=ebtn">Register to Attend</a><br />
</blockquote><p>Location: Hyatt Ahmedabad, Plot 216, TPS 1, Near Vastrapur Lake, Vastrapur, Ahmedabad, Gujarat 380015<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Ahmedabad%2C+India&dates=20170811T150000/20170811T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%0D%0A%3Ca+href%3D%22%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-ahmedab&location=+Hyatt+Ahmedabad%2C+Plot+216%2C+TPS+1%2C+Near+Vastrapur+Lake%2C+Vastrapur%2C+Ahmedabad%2C+Gujarat+380015&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15619&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15619&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">12</a></p></div>
	<h3><a href="?event=15620#user_options">USC Graduate Engineering Info Session: Hyderabad, India</a></h3><div class="event_stats"><p><strong>Sat, Aug 12, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<br />
<a href="//www.eventbrite.com/e/graduate-engineering-information-session-hyderabad-registration-36092114486?ref=ebtn">Register to Attend</a><br />
</blockquote><p>Location: Park Hyatt Hyderabad  Road No 2, Banjara Hills   Banjara Hills, Hyderabad, Telangana   500 034<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Hyderabad%2C+India&dates=20170812T150000/20170812T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%0D%0A%3Ca+href%3D%22%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-hyderab&location=+Park+Hyatt+Hyderabad++Road+No+2%2C+Banjara+Hills+++Banjara+Hills%2C+Hyderabad%2C+Telangana+++500+034&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15620&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15620&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li><li><div class="cal_icon"><p class="month"><a href="#">Aug</a></p><p class="day"><a href="#">23</a></p></div>
	<h3><a href="?event=15621#user_options">USC Graduate Engineering Info Session: Kochi, India</a></h3><div class="event_stats"><p><strong>Wed, Aug 23, 2017 @ 03:00 PM - 04:30 PM</strong></p><p>Viterbi School of Engineering Graduate Admission</p><p>Workshops & Infosessions</p></div><br />
<blockquote>This event will be hosted by Sudha Kumar, Director of the USC India Office, and special guest Kelly Goulis, Senior Associate Dean for graduate programs at the USC Viterbi School of Engineering. Candidates with a strong academic background and a Bachelor's degree in engineering, computer science, applied mathematics, or physical science (such as physics, biology, or chemistry) are welcome to attend<br />
<br />
Each information session will include a presentation on:<br />
<br />
- Master's & Ph.D. Programs in Engineering and Computer Science<br />
- How to Apply<br />
- Scholarships and Funding<br />
- Student Life at USC and in Los Angeles<br />
-Application Tips<br />
<br />
There will also be sufficient time for questions during the information session. In order to guarantee seating availability, we request completion of the online registration form using the Registration link below<br />
<br />
<a href="//www.eventbrite.com/e/graduate-engineering-information-session-kochi-registration-36240390985?ref=ebtn">Register to Attend</a><br />
</blockquote><p>Location: Kochi Marriott Hotel, Lulu Int’l Shopping Mall Pvt. Ltd.,  34/1111,N.H. 47 Edappally,  Kochi 682 024<p>Audiences: Everyone Is Invited</p>
<p>Posted By: <a href="mailto:india@gapp.usc.edu" title="Send Email to USC Viterbi Graduate & Professional Programs">USC Viterbi Graduate & Professional Programs</a></p>
<div class="downloadicons"><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=USC+Graduate+Engineering+Info+Session%3A+Kochi%2C+India&dates=20170823T150000/20170823T163000&details=This+event+will+be+hosted+by+Sudha+Kumar%2C+Director+of+the+USC+India+Office%2C+and+special+guest+Kelly+Goulis%2C+Senior+Associate+Dean+for+graduate+programs+at+the+USC+Viterbi+School+of+Engineering.+Candidates+with+a+strong+academic+background+and+a+Bachelor%27s+degree+in+engineering%2C+computer+science%2C+applied+mathematics%2C+or+physical+science+%28such+as+physics%2C+biology%2C+or+chemistry%29+are+welcome+to+attend%0D%0A%0D%0AEach+information+session+will+include+a+presentation+on%3A%0D%0A%0D%0A-+Master%27s+%26+Ph.D.+Programs+in+Engineering+and+Computer+Science%0D%0A-+How+to+Apply%0D%0A-+Scholarships+and+Funding%0D%0A-+Student+Life+at+USC+and+in+Los+Angeles%0D%0A-Application+Tips%0D%0A%0D%0AThere+will+also+be+sufficient+time+for+questions+during+the+information+session.+In+order+to+guarantee+seating+availability%2C+we+request+completion+of+the+online+registration+form+using+the+Registration+link+below%0D%0A%0D%0A%3Ca+href%3D%22%2F%2Fwww.eventbrite.com%2Fe%2Fgraduate-engineering-information-session-kochi-r&location=+Kochi+Marriott+Hotel%2C+Lulu+Int%E2%80%99l+Shopping+Mall+Pvt.+Ltd.%2C++34%2F1111%2CN.H.+47+Edappally%2C++Kochi+682+024&trp=false&sprop=" target="_blank"><img src="https://www.google.com/calendar/images/ext/gc_button6.gif" border=0></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15621&outlook"><img src="//viterbi.usc.edu/calendar/calendar_support/images/outlook.png" alt="Outlook" /></a><a href="//viterbi.usc.edu/calendar/calendar_support/ical.php?event_id=15621&ical"><img src="//viterbi.usc.edu/calendar/calendar_support/images/ical.png" alt="iCal"  /></a></div></li></ul></div>
<br />
<br /></div>
<div id="dialog"></div>


  </div>

</div>


<?php get_footer(); ?> 
