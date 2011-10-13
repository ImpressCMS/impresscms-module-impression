<?php
/**
* impression - a multicategory links management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/update.php
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
* 				impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/
 
if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }

define( 'IMPRESSION_DB_VERSION', 1 );

function icms_module_update_impression( $module ) {
	return true;
}

function icms_module_install_impression( $module ) {	
	$sql = "INSERT INTO " . icms::$xoopsDB -> prefix( 'impression_indexpage' ) . " (indeximage,indexheading,indexheader,indexfooter,indexheaderalign,indexfooteralign,lastarticlesyn,lastarticlestotal) VALUES ('impression_bar.png','Impression header','Enjoy reading the articles in <em>Impression</em>','Impression footer','left','left','0','50')";
	if ( !$result = icms::$xoopsDB -> queryF( $sql ) ) {
		icms::$logger -> handleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
		return false;
	}
	return TRUE;
}