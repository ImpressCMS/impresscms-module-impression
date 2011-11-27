<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/search.inc.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
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

function impressioncheckSearchgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
	$groups = is_object( icms::$user ) ? icms::$user -> getGroups() : XOOPS_GROUP_ANONYMOUS;
	$gperm_handler = icms::handler('icms_member_groupperm');
	$module_handler = &icms::handler( 'icms_module' );
	$module = &$module_handler -> getByDirname( basename( dirname( dirname( __FILE__ ) ) ) );
	if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) ) {
		if ( $redirect == false ) {
			return false;
		} else {
			redirect_header( 'index.php', 3, _NOPERM );
			exit();
		}
	}
	unset( $module );
	return true;
} 

function impression_search( $queryarray, $andor, $limit, $offset, $userid ) {
	include_once ICMS_ROOT_PATH . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/include/functions.php';
	$modhandler = icms::handler( 'icms_module' );
	$impressionModule = $modhandler -> getByDirname( basename( dirname( dirname( __FILE__ ) ) ) );
	$config_handler = icms::$config;
	$impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
	$sql = 'SELECT cid, pid FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' );
	$result = icms::$xoopsDB -> query( $sql );
	while ( $_search_group_check = icms::$xoopsDB -> fetchArray( $result ) ) {
		$_search_check_array[$_search_group_check['cid']] = $_search_group_check;
	}

	$sql  = 'SELECT aid, cid, title, uid, published, introtext, description, nice_url FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published>0 AND published<=' . time() . ' AND status=0 AND cid>0';

	if ( $userid != 0 ) { $sql .= ' AND uid=' . $userid . ' '; } 

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
		$sql .= ') ';
	}
	$sql .= 'ORDER BY published DESC';
	$result = icms::$xoopsDB -> query( $sql, $limit, $offset );
	$ret = array();
	$i = 0;
	
	while ( $myrow = icms::$xoopsDB -> fetchArray( $result ) ) {
		if ( false == impressioncheckSearchgroups( $myrow['cid'] ) ) {
			continue;
		}
		$nice_link = impression_nicelink( $myrow['title'], $myrow['nice_url'] );
		if ( $impressionModuleConfig['niceurl'] ) {
			$ret[$i]['link'] = 'singlearticle.php?aid=' . intval( $myrow['aid'] ) . '&amp;page=' . $nice_link;
		} else {
			$ret[$i]['link'] = 'singlearticle.php?aid=' . intval( $myrow['aid'] );
		}
		$ret[$i]['image'] = 'images/impression_search.png';
		$ret[$i]['title'] = $myrow['title'];
		$ret[$i]['time']  = $myrow['published'];
		$ret[$i]['uid'] = $myrow['uid'];
		$i++;
	}
	unset( $_search_check_array );
	return $ret;
}
?>