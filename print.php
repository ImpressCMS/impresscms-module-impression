<?php

/**
* $Id: print.php,v 1.16 2007/02/10 01:41:26 malanciault Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once 'header.php';
require_once XOOPS_ROOT_PATH.'/class/template.php';

if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$aid = intval($aid);

$error_message = _MD_IMPRESSION_NOITEMSELECTED;
if ($aid == 0) {
	redirect_header("javascript:history.go(-1)", 1, $error_message);
	exit();
}

global $xoopsDB, $xoopsConfig, $xoopsModuleConfig;
$result = $xoopsDB -> query( "SELECT cid, title, submitter, published, status, date, hits, introtext, description FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND offline = 0 AND aid=".$aid  );
$myrow = $xoopsDB -> fetchArray( $result );

$result2 = $xoopsDB -> query( "SELECT title FROM " . $xoopsDB -> prefix('impression_cat') . " WHERE cid=".$myrow['cid']);
$mycat = $xoopsDB -> fetchArray( $result2 );

$xoopsTpl = new XoopsTpl();
$myts = MyTextSanitizer::getInstance();
// $item=  $itemObj->toArray();
$item = array();
$item['printtitle'] = $xoopsConfig['sitename']." - ".$myts->displayTarea($myrow['title']);
//$item['printheader'] = 'Print Header';
$item['printheader'] = _MD_IMPRESSION_PUBLISHED . formatTimestamp($myrow['published'], $xoopsModuleConfig['dateformat']);
$item['who_where'] = sprintf(_MD_IMPRESSION_WHO_WHEN, $myrow['submitter'], formatTimestamp($myrow['published'], $xoopsModuleConfig['dateformat']));
$item['categoryname'] = $mycat['title'];
$item['title'] = $myrow['title'];
$item['introtext'] = $myrow['introtext'];
$item['description'] = $myrow['description'];
$xoopsTpl->assign('printtitle', $item['printtitle']);
$xoopsTpl->assign('printlogourl', $xoopsModuleConfig['printlogourl']);
$xoopsTpl->assign('printheader', $item['printheader']);
$xoopsTpl->assign('lang_category', _MD_IMPRESSION_CATEGORY);
$xoopsTpl->assign('lang_author_date', $item['who_where']);
$xoopsTpl->assign('item', $item);
if($xoopsModuleConfig['footerprint']== 'item footer' || $xoopsModuleConfig['footerprint']== 'both'){
	$xoopsTpl->assign('itemfooter', $myts->displayTarea( $xoopsModuleConfig['itemfooter']));
}
if($xoopsModuleConfig['footerprint']== 'index footer' || $xoopsModuleConfig['footerprint']== 'both'){
	$xoopsTpl->assign('indexfooter', $myts->displayTarea( $xoopsModuleConfig['indexfooter']));
}

//$xoopsTpl->assign('display_whowhen_link', $xoopsModuleConfig['display_whowhen_link']);

$xoopsTpl->display('db:impression_print.html');

?>