<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /admin/brokenarticle.php
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

global $imagearray, $xoopsModule;

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );

switch ( strtolower( $op ) ) {
    case "updatenotice":
        $ack = impression_cleanRequestVars( $_REQUEST, 'ack', 0 );
        $con = impression_cleanRequestVars( $_REQUEST, 'con', 1 );

        if ( $ack && !$con ) {
            $acknowledged = ( $ack == 0 ) ? 1 : 0;
            $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_broken' ) . " SET acknowledged=" . $acknowledged;
            if ( $acknowledged == 0 ) {
                $sql .= ", confirmed=0 ";
            } 
            $sql .= " WHERE aid=" . $aid;
            if ( !$result = $xoopsDB -> queryF( $sql ) ) {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            } 

            $update_mess = _AM_IMPRESSION_BROKEN_NOWACK;
        } 

        if ( $con ) {
            $confirmed = ( $con == 0 ) ? 1 : 0;
            $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_broken' ) . " SET confirmed=" . $confirmed;
            if ( $confirmed == 1 ) {
                $sql .= ", acknowledged=" . $confirmed;
            } 
            $sql .= " WHERE aid=" . $aid;
            if ( !$result = $xoopsDB -> queryF( $sql ) ) {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            } 
            $update_mess = _AM_IMPRESSION_BROKEN_NOWCON;
        } 
        redirect_header( "brokenarticle.php?op=default", 1, $update_mess );
        break;

    case "delbrokenarticles":
        $xoopsDB -> queryF( "DELETE FROM " . $xoopsDB -> prefix( 'impression_broken' ) . " WHERE aid=" . $aid );
        $xoopsDB -> queryF( "DELETE FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . $aid );
        redirect_header( "brokenarticle.php?op=default", 1, _AM_IMPRESSION_BROKENFILEDELETED );
        exit();
        break;

    case "ignorebrokenarticles":
        $xoopsDB -> queryF( "DELETE FROM " . $xoopsDB -> prefix( 'impression_broken' ) . " WHERE aid=" . $aid );
        redirect_header( "brokenarticle.php?op=default", 1, _AM_IMPRESSION_BROKEN_FILEIGNORED );
        break;

    default:
        $result = $xoopsDB -> query( "SELECT * FROM " . $xoopsDB -> prefix( 'impression_broken' ) . " ORDER BY reportid" );
        $totalbrokenarticles = $xoopsDB -> getRowsNum( $result );

        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_BROKEN_FILE );
        echo "
		<fieldset>
		 <legend style='font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_BROKEN_REPORTINFO . "</legend>\n
		  <div style='padding: 8px;'>" . _AM_IMPRESSION_BROKEN_REPORTSNO . "&nbsp;<b>$totalbrokenarticles</b><div>\n
		  <div style='padding: 8px;'>\n
		   <ul>
		    <li>" . $imagearray['ignore'] . " " . _AM_IMPRESSION_BROKEN_IGNOREDESC . "</li>\n
		    <li>" . $imagearray['editimg'] . " " . _AM_IMPRESSION_BROKEN_EDITDESC . "</li>
		    <li>" . $imagearray['deleteimg'] . " " . _AM_IMPRESSION_BROKEN_DELETEDESC . "</li>\n
		   </ul>
		  </div>\n
		 </fieldset>
		<br />\n

		<table width='100%' border='0' cellspacing='1' cellpadding='2' class='outer'>\n
		<tr style='text-align: center;'>\n
		<th width='3%' style='text-align: center;'>" . _AM_IMPRESSION_BROKEN_ID . "</th>\n
		<th width='35%' style='text-align: left;'>" . _AM_IMPRESSION_BROKEN_TITLE . "</th>\n
		<th>" . _AM_IMPRESSION_BROKEN_REPORTER . "</th>\n
		<th>" . _AM_IMPRESSION_BROKEN_FILESUBMITTER . "</th>\n
		<th>" . _AM_IMPRESSION_BROKEN_DATESUBMITTED . "</th>\n
		<th>" . _AM_IMPRESSION_BROKEN_ACKNOWLEDGED . "</th>\n
		<th>" . _AM_IMPRESSION_BROKEN_DCONFIRMED . "</th>\n		
		<th style='text-align: center;'>" . _AM_IMPRESSION_BROKEN_ACTION . "</th>\n
		</tr>\n";

        if ( $totalbrokenarticles == 0 ) {
            echo "<tr style='text-align: center;'><td style='text-align: center;' class='head' colspan='8'>" . _AM_IMPRESSION_BROKEN_NOFILEMATCH . "</td></tr>";
        } else {
            while ( list( $reportid, $aid, $sender, $ip, $date, $confirmed, $acknowledged ) = $xoopsDB -> fetchRow( $result ) ) {
                $result2 = $xoopsDB -> query( "SELECT cid, title, url, submitter FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=$aid" );
                list( $cid, $articleshowname, $url, $submitter ) = $xoopsDB -> fetchRow( $result2 );
                if ( $sender != 0 ) {
                    $result3 = $xoopsDB -> query( "SELECT uname, email FROM " . $xoopsDB -> prefix( "users" ) . " WHERE uid=" . $sender . "" );
                    list( $sendername, $email ) = $xoopsDB -> fetchRow( $result3 );
                } 
                $result4 = $xoopsDB -> query( "SELECT uname, email FROM " . $xoopsDB -> prefix( "users" ) . " WHERE uid=" . $sender . "" );
                list( $ownername, $owneremail ) = $xoopsDB -> fetchRow( $result4 );

                $ack_image = ( $acknowledged ) ? $imagearray['ack_yes'] : $imagearray['ack_no'];
                $con_image = ( $confirmed ) ? $imagearray['con_yes'] : $imagearray['con_no'];

                echo "<tr style='text-align: center;'>\n";
                echo "<td class='head'>$reportid</td>\n";
                echo "<td class='even' style='text-align: left;'><a href='" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/singlearticle.php?cid=" . $cid . "&amp;aid=" . $aid . "' target='_blank'>" . $articleshowname . "</a></td>\n";

                if ( $email == "" ) {
                    echo "<td class='even'>$sendername ($ip)";
                } else {
                    echo "<td class='even'><a href='mailto:$email'>$sendername</a> ($ip)";
                } 
                if ( $owneremail == '' ) {
                    echo "<td class='even'>$ownername";
                } else {
                    echo "<td class='even'><a href='mailto:$owneremail'>$ownername</a>";
                } 
                echo "</td>\n";
                echo "<td class='even' style='text-align: center;'>" . formatTimestamp( $date, $xoopsModuleConfig['dateformatadmin'] ) . "</td>\n";
                echo "<td class='even'><a href='brokenarticle.php?op=updateNotice&amp;aid=$aid&amp;ack=$acknowledged'>" . $ack_image . " </a></td>\n";
                echo "<td class='even'><a href='brokenarticle.php?op=updateNotice&amp;aid=" . $aid . "&con=" . intval( $confirmed ) . "'>" . $con_image . "</a></td>\n";
                echo "<td class='even' style='text-align: center;' nowrap>\n";
                echo "<a href='brokenarticle.php?op=ignoreBrokenarticles&amp;aid=" . $aid . "'>" . $imagearray['ignore'] . "</a>\n";
                echo "<a href='index.php?op=edit&amp;aid=" . $aid . "'>" . $imagearray['editimg'] . "</a>\n";
                echo "<a href='brokenarticle.php?op=delBrokenarticles&amp;aid=" . $aid . "'>" . $imagearray['deleteimg'] . "</a>\n";
                echo "</td></tr>\n";
            } 
        } 
        echo"</table>";
} 
xoops_cp_footer();

?>
