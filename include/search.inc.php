<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/search.inc.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since			1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links 
* @since			1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since			1.00
* @author		McDonald
* @version		$Id$
*/

function impression_search( $queryarray, $andor, $limit, $offset, $userid ) {
    global $xoopsDB, $xoopsUser;

    $sql = "SELECT cid, pid FROM " . $xoopsDB -> prefix( 'impression_cat' );
    $result = $xoopsDB -> query( $sql );
    while ( $_search_group_check = $xoopsDB -> fetchArray( $result ) ) {
        $_search_check_array[$_search_group_check['cid']] = $_search_group_check;
    } 

    $sql  = "SELECT aid, cid, title, submitter, published, introtext, description FROM " . $xoopsDB -> prefix( 'impression_articles' );
    $sql .= " WHERE published > 0 AND published <= " . time() . " AND status = 0 AND cid > 0";

    if ( $userid != 0 ) {
        $sql .= " AND submitter=" . $userid . " ";
    } 

    // because count() returns 1 even if a supplied variable
    // is not an array, we must check if $querryarray is really an array
    if ( is_array( $queryarray ) && $count = count( $queryarray ) ) {
        $sql .= " AND ((title LIKE LOWER('%$queryarray[0]%') OR LOWER(introtext) 
							  LIKE LOWER('%$queryarray[0]%') OR LOWER(description) 
							  LIKE LOWER('%$queryarray[0]%'))";
        for( $i = 1;$i < $count;$i++ ) {
            $sql .= " $andor ";
            $sql .= "(title LIKE LOWER('%$queryarray[$i]%') OR LOWER(introtext) 
							LIKE LOWER('%$queryarray[$i]%') OR LOWER(description) 
							LIKE LOWER('%$queryarray[$i]%'))";
        } 
        $sql .= ") ";
    } 
    $sql .= "ORDER BY published DESC";
    $result = $xoopsDB -> query( $sql, $limit, $offset );
    $ret = array();
    $i = 0;

    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
        $ret[$i]['image'] = 'images/impression_search.png';
        $ret[$i]['link'] = 'singlearticle.php?cid=' . $myrow['cid'] . '&amp;aid=' . $myrow['aid'];
        $ret[$i]['title'] = $myrow['title'];
        $ret[$i]['time'] = $myrow['published'];
        $ret[$i]['uid'] = $myrow['submitter'];
        $i++;
    } 
    unset( $_search_check_array );
    return $ret;
} 

?>
