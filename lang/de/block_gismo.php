<?php
//GISMO DE language file
// block title
$string['pluginname'] = 'Gismo';
$string['gismo'] = 'Gismo';
//$string['gismo_report_launch'] = 'Werkzeug zur Berichterstattung';
$string['gismo_report_launch'] = 'Reporting Tool';

// capabilities
$string['gismo:trackuser'] = 'Gismo Student/in';
$string['gismo:trackteacher'] = 'Gismo Dozent/in';

// help
$string['gismo_help'] = "<p>Gismo funktioniert bei Kursen, welche die folgenden Anforderungen erfüllen:</p><ul><li> mindestens ein Student muss für den Kurs eingetragen sein</li><li>der Kurs muss mindestens eines der folgenden Module enthalten:<ul><li>Ressourcen</li><li>Aufgaben</li><li>Tests</li></ul></li></ul>";

// General
$string['page_title'] = "Gismo - ";
$string['file'] = 'Datei';
$string['options'] = 'Optionen';
$string['save'] = 'Diagramm als Bild exportieren';
$string['print'] = 'Drucken';
$string['exit'] = 'Programm verlassen';
$string['help'] = 'Hilfe';
$string['home'] = 'Gismo Home';
$string['close'] = 'Schliessen';

$string['users'] = 'User'; //************
$string['teachers'] = 'Dozent/innen'; //************

// Students
$string['students'] = 'Student/-innen';
$string['student_accesses'] = 'Zugriffe durch Student/-innen';
$string['student_accesses_chart_title'] = 'Student/-innen: Zugriffe durch Student/-innen';
$string['student_accesses_overview'] = 'Übersicht über Zugriffe';
$string['student_accesses_overview_chart_title'] = 'Student/-innen: Übersicht über Zugriffe';
$string['student_resources_overview'] = 'Übersicht über Zugriffe auf Ressourcen';
$string['student_resources_overview_chart_title'] = 'Student/-innen: Übersicht über Zugriffe auf Ressourcen';
$string['student_resources_details_chart_title'] = 'Student/-innen: Einzelheiten bezüglich Zugriffe auf Ressourcen';

// Resources
$string['resources'] = 'Ressourcen';
$string['detail_resources'] = 'Einzelheiten bezüglich Ressourcen';
$string['resources_students_overview'] = 'Übersicht über Student/-innen';
$string['resources_students_overview_chart_title'] = 'Ressourcen: Übersicht über Student/-innen';
$string['resources_access_overview'] = 'Übersicht über Zugriffe';
$string['resources_access_overview_chart_title'] = 'Ressourcen: Übersicht über Zugriffe';
$string['resources_access_detail_chart_title'] = 'Ressourcen: Einzelheiten bezüglich Zugriffe durch Student/-innen'; //**************

// Activities
$string['activities'] = 'Aktivitäten';
$string['assignments'] = 'Aufgaben';
$string['assignments_chart_title'] = 'Aktivitäten: Übersicht über Aufgaben';
$string['assignments22'] = 'Aufgaben 2.2';
$string['assignments22_chart_title'] = 'Aktivitäten: Übersicht über Aufgaben 2.2';
$string['chats'] = 'Chats';

$string['chats_over_time'] = 'Chats im Zeitablauf'; //************

$string['chats_chart_title'] = 'Aktivitäten: Übersicht über Chats';
$string['chats_ud_chart_title'] = 'Aktivitäten: Einzelheiten über Student/-innen in Chats';
$string['chats_over_time_chart_title'] = 'Aktivitäten: Chat-Beiträge im Zeitablauf';
$string['forums'] = 'Foren';

$string['forums_over_time'] = 'Foren im Zeitablauf'; //************

$string['forums_chart_title'] = 'Aktivitäten: Übersicht über Foren';
$string['forums_ud_chart_title'] = 'Aktivitäten: Einzelheiten über Student/-innen in Foren';
$string['forums_over_time_chart_title'] = 'Aktivitäten: Forenbeiträge im Zeitablauf';

$string['quizzes'] = 'Tests';
$string['quizzes_chart_title'] = 'Aktivitäten: Übersicht über Tests';

$string['wikis'] = 'Wikis';

$string['wikis_over_time'] = 'Wikis im Zeitablauf'; //************

$string['wikis_chart_title'] = 'Aktivitäten: Übersicht über Wikis';
$string['wikis_ud_chart_title'] = 'Aktivitäten: Einzelheiten über Student/-innen in Wikis';
$string['wikis_over_time_chart_title'] = 'Aktivitäten: Wiki-Beiträge im Zeitablauf';

// Help
$string['help'] = 'Hilfe';
$string['help_docs'] = 'Kurze Ubersicht';
$string['tutorial'] = 'Tutorial';
$string['about'] = 'Über Gismo';

$string['date'] = 'Datum';
$string['from'] = 'Von';
$string['to'] = 'Bis';

$string['show'] = 'Anzeigen'; //************
$string['list'] = 'Liste'; //************

$string['menu_hide'] = 'Menü ausblenden'; //************
$string['menu_show'] = 'Menü anzeigen'; //************
$string['detail_show'] = 'Einzelheiten anzeigen'; //************

$string['items'] = 'EINTRÄGE'; //************
$string['details'] = 'Details'; //************
$string['info_title'] = 'GISMO - Listen'; //************
$string['info_text'] = '<p>Um das Diagramm individuell zu gestalten, können Sie Elemente aus den Menüs auswählen/Auswahl aufheben.</p>";
        message += "<p>Anweisungen</p>";
        message += "<ul style=\'list-style-position: inside;\'>";
        message += "<li>Haupt-Kontrollkästchen: alle aufgelisteten Elemente auswählen/Auswahl aufheben.</li>";
        message += "<li>Klick auf das Element: das angeklickte Element auswählen/Auswahl aufheben.</li>";
        message += "<li>Element Alt+Klick: nur das angeklickte Element auswählen.</li>";
        message += "<li><img src=\'images/eye.png\'> Einzelheiten zu Elementen anzeigen</li>";
        message += "</ul>'; //************


// Errors
$string['err_course_not_set'] = 'Die Identifikation (ID) für den Kurs ist nicht eingerichtet!';
$string['err_block_instance_id_not_set'] = 'Die Block Instanz ID ist nicht eingerichtet!';
$string['err_authentication'] = 'Sie sind nicht authentifiziert. Es ist möglich, dass die Moodle-Session abgelaufen ist.<br /><br /><a href="">Einloggen</a>';
$string['err_access_denied'] = 'Zur Ausführung dieser Handlung sind Sie nicht befugt.';
$string['err_srv_data_not_set'] = 'Es fehlen ein oder mehrere erforderliche Kennwerte!';
$string['err_missing_parameters'] = 'Es fehlen ein oder mehrere erforderliche Kennwerte!';
$string['err_missing_course_students'] = 'Die Kursteilnehmer können nicht ausgewählt werden!';
$string['gismo:view'] = "GISMO - Autorisierung nicht möglich";


//OTHERS
$string['welcome'] = "Willkommen zu GISMO v. 3.1.1";
$string['processing_wait'] = "Die Daten werden aufbereitet, bitte warten Sie!";

//Graphs labels
$string['accesses'] = "Zugriffe";
$string['timeline'] = "Zeitplan";
$string['actions_on'] = "Handlungen von ";
$string['nr_submissions'] = "Anzahl Einträge";



//OPTIONS
$string['option_intro'] = 'In diesem Abschnitt können Sie bestimmte Applikations-Optionen individuell einstellen.';
$string['option_general_settings'] = 'Allgemeine Einstellungen';
$string['option_include_hidden_items'] = 'Verborgene Elemente mit einschliessen';
$string['option_chart_settings'] = 'Diagramm-Einstellungen';
$string['option_base_color'] = 'Grundfarbe';
$string['option_red'] = 'Rot';
$string['option_green'] = 'Grün';
$string['option_blue'] = 'Blau';
$string['option_axes_label_max_length'] = 'Achsenbeschriftung max. Länge (Zeichen)';
$string['option_axes_label_max_offset'] = 'Achsenbeschriftung max. Offset (Zeichen)';
$string['option_number_of_colors'] = 'Anzahl der Farben (Matrix-Diagramme)';
$string['option_other_settings'] = 'Andere Einstellungen';
$string['option_window_resize_delay_seconds'] = 'Fenstergrösse anpassen mit Verzögerungsfunktion (Sekunden)';
$string['save'] = 'Speichern';
$string['cancel'] = 'Abbrechen';


$string['export_chart_as_image'] = 'GISMO - Diagramm als Bild exportieren';
$string['no_chart_at_the_moment'] = 'Momentan existiert kein Diagramm!';


$string['about_gismo'] = 'Über GISMO';
$string['intro_information_about_gismo'] = 'Informationen zu dieser Version sind unten angezeigt:';  
$string['gismo_version'] = 'Version ';
$string['release_date'] = 'Freigabedatum ';
$string['authors'] = 'Autoren ';
$string['contact_us']= 'Bei Fragen oder wenn Sie irgendwelche Fehler melden möchten, wenden Sie sich bitte an die Autoren unter den nachstehenden Adressen: ';
$string['close'] = 'Schliessen';
$string['confirm_exiting'] = 'Möchten Sie Gismo wirklich verlassen?';

?>
