<?php
/**
 * $Id: impression_top.php
 * Module: Impression
 */

function checkImpressionSpotgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {

    global $xoopsUser;
    $mydirname = basename( dirname( dirname( __FILE__ ) ) );
    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

    $module_handler = &xoops_gethandler( 'module' );
    $module = &$module_handler -> getByDirname( $mydirname );

    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) ) {
        if ( $redirect == false ) {
            return false;
        } else {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        } 
    } 
    unset( $module );
    return true;
}

function b_impression_displayrssicons() {
    $mydirname = basename( dirname( dirname( __FILE__ ) ) );
    $modhandler = xoops_gethandler( 'module' );

    $icons = '<div align="center" style="padding: 2px;">';

    // Display rss icons if RSSFit module is installed
    // Plugin and sub-feed need to be activated!!
    $rss_mod = $modhandler -> getByDirName( 'rss' );
    if ( !$rss_mod ) {
      $rss_mod = false;
    } else {
      $icons .= '<a href="'. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '" alt="Get RSS news feed" target="_blank"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/icon/rss.png" /></a>&nbsp;';
      // Google
      $icons .= '<a href="http://fusion.google.com/add?feedurl='. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/rss_icons/google.png" alt="'._MB_IMPRESSION_ADDGOOGLE.'" title="'._MB_IMPRESSION_ADDGOOGLE.'" border="0"></a>&nbsp;';
      // Yahoo
      $icons .= '<a href="http://add.my.yahoo.com/rss?url='. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/rss_icons/yahoo.png" border="0" alt="'._MB_IMPRESSION_ADDMYYAHOO.'" title="'._MB_IMPRESSION_ADDMYYAHOO.'"></a>&nbsp;';
      // NewsGator
      $icons .= '<a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url='. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/rss_icons/newsgator.png" alt="'._MB_IMPRESSION_ADDNEWSGATOR.'" title="'._MB_IMPRESSION_ADDNEWSGATOR.'" border="0"></a>&nbsp;';
      // AOL
      $icons .= '<a href="http://feeds.my.aol.com/add.jsp?url='. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/rss_icons/aol2.png" alt="'._MB_IMPRESSION_ADDAOL.'" title="'._MB_IMPRESSION_ADDAOL.'" border="0"></a>&nbsp;';
      // Windows Live
      $icons .= '<a href="http://www.live.com/?add='. ICMS_URL . '/modules/rss/rss.php?feed=' . $mydirname . '"><img style="width: 92px; height: 17px;" src="'. ICMS_URL . '/modules/' . $mydirname . '/images/rss_icons/windowslive.png" alt="'._MB_IMPRESSION_ADDMSLIVE.'" title="'._MB_IMPRESSION_ADDMSLIVE.'" border="0"></a>';
      $icons .= '</div>';
    }

    return $icons;
}

function b_impression_spoticons($aid, $dirname) {

        $iconadmin = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>';
        $iconadmin .= '&nbsp;<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $iconadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>&nbsp;';

        return $iconadmin;
}

// Function: b_xoopstube_top_show
// Input   : $options[0] = date for the most recent videos
// 			   hits for the most popular videos
//           $block['content'] = The optional above content
//           $options[1] = How many videos are displayes
//           $options[2] = Set date format
//           $options[3] = Display RSS icons y/n
// Output  : Returns the most recent or most popular videos
function b_impression_spot_show( $options ) {

    global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $xoopsTemplate;
    $mydirname = basename( dirname( dirname( __FILE__ ) ) );
    $block = array();
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( $mydirname );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $moderate = 0;
    $impressionmyts = &MyTextSanitizer :: getInstance();

    $sql = $xoopsDB -> query( "SELECT aid, cid, title, submitter, published, status, hits, introtext FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND status=0 ORDER BY published DESC", $options[1], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $sql ) ) {
        if ( false == checkImpressionSpotgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
            continue;
        }

        $articleload = array();
        $title = $impressionmyts -> htmlSpecialChars( $impressionmyts -> stripSlashesGPC($myrow["title"]) );
        $articleload['isadmin'] = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $impressionModule -> mid() ) ) ? true : false;
        $articleload['adminarticle'] = '';
        if ( $articleload['isadmin'] == true && $moderate == 0 ) {
        $articleload['adminarticle'] = '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/images/icon/computer.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>&nbsp;';
        $articleload['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php?op=edit&amp;aid=' . $myrow['aid'] . '"><img src="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/images/icon/page_edit.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $articleload['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php?op=delete&amp;aid=' . $myrow['aid'] . '"><img src="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/images/icon/page_delete.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>';

        } else {
        $articleload['adminarticle'] = '[ <a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/submit.php?op=edit&amp;aid=' . $myrow['aid'] . '&approve=1">' . _MB_IMPRESSION_APPROVE . '</a> | ';
        $articleload['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/submit.php?op=delete&amp;aid=' . $myrow['aid'] . '">' . _MB_IMPRESSION_DELETE . '</a> ]';
        }

        $articleload['id'] = intval($myrow['aid']);
        $articleload['cid'] = intval($myrow['cid']);
        $articleload['title'] = $title;
        $articleload['title'] = '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">' . $title . ' </a>';
        $articleload['date'] = formatTimestamp( $myrow['published'], $options[2] );
        $articleload['hits'] = sprintf( _MB_IMPRESSION_ARTICLEHITS, intval( $myrow['hits'] ) );
        $articleload['submitter'] = xoops_getLinkedUnameFromId($myrow['submitter']);
        $articleload['introtext'] = $myrow['introtext'];
        $articleload['readmore'] = '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">' . _MB_IMPRESSION_READMORE . '</a>';
        $articleload['rssicons'] = $options[3];
        $articleload['showrss'] = b_impression_displayrssicons();
        $articleload['dirname'] = $impressionModule -> getVar( 'dirname' );
        $block['article'][] = $articleload;
    }
    unset( $_block_check_array );

    return $block;
} 

// b_xoopstube_top_edit()
// @param $options
// @return
function b_impression_spot_edit( $options ) {
    $form = "" . _MB_IMPRESSION_DISP . "&nbsp;";
    $form .= "<input type='hidden' name='options[]' value='";
    if ( $options[0] == "spot" ) {
        $form .= "spot'";
    }
    $form .= " />";
    $form .= "<input type='text' name='options[]' value='" . $options[1] . "' />&nbsp;" . _MB_IMPRESSION_FILES . "";
    $form .= "&nbsp;<br />" . _MB_IMPRESSION_DATEFORMAT . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_IMPRESSION_DATEFORMATMANUAL;
    $chk   = "";
	if ($options[3] == 0) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<br />" . _MB_IMPRESSION_SHOWRSSICONS . "&nbsp;<input type='radio' name='options[3]' value='0'".$chk." />&nbsp;"._NO."&nbsp;";
	$chk   = "";
	if ($options[3] == 1) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[3]' value='1'".$chk." />&nbsp;"._YES."&nbsp;&nbsp;"._MB_IMPRESSION_SHOWRSSICONS_DSC."";
    return $form;
}
?>