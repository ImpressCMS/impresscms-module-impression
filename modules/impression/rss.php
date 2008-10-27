<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: rss.php
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
include_once XOOPS_ROOT_PATH.'/class/icmsfeed.php'; 
$myFeed = new IcmsFeed ();

global $xoopsTpl, $xoopsTpl;
$sql = $xoopsDB -> query( "SELECT aid, cid, title, published, introtext FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND status=0 ORDER BY published DESC ", 10, 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $sql ) ) {	
		
		$date = formatTimestamp( $myrow['published'], "d F Y" );
		$text = $impressionmyts -> displayTarea( $myrow['introtext'], 1, 1, 1, 1, 1 );

		$myFeed->feeds[] = array (
			'title' => $myrow['title'],
			'link' => ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']),
			'description' => $text,
			'date' => $date,
			'guid' => '',
);
	}	
$myFeed->render(); 

?>