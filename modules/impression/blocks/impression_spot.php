<?php
/**
 * $Id: impression_top.php
 * Module: Impression
 */
function checkImpressionSpotBlockgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {

    global $xoopsUser;
    $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
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

function b_impression_displayspoticons( $time, $status = 0, $counter = 0 ) {
    $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( $mydirname );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $new = '';
    $pop = '';

    $newdate = ( time() - ( 86400 * intval( $impressionModuleConfig['daysnew'] ) ) );
    $popdate = ( time() - ( 86400 * intval( $impressionModuleConfig['daysupdated'] ) ) ) ;

    if ( $impressionModuleConfig['displayicons'] != 3 ) {
        if ( $newdate < $time ) {
            if ( intval( $status ) > 1 ) {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . XOOPS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/update.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $new = "<i>Updated!</i>";
            } else {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . XOOPS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/new.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $new = "<i>New!</i>";
            }
        } 
        if ( $popdate > $time ) {
            if ( $counter >= $impressionModuleConfig['popular'] ) {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $pop = "&nbsp;<img src =" . XOOPS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/popular.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $pop = "<i>Popular!</i>";
            } 
        } 
    } 
    $icons = $new . " " . $pop;
    return $icons;
}
function b_impression_spoticons($aid, $dirname) {

        $iconadmin = '<a href="' . XOOPS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . XOOPS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>';
        $iconadmin .= '&nbsp;<a href="' . XOOPS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . XOOPS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $iconadmin .= '<a href="' . XOOPS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . XOOPS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>&nbsp;';

        return $iconadmin;
}

// Function: b_xoopstube_top_show
// Input   : $options[0] = date for the most recent videos
// 			   hits for the most popular videos
//           $block['content'] = The optional above content
//           $options[1] = How many videos are displayes
// Output  : Returns the most recent or most popular videos
function b_impression_spot_show( $options ) {

    global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $xoopsTemplate;
    $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
    $block = array();
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( $mydirname );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $moderate = 0;
    $impressionmyts = &MyTextSanitizer :: getInstance();

    $result = $xoopsDB -> query( "SELECT aid, cid, title, submitter, published, status, date, hits, introtext FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND status = 0 ORDER BY published DESC", $options[1], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
        if ( false == checkImpressionSpotBlockgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
            continue;
        } 
        $articleload = array();
        $title = $impressionmyts -> htmlSpecialChars( $impressionmyts -> stripSlashesGPC($myrow["title"]) );
        $articleload['isadmin'] = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $impressionModule -> mid() ) ) ? true : false;
        $articleload['adminarticle'] = '';
        if ( $articleload['isadmin'] == true && $moderate == 0 ) {
        $articleload['adminarticle'] = '<a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php"><img src="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/images/icon/computer.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>&nbsp;';
        $articleload['adminarticle'] .= '<a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php?op=edit&amp;aid=' . $myrow['aid'] . '"><img src="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/images/icon/page_edit.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $articleload['adminarticle'] .= '<a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php?op=delete&amp;aid=' . $myrow['aid'] . '"><img src="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/images/icon/page_delete.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>';

        } else {
        $articleload['adminarticle'] = '[ <a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/submit.php?op=edit&amp;aid=' . $myrow['aid'] . '&approve=1">' . _MB_IMPRESSION_APPROVE . '</a> | ';
        $articleload['adminarticle'] .= '<a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/submit.php?op=delete&amp;aid=' . $myrow['aid'] . '">' . _MB_IMPRESSION_DELETE . '</a> ]';
        }
//        $articleload['icons'] = b_impression_displayicons( $myrow['published'], $myrow['status'], $myrow['hits'] );
        $articleload['id'] = intval($myrow['aid']);
        $articleload['cid'] = intval($myrow['cid']);
        $articleload['title'] = $title;
        $articleload['title'] = '<a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">' . $title . ' </a>';
        $articleload['date'] = formatTimestamp( $myrow['published'], $options[2] );
        $articleload['hits'] = $myrow['hits'];
        $articleload['submitter'] = xoops_getLinkedUnameFromId($myrow['submitter']);
        $articleload['introtext'] = $myrow['introtext'];
        $articleload['readmore'] = '<a href="' . XOOPS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">Read more</a>';
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
    return $form;
}
?>