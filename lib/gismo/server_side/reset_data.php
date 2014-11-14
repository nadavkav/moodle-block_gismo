<?php
    require_once "../../../../../config.php";
        
    // trace start
    echo "GISMO - reset data (start)!<br />";
    
    $gdm = new block_gismo\GISMOdata_manager(true);
    
    $gdm->devel_mode_reset();
    
    echo "GISMO - reset data (end)!<br />";
    
?>