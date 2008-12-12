<?php
/**
 * $Id: modinfo.php
 * Module: Impression
 * Language: Spanish
 * Format: UTF-8
 * Translator: debianus
 * Author: McDonald
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME","Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC","Un módulo sencillo para crear artículos.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT","Titulares");
define("_MI_IMPRESSION_BNEW","Titulares recientes");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1","Enviar un artículo");
define("_MI_IMPRESSION_SMNAME2","Popular");
define("_MI_IMPRESSION_SMNAME3","Mejor valorado");
define("_MI_IMPRESSION_SMNAME4","Últimos publicados");//Latest Listings

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX","Índice de la administración");
define("_MI_IMPRESSION_INDEXPAGE","Página principal");
define("_MI_IMPRESSION_MCATEGORY","Categorías");
define("_MI_IMPRESSION_MARTICLES","Artículos");
define("_MI_IMPRESSION_MUPLOADS","Imágenes");
define("_MI_IMPRESSION_PERMISSIONS","Permisos");
define("_MI_IMPRESSION_BLOCKADMIN","Bloques");

// Title of config items
define('_MI_IMPRESSION_POPULAR', 'Artículo popular');
define('_MI_IMPRESSION_POPULARDSC', 'Establezca el número de lecturas necesario para que un artículo sea considerado como popular.');

define("_MI_IMPRESSION_ICONDISPLAY","Artículos nuevos y con más lecturas:");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Seleccione como mostrar los iconos de artículo popular o nuevo en el listado de artículos.");
define("_MI_IMPRESSION_DISPLAYICON1", "Mostrar como iconos");
define("_MI_IMPRESSION_DISPLAYICON2", "Mostrar como texto");
define("_MI_IMPRESSION_DISPLAYICON3", "No mostrar");

define("_MI_IMPRESSION_DAYSNEW","Días para considerar un artículo como nuevo:");
define("_MI_IMPRESSION_DAYSNEWDSC","");

define("_MI_IMPRESSION_DAYSUPDATED","Días para considerar un artículo como actualizado:");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","Se contarán desde que el mismo fue actualizado.");

define('_MI_IMPRESSION_PERPAGE', 'Artículos a mostrar en cada categoría:');
define('_MI_IMPRESSION_PERPAGEDSC', 'Fije el número de artículos que se mostrarán en el listado de cada categoría.');

define("_MI_IMPRESSION_ADMINPAGE", "Artículos a mostrar en el área de administración:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Número de artículos que se mostrarán al administrador en el área de administración.");

define("_MI_IMPRESSION_ARTICLESSORT", "Orden predeterminado de los artículos:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Seleccione el orden predeterminado en el cual se mostrarán los listados de artículos.");

define("_MI_IMPRESSION_SORTCATS", "Ordenar categorías");
define("_MI_IMPRESSION_SORTCATSDSC", "Seleccione cómo las categorías y las subcategorías serán ordenadas.");

define('_MI_IMPRESSION_SUBCATS', 'Subcategorías:');
define('_MI_IMPRESSION_SUBCATSDSC', 'Seleccione Sí para mostrar las subcategorías. Si elige No, las mismas no serán mostradas en los listados de la categoría a la que pertenecen.');

define('_MI_IMPRESSION_EDITOR', "Editor a usar (admin):");
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
define('_MI_IMPRESSION_USESHOTSDSC', 'Select yes to display screenshot images for each artículo item');

define('_MI_IMPRESSION_USETHUMBS', 'Usar miniaturas:');
define("_MI_IMPRESSION_USETHUMBSDSC", "Supported image types: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression will use thumb nails for images. Set to 'No' to use orginal image if the server does not support this option.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "¿Actualizar miniaturas?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Main image directory');

define('_MI_IMPRESSION_CATEGORYIMG','Category image upload directory');

define('_MI_IMPRESSION_DATEFORMAT', 'Formato de fecha:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Formato de fecha predeterminado a usar en el módulo.<br />Lea el <a href="http://jp.php.net/manual/es/function.date.php" target="_blank">manual de PHP</a> para más información');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Administración del formato de fecha:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', ' Default admininstration timestamp for Impression.<br />See <a href="http://jp.php.net/manual/es/function.date.php" target="_blank">PHP manual</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Set total amount of characters for description?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Set total amount of characters for description on Index Page.");

define("_MI_IMPRESSION_OTHERARTICLES", "¿Mostrar otros artículos del mismo autor?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Seleccione Sí para mostrar los demás artículos del mismo autor.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Show artículo count in categoría list?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Select Yes if you want the amount of artículos per categoría have displayed.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Show social bookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Select Yes if you want Social Bookmark icons to be displayed under artículo.");

define("_MI_IMPRESSION_USEMETADESCR", "Generate meta description:");
define("_MI_IMPRESSION_USEMETADSC", "With this option the meta description will be based on the artículo introtext.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Mostrar la limitación de respondabilidad antes del envío del visitante o usuario?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Before a user can submit an artículo show the entry regulations?');

define('_MI_IMPRESSION_DISCLAIMER', 'Establezca el texto de la limitación de responsabilidad:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Show disclaimer before user artículo?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Show artículo regulations before open an artículo?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Enter artículo disclaimer text:');

define('_MI_IMPRESSION_COPYRIGHT', 'Copyright notice:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Select to display a copyright notice on artículo page.');

//define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
//define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Tamaño máximo Upload size (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Maximum artículo size permitted with artículo uploads.');
define('_MI_IMPRESSION_IMGWIDTH','Upload image width');
define('_MI_IMPRESSION_IMGWIDTHDSC','Maximum image width permitted when uploading image artículos');
define('_MI_IMPRESSION_IMGHEIGHT','Upload image height');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Maximum image height permitted when uploading image artículos');

define('_MI_IMPRESSION_UPLOADDIR','Upload directory (no trailing slash)');
define('_MI_IMPRESSION_ALLOWSUBMISS','User submissions:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Allow users to submit new artículos');
define('_MI_IMPRESSION_ALLOWUPLOADS','User uploads:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Allow users to upload artículos directly to your website');
define('_MI_IMPRESSION_SCREENSHOTS','Screenshots upload directory');

define("_MI_IMPRESSION_SUBMITART", "Envío de artículos:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Seleccione los grupos que podrán enviar nuevos artículos.");

define("_MI_IMPRESSION_QUALITY", "Thumb Nail Quality:");
define("_MI_IMPRESSION_QUALITYDSC", "Quality Lowest: 0 Highest: 100");
define("_MI_IMPRESSION_KEEPASPECT", "Keep Image Aspect Ratio?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Título");
define("_MI_IMPRESSION_WEIGHT", "Importancia");
define("_MI_IMPRESSION_POPULARITY", "Readings");
define("_MI_IMPRESSION_SUBMITTED2", "Fecha del envío");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Global');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'Global artículos notification options.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Category');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Notification options that apply to the current artículo categoría.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'artículo');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Notification options that apply to the current artículo.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nueva Category');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new artículo categoría is created.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a new artículo categoría is created.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificacióncle categoría');

define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFY', 'Modify artículo Requested');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYCAP', 'Notify me of any artículo modification request.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYDSC', 'Receive notification when any video modification request is submitted.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : artículo Modification Requested');

define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFY', 'Broken artículo Submitted');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYCAP', 'Notify me of any broken artículo report.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYDSC', 'Receive notification when any broken artículo report is submitted.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : Broken Video Reported');

define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'Video Submitted');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Notify me when any new video is submitted (awaiting approval).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Receive notification when any new video is submitted (awaiting approval).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : New video submitted');

define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'New Video');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Notify me when any new video is posted.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Receive notification when any new video is posted.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : New video');

define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'Video Submitted');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notify me when a new video is submitted (awaiting approval) to the current categoría.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new video is submitted (awaiting approval) to the current categoría.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : New video submitted in categoría');

define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'New Video');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'Notify me when a new video is posted to the current categoría.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Receive notification when a new video is posted to the current categoría.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : New video in categoría');

define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Video Approved');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'Notify me when this Video is approved.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Receive notification when this video is approved.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificación : Video Approved');

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

define("_MI_IMPRESSION_HEADERPRINT","[Opciones de impresión] header");
define("_MI_IMPRESSION_HEADERPRINTDSC","Header that will be printed for each artículo");
define("_MI_IMPRESSION_PRINTLOGOURL","[Opciones de impresión] Logo print url");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url of the logo that will be printed at the top of the page");
define("_MI_IMPRESSION_FOOTERPRINT","[Opciones de impresión] Print page footer");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Footer that will be printed for each artículo");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Item footer");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Index footer");
define("_MI_IMPRESSION_BOTH_FOOTERS","Both footers");
define("_MI_IMPRESSION_NO_FOOTERS","None");
define("_MI_IMPRESSION_ITEMFOOTER", "[Opciones de impresión] Item footer");

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

define("_MI_IMPRESSION_KEYLENGTH", "Máximo de caracteres para las palabras clave:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "predeterminado es 255 caracteres");
define("_MI_IMPRESSION_HEADLINES", "Titulares" );
define("_MI_IMPRESSION_HEADLINESDSC", "Establezca el número de titulares a mostrar.");
define("_MI_IMPRESSION_BTAGCLOUD", "Impression Tag Cloud");
define("_MI_IMPRESSION_BTOPTAG", "Impression Top Tags");
define("_MI_IMPRESSION_LINKEDTERMS", "Link to terms in glossary?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "The module imGlossary needs to be installed and active for this feature." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Folder name of imGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "The name of the folder where imGlossary is in.<br />Default: <em>imglossary</em>" );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - a copy of the GNU license is enclosed (license.txt).' );
define( "_MI_IMPRESSION_CAPTCHA", "¿Usar Captcha en el formulario de envío?" );
define( "_MI_IMPRESSION_CAPTCHADSC", "Seleccione <em>Sí</em> para usar Captcha en el mismo.<br /> Predeterminado: <em>Sí</em>" );
define( '_MI_IMPRESSION_RSSFEED', 'Orígen de RSS' );
?>