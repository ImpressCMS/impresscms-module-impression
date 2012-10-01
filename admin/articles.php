<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/articles.php
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

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = intval( impression_cleanRequestVars( $_REQUEST, 'aid', 0 ) );

$impression_articles_handler = icms_getModuleHandler( 'articles', basename( dirname( dirname( __FILE__ ) ) ), 'impression' );
// $impression_cat_handler = icms_getModuleHandler( 'cat', basename( dirname( dirname( __FILE__ ) ) ), 'impression' );

function edit( $aid = 0, $doclone = 0 ) {
	global $mytree, $impressionmyts, $icmsAdminTpl;

	$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
	if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
		icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
		return false;
	}
	$article_array = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
	
	if ( $doclone == 0 ) {
		$aid = $article_array['aid'] ? $article_array['aid'] : 0;
		$title = $article_array['title'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['title'] ) ) : '';
		$published = $article_array['published'] ? $article_array['published'] : time();
	} else {
		$aid='';
		$title = $article_array['title'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['title'] . '  ' . _AM_IMPRESSION_CLONE ) ) : '';
		$published = time();
	}

	$cid = $article_array['cid'] ? $article_array['cid'] : 0;
	$submitter = $article_array['uid'] ? $article_array['uid'] : 1;
	$uid = $article_array['uid'] ? $article_array['uid'] : 'Anonymous';
	$introtextb = $article_array['introtext'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['introtext'] ) ) : '';
	$descriptionb = $article_array['description'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['description'] ) ) : '';
	$date = $article_array['date'];
	$status = $article_array['status'] ? $article_array['status'] : 0;
	$ipaddress = $article_array['ipaddress'] ? $article_array['ipaddress'] : 0;
	$meta_keywords = $article_array['meta_keywords'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['meta_keywords'] ) ) : '';
//	$item_tag = $article_array['item_tag'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['item_tag'] ) ) : '';
	$notifypub = $article_array['notifypub'] ? $article_array['notifypub'] : 0;
	$nice_url = $article_array['nice_url'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['nice_url'] ) ) : '';
	$source = $article_array['source'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['source'] ) ) : '';
	$sourceurl = $article_array['sourceurl'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['sourceurl'] ) ) : '';

	icms_cp_header();
	impression_adminmenu( 2, _AM_IMPRESSION_MARTICLES );

	$icmsAdminTpl -> assign( 'icms_module_header', '<script type="text/javascript" language="javascript" src="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.js"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.css" />');

	if ( $aid ) {
		$inblocks = $article_array['inblocks'];
		$text_info = '
			<table width="100%">
				<tr>
					<td style="width: 26%; vertical-align: top; padding: 8px;">
						<div><b>' . _AM_IMPRESSION_ARTICLE_ID . ' </b>' . $aid . '</div>
						<div><b>' . _AM_IMPRESSION_READS . ' </b>' . $article_array['hits']. '</div>
						<div><b>' . _COMMENTS . ': </b>' . hascomments( $article_array['aid'] ) . '</div>
					</td>
					<td  style="width: 34%; vertical-align: top; padding: 8px;">
						<div><b>' . _AM_IMPRESSION_ARTICLE_PUBLISHER . ' </b>' . icms_member_user_Handler::getUserLink( $article_array['uid'] ) . '</div>
						<div><b>' . _AM_IMPRESSION_ARTICLE_IP . ' </b>' . $ipaddress . '</div>
					</td>
					<td  style="width: 40%; vertical-align: top; padding: 8px;">
						<div><b>' . _AM_IMPRESSION_MINDEX_SUBMITTED . ': </b>' . impression_time( formatTimestamp( $article_array['date'], icms::$module -> config['dateformatadmin'] ) ) . '</div>
						<div><b>' . _AM_IMPRESSION_DATESUB . ': </b>' . impression_time( formatTimestamp( $article_array['published'], icms::$module -> config['dateformatadmin'] ) ) . '</div>
					</td>
				</tr>
			</table>';
		echo '<div style="border: #E8E8E8 1px solid; padding: 8px; border-radius: 3px;">
				<div style="display: inline; font-weight: bold; color: #0A3760;">' . _AM_IMPRESSION_INFOMATION . '</div>
				<div>' . $text_info . '</div>
				</div>
				<br />';
	} else { $inblocks = 1; }

	if ( $doclone == 0 ) {
		$caption = ( $aid ) ? _AM_IMPRESSION_ARTICLE_MODIFYFILE : _AM_IMPRESSION_ARTICLE_CREATENEWFILE;
	} else {
		$caption = _AM_IMPRESSION_CLONEARTICLE;
	}
	$sform = new icms_form_Theme( $caption, 'storyform', '' );
	$sform -> setExtra( 'enctype="multipart/form-data"' );

// Article title
	$sform -> addElement( new icms_form_elements_Text( _AM_IMPRESSION_ARTICLE_TITLE, 'title', icms::$module -> config['txt_width'], 255, $title ), true );

// Article nice url	
	$niceform = new icms_form_elements_Text( _AM_IMPRESSION_NICEURL . impression_tooltip( _AM_IMPRESSION_NICEURLDSC, 'help' ), 'nice_url', icms::$module -> config['txt_width'], 255, $nice_url );
	$sform -> addElement( $niceform, false );

// Article submitter
	if ( $uid ) {
		$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'users' ), 'uid', 0 );	
		ob_start();
			$mytree -> makeMySelBox( 'uname', 'uname', $uid, 0 );
			$sform -> addElement( new icms_form_elements_Label( _AM_IMPRESSION_ARTICLE_PUBLISHER, ob_get_contents() ) );
		ob_end_clean();
	} else {
		$uid = icms::$user -> getVar('uname');
		$sform -> addElement( new icms_form_elements_Hidden( 'uid', $uid ) );
	}

// Article main category
	$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );	
	ob_start();
		$mytree -> makeMySelBox( 'title', 'title', $cid, 0 );
		$sform -> addElement( new icms_form_elements_Label( _AM_IMPRESSION_ARTICLE_CATEGORY, ob_get_contents() ) );
	ob_end_clean();

// Article introtext form
	$introeditor = impression_getWysiwygForm( _AM_IMPRESSION_ARTICLE_INTROTEXT . impression_tooltip( _AM_IMPRESSION_ARTICLE_INTROTEXT_DSC, 'help' ), 'introtextb', $introtextb, 250, 10 );
	$sform -> addElement( $introeditor, false );

// Article description form 
	$editor = impression_getWysiwygForm( _AM_IMPRESSION_ARTICLE_DESCRIPTION . impression_tooltip( _AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC, 'help' ), 'descriptionb', $descriptionb, 500, 35 );
	$sform -> addElement( $editor, false );

// Article source
	$source_text = new icms_form_elements_Text( '', 'source', 70, 255, $source );
	$source_tray = new icms_form_elements_Tray( _AM_IMPRESSION_SOURCE . impression_tooltip( _AM_IMPRESSION_SOURCEDSC, 'help' ), '' );
	$source_tray -> addElement( $source_text, false) ;
	$sform -> addElement( $source_tray );

// Article source url
	$sourceurl_text = new icms_form_elements_Text( '', 'sourceurl', 70, 255, $sourceurl );
	$sourceurl_tray = new icms_form_elements_Tray( _AM_IMPRESSION_SOURCEURL . impression_tooltip( _AM_IMPRESSION_SOURCEURLDSC, 'help' ), '' );
	$sourceurl_tray -> addElement( $sourceurl_text, false) ;
	$sourceurl_tray -> addElement( new icms_form_elements_Label( "&nbsp;<img src='../images/icon/world.png' onClick=\"window.open(storyform.sourceurl.value,'','');return(false);\" alt='" . _AM_IMPRESSION_CHECKURL . "' title='" . _AM_IMPRESSION_CHECKURL . "' style='cursor:pointer;' />" ) );
	$sform -> addElement( $sourceurl_tray );

// Meta keywords form
	$keywords = new icms_form_elements_Textarea( _AM_IMPRESSION_KEYWORDS . impression_tooltip( _AM_IMPRESSION_KEYWORDS_NOTE, 'help' ), 'meta_keywords', $meta_keywords, 7, 60);
	$sform -> addElement( $keywords, false );

// Insert tags if Tag-module is installed
//	if (impression_tag_module_included()) {
//		include_once ICMS_ROOT_PATH . '/modules/tag/include/formtag.php';
//		$sform -> addElement( new XoopsFormTag( 'item_tag', icms::$module -> config['txt_width'], 255, $article_array['item_tag'], 0 ) );
//	} else {
//		$sform -> addElement( new icms_form_elements_Hidden( 'item_tag', $article_array['item_tag'] ) );
//	}

// Publish date
	$datesub_datetime = new icms_form_elements_Datetime(_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE . impression_tooltip( _AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC, 'help' ), 'published', $size = 15, $published);
	$sform -> addElement( $datesub_datetime );

// Set Status
	if ( $status==3 ) {
		$status_array = array(	0 => _AM_IMPRESSION_PUBLISHED,
								1 => _AM_IMPRESSION_OFFLINE,
								2 => _AM_IMPRESSION_REJECTED,
								3 => _AM_IMPRESSION_SUBMITTED );
	} else {
		$status_array = array(	0 => _AM_IMPRESSION_PUBLISHED,
								1 => _AM_IMPRESSION_OFFLINE,
								2 => _AM_IMPRESSION_REJECTED );
	}
	$status_select = new icms_form_elements_Select( _AM_IMPRESSION_ARTICLE_FILESSTATUS . impression_tooltip( _AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC, 'help' ), 'status', $status );
	$status_select -> addOptionArray( $status_array );
	$sform -> addElement( $status_select );
	
// Display in blocks
	$inblocks_yn = new icms_form_elements_Radioyn( _AM_IMPRESSION_ARTICLE_INBLOCKS . impression_tooltip( _AM_IMPRESSION_ARTICLE_INBLOCKS_DSC, 'help' ), 'inblocks', $inblocks, ' ' . _YES . '', ' ' . _NO . '' );
	$sform -> addElement( $inblocks_yn );

	if ( !$aid ) {
		$button_tray = new icms_form_elements_Tray( '', '' );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'notifypub', $notifypub ) );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'op', 'save' ) );
		$button_tray -> addElement( new icms_form_elements_Button( '', '', _AM_IMPRESSION_BSAVE, 'submit' ) );
		$sform -> addElement( $button_tray );
	} else {
		$button_tray = new icms_form_elements_Tray( '', '' );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'aid', $aid ) );
		$hidden = new icms_form_elements_Hidden( 'op', 'save' );
		$button_tray -> addElement( $hidden );

		$butt_dup = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BMODIFY, 'submit' );
		$butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'save\'"' );
		$button_tray -> addElement( $butt_dup );
		$butt_dupct = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BDELETE, 'submit' );
		$butt_dupct -> setExtra( 'onclick="this.form.elements.op.value=\'delete\'"' );
		$button_tray -> addElement( $butt_dupct );
		$butt_dupct2 = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BCANCEL, 'submit' );
		$butt_dupct2 -> setExtra( 'onclick="this.form.elements.op.value=\'articlesConfigMenu\'"' );
		$button_tray -> addElement( $butt_dupct2 );
		$sform -> addElement( $button_tray );
	}
	$sform -> display();
	unset( $hidden );
	icms_cp_footer();
}

switch ( strtolower( $op ) ) {
	case 'edit':
		edit( intval( $aid ), 0 );
		break;

	case 'clone':
		edit( intval( $aid ), 1 );
		break;

	case 'save':
		$aid = ( !empty( $_POST['aid'] ) ) ? $_POST['aid'] : 0;
		$cid = ( !empty( $_POST['cid'] ) ) ? $_POST['cid'] : 0;
		$status = $_POST['status'];
		$title = icms_core_DataFilter::addSlashes( trim( $_POST['title'] ) );
		$nice_url = icms_core_DataFilter::addSlashes( trim( $_POST['nice_url'] ) );
		$inblocks = ( isset( $_POST['inblocks'] ) && $_POST['inblocks'] == 1 ) ? 1 : 0;

		// Get data from form
		$introtextb = icms_core_DataFilter::addSlashes( trim( $_POST['introtextb'] ) );
		$descriptionb = icms_core_DataFilter::addSlashes( trim( $_POST['descriptionb'] ) );
		$source = icms_core_DataFilter::addSlashes( trim( $_POST['source'] ) );
		$sourceurl = icms_core_DataFilter::addSlashes( trim( $_POST['sourceurl'] ) );
		$meta_keywords = icms_core_DataFilter::addSlashes( trim( $_POST['meta_keywords'] ) );
//		$item_tag = icms_core_DataFilter::addSlashes( trim( $_POST['item_tag'] ) );
		$published = strtotime( $_POST['published']['date'] ) + $_POST['published']['time'];
		$uid = $_POST['uid'];
		$publisher = icms::$user -> getVar('uid');
		$notifypub = ( isset( $_POST['notifypub'] ) && $_POST['notifypub'] == 1 );
		$approved = ( isset( $_POST['approved'] ) && $_POST['approved'] == 1 ) ? 1 : 0;

		// Update or insert linkload data into database
		if ( !$aid ) {
			$date = time();
			$ipaddress = $_SERVER['REMOTE_ADDR'];
			$sql = "INSERT INTO " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " (aid, cid, title, uid, publisher, status, date, published, introtext, description, ipaddress, meta_keywords, notifypub, nice_url, inblocks, source, sourceurl)";
			$sql .= " VALUES ('', $cid, '$title', '$uid', '$publisher', '$status', '$date', '$published', '$introtextb', '$descriptionb', '$ipaddress', '$meta_keywords', '$notifypub', '$nice_url', '$inblocks', '$source', '$sourceurl')";
		} else {
			$sql = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " SET cid=$cid, title='$title', uid='$uid', publisher='$publisher', status='$status', published='$published', introtext='$introtextb', description='$descriptionb', meta_keywords='$meta_keywords', notifypub='$notifypub', nice_url='$nice_url', inblocks='$inblocks', source='$source', sourceurl='$sourceurl' WHERE aid=" . $aid;
		}

		if ( !$result = icms::$xoopsDB -> queryF( $sql ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}

		$newaid = mysql_insert_id();

// Add item_tag to Tag-module
//		if ( !$aid ) {
//			$tagupdate = impression_tagupdate( $newaid, $item_tag );
//		} else {
//			$tagupdate = impression_tagupdate( $aid, $item_tag );
//		}

// Send notifications
		if ( !$aid ) {
			$tags = array();
			$tags['IMPRESSION_NAME'] = $title;
			$tags['IMPRESSION_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $cid . '&amp;aid=' . $newaid;
			$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
			$result = icms::$xoopsDB -> query( $sql );
			$row = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
			$tags['CATEGORY_NAME'] = $row['title'];
			$tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/catview.php?cid=' . $cid;
			$notification_handler = icms::handler('icms_data_notification');
			$notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
			$notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
		}
		if ( $aid && $approved && $notifypub ) {
			$tags = array();
			$tags['ARTICLE_NAME'] = $title;
			$tags['ARTICLE_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $cid . '&amp;aid=' . $aid;
			$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
			$result = icms::$xoopsDB -> query( $sql );
			$row = icms::$xoopsDB -> fetchArray( $result );
			$tags['CATEGORY_NAME'] = $row['title'];
			$tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/catview.php?cid=' . $cid;
			$notification_handler = icms::handler('icms_data_notification');
			$notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
			$notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
			$notification_handler -> triggerEvent( 'article', $lid, 'approve', $tags );
		}
		$message = ( !$aid ) ? _AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD : _AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE ;
		$message = ( $aid && !$_POST['published'] && $approved ) ? _AM_IMPRESSION_ARTICLE_FILEAPPROVED : $message;

		redirect_header( 'articles.php', 1, $message );
		break;

	case 'delete':
		if ( impression_cleanRequestVars( $_REQUEST, 'confirm', 0 ) ) {
			$title = impression_cleanRequestVars( $_REQUEST, 'title', 0 );

			// delete article
			$sql = 'DELETE FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
				return false;
			}

			// delete altcat
			$sql = 'DELETE FROM ' . icms::$xoopsDB -> prefix( 'impression_altcat' ) . ' WHERE aid=' . $aid;
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
				return false;
			}

			// delete comments
			xoops_comment_delete( icms::$module -> getVar( 'mid' ), $aid );
			redirect_header( 'articles.php', 1, sprintf( _AM_IMPRESSION_ARTICLE_FILEWASDELETED, $title ) );
			exit();
		} else {
			$sql = 'SELECT aid, title FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
				return false;
			}
		list( $aid, $title ) = icms::$xoopsDB -> fetchrow( $result );
//			$item_tag = $result['item_tag'];
			icms_cp_header();
			impression_adminmenu( _AM_IMPRESSION_BINDEX );
			icms_core_Message::confirm( array( 'op' => 'delete', 'aid' => $aid, 'confirm' => 1, 'title' => $title ), 'articles.php', _AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS . '<br /><br>' . $title, _DELETE );

			// Remove item_tag from Tag-module
//			$tagupdate = impression_tagupdate( $aid, $item_tag );

			icms_cp_footer();
		}
		break;
		
	case 'changestatus':
		$status = $ret = '';
		$aid = isset( $_POST['aid'] ) ? intval( $_POST['aid'] ) : intval( $_GET['aid'] );
		$status = $impression_articles_handler -> changeOnlineStatus( $aid, 'status' );
		$ret = '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/articles.php';
		if ( $status == 0 ) {
			redirect_header( ICMS_URL . $ret, 2, _AM_IMPRESSION_ICO_ONLINE );
		} else {
			redirect_header( ICMS_URL . $ret, 2, _AM_IMPRESSION_ICO_OFFLINE );
		}
		break;

	case 'main':
	default:
	
		$start  = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
		$start1 = impression_cleanRequestVars( $_REQUEST, 'start1', 0 );
		$start2 = impression_cleanRequestVars( $_REQUEST, 'start2', 0 );
		$start3 = impression_cleanRequestVars( $_REQUEST, 'start3', 0 );
		$start4 = impression_cleanRequestVars( $_REQUEST, 'start4', 0 );
		$start5 = impression_cleanRequestVars( $_REQUEST, 'start5', 0 );
		$totalcats = impression_totalcategory();

		$result = icms::$xoopsDB -> query( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published>0' );
		list( $totalarticles ) = icms::$xoopsDB -> fetchRow( $result );
		$result2 = icms::$xoopsDB -> query( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status=3' );
		list( $totalnewarticles ) = icms::$xoopsDB -> fetchRow( $result2 );
		$result3 = icms::$xoopsDB -> query( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) );
		list( $totalmodrequests ) = icms::$xoopsDB -> fetchRow( $result3 );

		icms_cp_header();
		impression_adminmenu( 1, _AM_IMPRESSION_BINDEX );

		$icmsAdminTpl -> assign( 'icms_module_header', '<link href="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/impressionstyle.css" rel="stylesheet" type="text/css" />' );
		echo '<div style="border: #E8E8E8 1px solid; padding: 8px;  border-radius: 5px;">
				<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_MINDEX_ARTICLESUMMARY . '</div>
				<div style="padding: 10px;" id="button">
					<a class="impression_button" href="category.php">' . _AM_IMPRESSION_SCATEGORY . $totalcats . '</a>
					<a class="impression_button" href="articles.php">' . _AM_IMPRESSION_SFILES . $totalarticles . '</a>
					<a class="impression_button" href="newarticles.php">' . _AM_IMPRESSION_SNEWFILESVAL . $totalnewarticles . '</a>
					<a class="impression_button" href="modifications.php">' . _AM_IMPRESSION_SMODREQUEST . $totalmodrequests . '</a>
				</div>
			 </div>';
			 
		// Main Index
		$objectTable = new icms_ipf_view_Table( $impression_articles_handler, false, array() );

		$objectTable -> addHeader('<span style="float: left; font-size: 12px; font-weight: bold; color: #0A3760;">' . _AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE . '</span>');

		$objectTable -> addColumn( new icms_ipf_view_Column( 'aid', 'center', 40, true ) );
		$objectTable -> addColumn( new icms_ipf_view_Column( 'title', _GLOBAL_LEFT, false, 'ViewArticle' ) );
		$objectTable -> addColumn( new icms_ipf_view_Column( 'cid', _GLOBAL_LEFT, false ) );
		$objectTable -> addColumn( new icms_ipf_view_Column( 'uid', 'center' ) );
		$objectTable -> addColumn( new icms_ipf_view_Column( 'published', 'center', 150 ) );
		$objectTable -> addColumn( new icms_ipf_view_Column( 'status', 'center' ) );

		$objectTable -> addCustomAction( 'getEditArticle' );
		$objectTable -> addCustomAction( 'getDeleteArticle' );
		$objectTable -> addCustomAction( 'getCloneArticle' );
		$objectTable -> addCustomAction( 'getAltcatArticle' );
		
	//	$objectTable -> addQuickSearch( array( 'title' ), 'SEARCH' ); // Search term
		
		$objectTable -> setDefaultSort( 'aid' );
		$objectTable -> setDefaultOrder( 'DESC' );

		$icmsAdminTpl -> assign( 'impression_articles_table', $objectTable -> fetch() );
		$icmsAdminTpl -> display( 'db:impression_admin_index.html' );
		
		icms_cp_footer();
		break;
}
?>