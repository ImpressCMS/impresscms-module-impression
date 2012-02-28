<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: index.php
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

include 'header.php';

$start = intval( impression_cleanRequestVars( $_REQUEST, 'start', 0 ) );

$xoopsOption['template_main'] = 'impression_index.html';
include ICMS_ROOT_PATH . '/header.php';

$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

// Begin Main page Heading etc
$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_indexpage' );
$head_arr = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );

if ( $head_arr['indeximage'] ) {
	$catarray['imageheader'] = '<div class="impression_header">' . impression_imageheader( $head_arr['indeximage'], $head_arr['indexheading'] ) . '</div>';
}
if ( $head_arr['indexheading'] ) {
	$catarray['indexheading'] = '<div style="padding: 12px 3px 12px 8px;">' . $head_arr['indexheading'] . '</div>';
}
$catarray['indexheaderalign'] = $impressionmyts -> htmlSpecialCharsStrip( $head_arr['indexheaderalign'] );
$catarray['indexfooteralign'] = $impressionmyts -> htmlSpecialCharsStrip( $head_arr['indexfooteralign'] );
if ( $head_arr['indexheader'] ) {
	$catarray['indexheader'] = '<div style="text-align: '.$catarray['indexheaderalign'].'; padding: 12px 3px 12px 8px;">' . $head_arr['indexheader'] . '</div>';
}
if ( $head_arr['indexfooter'] ) {
	$catarray['indexfooter'] = '<div style="clear: both; float: '.$catarray['indexfooteralign'].'; padding: 12px 3px 12px 8px;">' . $head_arr['indexfooter'] . '</div>';
}
$xoopsTpl -> assign( 'catarray', $catarray );
// End main page Headers

$count = 1;
$chcount = 0;
$countin = 0;
$catsort = icms::$module -> config['sortcats'];
$result = icms::$xoopsDB -> query( 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE pid = 0 ORDER BY ' . $catsort );
while ( $myrow = icms::$xoopsDB -> fetchArray( $result ) ) {
	$countin++;
	$totalarticleload = impression_getTotalItems( $myrow['cid'], 1 );
	$indicator['image'] = 'modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/folder.png';
	$indicator['alttext'] = _MD_IMPRESSION_NEWLAST;
	if ( impression_checkgroups( $myrow['cid'] ) ) {
		$title = $impressionmyts -> htmlSpecialCharsStrip( $myrow['title'] );
		$arr = array();
		$arr = $mytree -> getFirstChild( $myrow['cid'], 'title' );
		$space = $chcount = 1;
		$subcategories = '';
		foreach( $arr as $ele ) {
			$hassubitems = impression_getTotalItems( $ele['cid'], 1 );
			if ( true == impression_checkgroups( $ele['cid'] ) ) {
				if ( icms::$module -> config['subcats'] == 1 ) {
					$chtitle = $impressionmyts -> htmlSpecialCharsStrip( $ele['title'] );
					if ( $chcount > 5 ) {
						$subcategories .= '...';
						break;
					} 
					if ( $space > 1 ) {
						$subcategories .= '<br />';
					}
					$subcategories .= '&bull;&nbsp;<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/catview.php?cid=' . $ele['cid'] . '">' . $chtitle . '</a> (' . $hassubitems['count'] . ')';
					$space++;
					$chcount++;
				}
			}
		}

		$_image = ( $myrow['imgurl'] ) ? urldecode( $myrow['imgurl'] ) : '';
		if ( empty( $_image ) || $_image == '' ) {
			$imgurl = $indicator['image'];
			$_width = 33;
			$_height = 24;
		} else {
			$imgurl = icms::$module -> config['catimage'] . "/$_image";
		}

		$xoopsTpl -> append( 'categories', array(	'image' => ICMS_URL . "/$imgurl",
													'id' => $myrow['cid'],
													'title' => $title,
													'subcategories' => $subcategories,
													'totalarticles' => $totalarticleload['count'],
													'count' => $count,
													'alttext' => $myrow['description'],
													'showartcount' => icms::$module -> config['showartcount'] )
							);
		$count++;
	}
}

// get total amount of articles and categories
$listings = impression_getTotalItems();
$total_cat = impression_totalcategory();

switch ( $total_cat ) {
	case '1':
		$lang_thereare = _MD_IMPRESSION_THEREIS;
		break;
	default:
		$lang_thereare = _MD_IMPRESSION_THEREARE;
		break;
}

$modhandler = icms::handler( 'icms_module' );
$rss_mod = $modhandler -> getByDirName( 'rss' );
if ( !$rss_mod ) {
	$rss_icon = '';
	$rss_mod = false;
} else {
	$xoopsTpl -> assign( 'rss_icon', '<a href="'. ICMS_URL . '/modules/rss/rss.php?feed=' . icms::$module -> getVar( 'dirname' ) . '" alt="' . _MD_IMPRESSION_GETFEED . '" title="' . _MD_IMPRESSION_GETFEED . '" target="_blank"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/icon/rss.png" /></a>' );
}

if ( $head_arr['lastarticlestotal'] > 0 ) {

	$result = icms::$xoopsDB -> query( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 
										AND published <= ' . time() . ' 
										AND status = 0 
										ORDER BY published DESC', 0, 0 );
	list( $count ) = icms::$xoopsDB -> fetchRow( $result );

	$count = ( ( $count > $head_arr['lastarticlestotal'] ) && ( $head_arr['lastarticlestotal'] != 0 ) ) ? $head_arr['lastarticlestotal'] : $count;
	$limit = ( ( $start + icms::$module -> config['perpage'] ) > $count ) ? ( $count - $start ) : icms::$module -> config['perpage'];

	$result = icms::$xoopsDB -> query( 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 
										AND published <= ' . time() . ' 
										AND status=0 
										ORDER BY published DESC', $limit, $start );
	while ( $article_arr = icms::$xoopsDB -> fetchArray( $result ) ) {
		$res_type = 0;
		$moderate = 0;
		$cid = $article_arr['cid'];
		require ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/include/articleloadinfo.php';
		$xoopsTpl -> append( 'article', $article );
	}
	$pagenav = new icms_view_PageNav( $count, icms::$module -> config['perpage'], $start, 'start' );
	$xoopsTpl -> assign( 'pagenav', $pagenav -> renderNav() );
	$xoopsTpl -> assign( 'showlatest', $head_arr['lastarticlesyn'] );
}

$xoopsTpl -> assign( 'lang_thereare', sprintf( $lang_thereare, $total_cat, $listings['count'] ) );
$xoopsTpl -> assign( 'dirname', icms::$module -> getVar( 'dirname' ) );

$rsssql = 'SELECT rssactive FROM ' . icms::$xoopsDB -> prefix( 'impression_configs' );
list( $rssactive ) = icms::$xoopsDB -> fetchRow( icms::$xoopsDB -> query( $rsssql ) );

if ( $rssactive == 1 ) {
	$xoopsTpl -> assign( 'impression_feed', '<a href="'. ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/feed.php" target="_blank"><img src="images/icon/feed.png" border="0" alt="" title="' . _MD_IMPRESSION_FEED . '" /></a>');
	$xoopsTpl -> assign( 'xoops_module_header', '<atom:link rel="alternate" type="application/rss+xml" title="' . _MD_IMPRESSION_FEED . '" href="feed.php">' );
}

include ICMS_ROOT_PATH . '/footer.php';
?>