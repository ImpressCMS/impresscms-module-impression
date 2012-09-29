<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Link 1.06
*
* File: admin/feed.php
*
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );

function rss_edit() {
	global $icmsConfig, $icmsAdminTpl;

	$sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_configs' );
	$feed_array = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );

	$webmaster  = $icmsConfig['adminmail'] . ' (' . icms::$module -> getVar( 'name' ) . ') ';
	$modulename = icms::$module -> getVar( 'name' );
	$modulevers = number_format( icms::$module -> getVar( 'version' ) / 100 , 2, '.', '' );
	$generator  = ICMS_VERSION_NAME . ' ( module: ' . $modulename . ' ' . $modulevers . ' )';
	$copyright  = _AM_IMPRESSION_COPYRIGHT . ' ' . formatTimestamp( time(), 'Y' ) . ' - ' . $icmsConfig['sitename'];

	$rssactive   = $feed_array['rssactive'];
	$rsstitle    = $feed_array['rsstitle'] ? htmlspecialchars( $feed_array['rsstitle'] ) : $icmsConfig['sitename'];
	$rsslink     = $feed_array['rsslink'] ? htmlspecialchars( $feed_array['rsslink'] ) : ICMS_URL;
	$rssdsc      = $feed_array['rssdsc'] ? htmlspecialchars( $feed_array['rssdsc'] ) : $icmsConfig['slogan'];
	$rssimgurl   = $feed_array['rssimgurl'] ? htmlspecialchars( $feed_array['rssimgurl'] ) : ICMS_URL .'/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/impression_iconbig.png';
	$rsswidth    = $feed_array['rsswidth'] ? htmlspecialchars( $feed_array['rsswidth'] ) : '32';
	$rssheight   = $feed_array['rssheight'] ? htmlspecialchars( $feed_array['rssheight'] ) : '32';
	$rssimgtitle = $feed_array['rssimgtitle'] ? htmlspecialchars( $feed_array['rssimgtitle'] ) : $modulename;
	$rssimglink  = $feed_array['rssimglink'] ? htmlspecialchars( $feed_array['rssimglink'] ) : ICMS_URL;
	$rssttl      = $feed_array['rssttl'] ? htmlspecialchars( $feed_array['rssttl'] ) : '60';
	$rsswebmaster= $feed_array['rsswebmaster'] ? htmlspecialchars( $feed_array['rsswebmaster'] ) : $webmaster;
	$rsseditor   = $feed_array['rsseditor'] ? htmlspecialchars( $feed_array['rsseditor'] ) : $webmaster;
	$rsscategory = $feed_array['rsscategory'] ? htmlspecialchars( $feed_array['rsscategory'] ) : $modulename;
	$rssgenerator= $feed_array['rssgenerator'] ? htmlspecialchars( $feed_array['rssgenerator'] ) : $generator;
	$rsscopyright= $feed_array['rsscopyright'] ? htmlspecialchars( $feed_array['rsscopyright'] ) : $copyright;
	$rsstotal    = $feed_array['rsstotal'] ? htmlspecialchars( $feed_array['rsstotal'] ) : '15';
	$rssofftitle = $feed_array['rssofftitle'] ? htmlspecialchars( $feed_array['rssofftitle'] ) : _AM_IMPRESSION_RSSOFFTITLE;
	$rssoffdsc   = $feed_array['rssoffdsc'] ? htmlspecialchars( $feed_array['rssoffdsc'] ) : _AM_IMPRESSION_RSSOFFMSGDEF;

	icms_cp_header();
	impression_adminmenu( 8, _AM_IMPRESSION_RSSFEED );

	$icmsAdminTpl -> assign( 'icms_module_header', '<script type="text/javascript" language="javascript" src="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.js"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.css" />' );

	echo '<div style="border: #e8e8e8 1px solid; padding: 8px; border-radius: 5px;">
				<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/feed32.png" alt="" style="float: left; padding-right: 10px;" />
				' . _AM_IMPRESSION_RSSFEEDDSC . '';
	if ( $feed_array['rsstitle'] == '' ) {
		echo '<br /><br /><span style="text-decoration: blink; font-weight: bold; color: red;">' . _AM_IMPRESSION_RSSCLICKSUBMIT . '</span>';
	}
	echo '</div><br />';

	$sform = new icms_form_Theme( _AM_IMPRESSION_RSSFEEDCFG, 'storyform', '' );
	$sform -> setExtra( 'enctype="multipart/form-data"' );

	$rssstatus_radio = new icms_form_elements_Radioyn( _AM_IMPRESSION_RSSACTIVE . impression_tooltip( _AM_IMPRESSION_RSSACTIVEDSC ), 'rssactive', $rssactive, ' ' . _YES . '', ' ' . _NO . '' );
	$sform -> addElement( $rssstatus_radio );

	$formtitle = new icms_form_elements_Text( _AM_IMPRESSION_RSSTITLE . impression_tooltip( _AM_IMPRESSION_RSSTITLEDSC ), 'rsstitle', icms::$module -> config['txt_width'], 128, $rsstitle );
	$sform -> addElement( $formtitle, false );

	$formlink = new icms_form_elements_Text( _AM_IMPRESSION_RSSLINKS . impression_tooltip( _AM_IMPRESSION_RSSLINKSDSC ), 'rsslink', icms::$module -> config['txt_width'], 255, $rsslink );
	$sform -> addElement( $formlink, false );

	$formdsc = new icms_form_elements_Textarea( _AM_IMPRESSION_RSSDESCRIPTION . impression_tooltip( _AM_IMPRESSION_RSSDESCRIPTIONDSC ), 'rssdsc', $rssdsc, 4, 50 );
	$sform -> addElement( $formdsc, false );

	$formimage = new icms_form_elements_Text( _AM_IMPRESSION_RSSIMAGE . impression_tooltip( _AM_IMPRESSION_RSSIMAGEDSC ), 'rssimgurl', icms::$module -> config['txt_width'], 255, $rssimgurl );
	$sform -> addElement( $formimage, false );

	$formwidth = new icms_form_elements_Text( _AM_IMPRESSION_RSSWIDTH . impression_tooltip( _AM_IMPRESSION_RSSWIDTHDSC ), 'rsswidth', 3, 8, $rsswidth );
	$sform -> addElement( $formwidth, false );

	$formheight = new icms_form_elements_Text( _AM_IMPRESSION_RSSHEIGHT . impression_tooltip( _AM_IMPRESSION_RSSHEIGHTDSC ), 'rssheight', 3, 8, $rssheight );
	$sform -> addElement( $formheight, false );

	$formimgtitle = new icms_form_elements_Text( _AM_IMPRESSION_RSSIMGTITLE . impression_tooltip( _AM_IMPRESSION_RSSIMGTITLEDSC ), 'rssimgtitle', icms::$module -> config['txt_width'], 128, $rssimgtitle );
	$sform -> addElement( $formimgtitle, false );

	$formimglink = new icms_form_elements_Text( _AM_IMPRESSION_RSSIMGLINK . impression_tooltip( _AM_IMPRESSION_RSSIMGLINKDSC ), 'rssimglink', icms::$module -> config['txt_width'], 255, $rssimglink );
	$sform -> addElement( $formimglink, false );

	$formttl = new icms_form_elements_Text( _AM_IMPRESSION_RSSTTL . impression_tooltip( _AM_IMPRESSION_RSSTTLDSC ), 'rssttl', 3, 128, $rssttl );
	$sform -> addElement( $formttl, false );

	$formwebmaster = new icms_form_elements_Text( _AM_IMPRESSION_RSSWEBMASTER . impression_tooltip( _AM_IMPRESSION_RSSWEBMASTERDSC ), 'rsswebmaster', icms::$module -> config['txt_width'], 255, $rsswebmaster );
	$sform -> addElement( $formwebmaster, false );
	
	$formeditor = new icms_form_elements_Text( _AM_IMPRESSION_RSSEDITOR . impression_tooltip( _AM_IMPRESSION_RSSEDITORDSC ), 'rsseditor', icms::$module -> config['txt_width'], 255, $rsseditor );
	$sform -> addElement( $formeditor, false );
	
	$formcategory = new icms_form_elements_Text( _AM_IMPRESSION_RSSCATEGORY . impression_tooltip( _AM_IMPRESSION_RSSCATEGORYDSC ), 'rsscategory', icms::$module -> config['txt_width'], 128, $rsscategory );
	$sform -> addElement( $formcategory, false );
	
	$formgenerator = new icms_form_elements_Text( _AM_IMPRESSION_RSSGENERATOR . impression_tooltip( _AM_IMPRESSION_RSSGENERATORDSC ), 'rssgenerator', icms::$module -> config['txt_width'], 128, $rssgenerator );
	$sform -> addElement( $formgenerator, false );
	
	$formcopyright = new icms_form_elements_Text( _AM_IMPRESSION_RSSCOPYRIGHT . impression_tooltip( _AM_IMPRESSION_RSSCOPYRIGHTDSC ), 'rsscopyright', icms::$module -> config['txt_width'], 128, $rsscopyright );
	$sform -> addElement( $formcopyright, false );
	
	$formtotal = new icms_form_elements_Text( _AM_IMPRESSION_RSSTOTAL . impression_tooltip( _AM_IMPRESSION_RSSTOTALDSC ), 'rsstotal', 3, 8, $rsstotal );
	$sform -> addElement( $formtotal, false );
	
	$formofftitle = new icms_form_elements_Text( _AM_IMPRESSION_RSSOFFLINE . impression_tooltip( _AM_IMPRESSION_RSSOFFLINEDSC ), 'rssofftitle', icms::$module -> config['txt_width'], 128, $rssofftitle );
	$sform -> addElement( $formofftitle, false );

	$formoffmsg = new icms_form_elements_Textarea( _AM_IMPRESSION_RSSOFFMSG . impression_tooltip( _AM_IMPRESSION_RSSOFFMSGDSC ), 'rssoffdsc', $rssoffdsc, 4, 50 );
	$sform -> addElement( $formoffmsg, false );

	$button_tray = new icms_form_elements_Tray( '', '' );
	$hidden = new icms_form_elements_Hidden( 'op', 'save' );
	$button_tray -> addElement( $hidden );

	$butt_create = new icms_form_elements_Button( '', '', _SUBMIT, 'submit' );
	$butt_create -> setExtra( 'onclick="this.form.elements.op.value=\'saverss\'"' );
	$button_tray -> addElement( $butt_create );
	$sform -> addElement( $button_tray );
	$sform -> display();
	unset( $hidden ); 

	icms_cp_footer();
}

switch ( strtolower( $op ) ) {
	case 'edit':
		rss_edit();
		break;

	case 'saverss':
		$rssactive   = ( $_POST['rssactive'] == 1 ) ? 1 : 0;
		$rsstitle    = addslashes( trim( $_POST['rsstitle'] ) );
		$rsslink     = ( $_POST['rsslink'] != 'http://' ) ? addslashes( $_POST['rsslink'] ) : '';
		$rssdsc      = addslashes( trim( $_POST['rssdsc'] ) );
		$rssimgurl   = addslashes( trim( $_POST['rssimgurl'] ) );
		$rsswidth    = addslashes( trim( $_POST['rsswidth'] ) );
		$rssheight   = addslashes( trim( $_POST['rssheight'] ) );
		$rssimgtitle = addslashes( trim( $_POST['rssimgtitle'] ) );
		$rssimglink  = addslashes( trim( $_POST['rssimglink'] ) );
		$rssttl      = addslashes( trim( $_POST['rssttl'] ) );
		$rsswebmaster= addslashes( trim( $_POST['rsswebmaster'] ) );
		$rsseditor   = addslashes( trim( $_POST['rsseditor'] ) );
		$rsscategory = addslashes( trim( $_POST['rsscategory'] ) );
		$rssgenerator= addslashes( trim( $_POST['rssgenerator'] ) );
		$rsscopyright= addslashes( trim( $_POST['rsscopyright'] ) );
		$rsstotal	 = addslashes( trim( $_POST['rsstotal'] ) );
		$rssofftitle = addslashes( trim( $_POST['rssofftitle'] ) );
		$rssoffdsc   = addslashes( trim( $_POST['rssoffdsc'] ) );

		$sql = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_configs' ) . " SET rssactive='$rssactive', rsstitle='$rsstitle', rsslink='$rsslink', rssdsc='$rssdsc', rssimgurl='$rssimgurl', rsswidth='$rsswidth', rssheight='$rssheight', rssimgtitle='$rssimgtitle', rssimglink='$rssimglink', rssttl='$rssttl', rsswebmaster='$rsswebmaster', rsseditor='$rsseditor', rsscategory='$rsscategory', rssgenerator='$rssgenerator', rsscopyright='$rsscopyright', rsstotal='$rsstotal', rssofftitle='$rssofftitle', rssoffdsc='$rssoffdsc'";
		$result = icms::$xoopsDB -> queryF( $sql );
		$error = _AM_IMPRESSION_DBERROR . ': <br /><br />' . $sql;
		if ( !$result ) {
			trigger_error( $error, E_USER_ERROR );
		}
		redirect_header( 'articles.php', 1, _AM_IMPRESSION_RSSDBUPDATED );
		break;
}
?>