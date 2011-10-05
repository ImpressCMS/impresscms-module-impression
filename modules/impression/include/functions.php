<?php
/**
* Impression - a light article management module for ImpressCMS
*
* Based upon WF-Links
*
* File: /include/functions.php
*
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

function impression_checkgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
    $groups = is_object( icms::$user ) ? icms::$user -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = icms::handler('icms_member_groupperm');;
    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, icms::$module -> getVar( 'mid' ) ) ) {
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
    $toolbar = '[ ';
    if ( true == impression_checkgroups( $cid, 'ImpressionSubPerm' ) ) {
        $toolbar .= '<a href="submit.php?cid=' . $cid . '">' . _MD_IMPRESSION_SUBMITARTICLE . '</a> | ';
    } 
    $toolbar .= '<a href="newlist.php?newarticleshowdays=7">' . _MD_IMPRESSION_LATESTLIST . '</a> | <a href="topten.php?list=hit">' . _MD_IMPRESSION_POPULARITY . '</a> ]';
    return $toolbar;
} 

// impression_serverstats()
function impression_serverstats() {
    echo '<fieldset style="border: #e8e8e8 1px solid;">
		  <legend style="display: inline; font-weight: bold; color: #0A3760;">' . _AM_IMPRESSION_ARTICLE_IMAGEINFO . '</legend>
	      <div style="padding: 8px;">
		  <img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/server.png" alt="" style="float: left; padding-right: 10px;" />
		  <div>' . _AM_IMPRESSION_ARTICLE_SPHPINI . '</div>';
		  
		  $article_on = '<b>' . _AM_IMPRESSION_ARTICLE_ON . '</b>';
		  $article_off = '<b>' . _AM_IMPRESSION_ARTICLE_OFF . '</b>';
		  
		  $safemode = ( ini_get( 'safe_mode' ) ) ? $article_on . _AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS : $article_off;
		  $registerglobals = ( ini_get( 'register_globals' ) == '' ) ? $article_off : $article_on;
		  $articles = ( ini_get( 'file_uploads' ) ) ? $article_on : $article_off;

		  $gdlib = ( function_exists( 'gd_info' ) ) ? _AM_IMPRESSION_ARTICLE_GDON : _AM_IMPRESSION_ARTICLE_GDOFF;
		  
    echo '<div style="padding-left: 44px;">&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_GDLIBSTATUS . $gdlib . '<br />';
    if ( function_exists( 'gd_info' ) ) {
        if ( true == $gdlib = gd_info() ) {
            echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_GDLIBVERSION . '<b>' . $gdlib['GD Version'] . '</b><br />';
        } 
    } 
    echo '<br />';
    echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_SAFEMODESTATUS . $safemode . '<br />';
    echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_REGISTERGLOBALS . $registerglobals . '<br />';
    echo '&bull;&nbsp;' . _AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS . $articles . '</div>';
    echo '</div></div></fieldset>';
} 

// displayicons()
//
// @param  $time
// @param integer $status
// @param integer $counter
// @return
function impression_displayicons( $time, $status = 0, $counter = 0 ) {
    $new = '';
    $pop = '';
    $newdate = ( time() - ( 86400 * intval( icms::$module -> config['daysnew'] ) ) );
    $popdate = ( time() - 864000 ) ;
    if ( icms::$module -> config['displayicons'] != 3 ) {
        if ( $newdate < $time ) {
            if ( intval( $status ) > 1 ) {
                if ( icms::$module -> config['displayicons'] == 1 )
                    $new = '&nbsp;<span class="impression_minibutton"><img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/error.png" alt="" style="vertical-align: middle;" />&nbsp;' . _MD_IMPRESSION_UPDATE . "</span>";
                if ( icms::$module -> config['displayicons'] == 2 )
                    $new = '<i>' . _MD_IMPRESSION_UPDATE . '!</i>';
            } else {
                if ( icms::$module -> config['displayicons'] == 1 )
                    $new = '&nbsp;<span class="impression_minibutton"><img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/flag_blue.png" alt="" style="vertical-align: middle;" />&nbsp;' . _MD_IMPRESSION_NEW . "</span>";
                if ( icms::$module -> config['displayicons'] == 2 )
                    $new = '<i>' . _MD_IMPRESSION_NEW . '!</i>';
            }
        } 
        if ( $popdate > $time ) {
            if ( $counter >= icms::$module -> config['popular'] ) {
                if ( icms::$module -> config['displayicons'] == 1 )
                    $pop = '&nbsp;<span class="impression_minibutton"><img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/star.png" alt="" style="vertical-align: middle;" />&nbsp;' . _MD_IMPRESSION_POPULAR . "</span>";
                if ( icms::$module -> config['displayicons'] == 2 )
                    $pop = '<i>' . _MD_IMPRESSION_POPULAR . '!</i>';
            } 
        } 
    } 
    $icons = $new . ' ' . $pop;
    return $icons;
}

if ( !function_exists( 'impression_convertorderbyin' ) ) {
    // Reusable Link Sorting Functions
    // impression_convertorderbyin()
    // @param  $orderby
    // @return
    function impression_convertorderbyin( $orderby ) {
        switch ( trim( $orderby ) ) {
            case 'titleA':
                $orderby = 'title ASC';
                break;
            case 'dateA':
                $orderby = 'published ASC';
                break;
            case 'hitsA':
                $orderby = 'hits ASC';
                break;
            case 'titleD':
                $orderby = 'title DESC';
                break;
            case 'hitsD':
                $orderby = 'hits DESC';
                break;
            case 'dateD':
                $orderby = 'published DESC';
                break;
        }
        return $orderby;
    } 
} 
if ( !function_exists( 'impression_convertorderbytrans' ) ) {
    function impression_convertorderbytrans( $orderby ) {
        if ( $orderby == 'hits ASC' ) $orderbyTrans = _MD_IMPRESSION_POPULARITYLTOM;
        if ( $orderby == 'hits DESC' ) $orderbyTrans = _MD_IMPRESSION_POPULARITYMTOL;
        if ( $orderby == 'title ASC' ) $orderbyTrans = _MD_IMPRESSION_TITLEATOZ;
        if ( $orderby == 'title DESC' ) $orderbyTrans = _MD_IMPRESSION_TITLEZTOA;
        if ( $orderby == 'published ASC' ) $orderbyTrans = _MD_IMPRESSION_DATEOLD;
        if ( $orderby == 'published DESC' ) $orderbyTrans = _MD_IMPRESSION_DATENEW;
        return $orderbyTrans;
    }
} 
if ( !function_exists( 'impression_convertorderbyout' ) ) {
    function impression_convertorderbyout( $orderby ) {
        if ( $orderby == 'title ASC' ) $orderby = 'titleA';
        if ( $orderby == 'published ASC' ) $orderby = 'dateA';
        if ( $orderby == 'hits ASC' ) $orderby = 'hitsA';
        if ( $orderby == 'title DESC' ) $orderby = 'titleD';
        if ( $orderby == 'published DESC' ) $orderby = 'dateD';
        if ( $orderby == 'hits DESC' ) $orderby = 'hitsD';
        return $orderby;
    } 
} 

// totalcategory()
// @param integer $pid
// @return
function impression_totalcategory( $pid = 0 ) {
    $sql = 'SELECT cid FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' );
    if ( $pid > 0 ) { $sql .= ' WHERE pid=0'; } 
    $result = icms::$xoopsDB -> query( $sql );
    $catlisting = 0;
    while ( list( $cid ) = icms::$xoopsDB -> fetchRow( $result ) ) {
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
    global $mytree;
    if ( $sel_id > 0 ) {
        $sql = 'SELECT a.aid, a.cid, a.published FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
         . icms::$xoopsDB -> prefix( 'impression_altcat' ) . ' b'
         . ' ON b.aid=a.aid'
         . ' WHERE a.published > 0 AND a.published <= ' . time()
         . ' AND status = 0 '
         . ' AND (b.cid=a.cid OR (a.cid=' . $sel_id . ' OR b.cid=' . $sel_id . '))' 
		 . ' GROUP BY a.aid, a.cid, a.published';
    } else {
        $sql = 'SELECT aid, cid, published FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status = 0 AND published > 0 AND published <= ' . time();
    } 
    if ( $return_sql == 1 ) {
        return $sql;
    } 
    $count = 0;
    $published_date = 0;
    $arr = array();
    $result = icms::$xoopsDB -> query( $sql );
    while ( list( $aid, $cid, $published ) = icms::$xoopsDB -> fetchRow( $result ) ) {
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
            $query2 = 'SELECT a.aid, a.published, a.cid FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' a LEFT JOIN '
             . icms::$xoopsDB -> prefix( 'impression_altcat' ) . ' b'
             . ' ON b.aid=a.aid'
             . ' WHERE a.published > 0 AND a.published <= ' . time()
             . ' AND status = 0 '
             . ' AND (b.cid=a.cid OR (a.cid=' . $arr[$i] . ' OR b.cid=' . $arr[$i] . '))'
			 . ' GROUP BY a.aid, a.published, a.cid';
            $result2 = icms::$xoopsDB -> query( $query2 );
            while ( list( $aid, $published ) = icms::$xoopsDB -> fetchRow( $result2 ) ) {
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
    if ( $indeximage == '' ) {
        $result = icms::$xoopsDB -> query( 'SELECT indeximage, indexheading FROM ' . icms::$xoopsDB -> prefix( 'impression_indexpage' ) );
        list( $indeximage, $indexheading ) = icms::$xoopsDB -> fetchrow( $result );
    } 
    $image = '';
    if ( !empty( $indeximage ) ) {
        $image = impression_displayimage( $indeximage, 'index.php', icms::$module -> config['mainimagedir'], $indexheading );
    } 
    return $image;
} 

function impression_displayimage( $image = '', $path = '', $imgsource = '', $alttext = '' ) {
    $showimage = '';
    // Check to see if link is given
    if ( $path ) {
        $showimage = '<a href="' . $path . '">';
    } 
    // checks to see if the file is valid else displays default blank image
    if ( !is_dir( ICMS_ROOT_PATH . "/{$imgsource}/{$image}" ) && file_exists( ICMS_ROOT_PATH . "/{$imgsource}/{$image}" ) ) {
        $showimage .= '<img src="' . ICMS_URL . '/' . $imgsource . '/' . $image . '" border="0" title="' . $alttext . '" alt="" /></a>';
    } else {
        if ( icms::$user && icms::$user -> isAdmin( icms::$module -> getVar( 'mid' ) ) ) {
            $showimage .= '<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/brokenimg.png" alt="" title="' . _MD_IMPRESSION_ISADMINNOTICE . '" /></a>';
        } else {
            $showimage .= '<img src="' . ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/images/blank.gif" alt="" title="' . $alttext . '" /></a>';
        } 
    } 
    clearstatcache();
    return $showimage;
} 

function impression_isnewimage( $published ) {
    $indicator['image'] = 'modules/' . icms::$module -> getVar( 'dirname' ) . '/images/icon/folder.png';
    $indicator['alttext'] = _MD_IMPRESSION_NEWLAST;
    return $indicator;
} 

function impression_strrrchr( $haystack, $needle ) {
    return substr( $haystack, 0, strpos( $haystack, $needle ) + 1 );
} 

function impression_adminmenu( $currentoption = 0, $header = '', $menu = '', $extra = '', $scount = 5 ) {
	
	icms::$module -> displayAdminMenu( $currentoption, icms::$module -> getVar( 'name' ) . ' | ' . $header );

	// ###### Output warn messages for security ######
    if ( is_dir( ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update/' ) ) {
        icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL1, ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update/' ) );
        echo '<br />';
    } 

    $_file = ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update.php';
    if ( file_exists( $_file ) ) {
        icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL2, ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/update.php' ) );
        echo '<br />';
    } 

    $path1 = ICMS_ROOT_PATH . '/' . icms::$module -> config['mainimagedir'];
    if ( !is_dir( $path1 ) || !is_writable( $path1 ) ) {
        icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path1 ) );
        echo '<br />';
    } 

    $path1_t = ICMS_ROOT_PATH . '/' . icms::$module -> config['mainimagedir'] . '/thumbs';
    if ( !is_dir( $path1_t ) || !is_writable( $path1_t ) ) {
        icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path1_t ) );
        echo '<br />';
    } 

    $path3 = ICMS_ROOT_PATH . '/' . icms::$module -> config['catimage'];
    if ( !is_dir( $path3 ) || !is_writable( $path3 ) ) {
        icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path3 ) );
        echo '<br />';
    } 

    $path3_t = ICMS_ROOT_PATH . '/' . icms::$module -> config['catimage'] . '/thumbs';
    if ( !is_dir( $path3_t ) || !is_writable( $path3_t ) ) {
        icms_core_Message::error( sprintf( _AM_IMPRESSION_WARNINSTALL3, $path3_t ) );
        echo '<br />';
    } 

    echo '<h3 style="color: #2F5376;">' . $header . '</h3>';
    if ( $extra ) {
        echo '<div>' . $extra . '</div>';
    } 
} 

function impression_getDirSelectOption( $selected, $dirarray, $namearray ) {
	global $impressionmyts;
    echo "<select size='1' name='workd' onchange='location.href=\"upload.php?rootpath=\"+this.options[this.selectedIndex].value'>";
    echo "<option value=''>--------------------------------------</option>";
    foreach( $namearray as $namearray => $workd ) {
        if ( $workd === $selected ) {
            $opt_selected = 'selected';
        } else {
            $opt_selected = '';
        } 
        echo "<option value='" . $impressionmyts -> htmlSpecialCharsStrip( $namearray, ENT_QUOTES ) . "' $opt_selected>" . $workd . "</option>";
    } 
    echo "</select>";
} 

function impression_uploading( $_FILES, $uploaddir = 'uploads', $allowed_mimetypes = '', $redirecturl = 'index.php', $num = 0, $redirect = 0, $usertype = 1 ) {
    global $_FILES;

    $down = array();
    include_once ICMS_ROOT_PATH . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/class/uploader.php';
    if ( empty( $allowed_mimetypes ) ) {
        $allowed_mimetypes = impression_retmime( $_FILES['userfile']['name'], $usertype );
    } 
    $upload_dir = ICMS_ROOT_PATH . '/' . $uploaddir . '/';

    $maxfilesize = icms::$module -> config['maxfilesize'];
    $maxfilewidth = icms::$module -> config['maximgwidth'];
    $maxfileheight = icms::$module -> config['maximgheight'];

    $uploader = new ImpressionMediaUploader( $upload_dir, $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight );
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
                    $down['url'] = ICMS_URL . '/' . $uploaddir . '/' . strtolower( $uploader -> savedFileName );
                    $down['size'] = filesize( ICMS_ROOT_PATH . '/' . $uploaddir . '/' . strtolower( $uploader -> savedFileName ) );
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
    echo '<h4 style="font-weight: bold; color: #0A3760;">' . $heading . '</h4>
		  <table width="100%" cellspacing="1" style="text-align: center;" class="outer" summary>
		  <tr>
		  <th><small>' . _AM_IMPRESSION_MINDEX_ID . '</small></th>
		  <th style="text-align: left;">&nbsp;<b><small>' . _AM_IMPRESSION_MINDEX_TITLE . '</small></th>
		  <th style="text-align: left;">&nbsp;<b><small>' . _AM_IMPRESSION_MINDEX_CATTITLE . '</small></th>
		  <th><small>' . _AM_IMPRESSION_MINDEX_POSTER . '</small></th>
		  <th><small>' . _AM_IMPRESSION_MINDEX_PUBLISH . '</small></th>
		  <th><small>' . _AM_IMPRESSION_MINDEX_ONLINE . '</small></th>
		  <th><small>' . _AM_IMPRESSION_MINDEX_ACTION . '</small></th>
		  </tr>';
} 

function impression_articlelistbody( $published ) {
    global $imagearray, $impressionmyts;
    $aid = $published['aid'];
    $cid = $published['cid'];
	if ( $published['inblocks'] ) {
		$icon = $imagearray['blckgreen'];
	} else {
		$icon = $imagearray['blckorange'];
	}
    $nice_link = impression_nicelink( $published['title'], $published['nice_url'] );
	if ( icms::$module -> config['niceurl'] ) {
		$title = $icon . '&nbsp;<a href="../singlearticle.php?aid=' . $published['aid'] . '&amp;title=' . $nice_link . '">' . $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) . '</a>';
	} else {
		$title = $icon . '&nbsp;<a href="../singlearticle.php?aid=' . $published['aid'] . '">' . $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) . '</a>';
	}
    $maintitle = urlencode( $impressionmyts -> htmlSpecialCharsStrip( trim( $published['title'] ) ) );
    $cattitle = impression_cattitle( $published['cid'] );
    $submitter = icms_member_user_Handler::getUserLink( $published['uid'] );
    $submitted = impression_time( formatTimestamp( $published['date'], icms::$module -> config['dateformat'] ) );
    $publish = ( $published['published'] > 0 ) ? impression_time( formatTimestamp( $published['published'], icms::$module -> config['dateformatadmin'] ) ) : _AM_IMPRESSION_NOTPUBLiSHED;

    if ( $published['status'] == 0 && ( $published['published'] && $published['published'] < time() ) ) {
        $published_status = $imagearray['online'];
    } elseif ( $published['status'] == 2 ) {
        $published_status = $imagearray['rejected'];
    } elseif ( $published['status'] == 3 ) {
        $published_status = $imagearray['submitted'];
    } else {
        $published_status = $imagearray['offline'];
    }
    $icon  = '<a href="index.php?op=edit&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ICO_EDIT . '">' . $imagearray['editimg'] . '&nbsp;</a>';
    $icon .= '<a href="index.php?op=delete&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ICO_DELETE . '">' . $imagearray['deleteimg'] . '&nbsp;</a>';
	$icon .= '<a href="index.php?op=clone&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ICO_CLONE . '">' . $imagearray['clone'] . '</a>&nbsp;';
    $icon .= '<a href="altcat.php?op=main&amp;aid=' . $aid . '" title="' . _AM_IMPRESSION_ALTCAT_CREATEF . '">' . $imagearray['altcat'] . '</a>';

    echo '<tr style="font-size: smaller;">
		  <td class="head" style="text-align: center;white-space: nowrap;">' . $aid . '</td>
		  <td class="even" style="text-align: left;">' . $title . '</td>
		  <td class="even" style="text-align: left;white-space: nowrap;">' . $cattitle . '</td>
		  <td class="even" style="text-align: center;">' . $submitter . '</td>
		  <td class="even" style="text-align: center; white-space: nowrap;">' . $publish . '</td>
		  <td class="even" style="text-align: center; white-space: nowrap;">' . $published_status . '</td>
		  <td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon . '</td>
		  </tr>';
    unset( $published );
} 

function impression_cattitle( $catid ) {
global $imagearray;
  $sql = 'SELECT title, inblocks FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $catid;
         $result = icms::$xoopsDB -> fetchArray( icms::$xoopsDB -> query( $sql ) );
		 if ( $result['inblocks'] ) {
			$ret = $imagearray['blckgreen'] . '&nbsp;<a href="../catview.php?cid=' . $catid . '">' . $result['title'] . '</a>';
		} else {
			$ret = $imagearray['blckorange'] . '&nbsp;<a href="../catview.php?cid=' . $catid . '">' . $result['title'] . '</a>';
		}	
         return $ret;
}

function impression_articlelistfooter() {
    echo '<tr style="text-align: center;">
			<td class="head" colspan="7">' . _AM_IMPRESSION_MINDEX_NOARTICLESFOUND . '</td>
		  </tr>';
} 

function impression_articlelistpagenav( $pubrowamount, $start, $art = 'art', $_this='', $align ) {
    if ( ( $pubrowamount < icms::$module -> config['admin_perpage'] ) ) {
        return false;
    } 
    // Display Page Nav if published is > total display pages amount.
    $pagenav = new icms_view_PageNav( $pubrowamount, icms::$module -> config['admin_perpage'], $start, 'st' . $art, $_this );
    echo '<div style="float: ' . $align . '; font-size: 0.9em;">' . $pagenav -> renderNav() . '</div>';
}

// Retreive an editor according to the module's option "form_options"
function impression_getWysiwygForm( $caption, $name, $value, $height, $height2 ) {
	$isadmin = ( ( is_object( icms::$user ) && !empty( icms::$user ) ) && icms::$user -> isAdmin( icms::$module -> getVar( 'mid' ) ) ) ? true : false;
	if ( $isadmin == true ) {
		$formuser = icms::$module -> config['form_options'];
	} else {
		$formuser = icms::$module -> config['form_optionsuser'];
	}
	$editor='';
	switch( $formuser ) {
	
	case 'fck':
		$editor = impression_fckeditor( $caption, $name, $value, $height );
		break;

	case 'tinyeditor':
		$editor = impression_tinyeditor( $caption, $name, $value, $height );
		break;

	case 'tinymce' :
		$editor = impression_tinymce( $caption, $name, $value, $height );    
        break;
	}
	return $editor;
}

function impression_fckeditor( $caption, $name, $value, $height ) {
	if ( file_exists( ICMS_ROOT_PATH . '/editors/FCKeditor/formfckeditor.php' ) ) {
		include_once( ICMS_ROOT_PATH . '/editors/FCKeditor/formfckeditor.php' );
		$impression_editor = new XoopsFormFckeditor( array( 'caption' => $caption, 'name' => $name, 'value' => $value, 'width' => '100%', 'height' => $height . 'px' ), true );
	}
	return $impression_editor;
}

function impression_tinyeditor( $caption, $name, $value, $height ) {
	if ( file_exists( ICMS_ROOT_PATH . '/class/xoopseditor/tinyeditor/formtinyeditortextarea.php' ) ) {
		include_once( ICMS_ROOT_PATH . '/class/xoopseditor/tinyeditor/formtinyeditortextarea.php' );
		$impression_editor = new XoopsFormTinyeditorTextArea( array( 'caption' => $caption, 'name' => $name, 'value' => $value, 'width' => '100%', 'height' => $height . 'px' ) );
	}
	return $impression_editor;
}	

function impression_tinymce( $caption, $name, $value, $height ) {
	if ( file_exists( ICMS_ROOT_PATH . '/editors/tinymce/formtinymce.php' ) ) {
		include_once( ICMS_ROOT_PATH . '/editors/tinymce/formtinymce.php' );
		$impression_editor = new XoopsFormTinymce( array( 'caption' => $caption, 'name' => $name, 'value' => $value, 'width' => '100%', 'height' => $height . 'px', 0 ) );
	}
	return $impression_editor;
}

// Check if Tag module is installed
function impression_tag_module_included() {
	static 	$impression_tag_module_included;
	if ( !isset( $impression_tag_module_included ) ) {
		$modules_handler = icms::handler( 'icms_module' );
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
	if (impression_tag_module_included()) {
		include_once ICMS_ROOT_PATH . '/modules/tag/include/formtag.php';
		$tag_handler = icms_getModuleHandler( 'tag', 'tag' );
		$tag_handler -> updateByItem( $item_tag, $aid, icms::$module -> getVar( 'dirname' ), 0 );
	}
}

function impression_adminicons( $aid, $dirname ) {
	$iconadmin = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="" title="' . _MD_IMPRESSION_ADMINSECTION . '" style="vertical-align: middle;" /></a>';
	$iconadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="" title="' . _MD_IMPRESSION_EDIT . '" style="vertical-align: middle;" /></a>';
	$iconadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="" title="' . _MD_IMPRESSION_DELETE . '" style="vertical-align: middle;" /></a>';
	return $iconadmin;
}

function impression_updateCounter( $aid ) {
	$sql = 'UPDATE ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' SET hits=hits+1 WHERE aid=' . intval( $aid );
	$result = icms::$xoopsDB -> queryF( $sql );
}

// Check if imGlossary module is installed
function impression_imglossary_module_included() {
  static $impression_imglossary_module_included;
  if ( !isset( $impression_imglossary_module_included ) ) {
    $modules_handler = icms::handler( 'icms_module' );
    $news_mod = $modules_handler -> getByDirName( icms::$module -> config['imglossarydir'] );
    if ( !$news_mod ) {
      $news_mod = false;
    } else {
      $impression_imglossary_module_included = $news_mod -> getVar( 'isactive' ) == 1;
    }
  }
  return $impression_imglossary_module_included;
}

function impression_linkterms( $definition, $glossaryterm ) {
	
	// Code to make links out of glossary terms
	$parts = explode( '¤', $definition );

	// First, retrieve all terms from the glossary...
	$allterms = icms::$xoopsDB -> query( 'SELECT entryID, term FROM ' . icms::$xoopsDB -> prefix( 'imglossary_entries' ) . ' WHERE submit=0 AND offline=0' );
	while ( list( $entryID, $term ) = icms::$xoopsDB -> fetchrow( $allterms ) ) {
		foreach( $parts as $key => $part ) {
			if ( $term != $glossaryterm ) {
				// singular
				$term_q = preg_quote( $term, '/' );
				$search_term = "/\b$term_q\b/i";
				$replace_term = '<span><b><a style="color: #2F5376; cursor: help;" href="' . ICMS_URL . '/modules/imglossary/entry.php?entryID=' . intval( $entryID ) . '">' . $term . '</a></b></span>';
				$parts[$key] = preg_replace( $search_term, $replace_term, $parts[$key] );

				// plural
				$term = $term . 's';
				$term_q = preg_quote( $term, '/' );
				$search_term = "/\b$term_q\b/i";
				$replace_term = '<span><b><a style="color: #2F5376; cursor: help;" href="' . ICMS_URL . '/modules/imglossary/entry.php?entryID=' . intval( $entryID ) . '">' . $term . '</a></b></span>';
				$parts[$key] = preg_replace( $search_term, $replace_term, $parts[$key] );

				// plural with e
				$term = $term . 'es';
				$term_q = preg_quote( $term, '/' );
				$search_term = "/\b$term_q\b/i";
				$replace_term = '<span><b><a style="color: #2F5376; cursor: help;" href="' . ICMS_URL . '/modules/imglossary/entry.php?entryID=' . intval( $entryID ) . '">' . $term . '</a></b></span>';
				$parts[$key] = preg_replace( $search_term, $replace_term, $parts[$key] );
			}
		}
	}
	$definition = implode( '¤', $parts );
	return $definition;
}

function impression_noindexnofollow() { 
    global $xoTheme, $xoopsTpl; 
    if ( is_object( $xoTheme ) ) { 
        $xoTheme -> addMeta( 'meta', 'robots', 'noindex,nofollow' ); 
    } else { 
        $xoopsTpl -> assign( 'icms_meta_robots', 'noindex,nofollow' ); 
    } 
}

function impression_time( $time ) {
	global $icmsConfig;
	$mydirname = basename( dirname( dirname( __FILE__ ) ) );
	include_once ICMS_ROOT_PATH . '/modules/' . $mydirname . '/language/' . $icmsConfig['language'] . '/local.php';
	$trans = array(	'Monday'    => _IMPRESSION_MONDAY,
					'Tuesday'   => _IMPRESSION_TUESDAY,
					'Wednesday' => _IMPRESSION_WEDNESDAY,
					'Thursday'  => _IMPRESSION_THURSDAY,
					'Friday'    => _IMPRESSION_FRIDAY,
					'Saturday'  => _IMPRESSION_SATURDAY,
					'Sunday'    => _IMPRESSION_SUNDAY,
					'Mon'    	=> _IMPRESSION_MON,
					'Tue'   	=> _IMPRESSION_TUE,
					'Wed' 		=> _IMPRESSION_WED,
					'Thu'  		=> _IMPRESSION_THU,
					'Fri'    	=> _IMPRESSION_FRI,
					'Sat'  		=> _IMPRESSION_SAT,
					'Sun'    	=> _IMPRESSION_SUN,
					'Januari'	=> _IMPRESSION_JANUARI,
					'Februari'	=> _IMPRESSION_FEBRUARI,
					'March'		=> _IMPRESSION_MARCH,
					'April'		=> _IMPRESSION_APRIL,
					'May'		=> _IMPRESSION_MAY,
					'June'		=> _IMPRESSION_JUNE,
					'July'		=> _IMPRESSION_JULY,
					'August'	=> _IMPRESSION_AUGUST,
					'September' => _IMPRESSION_SEPTEMBER,
					'October'	=> _IMPRESSION_OCTOBER,
					'November'	=> _IMPRESSION_NOVEMBER,
					'December'	=> _IMPRESSION_DECEMBER,
					'Jan'		=> _IMPRESSION_JAN,
					'Feb'		=> _IMPRESSION_FEB,
					'Mar'		=> _IMPRESSION_MAR,
					'Apr'		=> _IMPRESSION_APR,
					'May'		=> _IMPRESSION_MAY2,
					'Jun'		=> _IMPRESSION_JUN,
					'Jul'		=> _IMPRESSION_JUL,
					'Aug'		=> _IMPRESSION_AUG,
					'Sep' 		=> _IMPRESSION_SEP,
					'Oct'		=> _IMPRESSION_OCT,
					'Nov'		=> _IMPRESSION_NOV,
					'Dec'		=> _IMPRESSION_DEC );
	$timestamp = strtr( $time, $trans );
	return $timestamp;
}

function impression_nicelink( $title, $niceurl ) {
	$title = strtolower( filter_var( str_replace( ' ', '_', impression_charrepl( $title ) ), FILTER_SANITIZE_SPECIAL_CHARS ) );
	$niceurl = strtolower( filter_var( str_replace( ' ', '_', impression_charrepl( $niceurl ) ), FILTER_SANITIZE_SPECIAL_CHARS ) );
	if ( !$niceurl ) {
		$nicelink = filter_var( $title, FILTER_SANITIZE_URL );
	} else {
		$nicelink = filter_var( $niceurl, FILTER_SANITIZE_URL );
	}
	return $nicelink;
}

function impression_niceurl( $aid, $title, $niceurl, $nice_url ) {
	$mydirname = basename( dirname( dirname( __FILE__ ) ) );
	if ( $nice_url ) {
		$niceurl = ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?aid=' . $aid . '&amp;title=' . impression_nicelink( $title, $niceurl );
	} else {
		$niceurl = ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?aid=' . $aid;
	}
	return $niceurl;
}

function impression_charrepl( $string ) {
    $find = array( 'À','Á','Â','Ã','Ä','Å','Ā','Ă','Ą','Æ','Ç','Ć','Ĉ','Ċ','Č','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ń','Ņ','Ň','Ò','Ó','Ô','Õ','Ö','Œ','Ø','Ŕ','Ŗ','Ř','Ś','Ŝ','Ş','Š','Ù','Ú','Û','Ü','Ũ','Ů','Ű','Ý','Ŷ','Ÿ','à','á','â','ã','ä','å','ā','ă','ą','æ','ç','ć','ĉ','ċ','č','è','é','ê','ë','ì','í','î','ï','ð','ñ','ń','ŉ','ņ','ň','ò','ó','ô','õ','ö','œ','ø','ŕ','ŗ','ř','ś','ŝ','ş','š','ũ','ú','û','ü','ů','ű','ß','ý','ŷ','ÿ','²','³' );
	$repl = array( 'A','A','A','A','A','A','A','A','A','AE','C','C','C','C','C','E','E','E','E','I','I','I','I','D','N','N','N','N','O','O','O','O','O','O','O','R','R','R','S','S','S','S','U','U','U','U','U','U','U','Y','Y','Y','a','a','a','a','a','a','a','a','a','ae','c','c','c','c','c','e','e','e','e','i','i','i','i','d','n','n','n','n','n','o','o','o','o','o','o','o','o','r','r','r','s','s','s','s','u','u','u','u','u','u','s','y','y','y','2','3' );
	$text1 = str_replace( $find, $repl, $string );
	// Now remove unwanted characters from the title
	$search = array (
         '/\'/',
		 '/\"/',
         '/\$/',
		 '/\£/',
		 '/\¥/',
		 '/\¢/',
		 '/\¤/',
		 '/\%/',
         '/\@/',
		 '/\&/',
		 '/\#/',
		 '/\*/',
		 '/\~/',
		 '/\^/',
		 '/\`/',
		 '/\´/',
		 '/\,/',
		 '/\./',
		 '/\(/',
		 '/\)/',
		 '/\[/',
		 '/\]/',
		 '/\{/',
		 '/\}/',
		 '/\|/',
		 '/\</',
		 '/\>/',
		 '/\?/',
		 '/\!/',
		 '/\//',
		 '/\;/',
		 '/\:/',
		 '/\©/',
		 '/\®/',
		 '/\¼/',
		 '/\½/',
		 '/\¾/',
		 '/\¹/',
		 '/\²/',
		 '/\³/',
		 '/\¿/',
		 '/\×/',
		 '/\¡/',
		 '/\°/',
		 '/\µ/',
		 '/\÷/',
		 '/\+/' );
	$text = preg_replace( $search, '', $text1 );
    return $text;
}
?>