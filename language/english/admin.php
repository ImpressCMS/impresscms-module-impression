<?php
/**
* Impression - a light content management module for ImpressCMS
*
* Based upon WF-Links 1.06 and imLinks
*
* File: language/english/admin.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since		1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since		1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

define( '_AM_IMPRESSION_WARNINSTALL1', 'WARNING: Directory %s exists on your server. <br />Please remove this directory for security reasons.' );
define( '_AM_IMPRESSION_WARNINSTALL2', 'WARNING: File %s exists on your server. <br />Please remove this file for security reasons.' );
define( '_AM_IMPRESSION_WARNINSTALL3', 'WARNING: Folder %s does not exists on your server. <br />This folder is required by Impression.' );

define( '_AM_IMPRESSION_MODULE_NAME', 'Impression' );

define( '_AM_IMPRESSION_BMODIFY', 'Modify' );
define( '_AM_IMPRESSION_BDELETE', 'Delete' );
define( '_AM_IMPRESSION_BCREATE', 'Create' );
define( '_AM_IMPRESSION_BADD', 'Add' );
define( '_AM_IMPRESSION_BAPPROVE', 'Approve' );
define( '_AM_IMPRESSION_BIGNORE', 'Ignore' );
define( '_AM_IMPRESSION_BCANCEL', 'Cancel' );
define( '_AM_IMPRESSION_BSAVE', 'Save' );
define( '_AM_IMPRESSION_BRESET', 'Reset' );
define( '_AM_IMPRESSION_BMOVE', 'Move articles' );
define( '_AM_IMPRESSION_BUPLOAD', 'Upload' );
define( '_AM_IMPRESSION_BDELETEIMAGE', 'Delete selected image' );
define( '_AM_IMPRESSION_BRETURN', 'Return to where you where!' );
define( '_AM_IMPRESSION_DBERROR', 'Database Access Error' );
// Other Options
define( '_AM_IMPRESSION_TEXTOPTIONS', 'Text options:' );
define( '_AM_IMPRESSION_DISABLEHTML', ' Disable HTML tags' );
define( '_AM_IMPRESSION_DISABLESMILEY', ' Disable smilie icons' );
define( '_AM_IMPRESSION_DISABLEXCODE', ' Disable ICMS codes' );
define( '_AM_IMPRESSION_DISABLEIMAGES', ' Disable images' );
define( '_AM_IMPRESSION_DISABLEBREAK', ' Use ICMS linebreak conversion?' );
define( '_AM_IMPRESSION_UPLOADFILE', 'Article uploaded successfully' );
define( '_AM_IMPRESSION_NOMENUITEMS', 'No menu items within the menu' );
// Admin Bread crumb
define( '_AM_IMPRESSION_PREFS', 'Preferences' );
define( '_AM_IMPRESSION_BUPDATE', 'Module Update' );
define( '_AM_IMPRESSION_BINDEX', 'Main Index' );
define( '_AM_IMPRESSION_BPERMISSIONS', 'Permissions' );
define( '_AM_IMPRESSION_BLOCKADMIN', 'Block Settings' );
define( '_AM_IMPRESSION_GOMODULE', 'Go to module' );
define( '_AM_IMPRESSION_ABOUT', 'About' );
// Admin Summary
define( '_AM_IMPRESSION_SCATEGORY', 'Category: ' );
define( '_AM_IMPRESSION_SFILES', 'Articles: ' );
define( '_AM_IMPRESSION_SNEWFILESVAL', 'Submitted: ' );
define( '_AM_IMPRESSION_SMODREQUEST', 'Modified: ' );
define( '_AM_IMPRESSION_SREVIEWS', 'Reviews: ' );
// Admin Main Menu
define( '_AM_IMPRESSION_MCATEGORY', 'Category Management' );
define( '_AM_IMPRESSION_MARTICLES', 'Article Management' );
define( '_AM_IMPRESSION_INDEXPAGE', 'Index Page Management' );
define( '_AM_IMPRESSION_MUPLOADS', 'Image Upload' );
// Catgeory defines
define( '_AM_IMPRESSION_CCATEGORY_CREATENEW', 'Create New Category' );
define( '_AM_IMPRESSION_CCATEGORY_MODIFY', 'Modify Category' );
define( '_AM_IMPRESSION_CCATEGORY_MOVE', 'Move Category articles' );
define( '_AM_IMPRESSION_CCATEGORY_MODIFY_TITLE', 'Category title:' );
define( '_AM_IMPRESSION_CCATEGORY_MODIFY_FAILED', 'Failed Moving Articles: Cannot move to this Category' );
define( '_AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT', 'Failed Moving Articles: Cannot find this Category' );
define( '_AM_IMPRESSION_CCATEGORY_MODIFY_MOVED', 'Articles Moved' );
define( '_AM_IMPRESSION_CCATEGORY_CREATED', 'New Category Created and Database Updated Successfully' );
define( '_AM_IMPRESSION_CCATEGORY_MODIFIED', 'Selected Category Modified and Database Updated Successfully' );
define( '_AM_IMPRESSION_CCATEGORY_DELETED', 'Selected Category Deleted and Database Updated Successfully' );
define( '_AM_IMPRESSION_CCATEGORY_AREUSURE', 'WARNING: Are you sure you want to delete this Category and ALL its Articles and Comments?' );
define( '_AM_IMPRESSION_CCATEGORY_NOEXISTS', 'You must create a Category before you can add a new article' );
define( '_AM_IMPRESSION_FCATEGORY_GROUPPROMPT', 'Category Access Permissions:<div style="padding-top: 8px;"><span style="font-weight: normal;">Select user groups who will have access to this Category.</span></div>' );
define( '_AM_IMPRESSION_FCATEGORY_SUBGROUPPROMPT', 'Category Submission Permissions:<div style="padding-top: 8px;"><span style="font-weight: normal;">Select user groups who will have permission to submit new articles to this Category.</span></div>' );
define( '_AM_IMPRESSION_FCATEGORY_MODGROUPPROMPT', 'Category Moderation Permissions:<div style="padding-top: 8px;"><span style="font-weight: normal;">Select user groups who will have permission to moderate this Category.</span></div>' );
define( '_AM_IMPRESSION_FCATEGORY_TITLE', 'Category title:' );
define( '_AM_IMPRESSION_FCATEGORY_WEIGHT', 'Category weight:' );
define( '_AM_IMPRESSION_FCATEGORY_SUBCATEGORY', 'Set as sub-category:' );
define( '_AM_IMPRESSION_FCATEGORY_CIMAGE', 'Select category image:' );
define( '_AM_IMPRESSION_FCATEGORY_DESCRIPTION', 'Set category description:' );
define( '_AM_IMPRESSION_FCATEGORY_SUMMARY', 'Set category summary:' );
// Index page Defines
define( '_AM_IMPRESSION_IPAGE_UPDATED', 'Index page modified and database updated successfully!' );
define( '_AM_IMPRESSION_IPAGE_INFORMATION', 'Index Page Information' );
define( '_AM_IMPRESSION_IPAGE_MODIFY', 'Modify Index Page' );
define( '_AM_IMPRESSION_IPAGE_CIMAGE', 'Select index image:' );
define( '_AM_IMPRESSION_IPAGE_CTITLE', 'Index title:' );
define( '_AM_IMPRESSION_IPAGE_CHEADING', 'Index header:' );
define( '_AM_IMPRESSION_IPAGE_CHEADINGA', 'Index header alignment:' );
define( '_AM_IMPRESSION_IPAGE_CFOOTER', 'Index footer:' );
define( '_AM_IMPRESSION_IPAGE_CFOOTERA', 'Index footer alignment:' );
define( '_AM_IMPRESSION_IPAGE_CLEFT', 'Align left' );
define( '_AM_IMPRESSION_IPAGE_CCENTER', 'Align center' );
define( '_AM_IMPRESSION_IPAGE_CRIGHT', 'Align right' );
// Permissions defines
define( '_AM_IMPRESSION_PERM_MANAGEMENT', 'Permissions Management' );
define( '_AM_IMPRESSION_PERM_PERMSNOTE', '<div><b>NOTE:</b> Please be aware that even if you\'ve set correct viewing permissions here, a group might not see the articles or blocks if you don\'t also grant that group permissions to access the module. To do that, go to <b>System admin > Groups</b>, choose the appropriate group and click the checkboxes to grant its members the access.</div>' );
define( '_AM_IMPRESSION_PERM_CPERMISSIONS', 'Category Permissions' );
define( '_AM_IMPRESSION_PERM_CSELECTPERMISSIONS', 'Select categories that each group is allowed to view' );
define( '_AM_IMPRESSION_PERM_CNOCATEGORY', 'Cannot set permissions: No categories have been created yet!' );
define( '_AM_IMPRESSION_PERM_FPERMISSIONS', 'Article Permissions' );
define( '_AM_IMPRESSION_PERM_FNOFILES', 'Cannot set permissions: No articles have been created yet!' );
define( '_AM_IMPRESSION_PERM_FSELECTPERMISSIONS', 'Select the articles that each group is allowed to view' );
// Upload defines
define( '_AM_IMPRESSION_ARTICLE_IMAGEUPLOAD', 'Image successfully uploaded to server destination' );
define( '_AM_IMPRESSION_ARTICLE_NOIMAGEEXIST', 'Error: No article was selected for uploading. Please try again!' );
define( '_AM_IMPRESSION_ARTICLE_IMAGEEXIST', 'Image already exists in upload area!' );
define( '_AM_IMPRESSION_ARTICLE_FILEDELETED', 'File has been deleted.' );
define( '_AM_IMPRESSION_ARTICLE_FILEERRORDELETE', 'Error deleting article: Article not found on server.' );
define( '_AM_IMPRESSION_ARTICLE_NOFILEERROR', 'Error deleting article: No article selected for deleting.' );
define( '_AM_IMPRESSION_ARTICLE_DELETEFILE', 'WARNING: Are you sure you want to delete this image?' );
define( '_AM_IMPRESSION_ARTICLE_IMAGEINFO', 'Server Status' );
define( '_AM_IMPRESSION_ARTICLE_SPHPINI', '<b>Information taken from PHP ini:</b>' );
define( '_AM_IMPRESSION_ARTICLE_SAFEMODESTATUS', 'Safe mode status: ' );
define( '_AM_IMPRESSION_ARTICLE_REGISTERGLOBALS', 'Register globals: ' );
define( '_AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS', 'Server uploads status: ' );
define( '_AM_IMPRESSION_ARTICLE_MAXUPLOADSIZE', 'Max upload size permitted: ' );
define( '_AM_IMPRESSION_ARTICLE_MAXPOSTSIZE', 'Max post size permitted: ' );
define( '_AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS', ' (This may cause problems)' );
define( '_AM_IMPRESSION_ARTICLE_GDLIBSTATUS', 'GD Library support: ' );
define( '_AM_IMPRESSION_ARTICLE_GDLIBVERSION', 'GD Library version: ' );
define( '_AM_IMPRESSION_ARTICLE_GDON', '<b>Enabled</b> (Thumbs nails available)' );
define( '_AM_IMPRESSION_ARTICLE_GDOFF', '<b>Disabled</b> (No thumb nails available)' );
define( '_AM_IMPRESSION_ARTICLE_OFF', 'OFF' );
define( '_AM_IMPRESSION_ARTICLE_ON', 'ON' );
define( '_AM_IMPRESSION_ARTICLE_CATIMAGE', 'Category images' );
define( '_AM_IMPRESSION_ARTICLE_SCREENSHOTS', 'Screenshot images' );
define( '_AM_IMPRESSION_ARTICLE_MAINIMAGEDIR', 'Main images' );
define( '_AM_IMPRESSION_ARTICLE_FCATIMAGE', 'Category image path' );
define( '_AM_IMPRESSION_ARTICLE_FSCREENSHOTS', 'Screenshot image path' );
define( '_AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR', 'Main image path' );
define( '_AM_IMPRESSION_ARTICLE_FUPLOADIMAGETO', 'Upload Image: ' );
define( '_AM_IMPRESSION_ARTICLE_FUPLOADPATH', 'Upload path: ' );
define( '_AM_IMPRESSION_ARTICLE_FUPLOADURL', 'Upload URL: ' );
define( '_AM_IMPRESSION_ARTICLE_FOLDERSELECTION', 'Select upload destination:' );
define( '_AM_IMPRESSION_ARTICLE_FSHOWSELECTEDIMAGE', 'Display selected image:' );
define( '_AM_IMPRESSION_ARTICLE_FUPLOADIMAGE', 'Upload new image to selected destination:' );
// Main Index defines
define( '_AM_IMPRESSION_MINDEX_ARTICLESUMMARY', 'Module Admin Summary' );
define( '_AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE', 'Published articles:' );
define( '_AM_IMPRESSION_MINDEX_AUTOPUBLISHEDARTICLE', 'Auto published articles:' );
define( '_AM_IMPRESSION_MINDEX_AUTOEXPIRE', 'Auto expire articles:' );
define( '_AM_IMPRESSION_MINDEX_EXPIRED', 'Expired articles:' );
define( '_AM_IMPRESSION_MINDEX_OFFLINEARTICLE', 'Offline articles:' );
define( '_AM_IMPRESSION_MINDEX_ID', 'ID' );
define( '_AM_IMPRESSION_MINDEX_TITLE', 'Article title' );
define( '_AM_IMPRESSION_MINDEX_CATTITLE', 'Category' );
define( '_AM_IMPRESSION_MINDEX_POSTER', 'Poster' );
define( '_AM_IMPRESSION_MINDEX_ONLINE', 'Status' );
define( '_AM_IMPRESSION_MINDEX_ONLINESTATUS', 'Online status' );
define( '_AM_IMPRESSION_MINDEX_PUBLISH', 'Published' );
define( '_AM_IMPRESSION_MINDEX_PUBLISHED', 'Published' );
define( '_AM_IMPRESSION_MINDEX_EXPIRE', 'Expired' );
define( '_AM_IMPRESSION_MINDEX_NOTSET', 'Date not set' );
define( '_AM_IMPRESSION_MINDEX_SUBMITTED', 'Date submitted' );
define( '_AM_IMPRESSION_MINDEX_ACTION', 'Action' );
define( '_AM_IMPRESSION_MINDEX_NOARTICLESFOUND', 'NOTICE: There are no articles that match this criteria' );
define( '_AM_IMPRESSION_MINDEX_PAGE', 'Page: ' );
define( '_AM_IMPRESSION_MINDEX_PAGEINFOTXT', '&bull;&nbsp;Impression main page details.<br />&bull;&nbsp;You can easily change the image logo, heading, main index header and footer text to suit your own look<br /><br />Note: The Logo image choosen will be used throughout Impression.' );
// Submitted Articles
define( '_AM_IMPRESSION_SUB_SUBMITTEDFILES', 'Submitted Articles' );
define( '_AM_IMPRESSION_SUB_FILESWAITINGINFO', 'Waiting Articles Information' );
define( '_AM_IMPRESSION_SUB_FILESWAITINGVALIDATION', 'Articles Waiting Validation: ' );
define( '_AM_IMPRESSION_SUB_APPROVEWAITINGFILE', '<b>Approve</b> new article information without validation.' );
define( '_AM_IMPRESSION_SUB_EDITWAITINGFILE', '<b>Edit</b> new article information and then approve.' );
define( '_AM_IMPRESSION_SUB_DELETEWAITINGFILE', '<b>Delete</b> the new article information.' );
define( '_AM_IMPRESSION_SUB_NOFILESWAITING', 'There are no articles that match this critera' );
define( '_AM_IMPRESSION_SUB_NEWFILECREATED', 'New Article Data Created and Database Updated Successfully' );
// Modifications
define( '_AM_IMPRESSION_MOD_TOTMODREQUESTS', 'Total modification requests: ' );
define( '_AM_IMPRESSION_MOD_MODREQUESTS', 'Modified articles' );
define( '_AM_IMPRESSION_MOD_MODREQUESTSINFO', 'Modified Articles Information' );
define( '_AM_IMPRESSION_MOD_MODID', 'ID' );
define( '_AM_IMPRESSION_MOD_MODTITLE', 'Title' );
define( '_AM_IMPRESSION_MOD_MODPOSTER', 'Original poster: ' );
define( '_AM_IMPRESSION_MOD_DATE', 'Submitted' );
define( '_AM_IMPRESSION_MOD_NOMODREQUEST', 'There are no requests that match this critera' );
define( '_AM_IMPRESSION_MOD_TITLE', 'Article Title: ' );
define( '_AM_IMPRESSION_MOD_AID', 'Article ID: ' );
define( '_AM_IMPRESSION_MOD_CID', 'Category: ' );
define( '_AM_IMPRESSION_MOD_PUBLISHER', 'Publisher: ' );
define( '_AM_IMPRESSION_MOD_DESCRIPTION', 'Description: ' );
define( '_AM_IMPRESSION_MOD_MODIFYSUBMITTER', 'Submitter: ' );
define( '_AM_IMPRESSION_MOD_MODIFYSUBMIT', 'Submitter' );
define( '_AM_IMPRESSION_MOD_PROPOSED', 'Proposed article details' );
define( '_AM_IMPRESSION_MOD_ORIGINAL', 'Orginal article details' );
define( '_AM_IMPRESSION_MOD_REQDELETED', 'Modification request removed from the database' );
define( '_AM_IMPRESSION_MOD_REQUPDATED', 'Selected article modified and database updated successfully' );
define( '_AM_IMPRESSION_MOD_VIEW', 'View' );
define( "_AM_IMPRESSION_MOD_META_KEYWORDS", "Keywords:" );
define( "_AM_IMPRESSION_MOD_ITEM_TAG", "Tags:" );
// Article management
define( '_AM_IMPRESSION_ARTICLE_ID', 'Article ID: ' );
define( '_AM_IMPRESSION_ARTICLE_IP', 'IP address: ' );
define( '_AM_IMPRESSION_ARTICLE_ALLOWEDAMIME', '<div style="padding-top: 4px; padding-bottom: 4px;"><b>Allowed admin article extensions</b>:</div>' );
define( '_AM_IMPRESSION_ARTICLE_MODIFYFILE', 'Modify Article Information' );
define( '_AM_IMPRESSION_ARTICLE_CREATENEWFILE', 'Create New Article' );
define( '_AM_IMPRESSION_ARTICLE_TITLE', 'Title:' );
define( '_AM_IMPRESSION_ARTICLE_INTROTEXT', 'Article intro text:' );
define( '_AM_IMPRESSION_ARTICLE_INTROTEXT_DSC', 'The text entered here will function as the first part of the article and will be displayed in the Spotlight block' );
define( '_AM_IMPRESSION_ARTICLE_DESCRIPTION', 'Article main text:' );
define( '_AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC', 'The text entered here is together with the text entered as intro text the total article' );
define( '_AM_IMPRESSION_ARTICLE_CATEGORY', 'Main category:' );
define( '_AM_IMPRESSION_ARTICLE_FILESSTATUS', 'Set article status:' );
define( '_AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC', 'Set article as published/offline/rejected' );
define( '_AM_IMPRESSION_ARTICLE_SETASAPPROVED', 'Set article status as approved?' );
define( '_AM_IMPRESSION_ARTICLE_PUBLISHDATE', 'Article publish date:' );
define( '_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC', 'Select the date of publication');
define( '_AM_IMPRESSION_ARTICLE_EXPIREDATE', 'Article expire date:' );
define( '_AM_IMPRESSION_ARTICLE_CLEARPUBLISHDATE', '<br /><br />Remove Publish date:' );
define( '_AM_IMPRESSION_ARTICLE_CLEAREXPIREDATE', '<br /><br />Remove Expire date:' );
define( '_AM_IMPRESSION_ARTICLE_PUBLISHDATESET', ' Publish date set: ' );
define( '_AM_IMPRESSION_ARTICLE_SETDATETIMEPUBLISH', ' Set the date/time of publish' );
define( '_AM_IMPRESSION_ARTICLE_SETDATETIMEEXPIRE', ' Set the date/time of expire' );
define( '_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE', 'Set publish date:' );
define( '_AM_IMPRESSION_ARTICLE_SETNEWPUBLISHDATE', '<b>Set new publish date: </b><br />Published:' );
define( '_AM_IMPRESSION_ARTICLE_SETPUBDATESETS', '<b>Publish date set: </b><br />Publishes on date:' );
define( '_AM_IMPRESSION_ARTICLE_EXPIREDATESET', ' Expire date set: ' );
define( '_AM_IMPRESSION_ARTICLE_SETEXPIREDATE', 'Set expire date:' );
define( '_AM_IMPRESSION_ARTICLE_DELEDITMESS', 'Delete broken report?<br /><br /><span style="font-weight: normal;">When you choose <b>YES</b> the broken report will automatically deleted and you confirm that the article now works again.</span>' );
define( '_AM_IMPRESSION_ARTICLE_MUSTBEVALID', 'Screenshot image must be a valid image article under %s directory (ex. shot.gif). Leave it blank if there is no image link.' );
define( '_AM_IMPRESSION_ARTICLE_EDITAPPROVE', 'Approve article:' );
define( '_AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD', 'New article created and database updated successfully' );
define( '_AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE', 'Selected article modified and database updated successfully' );
define( '_AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS', 'Really delete the selected article?' );
define( '_AM_IMPRESSION_ARTICLE_FILEWASDELETED', 'Article %s successfully removed from the database!' );
define( '_AM_IMPRESSION_ARTICLE_FILEAPPROVED', 'Article approved and database updated successfully' );
define( '_AM_IMPRESSION_ARTICLE_PUBLISHER', 'Publisher name:' );
// About defines
define( '_AM_IMPRESSION_BY', 'by' );
// Block defines
define( '_AM_IMPRESSION_BADMIN', 'Block Administration' );
define( '_AM_IMPRESSION_BLKDESC', 'Description' );
define( '_AM_IMPRESSION_TITLE', 'Title' );
define( '_AM_IMPRESSION_SIDE', 'Alignment' );
define( '_AM_IMPRESSION_WEIGHT', 'Weight' );
define( '_AM_IMPRESSION_VISIBLE', 'Visible' );
define( '_AM_IMPRESSION_ACTION', 'Action' );
define( '_AM_IMPRESSION_SBLEFT', 'Left' );
define( '_AM_IMPRESSION_SBRIGHT', 'Right' );
define( '_AM_IMPRESSION_CBLEFT', 'Center left' );
define( '_AM_IMPRESSION_CBRIGHT', 'Center right' );
define( '_AM_IMPRESSION_CBCENTER', 'Center middle' );
define( '_AM_IMPRESSION_ACTIVERIGHTS', 'Active rights' );
define( '_AM_IMPRESSION_ACCESSRIGHTS', 'Access rights' );
// image admin icon
define( '_AM_IMPRESSION_ICO_EDIT', 'Edit this article' );
define( '_AM_IMPRESSION_ICO_DELETE', 'Delete this article' );
define( '_AM_IMPRESSION_ICO_RESOURCE', 'Edit this resource' );
define( '_AM_IMPRESSION_ICO_ONLINE', 'Published' );
define( '_AM_IMPRESSION_ICO_OFFLINE', 'Offline' );
define( '_AM_IMPRESSION_ICO_APPROVED', 'Approved' );
define( '_AM_IMPRESSION_ICO_NOTAPPROVED', 'Not approved' );
define( '_AM_IMPRESSION_ICO_ARTICLE', 'Related article' );
define( '_AM_IMPRESSION_ICO_URL', 'Add related URL' );
define( '_AM_IMPRESSION_ICO_ADD', 'Add' );
define( '_AM_IMPRESSION_ICO_APPROVE', 'Approve' );
define( '_AM_IMPRESSION_ICO_STATS', 'Stats' );
define( '_AM_IMPRESSION_ICO_VIEW', 'View this item' );
define( '_AM_IMPRESSION_ICO_IGNORE', 'Ignore' );
define( '_AM_IMPRESSION_ICO_REJECTED', 'Rejected' );
define( '_AM_IMPRESSION_ICO_SUBMITTED', 'Submitted' );
define( '_AM_IMPRESSION_ICO_RES', 'Edit Resources/Articles for this Item' );
// Alternate category
define( '_AM_IMPRESSION_ALTCAT_CREATEF', 'Add alternate category' );
define( '_AM_IMPRESSION_MALTCAT', 'Alternate category management' );
define( '_AM_IMPRESSION_ALTCAT_MODIFYF', 'Alternate category information' );
define( '_AM_IMPRESSION_ALTCAT_INFOTEXT', 'Alternate categories can be added or removed easily via this form.' );
define( '_AM_IMPRESSION_ALTCAT_CREATED', 'Alternate categories was saved!' );

define( '_AM_IMPRESSION_PERM_AUTOPERMISSIONS', 'Auto approve articles' );
define( '_AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT', 'Select the groups that will have new articles auto approved without admin intervention.' );

define( '_AM_IMPRESSION_PERM_SPERMISSIONS', 'Submitter permissions' );
define( '_AM_IMPRESSION_PERM_SPERMISSIONS_TEXT', 'Select the groups who can submit new articles to selected categories.' );

define( '_AM_IMPRESSION_PERM_APERMISSIONS', 'Moderator groups' );
define( '_AM_IMPRESSION_PERM_APERMISSIONS_TEXT', 'Select the groups who have moderator privligages for the selected categories.' );

define( '_AM_IMPRESSION_TIME', 'Time:' );
define( '_AM_IMPRESSION_KEYWORDS', 'Keywords:' );
define( '_AM_IMPRESSION_KEYWORDS_NOTE', 'Keywords should be seperated with a comma <br />(<i>keyword1, keyword2, keyword3, etc.</i>)' );
define( '_AM_IMPRESSION_ARTICLE_META_DESCRIPTION', 'Meta description');
define( '_AM_IMPRESSION_ARTICLE_META_DESCRIPTION_DSC', 'In order to help Search Engines, you can customize the meta description you would like to use for this article. if you leave this field empty when creating a category, it will automatically be populated with the Summary field of this article.');

define('_AM_IMPRESSION_DATESUB_DSC', 'Select the date of publication');
define('_AM_IMPRESSION_DATESUB', 'Published date');
define('_AM_IMPRESSION_READS', 'Reads: ');

define( '_AM_IMPRESSION_PUBLISHED', 'Published' );
define( '_AM_IMPRESSION_OFFLINE', 'Offline' );
define( '_AM_IMPRESSION_REJECTED', 'Rejected' );
define( '_AM_IMPRESSION_SUBMITTED', 'Submitted' );
define( '_AM_IMPRESSION_INFOMATION', 'Information' );
define( '_AM_IMPRESSION_NOTPUBLiSHED', 'Not Published' );

define( '_AM_IMPRESSION_IPAGE_SHOWLATEST', 'Show Latest Listings?' );
define( '_AM_IMPRESSION_IPAGE_LATESTTOTAL', 'How many articles to show?' );
define( '_AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC', '0 Turns this option off.' );

define( '_AM_IMPRESSION_RSSFEED', 'RSS Feed' );
define( '_AM_IMPRESSION_RSSFEEDCFG', 'RSS Feed Configuration' );
define( '_AM_IMPRESSION_RSSFEEDDSC', 'Here you can configure the RSS feed for Impression.<br />For more information visit the <a href="http://www.rssboard.org/" target="_blank">RSS Advisory Board</a> website.' );
define( '_AM_IMPRESSION_RSSACTIVE', 'RSS feed activated' );
define( '_AM_IMPRESSION_RSSACTIVEDSC', 'Select <i>Yes</i> to turn RSS feed for Impression on, select <i>No</i> to turn it off.' );
define( '_AM_IMPRESSION_RSSTITLE', 'RSS feed title' );
define( '_AM_IMPRESSION_RSSTITLEDSC', 'The name of the channel. It\'s how people refer to your service. If you have a website that contains the same information as your RSS file, the title of your channel should be the same as the title of your website.' );
define( '_AM_IMPRESSION_RSSLINKS', 'RSS feed link' );
define( '_AM_IMPRESSION_RSSLINKSDSC', 'The URL to the website corresponding to the channel.' );
define( '_AM_IMPRESSION_RSSDESCRIPTION', 'RSS feed description' );
define( '_AM_IMPRESSION_RSSDESCRIPTIONDSC', 'Phrase or sentence describing the channel.' );
define( '_AM_IMPRESSION_RSSIMAGE', 'RSS feed image' );
define( '_AM_IMPRESSION_RSSIMAGEDSC', 'Specifies a GIF, JPEG or PNG image that can be displayed with the channel.' );
define( '_AM_IMPRESSION_RSSWIDTH', 'RSS feed image width' );
define( '_AM_IMPRESSION_RSSWIDTHDSC', 'Indicates the width of the image in pixels.<br />Maximum value for width is 144.' );
define( '_AM_IMPRESSION_RSSHEIGHT', 'RSS feed image height' );
define( '_AM_IMPRESSION_RSSHEIGHTDSC', 'Indicates the height of the image in pixels.<br />Maximum value for height is 400.' );
define( '_AM_IMPRESSION_RSSIMGTITLE', 'RSS feed image title' );
define( '_AM_IMPRESSION_RSSIMGTITLEDSC', 'Describes the image, it\'s used in the ALT attribute of the HTML img-tag when the channel is rendered in HTML.' );
define( '_AM_IMPRESSION_RSSIMGLINK', 'RSS feed image link' );
define( '_AM_IMPRESSION_RSSIMGLINKDSC', 'This is the URL of the site, when the channel is rendered, the image is a link to the site. (Note, in practice the image &#60;title&#62; and &#60;link&#62; should have the same value as the channel\'s &#60;title&#62; and &#60;link&#62;).' );
define( '_AM_IMPRESSION_RSSTTL', 'RSS feed ttl' );
define( '_AM_IMPRESSION_RSSTTLDSC', 'ttl stands for time to live. It\'s a number of minutes that indicates how long a channel can be cached before refreshing from the source.' );
define( '_AM_IMPRESSION_RSSWEBMASTER', 'RSS feed webmaster' );
define( '_AM_IMPRESSION_RSSWEBMASTERDSC', 'Email address for person responsible for technical issues relating to channel.' );
define( '_AM_IMPRESSION_RSSEDITOR', 'RSS feed channel editor' );
define( '_AM_IMPRESSION_RSSEDITORDSC', 'Email address for person responsible for editorial content.' );
define( '_AM_IMPRESSION_RSSCATEGORY', 'RSS feed category' );
define( '_AM_IMPRESSION_RSSCATEGORYDSC', 'Specify one or more categories that the channel belongs to. Follows the same rules as the &#60;item&#62;-level category element.' );
define( '_AM_IMPRESSION_RSSGENERATOR', 'RSS feed generator' );
define( '_AM_IMPRESSION_RSSGENERATORDSC', 'String indicating the program used to generate the channel.' );
define( '_AM_IMPRESSION_RSSCOPYRIGHT', 'RSS feed copyright' );
define( '_AM_IMPRESSION_RSSCOPYRIGHTDSC', 'Copyright notice for content in the channel.' );
define( '_AM_IMPRESSION_RSSTOTAL', 'RSS feed total articles' );
define( '_AM_IMPRESSION_RSSTOTALDSC', 'Give the total number of articles to display in RSS feed.' );
define( '_AM_IMPRESSION_RSSDBUPDATED', 'Database has been updated successfully' );
define( '_AM_IMPRESSION_RSSOFFLINE', 'RSS feed offline message title' );
define( '_AM_IMPRESSION_RSSOFFLINEDSC', 'Enter the title for the message when RSS feed is deactived.' );
define( '_AM_IMPRESSION_RSSOFFMSG', 'RSS feed offline message' );
define( '_AM_IMPRESSION_RSSOFFMSGDSC', 'Enter here an explanation for why the RSS feed has been deactivated.' );
define( '_AM_IMPRESSION_RSSOFFTITLE', 'RSS feed has been deactivated.' );
define( '_AM_IMPRESSION_RSSOFFMSGDEF', 'The RSS feed has been temporarily deactivated for maintenance.' );
define( '_AM_IMPRESSION_RSSCLICKSUBMIT', 'Please click Submit to store all form values in the database!' );
define( '_AM_IMPRESSION_COPYRIGHT', 'Copyright' );
define( '_AM_IMPRESSION_ICO_CLONE', 'Clone article' );
define( '_AM_IMPRESSION_CLONE', '**CLONE**' );
define( '_AM_IMPRESSION_CLONEARTICLE', 'Clone Article' );
define( '_AM_IMPRESSION_SHOWNOIMAGE' , 'Show no image' );
define( '_AM_IMPRESSION_NOSELECTION', 'No selection' );
define( '_AM_IMPRESSION_NOFILESELECT', 'No selected file' );
define( '_AM_IMPRESSION_PRUNE', 'Prune' );
define( '_AM_IMPRESSION_PRUNEINFO', 'Prune Information' );
define( '_AM_IMPRESSION_PRUNEWARN', 'This form gives you the opportunity to delete articles that are published before the selected date.<br />Also comments associated with these articles will be deleted.<br />Please note that this action <b>CANNOT</b> be undone. That\'s why it\'s advised to make a backup of your database first.' );
define( '_AM_IMPRESSION_PRUNEDELETED', 'Articles successfully removed from the database!' );
define( '_AM_IMPRESSION_PRUNEDATE', 'Select date:' );
define( '_AM_IMPRESSION_PRUNEDATEDSC', 'All articles before the selected date will be deleted.' );
define( '_AM_IMPRESSION_PRUNEFORM', 'Delete old articles' );
define( '_AM_IMPRESSION_NICEURL', 'Alternative title for url:' );
define( '_AM_IMPRESSION_NICEURLDSC', 'Enter an alternative title for the article to be used in the url. When the option <i>Use nice urls</i> from Preferences is selected and this field is left empty, than the title of the article will be used.' );
define( '_AM_IMPRESSION_ARTICLE_INBLOCKS', 'Display article in blocks?' );
define( '_AM_IMPRESSION_ARTICLE_INBLOCKS_DSC', 'Select <i>Yes</i> to have the article displayed in the Spotlight and Recent Headlines blocks. If you select <i>No</i> the article will not be displayed in the two blocks.' );
define( '_AM_IMPRESSION_MOD_INTROTEXT', 'Introduction text:' );

define( '_AM_IMPRESSION_CAT_INBLOCKS', 'Display category in blocks?' );
define( '_AM_IMPRESSION_CAT_INBLOCKS_DSC', 'Select <i>Yes</i> to have the category displayed in the Spotlight and Recent Headlines blocks. If you select <i>No</i> the category will not be displayed in the two blocks.' );
define( '_AM_IMPRESSION_ICO_INBLOCKN', 'Not displayed in blocks' );
define( '_AM_IMPRESSION_ICO_INBLOCKY', 'Displayed in blocks' );

// Version 1.11
define( '_AM_IMPRESSION_SOURCE', 'Source:' );
define( '_AM_IMPRESSION_SOURCEDSC', 'Enter the name of the source' );
define( '_AM_IMPRESSION_SOURCEURL', 'URL of source:' );
define( '_AM_IMPRESSION_SOURCEURLDSC', 'Enter URL of the source' );
define( '_AM_IMPRESSION_CHECKURL', 'Check URL' );
define( '_AM_IMPRESSION_MSG_OFFLINE', 'Article was set Offline successfully.' );
define( '_AM_IMPRESSION_MSG_ONLINE', 'Article was set Online successfully.' );

// Version 1.12
define( '_AM_IMPRESSION_SEARCHTITLE', 'Search title' );
define( '_AM_IMPRESSION_APPROVEDBY', 'Approved by:' );
?>