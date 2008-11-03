<?php
/**
* imLinks - a multicategory links management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/admin_header.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since			1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links 
* @since			1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				imLinks
* @since			1.00
* @author		McDonald
* @version		$Id$
*/
 
include '../../../mainfile.php';
include '../../../include/cp_header.php';

include ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar('dirname') . '/include/config.php';
include_once ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar('dirname') . '/include/functions.php';
include_once ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar('dirname') . '/class/impression_lists.php';
include_once ICMS_ROOT_PATH . '/modules/'.$xoopsModule -> getVar('dirname') . '/class/myts_extended.php';

include_once ICMS_ROOT_PATH . '/class/xoopstree.php';
include_once ICMS_ROOT_PATH . '/class/xoopslists.php';
include_once ICMS_ROOT_PATH . '/class/xoopsformloader.php';

//if( !defined("IMPRESSION_ADMIN_URL") ){
//	define('IMPRESSION_ADMIN_URL', ICMS_ROOT_PATH . '/modules/'.$xoopsModule -> getVar('dirname') . '/admin');
//}

$impressionmyts = new impressionTextSanitizer(); // MyTextSanitizer object

$imagearray = array(
	'editimg' 		=> '<img src="../images/icon/page_edit.png" alt="' . _AM_IMPRESSION_ICO_EDIT . '" align="middle">',
	'deleteimg' 	=> '<img src="../images/icon/page_delete.png" alt="' . _AM_IMPRESSION_ICO_DELETE . '" align="middle">',
	'altcat' 		=> '<img src="../images/icon/folder_add.png" alt="' . _AM_IMPRESSION_ALTCAT_CREATEF . '" align="middle">',
	'online' 		=> '<img src="../images/icon/on.png" alt="' . _AM_IMPRESSION_ICO_ONLINE . '" align="middle">',
	'offline' 		=> '<img src="../images/icon/off.png" alt="' . _AM_IMPRESSION_ICO_OFFLINE . '" align="middle">',
	'approved' 		=> '<img src="../images/icon/on.png" alt="' . _AM_IMPRESSION_ICO_APPROVED . '" align="middle">',
	'notapproved' 	=> '<img src="../images/icon/off.png" alt="' . _AM_IMPRESSION_ICO_NOTAPPROVED . '" align="middle">',
	'relatedfaq' 	=> '<img src="../images/icon/link.gif" alt="' . _AM_IMPRESSION_ICO_ARTICLE . '" align="absmiddle">',
	'relatedurl' 	=> '<img src="../images/icon/urllink.gif" alt="' . _AM_IMPRESSION_ICO_URL . '" align="middle">',
	'addfaq' 		=> '<img src="../images/icon/add.gif" alt="' . _AM_IMPRESSION_ICO_ADD . '" align="middle">',
	'approve' 		=> '<img src="../images/icon/accept.png" alt="' . _AM_IMPRESSION_ICO_APPROVE . '" align="middle">',
	'statsimg' 		=> '<img src="../images/icon/stats.gif" alt="' . _AM_IMPRESSION_ICO_STATS . '" align="middle">',
	'ignore' 		=> '<img src="../images/icon/cross.png" alt="' . _AM_IMPRESSION_ICO_IGNORE . '" align="middle">',
	'rejected' 		=> '<img src="../images/icon/cross.png" alt="' . _AM_IMPRESSION_ICO_REJECTED . '" align="middle">',
	'submitted' 	=> '<img src="../images/icon/impression.png" alt="' . _AM_IMPRESSION_ICO_SUBMITTED . '" align="middle">',
	'view' 			=> '<img src="../images/icon/view.png" alt="' . _AM_IMPRESSION_ICO_VIEW . '" align="middle">'
	);

?>