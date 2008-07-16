<?php
/**
 * $Id: notification.inc.php
 * Module: Impression
 */

function impression_notify_iteminfo($category, $item_id) {
	global $xoopsModule, $xoopsModuleConfig, $xoopsConfig;
        $mydirname = basename( dirname( dirname( __FILE__ ) ) );
	if (empty($xoopsModule) || $xoopsModule -> getVar('dirname') != 'impression') {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler -> getByDirname( $mydirname );
		$config_handler =& xoops_gethandler( 'config' );
		$config =& $config_handler -> getConfigsByCat(0,$module -> getVar('mid'));
	} else {
		$module =& $xoopsModule;
		$config =& $xoopsModuleConfig;
	}

	if ($category=='global') {
		$item['name']='';
		$item['url']='';
		return $item;
	}

	global $xoopsDB;
	if ($category == 'category') {
		// Assume we have a valid category id
		$sql = "SELECT title FROM " . $xoopsDB -> prefix('impression_cat') . " WHERE cid=" . $item_id;
		if (!$result = $xoopsDB -> query($sql)) {
		    return false;
		}
		$result_array = $xoopsDB -> fetchArray($result);
		$item['name'] = $result_array['title'];
		$item['url'] = ICMS_URL . '/modules/' . $mydirname . '/catview.php?cid=' . $item_id;
		return $item;
	}

	if ($category == 'article') {
		// Assume we have a valid file id
		$sql = "SELECT cid, title FROM " . $xoopsDB->prefix('impression_articles') . " WHERE aid=" . $item_id;
		if (!$result = $xoopsDB -> query($sql)) {
		    return false;
		}
		$result_array = $xoopsDB -> fetchArray($result);
		$item['name'] = $result_array['title'];
		$item['url'] = ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . $result_array['cid'] . '&amp;aid=' . $item_id;
		return $item;
	}
}
?>
