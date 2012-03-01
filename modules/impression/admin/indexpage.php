<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/indexpage.php
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
$cid = intval( impression_cleanRequestVars( $_REQUEST, 'cid', 0 ) );

switch ( strtolower( $op ) ) {
	case 'save':
		$indexheading = icms_core_DataFilter::addSlashes( trim($_POST['indexheading']) );
		$indexheader = icms_core_DataFilter::addSlashes( trim($_POST['indexheader']) );
		$indexfooter = icms_core_DataFilter::addSlashes( trim($_POST['indexfooter']) );
		$indeximage = icms_core_DataFilter::addSlashes( $_POST['indeximage'] );
		$indexheaderalign = icms_core_DataFilter::addSlashes( $_POST['indexheaderalign'] );
		$indexfooteralign = icms_core_DataFilter::addSlashes( $_POST['indexfooteralign'] );
		$lastarticlestotal = icms_core_DataFilter::addSlashes( $_POST['lastarticlestotal'] );
		$sql = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_indexpage' ) . " SET indexheading='$indexheading', indexheader='$indexheader', indexfooter='$indexfooter', indeximage='$indeximage', indexheaderalign='$indexheaderalign ', indexfooteralign='$indexfooteralign', lastarticlestotal='$lastarticlestotal'";
		if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}
		redirect_header( 'index.php', 1, _AM_IMPRESSION_IPAGE_UPDATED );
		break;

	default:
		$sql = 'SELECT indeximage, indexheading, indexheader, indexfooter, indexheaderalign, indexfooteralign, lastarticlestotal FROM ' . icms::$xoopsDB -> prefix( 'impression_indexpage' );
		if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}
		list( $indeximage, $indexheading, $indexheader, $indexfooter, $indexheaderalign, $indexfooteralign, $lastarticlestotal ) = icms::$xoopsDB -> fetchrow( $result );

		icms_cp_header();
		impression_adminmenu( 4, _AM_IMPRESSION_INDEXPAGE );

		echo '<script type="text/javascript" language="javascript" src="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.js"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.css" />';

		echo '<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
				<div style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_IPAGE_INFORMATION . '</div>
				<div style="padding: 8px;"><img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/indexpage.png" alt="" style="float: left; padding-right: 10px;" />' . _AM_IMPRESSION_MINDEX_PAGEINFOTXT . '</div>
			  </div><br />';
		$sform = new icms_form_Theme( _AM_IMPRESSION_IPAGE_MODIFY, 'op', '' );

		$sform -> addElement( new icms_form_elements_Text( _AM_IMPRESSION_IPAGE_CTITLE, 'indexheading', icms::$module -> config['txt_width'], 128, $indexheading ), false );

		$graph_array = &impressionLists :: getListTypeAsArray( ICMS_ROOT_PATH . '/' . icms::$module -> config['mainimagedir'], $type = 'images' );
		$indeximage_select = new icms_form_elements_Select( '', 'indeximage', $indeximage );
		$indeximage_select -> addOptionArray( $graph_array );
		$indeximage_select -> setExtra( "onchange='showImgSelected(\"image\", \"indeximage\", \"" . icms::$module -> config['mainimagedir'] . "\", \"\", \"" . ICMS_URL . "\")'" );
		$indeximage_tray = new icms_form_elements_Tray( _AM_IMPRESSION_IPAGE_CIMAGE, '&nbsp;' );
		$indeximage_tray -> addElement( $indeximage_select );
		if ( !empty( $indeximage ) ) {
			$indeximage_tray -> addElement( new icms_form_elements_Label( '', '<br /><br /><img src="' . ICMS_URL . '/' . icms::$module -> config['mainimagedir'] . '/' . $indeximage . '" name="image" id="image" alt="" />' ) );
		} else {
			$indeximage_tray -> addElement( new icms_form_elements_Label( '', "<br /><br /><img src='" . ICMS_URL . "/uploads/blank.gif' name='image' id='image' alt='' />" ) );
		}
		$sform -> addElement( $indeximage_tray );

		$editor = impression_getWysiwygForm( _AM_IMPRESSION_IPAGE_CHEADING, 'indexheader', $indexheader, 200, 10 );
		$sform -> addElement( $editor, false );

		$headeralign_select = new icms_form_elements_Select( _AM_IMPRESSION_IPAGE_CHEADINGA, 'indexheaderalign', $indexheaderalign );
		$headeralign_select -> addOptionArray( array( 'left' => _AM_IMPRESSION_IPAGE_CLEFT, 'right' => _AM_IMPRESSION_IPAGE_CRIGHT, 'center' => _AM_IMPRESSION_IPAGE_CCENTER ) );
		$sform -> addElement( $headeralign_select );

		$sform -> addElement( new icms_form_elements_Textarea( _AM_IMPRESSION_IPAGE_CFOOTER, 'indexfooter', $indexfooter, 5, 60 ) );
		$footeralign_select = new icms_form_elements_Select( _AM_IMPRESSION_IPAGE_CFOOTERA, 'indexfooteralign', $indexfooteralign );
		$footeralign_select -> addOptionArray( array( 'left' => _AM_IMPRESSION_IPAGE_CLEFT, 'right' => _AM_IMPRESSION_IPAGE_CRIGHT, 'center' => _AM_IMPRESSION_IPAGE_CCENTER ) );
		$sform -> addElement( $footeralign_select );

		$lastarticlestotalform = new icms_form_elements_Text( _AM_IMPRESSION_IPAGE_LATESTTOTAL . impression_tooltip( _AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC, 'help' ), 'lastarticlestotal', 2, 2, $lastarticlestotal );
		$sform -> addElement( $lastarticlestotalform, false );

		$button_tray = new icms_form_elements_Tray( '', '' );
		$hidden = new icms_form_elements_Hidden( 'op', 'save' );
		$button_tray -> addElement( $hidden );
		$button_tray -> addElement( new icms_form_elements_Button( '', 'post', _AM_IMPRESSION_BSAVE, 'submit' ) );
		$sform -> addElement( $button_tray );
		$sform -> display();
		break;
}
icms_cp_footer();
?>