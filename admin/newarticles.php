<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/newarticles.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since			1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links 
* @since			1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since			1.00
* @author		McDonald
* @version		$Id$
*/

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', '' );
$requestid = impression_cleanRequestVars( $_REQUEST, 'requestid', 0 );

switch ( strtolower( $op ) ) {
    case 'approve':

        global $xoopsModule;
        $sql = 'SELECT cid, title, publisher FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        list( $cid, $title, $publisher ) = $xoopsDB -> fetchRow( $result );

        // Update the database
        $xoopsDB -> queryF( 'UPDATE ' . $xoopsDB -> prefix( 'impression_articles' ) . ' SET published=' . time() .', status=0, publisher=' . $publisher . ' WHERE aid=' . $aid );

        $sql = 'SELECT title FROM ' . $xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
        } 

        redirect_header( 'newarticles.php', 1, _AM_IMPRESSION_SUB_NEWFILECREATED );
        break;

    case 'main':
    default:

        global $xoopsModuleConfig;

        $start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
        $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status=3 ORDER BY aid DESC';
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        $new_array = $xoopsDB -> query( $sql, $xoopsModuleConfig['admin_perpage'], $start );
        $new_array_count = $xoopsDB -> getRowsNum( $xoopsDB -> query( $sql ) );

        xoops_cp_header();
        impression_adminmenu( '', _AM_IMPRESSION_SUB_SUBMITTEDFILES );

        echo "  <fieldset style='border: #e8e8e8 1px solid;'>
				<legend style='display: inline; font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_SUB_FILESWAITINGINFO . "</legend>\n
                <span style='padding: 12px;'><br />" . _AM_IMPRESSION_SUB_FILESWAITINGVALIDATION . "<b>$new_array_count</b><br /><br /><span>\n

                <div style='padding: 8px;'><li>&nbsp;&nbsp;" . $imagearray['approve'] . " " . _AM_IMPRESSION_SUB_APPROVEWAITINGFILE . "<br />
                <li>&nbsp;&nbsp;" . $imagearray['editimg'] . " " . _AM_IMPRESSION_SUB_EDITWAITINGFILE . "<br />
                <li>&nbsp;&nbsp;" . $imagearray['deleteimg'] . " " . _AM_IMPRESSION_SUB_DELETEWAITINGFILE . "</div>\n
                </fieldset><br />\n
              ";

        echo "<table width='100%' cellspacing='1' class='outer'>\n";
        echo "<tr style='text-align: center;'>\n";
        echo "<th><small>" . _AM_IMPRESSION_MINDEX_ID . "</small></th>\n";
        echo "<th style='text-align: left;'><small>" . _AM_IMPRESSION_MINDEX_TITLE . "</small></th>\n";
        echo "<th><small>" . _AM_IMPRESSION_MINDEX_POSTER . "</small></th>\n";
        echo "<th><small>" . _AM_IMPRESSION_MINDEX_SUBMITTED . "</small></th>\n";
        echo "<th><small>" . _AM_IMPRESSION_MINDEX_ACTION . "</small></th>\n";
        echo "</tr>\n";
        if ( $new_array_count > 0 ) {
            while ( $new = $xoopsDB -> fetchArray( $new_array ) ) {
                $aid = intval( $new['aid'] );
                $title = $impressionmyts -> htmlSpecialCharsStrip( $new['title'] );
                $submitter = icms_getLinkedUnameFromId( $new['submitter'] );
                $datetime = formatTimestamp( $new['date'], $xoopsModuleConfig['dateformat'] );

                $icon = ( $new['published'] ) ? $approved : "<a href='newarticles.php?op=approve&amp;aid=" . $aid . "'>" . $imagearray['approve'] . "</a>&nbsp;";
                $icon .= "<a href='index.php?op=edit&amp;aid=" . $aid . "'>" . $imagearray['editimg'] . "</a>&nbsp;";
                $icon .= "<a href='index.php?op=delete&amp;aid=" . $aid . "'>" . $imagearray['deleteimg'] . "</a>";

                echo "<tr>\n";
                echo "<td class='head' style='text-align: center;'><small>$aid</small></td>\n";
                echo "<td class='even' nowrap><a href='newarticles.php?op=edit&amp;aid=" . $aid . "'><small>$title</small></a></td>\n";
                echo "<td class='even' style='text-align: center;' nowrap><small>$submitter</small></td>\n";
                echo "<td class='even' style='text-align: center;'><small>$datetime</small></td>\n";
                echo "<td class='even' style='text-align: center;' nowrap>$icon</td>\n";
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