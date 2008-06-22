<?php
/**
 * $Id: singlearticle.php
 * Module: Impression
 */

include 'header.php';

$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );
$aid = intval($aid);
$cid = intval($cid);

$sql2 = "SELECT count(*) FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " a LEFT JOIN "
 . $xoopsDB -> prefix( 'impression_altcat' ) . " b "
 . " ON b.aid = a.aid"
 . " WHERE a.published > 0 AND a.published <= " . time()
 . " AND (a.expired = 0 OR a.expired > " . time() . ") AND a.offline = 0"
 . " AND (b.cid=a.cid OR (a.cid=" . intval($cid) . " OR b.cid=" . intval($cid) . "))";
list( $count ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $sql2 ) );

if ( false == checkgroups( $cid ) && $count == 0 ) {
    redirect_header( "index.php", 1, _MD_IMPRESSION_MUSTREGFIRST );
    exit();
} 

$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . intval($aid) . "
		AND (published > 0 AND published <= " . time() . ")
		AND (expired = 0 OR expired > " . time() . ")
		AND offline = 0 
		AND cid > 0";
$result = $xoopsDB -> query( $sql );
$article_arr = $xoopsDB -> fetchArray( $result );

if ( !is_array( $article_arr ) ) {
    redirect_header( "index.php", 1, _MD_IMPRESSION_NOARTICLELOAD );
    exit();
} 

$xoopsOption['template_main'] = 'impression_singlearticle.html';

include XOOPS_ROOT_PATH . '/header.php';

$article['imageheader'] = impression_imageheader();
$article['id'] = $article_arr['aid'];
$article['cid'] = $article_arr['cid'];
$article['submitter'] = xoops_getLinkedUnameFromId( $article_arr['submitter'] );
$article['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) );
$article['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) . ':  ' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $article_arr['cid'] . '&aid=' . $article_arr['aid'] );
// Recommend icon
   $article['recommend'] = '<a href="mailto:?subject='.$article['mail_subject'].'&body='.$article['mail_body'].'" target="_top"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/email.png" alt="' . _MD_IMPRESSION_TELLAFRIEND . '" title="' . _MD_IMPRESSION_TELLAFRIEND . '" align="absmiddle" /></a>';
// Print icon
   $article['print'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/print.php?aid=' . $article_arr['aid'] . '"  target="_blank"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/printer.png" alt="' . _MD_IMPRESSION_PRINT . '" title="' . _MD_IMPRESSION_PRINT . '" align="absmiddle" /></a>';
// PDF icon
// $article['pdf'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/makepdf.php?aid=' . $article_arr['aid'] . '"  target="_blank"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_acrobat.png" alt="' . _MD_IMPRESSION_PDF . '" title="' . _MD_IMPRESSION_PDF . '" align="absmiddle" /></a>';

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$pathstring = "<a href='index.php'>" . _MD_IMPRESSION_MAIN . "</a>&nbsp;:&nbsp;";
$pathstring .= $mytree -> getNicePathFromId( $cid, "title", "catview.php?op=" );
$article['path'] = $pathstring;

// Get Social Bookmarks
$article['sbmarks'] = impression_sbmarks($article_arr['aid']);
$article['description'] = $article_arr['description'];

// Start of meta tags
global $xoopsTpl, $xoTheme;
    $maxWords = 100;
    $words = array();
    $words = explode(" ", impression_html2text($article_arr['description']));
    $newWords = array();
    $i = 0;
    while ($i < $maxWords-1 && $i < count($words)) {
      if (isset($words[$i])) {
       $newWords[] = trim($words[$i]);
      }
      $i++;
    }
    $article_meta_description = implode(' ', $newWords);
    if (is_object($xoTheme)) {
	  $xoTheme -> addMeta( 'meta', 'keywords', $article_arr['meta_keywords'] );
	  $xoTheme -> addMeta( 'meta', 'title', $article_arr['title'] );
	  if ($xoopsModuleConfig['usemetadescr'] == 1) {
            $xoTheme -> addMeta( 'meta', 'description', $article_meta_description );
          }
    } else {
	  $xoopsTpl -> assign( 'xoops_meta_keywords', $article_arr['meta_keywords'] );
	  if ($xoopsModuleConfig['usemetadescr'] == 1) {
            $xoopsTpl -> assign( 'xoops_meta_description', $article_meta_description );
          }
    }
	  $xoopsTpl -> assign( 'xoops_pagetitle', $article_arr['title'] );
// End of meta tags

$moderate = 0;
$res_type = 1;
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/include/articleloadinfo.php';

// Increase hit-counter but not for admin
if ( $article['isadmin'] == false  ) {
    $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_articles' ) . " SET hits=hits+1 WHERE aid=" . $aid;
    $result = $xoopsDB -> queryF( $sql );
}

// Show other author articles
$sql = "SELECT aid, cid, title, published FROM " . $xoopsDB -> prefix( 'impression_articles' ) . "
    WHERE submitter=" . $article_arr['submitter'] . "
    AND aid <> " . $article_arr['aid'] . "
    AND published > 0 AND published <= " . time() . " AND (expired = 0 OR expired > " . time() . ")  
    AND offline = 0 ORDER by published DESC"; 
$result = $xoopsDB -> query( $sql, 10, 0 );

while ( $arr = $xoopsDB -> fetchArray( $result ) ) {
    $articleuid['title'] = $impressionmyts -> htmlSpecialCharsStrip( $arr['title'] );
    $articleuid['aid'] = $arr['aid'];
    $articleuid['cid'] = $arr['cid'];

    $articleuid['published'] = formatTimestamp( $arr['published'], $xoopsModuleConfig['dateformat'] );
    $xoopsTpl -> append( 'article_uid', $articleuid );
} 

if ( isset( $xoopsModuleConfig['copyright'] ) && $xoopsModuleConfig['copyright'] == 1 ) {
    $xoopsTpl -> assign( 'lang_copyright', "" . $publisher . " © " . _MD_IMPRESSION_COPYRIGHT . " " . date( "Y" ) . " " . XOOPS_URL );
}
if ( isset( $xoopsModuleConfig['otherarticles'] ) && $xoopsModuleConfig['otherarticles'] == 1 ) {
    $xoopsTpl -> assign( 'other_articles', "" . "<b>" ._MD_IMPRESSION_OTHERBYUID . "</b>"  . $article['submitter'] . "<br />" );
}

$article['showsbookmarx'] = $xoopsModuleConfig['showsbookmarks'];
$article['otherarticlex'] = $xoopsModuleConfig['otherarticles'];
$xoopsTpl -> assign( 'article', $article );

$xoopsTpl -> assign( 'back' , '<a href="javascript:history.go(-1)"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/images/icon/back.png" /></a>' );
$xoopsTpl -> assign( 'dirname', $xoopsModule -> getVar( 'dirname' ) );

include XOOPS_ROOT_PATH . '/footer.php';

?>