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
  PRIMARY KEY  (`aid`),
  KEY `cid` (`cid`),
  KEY `status` (`status`),
  KEY `title` (`title`(40))
) TYPE=MyISAM COMMENT='Impression by McDonald' AUTO_INCREMENT=1 ;

