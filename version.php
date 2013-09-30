<?php
    $plugin->version = 2013093000;  //YYYYMMDDHH (year, month, day, 24-hr time)
    $plugin->requires = 2012062500; //Moodle 2.4 2012120300 - Moodle 2.3 2012062500  (This is the release version for Moodle 2.3)
    $plugin->component = 'block_gismo'; // Full name of the plugin (used for diagnostics)
    $plugin->cron = 900;
    $plugin->maturity = MATURITY_STABLE; 
    $plugin->release = '3.1.2 (Build: 2013093000)';