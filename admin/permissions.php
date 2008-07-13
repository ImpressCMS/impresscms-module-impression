<?php
/**
 * $Id: permissions.php
 * Module: Impression
 */

include 'admin_header.php';
include_once '../../../include/cp_header.php';
include_once ICMS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

xoops_cp_header();
impression_adminmenu( _AM_IMPRESSION_PERM_MANAGEMENT );

$permtoset = isset($_POST['permtoset']) ? intval($_POST['permtoset']) : 1;
$selected = array('','','','','');
$selected[$permtoset-1] = ' selected';
echo "<form method='post' name='fselperm' action='permissions.php'><table border=0><tr><td><select name='permtoset' onChange='javascript: document.fselperm.submit()'>
<option value='1'" . $selected[0] . ">" . _AM_IMPRESSION_PERM_CPERMISSIONS . "</option>
<option value='2'" . $selected[1] . ">" . _AM_IMPRESSION_PERM_SPERMISSIONS . "</option>
<option value='3'" . $selected[2] . ">" . _AM_IMPRESSION_PERM_APERMISSIONS . "</option>
<option value='4'" . $selected[3] . ">" . _AM_IMPRESSION_PERM_AUTOPERMISSIONS . "</option>
</select></td></tr><tr><td><input type='submit' name='go'/></td></tr></table></form>";
$module_id = $xoopsModule -> getVar('mid');

switch($permtoset) {
	case 1:
		$title_of_form = _AM_IMPRESSION_PERM_CPERMISSIONS;
		$perm_name = 'ImpressionCatPerm';
		$perm_desc = _AM_IMPRESSION_PERM_CSELECTPERMISSIONS;
		break;
	case 2:
		$title_of_form = _AM_IMPRESSION_PERM_SPERMISSIONS;
		$perm_name = 'ImpressionSubPerm';
		$perm_desc = _AM_IMPRESSION_PERM_SPERMISSIONS_TEXT;
		break;
	case 3:
		$title_of_form = _AM_IMPRESSION_PERM_APERMISSIONS;
		$perm_name = 'ImpressionAppPerm';
		$perm_desc = _AM_IMPRESSION_PERM_APERMISSIONS_TEXT;
		break;
	case 4:
		$title_of_form = _AM_IMPRESSION_PERM_AUTOPERMISSIONS;
		$perm_name = 'ImpressionAutoApp';
		$perm_desc = _AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT;
		break;
}

$permform = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc);
$result = $xoopsDB -> query( "SELECT cid, pid, title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " ORDER BY title ASC" );
if ( $xoopsDB -> getRowsNum( $result ) ) {
    while ( $permrow = $xoopsDB -> fetcharray( $result ) ) {
        $permform -> addItem( $permrow['cid'], "&nbsp;" . $permrow['title'], $permrow['pid']);
    }
    echo $permform -> render();
} else {
    echo "<div><b>" . _AM_IMPRESSION_PERM_CNOCATEGORY . "</b></div>";
} 
unset ( $permform );

echo _AM_IMPRESSION_PERM_PERMSNOTE . "<br />";

xoops_cp_footer();

?>