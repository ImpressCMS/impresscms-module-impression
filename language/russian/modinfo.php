<?php
/**
 * $Id$ Russian translation. Charset: utf-8 (without BOM)
 * Module: Impression
 * Language: Russian
 * Format: UTF-8 
 * Author: McDonald
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME","Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC","Простой модуль для создания статей.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT","Spotlight");
define("_MI_IMPRESSION_BNEW","Recent headlines");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1","Submit an article");
define("_MI_IMPRESSION_SMNAME2","Popular");
define("_MI_IMPRESSION_SMNAME3","Top Rated");
define("_MI_IMPRESSION_SMNAME4","Latest Listings");

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX","Индекс");
define("_MI_IMPRESSION_INDEXPAGE","Управление индексной страницей");
define("_MI_IMPRESSION_MCATEGORY","Управление категориями");
define("_MI_IMPRESSION_MARTICLES","Управление статьями");
define("_MI_IMPRESSION_MUPLOADS","Загрузка картинок");
define("_MI_IMPRESSION_PERMISSIONS","Установка прав доступа");
define("_MI_IMPRESSION_BLOCKADMIN","Block Settings");

// Title of config items
define('_MI_IMPRESSION_POPULAR', 'Article popular count');
define('_MI_IMPRESSION_POPULARDSC', 'The number of hits before a article status will be considered as popular.');

define("_MI_IMPRESSION_ICONDISPLAY","Articles popular and new:");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Select how to display the popular and new icons in article listing.");
define("_MI_IMPRESSION_DISPLAYICON1", "Display as Icons");
define("_MI_IMPRESSION_DISPLAYICON2", "Display as Text");
define("_MI_IMPRESSION_DISPLAYICON3", "Do Not Display");

define("_MI_IMPRESSION_DAYSNEW","Articles days new:");
define("_MI_IMPRESSION_DAYSNEWDSC","The number of days a article status will be considered as new.");

define("_MI_IMPRESSION_DAYSUPDATED","Articles days updated:");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","The amount of days a article status will be considered as updated.");

define('_MI_IMPRESSION_PERPAGE', 'Article listing count:');
define('_MI_IMPRESSION_PERPAGEDSC', 'Number of articles to display in each category listing.');

define("_MI_IMPRESSION_ADMINPAGE", "Admin index articles count:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Number of new articles to display in module admin area.");

define("_MI_IMPRESSION_ARTICLESSORT", "Default article order:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Select the default order for the article listings.");

define("_MI_IMPRESSION_SORTCATS", "Sort categories by:");
define("_MI_IMPRESSION_SORTCATSDSC", "Select how categories and sub-categories are sorted.");

define('_MI_IMPRESSION_SUBCATS', 'Sub-categories:');
define('_MI_IMPRESSION_SUBCATSDSC', 'Select Yes to display sub-categories. Selecting No will hide sub-categories from the listings');

define('_MI_IMPRESSION_EDITOR', "Editor to use (admin):");
define('_MI_IMPRESSION_EDITORCHOICE', "Select the editor to use for administration. If you have a 'simple' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact.");
define('_MI_IMPRESSION_EDITORUSER', "Editor to use (user):");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "Select the editor to use for user side. If you have a 'simple' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extended");
define("_MI_IMPRESSION_FORM_COMPACT","Compact");
define("_MI_IMPRESSION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_IMPRESSION_FORM_FCK","FCK Editor");
define("_MI_IMPRESSION_FORM_KOIVI","Koivi Editor");
define("_MI_IMPRESSION_FORM_TINYEDITOR","TinyEditor");
define('_MI_IMPRESSION_FORM_TINYMCE','TinyMCE');

define('_MI_IMPRESSION_USESHOTS', 'Display Screenshot Images?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Select yes to display screenshot images for each article item');

define('_MI_IMPRESSION_USETHUMBS', 'Use thumbnails:');
define("_MI_IMPRESSION_USETHUMBSDSC", "Supported image types: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression will use thumb nails for images. Set to 'No' to use orginal image if the server does not support this option.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "Update thumbnails?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Main image directory');

define('_MI_IMPRESSION_CATEGORYIMG','Category image upload directory');

define('_MI_IMPRESSION_DATEFORMAT', 'Timestamp:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Default timestamp for Impression.<br />See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Timestamp administration:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', 'Default admininstration timestamp for Impression.<br />See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Set total amount of characters for description?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Set total amount of characters for description on Index Page.");

define("_MI_IMPRESSION_OTHERARTICLES", "Show other articles submitted by Submitter?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Select Yes if other articles of the submitter should be displayed.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Show article count in category list?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Select Yes if you want the amount of articles per category have displayed.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Show social bookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Select Yes if you want Social Bookmark icons to be displayed under article.");

define("_MI_IMPRESSION_USEMETADESCR", "Generate meta description:");
define("_MI_IMPRESSION_USEMETADSC", "With this option the meta description will be based on the article introtext.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Show disclaimer before user submission?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Before a user can submit an article show the entry regulations?');

define('_MI_IMPRESSION_DISCLAIMER', 'Enter submission disclaimer text:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Show disclaimer before user article?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Show article regulations before open an article?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Enter article disclaimer text:');

define('_MI_IMPRESSION_COPYRIGHT', 'Copyright notice:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Select to display a copyright notice on article page.');

//define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
//define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Upload size (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Maximum article size permitted with article uploads.');
define('_MI_IMPRESSION_IMGWIDTH','Upload image width');
define('_MI_IMPRESSION_IMGWIDTHDSC','Maximum image width permitted when uploading image articles');
define('_MI_IMPRESSION_IMGHEIGHT','Upload image height');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Maximum image height permitted when uploading image articles');

define('_MI_IMPRESSION_UPLOADDIR','Upload directory (no trailing slash)');
define('_MI_IMPRESSION_ALLOWSUBMISS','User submissions:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Allow users to submit new articles');
define('_MI_IMPRESSION_ALLOWUPLOADS','User uploads:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Allow users to upload articles directly to your website');
define('_MI_IMPRESSION_SCREENSHOTS','Screenshots upload directory');

define("_MI_IMPRESSION_SUBMITART", "Article submission:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Select groups that can submit new articles.");

define("_MI_IMPRESSION_QUALITY", "Thumb Nail Quality:");
define("_MI_IMPRESSION_QUALITYDSC", "Quality Lowest: 0 Highest: 100");
define("_MI_IMPRESSION_KEEPASPECT", "Keep Image Aspect Ratio?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Title");
define("_MI_IMPRESSION_WEIGHT", "Weight");
define("_MI_IMPRESSION_POPULARITY", "Readings");
define("_MI_IMPRESSION_SUBMITTED2", "Submission date");

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

define('_MI_IMPRESSION_AUTHOR_INFO', "Developer information");
define('_MI_IMPRESSION_AUTHOR_NAME', "Developer");
define('_MI_IMPRESSION_AUTHOR_DEVTEAM', "Development team");
define('_MI_IMPRESSION_AUTHOR_WEBSITE', "Developer website");
define('_MI_IMPRESSION_AUTHOR_EMAIL', "Developer email");
define('_MI_IMPRESSION_AUTHOR_CREDITS', "Credits");
define('_MI_IMPRESSION_MODULE_INFO', "Module development information");
define('_MI_IMPRESSION_MODULE_STATUS', "Development status");
define('_MI_IMPRESSION_MODULE_DEMO', "Demo site");
define('_MI_IMPRESSION_MODULE_SUPPORT', "Official support site");
define('_MI_IMPRESSION_MODULE_BUG', "Report a bug for this module");
define('_MI_IMPRESSION_MODULE_FEATURE', "Suggest a new feature for this module");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Disclaimer");
define('_MI_IMPRESSION_RELEASE', "Release date: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Icons by:");

define("_MI_IMPRESSION_HEADERPRINT","[PRINT OPTIONS] Print page header");
define("_MI_IMPRESSION_HEADERPRINTDSC","Header that will be printed for each article");
define("_MI_IMPRESSION_PRINTLOGOURL","[PRINT OPTIONS] Logo print url");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url of the logo that will be printed at the top of the page");
define("_MI_IMPRESSION_FOOTERPRINT","[PRINT OPTIONS] Print page footer");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Footer that will be printed for each article");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Item footer");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Index footer");
define("_MI_IMPRESSION_BOTH_FOOTERS","Both footers");
define("_MI_IMPRESSION_NO_FOOTERS","None");
define("_MI_IMPRESSION_ITEMFOOTER", "[PRINT OPTIONS] Item footer");

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

define('_MI_IMPRESSION_AUTHOR_CREDITSTEXT',"WF-Projects Team. Based on the module WF-Links & MyTube, thanks to the dream-team for some code snippits.");
define('_MI_IMPRESSION_AUTHOR_BUGFIXES', "Bug Fix History");

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "");

define("_MI_IMPRESSION_KEYLENGTH", "Enter max. characters for meta keywords:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "default is 255 characters");
define("_MI_IMPRESSION_HEADLINES", "Headlines" );
define("_MI_IMPRESSION_HEADLINESDSC", "Set the number of headlines to show.");
define("_MI_IMPRESSION_BTAGCLOUD", "Impression Tag Cloud");
define("_MI_IMPRESSION_BTOPTAG", "Impression Top Tags");
define("_MI_IMPRESSION_LINKEDTERMS", "Link to terms in glossary?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "The module imGlossary needs to be installed and active for this feature." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Folder name of imGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "The name of the folder where imGlossary is in.<br />Default: <em>imglossary</em>" );
define( '_MI_IMPRESSION_SELECTFEED', 'Use ICMS RSS feed?' );
define( '_MI_IMPRESSION_SELECTFEED_DSC', 'Select <em>Yes</em> to use ImpressCMS RSS feed. Select <em>No</em> to use Brandycoke\'s RSSfit module (subfeed needs to be activated).'  );
define( '_MI_IMPRESSION_FEEDSTOTAL', 'How many articles to display in RSS feed?' );
define( '_MI_IMPRESSION_FEEDSTOTALDSC', 'This number only affects the ImpressCMS RSS feed. Default: <em>15</em>' );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - a copy of the GNU license is enclosed (license.txt).' );
?>