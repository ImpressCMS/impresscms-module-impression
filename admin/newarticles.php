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
$aid = intval( impression_cleanRequestVars( $_REQUEST, 'aid', '' ) );
$requestid = intval( impression_cleanRequestVars( $_REQUEST, 'requestid', 0 ) );

switch ( strtolower( $op ) ) {
    case 'approve':

        $sql = 'SELECT cid, title, notifypub FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid=' . $aid;
        if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
            icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        list( $cid, $title, $notifypub ) = icms::$xoopsDB -> fetchRow( $result );
		
		$publisher = icms::$user -> getVar('uname');
        // Update the database
        $sql2 = "UPDATE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " SET published=" . time() .", status='0', publisher='$publisher' WHERE aid=" . $aid;
		if ( !$result = icms::$xoopsDB -> queryF( $sql2 ) ) {
            icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        }

		$tags = array();
        $tags['ARTICLE_NAME'] = $title;
        $tags['ARTICLE_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?aid=' . $aid;
		
        $sql3 = 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $cid;
        if ( !$result = icms::$xoopsDB -> query( $sql3 ) ) {
            icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
        } else {
            $row = icms::$xoopsDB -> fetchArray( $result );
            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL'] = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/viewcat.php?cid=' . $cid;
            $notification_handler = icms::handler( 'icms_data_notification' );
            $notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
            $notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
            if ( intval( $notifypub ) == 1 ) {
                $notification_handler -> triggerEvent( 'article', $aid, 'approve', $tags );
            } 
        }
        redirect_header( 'newarticles.php', 1, _AM_IMPRESSION_SUB_NEWFILECREATED );
        break;

    case 'main':
    default:

        $start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
        $sql = 'SELECT * FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status=3 ORDER BY aid DESC';
        if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
            icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        $new_array = icms::$xoopsDB -> query( $sql, icms::$module -> config['admin_perpage'], $start );
        $new_array_count = icms::$xoopsDB -> getRowsNum( icms::$xoopsDB -> query( $sql ) );

        icms_cp_header();
        impression_adminmenu( '', _AM_IMPRESSION_SUB_SUBMITTEDFILES );

        echo '  <fieldset style="border: #e8e8e8 1px solid;">
				<legend style="display: inline; font-weight: bold; color: #0A3760; font-size: 12px;">' . _AM_IMPRESSION_SUB_FILESWAITINGINFO . '</legend>
				<div style="padding: 8px;">
                <span>' . _AM_IMPRESSION_SUB_FILESWAITINGVALIDATION . '<b>' . $new_array_count . '</b><br /><br /><span>

                <span>
				' . $imagearray['approve'] . ' ' . _AM_IMPRESSION_SUB_APPROVEWAITINGFILE . '<br />
                ' . $imagearray['editimg'] . ' ' . _AM_IMPRESSION_SUB_EDITWAITINGFILE . '<br />
                ' . $imagearray['deleteimg'] . ' ' . _AM_IMPRESSION_SUB_DELETEWAITINGFILE . '</span>
                </div></fieldset><br />';

        echo '<table width="100%" cellspacing="1" class="outer">
				<tr style="text-align: center; font-size: smaller;">
					<th>' . _AM_IMPRESSION_MINDEX_ID . '</th>
					<th style="text-align: left;">&nbsp;' . _AM_IMPRESSION_MINDEX_TITLE . '</th>
					<th>' . _AM_IMPRESSION_MINDEX_POSTER . '</th>
					<th>' . _AM_IMPRESSION_MINDEX_SUBMITTED . '</th>
					<th>' . _AM_IMPRESSION_MINDEX_ACTION . '</th>
				</tr>';
        if ( $new_array_count > 0 ) {
            while ( $new = icms::$xoopsDB -> fetchArray( $new_array ) ) {
                $aid = intval( $new['aid'] );
                $title = $impressionmyts -> htmlSpecialCharsStrip( $new['title'] );
                $submitter = icms_member_user_Handler::getUserLink( $new['uid'] );
                $datetime = impression_time( formatTimestamp( $new['date'], icms::$module -> config['dateformat'] ) );

                $icon = ( $new['published'] ) ? $approved : '<a href="newarticles.php?op=approve&amp;aid=' . $aid . '">' . $imagearray['approve'] . '</a>&nbsp;';
                $icon .= '<a href="index.php?op=edit&amp;aid=' . $aid . '">' . $imagearray['editimg'] . '</a>&nbsp;';
                $icon .= '<a href="index.php?op=delete&amp;aid=' . $aid . '">' . $imagearray['deleteimg'] . '</a>';

                echo '<tr style="font-size: smaller;">
						<td class="head" style="text-align: center;">'. $aid . '</td>
						<td class="even" nowrap><a href="newarticles.php?op=edit&amp;aid=' . $aid . '">' . $title. '</a></td>
						<td class="even" style="text-align: center;" nowrap>' . $submitter . '</td>
						<td class="even" style="text-align: center;">' . $datetime . '</td>
						<td class="even" style="text-align: center;" nowrap>' . $icon . '</td>
						</tr>';
            } 
        } else {
          echo '<tr><td style="text-align: center;" class="head" colspan="5">' . _AM_IMPRESSION_SUB_NOFILESWAITING . '</td></tr>';
        } 
        echo '</table>';

        include_once ICMS_ROOT_PATH . '/class/pagenav.php';
        $page = ( $new_array_count > icms::$module -> config['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
        $pagenav = new icms_view_PageNav( $new_array_count, icms::$module -> config['admin_perpage'], $start, 'start' );
        echo '<div align="right" style="padding: 8px;">' . $page . '' . $pagenav -> renderNav() . '</div>';
        icms_cp_footer();
        break;
} 
?>