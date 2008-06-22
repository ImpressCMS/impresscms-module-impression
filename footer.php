<?php
/**
 * $Id: footer.php
 * Module: Impression
 */

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

global $xoopsModule, $xoopsModuleConfig;

$xoopsTpl -> assign("xoops_module_header", '<link rel="stylesheet" type="text/css" href="' . impression_url . '/impressionstyle.css" />');

?>