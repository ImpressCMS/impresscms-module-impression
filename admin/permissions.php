<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/permissions.php
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

include 'admin_header.php';

icms_cp_header();
impression_adminmenu( '', _AM_IMPRESSION_PERM_MANAGEMENT );

$permtoset = isset( $_POST['permtoset'] ) ? intval( $_POST['permtoset'] ) : 1;
$selected = array( '','','','','' );
$selected[$permtoset-1] = ' selected';
echo "<form method='post' name='fselperm' action='permissions.php'><table border=0><tr><td><select name='permtoset' onChange='javascript: document.fselperm.submit()'>
<option value='1'" . $selected[0] . ">" . _AM_IMPRESSION_PERM_CPERMISSIONS . "</option>
<option value='2'" . $selected[1] . ">" . _AM_IMPRESSION_PERM_SPERMISSIONS . "</option>
<option value='3'" . $selected[2] . ">" . _AM_IMPRESSION_PERM_APERMISSIONS . "</option>
<option value='4'" . $selected[3] . ">" . _AM_IMPRESSION_PERM_AUTOPERMISSIONS . "</option>
</select>&nbsp;<input type='submit' name='go'/></td></tr></table></form>";
$module_id = icms::$module -> getVar( 'mid' );

$icon = '<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/information_big.png" alt="" style="float: left; padding-right: 10px;" />';

switch($permtoset) {
	case 1:
		$title_of_form =
		'<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
			<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_PERM_CPERMISSIONS . '</div>
			<div style="padding: 8px; font-weight: normal;">' . $icon . _AM_IMPRESSION_PERM_CSELECTPERMISSIONS . '<br /><br /><br /><small>' . _AM_IMPRESSION_PERM_PERMSNOTE . '</small>
			</div>
		</div>';
		$perm_name = 'ImpressionCatPerm';
		break;
	case 2:
		$title_of_form =
		'<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
			<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_PERM_SPERMISSIONS . '</div>
			<div style="padding: 8px; font-weight: normal;">' . $icon . _AM_IMPRESSION_PERM_SPERMISSIONS_TEXT . '<br /><br /><br /><small>' . _AM_IMPRESSION_PERM_PERMSNOTE . '</small>
			</div>
		</div>';
		$perm_name = 'ImpressionSubPerm';
		break;
	case 3:
		$title_of_form =
		'<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
			<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_PERM_APERMISSIONS . '</div>
			<div style="padding: 8px; font-weight: normal;">' . $icon . _AM_IMPRESSION_PERM_APERMISSIONS_TEXT . '<br /><br /><br /><small>' . _AM_IMPRESSION_PERM_PERMSNOTE . '</small>
			</div>
		</div>';
		$perm_name = 'ImpressionAppPerm';
		break;
	case 4:
		$title_of_form =
		'<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
			<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_PERM_AUTOPERMISSIONS . '</div>
			<div style="padding: 8px; font-weight: normal;">' . $icon . _AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT . '<br /><br /><br /><small>' . _AM_IMPRESSION_PERM_PERMSNOTE . '</small>
			</div>
		</div>';
		$perm_name = 'ImpressionAutoApp';
		break;
}

$permform = new icms_form_Groupperm( $title_of_form, $module_id, $perm_name, '', 'admin/permissions.php' );
$result = icms::$xoopsDB -> query( 'SELECT cid, pid, title FROM ' . $xoopsDB -> prefix( 'impression_cat' ) . ' ORDER BY title ASC' );
if ( icms::$xoopsDB -> getRowsNum( $result ) ) {
	while ( $permrow = icms::$xoopsDB -> fetcharray( $result ) ) {
		$permform -> addItem( $permrow['cid'], '&nbsp;' . $permrow['title'], $permrow['pid'] );
	}
	echo $permform -> render();
} else {
	echo '<br /><div style="border: 1px solid #ccc; text-align: center; margin: auto; width: 99%; font-weight: bold; padding: 3px; background-color: #FFFF99;">' . _AM_IMPRESSION_PERM_CNOCATEGORY . '</div>';
} 
unset ( $permform );

icms_cp_footer();
?>