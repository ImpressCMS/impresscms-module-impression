<?php
/**
* imGlossary - a multicategory glossary for ImpressCMS
*
* Based upon Wordbook 1.16
*
* File: include/common.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Wordbook - a multicategory glossary
* @since		1.16
* @author		hsalazar
* ----------------------------------------------------------------------------------------------------------
* 				imGlossary - a multicategory glossary
* @since		1.03
* @author		modified by McDonald
* @version		$Id$
*/

defined( 'ICMS_ROOT_PATH' ) or die( 'ICMS root path not defined' );

if ( !defined( 'IMPRESSION_DIRNAME' ) ) define( 'IMPRESSION_DIRNAME', $modversion['dirname'] = basename( dirname( dirname( __FILE__ ) ) ) );
if ( !defined( 'IMPRESSION_URL' ) ) define( 'IMPRESSION_URL', ICMS_URL . '/modules/' . IMPRESSION_DIRNAME . '/' );
if ( !defined( 'IMPRESSION_ROOT_PATH' ) ) define( 'IMPRESSION_ROOT_PATH', ICMS_ROOT_PATH . '/modules/' . IMPRESSION_DIRNAME . '/' );
if ( !defined( 'IMPRESSION_IMAGES_URL' ) ) define( 'IMPRESSION_IMAGES_URL', IMPRESSION_URL . 'images/' );
if ( !defined( 'IMPRESSION_ADMIN_URL' ) ) define( 'IMPRESSION_ADMIN_URL', IMPRESSION_URL . 'admin/' );

// Include the common language file of the module
icms_loadLanguageFile( 'impression', 'common' );