<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /blocks/impression_new.php
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

function checkImpressionNewBlockgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
	$groups = is_object( icms::$user ) ? icms::$user -> getGroups() : XOOPS_GROUP_ANONYMOUS;
	$gperm_handler = icms::handler('icms_member_groupperm');
	$module_handler = &icms::handler( 'icms_module' );
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

function b_impression_displaynewicons( $time, $status = 0, $counter = 0 ) {
	$modhandler = icms::handler( 'icms_module' );
	$impressionModule = $modhandler -> getByDirname( basename( dirname(  dirname( __FILE__ ) ) ) );
	$config_handler = icms::handler( 'icms_config' );
	$impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
	$new = '';
	$pop = '';

	$newdate = ( time() - ( 86400 * intval( $impressionModuleConfig['daysnew'] ) ) );
	$popdate = ( time() - ( 86400 * 10  ) ) ;

	if ( $impressionModuleConfig['displayicons'] != 3 ) {
		if ( $newdate < $time ) {
			if ( intval( $status ) > 1 ) {
				if ( $impressionModuleConfig['displayicons'] == 1 )
					$new = '&nbsp;<span class="impression_microbutton"><img src="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/images/icon/icon_alert.gif" alt="" style="verticl-align: middle;" />&nbsp;' . _MB_IMPRESSION_UPDATED . "</span>";
				if ( $impressionModuleConfig['displayicons'] == 2 )
					$new = '<i>' . _MB_IMPRESSION_UPDATED . '</i>';
			} else {
				if ( $impressionModuleConfig['displayicons'] == 1 )
					$new = '&nbsp;<span class="impression_microbutton"><img src="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/images/icon/icon_flag_blue.gif" alt="" style="verticl-align: middle;" />&nbsp;' . _MB_IMPRESSION_NEW . "</span>";
				if ( $impressionModuleConfig['displayicons'] == 2 )
					$new = '<i>' . _MB_IMPRESSION_NEW . '</i>';
			}
		} 
		if ( $popdate > $time ) {
			if ( $counter >= $impressionModuleConfig['popular'] ) {
				if ( $impressionModuleConfig['displayicons'] == 1 )
					$pop = '&nbsp;<span class="impression_microbutton"><img src="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/images/icon/icon_favourites.gif" alt="" style="verticl-align: middle;" />&nbsp;' . _MB_IMPRESSION_POPULAR . "</span>";
				if ( $impressionModuleConfig['displayicons'] == 2 )
					$pop = '<i>' . _MB_IMPRESSION_POPULAR . '</i>';
			}
		}
	}
	$icons = $new . ' ' . $pop;
	return $icons;
}

function b_impression_adminnewicons( $aid, $dirname ) {
	$iconadmin = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="" title="' . _MB_IMPRESSION_ADMINSECTION . '" /></a>';
	$iconadmin .= '&nbsp;<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="" title="' . _MB_IMPRESSION_EDIT . '" /></a>&nbsp;';
	$iconadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="" title="' . _MB_IMPRESSION_DELETE . '" /></a>&nbsp;';
	return $iconadmin;
}

// Function	: b_impression_new_show
// Input	: $options[0] =	date for the most recent articles
//							hits for the most popular articles
//			  $block['content'] = The optional above content
//			  $options[1] = How many videos are displayes
// Output  :  Returns the most recent or most popular articles
function b_impression_new_show( $options ) {
	global $xoopsTpl;
	$block = array();
	$modhandler = icms::handler( 'icms_module' );
	$impressionModule = $modhandler -> getByDirname( basename( dirname(  dirname( __FILE__ ) ) ) );
	$config_handler = icms::handler( 'icms_config' );
	$impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );

	$result = icms::$xoopsDB -> query( 'SELECT l.aid, l.cid, l.title, l.published, l.status, l.hits, l.nice_url, l.inblocks, l.comments, c.cid, c.inblocks FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' l, ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' c WHERE l.cid=c.cid AND l.published > 0 AND l.published <= ' . time() . ' AND l.status=0 AND l.inblocks=1 AND c.inblocks=1 ORDER BY l.published DESC ', $options[1], 0 );
	while ( $myrow = icms::$xoopsDB -> fetchArray( $result ) ) {
		if ( false == checkImpressionNewBlockgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
			continue;
		}
		include_once ICMS_ROOT_PATH . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/include/functions.php';

		$result2 = icms::$xoopsDB -> query( 'SELECT title FROM ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' WHERE cid=' . $myrow['cid'] );
		$mycat = icms::$xoopsDB -> fetchArray( $result2 );

		$articlenew 					= array();
		$articlenew['id']				= intval( $myrow['aid'] );
		$articlenew['cid']				= intval( $myrow['cid'] );
		$title							= icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $myrow['title'] ) );
		$url 							= impression_niceurl( $myrow['aid'], $myrow['title'], $myrow['nice_url'], $impressionModuleConfig['niceurl'] );
		$articlenew['title']			= '<a href="' . $url . '">' . $myrow['title'] . ' </a>';
		$articlenew['cattitle'] 		= '<a href="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/catview.php?cid=' . $myrow['cid'] . '">' . $mycat['title'] . ' </a>';
		$articlenew['published']				= impression_time( formatTimestamp( $myrow['published'], $options[2] ) );
		$articlenew['newpopicons']		= b_impression_displaynewicons( $myrow['published'], $myrow['status'], $myrow['hits'] );
		$articlenew['adminnewicons']	= b_impression_adminnewicons( intval( $myrow['aid'] ), basename( dirname(  dirname( __FILE__ ) ) ) );
		$articlenew['comments'] 		= hascomments( $myrow['aid'] );
		$articlenew['comment_rules']	= $impressionModuleConfig['com_rule'];
		$articlenew['commentz'] 		= '<img src="' . ICMS_URL . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/images/icon/comment.png" alt="" title="' . _COMMENTS . '&nbsp;(' . hascomments( $myrow['aid'] ) . ')" />';

		$xoopsTpl -> assign( 'dirname', basename( dirname(  dirname( __FILE__ ) ) ) );
		$block['articlenew'][] = $articlenew;
	}
	unset( $_block_check_array );
	return $block;
}

// b_impression_new_edit()
// @param $options
// @return
function b_impression_new_edit( $options ) {
	global $icmsAdminTpl;
	$icmsAdminTpl -> assign( 'xoops_module_header', '<script type="text/javascript" language="javascript" src="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.js"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.css" />');
	include_once ICMS_ROOT_PATH . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/include/functions.php';

	$form = '<table cellspacing="5">';

	$form .= '<tr><td width="140px"><b>' . _MB_IMPRESSION_DISP . '</b></td>';
	$form .= '<td><input type="hidden" name="options[]" value="';
	if ( $options[0] == 'new' ) {
		$form .= 'new"';
	}
	$form .= ' />';
	$form .= '<input type="text" name="options[]" value="' . $options[1] . '" />&nbsp;' . _MB_IMPRESSION_HEADLINES . '</td></tr>';

	$form .= '<tr><td><b>' . _MB_IMPRESSION_DATEFORMAT . '</b>' . impression_tooltip( _MB_IMPRESSION_DATEFORMATMANUAL, 'help' ) . '</td>';
	$form .= '<td><input type="text" name="options[]" value="' . $options[2] . '" /></td></tr>';
	
	$form .= '</table>';
	return $form;
}
?>