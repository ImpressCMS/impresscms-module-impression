<?php
/**
 * $Id: votedata.php
 * Module: Impression
 */

include 'admin_header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$rid = impression_cleanRequestVars( $_REQUEST, 'rid', 0 );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );

switch ( strtolower($op) )
{
    case "delvote":
        $sql = "DELETE FROM " . $xoopsDB -> prefix( 'impression_votedata' ) . " WHERE ratingid=" . $rid;
        $result = $xoopsDB -> queryF( $sql );
        impression_updaterating( $aid );
        redirect_header( "votedata.php", 1, _AM_IMPRESSION_VOTEDELETED );
        break;

    case 'main':
    default:
	    $start = impression_cleanRequestVars( $_REQUEST, 'start', 0 );
        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_VOTE_RATINGINFOMATION );
        $_vote_data = getVoteDetails( $aid );

        $text_info = "
		<table width='100%'>
		 <tr>
		  <td width='50%' valign='top'>
		   <div><b>" . _AM_IMPRESSION_VOTE_TOTALRATE . ": </b>" . intval( $_vote_data['rate'] ) . "</div>
		   <div><b>" . _AM_IMPRESSION_VOTE_USERAVG . ": </b>" . intval( round( $_vote_data['avg_rate'], 2 ) ) . "</div>
		   <div><b>" . _AM_IMPRESSION_VOTE_MAXRATE . ": </b>" . intval( $_vote_data['min_rate'] ) . "</div>
		   <div><b>" . _AM_IMPRESSION_VOTE_MINRATE . ": </b>" . intval( $_vote_data['max_rate'] ) . "</div>
		  </td>
		  <td>		 
		   <div><b>" . _AM_IMPRESSION_VOTE_MOSTVOTEDTITLE . ": </b>" . intval( $_vote_data['max_title'] ) . "</div>
           <div><b>" . _AM_IMPRESSION_VOTE_LEASTVOTEDTITLE . ": </b>" . intval( $_vote_data['min_title'] ) . "</div>
		   <div><b>" . _AM_IMPRESSION_VOTE_REGISTERED . ": </b>" . ( intval( $_vote_data['rate'] - $_vote_data['null_ratinguser'] ) ) . "</div>
		   <div><b>" . _AM_IMPRESSION_VOTE_NONREGISTERED . ": </b>" . intval( $_vote_data['null_ratinguser'] ) . "</div>
		  </td>
		 </tr>
		</table>";

        echo "
		<fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_VOTE_DISPLAYVOTES . "</legend>\n
		<div style='padding: 8px;'>$text_info</div>\n	
		<div style='padding: 8px;'><li>" . $imagearray['deleteimg'] . " " . _AM_IMPRESSION_VOTE_DELETEDSC . "</li></div>\n
		</fieldset>\n
		<br />\n

		<table width='100%' cellspacing='1' cellpadding='2' class='outer'>\n
		<tr>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_VOTE_ID . "</th>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_VOTE_USER . "</th>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_VOTE_IP . "</th>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_VOTE_FILETITLE . "</th>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_VOTE_RATING . "</th>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_VOTE_DATE . "</th>\n
		<th style='text-align: center;'>" . _AM_IMPRESSION_MINDEX_ACTION . "</th></tr>\n";

        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_votedata' );
        if ( $aid > 0 )
        {
            $sql .= " WHERE aid=" . $aid;
        } 
        $sql .= " ORDER BY ratingtimestamp DESC";

        $results = $xoopsDB -> query( $sql, $xoopsModuleConfig['admin_perpage'], $start );
        $votes = $xoopsDB -> getRowsNum( $xoopsDB -> query( $sql ) );

        if ( $votes == 0 )
        {
            echo "<tr><td style='text-align: center;' colspan='7' class='head'>" . _AM_IMPRESSION_VOTE_NOVOTES . "</td></tr>";
        } 
        else
        {
            while ( list( $ratingid, $aid, $ratinguser, $rating, $ratinghostname, $ratingtimestamp, $title ) = $xoopsDB -> fetchRow( $results ) )
            {
                $formatted_date = formatTimestamp( $ratingtimestamp, $xoopsModuleConfig['dateformat'] );
                $ratinguname = XoopsUser :: getUnameFromId( $ratinguser );
                echo "
					<tr style='text-align: center;'>\n
					<td class='head'>$ratingid</td>\n
					<td class='even'>$ratinguname</td>\n
					<td class='even'>$ratinghostname</td>\n
					<td class='even'>$title</td>\n
					<td class='even'>$rating</td>\n
					<td class='even'>$formatted_date</td>\n
					<td class='even'><a href='votedata.php?op=delvote&amp;aid=".$aid."&amp;rid=".$ratingid."'>" . $imagearray['deleteimg'] . "</a></td>\n
					</tr>\n";
            } 
        } 
        echo "</table>"; 
        // Include page navigation
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $page = ( $votes > $xoopsModuleConfig['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
        $pagenav = new XoopsPageNav( $page, $xoopsModuleConfig['admin_perpage'], $start, 'start' );
        echo '<div align="right" style="padding: 8px;">' . $page . '' . $pagenav -> renderNav() . '</div>';
        break;
} 
xoops_cp_footer();

?>