<?php
/**
 * $Id: index.php
 * Module: Impression
 */

include 'header.php';

$xoopsOption['template_main'] = 'impression_index.html';
include XOOPS_ROOT_PATH . '/header.php';

global $xoopsModuleConfig;

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

// Begin Main page Heading etc
$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_indexpage' );
$head_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );

$catarray['imageheader'] = impression_imageheader( $head_arr['indeximage'], $head_arr['indexheading'] );
$catarray['indexheading'] = $impressionmyts -> displayTarea( $head_arr['indexheading'] );
$catarray['indexheaderalign'] = $impressionmyts -> htmlSpecialCharsStrip( $head_arr['indexheaderalign'] );
$catarray['indexfooteralign'] = $impressionmyts -> htmlSpecialCharsStrip( $head_arr['indexfooteralign'] );

$html = ( $head_arr['nohtml'] ) ? 0 : 1;
$smiley = ( $head_arr['nosmiley'] ) ? 0 : 1;
$xcodes = ( $head_arr['noxcodes'] ) ? 0 : 1;
$images = ( $head_arr['noimages'] ) ? 0 : 1;
$breaks = ( $head_arr['nobreak'] ) ? 1 : 0;

$catarray['indexheader'] = $impressionmyts -> displayTarea( $head_arr['indexheader'], $html, $smiley, $xcodes, $images, $breaks );
$catarray['indexfooter'] = $impressionmyts -> displayTarea( $head_arr['indexfooter'], $html, $smiley, $xcodes, $images, $breaks );
$xoopsTpl -> assign( 'catarray', $catarray );

// End main page Headers
$count = 1;
$chcount = 0;
$countin = 0;

// Begin Main page linkload info
$listings = impression_getTotalItems();

// get total amount of categories
$total_cat = impression_totalcategory();

$catsort = $xoopsModuleConfig['sortcats'];
$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE pid = 0 ORDER BY " . $catsort;
$result = $xoopsDB -> query( $sql );
while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
    $countin++;
    $subtotalarticleload = 0;
    $totalarticleload = impression_getTotalItems( $myrow['cid'], 1 );

    $indicator['image'] = "modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/icon/folder.gif";
    $indicator['alttext'] = _MD_IMPRESSION_NEWLAST;

    if ( checkgroups( $myrow['cid'] ) ) {
        $title = $impressionmyts -> htmlSpecialCharsStrip( $myrow['title'] );

        $arr = array();
        $arr = $mytree -> getFirstChild( $myrow['cid'], "title" );

        $space = $chcount = 0;
        $subcategories = "";
        foreach( $arr as $ele ) {
            if ( true == checkgroups( $ele['cid'] ) ) {
                if ( $xoopsModuleConfig['subcats'] == 1 ) {
                    $chtitle = $impressionmyts -> htmlSpecialCharsStrip( $ele['title'] );
                    if ( $chcount > 5 ) {
                        $subcategories .= "...";
                        break;
                    } 
                    if ( $space > 0 ) {
                        $subcategories .= "<br />";
                    }
                    $subcategories .= "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/catview.php?cid=" . $ele['cid'] . "'>" . $chtitle . "</a>";
                    $space++;
                    $chcount++;
                } 
            } 
        } 

        $_image = ( $myrow['imgurl'] ) ? urldecode( $myrow['imgurl'] ) : "";

        if ( empty( $_image ) || $_image == '' ) {
            $imgurl = $indicator['image'];
            $_width = 33;
            $_height = 24;
        } else {
            $imgurl = "{$xoopsModuleConfig['catimage']}/$_image";
        }
        // End

        $xoopsTpl -> append( 'categories', array( 'image' => XOOPS_URL . "/$imgurl",
                                                  'id' => $myrow['cid'],
                                                  'title' => $title,
                                                  'subcategories' => $subcategories,
                                                  'totalarticles' => $totalarticleload['count'],
                                                  'count' => $count,
                                                  'alttext' => $myrow['description'],
                                                  'showartcount' => $xoopsModuleConfig['showartcount'] )
                                                  );
        $count++;
    } 
} 
switch ( $total_cat ) {
    case "1":
        $lang_thereare = _MD_IMPRESSION_THEREIS;
        break;
    default:
        $lang_thereare = _MD_IMPRESSION_THEREARE;
        break;
}
$xoopsTpl -> assign( 'lang_thereare', sprintf( $lang_thereare, $total_cat, $listings['count'] ) );
$xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
 
include XOOPS_ROOT_PATH . '/footer.php';

?>