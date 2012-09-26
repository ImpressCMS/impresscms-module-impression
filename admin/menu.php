<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/menu.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since		1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links 
* @since		1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

$adminmenu[1]['title'] = _MI_IMPRESSION_BINDEX;
$adminmenu[1]['link']  = 'admin/index.php';
$adminmenu[1]['icon']  = 'images/icon/home.png'; // 32x32 px for options bar (tabs) 
$adminmenu[1]['small'] = 'images/icon/home_small.png'; // 16x16 px for drop down

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

$adminmenu[6]['title'] = _MI_IMPRESSION_RSSFEED;
$adminmenu[6]['link']  = 'admin/feed.php?op=edit';
$adminmenu[6]['icon']  = 'images/icon/feed32.png';
$adminmenu[6]['small'] = 'images/icon/feed.png';

if ( isset( icms::$module ) ) {

	icms_loadLanguageFile( basename( dirname( dirname( __FILE__ ) ) ), 'admin' );

	$i = -1;
	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_GOMODULE;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' );
	$i++;
	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link']  = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . icms::$module -> getVar( 'mid' );
	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_BUPDATE;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/system/admin.php?fct=modulesadmin&op=update&module=' . icms::$module -> getVar( 'dirname' );
	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_BPERMISSIONS;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/permissions.php';
	$i++;
	$headermenu[$i]['title'] = _COMMENTS;
	$headermenu[$i]['link']  = '../../system/admin.php?module=' . icms::$module -> getVar( 'mid' ) . '&status=0&limit=100&fct=comments&selsubmit=Go';
	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_PRUNE;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/prune.php';
	$i++;
	$headermenu[$i]['title'] = _AM_IMPRESSION_ABOUT;
	$headermenu[$i]['link']  = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/about.php';
}
?>