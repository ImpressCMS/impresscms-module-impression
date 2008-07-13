<?php
/**
 * $Id: search.inc.php
 * Module: Impression
 */

function impressioncheckSearchgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
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

function impression_search( $queryarray, $andor, $limit, $offset, $userid ) {
    global $xoopsDB, $xoopsUser;

    $sql = "SELECT cid, pid FROM " . $xoopsDB -> prefix( 'impression_cat' );
    $result = $xoopsDB -> query( $sql );
    while ( $_search_group_check = $xoopsDB -> fetchArray( $result ) ) {
        $_search_check_array[$_search_group_check['cid']] = $_search_group_check;
    } 

    $sql = "SELECT aid, cid, title, submitter, published, introtext, description FROM " . $xoopsDB -> prefix( 'impression_articles' );
    $sql .= " WHERE published > 0 AND published <= " . time() . " AND offline = 0 AND cid > 0";

    if ( $userid != 0 ) {
        $sql .= " AND submitter=" . $userid . " ";
    } 

    // because count() returns 1 even if a supplied variable
    // is not an array, we must check if $querryarray is really an array
    if ( is_array( $queryarray ) && $count = count( $queryarray ) ) {
        $sql .= " AND ((title LIKE LOWER('%$queryarray[0]%') OR LOWER(description) LIKE LOWER('%$queryarray[0]%'))";
        for( $i = 1;$i < $count;$i++ ) {
            $sql .= " $andor ";
            $sql .= "(title LIKE LOWER('%$queryarray[$i]%') OR LOWER(description) LIKE LOWER('%$queryarray[$i]%'))";
        } 
        $sql .= ") ";
    } 
    $sql .= "ORDER BY date DESC";
    $result = $xoopsDB -> query( $sql, $limit, $offset );
    $ret = array();
    $i = 0;

    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
//        if ( false == impressioncheckSearchgroups( $myrow['cid'] ) ) {
//            continue;
//        } 
        $ret[$i]['image'] = "images/size2.gif";
        $ret[$i]['link'] = "singlearticle.php?cid=" . $myrow['cid'] . "&amp;aid=" . $myrow['aid'];
        $ret[$i]['title'] = $myrow['title'];
        $ret[$i]['time'] = $myrow['published'];
        $ret[$i]['uid'] = $myrow['submitter'];
        $i++;
    } 
    unset( $_search_check_array );
    return $ret;
} 

?>
