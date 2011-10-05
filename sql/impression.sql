# MySQL file for Impression
# Version: 1.0.0
# Author: McDonald

#
# Table structure for table 'impression_altcat'
#

CREATE TABLE `impression_altcat` (
  `aid` int(11) unsigned NOT NULL default '0',
  `cid` int(5) unsigned NOT NULL default '0',
  KEY `aid` (`aid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM COMMENT='Impression by McDonald';

#
# Table structure for table 'impression_cat'
#

CREATE TABLE `impression_cat` (
  cid int(11) unsigned NOT NULL auto_increment,
  pid int(11) unsigned NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  imgurl varchar(255) NOT NULL default '',
  description text NOT NULL default '',
  total int(11) NOT NULL default '0',
  weight int(11) NOT NULL default '0',
  inblocks tinyint(1) NOT NULL default '1',
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
  `indexheaderalign` varchar(25) NOT NULL default 'left',
  `indexfooteralign` varchar(25) NOT NULL default 'center',
  `lastarticlesyn` tinyint(1) NOT NULL default '0',
  `lastarticlestotal` varchar(5) NOT NULL default '5',
  FULLTEXT KEY `indexheading` (`indexheading`),
  FULLTEXT KEY `indexheader` (`indexheader`),
  FULLTEXT KEY `indexfooter` (`indexfooter`)
) TYPE=MyISAM COMMENT='Impression by McDonald';

INSERT INTO `impression_indexpage` (`indeximage`,`indexheading`,`indexheader`,`indexfooter`,`indexheaderalign`,`indexfooteralign`,`lastarticlesyn`,`lastarticlestotal`) VALUES ('impression_bar.png','Impression header','Enjoy reading the articles in <em>Impression</em>','Impression footer','left','left','0','5');

#
# Table structure for table 'impression_articles'
#

CREATE TABLE `impression_articles` (
  `aid` int(11) unsigned NOT NULL auto_increment,
  `cid` int(11) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `uid` mediumint(8) NOT NULL default '1',
  `uname` varchar(255) NOT NULL default '',
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
  `comments` int(11) unsigned NOT NULL default '0',
  `notifypub` int(1) NOT NULL default '0',
  `nice_url` varchar(128) NOT NULL default '',
  `inblocks` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`aid`),
  KEY `cid` (`cid`),
  KEY `status` (`status`),
  KEY `title` (`title`(40))
) TYPE=MyISAM COMMENT='Impression by McDonald' AUTO_INCREMENT=1 ;

#
# Table structure for table 'impression_mods'
#

CREATE TABLE `impression_mod` (
  `requestid` int(11) NOT NULL auto_increment,
  `aid` int(11) unsigned NOT NULL default '0',
  `cid` int(11) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `uid` mediumint(8) NOT NULL default '1',
  `publisher` varchar(255) NOT NULL default '',
  `status` tinyint(2) NOT NULL default '0',
  `date` int(11) NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `published` int(11) NOT NULL default '0',
  `introtext` longtext NOT NULL,
  `description` longtext NOT NULL,
  `meta_keywords` varchar(255) NOT NULL default '',
  `item_tag` text NOT NULL,
  `comments` int(11) unsigned NOT NULL default '0',
  `notifypub` int(1) NOT NULL default '0',
  `nice_url` varchar(128) NOT NULL default '',
  `inblocks` tinyint(1) NOT NULL default '1',
  `modifysubmitter` int(11) DEFAULT '0' NOT NULL,
  `requestdate` int(11) DEFAULT '0' NOT NULL,
   PRIMARY KEY (requestid) 
) TYPE=MyISAM COMMENT='Impression by McDonald' AUTO_INCREMENT=1 ;

#
# Table structure for table 'impression_configs'
#

CREATE TABLE `impression_configs` (
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
) TYPE=MYISAM COMMENT='Impression by McDonald';

INSERT INTO impression_configs (rssactive,rsstitle,rsslink,rssdsc,rssimgurl,rsswidth,rssheight,rssimgtitle,rssimglink,rssttl,rsswebmaster,rsseditor,rsscategory,rssgenerator,rsscopyright,rsstotal,rssofftitle,rssoffdsc) VALUES ('1', '', '', '', '', '', '', '', '', '60', '', '', '', '', '', '15', '', '');