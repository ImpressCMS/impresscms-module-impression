<?php
/**
 * $Id: articleloadinfo.php
 * Module: Impression
 */
include 'header.php';

$module_article = '';

global $xoopsTpl;

$xoopsOption['template_main'] = 'impression_headlines.html';

include ICMS_ROOT_PATH . '/header.php';

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$headline_arr = $xoopsDB -> query( "SELECT aid, cid, title, submitter, published, introtext FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND (expired = 0 OR expired > " . time() . ") AND offline = 0 ORDER BY published DESC" );
    while ( $myrow = $xoopsDB -> fetchArray( $headline_arr ) )

$headlines['id'] = intval( $headline_arr['aid'] );
$headlines['cid'] = intval( $headline_arr['cid'] );
$headlines['published'] = intval( $headline_arr['published'] ) ? true : false;

$path = $mytree -> getPathFromId( $headline_arr['cid'], "title" );
$path = substr( $path, 1 );
$path = basename( $path );
$path = str_replace( "/", "", $path );
$headlines['category'] = $path;


$publisher = ( isset( $headline_arr['publisher'] ) && !empty( $headline_arr['publisher'] ) ) ? $impressionmyts -> htmlSpecialCharsStrip( $headline_arr['publisher'] ) : _MD_IMPRESSION_NOTSPECIFIED;
$headlines['title'] = $impressionmyts -> htmlSpecialCharsStrip( $headline_arr['title']);


//$headlines['updated'] = formatTimestamp( $time, $xoopsModuleConfig['dateformat'] );
$headlines['introtext'] = $impressionmyts -> displayTarea( $headline_arr['introtext'], 1, 1, 1, 1, 1 );
$headlines['submitter'] = xoops_getLinkedUnameFromId( $headline_arr['submitter'] );

$headlines['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) );
$headlines['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) . ':  ' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $headline_arr['cid'] . '&aid=' . $headline_arr['aid'] );
$headlines['isadmin'] = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $xoopsModule -> mid() ) ) ? true : false;
//$headlines['comments'] = $headline_arr['comments'];

$headlines['adminarticle'] = '';
if ( $headlines['isadmin'] == true  )
{
    $headlines['adminarticle'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/computer.png" alt="' . _MD_IMPRESSION_ADMINSECTION . '" title="' . _MD_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>&nbsp;';
    $headlines['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=edit&amp;aid=' . $headline_arr['aid'] . '"><img src="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_edit.png" alt="' . _MD_IMPRESSION_EDIT . '" title="' . _MD_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
    $headlines['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=delete&amp;aid=' . $headline_arr['aid'] . '"><img src="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_delete.png" alt="' . _MD_IMPRESSION_DELETE . '" title="' . _MD_IMPRESSION_DELETE . '" align="absmiddle"/></a>';

} 
else
{
    $headlines['adminarticle'] = '[ <a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/submit.php?op=edit&amp;aid=' . $headline_arr['aid'] . '&approve=1">' . _MD_IMPRESSION_APPROVE . '</a> | ';
    $headlines['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/submit.php?op=delete&amp;aid=' . $headline_arr['aid'] . '">' . _MD_IMPRESSION_DELETE . '</a> ]';
} 


$headlines['icons'] = impression_displayicons( $headline_arr['published'], $headline_arr['status'], $headline_arr['hits'] );
 
//$headlines['allow_rating'] = ( checkgroups( $cid, 'ImpressionRatePerms' ) ) ? true : false;
$headlines['screen_shot'] = $xoopsModuleConfig['screenshot'];
$headlines['total_chars'] = $xoopsModuleConfig['totalchars'];
$headlines['dirname'] = $xoopsModule -> getVar( 'dirname' );
$headlines['readarticle'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $headline_arr['cid'] . '&amp;aid=' . $headline_arr['aid'] . '">' . $headline_arr['title'] . ' </a>';
$headlines['readmore'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $headline_arr['cid'] . '&amp;aid=' . $headline_arr['aid'] . '">' . _MD_IMPRESSION_READMORE . ' </a>';
//$headlines['comment_rules'] = $xoopsModuleConfig['com_rule'];

?>