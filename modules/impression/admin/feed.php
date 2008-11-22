<?php
/**
* imLinks - a multicategory links management module for ImpressCMS
*
* Based upon WF-Link 1.06
*
* File: admin/feed.php
*
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		imLinks
* @since			1.00
* @author		McDonald
* @version		$Id$
*/

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );

function rss_edit() {
	global $xoopsDB, $xoopsConfig, $xoopsModule, $impressionmyts;
	
	$mydirname = basename( dirname( dirname( __FILE__ ) ) );

	include_once ICMS_ROOT_PATH . '/class/xoopsformloader.php';

	$sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_configs' );
	$feed_array = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
	
	$webmaster  = $xoopsConfig['adminmail'] . ' (' . $xoopsModule -> getVar( 'name' ) . ') ';
	$modulename = $xoopsModule -> getVar( 'name' );
	$modulevers = number_format( $xoopsModule -> getVar( 'version' ) / 100 , 2, '.', '' );
	$generator  = XOOPS_VERSION . ' ( module: ' . $modulename . ' ' . $modulevers . ' )';
	$copyright  = _AM_IMPRESSION_COPYRIGHT . ' ' . formatTimestamp( time(), 'Y' ) . ' - ' . $xoopsConfig['sitename'];
		
	$rssactive   = $feed_array['rssactive'];
	$rsstitle    = $feed_array['rsstitle'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsstitle'] ) : $xoopsConfig['sitename'];
	$rsslink     = $feed_array['rsslink'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsslink'] ) : ICMS_URL;
	$rssdsc      = $feed_array['rssdsc'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssdsc'] ) : $xoopsConfig['slogan'];
	$rssimgurl   = $feed_array['rssimgurl'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssimgurl'] ) : ICMS_URL .'/modules/' . $mydirname . '/images/impression_iconbig.png';
	$rsswidth    = $feed_array['rsswidth'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsswidth'] ) : '32';
	$rssheight   = $feed_array['rssheight'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssheight'] ) : '32';
	$rssimgtitle = $feed_array['rssimgtitle'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssimgtitle'] ) : $modulename;
	$rssimglink  = $feed_array['rssimglink'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssimglink'] ) : ICMS_URL;
	$rssttl      = $feed_array['rssttl'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssttl'] ) : '60';
	$rsswebmaster= $feed_array['rsswebmaster'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsswebmaster'] ) : $webmaster;
	$rsseditor   = $feed_array['rsseditor'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsseditor'] ) : $webmaster;
	$rsscategory = $feed_array['rsscategory'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsscategory'] ) : $modulename;
	$rssgenerator= $feed_array['rssgenerator'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssgenerator'] ) : $generator;
	$rsscopyright= $feed_array['rsscopyright'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsscopyright'] ) : $copyright;
	$rsstotal    = $feed_array['rsstotal'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rsstotal'] ) : '15';
	$rssofftitle = $feed_array['rssofftitle'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssofftitle'] ) : _AM_IMPRESSION_RSSOFFTITLE;
	$rssoffdsc   = $feed_array['rssoffdsc'] ? $impressionmyts -> htmlSpecialCharsStrip( $feed_array['rssoffdsc'] ) : _AM_IMPRESSION_RSSOFFMSGDEF;
		
	xoops_cp_header();
	impression_adminmenu( 8, _AM_IMPRESSION_RSSFEED );
	
	echo '
			<fieldset style="border: #e8e8e8 1px solid;"><legend style="display: inline; font-weight: bold; color: #0A3760;">' . _AM_IMPRESSION_RSSFEED . '</legend>
			<div style="padding: 8px;">
			<img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/feed32.png" alt="" style="float: left; padding-right: 10px;" />
			' . _AM_IMPRESSION_RSSFEEDDSC . '
			</div>
			</fieldset><br />
		';
	
	$sform = new XoopsThemeForm( _AM_IMPRESSION_RSSFEEDCFG, 'storyform', xoops_getenv( 'PHP_SELF' ) );
	$sform -> setExtra( 'enctype="multipart / form - data"' );
		
	$rssstatus_radio = new XoopsFormRadioYN( _AM_IMPRESSION_RSSACTIVE, 'rssactive', $rssactive, ' ' . _YES . '', ' ' . _NO . '' );
	$rssstatus_radio -> SetDescription( _AM_IMPRESSION_RSSACTIVEDSC );
	$sform -> addElement( $rssstatus_radio );
	
	$formtitle = new XoopsFormText( _AM_IMPRESSION_RSSTITLE, 'rsstitle', 90, 128, $rsstitle );
	$formtitle -> SetDescription( _AM_IMPRESSION_RSSTITLEDSC );
	$sform -> addElement( $formtitle, false );
	
	$formlink = new XoopsFormText( _AM_IMPRESSION_RSSLINKS, 'rsslink', 90, 255, $rsslink );
	$formlink -> SetDescription( _AM_IMPRESSION_RSSLINKSDSC );
	$sform -> addElement( $formlink, false );
	
	$formdsc = new XoopsFormTextArea( _AM_IMPRESSION_RSSDESCRIPTION, 'rssdsc', $rssdsc, 4, 50 );
	$formdsc -> SetDescription( _AM_IMPRESSION_RSSDESCRIPTIONDSC );
	$sform -> addElement( $formdsc, false );
	
	$formimage = new XoopsFormText( _AM_IMPRESSION_RSSIMAGE, 'rssimgurl', 90, 255, $rssimgurl );
	$formimage -> SetDescription( _AM_IMPRESSION_RSSIMAGEDSC );
	$sform -> addElement( $formimage, false );
	
	$formwidth = new XoopsFormText( _AM_IMPRESSION_RSSWIDTH, 'rsswidth', 3, 8, $rsswidth );
	$formwidth -> SetDescription( _AM_IMPRESSION_RSSWIDTHDSC );
	$sform -> addElement( $formwidth, false );
	
	$formheight = new XoopsFormText( _AM_IMPRESSION_RSSHEIGHT, 'rssheight', 3, 8, $rssheight );
	$formheight -> SetDescription( _AM_IMPRESSION_RSSHEIGHTDSC );
	$sform -> addElement( $formheight, false );
	
	$formimgtitle = new XoopsFormText( _AM_IMPRESSION_RSSIMGTITLE, 'rssimgtitle', 90, 128, $rssimgtitle );
	$formimgtitle -> SetDescription( _AM_IMPRESSION_RSSIMGTITLEDSC );
	$sform -> addElement( $formimgtitle, false );
	
	$formimglink = new XoopsFormText( _AM_IMPRESSION_RSSIMGLINK, 'rssimglink', 90, 255, $rssimglink );
	$formimglink -> SetDescription( _AM_IMPRESSION_RSSIMGLINKDSC );
	$sform -> addElement( $formimglink, false );
	
	$formttl = new XoopsFormText( _AM_IMPRESSION_RSSTTL, 'rssttl', 3, 128, $rssttl );
	$formttl -> SetDescription( _AM_IMPRESSION_RSSTTLDSC );
	$sform -> addElement( $formttl, false );
	
	$formwebmaster = new XoopsFormText( _AM_IMPRESSION_RSSWEBMASTER, 'rsswebmaster', 90, 255, $rsswebmaster );
	$formwebmaster -> SetDescription( _AM_IMPRESSION_RSSWEBMASTERDSC );
	$sform -> addElement( $formwebmaster, false );
	
	$formeditor = new XoopsFormText( _AM_IMPRESSION_RSSEDITOR, 'rsseditor', 90, 255, $rsseditor );
	$formeditor -> SetDescription( _AM_IMPRESSION_RSSEDITORDSC );
	$sform -> addElement( $formeditor, false );
	
	$formcategory = new XoopsFormText( _AM_IMPRESSION_RSSCATEGORY, 'rsscategory', 90, 128, $rsscategory );
	$formcategory -> SetDescription( _AM_IMPRESSION_RSSCATEGORYDSC );
	$sform -> addElement( $formcategory, false );
	
	$formgenerator = new XoopsFormText( _AM_IMPRESSION_RSSGENERATOR, 'rssgenerator', 90, 128, $rssgenerator );
	$formgenerator -> SetDescription( _AM_IMPRESSION_RSSGENERATORDSC );
	$sform -> addElement( $formgenerator, false );
	
	$formcopyright = new XoopsFormText( _AM_IMPRESSION_RSSCOPYRIGHT, 'rsscopyright', 90, 128, $rsscopyright );
	$formcopyright -> SetDescription( _AM_IMPRESSION_RSSCOPYRIGHTDSC );
	$sform -> addElement( $formcopyright, false );
	
	$formtotal = new XoopsFormText( _AM_IMPRESSION_RSSTOTAL, 'rsstotal', 3, 8, $rsstotal );
	$formtotal -> SetDescription( _AM_IMPRESSION_RSSTOTALDSC );
	$sform -> addElement( $formtotal, false );
	
	$formofftitle = new XoopsFormText( _AM_IMPRESSION_RSSOFFLINE, 'rssofftitle', 90, 128, $rssofftitle );
	$formofftitle -> SetDescription( _AM_IMPRESSION_RSSOFFLINEDSC );
	$sform -> addElement( $formofftitle, false );
	
	$formoffmsg = new XoopsFormTextArea( _AM_IMPRESSION_RSSOFFMSG, 'rssoffdsc', $rssoffdsc, 4, 50 );
	$formoffmsg -> SetDescription( _AM_IMPRESSION_RSSOFFMSGDSC );
	$sform -> addElement( $formoffmsg, false );
	
	$button_tray = new XoopsFormElementTray( '', '' );
    $hidden = new XoopsFormHidden( 'op', 'save' );
    $button_tray -> addElement( $hidden );
	
	$butt_create = new XoopsFormButton( '', '', _SUBMIT, 'submit' );
    $butt_create -> setExtra( 'onclick="this.form.elements.op.value=\'saverss\'"' );
    $button_tray -> addElement( $butt_create );
	$sform -> addElement( $button_tray );
	$sform -> display();
	unset( $hidden ); 
	
    xoops_cp_footer();
}

switch ( strtolower( $op ) ) {
	case 'edit':
        rss_edit();
        break;
		
	case 'saverss':
		global $xoopsDB;
		$rssactive   = ( $_POST['rssactive'] == 1 ) ? 1 : 0;
		$rsstitle    = $impressionmyts -> addslashes( trim( $_POST['rsstitle'] ) );
		$rsslink     = ( $_POST['rsslink'] != 'http://' ) ? $impressionmyts -> addslashes( $_POST['rsslink'] ) : '';
		$rssdsc      = $impressionmyts -> addslashes( trim( $_POST['rssdsc'] ) );
		$rssimgurl   = $impressionmyts -> addslashes( trim( $_POST['rssimgurl'] ) );
		$rsswidth    = $impressionmyts -> addslashes( trim( $_POST['rsswidth'] ) );
		$rssheight   = $impressionmyts -> addslashes( trim( $_POST['rssheight'] ) );
		$rssimgtitle = $impressionmyts -> addslashes( trim( $_POST['rssimgtitle'] ) );
		$rssimglink  = $impressionmyts -> addslashes( trim( $_POST['rssimglink'] ) );
		$rssttl      = $impressionmyts -> addslashes( trim( $_POST['rssttl'] ) );
		$rsswebmaster= $impressionmyts -> addslashes( trim( $_POST['rsswebmaster'] ) );
		$rsseditor   = $impressionmyts -> addslashes( trim( $_POST['rsseditor'] ) );
		$rsscategory = $impressionmyts -> addslashes( trim( $_POST['rsscategory'] ) );
		$rssgenerator= $impressionmyts -> addslashes( trim( $_POST['rssgenerator'] ) );
		$rsscopyright= $impressionmyts -> addslashes( trim( $_POST['rsscopyright'] ) );
		$rsstotal	 = $impressionmyts -> addslashes( trim( $_POST['rsstotal'] ) );
		$rssofftitle = $impressionmyts -> addslashes( trim( $_POST['rssofftitle'] ) );
		$rssoffdsc   = $impressionmyts -> addslashes( trim( $_POST['rssoffdsc'] ) );
	
		$sql = "UPDATE " . $xoopsDB -> prefix( 'impression_configs' ) . " SET rssactive='$rssactive', rsstitle='$rsstitle', rsslink='$rsslink', rssdsc='$rssdsc', rssimgurl='$rssimgurl', rsswidth='$rsswidth', rssheight='$rssheight', rssimgtitle='$rssimgtitle', rssimglink='$rssimglink', rssttl='$rssttl', rsswebmaster='$rsswebmaster', rsseditor='$rsseditor', rsscategory='$rsscategory', rssgenerator='$rssgenerator', rsscopyright='$rsscopyright', rsstotal='$rsstotal', rssofftitle='$rssofftitle', rssoffdsc='$rssoffdsc'";
		$result = $xoopsDB -> queryF( $sql );
            $error = _AM_IMPRESSION_DBERROR . ': <br /><br />' . $sql;
            if ( !$result ) {
                trigger_error( $error, E_USER_ERROR );
            } 
		redirect_header( 'index.php', 1, _AM_IMPRESSION_RSSDBUPDATED );
        break;
		
}
		


?>