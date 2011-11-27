<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/category.php
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

$op = '';

if ( isset( $_POST ) ) {
	foreach ( $_POST as $k => $v ) {
		${$k} = $v;
	}
} 
if ( isset( $_GET ) ) {
	foreach ( $_GET as $k => $v ) {
		${$k} = $v;
	}
}

function createcat($cid = 0) {
	include_once '../class/impression_lists.php';

	global $totalcats, $impressionmyts;

	$aid = 0;
	$title = '';
	$imgurl = '';
	$description = '';
	$pid = '';
	$weight = 0;
	$inblocks = 1;
	$heading = _AM_IMPRESSION_CCATEGORY_CREATENEW;
	$totalcats = impression_totalcategory();

	if ( $cid ) {
	$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
		$cat_arr = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
		$title = $impressionmyts -> htmlSpecialCharsStrip( $cat_arr['title'] );
		$imgurl = $impressionmyts -> htmlSpecialCharsStrip( $cat_arr['imgurl'] );
		$description = $impressionmyts -> htmlSpecialCharsStrip( $cat_arr['description'] );
		$weight = $cat_arr['weight'];
		$inblocks = $cat_arr['inblocks'];
		$heading = _AM_IMPRESSION_CCATEGORY_MODIFY;

		$gperm_handler = icms::handler('icms_member_groupperm');
		$groups = $gperm_handler -> getGroupIds( 'ImpressionCatPerm', $cid, icms::$module -> getVar( 'mid' ) );
		$groups = $groups;
	} else {
	$groups = true;
	}

	$sform = new icms_form_Theme( $heading, 'op', '' );
	$sform -> setExtra( 'enctype="multipart/form-data"' );

	$sform -> addElement( new icms_form_elements_Text( _AM_IMPRESSION_FCATEGORY_TITLE, 'title', icms::$module -> config['txt_width'], 128, $title ), true );
	$sform -> addElement( new icms_form_elements_Text( _AM_IMPRESSION_FCATEGORY_WEIGHT, 'weight', 10, 80, $weight ), false );

	if ( $totalcats > 0 && $cid ) {
		$mytreechose = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
		ob_start();
			$mytreechose -> makeMySelBox( 'title', 'title', $cat_arr['pid'], 1, 'pid' );
			$sform -> addElement( new icms_form_elements_Label( _AM_IMPRESSION_FCATEGORY_SUBCATEGORY, ob_get_contents() ) );
		ob_end_clean();
	} else {
		$mytreechose = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
		ob_start();
			$mytreechose -> makeMySelBox( 'title', 'title', $cid, 1, 'pid' );
			$sform -> addElement(new icms_form_elements_Label( _AM_IMPRESSION_FCATEGORY_SUBCATEGORY, ob_get_contents() ) );
		ob_end_clean();
	}

	$graph_array = & impressionLists :: getListTypeAsArray( ICMS_ROOT_PATH . '/' . icms::$module -> config['catimage'], $type = 'images' );
	$indeximage_select = new icms_form_elements_Select( '', 'imgurl', $imgurl );
	$indeximage_select -> addOptionArray( $graph_array );
	$indeximage_select -> setExtra( "onchange='showImgSelected(\"image\", \"imgurl\", \"" . icms::$module -> config['catimage'] . "\", \"\", \"" . ICMS_URL . "\")'" );
	$indeximage_tray = new icms_form_elements_Tray( _AM_IMPRESSION_FCATEGORY_CIMAGE, '&nbsp;' );
	$indeximage_tray -> addElement( $indeximage_select );
	if ( !empty( $imgurl ) ) {
		$indeximage_tray -> addElement( new icms_form_elements_Label( '', '<br /><br /><img src="' . ICMS_URL . '/' . icms::$module -> config['catimage'] . '/' . $imgurl . '" name="image" id="image" alt="" />' ) );
	} else {
		$indeximage_tray -> addElement( new icms_form_elements_Label( '', '<br /><br /><img src="' . ICMS_URL . '/uploads/blank.gif" name="image" id="image" alt="" />' ) );
	}
	$sform -> addElement( $indeximage_tray );

	$editor = impression_getWysiwygForm( _AM_IMPRESSION_FCATEGORY_DESCRIPTION, 'description', $description, 250, 10 );
	$sform -> addElement( $editor, false );
    
// Display in blocks
	$inblocks_yn = new icms_form_elements_Radioyn( _AM_IMPRESSION_CAT_INBLOCKS, 'inblocks', $inblocks, ' ' . _YES . '', ' ' . _NO . '' );
	$inblocks_yn -> setDescription( '<small>' . _AM_IMPRESSION_CAT_INBLOCKS_DSC . '</small>' );
	$sform -> addElement( $inblocks_yn );

	$sform -> addElement(new icms_form_elements_Hidden( 'cid', $cid ) );

	$button_tray = new icms_form_elements_Tray( '', '' );
	$hidden = new icms_form_elements_Hidden( 'op', 'save' );
	$button_tray -> addElement( $hidden );

	if ( !$cid ) {
		$butt_create = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BSAVE, 'submit' );
		$butt_create -> setExtra( 'onclick="this.form.elements.op.value=\'addCat\'"' );
		$button_tray -> addElement( $butt_create );

		$butt_clear = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BRESET, 'reset' );
		$button_tray -> addElement( $butt_clear );

		$butt_cancel = new icms_form_elements_Button( '', '', _CANCEL, 'button' );
		$butt_cancel -> setExtra( 'onclick="history.go(-1)"' );
		$button_tray -> addElement( $butt_cancel );
	} else {
		$butt_create = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BMODIFY, 'submit' );
		$butt_create -> setExtra( 'onclick="this.form.elements.op.value=\'addCat\'"' );
		$button_tray -> addElement( $butt_create );

		$butt_delete = new icms_form_elements_Button( '', '', _DELETE, 'submit' );
		$butt_delete -> setExtra( 'onclick="this.form.elements.op.value=\'del\'"' );
		$button_tray -> addElement( $butt_delete );

		$butt_cancel = new icms_form_elements_Button( '', '', _CANCEL, 'button' );
		$butt_cancel -> setExtra( 'onclick="history.go(-1)"' );
		$button_tray -> addElement( $butt_cancel );
	}
	$sform -> addElement( $button_tray );
	$sform -> display();

	$result2 = icms::$xoopsDB -> query( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) );
	list( $numrows ) = icms::$xoopsDB -> fetchRow( $result2 );
}

if ( !isset( $_POST['op'] ) ) {
	$op = isset( $_GET['op'] ) ? $_GET['op'] : 'main';
} else {
	$op = isset( $_POST['op'] ) ? $_POST['op'] : 'main';
}

switch ( $op ) {
	case 'move':
		if ( !isset( $_POST['ok'] ) ) {
			$cid = ( isset( $_POST['cid'] ) ) ? $_POST['cid'] : $_GET['cid'];

			icms_cp_header();
			impression_adminmenu( 3, _AM_IMPRESSION_MCATEGORY );

			$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
			$sform = new icms_form_Theme( _AM_IMPRESSION_CCATEGORY_MOVE, 'move', xoops_getenv( 'PHP_SELF' ) );
			ob_start();
				$mytree -> makeMySelBox( 'title', 'title', 0 , 0, 'target' );
				$sform -> addElement( new icms_form_elements_Label( _AM_IMPRESSION_BMODIFY, ob_get_contents() ) );
			ob_end_clean();
			$create_tray = new icms_form_elements_Tray( '', '' );
			$create_tray -> addElement( new icms_form_elements_Hidden( 'source', $cid ) );
			$create_tray -> addElement( new icms_form_elements_Hidden( 'ok', 1 ) );
			$create_tray -> addElement( new icms_form_elements_Hidden( 'op', 'move' ) );
			$butt_save = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BMOVE, 'submit' );
			$butt_save -> setExtra( 'onclick="this.form.elements.op.value=\'move\'"' );
			$create_tray -> addElement( $butt_save );
			$butt_cancel = new icms_form_elements_Button( '', '', _CANCEL, 'submit' );
			$butt_cancel -> setExtra( 'onclick="this.form.elements.op.value=\'cancel\'"' );
			$create_tray -> addElement( $butt_cancel );
			$sform -> addElement( $create_tray );
			$sform -> display();
			icms_cp_footer();
		} else {
			$source = $_POST['source'];
			$target = $_POST['target'];
			if ( $target == $source ) {
				redirect_header( 'category.php?op=move&ok=0&cid=$source', 5, _AM_IMPRESSION_CCATEGORY_MODIFY_FAILED );
			}
			if ( !$target ) {
				redirect_header( 'category.php?op=move&ok=0&cid=$source', 5, _AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT );
			}
			$sql = 'UPDATE ' . icms::$xoopsDB -> prefix('impression_articles') . ' SET cid=' . $target . ' WHERE cid=' . $source;
			$result = icms::$xoopsDB -> queryF($sql);
			$error = _AM_IMPRESSION_DBERROR . ': <br /><br />' . $sql;
			if ( !$result ) {
				trigger_error( $error, E_USER_ERROR );
			}
			redirect_header( 'category.php?op=default', 1, _AM_IMPRESSION_CCATEGORY_MODIFY_MOVED );
			exit();
		}
		break;

	case 'addCat':

		$groups = isset( $_REQUEST['groups'] ) ? $_REQUEST['groups'] : array();
		$cid = ( isset( $_REQUEST['cid'] ) ) ? $_REQUEST['cid'] : 0;
		$pid = ( isset( $_REQUEST['pid'] ) ) ? $_REQUEST['pid'] : 0;
		$weight = ( isset( $_REQUEST['weight'] ) && $_REQUEST['weight'] > 0 ) ? $_REQUEST['weight'] : 0;
		$inblocks = ( isset( $_REQUEST['inblocks'] ) ) ? $_REQUEST['inblocks'] : 1;
		$title = addslashes( $_REQUEST['title'] );
		$descriptionb = addslashes( $_REQUEST['description'] );
		$imgurl = ( $_REQUEST['imgurl'] && $_REQUEST['imgurl'] != 'blank.gif' ) ? addslashes( $_REQUEST['imgurl'] ) : '';  

		if ( !$cid ) {
			$cid = 0;
			$sql = "INSERT INTO " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " (cid, pid, title, imgurl, description, weight, inblocks ) VALUES ('', $pid, '$title', '$imgurl', '$descriptionb', '$weight', '$inblocks' )";
			if ( $cid == 0 ) {
				$newcid = icms::$xoopsDB -> getInsertId();
			}

			// Notify of new category
			$tags = array();
			$tags['CATEGORY_NAME'] = $title;
			$tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/viewcat.php?cid=' . $newcid;
			$notification_handler = icms::handler( 'icms_data_notification' );
			$notification_handler -> triggerEvent( 'global', 0, 'new_category', $tags );
			$database_mess = _AM_IMPRESSION_CCATEGORY_CREATED;
		} else {
			if ( $cid == $pid ) {
				redirect_header( 'category.php', 1, _AM_IMPRESSION_ERROR_CATISCAT );
				exit();
			}
			$sql = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " SET title ='$title', imgurl='$imgurl', pid =$pid, description='$descriptionb', weight='$weight', inblocks='$inblocks' WHERE cid=" . $cid;
			$database_mess = _AM_IMPRESSION_CCATEGORY_MODIFIED;
		}
		$result = icms::$xoopsDB -> queryF( $sql );
		if ( !$result ) { echo "error: $sql"; }
		redirect_header( 'category.php', 1, $database_mess );
		break;

	case 'del':
		$cid = ( isset( $_POST['cid'] ) && is_numeric( $_POST['cid'] ) ) ? intval( $_POST['cid'] ) : intval( $_GET['cid'] );
		$ok = ( isset( $_POST['ok'] ) && $_POST['ok'] == 1 ) ? intval( $_POST['ok'] ) : 0;
		$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

		if ( $ok == 1 ) {
			// get all subcategories under the specified category
			$arr = $mytree -> getAllChildId( $cid );
			$lcount = count( $arr );

			for ( $i = 0; $i < $lcount; $i++ ) {
				// get all articles in each subcategory
				$result = icms::$xoopsDB -> query( 'SELECT aid FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE cid=' . $arr[$i] ); 
				// now for each articleload, delete the text data and vote ata associated with the linkload
				while ( list( $lid ) = icms::$xoopsDB -> fetchRow( $result ) ) {
					$sql = sprintf( 'DELETE FROM %s WHERE aid=%u', icms::$xoopsDB -> prefix( 'impression_articles' ), $aid );
					icms::$xoopsDB -> query( $sql ); 

					// delete comments
					xoops_comment_delete( icms::$module -> getVar( 'mid' ), $aid );
				}
				// all articles for each subcategory are deleted, now delete the subcategory data
				$sql = sprintf( 'DELETE FROM %s WHERE cid = %u', icms::$xoopsDB -> prefix( 'impression_cat' ), $arr[$i] );
				icms::$xoopsDB -> query( $sql );
				// delete altcat entries
				$sql = sprintf( 'DELETE FROM %s WHERE cid = %u', icms::$xoopsDB -> prefix( 'impression_altcat' ), $arr[$i] );
				icms::$xoopsDB -> query( $sql );
			}
			// all subcategory and associated data are deleted, now delete category data and its associated data
			$result = icms::$xoopsDB -> query( 'SELECT aid FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE cid=' . $cid );
			while ( list( $aid ) = icms::$xoopsDB -> fetchRow( $result ) ) {
				$sql = sprintf( 'DELETE FROM %s WHERE aid=%u', icms::$xoopsDB -> prefix( 'impression_articles' ), $aid );
				icms::$xoopsDB -> query( $sql );
			}
			// delete altcat entries
			$sql = sprintf( 'DELETE FROM %s WHERE cid = %u', icms::$xoopsDB -> prefix( 'impression_altcat' ), $cid );
			icms::$xoopsDB -> query( $sql );
			// delete category
			$sql = sprintf( 'DELETE FROM %s WHERE cid = %u', icms::$xoopsDB -> prefix( 'impression_cat' ), $cid );
			$error = _AM_IMPRESSION_DBERROR . ': <br /><br />' . $sql;
			
			// delete group permissions
			xoops_groupperm_deletebymoditem( icms::$module -> getVar( 'mid' ), 'ImpressionCatPerm', $cid );
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				trigger_error( $error, E_USER_ERROR );
			}
			xoops_groupperm_deletebymoditem( icms::$module -> getVar( 'mid' ), 'ImpressionSubPerm', $cid );
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				trigger_error( $error, E_USER_ERROR );
			}
			xoops_groupperm_deletebymoditem( icms::$module -> getVar( 'mid' ), 'ImpressionAppPerm', $cid );
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				trigger_error( $error, E_USER_ERROR );
			}
			xoops_groupperm_deletebymoditem( icms::$module -> getVar( 'mid' ), 'ImpressionAutoApp', $cid );
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				trigger_error( $error, E_USER_ERROR );
			}
			xoops_groupperm_deletebymoditem( icms::$module -> getVar( 'mid' ), 'ImpressionRatePerms', $cid );
			if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
				trigger_error( $error, E_USER_ERROR );
			}
			
			redirect_header( 'category.php', 1, _AM_IMPRESSION_CCATEGORY_DELETED );
			exit();
		} else {
			icms_cp_header();
			icms_core_Message::confirm( array( 'op' => 'del', 'cid' => $cid, 'ok' => 1), 'category.php', _AM_IMPRESSION_CCATEGORY_AREUSURE );
			icms_cp_footer();
		}
		break;

	case 'modCat':
		$cid = ( isset( $_POST['cid'] ) ) ? $_POST['cid'] : 0;
		icms_cp_header();
			impression_adminmenu( 3,_AM_IMPRESSION_MCATEGORY );
			createcat( $cid );
		icms_cp_footer();
		break;

	case 'main':
		default:
		icms_cp_header();
		impression_adminmenu( 3, _AM_IMPRESSION_MCATEGORY );

		$mytree = new icms_view_Tree( icms::$xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
		$sform = new icms_form_Theme( _AM_IMPRESSION_CCATEGORY_MODIFY, 'category', xoops_getenv( 'PHP_SELF' ) );
		$totalcats = impression_totalcategory();

		if ( $totalcats > 0 ) {
			ob_start();
				$mytree -> makeMySelBox( 'title', 'title' );
				$sform -> addElement(new icms_form_elements_Label( _AM_IMPRESSION_CCATEGORY_MODIFY_TITLE, ob_get_contents() ) );
			ob_end_clean();
			$dup_tray = new icms_form_elements_Tray( '', '' );
			$dup_tray -> addElement( new icms_form_elements_Hidden( 'op', 'modCat' ) );
			$butt_dup = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BMODIFY, 'submit' );
			$butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'modCat\'"' );
			$dup_tray -> addElement( $butt_dup );
			$butt_move = new icms_form_elements_Button( '', '', _AM_IMPRESSION_BMOVE, 'submit' );
			$butt_move -> setExtra( 'onclick="this.form.elements.op.value=\'move\'"' );
			$dup_tray -> addElement( $butt_move );
			$butt_dupct = new icms_form_elements_Button( '', '', _DELETE, 'submit' );
			$butt_dupct -> setExtra( 'onclick="this.form.elements.op.value=\'del\'"' );
			$dup_tray -> addElement( $butt_dupct );
			$sform -> addElement( $dup_tray );
			$sform -> display();
		}
		echo '&nbsp;';
		createcat(0);
		icms_cp_footer();
		break;
}
?>