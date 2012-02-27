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

// Referer check
$ref = xoops_getenv( 'HTTP_REFERER' );

if( $ref == '' || strpos( $ref , ICMS_URL . '/modules/system/admin.php' ) === 0 ) {

		$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " ADD COLUMN inblocks TINYINT(1) NOT NULL default '1'";
		if ( !mysql_query( $sql ) ) {}

		$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP nohtml";
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP nosmiley" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP noxcodes" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP noimages" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP nobreak" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " MODIFY title VARCHAR(255) NOT NULL default ''" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP nohtml" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP nosmiley" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP noxcodes" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP noimages" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP nobreak" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP nobreak" );
		if ( !mysql_query( $sql ) ) {}

		$sql = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_mod') . " DROP nobreak" );
		if ( !mysql_query( $sql ) ) {}

		// Version 1.11
		$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN source VARCHAR(255) NOT NULL default ''";
		if ( !mysql_query( $sql ) ) {}

		$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN sourceurl VARCHAR(255) NOT NULL default ''";
		if ( !mysql_query( $sql ) ) {}
}
?>