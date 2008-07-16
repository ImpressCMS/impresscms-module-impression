<?php
/**
 * $Id: impression_new.php
 * Module: Impression
 */

//include ICMS_ROOT_PATH . '/modules/impression/include/functions.php';

function checkImpressionNewBlockgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
    global $xoopsUser;

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

    $module_handler = &xoops_gethandler( 'module' );
    $module = &$module_handler -> getByDirname( 'impression' );

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

function b_impression_displaynewicons( $time, $status = 0, $counter = 0 ) {
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( "impression" );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $new = '';
    $pop = '';

    $newdate = ( time() - ( 86400 * intval( $impressionModuleConfig['daysnew'] ) ) );
    $popdate = ( time() - ( 86400 * 10  ) ) ;

    if ( $impressionModuleConfig['displayicons'] != 3 ) {
        if ( $newdate < $time ) {
            if ( intval( $status ) > 1 ) {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . ICMS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/update.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $new = "<i>Updated!</i>";
            } else  {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . ICMS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/new.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $new = "<i>New!</i>";
            }
        } 
        if ( $popdate > $time ) {
            if ( $counter >= $impressionModuleConfig['popular'] ) {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $pop = "&nbsp;<img src =" . ICMS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/popular.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $pop = "<i>Popular!</i>";
            } 
        } 
    } 
    $icons = $new . " " . $pop;
    return $icons;
}

function b_impression_adminnewicons($aid, $dirname) {

        $iconadmin = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>';
        $iconadmin .= '&nbsp;<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $iconadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>&nbsp;';

        return $iconadmin;
}

/**
 * Function: b_impression_new_show
 * Input   : $options[0] = date for the most recent articles
 * 			   hits for the most popular articles
 *           $block['content'] = The optional above content
 *           $options[1] = How many videos are displayes
 * Output  : Returns the most recent or most popular articles
 */
function b_impression_new_show( $options ) {
    global $xoopsDB, $xoopsModuleConfig, $xoopsUser;

    $block = array();
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( "impression" );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $moderate = 0;
    $impressionmyts = &MyTextSanitizer :: getInstance();

    $result = $xoopsDB -> query( "SELECT aid, cid, title, submitter, published, introtext, status, hits FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND status = 0 ORDER BY published DESC", $options[1], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
        if ( false == checkImpressionNewBlockgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
            continue;
        }
        $result2 = $xoopsDB -> query( "SELECT title FROM " . $xoopsDB -> prefix('impression_cat') . " WHERE cid=".$myrow['cid']);
        $mycat = $xoopsDB -> fetchArray( $result2 );

        $articlenew = array();
        $articlenew['id'] = intval($myrow['aid']);
        $articlenew['cid'] = intval($myrow['cid']);
        $articlenew['title'] = '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">' . $myrow['title'] . ' </a>';
        $articlenew['cattitle'] = '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/catview.php?cid=' . intval($myrow['cid']).'">' . $mycat['title'] . ' </a>';
        $articlenew['date'] = formatTimestamp( $myrow['published'], $options[2] );
        $articlenew['dirname'] = $impressionModule -> getVar( 'dirname' );
        $articlenew['newpopicons'] = b_impression_displaynewicons($myrow['published'], $myrow['status'], $myrow['hits']);
        $articlenew['adminnewicons'] = b_impression_adminnewicons( intval($myrow['aid']),$impressionModule -> getVar( 'dirname' ));
        $block['articlenew'][] = $articlenew;

    }
    unset( $_block_check_array );
    return $block;
} 

/**
 * b_impression_new_edit()
 * 
 * @param $options
 * @return 
 **/
function b_impression_new_edit( $options ) {
    $form = "" . _MB_IMPRESSION_DISP . "&nbsp;";
    $form .= "<input type='hidden' name='options[]' value='";
    if ( $options[0] == "new" ) {
        $form .= "new'";
    }
    $form .= " />";
    $form .= "<input type='text' name='options[]' value='" . $options[1] . "' />&nbsp;" . _MB_IMPRESSION_HEADLINES . "";
//    $form .= "&nbsp;<br />" . _MB_IMPRESSION_CHARS . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_IMPRESSION_LENGTH . "";
    $form .= "&nbsp;<br />" . _MB_IMPRESSION_DATEFORMAT . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_IMPRESSION_DATEFORMATMANUAL;
    return $form;
}
?>