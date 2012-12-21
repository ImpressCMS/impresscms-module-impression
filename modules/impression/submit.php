<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: submit.php
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

include 'header.php';

global $icmsConfigUser;

$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

$cid = intval( impression_cleanRequestVars( $_REQUEST, 'cid', 0 ) );
$aid = intval( impression_cleanRequestVars( $_REQUEST, 'aid', 0 ) );

if ( false == impression_checkgroups( $cid, 'ImpressionSubPerm' ) ) {
	redirect_header( 'index.php', 1, _MD_IMPRESSION_NOPERMISSIONTOPOST );
	exit();
} 

if ( true == impression_checkgroups( $cid, 'ImpressionSubPerm' ) ) {
	if ( impression_cleanRequestVars( $_REQUEST, 'submit', 0 ) ) {
		
		// Verify captcha code
		if ( icms::$module -> config['captcha'] ) {
			$icmsCaptcha = icms_form_elements_captcha_Object::instance();
			if ( !$icmsCaptcha -> verify( true ) ) {
				redirect_header( 'submit.php', 2, $icmsCaptcha -> getMessage() );
			}
		}
		
		if ( false == impression_checkgroups( $cid, 'ImpressionSubPerm' ) ) {
			redirect_header( 'index.php', 1, _MD_IMPRESSION_NOPERMISSIONTOPOST );
			exit();
		}

		$submitter = ( is_object( icms::$user ) && !empty( icms::$user ) ) ? icms::$user -> getVar( 'uid' ) : 0;
		$offline = impression_cleanRequestVars( $_REQUEST, 'offline', 0 );
		$approve = impression_cleanRequestVars( $_REQUEST, 'approve', 0 );
		$title = icms_core_DataFilter::addSlashes( ltrim( $_REQUEST['title'] ) );
		$introtextb = icms_core_DataFilter::addSlashes( ltrim( $_REQUEST['introtextb'] ) );
		$descriptionb = icms_core_DataFilter::addSlashes( ltrim( $_REQUEST['descriptionb'] ) );
		$source = icms_core_DataFilter::addSlashes( ltrim( $_REQUEST['source'] ) );
		$sourceurl = icms_core_DataFilter::addSlashes( ltrim( $_REQUEST['sourceurl'] ) );
		$meta_keywords = icms_core_DataFilter::addSlashes( ltrim( $_REQUEST['meta_keywords'] ) );
		$notifypub = impression_cleanRequestVars( $_REQUEST, 'notifypub', 0 );
		$date = time();
		$ipaddress = $_SERVER['REMOTE_ADDR'];

		if ( $aid == 0 ) {
			$status = 3;
			// $offline = 1;
			$date = time();
			$message = _MD_IMPRESSION_THANKSFORINFO;
			if ( true == impression_checkgroups( $cid, 'ImpressionAutoApp' ) ) {
				$date = time();
				$status = 0;
				// $offline = 0;
				$message = _MD_IMPRESSION_ISAPPROVED;
			}
			$sql = "INSERT INTO " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " (aid, cid, title, uid, status, date, introtext, description, ipaddress, meta_keywords, notifypub, source, sourceurl) ";
			$sql .= " VALUES ('', $cid, '$title', '$submitter', '$status', '$date', '$introtextb', '$descriptionb', '$ipaddress', '$meta_keywords', '$notifypub', '$source', '$sourceurl')";
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			$_error = icms::$xoopsDB -> error() . ' : ' . icms::$xoopsDB -> errno();
				icms::$logger -> handleError( E_USER_WARNING, $_error, __FILE__, __LINE__ );
			}
			$newaid = icms::$xoopsDB -> getInsertId();

// Notify of new link (anywhere) and new link in category
			$notification_handler = icms::handler('icms_data_notification');

			$tags = array();
			$tags['ARTICLE_NAME'] = $title;
			$tags['ARTICLE_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval( $cid ) . '&amp;aid=' . intval( $newaid );

			$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . intval( $cid );
			$result = icms::$xoopsDB -> query( $sql );
			$row = icms::$xoopsDB -> fetchArray( $result );

			$tags['CATEGORY_NAME'] = $row['title'];
			$tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/catview.php?cid=' . intval( $cid );
			if ( true == impression_checkgroups( $cid, 'ImpressionAutoApp' ) ) {
				$notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
				$notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
				redirect_header( 'index.php', 2, _MD_IMPRESSION_ISAPPROVED );
			} else {
				$tags['WAITINGFILES_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/newarticles.php';
				$notification_handler -> triggerEvent( 'global', 0, 'article_submit', $tags );
				$notification_handler -> triggerEvent( 'category', $cid, 'article_submit', $tags );
				if ( $notifypub ) {
					include_once ICMS_ROOT_PATH . '/include/notification_constants.php';
					$notification_handler -> subscribe( 'article', $newaid, 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE );
				}
				redirect_header( 'index.php', 2, _MD_IMPRESSION_ISAPPROVED );
			}

		} else {
			if ( true == impression_checkgroups( $cid, 'ImpressionAutoApp' ) || $approve == 1 ) {
				$updated = time();
				$publisher = icms::$user -> getVar('uname');
				$uname = icms::$user -> getVar('uid');
				$sql = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " SET cid=$cid, title='$title', status='0', introtext='$introtextb', description='$descriptionb', meta_keywords='$meta_keywords', notifypub='$notifypub', source='$source', sourceurl='$sourceurl', uname='$uname', publisher='$publisher' WHERE aid=" . $aid;
				if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
					$_error = icms::$xoopsDB -> error() . ' : ' . icms::$xoopsDB -> errno();
					icms::$logger -> handleError( E_USER_WARNING, $_error, __FILE__, __LINE__ );
				}

				$notification_handler = icms::handler('icms_data_notification');
				$tags = array();
				$tags['ARTICLE_NAME'] = $title;
				$tags['ARTICLE_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval( $cid ) . '&amp;aid=' . intval( $aid );
				$sql = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . intval( $cid );
				$result = icms::$xoopsDB -> query( $sql );
				$row = icms::$xoopsDB -> fetchArray( $result );
				$tags['CATEGORY_NAME'] = $row['title'];
				$tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/catview.php?cid=' . intval( $cid );

				$notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
				$notification_handler -> triggerEvent( 'category', intval( $cid ), 'new_article', $tags );
				$_message = _MD_IMPRESSION_ISAPPROVED;
			} else {
				$modifysubmitter = icms::$user -> getVar('uid');
				$requestid = $modifysubmitter;
				$requestdate = time();
				$updated = impression_cleanRequestVars( $_REQUEST, 'up_dated', time() );
				$sql = 'INSERT INTO ' . icms::$xoopsDB -> prefix( 'impression_mod' ) . ' (requestid, aid, cid, title, introtext, description, modifysubmitter, requestdate, meta_keywords, source, sourceurl)';
				$sql .= " VALUES ('', $aid, $cid, '$title', '$introtextb', '$descriptionb', '$modifysubmitter', '$requestdate', '$meta_keywords', '$source', '$sourceurl')";
				if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
					$_error = icms::$xoopsDB -> error() . ' : ' . icms::$xoopsDB -> errno();
					icms::$logger -> handleError( E_USER_WARNING, $_error, __FILE__, __LINE__ );
				}

				$tags = array();
				$tags['MODIFYREPORTS_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/index.php?op=listModReq';
				$notification_handler = icms::handler('icms_data_notification');
				$notification_handler -> triggerEvent( 'global', 0, 'article_modify', $tags );

				$tags['WAITINGFILES_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/admin/index.php?op=listNewarticles';
				$notification_handler -> triggerEvent( 'global', 0, 'article_submit', $tags );
				$notification_handler -> triggerEvent( 'category', intval( $cid ), 'article_submit', $tags );
				if ( $notifypub ) {
					include_once ICMS_ROOT_PATH . '/include/notification_constants.php';
					$notification_handler -> subscribe( 'article', $newid, 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE );
				}
				$_message = _MD_IMPRESSION_THANKSFORINFO;
			}
			redirect_header( 'index.php', 2, $_message );
		}
	} else {
		$approve = impression_cleanRequestVars( $_REQUEST, 'approve', 0 );

// Show disclaimer
		if ( icms::$module -> config['showdisclaimer'] && !isset( $_GET['agree'] ) && $approve == 0 ) {
			$xoopsOption['template_main'] = 'impression_disclaimer.html';
			include_once ICMS_ROOT_PATH . '/header.php';

			$xoopsTpl -> assign( 'image_header', '<div align="center">' . impression_imageheader() . '</div>' );
			$xoopsTpl -> assign( 'disclaimer', icms_core_DataFilter::checkVar( icms::$module -> config['disclaimer'], 'text' ) );
			$xoopsTpl -> assign( 'cancel_location', 'index.php' );
			$xoopsTpl -> assign( 'article_disclaimer', false );
			$xoopsTpl -> assign( 'module_dir', icms::$module -> getVar('dirname') );
			if ( !isset( $_REQUEST['aid'] ) ) {
				$xoopsTpl -> assign( 'agree_location', 'submit.php?agree=1' );
			} elseif ( isset( $_REQUEST['aid'] ) ) {
				$aid = intval( $_REQUEST['aid'] );
				$xoopsTpl -> assign( 'agree_location', 'submit.php?agree=1&amp;aid=' . intval( $aid ) );
			}
			include ICMS_ROOT_PATH . '/footer.php';
			exit();
		}

// Submit form
		include_once ICMS_ROOT_PATH . '/header.php';
		echo '<div style="clear: both; text-align: center; padding: 10px 0 10px 0;">' . impression_imageheader() . '</div>';
		echo '<div>' . _MD_IMPRESSION_SUB_SNEWMNAMEDESC . '</div><br />';

		$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
		$article_array = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );

		$aid = $article_array['aid'] ? $article_array['aid'] : 0;
		$cid = $article_array['cid'] ? $article_array['cid'] : 0;
		$title = $article_array['title'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['title'] ) ) : '';
		$publisher = $article_array['publisher'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['publisher'] ) ) : '';
		$introtextb = $article_array['introtext'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['introtext'] ) ) : '';
		$descriptionb = $article_array['description'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['description'] ) ) : '';
		$published = $article_array['published'] ? $article_array['published'] : 0;
		$ipaddress = $article_array['ipaddress'] ? $article_array['ipaddress'] : 0;
		$meta_keywords = $article_array['meta_keywords'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['meta_keywords'] ) ) : '';
		$notifypub = $article_array['notifypub'] ? $article_array['notifypub'] : 0;
		$source = $article_array['source'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['source'] ) ) : '';
		$sourceurl = $article_array['sourceurl'] ? icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $article_array['sourceurl'] ) ) : '';

		if ( icms::$module -> config['uselyte'] == 1 ) $xoopsTpl -> assign( 'icms_module_header', '<script type="text/javascript" language="javascript" src="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.js"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.css" />' );

		$sform = new icms_form_Theme( _MD_IMPRESSION_SUBMITCATHEAD, 'storyform', '' );
		$sform -> setExtra( 'enctype="multipart/form-data"' );

// Article title
		$sform -> addElement( new icms_form_elements_Text( _MD_IMPRESSION_FILETITLE, 'title', 55, 255, $title ), true );

// Select category
		$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

		$submitcats = array();
		$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' ORDER BY title';
		$result = icms::$xoopsDB -> query( $sql );
		while ( $myrow = icms::$xoopsDB -> fetchArray( $result ) ) {
			if ( true == impression_checkgroups( $myrow['cid'], 'ImpressionSubPerm' ) ) {
				$submitcats[$myrow['cid']] = $myrow['title'];
			}
		}

		ob_start();
			$mytree -> makeMySelBox( 'title', 'title', $cid, 0 );
			$sform -> addElement( new icms_form_elements_Label( _MD_IMPRESSION_CATEGORYC, ob_get_contents() ) );
		ob_end_clean();

// Article introtext form
		$introtext = impression_getWysiwygForm( _MD_IMPRESSION_INTROTEXTC . impression_tooltip( _MD_IMPRESSION_INTROTEXTC_DSC ), 'introtextb', $introtextb, 250, 10 );
		if ( icms::$module -> config['uselyte'] == 0 ) $introtext -> setDescription( _MD_IMPRESSION_INTROTEXTC_DSC );
		$sform -> addElement( $introtext, false );

// Article description form
		$editor = impression_getWysiwygForm( _MD_IMPRESSION_DESCRIPTIONC . impression_tooltip( _MD_IMPRESSION_DESCRIPTIONC_DSC ), 'descriptionb', $descriptionb, 500, 35 );
		if ( icms::$module -> config['uselyte'] == 0 ) $editor -> setDescription( _MD_IMPRESSION_DESCRIPTIONC_DSC );
		$sform -> addElement( $editor, false );

// Article source
		$source_text = new icms_form_elements_Text( '', 'source', 70, 255, $source );
		$source_tray = new icms_form_elements_Tray( _MD_IMPRESSION_SOURCE . impression_tooltip( _MD_IMPRESSION_SOURCEDSC ), '' );
		if ( icms::$module -> config['uselyte'] == 0 ) $source_tray -> setDescription( _MD_IMPRESSION_SOURCEDSC );
		$source_tray -> addElement( $source_text, false) ;
		$sform -> addElement( $source_tray );

// Article source url
		$sourceurl_text = new icms_form_elements_Text( '', 'sourceurl', 70, 255, $sourceurl );
		$sourceurl_tray = new icms_form_elements_Tray( _MD_IMPRESSION_SOURCEURL . impression_tooltip( _MD_IMPRESSION_SOURCEURLDSC ), '' );
		if ( icms::$module -> config['uselyte'] == 0 ) $sourceurl_tray -> setDescription( _MD_IMPRESSION_SOURCEURLDSC );
		$sourceurl_tray -> addElement( $sourceurl_text, false) ;
		$sourceurl_tray -> addElement( new icms_form_elements_Label( "&nbsp;<img src='images/icon/world.png' onClick=\"window.open(storyform.sourceurl.value,'','');return(false);\" alt='" . _MD_IMPRESSION_CHECKURL . "' title='" . _MD_IMPRESSION_CHECKURL . "' style='cursor:pointer;' />" ) );
		$sform -> addElement( $sourceurl_tray );

// Meta meta_keywords form
		$keywords = new icms_form_elements_Textarea( _MD_IMPRESSION_KEYWORDS . impression_tooltip( _MD_IMPRESSION_KEYWORDS_NOTE ), 'meta_keywords', $meta_keywords, 4, 60 );
		if ( icms::$module -> config['uselyte'] == 0 ) $keywords -> setDescription( _MD_IMPRESSION_KEYWORDS_NOTE );
		$sform -> addElement( $keywords, false );

// Notify form
		$submitter2 = ( is_object( icms::$user ) && !empty( icms::$user ) ) ? icms::$user -> getVar( 'uid' ) : 0;
		if ( $submitter2 > 0 ) {
			$option_tray = new icms_form_elements_Tray( _MD_IMPRESSION_OPTIONS, '<br />' );
				if ( !$approve ) {
					$notify_checkbox = new icms_form_elements_Checkbox( '', 'notifypub' );
					$notify_checkbox -> addOption( 1, _MD_IMPRESSION_NOTIFYAPPROVE );
					$option_tray -> addElement( $notify_checkbox );
				} else {
					$sform -> addElement( new icms_form_elements_Hidden( 'notifypub', 0 ) );
				} 
		}
	
		if ( true == impression_checkgroups( $cid, 'ImpressionAppPerm' ) && $aid > 0 ) {
			$approve_checkbox = new icms_form_elements_Checkbox( '', 'approve', $approve );
			$approve_checkbox -> addOption( 1, _MD_IMPRESSION_APPROVE );
			$option_tray -> addElement( $approve_checkbox );
		} else if ( true == impression_checkgroups( $cid, 'ImpressionAutoApp' ) ) {
			$sform -> addElement( new icms_form_elements_Hidden( 'approve', 1 ) );
		} else {
			$sform -> addElement( new icms_form_elements_Hidden( 'approve', 0 ) );
		}
		$sform -> addElement( $option_tray );

		// Captcha
		if ( icms::$module -> config['captcha'] ) {
			$sform -> addElement( new icms_form_elements_Captcha( _SECURITYIMAGE_GETCODE, 'scode' ), true ); 
		}

		$button_tray = new icms_form_elements_Tray( '', '' );
		$button_tray -> addElement( new icms_form_elements_Button( '', 'submit', _SUBMIT, 'submit' ) );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'aid', $aid ) );
		$sform -> addElement( $button_tray );

		$sform -> display();

		impression_noindexnofollow();
		include ICMS_ROOT_PATH . '/footer.php';
	}
} else {
	redirect_header( 'index.php', 2, _MD_IMPRESSION_NOPERMISSIONTOPOST );
	exit();
}
?>