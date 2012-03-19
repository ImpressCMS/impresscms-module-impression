<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: icms_version.php
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

$impressiondir = basename( dirname( __FILE__ ) );

global $icmsConfig;

if ( file_exists( ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/language/' . $icmsConfig['language'] . '/moduleabout.php' ) ) {
	include_once ICMS_ROOT_PATH . '/modules/' . $impressiondir . '/language/' . $icmsConfig['language'] . '/moduleabout.php';
} else { include_once ICMS_ROOT_PATH . '/language/english/moduleabout.php'; }

$modversion['name'] 			= _MI_IMPRESSION_NAME;
$modversion['version']			= 1.11;
$modversion['date'] 			= '18 March 2012';
$modversion['status']			= 'RC-2';
$modversion['status_version']	= 'RC-2';
$modversion['description'] 		= _MI_IMPRESSION_DESC;
$modversion['license']			= _MI_IMPRESSION_ABOUTLICENSE;
$modversion['dirname']			= basename( dirname( __FILE__ ) );
$modversion['image']			= 'images/impression_ilogo.png';
$modversion['iconsmall']		= 'images/impression_iconsmall.png';
$modversion['iconbig']			= 'images/impression_iconbig.png';

$modversion['author']				= 'Version developer: McDonald';
$modversion['credits']				= 'WF-Projects Team. Based on the module WF-Links, thanks to the dream-team for some code snippits.';
$modversion['author_credits']		= _MI_IMPRESSION_AUTHOR_CREDITSTEXT;
$modversion['author_website_url']	= 'http://code.google.com/p/mcdonaldsstore/';
$modversion['author_website_name']	= 'McDonalds Store';

$modversion['support_site_url'] = 'http://community.impresscms.org/modules/newbb/viewforum.php?forum=9';
$modversion['support_site_name']= '<a href="http://community.impresscms.org/modules/newbb/viewforum.php?forum=9" target="_blank">ImpressCMS Community Forum - Modules Support</a>';

// ** Contributors **
$modversion['people']['developers'] [] = '<a href="http://community.impresscms.org/userinfo.php?uid=179" target="_blank">McDonald</a>&nbsp;&nbsp;<span style="font-size: smaller;">( pietjebell31 [at] hotmail [dot] com )</span>';

$modversion['people']['testers'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=10" target="_blank">sato-san</a>';
$modversion['people']['testers'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=14" target="_blank">GibaPhp</a>';

$modversion['people']['translators'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=10" target="_blank">sato-san</a> & Prickel (German)';
$modversion['people']['translators'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=14" target="_blank">GibaPhp</a>  (Portuguese-Brazil)';
$modversion['people']['translators'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=97" target="_blank">debianus</a> (Spanish)';
$modversion['people']['translators'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=179" target="_blank">McDonald</a>  (Dutch)';
$modversion['people']['translators'][] = '&middot; <a href="http://community.impresscms.org/userinfo.php?uid=480" target="_blank">algalochkin</a> (Russian)';

$modversion['people']['other'][] = '&middot; WF-Projects Team: amayer, bender, david, dqflyer, draven, frankblack, gladiac, hervet, jackj, mercibe, John N, phppp, predator, reliableSol, tom, xpider, xtheme';
$modversion['people']['other'][] = '&middot; <a href="http://www.famfamfam.com" target="_blank">famfamfam.com</a> (icons)';
$modversion['people']['other'][] = '&middot; <a href="http://www.icons-land.com" target=_blank">Icons-Land</a> (icons)';
$modversion['people']['other'][] = '&middot; <a href="http://www.fixicon.com" target="_blank">FixIcon</a> (module icon)';
$modversion['people']['other'][] = '&middot; <a href="http://www.heise.de/extras/socialshareprivacy/" target="_blank">Social Share Privacy</a>';
$modversion['people']['other'][] = '&middot; <a href="http://jonmifsud.com/web-tools/jquery-webticker/" target="_blank">Jonathan Mifsud</a> (Marquee)';
$modversion['people']['other'][] = '&middot; <a href="http://www.makemineatriple.com/2007/10/bbcnewsticker" target="_blank">Bryan Gullan</a> (Ticker style 01)';
$modversion['people']['other'][] = '&middot; <a href="http://www.jquerynewsticker.com/" target="_blank">jQuery News Ticker</a> (Ticker style 02)';
$modversion['people']['other'][] = '&middot; <a href="http://www.scriptbreaker.com/javascript/script/JQuery-news-slider" target="_blank">ScriptBreaking.com</a> (Vertical ticker)';
$modversion['people']['other'][] = '&middot; <a href="http://bxslider.com/" target="_blank">Steven Wanderski</a> (bxSlider)';

// ** Documentation
$modversion['manual'][] = '<a href="http://www.assembla.com/code/impresscmsaddons/subversion/nodes/modules/impression/docs/impression_manual_en.pdf" target="_blank">English [PDF]</a>';
//$modversion['manual'][] = '<a href="http://www.assembla.com/code/impresscmsaddons/subversion/nodes/modules/impression/docs/impression_manual_de.pdf" target="_blank">German [PDF]</a>';
//$modversion['manual'][] = '<a href="http://www.assembla.com/code/impresscmsaddons/subversion/nodes/modules/impression/docs/impression_manual_nl.pdf" target="_blank">Nederlands [PDF]</a>';
//$modversion['manual'][] = '<a href="http://www.assembla.com/code/impresscmsaddons/subversion/nodes/modules/impression/docs/impression_manual_es.pdf" target="_blank">Spanish [PDF]</a>';

//** If Release Candidate **
$modversion['warning'] = _MODABOUT_IMPRESSION_WARNING_RC;

//** If Final  **
// $modversion['warning'] = _MODABOUT_IMPRESSION_WARNING_FINAL;

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/impression.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'impression_cat';
$modversion['tables'][1] = 'impression_articles';
$modversion['tables'][2] = 'impression_configs';
$modversion['tables'][3] = 'impression_indexpage';
$modversion['tables'][4] = 'impression_altcat';
$modversion['tables'][5] = 'impression_mod';

// Launch additional install script to check
$modversion['onInstall'] = 'include/install.php';
$modversion['onUpdate'] = 'include/update.php';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Blocks
$i=0;

// Spotlight block
$i++;
$modversion['blocks'][$i]['file']			= 'impression_spot.php';
$modversion['blocks'][$i]['name']			= _MI_IMPRESSION_BSPOT;
$modversion['blocks'][$i]['description']	= 'Shows recently added news in spotlight';
$modversion['blocks'][$i]['show_func']		= 'b_impression_spot_show';
$modversion['blocks'][$i]['edit_func']		= 'b_impression_spot_edit';
$modversion['blocks'][$i]['options']		= 'spot|10|d F Y|0|0';
$modversion['blocks'][$i]['template']		= 'impression_block_spot.html';
$modversion['blocks'][$i]['can_clone']		= true ;

// Recent Headlines block
$i++;
$modversion['blocks'][$i]['file']			= 'impression_new.php';
$modversion['blocks'][$i]['name']			= _MI_IMPRESSION_BNEW;
$modversion['blocks'][$i]['description']	= 'Shows headlines of recently added articles';
$modversion['blocks'][$i]['show_func']		= 'b_impression_new_show';
$modversion['blocks'][$i]['edit_func']		= 'b_impression_new_edit';
$modversion['blocks'][$i]['options']		= 'new|25|d F Y';
$modversion['blocks'][$i]['template']		= 'impression_block_new.html';
$modversion['blocks'][$i]['can_clone']		= true ;

// Recent News by Category block
$i++;
$modversion['blocks'][$i]['file']			= 'impression_news.php';
$modversion['blocks'][$i]['name']			= _MI_IMPRESSION_BNEWS;
$modversion['blocks'][$i]['description']	= 'Shows articles from selected categories';
$modversion['blocks'][$i]['show_func']		= 'b_impression_news_show';
$modversion['blocks'][$i]['edit_func']		= 'b_impression_news_edit';
$modversion['blocks'][$i]['options']		= 'news|10|d F Y|0|0';
$modversion['blocks'][$i]['template']		= 'impression_block_news.html';
$modversion['blocks'][$i]['can_clone']		= true;

// Ticker block
$i++;
$modversion['blocks'][$i]['file']			= 'impression_ticker.php';
$modversion['blocks'][$i]['name']			= 'Ticker';
$modversion['blocks'][$i]['description']	= 'Shows articles from selected categories';
$modversion['blocks'][$i]['show_func']		= 'b_impression_ticker';
$modversion['blocks'][$i]['edit_func']		= 'b_impression_ticker_edit';
$modversion['blocks'][$i]['options']		= 'ticker|10|d F Y|';
$modversion['blocks'][$i]['template']		= 'impression_block_ticker.html';
$modversion['blocks'][$i]['can_clone']		= true;

// Tag Cloud block
//$i++;
//$modversion['blocks'][$i]['file']			= 'impression_block_tag.php';
//$modversion['blocks'][$i]['name']			= _MI_IMPRESSION_BTAGCLOUD;
//$modversion['blocks'][$i]['description']	= 'Show tag cloud';
//$modversion['blocks'][$i]['show_func']		= 'impression_tag_block_cloud_show';
//$modversion['blocks'][$i]['edit_func']		= 'impression_tag_block_cloud_edit';
//$modversion['blocks'][$i]['options']		= '100|0|150|80';
//$modversion['blocks'][$i]['template']		= 'impression_tag_block_cloud.html';
//$modversion['blocks'][$i]['can_clone']		= true ;

// Top Tags block
//$i++;
//$modversion['blocks'][$i]['file']			= 'impression_block_tag.php';
//$modversion['blocks'][$i]['name']			= _MI_IMPRESSION_BTOPTAG;
//$modversion['blocks'][$i]['description']	= 'Show top tag';
//$modversion['blocks'][$i]['show_func']		= 'impression_tag_block_top_show';
//$modversion['blocks'][$i]['edit_func']		= 'impression_tag_block_top_edit';
//$modversion['blocks'][$i]['options']		= '50|30|c';
//$modversion['blocks'][$i]['template']		= 'impression_tag_block_tag.html';
//$modversion['blocks'][$i]['can_clone']		= true ;

// Menu
$modversion['hasMain'] = 1;

// This part inserts the selected topics as sub items in the ICMS main menu
$module_handler = &icms::handler( 'icms_module' );
$module = &$module_handler -> getByDirname( $modversion['dirname'] );
$cansubmit = 0;
if ( is_object( $module ) ) {
	$groups = ( is_object( icms::$user ) ) ? icms::$user -> getGroups() : XOOPS_GROUP_ANONYMOUS;
	$gperm_handler = icms::handler( 'icms_member_groupperm' );
	if ( $gperm_handler -> checkRight( 'ImpressionSubPerm', 0, $groups, $module -> getVar( 'mid' ) ) ) {
		$cansubmit = 1;
	}
}
if ( $cansubmit == 1 ) {
	$modversion['sub'][0]['name'] = _MI_IMPRESSION_SMNAME1;
	$modversion['sub'][0]['url'] = 'submit.php';
}
unset( $cansubmit );

$modversion['sub'][1]['name']	= _MI_IMPRESSION_SMNAME2;
$modversion['sub'][1]['url']	= 'topten.php?list=hit';

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'impression_search';

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'aid';
$modversion['comments']['pageName'] = 'singlearticle.php';
$modversion['comments']['extraParams'] = array( 'cid' );

// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'impression_com_approve';
$modversion['comments']['callback']['update'] = 'impression_com_update';

// Templates
$modversion['templates'][] = array(
	'file'			=> 'impression_articleload.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_index.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_singlearticle.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_catview.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_print.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_topten.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_moduleabout.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_rss.html',
	'description'	=> '' );

$modversion['templates'][] = array(
	'file'			=> 'impression_disclaimer.html',
	'description'	=> '' );

// Module config setting
$modversion['config'][] = array(
	'name'			=> 'popular',
	'title'			=> '_MI_IMPRESSION_POPULAR',
	'description'	=> '_MI_IMPRESSION_POPULARDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'int',
	'default'		=> 100,
	'options'		=> array( '5' => 5, '10' => 10, '50' => 50, '100' => 100, '200' => 200, '500' => 500, '1000' => 1000 ) );

$modversion['config'][] = array(
	'name'			=> 'displayicons',
	'title'			=> '_MI_IMPRESSION_ICONDISPLAY',
	'description'	=> '_MI_IMPRESSION_DISPLAYICONDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'int',
	'default'		=> 1,
	'options'		=> array( '_MI_IMPRESSION_DISPLAYICON1' => 1, '_MI_IMPRESSION_DISPLAYICON2' => 2, '_MI_IMPRESSION_DISPLAYICON3' => 3 ) );

$modversion['config'][] = array(
	'name'			=> 'daysnew',
	'title'			=> '_MI_IMPRESSION_DAYSNEW',
	'description'	=> '_MI_IMPRESSION_DAYSNEWDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> 10 );

$modversion['config'][] = array(
	'name'			=> 'perpage',
	'title'			=> '_MI_IMPRESSION_PERPAGE',
	'description'	=> '_MI_IMPRESSION_PERPAGEDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'int',
	'default'		=> 10,
	'options'		=> array( '5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50 ) );

$modversion['config'][] = array(
	'name'			=> 'admin_perpage',
	'title'			=> '_MI_IMPRESSION_ADMINPAGE',
	'description'	=> '_MI_IMPRESSION_AMDMINPAGEDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'int',
	'default'		=> 50,
	'options'		=> array( '5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50, '75' => 75, '100' => 100, '200' => 200 ) );

$modversion['config'][] = array(
	'name'			=> 'txt_width',
	'title'			=> '_MI_IMPRESSION_TEXTWIDTH',
	'description'	=> '_MI_IMPRESSION_TEXTWIDTHDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'int',
	'default'		=> 128,
	'options'		=> array( '25' => 25, '50' => 50, '75' => 75, '100' => 100, '128' => 128 ) );

$qa = ' (A)';
$qd = ' (D)';
$modversion['config'][] = array(
	'name'			=> 'articlexorder',
	'title'			=> '_MI_IMPRESSION_ARTICLESSORT',
	'description'	=> '_MI_IMPRESSION_ARTICLESSORTDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 'published DESC',
	'options'		=> array(	_MI_IMPRESSION_TITLE . $qa => 'title ASC',
								_MI_IMPRESSION_TITLE . $qd => 'title DESC',
								_MI_IMPRESSION_SUBMITTED2 . $qa => 'published ASC' ,
								_MI_IMPRESSION_SUBMITTED2 . $qd => 'published DESC',
								_MI_IMPRESSION_POPULARITY . $qa => 'hits ASC',
								_MI_IMPRESSION_POPULARITY . $qd => 'hits DESC' ) );

$modversion['config'][] = array(
	'name'			=> 'sortcats',
	'title'			=> '_MI_IMPRESSION_SORTCATS',
	'description'	=> '_MI_IMPRESSION_SORTCATSDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 'title',
	'options'		=> array(	_MI_IMPRESSION_TITLE => 'title',
								_MI_IMPRESSION_WEIGHT => 'weight' ) );

$modversion['config'][] = array(
	'name'			=> 'subcats',
	'title'			=> '_MI_IMPRESSION_SUBCATS',
	'description'	=> '_MI_IMPRESSION_SUBCATSDSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 0 );

$modversion['config'][] = array(
	'name'			=> 'form_options',
	'title'			=> '_MI_IMPRESSION_EDITOR',
	'description'	=> '_MI_IMPRESSION_EDITORCHOICE',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 'tinymce',
	'options'		=> array(	_MI_IMPRESSION_FORM_FCK			=> 'fck',
								_MI_IMPRESSION_FORM_TINYEDITOR	=> 'tinyeditor',
								_MI_IMPRESSION_FORM_TINYMCE		=> 'tinymce' ) );

$modversion['config'][] = array(
	'name'			=> 'form_optionsuser',
	'title'			=> '_MI_IMPRESSION_EDITORUSER',
	'description'	=> '_MI_IMPRESSION_EDITORCHOICEUSER',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 'tinymce',
	'options'		=> array(	_MI_IMPRESSION_FORM_FCK			=> 'fck',
								_MI_IMPRESSION_FORM_TINYEDITOR	=> 'tinyeditor',
								_MI_IMPRESSION_FORM_TINYMCE		=> 'tinymce' ) );

$modversion['config'][] = array(
	'name'			=> 'captcha',
	'title'			=> '_MI_IMPRESSION_CAPTCHA',
	'description'	=> '_MI_IMPRESSION_CAPTCHADSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 1 );

$modversion['config'][] = array(
	'name'			=> 'mainimagedir',
	'title'			=> '_MI_IMPRESSION_MAINIMGDIR',
	'description'	=> '_MI_IMPRESSION_MAINIMGDIRDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'text',
	'default'		=> 'uploads/impression/images' );

$modversion['config'][] = array(
	'name'			=> 'catimage',
	'title'			=> '_MI_IMPRESSION_CATEGORYIMG',
	'description'	=> '_MI_IMPRESSION_CATEGORYIMGDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'text',
	'default'		=> 'uploads/impression/category' );

$modversion['config'][] = array(
	'name'			=> 'maxfilesize',
	'title'			=> '_MI_IMPRESSION_MAXFILESIZE',
	'description'	=> '_MI_IMPRESSION_MAXFILESIZEDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> 200000 );

$modversion['config'][] = array(
	'name'			=> 'maximgwidth',
	'title'			=> '_MI_IMPRESSION_IMGWIDTH',
	'description'	=> '_MI_IMPRESSION_IMGWIDTHDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> 36 );

$modversion['config'][] = array(
	'name'			=> 'maximgheight',
	'title'			=> '_MI_IMPRESSION_IMGHEIGHT',
	'description'	=> '_MI_IMPRESSION_IMGHEIGHTDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> 32 );

$modversion['config'][] = array(
	'name'			=> 'dateformat',
	'title'			=> '_MI_IMPRESSION_DATEFORMAT',
	'description'	=> '_MI_IMPRESSION_DATEFORMATDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'text',
	'default'		=> 'd F Y' );

$modversion['config'][] = array(
	'name'			=> 'dateformatadmin',
	'title'			=> '_MI_IMPRESSION_DATEFORMATADMIN',
	'description'	=> '_MI_IMPRESSION_DATEFORMATADMINDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'text',
	'default'		=> 'l, d F Y - G:i' );

$modversion['config'][] = array(
	'name'			=> 'showartcount',
	'title'			=> '_MI_IMPRESSION_SHOWARTCOUNT',
	'description'	=> '_MI_IMPRESSION_SHOWARTCOUNTDSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 1 );

$modversion['config'][] = array(
	'name'			=> 'showsubmitter',
	'title'			=> '_MI_IMPRESSION_SHOWSUBMITTER',
	'description'	=> '_MI_IMPRESSION_SHOWSUBMITTERDSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 1 );
	
$modversion['config'][] = array(
	'name'			=> 'form_bytesyn',
	'title'			=> '_MI_IMPRESSION_BYTESYN',
	'description'	=> '_MI_IMPRESSION_BYTESDESC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 0,
	'options'		=> array(	_NONE					=> 0,
								_MI_IMPRESSION_BYTES	=> 1,
								_MI_IMPRESSION_WORDS	=> 2,
								_MI_IMPRESSION_CHARSF	=> 3 ) );

$modversion['config'][] = array(
	'name'			=> 'usemetadescr',
	'title'			=> '_MI_IMPRESSION_USEMETADESCR',
	'description'	=> '_MI_IMPRESSION_USEMETADSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 1 );

//$modversion['config'][] = array(
//	'name'			=> 'usercantag',
//	'title'			=> '_MI_IMPRESSION_USERTAGDESCR',
//	'description'	=> '_MI_IMPRESSION_USERTAGDSC',
//	'formtype'		=> 'yesno',
//	'valuetype'		=> 'int',
//	'default'		=> 0 );

$modversion['config'][] = array(
	'name'			=> 'linkedterms',
	'title'			=> '_MI_IMPRESSION_LINKEDTERMS',
	'description'	=> '_MI_IMPRESSION_LINKEDTERMSDSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 0 );

$modversion['config'][] = array(
	'name'			=> 'imglossarydir',
	'title'			=> '_MI_IMPRESSION_IMGLOSSARYDIR',
	'description'	=> '_MI_IMPRESSION_IMGLOSSARYDIRDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'text',
	'default'		=> 'imglossary' );

$modversion['config'][] = array(
	'name'			=> 'niceurl',
	'title'			=> '_MI_IMPRESSION_NICEURL',
	'description'	=> '_MI_IMPRESSION_NICEURLDSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 1 );

$modversion['config'][] = array(
	'name'			=> 'showsbookmarks',
	'title'			=> '_MI_IMPRESSION_SOCIALBTTNS',
	'description'	=> '_MI_IMPRESSION_SOCIALBTTNSDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 0,
	'options'		=> array( _NONE => 0, _IM_IMPRESSION_SOCBOOK => 1, _IM_IMPRESSION_SOCMEDIA => 2, _IM_IMPRESSION_SOCMEDIAPRIVE => 3 ) );

$modversion['config'][] = array(
	'name'			=> 'twitt_bttn',
	'title'			=> '_MI_IMPRESSION_TWITTERBTTN',
	'description'	=> '_MI_IMPRESSION_TWITTERBTTNDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 0,
	'options'		=> array( _NONE => 0, _MI_IMPRESSION_DEFAULT => 1, _MI_IMPRESSION_HORICNT => 2, _MI_IMPRESSION_VERTCNT => 3 ) );

$modversion['config'][] = array(
	'name'			=> 'faceb_bttn',
	'title'			=> '_MI_IMPRESSION_FACEBOOKBTTN',
	'description'	=> '_MI_IMPRESSION_FACEBOOKBTTNDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 0,
	'options'		=> array( _NONE => 0, _MI_IMPRESSION_DEFAULT => 1, _MI_IMPRESSION_HORICNT => 2, _MI_IMPRESSION_VERTCNT => 3 ) );

$modversion['config'][] = array(
	'name'			=> 'plusone_bttn',
	'title'			=> '_MI_IMPRESSION_PLUSONEBTTN',
	'description'	=> '_MI_IMPRESSION_PLUSONEBTTNDSC',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> 0,
	'options'		=> array( _NONE => 0, _MI_IMPRESSION_DEFAULT => 1, _MI_IMPRESSION_HORICNT => 2, _MI_IMPRESSION_VERTCNT => 3 ) );

$modversion['config'][] = array(
	'name'			=> 'headerprint',
	'title'			=> '_MI_IMPRESSION_HEADERPRINT',
	'description'	=> '_MI_IMPRESSION_HEADERPRINTDSC',
	'formtype'		=> 'textsarea',
	'valuetype'		=> 'text',
	'default'		=> '' );

$modversion['config'][] = array(
	'name'			=> 'printlogourl',
	'title'			=> '_MI_IMPRESSION_PRINTLOGOURL',
	'description'	=> '_MI_IMPRESSION_PRINTLOGOURLDSC',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'text',
	'default'		=> ICMS_URL . '/images/logo.gif' );

$modversion['config'][] = array(
	'name'			=> 'itemfooter',
	'title'			=> '_MI_IMPRESSION_ITEMFOOTER',
	'description'	=> '_MI_IMPRESSION_ITEMFOOTERDSC',
	'formtype'		=> 'textsarea',
	'valuetype'		=> 'text',
	'default'		=> '' . ICMS_URL . '' );

$modversion['config'][] = array(
	'name'			=> 'showdisclaimer',
	'title'			=> '_MI_IMPRESSION_SHOWDISCLAIMER',
	'description'	=> '_MI_IMPRESSION_SHOWDISCLAIMERDSC',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> 0 );

$modversion['config'][] = array(
	'name'			=> 'disclaimer',
	'title'			=> '_MI_IMPRESSION_DISCLAIMER',
	'description'	=> '_MI_IMPRESSION_DISCLAIMERDSC',
	'formtype'		=> 'textsarea',
	'valuetype'		=> 'text',
	'default'		=> 'We have the right, but not the obligation to monitor and review submissions submitted by users, to this website. We shall not be responsible for any of the content of these messages. We further reserve the right, to delete, move or edit submissions that we, in its exclusive discretion, deems abusive, defamatory, obscene or in violation of any Copyright or Trademark laws or otherwise objectionable.' );

// Notification
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'impression_notify_iteminfo';

$modversion['notification']['category'][] = array(
	'name'				=> 'global',
	'title'				=> _MI_IMPRESSION_GLOBAL_NOTIFY,
	'description'		=> _MI_IMPRESSION_GLOBAL_NOTIFYDSC,
	'subscribe_from'	=> array( 'index.php', 'catview.php', 'singlearticle.php' ) );

$modversion['notification']['category'][] = array(
	'name'				=> 'category',
	'title'				=> _MI_IMPRESSION_CATEGORY_NOTIFY,
	'description'		=> _MI_IMPRESSION_CATEGORY_NOTIFYDSC,
	'subscribe_from'	=> array( 'catview.php', 'singlearticle.php' ),
	'item_name'			=> 'cid',
	'allow_bookmark'	=> 1 );

$modversion['notification']['category'][] = array(
	'name'				=> 'article',
	'title'				=> _MI_IMPRESSION_ARTICLE_NOTIFY,
	'description'		=> _MI_IMPRESSION_FILE_NOTIFYDSC,
	'subscribe_from'	=> 'singlearticle.php',
	'item_name'			=> 'aid',
	'allow_bookmark'	=> 1 );

$modversion['notification']['event'][] = array(
	'name'				=> 'new_category',
	'category'			=> 'global',
	'title'				=> _MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY,
	'caption'			=> _MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP,
	'description'		=> _MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC,
	'mail_template'		=> 'global_newcategory_notify',
	'mail_subject'		=> _MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ );

$modversion['notification']['event'][] = array(
	'name'				=> 'article_submit',
	'category'			=> 'global',
	'admin_only'		=> 1,
	'title'				=> _MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY,
	'caption'			=> _MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP,
	'description'		=> _MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC,
	'mail_template'		=> 'global_articlesubmit_notify',
	'mail_subject'		=> _MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ );

$modversion['notification']['event'][] = array(
	'name'				=> 'new_article',
	'category'			=> 'global',
	'title'				=> _MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY,
	'caption'			=> _MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP,
	'description'		=> _MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC,
	'mail_template'		=> 'global_newfile_notify',
	'mail_subject'		=> _MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ );

$modversion['notification']['event'][] = array(
	'name'				=> 'article_submit',
	'category'			=> 'category',
	'admin_only'		=> 1,
	'title'				=> _MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY,
	'caption'			=> _MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP,
	'description'		=> _MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC,
	'mail_template'		=> 'category_articlesubmit_notify',
	'mail_subject'		=> _MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ );

$modversion['notification']['event'][] = array(
	'name'				=> 'new_article',
	'category'			=> 'category',
	'title'				=> _MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY,
	'caption'			=> _MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP,
	'description'		=> _MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC,
	'mail_template'		=> 'category_newfile_notify',
	'mail_subject'		=> _MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ );

$modversion['notification']['event'][] = array(
	'name'				=> 'approve',
	'category'			=> 'article',
	'invisible'			=> 1,
	'title'				=> _MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY,
	'caption'			=> _MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP,
	'description'		=> _MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC,
	'mail_template'		=> 'article_approve_notify',
	'mail_subject'		=> _MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ );