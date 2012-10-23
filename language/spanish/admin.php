<?php
/**
 * $Id: admin.php
 * Module: Impression
 * Language: Spanish
 * Format: UTF-8
 * Author: McDonald
 * Translator: debianus
 */

define( "_AM_IMPRESSION_WARNINSTALL1", "Advertencia: el directorio %s existe en su servidor. <br />Por favor, elimínelo por seguridad." );
define( "_AM_IMPRESSION_WARNINSTALL2", "Aviso: el archivo %s existe en tu servidor. <br />Por favor, por razones de seguridad elimine este archivo." );
define( "_AM_IMPRESSION_WARNINSTALL3", "Aviso: la carpeta %s no existe en su servidor. <br />Esta carpeta es necesaria para el funcionamiento de Impression." );

define( "_AM_IMPRESSION_MODULE_NAME", "Impression" );

define( "_AM_IMPRESSION_BMODIFY", "Modificar" );
define( "_AM_IMPRESSION_BDELETE", "Eliminar" );
define( "_AM_IMPRESSION_BCREATE", "Crear" );
define( "_AM_IMPRESSION_BADD", "Añádir" );
define( "_AM_IMPRESSION_BAPPROVE", "Aprobar" );
define( "_AM_IMPRESSION_BIGNORE", "Ignorar" );
define( "_AM_IMPRESSION_BCANCEL", "Cancelar" );
define( "_AM_IMPRESSION_BSAVE", "Guardar" );
define( "_AM_IMPRESSION_BRESET", "Reestablecer" );
define( "_AM_IMPRESSION_BMOVE", "Mover artículos" );
define( "_AM_IMPRESSION_BUPLOAD", "Subir" );
define( "_AM_IMPRESSION_BDELETEIMAGE", "Eliminar la imagen seleccionada" );
define( "_AM_IMPRESSION_BRETURN", "Retornar" );
define( "_AM_IMPRESSION_DBERROR", "Error en el acceso a la base de datos" );
// Other Options
define( "_AM_IMPRESSION_TEXTOPTIONS", "Opciones del texto:" );
define( "_AM_IMPRESSION_DISABLEHTML", "Desactivar etiquetas HTML" );
define( "_AM_IMPRESSION_DISABLESMILEY", "Desactivar iconos" );
define( "_AM_IMPRESSION_DISABLEXCODE", "Desactivar códigos de iCMS" );
define( "_AM_IMPRESSION_DISABLEIMAGES", "Desactivar imágenes" );
define( "_AM_IMPRESSION_DISABLEBREAK", "¿Usar conversión del salto de línea de iCMS?" );
define( "_AM_IMPRESSION_UPLOADFILE", "El artículo fue guardado con éxito en el servidor" );
define( "_AM_IMPRESSION_NOMENUITEMS", "No hay items del menú" );
// Admin Bread crumb
define( "_AM_IMPRESSION_PREFS", "Preferencias" );
define( "_AM_IMPRESSION_BUPDATE", "Actualizar el módulo" );
define( "_AM_IMPRESSION_BINDEX", "Índice principal" );
define( "_AM_IMPRESSION_BPERMISSIONS", "Permisos" );
define( "_AM_IMPRESSION_BLOCKADMIN", "Preferencias de bloques" );
define( "_AM_IMPRESSION_GOMODULE", "Ir al módulo" );
define( "_AM_IMPRESSION_ABOUT", "Acerca" );
// Admin Summary
define( "_AM_IMPRESSION_SCATEGORY", "Categorías: " );
define( "_AM_IMPRESSION_SFILES", "Artículos: " );
define( "_AM_IMPRESSION_SNEWFILESVAL", "Enviados: " );
define( "_AM_IMPRESSION_SMODREQUEST", "Modificados: " );
define( "_AM_IMPRESSION_SREVIEWS", "Revisiones: " );
// Admin Main Menu
define( "_AM_IMPRESSION_MCATEGORY", "Gestión de categorías" );
define( "_AM_IMPRESSION_MARTICLES", "Gestión de artículos" );
define( "_AM_IMPRESSION_INDEXPAGE", "Gestión de la página índice" );
define( "_AM_IMPRESSION_MUPLOADS", "Gestión de las imágenes del módulo" );
// Catgeory defines
define( "_AM_IMPRESSION_CCATEGORY_CREATENEW", "Crear nueva categoría" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY", "Modificar categoría" );
define( "_AM_IMPRESSION_CCATEGORY_MOVE", "Mover los artículos de la categoría" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_TITLE", "Título de la categoría:" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILED", "Error al mover los artículos: no pueden ser movidos a esta categoría." );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT", "Error al mover los artículos: no se pudo encontrar la categoría." );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_MOVED", "Artículos movidos" );
define( "_AM_IMPRESSION_CCATEGORY_CREATED", "Nueva categoría creada y base de datos actualizada con éxito" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFIED", "La categoría seleccionada fue modificada y la base de datos actualizada con éxito" );
define( "_AM_IMPRESSION_CCATEGORY_DELETED", "La categoría seleccionada fue eliminada y la base de datos actualizada con éxito" );
define( "_AM_IMPRESSION_CCATEGORY_AREUSURE", "Aviso: ¿está seguro de que desea eliminar esta categoría y todos sus artículos y los comentarios a los mismos?" );
define( "_AM_IMPRESSION_CCATEGORY_NOEXISTS", "Debe crear una categoría antes de añadir un nuevo artículo" );
define( "_AM_IMPRESSION_FCATEGORY_GROUPPROMPT", "Permisos de acceso a la categoría:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Seleccione los grupos de usuarios que tendrán acceso a esta categoría.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_SUBGROUPPROMPT", "Permisos para enviar artículos a la categoría:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Seleccione los grupos de usuarios que tendrán permisos para enviar artículos a esta categoría..</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_MODGROUPPROMPT", "Permisos de moderación en la categoría:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Seleccione los grupos de usuarios que tendrán permisos de moderación en la misma.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_TITLE", "Título de la categoría:" );
define( "_AM_IMPRESSION_FCATEGORY_WEIGHT", "Importancia:" );
define( "_AM_IMPRESSION_FCATEGORY_SUBCATEGORY", "Configurar como subcategoría de:" );
define( "_AM_IMPRESSION_FCATEGORY_CIMAGE", "Seleccione la imagen de la categoría:" );
define( "_AM_IMPRESSION_FCATEGORY_DESCRIPTION", "Descripción de la categoría:" );
define( "_AM_IMPRESSION_FCATEGORY_SUMMARY", "Información sumaria sobre la categoría:" );
// Index page Defines
define( "_AM_IMPRESSION_IPAGE_UPDATED", "Página índice modificada y base de datos actualizada con éxito" );
define( "_AM_IMPRESSION_IPAGE_INFORMATION", "Información de la página índice" );
define( "_AM_IMPRESSION_IPAGE_MODIFY", "Modificar la página índice" );
define( "_AM_IMPRESSION_IPAGE_CIMAGE", "Seleccionar la imagen:" );
define( "_AM_IMPRESSION_IPAGE_CTITLE", "Título:" );
define( "_AM_IMPRESSION_IPAGE_CHEADING", "Cabecera:" );
define( "_AM_IMPRESSION_IPAGE_CHEADINGA", "Alineación de la cabecera:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTER", "Pie de página:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTERA", "Alineación del pie de página:" );
define( "_AM_IMPRESSION_IPAGE_CLEFT", "Izquierda" );
define( "_AM_IMPRESSION_IPAGE_CCENTER", "Centrada" );
define( "_AM_IMPRESSION_IPAGE_CRIGHT", "Derecha" );
// Permissions defines
define( "_AM_IMPRESSION_PERM_MANAGEMENT", "Permisos" );
define( "_AM_IMPRESSION_PERM_PERMSNOTE", "<div><b>Nota:</b> Por favor tenga en cuenta que no sólo debe configurar los permisos aquí, sino que también debe hacerlo en la administración de grupos de ImpressCMS. Para ello acceda a <b>Sistema > Grupos</b> y elija los grupos correspondientes para configurar su acceso al módulo y a los bloques.</div>" );
define( "_AM_IMPRESSION_PERM_CPERMISSIONS", "Permisos de las categorías" );
define( "_AM_IMPRESSION_PERM_CSELECTPERMISSIONS", "Seleccione las categorías cuyo contenido podrá visualizar el grupo correspondiente." );
define( "_AM_IMPRESSION_PERM_CNOCATEGORY", "No se pudieron fijar los permisos porque las categorías no han sido creadas aún." );
define( "_AM_IMPRESSION_PERM_FPERMISSIONS", "Permisos relativos a los artículos" );
define( "_AM_IMPRESSION_PERM_FNOFILES", "No se pudieron fijar los permisos porque los artículos no han sido creados aún." );
define( "_AM_IMPRESSION_PERM_FSELECTPERMISSIONS", "Seleccione los artículos que cada grupo podrá visualizar" );
// Upload defines
define( "_AM_IMPRESSION_ARTICLE_IMAGEUPLOAD", "Imagen enviada al servidor satisfactoriamente" );
define( "_AM_IMPRESSION_ARTICLE_NOIMAGEEXIST", "Error: no se seleccionó ninguna imagen para subir. Hágalo e inténtelo de nuevo." );
define( "_AM_IMPRESSION_ARTICLE_IMAGEEXIST", "La imagen ya fue enviada al servidor anteriormente" );
define( "_AM_IMPRESSION_ARTICLE_FILEDELETED", "El artículo ha sido eliminado." );
define( "_AM_IMPRESSION_ARTICLE_FILEERRORDELETE", "Error al eliminar el artículo: no fue encontrado en el servidor." );
define( "_AM_IMPRESSION_ARTICLE_NOFILEERROR", "Error al eliminar el artículo: no se seleccionó ninguno." );
define( "_AM_IMPRESSION_ARTICLE_DELETEFILE", "Aviso: ¿esta seguro de querer eliminar el enlace a esta imagen?" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEINFO", "Estado del servidor" );
define( "_AM_IMPRESSION_ARTICLE_SPHPINI", "<b>Información obtenida desde PHP ini: Link:</b>" );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODESTATUS", "Estado del <em>Safe Mode</em>: " );
define( "_AM_IMPRESSION_ARTICLE_REGISTERGLOBALS", "Register Globals: " );
define( "_AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS", "Estado de <em>Server Uploads</em>: " );
define( "_AM_IMPRESSION_ARTICLE_MAXUPLOADSIZE", "Tamaño máximo de subida de archivos permitido: " );
define( "_AM_IMPRESSION_ARTICLE_MAXPOSTSIZE", "Tamaño máximo de envíos permitido: " );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS", "(Esto puede causar problemas)" );
define( "_AM_IMPRESSION_ARTICLE_GDLIBSTATUS", "Soporte de la libería GD: " );
define( "_AM_IMPRESSION_ARTICLE_GDLIBVERSION", "Versión de la librería GD: " );
define( "_AM_IMPRESSION_ARTICLE_GDON", "<b>Habilitado</b> (Miniaturas habilitadas)" );
define( "_AM_IMPRESSION_ARTICLE_GDOFF", "<b>Inhabilitado</b> (Miniaturas deshabilitadas)" );
define( "_AM_IMPRESSION_ARTICLE_OFF", "Inactivo" );
define( "_AM_IMPRESSION_ARTICLE_ON", "Activo" );
define( "_AM_IMPRESSION_ARTICLE_CATIMAGE", "Usar en categorías" );
define( "_AM_IMPRESSION_ARTICLE_SCREENSHOTS", "Usar como capturas" );
define( "_AM_IMPRESSION_ARTICLE_MAINIMAGEDIR", "Usar como imagen principal" );
define( "_AM_IMPRESSION_ARTICLE_FCATIMAGE", "Ruta de las categorías" );
define( "_AM_IMPRESSION_ARTICLE_FSCREENSHOTS", "Ruta de las capturas" );
define( "_AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR", "Ruta de las imagenes principales" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGETO", "Enviar imagen: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADPATH", "Ruta de subida: " );//pendiente
define( "_AM_IMPRESSION_ARTICLE_FUPLOADURL", "URL de subida: " );//pendiente
define( "_AM_IMPRESSION_ARTICLE_FOLDERSELECTION", "Seleccione el destino de la imagen:" );
define( "_AM_IMPRESSION_ARTICLE_FSHOWSELECTEDIMAGE", "Seleccionar una imagen:" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGE", "Enviar imagen al destino seleccionado:" );

// Main Index defines
define( "_AM_IMPRESSION_MINDEX_ARTICLESUMMARY", "Resumen de la administración del módulo" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE", "Artículos publicados:" );
define( "_AM_IMPRESSION_MINDEX_AUTOPUBLISHEDARTICLE", "Autopublicar artículos:" );
define( "_AM_IMPRESSION_MINDEX_AUTOEXPIRE", "Autoexpirar artículos:" );
define( "_AM_IMPRESSION_MINDEX_EXPIRED", "Artículos expirados:" );
define( "_AM_IMPRESSION_MINDEX_OFFLINEARTICLE", "Artículos no activos:" );
define( "_AM_IMPRESSION_MINDEX_ID", "ID" );
define( "_AM_IMPRESSION_MINDEX_TITLE", "Título" );
define( "_AM_IMPRESSION_MINDEX_CATTITLE", "Categoría" );
define( "_AM_IMPRESSION_MINDEX_POSTER", "Autor" );
define( "_AM_IMPRESSION_MINDEX_ONLINE", "Estado" );
define( "_AM_IMPRESSION_MINDEX_ONLINESTATUS", "Activo" );
define( "_AM_IMPRESSION_MINDEX_PUBLISH", "Publicado" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHED", "Publicados" );
define( "_AM_IMPRESSION_MINDEX_EXPIRE", "Expirados" );
define( "_AM_IMPRESSION_MINDEX_NOTSET", "Fecha no fijada" );
define( "_AM_IMPRESSION_MINDEX_SUBMITTED", "Enviados" );//Date submitted
define( "_AM_IMPRESSION_MINDEX_ACTION", "Acción" );
define( "_AM_IMPRESSION_MINDEX_NOARTICLESFOUND", "Aviso: no hay artículos que coincidan con este criterio" );
define( "_AM_IMPRESSION_MINDEX_PAGE", "Página: " );
define( '_AM_IMPRESSION_MINDEX_PAGEINFOTXT', '<ul><li>Detalles de la página principal del módulo Impression.</li><li>Puede cambiar de forma sencilla la imagen del logo, el encabezado principal y el pié de página así como la alineación de los mismos.</li></ul><br />Nota: La imagen del logo que elija será usada en el módulo.' );
define( "_AM_IMPRESSION_MINDEX_RESPONSE", "Tiempo de respuesta" );
// Submitted Links
define( "_AM_IMPRESSION_SUB_SUBMITTEDFILES", "Artículos enviados" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGINFO", "Artículos esperando" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGVALIDATION", "Artículos esperando aprobación: " );
define( "_AM_IMPRESSION_SUB_APPROVEWAITINGFILE", "<b>Aprobar</b> artículo." );
define( "_AM_IMPRESSION_SUB_EDITWAITINGFILE", "<b>Modificar</b> el artículo y luego aprobar." );
define( "_AM_IMPRESSION_SUB_DELETEWAITINGFILE", "<b>Eliminar</b> el artículo." );
define( "_AM_IMPRESSION_SUB_NOFILESWAITING", "No hay artículos que reunan estos requisitos" );
define( "_AM_IMPRESSION_SUB_NEWFILECREATED", "Nuevo artículo creado y base de datos actualizada con éxito" );
// Modifications
define( "_AM_IMPRESSION_MOD_TOTMODREQUESTS", "Solicitudes de modificación: " );
define( "_AM_IMPRESSION_MOD_MODREQUESTS", "Artículos modificados" );
define( "_AM_IMPRESSION_MOD_MODREQUESTSINFO", "Información de artículos modificados" );
define( "_AM_IMPRESSION_MOD_MODID", "ID" );
define( "_AM_IMPRESSION_MOD_MODTITLE", "Título" );
define( "_AM_IMPRESSION_MOD_MODPOSTER", "Autor original: " );
define( "_AM_IMPRESSION_MOD_DATE", "Enviado" );
define( "_AM_IMPRESSION_MOD_NOMODREQUEST", "No hay solicitudes de modificaciones que reunan estos criterios." );
define( "_AM_IMPRESSION_MOD_TITLE", "Título: " );
define( "_AM_IMPRESSION_MOD_AID", "ID: " );
define( "_AM_IMPRESSION_MOD_CID", "Categoría: " );
define( "_AM_IMPRESSION_MOD_PUBLISHER", "Autor: " );
define( "_AM_IMPRESSION_MOD_FORUMID", "Foro: " );
define( "_AM_IMPRESSION_MOD_SCREENSHOT", "Imagen: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGE", "Página web: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGETITLE", "Título de la web: " );
define( "_AM_IMPRESSION_MOD_SHOTIMAGE", "Captura de pantalla: " );
define( "_AM_IMPRESSION_MOD_DESCRIPTION", "Descripción: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMITTER", "Autor: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMIT", "Autor" );
define( "_AM_IMPRESSION_MOD_PROPOSED", "Detalles del artículo propuesto" );
define( "_AM_IMPRESSION_MOD_ORIGINAL", "Detalles del artículo original" );
define( "_AM_IMPRESSION_MOD_REQDELETED", "Solicitud de modificación eliminada de la base de datos" );
define( "_AM_IMPRESSION_MOD_REQUPDATED", "Los artículos seleccionados han sido modificados y la base de datos modificada con éxito." );
define( '_AM_IMPRESSION_MOD_VIEW', 'Ver' );//View
define( "_AM_IMPRESSION_MOD_META_KEYWORDS", "Keywords:" );
define( "_AM_IMPRESSION_MOD_ITEM_TAG", "Tags:" );
// Article management
define( "_AM_IMPRESSION_ARTICLE_ID", "ID: " );
define( "_AM_IMPRESSION_ARTICLE_IP", "Dirección IP: " );
define( "_AM_IMPRESSION_ARTICLE_ALLOWEDAMIME", "<div style='padding-top: 4px; padding-bottom: 4px;'><b>Administración de las extensiones de tipos de archivos permitidos</b>:</div>" );
define( "_AM_IMPRESSION_ARTICLE_MODIFYFILE", "Modificar la información de artículo" );
define( "_AM_IMPRESSION_ARTICLE_CREATENEWFILE", "Crear nuevo artículo" );
define( "_AM_IMPRESSION_ARTICLE_TITLE", "Título:" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT", "Texto de introducción:" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT_DSC", "<br />Este texto será la primera parte o cabecera del artículo y será mostrado en el bloque de titulares." );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION", "Texto principal:" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC", "<br />Este texto, junto con el anterior, formarán el completo contenido del artículo" );
define( "_AM_IMPRESSION_ARTICLE_CATEGORY", "Categoría principal:" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS", "Establecer estado del artículo:" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC", "Establecer el estado del artículo como publicado/no activo/rechazado" );
define( "_AM_IMPRESSION_ARTICLE_SETASAPPROVED", "¿Fijar el estado del artículo como aprobado?" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATE", "Fecha de publicación:" );
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATE", "Fecha de expiración:" );
define( "_AM_IMPRESSION_ARTICLE_CLEARPUBLISHDATE", "<br /><br />Eliminar fecha de publicación:" );
define( "_AM_IMPRESSION_ARTICLE_CLEAREXPIREDATE", "<br /><br />Eliminar fecha de expiración:" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATESET", "Configurar fecha de publicación: " );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEPUBLISH", "Configurar la fecha de publicación" );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEEXPIRE", "Configurar la fecha de expiración" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE", "<b>Configurar fecha de publicación: </b>" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC", "" );
define( "_AM_IMPRESSION_ARTICLE_SETNEWPUBLISHDATE", "<b>Configurar nueva fecha de publicación: </b><br />Publicado el:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBDATESETS", "<b>Configurar fecha de publicación: </b><br />Publicaciones del:" );
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATESET", "Configurar fecha de expiración: " );
define( "_AM_IMPRESSION_ARTICLE_SETEXPIREDATE", "<b>Configurar fecha de expiración: </b>" );
define( "_AM_IMPRESSION_ARTICLE_DELEDITMESS", "¿Eliminar reporte de artículo erróneo?<br /><br /><span style='font-weight: normal;'>Cuando elige <b>Sí</b> los reportes de artículos erróneos serán automáticamente eliminados y el artículo se confirmará otra vez.</span>" );
define( "_AM_IMPRESSION_ARTICLE_MUSTBEVALID", "La captura deberá ser una imagen válida del directorio %s (ej. shot.gif). Deje esto en blanco si no hay imagenes." );
define( "_AM_IMPRESSION_ARTICLE_EDITAPPROVE", "Aprobar artículo:" );
define( "_AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD", "Nuevo artículo creado y base de datos actualizada satisfactoriamente" );
define( "_AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE", "Artículo modificado y base de datos actualizada satisfactoriamente" );
define( "_AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS", "¿Realmente desea eliminar el artículo seleccionado?" );
define( "_AM_IMPRESSION_ARTICLE_FILEWASDELETED", "Artículo %s eliminado de la base de datos satisfactoriamente" );
define( "_AM_IMPRESSION_ARTICLE_FILEAPPROVED", "Artículo aprobado y base de datos actualizada satisfactoriamente" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHER", "Nombre del autor:" );
// About defines
define( "_AM_IMPRESSION_BY", "por" );
// Block defines
define( "_AM_IMPRESSION_BADMIN", "Administración de bloques" );
define( "_AM_IMPRESSION_BLKDESC", "Descripción" );
define( "_AM_IMPRESSION_TITLE", "Título" );
define( "_AM_IMPRESSION_SIDE", "Alineación" );
define( "_AM_IMPRESSION_WEIGHT", "Importancia" );
define( "_AM_IMPRESSION_VISIBLE", "Visible" );
define( "_AM_IMPRESSION_ACTION", "Acción" );
define( "_AM_IMPRESSION_SBLEFT", "Izquierda" );
define( "_AM_IMPRESSION_SBRIGHT", "Derecha" );
define( "_AM_IMPRESSION_CBLEFT", "Central izquierdo" );
define( "_AM_IMPRESSION_CBRIGHT", "Central derecho" );
define( "_AM_IMPRESSION_CBCENTER", "Central-central" );
define( "_AM_IMPRESSION_ACTIVERIGHTS", "Derechos para activar" );//Active Rights
define( "_AM_IMPRESSION_ACCESSRIGHTS", "Derechos de acceso" );//Access Rights

// image admin icon
define( "_AM_IMPRESSION_ICO_EDIT", "Modificar este artículo" );
define( "_AM_IMPRESSION_ICO_DELETE", "Eliminar este artículo" );
define( "_AM_IMPRESSION_ICO_RESOURCE", "Modificar this resource" );
define( "_AM_IMPRESSION_ICO_ONLINE", "Publicado" );
define( "_AM_IMPRESSION_ICO_OFFLINE", "No activo" );
define( "_AM_IMPRESSION_ICO_APPROVED", "Aprobado" );
define( "_AM_IMPRESSION_ICO_NOTAPPROVED", "No aprobado" );
define( "_AM_IMPRESSION_ICO_ARTICLE", "Artículo relacionado" );
define( "_AM_IMPRESSION_ICO_URL", "Añadir URL" );
define( "_AM_IMPRESSION_ICO_ADD", "Añadir" );
define( "_AM_IMPRESSION_ICO_APPROVE", "Aprobar" );
define( "_AM_IMPRESSION_ICO_STATS", "Estadísticas" );
define( "_AM_IMPRESSION_ICO_VIEW", "Ver este ítem" );
define( "_AM_IMPRESSION_ICO_IGNORE", "Ignorar" );
define( "_AM_IMPRESSION_ICO_REJECTED", "Rechazar" );
define( "_AM_IMPRESSION_ICO_SUBMITTED", "Enviado" );
define( "_AM_IMPRESSION_ICO_RES", "Modificar recursos/artículos para este ítem" );
// Alternate category
define( "_AM_IMPRESSION_ALTCAT_CREATEF", "Añadir categoría alternativa" );
define( "_AM_IMPRESSION_MALTCAT", "Gestión de categorías alternativas" );
define( "_AM_IMPRESSION_ALTCAT_MODIFYF", "Gestión de categorías alternativas" );
define( "_AM_IMPRESSION_ALTCAT_INFOTEXT", "<ul><li>Las categorías alternativas pueden ser añadidas o eliminadas con facilidad usando este formulario.</li></ul>" );
define( '_AM_IMPRESSION_ALTCAT_CREATED', 'La categorías alternativa fue guardada' );

define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS", "Autoaprobar artículos" );
define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT", "Seleccione los grupos a los que se les permite la autoaprobación de nuevos artículos sin intervención del administrador." );

define( "_AM_IMPRESSION_PERM_SPERMISSIONS", "Permisos para enviar artículos" );
define( "_AM_IMPRESSION_PERM_SPERMISSIONS_TEXT", "Seleccione los grupos a los que se les permite enviar nuevos artículos en las categorías detalladas." );

define( "_AM_IMPRESSION_PERM_APERMISSIONS", "Grupos que pueden moderar" );
define( "_AM_IMPRESSION_PERM_APERMISSIONS_TEXT", "Seleccione los grupos que tendrán permisos de moderación en las categorías seleccionadas." );

define( "_AM_IMPRESSION_TIME", "Fecha:" );
define( "_AM_IMPRESSION_KEYWORDS", "Palabras clave:" );
define( "_AM_IMPRESSION_KEYWORDS_NOTE", "Las palabras clave deben estar separadas con una coma <br />(<i>palabra clave1, palabra clave2, palabra clave3, etc.</i>)" );
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION", "Meta descripción");
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION_DSC", "Para tener más éxito en las máquinas de búsqueda, puede personalizar la meta descripción que le gustaría usar para este artículo. Si deja el campo en blanco, se usará automáticamente el campo del texto de introducción del artículo.");

define("_AM_IMPRESSION_DATESUB_DSC", "Seleccione la fecha de publicación");
define("_AM_IMPRESSION_DATESUB", "Fecha de publicación");
define("_AM_IMPRESSION_READS", "Lecturas: ");

define( '_AM_IMPRESSION_PUBLISHED', 'Publicado' );
define( '_AM_IMPRESSION_OFFLINE', 'No activo' );
define( '_AM_IMPRESSION_REJECTED', 'Rechazado' );
define( '_AM_IMPRESSION_SUBMITTED', 'Enviado' );
define( '_AM_IMPRESSION_INFOMATION', 'Información' );
define( '_AM_IMPRESSION_NOTPUBLiSHED', 'No publicado' );

define( "_AM_IMPRESSION_IPAGE_SHOWLATEST", "¿Mostrar los últimos artículos publicados?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL", "¿Cuantos artículos se mostrarán?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC", "0 desactiva esta opción." );

define( '_AM_IMPRESSION_RSSFEED', 'Origen de RSS' );
define( '_AM_IMPRESSION_RSSFEEDCFG', 'Configuración del origen de RSS' );
define( '_AM_IMPRESSION_RSSFEEDDSC', 'Aquí puede configurar el origen de RSS para Impression.<br />Para más información, visite el sitio web <a href="http://www.rssboard.org/" target="_blank">RSS Advisory Board</a>.' );
define( '_AM_IMPRESSION_RSSACTIVE', 'Origen de RSS activado' );
define( '_AM_IMPRESSION_RSSACTIVEDSC', 'Seleccione <em>Sí</em> para activar el origen de RSS para Impression; seleccione <em>No</em> para desactivarlo.' );
define( '_AM_IMPRESSION_RSSTITLE', 'Título del origen de RSS' );
define( '_AM_IMPRESSION_RSSTITLEDSC', 'El nombre del canal; por él los internautas se referirán a este servicio. Si tiene un sitio web que contiene la misma información que el archivo RSS, el título de su canal debería ser el mismo que el del sitio web.' );
define( '_AM_IMPRESSION_RSSLINKS', 'Enlace al origen de RSS' );
define( '_AM_IMPRESSION_RSSLINKSDSC', 'El URL del sitio web correspondiente al canal.' );
define( '_AM_IMPRESSION_RSSDESCRIPTION', 'Descripción del origen de RSS' );
define( '_AM_IMPRESSION_RSSDESCRIPTIONDSC', 'Frase o sentencia que describe el canal.' );
define( '_AM_IMPRESSION_RSSIMAGE', 'Imagen del origen de RSS' );
define( '_AM_IMPRESSION_RSSIMAGEDSC', 'Especifique una imagen GIF, JPEG o PNG que será mostrada en el canal.' );
define( '_AM_IMPRESSION_RSSWIDTH', 'Ancho de la imagen del origen de RSS' );
define( '_AM_IMPRESSION_RSSWIDTHDSC', 'Indica el ancho de la misma en pixels.<br />El valor máximo es 144.' );
define( '_AM_IMPRESSION_RSSHEIGHT', 'Altura de la imagen del origen de RSS' );
define( '_AM_IMPRESSION_RSSHEIGHTDSC', 'Indica la altura de la misma en pixels.<br />El valor máximo es 400.' );
define( '_AM_IMPRESSION_RSSIMGTITLE', 'Título de la imagen del origen de RSS' );
define( '_AM_IMPRESSION_RSSIMGTITLEDSC', 'Describa la imagen como lo será por el atributo ALT de HTML &#60;img&#62; la etiqueta del canal será formateada en HTML.' );
define( '_AM_IMPRESSION_RSSIMGLINK', 'Enlace de la imagen del origen de RSS' );
define( '_AM_IMPRESSION_RSSIMGLINKDSC', 'Este es el URL del sitio; cuando el canal es mostrado la imagen es un enlace al sitio. (Nota: en la práctica, la imagen &#60;title&#62; y &#60;link&#62; deberían tener el mismo valor que el canal &#60;title&#62; and &#60;link&#62;).' );
define( '_AM_IMPRESSION_RSSTTL', 'ttl del origen de RSS' );
define( '_AM_IMPRESSION_RSSTTLDSC', 'Número de minutos en los que el canal permanecerá en caché antes de ser actualizado desde la fuente.' );
define( '_AM_IMPRESSION_RSSWEBMASTER', 'Administrador del origen de RSS' );
define( '_AM_IMPRESSION_RSSWEBMASTERDSC', 'Dirección de correo electrónico de la persona responsable de las cuestiones técnicas relativas al canal.' );
define( '_AM_IMPRESSION_RSSEDITOR', 'Editor del canal del origen de RSS' );
define( '_AM_IMPRESSION_RSSEDITORDSC', 'Dirección de correo electrónico de la persona responsable por el contenido editorial.' );
define( '_AM_IMPRESSION_RSSCATEGORY', 'Categoría del origen de RSS' );
define( '_AM_IMPRESSION_RSSCATEGORYDSC', 'Especifique una o más categorías para el canal. Siga las mismas reglas que  &#60;item&#62; elemento de la categoría.' );
define( '_AM_IMPRESSION_RSSGENERATOR', 'Generador del origen de RSS' );
define( '_AM_IMPRESSION_RSSGENERATORDSC', 'Llave indicando el programa usado para generar el canal.' );
define( '_AM_IMPRESSION_RSSCOPYRIGHT', 'Copyright del origen de RSS' );
define( '_AM_IMPRESSION_RSSCOPYRIGHTDSC', 'Contenido del Copyright del canal.' );
define( '_AM_IMPRESSION_RSSTOTAL', 'Total de enlaces del origen de RSS' );
define( '_AM_IMPRESSION_RSSTOTALDSC', 'Número total de enlaces que se mostrarán en el mismo.' );
define( '_AM_IMPRESSION_RSSDBUPDATED', 'La base de datos fue actualizada con éxito' );
define( '_AM_IMPRESSION_RSSOFFLINE', 'Título del mensaje cuando el origen de RSS está desactivado' );
define( '_AM_IMPRESSION_RSSOFFLINEDSC', '' );
define( '_AM_IMPRESSION_RSSOFFMSG', 'Mensaje cuando el origen de RSS esté desactivado' );
define( '_AM_IMPRESSION_RSSOFFMSGDSC', 'El mismo será usado como explicación del porqué de dicha circunstancia.' );
define( '_AM_IMPRESSION_RSSOFFTITLE', 'Este origen de RSS ha sido desactivado.' );
define( '_AM_IMPRESSION_RSSOFFMSGDEF', 'El origen de RSS ha sido temporalmente desactivado por necesidades de mantenimiento.' );
define( '_AM_IMPRESSION_RSSCLICKSUBMIT', 'Por favor, haga clic en <em>Enviar</em> para almacenar todos los valores del formulario en la base de datos' );
define( '_AM_IMPRESSION_COPYRIGHT', 'Copyright' );
define( '_AM_IMPRESSION_ICO_CLONE', 'Duplicar artículo' );
define( '_AM_IMPRESSION_CLONE', '**Duplicar**' );
define( '_AM_IMPRESSION_CLONEARTICLE', 'Duplicar artículo' );
define( '_AM_IMPRESSION_SHOWNOIMAGE' , 'No mostrar imagen' );
define( '_AM_IMPRESSION_NOSELECTION', 'No hay selección' );
define( '_AM_IMPRESSION_NOFILESELECT', 'No ha seleccionado ningún archivo' );
define( '_AM_IMPRESSION_PRUNE', 'Purgar' );
define( '_AM_IMPRESSION_PRUNEINFO', 'Purgar información' );
define( '_AM_IMPRESSION_PRUNEWARN', 'Puede eliminar artículos que están publicados antes de la fecha que elija.<br />Los comentarios de los mismos también serán eliminados.<br />Tenga en cuenta que esta acción <strong>es definitiva</strong> y no podrá recuperar la información eliminada: si tiene dudas, haga una copia de su base de datos con anterioridad.' );
define( '_AM_IMPRESSION_PRUNEDELETED', 'Los artículos fueron eliminados con éxito de la base de datos.' );
define( '_AM_IMPRESSION_PRUNEDATE', 'Seleccionar fecha:' );
define( '_AM_IMPRESSION_PRUNEDATEDSC', 'Todos los artículos anteriores a la fecha que seleccione serán eliminados.' );
define( '_AM_IMPRESSION_PRUNEFORM', 'Eliminar artículos antiguos' );
define( '_AM_IMPRESSION_NICEURL', 'Usar URL abreviado:' );
define( '_AM_IMPRESSION_NICEURLDSC', 'Use sólo letras y evite caracteres como <em><b>;:/&$?!%</b></em> Tampoco se visualizan correctamente los caracteres especiales del castellano, como la ñ o los acentos. Cuando la opción <em>Usar URL abreviado</em> en las preferencias del módulo está seleccionada y este campo está vacío, se usará el título del artículo.
' );
define( '_AM_IMPRESSION_ARTICLE_INBLOCKS', '¿Mostrar el articulo en los bloques?' );
define( '_AM_IMPRESSION_ARTICLE_INBLOCKS_DSC', 'Seleccione <em>Sí</em> para que se muestre en los bloques de Titulares y Artículos recientes. Si selecciona <em>No</em> no se mostrará en ninguno de ellos.' );
define( '_AM_IMPRESSION_MOD_INTROTEXT', 'Texto de introducción:' ); 
define( '_AM_IMPRESSION_CAT_INBLOCKS', '¿Mostrar la categoría del artículo en los bloques?' );
define( '_AM_IMPRESSION_CAT_INBLOCKS_DSC', 'Seleccione <em>Sí</em> para mostrar la categoría de cada artículo en los bloques del módulo. Si selecciona <em>No</em> se omitirá la misma en el contenido del bloque.' );
define( '_AM_IMPRESSION_ICO_INBLOCKN', 'No mostrar en los bloques' );
define( '_AM_IMPRESSION_ICO_INBLOCKY', 'Mostrar en los bloques' );

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