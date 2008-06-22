<?php
/**
 * $Id: brokenarticle.php
 * Module: Impression
 */

include 'header.php';

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$aid = intval($aid);
$buttonn = _MD_IMPRESSION_SUBMITBROKEN;
$buttonn = strtolower($buttonn);

switch ( strtolower($op) ) {
    case $buttonn:
        global $xoopsUser;

        $sender = ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) ? $xoopsUser -> getVar( 'uid' ) : 0;
        $ip = getenv( "REMOTE_ADDR" );
        $title = impression_cleanRequestVars( $_REQUEST, 'title', '' );
        $title = $impressionmyts -> addslashes( $title );
        $time = time();

        // Check if REG user is trying to report twice.
        $result = $xoopsDB -> query( 'SELECT COUNT(*) FROM ' . $xoopsDB -> prefix( 'impression_broken' ) . ' WHERE aid=' . $aid );
        list ( $count ) = $xoopsDB -> fetchRow( $result );
        if ( $count > 0 ) {
            $ratemessage = _MD_IMPRESSION_ALREADYREPORTED;
            redirect_header( 'singlearticle.php?cid=' . intval($cid) . '&amp;aid=' . intval($aid), 2, $ratemessage );
            exit();
        } else {
            $reportid = 0;
            $sql = sprintf( "INSERT INTO %s (reportid, aid, sender, ip, date, confirmed, acknowledged, title ) VALUES ( %u, %u, %u, %s, %u, %u, %u, %s)", $xoopsDB -> prefix( 'impression_broken' ), $reportid, $aid, $sender, $xoopsDB -> quoteString( $ip ), $time, 0, 0, $xoopsDB -> quoteString( $title ) );
            if ( ! $result = $xoopsDB -> query( $sql ) ) {
                $error[] = _MD_IMPRESSION_ERROR;
            } 
            $newid = $xoopsDB -> getInsertId();

            // Send notifications
            $tags = array();
            $tags['BROKENREPORTS_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=listBrokenarticles';
            $notification_handler = &xoops_gethandler( 'notification' );
            $notification_handler -> triggerEvent( 'global', 0, 'article_broken', $tags );

            // Send email to the owner of the linkload stating that it is broken
            $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_videos' ) . " WHERE aid=" . $aid . " AND published > 0 AND published <= " . time() ;
            $article_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
            unset( $sql );

            $member_handler = &xoops_gethandler( 'member' );
            $submit_user = &$member_handler -> getUser( $article_arr['submitter'] );
            if ( is_object( $submit_user ) && !empty( $submit_user ) ) {
                $subdate = formatTimestamp( $article_arr['date'], $xoopsModuleConfig['dateformat'] );
                $cid = $article_arr['cid'];
                $title = $impressionmyts -> htmlSpecialCharsStrip( $article_arr['title'] );
                $subject = _MD_IMPRESSION_BROKENREPORTED;

                $xoopsMailer = &getMailer();
                $xoopsMailer -> useMail();
                $template_dir = XOOPS_ROOT_PATH . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/language/" . $xoopsConfig['language'] . "/mail_template";
                $xoopsMailer -> setTemplateDir( $template_dir );
                $xoopsMailer -> setTemplate( 'articlebroken_notify.tpl' );
                $xoopsMailer -> setToEmails( $submit_user -> getVar( 'email' ) );
                $xoopsMailer -> setFromEmail( $xoopsConfig['adminmail'] );
                $xoopsMailer -> setFromName( $xoopsConfig['sitename'] );
                $xoopsMailer -> assign( "X_UNAME", $submit_user -> getVar( 'uname' ) );
                $xoopsMailer -> assign( "SITENAME", $xoopsConfig['sitename'] );
                $xoopsMailer -> assign( "X_ADMINMAIL", $xoopsConfig['adminmail'] );
                $xoopsMailer -> assign( 'X_SITEURL', XOOPS_URL . '/' );
                $xoopsMailer -> assign( "X_TITLE", $title );
                $xoopsMailer -> assign( "X_SUB_DATE", $subdate );
                $xoopsMailer -> assign( 'X_ARTICLELOAD', XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $cid . '&amp;aid=' . $aid );
                $xoopsMailer -> setSubject( $subject );
                $message = ( $xoopsMailer -> send() ) ? _MD_IMPRESSION_BROKENREPORTED : _MD_IMPRESSION_ERRORSENDEMAIL;
            } else {
                $message = _MD_IMPRESSION_ERRORSENDEMAIL;
            } 
            redirect_header( 'singlearticle.php?cid=' . intval($cid) . '&amp;aid=' . intval($aid), 2, $message );
        } 
        break;

    default:

        $xoopsOption['template_main'] = 'impression_brokenarticle.html';
        include XOOPS_ROOT_PATH . '/header.php';

        $catarray['imageheader'] = impression_imageheader();
        $xoopsTpl -> assign( 'catarray', $catarray );

        $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE aid =' . $aid;
        $article_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
        unset( $sql );

        $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'impression_broken' ) . ' WHERE aid =' . $aid;
        $broke_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );

        if ( is_array( $broke_arr ) ) {
            $broken['title'] = $impressionmyts -> htmlSpecialCharsStrip( $article_arr['title'] );
            $broken['id'] = $broke_arr['reportid'];
            $broken['reporter'] = xoops_getLinkedUnameFromId( $broke_arr['sender']  );
            $broken['date'] = formatTimestamp( $broke_arr['date'], $xoopsModuleConfig['dateformat'] );
            $broken['acknowledged'] = ( $broke_arr['acknowledged'] == 1 ) ? _YES : _NO ;
            $broken['confirmed'] = ( $broke_arr['confirmed'] == 1 ) ? _YES : _NO ;
            $xoopsTpl -> assign( 'broken', $broken );
            $xoopsTpl -> assign( 'brokenreport', true );
        } else {
            if ( !is_array( $article_arr ) || empty($article_arr) ) {
                $ratemessage = _MD_IMPRESSION_THISFILEDOESNOTEXIST;
                redirect_header( 'singlearticle.php?cid=' . intval($cid) . '&amp;aid=' . intval($aid), 0 , $ratemessage );
                exit();
            } 

            // file info
            $article['title'] = $impressionmyts -> htmlSpecialCharsStrip( $article_arr['title'] );
            $time = ( $article_arr['published'] > 0 ) ? $article_arr['published'] : $link_arr['updated'];
            $article['updated'] = formatTimestamp( $time, $xoopsModuleConfig['dateformat'] );
            $is_updated = ( $article_arr['updated'] != 0 ) ? _MD_IMPRESSION_UPDATEDON : _MD_IMPRESSION_SUBMITDATE;
            $article['publisher'] = xoops_getLinkedUnameFromId($article_arr['submitter']  );

            $xoopsTpl -> assign( 'article_id', $aid );
            $xoopsTpl -> assign( 'lang_subdate' , $is_updated );
            $xoopsTpl -> assign( 'article', $article );
        } 
	    $xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
        include XOOPS_ROOT_PATH . '/footer.php';
        break;
} 

?>