<?php
/**
 * $Id: modinfo.php
 * Module: Impression
 * Language: German
 * Format: UTF-8 
 * Author: Author: Prickel + sato-san
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME","Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC","Ein einfaches Modul, um Artikel zu erstellen.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT","Spotlight");
define("_MI_IMPRESSION_BNEW","neuste Schlagzeilen");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1","reiche einen Artikel ein");
define("_MI_IMPRESSION_SMNAME2","populär");
define("_MI_IMPRESSION_SMNAME3","Top bewertet");
define("_MI_IMPRESSION_SMNAME4","letzte Beiträge");

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX","Hauptindex");
define("_MI_IMPRESSION_INDEXPAGE","Indexseitenverwaltung");
define("_MI_IMPRESSION_MCATEGORY","Kategorienverwaltung");
define("_MI_IMPRESSION_MARTICLES","Artikelverwaltung");
define("_MI_IMPRESSION_MUPLOADS","Bilderupload");
define("_MI_IMPRESSION_PERMISSIONS","Berechtigungseinstellungen");
define("_MI_IMPRESSION_BLOCKADMIN","Blockeinstellungen");

// Title of config items
define('_MI_IMPRESSION_POPULAR', 'Popularitätszähler für Beiträge');
define('_MI_IMPRESSION_POPULARDSC', 'die Anzahl an Hits, bevor der Status eines Beitrags als populär gewertet wird.');

define("_MI_IMPRESSION_ICONDISPLAY","neue und populäre Beiträge:");
define("_MI_IMPRESSION_DISPLAYICONDSC", "wähle aus, wie die Icons für neue und populäre Beiträge angezeigt werden sollen.");
define("_MI_IMPRESSION_DISPLAYICON1", "zeige als Icons");
define("_MI_IMPRESSION_DISPLAYICON2", "zeige als Text");
define("_MI_IMPRESSION_DISPLAYICON3", "nicht anzeigen");

define("_MI_IMPRESSION_DAYSNEW","Beitragstage neu:");
define("_MI_IMPRESSION_DAYSNEWDSC","die Anzahl der Tage, die ein Beitrag als neu gekennzeichnet werden soll.");

define("_MI_IMPRESSION_DAYSUPDATED","Beitragstage aktualisiert:");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","Anzahl der Tage, die den Beitragsstatus als 'upgedated' angezeigt wird.");

define('_MI_IMPRESSION_PERPAGE', 'Beitragszähler:');
define('_MI_IMPRESSION_PERPAGEDSC', 'Anzahl von Beiträgen, welche in jeder Kategorie angezeigt werden.');

define("_MI_IMPRESSION_ADMINPAGE", "Adminindex Beitragszähler:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Anzahl neuer Beiträge, welche im Backend des Moduls angezeigt werden.");

define("_MI_IMPRESSION_ARTICLESSORT", "vorgegebene Beitragsreihenfolge:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "wähle die Vorgabereihenfolge der Beitragsaufzählung.");

define("_MI_IMPRESSION_SORTCATS", "Sortiere Kategorien nach:");
define("_MI_IMPRESSION_SORTCATSDSC", "Wähle aus, wie Kategorien und Unterkategorien sortiert werden sollen.");

define('_MI_IMPRESSION_SUBCATS', 'Unterkategorien:');
define('_MI_IMPRESSION_SUBCATSDSC', 'Wähle "Ja", um Unterkategorien anzuzeigen. Wird "Nein" ausgewählt, werden die Unterkategortien in der Auflistung versteckt');

define('_MI_IMPRESSION_EDITOR', "Verwendeter Editor (Admin):");
define('_MI_IMPRESSION_EDITORCHOICE', "wählen Sie den Editor, welcher für die Administration verwendet wird. Wenn Sie eine 'einfache' Installation haben, (beispielsweise Sie verwenden lediglich die Standardeditoren von ImpressCMS, welche im ImpressCMS core Paket vorhanden sind), kann nur DHTML und Compact ausgewählt werden.");
define('_MI_IMPRESSION_EDITORUSER', "verwendeter Editor (Benutzer):");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "wählen Sie den Editor aus, welche die Benutzer verwenden. Wenn Sie eine 'einfache' Installation haben (beispielsweise Sie verwenden lediglich die Standardeditoren von ImpressCMS, welche im ImpressCMS core Paket vorhanden sind), kann nur DHTML und Compact ausgewählt werden.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extended");
define("_MI_IMPRESSION_FORM_COMPACT","Kompakt");
define("_MI_IMPRESSION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_IMPRESSION_FORM_FCK","FCK Editor");
define("_MI_IMPRESSION_FORM_KOIVI","Koivi Editor");
define("_MI_IMPRESSION_FORM_TINYEDITOR","TinyEditor");
define('_MI_IMPRESSION_FORM_TINYMCE',"TinyMCE");

define('_MI_IMPRESSION_USESHOTS', "zeige Screenshotbilder?");
define('_MI_IMPRESSION_USESHOTSDSC', "wählen Sie 'JA', um Screenshotbilder für jeden Beitrag anzuzeigen");

define('_MI_IMPRESSION_USETHUMBS', "Verwende Vorschaubilder:");
define("_MI_IMPRESSION_USETHUMBSDSC", "Unterstützte Bildtypen: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression verwendet Vorschaubilder für Bilder. Wähle 'Nein' um die Originalbilder zu verwenden, wenn der Server diese Option nicht unterstützt.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "aktualisiere Vorschaubilder?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "wenn ausgewählt, werden die Vorschaubilder aktualisiert bei jedem Seitenwechsel, ansonsten wird ungeachtet das erste Vorschaubild verwendet. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR',"Hauptbilderverzeichnis");

define('_MI_IMPRESSION_CATEGORYIMG',"Kategorie Bildhochladeverzeichnis");

define('_MI_IMPRESSION_DATEFORMAT', "Zeitstempel:");
define('_MI_IMPRESSION_DATEFORMATDSC', "vorgegebener Zeitstempel für Impression.<br />See <a href='http://jp.php.net/manual/en/function.date.php' target='_blank'>PHP Handbuch</a>");

define('_MI_IMPRESSION_DATEFORMATADMIN', "Zeitstempeladministration:");
define('_MI_IMPRESSION_DATEFORMATADMINDSC', "vorgegebener Admininstrationszeitstempel für Impression.<br />siehe auch <a href='http://jp.php.net/manual/en/function.date.php' target='_blank'>PHP Handbuch</a>");

define("_MI_IMPRESSION_TOTALCHARS", "angeben der Gesamtanzahl von Zeichen für die Beschreibung?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "geben Sie die Gesamtanzahl von Zeichen für die Beschreibung der Indexseite an.");

define("_MI_IMPRESSION_OTHERARTICLES", "anzeigen anderer Beiträge, welche durch den Beitragsersteller eingereicht wurden?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "wählen Sie 'Ja', wenn andere Beiträge des Beitragsersteller angezeigt werden sollen.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "anzeigen des Beitragszählers in der Kategorienliste?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "wählen Sie 'JA', wenn Sie möchten, das Summer der Artikel jeder Kategorie angezeigt werden soll.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Zeige Socialbookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "wählen Sie 'Ja', wenn Sie Socialbookmarkicons unter dem Artikel angezeigt bekommen möchten.");

define("_MI_IMPRESSION_USEMETADESCR", "erstelle Meta-Beschreibung:");
define("_MI_IMPRESSION_USEMETADSC", "Mit dieser Option, basiert die Metabeschreibung auf den Artikelintrotext.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'zeige Haftungsausschluss, bevor der User einreicht?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Bevor ein Benutzer einen Artikel einreichen kann, zeige die Eingangsregeln?');

define('_MI_IMPRESSION_DISCLAIMER', 'Enter Einreichung disclaimer text:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'zeige Haftungsausschluss, bevor Beitrag geöffnet wird?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Anzeigen lassen des Haftungsausschlusses, bevor ein Beitrag geöffnet wird?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Geben Sie den Text für den Haftungsausschluss ein:');

define('_MI_IMPRESSION_COPYRIGHT', 'Copyrighthinweis:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Auswählen, um einen Copyrighthinweis auf der Beitragsseite anzuzeigen.');

//define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
//define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Uploadgröße (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Maximal zulässige Beitragsgröße, um einen Beitrag hochzuladen.');
define('_MI_IMPRESSION_IMGWIDTH','Upload Bildbreite');
define('_MI_IMPRESSION_IMGWIDTHDSC','Maximal zulässige Bildbreite, wenn Beitragsbilder hochgeladen werden');
define('_MI_IMPRESSION_IMGHEIGHT','Upload Bildhöhe');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Maximal zulässige Bildhöhe, wenn Beitragsbilder hochgeladen werden');

define('_MI_IMPRESSION_UPLOADDIR','Uploadverzeichnis (ohne führenden Slash)');
define('_MI_IMPRESSION_ALLOWSUBMISS','Benutzerausführungen:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Erlaubt es Benutzern, neue Beiträge einzureichen');
define('_MI_IMPRESSION_ALLOWUPLOADS','Benutzeruploads:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','erlaubt Benutzern Beiträge direkt auf Ihre Webseite hochzuladen');
define('_MI_IMPRESSION_SCREENSHOTS','Verzeichnis, um Screenshots hochzuladen');

define("_MI_IMPRESSION_SUBMITART", "Beitragseinreichung:");
define("_MI_IMPRESSION_SUBMITARTDSC", "wählen die Gruppen, welche neue Beiträge einreichen kann.");

define("_MI_IMPRESSION_QUALITY", "Thumbnailqualität:");
define("_MI_IMPRESSION_QUALITYDSC", "geringste Qualität: 0, höchste: 100");
define("_MI_IMPRESSION_KEEPASPECT", "Wähle Bildauflösung?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Titel");
define("_MI_IMPRESSION_WEIGHT", "Gewichtung");
define("_MI_IMPRESSION_POPULARITY", "Gelesene");
define("_MI_IMPRESSION_SUBMITTED2", "Einreichungsdatum");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Global');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'globale Optionen für Beitragsbenachrichtigung.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Kategorie');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Benachrichtigungsoptionen, welche die aktuelle Beitragskategorie betreffen.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'Beitrag');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Benachrichtigungsoptionen, welche den aktuellen Beitrag betreffen.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'neue Kategorie');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Benachrichtigen Sie mich, wenn eine neue Beitragskategorie erstellt wurde.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Mitteilung erhalten, wenn eine neue Beitragskategorie erstellt wurde.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : Neue Beitragskategorie');

define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFY', 'Beitragsänderung angefordert');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYCAP', 'Benachrichtigen Sie mich über jede Beitragsänderungsaufforderung.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYDSC', 'Mitteilung erhalten, wenn eine Aufforderung zur Beitragsänderung eingereicht wurde.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : zur Beitragsänderung aufgefordert');

define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFY', 'unvollständiger Beitrag eingereicht');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYCAP', 'Benachrichtigen Sie mich über jeden unvollständigen Beitrag.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYDSC', 'Mitteilung erhalten, wenn ein unvollständiger Beitrag eingereicht wurde.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : unvollständiger ArtikelBroken Video Reported');

define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'eingereichtes Video');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Benachrichtigen Sie mich, wenn ein neues Video eingereicht wurde (Überprüfung abwartend).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Mitteilung erhalten, wenn ein Video eingereicht wurde (Überprüfung abwartend).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : neues Video eingereicht');

define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'Neues Video');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Benachrichtigen Sie mich, wenn ein neues Video gepostet wurde.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Mitteilung erhalten, wenn ein neues Video gepostet wurde.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : neues Video');

define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'eingereichtes Video');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'benachrichtigen Sie mich, wenn ein neues Video eingestellt wurde (Überprüfung abwartend) to the current category.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Mitteilung erhalten, wenn ein neues Video eingereicht wurde (Überprüfung abwartend) in der aktuellen Kategorie.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : neues Video eingereicht in der Kategorie');

define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'neues Video');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'benachrichtigen Sie mich, wenn ein neues Video in der aktuellen Kategorie eingestellt wurde.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Mitteilung erhalten, wenn ein neues Video in der aktuellen Kategorie geposted wurde.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : neues Video in der Kategorie');

define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Video geprüft');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'benachrichtigen Sie mich, wenn dieses Video überprüft wurde.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Mitteilung erhalten, wenn dieses Video überprüft wurde.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : Video überprüft');

define('_MI_IMPRESSION_AUTHOR_INFO', "Entwicklerinformation");
define('_MI_IMPRESSION_AUTHOR_NAME', "Entwickler");
define('_MI_IMPRESSION_AUTHOR_DEVTEAM', "Entwicklerteam");
define('_MI_IMPRESSION_AUTHOR_WEBSITE', "Webseite des Entwicklers");
define('_MI_IMPRESSION_AUTHOR_EMAIL', "Email des Entwicklers");
define('_MI_IMPRESSION_AUTHOR_CREDITS', "Credits");
define('_MI_IMPRESSION_MODULE_INFO', "Modulentwicklungsinformation");
define('_MI_IMPRESSION_MODULE_STATUS', "Entwicklerstatus");
define('_MI_IMPRESSION_MODULE_DEMO', "Demoseite");
define('_MI_IMPRESSION_MODULE_SUPPORT', "Offizielle Supportseite");
define('_MI_IMPRESSION_MODULE_BUG', "melden Sie, wenn Sie einen Fehler im Modul finden");
define('_MI_IMPRESSION_MODULE_FEATURE', "regen Sie neue Funktionen für dieses Modul an");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Haftungsausschluss");
define('_MI_IMPRESSION_RELEASE', "Releasedatum: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Icons von:");

define("_MI_IMPRESSION_HEADERPRINT","[Druckoptionen] Druckseitenkopf");
define("_MI_IMPRESSION_HEADERPRINTDSC","Kopftext, welcher auf jeden Beitrag gedruckt wird");
define("_MI_IMPRESSION_PRINTLOGOURL","[Druckoptionen] Logodruck-Url");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url des Logos, welches oben auf jeder Seite gedruckt wird");
define("_MI_IMPRESSION_FOOTERPRINT","[Druckoptionen] Druckseitenfuß");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Fußtext, welcher auf jeden Beitrag gedruckt wird");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Fußzeileneintrag");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Index Fußzeile");
define("_MI_IMPRESSION_BOTH_FOOTERS","Beide Fußzeilen");
define("_MI_IMPRESSION_NO_FOOTERS","Keine");
define("_MI_IMPRESSION_ITEMFOOTER", "[Druckoptionen] Fußzeileneintrag");

define('_MI_IMPRESSION_WARNINGTEXT', "Die Software wird durch MCDonald zur Verfügung gestellt \"wie sie ist\" und  \"mit allen Fehlern.\"
MCDonald übernimmt in keiner Form Haftung oder Garantie bezüglich der Qualität, Sicherheit oder Brauchbarkeit der Software - weder ausdrücklich noch impliziert.
Dies beinhaltet auch: 
ohne jegliche Befristung und Mängelgewährleistung, keine Bereitstellung für besondere Verwendungszwecke oder Beachtung der Verletzung von Rechten Dritter.

Weiterhin übernimmt MCDonalds in keiner Form die Haftung für den Wahrheitsgehalt, die Fehlerfreiheit oder die Vollständigkeit von jeglichen Angaben, Informationen oder Materialien
die Software in der MCDonalds Store Webseite betreffend. 
MCDonald ist in keiner Weise verantwortlich für jegliche indirekten, Schadenersatzrelevanten, speziellen, zufälligen oder
folgerechtlichen Schäden - unabhängig von der Art des jeweiligen Auftretens und auch unabhängig von einer vorherigen Inkenntnissetzung vom Auftreten solcher möglichen Schäden.");



define('_MI_IMPRESSION_AUTHOR_CREDITSTEXT',"WF-Projects Team. Basiert auf den Modulen WF-Links & MyTube, vielen Dank an das Dreamteam für einige Codeschnipsel.");
define('_MI_IMPRESSION_AUTHOR_BUGFIXES', "Bugfixhistorie");

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "");

define("_MI_IMPRESSION_KEYLENGTH", "Gebe max. Zeichenanzahl für Metaschlagwörter an:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "Vorgabe ist 255 Zeichen");
define("_MI_IMPRESSION_HEADLINES", "Schlagzeilen" );
define("_MI_IMPRESSION_HEADLINESDSC", "Geben sie die Anzahl der Schlagzeilen an, welche angezeigt werden sollen.");
define("_MI_IMPRESSION_BTAGCLOUD", "Impression Tagwolke");
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
define( "_MI_IMPRESSION_CAPTCHA", "Use captcha in submit form?" );
define( "_MI_IMPRESSION_CAPTCHADSC", "Select <em>Yes</em> to use captcha in the submit form.<br />Default: <em>Yes</em>" );
?>