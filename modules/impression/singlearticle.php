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

$ptitle = impression_cleanRequestVars( $_REQUEST, 'title', '' );
$page = intval( impression_cleanRequestVars( $_REQUEST, 'page', 0 ) );
$aid  = intval( impression_cleanRequestVars( $_REQUEST, 'aid', 0 ) );

if ( !$ptitle ) {
	$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );
} else {
	$sql3 = 'SELECT cid FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
	list( $cid ) = icms::$xoopsDB -> fetchRow( icms::$xoopsDB -> query( $sql3 ) );
}

if  ( false == impression_checkgroups( $cid ) ) {
        redirect_header( 'index.php', 1, _MD_IMPRESSION_NOPERMISSIONTOVIEW );
        exit();
}

$sql2 = 'SELECT count(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
	. icms::$xoopsDB -> prefix( 'impression_altcat' ) . ' b'
	. ' ON b.aid = a.aid'
	. ' WHERE a.published > 0 AND a.published <= ' . time()
	. ' AND a.status = 0'
	. ' AND (b.cid=a.cid OR (a.cid=' . intval( $cid ) . ' OR b.cid=' . intval( $cid ) . '))';
list( $count ) = icms::$xoopsDB -> fetchRow( icms::$xoopsDB -> query( $sql2 ) );

if ( false == impression_checkgroups( $cid ) && $count == 0 ) {
	redirect_header( 'index.php', 1, _MD_IMPRESSION_MUSTREGFIRST );
    exit();
} 

$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . intval( $aid ) . '
		AND (published > 0 AND published <= ' . time() . ')
		AND status = 0
		AND cid > 0';
$result = icms::$xoopsDB -> query( $sql );
$article_arr = icms::$xoopsDB -> fetchArray( $result );

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

if ( impression_imageheader() ) {
	$article['imageheader'] = '<div class="impression_header">' . impression_imageheader() . '</div>';
}
$article['id'] = intval( $article_arr['aid'] );
$article['cid'] = intval( $article_arr['cid'] );
//$article['comments'] = $article_arr['comments'];
//$article['comment_rules'] = icms::$module -> config['com_rule'];

if ( $article_arr['source'] && $article_arr['sourceurl'] ) {
	$article['source'] = '<br />' . _MD_IMPRESSION_SOURCE . ' <a href="' . $article_arr['sourceurl'] . '" target="_blank">' . $article_arr['source'] . '</a>';
} elseif ( $article_arr['source'] && !$article_arr['sourceurl'] ) {
	$article['source'] = '<br />' . _MD_IMPRESSION_SOURCE . ' ' . $article_arr['source'];
} elseif ( !$article_arr['source'] && $article_arr['sourceurl'] ) {
	$article['source'] = '<br />' . _MD_IMPRESSION_SOURCE . ' <a href="' . $article_arr['sourceurl'] . '" target="_blank">' . $article_arr['sourceurl'] . '</a>';
}

$article['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $icmsConfig['sitename'] ) );
$article['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $icmsConfig['sitename'] ) . ':  ' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $article_arr['cid'] . '&aid=' . $article_arr['aid'] );

// Recommend icon
   $article['recommend'] = '<a href="mailto:?subject='.$article['mail_subject'].'&body='.$article['mail_body'].'" target="_top">
							<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/email.png" alt="" title="' . _MD_IMPRESSION_TELLAFRIEND . '" />
							</a>';

// Print icon
   $article['print'] = '<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/print.php?aid=' . $article_arr['aid'] . '"  target="_blank">
						<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/printer.png" alt="" title="' . _MD_IMPRESSION_PRINT . '" />
						</a>';

// PDF icon
if ( is_readable( ICMS_PDF_LIB_PATH . '/tcpdf.php' ) ) {
	$article['pdf'] = '<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/makepdf.php?aid=' . $article_arr['aid'] . '"  target="_blank">
					   <img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/page_acrobat.png" alt="" title="' . _MD_IMPRESSION_PDF . '" />
					   </a>';
} 

$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
$pathstring = '<a href="index.php">' . _MD_IMPRESSION_MAIN . '</a>&nbsp;:&nbsp;';
$pathstring .= $mytree -> getNicePathFromId( $cid, 'title', 'catview.php?op=' );
$article['path'] = $pathstring;

// Get Social Bookmarks
include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/sbookmarks.php';
$article['sbmarks'] = impression_sbmarks( $article_arr['aid'], $article_arr['title'] );

$article['page'] = $page;
$page_arr = ( explode( '<!-- pagebreak -->', $article_arr['description'] ) );
$tpages  = count( $page_arr );

// Link to imGlossary terms
if ( icms::$module -> config['linkedterms'] ) {
	if ( impression_imglossary_module_included() ) {
		$glossaryterm = $article_arr['title'];
		$description = impression_linkterms( $page_arr[$page], $glossaryterm );
		$article['description2'] = $description;
	} else {
		$article['description2'] = $page_arr[$page];
	}
} else {
	$article['description2'] = $page_arr[$page];
}

// Render page navigation
if ( $tpages > 1 ) {
	$pagenav = new icms_view_PageNav( $tpages, 1, $page, 'aid=' . $article_arr['aid'] . '&amp;page' );
	$xoopsTpl -> assign( 'pagenav', '<div style="clear: both; float: right;">' . $pagenav -> renderNav(3) . '</div>' );
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
		if (icms::$module -> config['usemetadescr'] == 1) {
            $xoTheme -> addMeta( 'meta', 'description', $article_meta_description );
        }
    } else {
		if ( $article_arr['meta_keywords'] != '' ) {
			$xoopsTpl -> assign( 'icms_meta_keywords', $article_arr['meta_keywords'] );
		}
		if (icms::$module -> config['usemetadescr'] == 1) {
            $xoopsTpl -> assign( 'icms_meta_description', $article_meta_description );
        }
    }
	$xoopsTpl -> assign( 'icms_pagetitle', $article_arr['title'] );
	$xoopsTpl -> assign( 'og_url', impression_niceurl( $article_arr['aid'], $article_arr['title'], $article_arr['nice_url'], icms::$module -> config['niceurl'] ) );
// End of meta tags

$moderate = 0;
$res_type = 1;
include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/include/articleloadinfo.php';

// Increase hit-counter but not for admin
if ( icms_userIsAdmin() == false  ) {
	if ( $page == 0 ) {
		$sql = 'UPDATE ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' SET hits=hits+1 WHERE aid=' . $aid;
		$result = icms::$xoopsDB -> queryF( $sql );
	}
}

$article['useradminarticle'] = 0;
if ( is_object( icms::$user ) && !empty( icms::$user ) ) {
	$_user_submitter = ( icms::$user -> getVar( 'uid' ) == $article_arr['uid'] ) ? true : false;
	if ( true == impression_checkgroups( $cid ) ) {
		$article['useradminarticle'] = 1;
		if ( icms::$user -> getVar( 'uid' ) == $article_arr['uid'] ) {
			$article['usermodify'] = '<a class="button" href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/submit.php?aid=' . $article_arr['aid'] . '"><img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/page_modify.png" alt="" title="' . _MD_IMPRESSION_MODIFY . '" /></a>';
		}
	}
}

if ( icms::$module -> config['twitt_bttn'] == 1 ) {
	$twcount = 'none';
} elseif ( icms::$module -> config['twitt_bttn'] == 2 ) {
	$twcount = 'horizontal';
} elseif ( icms::$module -> config['twitt_bttn'] == 3 ) {
	$twcount = 'vertical';
}

if ( icms::$module -> config['twitt_bttn'] > 0 ) {
	$twitter = '<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
				<span>
					<a href="https://twitter.com/share" class="twitter-share-button" data-count="' . $twcount . '">' . _MI_IMPRESSION_TWEET . '</a>
				</span>';
}

if ( icms::$module -> config['faceb_bttn'] == 1 ) {
	$fbcount = 'button_count';
} elseif ( icms::$module -> config['faceb_bttn'] == 2 ) {
	$fbcount = 'box_count';
}

if ( icms::$module -> config['faceb_bttn'] > 0 ) {
	$facebook = '<span id="fb-root"></span>';
	$facebook .= '<span class="fb-like" data-send="false" data-layout="' . $fbcount . '" data-width="450" data-show-faces="false"></span>';
}

if ( icms::$module -> config['plusone_bttn'] == 0 ) {
	$plusone = '';
} elseif ( icms::$module -> config['plusone_bttn'] == 1 ) {
	$plusone = '<g:plusone size="medium" annotation="none"></g:plusone>';
} elseif ( icms::$module -> config['plusone_bttn'] == 2 ) {
	$plusone = '<g:plusone size="medium" annotation="bubble"></g:plusone>';
}

if ( icms::$module -> config['showsbookmarks'] == 0 ) {
	$article['socialbutton'] = '';
} elseif ( icms::$module -> config['showsbookmarks'] == 1 ) {
	$article['socialbutton'] = '<div class="impression_socbookmark">' . impression_sbmarks( $article_arr['aid'], $article_arr['title'] ) . '</div>';
} elseif ( icms::$module -> config['showsbookmarks'] == 2 ) {
	$article['socialbutton'] = '<br /><div style="float: ' . _GLOBAL_LEFT . '; padding-top: 10px;">' . $plusone . $twitter . $facebook . '</div>';
}

$xoopsTpl -> assign( 'article', $article );

$xoopsTpl -> assign( 'back', '<a class="impression_button" href="javascript:history.go(-1)">&#9668; ' . _MD_IMPRESSION_BACKBUTTON . '</a>' );
$xoopsTpl -> assign( 'module_dir', icms::$module -> getVar( 'dirname' ) );

include ICMS_ROOT_PATH . '/include/comment_view.php';
include ICMS_ROOT_PATH . '/footer.php';
?>