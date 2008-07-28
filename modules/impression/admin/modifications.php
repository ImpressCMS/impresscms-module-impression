<?php
/**
 * $Id: modifications.php
 * Module: Impression
 */

include 'admin_header.php';

global $mytree, $xoopsModuleConfig;

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$requestid = impression_cleanRequestVars( $_REQUEST, 'requestid', 0 );

switch ( strtolower( $op ) ) {
    case "listmodreqshow":

        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_MOD_MODREQUESTS );

        $sql = "SELECT modifysubmitter, requestid, aid, cid, title, introtext, description, screenshot, urlrating FROM " . $xoopsDB -> prefix( 'impression_mod' ) . " WHERE requestid=" . $requestid;
        $mod_array = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
        unset( $sql );

        $sql = "SELECT submitter, aid, cid, title, introtext, description, screenshot, urlrating FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . $mod_array['aid'] ;
        $orig_array = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
        unset( $sql );

        $orig_user = new XoopsUser( $orig_array['submitter'] );
        $submittername = xoops_getLinkedUnameFromId( $orig_array['submitter'] );
        $submitteremail = $orig_user -> getUnameFromId( "email" );

        echo "<div><b>" . _AM_IMPRESSION_MOD_MODPOSTER . "</b> $submittername</div>";
        $not_allowed = array( "aid", "submitter", "requestid", "modifysubmitter" );
        $sform = new XoopsThemeForm( _AM_IMPRESSION_MOD_ORIGINAL, "storyform", "index.php" );
        foreach ( $orig_array as $key => $content ) {
            if ( in_array( $key , $not_allowed ) ) {
                continue;
            } 
            $lang_def = constant( "_AM_IMPRESSION_MOD_" . strtoupper( $key ) );

            if ( $key == "cid" ) {
                $sql = "SELECT title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $content;
                $row = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
                $content = $row['title'];
            } 

            if ( $key == "urlrating" ) {
                $urlrating_array = impression_rating_system();
                $content = $urlrating_array[ $content ];
            } 
            $sform -> addElement( new XoopsFormLabel( $lang_def, $content ) );
        } 
        $sform -> display();

        $orig_user = new XoopsUser( $mod_array['modifysubmitter'] );
        $submittername = xoops_getLinkedUnameFromId( $mod_array['modifysubmitter'] );
        $submitteremail = $orig_user -> getUnameFromId( "email" );

        echo "<div><b>" . _AM_IMPRESSION_MOD_MODIFYSUBMITTER . "</b> $submittername</div>";
        $sform = new XoopsThemeForm( _AM_IMPRESSION_MOD_PROPOSED, "storyform", "modifications.php" );
        foreach ( $mod_array as $key => $content ) {
            if ( in_array( $key, $not_allowed ) ) {
                Continue;
            } 
            $lang_def = constant( "_AM_IMPRESSION_MOD_" . strtoupper( $key ) );

            if ( $key == "cid" ) {
                $sql = "SELECT title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $content;
                $row = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
                $content = $row['title'];
            } 
 
            if ( $key == "urlrating" ) {
                $urlrating_array = impression_rating_system();
                $content = $urlrating_array[ $content ];
            } 
            $sform -> addElement( new XoopsFormLabel( $lang_def, $content ) );
        } 
        $button_tray = new XoopsFormElementTray( '', '' );
        $button_tray -> addElement( new XoopsFormHidden( 'requestid', $requestid ) );
        $button_tray -> addElement( new XoopsFormHidden( 'aid', $mod_array['requestid'] ) );
        $hidden = new XoopsFormHidden( 'op', 'changemodreq' );
        $button_tray -> addElement( $hidden );
        if ( $mod_array ) {
            $butt_dup = new XoopsFormButton( '', '', _AM_IMPRESSION_BAPPROVE, 'submit' );
            $butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'changemodreq\'"' );
            $button_tray -> addElement( $butt_dup );
        } 
        $butt_dupct2 = new XoopsFormButton( '', '', _AM_IMPRESSION_BIGNORE, 'submit' );
        $butt_dupct2 -> setExtra( 'onclick="this.form.elements.op.value=\'ignoremodreq\'"' );
        $button_tray -> addElement( $butt_dupct2 );
        $sform -> addElement( $button_tray );
        $sform -> display();
        xoops_cp_footer();
        break;

    case "changemodreq":
        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_mod' ) . " WHERE requestid=" . $requestid;
        $article_array = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );

        $aid = $article_array['aid'];
        $cid = $article_array['cid'];
        $title = $article_array['title'];
        $publisher = $xoopsUser -> uname();
        $screenshot = $article_array['screenshot'];
        $introtext = $article_array['introtext'];
        $description = $article_array['description'];
        $submitter = $article_array['modifysubmitter'];
        $urlrating = $article_array['urlrating'];
        $keywords = $article_array['keywords'];
        $updated = time();

        $xoopsDB -> query( "UPDATE " . $xoopsDB -> prefix( 'impression_articles' ) . " SET cid = $cid, title='$title', submitter='$submitter', screenshot='', publisher='$publisher', status='2', updated='$updated', introtext='$introtext', description='$description', urlrating='$urlrating', keywords='$keywords' WHERE aid = " . $aid );
        $sql = "DELETE FROM " . $xoopsDB -> prefix( 'impression_mod' ) . " WHERE requestid=" . $requestid;
        $result = $xoopsDB -> query( $sql );
        redirect_header( 'index.php', 1, _AM_IMPRESSION_MOD_REQUPDATED );
        break;

    case "ignoremodreq":
        $sql = sprintf( "DELETE FROM " . $xoopsDB -> prefix( 'impression_mod' ) . " WHERE requestid=" . $requestid );
        $xoopsDB -> query( $sql );
        redirect_header( 'index.php', 1, _AM_IMPRESSION_MOD_REQDELETED );
        break;

    case 'main':
    default:

        $start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;
        $mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_mod' ), "requestid", 0 );
        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_mod' ) . " ORDER BY requestdate DESC" ;
        $result = $xoopsDB -> query( $sql, $xoopsModuleConfig['admin_perpage'] , $start );
        $totalmodrequests = $xoopsDB -> getRowsNum( $xoopsDB -> query( $sql ) );

        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_MOD_MODREQUESTS );
        echo "<fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_MOD_MODREQUESTSINFO . "</legend>\n";
        echo "<div style='padding: 8px;'>" . _AM_IMPRESSION_MOD_TOTMODREQUESTS . " <b>$totalmodrequests</></div>\n";
        echo "</fieldset><br />\n";

        echo "<table width='100%' cellspacing='1' class='outer'>\n";
        echo "<tr style='text-align: center;'>\n";
        echo "<th>" . _AM_IMPRESSION_MOD_MODID . "</th>\n";
        echo "<th style='text-align: left;'>" . _AM_IMPRESSION_MOD_MODTITLE . "</th>\n";
        echo "<th>" . _AM_IMPRESSION_MOD_MODIFYSUBMIT . "</th>\n";
        echo "<th>" . _AM_IMPRESSION_MOD_DATE . "</th>\n";
        echo "<th>" . _AM_IMPRESSION_MINDEX_ACTION . "</th>\n";
        echo "</tr>\n";
        if ( $totalmodrequests > 0 ) {
            while ( $article_arr = $xoopsDB -> fetchArray( $result ) ) {
                $path = $mytree -> getNicePathFromId( $article_arr['requestid'], "title", "modifications.php?op=listmodreqshow&requestid" );
                $path = str_replace( "/", "", $path );
                $path = str_replace( ":", "", trim( $path ) );
                $title = trim( $path );
                $submitter = xoops_getLinkedUnameFromId( $article_arr['modifysubmitter'] );;
                $requestdate = formatTimestamp( $article_arr['requestdate'], $xoopsModuleConfig['dateformat'] );

                echo "<tr style='text-align: center;'>\n";
                echo "<td class='head'>" . $article_arr['requestid'] . "</td>\n";
                echo "<td class='even' style='text-align: left;'>" . $title . "</td>\n";
                echo "<td class='even'>" . $submitter . "</td>\n";
                echo "<td class='even'>" . $requestdate . "</td>\n";
                echo "<td class='even'> <a href='modifications.php?op=listmodreqshow&amp;requestid=" . $article_arr['requestid'] . "'>" . $imagearray['view'] . "</a></td>\n";
                echo "</tr>\n";
            } 
        } else {
            echo "<tr style='text-align: center;'><td class='head' colspan='7'>" . _AM_IMPRESSION_MOD_NOMODREQUEST . "</td></tr>";
        } 
        echo "</table>\n";

        include_once ICMS_ROOT_PATH . '/class/pagenav.php';
//        $page = ( $totalmodrequests > $xoopsModuleConfig['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
        $pagenav = new XoopsPageNav( $totalmodrequests, $xoopsModuleConfig['admin_perpage'], $start, 'start' );
        echo "<div style='text-align: right; padding: 8px;'>" . $pagenav -> renderNav() . '</div>';
        xoops_cp_footer();
} 

?>