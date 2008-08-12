<?php
/**
 * $Id: update.php
 * Module: Impression
 */
 
if (!defined("ICMS_ROOT_PATH")) {
 	die("ICMS root path not defined");
}
global $xoopsDB;

$i=0;
// Make changes to table impression_indexpage
$i++;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'impression_indexpage') . " ADD COLUMN lastarticlesyn TINYINT(1) NOT NULL default '0' AFTER indexfooteralign");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
$i++;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'impression_indexpage') . " ADD COLUMN lastarticlestotal VARCHAR(5) NOT NULL default '5' AFTER lastarticlesyn");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

?>