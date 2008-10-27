<?php
/**
 * $Id: menu.php
 * Module: Impression
 */

$impressiondir = basename( dirname( dirname( __FILE__ ) ) );

include_once ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/include/functions.php';

$adminmenu[1]['title'] = _MI_IMPRESSION_BINDEX;
$adminmenu[1]['link']="admin/index.php";
$adminmenu[2]['title'] = _MI_IMPRESSION_INDEXPAGE;
$adminmenu[2]['link']="admin/indexpage.php";
$adminmenu[3]['title'] = _MI_IMPRESSION_MCATEGORY;
$adminmenu[3]['link']="admin/category.php";
$adminmenu[4]['title'] = _MI_IMPRESSION_MARTICLES;
$adminmenu[4]['link']="admin/index.php?op=edit";

global $xoopsModule, $xoopsConfig;

if ( isset( $xoopsModule ) ) {

	if ( file_exists( ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/language/' . $xoopsConfig['language'] . '/admin.php' ) ) {
		include_once ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/language/' . $xoopsConfig['language'] . '/admin.php';
	} else {
		include_once ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/language/english/admin.php';
	}

	$i = -1;

	$i++;
	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link']  = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule -> getVar( 'mid' );

	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_GOMODULE;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . $impressiondir;

	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_BUPDATE;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/system/admin.php?fct=modulesadmin&op=update&module=' . $impressiondir;

	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_ABOUT;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . $impressiondir . '/admin/about.php';
}
?>