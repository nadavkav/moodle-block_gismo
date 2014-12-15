<?php

/**
 * GISMO block
 *
 * @package    block_gismo
 * @copyright  eLab Christian Milani
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('CLI_SCRIPT', true);

define('ROOT', (realpath(dirname( __FILE__ )) . DIRECTORY_SEPARATOR));
require_once realpath(ROOT . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php");

// trace start
echo "GISMO - reset data (start)!<br />";

$gdm = new block_gismo\GISMOdata_manager(true);

$gdm->devel_mode_reset();

echo "GISMO - reset data (end)!<br />";
?>