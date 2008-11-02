<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: catview.php
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

include 'header.php';

// Begin Main page Heading etc
$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );
$selectdate = impression_cleanRequestVars( $_REQUEST, 'selectdate', '' );
$list = impression_cleanRequestVars( $_REQUEST, 'list', '' );
$cid = intval($cid);
$catsort = $xoopsModuleConfig['sortcats'];
$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$arr = $mytree -> getFirstChild( $cid, $catsort );

if ( is_array( $arr ) > 0 && !$list && !$selectdate ) {
    if ( false == impression_checkgroups( $cid ) ) {
        redirect_header( 'index.php', 1, _MD_IMPRESSION_MUSTREGFIRST );
        exit();
    } 
}

$xoopsOption['template_main'] = 'impression_catview.html';

include ICMS_ROOT_PATH . '/header.php';

global $xoopsModuleConfig, $xoopsModule;

$catarray['imageheader'] = impression_imageheader();
$xoopsTpl -> assign( 'catarray', $catarray );

// Breadcrumb
$pathstring = '<a href="index.php">' . _MD_IMPRESSION_MAIN . '</a>&nbsp;:&nbsp;';
$pathstring .= $mytree -> getNicePathFromId( $cid, 'title', 'catview.php?op=' );
$xoopsTpl -> assign( 'category_path', $pathstring );
$xoopsTpl -> assign( 'category_id', $cid );

// Display Sub-categories for selected Category
if ( is_array( $arr ) > 0 && !$list && !$selectdate ) {
    $scount = 1;
    foreach( $arr as $ele ) {
        if ( impression_checkgroups( $ele['cid'] ) == false ) {
            continue;
        } 
        $sub_arr = array();
        $sub_arr = $mytree -> getFirstChild( $ele['cid'], $catsort );
        $space = 1;
        $chcount = 1;
        $infercategories = '';
        foreach( $sub_arr as $sub_ele ) {

            // Subitem file count
            $hassubitems = impression_getTotalItems( $sub_ele['cid'] );

            // Filter group permissions
            if ( true == impression_checkgroups( $sub_ele['cid'] ) ) {

                // If subcategory count > 5 then finish adding subcats to $infercategories and end
                if ( $chcount > 5 ) {
                    $infercategories .= '...';
                    break;
                } 
                if ( $space > 0 )
                    $infercategories .= ', ';

                $infercategories .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/catview.php?cid=' . $sub_ele['cid'] . '">' . $impressionmyts -> htmlSpecialCharsStrip( $sub_ele['title'] ) . '</a> (' . $hassubitems['count'] . ')';
                $space++;
                $chcount++;
            } 
        } 
        $totalarticles = impression_getTotalItems( $ele['cid'] );
        $indicator['image'] = 'modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/folder.png';
        $indicator['alttext'] = _MD_IMPRESSION_NEWLAST;

        $_image = ( $ele['imgurl'] ) ? urldecode( $ele['imgurl'] ) : '';
        
        if ( empty( $_image ) || $_image == '' ) {
            $imgurl = $indicator['image'];
            $_width = 33;
            $_height = 24;
        } else {
            $imgurl = "{$xoopsModuleConfig['catimage']}/$_image";
        }
	// End

        $xoopsTpl -> append( 'subcategories',
                  array( 'title' => $impressionmyts -> htmlSpecialCharsStrip( $ele['title'] ),
                         'id' => $ele['cid'],
                         'image' => ICMS_URL . "/$imgurl",
                         'infercategories' => $infercategories,
                         'totalarticles' => $totalarticles['count'],
                         'count' => $scount,
                         'alttext' => $ele['description'],
                         'showartcount' => $xoopsModuleConfig['showartcount'],
                         'module_dir' => $xoopsModule -> getVar( 'dirname' ) )
                         );
        $scount++;
    }
}

// Show Description for Category listing
$sql = 'SELECT title, description, imgurl FROM ' . $xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . intval( $cid );
$head_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
//$description = $head_arr['description'];
$xoopsTpl -> assign( 'description', $head_arr['description'] );
$xoopsTpl -> assign( 'xoops_pagetitle', $head_arr['title'] );

// Extract articleload information from database
$xoopsTpl -> assign( 'show_categort_title', true );

$start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
$orderby = ( isset( $_REQUEST['orderby'] ) && !empty( $_REQUEST['orderby'] ) ) ? impression_convertorderbyin( htmlspecialchars($_REQUEST['orderby']) ) : impression_convertorderbyin( $xoopsModuleConfig['articlexorder'] );

if ( $selectdate ) {
    $d = date( 'j', $selectdate );
    $m = date( 'm', $selectdate );
    $y = date( 'Y', $selectdate );

    $stat_begin = mktime ( 0, 0, 0, $m, $d, $y );
    $stat_end = mktime ( 23, 59, 59, $m, $d, $y );

    $query = ' WHERE published >= ' . $stat_begin . ' AND published <= ' . $stat_end . ' AND status = 0 AND cid > 0';

    $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . $query . ' ORDER BY ' . $orderby;
    $result = $xoopsDB -> query( $sql, $xoopsModuleConfig['perpage'] , $start );

    $sql = 'SELECT COUNT(*) FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . $query;
    list( $count ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $sql ) );
    $list_by = 'selectdate=' . $selectdate;
} elseif ( $list ) {
    $query = ' WHERE title LIKE $list% AND (published > 0 AND published <= ' . time() . ') AND status = 0 AND cid > 0';

    $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . $query . ' ORDER BY ' . $orderby;
    $result = $xoopsDB -> query( $sql, $xoopsModuleConfig['perpage'] , $start );

    $sql = "SELECT COUNT(*) FROM " . $xoopsDB -> prefix( 'impression_articles' ) . $query;
    list( $count ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $sql ) );
    $list_by = 'list=$list';
} else {
    $sql = 'SELECT DISTINCT a.* FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
         . $xoopsDB -> prefix( 'impression_altcat' ) . ' b'
         . ' ON b.aid = a.aid'
         . ' WHERE a.published > 0 AND a.published <= ' . time()
         . ' AND a.status = 0'
         . ' AND (b.cid=a.cid OR (a.cid=' . intval($cid) . ' OR b.cid=' . intval($cid) . '))'
         . ' ORDER BY ' . $orderby;
    $result = $xoopsDB -> query( $sql, $xoopsModuleConfig['perpage'] , $start );
    $xoopsTpl -> assign( 'show_categort_title', false );

    $sql2 = 'SELECT COUNT(*) FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
                                    . $xoopsDB -> prefix( 'impression_altcat' ) . ' b'
                                    . ' ON b.aid = a.aid'
                                    . ' WHERE a.published > 0 AND a.published <= ' . time()
                                    . ' AND a.status = 0'
                                    . ' AND (b.cid=a.cid OR (a.cid=' . intval($cid) . ' OR b.cid=' . intval($cid) . '))';
    list( $count ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $sql2 ) );
    $order = impression_convertorderbyout($orderby);
    $list_by = 'cid=' . intval($cid) . '&orderby=$order';
}
$pagenav = new XoopsPageNav( $count, $xoopsModuleConfig['perpage'] , $start, 'start', $list_by );

// Show articles
if ( $count > 0 ) {
    $moderate = 0;
    while ( $article_arr = $xoopsDB -> fetchArray( $result ) ) {
        $res_type = 0;
        require ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/include/articleloadinfo.php';
        $xoopsTpl -> append( 'article', $article );
    }

    // Show order box
    $xoopsTpl -> assign( 'show_articles', false );
    if ( $count > 1 && $cid != 0 ) {
        $xoopsTpl -> assign( 'show_articles', true );
        $orderbyTrans = impression_convertorderbytrans( $orderby );
        $xoopsTpl -> assign( 'lang_cursortedby', sprintf( _MD_IMPRESSION_CURSORTBY, impression_convertorderbytrans( $orderby ) ) );
        $orderby = impression_convertorderbyout( $orderby );
    } 

    // Nav page render
    $page_nav = $pagenav -> renderNav();
    $istrue = ( isset( $page_nav ) && !empty( $page_nav ) ) ? true : false;
    $xoopsTpl -> assign( 'page_nav', $istrue );
    $xoopsTpl -> assign( 'pagenav', $page_nav );
    $xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
    $xoopsTpl -> assign( 'showartcount', $xoopsModuleConfig['showartcount'] );
}
unset( $article_arr );

include ICMS_ROOT_PATH . '/footer.php';

?>