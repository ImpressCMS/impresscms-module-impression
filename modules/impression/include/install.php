<?php
/**
* impression - a multicategory links management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /include/install.php
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
* @since		1.1.0
* @author		McDonald
* @version		$Id$
*/

$mydirname = basename( dirname( dirname( __FILE__ ) ) );

//Create folders and set permissions
$category = ICMS_ROOT_PATH . '/uploads/impression/category';
$images = ICMS_ROOT_PATH . '/uploads/impression/images';
if ( !is_dir( $category . '/thumbs' ) ) {
	mkdir( $category . '/thumbs', 0777, true );
	copy( ICMS_ROOT_PATH . '/uploads/index.html', ICMS_ROOT_PATH . '/uploads/impression/index.html' );
	copy( ICMS_ROOT_PATH . '/uploads/index.html', $category . '/index.html' );
	copy( ICMS_ROOT_PATH . '/uploads/index.html', $category . '/thumbs/index.html' );
	//Copy images to new folder
	$array = array( 'folder', 'generic', 'generic_black', 'generic_blue', 'generic_brown', 'generic_green', 'generic_orange', 'generic_red', 'generic_violet', 'generic_white', 'generic_yellow', 'my_documents' );
	foreach ( $array as $value ) {
		$contentx =@file_get_contents( ICMS_ROOT_PATH . '/modules/' . $mydirname . '/images/category/' . $value . '.png' );
		$openedfile = fopen( $category . '/' . $value . '.png', "w" ); 
		fwrite( $openedfile, $contentx ); 
		fclose( $openedfile );
	}
}
if ( !is_dir( $images . '/thumbs' ) ) {
	mkdir( $images . '/thumbs', 0777, true );
	copy( ICMS_ROOT_PATH . '/uploads/index.html', $images . '/index.html' );
	copy( ICMS_ROOT_PATH . '/uploads/index.html', $images . '/thumbs/index.html' );
	$contentx =@file_get_contents( ICMS_ROOT_PATH . '/modules/' . $mydirname . '/images/impression_bar.png' );
		$openedfile = fopen( $images . '/impression_bar.png', "w" ); 
		fwrite( $openedfile, $contentx ); 
		fclose( $openedfile );
}
?>