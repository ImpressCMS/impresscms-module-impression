<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: makepdf.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

include_once 'header.php';

if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }

$aid = intval( impression_cleanRequestVars( $_REQUEST, 'aid', 0 ) );

$result = icms::$xoopsDB -> query( 'SELECT * FROM ' . icms::$xoopsDB -> prefix('impression_articles') . ' WHERE aid=' . $aid );
$myrow = icms::$xoopsDB -> fetchArray( $result );

$result2 = icms::$xoopsDB -> query( 'SELECT title FROM ' . icms::$xoopsDB -> prefix('impression_cat') . ' WHERE cid=' . $myrow['cid'] );
$mycat = icms::$xoopsDB -> fetchArray( $result2 );

$date = formatTimestamp( $myrow['published'], icms::$module -> config['dateformat'] );

$title = htmlspecialchars( $myrow['title'] );

if ( icms::$module -> config['showsubmitter'] ) {
	$submitter = _MD_IMPRESSION_BY . strip_tags( icms_member_user_Handler::getUserLink( $myrow['uid'] ) );
} else {
	$submitter = '';
}
$category = $mycat['title'];
$whowhen = sprintf( _MD_IMPRESSION_WHO_WHEN, $submitter, $date );
$content = '<h1>' . $title . '</h1><br /><br />' . $myrow['introtext'] . $myrow['description'];

if ( $icmsConfig['slogan'] ) {
	$slogan = $icmsConfig['sitename'] . ' - ' . $icmsConfig['slogan'];
} else {
	$slogan = $icmsConfig['sitename'];
}

$keywords = $myrow['meta_keywords'];

require_once ICMS_PDF_LIB_PATH . '/tcpdf.php';

$filename = ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/' . $icmsConfig['language'] . '/main.php';

if ( file_exists( $filename ) ) {
	include_once $filename;
} else {
	include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/language/english/main.php';
}

$filename = ICMS_ROOT_PATH . '/language/' . $icmsConfig['language'] . '/pdf.php';
if ( file_exists( $filename ) ) {
	include_once $filename;
} else {
	include_once ICMS_PDF_LIB_PATH . '/config/lang/eng.php';
}

$firstLine = $slogan;
$secondLine = $whowhen;

// Extend the TCPDF class to create custom Footer
class ImpressionPDF extends TCPDF {
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this -> SetY( -15 );
		// Set font
		$this -> SetFont( $fonttype, 'I', 8 );
		// Page number
		$this -> Cell( 0, 10, _MD_IMPRESSION_PDF_PAGE . $this -> getAliasNumPage() . '/' . $this -> getAliasNbPages(), 'T', false, 'C', 0, '', 0, false, 'T', 'M' );
	}
}

$pdf = new ImpressionPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

// set document information
$pdf -> SetCreator( PDF_CREATOR );
$pdf -> SetAuthor( strip_tags( icms_member_user_Handler::getUserLink( $myrow['uid'] ) ) );
$pdf -> SetTitle( $title );
$pdf -> SetSubject( $category );
$pdf -> SetKeywords( $keywords );

$pdf -> SetHeaderData( PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $firstLine, $secondLine );

// set margins
$pdf -> SetMargins( PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT );

// set auto page breaks
$pdf -> SetAutoPageBreak( true, PDF_MARGIN_BOTTOM );
$pdf -> SetHeaderMargin( PDF_MARGIN_HEADER );
$pdf -> SetFooterMargin( PDF_MARGIN_FOOTER );
$pdf -> setImageScale( PDF_IMAGE_SCALE_RATIO ); //set image scale factor

$pdf -> setHeaderFont( array( PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN ) );
$pdf -> setFooterFont( array( PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA ) );

$pdf -> setLanguageArray($l); //set language items

// set default font subsetting mode
$pdf -> setFontSubsetting( true );

// set font
$pdf -> SetFont( '', '', 10, '', true );

// initialize document
// $pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> writeHTML( $content, true, false, true, false, '' );
$pdf -> Output();
?>