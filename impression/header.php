<?php
/**
 * $Id: header.php
 * Module: Impression
 */

include_once '../../mainfile.php';

$mydirname = basename( dirname( __FILE__ ) ) ;

include XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/include/config.php';
include XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/include/functions.php';
include XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/sbookmarks.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/class/class_thumbnail.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';

if ( !file_exists( "language/" . $xoopsConfig['language'] . "/main.php" ) ) {
    include "language/" . $xoopsConfig['language'] . "/main.php";
} 

include_once XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/class/myts_extended.php';
$impressionmyts = new impressionTextSanitizer(); // MyTextSanitizer object

global $xoopModuleConfig;

?>