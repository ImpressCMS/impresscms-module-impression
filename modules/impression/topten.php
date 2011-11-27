<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: topten.php
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

include 'header.php';

$xoopsOption['template_main'] = 'impression_topten.html';
include ICMS_ROOT_PATH . '/header.php';

$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

$action_array	= array( 'hit' => 0 );
$list_array		= array( 'hits' );
$lang_array		= array( _MD_IMPRESSION_HITS );
$rankings		= array();

$sort		= 'hit';
$sort_arr	= $action_array[$sort];
$sortDB		= $list_array[$sort_arr];

$arr = array();
$result = icms::$xoopsDB -> query( 'SELECT cid, title, pid FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE pid=0 ORDER BY ' . icms::$module -> config['sortcats'] );

$e = 0;
while ( list( $cid, $ctitle ) = icms::$xoopsDB -> fetchRow( $result ) ) {
	if ( true == impression_checkgroups( $cid ) ) {
		$query = 'SELECT aid, cid, title, hits, nice_url FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 AND published <= ' . time() . ' AND status = 0 AND (cid=' . intval( $cid );
		$arr = $mytree -> getAllChildId( $cid );
		for( $i = 0; $i < count( $arr ); $i++ ) {
			$query .= ' or cid=' . $arr[$i] . '';
		}
		$query .= ') order by ' . $sortDB . ' DESC';
		$result2 = icms::$xoopsDB -> query( $query, 10, 0 );
		$filecount = icms::$xoopsDB -> getRowsNum( $result2 );

		if ( $filecount > 0 ) {
			$rankings[$e]['title'] = $impressionmyts -> htmlSpecialCharsStrip( $ctitle );
			$rank = 1;
			while ( list( $did, $dcid, $dtitlea, $hits, $nice_url ) = icms::$xoopsDB -> fetchRow( $result2 ) ) {
				
				$result3 = icms::$xoopsDB -> query( 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $dcid );
				$mycat = icms::$xoopsDB -> fetchArray( $result3 );	
				$category = $mycat['title'];
				$dtitle = $impressionmyts -> htmlSpecialCharsStrip( $dtitlea );
				$nice_link = impression_nicelink( $dtitlea, $nice_url );
				$rankings[$e]['file'][] = array( 'id' => $did, 'cid' => $dcid, 'rank' => $rank, 'title' => $dtitle, 'category' => $category, 'hits' => $hits, 'nice_link' => $nice_link );
				$rank++;
			}
			$e++;
		}
	}
}

if ( impression_imageheader() ) {
	$xoopsTpl -> assign( 'imageheader', '<div class="impression_header">' . impression_imageheader() . '</div>' );
}
$xoopsTpl -> assign( 'back', '<a class="impression_button" href="javascript:history.go(-1)">&#9668; ' . _MD_IMPRESSION_BACKBUTTON . '</a>' );
$xoopsTpl -> assign( 'lang_sortby' , $lang_array[$sort_arr] );
$xoopsTpl -> assign( 'rankings', $rankings );
$xoopsTpl -> assign( 'nice_url', icms::$module -> config['niceurl'] );
$xoopsTpl -> assign( 'module_dir', icms::$module -> getVar( 'dirname' ) );

include ICMS_ROOT_PATH . '/footer.php';
?>