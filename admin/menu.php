<?php
/**
 * $Id: menu.php
 * Module: Impression
 */

$impressiondir = basename( dirname( dirname( __FILE__ ) ) );

include_once ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/include/functions.php';

$adminmenu[1]['title'] = _MI_IMPRESSION_BINDEX;
$adminmenu[1]['link']  = 'admin/index.php';
$adminmenu[1]['icon']  = 'images/impression_iconbig.png'; // 32x32 px for options bar (tabs) 
$adminmenu[1]['small'] = 'images/impression_iconsmall.png'; // 16x16 px for drop down

$adminmenu[2]['title'] = _MI_IMPRESSION_MARTICLES;
$adminmenu[2]['link']  = 'admin/index.php?op=edit';
$adminmenu[2]['icon']  = 'images/impression_iconbig.png'; // 32x32 px for options bar (tabs) 
$adminmenu[2]['small'] = 'images/impression_iconsmall.png'; // 16x16 px for drop down

$adminmenu[3]['title'] = _MI_IMPRESSION_MCATEGORY;
$adminmenu[3]['link']  = 'admin/category.php';
$adminmenu[3]['icon']  = 'images/icon/folder.png';
$adminmenu[3]['small'] = 'images/icon/folder_small.png';

$adminmenu[4]['title'] = _MI_IMPRESSION_INDEXPAGE;
$adminmenu[4]['link']  = 'admin/indexpage.php';
$adminmenu[4]['icon']  = 'images/icon/indexpage.png';
$adminmenu[4]['small'] = 'images/icon/indexpage_small.png';

$adminmenu[5]['title'] = _MI_IMPRESSION_MUPLOADS;
$adminmenu[5]['link']  = 'admin/upload.php';
$adminmenu[5]['icon']  = 'images/icon/upload.png';
$adminmenu[5]['small'] = 'images/icon/upload_small.png';


$adminmenu[6]['title'] = _MI_IMPRESSION_BLOCKADMIN;
$adminmenu[6]['link']  = 'admin/myblocksadmin.php';
$adminmenu[6]['icon']  = 'images/icon/blocks.png';
$adminmenu[6]['small'] = 'images/icon/blocks_small.png';

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
	$headermenu[$i]['title'] = _AM_IMPRESSION_BPERMISSIONS;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . $impressiondir . '/admin/permissions.php';

	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_ABOUT;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . $impressiondir . '/admin/about.php';
}

?>