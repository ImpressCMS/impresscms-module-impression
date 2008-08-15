<?php
/**
 * $Id: indexpage.php
 * Module: Impression
 */

include 'admin_header.php';

global $xoopsModuleConfig;

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );

switch ( strtolower( $op ) ) {
    case "save":
        $indexheading = $impressionmyts -> addslashes( xoops_trim($_REQUEST['indexheading']) );
        $indexheader = $impressionmyts -> addslashes( xoops_trim($_REQUEST['indexheader']) );
        $indexfooter = $impressionmyts -> addslashes( xoops_trim($_REQUEST['indexfooter']) );
        $indeximage = $impressionmyts -> addslashes( $_REQUEST['indeximage'] );
//        $nohtml = isset( $_REQUEST['nohtml'] ) ? 1 : 0;
//        $nosmiley = isset( $_REQUEST['nosmiley'] ) ? 1 : 0;
//        $noxcodes = isset( $_REQUEST['noxcodes'] ) ? 1 : 0;
//        $noimages = isset( $_REQUEST['noimages'] ) ? 1 : 0;
//        $nobreak = isset( $_REQUEST['nobreak'] ) ? 1 : 0;
        $indexheaderalign = $impressionmyts -> addslashes( $_REQUEST['indexheaderalign'] );
        $indexfooteralign = $impressionmyts -> addslashes( $_REQUEST['indexfooteralign'] );
		$lastarticlesyn = $_REQUEST['lastarticlesyn'];
        $lastarticlestotal = $impressionmyts -> addslashes( $_REQUEST['lastarticlestotal'] );
        $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_indexpage' ) . " SET indexheading='$indexheading', indexheader='$indexheader', indexfooter='$indexfooter', indeximage='$indeximage', indexheaderalign='$indexheaderalign ', indexfooteralign='$indexfooteralign', lastarticlesyn='$lastarticlesyn', lastarticlestotal='$lastarticlestotal'";
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        redirect_header( "index.php", 1, _AM_IMPRESSION_IPAGE_UPDATED );
        break;

    default:
        $sql = "SELECT indeximage, indexheading, indexheader, indexfooter, indexheaderalign, indexfooteralign, lastarticlesyn, lastarticlestotal FROM " . $xoopsDB -> prefix( 'impression_indexpage' );
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        list( $indeximage, $indexheading, $indexheader, $indexfooter, $indexheaderalign, $indexfooteralign, $lastarticlesyn, $lastarticlestotal ) = $xoopsDB -> fetchrow( $result );

        xoops_cp_header();
        impression_adminmenu( "<h4>" . _AM_IMPRESSION_INDEXPAGE . "</h4>" );

        echo "   <div style='padding:5px; background-color: #EEEEEE; border: 1px solid #D9D9D9;'>
		 <span style='font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_IPAGE_INFORMATION . "</span>\n
		 <span style='padding: 8px;'>" . _AM_IMPRESSION_MINDEX_PAGEINFOTXT . "</span>\n
		 </div><br />\n
		";
        $sform = new XoopsThemeForm( _AM_IMPRESSION_IPAGE_MODIFY, "op", xoops_getenv( 'PHP_SELF' ) );
        $sform -> addElement( new XoopsFormText( _AM_IMPRESSION_IPAGE_CTITLE, 'indexheading', 60, 60, $indexheading ), false );
        $graph_array = &impressionLists :: getListTypeAsArray( ICMS_ROOT_PATH . "/" . $xoopsModuleConfig['mainimagedir'], $type = "images" );
        $indeximage_select = new XoopsFormSelect( '', 'indeximage', $indeximage );
        $indeximage_select -> addOptionArray( $graph_array );
        $indeximage_select -> setExtra( "onchange='showImgSelected(\"image\", \"indeximage\", \"" . $xoopsModuleConfig['mainimagedir'] . "\", \"\", \"" . ICMS_URL . "\")'" );
        $indeximage_tray = new XoopsFormElementTray( _AM_IMPRESSION_IPAGE_CIMAGE, '&nbsp;' );
        $indeximage_tray -> addElement( $indeximage_select );
        if ( !empty( $indeximage ) ) {
            $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . ICMS_URL . "/" . $xoopsModuleConfig['mainimagedir'] . "/" . $indeximage . "' name='image' id='image' alt='' />" ) );
        } else {
            $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . ICMS_URL . "/uploads/blank.gif' name='image' id='image' alt='' />" ) );
        } 
        $sform -> addElement( $indeximage_tray );

        $editor = impression_getWysiwygForm( _AM_IMPRESSION_IPAGE_CHEADING, 'indexheader', $indexheader, '100%', '400px' );
        $sform -> addElement($editor, false);

        $headeralign_select = new XoopsFormSelect( _AM_IMPRESSION_IPAGE_CHEADINGA, "indexheaderalign", $indexheaderalign );
        $headeralign_select -> addOptionArray( array( "left" => _AM_IMPRESSION_IPAGE_CLEFT, "right" => _AM_IMPRESSION_IPAGE_CRIGHT, "center" => _AM_IMPRESSION_IPAGE_CCENTER ) );
        $sform -> addElement( $headeralign_select );

        $sform -> addElement( new XoopsFormTextArea( _AM_IMPRESSION_IPAGE_CFOOTER, 'indexfooter', $indexfooter, 10, 60 ) );
        $footeralign_select = new XoopsFormSelect( _AM_IMPRESSION_IPAGE_CFOOTERA, "indexfooteralign", $indexfooteralign );
        $footeralign_select -> addOptionArray( array( "left" => _AM_IMPRESSION_IPAGE_CLEFT, "right" => _AM_IMPRESSION_IPAGE_CRIGHT, "center" => _AM_IMPRESSION_IPAGE_CCENTER ) );
        $sform -> addElement( $footeralign_select );

//        $options_tray = new XoopsFormElementTray( _AM_IMPRESSION_TEXTOPTIONS, '<br />' );
		//html option
//        $html_checkbox = new XoopsFormCheckBox( '', 'nohtml', $nohtml );
//        $html_checkbox -> addOption( 1, _AM_IMPRESSION_DISABLEHTML );
//        $options_tray -> addElement( $html_checkbox );
		//smiley option
//        $smiley_checkbox = new XoopsFormCheckBox( '', 'nosmiley', $nosmiley );
//        $smiley_checkbox -> addOption( 1, _AM_IMPRESSION_DISABLESMILEY );
//        $options_tray -> addElement( $smiley_checkbox );
		//xcodes option
//        $xcodes_checkbox = new XoopsFormCheckBox( '', 'noxcodes', $noxcodes );
//        $xcodes_checkbox -> addOption( 1, _AM_IMPRESSION_DISABLEXCODE );
//        $options_tray -> addElement( $xcodes_checkbox );
		//noimages option
//        $noimages_checkbox = new XoopsFormCheckBox( '', 'noimages', $noimages );
//        $noimages_checkbox -> addOption( 1, _AM_IMPRESSION_DISABLEIMAGES );
//        $options_tray -> addElement( $noimages_checkbox );
		//breaks option
//        $breaks_checkbox = new XoopsFormCheckBox( '', 'nobreak', $nobreak );
//        $breaks_checkbox -> addOption( 1, _AM_IMPRESSION_DISABLEBREAK );
//        $options_tray -> addElement( $breaks_checkbox );
//        $sform -> addElement( $options_tray );

		$sform -> addElement(  new XoopsFormRadioYN( _AM_IMPRESSION_IPAGE_SHOWLATEST, 'lastarticlesyn', $lastarticlesyn, ' ' . _YES . '', ' ' . _NO . '' ) );

        $lastarticlestotalform = new XoopsFormText( _AM_IMPRESSION_IPAGE_LATESTTOTAL, 'lastarticlestotal', 2, 2, $lastarticlestotal );
		$lastarticlestotalform -> setDescription( "<small>" . _AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC . "</small>");
        $sform -> addElement( $lastarticlestotalform, false );

        $button_tray = new XoopsFormElementTray( '', '' );
        $hidden = new XoopsFormHidden( 'op', 'save' );
        $button_tray -> addElement( $hidden );
        $button_tray -> addElement( new XoopsFormButton( '', 'post', _AM_IMPRESSION_BSAVE, 'submit' ) );
        $sform -> addElement( $button_tray );
        $sform -> display();
        break;
} 
xoops_cp_footer();

?>
