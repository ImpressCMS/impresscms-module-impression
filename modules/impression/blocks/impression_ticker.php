<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /blocks/impression_ticker.php
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

function checkImpressionTickerBlockgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {
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

// Function : b_impression_ticker
// Input	: $options[1] = How many titles to display
//			  $options[2] = Date format
//			  $options[3] = Marquee or Ticker
function b_impression_ticker( $options ) {
	global $xoopsTpl;
	$block = array();
	$modhandler = icms::handler( 'icms_module' );
	$impressionModule = $modhandler -> getByDirname( basename( dirname(  dirname( __FILE__ ) ) ) );
	$config_handler = icms::handler( 'icms_config' );
	$impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );

	$result = icms::$xoopsDB -> query( 'SELECT l.aid, l.cid, l.title, l.published, l.status, l.nice_url, l.inblocks, c.cid, c.inblocks FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' l, ' . icms::$xoopsDB -> prefix( 'impression_cat' ) . ' c WHERE l.cid=c.cid AND l.published > 0 AND l.published <= ' . time() . ' AND l.status=0 AND l.inblocks=1 AND c.inblocks=1 ORDER BY l.published DESC ', $options[1], 0 );
	while ( $myrow = icms::$xoopsDB -> fetchArray( $result ) ) {
		if ( false == checkImpressionTickerBlockgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
			continue;
		}
		include_once ICMS_ROOT_PATH . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/include/functions.php';

		$ticker 				= array();
		$title					= icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( $myrow['title'] ) );
		$url 					= impression_niceurl( $myrow['aid'], $myrow['title'], $myrow['nice_url'], $impressionModuleConfig['niceurl'] );
		$ticker['title']		= '<a href="' . $url . '">' . $title . ' </a>';
		$ticker['published']	= impression_time( formatTimestamp( $myrow['published'], $options[2] ) );

		$xoopsTpl -> assign( 'tickertype', $options[3] );
		$xoopsTpl -> assign( 'dirname', basename( dirname(  dirname( __FILE__ ) ) ) );
		$block['ticker'][] = $ticker;
	}
	unset( $_block_check_array );
	return $block;
}

// b_impression_ticker_edit()
// @param $options
// @return
function b_impression_ticker_edit( $options ) {
	global $icmsAdminTpl;
	$icmsAdminTpl -> assign( 'xoops_module_header', '<script type="text/javascript" language="javascript" src="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.js"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="' . ICMS_LIBRARIES_URL . '/lytebox/lytebox.css" />');
	include_once ICMS_ROOT_PATH . '/modules/' . basename( dirname(  dirname( __FILE__ ) ) ) . '/include/functions.php';

	$form = '<table cellspacing="5">';

	$form .= '<tr><td width="200px"><b>' . _MB_IMPRESSION_DISP . '</b></td>';
	$form .= '<td><input type="hidden" name="options[]" value="ticker" />';
	$form .= '<input type="text" name="options[]" value="' . $options[1] . '" />&nbsp;' . _MB_IMPRESSION_HEADLINES . '</td></tr>';

	$form .= '<tr><td><b>' . _MB_IMPRESSION_DATEFORMAT . '</b>' . impression_tooltip( _MB_IMPRESSION_DATEFORMATMANUAL, 'help' ) . '</td>';
	$form .= '<td><input type="text" name="options[]" value="' . $options[2] . '" /></td></tr>';

	$ticker_arr = array( _MB_IMPRESSION_TICKER01, _MB_IMPRESSION_TICKER02, _MB_IMPRESSION_TICKER03, _MB_IMPRESSION_TICKER04, _MB_IMPRESSION_TICKER05 );
	$form .= '<tr><td><b>' . _MB_IMPRESSION_SELECTTICKER . '</b></td><td><select name="options[]" size="1">';
	foreach( $ticker_arr as $tickerlist ) {
		$selected = '';
		if ( $options[3] == $tickerlist  ) {
			$selected = ' selected';
		}
		$form .= '<option value="' . $tickerlist . '"' . $selected . '>' . $tickerlist . '</option>';
	}
	$form .= '</select>';
	$form .= '</td></tr>';

	$form .= '</table>';
	return $form;
}
?>