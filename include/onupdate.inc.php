<?php
/**
* imGlossary - a multicategory glossary for ImpressCMS
*
* Based upon Wordbook 1.16
*
* File: include/onupdate.inc.php
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
 
if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }


define( 'IMPRESSION_DB_VERSION', 1 );

function icms_module_update_impression( &$module, $oldversion = null, $dbversion = null ) {
	return TRUE;
}

function icms_module_install_impression( $module ) {
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
			$contentx =@file_get_contents( ICMS_ROOT_PATH . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/category/' . $value . '.png' );
			$openedfile = fopen( $category . '/' . $value . '.png', "w" );
			fwrite( $openedfile, $contentx );
			fclose( $openedfile );
		}
	}
	if ( !is_dir( $images . '/thumbs' ) ) {
		mkdir( $images . '/thumbs', 0777, true );
		copy( ICMS_ROOT_PATH . '/uploads/index.html', $images . '/index.html' );
		copy( ICMS_ROOT_PATH . '/uploads/index.html', $images . '/thumbs/index.html' );
		$contentx =@file_get_contents( ICMS_ROOT_PATH . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/impression_bar.png' );
		$openedfile = fopen( $images . '/impression_bar.png', "w" );
		fwrite( $openedfile, $contentx );
		fclose( $openedfile );
	}

	$db =& Database::getInstance();
	$queries = array();
	$queries[] = "INSERT INTO " . $db->prefix('impression_indexpage') . " (`id`,`indeximage`,`indexheading`,`indexheader`,`indexfooter`,`indexheaderalign`,`indexfooteralign`,`lastarticlestotal`) VALUES ('','impression_bar.png','Impression header','Enjoy reading the articles in <em>Impression</em>','Impression footer','left','left','50')";
	$queries[] = "INSERT INTO " . $db->prefix('impression_configs') . " (`id`,`rssactive`,`rsstitle`,`rsslink`,`rssdsc`,`rssimgurl`,`rsswidth`,`rssheight`,`rssimgtitle`,`rssimglink`,`rssttl`,`rsswebmaster`,`rsseditor`,`rsscategory`,`rssgenerator`,`rsscopyright`,`rsstotal`,`rssofftitle`,`rssoffdsc`) VALUES ('','1', '', '', '', '', '', '', '', '', '60', '', '', '', '', '', '15', '', '')";
	foreach($queries as $query) {
		$db -> query( $query );;
	}
	return TRUE;
}