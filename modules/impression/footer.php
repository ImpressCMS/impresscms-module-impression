<?php
/**
 * $Id: footer.php
 * Module: Impression
 */

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

$mydirname = basename( dirname( __FILE__ ) );
$xoopsTpl -> assign("xoops_module_header", '<link rel="stylesheet" type="text/css" href="' . $mydirname . '/impressionstyle.css" />');

?>