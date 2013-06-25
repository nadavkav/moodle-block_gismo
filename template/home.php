<?php
    // libraries & acl
    require_once "common.php";
?>
<div id="app_content">
    <div id="left_menu">
        <div id="lm_header" class="ct_header">
            <!-- Users / Resources / Assignments / Quizzes menu -->
            <img class="image_link" id="close_control" src="images/close.png" alt="Hide menu" title="Hide menu" style="float: right; margin: 0; padding: 0;" onclick="javascript:g.lm.hide();" />
            <img class="image_link" id="left_menu_info" src="images/left_menu_info.gif" alt="Show details" title="Show details" style="float: right; margin-right: 15px;"  onclick="javascript:g.lm.show_info();" />
        </div>
        <div id="lm_content"><!-- Users / Resources / Assignments / Quizzes lists --></div>    
    </div>
    <div id="chart">
        <div id="ch_header" class="ct_header">
            <img class="image_link" id="open_control" src="images/open.png" alt="Show menu" title="Show menu" style="float: left; margin: 0; padding: 0; margin-right: 5px; display: none;" onclick="javascript:g.lm.show();" />
            <div id="course_name">
            </div>
            <div id="title"><!-- Chart title --></div>
        </div>
        <div id="ch_content">
            <div id="error_message">
                <div id="title"></div>
                <p id="message"></p>
            </div>
            <div id="processing">
                <div id="p_img"><img src="images/processing.gif" alt="Processing data" /></div>
                <p id="p_message">Processing data, please wait!</p>
            </div>
            <div id="plot_container">
                <div id="plot">
                    <!-- Chart -->
                </div>
            </div>
            <div id="welcome_page">
                <h1 align="center">Welcome to GISMO</h1>
		<div style="margin: 0 auto; text-align: center;">
<!--		
			<p>
				GISMO is a graphical interactive monitoring tool that provides useful visualization of students' activities in online courses to instructors. With GISMO instructors can examine various aspects of distance students, such as the attendance to courses, reading of materials, submission of assignments. Users of the popular learning management system Moodle may benefit from GISMO for their teaching activities. With respect to the standard reports provided by Moodle (which basically allow teachers to see if an individual student has viewed a specific resource or participated on a specific activity on a specific day), GISMO provides comprehensive visualizations that gives an overview of the whole class, not only a specific student or a particular resource. With GISMO, instructors can perform analysis of the whole class, and may have a "clear picture" of what the class is doing, or has done in a period in the past.
			</p>
			<h1>Some of GISMO visualizations</h1>
			<p>
				There are some screenshots that may give you a basic idea about the visualizations that can be created by GISMO. These pictures are described in the help page that is available from the main menu on the top of GISMO user interface.

				<table align="center">
					<tr>
						<td><img src="images/help/slider_activities_assignments.png" width="480" height="360" border="0" alt="" /></td>
						<td><img src="images/help/slider_resources_accesses_overview.png" width="480" height="360" border="0" alt="" /></td>
					</tr>
					<tr>
						<td><div class="ss_caption">Activities: assignments overview</div></td>
						<td><div class="ss_caption">Resources: accesses overview</div></td>
					</tr>
					<tr>
						<td> <img src="images/help/slider_resources_students_overview.png" width="480" height="360" border="0" alt="" /></td>
						<td><img src="images/help/slider_students_accesses_overview_on_resources.png" width="480" height="360" border="0" alt="" /></td>
					</tr>
					<tr>
						<td><div class="ss_caption">Resources: students overview</div></td>
						<td><div class="ss_caption">Students: accesses overview on resources</div></td>
					</tr>
					<tr>
						<td><img src="images/help/slider_students_accesses_overview.png" width="480" height="360" border="0" alt="" /></td>
						<td><img src="images/help/slider_students_accesses_by_students.png" width="480" height="360" border="0" alt="" /></td>
					</tr>
					<tr>
						<td><div class="ss_caption">Students: accesses overview</div></td>
						<td><div class="ss_caption">Students: accesses by students</div></td>
					</tr>
				</table>
			</p>
-->			
			<p>
			<h3>[EN]</h3>
			GISMO is a graphical interactive student monitoring and tracking system tool that extracts tracking data from the Moodle Course Management System. It generates also useful graphical representations that can be explored by course instructors and students to get an overview of the learning activities.<br />
Please select one of the menus on the top of this page to start using GISMO.<br />
If you would like to have a look at the tutorial please click on the menu "Help"> "Tutorial".<br />
			<p>
			
			<p>
			<h3>[DE]</h3>	
			<?php print(htmlentities("GISMO ist ein grafisches, interaktives System, das über ein Tool, Tracking-Daten aus dem Moodle Course Management-System extrahiert, mit denen Dozierende und Studierende ihre Aktivitäten überwachen können.")); ?><br />
<?php print(htmlentities("Wählen Sie ein Menü zuoberst auf dieser Seite aus um GISMO zu starten.")); ?><br />
<?php print(htmlentities('Wenn Sie die Tutorials anschauen möchten, klicken Sie bitte auf das Menü "Hilfe" > "Tutorials".')); ?><br />
			</p>

			<p>
			<h3>[FR]</h3>	
			<?php print(htmlentities("GISMO est un système graphique interactif servant d'outil de contrôle et de suivi d'étudiant, celui-ci extrait les données de suivi à partir du système de gestion de cours Moodle. Il produit également des représentations graphiques très utiles qui peuvent être examinées par les enseignants et les étudiants afin d'obtenir un aperçu général des activités d'apprentissage.")); ?><br />
<?php print(htmlentities("S'il vous plaît sélectionner un des menus en haut de cette page pour commencer à utiliser GISMO.")); ?><br />
<?php print(htmlentities('Si vous souhaitez regarder au tutoriel s\'il vous plaît cliquer sur le menu "Aide" > "Tutorial".')); ?><br />
			</p>

			<p>
			<h3>[IT]</h3>	
			GISMO &egrave uno strumento di monitoraggio interattivo degli studenti, che si basa sui dati di traccimanto delle attivita del Course Management System Moodle. Esso genera anche delle utili rappresentazioni grafiche che possono essere analizzate dal docente del corso e dagli studenti per avere una visione generale delle attivit&agrave didattiche.<br />
Seleziona per favore una delle voci di menu dalla barra in alto a questa pagina per cominciare ad usare GISMO.<br />
Se desiderate vedere il tutoria, per favore scegliete la voce di menu "Aiuto"> "Tutorial".<br />
			</p>
			
		</div>    
	
<?php
/*
                <div id="slideshowWrapper" style="margin: 0 auto; text-align: center;">
                    <ul id="slideshow" class="slideshow">
                        <!-- This is the last image in the slideshow -->
                        <li>
                            <img src="images/help/slider_activities_assignments.png" width="640" height="480" border="0" alt="" />
                            <div class="ss_caption">Activities: assignments overview</div>
                        </li>
                        <li>
                            <img src="images/help/slider_resources_accesses_overview.png" width="640" height="480" border="0" alt="" />
                            <div class="ss_caption">Resources: accesses overview</div>
                        </li>
                        <li>
                            <img src="images/help/slider_resources_students_overview.png" width="640" height="480" border="0" alt="" />
                            <div class="ss_caption">Resources: students overview</div>
                        </li> 
                        <li>
                            <img src="images/help/slider_students_accesses_overview_on_resources.png" width="640" height="480" border="0" alt="" />
                            <div class="ss_caption">Students: accesses overview on resources</div>
                        </li>
                        <li>
                            <img src="images/help/slider_students_accesses_overview.png" width="640" height="480" border="0" alt="" />
                            <div class="ss_caption">Students: accesses overview</div>
                        </li>
                        <li>
                            <img src="images/help/slider_students_accesses_by_students.png" width="640" height="480" border="0" alt="" />
                            <div class="ss_caption">Students: accesses by students</div>
                        </li> <!-- This is the first image in the slideshow -->
                    </ul><br clear="all" />
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#slideshow').fadeSlideShow();
                    });
                </script>
*/
?>
            </div>           
        </div>    
    </div>
</div>
<div id="help" style="display: none;">
    <?php require_once realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . "help.php"); ?>
</div>