<?php
/**
 * $Id: submit.php
 * Module: Impression
 */

include 'header.php';
include XOOPS_ROOT_PATH . '/header.php';
include XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );
global $xoopsModule, $impressionmyts, $xoopsModuleConfig;

$xoopsTpl->assign("xoops_module_header", '<link rel="stylesheet" type="text/css" href="' . impression_url . '/impressionstyle.css" />');

$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$cid = intval($cid);
$aid = intval($aid);

if ( false == checkgroups( $cid, 'ImpressionSubPerm' ) ) {
    redirect_header( "index.php", 1, _MD_IMPRESSION_NOPERMISSIONTOPOST );
    exit();
} 

if ( true == checkgroups( $cid, 'ImpressionSubPerm' ) ) {
    if ( impression_cleanRequestVars( $_REQUEST, 'submit', 0 ) ) {
        if ( false == checkgroups( $cid, 'ImpressionSubPerm' ) ) {
            redirect_header( "index.php", 1, _MD_IMPRESSION_NOPERMISSIONTOPOST );
            exit();
        } 

        $submitter = ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) ? $xoopsUser -> getVar( 'uid' ) : 0;
        $offline = impression_cleanRequestVars( $_REQUEST, 'offline', 0 );
//        $notifypub = impression_cleanRequestVars( $_REQUEST, 'notifypub', 0 );
        $approve = impression_cleanRequestVars( $_REQUEST, 'approve', 0 );
        $title = $impressionmyts -> addslashes( ltrim( $_REQUEST["title"] ) );
        $introtextb = $impressionmyts -> addslashes( ltrim( $_REQUEST["introtextb"] ) );
        $descriptionb = $impressionmyts -> addslashes( ltrim( $_REQUEST["descriptionb"] ) );
        $meta_keywords = $impressionmyts -> addslashes( ltrim( $_REQUEST["meta_keywords"] ) );
        $date = time();
        $publishdate = time();
        $ipaddress = $_SERVER['REMOTE_ADDR'];

        if ( $aid == 0 ) {
            $status = 1;
            $date = time();
            $message = _MD_IMPRESSION_THANKSFORINFO;
            if ( true == checkgroups( $cid, 'ImpressionAutoApp' ) ) {
                $date = time();
                $status = 0;
                $message = _MD_IMPRESSION_ISAPPROVED;
            } 
            $sql = "INSERT INTO " . $xoopsDB -> prefix( 'impression_articles' ) . "	(aid, cid, title, submitter, status, published, introtext, description, ipaddress, meta_keywords) ";
            $sql .= " VALUES 	('', $cid, '$title', '$submitter', '$status', '$date', '$introtextb', '$descriptionb', '$ipaddress', '$meta_keywords')";
            if ( !$result = $xoopsDB -> query( $sql ) ) {
                $_error = $xoopsDB -> error() . " : " . $xoopsDB -> errno();
                XoopsErrorHandler_HandleError( E_USER_WARNING, $_error, __FILE__, __LINE__ );
            } 
            $newid = $xoopsDB -> getInsertId();


            // Notify of new link (anywhere) and new link in category
            $notification_handler = &xoops_gethandler( 'notification' );

            $tags = array();
            $tags['ARTICLE_NAME'] = $title;
            $tags['ARTICLE_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $cid . '&amp;aid=' . $newid;
            
            $sql = "SELECT title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $cid;
            $result = $xoopsDB -> query( $sql );
            $row = $xoopsDB -> fetchArray( $result );

            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/catview.php?cid=' . $cid;
            if ( true == checkgroups( $cid, 'ImpressionAutoApp' ) ) {
                $notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
                $notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
                redirect_header( 'index.php', 2, _MD_IMPRESSION_ISAPPROVED );
            } else {
                $tags['WAITINGFILES_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/newarticles.php';
                $notification_handler -> triggerEvent( 'global', 0, 'article_submit', $tags );
                $notification_handler -> triggerEvent( 'category', $cid, 'article_submit', $tags );
                if ( $notifypub ) {
                    include_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
                    $notification_handler -> subscribe( 'article', $newid, 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE );
                } 
                redirect_header( 'index.php', 2, _MD_IMPRESSION_THANKSFORINFO );
            } 
        } else {
            if ( true == checkgroups( $cid, 'ImpressionAutoApp' ) || $approve == 1 ) {
                $updated = time();
                $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_articles' ) . " SET cid=$cid, title='$title', publisher='$publisher', status='$status', published='$published', introtext='$introtextb', description='$descriptionb', meta_keywords='$meta_keywords' WHERE aid=" . $aid;
                if ( !$result = $xoopsDB -> query( $sql ) ) {
                    $_error = $xoopsDB -> error() . " : " . $xoopsDB -> errno();
                    XoopsErrorHandler_HandleError( E_USER_WARNING, $_error, __FILE__, __LINE__ );
                } 

                $notification_handler = &xoops_gethandler( 'notification' );
                $tags = array();
                $tags['ARTICLE_NAME'] = $title;
                $tags['ARTICLE_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/singlearticle.php?cid=' . $cid . '&amp;aid=' . $aid;
                $sql = "SELECT title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $cid;
                $result = $xoopsDB -> query( $sql );
                $row = $xoopsDB -> fetchArray( $result );
                $tags['CATEGORY_NAME'] = $row['title'];
                $tags['CATEGORY_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/catview.php?cid=' . $cid;

                $notification_handler -> triggerEvent( 'global', 0, 'new_article', $tags );
                $notification_handler -> triggerEvent( 'category', $cid, 'new_article', $tags );
                $_message = _MD_IMPRESSION_ISAPPROVED;
            } else {
                $modifysubmitter = $xoopsUser -> uid();
                $requestid = $modifysubmitter;
                $requestdate = time();
                $updated = impression_cleanRequestVars( $_REQUEST, 'up_dated', time() );
                $sql = "INSERT INTO " . $xoopsDB -> prefix( 'impression_mod' ) . " (requestid, aid, cid, title, introtext, description, modifysubmitter, requestdate)";
                $sql .= " VALUES ('', $aid, $cid, '$title', '$introtextb', '$descriptionb', '$modifysubmitter', '$requestdate')";
                if ( !$result = $xoopsDB -> query( $sql ) ) {
                    $_error = $xoopsDB -> error() . " : " . $xoopsDB -> errno();
                    XoopsErrorHandler_HandleError( E_USER_WARNING, $_error, __FILE__, __LINE__ );
                } 

                $tags = array();
                $tags['MODIFYREPORTS_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=listModReq';
                $notification_handler = &xoops_gethandler( 'notification' );
                $notification_handler -> triggerEvent( 'global', 0, 'article_modify', $tags );

                $tags['WAITINGFILES_URL'] = XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/admin/index.php?op=listNewarticles';
                $notification_handler -> triggerEvent( 'global', 0, 'article_submit', $tags );
                $notification_handler -> triggerEvent( 'category', $cid, 'article_submit', $tags );
                if ( $notifypub ) {
                    include_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
                    $notification_handler -> subscribe( 'article', $newid, 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE );
                }
                $_message = _MD_IMPRESSION_THANKSFORINFO;
            }
            redirect_header( "index.php", 2, $_message );
        }
    } else {
        global $xoopsModuleConfig;

        $approve = impression_cleanRequestVars( $_REQUEST, 'approve', 0 );

	// Show disclaimer
        if ( $xoopsModuleConfig['showdisclaimer'] && !isset( $_GET['agree'] ) && $approve == 0 ) {
            echo "<br /><div style='text-align: center;'>" . impression_imageheader() . "</div><br />\n";
            echo "<h4>" . _MD_IMPRESSION_DISCLAIMERAGREEMENT . "</h4>\n";
            echo "<div>" . $impressionmyts -> displayTarea( $xoopsModuleConfig['disclaimer'], 1, 1, 1, 1, 1 ) . "</div>\n";
            echo "<form action='submit.php' method='post'>\n";
            echo "<div style='text-align: center;'>" . _MD_IMPRESSION_DOYOUAGREE . "</b><br /><br />\n";
            echo "<input type='button' onclick='location=\"submit.php?agree=1\"' class='formButton' value='" . _MD_IMPRESSION_AGREE . "' alt='" . _MD_IMPRESSION_AGREE . "' />\n";
            echo "&nbsp;\n";
            echo "<input type='button' onclick='location=\"index.php\"' class='formButton' value='" . _CANCEL . "' alt='" . _CANCEL . "' />\n";
            echo "</div></form>\n";
            include XOOPS_ROOT_PATH . '/footer.php';
            exit();
        }
        echo "<br /><div style='text-align: center;'>" . impression_imageheader() . "</div><br />\n";
        echo "<div>" . _MD_IMPRESSION_SUB_SNEWMNAMEDESC . "</div>\n<br />\n";
        echo "<div class='impression_background'>" . _MD_IMPRESSION_SUBMITCATHEAD . "</div>\n";
        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . intval( $aid );
        $article_array = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );

        $aid = $article_array['aid'] ? $article_array['aid'] : 0;
        $cid = $article_array['cid'] ? $article_array['cid'] : 0;
        $title = $article_array['title'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['title'] ) : '';
        $publisher = $article_array['publisher'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['publisher'] ) : '';
        $introtextb = $article_array['introtext'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['introtext'] ) : '';
        $descriptionb = $article_array['description'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['description'] ) : '';
        $published = $article_array['published'] ? $article_array['published'] : 0;
        $updated = $article_array['updated'] ? $article_array['updated'] : 0;
        $offline = $article_array['offline'] ? $article_array['offline'] : 0;
        $ipaddress = $article_array['ipaddress'] ? $article_array['ipaddress'] : 0;
//        $notifypub = $article_array['notifypub'] ? $article_array['notifypub'] : 0;
        $meta_keywords = $article_array['meta_keywords'] ? $impressionmyts -> htmlSpecialCharsStrip( $article_array['meta_keywords'] ) : '';

     	$sform = new XoopsThemeForm( '', "storyform", xoops_getenv( 'PHP_SELF' ) );
        $sform -> setExtra( 'enctype="multipart/form-data"' );
        
// Article title
        $sform -> addElement( new XoopsFormText( _MD_IMPRESSION_FILETITLE, 'title', 50, 255, $title ), true );

// Article publisher
//    $sform -> addElement( new XoopsFormText( _MD_IMPRESSION_ARTICLE_PUBLISHER, 'publisher', 50, 255, $publisher ), true );

// Select category
        $mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

        $submitcats = array();
        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " ORDER BY title";
        $result = $xoopsDB -> query( $sql );
        while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
            if ( true == checkgroups( $myrow['cid'], 'ImpressionSubPerm' ) ) {
                $submitcats[$myrow['cid']] = $myrow['title'];
            } 
        }
        
        ob_start();
    	        $mytree -> makeMySelBox( 'title', 'title', $cid, 0 );
    	        $sform -> addElement( new XoopsFormLabel( _MD_IMPRESSION_CATEGORYC, ob_get_contents() ) );
    	ob_end_clean();

// Article description form
        $introtext = impression_getWysiwygForm( _MD_IMPRESSION_INTROTEXTC, 'introtextb', $introtextb, 10, 50, '');
        $sform -> addElement( $introtext, true );

// Article description form
        $editor = impression_getWysiwygForm( _MD_IMPRESSION_DESCRIPTIONC, 'descriptionb', $descriptionb, 10, 50, '');
        $sform -> addElement( $editor, true );

// Meta meta_keywords form
        $keywords = new XoopsFormTextArea( _MD_IMPRESSION_KEYWORDS, 'meta_keywords', $meta_keywords, 7, 60);
        $keywords -> setDescription(  '<small>' . _MD_IMPRESSION_KEYWORDS_NOTE . '</small>' );
        $sform -> addElement( $keywords, false );

//        $option_tray = new XoopsFormElementTray( _MD_IMPRESSION_OPTIONS, '<br />' );

//        if ( !$approve ) {
//            $notify_checkbox = new XoopsFormCheckBox( '', 'notifypub' );
//            $notify_checkbox -> addOption( 1, _MD_IMPRESSION_NOTIFYAPPROVE );
//            $option_tray -> addElement( $notify_checkbox );
//        } else {
//            $sform -> addElement( new XoopsFormHidden( 'notifypub', 0 ) );
//        }

        if ( true == checkgroups( $cid, 'ImpressionAppPerm' ) && $aid > 0 ) {
            $approve_checkbox = new XoopsFormCheckBox( '', 'approve', $approve );
            $approve_checkbox -> addOption( 1, _MD_IMPRESSION_APPROVE );
            $option_tray -> addElement( $approve_checkbox );
        } else if ( true == checkgroups( $cid, 'ImpressionAutoApp' ) ) {
            $sform -> addElement( new XoopsFormHidden( 'approve', 1 ) );
        } else {
            $sform -> addElement( new XoopsFormHidden( 'approve', 0 ) );
        } 
        $sform -> addElement( $option_tray );

        $button_tray = new XoopsFormElementTray( '', '' );
        $button_tray -> addElement( new XoopsFormButton( '', 'submit', _SUBMIT, 'submit' ) );
        $button_tray -> addElement( new XoopsFormHidden( 'aid', $aid ) );

        $sform -> addElement( $button_tray );
        $sform -> display();

        include XOOPS_ROOT_PATH . '/footer.php';
    }
} else {
    redirect_header( 'index.php', 2, _MD_IMPRESSION_NOPERMISSIONTOPOST );
    exit();
} 
include_once("footer.php");
?>