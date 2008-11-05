<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: feed.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
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
include_once ICMS_ROOT_PATH . '/class/icmsfeed.php';

global $xoopsModuleConfig;

$myFeed = new IcmsFeed();

$myFeed -> webMaster = '';  // Admin contact email as stated in general preferences.
	
$sql = $xoopsDB -> query( 'SELECT aid, cid, title, published, introtext FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 AND published <= ' . time() . ' AND status=0 ORDER BY published DESC ', $xoopsModuleConfig['rssfeedtotal'], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $sql ) ) {	
		
		$title = htmlspecialchars( $myrow['title'] );
		$date  = formatTimestamp( $myrow['published'], 'D, d M Y H:i:s' );
		$text  = htmlspecialchars( $impressionmyts -> displayTarea( $myrow['introtext'], 1, 1, 1, 1, 1 ) );
		$link  = ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . intval( $myrow['cid'] ) . '&amp;aid=' . intval( $myrow['aid'] );

		$myFeed -> feeds[] = array (
			'title' 		=> $title,
			'link' 			=> $link,
			'description' 	=> $text,
			'pubdate' 		=> $date,
			'guid' 			=> $link
			);
	}
	
$myFeed -> render(); 

?>