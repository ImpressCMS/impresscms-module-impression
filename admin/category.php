<?php
/**
 * $Id: category.php
 * Module: Impression
 */

include 'admin_header.php';

$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

$op = impression_cleanRequestVars( $_REQUEST, 'op', '' );
$cid = impression_cleanRequestVars( $_REQUEST, 'cid', 0 );
$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );

global $impressionmyts, $xoopsModuleConfig;

function createcat( $cid = 0 )
{
    global $xoopsDB, $impressionmyts, $xoopsModuleConfig, $mytree, $xoopsModule;

    $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $cid;
    $cat_arr = $xoopsDB -> fetchArray( $result = $xoopsDB -> query( $sql ) );

    $title = $cat_arr['title'] ? $impressionmyts -> htmlSpecialCharsStrip( $cat_arr['title'] ) : '';
    $imgurl = $cat_arr['imgurl'] ? $impressionmyts -> htmlSpecialCharsStrip( $cat_arr['imgurl'] ) : '';
    $descriptionb = $cat_arr['description'] ? $impressionmyts -> htmlSpecialCharsStrip( $cat_arr['description'] ) : '';
    $weight = $cat_arr['weight'] ? intval( $cat_arr['weight'] ) : 0;

    $caption = ( $cid > 0 ) ? _AM_IMPRESSION_CCATEGORY_MODIFY : _AM_IMPRESSION_CCATEGORY_CREATENEW;
    $sform = new XoopsThemeForm( $caption, "op", xoops_getenv( 'PHP_SELF' ) );
    $sform -> setExtra( 'enctype="multipart/form-data"' );

    $sform -> addElement( new XoopsFormText( _AM_IMPRESSION_FCATEGORY_TITLE, 'title', 50, 80, $title ), true );
    ob_start();
    $mytree -> makeMySelBox( "title", "title", $cat_arr['pid'] , 1, "pid" );
    $sform -> addElement( new XoopsFormLabel( _AM_IMPRESSION_FCATEGORY_SUBCATEGORY, ob_get_contents() ) );
    ob_end_clean();

    $sform -> addElement( new XoopsFormText( _AM_IMPRESSION_FCATEGORY_WEIGHT, 'weight', 10, 80, $weight ), false );

    $graph_array = &impressionLists :: getListTypeAsArray( XOOPS_ROOT_PATH . "/" . $xoopsModuleConfig['catimage'], $type = "images" );
    $indeximage_select = new XoopsFormSelect( '', 'imgurl', $imgurl );
    $indeximage_select -> addOption( '', 'No Image' );
    $indeximage_select -> addOptionArray( $graph_array );
    $indeximage_select -> setExtra( "onchange='showImgSelected(\"image\", \"imgurl\", \"" . $xoopsModuleConfig['catimage'] . "\", \"\", \"" . XOOPS_URL . "\")'" );
    $indeximage_tray = new XoopsFormElementTray( _AM_IMPRESSION_FCATEGORY_CIMAGE, '&nbsp;' );
    $indeximage_tray -> addElement( $indeximage_select );
    if ( !empty( $imgurl ) )
    {
        $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . XOOPS_URL . "/" . $xoopsModuleConfig['catimage'] . "/" . $imgurl . "' name='image' id='image' alt='' />" ) );
    } 
    else
    {
        $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . XOOPS_URL . "/uploads/blank.gif' name='image' id='image' alt='' />" ) );
    } 
    $sform -> addElement( $indeximage_tray );
 //   $sform -> addElement( new XoopsFormDhtmlTextArea( _AM_IMPRESSION_FCATEGORY_DESCRIPTION, 'descriptionb', $descriptionb, 15, 60 ) );

    $editor=impression_getWysiwygForm( _AM_IMPRESSION_FCATEGORY_DESCRIPTION, 'descriptionb', $descriptionb, 15, 60, '');
    $sform->addElement($editor,false);

    $sform -> addElement( new XoopsFormHidden( 'cid', $cid ) );
//    $sform -> addElement( new XoopsFormHidden( 'spotlighttop', $cid ) );

    $button_tray = new XoopsFormElementTray( '', '' );
    $hidden = new XoopsFormHidden( 'op', 'save' );
    $button_tray -> addElement( $hidden );

    $butt_create = new XoopsFormButton( '', '', _AM_IMPRESSION_BSAVE, 'submit' );
    $butt_create -> setExtra( 'onclick="this.form.elements.op.value=\'addCat\'"' );
    $button_tray -> addElement( $butt_create );
    if ( !$cid )
    {
        $butt_clear = new XoopsFormButton( '', '', _AM_IMPRESSION_BRESET, 'reset' );
        $button_tray -> addElement( $butt_clear );
    }
    else
    {
        $butt_delete = new XoopsFormButton( '', '', _AM_IMPRESSION_BDELETE, 'submit' );
        $butt_delete -> setExtra( 'onclick="this.form.elements.op.value=\'delCat\'"' );
        $button_tray -> addElement( $butt_delete );
    } 
    $butt_cancel = new XoopsFormButton( '', '', _AM_IMPRESSION_BCANCEL, 'button' );
    $butt_cancel -> setExtra( 'onclick="history.go(-1)"' );
    $button_tray -> addElement( $butt_cancel );

    $sform -> addElement( $button_tray );
    $sform -> display();
} 

switch ( strtolower( $op ) )
{
    case "move":
        if ( impression_cleanRequestVars( $_REQUEST, 'ok', 0 ) )
        {
            xoops_cp_header();
            impression_adminmenu( _AM_IMPRESSION_MCATEGORY );

            $sform = new XoopsThemeForm( _AM_IMPRESSION_CCATEGORY_MOVE, "move", xoops_getenv( 'PHP_SELF' ) );
            ob_start();
            $mytree -> makeMySelBox( "title", "title", 0 , 0, "target" );
            $sform -> addElement( new XoopsFormLabel( _AM_IMPRESSION_BMODIFY, ob_get_contents() ) );
            ob_end_clean();
            $create_tray = new XoopsFormElementTray( '', '' );
            $create_tray -> addElement( new XoopsFormHidden( 'source', $cid ) );
            $create_tray -> addElement( new XoopsFormHidden( 'ok', 1 ) );
            $create_tray -> addElement( new XoopsFormHidden( 'op', 'move' ) );
            $butt_save = new XoopsFormButton( '', '', _AM_IMPRESSION_BMOVE, 'submit' );
            $butt_save -> setExtra( 'onclick="this.form.elements.op.value=\'move\'"' );
            $create_tray -> addElement( $butt_save );
            $butt_cancel = new XoopsFormButton( '', '', _AM_IMPRESSION_BCANCEL, 'submit' );
            $butt_cancel -> setExtra( 'onclick="this.form.elements.op.value=\'cancel\'"' );
            $create_tray -> addElement( $butt_cancel );
            $sform -> addElement( $create_tray );
            $sform -> display();
            xoops_cp_footer();
        } 
        else
        {
            global $xoopsDB;

            $source = impression_cleanRequestVars( $_REQUEST, 'source', 0 );
            $target = impression_cleanRequestVars( $_REQUEST, 'target', 0 );
            if ( $target == $source )
            {
                redirect_header( "category.php?op=move&amp;ok=0&amp;cid=" . $source, 5, _AM_IMPRESSION_CCATEGORY_MODIFY_FAILED );
            } 

            if ( !$target )
            {
                redirect_header( "category.php?op=move&amp;ok=0&amp;cid=" . $source, 5, _AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT );
            } 
            $sql = "UPDATE " . $xoopsDB -> prefix( 'impresson_articles' ) . " SET aid=" . $target . " WHERE aid =" . $source;
            if ( !$result = $xoopsDB -> queryF( $sql ) )
            {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            } 
            redirect_header( "category.php?op=default", 1, _AM_IMPRESSION_CCATEGORY_MODIFY_MOVED );
        } 
        break;

    case "addcat":
        $groups = isset( $_REQUEST['groups'] ) ? $_REQUEST['groups'] : array();
        $cid = ( isset( $_REQUEST["cid"] ) ) ? $_REQUEST["cid"] : 0;
        $pid = ( isset( $_REQUEST["pid"] ) ) ? $_REQUEST["pid"] : 0;
        $weight = ( isset( $_REQUEST["weight"] ) && $_REQUEST["weight"] > 0 ) ? $_REQUEST["weight"] : 0;
        $title = $impressionmyts -> addslashes( $_REQUEST["title"] );
        $descriptionb = $impressionmyts -> addslashes( $_REQUEST["descriptionb"] );
        $imgurl = ( $_REQUEST["imgurl"] && $_REQUEST["imgurl"] != "blank.gif" ) ? $impressionmyts -> addslashes( $_REQUEST["imgurl"] ) : "";

        if ( !$cid )
        {
            $cid = 0;
            $sql = "INSERT INTO " . $xoopsDB -> prefix( 'impression_cat' ) . " (cid, pid, title, imgurl, description, weight ) VALUES ('', $pid, '$title', '$imgurl', '$descriptionb', '$weight' )";
            if ( $cid == 0 )
            {
                $newid = $xoopsDB -> getInsertId();
            } 
        } 
        else
        {
            $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_cat' ) . " SET title ='$title', imgurl='$imgurl', pid =$pid, description='$descriptionb', weight='$weight' WHERE cid=" . $cid;
            $database_mess = _AM_IMPRESSION_CCATEGORY_MODIFIED;
        } 
        if ( !$result = $xoopsDB -> query( $sql ) )
        {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        redirect_header( "category.php", 1, $database_mess );
        break;

    case "del":
        if ( impression_cleanRequestVars( $_REQUEST, 'ok', 0 ) )
        {
            $gperm_handler = &xoops_gethandler( 'groupperm' ); 
            // get all subcategories under the specified category
            $arr = $mytree -> getAllChildId( $cid );
            $lcount = count( $arr );

            for ( $i = 0; $i < $lcount; $i++ )
            { 
                // get all links in each subcategory
                $result = $xoopsDB -> query( "SELECT aid FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . $arr[$i] );
                // now for each linkload, delete the text data and vote ata associated with the linkload
                while ( list( $aid ) = $xoopsDB -> fetchRow( $result ) )
                {
                    $sql = sprintf( "DELETE FROM %s WHERE aid = %u", $xoopsDB -> prefix( 'impression_articles' ), $aid );
                    if ( !$result = $xoopsDB -> query( $sql ) )
                    {
                        XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                        return false;
                    } 
                    // delete comments
                    xoops_comment_delete( $xoopsModule -> getVar( 'mid' ), $aid );
                } 
                // all links for each subcategory is deleted, now delete the subcategory data
                $gperm_handler -> deleteByModule( $xoopsModule -> getVar( 'mid' ), $this -> perm_name, $arr[$i] );
                $sql = sprintf( "DELETE FROM %s WHERE aid = %u", $xoopsDB -> prefix( 'impression_articles' ), $arr[$i] );
                if ( !$result = $xoopsDB -> query( $sql ) )
                {
                    XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                    return false;
                } 
            } 
            // all subcategory and associated data are deleted, now delete category data and its associated data
            $result = $xoopsDB -> query( "SELECT aid FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE aid=" . $cid );
            while ( list( $aid ) = $xoopsDB -> fetchRow( $result ) )
            {
                $sql = sprintf( "DELETE FROM %s WHERE aid = %u", $xoopsDB -> prefix( 'impression_articles' ), $aid );
                if ( !$result = $xoopsDB -> queryF( $sql ) )
                {
                    XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                    return false;
                } 
                // delete comments
                xoops_comment_delete( $xoopsModule -> getVar( 'mid' ), $aid );
            }
            $sql = sprintf( "DELETE FROM %s WHERE cid = %u", $xoopsDB -> prefix( 'impression_cat' ), $cid );
            if ( !$result = $xoopsDB -> query( $sql ) )
            {
                XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
                return false;
            } 
            redirect_header( "category.php", 1, _AM_IMPRESSION_CCATEGORY_DELETED );
            exit();
        } 
        else
        {
            xoops_cp_header();
            xoops_confirm( array( 'op' => 'del', 'cid' => $cid, 'ok' => 1 ), 'category.php', _AM_IMPRESSION_CCATEGORY_AREUSURE );
            xoops_cp_footer();
        } 
        break;

    case "modcat":
        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_MCATEGORY );
        createcat( $cid );
        xoops_cp_footer();
        break;

    case 'main':
    default:

        xoops_cp_header();
        impression_adminmenu( _AM_IMPRESSION_MCATEGORY );

        $sform = new XoopsThemeForm( _AM_IMPRESSION_CCATEGORY_MODIFY, "category", xoops_getenv( 'PHP_SELF' ) );
        $totalcats = impression_totalcategory();
        if ( $totalcats > 0 )
        {
            ob_start();
            $mytree -> makeMySelBox( "title", "title" );
            $sform -> addElement( new XoopsFormLabel( _AM_IMPRESSION_CCATEGORY_MODIFY_TITLE, ob_get_contents() ) );
            ob_end_clean();
            $dup_tray = new XoopsFormElementTray( '', '' );
            $dup_tray -> addElement( new XoopsFormHidden( 'op', 'modCat' ) );
            $butt_dup = new XoopsFormButton( '', '', _AM_IMPRESSION_BMODIFY, 'submit' );
            $butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'modCat\'"' );
            $dup_tray -> addElement( $butt_dup );
// ToDo make the move cat function work            
//            $butt_move = new XoopsFormButton( '', '', _AM_IMPRESSION_BMOVE, 'submit' );
//            $butt_move -> setExtra( 'onclick="this.form.elements.op.value=\'move\'"' );
//            $dup_tray -> addElement( $butt_move );
            $butt_dupct = new XoopsFormButton( '', '', _AM_IMPRESSION_BDELETE, 'submit' );
            $butt_dupct -> setExtra( 'onclick="this.form.elements.op.value=\'del\'"' );
            $dup_tray -> addElement( $butt_dupct );
            $sform -> addElement( $dup_tray );
            $sform -> display();
        } 
        createcat( 0 );
        xoops_cp_footer();
        break;
} 

?>