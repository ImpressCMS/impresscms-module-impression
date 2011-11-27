<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: feed.php
*
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

//if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }

include_once 'header.php';
require_once ICMS_ROOT_PATH . '/class/template.php';

$aid = intval( impression_cleanRequestVars( $_REQUEST, 'aid', 0 ) );

$error_message = _MD_IMPRESSION_NOITEMSELECTED;

if ( $aid == 0 ) {
	redirect_header('javascript:history.go(-1)', 1, $error_message);
	exit();
}

$result = icms::$xoopsDB -> query( 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published>0 AND published<=' . time() . ' AND status=0 AND aid=' . intval( $aid ) );
$myrow = icms::$xoopsDB -> fetchArray( $result );

$result2 = icms::$xoopsDB -> query( 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $myrow['cid'] );
$mycat = icms::$xoopsDB -> fetchArray( $result2 );

$xoopsTpl = new icms_view_Tpl();

if ( icms::$module -> config['showsubmitter'] ) {
	$submitter = _MD_IMPRESSION_BY . strip_tags( icms_member_user_Handler::getUserLink( $myrow['uid'] ) );
} else {
	$submitter = '';
}

$date = formatTimestamp( $myrow['published'], icms::$module -> config['dateformat'] );

$item = array();
$item['printtitle']  = $icmsConfig['sitename'] . ' - ' . $impressionmyts -> htmlSpecialCharsStrip( $myrow['title'] );
$item['printheader'] = icms::$module -> config['headerprint'];
$who_when    = sprintf( _MD_IMPRESSION_WHO_WHEN, $submitter, $date );
$item['categoryname']= $mycat['title'];
$item['title']       = $myrow['title'];
$item['introtext']   = $myrow['introtext'];
$item['description'] = $myrow['description'];

$xoopsTpl -> assign( 'printtitle', $item['printtitle'] );
$xoopsTpl -> assign( 'printlogourl', icms::$module -> config['printlogourl'] );
$xoopsTpl -> assign( 'printheader', $item['printheader'] );
$xoopsTpl -> assign( 'lang_category', _MD_IMPRESSION_CATEGORY );
$xoopsTpl -> assign( 'lang_author_date', $who_when );
$xoopsTpl -> assign( 'item', $item );
$xoopsTpl -> assign( 'itemfooter', strip_tags( $impressionmyts -> htmlSpecialCharsStrip( icms::$module -> config['itemfooter'] ) ) );
$xoopsTpl -> display( 'db:impression_print.html' );
?>