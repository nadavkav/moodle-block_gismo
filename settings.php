<?php
/**
 * gismo block settings
 *
 * @package    block_gismo
 * @copyright  eLab Christian Milani
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext('block_gismo/manualexportpassword', new lang_string('manualexportpassword', 'block_gismo'),
        new lang_string('manualexportpassworddesc', 'block_gismo'), '', PARAM_RAW_TRIMMED));
    
    //run_inf
    $settings->add(new admin_setting_configtime('block_gismo/export_data_run_inf_hour', 'export_data_run_inf_minute', new lang_string('export_data_run_inf', 'block_gismo'),
             new lang_string('export_data_run_infdesc', 'block_gismo'), array('h' => 2, 'm' => 0,'s'=>0)));
    
    //run_sup
    $settings->add(new admin_setting_configtime('block_gismo/export_data_run_sup_hour', 'export_data_run_sup_minute', new lang_string('export_data_run_sup', 'block_gismo'),
             new lang_string('export_data_run_supdesc', 'block_gismo'), array('h' => 4, 'm' => 0,'s'=>0)));
    
    //hours_from_last_run
    $hours = array();
    for ($i = 0; $i < 25; $i++){
        $hours[$i] = $i;
    }    
    
    $settings->add(new admin_setting_configselect('block_gismo/export_data_hours_from_last_run', new lang_string('export_data_hours_from_last_run', 'block_gismo'),
        new lang_string('export_data_hours_from_last_rundesc', 'block_gismo'), 12, $hours));
    
    //Limit Records
    $settings->add(new admin_setting_configtext('block_gismo/export_data_limit_records', new lang_string('export_data_limit_records', 'block_gismo'),
        new lang_string('export_data_limit_recordsdesc', 'block_gismo'), 20000, PARAM_INT));
    
    //LOGS: Keep only courses with block GISMO 
    $options = array('all'=>get_string('exportalllogs', 'block_gismo'), 'course'=>get_string('exportcourselogs', 'block_gismo'));

    $settings->add(new admin_setting_configselect('block_gismo/exportlogs', get_string('exportlogs', 'block_gismo'),
                       get_string('exportlogsdesc', 'block_gismo'), 'all', $options));
    
    //Debug mode
    $options = array('true'=>get_string('debug_mode_true', 'block_gismo'), 'false'=>get_string('debug_mode_false', 'block_gismo'));

    $settings->add(new admin_setting_configselect('block_gismo/debug_mode', get_string('debug_mode', 'block_gismo'),
                       get_string('debug_modedesc', 'block_gismo'), 'false', $options));
    
    //Student reporting (can students see their logs?)
    $options = array('true'=>get_string('student_reporting_enabled', 'block_gismo'), 'false'=>get_string('student_reporting_disabled', 'block_gismo'));

    $settings->add(new admin_setting_configselect('block_gismo/student_reporting', get_string('student_reporting', 'block_gismo'),
                       get_string('student_reporting_desc', 'block_gismo'), 'false', $options));
}
