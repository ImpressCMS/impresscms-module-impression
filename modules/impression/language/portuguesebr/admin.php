<?php
/**
 * $Id: admin.php
 * Module: ImPression
 * Language: portuguesebr 
 * Format: UTF-8
 * Author: McDonald
 * Translator: GibaPhp - http://br.impresscms.org
 */

define( "_AM_IMPRESSION_WARNINSTALL1", "AVISO: O diretório %s existe no seu servidor. <br />por razões de segurança, você deve remover este diretório." );
define( "_AM_IMPRESSION_WARNINSTALL2", "AVISO: O arquivo %s existe no seu servidor. <br />por razões de segurança, você deve remover este diretório." );
define( "_AM_IMPRESSION_WARNINSTALL3", "AVISO: O diretorio %s não existe no seu servidor. <br />Este local é necessário para o ImPression." );

define( "_AM_IMPRESSION_MODULE_NAME", "Impression" );

define( "_AM_IMPRESSION_BMODIFY", "Modificar" );
define( "_AM_IMPRESSION_BDELETE", "Apagar" );
define( "_AM_IMPRESSION_BCREATE", "Criar" );
define( "_AM_IMPRESSION_BADD", "Incluir" );
define( "_AM_IMPRESSION_BAPPROVE", "Aprovar" );
define( "_AM_IMPRESSION_BIGNORE", "Ignorar" );
define( "_AM_IMPRESSION_BCANCEL", "Cancelar" );
define( "_AM_IMPRESSION_BSAVE", "Salvar" );
define( "_AM_IMPRESSION_BRESET", "Limpar" );
define( "_AM_IMPRESSION_BMOVE", "Mover artigos" );
define( "_AM_IMPRESSION_BUPLOAD", "Upload" );
define( "_AM_IMPRESSION_BDELETEIMAGE", "Apagar imagens selecionadas" );
define( "_AM_IMPRESSION_BRETURN", "Voltar para onde você estava!" );
define( "_AM_IMPRESSION_DBERROR", "Acesso à Base de dados com erro" );
// Other Options
define( "_AM_IMPRESSION_TEXTOPTIONS", "Opções de texto:" );
define( "_AM_IMPRESSION_DISABLEHTML", " Desabilitar Tags HTML" );
define( "_AM_IMPRESSION_DISABLESMILEY", " Desabilitar icones de Smilie" );
define( "_AM_IMPRESSION_DISABLEXCODE", " Desabilitar BBcodes" );
define( "_AM_IMPRESSION_DISABLEIMAGES", " Desabilitar Imagens" );
define( "_AM_IMPRESSION_DISABLEBREAK", " Converter 'quebra de linha' ?" );
define( "_AM_IMPRESSION_UPLOADFILE", "Artigo atualizado com sucesso" );
define( "_AM_IMPRESSION_NOMENUITEMS", "Nenhum sub-item dentro do menu" );
// Admin Bread crumb
define( "_AM_IMPRESSION_PREFS", "Preferências" );
define( "_AM_IMPRESSION_BUPDATE", "Atualizar módulo" );
define( "_AM_IMPRESSION_BINDEX", "Página principal" );
define( "_AM_IMPRESSION_BPERMISSIONS", "Permissões" );
define( "_AM_IMPRESSION_BLOCKADMIN", "Config. Blocos" );
define( "_AM_IMPRESSION_GOMODULE", "Ir ao módulo" );
define( "_AM_IMPRESSION_ABOUT", "Sobre" );
// Admin Summary
define( "_AM_IMPRESSION_SCATEGORY", "Categoria: " );
define( "_AM_IMPRESSION_SFILES", "Artigos: " );
define( "_AM_IMPRESSION_SNEWFILESVAL", "Enviados: " );
define( "_AM_IMPRESSION_SMODREQUEST", "Modificados: " );
define( "_AM_IMPRESSION_SREVIEWS", "Revisões: " );
// Admin Main Menu
define( "_AM_IMPRESSION_MCATEGORY", "Administração de categorias" );
define( "_AM_IMPRESSION_MARTICLES", "Administrar Artigos" );
define( "_AM_IMPRESSION_INDEXPAGE", "Página principal da administração" );
define( "_AM_IMPRESSION_MUPLOADS", "Enviar imagem" );
// Catgeory defines
define( "_AM_IMPRESSION_CCATEGORY_CREATENEW", "Criar nova categoria" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY", "Modificar categoria" );
define( "_AM_IMPRESSION_CCATEGORY_MOVE", "Mover artigos da categoria" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_TITLE", "Título da categoria:" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILED", "Movimentação Falhou: Categoria não pode ser movida" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_FAILEDT", "Movimentação Falhou: Categoria não encontrada" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFY_MOVED", "Artigos Movidos" );
define( "_AM_IMPRESSION_CCATEGORY_CREATED", "Nova categoria criada e banco de dados atualizado com sucesso" );
define( "_AM_IMPRESSION_CCATEGORY_MODIFIED", "A Categoria escolhida foi modificada e o banco de dados foi atualizado com sucesso" );
define( "_AM_IMPRESSION_CCATEGORY_DELETED", "A Categoria escolhida foi removida e o banco de dados foi atualizado com sucesso" );
define( "_AM_IMPRESSION_CCATEGORY_AREUSURE", "ATENÇãO: Você tem certeza que deseja apagar esta categoria e TODOS os seus artigos e comentários?" );
define( "_AM_IMPRESSION_CCATEGORY_NOEXISTS", "Você precisa antes criar uma Categoria para incluir um artigo." );
define( "_AM_IMPRESSION_FCATEGORY_GROUPPROMPT", "Permissões de Acesso nas Categorias:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Selecione os grupos que podem acessar esta categoria.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_SUBGROUPPROMPT", "Permissões de Acesso nas Categorias:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Selecione os grupos que podem enviar novos artigos para esta categoria.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_MODGROUPPROMPT", "Permissões de Acesso nas Categorias:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Selecione os grupos que podem moderar esta categoria.</span></div>" );
define( "_AM_IMPRESSION_FCATEGORY_TITLE", "Título da categoria:" );
define( "_AM_IMPRESSION_FCATEGORY_WEIGHT", "Importância da categoria:" );
define( "_AM_IMPRESSION_FCATEGORY_SUBCATEGORY", "Colocar como sub-categoria:" );
define( "_AM_IMPRESSION_FCATEGORY_CIMAGE", "Selecionar imagem da categoria:" );
define( "_AM_IMPRESSION_FCATEGORY_DESCRIPTION", "Descrição da categoria:" );
define( "_AM_IMPRESSION_FCATEGORY_SUMMARY", "Sumário da categoria:" );
// Index page Defines
define( "_AM_IMPRESSION_IPAGE_UPDATED", "Página principal Modificada e o banco de dados foi atualizado com sucesso!" );
define( "_AM_IMPRESSION_IPAGE_INFORMATION", "Informação da página principal" );
define( "_AM_IMPRESSION_IPAGE_MODIFY", "Modificar página principal" );
define( "_AM_IMPRESSION_IPAGE_CIMAGE", "Selecione imagem do índice:" );
define( "_AM_IMPRESSION_IPAGE_CTITLE", "Título:" );
define( "_AM_IMPRESSION_IPAGE_CHEADING", "Cabeçalho:" );
define( "_AM_IMPRESSION_IPAGE_CHEADINGA", "Alinhamento do cabeçalho:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTER", "Rodapé:" );
define( "_AM_IMPRESSION_IPAGE_CFOOTERA", "Alinhamento do rodapé:" );
define( "_AM_IMPRESSION_IPAGE_CLEFT", "Alinhar na esquerda" );
define( "_AM_IMPRESSION_IPAGE_CCENTER", "Alinhar ao centro" );
define( "_AM_IMPRESSION_IPAGE_CRIGHT", "Alinhar na direita" );
// Permissions defines
define( "_AM_IMPRESSION_PERM_MANAGEMENT", "Administração de Permissões" );
define( "_AM_IMPRESSION_PERM_PERMSNOTE", "<div><b>NOTA:</b> Mesmo que as permissões sejam definidas corretamente aqui, um grupo pode não ter acesso ao Módulo ou aos Blocos se não definir o acesso ao módulo. Para fazer isto, vá até a <b>Administração do Sistema > Grupos </b>, escolha o grupo apropriado e dê-lhe acesso ao módulo.</div>" );
define( "_AM_IMPRESSION_PERM_CPERMISSIONS", "Permissões de Categoria" );
define( "_AM_IMPRESSION_PERM_CSELECTPERMISSIONS", "Escolha as categorias que cada grupo pode ver" );
define( "_AM_IMPRESSION_PERM_CNOCATEGORY", "Não foi possível ajustar permissões porque não há categorias criadas!" );
define( "_AM_IMPRESSION_PERM_FPERMISSIONS", "Permissões de artigos" );
define( "_AM_IMPRESSION_PERM_FNOFILES", "Não foi possível ajustar permissões porque não há artigos!" );
define( "_AM_IMPRESSION_PERM_FSELECTPERMISSIONS", "Escolha os artigos que cada grupo pode ver" );
// Upload defines
define( "_AM_IMPRESSION_ARTICLE_IMAGEUPLOAD", "Imagem enviada com sucesso para o servidor" );
define( "_AM_IMPRESSION_ARTICLE_NOIMAGEEXIST", "Erro: Nenhum artigo foi selecionado para fazer o upload. Por favor, tente novamente!" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEEXIST", "Imagem já existe na área upload!" );
define( "_AM_IMPRESSION_ARTICLE_FILEDELETED", "Artigo foi removido." );
define( "_AM_IMPRESSION_ARTICLE_FILEERRORDELETE", "Erro ao excluir o artigo: O artigo não foi encontrado no servidor." );
define( "_AM_IMPRESSION_ARTICLE_NOFILEERROR", "Erro ao excluir o artigo: O nº do artigo selecionado não existe para ser apagado." );
define( "_AM_IMPRESSION_ARTICLE_DELETEFILE", "AVISO: Você tem certeza que quer apagar o link desta imagem?" );
define( "_AM_IMPRESSION_ARTICLE_IMAGEINFO", "Status do Servidor" );
define( "_AM_IMPRESSION_ARTICLE_SPHPINI", "<b>Informação retirada do link PHP ini:</b>" );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODESTATUS", "Modo Seguro: " );
define( "_AM_IMPRESSION_ARTICLE_REGISTERGLOBALS", "Registros Globais: " );
define( "_AM_IMPRESSION_ARTICLE_SERVERUPLOADSTATUS", "Status de Uploads: " );
define( "_AM_IMPRESSION_ARTICLE_MAXUPLOADSIZE", "Tamanho Max de Upload: " );
define( "_AM_IMPRESSION_ARTICLE_MAXPOSTSIZE", "Tamanho Max de Mensagem: " );
define( "_AM_IMPRESSION_ARTICLE_SAFEMODEPROBLEMS", " (Isto pode causar problemas)" );
define( "_AM_IMPRESSION_ARTICLE_GDLIBSTATUS", "Suporte Biblioteca GD: " );
define( "_AM_IMPRESSION_ARTICLE_GDLIBVERSION", "Versão da Biblioteca GD: " );
define( "_AM_IMPRESSION_ARTICLE_GDON", "<b>Ativo</b> (Thumbnails Disponíveis)" );
define( "_AM_IMPRESSION_ARTICLE_GDOFF", "<b>Inativo</b> (Nenhum Thumbnail Disponível)" );
define( "_AM_IMPRESSION_ARTICLE_OFF", "<b>OFF</b>" );
define( "_AM_IMPRESSION_ARTICLE_ON", "<b>ON</b>" );
define( "_AM_IMPRESSION_ARTICLE_CATIMAGE", "Imagens de Categoria" );
define( "_AM_IMPRESSION_ARTICLE_SCREENSHOTS", "Imagens de ScreenShots" );
define( "_AM_IMPRESSION_ARTICLE_MAINIMAGEDIR", "Imagens Principais" );
define( "_AM_IMPRESSION_ARTICLE_FCATIMAGE", "Category Image Path" );
define( "_AM_IMPRESSION_ARTICLE_FSCREENSHOTS", "Caminho para Imagens de Categoria" );
define( "_AM_IMPRESSION_ARTICLE_FMAINIMAGEDIR", "Caminho para Imagens Principais" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGETO", "Enviar Imagem: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADPATH", "Caminho do Upload: " );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADURL", "URL de Upload: " );
define( "_AM_IMPRESSION_ARTICLE_FOLDERSELECTION", "Selecione Destino de Upload:" );
define( "_AM_IMPRESSION_ARTICLE_FSHOWSELECTEDIMAGE", "Mostrar Imagem Selecionada:" );
define( "_AM_IMPRESSION_ARTICLE_FUPLOADIMAGE", "Enviar nova imagem para a pasta selecionada:" );
// Main Index defines
define( "_AM_IMPRESSION_MINDEX_ARTICLESUMMARY", "Sumário sobre a administração do módulo" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHEDARTICLE", "Artigos Publicados:" );
define( "_AM_IMPRESSION_MINDEX_AUTOPUBLISHEDARTICLE", "Artigos auto publicados:" );
define( "_AM_IMPRESSION_MINDEX_AUTOEXPIRE", "Artigos com expiração automática:" );
define( "_AM_IMPRESSION_MINDEX_EXPIRED", "Artigos Expirados:" );
define( "_AM_IMPRESSION_MINDEX_OFFLINEARTICLE", "Artigos Offline:" );
define( "_AM_IMPRESSION_MINDEX_ID", "ID" );
define( "_AM_IMPRESSION_MINDEX_TITLE", "Título do Artigo" );
define( "_AM_IMPRESSION_MINDEX_CATTITLE", "Categoria" );
define( "_AM_IMPRESSION_MINDEX_POSTER", "Autor" );
define( "_AM_IMPRESSION_MINDEX_ONLINE", "Status" );
define( "_AM_IMPRESSION_MINDEX_ONLINESTATUS", "Status Online" );
define( "_AM_IMPRESSION_MINDEX_PUBLISH", "Publicado" );
define( "_AM_IMPRESSION_MINDEX_PUBLISHED", "Publicado" );
define( "_AM_IMPRESSION_MINDEX_EXPIRE", "Expirado" );
define( "_AM_IMPRESSION_MINDEX_NOTSET", "Data não ajustada" );
define( "_AM_IMPRESSION_MINDEX_SUBMITTED", "Data do envio" );
define( "_AM_IMPRESSION_MINDEX_ACTION", "Ação" );
define( "_AM_IMPRESSION_MINDEX_NOARTICLESFOUND", "Aviso: Nenhum artigo corresponde com esta caracteristica informada" );
define( "_AM_IMPRESSION_MINDEX_PAGE", "<b>Página:<b> " );
define( '_AM_IMPRESSION_MINDEX_PAGEINFOTXT', '<ul><li>Detalhes da página principal do Impression.</li><li>Você pode facilmente mudar a imagem do logotipo, título, índice principal, cabeçalho e rodapé do texto para se adequar ao seu próprio site</li></ul><br /> Nota: A imagem do logotipo escolhido será usado em todo o módulo Impression.' );
// Submitted Articles
define( "_AM_IMPRESSION_SUB_SUBMITTEDFILES", "Submitted Articles" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGINFO", "Waiting Articles Information" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGVALIDATION", "Articles Waiting Validation: " );
define( "_AM_IMPRESSION_SUB_APPROVEWAITINGFILE", "<b>Approve</b> new article information without validation." );
define( "_AM_IMPRESSION_SUB_EDITWAITINGFILE", "<b>Edit</b> new article information and then approve." );
define( "_AM_IMPRESSION_SUB_DELETEWAITINGFILE", "<b>Delete</b> the new article information." );
define( "_AM_IMPRESSION_SUB_NOFILESWAITING", "There are no articles that match this critera" );
define( "_AM_IMPRESSION_SUB_NEWFILECREATED", "New Article Data Created and Database Updated Successfully" );
// Modifications
define( "_AM_IMPRESSION_MOD_TOTMODREQUESTS", "Total modification requests: " );
define( "_AM_IMPRESSION_MOD_MODREQUESTS", "Modified articles" );
define( "_AM_IMPRESSION_MOD_MODREQUESTSINFO", "Modified Articles Information" );
define( "_AM_IMPRESSION_MOD_MODID", "ID" );
define( "_AM_IMPRESSION_MOD_MODTITLE", "Title" );
define( "_AM_IMPRESSION_MOD_MODPOSTER", "Original poster: " );
define( "_AM_IMPRESSION_MOD_DATE", "Submitted" );
define( "_AM_IMPRESSION_MOD_NOMODREQUEST", "There are no requests that match this critera" );
define( "_AM_IMPRESSION_MOD_TITLE", "Article Title: " );
define( "_AM_IMPRESSION_MOD_AID", "Article ID: " );
define( "_AM_IMPRESSION_MOD_CID", "Category: " );
define( "_AM_IMPRESSION_MOD_PUBLISHER", "Publisher: " );
define( "_AM_IMPRESSION_MOD_FORUMID", "Forum: " );
define( "_AM_IMPRESSION_MOD_SCREENSHOT", "Screenshot image: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGE", "Home page: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGETITLE", "Home page title: " );
define( "_AM_IMPRESSION_MOD_SHOTIMAGE", "Screenshot image: " );
define( "_AM_IMPRESSION_MOD_DESCRIPTION", "Description: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMITTER", "Submitter: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMIT", "Submitter" );
define( "_AM_IMPRESSION_MOD_PROPOSED", "Proposed article details" );
define( "_AM_IMPRESSION_MOD_ORIGINAL", "Orginal article details" );
define( "_AM_IMPRESSION_MOD_REQDELETED", "Modification request removed from the database" );
define( "_AM_IMPRESSION_MOD_REQUPDATED", "Selected article modified and database updated successfully" );
define( '_AM_IMPRESSION_MOD_VIEW', 'View' );
// Article management
define( "_AM_IMPRESSION_ARTICLE_ID", "Article ID: " );
define( "_AM_IMPRESSION_ARTICLE_IP", "IP address: " );
define( "_AM_IMPRESSION_ARTICLE_ALLOWEDAMIME", "<div style='padding-top: 4px; padding-bottom: 4px;'><b>Allowed admin article extensions</b>:</div>" );
define( "_AM_IMPRESSION_ARTICLE_MODIFYFILE", "Modify Article Information" );
define( "_AM_IMPRESSION_ARTICLE_CREATENEWFILE", "Create New Article" );
define( "_AM_IMPRESSION_ARTICLE_TITLE", "<b>Title:</b>" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT", "<b>Article intro text:</b>" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT_DSC", "<br />The text entered here will function as the first part of the article and will be displayed in the Spotlight block" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION", "<b>Article main text:</b>" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC", "<br />The text entered here is together with the text entered as intro text the total article" );
define( "_AM_IMPRESSION_ARTICLE_CATEGORY", "<b>Main category:</b>" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS", "<b>Set article status:</b>" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC", "<small>Set article as published/offline/rejected</small>" );
define( "_AM_IMPRESSION_ARTICLE_SETASAPPROVED", "Set article status as approved?" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATE", "Article publish date:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC", "<small>Select the date of publication</small>");
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATE", "Article expire date:" );
define( "_AM_IMPRESSION_ARTICLE_CLEARPUBLISHDATE", "<br /><br />Remove Publish date:" );
define( "_AM_IMPRESSION_ARTICLE_CLEAREXPIREDATE", "<br /><br />Remove Expire date:" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATESET", " Publish date set: " );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEPUBLISH", " Set the date/time of publish" );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEEXPIRE", " Set the date/time of expire" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE", "<b>Set publish date: </b>" );
define( "_AM_IMPRESSION_ARTICLE_SETNEWPUBLISHDATE", "<b>Set new publish date: </b><br />Published:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBDATESETS", "<b>Publish date set: </b><br />Publishes on date:" );
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATESET", " Expire date set: " );
define( "_AM_IMPRESSION_ARTICLE_SETEXPIREDATE", "<b>Set expire date: </b>" );
define( "_AM_IMPRESSION_ARTICLE_DELEDITMESS", "Delete broken report?<br /><br /><span style='font-weight: normal;'>When you choose <b>YES</b> the broken report will automatically deleted and you confirm that the article now works again.</span>" );
define( "_AM_IMPRESSION_ARTICLE_MUSTBEVALID", "Screenshot image must be a valid image article under %s directory (ex. shot.gif). Leave it blank if there is no image link." );
define( "_AM_IMPRESSION_ARTICLE_EDITAPPROVE", "Approve article:" );
define( "_AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD", "New article created and database updated successfully" );
define( "_AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE", "Selected article modified and database updated successfully" );
define( "_AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS", "Really delete the selected article?" );
define( "_AM_IMPRESSION_ARTICLE_FILEWASDELETED", "Article %s successfully removed from the database!" );
define( "_AM_IMPRESSION_ARTICLE_FILEAPPROVED", "Article approved and database updated successfully" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHER", "<b>Publisher name:</b>" );
// About defines
define( "_AM_IMPRESSION_BY", "by" );
// Block defines
define( "_AM_IMPRESSION_BADMIN", "Block Administration" );
define( "_AM_IMPRESSION_BLKDESC", "Description" );
define( "_AM_IMPRESSION_TITLE", "Title" );
define( "_AM_IMPRESSION_SIDE", "Alignment" );
define( "_AM_IMPRESSION_WEIGHT", "Weight" );
define( "_AM_IMPRESSION_VISIBLE", "Visible" );
define( "_AM_IMPRESSION_ACTION", "Action" );
define( "_AM_IMPRESSION_SBLEFT", "Left" );
define( "_AM_IMPRESSION_SBRIGHT", "Right" );
define( "_AM_IMPRESSION_CBLEFT", "Center left" );
define( "_AM_IMPRESSION_CBRIGHT", "Center right" );
define( "_AM_IMPRESSION_CBCENTER", "Center middle" );
define( "_AM_IMPRESSION_ACTIVERIGHTS", "Active rights" );
define( "_AM_IMPRESSION_ACCESSRIGHTS", "Access rights" );
// image admin icon
define( "_AM_IMPRESSION_ICO_EDIT", "Edit this article" );
define( "_AM_IMPRESSION_ICO_DELETE", "Delete this article" );
define( "_AM_IMPRESSION_ICO_RESOURCE", "Edit this resource" );
define( "_AM_IMPRESSION_ICO_ONLINE", "Published" );
define( "_AM_IMPRESSION_ICO_OFFLINE", "Offline" );
define( "_AM_IMPRESSION_ICO_APPROVED", "Approved" );
define( "_AM_IMPRESSION_ICO_NOTAPPROVED", "Not approved" );
define( "_AM_IMPRESSION_ICO_ARTICLE", "Related article" );
define( "_AM_IMPRESSION_ICO_URL", "Add related URL" );
define( "_AM_IMPRESSION_ICO_ADD", "Add" );
define( "_AM_IMPRESSION_ICO_APPROVE", "Approve" );
define( "_AM_IMPRESSION_ICO_STATS", "Stats" );
define( "_AM_IMPRESSION_ICO_VIEW", "View this item" );
define( "_AM_IMPRESSION_ICO_IGNORE", "Ignore" );
define( "_AM_IMPRESSION_ICO_REJECTED", "Rejected" );
define( "_AM_IMPRESSION_ICO_SUBMITTED", "Submitted" );
define( "_AM_IMPRESSION_ICO_RES", "Edit Resources/Articles for this Item" );
define( "_AM_IMPRESSION_MOD_URLRATING", "Interent Content Rating:" );
// Alternate category
define( "_AM_IMPRESSION_ALTCAT_CREATEF", "Add alternate category" );
define( "_AM_IMPRESSION_MALTCAT", "Alternate category management" );
define( "_AM_IMPRESSION_ALTCAT_MODIFYF", "Alternate category management" );
define( "_AM_IMPRESSION_ALTCAT_INFOTEXT", "<ul><li>Alternate categories can be added or removed easily via this form.</li></ul>" );
define( '_AM_IMPRESSION_ALTCAT_CREATED', 'Alternate categories was saved!' );

define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS", "Auto approve articles" );
define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT", "Select the groups that will have new articles auto approved without admin intervention." );

define( "_AM_IMPRESSION_PERM_SPERMISSIONS", "Submitter permissions" );
define( "_AM_IMPRESSION_PERM_SPERMISSIONS_TEXT", "Select the groups who can submit new articles to selected categories." );

define( "_AM_IMPRESSION_PERM_APERMISSIONS", "Moderator groups" );
define( "_AM_IMPRESSION_PERM_APERMISSIONS_TEXT", "Select the groups who have moderator privligages for the selected categories." );

define( "_AM_IMPRESSION_TIME", "Time:" );
define( "_AM_IMPRESSION_KEYWORDS", "<b>Keywords:</b>" );
define( "_AM_IMPRESSION_KEYWORDS_NOTE", "Keywords should be seperated with a comma <br />(<i>keyword1, keyword2, keyword3, etc.</i>)" );
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION", "Meta description");
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION_DSC", "In order to help Search Engines, you can customize the meta description you would like to use for this article. if you leave this field empty when creating a category, it will automatically be populated with the Summary field of this article.");

define("_AM_IMPRESSION_DATESUB_DSC", "Select the date of publication");
define("_AM_IMPRESSION_DATESUB", "Published date");
define("_AM_IMPRESSION_READS", "Reads: ");

define( '_AM_IMPRESSION_PUBLISHED', 'Published' );
define( '_AM_IMPRESSION_OFFLINE', 'Offline' );
define( '_AM_IMPRESSION_REJECTED', 'Rejected' );
define( '_AM_IMPRESSION_SUBMITTED', 'Submitted' );
define( '_AM_IMPRESSION_INFOMATION', 'Information' );
define( '_AM_IMPRESSION_NOTPUBLiSHED', 'Not Published' );

define( "_AM_IMPRESSION_IPAGE_SHOWLATEST", "Show Latest Listings?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL", "How many articles to show?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC", "0 Turns this option off." );
?>