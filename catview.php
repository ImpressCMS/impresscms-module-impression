<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: catview.php
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

// Begin Main page Heading etc
$cid = intval( impression_cleanRequestVars( $_REQUEST, 'cid', 0 ) );
if ( $cid == '' ) {
	redirect_header( 'index.php', 2, '' );
	exit();
}
$selectdate = impression_cleanRequestVars( $_REQUEST, 'selectdate', '' );
$list = impression_cleanRequestVars( $_REQUEST, 'list', '' );

$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$arr = $mytree -> getFirstChild( $cid, icms::$module -> config['sortcats'] );

if ( is_array( $arr ) > 0 && !$list && !$selectdate ) {
	if ( false == impression_checkgroups( $cid ) ) {
		redirect_header( 'index.php', 1, _MD_IMPRESSION_MUSTREGFIRST );
		exit();
	}
}

$xoopsOption['template_main'] = 'impression_catview.html';
include ICMS_ROOT_PATH . '/header.php';

// Breadcrumb
$pathstring = '<a href="index.php">' . _MD_IMPRESSION_MAIN . '</a>&nbsp;:&nbsp;';
$pathstring .= $mytree -> getNicePathFromId( $cid, 'title', 'catview.php?op=' );
$xoopsTpl -> assign( 'category_path', '<div class="impression_path" style="font-size: .8em; font-weight: bold;">' . $pathstring . '</div><br />' );
$xoopsTpl -> assign( 'category_id', $cid );

$xoopsTpl -> assign( 'dirname', icms::$module -> getVar( 'dirname' ) );

// Display Sub-categories for selected Category
if ( is_array( $arr ) > 0 && !$list && !$selectdate ) {
	$scount = 1;
	foreach( $arr as $ele ) {
		if ( impression_checkgroups( $ele['cid'] ) == false ) {
			continue;
		}
		$sub_arr = array();
		$sub_arr = $mytree -> getFirstChild( $ele['cid'], icms::$module -> config['sortcats'] );
		$space = 1;
		$chcount = 1;
		$infercategories = '';
		foreach( $sub_arr as $sub_ele ) {
			// Subitem file count
			$hassubitems = impression_getTotalItems( $sub_ele['cid'], 1 );
			// Filter group permissions
			if ( true == impression_checkgroups( $sub_ele['cid'] ) ) {
				// If subcategory count > 5 then finish adding subcats to $infercategories and end
				if ( $chcount > 5 ) {
					$infercategories .= '...';
					break;
				}
				if ( $space > 0 )
					$infercategories .= '&bull;&nbsp;<a href="catview.php?cid=' . $sub_ele['cid'] . '">' . icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $sub_ele['title'] ) ) . '</a> (' . $hassubitems['count'] . ')';
					$infercategories .= '<br />';
				$space++;
				$chcount++;
			}
		}
		$totalarticles = impression_getTotalItems( $ele['cid'], 1 );
		$indicator['image'] = 'modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/folder.png';
		$indicator['alttext'] = _MD_IMPRESSION_NEWLAST;

		$_image = ( $ele['imgurl'] ) ? urldecode( $ele['imgurl'] ) : '';
		if ( empty( $_image ) || $_image == '' ) {
			$imgurl = $indicator['image'];
			$_width = 33;
			$_height = 24;
		} else {
			$imgurl = icms::$module -> config['catimage'] . "/$_image";
		}
	// End

		$xoopsTpl -> append( 'subcategories',
						array(	'title' => icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $ele['title'] ) ),
								'id' => $ele['cid'],
								'image' => ICMS_URL . "/$imgurl",
								'infercategories' => $infercategories,
								'totalarticles' => $totalarticles['count'],
								'count' => $scount,
								'alttext' => $ele['description'],
								'showartcount' => icms::$module -> config['showartcount'],
								'module_dir' => icms::$module -> getVar( 'dirname' ) )
					);
		$scount++;
	}
}

// Show Description for Category listing
$sql = 'SELECT title, description, imgurl FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
$head_arr = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
$xoopsTpl -> assign( 'description', '<div style="font-size: smaller; overflow: auto;">' . $head_arr['description'] . '</div><br />' );
$xoopsTpl -> assign( 'icms_pagetitle', $head_arr['title'] );

if ( impression_imageheader() ) {
	$catarray['imageheader'] = '<div class="impression_header" style="padding-bottom: 12px; text-align: center;">' . impression_imageheader() . '</div>';
	$xoopsTpl -> assign( 'catarray', $catarray );
}

// Extract articleload information from database
$xoopsTpl -> assign( 'show_categort_title', true );

$start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
$orderby = ( isset( $_REQUEST['orderby'] ) && !empty( $_REQUEST['orderby'] ) ) ? impression_convertorderbyin( icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $_REQUEST['orderby'] ) ) ) : impression_convertorderbyin( icms::$module -> config['articlexorder'] );

if ( $selectdate ) {
	$d = date( 'j', $selectdate );
	$m = date( 'm', $selectdate );
	$y = date( 'Y', $selectdate );
	$stat_begin = mktime ( 0, 0, 0, $m, $d, $y );
	$stat_end = mktime ( 23, 59, 59, $m, $d, $y );

	$query = ' WHERE published >= ' . $stat_begin . ' AND published <= ' . $stat_end . ' AND status = 0 AND cid > 0';

	$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . $query . ' ORDER BY ' . $orderby;
	$result = icms::$xoopsDB -> query( $sql, icms::$module -> config['perpage'] , $start );

	$sql = 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . $query;
	list( $count ) = icms::$xoopsDB -> fetchRow( icms::$xoopsDB -> query( $sql ) );
	$list_by = 'selectdate=' . $selectdate;
} elseif ( $list ) {
	$query = ' WHERE title LIKE "' . $list . '%" AND (published > 0 AND published <= ' . time() . ') AND status = 0 AND cid > 0';

	$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . $query . ' ORDER BY ' . $orderby;
	$result = icms::$xoopsDB -> query( $sql, icms::$module -> config['perpage'] , $start );

	$sql = "SELECT COUNT(*) FROM " . icms::$xoopsDB -> prefix( 'impression_articles' ) . $query;
	list( $count ) = icms::$xoopsDB -> fetchRow( icms::$xoopsDB -> query( $sql ) );
	$list_by = 'list=' . $list;
} else {
	$sql = 'SELECT DISTINCT a.* FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
			. icms::$xoopsDB -> prefix( 'impression_altcat' ) . ' b'
			. ' ON b.aid = a.aid'
			. ' WHERE a.published > 0 AND a.published <= ' . time()
			. ' AND a.status = 0'
			. ' AND (b.cid=a.cid OR (a.cid=' . $cid . ' OR b.cid=' . $cid . '))'
			. ' ORDER BY ' . $orderby;
	$result = icms::$xoopsDB -> query( $sql, icms::$module -> config['perpage'] , $start );
	$xoopsTpl -> assign( 'show_categort_title', false );
	$gettotalitems = impression_getTotalItems( $cid );
	$count = $gettotalitems['count'];
	$order = impression_convertorderbyout( $orderby );
	$list_by = 'cid=' . $cid . '&orderby=' . $order;
}
$pagenav = new icms_view_PageNav( $count, icms::$module -> config['perpage'] , $start, 'start', $list_by );

// Show articles
if ( $count > 0 ) {
	$moderate = 0;
	while ( $article_arr = icms::$xoopsDB -> fetchArray( $result ) ) {
		$res_type = 0;
		require ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/include/articleloadinfo.php';
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
	$xoopsTpl -> assign( 'showartcount', icms::$module -> config['showartcount'] );
}
unset( $article_arr );

include ICMS_ROOT_PATH . '/footer.php';
?>