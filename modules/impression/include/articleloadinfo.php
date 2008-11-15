<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/articleloadinfo.php
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

$module_article = '';

$article['id'] = intval( $article_arr['aid'] );
$article['cid'] = intval( $article_arr['cid'] );
$article['published'] = intval( $article_arr['published'] ) ? true : false;

$path = $mytree -> getPathFromId( $article_arr['cid'], 'title' );
$path = substr( $path, 1 );
$path = basename( $path );
$path = str_replace( '/', '', $path );
$article['category'] = $path;

$article['hits'] = sprintf( _MD_IMPRESSION_ARTICLEHITS, intval( $article_arr['hits'] ) ) ;
$publisher = ( isset( $article_arr['publisher'] ) && !empty( $article_arr['publisher'] ) ) ? $impressionmyts -> htmlSpecialCharsStrip( $article_arr['publisher'] ) : _MD_IMPRESSION_NOTSPECIFIED;
$article['title'] = $impressionmyts -> htmlSpecialCharsStrip( $article_arr['title']);

$time = $article_arr['published'];
$is_updated = _MD_IMPRESSION_SUBMITDATE;
$xoopsTpl -> assign( 'lang_subdate' , $is_updated );

$article['updated'] = formatTimestamp( $time, $xoopsModuleConfig['dateformat'] );
$article['introtext'] = $impressionmyts -> displayTarea( $article_arr['introtext'], 1, 1, 1, 1, $article_arr['nobreak'] );
$article['submitter'] = icms_getLinkedUnameFromId( $article_arr['submitter'] );

$article['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) );
$article['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) . ':  ' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($article_arr['cid']) . '&aid=' . intval($article_arr['aid']) );
$article['isadmin'] = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $xoopsModule -> mid() ) ) ? true : false;

$article['adminarticle'] = '';
if ( $article['isadmin'] == true && $moderate == 0 ) {
    $article['adminarticle'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/computer.png" alt="' . _MD_IMPRESSION_ADMINSECTION . '" title="' . _MD_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>&nbsp;';
    $article['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=edit&amp;aid=' . intval($article_arr['aid']) . '"><img src="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_edit.png" alt="' . _MD_IMPRESSION_EDIT . '" title="' . _MD_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
    $article['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=delete&amp;aid=' . intval($article_arr['aid']) . '"><img src="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/images/icon/page_delete.png" alt="' . _MD_IMPRESSION_DELETE . '" title="' . _MD_IMPRESSION_DELETE . '" align="absmiddle"/></a>';
} else {
    $article['adminarticle'] = '[ <a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/submit.php?op=edit&amp;aid=' . intval($article_arr['aid']) . '&approve=1">' . _MD_IMPRESSION_APPROVE . '</a> | ';
    $article['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/submit.php?op=delete&amp;aid=' . intval($article_arr['aid']) . '">' . _MD_IMPRESSION_DELETE . '</a> ]';
} 

if ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) {
    $article['useradminarticle'] = 0;
    $_user_submitter = ( $xoopsUser -> getvar( 'uid' ) == $article_arr['submitter'] ) ? true : false;
    if ( true == impression_checkgroups( $cid ) ) {
        $article['useradminarticle'] = 1;
    } 
} 

$article['icons'] = impression_displayicons( $article_arr['published'], $article_arr['status'], $article_arr['hits'] );

$article['dirname'] = $xoopsModule -> getVar( 'dirname' );
$article['readarticle'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($article_arr['cid']) . '&amp;aid=' . intval($article_arr['aid']) . '">' . $article_arr['title'] . ' </a>';
$article['readmore'] = '<a href="' . ICMS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($article_arr['cid']) . '&amp;aid=' . intval($article_arr['aid']) . '">' . _MD_IMPRESSION_READMORE . ' </a>';

?>