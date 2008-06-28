<?php
/**
 * $Id: newarticles.php
 * Module: Impression
 */

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', '' );
$requestid = impression_cleanRequestVars( $_REQUEST, 'requestid', 0 );

switch ( strtolower( $op ) ) {
    case "approve":

        global $xoopsModule;
        $sql = "SELECT cid, title, publisher FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . $aid;
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        list( $cid, $title, $publisher ) = $xoopsDB -> fetchRow( $result );

        // Update the database

        $time = time();
        $xoopsDB -> queryF( "UPDATE " . $xoopsDB -> prefix( 'impression_articles' ) . " SET published='$time . ', status='1', publisher='$publisher' WHERE aid=" . $aid );

        $tags = array();
        $tags['ARTICLE_NAME'] = $title;
        $tags['ARTICLE_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $cid . '&amp;aid=' . $aid;

        $sql = "SELECT title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $cid;
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
        } else {
            $row = $xoopsDB -> fetchArray( $result );
            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/catview.php?cid=' . $cid;
            $notification_handler = &xoops_gethandler( 'notification' );
            $notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
            $notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
            if ( intval($notifypub) == 1 ) {
                $notification_handler -> triggerEvent( 'article', $aid, 'approve', $tags );
            } 
        } 
        redirect_header( 'newarticles.php', 1, _AM_IMPRESSION_SUB_NEWFILECREATED );
        break;

    case 'main':
    default:

        global $xoopsModuleConfig;

        $start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE offline=1 ORDER BY aid DESC" ;
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        $new_array = $xoopsDB -> query( $sql, $xoopsModuleConfig['admin_perpage'], $start );
        $new_array_count = $xoopsDB -> getRowsNum( $xoopsDB -> query( $sql ) );

        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_SUB_SUBMITTEDFILES );

        echo "<fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_SUB_FILESWAITINGINFO . "</legend>\n";
        echo "<div style='padding: 8px;'>" . _AM_IMPRESSION_SUB_FILESWAITINGVALIDATION . "&nbsp;<b>$new_array_count</b><div>\n";
        echo "<div div style='padding: 8px;'>\n";
        echo "<li>" . $imagearray['approve'] . " " . _AM_IMPRESSION_SUB_APPROVEWAITINGFILE . "\n";
        echo "<li>" . $imagearray['editimg'] . " " . _AM_IMPRESSION_SUB_EDITWAITINGFILE . "\n";
        echo "<li>" . $imagearray['deleteimg'] . " " . _AM_IMPRESSION_SUB_DELETEWAITINGFILE . "</div>\n";
        echo "</fieldset><br />\n";

        echo "<table width='100%' cellspacing='1' class='outer' summary>\n";
        echo "<tr style='text-align: center;'>\n";
        echo "<th style='text-align: center;'><small>" . _AM_IMPRESSION_MINDEX_ID . "</small></th>\n";
        echo "<th style='text-align: left;'><small>" . _AM_IMPRESSION_MINDEX_TITLE . "</small></th>\n";
        echo "<th style='text-align: center;'><small>" . _AM_IMPRESSION_MINDEX_POSTER . "</small></th>\n";
        echo "<th style='text-align: center;'><small>" . _AM_IMPRESSION_MINDEX_SUBMITTED . "</small></th>\n";
        echo "<th style='text-align: center;'><small>" . _AM_IMPRESSION_MINDEX_ACTION . "</small></th>\n";
        echo "</tr>\n";
        if ( $new_array_count > 0 ) {
            while ( $new = $xoopsDB -> fetchArray( $new_array ) ) {
                $aid = intval( $new['aid'] );
                $title = $impressionmyts -> htmlSpecialCharsStrip( $new['title'] );
                $submitter = xoops_getLinkedUnameFromId( $new['submitter'] );
                $datetime = formatTimestamp( $new['published'], $xoopsModuleConfig['dateformatadmin'] );

                $icon = ( $new['published'] ) ? $approved : "<a href='newarticles.php?op=approve&amp;aid=" . $aid . "'>" . $imagearray['approve'] . "</a>&nbsp;";
                $icon .= "<a href='index.php?op=edit&amp;aid=" . $aid . "'>" . $imagearray['editimg'] . "</a>&nbsp;";
                $icon .= "<a href='index.php?op=delete&amp;aid=" . $aid . "'>" . $imagearray['deleteimg'] . "</a>";

                echo "<tr>\n";
                echo "<td class='head' style='text-align: center; width: 5%;'><small>" . $aid . "</small></td>\n";
                echo "<td class='even' style='text-align: left;'><a href='newarticles.php?op=edit&amp;aid=" . $aid . "'><small>$title</small></a></td>\n";
                echo "<td class='even' style='text-align: center; white-space: nowrap;'><small>" . $submitter . "</small></td>\n";
                echo "<td class='even' style='text-align: center; width: 15%;'><small>" . formatTimestamp( $new['published'], $xoopsModuleConfig['dateformatadmin'] ) . "</small></td>\n";
                echo "<td class='even' style='text-align: center; width: 5%; white-space: nowrap;'>" . $icon . "</td>\n";
                echo "</tr>\n";
            } 
        } else {
            echo "<tr><td style='text-align: center;' class='head' colspan='6'>" . _AM_IMPRESSION_SUB_NOFILESWAITING . "</td></tr>";
        } 
        echo "</table>\n";

        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $page = ( $new_array_count > $xoopsModuleConfig['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
        $pagenav = new XoopsPageNav( $new_array_count, $xoopsModuleConfig['admin_perpage'], $start, 'start' );
        echo '<div align="right" style="padding: 8px;">' . $page . '' . $pagenav -> renderNav() . '</div>';
        xoops_cp_footer();
        break;
} 

?>