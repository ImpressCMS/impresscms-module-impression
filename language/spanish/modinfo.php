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
define("_MI_IMPRESSION_BINDEX","Índice");
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

define('_MI_IMPRESSION_EDITOR', "Editor a usar por los administradores):");
define('_MI_IMPRESSION_EDITORCHOICE', "Seleccione el editor que se usará en la administración. Si sólo ha hecho una instalación normal de ImpressCMS (sin ningún extra), podrá seleccionar DHTML y TinyMCE.");
define('_MI_IMPRESSION_EDITORUSER', "Editor a usar por los usuarios)");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "Seleccione el editor que se usará en la administración. Si sólo ha hecho una instalación normal de ImpressCMS (sin ningún extra), podrá seleccionar DHTML y TinyMCE.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extended");
define("_MI_IMPRESSION_FORM_COMPACT","Compact");
define("_MI_IMPRESSION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_IMPRESSION_FORM_FCK","FCK Editor");
define("_MI_IMPRESSION_FORM_KOIVI","Koivi Editor");
define("_MI_IMPRESSION_FORM_TINYEDITOR","TinyEditor");
define('_MI_IMPRESSION_FORM_TINYMCE','TinyMCE');

define('_MI_IMPRESSION_USESHOTS', '¿Mostrar capturas de pantalla?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Seleccione Sí para mostrarlas en cada artículo');

define('_MI_IMPRESSION_USETHUMBS', 'Usar miniaturas:');
define("_MI_IMPRESSION_USETHUMBSDSC", "Tipos de archivos de imagen admitidos: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression usará las miniauturas para las imágenes. Seleccione 'No' para usar la imagen original si el servidor no permite dicha opción.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "¿Actualizar miniaturas?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "Seleccionado esta opción, las imágenes serán actualizadas cada vez que se genere la página; en otro caso se usará siempre la primera miniatura. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Directorio para la imagen principal');

define('_MI_IMPRESSION_CATEGORYIMG','Directorio para almacenar las imágenes de las categorías');

define('_MI_IMPRESSION_DATEFORMAT', 'Formato de fecha (para los usuarios):');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Formato de fecha predeterminado a usar en el módulo.<br />Lea el <a href="http://jp.php.net/manual/es/function.date.php" target="_blank">manual de PHP</a> para más información');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Formato de fecha (en la Administración del módulo):');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', '<br />Lea el <a href="http://jp.php.net/manual/es/function.date.php" target="_blank">manual de PHP</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Establezca el total de caracteres para la descripción?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "El mismo será usado en las descripciones de los artículos en la página índice.");

define("_MI_IMPRESSION_OTHERARTICLES", "¿Mostrar otros artículos del mismo autor?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Seleccione Sí para mostrar los demás artículos del mismo autor.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Mostrar el número de artículos en la vista por categorías?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Seleccione Sí para mostrar el número total de artículos.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "¿Mostrar marcadores sociales?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Seleccione Sí si desea que dicho bloque sea mostrado en la parte inferior de cada artículo.");

define("_MI_IMPRESSION_USEMETADESCR", "Generar meta descripción:");
define("_MI_IMPRESSION_USEMETADSC", "Con esta opción la misma estará basada en el texo de introducción del artículo.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', '¿Mostrar la limitación de responsabilidad antes del envío del visitante o usuario?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', '');

define('_MI_IMPRESSION_DISCLAIMER', 'Establezca el texto de la limitación de responsabilidad:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Mostrar la limitación de responsabilidad antes del contenido de los artículos?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Se mostrará antes de abrir el artículo correspondiente');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Introduzca el texto de la limitación de responsabilidad:');

define('_MI_IMPRESSION_COPYRIGHT', 'Contenido del copyright:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Seleccione si desea mostrar un aviso de copyright en los artículos.');

//define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
//define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Tamaño máximo (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Tamaño máximo permitido para que el artículo pueda ser enviado al sitio.');
define('_MI_IMPRESSION_IMGWIDTH','Anchura de las imágenes');
define('_MI_IMPRESSION_IMGWIDTHDSC','Ancho máximo permitido para las imágenes que se suban con artículos');
define('_MI_IMPRESSION_IMGHEIGHT','Altura de las imágenes');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Altura máxima permitida cuando se suban imágenes en los artículos');

define('_MI_IMPRESSION_UPLOADDIR','Directorio para almacenar (no trailing slash)');
define('_MI_IMPRESSION_ALLOWSUBMISS','Envíos de usuarios:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Permitir a los usuarios enviar nuevos artículos');
define('_MI_IMPRESSION_ALLOWUPLOADS','Subidas de usuarios:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Permitir a los usuarios guardar artículos directamente en el sitio web');
define('_MI_IMPRESSION_SCREENSHOTS','Directorio para almacenar las capturas de pantalla');

define("_MI_IMPRESSION_SUBMITART", "Envío de artículos:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Seleccione los grupos que podrán enviar nuevos artículos.");

define("_MI_IMPRESSION_QUALITY", "Calidad de las miniaturas:");
define("_MI_IMPRESSION_QUALITYDSC", "Más baja: 0; Más alta: 100");
define("_MI_IMPRESSION_KEEPASPECT", "¿Mantener la ratio para el aspecto de la imagen?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Título");
define("_MI_IMPRESSION_WEIGHT", "Importancia");
define("_MI_IMPRESSION_POPULARITY", "Lecturas");
define("_MI_IMPRESSION_SUBMITTED2", "Fecha del envío");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Global');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'Opciones globales de notificación de artículos.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Categoría');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Opciones de notificación que se aplicarán en la categoría actual.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'Artículos');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Opciones de notificación que se aplicarán en el artículo actual.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nuevas categorías');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificarme cuando una nueva categoría es creada.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Recibir notificación cuando una nueva categoría es creada.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificar: nuevas categorías');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'Enlace enviado');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Notificarme cuando cualquier nuevo artículo sea enviado y este aguardando aprobación.');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Recibir notificación de cualquier nuevo artículo enviado que este aguardando aprobación.');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificar: nuevo artículo enviado');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'Nuevo artículo');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Notificarme cuando un nuevo artículo es publicado.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Recibir notificación cuando un nuevo artículo es publicado.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificar: nuevo artículo');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'Enlace enviado');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notificarme cuando cualquier nuevo artículo sea enviado en esta categoría y este aguardando aprobación.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Recibir notificación de cualquier nuevo artículo enviado en esta categoría y que este aguardando aprobación.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificar: nuevo artículo enviado en la nategoría');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'Nuevo artículo');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'Notificarme cuando un nuevo artículo es publicado en esta categoría.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Recibir notificación cuando un nuevo artículo es publicado en esta categoría.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificar: nuevo artículo publicado en la categoría');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Artículo aprobado');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'Notificarme cuando este artículo sea aprobado.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Recibir notificación cuando este artículo sea aprobado.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} autonotificar: artículo aprobado');

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
define('_MI_IMPRESSION_ICONS_CREDITS', "Iconos por:");

define("_MI_IMPRESSION_HEADERPRINT","[Opciones de impresión] Cabecera");
define("_MI_IMPRESSION_HEADERPRINTDSC","Cabecera que se imprimirá en cada artíclo");
define("_MI_IMPRESSION_PRINTLOGOURL","[Opciones de impresión] URL del logo a imprimir");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Se imprimirá al principio de la página");
define("_MI_IMPRESSION_FOOTERPRINT","[Opciones de impresión] Pie de página");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Pie de página que se imprimirá para cada artículo");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Pie de página de cada ítem");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Pie de página del índice");
define("_MI_IMPRESSION_BOTH_FOOTERS","Ambos pies de página");
define("_MI_IMPRESSION_NO_FOOTERS","Ninguno");
define("_MI_IMPRESSION_ITEMFOOTER", "[Opciones de impresión] Ítem del pie de página");

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

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "Imagen del copyright");

define("_MI_IMPRESSION_KEYLENGTH", "Máximo de caracteres para las palabras clave:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "valor predeterminado: 255 caracteres");
define("_MI_IMPRESSION_HEADLINES", "Titulares" );
define("_MI_IMPRESSION_HEADLINESDSC", "Establezca el número de titulares a mostrar.");
define("_MI_IMPRESSION_BTAGCLOUD", "Nube de etiquetas de Impression");
define("_MI_IMPRESSION_BTOPTAG", "Etiquetas más frecuentes de Impression");
define("_MI_IMPRESSION_LINKEDTERMS", "¿Enlazar a los términos del glosario?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "El módulo imGlossary necesita estar instalado para activar esta característica." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Nombre de la carpeta de imGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "Nombre de la carpeta en la que está instalado imGlossary.<br />Predeterminado: <em>imglossary</em>" );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - a copy of the GNU license is enclosed (license.txt).' );
define( '_MI_IMPRESSION_RSSFEED', 'Origen de RSS' );

define( '_MI_IMPRESSION_SHOWSUBMITTER', '¿Mostrar nombre de quien hizo el envío?' );
define( '_MI_IMPRESSION_SHOWSUBMITTERDSC', 'Seleccione <em>Sí</em> para que aparezca el mismo al imprimir el documento.' );
define( '_MI_IMPRESSION_USERTAGDESCR', 'Los usuarios pueden enviar etiquetas (tags):' );
define( '_MI_IMPRESSION_USERTAGDSC', 'Selecione si los usuarios pueden o no enviar solapas.' );
define( '_MI_IMPRESSION_NICEURL', '¿Usar URL abreviados para los artículos?' );
define( '_MI_IMPRESSION_NICEURLDSC', 'Activando esta característica podrá personalizar el URL de la página' );

// Impression 1.1.0
define( '_MI_IMPRESSION_CAPTCHA', '¿Usar captcha en el formulario de redacción?' );
define( '_MI_IMPRESSION_CAPTCHADSC', 'Seleccione <em>Sí</em> para usar captcha en el formulario de redacción de contenido.<br />Predeterminado: <em>Sí</em>' );
define( '_MI_IMPRESSION_BYTESYN', 'Mostrar en pie de página:' );
define( '_MI_IMPRESSION_BYTESDESC', 'Mostrar la información extra en el pie de página, después de <em>Leer más</em>.' );
define( '_MI_IMPRESSION_BYTES', 'Bytes' );
define( '_MI_IMPRESSION_WORDS', 'Palabras' );
define( '_MI_IMPRESSION_CHARSF', 'Caracteres' );
define( '_MI_IMPRESSION_BNEWS', 'Artículos por categoría');
define( '_MI_IMPRESSION_TEXTWIDTH', 'Set width of title boxes in administration:' );
define( '_MI_IMPRESSION_TEXTWIDTHDSC', 'Select the width of the text boxes used for titles in submit forms. Default is 128.' );
?>