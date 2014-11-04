<?php

use core\log\manager;

class GISMOdata_manager {

    // New fields from block_gismo settings
    protected $limit_records = 20000;
    protected $debug_mode = false;
    protected $exportlogs = "all";
    // fields
    protected $now_time;
    protected $now_hms;
    protected $manual;
    protected $config;

    /** @var manager log manager */
    //protected $logmanager;

    // constructor
    public function __construct($manual = false) {
        $this->now_time = time();
        $this->now_hms = date("H:i:s", $this->now_time);
        $this->manual = $manual;

        //Set config values -> if elements not set will use default values (on top)
        $config = get_config('block_gismo');

        if (isset($config->export_data_limit_records)) {
            $this->limit_records = $config->export_data_limit_records;
        }
        if (isset($config->debug_mode)) {
            $this->debug_mode = ($config->debug_mode === 'true'); //Convert string to boolean
        }
        if (isset($config->exportlogs)) {
            $this->exportlogs = $config->exportlogs;
        }

        //$this->logmanager = get_log_manager()->get_readers()['logstore_standard'];
    }

    protected function get_time2date_code($field) {
        global $CFG;
        // result variable
        $result = $field;
        // specific function
        switch ($CFG->dbtype) {
            case "pgsql":
                $result = sprintf("TO_CHAR(TO_TIMESTAMP(%s), 'YYYY-MM-DD')", $field);
                break;
            case "mysql":
            case "mysqli":
                $result = "FROM_UNIXTIME(" . $field . ", '%Y-%m-%d')";
                break;
            case "mssql":
                $result = sprintf("DateAdd(ss, %s, '1970-01-01')", $field);   // TODO: TEST
                break;
            case "oci":
                $result = sprintf("TO_CHAR(TO_DATE('19700101000000','YYYYMMDDHH24MISS') + NUMTODSINTERVAL(%s, 'SECOND'), 'YYYY-MM-DD')", $field);
                break;
            default:
                $result = $field;   // TODO
                break;
        }
        return $result;
    }

    public function sync_data() {
        global $CFG, $DB;

        $courses = get_courses("all", "c.id", "c.id"); //ALL COURSES
        foreach ($courses as $course) {

            //Check if this is course 1 -> Sitehome
            if ($course->id == SITEID) {
                continue;
            }

            /*
             * SYNC block_gismo_activity table (GISMO Activities)
             */

            // the following associative array define how to export logs the key is the name of
            // the acctivity, the value is an associative array that maps log action to read or write
            // context
            $modules_actions = array(
                "forum" => array(
                    "action" => array('viewed','created','deleted','updated'),
                    "objecttable" => array('forum_discussions','forum_posts','forum'),
                    "target" => array('post','discussion','course_module'),
                    "eventname" => array('%mod_forum%')
                )
            );          
            
            foreach ($modules_actions as $module) {
                // reset info
                $offset = 0;
                $loop = true;

                // qry structure
                /* $qry = "SELECT MAX({log}.id), " . $this->get_time2date_code("{log}.time") . " AS timedate, MAX({log}.time) AS time, {log}.userid AS userid, " .
                  "{course_modules}.instance AS actid, {log}.module AS activity, COUNT({course_modules}.instance) AS numval FROM {log}, " .
                  "{course_modules} WHERE {course_modules}.id = {log}.cmid AND " .
                  "{log}.course = ? AND {log}.action $actions_sql AND " .
                  "{log}.module $sa_sql $filter GROUP BY actid, activity, timedate, userid"; */

                
                
                //V0 get all logs from logmanager
                //$logs = $this->logmanager->get_events_select("courseid = $course->id AND eventname in ('\\core\\event\\course_viewed') ", array(), '', 0, 0);
                                
                //V1: All logs from this course on forum
                //$logs = $DB->get_records_select('logstore_standard_log', "courseid = :courseid AND eventname  in('\\\\mod_forum\\\\event\\\\post_created','\\\\mod_forum\\\\event\\\\discussion_created','\\\\mod_forum\\\\event\\\\discussion_viewed','\\\\mod_forum\\\\event\\\\course_module_viewed','\\\\mod_forum\\\\event\\\\discussion_deleted','\\\\mod_forum\\\\event\\\\post_deleted')", array('courseid'=>$course->id), 'id', 'id,eventname,userid,component as activity,objecttable,contextinstanceid AS actid,action,objectid,'.$this->get_time2date_code("timecreated").' as timedate');
                
                //Export all logs in XLS
                /*
                require_once("{$CFG->libdir}/csvlib.class.php");
               
                $shortname = "export1";

                $export = new csv_export_writer();
                $export->set_filename($shortname);
                
                $row = array();
                $row[] = 'id';                                    
                $row[] = 'timedate';                 
                $row[] = 'eventname';                
                $row[] = 'userid';             
                $row[] = 'actdid';             
                $row[] = 'action';
                $row[] = 'activity';
                $row[] = 'objecttable';
                $row[] = 'objectid';   
                $export->add_data($row);
                foreach($logs as $log){
                    $row = array();
                    $row[] = $log->id;                  
                    $row[] = $log->timedate;                
                    $row[] = $log->eventname;  
                    $row[] = $log->userid; 
                    $row[] = $log->actid; 
                    $row[] = $log->action;
                    $row[] = $log->activity;
                    $row[] = $log->objecttable;
                    $row[] = $log->objectid;    
                    $export->add_data($row);
                }
                $export->download_file();
                */                
                //V2 all logs grouped by eventname
                /*$qry = "SELECT MAX(id) as id, " . $this->get_time2date_code("timecreated") . " AS timedate, MAX(timecreated) AS time, userid, " .
                        "contextinstanceid AS actid, eventname, COUNT(contextinstanceid) AS numval, action, objectid, component as activity, objecttable FROM {logstore_standard_log} " .
                        "WHERE courseid = :courseid AND eventname in('\\\\mod_forum\\\\event\\\\post_created','\\\\mod_forum\\\\event\\\\discussion_created','\\\\mod_forum\\\\event\\\\discussion_viewed','\\\\mod_forum\\\\event\\\\course_module_viewed','\\\\mod_forum\\\\event\\\\discussion_deleted','\\\\mod_forum\\\\event\\\\post_deleted') " .
                        "GROUP BY eventname, timedate, actid, userid ORDER BY id";*/
                
                //V3 all logs grouped by actid (contextinstanceid), activity (component), action, timedate, userid                
                /*$qry = "SELECT MAX(id) as id, " . $this->get_time2date_code("timecreated") . " AS timedate, MAX(timecreated) AS time, userid, " .
                        "contextinstanceid AS actid, component as activity, COUNT(contextinstanceid) AS numval, action, eventname, component, objecttable,objectid FROM {logstore_standard_log} " .
                        "WHERE courseid = :courseid AND action in ('viewed','created','deleted','updated') AND objecttable in ('forum_discussions','forum_posts','forum') ".//AND eventname like '%mod_forum%' " .
                        "AND target in ('post','discussion','course_module') GROUP BY actid, activity, action, timedate, userid ORDER BY timedate";
                */
                
                
                 //action IN
                list($action_sql, $action_params) = $DB->get_in_or_equal($module['action']);

                //objecttable IN
                list($objecttable_sql, $objecttable_params) = $DB->get_in_or_equal($module['objecttable']);

                //target IN
                list($target_sql, $target_params) = $DB->get_in_or_equal($module['target']);
               
                //eventname LIKE
                $eventname_sql= $DB->sql_like('eventname', '?',false,false);
                
                $params = array_merge(array(intval($course->id)),$action_params,$objecttable_params,$target_params,$module['eventname']);
                 
                $qry = "SELECT MAX(id) as id, " . $this->get_time2date_code("timecreated") . " AS timedate, userid, " .
                        "contextinstanceid AS actid, component as activity, COUNT(contextinstanceid) AS numval, action, eventname, component, objecttable, objectid FROM {logstore_standard_log} " .
                        "WHERE courseid = ? AND action $action_sql AND objecttable $objecttable_sql AND target $target_sql AND $eventname_sql ".//AND eventname like '%mod_forum%' " .
                        "GROUP BY contextinstanceid, component, action, timedate, userid ORDER BY timedate";
                
                var_dump($qry);
                var_dump($params);
                $logs = $DB->get_records_sql($qry,$params);
                
                var_dump($logs);
                
                //Export all logs in XLS
                /*
                require_once("{$CFG->libdir}/csvlib.class.php");
               
                $shortname = "export1";

                $export = new csv_export_writer();
                $export->set_filename($shortname);
                
                $row = array();
                $row[] = 'id';       
                $row[] = 'timedate';            
                $row[] = 'eventname';
                $row[] = 'userid';
                $row[] = 'actid';
                $row[] = 'action';  
                $row[] = 'activity';   
                $row[] = 'objecttable'; 
                $row[] = 'objectid'; 
                $row[] = 'numval';
                $export->add_data($row);
                foreach($logs as $log){
                    $row = array();
                    $row[] = $log->id;                    
                    $row[] = $log->timedate;
                    $row[] = $log->eventname;
                    $row[] = $log->userid;
                    $row[] = $log->actid;
                    $row[] = $log->action;    
                    $row[] = $log->activity;  
                    $row[] = $log->objecttable;
                    $row[] = $log->objectid; 
                    $row[] = $log->numval;
                    
                    $export->add_data($row);
                }
                $export->download_file();
                */
                
                
                
                // loop
                /*while ($loop === true) {
                    // get records
                    //$records = $DB->get_records_sql($qry, $params, $offset, $this->limit_records);

                    // DEBUG: MEMORY USAGE
                    if ($this->debug_mode) {
                        echo "\nMEMORY USAGE (MIDDLE ACCESSES ON ACTIVITIES): " . number_format(memory_get_usage(), 0, ".", "'");
                    }

                    // add entries
                    if (is_array($records) AND count($records) > 0) {
                        foreach ($records as $key => $record) {
                            $entry = new stdClass();
                            $entry->course = $course->id;
                            $entry->userid = $record->userid;
                            $entry->activity = $record->activity;
                            $entry->actid = $record->actid;
                            $entry->context = $context;
                            $entry->timedate = $record->timedate;
                            $entry->time = $record->time;
                            $entry->numval = $record->numval;
                            // try to add record
                            try {
                                $DB->insert_record("block_gismo_activity", $entry, true, "id");
                            } catch (Exception $e) {
                                return $this->return_error("Cannot add entry in block_gismo_activity table.", __FILE__, __FUNCTION__, __LINE__);
                            }
                            // free memory
                            unset($entry, $records[$key]);
                        }
                        unset($records);
                    } else {
                        $loop = false;
                    }

                    // increment offset
                    $offset += $this->limit_records;
                }*/
            }


            // DEBUG: MEMORY USAGE
            if ($this->debug_mode) {
                echo "\nMEMORY USAGE (AFTER ACCESSES ON ACTIVITIES): " . number_format(memory_get_usage(), 0, ".", "'");
            }
        }
    }

    // sync data
//    public function sync_data() {
//        global $CFG, $DB;
//
//        //Get gismo config and check what export method we are using
//        $config = get_config('block_gismo');
//        if (empty($this->exportlogs)) {
//            return $this->return_error("Missing exportlogs parameter.", __FILE__, __FUNCTION__, __LINE__);
//        }
//
//        // Adjust some php variables to the execution of this script
//        @ini_set("max_execution_time", "7200");
//        if (function_exists("raise_memory_limit")) {
//            raise_memory_limit("192M");
//        }
//        // DEBUG: MEMORY USAGE
//        if ($this->debug_mode) {
//            echo "\nMEMORY USAGE BEFORE: " . number_format(memory_get_usage(), 0, ".", "'");
//        }
//
//        // result
//        $result = true;
//
//        // last export time
//        $last_export_time = $DB->get_record("block_gismo_config", array("name" => "last_export_time"));
//        if ($last_export_time === FALSE) {
//            return $this->return_error("Cannot extract last export time .", __FILE__, __FUNCTION__, __LINE__);
//        }
//
//        // max log id (value to be set after export)
//        $max_log_id = $DB->get_records("log", null, "id DESC", "id", 0, 1);
//        if (!(is_array($max_log_id) AND count($max_log_id) === 1)) {
//            return $this->return_error("Cannot extract max log id.", __FILE__, __FUNCTION__, __LINE__);
//        }
//        $max_log_id = intval(array_pop($max_log_id)->id);
//
//        //Start Sync                   
//        
//        // lock gismo tables
//        // TODO
//
//        /*
//         * RESET IF DEVEL MODE
//         */
//        if ($this->debug_mode === true) {
//            // reset
//            $this->debug_mode_reset($this->exportlogs);
//            // update values
//            $last_export_time->value = 0;
//        }
//
//        /*
//         * SYNC DATA
//         */
//
//        // Check if export_logs is set to "all", reset logs and get courses list
//        if ($this->exportlogs == 'all') {
//            echo "\nExport all logs\n";
//
//            //last export max log id
//            if ($DB->record_exists("block_gismo_config", array("name" => "last_export_max_log_id"))) {
//                $last_export_max_log_id = $DB->get_record("block_gismo_config", array("name" => "last_export_max_log_id"));
//                if ($last_export_max_log_id === FALSE) {
//                    return $this->return_error("Cannot extract last export max log id .", __FILE__, __FUNCTION__, __LINE__);
//                }
//            } else {
//                //insert record with value = 0, should never arrive here
//            }
//
//            //IF last_export_max_log_id == 0 delete data -> we changed from "course" to "all" in exportlogs settings
//            if ($last_export_max_log_id->value == 0) {
//                $DB->delete_records("block_gismo_activity");
//                $DB->delete_records("block_gismo_resource");
//                $DB->delete_records("block_gismo_sl");
//            }
//
//            // max log id (value to be set after export)
//            $max_log_id = $DB->get_records("log", null, "id DESC", "id", 0, 1);
//            if (!(is_array($max_log_id) AND count($max_log_id) === 1)) {
//                return $this->return_error("Cannot extract max log id.", __FILE__, __FUNCTION__, __LINE__);
//            }
//            $max_log_id = intval(array_pop($max_log_id)->id);
//
//            //extract all courses            
//            $courses = get_courses("all", "c.id", "c.id"); //ALL COURSES
//        } else {
//            echo "\nExport courses with gismo block logs\n";
//
//            //If exists reset last_export_max_log_id from gismo_config table
//            if ($DB->record_exists("block_gismo_config", array("name" => "last_export_max_log_id"))) {
//
//                //Get last_export_max_log_id value
//                $last_export_max_log_id = $DB->get_record("block_gismo_config", array("name" => "last_export_max_log_id"));
//
//                //IF last_export_max_log_id > 0 delete data -> we changed from "all" to "course" in exportlogs settings
//                if ($last_export_max_log_id->value > 0) {
//                    $DB->delete_records("block_gismo_activity");
//                    $DB->delete_records("block_gismo_resource");
//                    $DB->delete_records("block_gismo_sl");
//                }
//
//                //reset export max log id to 0
//                $last_export_max_log_id = $DB->get_record("block_gismo_config", array("name" => "last_export_max_log_id"));
//                $last_export_max_log_id->value = 0;
//                $DB->update_record("block_gismo_config", $last_export_max_log_id);
//            } else {
//                //insert record with value = 0, should never arrive here
//            }
//            //Only courses with the block gismo installed
//            $courses = $DB->get_records_sql(" select * from {course} where id in
//                                                ( select instanceid from {context} where id in
//                                                ( select parentcontextid from {block_instances} where blockname = 'gismo' ) );");
//        }
//
//
//        // DEBUG: MEMORY USAGE
//        if ($this->debug_mode) {
//            echo "\nMEMORY USAGE (AFTER COURSES EXTRACTION): " . number_format(memory_get_usage(), 0, ".", "'");
//        }
//
//        if (!(is_array($courses) AND count($courses) > 0)) {
//            return $this->return_error("There isn't any course at the moment.", __FILE__, __FUNCTION__, __LINE__);
//        } else {
//
//            //If we are exporing all logs we should set the general filter, otherwise we will have to set a filter for each course
//            if ($this->exportlogs == 'all') {
//                // set the filter (get newer data only)
//                $filter = " AND {log}.id > " . intval($last_export_max_log_id->value) . " AND {log}.id <= " . $max_log_id;
//                if (!empty($CFG->loglifetime)) {    // !!! REMEBER: 0 is considered empty
//                    $filter = $filter . " AND {log}.time >= " . ($this->now_time - ($CFG->loglifetime * 86400));
//                }
//            }
//
//            // sync data for each course
//            foreach ($courses as $course) {
//
//                //Check if this is course 1 -> Sitehome
//                if($course->id == 1){
//                    // DEBUG: MEMORY USAGE
//                    if ($this->debug_mode) {
//                        echo "\nCourse ID: 1 NOT EXPORTED";
//                    }
//                    //Skip this course
//                    continue;
//                }
//
//                // DEBUG: MEMORY USAGE
//                if ($this->debug_mode) {
//                    echo "\nCourse ID: " . $course->id . "\n";
//                }
//
//                //Get course filters
//                if ($this->exportlogs == 'course') {
//
//                    //Check if exist last_export_log_id for this course and insert record if missing
//                    if (!$DB->record_exists("block_gismo_config", array("name" => "last_export_max_log_id_" . $course->id))) {
//                        $record = new stdClass();
//                        $record->value = 0;
//                        $record->name = "last_export_max_log_id_" . $course->id;
//                        if ($DB->insert_record("block_gismo_config", $record) === FALSE) {
//                            return $this->return_error("Cannot insert last export max log id for course " . $course->id, __FILE__, __FUNCTION__, __LINE__);
//                        }
//                    }
//
//                    //last export max log id
//                    $last_export_max_log_id = $DB->get_record("block_gismo_config", array("name" => "last_export_max_log_id_" . $course->id));
//                    if ($last_export_max_log_id === FALSE) {
//                        return $this->return_error("Cannot extract last export max log id for course $course->id.", __FILE__, __FUNCTION__, __LINE__);
//                    }
//
//
//                    // max log id (value to be set after export)
//                    $max_log_id = $DB->get_records("log", array('course' => $course->id), "id DESC", "id", 0, 1);
//                    if (!(is_array($max_log_id) AND count($max_log_id) === 1)) {
//                        return $this->return_error("Cannot extract max log id for course $course->id.", __FILE__, __FUNCTION__, __LINE__);
//                    }
//                    $max_log_id = intval(array_pop($max_log_id)->id);
//
//                    // set the filter (get newer data only for each course)
//                    $filter = " AND {log}.id > " . intval($last_export_max_log_id->value) . " AND {log}.id <= " . $max_log_id;
//                    if (!empty($CFG->loglifetime)) {    // !!! REMEBER: 0 is considered empty
//                        $filter = $filter . " AND {log}.time >= " . ($this->now_time - ($CFG->loglifetime * 86400));
//                    }
//                }
//
//                /*
//                 * SYNC block_gismo_activity table (GISMO Activities)
//                 */
//
//                // the following associative array define how to export logs the key is the name of
//                // the acctivity, the value is an associative array that maps log action to read or write
//                // context
//                $activities_actions = array(
//                    "chat" => array(
//                        "read" => array("view"),
//                        "write" => array("talk"),
//                    ),
//                    "forum" => array(
//                        "read" => array("view discussion"),
//                        //Removed delete post, update post and delete discussion from write counter & moved in different actions	
//                        //https://moodle.org/mod/forum/discuss.php?d=218561
//                        //"write" => array("add post", "update post", "delete post", "add discussion", "delete discussion"), 
//                        "write" => array("add post", "add discussion"), 
//                        "delete" => array("delete post", "delete discussion"),
//                        "update" => array("update post"),			                            
//                    ),
//                    "wiki" => array(
//                        "read" => array("view"),
//                        "write" => array("edit", "comments"),
//                    ),
//                );
//
//                // supported activities
//                $supported_activities = array();
//                if (is_array($activities_actions) AND count($activities_actions) > 0) {
//                    $supported_activities = array_keys($activities_actions);
//                }
//                $supported_activities = array_unique($supported_activities);
//
//                // actions organized by context
//                $actions_by_context = array();
//                if (is_array($activities_actions) AND count($activities_actions) > 0) {
//                    foreach ($activities_actions as $activity => $cwa) {
//                        if (is_array($cwa) AND count($cwa) > 0) {
//                            foreach ($cwa as $context => $actions) {
//                                if (!array_key_exists($context, $actions_by_context)) {
//                                    $actions_by_context[$context] = array();
//                                }
//                                $actions_by_context[$context] = array_unique(array_merge($actions_by_context[$context], $actions));
//                            }
//                        }
//                    }
//                }
//
//                // export only if there is at least one activity and we are interested in at least one action
//                if (count($supported_activities) > 0 AND count($actions_by_context) > 0) {
//                    // special parts (1)
//                    list($sa_sql, $sa_params) = $DB->get_in_or_equal($supported_activities);
//
//                    foreach ($actions_by_context as $context => $actions) {
//                        // reset info
//                        $offset = 0;
//                        $loop = true;
//
//                        // special parts (1)
//                        list($actions_sql, $actions_params) = $DB->get_in_or_equal($actions);
//
//                        // params
//                        $params = array_merge(array(intval($course->id)), $actions_params, $sa_params);
//
//                        // qry structure
//                        $qry = "SELECT MAX({log}.id), " . $this->get_time2date_code("{log}.time") . " AS timedate, MAX({log}.time) AS time, {log}.userid AS userid, " .
//                                "{course_modules}.instance AS actid, {log}.module AS activity, COUNT({course_modules}.instance) AS numval FROM {log}, " .
//                                "{course_modules} WHERE {course_modules}.id = {log}.cmid AND " .
//                                "{log}.course = ? AND {log}.action $actions_sql AND " .
//                                "{log}.module $sa_sql $filter GROUP BY actid, activity, timedate, userid";
//
//                        // loop
//                        while ($loop === true) {
//                            // get records
//                            $records = $DB->get_records_sql($qry, $params, $offset, $this->limit_records);
//
//                            // DEBUG: MEMORY USAGE
//                            if ($this->debug_mode) {
//                                echo "\nMEMORY USAGE (MIDDLE ACCESSES ON ACTIVITIES): " . number_format(memory_get_usage(), 0, ".", "'");
//                            }
//
//                            // add entries
//                            if (is_array($records) AND count($records) > 0) {
//                                foreach ($records as $key => $record) {
//                                    $entry = new stdClass();
//                                    $entry->course = $course->id;
//                                    $entry->userid = $record->userid;
//                                    $entry->activity = $record->activity;
//                                    $entry->actid = $record->actid;
//                                    $entry->context = $context;
//                                    $entry->timedate = $record->timedate;
//                                    $entry->time = $record->time;
//                                    $entry->numval = $record->numval;
//                                    // try to add record
//                                    try {
//                                        $DB->insert_record("block_gismo_activity", $entry, true, "id");
//                                    } catch (Exception $e) {
//                                        return $this->return_error("Cannot add entry in block_gismo_activity table.", __FILE__, __FUNCTION__, __LINE__);
//                                    }
//                                    // free memory
//                                    unset($entry, $records[$key]);
//                                }
//                                unset($records);
//                            } else {
//                                $loop = false;
//                            }
//
//                            // increment offset
//                            $offset += $this->limit_records;
//                        }
//                    }
//                }
//
//                // DEBUG: MEMORY USAGE
//                if ($this->debug_mode) {
//                    echo "\nMEMORY USAGE (AFTER ACCESSES ON ACTIVITIES): " . number_format(memory_get_usage(), 0, ".", "'");
//                }
//
//                /*
//                 * SYNC block_gismo_sl table (GISMO Students Actions)
//                 */
//
//                $offset = 0;
//                $loop = true;
//
//                // retrieve users actions 
//                $qry = "SELECT MAX({log}.id), " . $this->get_time2date_code("time") . " AS date_val, MAX(time) AS time, COUNT(id) AS count, userid FROM " .
//                        "{log} WHERE course = " . $course->id . " $filter GROUP BY userid, date_val LIMIT " . $this->limit_records . " OFFSET ";
//
//                // loop
//                while ($loop === true) {
//                    $logins = $DB->get_records_sql($qry . $offset);
//
//                    // DEBUG: MEMORY USAGE
//                    if ($this->debug_mode) {
//                        echo "\nMEMORY USAGE (MIDDLE GISMO STUDENTS LOGIN): " . number_format(memory_get_usage(), 0, ".", "'");
//                    }
//
//                    // add entries
//                    if (is_array($logins) AND count($logins) > 0) {
//                        foreach ($logins as $key => $login) {
//                            $gsll_entry = new stdClass();
//                            $gsll_entry->course = $course->id;
//                            $gsll_entry->userid = $login->userid;
//                            $gsll_entry->numval = $login->count;
//                            $gsll_entry->timedate = $login->date_val;
//                            $gsll_entry->time = $login->time;
//                            // try to add record
//                            try {
//                                $DB->insert_record("block_gismo_sl", $gsll_entry, true, "id");
//                            } catch (Exception $e) {
//                                return $this->return_error("Cannot add entry in block_gismo_sl table.", __FILE__, __FUNCTION__, __LINE__);
//                            }
//                            // free memory
//                            unset($gsll_entry, $logins[$key]);
//                        }
//                        unset($logins);
//                    } else {
//                        $loop = false;
//                    }
//
//                    // increment offset
//                    $offset += $this->limit_records;
//                }
//
//                // DEBUG: MEMORY USAGE
//                if ($this->debug_mode) {
//                    echo "\nMEMORY USAGE (AFTER GISMO STUDENTS LOGIN): " . number_format(memory_get_usage(), 0, ".", "'");
//                }
//
//                /*
//                 * SYNC block_gismo_resource table (GISMO Resources Access Overview)
//                 */
//
//                $offset = 0;
//                $loop = true;
//
//                // retrieve accesses on resources
//                $qry = "SELECT MAX({log}.id), " . $this->get_time2date_code("{log}.time") . " AS date_val, MAX({log}.time) AS time, {log}.userid AS userid, {log}.module AS res_type, " .
//                        "{course_modules}.instance AS res_id, COUNT({course_modules}.instance) AS count FROM {log}, " .
//                        "{course_modules} WHERE {course_modules}.id = {log}.cmid AND " .
//                        "{log}.course = " . $course->id . " AND {log}.action = 'view' AND " .
//                        "{log}.module IN('folder', 'imscp', 'page', 'resource', 'url', 'book') $filter GROUP BY res_type, res_id, date_val, userid LIMIT " . $this->limit_records . " OFFSET ";
//
//                // loop
//                while ($loop === true) {
//                    $actions = $DB->get_records_sql($qry . $offset);
//
//                    // DEBUG: MEMORY USAGE
//                    if ($this->debug_mode) {
//                        echo "\nMEMORY USAGE (MIDDLE ACCESSES ON RESOURCES): " . number_format(memory_get_usage(), 0, ".", "'");
//                    }
//
//                    // add entries
//                    if (is_array($actions) AND count($actions) > 0) {
//                        foreach ($actions as $key => $action) {
//                            $res_entry = new stdClass();
//                            $res_entry->course = $course->id;
//                            $res_entry->resid = $action->res_id;
//                            $res_entry->restype = $action->res_type;
//                            $res_entry->userid = $action->userid;
//                            $res_entry->timedate = $action->date_val;
//                            $res_entry->time = $action->time;
//                            $res_entry->numval = $action->count;
//                            // try to add record
//                            try {
//                                $DB->insert_record("block_gismo_resource", $res_entry, true, "id");
//                            } catch (Exception $e) {
//                                return $this->return_error("Cannot add entry in block_gismo_resource table.", __FILE__, __FUNCTION__, __LINE__);
//                            }
//                            // free memory
//                            unset($res_entry, $actions[$key]);
//                        }
//                        unset($actions);
//                    } else {
//                        $loop = false;
//                    }
//
//                    // increment offset
//                    $offset += $this->limit_records;
//                }
//
//                // update export max log id for courses
//                if ($this->exportlogs == 'course') {
//                    $last_export_max_log_id->value = $max_log_id;
//                    if ($DB->update_record("block_gismo_config", $last_export_max_log_id) === FALSE) {
//                        return $this->return_error("Cannot update last export max log id value.", __FILE__, __FUNCTION__, __LINE__);
//                    }
//                }
//
//                // DEBUG: MEMORY USAGE
//                if ($this->debug_mode) {
//                    echo "\nMEMORY USAGE (AFTER ACCESSES ON RESOURCES): " . number_format(memory_get_usage(), 0, ".", "'");
//                    echo "\n----------\n";
//                }
//            }
//        }
//
//        // update export time value and max log id
//        $last_export_time->value = $this->now_time;
//        if ($DB->update_record("block_gismo_config", $last_export_time) === FALSE) {
//            return $this->return_error("Cannot update last export time value.", __FILE__, __FUNCTION__, __LINE__);
//        }
//        // update export max log id for all courses
//        if ($this->exportlogs == 'all') {
//            $last_export_max_log_id->value = $max_log_id;
//            if ($DB->update_record("block_gismo_config", $last_export_max_log_id) === FALSE) {
//                return $this->return_error("Cannot update last export max log id value.", __FILE__, __FUNCTION__, __LINE__);
//            }
//        }
//
//        // unlock gismo tables
//        // TODO        
//      
//        // DEBUG: MEMORY USAGE
//        if ($this->debug_mode) {
//            echo "\nMEMORY USAGE AFTER: " . number_format(memory_get_usage(), 0, ".", "'") . "\n";
//        }
//
//        // return result
//        return $result;
//    }
//
//    // purge data
    // This method removes old data according to the moodle log life time
    public function purge_data() {
        global $CFG, $DB;

        // result
        $result = true;

        // delete old logs
        if (!empty($CFG->loglifetime)) {    // !!! REMEBER: 0 is considered empty
            // log life time
            $loglifetime = $this->now_time - ($CFG->loglifetime * 86400);

            // purge queries
            $queries = array("block_gismo_activity" => "time < " . $loglifetime,
                "block_gismo_resource" => "time < " . $loglifetime,
                "block_gismo_sl" => "time < " . $loglifetime);

            // execute queries
            if (is_array($queries) AND count($queries) > 0) {
                foreach ($queries as $table => $select) {
                    $check = $DB->delete_records_select($table, $select);
                    if ($check === FALSE) {
                        return $this->return_error("Error while purging old logs.", __FILE__, __FUNCTION__, __LINE__);
                    }
                }
            }
        } else {
            $result = "Nothing to be purged, logs never expire!";
        }

        // ok
        return $result;
    }

    // debug method
    // This methods does as follows:
    // 1) Reset config parameters that have to do with sync
    // 2) Empty gismo tables (data)
    public function debug_mode_reset($exportlogs) {
        global $CFG, $DB;

        // delete data
        $DB->delete_records("block_gismo_activity");
        $DB->delete_records("block_gismo_resource");
        $DB->delete_records("block_gismo_sl");

        // reset last export time
        $last_export_time = $DB->get_record("block_gismo_config", array("name" => "last_export_time"));
        $last_export_time->value = 0;
        $DB->update_record("block_gismo_config", $last_export_time);

        if ($exportlogs == 'all') {
            //reset export max log id
            echo 'DEBUG: Reset max_log_id';
            $last_export_max_log_id = $DB->get_record("block_gismo_config", array("name" => "last_export_max_log_id"));
            $last_export_max_log_id->value = 0;
            $DB->update_record("block_gismo_config", $last_export_max_log_id);
        } else {
            //reset export_max_log_id for each course
            echo 'DEBUG: Reset each course max_log_id';
            $DB->execute("UPDATE {block_gismo_config} SET value = '0' WHERE name like 'last_export_max_log_id_%'");
        }

        // ok
        return true;
    }

    // this method return a error message
    protected function return_error($msg, $file, $function, $line) {
        return "Error: " . strtolower($msg) . sprintf(" [ File: '%s',  Function: '%s',  Line: '%s' ]", $file, $function, $line);
    }

}

?>
