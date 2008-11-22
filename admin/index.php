<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/index.php
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

include 'admin_header.php';

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );

function edit( $aid = 0, $doclone = 0 ) {
   global $xoopsDB, $xoopsModuleConfig, $xoopsModule, $xoopsUser, $impressionmyts, $mytree;

    $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
    if ( !$result = $xoopsDB -> query( $sql ) ) {
        XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
        return false;
    } 
    $article_array = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
	
	if ( $doclone == 0 ) {
		$aid = $article_array['aid'] ? $article_array['aid'] : 0;
		$title = $article_array['title'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['title'] ) : '';
		$published = $article_array['published'] ? $article_array['published'] : time();
	} else {
		$aid='';
		$title = $article_array['title'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['title'] . '  ' . _AM_IMPRESSION_CLONE ) : '';
		$published = time();
	}

//    $aid = $article_array['aid'] ? $article_array['aid'] : 0;
    $cid = $article_array['cid'] ? $article_array['cid'] : 0;
//    $title = $article_array['title'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['title'] ) : '';
    $publisher = $article_array['publisher'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['publisher'] ) : '';
    $introtextb = $article_array['introtext'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['introtext'] ) : '';
    $descriptionb = $article_array['description'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['description'] ) : '';
//    $published = $article_array['published'] ? $article_array['published'] : time();
    $date = $article_array['date'];
    $status = $article_array['status'] ? $article_array['status'] : 0;
    $ipaddress = $article_array['ipaddress'] ? $article_array['ipaddress'] : 0;
    $meta_keywords = $article_array['meta_keywords'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['meta_keywords'] ) : '';
    $item_tag = $article_array['item_tag'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['item_tag'] ) : '';
	$nobreak = $article_array['nobreak'] ? $article_array['nobreak'] : 0;

    xoops_cp_header();
    impression_adminmenu( 2, _AM_IMPRESSION_MARTICLES );
    if ( $aid ) {
        $text_info = "
			<table width='100%'>
			 <tr>
			  <td width='33%' valign='top'>
			   <div><b>" . _AM_IMPRESSION_ARTICLE_ID . " </b>" . $aid . "</div>
			   <div><b>" . _AM_IMPRESSION_READS . " </b>" . $article_array['hits']. "</div>

			  </td>
			  <td width='33%' valign='top'>
			   <div><b>" . _AM_IMPRESSION_ARTICLE_PUBLISHER . " </b>" . icms_getLinkedUnameFromId( $article_array['submitter'] ) . "</div>
			   <div><b>" . _AM_IMPRESSION_ARTICLE_IP . " </b>" . $ipaddress . "</div>
			  </td>
			  <td width='33%' valign='top'>
			   <div><b>" . _AM_IMPRESSION_MINDEX_SUBMITTED . ": </b>" . formatTimestamp( $article_array['date'], $xoopsModuleConfig['dateformatadmin'] ) . "</div>
			   <div><b>" . _AM_IMPRESSION_DATESUB . ": </b>" . formatTimestamp( $article_array['published'], $xoopsModuleConfig['dateformatadmin'] ) . "</div>
			  </td>
			 </tr>
			</table>";
        echo "
                           <fieldset style='border: #e8e8e8 1px solid;'><legend style='display: inline; font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_INFOMATION . "</legend>\n
			   <div style='padding: 8px;'>$text_info</div>\n
			   </fieldset>\n

			<br />\n";
    } 
    
	if ( $doclone == 0 ) {
		$caption = ( $aid ) ? _AM_IMPRESSION_ARTICLE_MODIFYFILE : _AM_IMPRESSION_ARTICLE_CREATENEWFILE;
	} else {
		$caption = _AM_IMPRESSION_CLONEARTICLE;
	}
    $sform = new XoopsThemeForm( $caption, "storyform", xoops_getenv( 'PHP_SELF' ) );
    $sform -> setExtra( 'enctype="multipart / form - data"' );

    $sform -> addElement( new XoopsFormText( _AM_IMPRESSION_ARTICLE_TITLE, 'title', 70, 255, $title ), true );

    if ($publisher) {
      $sform -> addElement( new XoopsFormText( _AM_IMPRESSION_ARTICLE_PUBLISHER, 'publisher', 70, 255, $publisher ) );
    } else {
      $publisher = $xoopsUser -> uname();
      $sform -> addElement( new XoopsFormHidden( 'publisher', $publisher ) );
    }
    ob_start();
    $mytree -> makeMySelBox( 'title', 'title', $cid, 0 );
    $sform -> addElement( new XoopsFormLabel( _AM_IMPRESSION_ARTICLE_CATEGORY, ob_get_contents() ) );
    ob_end_clean();

// Article introtext form
    $introeditor = impression_getWysiwygForm( _AM_IMPRESSION_ARTICLE_INTROTEXT, 'introtextb', $introtextb, '100%', '250px' );
    $introeditor -> setDescription( '<small>' . _AM_IMPRESSION_ARTICLE_INTROTEXT_DSC . '</small>' );
    $sform -> addElement($introeditor, true);

// Article description form 
    $editor = impression_getWysiwygForm( _AM_IMPRESSION_ARTICLE_DESCRIPTION, 'descriptionb', $descriptionb, '100%', '600px' );
    $editor -> setDescription( '<small>' . _AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC . '</small>' );
    $sform -> addElement($editor, false);
	
// Linebreak option
	$options_tray = new XoopsFormElementTray(_AM_IMPRESSION_TEXTOPTIONS, '<br />');
    $breaks_checkbox = new XoopsFormCheckBox( '', 'nobreak', $nobreak );
    $breaks_checkbox -> addOption( 1, _AM_IMPRESSION_DISABLEBREAK );
    $options_tray -> addElement( $breaks_checkbox );
    $sform -> addElement( $options_tray );

// Meta keywords form
    $keywords = new XoopsFormTextArea( _AM_IMPRESSION_KEYWORDS, 'meta_keywords', $meta_keywords, 7, 60);
    $keywords -> setDescription(  '<small>' . _AM_IMPRESSION_KEYWORDS_NOTE . '</small>' );
    $sform -> addElement( $keywords, false );
    
// Insert tags if Tag-module is installed
    if (impression_tag_module_included()) {
      include_once ICMS_ROOT_PATH . "/modules/tag/include/formtag.php";
      $sform -> addElement( new XoopsFormTag("item_tag", 70, 255, $article_array['item_tag'], 0) );
    } else {
      $sform -> addElement( new XoopsFormHidden( 'item_tag', $article_array['item_tag'] ) );
    }

// Publish date
    $datesub_datetime = new XoopsFormDateTime(_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE, 'published', $size = 15, $published);
    $datesub_datetime -> setDescription(_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC);
    $sform -> addElement( $datesub_datetime );

// Set Status
    if ($status==3) {
      $status_array = array( 0 => _AM_IMPRESSION_PUBLISHED,
                             1 => _AM_IMPRESSION_OFFLINE,
                             2 => _AM_IMPRESSION_REJECTED,
                             3 => _AM_IMPRESSION_SUBMITTED );
    } else {
      $status_array = array( 0 => _AM_IMPRESSION_PUBLISHED,
                             1 => _AM_IMPRESSION_OFFLINE,
                             2 => _AM_IMPRESSION_REJECTED );
    }
    $status_select = new XoopsFormSelect( _AM_IMPRESSION_ARTICLE_FILESSTATUS, 'status', $status );
    $status_select -> addOptionArray( $status_array );
    $status_select -> setDescription( _AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC);
    $sform -> addElement( $status_select );

    if ( !$aid ) {
        $button_tray = new XoopsFormElementTray( '', '' );
        $button_tray -> addElement( new XoopsFormHidden( 'op', 'save' ) );
        $button_tray -> addElement( new XoopsFormButton( '', '', _AM_IMPRESSION_BSAVE, 'submit' ) );
        $sform -> addElement( $button_tray );
    } else {
        $button_tray = new XoopsFormElementTray( '', '' );
        $button_tray -> addElement( new XoopsFormHidden( 'aid', $aid ) );
        $hidden = new XoopsFormHidden( 'op', 'save' );
        $button_tray -> addElement( $hidden );

        $butt_dup = new XoopsFormButton( '', '', _AM_IMPRESSION_BMODIFY, 'submit' );
        $butt_dup -> setExtra( 'onclick="this . form . elements . op . value = \'save\'"' );
        $button_tray -> addElement( $butt_dup );
        $butt_dupct = new XoopsFormButton( '', '', _AM_IMPRESSION_BDELETE, 'submit' );
        $butt_dupct -> setExtra( 'onclick="this.form.elements.op.value=\'delete\'"' );
        $button_tray -> addElement( $butt_dupct );
        $butt_dupct2 = new XoopsFormButton( '', '', _AM_IMPRESSION_BCANCEL, 'submit' );
        $butt_dupct2 -> setExtra( 'onclick="this.form.elements.op.value=\'articlesConfigMenu\'"' );
        $button_tray -> addElement( $butt_dupct2 );
        $sform -> addElement( $button_tray );
    } 
    $sform -> display();
    unset( $hidden ); 
    xoops_cp_footer();
} 

switch ( strtolower( $op ) ) {
    case 'edit':
        edit( intval( $aid ), 0 );
        break;
		
	case 'clone':
		edit( intval( $aid ), 1 );
		break;

    case 'save':
        $groups = isset( $_POST['groups'] ) ? $_POST['groups'] : array();
        $aid = ( !empty( $_POST['aid'] ) ) ? $_POST['aid'] : 0;
        $cid = ( !empty( $_POST['cid'] ) ) ? $_POST['cid'] : 0;
        $status = $_POST['status'];
        $title = $impressionmyts -> addslashes( trim( $_POST['title'] ) );
		$nobreak = ( !empty( $_POST['nobreak'] ) ) ? $_POST['nobreak'] : 0;

        // Get data from form
        $introtextb = $impressionmyts -> addslashes( trim( $_POST['introtextb'] ) );
        $descriptionb = $impressionmyts -> addslashes( trim( $_POST['descriptionb'] ) );
        $meta_keywords = $impressionmyts -> addslashes( trim( $_POST['meta_keywords'] ) );
        $item_tag = $impressionmyts -> addslashes( trim( $_POST['item_tag'] ) );
        $published =  strtotime($_POST['published']['date'] ) + $_POST['published']['time'];
        $submitter = $xoopsUser -> uid();
        $publisher = $xoopsUser -> uname();
//        $approved = ( isset( $_POST['approved'] ) && $_POST['approved'] == 1 ) ? 1 : 0;

        // Update or insert linkload data into database
        if ( !$aid ) {
            $date = time();
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $sql = "INSERT INTO " . $xoopsDB -> prefix( 'impression_articles' ) . " (aid, cid, title, submitter, publisher, status, date, published, introtext, description, ipaddress, meta_keywords, item_tag, nobreak )";
            $sql .= " VALUES 	('', $cid, '$title', '$submitter', '$publisher', '$status', '$date', '$published', '$introtextb', '$descriptionb', '$ipaddress', '$meta_keywords', '$item_tag', '$nobreak')";
        } else {
            $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_articles' ) . " SET cid=$cid, title='$title', publisher='$publisher', status='$status', published='$published', introtext='$introtextb', description='$descriptionb', meta_keywords='$meta_keywords', item_tag='$item_tag', nobreak='$nobreak' WHERE aid=" . $aid;
        }

        if ( !$result = $xoopsDB -> queryF( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        }
        
        $newid = mysql_insert_id();
        
// Add item_tag to Tag-module
        if ( !$aid ) {
          $tagupdate = impression_tagupdate( $newid, $item_tag );
        } else {
          $tagupdate = impression_tagupdate( $aid, $item_tag );
        }

        $message = ( !$aid ) ? _AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD : _AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE ;
        $message = ( $aid && !$_POST['published'] && $approved ) ? _AM_IMPRESSION_ARTICLE_FILEAPPROVED : $message;

        redirect_header( 'index.php', 1, $message );
        break;

    case 'delete':
        if ( impression_cleanRequestVars( $_REQUEST, 'confirm', 0 ) ) {
            $title = impression_cleanRequestVars( $_REQUEST, 'title', 0 );
			
			// delete article
            $sql = 'DELETE FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
            if ( !$result = $xoopsDB -> query( $sql ) ) {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            }
			
			// delete altcat
			$sql = 'DELETE FROM ' . $xoopsDB -> prefix( 'impression_altcat' ) . ' WHERE aid=' . $aid;
            if ( !$result = $xoopsDB -> query( $sql ) ) {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            }	

            // delete comments
            //xoops_comment_delete( $xoopsModule -> getVar( 'mid' ), $aid );
            redirect_header( 'index.php', 1, sprintf( _AM_IMPRESSION_ARTICLE_FILEWASDELETED, $title ) );
            exit();
        } else {
            $sql = 'SELECT aid, title FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid = ' . $aid;
            if ( !$result = $xoopsDB -> query( $sql ) ) {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            } 			
	    list( $aid, $title ) = $xoopsDB -> fetchrow( $result );
            $item_tag = $result['item_tag'];
            xoops_cp_header();
            impression_adminmenu( _AM_IMPRESSION_BINDEX );
            xoops_confirm( array( 'op' => 'delete', 'aid' => $aid, 'confirm' => 1, 'title' => $title ), 'index.php', _AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS . '<br /><br>' . $title, _DELETE );

            // Remove item_tag from Tag-module
            $tagupdate = impression_tagupdate($aid, $item_tag);

            xoops_cp_footer();
        } 
        break;

    case 'main':
    default:
        
        $start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
        $start1 = impression_cleanRequestVars( $_REQUEST, 'start1', 0 );
        $start2 = impression_cleanRequestVars( $_REQUEST, 'start2', 0 );
        $start3 = impression_cleanRequestVars( $_REQUEST, 'start3', 0 );
        $start4 = impression_cleanRequestVars( $_REQUEST, 'start4', 0 );
        $start5 = impression_cleanRequestVars( $_REQUEST, 'start5', 0 );
        $totalcats = impression_totalcategory();

        $result = $xoopsDB -> query( 'SELECT COUNT(*) FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published>0' );
        list( $totalarticles ) = $xoopsDB -> fetchRow( $result );
        $result2 = $xoopsDB -> query( 'SELECT COUNT(*) FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status=3' );
        list( $totalnewarticles ) = $xoopsDB -> fetchRow( $result2 );

        xoops_cp_header();
        impression_adminmenu( 1, _AM_IMPRESSION_BINDEX );
        echo "<fieldset style='border: #e8e8e8 1px solid;'><legend style='display: inline; font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_MINDEX_ARTICLESUMMARY . "</legend>\n
			<div style='padding: 8px;'><small>\n
			<a href='category.php'>" . _AM_IMPRESSION_SCATEGORY . "</a><b>" . $totalcats . "</b> | \n
			<a href='index.php'>" . _AM_IMPRESSION_SFILES . "</a><b>" . $totalarticles . "</b> | \n
			<a href='newarticles.php'>" . _AM_IMPRESSION_SNEWFILESVAL . "</a><b>" . $totalnewarticles . "</b> \n
			</small></div></fieldset><br />\n
	      ";

        if ( $totalarticles > 0 ) {

            $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 ORDER BY aid DESC";
            $published_array = $xoopsDB -> query( $sql, $xoopsModuleConfig['admin_perpage'], $start );
            $published_array_count = $xoopsDB -> getRowsNum( $xoopsDB -> query( $sql ) );
            impression_articlelistheader( _AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE );
            impression_articlelistpagenavleft( $published_array_count, $start, 'art' );
            if ( $published_array_count > 0 ) {
                while ( $published = $xoopsDB -> fetchArray( $published_array ) ) {
                    impression_articlelistbody( $published );
                } 
            } else {
                impression_articlelistfooter();
            } 
            impression_articlelistpagenav( $published_array_count, $start, 'art' );
        }
        xoops_cp_footer();
        break;
} 

?>