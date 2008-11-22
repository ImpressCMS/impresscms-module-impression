<?php
/**
 * $Id: admin.php
 * Module: Impression
 * Language: German
 * Format: UTF-8
 * Author: Prickel + sato-san
 */

define( "_AM_IMPRESSION_WARNINSTALL1", "WARNING: Verzeichnis %s ist auf Ihrem Server vorhanden. <br />Bitte entfernen Sie dieses Verzeichnis aus Sicherheitsgründen." );
define( "_AM_IMPRESSION_WARNINSTALL2", "WARNING: Datei %s ist auf Ihrem Server vorhanden. <br />Bitte entfernen Sie diese Datei aus Sicherheitsgründen." );
define( "_AM_IMPRESSION_WARNINSTALL3", "WARNING: Verzeichnis %s ist auf Ihrem Server nicht vorhanden. <br />Dieses Verzeichnis wird von 'Impression' benötigt." );

define( "_AM_IMPRESSION_MODULE_NAME", "Impression" );

define( "_AM_IMPRESSION_BMODIFY", "ändern" );
define( "_AM_IMPRESSION_BDELETE", "löschen" );
define( "_AM_IMPRESSION_BCREATE", "erstellen" );
define( "_AM_IMPRESSION_BADD", "hinzufügen" );
define( "_AM_IMPRESSION_BAPPROVE", "prüfen" );
define( "_AM_IMPRESSION_BIGNORE", "ignorieren" );
define( "_AM_IMPRESSION_BCANCEL", "abbrechen" );
define( "_AM_IMPRESSION_BSAVE", "speichern" );
define( "_AM_IMPRESSION_BRESET", "zurücksetzen" );
define( "_AM_IMPRESSION_BMOVE", "Beitrag verschieben" );
define( "_AM_IMPRESSION_BUPLOAD", "hochladen" );
define( "_AM_IMPRESSION_BDELETEIMAGE", "lösche ausgewähltes Bild" );
define( "_AM_IMPRESSION_BRETURN", "kehren Sie wieder zurück!" );
define( "_AM_IMPRESSION_DBERROR", "Datenbankzugriffsfehler" );
// Other Options
define( "_AM_IMPRESSION_TEXTOPTIONS", "Textoptionen:" );
define( "_AM_IMPRESSION_DISABLEHTML", " deaktiviere HTML-Tags" );
define( "_AM_IMPRESSION_DISABLESMILEY", " deaktiviere Smilieicons" );
define( "_AM_IMPRESSION_DISABLEXCODE", " deaktiviere ImpressCMS-Code" );
define( "_AM_IMPRESSION_DISABLEIMAGES", " deaktiviere Bilder" );
define( "_AM_IMPRESSION_DISABLEBREAK", " benutze ImpressCMS-Absatzumwandlung?" );
define( "_AM_IMPRESSION_UPLOADFILE", "Beitrag erfolgreich hochgeladen" );
define( "_AM_IMPRESSION_NOMENUITEMS", "keine Menüeinträge im Menü vorhanden" );
// Admin Bread crumb
define( "_AM_IMPRESSION_PREFS", "Einstellungen" );
define( "_AM_IMPRESSION_BUPDATE", "Modulupdate" );
define( "_AM_IMPRESSION_BINDEX", "Hauptindex" );
define( "_AM_IMPRESSION_BPERMISSIONS", "Berechtigungen" );
define( "_AM_IMPRESSION_BLOCKADMIN", "Blockeinstellungen" );
define( "_AM_IMPRESSION_GOMODULE", "gehe zu Modul" );
define( "_AM_IMPRESSION_ABOUT", "über" );
// Admin Summary
define( "_AM_IMPRESSION_SCATEGORY", "Kategorien: " );
define( "_AM_IMPRESSION_SFILES", "Beitrag: " );
define( "_AM_IMPRESSION_SNEWFILESVAL", "eingereicht: " );
define( "_AM_IMPRESSION_SMODREQUEST", "geändert: " );
define( "_AM_IMPRESSION_SREVIEWS", "Vorschau: " );
// Admin Main Menu
define( "_AM_IMPRESSION_MCATEGORY", "Kategorienverwaltung");
define( "_AM_IMPRESSION_MARTICLES", "Beitragsverwaltung" );
define( "_AM_IMPRESSION_INDEXPAGE", "Indexseitenverwaltung" );
define( "_AM_IMPRESSION_MUPLOADS", "Bilderupload" );
// Catgeory defines
define( "_AM_IMPRESSION_CCATEGORY_CREATENEW", "erstelle neue Kategorie" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY", "Kategorie ändern" );
define( "_AM_IMPRESSION_CCATEGORY_MOVE", "verschiebe Kategorienbeitrag" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_TITLE", "Kategorientitel:" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILED", "Fehler beim Verschieben des Beitrags: kann diese Kategorie nicht verschieben" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT", "Fehler beim Verschieben des Beitrags: kann diese Kategorie nicht finden" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_MOVED", "Beitrag verschoben" );
define( "_AM_IMPRESSION_CCATEGORY_CREATED", "neue Kategorie erstellt und Datenbank erfolgreich aktualisiert" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFIED", "ausgewählte Kategorie geändert und Datenbank erfolgreich aktualisiert" );
define( "_AM_IMPRESSION_CCATEGORY_DELETED", "ausgewählte Kategorie gelöscht und Datenbank erfolgreich aktualisiert" );
define( "_AM_IMPRESSION_CCATEGORY_AREUSURE", "WARNUNG: sind Sie sicher, diese Kategorie mit all ihren Beiträgen und Kommentaren löschen zu wollen?" );
define( "_AM_IMPRESSION_CCATEGORY_NOEXISTS", "Sie müssen eine Kategorie erstellen, bevor Sie einen neuen Beitrag hinzufügen können" );
define( "_AM_IMPRESSION_FCATEGORY_GROUPPROMPT", "Kategorienzugriffsberechtigung:<div style='padding-top: 8px;'><span style='font-weight: normal;'>wählen Sie die Gruppen, welche Zugriff auf diese Kategorie haben soll.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_SUBGROUPPROMPT", "Kategorieneinreichungsberechtigungen:<div style='padding-top: 8px;'><span style='font-weight: normal;'>wählen Sie die Benutzergruppe, welche die Berechtigung hat, Beiträge zu moderieren.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_MODGROUPPROMPT", "Kategorienmoderationsberechtigung:<div style='padding-top: 8px;'><span style='font-weight: normal;'>wählen Sie die Benutzergruppe, welche die Berechtigung hat, diese Kategorie zu moderieren.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_TITLE", "Kategorientitel:" );
define( "_AM_IMPRESSION_FCATEGORY_WEIGHT", "Kategoriengewichtung:" );
define( "_AM_IMPRESSION_FCATEGORY_SUBCATEGORY", "wählen Sie die Unterkategorie:" );
define( "_AM_IMPRESSION_FCATEGORY_CIMAGE", "wählen Sie das Kategorienbild:" );
define( "_AM_IMPRESSION_FCATEGORY_DESCRIPTION", "wählen Sie die Kategorienbeschreibung:" );
define( "_AM_IMPRESSION_FCATEGORY_SUMMARY", "wählen Sie die Kategorienzusammenfassung:" );
// Index page Defines
define( "_AM_IMPRESSION_IPAGE_UPDATED", "Indexseite geändert und Datenbank erfolgreich aktualisiert!" );
define( "_AM_IMPRESSION_IPAGE_INFORMATION", "Indexseiteninformation" );
define( "_AM_IMPRESSION_IPAGE_MODIFY", "ändern Sie die Indexseite" );
define( "_AM_IMPRESSION_IPAGE_CIMAGE", "wählen Die das Indexbild aus:" );
define( "_AM_IMPRESSION_IPAGE_CTITLE", "Indextitel:" );
define( "_AM_IMPRESSION_IPAGE_CHEADING", "Indexkopf:" );
define( "_AM_IMPRESSION_IPAGE_CHEADINGA", "Indexkopfausrichtung:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTER", "Indexfuß:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTERA", "Indexfußausrichtung:" );
define( "_AM_IMPRESSION_IPAGE_CLEFT", "links ausrichten" );
define( "_AM_IMPRESSION_IPAGE_CCENTER", "zentriert ausrichten" );
define( "_AM_IMPRESSION_IPAGE_CRIGHT", "rechts ausrichten" );
// Permissions defines
define( "_AM_IMPRESSION_PERM_MANAGEMENT", "Berechtigungsverwaltung" );
define( "_AM_IMPRESSION_PERM_PERMSNOTE", "<div><b>NOTE:</b> Seien Sie sich der Tatsache bewußt, wenn Sie hier die korrekten Ansichtsberechtigungen gesetzt haben, eine Gruppe die Artikel oder den Block sehen können, wenn Sie nicht ebenso die Gruppenberechtigungen für den Zugriff des Moduls gesetzt haben. Um dies zu tun, gehen Sie zu <b>System admin > Gruppen</b>, wählen die entsprechende Gruppe und klicken die Auswahlkästchens, um ihren Mitgliedern den Zugriff zu ermöglichen.</div>" );
define( "_AM_IMPRESSION_PERM_CPERMISSIONS", "Kategorienberechtigungen" );
define( "_AM_IMPRESSION_PERM_CSELECTPERMISSIONS", "wählen Sie die Kategorien, welche es jeder Gruppe erlaubt, diese anzuschauen" );
define( "_AM_IMPRESSION_PERM_CNOCATEGORY", "kann keine Berechtigungen setzen: Es wurden keine Kategorien erstellt!" );
define( "_AM_IMPRESSION_PERM_FPERMISSIONS", "Beitragsberechtigungen" );
define( "_AM_IMPRESSION_PERM_FNOFILES", "kann keine Berechtigungen setzen: es wurden keine Beiträge erstellt!" );
define( "_AM_IMPRESSION_PERM_FSELECTPERMISSIONS", "wähle die Beiträge, welche jede Gruppe sehen darf" );
// Upload defines
define( "_AM_IMPRESSION_ARTICLE_IMAGEUPLOAD", "Bild erfolgreich hochgeladen zum Serverziel" );
define( "_AM_IMPRESSION_ARTICLE_NOIMAGEEXIST", "Fehler: es wurde kein Beitrag ausgewählt zum Hochladen. Bitte versuchen Sie es erneut!" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEEXIST", "Bild ist bereits im Bilderpfad vorhanden!" );
define( "_AM_IMPRESSION_ARTICLE_FILEDELETED", "der Beitrag wurde gelöscht." );
define( "_AM_IMPRESSION_ARTICLE_FILEERRORDELETE", "Fehler beim Löschen des Beitrags: der Beitrag wurde nicht auf dem Server gefunden." );
define( "_AM_IMPRESSION_ARTICLE_NOFILEERROR", "Fehler beim Löschen des Beitrags: kein Beitrag zum Löschen ausgewählt." );
define( "_AM_IMPRESSION_ARTICLE_DELETEFILE", "WARNUNG: Sind Sie sicher, das Sie den Bilderlink löschen möchten?" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEINFO", "Serverstatus" );
define( "_AM_IMPRESSION_ARTICLE_SPHPINI", "<b>Information der php.ini entnommen:</b>" );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODESTATUS", "Safe Mode Status: " );
define( "_AM_IMPRESSION_ARTICLE_REGISTERGLOBALS", "Register Globals: " );
define( "_AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS", "Server Uploads Status: " );
define( "_AM_IMPRESSION_ARTICLE_MAXUPLOADSIZE", "maximal erlaubte Größe zum Hochladen: " );
define( "_AM_IMPRESSION_ARTICLE_MAXPOSTSIZE", "maximal erlaubte Beitragsgröße: " );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS", " (dies könnte Probleme verursachen)" );
define( "_AM_IMPRESSION_ARTICLE_GDLIBSTATUS", "GD Library Support: " );
define( "_AM_IMPRESSION_ARTICLE_GDLIBVERSION", "GD Library Version: " );
define( "_AM_IMPRESSION_ARTICLE_GDON", "<b>aktiviert</b> (Vorschaubilder verfügbar)" );
define( "_AM_IMPRESSION_ARTICLE_GDOFF", "<b>deaktiviert</b> (keine Vorschaubilder verfügbar)" );
define( "_AM_IMPRESSION_ARTICLE_OFF", "<b>AUS</b>" );
define( "_AM_IMPRESSION_ARTICLE_ON", "<b>AN</b>" );
define( "_AM_IMPRESSION_ARTICLE_CATIMAGE", "Kategorie Bilder" );
define( "_AM_IMPRESSION_ARTICLE_SCREENSHOTS", "Screenshotbilder" );
define( "_AM_IMPRESSION_ARTICLE_MAINIMAGEDIR", "Hauptbilder" );
define( "_AM_IMPRESSION_ARTICLE_FCATIMAGE", "Kategorie Bilderpfad" );
define( "_AM_IMPRESSION_ARTICLE_FSCREENSHOTS", "Screenshotbilderpfad" );
define( "_AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR", "Hauptbilderpfad" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGETO", "Bild hochladen: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADPATH", "Uploadpfad: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADURL", "Upload URL: " );
define( "_AM_IMPRESSION_ARTICLE_FOLDERSELECTION", "wählen Sie das Ziel zum Hochladen:" );
define( "_AM_IMPRESSION_ARTICLE_FSHOWSELECTEDIMAGE", "zeige ausgewähltes Bild:" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGE", "lade neues Bild zum ausgewählten Ziel:" );
// Main Index defines
define( "_AM_IMPRESSION_MINDEX_ARTICLESUMMARY", "Admin Modulzusammenfassung" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE", "veröffentlichte Beiträge:" );
define( "_AM_IMPRESSION_MINDEX_AUTOPUBLISHEDARTICLE", "automatisch veröffentlichte Beiträge:" );
define( "_AM_IMPRESSION_MINDEX_AUTOEXPIRE", "automatisch abgelaufene Beiträge:" );
define( "_AM_IMPRESSION_MINDEX_EXPIRED", "abgelaufene Beiträge:" );
define( "_AM_IMPRESSION_MINDEX_OFFLINEARTICLE", "Offlinebeiträge:" );
define( "_AM_IMPRESSION_MINDEX_ID", "ID" );
define( "_AM_IMPRESSION_MINDEX_TITLE", "Beitragstitel" );
define( "_AM_IMPRESSION_MINDEX_CATTITLE", "Kategorie" );
define( "_AM_IMPRESSION_MINDEX_POSTER", "Poster" );
define( "_AM_IMPRESSION_MINDEX_ONLINE", "Status" );
define( "_AM_IMPRESSION_MINDEX_ONLINESTATUS", "Onlinestatus" );
define( "_AM_IMPRESSION_MINDEX_PUBLISH", "veröffentlicht" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHED", "veröffentlicht" );
define( "_AM_IMPRESSION_MINDEX_EXPIRE", "abgelaufen" );
define( "_AM_IMPRESSION_MINDEX_NOTSET", "Datum nicht gesetzt" );
define( "_AM_IMPRESSION_MINDEX_SUBMITTED", "Datum bestätigt" );
define( "_AM_IMPRESSION_MINDEX_ACTION", "Aktion" );
define( "_AM_IMPRESSION_MINDEX_NOARTICLESFOUND", "BITTE BEACHTEN: Es sind keine Beiträge vorhanden, die den Kriterien entsprechen" );
define( "_AM_IMPRESSION_MINDEX_PAGE", "<b>Seite:<b> " );
define( '_AM_IMPRESSION_MINDEX_PAGEINFOTXT', '<ul><li>Impression Hauptseitendetails.</li><li>du kannst das Bilderlogo, die Schlagzeile, Hauptindexkopf und Fußtext leicht ändern, um sie nach deinem eigenen Stil anzupassen</li></ul><br />Note: Das ausgewählte Logobild wird durchgängig von Impression verwendet.' );
// Submitted Articles
define( "_AM_IMPRESSION_SUB_SUBMITTEDFILES", "eingereichte Beiträge" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGINFO", "wartende Beitragsinformation" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGVALIDATION", "Beiträge warten auf Überprüfung: " );
define( "_AM_IMPRESSION_SUB_APPROVEWAITINGFILE", "<b>überprüfe</b> neue Beitragsinformation ohne Prüfung." );
define( "_AM_IMPRESSION_SUB_EDITWAITINGFILE", "<b>bearbeite</b> neue Beitragsinformation und überprüfe." );
define( "_AM_IMPRESSION_SUB_DELETEWAITINGFILE", "<b>lösche</b> die neue Beitragsinformation." );
define( "_AM_IMPRESSION_SUB_NOFILESWAITING", "keine Beiträge, welche den Kriterien entsprechen" );
define( "_AM_IMPRESSION_SUB_NEWFILECREATED", "neue Beitragsdaten erstellt und Datenbank erfolgreich aktualisiert" );
// Modifications
define( "_AM_IMPRESSION_MOD_TOTMODREQUESTS", "komplette Änderung angefordert: " );
define( "_AM_IMPRESSION_MOD_MODREQUESTS", "ändere Beitrag" );
define( "_AM_IMPRESSION_MOD_MODREQUESTSINFO", "ändere Beitragsinformation" );
define( "_AM_IMPRESSION_MOD_MODID", "ID" );
define( "_AM_IMPRESSION_MOD_MODTITLE", "Titel" );
define( "_AM_IMPRESSION_MOD_MODPOSTER", "Original Ersteller: " );
define( "_AM_IMPRESSION_MOD_DATE", "eingereicht" );
define( "_AM_IMPRESSION_MOD_NOMODREQUEST", "Es sind keine Anfragen vorhanden, welche diesen Kriterien entsprechen" );
define( "_AM_IMPRESSION_MOD_TITLE", "Beitragstitel: " );
define( "_AM_IMPRESSION_MOD_AID", "Beitrags-ID: " );
define( "_AM_IMPRESSION_MOD_CID", "Kategorie: " );
define( "_AM_IMPRESSION_MOD_PUBLISHER", "Autor: " );
define( "_AM_IMPRESSION_MOD_FORUMID", "Forum: " );
define( "_AM_IMPRESSION_MOD_SCREENSHOT", "Screenshotbild: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGE", "Homepage: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGETITLE", "Homepagetitel: " );
define( "_AM_IMPRESSION_MOD_SHOTIMAGE", "Screenshotbild: " );
define( "_AM_IMPRESSION_MOD_DESCRIPTION", "Beschreibung: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMITTER", "Autor: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMIT", "Autor" );
define( "_AM_IMPRESSION_MOD_PROPOSED", "vorgeschlagene Beitragsdetails" );
define( "_AM_IMPRESSION_MOD_ORIGINAL", "Original Beitragsdetails" );
define( "_AM_IMPRESSION_MOD_REQDELETED", "angeforderte Änderung von der Datenbank entfernt" );
define( "_AM_IMPRESSION_MOD_REQUPDATED", "ausgewählter Beitrag geändert und Datenbank erfolgreich aktualisiert" );
define( '_AM_IMPRESSION_MOD_VIEW', 'Ansicht' );
// Article management
define( "_AM_IMPRESSION_ARTICLE_ID", "Beitrags-ID: " );
define( "_AM_IMPRESSION_ARTICLE_IP", "IP-Adresse: " );
define( "_AM_IMPRESSION_ARTICLE_ALLOWEDAMIME", "<div style='padding-top: 4px; padding-bottom: 4px;'><b>erlaubte Beitragsänderung des Admins</b>:</div>" );
define( "_AM_IMPRESSION_ARTICLE_MODIFYFILE", "ändere Beitragsinformation" );
define( "_AM_IMPRESSION_ARTICLE_CREATENEWFILE", "erstelle neuen Beitrag" );
define( "_AM_IMPRESSION_ARTICLE_TITLE", "<b>Titel:</b>" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT", "<b>einleitender Beitragstext:</b>" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT_DSC", "<br />Der hier eingegebene Text ist als erster Teil des Beitrags zu sehen und wird im Spotlightblock angezeigt" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION", "<b>Beitragshaupttext:</b>" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC", "<br />Der hier eingegebene Text ist zusammen mit dem Text im einleitenden Beitragstext der komplette Beitrag" );
define( "_AM_IMPRESSION_ARTICLE_CATEGORY", "<b>Hauptkategorie:</b>" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS", "<b>setze Beitragsstatus:</b>" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC", "<small>Setze Beitrag auf veröffentlicht/unveröffentlicht/abgewiesen</small>" );
define( "_AM_IMPRESSION_ARTICLE_SETASAPPROVED", "Beitragsstatus auf geprüft setzen?" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATE", "Datum der Beitragsveröffentlichung:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC", "<small>wähle das Datum der Veröffentlichung</small>");
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATE", "Ablaufdatum des Beitrags:" );
define( "_AM_IMPRESSION_ARTICLE_CLEARPUBLISHDATE", "<br /><br />entferne das Veröffentlichungsdatum:" );
define( "_AM_IMPRESSION_ARTICLE_CLEAREXPIREDATE", "<br /><br />entferne das Ablaufdatum:" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATESET", " setze das Veröffentlichungsdatum: " );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEPUBLISH", " Setze Datum/Zeit der Veröffentlichung" );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEEXPIRE", " Setze Datum/Zeit des Ablaufs" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE", "<b>setze Veröffentlichungsdatum: </b>" );
define( "_AM_IMPRESSION_ARTICLE_SETNEWPUBLISHDATE", "<b>Setze neues Veröffentlichungsdatum: </b><br />veröffentlicht:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBDATESETS", "<b>gewähltes Veröffentlichungsdatum: </b><br />veröffentlicht am:" );
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATESET", " Ablaufdatum wählen: " );
define( "_AM_IMPRESSION_ARTICLE_SETEXPIREDATE", "<b>wähle Ablaufdatum: </b>" );
define( "_AM_IMPRESSION_ARTICLE_DELEDITMESS", "lösche unvollständigen Bericht?<br /><br /><span style='font-weight: normal;'>Wenn Sie <b>JA</b> wählen, wird der unvollständige Bericht automatisch gelöscht und Sie bestätigen, das der Artikel wieder funktioniert.</span>" );
define( "_AM_IMPRESSION_ARTICLE_MUSTBEVALID", "Screenshotbild muß ein gültiges Beitragsbild sein im Ordner %s (z.B. shot.gif). lassen Sie es leer, wenn kein Bildlink vorhanden ist." );
define( "_AM_IMPRESSION_ARTICLE_EDITAPPROVE", "überprüfe Beitrag:" );
define( "_AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD", "neuer Beitrag erstellt und Datenbank erfolgreich aktualisiert" );
define( "_AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE", "ausgewählte Beiträge geändert und Datenbank erfolgreich aktualisiert" );
define( "_AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS", "wirklich den ausgewählten Beitrag löschen?" );
define( "_AM_IMPRESSION_ARTICLE_FILEWASDELETED", "Beitrag %s erfogreich aus der Datenbank entfernt!" );
define( "_AM_IMPRESSION_ARTICLE_FILEAPPROVED", "Beitrag überprüft und Datenbank erfolgreich aktualisiert" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHER", "<b>Name des Autors: /b>" );
// About defines
define( "_AM_IMPRESSION_BY", "durch" );
// Block defines
define( "_AM_IMPRESSION_BADMIN", "Blockadministration" );
define( "_AM_IMPRESSION_BLKDESC", "Beschreibung" );
define( "_AM_IMPRESSION_TITLE", "Titel" );
define( "_AM_IMPRESSION_SIDE", "Ausrichtung" );
define( "_AM_IMPRESSION_WEIGHT", "Gewichtung" );
define( "_AM_IMPRESSION_VISIBLE", "sichtbar" );
define( "_AM_IMPRESSION_ACTION", "Aktion" );
define( "_AM_IMPRESSION_SBLEFT", "links" );
define( "_AM_IMPRESSION_SBRIGHT", "rechts" );
define( "_AM_IMPRESSION_CBLEFT", "links ausrichten" );
define( "_AM_IMPRESSION_CBRIGHT", "rechts ausrichten" );
define( "_AM_IMPRESSION_CBCENTER", "zentriert ausrichten" );
define( "_AM_IMPRESSION_ACTIVERIGHTS", "aktive Rechte" );
define( "_AM_IMPRESSION_ACCESSRIGHTS", "Zugriffsrechte" );
// image admin icon
define( "_AM_IMPRESSION_ICO_EDIT", "bearbeite diesen Beitrag" );
define( "_AM_IMPRESSION_ICO_DELETE", "lösche diesen Beitrag" );
define( "_AM_IMPRESSION_ICO_RESOURCE", "bearbeite diese Resource" );
define( "_AM_IMPRESSION_ICO_ONLINE", "veröffentlicht" );
define( "_AM_IMPRESSION_ICO_OFFLINE", "nicht veröffentlicht" );
define( "_AM_IMPRESSION_ICO_APPROVED", "geprüft" );
define( "_AM_IMPRESSION_ICO_NOTAPPROVED", "nicht geprüft" );
define( "_AM_IMPRESSION_ICO_ARTICLE", "ähnliche Beiträge" );
define( "_AM_IMPRESSION_ICO_URL", "füge zugehörige URL hinzu" );
define( "_AM_IMPRESSION_ICO_ADD", "hinzufügen" );
define( "_AM_IMPRESSION_ICO_APPROVE", "akzeptieren" );
define( "_AM_IMPRESSION_ICO_STATS", "Statistik" );
define( "_AM_IMPRESSION_ICO_VIEW", "zeige diesen Eintrag" );
define( "_AM_IMPRESSION_ICO_IGNORE", "ignorieren" );
define( "_AM_IMPRESSION_ICO_REJECTED", "abgelehnt" );
define( "_AM_IMPRESSION_ICO_SUBMITTED", "eingereicht" );
define( "_AM_IMPRESSION_ICO_RES", "bearbeite Resource/Beitrag zu diesem Eintrag" );
define( "_AM_IMPRESSION_MOD_URLRATING", "Interent-Inhalt-Schätzung:" );
// Alternate category
define( "_AM_IMPRESSION_ALTCAT_CREATEF", "füge alternative Kategorie hinzu" );
define( "_AM_IMPRESSION_MALTCAT", "alternative Kategorienverwaltung" );
define( "_AM_IMPRESSION_ALTCAT_MODIFYF", "alternative Kategorienverwaltung" );
define( "_AM_IMPRESSION_ALTCAT_INFOTEXT", "<ul><li>alternative Kategorien können über dieses Formular leicht hinzugefügt oder entfernt werden.</li></ul>" );
define( '_AM_IMPRESSION_ALTCAT_CREATED', 'alternative Kategorie wurde gespeichert!' );

define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS", "automatisch geprüfte Beiträge" );
define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT", "wähle die Gruppen, welche Moderatorenrechte für die ausgewählten Kategorien haben. Dadurch werden neue Beiträge ohne administratives Eingreifen automatisch geprüft." );

define( "_AM_IMPRESSION_PERM_SPERMISSIONS", "Rechte des Einreichers" );
define( "_AM_IMPRESSION_PERM_SPERMISSIONS_TEXT", "wähle die Gruppen, welche neue Beiträge in die ausgewählten Kategorien einreichen kann." );

define( "_AM_IMPRESSION_PERM_APERMISSIONS", "Moderatorengruppe" );
define( "_AM_IMPRESSION_PERM_APERMISSIONS_TEXT", "wählen Sie die Gruppen, welche Moderatorenrechte für die ausgewählten Kategorien haben." );

define( "_AM_IMPRESSION_TIME", "Zeit:" );
define( "_AM_IMPRESSION_KEYWORDS", "<b>Stichworte:</b>" );
define( "_AM_IMPRESSION_KEYWORDS_NOTE", "Stichworte sollten durch ein Komma getrennt werden <br />(<i>Stichwort 1, Stichwort 2, Stichworte 3, etc.</i>)" );
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION", "Metabeschreibung");
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION_DSC", "um Suchmaschinen zu helfen, können Sie für diesen Beitrag die Metabeschreibung anpassen, wie Sie möchten. Wenn Sie dieses Feld leer lassen, wenn Sie eine Kategorie erstellen, wird dieser Beitrag automatisch in Zusammenfassungsfeld automatisch als populär gekennzeichnet.");

define("_AM_IMPRESSION_DATESUB_DSC", "wählen Sie das Datum der Veröffentlichung");
define("_AM_IMPRESSION_DATESUB", "veröffentlichtes Datum");
define("_AM_IMPRESSION_READS", "gelesen: ");

define( '_AM_IMPRESSION_PUBLISHED', 'veröffentlicht' );
define( '_AM_IMPRESSION_OFFLINE', 'unveröffentlicht' );
define( '_AM_IMPRESSION_REJECTED', 'abgewiesen' );
define( '_AM_IMPRESSION_SUBMITTED', 'eingereicht' );
define( '_AM_IMPRESSION_INFOMATION', 'Information' );
define( '_AM_IMPRESSION_NOTPUBLiSHED', 'unveröffentlicht' );

define( "_AM_IMPRESSION_IPAGE_SHOWLATEST", "zeige des letztes Verzeichnisses?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL", "wie viele Beiträge zum Anzeigen?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC", "0 setzt die Option auf AUS." );

define( '_AM_IMPRESSION_RSSFEED', 'RSS Feed' );
define( '_AM_IMPRESSION_RSSFEEDCFG', 'RSS Feed Configuration' );
define( '_AM_IMPRESSION_RSSFEEDDSC', 'Here you can configure the RSS feed for Impression.<br />For more information visit the <a href="http://www.rssboard.org/" target="_blank">RSS Advisory Board</a> website.' );
define( '_AM_IMPRESSION_RSSACTIVE', 'RSS feed activated' );
define( '_AM_IMPRESSION_RSSACTIVEDSC', 'Select <em>Yes</em> to turn RSS feed for Impression on, select <em>No</em> to turn it off.' );
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
define( '_AM_IMPRESSION_RSSIMGTITLEDSC', 'Describes the image, it\'s used in the ALT attribute of the HTML &#60;img&#62; tag when the channel is rendered in HTML.' );
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
define( '_AM_IMPRESSION_COPYRIGHT', 'Copyright' );
?>