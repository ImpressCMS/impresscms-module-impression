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

include 'header.php';
include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/class/impressionfeed.php'; 

$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_configs' );
$config_arr = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );

if ( $config_arr['rssactive'] == 1 ) {
	
	$myFeed = new ImpressionFeed();
	$myFeed -> webMaster 	 = $config_arr['rsswebmaster'];
	$myFeed -> channelEditor = $config_arr['rsseditor'];
	$myFeed -> image 		 = array( 'url' => $config_arr['rssimgurl'] );
	$myFeed -> width 		 = $config_arr['rsswidth'];
	$myFeed -> height 		 = $config_arr['rssheight'];
	$myFeed -> title 		 = $config_arr['rsstitle'];
	$myFeed -> generator 	 = $config_arr['rssgenerator'];
	$myFeed -> category 	 = $config_arr['rsscategory'];
	$myFeed -> ttl 			 = $config_arr['rssttl'];
	$myFeed -> copyright 	 = $config_arr['rsscopyright'];
	
	$sql2 = icms::$xoopsDB -> query( 'SELECT aid, cid, title, published, introtext, nice_url FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 AND published <= ' . time() . ' AND status=0 ORDER BY published DESC ', $config_arr['rsstotal'], 0 );
	while ( $myrow = icms::$xoopsDB -> fetchArray( $sql2 ) ) {	
		
		// First get the main category title of the link
		$sql3 = icms::$xoopsDB -> query( 'SELECT title FROM ' . icms::$xoopsDB -> prefix('impression_cat') . ' WHERE cid=' . $myrow['cid'] );
		$mycat = icms::$xoopsDB -> fetchArray( $sql3 );
		$category = htmlspecialchars( $mycat['title'] );

		// Get date, title, definition (shortened) and the url of the link
		$title  = htmlspecialchars( $myrow['title'] );
		$date   = formatTimestamp( $myrow['published'], 'r' );
		$text   = htmlspecialchars( $myrow['introtext'] );
		$link   = impression_niceurl( $myrow['aid'], $myrow['title'], $myrow['nice_url'], icms::$module -> config['niceurl'] );

		$myFeed -> feeds[] = array ( 'title' => $title, 'link' => $link, 'description' => $text, 'pubdate' => $date, 'category' => $category, 'guid' => $link );
	}
	$myFeed -> render();
} else {
	$myFeed = new ImpressionFeed();
	$myFeed -> feeds[] = array( 'title'		=> $config_arr['rssofftitle'],
								'link' 		=> ICMS_URL,
								'description' => $config_arr['rssoffdsc']
								);
	$myFeed -> render(); 
}
?>