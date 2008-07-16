<?php
/**
 * $Id: upload.php
 * Module: Impression
 */

include 'admin_header.php';

global $xoopsModuleConfig;

$op = ( isset( $_REQUEST['op'] ) && !empty( $_REQUEST['op'] ) ) ? $_REQUEST['op'] : '';
$rootpath = ( isset( $_GET['rootpath'] ) ) ? intval( $_GET['rootpath'] ) : 0;

switch ( strtolower($op) )
{
    case "upload":
        if ( $_FILES['uploadfile']['name'] != "" )
        {
            if ( file_exists( ICMS_ROOT_PATH . "/" . $_POST['uploadpath'] . "/" . $_FILES['uploadfile']['name'] ) )
            {
                redirect_header( 'upload.php', 2, _AM_IMPRESSION_ARTICLE_IMAGEEXIST );
            } 
            $allowed_mimetypes = array( 'image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png' );
            impression_uploading( $_FILES, $_POST['uploadpath'], $allowed_mimetypes, "upload.php", 1, 0 );
            redirect_header( "upload.php", 2 , _AM_IMPRESSION_ARTICLE_IMAGEUPLOAD );
            exit();
        } 
        else
        {
            redirect_header( 'upload.php', 2 , _AM_IMPRESSION_ARTICLE_NOIMAGEEXIST );
            exit();
        } 
        break;

    case "delfile":

        if ( isset( $_POST['confirm'] ) && $_POST['confirm'] == 1 )
        {
            $filetodelete = ICMS_ROOT_PATH . "/" . $_POST['uploadpath'] . "/" . $_POST['articlefile'];
            if ( file_exists( $filetodelete ) )
            {
                chmod( $filetodelete, 0666 );
                if ( @unlink( $filetodelete ) )
                {
                    redirect_header( 'upload.php', 1, _AM_IMPRESSION_ARTICLE_FILEDELETED );
                } 
                else
                {
                    redirect_header( 'upload.php', 1, _AM_IMPRESSION_ARTICLE_FILEERRORDELETE );
                } 
            } 
            exit();
        } 
        else
        {
            if ( empty( $_POST['articlefile'] ) )
            {
                redirect_header( 'upload.php', 1, _AM_IMPRESSION_ARTICLE_NOFILEERROR );
                exit();
            } 
            xoops_cp_header();
            xoops_confirm( array( 'op' => 'delfile', 'uploadpath' => $_POST['uploadpath'], 'articlefile' => $_POST['articlefile'], 'confirm' => 1 ), 'upload.php', _AM_IMPRESSION_ARTICLE_DELETEFILE . "<br /><br />" . $_POST['articlefile'], _AM_IMPRESSION_BDELETE );
        } 
        break;

    case "default":
    default:
        $displayimage = '';
        xoops_cp_header();

//        $dirarray = array( 1 => $xoopsModuleConfig['catimage'], 2 => $xoopsModuleConfig['screenshots'], 3 => $xoopsModuleConfig['mainimagedir'] );
//        $namearray = array( 1 => _AM_IMPRESSION_ARTICLE_CATIMAGE , 2 => _AM_IMPRESSION_ARTICLE_SCREENSHOTS, 3 => _AM_IMPRESSION_ARTICLE_MAINIMAGEDIR );
//        $listarray = array( 1 => _AM_IMPRESSION_ARTICLE_FCATIMAGE , 2 => _AM_IMPRESSION_ARTICLE_FSCREENSHOTS, 3 => _AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR );
        
        $dirarray = array( 1 => $xoopsModuleConfig['catimage'], 2 => $xoopsModuleConfig['mainimagedir'] );
        $namearray = array( 1 => _AM_IMPRESSION_ARTICLE_CATIMAGE , 2 => _AM_IMPRESSION_ARTICLE_MAINIMAGEDIR );
        $listarray = array( 1 => _AM_IMPRESSION_ARTICLE_FCATIMAGE , 2 => _AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR );

        impression_adminmenu( _AM_IMPRESSION_MUPLOADS );
        impression_serverstats();
        if ( $rootpath > 0 )
        {
            echo "<div><b>" . _AM_IMPRESSION_ARTICLE_FUPLOADPATH . "</b> " . ICMS_ROOT_PATH . "/" . $dirarray[$rootpath] . "</div>\n";
            echo "<div><b>" . _AM_IMPRESSION_ARTICLE_FUPLOADURL . "</b> " . ICMS_URL . "/" . $dirarray[$rootpath] . "</div><br />\n";
        } 
        $pathlist = ( isset( $listarray[$rootpath] ) ) ? $namearray[$rootpath] : '';
        $namelist = ( isset( $listarray[$rootpath] ) ) ? $namearray[$rootpath] : '';

        $iform = new XoopsThemeForm( _AM_IMPRESSION_ARTICLE_FUPLOADIMAGETO . $pathlist, "op", xoops_getenv( 'PHP_SELF' ) );
        $iform -> setExtra( 'enctype="multipart/form-data"' );
        ob_start();
        $iform -> addElement( new XoopsFormHidden( 'dir', $rootpath ) );
        impression_getDirSelectOption( $namelist, $dirarray, $namearray );
        $iform -> addElement( new XoopsFormLabel( _AM_IMPRESSION_ARTICLE_FOLDERSELECTION, ob_get_contents() ) );
        ob_end_clean();

        if ( $rootpath > 0 )
        {
            $graph_array = &impressionLists :: getListTypeAsArray( ICMS_ROOT_PATH . "/" . $dirarray[$rootpath], $type = "images" );
            $indeximage_select = new XoopsFormSelect( '', 'articlefile', '' );
            $indeximage_select -> addOptionArray( $graph_array );
            $indeximage_select -> setExtra( "onchange='showImgSelected(\"image\", \"articlefile\", \"" . $dirarray[$rootpath] . "\", \"\", \"" . ICMS_URL . "\")'" );
            $indeximage_tray = new XoopsFormElementTray( _AM_IMPRESSION_ARTICLE_FSHOWSELECTEDIMAGE, '&nbsp;' );
            $indeximage_tray -> addElement( $indeximage_select );
            if ( !empty( $imgurl ) )
            {
                $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . ICMS_URL . "/" . $dirarray[$rootpath] . "/" . $articlefile . "' name='image' id='image' alt='' />" ) );
            }
            else
            {
                $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . ICMS_URL . "/uploads/blank.gif' name='image' id='image' alt='' />" ) );
            }
            $iform -> addElement( $indeximage_tray );

            $iform -> addElement( new XoopsFormFile( _AM_IMPRESSION_ARTICLE_FUPLOADIMAGE, 'uploadfile', 0 ) );
            $iform -> addElement( new XoopsFormHidden( 'uploadpath', $dirarray[$rootpath] ) );
            $iform -> addElement( new XoopsFormHidden( 'rootnumber', $rootpath ) );

            $dup_tray = new XoopsFormElementTray( '', '' );
            $dup_tray -> addElement( new XoopsFormHidden( 'op', 'upload' ) );
            $butt_dup = new XoopsFormButton( '', '', _AM_IMPRESSION_BUPLOAD, 'submit' );
            $butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'upload\'"' );
            $dup_tray -> addElement( $butt_dup );

            $butt_dupct = new XoopsFormButton( '', '', _AM_IMPRESSION_BDELETEIMAGE, 'submit' );
            $butt_dupct -> setExtra( 'onclick="this.form.elements.op.value=\'delfile\'"' );
            $dup_tray -> addElement( $butt_dupct );
            $iform -> addElement( $dup_tray );
        } 
        $iform -> display();
} 
xoops_cp_footer();

?>