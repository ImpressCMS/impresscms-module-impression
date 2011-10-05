<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /blocks/impression_spot.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since		1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links 
* @since		1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

function checkImpressionSpotgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
    $groups = is_object( icms::$user ) ? icms::$user -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = icms::handler('icms_member_groupperm');
    $module_handler = icms::handler( 'icms_module' );
    $module = &$module_handler -> getByDirname( basename( dirname(  dirname( __FILE__ ) ) ) );
    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) ) {
        if ( $redirect == false ) {
            return false;
        } else {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        } 
    } 
    unset( $module );
    return true;
}

function b_impression_spoticons( $aid, $dirname ) {
	$iconsadmin  = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer.png" alt="" title="' . _MB_IMPRESSION_ADMINSECTION . '" /></a>';
	$iconsadmin .= '&nbsp;<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/page_edit.png" alt="" title="' . _MB_IMPRESSION_EDIT . '" /></a>&nbsp;';
	$iconsadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/page_delete.png" alt="" title="' . _MB_IMPRESSION_DELETE . '" /></a>&nbsp;';
	return $iconsadmin;
}

// Function: b_impression_spot_show
// Input   : $options[0] = 	date for the most recent videos
// 			   			hits for the most popular videos
//           $block['content'] = The optional above content
//           $options[1] = How many videos are displayes
//           $options[2] = Set date format
//           $options[3] = Display RSS icons y/n
// Output  : Returns the latest articles
function b_impression_spot_show( $options ) {
    global $xoopsTpl;
    $block = array();
    $modhandler = icms::handler( 'icms_module' );
    $impressionModule = $modhandler -> getByDirname( basename( dirname(  dirname( __FILE__ ) ) ) );
    $config_handler = icms::$config;
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $moderate = 0;
	
    $sql = icms::$xoopsDB -> query( 'SELECT l.aid, l.cid, l.title, l.published, l.nice_url, l.published, l.uid, l.hits, l.introtext, l.description, l.inblocks, l.comments, c.cid, c.inblocks FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' l, ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' c WHERE l.cid=c.cid AND l.published > 0 AND l.published <= ' . time() . ' AND l.status=0 AND l.inblocks=1 AND c.inblocks=1 ORDER BY l.published DESC ', $options[1], 0 );
    while ( $myrow = icms::$xoopsDB -> fetchArray( $sql ) ) {
        if ( false == checkImpressionSpotgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
            continue;
        }
		include_once ICMS_ROOT_PATH . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/include/functions.php';
        $articlespot = array();
        $title = icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $myrow['title'] ) );

        $articlespot['isadmin'] = ( ( is_object( icms::$user ) && !empty( icms::$user ) ) && icms::$user -> isAdmin( $impressionModule -> getVar( 'mid' ) ) ) ? true : false;
        $articlespot['adminarticle'] = '';
		
        if ( $articlespot['isadmin'] == true && $moderate == 0 ) {
			$articlespot['adminarticle'] = b_impression_spoticons( $myrow['aid'], basename( dirname(  dirname( __FILE__ ) ) ) );
        } else {
			$articlespot['adminarticle'] = '[ <a href="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/submit.php?op=edit&amp;aid=' . $myrow['aid'] . '&approve=1">' . _MB_IMPRESSION_APPROVE . '</a> | ';
			$articlespot['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/submit.php?op=delete&amp;aid=' . $myrow['aid'] . '">' . _MB_IMPRESSION_DELETE . '</a> ]';
        }
		
        $articlespot['id'] 			= intval( $myrow['aid'] );
        $articlespot['cid'] 		= intval( $myrow['cid'] );
		$nice_link					= impression_nicelink( $myrow['title'], $myrow['nice_url'] );
		$url						= impression_niceurl( $myrow['aid'], $myrow['title'], $myrow['nice_url'], $impressionModuleConfig['niceurl'] );
        $articlespot['title'] 		= '<a href="' . $url . '">' . $title . ' </a>';
        $articlespot['date'] 		= impression_time( formatTimestamp( $myrow['published'], $options[2] ) );
        $articlespot['hits'] 		= sprintf( _MB_IMPRESSION_ARTICLEHITS, intval( $myrow['hits'] ) );
        $articlespot['submitter'] 	= icms_member_user_Handler::getUserLink( $myrow['uid'] );
        $articlespot['introtext'] 	= $myrow['introtext'];
		$articlespot['description'] = $myrow['description'];     
		$articlespot['comments'] 	= $myrow['comments']; 
		$articlespot['comment_rules'] = $impressionModuleConfig['com_rule']; 
		$articlespot['commentz'] 	= '<img src="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/images/icon/comments.png" alt="" title="' . _COMMENTS . '&nbsp;(' . $myrow['comments'] . ')" />';
		$articlespot['bytesmore']	= mb_strlen( $myrow['description'] );
		if ( mb_strlen( $myrow['description'] ) > 0 ) {	
			$articlespot['readmore'] = '<a href="' . $url . '"><b><i>' . _MB_IMPRESSION_READMORE . '</i></b></a>';
			$articlespot['options']	= $options[3];
		} else {
			$articlespot['readmore'] = '';
		};
		
		$rsssql = 'SELECT rssactive FROM ' . icms::$xoopsDB -> prefix( 'impression_configs' );
		list( $rssactive ) = icms::$xoopsDB -> fetchRow( icms::$xoopsDB -> query( $rsssql ) );
		if ( $rssactive == 1 ) {
			$articlespot['impression_feed'] = '<a href="'. ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/feed.php" target="_blank"><img src="'. ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/images/icon/feed.png" border="0" alt="" title="' . _MB_IMPRESSION_FEED . '" /></a>';
			$xoopsTpl -> assign( 'icms_module_header', '<link rel="alternate" type="application/rss+xml" title="' . _MB_IMPRESSION_FEED . '" href="'. ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/feed.php">' );
		}
		
        $xoopsTpl -> assign( 'dirname', basename( dirname(  dirname( __FILE__ ) ) ) );
        $block['articlespot'][] = $articlespot;
    }
    unset( $_block_check_array );
    return $block;
} 

// b_impresson_top_edit()
// @param $options
// @return
function b_impression_spot_edit( $options ) {
	$form = '<table cellspacing="5">';
    $form .= '<tr><td width="200px"><b>' . _MB_IMPRESSION_DISP . '</b></td>';
    $form .= '<td><input type="hidden" name="options[]" value="';
    if ( $options[0] == 'spot' ) {
        $form .= 'spot"';
    }
    $form .= ' />';
    $form .= '<input type="text" name="options[]" value="' . $options[1] . '" />&nbsp;' . _MB_IMPRESSION_FILES . '</td></tr>';
	
// Date format	
    $form .= '<tr><td><b>' . _MB_IMPRESSION_DATEFORMAT . '</b></td><td><input type="text" name="options[]" value="' . $options[2] . '" />&nbsp;' . _MB_IMPRESSION_DATEFORMATMANUAL . '</td></tr>';
	
// Bytes more	
	$chk   = '';
	if ( $options[3] == 0 ) {
		$chk = ' checked="checked"';
	}
	$form .= '<tr><td><b>' . _MB_IMPRESSION_BYTESYN . '</b></td><td><input type="radio" name="options[3]" value="0"' . $chk . ' />&nbsp;' . _NONE . '&nbsp;';
	
	$chk   = '';
	if ( $options[3] == 1 ) {
		$chk = ' checked="checked"';
	}
	$form .= '&nbsp;<input type="radio" name="options[3]" value="1"' . $chk . ' />&nbsp;' . _MB_IMPRESSION_BYTES . '&nbsp;';

	$chk   = '';
	if ( $options[3] == 2 ) {
		$chk = ' checked="checked"';
	}
	$form .= '&nbsp;<input type="radio" name="options[3]" value="2"' . $chk . ' />&nbsp;' . _MB_IMPRESSION_WORDS . '&nbsp;';	
	
	$chk   = '';
	if ( $options[3] == 3 ) {
		$chk = ' checked="checked"';
	}
	$form .= '&nbsp;<input type="radio" name="options[3]" value="3"' . $chk . ' />&nbsp;' . _MB_IMPRESSION_CHARSF . '</td></tr>';
	
	$form .= '</table>';
    return $form;
}
?>