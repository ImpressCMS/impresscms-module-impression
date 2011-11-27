<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/admin_header.php
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

$mydirname = basename( dirname( dirname( __FILE__ ) ) );
 
include '../../../include/cp_header.php';

include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/functions.php';
include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/include/functions.php';
include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/class/impression_lists.php';
include_once ICMS_ROOT_PATH . '/modules/'. icms::$module -> getVar( 'dirname' ) . '/class/myts_extended.php';

$impressionmyts = new impressionTextSanitizer(); // MyTextSanitizer object

$imagearray = array(
	'editimg'		=> '<img src="../images/icon/page_edit.png" alt="" title="' . _AM_IMPRESSION_ICO_EDIT . '" style="vertical-align: middle;" />',
	'deleteimg'		=> '<img src="../images/icon/page_delete.png" alt="" title="' . _AM_IMPRESSION_ICO_DELETE . '" style="vertical-align: middle;" />',
	'altcat'		=> '<img src="../images/icon/folder_add.png" alt="" title="' . _AM_IMPRESSION_ALTCAT_CREATEF . '" style="vertical-align: middle;" />',
	'online'		=> '<img src="../images/icon/on.png" alt="" title="' . _AM_IMPRESSION_ICO_ONLINE . '" style="vertical-align: middle;" />',
	'offline'		=> '<img src="../images/icon/off.png" alt="" title="' . _AM_IMPRESSION_ICO_OFFLINE . '" style="vertical-align: middle;" />',
	'approved'		=> '<img src="../images/icon/on.png" alt="" title="' . _AM_IMPRESSION_ICO_APPROVED . '" style="vertical-align: middle;" />',
	'notapproved'	=> '<img src="../images/icon/off.png" alt="" title="' . _AM_IMPRESSION_ICO_NOTAPPROVED . '" style="vertical-align: middle;" />',
	'relatedfaq'	=> '<img src="../images/icon/link.gif" alt="" title="' . _AM_IMPRESSION_ICO_ARTICLE . '" style="vertical-align: middle;" />',
	'relatedurl'	=> '<img src="../images/icon/urllink.gif" alt="" title="' . _AM_IMPRESSION_ICO_URL . '" style="vertical-align: middle;" />',
	'addfaq'		=> '<img src="../images/icon/add.gif" alt="" title="' . _AM_IMPRESSION_ICO_ADD . '" style="vertical-align: middle;" />',
	'approve'		=> '<img src="../images/icon/accept.png" alt="" title="' . _AM_IMPRESSION_ICO_APPROVE . '" style="vertical-align: middle;" />',
	'statsimg'		=> '<img src="../images/icon/stats.gif" alt="" title="' . _AM_IMPRESSION_ICO_STATS . '" style="vertical-align: middle;" /">',
	'ignore'		=> '<img src="../images/icon/cross.png" alt="" title="' . _AM_IMPRESSION_ICO_IGNORE . '" style="vertical-align: middle;" />',
	'rejected'		=> '<img src="../images/icon/cross.png" alt="" title="' . _AM_IMPRESSION_ICO_REJECTED . '" style="vertical-align: middle;" />',
	'submitted'		=> '<img src="../images/icon/impression.png" alt="" title="' . _AM_IMPRESSION_ICO_SUBMITTED . '" style="vertical-align: middle;" />',
	'view'			=> '<span class="impression_button"><img src="../images/icon/find.png" alt="" title="' . _AM_IMPRESSION_ICO_VIEW . '" style="vertical-align: middle;" /> ' . _AM_IMPRESSION_ICO_VIEW . '</span>',
	'clone'			=> '<img src="../images/icon/page_clone.png" alt="" title="' . _AM_IMPRESSION_ICO_CLONE . '" style="vertical-align: middle;" />',
	'blckred'		=> '<img src="../images/icon/box_red.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKN . '" style="vertical-align: middle;" />',
	'blckgreen'		=> '<img src="../images/icon/box_green.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKY . '" style="vertical-align: middle;" />',
	'blckorange'	=> '<img src="../images/icon/box_orange.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKN . '" style="vertical-align: middle;" />',
	'blckgrey'		=> '<img src="../images/icon/box_grey.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKY . '" style="vertical-align: middle;" />',
	'blckyellow'	=> '<img src="../images/icon/box_yellow.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKY . '" style="vertical-align: middle;" />',
	'blckblue'		=> '<img src="../images/icon/box_blue.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKY . '" style="vertical-align: middle;" />'
);

global $impressionmyts;
?>