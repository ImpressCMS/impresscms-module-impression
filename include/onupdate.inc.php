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
	// Start removing obsolete files
	$file = array(	'list.tag.php',
					'view.tag.php',
					'xoops_version.php',
					'admin/brokenarticle.php',
					'blocks/impression_block_tag.php',
					'blocks/impression_blockfunctions.php',
					'class/class_thumbnail.php',
					'class/class_lists.php',
					'class/impression_datetime.php',
					'class/myts_extended.php',
					'images/screenshots',
					'images/icon/backgnd.png',
					'images/sbookmarks/simpy.png',
					'images/sbookmarks/spurl.png',
					'include/config.php',
					'include/install.php',
					'include/plugin.tag.php',
					'templates/blocks/impression_tag_block_cloud.html',
					'templates/blocks/impression_tag_block_tag.html' );
	foreach ( $file as $item ) {
		if ( file_exists(ICMS_ROOT_PATH . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/' . $item ) ) {
			chmod( ICMS_ROOT_PATH . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/' . $item, 0777 );
			unlink( ICMS_ROOT_PATH . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/' . $item );
		}
	}
	// End of removing obsolete files
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

	$queries = array();
	
	$queries[] = "CREATE TABLE ". icms::$xoopsDB -> prefix('impression_altcat') . " (
		`aid` int(11) unsigned NOT NULL default '0',
		`cid` int(5) unsigned NOT NULL default '0',
		KEY `aid` (`aid`),
		KEY `cid` (`cid`)
	)";
	
	$queries[] = "CREATE TABLE ". icms::$xoopsDB -> prefix( 'impression_indexpage' ) . " (
		`indeximage` varchar(255) NOT NULL default 'blank.gif',
		`indexheading` varchar(255) NOT NULL default 'Impression',
		`indexheader` text NOT NULL,
		`indexfooter` text NOT NULL,
		`indexheaderalign` varchar(25) NOT NULL default 'left',
		`indexfooteralign` varchar(25) NOT NULL default 'center',
		`lastarticlestotal` varchar(5) NOT NULL default '5'
	)";
	
	$queries[] = "INSERT INTO " . icms::$xoopsDB -> prefix('impression_indexpage') . " (`indeximage`,`indexheading`,`indexheader`,`indexfooter`,`indexheaderalign`,`indexfooteralign`,`lastarticlestotal`) VALUES ('impression_bar.png','Impression header','Enjoy reading the articles in <em>Impression</em>','Impression footer','left','left','50')";
	
	$queries[] = "CREATE TABLE ". icms::$xoopsDB -> prefix('impression_configs') . " (
		`rssactive` int(1) NOT NULL default '1',
		`rsstitle` varchar(128) NOT NULL,
		`rsslink` varchar(128) NOT NULL,
		`rssdsc` varchar(128) NOT NULL,
		`rssimgurl` varchar(255) NOT NULL,
		`rsswidth` tinyint(8) NOT NULL default '0',
		`rssheight` tinyint(8) NOT NULL default '0',
		`rssimgtitle` varchar(128) NOT NULL,
		`rssimglink` varchar(255) NOT NULL,
		`rssttl` tinyint(8) NOT NULL default '0',
		`rsswebmaster` varchar(255) NOT NULL,
		`rsseditor` varchar(255) NOT NULL,
		`rsscategory` varchar(128) NOT NULL,
		`rssgenerator` varchar(128) NOT NULL,
		`rsscopyright` varchar(128) NOT NULL,
		`rsstotal` tinyint(8) NOT NULL default '0',
		`rssofftitle` varchar(128) NOT NULL default '',
		`rssoffdsc` varchar(255) NOT NULL default ''
	)";

	$queries[] = "INSERT INTO " . icms::$xoopsDB -> prefix('impression_configs') . " (`rssactive`,`rsstitle`,`rsslink`,`rssdsc`,`rssimgurl`,`rsswidth`,`rssheight`,`rssimgtitle`,`rssimglink`,`rssttl`,`rsswebmaster`,`rsseditor`,`rsscategory`,`rssgenerator`,`rsscopyright`,`rsstotal`,`rssofftitle`,`rssoffdsc`) VALUES ('1', '', '', '', '', '', '', '', '', '60', '', '', '', '', '', '15', '', '')";
	
	foreach( $queries as $query ) {
		icms::$xoopsDB -> query( $query );;
	}

	return TRUE;
}

function icms_module_uninstall_impression( $module ) {
	$queries = array();
	$queries[] = "DROP TABLE ". icms::$xoopsDB -> prefix('impression_altcat');
	$queries[] = "DROP TABLE ". icms::$xoopsDB -> prefix('impression_indexpage');
	$queries[] = "DROP TABLE ". icms::$xoopsDB -> prefix('impression_configs');
	foreach( $queries as $query ) {
			icms::$xoopsDB -> query( $query );;
	}
	return TRUE;
}