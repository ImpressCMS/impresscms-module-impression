<?php
/**
 * $Id: admin.php
 * Module: Impression
 * Language: english
 */

define( "_AM_IMPRESSION_WARNINSTALL1", "WARNING: Directory %s exists on your server. <br />Please remove this directory for security reasons." );
define( "_AM_IMPRESSION_WARNINSTALL2", "WARNING: File %s exists on your server. <br />Please remove this directory for security reasons." );
define( "_AM_IMPRESSION_WARNINSTALL3", "WARNING: Folder %s does not exists on your server. <br />This folder is required by Impression." );

define( "_AM_IMPRESSION_MODULE_NAME", "Impression" );

define( "_AM_IMPRESSION_BMODIFY", "Modify" );
define( "_AM_IMPRESSION_BDELETE", "Delete" );
define( "_AM_IMPRESSION_BCREATE", "Create" );
define( "_AM_IMPRESSION_BADD", "Add" );
define( "_AM_IMPRESSION_BAPPROVE", "Approve" );
define( "_AM_IMPRESSION_BIGNORE", "Ignore" );
define( "_AM_IMPRESSION_BCANCEL", "Cancel" );
define( "_AM_IMPRESSION_BSAVE", "Save" );
define( "_AM_IMPRESSION_BRESET", "Reset" );
define( "_AM_IMPRESSION_BMOVE", "Move Articles" );
define( "_AM_IMPRESSION_BUPLOAD", "Upload" );
define( "_AM_IMPRESSION_BDELETEIMAGE", "Delete Selected Image" );
define( "_AM_IMPRESSION_BRETURN", "Return to where you where!" );
define( "_AM_IMPRESSION_DBERROR", "Database Access Error" );

// Other Options
define( "_AM_IMPRESSION_TEXTOPTIONS", "Text Options:" );
define( "_AM_IMPRESSION_DISABLEHTML", " Disable HTML Tags" );
define( "_AM_IMPRESSION_DISABLESMILEY", " Disable Smilie Icons" );
define( "_AM_IMPRESSION_DISABLEXCODE", " Disable XOOPS Codes" );
define( "_AM_IMPRESSION_DISABLEIMAGES", " Disable Images" );
define( "_AM_IMPRESSION_DISABLEBREAK", " Use XOOPS linebreak conversion?" );
define( "_AM_IMPRESSION_UPLOADFILE", "Article Uploaded Successfully" );
define( "_AM_IMPRESSION_NOMENUITEMS", "No menu items within the menu" );

// Admin Bread crumb
define( "_AM_IMPRESSION_PREFS", "Preferences" );
define( "_AM_IMPRESSION_BUPDATE", "Module Update" );
define( "_AM_IMPRESSION_BINDEX", "Main Index" );
define( "_AM_IMPRESSION_BPERMISSIONS", "Permissions" );
// define( "_AM_IMPRESSION_BLOCKADMIN", "Blocks" );
define( "_AM_IMPRESSION_BLOCKADMIN", "Block Settings" );
define( "_AM_IMPRESSION_GOMODULE", "Go to module" );
define( "_AM_IMPRESSION_ABOUT", "About" );

// Admin Summary
define( "_AM_IMPRESSION_SCATEGORY", "Category: " );
define( "_AM_IMPRESSION_SFILES", "Articles: " );
define( "_AM_IMPRESSION_SNEWFILESVAL", "Submitted: " );
define( "_AM_IMPRESSION_SMODREQUEST", "Modified: " );
define( "_AM_IMPRESSION_SREVIEWS", "Reviews: " );

// Admin Main Menu
define( "_AM_IMPRESSION_MCATEGORY", "Category Management" );
define( "_AM_IMPRESSION_MARTICLES", "Article Management" );
define( "_AM_IMPRESSION_MLISTBROKEN", "List Broken Articles" );
define( "_AM_IMPRESSION_MLISTPINGTIMES", "List Links Pingtime" );
define( "_AM_IMPRESSION_INDEXPAGE", "Index Page Management" );
define( "_AM_IMPRESSION_MCOMMENTS", "Comments" );
define( "_AM_IMPRESSION_MVOTEDATA", "Vote Data" );
define( "_AM_IMPRESSION_MUPLOADS", "Image Upload" );

// Category defines
define( "_AM_IMPRESSION_CCATEGORY_CREATENEW", "Create New Category" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY", "Modify Category" );
define( "_AM_IMPRESSION_CCATEGORY_MOVE", "Move Category Articles" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_TITLE", "Category Title:" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILED", "Failed Moving Articles: Cannot move to this Category" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT", "Failed Moving Articles: Cannot find this Category" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_MOVED", "Articles Moved and Category Deleted" );
define( "_AM_IMPRESSION_CCATEGORY_CREATED", "New Category Created and Database Updated Successfully" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFIED", "Selected Category Modified and Database Updated Successfully" );
define( "_AM_IMPRESSION_CCATEGORY_DELETED", "Selected Category Deleted and Database Updated Successfully" );
define( "_AM_IMPRESSION_CCATEGORY_AREUSURE", "WARNING: Are you sure you want to delete this Category and ALL its Articles and Comments?" );
define( "_AM_IMPRESSION_CCATEGORY_NOEXISTS", "You must create a Category before you can add a new article" );
define( "_AM_IMPRESSION_FCATEGORY_GROUPPROMPT", "Category Access Permissions:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Select user groups who will have access to this Category.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_SUBGROUPPROMPT", "Category Submission Permissions:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Select user groups who will have permission to submit new articles to this Category.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_MODGROUPPROMPT", "Category Moderation Permissions:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Select user groups who will have permission to moderate this Category.</span></div>" );

define( "_AM_IMPRESSION_FCATEGORY_TITLE", "Category Title:" );
define( "_AM_IMPRESSION_FCATEGORY_WEIGHT", "Category Weight:" );
define( "_AM_IMPRESSION_FCATEGORY_SUBCATEGORY", "Set As Sub-Category:" );
define( "_AM_IMPRESSION_FCATEGORY_CIMAGE", "Select Category Image:" );
define( "_AM_IMPRESSION_FCATEGORY_DESCRIPTION", "Set Category Description:" );
define( "_AM_IMPRESSION_FCATEGORY_SUMMARY", "Set Category Summary:" );

// Index page Defines
define( "_AM_IMPRESSION_IPAGE_UPDATED", "Index Page Modified and Database Updated Successfully!" );
define( "_AM_IMPRESSION_IPAGE_INFORMATION", "Index Page Information" );
define( "_AM_IMPRESSION_IPAGE_MODIFY", "Modify Index Page" );
define( "_AM_IMPRESSION_IPAGE_CIMAGE", "Select Index Image:" );
define( "_AM_IMPRESSION_IPAGE_CTITLE", "Index Title:" );
define( "_AM_IMPRESSION_IPAGE_CHEADING", "Index Heading:" );
define( "_AM_IMPRESSION_IPAGE_CHEADINGA", "Index Heading Alignment:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTER", "Index Footer:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTERA", "Index Footer Alignment:" );
define( "_AM_IMPRESSION_IPAGE_CLEFT", "Align Left" );
define( "_AM_IMPRESSION_IPAGE_CCENTER", "Align Center" );
define( "_AM_IMPRESSION_IPAGE_CRIGHT", "Align Right" );

// Permissions defines
define( "_AM_IMPRESSION_PERM_MANAGEMENT", "Permissions Management" );
define( "_AM_IMPRESSION_PERM_PERMSNOTE", "<div><b>NOTE:</b> Please be aware that even if you&#8217ve set correct viewing permissions here, a group might not see the articles or blocks if you don&#8217t also grant that group permissions to access the module. To do that, go to <b>System admin > Groups</b>, choose the appropriate group and click the checkboxes to grant its members the access.</div>" );
define( "_AM_IMPRESSION_PERM_CPERMISSIONS", "Category Permissions" );
define( "_AM_IMPRESSION_PERM_CSELECTPERMISSIONS", "Select categories that each group is allowed to view" );
define( "_AM_IMPRESSION_PERM_CNOCATEGORY", "Cannot set permission's: No Categories's have been created yet!" );
define( "_AM_IMPRESSION_PERM_FPERMISSIONS", "Article Permissions" );
define( "_AM_IMPRESSION_PERM_FNOFILES", "Cannot set permission's: No articles have been created yet!" );
define( "_AM_IMPRESSION_PERM_FSELECTPERMISSIONS", "Select the articles that each group is allowed to view" );

// Upload defines
define( "_AM_IMPRESSION_ARTICLE_IMAGEUPLOAD", "Image successfully uploaded to server destination" );
define( "_AM_IMPRESSION_ARTICLE_NOIMAGEEXIST", "Error: No article was selected for uploading.  Please try again!" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEEXIST", "Image already exists in upload area!" );
define( "_AM_IMPRESSION_ARTICLE_FILEDELETED", "Article has been deleted." );
define( "_AM_IMPRESSION_ARTICLE_FILEERRORDELETE", "Error deleting Article: Article not found on server." );
define( "_AM_IMPRESSION_ARTICLE_NOFILEERROR", "Error deleting Article: No Article Selected For Deleting." );
define( "_AM_IMPRESSION_ARTICLE_DELETEFILE", "WARNING: Are you sure you want to delete this Image link?" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEINFO", "Server Status" );
define( "_AM_IMPRESSION_ARTICLE_SPHPINI", "<b>Information taken from PHP ini Link:</b>" );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODESTATUS", "Safe Mode Status: " );
define( "_AM_IMPRESSION_ARTICLE_REGISTERGLOBALS", "Register Globals: " );
define( "_AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS", "Server Uploads Status: " );
define( "_AM_IMPRESSION_ARTICLE_MAXUPLOADSIZE", "Max Upload Size Permitted: " );
define( "_AM_IMPRESSION_ARTICLE_MAXPOSTSIZE", "Max Post Size Permitted: " );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS", " (This May Cause Problems)" );
define( "_AM_IMPRESSION_ARTICLE_GDLIBSTATUS", "GD Library Support: " );
define( "_AM_IMPRESSION_ARTICLE_GDLIBVERSION", "GD Library Version: " );
define( "_AM_IMPRESSION_ARTICLE_GDON", "<b>Enabled</b> (Thumbs Nails Available)" );
define( "_AM_IMPRESSION_ARTICLE_GDOFF", "<b>Disabled</b> (No Thumb Nails Available)" );
define( "_AM_IMPRESSION_ARTICLE_OFF", "<b>OFF</b>" );
define( "_AM_IMPRESSION_ARTICLE_ON", "<b>ON</b>" );
define( "_AM_IMPRESSION_ARTICLE_CATIMAGE", "Category Images" );
define( "_AM_IMPRESSION_ARTICLE_SCREENSHOTS", "Screenshot Images" );
define( "_AM_IMPRESSION_ARTICLE_MAINIMAGEDIR", "Main images" );
define( "_AM_IMPRESSION_ARTICLE_FCATIMAGE", "Category Image Path" );
define( "_AM_IMPRESSION_ARTICLE_FSCREENSHOTS", "Screenshot Image Path" );
define( "_AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR", "Main image Path" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGETO", "Upload Image: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADPATH", "Upload Path: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADURL", "Upload URL: " );
define( "_AM_IMPRESSION_ARTICLE_FOLDERSELECTION", "Select Upload Destination:" );
define( "_AM_IMPRESSION_ARTICLE_FSHOWSELECTEDIMAGE", "Display Selected Image:" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGE", "Upload New Image to Selected Destination:" );

// Main Index defines
define( "_AM_IMPRESSION_MINDEX_ARTICLESUMMARY", "Module Admin Summary" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE", "Published Articles:" );
define( "_AM_IMPRESSION_MINDEX_AUTOPUBLISHEDARTICLE", "Auto Published Articles:" );
define( "_AM_IMPRESSION_MINDEX_AUTOEXPIRE", "Auto Expire Articles:" );
define( "_AM_IMPRESSION_MINDEX_EXPIRED", "Expired Articles:" );
define( "_AM_IMPRESSION_MINDEX_OFFLINEARTICLE", "Offline Articles:" );
define( "_AM_IMPRESSION_MINDEX_ID", "ID" );
define( "_AM_IMPRESSION_MINDEX_TITLE", "Article Title" );
define( "_AM_IMPRESSION_MINDEX_CATTITLE", "Category" );
define( "_AM_IMPRESSION_MINDEX_POSTER", "Poster" );
define( "_AM_IMPRESSION_MINDEX_ONLINE", "Status" );
define( "_AM_IMPRESSION_MINDEX_ONLINESTATUS", "Online Status" );
define( "_AM_IMPRESSION_MINDEX_PUBLISH", "Published" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHED", "Published" );
define( "_AM_IMPRESSION_MINDEX_EXPIRE", "Expired" );
define( "_AM_IMPRESSION_MINDEX_NOTSET", "Date Not Set" );
define( "_AM_IMPRESSION_MINDEX_SUBMITTED", "Date Submitted" );

define( "_AM_IMPRESSION_MINDEX_ACTION", "Action" );
define( "_AM_IMPRESSION_MINDEX_NOARTICLESFOUND", "NOTICE: There are no articles that match this criteria" );
define( "_AM_IMPRESSION_MINDEX_PAGE", "<b>Page:<b> " );
define( '_AM_IMPRESSION_MINDEX_PAGEINFOTXT', '<ul><li>Impressions main page details.</li><li>You can easily change the image logo, heading, main index header and footer text to suit your own look</li></ul><br />Note: The Logo image choosen will be used throughout Impression.' );
define( "_AM_IMPRESSION_MINDEX_RESPONSE", "Response Time" );

// Submitted Links
define( "_AM_IMPRESSION_SUB_SUBMITTEDFILES", "Submitted Articles" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGINFO", "Waiting Articles Information" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGVALIDATION", "Articles Waiting Validation: " );
define( "_AM_IMPRESSION_SUB_APPROVEWAITINGFILE", "<b>Approve</b> new article information without validation." );
define( "_AM_IMPRESSION_SUB_EDITWAITINGFILE", "<b>Edit</b> new article information and then approve." );
define( "_AM_IMPRESSION_SUB_DELETEWAITINGFILE", "<b>Delete</b> the new article information." );
define( "_AM_IMPRESSION_SUB_NOFILESWAITING", "There are no articles that match this critera" );
define( "_AM_IMPRESSION_SUB_NEWFILECREATED", "New Article Data Created and Database Updated Successfully" );
// Vote Information
define( "_AM_IMPRESSION_INFOMATION", "Information" );

// Modifications
define( "_AM_IMPRESSION_MOD_TOTMODREQUESTS", "Total Modification Requests: " );
define( "_AM_IMPRESSION_MOD_MODREQUESTS", "Modified Articles" );
define( "_AM_IMPRESSION_MOD_MODREQUESTSINFO", "Modified Articles Information" );
define( "_AM_IMPRESSION_MOD_MODID", "ID" );
define( "_AM_IMPRESSION_MOD_MODTITLE", "Title" );
define( "_AM_IMPRESSION_MOD_MODPOSTER", "Original Poster: " );
define( "_AM_IMPRESSION_MOD_DATE", "Submitted" );
define( "_AM_IMPRESSION_MOD_NOMODREQUEST", "There are no requests that match this critera" );
define( "_AM_IMPRESSION_MOD_TITLE", "article Title: " );
define( "_AM_IMPRESSION_MOD_AID", "article ID: " );
define( "_AM_IMPRESSION_MOD_CID", "Category: " );
define( "_AM_IMPRESSION_MOD_URL", "article Url: " );
define( "_AM_IMPRESSION_MOD_PUBLISHER", "Publisher: " );
define( "_AM_IMPRESSION_MOD_FORUMID", "Forum: " );
define( "_AM_IMPRESSION_MOD_SCREENSHOT", "Screenshot Image: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGE", "Home Page: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGETITLE", "Home Page Title: " );
define( "_AM_IMPRESSION_MOD_SHOTIMAGE", "Screenshot Image: " );
define( "_AM_IMPRESSION_MOD_DESCRIPTION", "Description: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMITTER", "Submitter: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMIT", "Submitter" );
define( "_AM_IMPRESSION_MOD_PROPOSED", "Proposed article Details" );
define( "_AM_IMPRESSION_MOD_ORIGINAL", "Orginal article Details" );
define( "_AM_IMPRESSION_MOD_REQDELETED", "Modification request removed from the database" );
define( "_AM_IMPRESSION_MOD_REQUPDATED", "Selected article Modified and Database Updated Successfully" );
define( '_AM_IMPRESSION_MOD_VIEW', 'View' );

// Article management
define( "_AM_IMPRESSION_ARTICLE_ID", "Article ID: " );
define( "_AM_IMPRESSION_ARTICLE_IP", "IP Address: " );
define( "_AM_IMPRESSION_ARTICLE_ALLOWEDAMIME", "<div style='padding-top: 4px; padding-bottom: 4px;'><b>Allowed Admin Article Extensions</b>:</div>" );
define( "_AM_IMPRESSION_ARTICLE_MODIFYFILE", "Modify Article Information" );
define( "_AM_IMPRESSION_ARTICLE_CREATENEWFILE", "Create New Article" );
define( "_AM_IMPRESSION_ARTICLE_TITLE", "<b>Title:</b>" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT", "<b>Article intro text:</b>" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION", "<b>Article main text:</b>" );
define( "_AM_IMPRESSION_ARTICLE_CATEGORY", "<b>Main category:</b>" );
//define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS", " Set article offline?<br /><br /><span style='font-weight: normal;'>article will not be viewable to all users.</span>" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS", "<b>Set article status:</b>" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC", "<small>Set article as published/offline/rejected</small>" );
define( "_AM_IMPRESSION_ARTICLE_SETASUPDATED", " Set article Status as Updated?<br /><br /><span style='font-weight: normal;'>article will Display updated icon.</span>" );
define( "_AM_IMPRESSION_ARTICLE_SHOTIMAGE", "Article Screenshot Image: " );
define( "_AM_IMPRESSION_ARTICLE_DISCUSSINFORUM", "Add Discuss in this Forum?" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATE", "Article Publish Date:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC", "<small>Select the date of publication</small>");
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATE", "Article Expire Date:" );
define( "_AM_IMPRESSION_ARTICLE_CLEARPUBLISHDATE", "<br /><br />Remove Publish date:" );
define( "_AM_IMPRESSION_ARTICLE_CLEAREXPIREDATE", "<br /><br />Remove Expire date:" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATESET", " Publish date set: " );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEPUBLISH", " Set the date/time of publish" );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEEXPIRE", " Set the date/time of expire" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE", "<b>Set publish date: </b>" );
define( "_AM_IMPRESSION_ARTICLE_SETNEWPUBLISHDATE", "<b>Set New Publish Date: </b><br />Published:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBDATESETS", "<b>Publish Date Set: </b><br />Publishes On Date:" );
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATESET", " Expire date set: " );
define( "_AM_IMPRESSION_ARTICLE_SETEXPIREDATE", "<b>Set Expire Date: </b>" );
define( "_AM_IMPRESSION_ARTICLE_DELEDITMESS", "Delete Broken Report?<br /><br /><span style='font-weight: normal;'>When you choose <b>YES</b> the Broken Report will automatically deleted and you confirm that the article now works again.</span>" );
define( "_AM_IMPRESSION_ARTICLE_MUSTBEVALID", "Screenshot image must be a valid image article under %s directory (ex. shot.gif). Leave it blank if there is no image link." );
define( "_AM_IMPRESSION_ARTICLE_EDITAPPROVE", "Approve article:" );
define( "_AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD", "New Article Created and Database Updated Successfully" );
define( "_AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE", "Selected Article Modified and Database Updated Successfully" );
define( "_AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS", "Really delete the selected article?" );
define( "_AM_IMPRESSION_ARTICLE_FILEWASDELETED", "Article %s successfully removed from the database!" );
define( "_AM_IMPRESSION_ARTICLE_FILEAPPROVED", "Article Approved and Database Updated Successfully" );
define( "_AM_IMPRESSION_ARTICLE_CREATENEWSSTORY", "<b>Create News Story From link</b>" );
define( "_AM_IMPRESSION_ARTICLE_SUBMITNEWS", "Submit New article as News item?" );
define( "_AM_IMPRESSION_ARTICLE_NEWSCATEGORY", "Select News Category to submit News:" );
define( "_AM_IMPRESSION_ARTICLE_NEWSTITLE", "News Title:<div style='padding-top: 4px; padding-bottom: 4px;'><span style='font-weight: normal;'>Leave Blank to use Article Title</span></div>" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHER", "<b>Publisher name:</b>" );

// Broken links defines
define( "_AM_IMPRESSION_SBROKENSUBMIT", "Broken: " );
define( "_AM_IMPRESSION_BROKEN_FILE", "Broken Reports" );
define( "_AM_IMPRESSION_BROKEN_FILEIGNORED", "Broken report ignored and successfully removed from the database!" );
define( "_AM_IMPRESSION_BROKEN_NOWACK", "Acknowledged status changed and database updated!" );
define( "_AM_IMPRESSION_BROKEN_NOWCON", "Confirmed status changed and database updated!" );
define( "_AM_IMPRESSION_BROKEN_REPORTINFO", "Broken Report Information" );
define( "_AM_IMPRESSION_BROKEN_REPORTSNO", "Broken Reports Waiting:" );
define( "_AM_IMPRESSION_BROKEN_IGNOREDESC", "<b>Ignores</b> the report and only deletes the broken article report." );
define( "_AM_IMPRESSION_BROKEN_DELETEDESC", "<b>Deletes</b> the reported link data and broken article reports for the link." );
define( "_AM_IMPRESSION_BROKEN_EDITDESC", "<b>Edit</b> the article to fix the problem." );
define( "_AM_IMPRESSION_BROKEN_ACKDESC", "<b>Acknowledged</b> Set Acknowledged state of broken file report." );
define( "_AM_IMPRESSION_BROKEN_CONFIRMDESC", "<b>Confirmed</b> Set confirmed state of broken article report." );
define( "_AM_IMPRESSION_BROKEN_ACKNOWLEDGED", "Acknowledged" );
define( "_AM_IMPRESSION_BROKEN_DCONFIRMED", "Confirmed" );
define( "_AM_IMPRESSION_BROKEN_ID", "ID" );
define( "_AM_IMPRESSION_BROKEN_TITLE", "Title" );
define( "_AM_IMPRESSION_BROKEN_REPORTER", "Reporter" );
define( "_AM_IMPRESSION_BROKEN_FILESUBMITTER", "Submitter" );
define( "_AM_IMPRESSION_BROKEN_DATESUBMITTED", "Submit Date" );
define( "_AM_IMPRESSION_BROKEN_ACTION", "Action" );
define( "_AM_IMPRESSION_BROKEN_NOFILEMATCH", "There are no Broken reports that match this critera" );
define( "_AM_IMPRESSION_BROKENFILEDELETED", "article removed from database and broken report removed" );

// About defines
define( "_AM_IMPRESSION_BY", "by" );

// block defines
define( "_AM_IMPRESSION_BADMIN", "Block Administration" );
define( "_AM_IMPRESSION_BLKDESC", "Description" );
define( "_AM_IMPRESSION_TITLE", "Title" );
define( "_AM_IMPRESSION_SIDE", "Alignment" );
define( "_AM_IMPRESSION_WEIGHT", "Weight" );
define( "_AM_IMPRESSION_VISIBLE", "Visible" );
define( "_AM_IMPRESSION_ACTION", "Action" );
define( "_AM_IMPRESSION_SBLEFT", "Left" );
define( "_AM_IMPRESSION_SBRIGHT", "Right" );
define( "_AM_IMPRESSION_CBLEFT", "Center Left" );
define( "_AM_IMPRESSION_CBRIGHT", "Center Right" );
define( "_AM_IMPRESSION_CBCENTER", "Center Middle" );
define( "_AM_IMPRESSION_ACTIVERIGHTS", "Active Rights" );
define( "_AM_IMPRESSION_ACCESSRIGHTS", "Access Rights" );

// image admin icon
define( "_AM_IMPRESSION_ICO_EDIT", "Edit This Item" );
define( "_AM_IMPRESSION_ICO_DELETE", "Delete This Item" );
define( "_AM_IMPRESSION_ICO_RESOURCE", "Edit This Resource" );
define( "_AM_IMPRESSION_ICO_ONLINE", "Published" );
define( "_AM_IMPRESSION_ICO_OFFLINE", "Offline" );
define( "_AM_IMPRESSION_ICO_APPROVED", "Approved" );
define( "_AM_IMPRESSION_ICO_NOTAPPROVED", "Not Approved" );
define( "_AM_IMPRESSION_ICO_ARTICLE", "Related article" );
define( "_AM_IMPRESSION_ICO_URL", "Add Related URL" );
define( "_AM_IMPRESSION_ICO_ADD", "Add" );
define( "_AM_IMPRESSION_ICO_APPROVE", "Approve" );
define( "_AM_IMPRESSION_ICO_STATS", "Stats" );
define( "_AM_IMPRESSION_ICO_VIEW", "View this item" );
define( "_AM_IMPRESSION_ICO_IGNORE", "Ignore" );
define( "_AM_IMPRESSION_ICO_REJECTED", "Rejected" );
define( "_AM_IMPRESSION_ICO_ACK", "Broken Report Acknowledged" );
define( "_AM_IMPRESSION_ICO_REPORT", "Acknowledge Broken Report?" );
define( "_AM_IMPRESSION_ICO_CONFIRM", "Broken Report Confirmed" );
define( "_AM_IMPRESSION_ICO_CONBROKEN", "Confirm Broken Report?" );
define( "_AM_IMPRESSION_ICO_RES", "Edit Resources/Articles for this Item" );
define( "_AM_IMPRESSION_MOD_URLRATING", "Interent Content Rating:" );

// Alternate category
define( "_AM_IMPRESSION_ALTCAT_CREATEF", "Add Alternate Category" );
define( "_AM_IMPRESSION_MALTCAT", "Alternate Category Management" );
define( "_AM_IMPRESSION_ALTCAT_MODIFYF", "Alternate Category Management" );
define( "_AM_IMPRESSION_ALTCAT_INFOTEXT", "<ul><li>Alternate categories can be added or removed easily via this form.</li></ul>" );
define( '_AM_IMPRESSION_ALTCAT_CREATED', 'Alternate categories was saved!' );

// Permissions
define( "_AM_IMPRESSION_PERM_RATEPERMISSIONS", "Rate Permissions" );
define( "_AM_IMPRESSION_PERM_RATEPERMISSIONS_TEXT", "Select the groups that can rate a article in the selected categories." );

define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS", "Auto Approve Articles" );
define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT", "Select the groups that will have new articles auto approved without admin intervention." );

define( "_AM_IMPRESSION_PERM_SPERMISSIONS", "Submitter Permissions" );
define( "_AM_IMPRESSION_PERM_SPERMISSIONS_TEXT", "Select the groups who can submit new articles to selected categories." );

define( "_AM_IMPRESSION_PERM_APERMISSIONS", "Moderator Groups" );
define( "_AM_IMPRESSION_PERM_APERMISSIONS_TEXT", "Select the groups who have moderator privligages for the selected categories." );

define( "_AM_IMPRESSION_TIME", "Time:" );
define( "_AM_IMPRESSION_KEYWORDS", "<b>Keywords:</b>" );
define( "_AM_IMPRESSION_KEYWORDS_NOTE", "<i>Keywords should be seperated with a comma <br />(keyword1, keyword2, keyword3)</i>" );
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION", "Meta Description");
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION_DSC", "In order to help Search Engines, you can customize the meta description you would like to use for this article. if you leave this field empty when creating a category, it will automatically be populated with the Summary field of this article.");

//Import
define("_AM_IMPRESSION_IMPORT", "Import");
define("_AM_IMPRESSION_IMPORTED_COMMENT", "Comment '%s' imported.");
define("_AM_IMPRESSION_IMPORTED_COMMENT_ERROR", "Error while importing comment '%s'");
define("_AM_IMPRESSION_IMPORT_COMMENTS", "Importing comments of the module");
define("_AM_IMPRESSION_IMPORT_ALL_PARTNERS", "All articles");
define("_AM_IMPRESSION_IMPORTED_ARTICLE_FILE", "Linked file %s was imported");
define("_AM_IMPRESSION_IMPORT_ARTICLE_ERROR", "Error while importing article <em>%s</em>");
define("_AM_IMPRESSION_IMPORT_ARTICLE_WRAP", "The pagewraped file %s has been copied in the module's content folder.");
define("_AM_IMPRESSION_IMPORT_AUTOAPPROVE", "Auto-approve");
define("_AM_IMPRESSION_IMPORT_BACK", "Back to the import page");
define("_AM_IMPRESSION_IMPORT_CATEGORIES", "Categories to be imported");
define("_AM_IMPRESSION_IMPORT_CATEGORIES_DSC", "Here are the categories that will be imported in SmartSection");
define("_AM_IMPRESSION_IMPORT_CATEGORY_ERROR", "Error while importing category <em>%s</em>.");
define("_AM_IMPRESSION_IMPORT_CATEGORY_SUCCESS", "Category <em>%s</em> imported successfully.");
define("_AM_IMPRESSION_IMPORT_ERROR", "An error occured while importing the article.");
define("_AM_IMPRESSION_IMPORT_FILE_NOT_FOUND", "Import file not found at <b>%s</b>");
define("_AM_IMPRESSION_IMPORT_FROM", "Importing from %s");
define("_AM_IMPRESSION_IMPORT_GOTOMODULE", "Go SmartSection's index page");
define("_AM_IMPRESSION_IMPORT_INFO", "You can import articles directly in SmartSection. Simply select from which module you would like to import the articles and click on the 'Import' button.<br><b>Run this operation only once, otherwise, the articles will be dupplicated</b>");
define("_AM_IMPRESSION_IMPORT_MODULE_FOUND", "%s module was found. There are %s articles and %s categories that can be imported.");
define("_AM_IMPRESSION_IMPORT_MODULE_FOUND_NO_ITEMS", "%s module was found but there are no article to import.");
define("_AM_IMPRESSION_IMPORT_NOCATSELECTED", "No category was selected for import.");
define("_AM_IMPRESSION_IMPORT_NO_MODULE", "As no other supported article module are installed on this site, no article can be imported.");
define("_AM_IMPRESSION_IMPORT_PARENT_CATEGORY", "Parent category");
define("_AM_IMPRESSION_IMPORT_PARENT_CATEGORY_DSC", "Import selected categories in this parent category.");
define("_AM_IMPRESSION_IMPORT_PARTNER_ERROR", "An error occured while importing '%s'.");
define("_AM_IMPRESSION_IMPORT_RESULT", "Here is the result of the import.");
define("_AM_IMPRESSION_IMPORT_SETTINGS", "Import Settings");
define("_AM_IMPRESSION_IMPORT_SUCCESS", "The articles were successfully imported in the module.");
define("_AM_IMPRESSION_IMPORT_TITLE", "Import Articles");
define("_AM_IMPRESSION_IMPORTED_ARTICLE", "Imported article : <em>%s</em>");
define("_AM_IMPRESSION_IMPORTED_ARTICLES", "Articles imported : <em>%s</em>");
define("_AM_IMPRESSION_IMPORTED_CATEGORY", "Imported category : <em>%s</em>");
define("_AM_IMPRESSION_IMPORTED_CATEGORIES", "Categories imported : <em>%s</em>");
define("_AM_IMPRESSION_IMPORT_SELECTION", "Import Selection");
define("_AM_IMPRESSION_IMPORT_SELECT_FILE", "Articles");
define("_AM_IMPRESSION_IMPORT_SELECT_FILE_DSC", "Choose the module from which to import the articles.");
define("_AM_IMPRESSION_DATESUB_DSC", "Select the date of publication");
define("_AM_IMPRESSION_DATESUB", "Published date");
define("_AM_IMPRESSION_READS", "Reads: ");
?>