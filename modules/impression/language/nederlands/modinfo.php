<?php
/**
 * $Id: modinfo.php
 * Module: Impression
 * Language: Dutch (Nederlands)
 * Format: UTF-8 
 * Author: McDonald
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME", "Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC", "Een eenvoudige module om artikelen mee maken en te beheren.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT", "Spotlight");
define("_MI_IMPRESSION_BNEW", "Recente Titels");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1", "Zend een artikel in");
define("_MI_IMPRESSION_SMNAME2","Populair");
define("_MI_IMPRESSION_SMNAME3","Top Rated");
define("_MI_IMPRESSION_SMNAME4","Latest Listings");

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX", "Hoofd index");
define("_MI_IMPRESSION_INDEXPAGE", "Index Pagina Management");
define("_MI_IMPRESSION_MCATEGORY", "Categorie Management");
define("_MI_IMPRESSION_MARTICLES", "Artikel Management");
define("_MI_IMPRESSION_MUPLOADS", "Afbeeldingen Uploaden");
define("_MI_IMPRESSION_PERMISSIONS", "Rechten instellingen");
define("_MI_IMPRESSION_BLOCKADMIN", "Blok instellingen");

// Title of config items
define('_MI_IMPRESSION_POPULAR', 'Artikel populairiteit teller');
define('_MI_IMPRESSION_POPULARDSC', 'Het aantal keer dat een artikel gelezen dient te zijn alvorens het wordt gekenmerkt als populair.');

define("_MI_IMPRESSION_ICONDISPLAY", "Artikelen populair en nieuw:");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Selekteer hoe de populair en nieuw iconen worden getoond.");
define("_MI_IMPRESSION_DISPLAYICON1", "Toon als icoon");
define("_MI_IMPRESSION_DISPLAYICON2", "Toon als tekst");
define("_MI_IMPRESSION_DISPLAYICON3", "Niet tonen");

define("_MI_IMPRESSION_DAYSNEW", "Aantal dagen als nieuw tonen:");
define("_MI_IMPRESSION_DAYSNEWDSC", "Aantal dagen dat een artikel de status 'nieuw' heeft.");

define("_MI_IMPRESSION_DAYSUPDATED", "Aantal dagen als updated tonen:");
define("_MI_IMPRESSION_DAYSUPDATEDDSC", "Aantal dagen dat een artikel de status 'geupdate' heeft.");

define('_MI_IMPRESSION_PERPAGE', 'Aantal artikelen per pagina:');
define('_MI_IMPRESSION_PERPAGEDSC', 'Aantal artikelen dat getoond wordt in iedere categorie index.');

define("_MI_IMPRESSION_ADMINPAGE", "Aantal artikelen per adminstratie pagina:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Aantal artikelen dat getoond wordt in de module administratie.");

define("_MI_IMPRESSION_ARTICLESSORT", "Sorteer artikelen op:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Selekteer de standaard sorteer volgorde van de artikelen.");

define("_MI_IMPRESSION_SORTCATS", "Sorteer categorieën op:");
define("_MI_IMPRESSION_SORTCATSDSC", "Selekteer de standaard sorteer volgorde van de categorieën en sub-categorieën.");

define('_MI_IMPRESSION_SUBCATS', 'Sub-categorieën tonen:');
define('_MI_IMPRESSION_SUBCATSDSC', 'Selekteer Ja om sub-categorieën te tonen. Selekteer Nee om sub-categorieën te verbergen in de lijsten.');

define('_MI_IMPRESSION_EDITOR', "Te gebruiken editor [admin]:");
define('_MI_IMPRESSION_EDITORCHOICE', "Selekteer de te gebruiken editor voor gebruikers. Als u een eenvoudige installatie heeft (bijv. u gebruikt alleen de Xoops core editors), dan kunt u gewoon DHTML en Compact kiezen.");
define('_MI_IMPRESSION_EDITORUSER', "Te gebruiken editor [gebruiker]:");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "Selekteer de te gebruiken editor voor gebruikers. Als u een eenvoudige installatie heeft (bijv. u gebruikt alleen de Xoops core editors), dan kunt u gewoon DHTML en Compact kiezen.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extended");
define("_MI_IMPRESSION_FORM_COMPACT","Compact");
define("_MI_IMPRESSION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_IMPRESSION_FORM_FCK","FCK Editor");
define("_MI_IMPRESSION_FORM_KOIVI","Koivi Editor");
define("_MI_IMPRESSION_FORM_TINYEDITOR","TinyEditor");
define('_MI_IMPRESSION_FORM_TINYMCE','TinyMCE');

define('_MI_IMPRESSION_USESHOTS', 'Screenshots tonen?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Selekteer Ja om screenshots voor ieder artikel te tonen');

define('_MI_IMPRESSION_USETHUMBS', 'Gebruik thumbnails:');
define("_MI_IMPRESSION_USETHUMBSDSC", "Ondersteunde afbeeldingstypen: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression gebruikt thumbnails voor afbeeldingen. Selekteer 'Nee' om het orgineel te gebruiken, wanneer de server deze optie niet ondersteund.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "Update thumbnails?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Hoofd afbeeldingen map');

define('_MI_IMPRESSION_CATEGORYIMG','Categorie afbeeldingen map');

define('_MI_IMPRESSION_DATEFORMAT', 'Datum formaat:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Standaard datum formaat voor Impression.<br />Zie <a href="http://docs.php.net/manual/nl/function.date.php" target="_blank">PHP handleiding</a>');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Datum formaat administratie:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', 'Standaard datum formaat voor administratie van Impression.<br />Zie <a href="http://docs.php.net/manual/nl/function.date.php" target="_blank">PHP handleiding</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Stel aantal te gebruiken karakters voor de intro tekst?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Set total amount of characters for description on Index Page.");

define("_MI_IMPRESSION_OTHERARTICLES", "Laat andere artikelen zien van de inzender?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Selekteer Ja als andere artikelen van de inzender getoond mogen worden.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Toon aantal artikelen in categorieën lijst?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Selekteer Ja als het aantal artikelen per categorie getoond dient te worden.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Toon social bookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Selekteer Ja als Social Bookmark iconen getoond mogen worden onder een artikel.");

define("_MI_IMPRESSION_USEMETADESCR", "Genereer meta description:");
define("_MI_IMPRESSION_USEMETADSC", "Met deze optie wordt de meta description gebaseerd op de intro tekst van het artikel.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Toon disclaimer voordat gebruikers inzenden?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Toon de opgave richtlijnen voordat een gebruiker een artikel kan inzenden?');

define('_MI_IMPRESSION_DISCLAIMER', 'Voer de inzend disclaimer tekst in:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Toon disclaimer voordat gebruikers inzenden?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Toon de opgave richtlijnen voordat een gebruiker een artikel kan inzenden?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Voer de inzend disclaimer tekst in:');

define('_MI_IMPRESSION_COPYRIGHT', 'Copyright opmerking:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Selekteer Ja om een copyright opmerking te tonen op de artikel pagina.');

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

define("_MI_IMPRESSION_SUBMITART", "Artikel inzenden:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Selekteer groepen die nieuwe artikelen kunnen inzenden.");

define("_MI_IMPRESSION_QUALITY", "Thumb Nail Quality:");
define("_MI_IMPRESSION_QUALITYDSC", "Quality Lowest: 0 Highest: 100");
define("_MI_IMPRESSION_KEEPASPECT", "Keep Image Aspect Ratio?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Titel");
define("_MI_IMPRESSION_WEIGHT", "Gewicht");
define("_MI_IMPRESSION_POPULARITY", "Aantal keer gelezen");
define("_MI_IMPRESSION_SUBMITTED2", "Inzend datum");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Globaal');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'Globale artikel bericht opties.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Categorie');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Bericht opties van toepassing op de huidige categorie.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'Artikel');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Bericht opties van toepassing op het huidige artikel.');

define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nieuwe categorie');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Bericht me wanneer een nieuwe categorie is aangemaakt.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Ontvang een bericht wanneer een nieuwe categorie is aangemaakt.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nieuwe categorie');

define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'Artikel ingezonden');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Bericht me wanneer een nieuw artikel is ingezonden (wachtend op goedkeuring).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Ontvang een bericht wanneer een nieuw artikel is ingezonden (wachtend op goedkeuring).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nieuw artikel ingezonden');

define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'Nieuw artikel');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Bericht me wanneer een nieuw artikel is ingezonden.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Ontvang een bericht wanneer een nieuw artikel is ingezonden.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nieuw artikel');

define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'Artikel ingezonden');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Bericht me wanneer een nieuw artikel is ingezonden (wachtend op goedkeuring) in de huidige categorie.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Ontvang een bericht wanneer een nieuw artikel is ingezonden (wachtend op goedkeuring) in de huidige categorie.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nieuw artikel ingezonden in categorie');

define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'Nieuw artikel');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'Bericht me wanneer een nieuw artikel is in de huidige categorie.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Ontvang een bericht wanneer een nieuw artikel is in de huidige categorie.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nieuw artikel in categorie');

define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Artikel goedgekeurd');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'Bericht me wanneer dit artikel is goedgekeurd.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Ontvang een bericht wanneer dit artikel is goedgekeurd.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Artikel goedgekeurd');

define('_MI_IMPRESSION_AUTHOR_INFO', "Ontwikkelaar informatie");
define('_MI_IMPRESSION_AUTHOR_NAME', "Ontwikkelaar");
define('_MI_IMPRESSION_AUTHOR_DEVTEAM', "Ontwikkel team");
define('_MI_IMPRESSION_AUTHOR_WEBSITE', "Ontwikkelaar website");
define('_MI_IMPRESSION_AUTHOR_EMAIL', "Ontwikkelaar email");
define('_MI_IMPRESSION_AUTHOR_CREDITS', "Credits");
define('_MI_IMPRESSION_MODULE_INFO', "Module ontwikkeling informatie");
define('_MI_IMPRESSION_MODULE_STATUS', "Ontwikkelings status");
define('_MI_IMPRESSION_MODULE_DEMO', "Demo site");
define('_MI_IMPRESSION_MODULE_SUPPORT', "Officie&#0235;le support website");
define('_MI_IMPRESSION_MODULE_BUG', "Meldt een fout in deze module");
define('_MI_IMPRESSION_MODULE_FEATURE', "Suggesties voor nieuwe opties in deze module");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Disclaimer");
define('_MI_IMPRESSION_RELEASE', "Uitgebracht op: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Iconen door:");

define("_MI_IMPRESSION_HEADERPRINT","[PRINT OPTIES] Print pagina koptekst");
define("_MI_IMPRESSION_HEADERPRINTDSC","Koptekst die voor iedere link geprint wordt");
define("_MI_IMPRESSION_PRINTLOGOURL","[PRINT OPTIES] Logo print url");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url van het logo bovenaan de pagina geprint wordt");
define("_MI_IMPRESSION_FOOTERPRINT","[PRINT OPTIES] Print pagina voettekst");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Voettekst die voor iedere link geprint wordt");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Item voettekst");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Index voettekst");
define("_MI_IMPRESSION_BOTH_FOOTERS","Beide voettekst");
define("_MI_IMPRESSION_NO_FOOTERS","Geen");
define("_MI_IMPRESSION_ITEMFOOTER", "[CONTENT OPTIRS] Item voettekst");

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

define('_MI_IMPRESSION_AUTHOR_CREDITSTEXT',"WF-Projects Team. Gebaseerd op de modules WF-Links & MyTube.");
define('_MI_IMPRESSION_AUTHOR_BUGFIXES', "Changelog");

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "");

define("_MI_IMPRESSION_KEYLENGTH", "Voer het max. aantal karakters in voor meta keywords:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "Standaard is 255 karakters");
define("_MI_IMPRESSION_HEADLINES", "Aantal koppen" );
define("_MI_IMPRESSION_HEADLINESDSC", "Voer het aantal te tonen koppen in.");
define("_MI_IMPRESSION_BTAGCLOUD", "Impression Tag Cloud");
define("_MI_IMPRESSION_BTOPTAG", "Impression Top Tags");
define("_MI_IMPRESSION_LINKEDTERMS", "Link naar termen in woordenlijst?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "De module imGlossary dient hiervoor geinstalleerd en aktief te zijn." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Map naam van imGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "De naam van de map waarin imGlossary zich bevindt.<br />Standaard: <em>imglossary</em>" );
define( '_MI_IMPRESSION_FEEDSTOTALDSC', 'Dit aantal heeft alleen invloed op de ImpressCMS RSS feed. Standaard: <em>15</em>' );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - een kopie van de GNU licentie is bijgesloten (license.txt).' );
define( '_MI_IMPRESSION_RSSFEED', 'RSS Feed' );

define( '_MI_IMPRESSION_SHOWSUBMITTER', 'Laat naam inzender zien?' );
define( '_MI_IMPRESSION_SHOWSUBMITTERDSC', 'Kies <em>Ja</em> om de naam van de inzender boven de artikelen te laten zien.' );
define( '_MI_IMPRESSION_USERTAGDESCR', 'Gebruiker kan Tags invoeren?' );
define( '_MI_IMPRESSION_USERTAGDSC', 'Kies <em>Ja</em> als de gebruiker tags mag inzenden.' );
define( '_MI_IMPRESSION_NICEURL', 'Gebruik nette urls?' );
define( '_MI_IMPRESSION_NICEURLDSC', 'Gebruik nette urls voor artikelen.' );

// Impression 1.1.0
define( "_MI_IMPRESSION_CAPTCHA", "Gebruik captcha in het Inzend formulier?" );
define( "_MI_IMPRESSION_CAPTCHADSC", "Kies <em>Ja</em> om captcha in het Inzend formulier te gebruiken.<br />Standaard: <em>Ja</em>" );
define( '_MI_IMPRESSION_BYTESYN', 'Weergeven in voettekst:' );
define( '_MI_IMPRESSION_BYTESDESC', 'Geef extra informatie in de voettekst na <em>Lees meer</em>.' );
define( '_MI_IMPRESSION_BYTES', 'Bytes' );
define( '_MI_IMPRESSION_WORDS', 'Woorden' );
define( '_MI_IMPRESSION_CHARSF', 'Karakters' );
define( '_MI_IMPRESSION_BNEWS', 'Nieuws per categorie');
define( '_MI_IMPRESSION_TEXTWIDTH', 'Kies breedte van de titel vakken in de administratie:' );
define( '_MI_IMPRESSION_TEXTWIDTHDSC', 'Kies de breedte van de tekst vakken die o.a. gebruikt worden voor de titels in Inzend formulieren. Standaard is 128.' );

define( '_MI_IMPRESSION_SOCIALBTTNS', 'Show Social Media buttons' );
define( '_MI_IMPRESSION_SOCIALBTTNSDSC', 'Select if you want to have Social Bookmarks (old style), Social Media buttons or Social Media buttons with privacy switch (German only). If you select <i>Social Share Privacy</i> the type of button is not taken into account.' );
define( '_IM_IMPRESSION_SOCBOOK', 'Social Bookmarks' );
define( '_IM_IMPRESSION_SOCMEDIA', 'Social Media' );
define( '_IM_IMPRESSION_SOCMEDIAPRIVE', 'Social Share Privacy' );
define( '_MI_IMPRESSION_DEFAULT', 'Default' );
define( '_MI_IMPRESSION_HORICNT', 'Hor. counter' );
define( '_MI_IMPRESSION_VERTCNT', 'Vert. counter' );
define( '_MI_IMPRESSION_TWITTER', 'Twitter' );
define( '_MI_IMPRESSION_TWEET', 'Tweet' );
define( '_MI_IMPRESSION_TWITTERBTTN', 'Twitter button' );
define( '_MI_IMPRESSION_TWITTERBTTNDSC', 'Choose a Twitter button style.' );
define( '_MI_IMPRESSION_FACEBOOKBTTN', 'Facebook "I Like" button' );
define( '_MI_IMPRESSION_FACEBOOKBTTNDSC', 'Choose a Facebook button style.' );
define( '_MI_IMPRESSION_PLUSONEBTTN', 'Google +1 button' );
define( '_MI_IMPRESSION_PLUSONEBTTNDSC', 'Choose a Google +1 button style.' );
?>