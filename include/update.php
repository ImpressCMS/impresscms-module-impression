<?php
/**
* impression - a multicategory links management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/update.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
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

function checkDBfield( $table, $field ) {
	$sql = 'SELECT ' . $field . ' FROM ' . icms::$xoopsDB -> prefix( $table );
	if ( !$result = icms::$xoopsDB -> query( $sql ) ) {
		$result = 0;
	} else {
		$result = 1;
	}	
	return $result;
}

// referer check
$ref = xoops_getenv( 'HTTP_REFERER' );

if( $ref == '' || strpos( $ref , ICMS_URL . '/modules/system/admin.php' ) === 0 ) {
	$i=0;
	
	$check = checkDBfield( 'impression_cat', 'inblocks' );
	if ( $check == 0 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " ADD COLUMN inblocks TINYINT(1) NOT NULL default '1'" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_cat', 'nohtml' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP nohtml" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_cat', 'nosmiley' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP nosmiley" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}	
		
	$check = checkDBfield( 'impression_cat', 'noxcodes' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP noxcodes" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_cat', 'noimages' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP noimages" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_cat', 'nobreak' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP nobreak" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
//	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " MODIFY title VARCHAR(255) NOT NULL default ''" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
//	}
	
	$check = checkDBfield( 'impression_indexpage', 'nohtml' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP nohtml" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_indexpage', 'nosmiley' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP nosmiley" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}	
	
	$check = checkDBfield( 'impression_indexpage', 'noxcodes' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP noxcodes" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_indexpage', 'noimages' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP noimages" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_indexpage', 'nobreak' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_indexpage') . " DROP nobreak" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_indexpage', 'nobreak' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP nobreak" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_indexpage', 'nobreak' );
	if ( $check == 1 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_mod') . " DROP nobreak" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_articles', 'source' );
	if ( $check == 0 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN source VARCHAR(255) NOT NULL default ''" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_articles', 'sourceurl' );
	if ( $check == 0 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN sourceurl VARCHAR(255) NOT NULL default ''" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_mod', 'source' );
	if ( $check == 0 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_mod') . " ADD COLUMN source VARCHAR(255) NOT NULL default ''" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
	
	$check = checkDBfield( 'impression_mod', 'sourceurl' );
	if ( $check == 0 ) {
		$i++;
		$ret[$i] = true;
		$query[$i] = sprintf( "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_mod') . " ADD COLUMN sourceurl VARCHAR(255) NOT NULL default ''" );
		$ret[$i] = $ret[$i] && icms::$xoopsDB -> query( $query[$i] );
	}
}
?>