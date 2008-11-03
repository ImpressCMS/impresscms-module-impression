<?php
/**
* imLinks - a multicategory links management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/config.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
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
* 				imLinks
* @since			1.00
* @author		McDonald
* @version		$Id$
*/
 
// WARNING: ONCE SET DO NOT CHANGE! Improper use will render this module useless and unworkable.
// Only Change if you know what you are doing.

$mydirname = basename( dirname(  dirname( __FILE__ ) ) );

if ( !defined( 'impression_cat' ) ) define( 'impression_cat', 'impression_cat' );
if ( !defined( 'impression_articles' ) ) define( 'impression_articles', 'impression_articles' );
if ( !defined( 'impression_mod' ) ) define( 'impression_mod', 'impression_mod' );
if ( !defined( 'impression_indexpage' ) ) define( 'impression_indexpage', 'impression_indexpage' );
if ( !defined( 'impression_altcat' ) ) define( 'impression_altcat', 'impression_altcat' );
if ( !defined( 'impression_url' ) ) define( 'impression_url', ICMS_URL . '/modules/' . $mydirname . '/' );

?>