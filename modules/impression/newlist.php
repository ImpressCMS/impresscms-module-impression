<?php
/**
 * $Id: newlist.php
 * Module: Impression
 */

include 'header.php';

$xoopsOption['template_main'] = 'impression_newlistindex.html';
include ICMS_ROOT_PATH . '/header.php';
include_once("footer.php");

global $xoopsModuleConfig;

$catarray['imageheader'] = impression_imageheader();
$xoopsTpl -> assign( 'catarray', $catarray );

if (isset($_GET['newarticleshowdays'])) {
	$newarticleshowdays = intval($_GET['newarticleshowdays']) ? intval($_GET['newarticleshowdays']) : 7;

	$time_cur = time();
	$duration = ( $time_cur - ( 86400 * 30 ) );
	$duration_week = ( $time_cur - ( 86400 * 7 ) );
	$allmontharticles = 0;

	$allweekarticles = 0;
	$result = $xoopsDB -> query( "SELECT aid, cid, published, updated FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE (published >= " . intval($duration) . " AND published <= " . time() . ") OR updated >= " . intval($duration) . " AND status = 0" );
	while ( $myrow = $xoopsDB -> fetcharray( $result ) ) {
	    $published = ( $myrow['updated'] > 0 ) ? $myrow['updated'] : $myrow['published'];
	    $allmontharticles++;
	    if ( $published > $duration_week )
	        $allweekarticles++;
	} 
	$xoopsTpl -> assign( 'allweekarticles', $allweekarticles );
	$xoopsTpl -> assign( 'allmontharticles', $allmontharticles );

	/**
	 * List Last VARIABLE Days of articles
	 */
//	$newvideoshowdays = impression_cleanRequestVars($_REQUEST, 'newvideoshowdays', 7 );
	$xoopsTpl -> assign( 'newarticleshowdays', $newarticleshowdays );

	$dailyarticles = array();

	$d = date( "j", time() );
	$m = date( "m", time() );
	$y = date( "Y", time() );
	$time_begin = mktime ( 0, 0, 0, $m, $d, $y );

	for( $i = 0; $i < intval($newarticleshowdays);$i++ ) {
	    $key = intval($newarticleshowdays) - $i-1;
	    $time = $time_begin - ( 86400 * $key );
	    $dailyarticles[$key]['newarticledayRaw'] = $time;
	    $dailyarticles[$key]['newarticleView'] = formatTimestamp( $time, $xoopsModuleConfig['dateformat'] );
            $dailyarticles[$key]['totalarticles'] = 0;
	} 
}

$duration = ( $time_begin + 1 - ( 86400 * intval($newarticleshowdays) ) );
$result = $xoopsDB -> query( "SELECT aid, cid, published, updated FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE (published > " . intval($duration) . " AND published <= " . $time_cur . ") OR (updated >= " . intval($duration) . " AND updated <= " . $time_cur . ") AND status = 0" );
while ( $myrow = $xoopsDB -> fetcharray( $result ) ) {
    $published = ( $myrow['updated'] > 0 ) ? $myrow['updated'] : $myrow['published'];
    $d = date( "j", $published );
    $m = date( "m", $published );
    $y = date( "Y", $published );
    $key = intval( ( $time_begin - mktime ( 0, 0, 0, $m, $d, $y ) ) / 86400 );
    $dailyarticles[$key]['totalarticles']++;
} 
ksort( $dailyarticles );
reset( $dailyarticles );
$xoopsTpl -> assign( 'dailyarticles', $dailyarticles );
unset( $dailyarticles );

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_articles' );
$sql .="WHERE	published > 0 AND published <= " . $time_cur . ")
		OR (updated > 0 AND updated <= " . $time_cur . ")
		AND status = 0
		ORDER BY " . $xoopsModuleConfig['articlexorder'];
$result = $xoopsDB -> query( $sql, 10 , 0 );
while ( $article_arr = $xoopsDB -> fetchArray( $result ) ) {
    include ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/include/articleloadinfo.php';
} 

$xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
include ICMS_ROOT_PATH . '/footer.php';

?>