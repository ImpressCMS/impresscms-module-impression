<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/newarticles.php
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

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = intval( impression_cleanRequestVars( $_REQUEST, 'aid', '' ) );
$requestid = intval( impression_cleanRequestVars( $_REQUEST, 'requestid', 0 ) );

$impression_newarticles_handler = icms_getModuleHandler( 'articles', basename( dirname( dirname( __FILE__ ) ) ), 'impression' );

switch ( strtolower( $op ) ) {
	case 'approve':
		$sql = 'SELECT cid, title, notifypub FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
		if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}
		list( $cid, $title, $notifypub ) = icms::$xoopsDB -> fetchRow( $result );

		$publisher = icms::$user -> getVar('uname');
		// Update the database
		$sql2 = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " SET published=" . time() .", status='0', publisher='$publisher' WHERE aid=" . $aid;
		if ( !$result = icms::$xoopsDB -> queryF( $sql2 ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}

		$tags = array();
		$tags['ARTICLE_NAME'] = $title;
		$tags['ARTICLE_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?aid=' . $aid;

		$sql3 = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
		if ( !$result = icms::$xoopsDB -> query( $sql3 ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
		} else {
			$row = icms::$xoopsDB -> fetchArray( $result );
			$tags['CATEGORY_NAME'] = $row['title'];
			$tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/viewcat.php?cid=' . $cid;
			$notification_handler = icms::handler( 'icms_data_notification' );
			$notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
			$notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
			if ( intval( $notifypub ) == 1 ) {
			$notification_handler -> triggerEvent( 'article', $aid, 'approve', $tags );
			}
		}
		redirect_header( 'newarticles.php', 1, _AM_IMPRESSION_SUB_NEWFILECREATED );
		break;

	case 'main':
	default:
		$start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
		$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status=3 ORDER BY aid DESC';
		if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}
		$new_array = icms::$xoopsDB -> query( $sql, icms::$module -> config['admin_perpage'], $start );
		$new_array_count = icms::$xoopsDB -> getRowsNum( icms::$xoopsDB -> query( $sql ) );

		icms_cp_header();
		impression_adminmenu( '', _AM_IMPRESSION_SUB_SUBMITTEDFILES );

		echo '<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
				<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_SUB_FILESWAITINGINFO . '</div>
				<span>' . _AM_IMPRESSION_SUB_FILESWAITINGVALIDATION . '<b>' . $new_array_count . '</b><br /><br /></span>
				<div style="padding-left: 8px;">
					' . $imagearray['approve'] . ' ' . _AM_IMPRESSION_SUB_APPROVEWAITINGFILE . '<br />
					' . $imagearray['editimg'] . ' ' . _AM_IMPRESSION_SUB_EDITWAITINGFILE . '<br />
					' . $imagearray['deleteimg'] . ' ' . _AM_IMPRESSION_SUB_DELETEWAITINGFILE . '
				</div>
			  </div><br />';

		$icmsAdminTpl -> assign( 'icms_module_header', '<link rel="stylesheet" type="text/css" href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/style.css" />' );

		if ( icms::$module -> config['ipftables'] == 1 ) {
		
			$criteria = new icms_db_criteria_Compo();
			$criteria -> add( new icms_db_criteria_Item( 'status', 3 ) );

			$objectTable = new icms_ipf_view_Table( $impression_newarticles_handler, $criteria, array() );

			$objectTable -> addColumn( new icms_ipf_view_Column( 'aid', 'center', 40, true ) );
			$objectTable -> addColumn( new icms_ipf_view_Column( 'title', _GLOBAL_LEFT, false, 'ViewArticle' ) );
			$objectTable -> addColumn( new icms_ipf_view_Column( 'uid', 'center', false ) );
			$objectTable -> addColumn( new icms_ipf_view_Column( 'date', 'center' ) );
			
			$objectTable -> addCustomAction( 'getApprove' );
			$objectTable -> addCustomAction( 'getEditArticle' );
			$objectTable -> addCustomAction( 'getDeleteArticle' );
		
			$objectTable -> addQuickSearch( array( 'title' ), _AM_IMPRESSION_SEARCHTITLE );
		
			$objectTable -> setDefaultSort( 'aid' );
			$objectTable -> setDefaultOrder( 'DESC' );

			$icmsAdminTpl -> assign( 'impression_newarticles_table', $objectTable -> fetch() );
			$icmsAdminTpl -> display( 'db:impression_admin_index.html' );
		
		} else {
		
			if ( $new_array_count > 0 ) {
				echo '<div class="impression_table" style="font-size: 10px;">
						<div class="impression_tblhdrrow">
							<div class="impression_tblcell" style="text-align: center;">' . _AM_IMPRESSION_MINDEX_ID . '</div>
							<div class="impression_tblcell">' . _AM_IMPRESSION_MINDEX_TITLE . '</div>
							<div class="impression_tblcell">' . _AM_IMPRESSION_MINDEX_POSTER . '</div>
							<div class="impression_tblcell">' . _AM_IMPRESSION_MINDEX_SUBMITTED . '</div>
							<div class="impression_tblcell">' . _AM_IMPRESSION_MINDEX_ACTION . '</div>
						</div>';
				while ( $new = icms::$xoopsDB -> fetchArray( $new_array ) ) {
					$aid = intval( $new['aid'] );
					$title = icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $new['title'] ) );
					$submitter = icms_member_user_Handler::getUserLink( $new['uid'] );
					$datetime = impression_time( formatTimestamp( $new['date'], icms::$module -> config['dateformat'] ) );

					$icon = ( $new['published'] ) ? $approved : '<a href="newarticles.php?op=approve&amp;aid=' . $aid . '">' . $imagearray['approve'] . '</a>';
					$icon .= '<a style="padding-left: 5px;" href="articles.php?op=edit&amp;aid=' . $aid . '">' . $imagearray['editimg'] . '</a>';
					$icon .= '<a style="padding-left: 5px;" href="articles.php?op=delete&amp;aid=' . $aid . '">' . $imagearray['deleteimg'] . '</a>';

					echo '<div class="impression_tblrow">
							<div class="impression_tblhdrcell" style="text-align: center;">'. $aid . '</div>
							<div class="impression_tblcell"><a href="newarticles.php?op=edit&amp;aid=' . $aid . '">' . $title. '</a></div>
							<div class="impression_tblcell" style="text-align: center;">' . $uid . '</div>
							<div class="impression_tblcell" style="text-align: center;">' . $datetime . '</div>
							<div class="impression_tblcell" style="text-align: center; width: 70px;">' . $icon . '</div>
						</div>';
				}
				echo '</div>';
			} else {
				echo '<div style="border: 1px solid #ccc; text-align: center; margin: auto; width: 99%; font-weight: bold; padding: 3px; background-color: #FFFF99;">' . _AM_IMPRESSION_SUB_NOFILESWAITING . '</div>';
			}

			include_once ICMS_ROOT_PATH . '/class/pagenav.php';
			$page = ( $new_array_count > icms::$module -> config['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
			$pagenav = new icms_view_PageNav( $new_array_count, icms::$module -> config['admin_perpage'], $start, 'start' );
			echo '<div align="right" style="padding: 8px;">' . $page . '' . $pagenav -> renderNav() . '</div>';
		
		}
		
		icms_cp_footer();
		break;
}
?>