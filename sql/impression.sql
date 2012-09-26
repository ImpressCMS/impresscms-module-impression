# MySQL file for Impression
# Author: McDonald

#
# Table structure for table 'impression_altcat'
#

CREATE TABLE `impression_altcat` (
	`aid` int(11) unsigned NOT NULL default '0',
	`cid` int(5) unsigned NOT NULL default '0',
	KEY `aid` (`aid`),
	KEY `cid` (`cid`)
) ENGINE=MYISAM;

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
	`lastarticlestotal` varchar(5) NOT NULL default '5'
) ENGINE=MYISAM;

INSERT INTO `impression_indexpage` (`indeximage`,`indexheading`,`indexheader`,`indexfooter`,`indexheaderalign`,`indexfooteralign`,`lastarticlestotal`) VALUES ('impression_bar.png','Impression header','Enjoy reading the articles in <em>Impression</em>','Impression footer','left','left','50');

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
) ENGINE=MYISAM;

INSERT INTO impression_configs (rssactive,rsstitle,rsslink,rssdsc,rssimgurl,rsswidth,rssheight,rssimgtitle,rssimglink,rssttl,rsswebmaster,rsseditor,rsscategory,rssgenerator,rsscopyright,rsstotal,rssofftitle,rssoffdsc) VALUES ('1', '', '', '', '', '', '', '', '', '60', '', '', '', '', '', '15', '', '');