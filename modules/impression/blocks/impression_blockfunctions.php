<?php
/**
 * $Id: impression_blockfunctions.php
 * Module: Impression
 */

/**
 * checkXTubeBlockGroups()
 * 
 * @param integer $cid
 * @param string $permType
 * @param boolean $redirect
 * @return 
 **/
function checkImpressionBlockgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false )
{
    global $xoopsUser;

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

    $module_handler = &xoops_gethandler( 'module' );
    $module = &$module_handler -> getByDirname( 'impression' );

    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) )
    {
        if ( $redirect == false )
        {
            return false;
        } 
        else
        {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        } 
    } 
    unset( $module );
    return true;
}
function b_impression_displayicons( $time, $status = 0, $counter = 0 )
{
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( "impression" );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $new = '';
    $pop = '';

    $newdate = ( time() - ( 86400 * intval( $impressionModuleConfig['daysnew'] ) ) );
    $popdate = ( time() - ( 86400 * intval( $impressionModuleConfig['daysupdated'] ) ) ) ;

    if ( $impressionModuleConfig['displayicons'] != 3 )
    {
        if ( $newdate < $time )
        {
            if ( intval( $status ) > 1 )
            {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . XOOPS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/update.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $new = "<i>Updated!</i>";
            } 
            else
            {
                if ( $impressionModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . XOOPS_URL . "/modules/" . $impressionModule -> getVar( 'dirname' ) . "/images/icon/new.png alt='' align ='absmiddle'/>";
                if ( $impressionModuleConfig['displayicons'] == 2 )
                    $new = "<i>New!</i>";
            }
        } 
        if ( $popdate > $time )
        {
            if ( $counter >= $impressionModuleConfig['popular'] )
            {
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
function b_impression_adminicons($aid, $dirname) {

        $iconadmin = '<a href="' . XOOPS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . XOOPS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>';
        $iconadmin .= '&nbsp;<a href="' . XOOPS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . XOOPS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $iconadmin .= '<a href="' . XOOPS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . XOOPS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>&nbsp;';

        return $iconadmin;
}
?>