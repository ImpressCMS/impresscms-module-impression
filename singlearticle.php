<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: singlearticle.php
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

$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );
$aid = intval($aid);
$cid = intval($cid);

$sql2 = 'SELECT count(*) FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
 . $xoopsDB -> prefix( 'impression_altcat' ) . ' b'
 . ' ON b.aid = a.aid'
 . ' WHERE a.published > 0 AND a.published <= ' . time()
 . ' AND a.status = 0'
 . ' AND (b.cid=a.cid OR (a.cid=' . intval($cid) . ' OR b.cid=' . intval($cid) . '))';
list( $count ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $sql2 ) );

if ( false == impression_checkgroups( $cid ) && $count == 0 ) {
    redirect_header( 'index.php', 1, _MD_IMPRESSION_MUSTREGFIRST );
    exit();
} 

$sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . intval($aid) . '
		AND (published > 0 AND published <= ' . time() . ')
		AND status = 0
		AND cid > 0';
$result = $xoopsDB -> query( $sql );
$article_arr = $xoopsDB -> fetchArray( $result );

if ( !is_array( $article_arr ) ) {
    redirect_header( 'index.php', 1, _MD_IMPRESSION_NOARTICLELOAD );
    exit();
} 

$xoopsOption['template_main'] = 'impression_singlearticle.html';

include ICMS_ROOT_PATH . '/header.php';

// tags support
if ( impression_tag_module_included() ) {
  include_once ICMS_ROOT_PATH . '/modules/tag/include/tagbar.php';
  $xoopsTpl -> assign( 'tagbar', tagBar( $article_arr['aid'], 0 ) );
}

$article['imageheader'] = '<div class="impression_header">' . impression_imageheader() . '</div>';
$article['id'] = $article_arr['aid'];
$article['cid'] = $article_arr['cid'];
$article['submitter'] = icms_getLinkedUnameFromId( $article_arr['submitter'] );

$article['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) );
$article['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $xoopsConfig['sitename'] ) . ':  ' . ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . $article_arr['cid'] . '&aid=' . $article_arr['aid'] );

// Recommend icon
   $article['recommend'] = '<a href="mailto:?subject='.$article['mail_subject'].'&body='.$article['mail_body'].'" target="_top">
							<img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/email.png" alt="' . _MD_IMPRESSION_TELLAFRIEND . '" title="' . _MD_IMPRESSION_TELLAFRIEND . '" align="absmiddle" />
							</a>';

// Print icon
   $article['print'] = '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/print.php?aid=' . $article_arr['aid'] . '"  target="_blank">
						<img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/printer.png" alt="' . _MD_IMPRESSION_PRINT . '" title="' . _MD_IMPRESSION_PRINT . '" align="absmiddle" />
						</a>';

// PDF icon
if ( is_readable( ICMS_PDF_LIB_PATH . '/tcpdf.php' ) ) {
	$article['pdf'] = '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/makepdf.php?aid=' . $article_arr['aid'] . '"  target="_blank">
					   <img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/page_acrobat.png" alt="' . _MD_IMPRESSION_PDF . '" title="' . _MD_IMPRESSION_PDF . '" align="absmiddle" />
					   </a>';
} 

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$pathstring = '<a href="index.php">' . _MD_IMPRESSION_MAIN . '</a>&nbsp;:&nbsp;';
$pathstring .= $mytree -> getNicePathFromId( $cid, 'title', 'catview.php?op=' );
$article['path'] = $pathstring;

// Get Social Bookmarks
include_once ICMS_ROOT_PATH . '/modules/' . $mydirname . '/sbookmarks.php';
$article['sbmarks'] = impression_sbmarks( $article_arr['aid'], $article_arr['title'] );

if ( $xoopsModuleConfig['linkedterms'] ) {
	if ( impression_imglossary_module_included() ) {
		$glossaryterm = $impressionmyts -> makeTboxData4Show( $article_arr['title'] );
		$description = impression_linkterms( $article_arr['description'], $glossaryterm );
		$article['description'] = $impressionmyts -> displayTarea( $description, 1, 1, 1, 1, $article_arr['nobreak'] );
	} else {
		$article['description'] = $impressionmyts -> displayTarea( $article_arr['description'], 1, 1, 1, 1, $article_arr['nobreak'] );
	}
} else {
	$article['description'] = $impressionmyts -> displayTarea( $article_arr['description'], 1, 1, 1, 1, $article_arr['nobreak'] );
}

// Start of meta tags
global $xoopsTpl, $xoTheme;
    $maxWords = 100;
    $words = array();
    $words = explode( ' ', icms_html2text( $article_arr['introtext'] ) );
    $newWords = array();
    $i = 0;
    while ( $i < $maxWords-1 && $i < count( $words ) ) {
      if ( isset( $words[$i] ) ) {
		$newWords[] = trim( $words[$i] );
      }
      $i++;
    }
    $article_meta_description = implode( ' ', $newWords );
    if ( is_object( $xoTheme ) ) {
		if ( $article_arr['meta_keywords'] != '' ) {
			$xoTheme -> addMeta( 'meta', 'keywords', $article_arr['meta_keywords'] );
		}
		$xoTheme -> addMeta( 'meta', 'title', $article_arr['title'] );
		if ($xoopsModuleConfig['usemetadescr'] == 1) {
            $xoTheme -> addMeta( 'meta', 'description', $article_meta_description );
        }
    } else {
		if ( $article_arr['meta_keywords'] != '' ) {
			$xoopsTpl -> assign( 'xoops_meta_keywords', $article_arr['meta_keywords'] );
		}
		if ($xoopsModuleConfig['usemetadescr'] == 1) {
            $xoopsTpl -> assign( 'xoops_meta_description', $article_meta_description );
        }
    }
	$xoopsTpl -> assign( 'xoops_pagetitle', $article_arr['title'] );
// End of meta tags

$moderate = 0;
$res_type = 1;
include_once ICMS_ROOT_PATH . '/modules/' . $mydirname . '/include/articleloadinfo.php';

// Increase hit-counter but not for admin
if ( icms_userIsAdmin() == false  ) {
    $sql = 'UPDATE ' . $xoopsDB -> prefix( 'impression_articles' ) . ' SET hits=hits+1 WHERE aid=' . $aid;
    $result = $xoopsDB -> queryF( $sql );
}

$article['showsbookmarx'] = $xoopsModuleConfig['showsbookmarks'];
$xoopsTpl -> assign( 'article', $article );

$xoopsTpl -> assign( 'back', '<a class="impression_button" href="javascript:history.go(-1)">&#9668; ' . _MD_IMPRESSION_BACKBUTTON . '</a>' );
$xoopsTpl -> assign( 'dirname', $mydirname );

include ICMS_ROOT_PATH . '/footer.php';

?>