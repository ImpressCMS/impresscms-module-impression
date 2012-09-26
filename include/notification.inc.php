<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/notification.inc.php
*
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

function impression_notify_iteminfo( $category, $item_id ) {
	$mydirname = basename( dirname( dirname( __FILE__ ) ) );
	include_once ICMS_ROOT_PATH . '/modules/' . $mydirname . '/include/functions.php';
	if ( empty( icms::$module ) || icms::$module -> getVar( 'dirname' ) != 'impression' ) {
		$module_handler = icms::handler( 'icms_module' );
		$module = $module_handler -> getByDirname( $mydirname );
		$config_handler = icms::$config;
		$config = $config_handler -> getConfigsByCat( 0, $module -> getVar( 'mid' ) );
	}
	if ( $category == 'global' ) {
		$item['name'] = '';
		$item['url']  = '';
		return $item;
	}
	if ( $category == 'category' ) {
		$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $item_id;
		if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			return false;
		}
		$result_array	= icms::$xoopsDB -> fetchArray( $result );
		$item['name']	= $result_array['title'];
		$item['url']	= ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/catview.php?cid=' . $item_id;
		return $item;
	}
	if ( $category == 'article' ) {
		$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $item_id;
		if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			return false;
		}
		$result_array = icms::$xoopsDB -> fetchArray( $result );
		$item['url'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?aid=' . $item_id;
		$item['name'] = $result_array['title'];
		return $item;
	}
}
?>