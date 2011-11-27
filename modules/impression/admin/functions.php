<?php
/**
* Impression - a light article management module for ImpressCMS
*
* Based upon WF-Links
*
* File: /admin/functions.php
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

// impression_serverstats()
function impression_serverstats() {
	echo '<fieldset style="border: #e8e8e8 1px solid;">
			<legend style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_ARTICLE_IMAGEINFO . '</legend>
			<div style="padding: 8px;">
			<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/server.png" alt="" style="float: left; padding-right: 10px;" />
			<div>' . _AM_IMPRESSION_ARTICLE_SPHPINI . '</div>';

	$article_on = '<b>' . _AM_IMPRESSION_ARTICLE_ON . '</b>';
	$article_off = '<b>' . _AM_IMPRESSION_ARTICLE_OFF . '</b>';
	$safemode = ( ini_get( 'safe_mode' ) ) ? $article_on . _AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS : $article_off;
	$registerglobals = ( ini_get( 'register_globals' ) == '' ) ? $article_off : $article_on;
	$articles = ( ini_get( 'file_uploads' ) ) ? $article_on : $article_off;
	$gdlib = ( function_exists( 'gd_info' ) ) ? _AM_IMPRESSION_ARTICLE_GDON : _AM_IMPRESSION_ARTICLE_GDOFF;

	echo '<div style="margin-left: 44px;">&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_GDLIBSTATUS . $gdlib . '<br />';
	if ( function_exists( 'gd_info' ) ) {
		if ( true == $gdlib = gd_info() ) {
			echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_GDLIBVERSION . '<b>' . $gdlib['GD Version'] . '</b><br />';
		}
	}
	echo '<br />';
	echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_SAFEMODESTATUS . $safemode . '<br />';
	echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_REGISTERGLOBALS . $registerglobals . '<br />';
	echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS . $articles;
	echo '</div></div></fieldset>';
}

function impression_uploading( $_FILES, $uploaddir = 'uploads', $allowed_mimetypes = '', $redirecturl = 'index.php', $num = 0, $redirect = 0, $usertype = 1 ) {
	global $_FILES;
	$down = array();
	include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/class/uploader.php';
	if ( empty( $allowed_mimetypes ) ) {
		$allowed_mimetypes = impression_retmime( $_FILES['userfile']['name'], $usertype );
	}
	$upload_dir = ICMS_ROOT_PATH . '/' . $uploaddir . '/';

	$maxfilesize = icms::$module -> config['maxfilesize'];
	$maxfilewidth = icms::$module -> config['maximgwidth'];
	$maxfileheight = icms::$module -> config['maximgheight'];

	$uploader = new ImpressionMediaUploader( $upload_dir, $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight );
	$uploader -> noAdminSizeCheck( 1 );
	if ( $uploader -> fetchMedia( $_POST['xoops_upload_file'][0] ) ) {
		if ( !$uploader -> upload() ) {
			$errors = $uploader -> getErrors();
			redirect_header( $redirecturl, 2, $errors );
		} else {
			if ( $redirect ) {
				redirect_header( $redirecturl, 1 , _AM_PDD_UPLOADFILE );
			} else {
				if ( is_file( $uploader -> savedDestination ) ) {
					$down['url'] = ICMS_URL . '/' . $uploaddir . '/' . strtolower( $uploader -> savedFileName );
					$down['size'] = filesize( ICMS_ROOT_PATH . '/' . $uploaddir . '/' . strtolower( $uploader -> savedFileName ) );
				}
				return $down;
			}
		}
	} else {
		$errors = $uploader -> getErrors();
		redirect_header( $redirecturl, 1, $errors );
	}
}

function impression_adminmenu( $currentoption = 0, $header = '', $menu = '', $extra = '', $scount = 5 ) {

	icms::$module -> displayAdminMenu( $currentoption, icms::$module -> getVar( 'name' ) . ' | ' . $header );

	// ###### Output warn messages for security ######
	if ( is_dir( ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update/' ) ) {
		icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL1, ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update/' ) );
		echo '<br />';
	}

	$_file = ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update.php';
	if ( file_exists( $_file ) ) {
		icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL2, ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update.php' ) );
		echo '<br />';
	}

	$path1 = ICMS_ROOT_PATH . '/' . icms::$module -> config['mainimagedir'];
	if ( !is_dir( $path1 ) || !is_writable( $path1 ) ) {
		icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path1 ) );
		echo '<br />';
	}

	$path1_t = ICMS_ROOT_PATH . '/' . icms::$module -> config['mainimagedir'] . '/thumbs';
	if ( !is_dir( $path1_t ) || !is_writable( $path1_t ) ) {
		icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path1_t ) );
		echo '<br />';
	}

	$path3 = ICMS_ROOT_PATH . '/' . icms::$module -> config['catimage'];
	if ( !is_dir( $path3 ) || !is_writable( $path3 ) ) {
		icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path3 ) );
		echo '<br />';
	}

	$path3_t = ICMS_ROOT_PATH . '/' . icms::$module -> config['catimage'] . '/thumbs';
	if ( !is_dir( $path3_t ) || !is_writable( $path3_t ) ) {
		icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path3_t ) );
		echo '<br />';
	}

	echo '<h3 style="color: #2F5376;">' . $header . '</h3>';
	if ( $extra ) {
		echo '<div>' . $extra . '</div>';
	}
}

function impression_articlelistbody( $published ) {
	global $imagearray, $impressionmyts;
	$aid = $published['aid'];
	$cid = $published['cid'];
	if ( $published['inblocks'] ) {
		$icon = $imagearray['blckgreen'];
	} else {
		$icon = $imagearray['blckorange'];
	}
	$nice_link = impression_nicelink( $published['title'], $published['nice_url'] );
	if ( icms::$module -> config['niceurl'] ) {
		$title = $icon . '&nbsp;<a href="../singlearticle.php?aid=' . $published['aid'] . '&amp;title=' . $nice_link . '">' . $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) . '</a>';
	} else {
		$title = $icon . '&nbsp;<a href="../singlearticle.php?aid=' . $published['aid'] . '">' . $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) . '</a>';
	}
	$maintitle = urlencode( $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) );
	$cattitle = impression_cattitle( $published['cid'] );
	$submitter = icms_member_user_Handler::getUserLink( $published['uid'] );
	$submitted = impression_time( formatTimestamp( $published['date'], icms::$module -> config['dateformat'] ) );
	$publish = ( $published['published'] > 0 ) ? impression_time( formatTimestamp( $published['published'], icms::$module -> config['dateformatadmin'] ) ) : _AM_IMPRESSION_NOTPUBLiSHED;

	if ( $published['status'] == 0 && ( $published['published'] && $published['published'] < time() ) ) {
		$published_status = $imagearray['online'];
	} elseif ( $published['status'] == 2 ) {
		$published_status = $imagearray['rejected'];
	} elseif ( $published['status'] == 3 ) {
		$published_status = $imagearray['submitted'];
	} else {
		$published_status = $imagearray['offline'];
	}
	$icon  = '<a href="index.php?op=edit&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ICO_EDIT . '">' . $imagearray['editimg'] . '&nbsp;</a>';
	$icon .= '<a href="index.php?op=delete&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ICO_DELETE . '">' . $imagearray['deleteimg'] . '&nbsp;</a>';
	$icon .= '<a href="index.php?op=clone&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ICO_CLONE . '">' . $imagearray['clone'] . '</a>&nbsp;';
	$icon .= '<a href="altcat.php?op=main&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ALTCAT_CREATEF . '">' . $imagearray['altcat'] . '</a>';

	echo '<tr style="font-size: smaller;">
			<td class="head" style="text-align: center;white-space: nowrap;">' . $aid . '</td>
			<td class="even" style="text-align: left;">' . $title . '</td>
			<td class="even" style="text-align: left;white-space: nowrap;">' . $cattitle . '</td>
			<td class="even" style="text-align: center;">' . $submitter . '</td>
			<td class="even" style="text-align: center; white-space: nowrap;">' . $publish . '</td>
			<td class="even" style="text-align: center; white-space: nowrap;">' . $published_status . '</td>
			<td class="even" style="text-align: center; white-space: nowrap;">' . $icon . '</td>
		</tr>';
	unset( $published );
}

function impression_cattitle( $catid ) {
	global $imagearray;
	$sql = 'SELECT title, inblocks FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $catid;
		$result = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
		if ( $result['inblocks'] ) {
			$ret = $imagearray['blckgreen'] . '&nbsp;<a href="../catview.php?cid=' . $catid . '">' . $result['title'] . '</a>';
		} else {
			$ret = $imagearray['blckorange'] . '&nbsp;<a href="../catview.php?cid=' . $catid . '">' . $result['title'] . '</a>';
		}
		return $ret;
}

function impression_articlelistpagenav( $pubrowamount, $start, $art = 'art', $_this='', $align ) {
	if ( ( $pubrowamount < icms::$module -> config['admin_perpage'] ) ) {
		return false;
	}
	// Display Page Nav if published is > total display pages amount.
	$pagenav = new icms_view_PageNav( $pubrowamount, icms::$module -> config['admin_perpage'], $start, 'st' . $art, $_this );
	echo '<span style="float: ' . $align . '; font-size: 0.9em;">' . $pagenav -> renderNav() . '</span>';
}
?>