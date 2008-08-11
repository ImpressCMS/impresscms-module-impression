<?php
/**
 * $Id: index.php
 * Module: Impression
 */

include 'header.php';

$xoopsOption['template_main'] = 'impression_index.html';
include ICMS_ROOT_PATH . '/header.php';

global $xoopsModuleConfig;

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

// Begin Main page Heading etc
$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_indexpage' );
$head_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );

$catarray['imageheader'] = impression_imageheader( $head_arr['indeximage'], $head_arr['indexheading'] );
$catarray['indexheading'] = $impressionmyts -> displayTarea( $head_arr['indexheading'] );
$catarray['indexheaderalign'] = $impressionmyts -> htmlSpecialCharsStrip( $head_arr['indexheaderalign'] );
$catarray['indexfooteralign'] = $impressionmyts -> htmlSpecialCharsStrip( $head_arr['indexfooteralign'] );

//$html = ( $head_arr['nohtml'] ) ? 0 : 1;
//$smiley = ( $head_arr['nosmiley'] ) ? 0 : 1;
//$xcodes = ( $head_arr['noxcodes'] ) ? 0 : 1;
//$images = ( $head_arr['noimages'] ) ? 0 : 1;
//$breaks = ( $head_arr['nobreak'] ) ? 1 : 0;

$catarray['indexheader'] = $head_arr['indexheader'];
$catarray['indexfooter'] = $head_arr['indexfooter'];
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

    $indicator['image'] = "modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/icon/folder.png";
    $indicator['alttext'] = _MD_IMPRESSION_NEWLAST;

    if ( impression_checkgroups( $myrow['cid'] ) ) {
        $title = $impressionmyts -> htmlSpecialCharsStrip( $myrow['title'] );

        $arr = array();
        $arr = $mytree -> getFirstChild( $myrow['cid'], "title" );

        $space = $chcount = 1;
        $subcategories = "";
        foreach( $arr as $ele ) {
            if ( true == impression_checkgroups( $ele['cid'] ) ) {
                if ( $xoopsModuleConfig['subcats'] == 1 ) {
                    $chtitle = $impressionmyts -> htmlSpecialCharsStrip( $ele['title'] );
                    if ( $chcount > 5 ) {
                        $subcategories .= "...";
                        break;
                    } 
                    if ( $space > 0 ) {
                        $subcategories .= "<br />";
                    }
                    $subcategories .= "<li><a href='" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/catview.php?cid=" . $ele['cid'] . "'>" . $chtitle . "</a></li>";
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

        $xoopsTpl -> append( 'categories', array( 'image' => ICMS_URL . "/$imgurl",
                                                  'id' => $myrow['cid'],
                                                  'title' => $title,
                                                  'subcategories' => $subcategories,
                                                  'totalarticles' => $totalarticleload['count'],
                                                  'count' => $count,
                                                  'alttext' => $impressionmyts -> displayTarea( $myrow['description'], 1, 1, 1, 1, 1 ),
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

$modhandler = xoops_gethandler( 'module' );
$rss_mod = $modhandler -> getByDirName( 'rss' );
    if ( !$rss_mod ) {
      $rss_icon = '';
      $rss_mod = false;
    } else {
      $xoopsTpl -> assign( 'rss_icon', '<a href="'. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '" alt="Get RSS news feed" target="_blank"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/icon/rss.png" /></a>' );
    }
	
$sql = $xoopsDB -> query( "SELECT lastarticlesyn, lastarticlestotal FROM " . $xoopsDB -> prefix( 'impression_indexpage' ));
$lastarticles = $xoopsDB -> fetchArray( $sql );

if ($lastarticles['lastarticlesyn'] == 1) {
  $result = $xoopsDB -> query( "SELECT * FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND status=0 ORDER BY published DESC", $lastarticles['lastarticlestotal'], 0 );
  while ( $article_arr = $xoopsDB -> fetchArray( $result ) ) {
        $res_type = 0;
        $moderate = 0;
        $cid = $article_arr['cid'];
        require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/include/articleloadinfo.php';
        $xoopsTpl -> append( 'article', $article );
  }
}
$xoopsTpl -> assign( 'showlatest', $lastarticles['lastarticlesyn'] );	

$xoopsTpl -> assign( 'lang_thereare', sprintf( $lang_thereare, $total_cat, $listings['count'] ) );

$xoopsTpl -> assign( 'dirname', $xoopsModule -> getVar( 'dirname' ) );
 
include ICMS_ROOT_PATH . '/footer.php';

?>
