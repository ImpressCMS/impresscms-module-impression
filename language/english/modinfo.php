<?php
/**
 * $Id: modinfo.php
 * Module: Impression
 * Language: english
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME","Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC","A simple module to create articles.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT","Spotlight");
define("_MI_IMPRESSION_BNEW","Recent headlines");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1","Submit");
define("_MI_IMPRESSION_SMNAME2","Popular");
define("_MI_IMPRESSION_SMNAME3","");
define("_MI_IMPRESSION_SMNAME4","");

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX","Main Index");
define("_MI_IMPRESSION_INDEXPAGE","Index Page Management");
define("_MI_IMPRESSION_MCATEGORY","Category Management");
define("_MI_IMPRESSION_MARTICLES","Article Management");
define("_MI_IMPRESSION_MUPLOADS","Image Upload");
define("_MI_IMPRESSION_PERMISSIONS","Permission Settings");
define("_MI_IMPRESSION_BLOCKADMIN","Block Settings");

// Title of config items
define('_MI_IMPRESSION_POPULAR', '<b>Article popular count</b>');
define('_MI_IMPRESSION_POPULARDSC', 'The number of reads before a article status will be considered as popular.');

define("_MI_IMPRESSION_ICONDISPLAY","<b>Articles popular & new:</b>");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Select how to display the popular and new icons in article listing.");
define("_MI_IMPRESSION_DISPLAYICON1", "Display as icons");
define("_MI_IMPRESSION_DISPLAYICON2", "Display as text");
define("_MI_IMPRESSION_DISPLAYICON3", "Do not display");

define("_MI_IMPRESSION_DAYSNEW","<b>Articles days new:</b>");
define("_MI_IMPRESSION_DAYSNEWDSC","The number of days a article status will be considered as new.");

define("_MI_IMPRESSION_DAYSUPDATED","<b>Articles days updated:</b>");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","The amount of days a article status will be considered as updated.");

define('_MI_IMPRESSION_PERPAGE', '<b>Article listing count:</b>');
define('_MI_IMPRESSION_PERPAGEDSC', 'Number of articles to display in each category listing.');

define("_MI_IMPRESSION_ADMINPAGE", "<b>Admin index articles count:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Number of new articles to display in module admin area.");

define("_MI_IMPRESSION_ARTICLESSORT", "<b>Default article order:</b>");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Select the default order for the article listings.");

define("_MI_IMPRESSION_SORTCATS", "<b>Sort categories by:</b>");
define("_MI_IMPRESSION_SORTCATSDSC", "Select how categories and sub-categories are sorted.");

define('_MI_IMPRESSION_SUBCATS', '<b>Sub-Categories:</b>');
define('_MI_IMPRESSION_SUBCATSDSC', 'Select Yes to display sub-categories. Selecting No will hide sub-categories from the listings.');

define('_MI_IMPRESSION_EDITOR', "Editor to use (admin):");
define('_MI_IMPRESSION_EDITORCHOICE', "Select the editor to use for administrators. If you have a 'simple' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact.");
define('_MI_IMPRESSION_EDITORUSER', "Editor to use (user):");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "Select the editor to use for user side. If you have a 'simple' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extended");
define("_MI_IMPRESSION_FORM_COMPACT","Compact");
define("_MI_IMPRESSION_FORM_SPAW","Spaw Editor");
define("_MI_IMPRESSION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_IMPRESSION_FORM_FCK","FCK Editor");
define("_MI_IMPRESSION_FORM_KOIVI","Koivi Editor");
define("_MI_IMPRESSION_FORM_TINYEDITOR","Tinyeditor");

define('_MI_IMPRESSION_USESHOTS', 'Display Screenshot Images?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Select Yes to display screenshot images for each article item.');

define('_MI_IMPRESSION_USETHUMBS', 'Use Thumb Nails:');
define("_MI_IMPRESSION_USETHUMBSDSC", "Supported link types: JPG, GIF, PNG.<div style='padding-top: 8px;'>WF-Links will use thumb nails for images. Set to 'No' to use orginal image if the server does not support this option.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "Update Thumbnails?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");

define('_MI_IMPRESSION_SHOTWIDTH', 'Screenshot Display Width');
define('_MI_IMPRESSION_SHOTWIDTHDSC', 'Display width for screenshot image');

define('_MI_IMPRESSION_SHOTHEIGHT', 'Screenshot Display Height');
define('_MI_IMPRESSION_SHOTHEIGHTDSC', 'Display height for screenshot image');

define('_MI_IMPRESSION_MAINIMGDIR','Main Image Directory');

define('_MI_IMPRESSION_CATEGORYIMG','Category Image Upload Directory');

define('_MI_IMPRESSION_DATEFORMAT', 'Timestamp:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Default Timestamp for Impression');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Timestamp administration:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', 'Default admininstration Timestamp for Impression');

define("_MI_IMPRESSION_TOTALCHARS", "Set total amount of characters for description?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Set total amount of characters for description on Index Page.");

define("_MI_IMPRESSION_OTHERARTICLES", "Show other articles submitted by Submitter?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Select Yes if other articles of the submitter should be displayed.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Show article count in category list?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Select Yes if you want the amount of articles per category have displayed.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Show Social Bookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Select Yes if you want Social Bookmark icons to be displayed under article.");

define("_MI_IMPRESSION_USEMETADESCR", "Generate meta description:");
define("_MI_IMPRESSION_USEMETADSC", "With this option the meta description will be based on the article introtext.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Show Disclaimer before User Submission?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Before a User can submit a Article show the Entry regulations?');

define('_MI_IMPRESSION_DISCLAIMER', 'Enter Submission Disclaimer Text:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Show Disclaimer before User article?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Show article regulations before open an article?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Enter article Disclaimer Text:');

define('_MI_IMPRESSION_COPYRIGHT', 'Copyright Notice:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Select to display a copyright notice on article page.');

define('_MI_IMPRESSION_CHECKHOST', 'Disallow direct article linking? (leeching)');
define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Upload Size (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Maximum article size permitted with article uploads.');
define('_MI_IMPRESSION_IMGWIDTH','Upload Image width');
define('_MI_IMPRESSION_IMGWIDTHDSC','Maximum image width permitted when uploading image articles');
define('_MI_IMPRESSION_IMGHEIGHT','Upload Image height');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Maximum image height permitted when uploading image articles');

define('_MI_IMPRESSION_UPLOADDIR','Upload Directory (No trailing slash)');
define('_MI_IMPRESSION_ALLOWSUBMISS','User Submissions:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Allow Users to Submit new articles');
define('_MI_IMPRESSION_ALLOWUPLOADS','User Uploads:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Allow Users to upload articles directly to your website');
define('_MI_IMPRESSION_SCREENSHOTS','Screenshots Upload Directory');

define("_MI_IMPRESSION_SUBMITART", "article Submission:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Select groups that can submit new articles.");
define("_MI_IMPRESSION_RATINGGROUPS", "article Ratings:");
define("_MI_IMPRESSION_RATINGGROUPSDSC", "Select groups that can rate a article.");

define("_MI_IMPRESSION_QUALITY", "Thumb Nail Quality:");
define("_MI_IMPRESSION_QUALITYDSC", "Quality Lowest: 0 Highest: 100");
define("_MI_IMPRESSION_KEEPASPECT", "Keep Image Aspect Ratio?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Title");
define("_MI_IMPRESSION_RATING", "Rating");
define("_MI_IMPRESSION_WEIGHT", "Weight");
define("_MI_IMPRESSION_POPULARITY", "Readings");
define("_MI_IMPRESSION_SUBMITTED2", "Submission Date");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Global');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'Global articles notification options.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Category');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Notification options that apply to the current article category.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'Article');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Notification options that apply to the current article.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'New Category');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new article category is created.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a new article category is created.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New article category');

define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFY', 'Modify Article Requested');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYCAP', 'Notify me of any article modification request.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYDSC', 'Receive notification when any video modification request is submitted.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Article Modification Requested');

define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFY', 'Broken Article Submitted');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYCAP', 'Notify me of any broken article report.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYDSC', 'Receive notification when any broken article report is submitted.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Broken Video Reported');

define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'Video Submitted');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Notify me when any new video is submitted (awaiting approval).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Receive notification when any new video is submitted (awaiting approval).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New video submitted');

define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'New Video');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Notify me when any new video is posted.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Receive notification when any new video is posted.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New video');

define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'Video Submitted');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notify me when a new video is submitted (awaiting approval) to the current category.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new video is submitted (awaiting approval) to the current category.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New video submitted in category');

define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'New Video');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'Notify me when a new video is posted to the current category.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Receive notification when a new video is posted to the current category.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New video in category');

define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Video Approved');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'Notify me when this Video is approved.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Receive notification when this video is approved.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Video Approved');

define('_MI_IMPRESSION_AUTHOR_INFO', "Developer Information");
define('_MI_IMPRESSION_AUTHOR_NAME', "Developer");
define('_MI_IMPRESSION_AUTHOR_DEVTEAM', "Development Team");
define('_MI_IMPRESSION_AUTHOR_WEBSITE', "Developer website");
define('_MI_IMPRESSION_AUTHOR_EMAIL', "Developer email");
define('_MI_IMPRESSION_AUTHOR_CREDITS', "Credits");
define('_MI_IMPRESSION_MODULE_INFO', "Module Development Information");
define('_MI_IMPRESSION_MODULE_STATUS', "Development Status");
define('_MI_IMPRESSION_MODULE_DEMO', "Demo Site");
define('_MI_IMPRESSION_MODULE_SUPPORT', "Official support site");
define('_MI_IMPRESSION_MODULE_BUG', "Report a bug for this module");
define('_MI_IMPRESSION_MODULE_FEATURE', "Suggest a new feature for this module");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Disclaimer");
define('_MI_IMPRESSION_RELEASE', "Release Date: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Icons by:");

define("_MI_IMPRESSION_HEADERPRINT","[PRINT OPTIONS] Print page header");
define("_MI_IMPRESSION_HEADERPRINTDSC","Header that will be printed for each article");
define("_MI_IMPRESSION_PRINTLOGOURL","[PRINT OPTIONS] Logo print url");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url of the logo that will be printed at the top of the page");
define("_MI_IMPRESSION_FOOTERPRINT","[PRINT OPTIONS] Print page footer");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Footer that will be printed for each article");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Item footer");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Index Footer");
define("_MI_IMPRESSION_BOTH_FOOTERS","Both footers");
define("_MI_IMPRESSION_NO_FOOTERS","None");
define("_MI_IMPRESSION_ITEMFOOTER", "[CONTENT OPTIONS] Item footer");

define('_MI_IMPRESSION_MODULE_MAILLIST', "WF-Project Mailing Lists");
define('_MI_IMPRESSION_MODULE_MAILANNOUNCEMENTS', "Announcements Mailing List");
define('_MI_IMPRESSION_MODULE_MAILBUGS', "Bug Mailing List");
define('_MI_IMPRESSION_MODULE_MAILFEATURES', "Features Mailing List");
define('_MI_IMPRESSION_MODULE_MAILANNOUNCEMENTSDSC', "Get the latest announcements from WF-Project.");
define('_MI_IMPRESSION_MODULE_MAILBUGSDSC', "Bug Tracking and submission mailing list");
define('_MI_IMPRESSION_MODULE_MAILFEATURESDSC', "Request New Features mailing list.");

define('_MI_IMPRESSION_WARNINGTEXT', "THE SOFTWARE IS PROVIDED BY MCDONALD \"AS IS\" AND \"WITH ALL FAULTS.\"
MCDONALD MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND CONCERNING
THE QUALITY, SAFETY OR SUITABILITY OF THE SOFTWARE, EITHER EXPRESS OR
IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.
FURTHER, MCDONALD MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE TRUTH,
ACCURACY OR COMPLETENESS OF ANY STATEMENTS, INFORMATION OR MATERIALS
CONCERNING THE SOFTWARE THAT IS CONTAINED IN McDonalds Store WEBSITE. IN NO
EVENT WILL MCDONALD BE LIABLE FOR ANY INDIRECT, PUNITIVE, SPECIAL,
INCIDENTAL OR CONSEQUENTIAL DAMAGES HOWEVER THEY MAY ARISE AND EVEN IF
MCDONALD HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES..");

define('_MI_IMPRESSION_AUTHOR_CREDITSTEXT',"WF-Projects Team. Based on the module WF-Links, thanks to the dream-team for some code snippits.");
define('_MI_IMPRESSION_AUTHOR_BUGFIXES', "Bug Fix History");

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "");

define("_MI_IMPRESSION_KEYLENGTH", "Enter max. characters for meta keywords:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "default is 255 characters");
define("_MI_IMPRESSION_HEADLINES", "Headlines" );
define("_MI_IMPRESSION_HEADLINESDSC", "Set the number of headlines to show.");

?>