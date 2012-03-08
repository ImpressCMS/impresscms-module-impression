<?php
// IMPORT SMARTSECTION
//
// This script will import the following SmartSection tables:
//		- smartsection_categories
//		- smartsection_items


include 'header.php';

if ( !is_object( $icmsUser ) || !is_object( icms::$module ) || !icms::$user -> isAdmin( icms::$module -> getVar( 'mid' ) ) ) {
	exit( 'Access Denied' );
}


// Drop Impression tables
	$sql = "DROP TABLE " . icms::$xoopsDB -> prefix( 'impression_articles');
	if ( !mysql_query( $sql ) ) {}

	$sql = "DROP TABLE " . icms::$xoopsDB -> prefix( 'impression_cat');
	if ( !mysql_query( $sql ) ) {}


// Rename SmartSection tables
	$sql = "RENAME TABLE " . icms::$xoopsDB -> prefix( 'smartsection_items' ) . " TO " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " ";
	if ( !mysql_query( $sql ) ) {}

	$sql = "RENAME TABLE " . icms::$xoopsDB -> prefix( 'smartsection_categories' ) . " TO " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " ";
	if ( !mysql_query( $sql ) ) {}


// Rebuilt categories table
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `categoryid` `cid` INT(11) NOT NULL AUTO_INCREMENT";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `parentid` `pid` INT(11) NOT NULL default '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `name` `title` VARCHAR(255) NOT NULL DEFAULT ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `image` `imgurl` VARCHAR(255) NOT NULL DEFAULT ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `weight` `weight` INT(11) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `created`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `template`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `header`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `meta_keywords`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `meta_description`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `short_url`";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " ADD COLUMN `inblocks` INT(11) NOT NULL DEFAULT '1'";
	if ( !mysql_query( $sql ) ) {}


// Rebuilt articles table
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `itemid` `aid` INT(11) NOT NULL AUTO_INCREMENT";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `categoryid` `cid` INT(11) NOT NULL default '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `summary` `introtext` LONGTEXT NOT NULL";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `body` `description` LONGTEXT NOT NULL";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `uid` `uid` MEDIUMINT(8) NOT NULL DEFAULT '1'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `datesub` `published` INT(11) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `status` `status` TINYINT(2) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `counter` `hits` INT(11) UNSIGNED NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `notifypub` `notifypub` INT(1) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `meta_keywords` `meta_keywords` VARCHAR(255) NOT NULL DEFAULT ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `item_tag` `item_tag` TEXT NOT NULL";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `display_summary`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `image`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `dohtml`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `dosmiley`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `doxcode`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `doimage`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `dobr`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `cancomment`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `meta_description`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `short_url`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `partial_view`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `weight`";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `uname` VARCHAR(255) NOT NULL DEFAULT '' AFTER `uid`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `publisher` VARCHAR(255) NOT NULL DEFAULT '' AFTER `uname`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `date` INT(11) NOT NULL DEFAULT '0' AFTER `status`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `ipaddress` VARCHAR(120) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `nice_url` VARCHAR(128) NOT NULL DEFAULT ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `inblocks` TINYINT(1) NOT NULL DEFAULT '1'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `source` VARCHAR(255) NOT NULL default ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `sourceurl` VARCHAR(255) NOT NULL default ''";
	if ( !mysql_query( $sql ) ) {}


// Empty altcat table
	$sql = "TRUNCATE TABLE " . icms::$xoopsDB -> prefix( 'impression_altcat');
	if ( !mysql_query( $sql ) ) {}

	
	sleep(2);
	echo 'Done!<br /><br />';
?>