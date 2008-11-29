<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: topten.php
*
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

include 'header.php';

$xoopsOption['template_main'] = 'impression_topten.html';
include ICMS_ROOT_PATH . '/header.php';

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

$action_array 	= array( 'hit' => 0 );
$list_array 	= array( 'hits' );
$lang_array 	= array( _MD_IMPRESSION_HITS );
$rankings 		= array();

$sort 		= 'hit';
$sort_arr 	= $action_array[$sort];
$sortDB 	= $list_array[$sort_arr];

$arr = array();
$result = $xoopsDB -> query( 'SELECT cid, title, pid FROM ' . $xoopsDB -> prefix( 'impression_cat' ) . ' WHERE pid=0 ORDER BY ' . $xoopsModuleConfig['sortcats'] );

$e = 0;
while ( list( $cid, $ctitle ) = $xoopsDB -> fetchRow( $result ) ) {
    if ( true == impression_checkgroups( $cid ) ) {
        $query = 'SELECT aid, cid, title, hits FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 AND published <= ' . time() . ' AND status = 0 AND (cid=' . intval($cid);
        $arr = $mytree -> getAllChildId( $cid );
        for( $i = 0; $i < count( $arr ); $i++ ) {
            $query .= ' or cid=' . $arr[$i] . '';
        }
        $query .= ') order by ' . $sortDB . ' DESC';
        $result2 = $xoopsDB -> query( $query, 10, 0 );
        $filecount = $xoopsDB -> getRowsNum( $result2 );

        if ( $filecount > 0 ) {
            $rankings[$e]['title'] = $impressionmyts -> htmlSpecialCharsStrip( $ctitle );
            $rank = 1;
            while ( list( $did, $dcid, $dtitle, $hits ) = $xoopsDB -> fetchRow( $result2 ) ) {
				
				$result3 = $xoopsDB -> query( 'SELECT title FROM ' . $xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $dcid );
				$mycat = $xoopsDB -> fetchArray( $result3 );
				
                $category = $mycat['title'];
                $dtitle = $impressionmyts -> htmlSpecialCharsStrip( $dtitle );
                $rankings[$e]['file'][] = array( 'id' => $did, 'cid' => $dcid, 'rank' => $rank, 'title' => $dtitle, 'category' => $category, 'hits' => $hits );
                $rank++;
            }
            $e++;
        }
    }
}

$xoopsTpl -> assign( 'imageheader', '<div class="impression_header">' . impression_imageheader() . '</div>' );
$xoopsTpl -> assign( 'back', '<a class="impression_button" href="javascript:history.go(-1)">&#9668; ' . _MD_IMPRESSION_BACKBUTTON . '</a>' );
$xoopsTpl -> assign( 'lang_sortby' , $lang_array[$sort_arr] );
$xoopsTpl -> assign( 'rankings', $rankings );
$xoopsTpl -> assign( 'module_dir', $mydirname );

include ICMS_ROOT_PATH . '/footer.php';

?>