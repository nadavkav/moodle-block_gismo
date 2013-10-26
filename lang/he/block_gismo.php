<?php
//GISMO EN language file
// block title
$string['pluginname'] = 'דוחות פעילות קורס GISMO';
$string['gismo'] = 'דוחות GISMO - פעילות תלמידים בקורס';
$string['gismo_report_launch'] = 'תצוגת דוחות פעילות התלמידים בקורס';
$string['exportlogs_missing'] = 'Missing exportlogs parameter';
$string['exportlogs_missingcourselogs'] = 'Log analysis process runs on fixed hours, usually at nighttime. Your course data will be available within 24 hours';

// capabilities
$string['gismo:trackuser'] = 'Gismo מעקב תלמיד';
$string['gismo:trackteacher'] = 'Gismo מעקב מורה';
$string['gismo:addinstance'] = 'הוספת משבצת דוחות GISMO חדשה';

// help
$string['gismo_help'] = "<p>Gismo works on those courses that meet the following requirements:</p><ul><li>there is at least one student enrolled to the course</li><li>there is at least one instance of one of the following modules:<ul><li>Resources</li><li>Assignments</li><li>Quizzes</li></ul></li></ul>";

// General
$string['page_title'] = "GISMO - ";
$string['file'] = 'קובץ';
$string['options'] = 'אפשרויות';
$string['save'] = 'יצוא גרף לקובץ';
$string['print'] = 'הדפסה';
$string['exit'] = 'יציאה';
$string['help'] = 'עזרה';
$string['home'] = 'GISMO ראשי';
$string['close'] = 'סיום';

$string['users'] = 'משתמשים'; //************
$string['teachers'] = 'מורים'; //************

// Students
$string['students'] = 'תלמידים';
$string['student_accesses'] = 'גישת תלמידים לקורס';
$string['student_accesses_chart_title'] = 'תלמידים: גישה למערכת';
$string['student_accesses_overview'] = 'גישה למשאבים לאורך זמן';
$string['student_accesses_overview_chart_title'] = 'Students: accesses overview';
$string['student_resources_overview'] = 'גישת משתמשים למשאבים';
$string['student_resources_overview_chart_title'] = 'Students: accesses overview on resources';
$string['student_resources_details_chart_title'] = 'Students: student details on resources';

// Resources
$string['resources'] = 'משאבים';
$string['detail_resources'] = 'פירוט על משאבים';
$string['resources_students_overview'] = 'תלמידים, כולל';
$string['resources_students_overview_chart_title'] = 'Resources: students overview';
$string['resources_access_overview'] = 'גישה למשאבים לאורך זמן';
$string['resources_access_overview_chart_title'] = 'Resources: accesses overview';
$string['resources_access_detail_chart_title'] = 'Resources: resource details on students'; //**************

// Activities
$string['activities'] = 'פעילויות';
$string['assignments'] = 'מטלות';
$string['assignments_chart_title'] = 'Activities: assignments overview';
$string['assignments22'] = 'Assignments 2.2';
$string['assignments22_chart_title'] = 'Activities: assignments 2.2 overview';

$string['chats'] = 'רב־שיח';
$string['chats_over_time'] = 'רב־שיח - פעילות לאורך זמן'; //************
$string['chats_chart_title'] = 'Activities: chats overview';
$string['chats_ud_chart_title'] = 'Activities: student details on chats';
$string['chats_over_time_chart_title'] = 'רב־שיח - פעילות לאורך זמן';

$string['forums'] = 'קבוצות־דיון';
$string['forums_over_time'] = 'קבוצות־דיון - פעילות לאורך זמן'; //************
$string['forums_chart_title'] = 'Activities: forums overview';
$string['forums_ud_chart_title'] = 'Activities: student details on forums';
$string['forums_over_time_chart_title'] = 'קבוצות־דיון - פעילות משתמשים לאורך זמן';

$string['quizzes'] = 'בחנים';
$string['quizzes_chart_title'] = 'Activities: quizzes overview';

$string['wikis'] = 'ויקי - פעילות צפיה/עריכה';
$string['wikis_over_time'] = 'ויקי - שימוש לאורך זמן'; //************
$string['wikis_chart_title'] = 'ויקי - פעילות צפיה/עריכה';
$string['wikis_ud_chart_title'] = 'Activities: student details on wikis';
$string['wikis_over_time_chart_title'] = 'ויקי - תרומות משתמשים לאורך זמן';

// Help
$string['help'] = 'עזרה';
$string['help_docs'] = 'Short overview';
$string['tutorial'] = 'הדרכה';
$string['about'] = 'אודות דוחות Gismo';

$string['date'] = 'תאריך';
$string['from'] = 'מ:';
$string['to'] = 'עד:';

$string['show'] = 'תצוגה'; //************
$string['list'] = 'רשימה'; //************

$string['menu_hide'] = 'הסתרת תפריט'; //************
$string['menu_show'] = 'תצוגת תפריט'; //************
$string['detail_show'] = 'תצוגת מורחבת'; //************

$string['items'] = 'פריטים'; //************
$string['details'] = 'מידע מורחב'; //************
$string['info_title'] = 'GISMO - רשימות'; //************
$string['info_text'] = '<p>To customize the chart you can select/unselect items from enabled menus.</p>";
        message += "<p>Instructions</p>";
        message += "<ul style=\'list-style-position: inside;\'>";
        message += "<li>Main Checkbox: select/unselect all list items.</li>";
        message += "<li>Item Click: select/unselect the clicked item.</li>";
        message += "<li>Item Alt+Click: select only the clicked item</li>";
        message += "<li><img src=\'images/eye.png\'> show item details</li>";
        message += "</ul>'; //************


// Errors
$string['err_course_not_set'] = 'Course id is not set!';
$string['err_block_instance_id_not_set'] = 'Block instance id is not set!';
$string['err_authentication'] = 'You are not authenticated. It is possible that the moodle session has expired.<br /><br /><a href="">Login</a>';
$string['err_access_denied'] = 'You are not authorized to perform this action.';
$string['err_srv_data_not_set'] = 'One or more required parameters are missing!';
$string['err_missing_parameters'] = 'One or more required parameters are missing!';
$string['err_missing_course_students'] = 'Cannot extract course students!';
$string['gismo:view'] = "GISMO - Authorization failed";


//OTHERS
$string['welcome'] = "Welcome to GISMO v. 3.2";
$string['processing_wait'] = "Processing data, please wait!";

//Graphs labels
$string['accesses'] = "גישה למערכת";
$string['timeline'] = "ציר־זמן";
$string['actions_on'] = "גישה ב: ";
$string['nr_submissions'] = "מספר הגשות";



//OPTIONS
$string['option_intro'] = 'This section let you customize specific applications options.';
$string['option_general_settings'] = 'הגדרות כלליוץ';
$string['option_include_hidden_items'] = 'שקלול ציונים חבויים';
$string['option_chart_settings'] = 'הגדרות גרף';
$string['option_base_color'] = 'צבע בסיס';
$string['option_red'] = 'אדום';
$string['option_green'] = 'ירוק';
$string['option_blue'] = 'כחול';
$string['option_axes_label_max_length'] = 'Axes label max length (characters)';
$string['option_axes_label_max_offset'] = 'Axes label max offset (characters)';
$string['option_number_of_colors'] = 'מינעד צבעים (matrix charts)';
$string['option_other_settings'] = 'Other settings';
$string['option_window_resize_delay_seconds'] = 'Window resize delay (seconds)';
$string['save'] = 'שמירה';
$string['cancel'] = 'ביטול';


$string['export_chart_as_image'] = 'GISMO - יצוא גרף כתמונה';
$string['no_chart_at_the_moment'] = 'There isn\'t any chart at the moment!';


$string['about_gismo'] = 'אודות GISMO';
$string['intro_information_about_gismo'] = 'Information about this release is reported below:';
$string['gismo_version'] = 'גרסה ';
$string['release_date'] = 'תאריך גירסה ';
$string['authors'] = 'מחברים ';
$string['contact_us']= 'Please feel free to contact authors for questions or for reporting bugs at the following addresses: ';
$string['close'] = 'סיום';
$string['confirm_exiting'] = 'Do you really want to exit Gismo?';

//Settings
$string['manualexportpassword'] = 'Manual export password';
$string['manualexportpassworddesc'] = 'This means that the export_data.php script cannot be run from a web browser without supplying the password using the following form of URL:<br /><br />http://site.example.com/blocks/gismo/lib/gismo/server_side/export_data.php?password=something<br /><br />If this is left empty, no password is required.';
$string['manualexportpassworderror'] = 'GISMO manual export password missing or wrong';
$string['export_data_limit_records'] = 'Limit Records in SQL queries';
$string['export_data_limit_recordsdesc'] = 'Limit the number of records selected for each query during data export (in GISMOdata_manager.php).
<br /> Please don\'t change it if you don\'t know what you are doing.';
$string['export_data_hours_from_last_run'] = 'Delay (hours) before next data export process execution';
$string['export_data_hours_from_last_rundesc'] = 'Gismo data export process can be re-executed only after X hours, setting this time too low can create performance problems.<br /> Please don\'t change it if you don\'t know what you are doing.';
$string['export_data_run_inf'] = 'Run Gismo data export from';
$string['export_data_run_infdesc'] = 'Execute Gismo data export only from this time.<br /> This setting must be lower then export_data_run_sup.';
$string['export_data_run_sup'] = 'Run Gismo data export until';
$string['export_data_run_supdesc'] = 'Don\'t execute gismo data export after this time.<br /> This setting must be higher then export_data_run_inf.';
$string['exportlogs'] = 'Export logs';
$string['exportlogsdesc'] = 'Export all logs: this option creates Gismo logs from all courses in the moodle platform, this creates a lot of records in gismo database tables, but data is immediately available when Gismo block is placed in a course.<br /> Export only courses with block gismo: Export only the courses that have a block gismo, if you select this option the Gismo data of the course will be available only after several hours you place a Gismo block in a course.';
$string['exportalllogs'] = 'Export all logs';
$string['exportcourselogs'] = 'Export only courses with block gismo';
$string['debug_mode'] = 'Debug mode';
$string['debug_modedesc'] = 'If set to true, debug messages will be displayed during Gismo data export process.';
$string['debug_mode_true'] = 'Enabled';
$string['debug_mode_false'] = 'Disabled';
$string['student_reporting'] = 'Students reporting';
$string['student_reporting_desc'] = 'If enabled students will be able to see their logs';
$string['student_reporting_enabled'] = 'Enabled';
$string['student_reporting_disabled'] = 'Disabled';

//Completion
$string['completion'] = 'השלמת פעילות';
$string['completion_quiz_menu'] = 'בחנים';
$string['completion_quiz_chart_title'] = 'השלמת פעילות: בחנים';
$string['completion_assignment_menu'] = 'מטלות';
$string['completion_assignment_chart_title'] = 'השלמת פעילות: מטלות';
$string['completion_assignment22_menu'] = 'מטלות 2.2';
$string['completion_assignment22_chart_title'] = 'השלמת פעילות: מטלות 2.2';
$string['completion_resource_menu'] = 'משאבים';
$string['completion_resource_chart_title'] = 'השלמת פעילות: משאבים';
$string['completion_forum_menu'] = 'פורומים (קבוצות־דיון)';
$string['completion_forum_chart_title'] = 'השלמת פעילות: פורומים (קבוצות־דיון)';
$string['completion_wiki_menu'] = 'ויקי (תוצר־משותף)';
$string['completion_wiki_chart_title'] = 'השלמת פעילות: ויקי (תוצר־משותף)';
$string['completion_chat_menu'] = 'רב־שיח';
$string['completion_chat_chart_title'] = 'השלמת פעילות: רב־שיח';
$string['completion_completed_on_tooltip'] = 'הושלמה ב: ';
$string['completion_completed_on_tooltip_months'] = "['ינואר','פברואר','מרץ','אפריל','מאי','יוני','יולי','אוגוסט','ספטמבר','אוקטובר','נובמבר','צדמבר']";

//Added missing string 08.10.2013
$string['err_missing_data'] ='Cannot proceed with the analysis because there isn\'t any data to work on!';
$string['err_no_data'] ='נתוני הקורס טרם עובדו';
$string['err_cannot_extract_data'] ='Cannot extract data from server!';
$string['err_unknown'] ='Unknown error!';

//Homepage text
$string['homepage_title']='Welcome to GISMO';
$string['homepage_processing_data_wait']='Processing data, please wait!';
$string['homepage_processing_data']='Processing data';
$string['homepage_text']='GISMO is a graphical interactive student monitoring and tracking system tool that extracts tracking data from the Moodle Course Management System. It generates also useful graphical representations that can be explored by course instructors and students to get an overview of the learning activities.<br />
Please select one of the menus on the top of this page to start using GISMO.<br />
If you would like to have a look at the tutorial please click on the menu "Help"> "Tutorial".';

$string['hide_menu']='הסתרת תפריט';
$string['show_menu']='תצוגת תפריט';
$string['show_details']='תצוגת פירוט';

$string['homepage_charts_preview_title']='תצוגת גרפים מקדימה';
$string['homepage_chart_activities_assignments_overview']='מבט כולל על פעילות מטלה';
$string['homepage_chart_resources_access_overview']='מבט כולל על גישה למשאבים';
$string['homepage_chart_resources_students_overview']='מבט כולל על פעילות תלמידים';
$string['homepage_chart_students_access_overview_on_resources']='מבט כולל על צפיה של תלמידים במשאבים';
$string['homepage_chart_students_access_overview']='מבט כולל על תלמידים';
$string['homepage_chart_students_accesses_by_students']='מבט כולל על צפיה של תלמידים';

//Added missing string 21.10.2013
$string['accesses_tooltip']='צפיות/פעילות/גישה לקורס';

