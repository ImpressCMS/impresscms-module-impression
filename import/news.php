<?php
// IMPORT NEWS
//
// This script will import the following News tables:
//		- topics
//		- stories


include '../../../mainfile.php';

if ( !is_object( $icmsUser ) || !icms::$user -> isAdmin() ) {
	exit( 'Access Denied' );
}


// Drop Impression tables
	$sql = "DROP TABLE " . icms::$xoopsDB -> prefix( 'impression_articles');
	if ( !mysql_query( $sql ) ) {}

	$sql = "DROP TABLE " . icms::$xoopsDB -> prefix( 'impression_cat');
	if ( !mysql_query( $sql ) ) {}


// Rename News tables
	$sql = "RENAME TABLE " . icms::$xoopsDB -> prefix( 'topics' ) . " TO " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " ";
	if ( !mysql_query( $sql ) ) {}

	$sql = "RENAME TABLE " . icms::$xoopsDB -> prefix( 'stories' ) . " TO " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " ";
	if ( !mysql_query( $sql ) ) {}


// Rebuilt categories table
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `topic_id` `cid` INT(11) NOT NULL AUTO_INCREMENT";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `topic_pid` `pid` INT(11) NOT NULL default '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `topic_imgurl` `imgurl` VARCHAR(255) NOT NULL DEFAULT ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `topic_title` `title` VARCHAR(255) NOT NULL default ''";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat' ) . " CHANGE `topic_description` `description` TEXT NOT NULL";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " ADD COLUMN `total` INT(11) NOT NULL default '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " ADD COLUMN `weight` INT(11) NOT NULL default '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " ADD COLUMN `inblocks` INT(11) NOT NULL DEFAULT '1'";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `menu`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `topic_frontpage`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `topic_rssurl`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_cat') . " DROP `topic_color`";
	if ( !mysql_query( $sql ) ) {}


// Rebuilt articles table
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `description`";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `storyid` `aid` INT(11) NOT NULL AUTO_INCREMENT";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `topicid` `cid` INT(11) NOT NULL default '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `hometext` `introtext` LONGTEXT NOT NULL";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `bodytext` `description` LONGTEXT NOT NULL";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `uid` `uid` MEDIUMINT(8) NOT NULL DEFAULT '1'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `created` `date` INT(11) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `published` `published` INT(11) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `hostname` `ipaddress` VARCHAR(120) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `comments` `comments` INT(11) UNSIGNED NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `notifypub` `notifypub` INT(1) NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `counter` `hits` INT(11) UNSIGNED NOT NULL DEFAULT '0'";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles' ) . " CHANGE `keywords` `meta_keywords` VARCHAR(255) NOT NULL DEFAULT ''";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `expired`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `nohtml`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `nosmiley`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `rating`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `votes`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `topicdisplay`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `topicalign`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `ihome`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " DROP `story_type`";
	if ( !mysql_query( $sql ) ) {}

	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `uname` VARCHAR(255) NOT NULL DEFAULT '' AFTER `uid`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `publisher` VARCHAR(255) NOT NULL DEFAULT '' AFTER `uname`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `status` TINYINT(2) NOT NULL DEFAULT '0' AFTER `publisher`";
	if ( !mysql_query( $sql ) ) {}
	$sql = "ALTER TABLE " . icms::$xoopsDB -> prefix( 'impression_articles') . " ADD COLUMN `item_tag` text NOT NULL AFTER `meta_keywords`";
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
	echo 'Please copy your Topics images from the folder <i>/modules/news/images/topics/</i> to the folder <i>/uploads/impression/category/</i>.<br /><br />';
?>