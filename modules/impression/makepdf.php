<?php

include_once 'header.php';

if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

global $xoopsDB, $xoopsConfig, $xoopsModuleConfig, $xoopsUser;

$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$aid = intval($aid);

//$error_message = _MD_IMPRESSION_NOITEMSELECTED;
//if ($aid == 0) {
//	redirect_header("javascript:history.go(-1)", 1, $error_message);
//	exit();
//}

$result = $xoopsDB -> query( "SELECT cid, title, submitter, published, introtext, description FROM " . $xoopsDB -> prefix('impression_articles') . " WHERE aid=".$aid );
$myrow = $xoopsDB -> fetchArray( $result );

//$result2 = $xoopsDB -> query( "SELECT title FROM " . $xoopsDB -> prefix('impression_cat') . " WHERE cid=".$myrow['cid'] );
//$mycat = $xoopsDB -> fetchArray( $result2 );

$date = formatTimestamp( $myrow['published'], $xoopsModuleConfig['dateformat'] );
$submitter = $xoopsUser -> uname();

//$myts =& MyTextSanitizer::getInstance();
//$title = $myts -> displayTarea( $myrow['title'] );
$title = $myrow['title'];
$category = $myrow['title'];
$whowhen = sprintf( _MD_IMPRESSION_WHO_WHEN, $submitter, $date );
$content = $myrow['introtext'] . '<br /><br />' . $myrow['description'];

// Because fpdf does not support ul and li tags
//$content = str_replace( '<ul>', "" , $content );
//$content = str_replace( '<li>', "->" , $content );
//$content = str_replace( '</li>', "\n" , $content );
//$content = str_replace( '</ul>', "" , $content );
//$content = $content;

$slogan = $xoopsConfig['sitename'] . ' - ' . $xoopsConfig['slogan'];
$filename = preg_replace( "/[^0-9a-z\-_\.]/i",'', $title );
$author = xoops_getLinkedUnameFromId( $myrow['submitter'] );
$keywords = $title . ' ' . $category . ' ' . $author . ' ' . $slogan;
$description = '';

$htmltitle = '<font color=#3399CC><h1>' . $title . '</h1><h4>' . $category . '</font></h4><h5>' . $whowhen . '</h5><br>' . $description;

//  TCPDF PART  -  TCPDF PART  -  TCPDF PART  -  TCPDF PART  -  TCPDF PART   //

//require_once('pdf/config/lang/'.$xoopsConfig['language'].'.php');
require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/pdf/tcpdf.php';
include XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/pdf/config/lang/en.php';
if (!defined('K_PATH_MAIN')) {
	die("TCPDF root path not defined");
}

//create new PDF document (document units are set by default to millimeters)
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true); 

// set document information
$pdf -> SetCreator(PDF_CREATOR);
$pdf -> SetTitle($title);
$pdf -> SetAuthor($author);
$pdf -> SetSubject($category);
$pdf -> SetKeywords($keywords);
$firstLine = $xoopsConfig['sitename'];
$secondLine =  $xoopsConfig['slogan'];
$pdf -> SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $firstLine, $secondLine); // Set Header Data With Logo
//$pdf -> SetHeaderData(K_BLANK_IMAGE, 0, PDF_HEADER_TITLE, $slogan); // Set Header Data With No Logo

//set margins
$pdf -> SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf -> SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf -> SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf -> setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

$pdf -> setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf -> setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf -> setLanguageArray($l); //set language items

//initialize document
$pdf -> AliasNbPages();

$pdf -> AddPage();

// set barcode
//$pdf -> SetBarcode(date("Y-m-d H:i:s", time()));

// title, category, author output
//$pdf -> WriteHTML($htmltitle, true, 0);

// body output
$pdf -> writeHTML($content, true, 0);

//Close and output PDF document
//$pdf -> Output($title.'.pdf', I);
$pdf -> Output();
?>