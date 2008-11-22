# MySQL file for Impression
# Version: 1.0.0
# Author: McDonald

#
# Table structure for table 'impression_altcat'
#

CREATE TABLE `impression_altcat` (
  `aid` int(11) unsigned NOT NULL default '0',
  `cid` int(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`aid`,`cid`)
) TYPE=MyISAM;

#
# Table structure for table 'impression_cat'
#

CREATE TABLE `impression_cat` (
  cid int(11) unsigned NOT NULL auto_increment,
  pid int(11) unsigned NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  imgurl varchar(255) NOT NULL default '',
  description text NOT NULL default '',
  total int(11) NOT NULL default '0',
  nohtml int(1) NOT NULL default '0',
  nosmiley int(1) NOT NULL default '0',
  noxcodes int(1) NOT NULL default '0',
  noimages int(1) NOT NULL default '0',
  nobreak int(1) NOT NULL default '1',
  weight int(11) NOT NULL default '0',
  PRIMARY KEY  (cid),
  KEY pid (pid)
) TYPE=MyISAM COMMENT='Impression by McDonald' AUTO_INCREMENT=1;

#
# Table structure for table 'impression_indexpage'
#

CREATE TABLE `impression_indexpage` (
  `indeximage` varchar(255) NOT NULL default 'blank.gif',
  `indexheading` varchar(255) NOT NULL default 'Impression',
  `indexheader` text NOT NULL,
  `indexfooter` text NOT NULL,
  `nohtml` tinyint(8) NOT NULL default '1',
  `nosmiley` tinyint(8) NOT NULL default '1',
  `noxcodes` tinyint(8) NOT NULL default '1',
  `noimages` tinyint(8) NOT NULL default '1',
  `nobreak` tinyint(4) NOT NULL default '0',
  `indexheaderalign` varchar(25) NOT NULL default 'left',
  `indexfooteralign` varchar(25) NOT NULL default 'center',
  `lastarticlesyn` tinyint(1) NOT NULL default '0',
  `lastarticlestotal` varchar(5) NOT NULL default '5',
  FULLTEXT KEY `indexheading` (`indexheading`),
  FULLTEXT KEY `indexheader` (`indexheader`),
  FULLTEXT KEY `indexfooter` (`indexfooter`)
) TYPE=MyISAM COMMENT='Impression by McDonald';



INSERT INTO `impression_indexpage` (`indeximage`,`indexheading`,`indexheader`,`indexfooter`,`nohtml`,`nosmiley`,`noxcodes`,`noimages`,`nobreak`,`indexheaderalign`,`indexfooteralign`,`lastarticlesyn`,`lastarticlestotal`) VALUES ('impression_bar.png','Impression header','Enjoy reading the articles in <em>Impression</em>','Impression footer','0','0','0','0','1','left','left','0','5');


#
# Table structure for table 'impression_articles'
#

CREATE TABLE `impression_articles` (
  `aid` int(11) unsigned NOT NULL auto_increment,
  `cid` int(11) unsigned NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `submitter` int(11) NOT NULL default '0',
  `publisher` varchar(255) NOT NULL default '',
  `status` tinyint(2) NOT NULL default '0',
  `date` int(11) NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `published` int(11) NOT NULL default '0',
  `introtext` longtext NOT NULL,
  `description` longtext NOT NULL,
  `ipaddress` varchar(120) NOT NULL default '0',
  `meta_keywords` varchar(255) NOT NULL default '',
  `item_tag` text NOT NULL,
  `nobreak` int NOT NULL default 0,
  PRIMARY KEY  (`aid`),
  KEY `cid` (`cid`),
  KEY `status` (`status`),
  KEY `title` (`title`(40))
) TYPE=MyISAM COMMENT='Impression by McDonald' AUTO_INCREMENT=1 ;

#
# Table structure for table 'imlinks_configs'
#

CREATE TABLE impression_configs (
  rssactive INT(1) NOT NULL DEFAULT '1',
  rsstitle VARCHAR(128) NOT NULL,
  rsslink VARCHAR(128) NOT NULL,
  rssdsc VARCHAR(128) NOT NULL,
  rssimgurl VARCHAR(255) NOT NULL,
  rsswidth TINYINT(8) NOT NULL DEFAULT '0',
  rssheight TINYINT(8) NOT NULL DEFAULT '0',
  rssimgtitle VARCHAR(128) NOT NULL,
  rssimglink VARCHAR(255) NOT NULL,
  rssttl TINYINT(8) NOT NULL DEFAULT '0',
  rsswebmaster VARCHAR(255) NOT NULL,
  rsseditor VARCHAR(255) NOT NULL,
  rsscategory VARCHAR(128) NOT NULL,
  rssgenerator VARCHAR(128) NOT NULL,
  rsscopyright VARCHAR(128) NOT NULL,
  rsstotal TINYINT(8) NOT NULL DEFAULT '0',
  rssofftitle VARCHAR(128) NOT NULL DEFAULT '',
  rssoffdsc VARCHAR(255) NOT NULL DEFAULT ''
) TYPE=MYISAM COMMENT='Impression by McDonald';

INSERT INTO impression_configs (rssactive,rsstitle,rsslink,rssdsc,rssimgurl,rsswidth,rssheight,rssimgtitle,rssimglink,rssttl,rsswebmaster,rsseditor,rsscategory,rssgenerator,rsscopyright,rsstotal,rssofftitle,rssoffdsc) VALUES ('1', '', '', '', '', '', '', '', '', '60', '', '', '', '', '', '15', '', '');