<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: makepdf.php
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

include_once 'header.php';

if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }

function strip_p_tag($text) {
    $search = array(
         "'<p>'si",
         "'</p>'si",
	);

	$replace = array(
         "",
         "<br /><br />",
	);

	$text = preg_replace( $search, $replace, $text );
    return $text;
}

$mydirname = basename( dirname( __FILE__ ) );

global $xoopsDB, $xoopsConfig, $xoopsModuleConfig, $xoopsUser;

$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$aid = intval( $aid );

$result = $xoopsDB -> query( 'SELECT * FROM ' . $xoopsDB -> prefix('impression_articles') . ' WHERE aid=' . $aid );
$myrow = $xoopsDB -> fetchArray( $result );

$result2 = $xoopsDB -> query( 'SELECT title FROM ' . $xoopsDB -> prefix('impression_cat') . ' WHERE cid=' . $myrow['cid'] );
$mycat = $xoopsDB -> fetchArray( $result2 );

$date = formatTimestamp( $myrow['published'], $xoopsModuleConfig['dateformat'] );

$myts =& MyTextSanitizer::getInstance();
$title = $myts -> makeTboxData4Show( $myrow['title'] );
$submitter = strip_tags( icms_getLinkedUnameFromId( $myrow['submitter'] ) );
$category = $mycat['title'];
$whowhen = sprintf( _MD_IMPRESSION_WHO_WHEN, $submitter, $date );
$content = '<h1>' . $title . '</h1><br /><br />' . $myts -> displayTarea( $myrow['introtext'], 1, 1, 1, 1, $myrow['nobreak'] ) . $myts -> displayTarea( $myrow['description'], 1, 1, 1, 1, $myrow['nobreak'] );

$slogan = $xoopsConfig['sitename'] . ' - ' . $xoopsConfig['slogan'];
$keywords = $myrow['meta_keywords'];
$description = '';

//$htmltitle = '<font color=#3399CC><h1>' . $title . '</h1><h4>' . $category . '</font></h4><h5>' . $whowhen . '</h5><br>' . $description;

require_once ICMS_PDF_LIB_PATH . '/tcpdf.php';

$filename = ICMS_ROOT_PATH . '/modules/' . $mydirname . '/' . $xoopsConfig['language'] . '/main.php';

if ( file_exists( $filename ) ) {
  include_once $filename;
} else {
  include_once ICMS_ROOT_PATH . '/modules/' . $mydirname . '/language/english/main.php';
}

$filename = ICMS_PDF_LIB_PATH . '/config/lang/' . _LANGCODE . '.php';
if( file_exists( $filename ) ) {
  include_once $filename;
} else {
  include_once ICMS_PDF_LIB_PATH . '/config/lang/en.php';
}

$pdf = new TCPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true );

// set document information
$pdf -> SetCreator( PDF_CREATOR );
$pdf -> SetAuthor( $submitter );
$pdf -> SetTitle( $title );
$pdf -> SetSubject( $category );
$pdf -> SetKeywords( $keywords );

$firstLine = $slogan;
$secondLine =  $whowhen;

$pdf -> SetHeaderData( PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $firstLine, $secondLine );

//set margins
$pdf -> SetMargins( PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT );

//set auto page breaks
$pdf -> SetAutoPageBreak( true, PDF_MARGIN_BOTTOM );
$pdf -> SetHeaderMargin( PDF_MARGIN_HEADER );
$pdf -> SetFooterMargin( PDF_MARGIN_FOOTER );
$pdf -> setImageScale( PDF_IMAGE_SCALE_RATIO ); //set image scale factor

$pdf -> setHeaderFont( array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN ) );
$pdf -> setFooterFont( array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA ) );

$pdf -> setLanguageArray($l); //set language items

// set font
$pdf -> SetFont( 'dejavusans', 'BI', 10 );

//initialize document
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> writeHTML( $content, true, 0 , true, 0);
$pdf -> Output();

?>