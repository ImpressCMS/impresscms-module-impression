<?php
/**
 * $Id: topten.php
 * Module: Impression
 */

include 'header.php';

$xoopsOption['template_main'] = 'impression_topten.html';
include ICMS_ROOT_PATH . '/header.php';

global $xoopsModule, $xoopsModuleConfig;

//$i = 0;
//while ($i<10) {
 $result = $xoopsDB -> query( "SELECT aid, cid, title, published FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " ORDER BY published ASC");
 while ($myrow = $xoopsDB -> fetchArray($result,10)){
  $result2 = $xoopsDB -> query( "SELECT title FROM " . $xoopsDB -> prefix('impression_cat') . " WHERE cid=" . $myrow['cid']);
  $mycat = $xoopsDB -> fetchArray( $result2 );
  $headlines['cattitle'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/catview.php?cid=' . intval($myrow['cid']).'">' . $mycat['title'] . ' </a>';
//  $headlines['cattitle'] =  '';
  $headlines['adminicons'] = impression_adminicons( $myrow['aid'], $xoopsModule -> getVar( 'dirname' ) );
  $headlines['articledate'] = formatTimestamp( $myrow['published'], $xoopsModuleConfig['dateformat'] );
  $headlines['articletitle'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">' . $myrow['title'] . ' </a>';
 $i++;
 }
$xoopsTpl -> append('headlines', $headlines);

include ICMS_ROOT_PATH . '/footer.php';

?>
