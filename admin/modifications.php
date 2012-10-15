<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/modifications.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
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

include 'admin_header.php';

global $mytree;

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$requestid = intval( impression_cleanRequestVars( $_REQUEST, 'requestid', 0 ) );

$impression_mod_handler = icms_getModuleHandler( 'mod', basename( dirname( dirname( __FILE__ ) ) ), 'impression' );

switch ( strtolower( $op ) ) {
	case 'listmodreqshow':

		icms_cp_header();
		impression_adminmenu( '', _AM_IMPRESSION_MOD_MODREQUESTS );

		$sql = 'SELECT modifysubmitter, requestid, aid, cid, title, introtext, description, meta_keywords FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) . ' WHERE requestid=' . $requestid;
		$mod_array = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
		unset( $sql );

		$sql = 'SELECT uid, aid, cid, title, introtext, description, meta_keywords FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $mod_array['aid'];
		$orig_array = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
		unset( $sql );

		$orig_user = new icmsUser( $orig_array['uid'] );
		$submittername = icms_member_user_Handler::getUserLink( $orig_array['uid'] );
		$submitteremail = $orig_user -> getUnameFromId( 'email' );

		echo '<div><b>' . _AM_IMPRESSION_MOD_MODPOSTER . '</b> ' . $submittername . '</div>';

		$not_allowed = array( 'aid', 'uid', 'requestid', 'modifysubmitter' );
		
		$sform = new icms_form_Theme( _AM_IMPRESSION_MOD_ORIGINAL, 'storyform', 'articles.php' );
		$sform -> setExtra( 'enctype="multipart/form-data"' );

		foreach ( $orig_array as $key => $content ) {
			if ( in_array( $key, $not_allowed ) ) {
				continue;
			} 
			$lang_def = constant( '_AM_IMPRESSION_MOD_' . strtoupper( $key ) );
			if ( $key == 'cid' ) {
				$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $content;
				$row = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
				$content = $row['title'];
			}
			$sform -> addElement( new icms_form_elements_Label( $lang_def, $content ) );
		}
		$sform -> display();

		$orig_user = new icmsUser( $mod_array['modifysubmitter'] );
		$submittername = icms_member_user_Handler::getUserLink( $mod_array['modifysubmitter'] );
		$submitteremail = $orig_user -> getUnameFromId( 'email' );

		echo '<br /><div><b>' . _AM_IMPRESSION_MOD_MODIFYSUBMITTER . '</b> ' . $submittername . '</div>';

		$sform = new icms_form_Theme( _AM_IMPRESSION_MOD_PROPOSED, 'storyform', 'modifications.php' );
		$sform -> setExtra( 'enctype="multipart/form-data"' );

		foreach ( $mod_array as $key => $content ) {
			if ( in_array( $key, $not_allowed ) ) {
				continue;
			}
			$lang_def = constant( '_AM_IMPRESSION_MOD_' . strtoupper( $key ) );

			if ( $key == 'cid' ) {
				$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $content;
				$row = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
				$content = $row['title'];
			}
			$sform -> addElement( new icms_form_elements_Label( $lang_def, $content ) );
		}
		$button_tray = new icms_form_elements_Tray( '', '' );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'requestid', $requestid ) );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'aid', $mod_array['requestid'] ) );
		$hidden = new icms_form_elements_Hidden( 'op', 'changemodreq' );
		$button_tray -> addElement( $hidden );
		if ( $mod_array ) {
			$butt_dup = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BAPPROVE, 'submit' );
			$butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'changemodreq\'"' );
			$button_tray -> addElement( $butt_dup );
		}
		$butt_dupct2 = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BIGNORE, 'submit' );
		$butt_dupct2 -> setExtra( 'onclick="this.form.elements.op.value=\'ignoremodreq\'"' );
		$button_tray -> addElement( $butt_dupct2 );
		$sform -> addElement( $button_tray );
		$sform -> display();
		icms_cp_footer();
		break;

	case 'changemodreq':
		$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) . ' WHERE requestid=' . $requestid;
		$article_array = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );

		$aid = $article_array['aid'];
		$cid = $article_array['cid'];
		$title = $article_array['title'];
		$publisher = icms::$user -> getVar('uname');
		$introtext = $article_array['introtext'];
		$description = $article_array['description'];
		$submitter = $article_array['modifysubmitter'];
		$meta_keywords = $article_array['meta_keywords'];

		$sql1 = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " SET cid='$cid', title='$title', uid='$submitter', publisher='$publisher', introtext='$introtext', description='$description', meta_keywords='$meta_keywords' WHERE aid=" . $aid;
		$result = icms::$xoopsDB -> query( $sql1 );
		$sql2 = 'DELETE FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) . ' WHERE requestid=' . $requestid;
		$result = icms::$xoopsDB -> query( $sql2 );
		redirect_header( 'articles.php', 1, _AM_IMPRESSION_MOD_REQUPDATED );
		break;

	case 'ignoremodreq':
		$sql = sprintf( 'DELETE FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) . ' WHERE requestid=' . $requestid );
		icms::$xoopsDB -> query( $sql );
		redirect_header( 'articles.php', 1, _AM_IMPRESSION_MOD_REQDELETED );
		break;

	case 'main':
	default:

		$start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;
		$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_mod' ), 'requestid', 0 );
		$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) . ' ORDER BY requestdate DESC';
		$result = icms::$xoopsDB -> query( $sql, icms::$module -> config['admin_perpage'] , $start );
		$totalmodrequests = icms::$xoopsDB -> getRowsNum( icms::$xoopsDB -> query( $sql ) );

		icms_cp_header();
		impression_adminmenu( '', _AM_IMPRESSION_MOD_MODREQUESTS );

		$icmsAdminTpl -> assign( 'icms_module_header', '<link rel="stylesheet" type="text/css" href="../impressionstyle.css" />' );

		echo '<div style="border: #E8E8E8 1px solid; padding: 8px; border-radius: 5px;">
				<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_MOD_MODREQUESTSINFO . '</div>
				<div style="padding: 8px;">' . _AM_IMPRESSION_MOD_TOTMODREQUESTS . ' <b>' . $totalmodrequests . '</b></div>
			</div><br/>';
		
		if ( icms::$module -> config['ipftables'] == 1 ) {
		
			$objectTable = new icms_ipf_view_Table( $impression_mod_handler, false, array() );

			$objectTable -> addColumn( new icms_ipf_view_Column( 'requestid', 'center', 40, true ) );
			$objectTable -> addColumn( new icms_ipf_view_Column( 'title', _GLOBAL_LEFT, false, 'ViewArticle' ) );
			$objectTable -> addColumn( new icms_ipf_view_Column( 'modifysubmitter', 'center' ) );
			$objectTable -> addColumn( new icms_ipf_view_Column( 'requestdate', 'center', 100 ) );

			$objectTable -> addCustomAction( 'getListModReqShow' );
		
			$objectTable -> addQuickSearch( array( 'title' ), _AM_IMPRESSION_SEARCHTITLE );
		
			$objectTable -> setDefaultSort( 'requestid' );
			$objectTable -> setDefaultOrder( 'DESC' );

			$icmsAdminTpl -> assign( 'imlinks_mod_table', $objectTable -> fetch() );
			$icmsAdminTpl -> display( 'db:imlinks_admin_index.html' );
		
		} else {

			if ( $totalmodrequests > 0 ) {
				echo '<div class="impression_table" style="font-size: 10px;">
					<div class="impression_tblhdrrow">
						<div class="impression_tblcell" style="text-align: center;">' . _AM_IMPRESSION_MOD_MODID . '</div>
						<div class="impression_tblcell">' . _AM_IMPRESSION_MOD_MODTITLE . '</div>
						<div class="impression_tblcell">' . _AM_IMPRESSION_MOD_MODIFYSUBMIT . '</div>
						<div class="impression_tblcell">' . _AM_IMPRESSION_MOD_DATE . '</div>
						<div class="impression_tblcell">' . _AM_IMPRESSION_MINDEX_ACTION . '</div>
					</div>';
				while ( $article_arr = icms::$xoopsDB -> fetchArray( $result ) ) {
					$path = $mytree -> getNicePathFromId( $article_arr['requestid'], 'title', 'modifications.php?op=listmodreqshow&requestid' );
					$path = str_replace( '/', '', $path );
					$path = str_replace( ':', '', trim( $path ) );
					$title = trim( $path );
					$submitter = icms_member_user_Handler::getUserLink( $article_arr['modifysubmitter'] );;
					$requestdate = formatTimestamp( $article_arr['requestdate'], icms::$module -> config['dateformatadmin'] );

					echo '<div class="impression_tblrow">
						<div class="impression_tblhdrcell" style="text-align: center;">' . $article_arr['requestid'] . '</div>
						<div class="impression_tblcell">' . $title . '</div>
						<div class="impression_tblcell">' . $submitter . '</div>
						<div class="impression_tblcell">' . $requestdate . '</div>
						<div class="impression_tblcell">
							<a href="modifications.php?op=listmodreqshow&amp;requestid=' . $article_arr['requestid'] . '">' . $imagearray['view'] . '</a>
						</div>
					  </div>';
				}
				echo '</div>';
			} else {
				echo '<div style="border: 1px solid #ccc; text-align: center; margin: auto; width: 99%; font-weight: bold; padding: 3px; background-color: #FFFF99;">' . _AM_IMPRESSION_MOD_NOMODREQUEST . '</div>';
			}

			include_once ICMS_ROOT_PATH . '/class/pagenav.php';
			$pagenav = new icms_view_PageNav( $totalmodrequests, icms::$module -> config['admin_perpage'], $start, 'start' );
			echo '<div style="text-align: right; padding: 8px;">' . $pagenav -> renderNav() . '</div>';
		
		}
		
		icms_cp_footer();
}
?>