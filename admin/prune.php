<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* File: /admin/prune.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since			1.00
* @author		McDonald
* @version		$Id$
*/

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );

switch ( strtolower( $op ) ) {
	case 'save':
		$published =  strtotime( $_POST['published']['date'] );
		
		// Delete alternative category entries and comments
		$sql = 'SELECT aid FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published<=' . $published;
		$prune_array = $xoopsDB -> query( $sql );
        $prune_array_count = icms::$xoopsDB -> getRowsNum( icms::$xoopsDB -> query( $sql ) );
		if ( $prune_array_count > 0 ) {
                while ( $prune = icms::$xoopsDB -> fetchArray( $prune_array ) ) {
					// Delete alternative category entries
                    $sql2 = 'DELETE FROM ' . icms::$xoopsDB -> prefix( 'impression_altcat' ) . ' WHERE aid=' . $prune['aid'];
					if ( !$result = icms::$xoopsDB -> query( $sql2 ) ) {
						icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
						return false;
					}
					// Delete comments
					xoops_comment_delete( icms::$module -> getVar( 'mid' ), $prune['aid'] );
                } 
        }
		
		// Delete articles
		$sql3 = 'DELETE FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published<=' . $published;
		if ( !$result = icms::$xoopsDB -> query( $sql3 ) ) {
			icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
			return false;
		}
			
		redirect_header( 'index.php', 1, sprintf( _AM_IMPRESSION_PRUNEDELETED, '' ) );
		exit();
		
	case 'default':
	default:
		icms_cp_header();
		impression_adminmenu( '', _AM_IMPRESSION_PRUNE );
		
		echo '<fieldset style="border: #e8e8e8 1px solid;">
			  <legend style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_PRUNEINFO . '</legend>
			  <div style="padding: 8px;">
			  <img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/warning.png" alt="" style="float: left; padding-right: 10px;" />
			  <div style="padding-left: 45px;">' . _AM_IMPRESSION_PRUNEWARN . '</div>
			  </div>
			  </fieldset>';
		  
		$sform = new icms_form_Theme( _AM_IMPRESSION_PRUNEFORM, 'storyform', '' );
		$sform -> setExtra( 'enctype="multipart/form-data"' );

		$datesub_datetime = new icms_form_elements_Date( _AM_IMPRESSION_PRUNEDATE, 'published', 15, time() );
		$datesub_datetime -> setDescription( _AM_IMPRESSION_PRUNEDATEDSC );
		$sform -> addElement( $datesub_datetime );
	
		$button_tray = new icms_form_elements_Tray( '', '' );
		$button_tray -> addElement( new icms_form_elements_Hidden( 'op', 'save' ) );
		$button_tray -> addElement( new icms_form_elements_Button( '', '', _AM_IMPRESSION_PRUNE, 'submit' ) );
		$sform -> addElement( $button_tray );
		$sform -> display();

		icms_cp_footer();
		break;
}
?>