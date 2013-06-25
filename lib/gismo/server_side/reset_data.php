<?php
    require_once "../../../../../config.php";
    
    // libraries
    $d = DIRECTORY_SEPARATOR;
    $lib_dir = realpath(dirname( __FILE__ ) . $d . ".." . $d . ".." . $d . ".." . $d) . $d . 'lib' . $d . 'gismo' . $d . 'server_side' . $d;
    require_once $lib_dir . "GISMOdata_manager.php";
    
    // trace start
    echo "GISMO - reset data (start)!<br />";
    
    $gdm = new GISMOdata_manager(true);
    
    $gdm->devel_mode_reset();
    
    echo "GISMO - reset data (end)!<br />";
    
?>