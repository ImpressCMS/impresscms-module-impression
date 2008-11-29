<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: feed.php
*
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since			1.00
* @author		McDonald
* @version		$Id$
*/

include 'header.php';

global $xoopsModuleConfig, $xoopsModule;
	
include_once ICMS_ROOT_PATH . '/modules/' . $mydirname . '/class/impressionfeed.php'; 

$sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'imlinks_configs' );
$config_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );

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
	
	$sql2 = $xoopsDB -> query( 'SELECT aid, cid, title, published, introtext, publisher, nobreak FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 AND published <= ' . time() . ' AND status=0 ORDER BY published DESC ', $xoopsModuleConfig['rssfeedtotal'], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $sql2 ) ) {	
		
		// First get the main category title of the link
		$sql3 = $xoopsDB -> query( 'SELECT title FROM ' . $xoopsDB -> prefix('impression_cat') . ' WHERE cid=' . $myrow['cid'] );
        $mycat = $xoopsDB -> fetchArray( $sql3 );
		$category = htmlspecialchars( $mycat['title'] );
		
		// Get date, title, definition (shortened), author and the url of the link
		$author= $myrow['publisher'];
		$title = htmlspecialchars( $myrow['title'] );
		$date  = formatTimestamp( $myrow['published'], 'D, d M Y H:i:s' );
		$text  = htmlspecialchars( $impressionmyts -> displayTarea( $myrow['introtext'], 1, 1, 1, 1, $myrow['nobreak'] ) );
		$link  = ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . intval( $myrow['cid'] ) . '&amp;aid=' . intval( $myrow['aid'] );

		$myFeed -> feeds[] = array (
			'title' 		=> $title,
			'link' 			=> $link,
			'description' 	=> $text,
			'pubdate' 		=> $date,
			'category'		=> $category,
			'author'		=> $author,
			'guid' 			=> $link
			);
	}
	$myFeed -> render(); 
} else {
	$myFeed = new ImpressionFeed(); 
	$myFeed -> feeds[] = array( 'title'       => $config_arr['rssofftitle'],
								'link' 		  => ICMS_URL,
								'description' => $config_arr['rssoffdsc']
								);
	$myFeed -> render(); 
}
?>