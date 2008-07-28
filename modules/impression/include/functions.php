<?php
/**
 * $Id: functions.php
 * Module: Impression
 */

// wfs_gethandler()
//
// @param  $name
// @param boolean $optional
// @return
function &impression_gethandler( $name, $optional = false ) {
    global $handlers, $xoopsModule;

    $name = strtolower( trim( $name ) );
    if ( !isset( $handlers[$name] ) ) {
        if ( file_exists( $hnd_file = ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/class/class_' . $name . '.php' ) ) {
            require_once $hnd_file;
        } 
        $class = 'impression' . ucfirst( $name ) . 'Handler';
        if ( class_exists( $class ) ) {
            $handlers[$name] = new $class( $GLOBALS['xoopsDB'] );
        } 
    } 
    if ( !isset( $handlers[$name] ) && !$optional ) {
        trigger_error( '<div>Class <b>' . $class . '</b> does not exist.</div>
			<div>Handler Name: ' . $name, E_USER_ERROR ) . '</div>';
    } 
    return isset( $handlers[$name] ) ? $handlers[$name] : false;
} 

function impression_checkgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
    global $xoopsUser, $xoopsModule;

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );
    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $xoopsModule -> getVar( 'mid' ) ) ) {
        if ( $redirect == false ) {
            return false;
        } else  {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        } 
    } 
    return true;
} 

function impression_cleanRequestVars( &$array, $name = null, $def = null, $strict = false, $lengthcheck = 15 ) {

    unset( $array['usercookie'] );
    unset( $array['PHPSESSID'] );

    if ( is_array( $array ) && $name == null ) {
        $globals = array();
        foreach ( array_keys( $array ) as $k ) {
            $value = strip_tags( trim( $array[$k] ) );
            if ( strlen( $value >= $lengthcheck ) ) {
                return null;
            } 

            if ( ctype_digit( $value ) ) {
                $value = intval( $value );
            } else {
                if ( $strict == true ) {
                    $value = preg_replace( '/\W/', '', trim( $value ) );
                } 
                $value = strtolower( strval( $value ) );
            } 
            $globals[$k] = $value;
        } 
        return $globals;
    } 

    if ( !isset( $array[$name] ) || !array_key_exists( $name, $array ) ) {
        return $def;
    } else {
        $value = strip_tags( trim( $array[$name] ) );
    } 

    if ( ctype_digit( $value ) ) {
        $value = intval( $value );
    } else {
        if ( $strict == true ) {
            $value = preg_replace( '/\W/', '', trim( $value ) );
        } 
        $value = strtolower( strval( $value ) );
    } 
    return $value;
} 

// toolbar()
function impression_toolbar( $cid = 0 ) {
    $toolbar = "[ ";
    if ( true == impression_checkgroups( $cid, 'ImpressionSubPerm' ) ) {
        $toolbar .= "<a href='submit.php?cid=" . $cid . "'>" . _MD_IMPRESSION_SUBMITARTICLE . "</a> | ";
    } 
    $toolbar .= "<a href='newlist.php?newarticleshowdays=7'>" . _MD_IMPRESSION_LATESTLIST . "</a> | <a href='topten.php?list=hit'>" . _MD_IMPRESSION_POPULARITY . "</a> ]";
    return $toolbar;
} 

// impression_serverstats()
function impression_serverstats() {
    echo "<fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_IMPRESSION_ARTICLE_IMAGEINFO . "</legend>\n
	  <div style='padding: 8px;'>\n
	  <div>" . _AM_IMPRESSION_ARTICLE_SPHPINI . "</div>\n";

    $safemode = ( ini_get( 'safe_mode' ) ) ? _AM_IMPRESSION_ARTICLE_ON . _AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS : _AM_IMPRESSION_ARTICLE_OFF;
    $registerglobals = ( ini_get( 'register_globals' ) == '' ) ? _AM_IMPRESSION_ARTICLE_OFF : _AM_IMPRESSION_ARTICLE_ON;
    $articles = ( ini_get( 'file_uploads' ) ) ? _AM_IMPRESSION_ARTICLE_ON : _AM_IMPRESSION_ARTICLE_OFF;

    $gdlib = ( function_exists( 'gd_info' ) ) ? _AM_IMPRESSION_ARTICLE_GDON : _AM_IMPRESSION_ARTICLE_GDOFF;
    echo "<li>" . _AM_IMPRESSION_ARTICLE_GDLIBSTATUS . $gdlib;
    if ( function_exists( 'gd_info' ) ) {
        if ( true == $gdlib = gd_info() ) {
            echo "<li>" . _AM_IMPRESSION_ARTICLE_GDLIBVERSION . "<b>" . $gdlib['GD Version'] . "</b>";
        } 
    } 
    echo "<br /><br />\n\n";
    echo "<li>" . _AM_IMPRESSION_ARTICLE_SAFEMODESTATUS . $safemode;
    echo "<li>" . _AM_IMPRESSION_ARTICLE_REGISTERGLOBALS . $registerglobals;
    echo "<li>" . _AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS . $articles;
    echo "</div>";
    echo "</fieldset><br />";
} 

// displayicons()
//
// @param  $time
// @param integer $status
// @param integer $counter
// @return
function impression_displayicons( $time, $status = 0, $counter = 0 ) {
    global $xoopsModuleConfig, $xoopsModule;

    $new = '';
    $pop = '';

    $newdate = ( time() - ( 86400 * intval( $xoopsModuleConfig['daysnew'] ) ) );
    $popdate = ( time() - 864000 ) ;

    if ( $xoopsModuleConfig['displayicons'] != 3 ) {
        if ( $newdate < $time ) {
            if ( intval( $status ) > 1 ) {
                if ( $xoopsModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/icon/update.png alt='' align ='absmiddle'/>";
                if ( $xoopsModuleConfig['displayicons'] == 2 )
                    $new = "<i>Updated!</i>";
            } else {
                if ( $xoopsModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/icon/new.png alt='' align ='absmiddle'/>";
                if ( $xoopsModuleConfig['displayicons'] == 2 )
                    $new = "<i>New!</i>";
            }
        } 
        if ( $popdate > $time ) {
            if ( $counter >= $xoopsModuleConfig['popular'] ) {
                if ( $xoopsModuleConfig['displayicons'] == 1 )
                    $pop = "&nbsp;<img src =" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/icon/popular.png alt='' align ='absmiddle'/>";
                if ( $xoopsModuleConfig['displayicons'] == 2 )
                    $pop = "<i>Popular!</i>";
            } 
        } 
    } 
    $icons = $new . " " . $pop;
    return $icons;
}

if ( !function_exists( 'impression_convertorderbyin' ) ) {
    // Reusable Link Sorting Functions
    // impression_convertorderbyin()
    // @param  $orderby
    // @return
    function impression_convertorderbyin( $orderby ) {
        switch ( trim( $orderby ) ) {
            case "titleA":
                $orderby = "title ASC";
                break;
            case "dateA":
                $orderby = "published ASC";
                break;
            case "hitsA":
                $orderby = "hits ASC";
                break;
            case "titleD":
                $orderby = "title DESC";
                break;
            case "hitsD":
                $orderby = "hits DESC";
                break;
            case"dateD":
                $orderby = "published DESC";
                break;
        }
        return $orderby;
    } 
} 
if ( !function_exists( 'impression_convertorderbytrans' ) ) {
    function impression_convertorderbytrans( $orderby ) {
        if ( $orderby == "hits ASC" ) $orderbyTrans = _MD_IMPRESSION_POPULARITYLTOM;
        if ( $orderby == "hits DESC" ) $orderbyTrans = _MD_IMPRESSION_POPULARITYMTOL;
        if ( $orderby == "title ASC" ) $orderbyTrans = _MD_IMPRESSION_TITLEATOZ;
        if ( $orderby == "title DESC" ) $orderbyTrans = _MD_IMPRESSION_TITLEZTOA;
        if ( $orderby == "published ASC" ) $orderbyTrans = _MD_IMPRESSION_DATEOLD;
        if ( $orderby == "published DESC" ) $orderbyTrans = _MD_IMPRESSION_DATENEW;
        return $orderbyTrans;
    }
} 
if ( !function_exists( 'impression_convertorderbyout' ) ) {
    function impression_convertorderbyout( $orderby ) {
        if ( $orderby == "title ASC" ) $orderby = "titleA";
        if ( $orderby == "published ASC" ) $orderby = "dateA";
        if ( $orderby == "hits ASC" ) $orderby = "hitsA";
        if ( $orderby == "title DESC" ) $orderby = "titleD";
        if ( $orderby == "published DESC" ) $orderby = "dateD";
        if ( $orderby == "hits DESC" ) $orderby = "hitsD";
        return $orderby;
    } 
} 

// totalcategory()
// @param integer $pid
// @return
function impression_totalcategory( $pid = 0 ) {
    global $xoopsDB;

    $sql = "SELECT cid FROM " . $xoopsDB -> prefix( 'impression_cat' );
    if ( $pid > 0 ) {
        $sql .= " WHERE pid = 0";
    } 
    $result = $xoopsDB -> query( $sql );
    $catlisting = 0;
    while ( list( $cid ) = $xoopsDB -> fetchRow( $result ) ) {
        if ( impression_checkgroups( $cid ) ) {
            $catlisting++;
        } 
    } 
    return $catlisting;
} 

// impression_getTotalItems()
// @param integer $sel_id
// @param integer $get_child
// @param integer $return_sql
// @return
function impression_getTotalItems( $sel_id = 0, $get_child = 0, $return_sql = 0 ) {
    global $xoopsDB, $mytree, $_check_array;

    if ( $sel_id > 0 ) {
        $sql = "SELECT DISTINCT a.aid, a.cid, a.published FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " a LEFT JOIN "
         . $xoopsDB -> prefix( 'impression_altcat' ) . " b "
         . "ON b.aid=a.aid "
         . "WHERE a.published > 0 AND a.published <= " . time()
         . " AND status = 0 "
         . " AND (b.cid=a.cid OR (a.cid=" . $sel_id . " OR b.cid=" . $sel_id . ")) ";
    } else {
        $sql = "SELECT aid, cid, published from " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE status = 0 AND published > 0 AND published <= " . time();
    } 
    if ( $return_sql == 1 ) {
        return $sql;
    } 

    $count = 0;
    $published_date = 0;

    $arr = array();
    $result = $xoopsDB -> query( $sql );
    while ( list( $aid, $cid, $published ) = $xoopsDB -> fetchRow( $result ) ) {
        if ( true == impression_checkgroups() ) {
            $count++;
            $published_date = ( $published > $published_date ) ? $published : $published_date;
        } 
    } 

    $child_count = 0;
    if ( $get_child == 1 ) {
        $arr = $mytree -> getAllChildId( $sel_id );
        $size = count( $arr );
        for( $i = 0;$i < count( $arr );$i++ ) {
            $query2 = "SELECT DISTINCT a.aid, a.published, a.cid FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " a LEFT JOIN "
             . $xoopsDB -> prefix( 'impression_altcat' ) . " b "
             . "ON b.aid=a.aid "
             . "WHERE a.published > 0 AND a.published <= " . time()
             . " AND status = 0 "
             . " AND (b.cid=a.cid OR (a.cid=" . $arr[$i] . " OR b.cid=" . $arr[$i] . ")) ";

            $result2 = $xoopsDB -> query( $query2 );
            while ( list( $aid, $published ) = $xoopsDB -> fetchRow( $result2 ) ) {
                if ( $published == 0 ) {
                    continue;
                } 
                $published_date = ( $published > $published_date ) ? $published : $published_date;
                $child_count++;
            } 
        } 
    } 
    $info['count'] = $count + $child_count;
    $info['published'] = $published_date;
    return $info;
} 

function impression_imageheader( $indeximage = '', $indexheading = '' ) {
    global $xoopsDB, $xoopsModuleConfig;

    if ( $indeximage == '' ) {
        $result = $xoopsDB -> query( "SELECT indeximage, indexheading FROM " . $xoopsDB -> prefix( 'impression_indexpage' ) );
        list( $indeximage, $indexheading ) = $xoopsDB -> fetchrow( $result );
    } 

    $image = '';
    if ( !empty( $indeximage ) ) {
        $image = impression_displayimage( $indeximage, "'index.php'", $xoopsModuleConfig['mainimagedir'], $indexheading );
    } 
    return $image;
} 

function impression_displayimage( $image = '', $path = '', $imgsource = '', $alttext = '' ) {
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    $showimage = '';
    // Check to see if link is given
    if ( $path ) {
        $showimage = "<a href=" . $path . ">";
    } 
    // checks to see if the file is valid else displays default blank image
    if ( !is_dir( ICMS_ROOT_PATH . "/{$imgsource}/{$image}" ) && file_exists( ICMS_ROOT_PATH . "/{$imgsource}/{$image}" ) ) {
        $showimage .= "<img src='" . ICMS_URL . "/{$imgsource}/{$image}' border='0' title='" . $alttext . "' alt='" . $alttext . "' /></a>";
    } else {
        if ( $xoopsUser && $xoopsUser -> isAdmin( $xoopsModule -> getVar( 'mid' ) ) ) {
            $showimage .= "<img src='" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/brokenimg.png' alt='" . _MD_IMPRESSION_ISADMINNOTICE . "' /></a>";
        } else {
            $showimage .= "<img src='" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/blank.gif' alt='" . $alttext . "' /></a>";
        } 
    } 
    clearstatcache();
    return $showimage;
} 

function impression_letters() {
    global $xoopsModule;

    $letterchoice = "<div>" . _MD_IMPRESSION_BROWSETOTOPIC . "</div>";
    $letterchoice .= "[  ";
    $alphabet = array ( "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );
    $num = count( $alphabet ) - 1;
    $counter = 0;
    while ( list( , $ltr ) = each( $alphabet ) ) {
        $letterchoice .= "<a href='" . ICMS_URL . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/catview.php?list=$ltr'>$ltr</a>";
        if ( $counter == round( $num / 2 ) )
            $letterchoice .= " ]<br />[ ";
        elseif ( $counter != $num )
            $letterchoice .= "&nbsp;|&nbsp;";
        $counter++;
    } 
    $letterchoice .= " ]";
    return $letterchoice;
} 

function impression_isnewimage( $published ) {
    global $xoopsModule, $xoopsDB;

    $indicator['image'] = "modules/" . $xoopsModule -> getVar( 'dirname' ) . "/images/icon/folder.png";
    $indicator['alttext'] = _MD_IMPRESSION_NEWLAST;

    return $indicator;
} 

function impression_strrrchr( $haystack, $needle ) {
    return substr( $haystack, 0, strpos( $haystack, $needle ) + 1 );
} 

function impression_adminmenu( $header = '', $menu = '', $extra = '', $scount = 5 ) {
    global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;

    $_named_url = xoops_getenv( 'PHP_SELF' );
    if ( $_named_url )
        $thispage = basename( $_named_url );

    $op = ( isset( $_GET['op'] ) ) ? $op = "?op=" . $_GET['op'] : '';

//        echo "<h4 style='color: #2F5376;'>" . _AM_IMPRESSION_MODULE_NAME . "</h4>";
	echo "<table width='100%' cellspacing='0' cellpadding='0' border='0' class='outer'>\n
		<tr>\n
		<td style='font-size: 10px; text-align: left; color: #2F5376; padding: 2px 6px; line-height: 18px;'>\n
		<a href='../../system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule -> getVar( 'dirname' ) . "'>" . _AM_IMPRESSION_BUPDATE . "</a> | \n
		<a href='../../system/admin.php?fct=preferences&op=showmod&mod=" . $xoopsModule -> getVar( 'mid' ) . "'>" . _AM_IMPRESSION_PREFS . "</a> | \n
		<a href='../admin/index.php'>" . _AM_IMPRESSION_BINDEX . "</a> | \n
		<a href='../admin/permissions.php'>" . _AM_IMPRESSION_BPERMISSIONS . "</a> | \n
		<a href='../admin/myblocksadmin.php'>" . _AM_IMPRESSION_BLOCKADMIN . "</a> | \n
		<a href='../index.php'>" . _AM_IMPRESSION_GOMODULE . "</a> | \n
                <a href='../admin/about.php'>" . _AM_IMPRESSION_ABOUT . "</a>\n
		</td>\n
		</tr>\n
		</table><br />\n
		";

    if ( empty( $menu ) ) {
        // You can change this part to suit your own module. Defining this here will save you form having to do this each time.
        $menu = array( _AM_IMPRESSION_INDEXPAGE => "indexpage.php",
                       _AM_IMPRESSION_MCATEGORY => "category.php",
                       _AM_IMPRESSION_MARTICLES => "index.php?op=edit",
                       _AM_IMPRESSION_MUPLOADS => "upload.php"
                       );
    } 

    if ( !is_array( $menu ) ) {
        echo "<table width='100%' cellpadding= '2' cellspacing= '1' class='outer'>\n";
        echo "<tr><td class ='even' align ='center'><b>" . _AM_IMPRESSION_NOMENUITEMS . "</b></td></tr></table><br />\n";
        return false;
    } 

    $oddnum = array( 1 => "1", 3 => "3", 5 => "5", 7 => "7", 9 => "9", 11 => "11", 13 => "13" ); 
    // number of rows per menu
    $menurows = count( $menu ) / $scount; 
    // total amount of rows to complete menu
    $menurow = ceil( $menurows ) * $scount; 
    // actual number of menuitems per row
    $rowcount = $menurow / ceil( $menurows );
    $count = 0;
    for ( $i = count( $menu ); $i < $menurow; $i++ )
    {
        $tempArray = array( 1 => null );
        $menu = array_merge( $menu, $tempArray );
        $count++;
    } 

    // Sets up the width of each menu cell
    $width = 100 / $scount;
    $width = ceil( $width );

    $menucount = 0;
    $count = 0;
    // Menu table output
    echo "<table width='100%' cellpadding= '2' cellspacing= '1' class='outer'><tr>";
    // Check to see if $menu is and array
    if ( is_array( $menu ) ) {
        $classcounts = 0;
        $classcol[0] = "even";

        for ( $i = 1; $i < $menurow; $i++ ) {
            $classcounts++;
            if ( $classcounts >= $scount ) {
                if ( $classcol[$i-1] == 'odd' ) {
                    $classcol[$i] = ( $classcol[$i-1] == 'odd' && in_array( $classcounts, $oddnum ) ) ? "even" : "odd";
                } else {
                    $classcol[$i] = ( $classcol[$i-1] == 'even' && in_array( $classcounts, $oddnum ) ) ? "odd" : "even";
                } 
                $classcounts = 0;
            } else {
                $classcol[$i] = ( $classcol[$i-1] == 'even' ) ? "odd" : "even";
            } 
        } 
        unset( $classcounts );

        foreach ( $menu as $menutitle => $menuarticle ) {
            if ( $thispage . $op == $menuarticle ) {
                $classcol[$count] = "outer";
            } 
            echo "<td class='" . $classcol[$count] . "' style='text-align: center;' valign='middle' width='$width%'>";
            if ( is_string( $menuarticle ) ) {
                echo "<a href='" . $menuarticle . "'><small>" . $menutitle . "</small></a></td>";
            } else {
                echo "&nbsp;</td>";
            } 
            $menucount++;
            $count++;

            // Break menu cells to start a new row if $count > $scount
            if ( $menucount >= $scount )  {
                echo "</tr>";
                $menucount = 0;
            } 
        } 
        echo "</table><br />";
        unset( $count );
        unset( $menucount );
    } 
    // ###### Output warn messages for security ######
    if ( is_dir( ICMS_ROOT_PATH . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/update/" ) ) {
        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL1, ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/update/' ) );
        echo '<br />';
    } 

    $_file = ICMS_ROOT_PATH . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/update.php";
    if ( file_exists( $_file ) ) {
        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL2, ICMS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/update.php' ) );
        echo '<br />';
    } 

    $path1 = ICMS_ROOT_PATH . '/' . $xoopsModuleConfig['mainimagedir'];
    if ( !is_dir( $path1 ) || !is_writable( $path1 ) ) {
        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path1 ) );
        echo '<br />';
    } 

    $path1_t = ICMS_ROOT_PATH . '/' . $xoopsModuleConfig['mainimagedir'] . '/thumbs';
    if ( !is_dir( $path1_t ) || !is_writable( $path1_t ) ) {
        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path1_t ) );
        echo '<br />';
    } 

//    $path2 = ICMS_ROOT_PATH . '/' . $xoopsModuleConfig['screenshots'];
//    if ( !is_dir( $path2 ) || !is_writable( $path2 ) )
//    {
//        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path2 ) );
//        echo '<br />';
//    } 

//    $path2_t = ICMS_ROOT_PATH . '/' . $xoopsModuleConfig['screenshots'] . '/thumbs';
//    if ( !is_dir( $path2_t ) || !is_writable( $path2_t ) )
//    {
//        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path2_t ) );
//        echo '<br />';
//    }

    $path3 = ICMS_ROOT_PATH . '/' . $xoopsModuleConfig['catimage'];
    if ( !is_dir( $path3 ) || !is_writable( $path3 ) ) {
        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path3 ) );
        echo '<br />';
    } 

    $path3_t = ICMS_ROOT_PATH . '/' . $xoopsModuleConfig['catimage'] . '/thumbs';
    if ( !is_dir( $path3_t ) || !is_writable( $path3_t ) ) {
        xoops_error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path3_t ) );
        echo '<br />';
    } 

    echo "<h3 style='color: #2F5376;'>" . $header . "</h3>";
    if ( $extra ) {
        echo "<div>$extra</div>";
    } 
} 

function impression_getDirSelectOption( $selected, $dirarray, $namearray ) {
    echo "<select size='1' name='workd' onchange='location.href=\"upload.php?rootpath=\"+this.options[this.selectedIndex].value'>";
    echo "<option value=''>--------------------------------------</option>";
    foreach( $namearray as $namearray => $workd ) {
        if ( $workd === $selected ) {
            $opt_selected = "selected";
        } else {
            $opt_selected = "";
        } 
        echo "<option value='" . htmlspecialchars( $namearray, ENT_QUOTES ) . "' $opt_selected>" . $workd . "</option>";
    } 
    echo "</select>";
} 

function impression_uploading( $_FILES, $uploaddir = "uploads", $allowed_mimetypes = '', $redirecturl = "index.php", $num = 0, $redirect = 0, $usertype = 1 ) {
    global $_FILES, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

    $down = array();
    include_once ICMS_ROOT_PATH . "/modules/" . $xoopsModule -> getVar( 'dirname' ) . "/class/uploader.php";
    if ( empty( $allowed_mimetypes ) ) {
        $allowed_mimetypes = impression_retmime( $_FILES['userfile']['name'], $usertype );
    } 
    $upload_dir = ICMS_ROOT_PATH . "/" . $uploaddir . "/";

    $maxfilesize = $xoopsModuleConfig['maxfilesize'];
    $maxfilewidth = $xoopsModuleConfig['maximgwidth'];
    $maxfileheight = $xoopsModuleConfig['maximgheight'];

    $uploader = new XoopsMediaUploader( $upload_dir, $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight );
    $uploader -> noAdminSizeCheck( 1 );
    if ( $uploader -> fetchMedia( $_POST['xoops_upload_file'][0] ) ) {
        if ( !$uploader -> upload() ) {
            $errors = $uploader -> getErrors();
            redirect_header( $redirecturl, 2, $errors );
        } else {
            if ( $redirect ) {
                redirect_header( $redirecturl, 1 , _AM_PDD_UPLOADFILE );
            } else {
                if ( is_file( $uploader -> savedDestination ) ) {
                    $down['url'] = ICMS_URL . "/" . $uploaddir . "/" . strtolower( $uploader -> savedFileName );
                    $down['size'] = filesize( ICMS_ROOT_PATH . "/" . $uploaddir . "/" . strtolower( $uploader -> savedFileName ) );
                } 
                return $down;
            } 
        } 
    } else {
        $errors = $uploader -> getErrors();
        redirect_header( $redirecturl, 1, $errors );
    } 
} 

function impression_articlelistheader( $heading ) {
    echo "	<h4 style='font-weight: bold; color: #0A3760;'>" . $heading . "</h4>\n
		<table width='100%' cellspacing='1' style='text-align: center;' class='outer' summary>\n
		<tr>\n
		<th><small>" . _AM_IMPRESSION_MINDEX_ID . "</small></th>\n
		<th style='text-align: left;'>&nbsp;<b><small>" . _AM_IMPRESSION_MINDEX_TITLE . "</small></th>\n
		<th style='text-align: left;'>&nbsp;<b><small>" . _AM_IMPRESSION_MINDEX_CATTITLE . "</small></th>\n
		<th><small>" . _AM_IMPRESSION_MINDEX_POSTER . "</small></th>\n
		<th><small>" . _AM_IMPRESSION_MINDEX_PUBLISH . "</small></th>\n
		<th><small>" . _AM_IMPRESSION_MINDEX_ONLINE . "</small></th>\n
		<th><small>" . _AM_IMPRESSION_MINDEX_ACTION . "</small></th>\n
		</tr>\n
		";
} 

function impression_articlelistbody( $published ) {
    global $impressionmyts, $imagearray, $xoopsModuleConfig;

    $aid = $published['aid'];
    $cid = $published['cid'];
    
    $title = "<a href='../singlearticle.php?cid=" . $published['cid'] . "&amp;aid=" . $published['aid'] . "'>" . $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) . "</a>";;
    $maintitle = urlencode( $impressionmyts -> htmlSpecialChars( trim( $published['title'] ) ) );
    $cattitle = impression_cattitle($published['cid']);
    $submitter = xoops_getLinkedUnameFromId( $published['submitter'] );
    $submitted = formatTimestamp( $published['date'], $xoopsModuleConfig['dateformat'] );
    $publish = ( $published['published'] > 0 ) ? formatTimestamp( $published['published'], $xoopsModuleConfig['dateformatadmin'] ) : 'Not Published';
    if ( $published['status'] == 0 && ( $published['published'] && $published['published'] < time() ) ) {
        $published_status = $imagearray['online'];
    } elseif ( $published['status'] == 2 ) {
        $published_status = $imagearray['rejected'];
    } else {
      //( $published['status'] == 1 ) {
        $published_status = $imagearray['offline'];
    }
    $icon = "<a href='index.php?op=edit&amp;aid=" . $aid . "' title='" . _AM_IMPRESSION_ICO_EDIT . "'>" . $imagearray['editimg'] . "&nbsp;</a>";
    $icon .= "<a href='index.php?op=delete&amp;aid=" . $aid . "' title='" . _AM_IMPRESSION_ICO_DELETE . "'>" . $imagearray['deleteimg'] . "&nbsp;</a>";
    $icon .= "<a href='altcat.php?op=main&amp;cid=" . $cid . "&amp;aid=" . $aid . "&amp;title=" . $published['title'] . "' title='" . _AM_IMPRESSION_ALTCAT_CREATEF . "'>" . $imagearray['altcat'] . "</a>";

    echo " 	<tr>\n
		<td class='head' style='text-align: center;white-space: nowrap;'><small>" . $aid . "</small></td>\n
		<td class='even' style='text-align: left;'>&nbsp;<small>" . $title . "</small></td>\n
		<td class='even' style='text-align: left;'>&nbsp;<small>" . $cattitle . "</small></td>\n
		<td class='even' style='text-align: center;'><small>" . $submitter . "</small></td>\n
		<td class='even' style='text-align: center; white-space: nowrap;'><small>" . $publish . "</small></td>\n
		<td class='even' style='text-align: center; white-space: nowrap;'><small>" . $published_status . "</small></td>\n
		<td class='even' style='text-align: center; width: 60px; white-space: nowrap;'>$icon</td>\n
		</tr>\n
		";
    unset( $published );
} 

function impression_cattitle($catid) {
  global $xoopsDB;
  $sql = "SELECT title FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE cid=" . $catid;
         $result = $xoopsDB -> query( $sql );
         $result = $xoopsDB -> fetchArray( $result );
         return $result['title'];
}

function impression_articlelistfooter() {
    echo "<tr style='text-align: center;'>\n<td class='head' colspan='7'>" . _AM_IMPRESSION_MINDEX_NOARTICLESFOUND . "</td>\n</tr>\n";
} 

function impression_articlelistpagenav( $pubrowamount, $start, $art = "art", $_this='' ) {
    global $xoopsModuleConfig;
    echo "</table>\n";
    if ( ( $pubrowamount < $xoopsModuleConfig['admin_perpage'] ) ) {
        return false;
    } 
    // Display Page Nav if published is > total display pages amount.
    include_once ICMS_ROOT_PATH . '/class/pagenav.php';
//    $page = ( $pubrowamount > $xoopsModuleConfig['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
              //new XoopsPageNav( $count, $xoopsModuleConfig['perpage'] , $start, 'start', $list_by );
    $pagenav = new XoopsPageNav( $pubrowamount, $xoopsModuleConfig['admin_perpage'], $start, 'st' . $art, $_this );
    echo '<div align="right" style="padding: 8px;">' . $pagenav -> renderNav() . '</div>';
}

function impression_articlelistpagenavleft( $pubrowamount, $start, $art = "art", $_this='' ) {
    global $xoopsModuleConfig;
    if ( ( $pubrowamount < $xoopsModuleConfig['admin_perpage'] ) ) {
        return false;
    } 
    // Display Page Nav if published is > total display pages amount.
    include_once ICMS_ROOT_PATH . '/class/pagenav.php';
//    $page = ( $pubrowamount > $xoopsModuleConfig['admin_perpage'] ) ? _AM_IMPRESSION_MINDEX_PAGE : '';
    $pagenav = new XoopsPageNav( $pubrowamount, $xoopsModuleConfig['admin_perpage'], $start, 'st' . $art, $_this );
    echo '<div align="left" style="padding: 8px;">' . $pagenav -> renderNav() . '</div>';
}

// Retreive an editor according to the module's option "form_options"
function impression_getWysiwygForm( $caption, $name, $value = "" ) {
        global $xoopsModuleConfig, $xoopsUser, $xoopsModule;

	$editor = false;

	$editor_configs = array();
	$editor_configs["name"] = $name;
	$editor_configs["value"] = $value;
	$editor_configs["caption"] = $caption;
	$editor_configs["rows"] = 35;
	$editor_configs["cols"] = 60;
	$editor_configs["width"] = "100%";
	$editor_configs["height"] = "500px";

	$isadmin = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $xoopsModule -> mid() ) ) ? true : false;
        if ( $isadmin == true ) {
          $formuser = $xoopsModuleConfig['form_options'];
        } else {
          $formuser = $xoopsModuleConfig['form_optionsuser'];
        }

	switch($formuser) {
	case "fck":
	     if ( is_readable(ICMS_ROOT_PATH . "/editors/fckeditor/formfckeditor.php"))	{
               include_once(ICMS_ROOT_PATH . "/editors/fckeditor/formfckeditor.php");
               $editor = new XoopsFormFckeditor($editor_configs,true);
	     } else {
               if ($dhtml) {
                 $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
	       } else {
                 $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
               }
             }
	     break;

	case "htmlarea":
             if ( is_readable(ICMS_ROOT_PATH . "/class/htmlarea/formhtmlarea.php")) {
               include_once(ICMS_ROOT_PATH . "/class/htmlarea/formhtmlarea.php");
               $editor = new XoopsFormHtmlarea($caption, $name, $value);
	     }
             break;

	case "dhtml":
	     $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
	     break;

	case "textarea":
	     $editor = new XoopsFormTextArea($caption, $name, $value);
	     break;

	case "koivi":
	     if ( is_readable(ICMS_ROOT_PATH . "/editors/koivi/formwysiwygtextarea.php")) {
               include_once(ICMS_ROOT_PATH . "/editors/koivi/formwysiwygtextarea.php");
	       $editor = new XoopsFormWysiwygTextArea($caption, $name, $value, '100%', '400px');
	     } else { 
               if ($dhtml) {
                 $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
	       } else {
                 $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
	       }
	     }
	     break;

	case "tinyeditor":
             if ( is_readable(ICMS_ROOT_PATH . "/class/xoopseditor/tinyeditor/formtinyeditortextarea.php")) {
               include_once(ICMS_ROOT_PATH . "/class/xoopseditor/tinyeditor/formtinyeditortextarea.php");
               $editor = new XoopsFormTinyeditorTextArea(array('caption'=>$caption, 'name'=>$name, 'value'=>$value, 'width'=>'100%', 'height'=>'500px'));
             } else {
               if ($dhtml) {
                 $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 50, 60);
               } else {
                 $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
               }
             }
             break;

	case "dhtmlext":
             if ( is_readable(ICMS_ROOT_PATH . "/editors/dhtmlext/dhtmlext.php")) {
               include_once(ICMS_ROOT_PATH . "/editors/dhtmlext/dhtmlext.php");
	       $editor = new XoopsFormDhtmlTextAreaExtended($caption, $name, $value, 10, 50);
	     } else {
               if ($dhtml) {
                 $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 50, 60);
	       } else {
                 $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
               }
	     }
	     break;

	case "tinymce":
             if ( is_readable(ICMS_ROOT_PATH . "/editors/tinymce/formtinymce.php")) {
               include_once(ICMS_ROOT_PATH . "/editors/tinymce/formtinymce.php");
               $editor = new XoopsFormTinymce(array('caption'=>$caption, 'name'=>$name, 'value'=>$value, 'width'=>'100%', 'height'=>'500px'));
             } else {
               if ($dhtml) {
                 $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
               } else {
                 $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
               }
             }
             break;
	  }
	return $editor;
}

function impression_html2text( $document ) {
		// PHP Manual:: function preg_replace
		// $document should contain an HTML document.
		// This will remove HTML tags, javascript sections
		// and white space. It will also convert some
		// common HTML entities to their text equivalent.
		// Credits : newbb2
		$search = array ("'<script[^>]*?>.*?</script>'si",  // Strip out javascript
		"'<img.*?/>'si",                                    // Strip out img tags
		"'<[\/\!]*?[^<>]*?>'si",                            // Strip out HTML tags
		"'([\r\n])[\s]+'",                                  // Strip out white space
		"'&(quot|#34);'i",                                  // Replace HTML entities
		"'&(amp|#38);'i",
		"'&(lt|#60);'i",
		"'&(gt|#62);'i",
		"'&(nbsp|#160);'i",
		"'&(iexcl|#161);'i",
		"'&(cent|#162);'i",
		"'&(pound|#163);'i",
		"'&(copy|#169);'i",
		);                                                  // evaluate as php

		$replace = array ("",
		"",
		"",
		"\\1",
		"\"",
		"&",
		"<",
		">",
		" ",
		chr(161),
		chr(162),
		chr(163),
		chr(169),
		);

		$text = preg_replace( $search, $replace, $document );

		return $text;
}

// Check if Tag module is installed
function impression_tag_module_included() {
	static 	$impression_tag_module_included;

	if ( !isset( $impression_tag_module_included ) ) {
		$modules_handler = xoops_gethandler( 'module' );
		$tag_mod = $modules_handler -> getByDirName( 'tag' );
		if ( !$tag_mod ) {
                  $tag_mod = false;
		} else {
                  $impression_tag_module_included = $tag_mod -> getVar( 'isactive' ) == 1;
		}
	}
	return $impression_tag_module_included;
}

// Add item_tag to Tag-module
function impression_tagupdate( $aid, $item_tag ) {
         global $xoopsModule;
         if (impression_tag_module_included()) {
            include_once ICMS_ROOT_PATH . "/modules/tag/include/formtag.php";
            $tag_handler = xoops_getmodulehandler( 'tag', 'tag' );
            $tag_handler -> updateByItem( $item_tag, $aid, $xoopsModule -> getVar( 'dirname' ), 0 );
         }
}

function impression_adminicons($aid, $dirname) {
        $iconadmin = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="' . _MD_IMPRESSION_ADMINSECTION . '" title="' . _MD_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>';
        $iconadmin .= '&nbsp;<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="' . _MD_IMPRESSION_EDIT . '" title="' . _MD_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
        $iconadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="' . _MD_IMPRESSION_DELETE . '" title="' . _MD_IMPRESSION_DELETE . '" align="absmiddle"/></a>&nbsp;';
        return $iconadmin;
}

function impression_updateCounter($aid) {
         global $xoopsDB;
	 $sql = "UPDATE " . $xoopsDB -> prefix( 'impression_articles' ) . " SET hits=hits+1 WHERE aid=" . intval($aid);
         $result = $xoopsDB -> queryF( $sql );
}

function impression_substr($str, $start, $length, $trimmarker = '...') {
	$config_handler =& xoops_gethandler('config');
	$im_multilanguageConfig =& $config_handler->getConfigsByCat(IM_CONF_MULILANGUAGE);
    
	if ($im_multilanguageConfig['ml_enable']) {
		$tags = explode(',',$im_multilanguageConfig['ml_tags']);
		$strs = array();
		$hasML = false;
		foreach ($tags as $tag){
			if (preg_match("/\[".$tag."](.*)\[\/".$tag."\]/sU",$str,$matches)) {
				if (count($matches) > 0){
					$hasML = true;
					$strs[] = $matches[1];
				}
			}
		}
	} else {
		$hasML = false;
	}
	
	if (!$hasML) {
        $strs = array($str);
	}
	
	for ($i = 0; $i <= count($strs)-1; $i++) {
		if ( !XOOPS_USE_MULTIBYTES ) {
			$strs[$i] = ( strlen($strs[$i]) - $start <= $length ) ? substr( $strs[$i], $start, $length ) : substr( $strs[$i], $start, $length - strlen($trimmarker) ) . $trimmarker;
		}

		if (function_exists('mb_internal_encoding') && @mb_internal_encoding(_CHARSET)) {
			$str2 = mb_strcut( $strs[$i] , $start , $length - strlen( $trimmarker ) );
			$strs[$i] = $str2 . ( mb_strlen($strs[$i])!=mb_strlen($str2) ? $trimmarker : '' );
		}

		// phppp patch
		$DEP_CHAR=127;
		$pos_st=0;
		$action = false;
		for ( $pos_i = 0; $pos_i < strlen($strs[$i]); $pos_i++ ) {
			if ( ord( substr( $strs[$i], $pos_i, 1) ) > 127 ) {
				$pos_i++;
			}
			if ($pos_i<=$start) {
				$pos_st=$pos_i;
			}
			if ($pos_i>=$pos_st+$length) {
				$action = true;
				break;
			}
		}
		$strs[$i] = ($action) ? substr( $strs[$i], $pos_st, $pos_i - $pos_st - strlen($trimmarker) ) . $trimmarker : $strs[$i];

		$strs[$i] = ($hasML)?'['.$tags[$i].']'.$strs[$i].'[/'.$tags[$i].']':$strs[$i];
	}
	$str = implode('',$strs);

	return $str;
}
?>