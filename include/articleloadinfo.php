<?php
/**
 * $Id: articleloadinfo.php
 * Module: Impression
 */

$module_article = '';

$article['id'] = intval( $article_arr['aid'] );
$article['cid'] = intval( $article_arr['cid'] );
$article['published'] = intval( $article_arr['published'] ) ? true : false;

$path = $mytree -> getPathFromId( $article_arr['cid'], "title" );
$path = substr( $path, 1 );
$path = basename( $path );
$path = str_replace( "/", "", $path );
$article['category'] = $path;

$article['hits'] = sprintf( _MD_IMPRESSION_ARTICLEHITS, intval( $article_arr['hits'] ) ) ;
$xoopsTpl -> assign( 'lang_dltimes', $article['hits'] );
$publisher = ( isset( $article_arr['publisher'] ) && !empty( $article_arr['publisher'] ) ) ? $impressionmyts -> htmlSpecialCharsStrip( $article_arr['publisher'] ) : _MD_IMPRESSION_NOTSPECIFIED;
$article['title'] = $impressionmyts -> htmlSpecialCharsStrip( $article_arr['title']);

//if ( $moderate == 0 ) {
//    $time = ( $article_arr['updated'] != 0 ) ? $article_arr['updated'] : $article_arr['published'];
//    $is_updated = ( $article_arr['updated'] != 0 ) ? _MD_IMPRESSION_UPDATEDON : _MD_IMPRESSION_PUBLISHDATE;
//    $xoopsTpl -> assign( 'lang_subdate' , $is_updated );
//} else {
    $time = $article_arr['published'];
    $is_updated = _MD_IMPRESSION_SUBMITDATE;
    $xoopsTpl -> assign( 'lang_subdate' , $is_updated );
//}
 
$article['updated'] = formatTimestamp( $time, $xoopsModuleConfig['dateformat'] );
$article['introtext'] = $article_arr['introtext'];
$article['submitter'] = xoops_getLinkedUnameFromId( $article_arr['submitter'] );

$article['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) );
$article['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) . ':  ' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $article_arr['cid'] . '&aid=' . $article_arr['aid'] );
$article['isadmin'] = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $xoopsModule -> mid() ) ) ? true : false;

$article['adminarticle'] = '';
if ( $article['isadmin'] == true && $moderate == 0 ) {
    $article['adminarticle'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/computer.png" alt="' . _MD_IMPRESSION_ADMINSECTION . '" title="' . _MD_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>&nbsp;';
    $article['adminarticle'] .= '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=edit&amp;aid=' . $article_arr['aid'] . '"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_edit.png" alt="' . _MD_IMPRESSION_EDIT . '" title="' . _MD_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
    $article['adminarticle'] .= '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=delete&amp;aid=' . $article_arr['aid'] . '"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_delete.png" alt="' . _MD_IMPRESSION_DELETE . '" title="' . _MD_IMPRESSION_DELETE . '" align="absmiddle"/></a>';
} else {
    $article['adminarticle'] = '[ <a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/submit.php?op=edit&amp;aid=' . $article_arr['aid'] . '&approve=1">' . _MD_IMPRESSION_APPROVE . '</a> | ';
    $article['adminarticle'] .= '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/submit.php?op=delete&amp;aid=' . $article_arr['aid'] . '">' . _MD_IMPRESSION_DELETE . '</a> ]';
} 

if ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) {
    $article['useradminarticle'] = 0;
    $_user_submitter = ( $xoopsUser -> getvar( 'uid' ) == $article_arr['submitter'] ) ? true : false;
    if ( true == checkgroups( $cid ) ) {
        $article['useradminarticle'] = 1;
    } 
} 

$article['icons'] = impression_displayicons( $article_arr['published'], $article_arr['status'], $article_arr['hits'] );

// $article['total_chars'] = $xoopsModuleConfig['totalchars'];
$article['dirname'] = $xoopsModule -> getVar( 'dirname' );
$article['readarticle'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $article_arr['cid'] . '&amp;aid=' . $article_arr['aid'] . '">' . $article_arr['title'] . ' </a>';
$article['readmore'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $article_arr['cid'] . '&amp;aid=' . $article_arr['aid'] . '">' . _MD_IMPRESSION_READMORE . ' </a>';

?>