<?php
/**
* imLinks - a multicategory links management module for ImpressCMS
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
 
if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }

global $xoopsDB;

$i=0;
// Make changes to table impression_indexpage
$i++;
$ret[$i] = true;
$query[$i] = sprintf( "ALTER TABLE " . $xoopsDB -> prefix( 'impression_indexpage') . " ADD COLUMN lastarticlesyn TINYINT(1) NOT NULL default '0' AFTER indexfooteralign" );
$ret[$i] = $ret[$i] && $xoopsDB -> query( $query[$i] );
$i++;
$ret[$i] = true;
$query[$i] = sprintf( "ALTER TABLE " . $xoopsDB -> prefix( 'impression_indexpage') . " ADD COLUMN lastarticlestotal VARCHAR(5) NOT NULL default '5' AFTER lastarticlesyn" );
$ret[$i] = $ret[$i] && $xoopsDB -> query( $query[$i] );

?>