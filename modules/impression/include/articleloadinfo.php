<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/articleloadinfo.php
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

$module_article = '';

$article['id'] = intval( $article_arr['aid'] );
$article['cid'] = intval( $article_arr['cid'] );
$article['published'] = intval( $article_arr['published'] ) ? true : false;

$path = str_replace( '/', '', basename( substr( $mytree -> getPathFromId( $article_arr['cid'], 'title' ), 1 ) ) );
$article['category'] = $path;

$article['hits'] = sprintf( _MD_IMPRESSION_ARTICLEHITS, intval( $article_arr['hits'] ) ) ;
$publisher = ( isset( $article_arr['publisher'] ) && !empty( $article_arr['publisher'] ) ) ? $impressionmyts -> htmlSpecialCharsStrip( $article_arr['publisher'] ) : _MD_IMPRESSION_NOTSPECIFIED;
$article['title'] = $impressionmyts -> htmlSpecialCharsStrip( $article_arr['title'] );

$time = $article_arr['published'];
$is_updated = _MD_IMPRESSION_SUBMITDATE;
$xoopsTpl -> assign( 'lang_subdate' , $is_updated );

$article['updated'] = impression_time( formatTimestamp( $time, icms::$module -> config['dateformat'] ) );
$article['introtext'] = $article_arr['introtext'];
if ( icms::$module -> config['showsubmitter'] ) {
	$article['submitter'] = _MD_IMPRESSION_BY . icms_member_user_Handler::getUserLink( $article_arr['uid'] );
} else {
	$article['showsubmitter'] = '';
}

$article['mail_subject'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $icmsConfig['sitename'] ) );
$article['mail_body'] = rawurlencode( sprintf( _MD_IMPRESSION_INTFILEFOUND, $icmsConfig['sitename'] ) . ':  ' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?aid=' . intval( $article_arr['aid'] ) );

$article['adminarticle'] = '';
if ( icms_userIsAdmin() == true && $moderate == 0 ) {
	$article['adminarticle'] = '<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/index.php">
								<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/computer.png" alt="" title="' . _MD_IMPRESSION_ADMINSECTION . '" />
								</a>';
	$article['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/index.php?op=edit&amp;aid=' . intval($article_arr['aid']) . '">
								 <img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/page_edit.png" alt="" title="' . _MD_IMPRESSION_EDIT . '" />
								 </a>';
	$article['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/index.php?op=delete&amp;aid=' . intval($article_arr['aid']) . '">
								 <img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/page_delete.png" alt="" title="' . _MD_IMPRESSION_DELETE . '" />
								 </a>';
} else {
	$article['adminarticle'] = '[ <a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/submit.php?op=edit&amp;aid=' . intval($article_arr['aid']) . '&approve=1">' . _MD_IMPRESSION_APPROVE . '</a> | ';
	$article['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/submit.php?op=delete&amp;aid=' . intval($article_arr['aid']) . '">' . _MD_IMPRESSION_DELETE . '</a> ]';
}

if ( is_object( icms::$user ) && !empty( icms::$user ) ) {
	$article['useradminarticle'] = 0;
	$_user_submitter = ( icms::$user -> getVar( 'uid' ) == $article_arr['uid'] ) ? true : false;
	if ( true == impression_checkgroups( $cid ) ) {
		$article['useradminarticle'] = 1;
	}
}

$url = impression_niceurl( $article_arr['aid'], $article_arr['title'], $article_arr['nice_url'], icms::$module -> config['niceurl'] );

$article['description'] = $article_arr['description'];
$article['bytesmore']	= mb_strlen( $article_arr['description'] );
if ( mb_strlen( $article_arr['description'] ) > 0 ) {
			$article['readmore'] = '<a href="' . $url . '">' . _MD_IMPRESSION_READMORE . '</a>';
			$article['options']	= icms::$module -> config['form_bytesyn'];
		} else {
			$article['readmore'] = '';
		};

// Comment icon
$article['comments'] = $article_arr['comments']; 
$article['comment_rules'] = icms::$module -> config['com_rule']; 
$article['comment1'] = '<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/comments.png" alt="" title="' . _COMMENTS . '&nbsp;(' . $article_arr['comments'] . ')" />';
$article['comment2'] = '<a href="#comments"><img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/comments.png" alt="" title="' . _COMMENTS . '&nbsp;(' . $article_arr['comments'] . ')" /></a>';			
		
$article['icons']		= impression_displayicons( $article_arr['published'], $article_arr['status'], $article_arr['hits'] );
$article['dirname']		= icms::$module -> getVar( 'dirname' );
$article['readarticle'] = '<a href="' . $url . '">' . $article_arr['title'] . ' </a>';
?>