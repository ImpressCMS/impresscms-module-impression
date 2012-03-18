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
define( "_AM_IMPRESSION_BUPLOAD", "Carregar" );
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
define( "_AM_IMPRESSION_ARTICLE_OFF", "OFF" );
define( "_AM_IMPRESSION_ARTICLE_ON", "ON" );
define( "_AM_IMPRESSION_ARTICLE_CATIMAGE", "Imagens de Categoria" );
define( "_AM_IMPRESSION_ARTICLE_SCREENSHOTS", "Imagens de ScreenShots" );
define( "_AM_IMPRESSION_ARTICLE_MAINIMAGEDIR", "Imagens Principais" );
define( "_AM_IMPRESSION_ARTICLE_FCATIMAGE", "Caminho da Imagem da Categoria" );
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
define( "_AM_IMPRESSION_MINDEX_PAGE", "Página: " );
define( '_AM_IMPRESSION_MINDEX_PAGEINFOTXT', '<ul><li>Detalhes da página principal do Impression.</li><li>Você pode facilmente mudar a imagem do logotipo, título, índice principal, cabeçalho e rodapé do texto para se adequar ao seu próprio site</li></ul><br /> Nota: A imagem do logotipo escolhido será usado em todo o módulo Impression.' );
// Submitted Articles
define( "_AM_IMPRESSION_SUB_SUBMITTEDFILES", "Artigos enviados" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGINFO", "Artigos aguardando Informações" );
define( "_AM_IMPRESSION_SUB_FILESWAITINGVALIDATION", "Artigos Aguardando Validação: " );
define( "_AM_IMPRESSION_SUB_APPROVEWAITINGFILE", "<b>Aprovar</b> novas informações do artigo ainda sem validação." );
define( "_AM_IMPRESSION_SUB_EDITWAITINGFILE", "<b>Editar</b> artigo com novas informações e, em seguida, aprovar." );
define( "_AM_IMPRESSION_SUB_DELETEWAITINGFILE", "<b>Apagar</b> as informações sobre este novo artigo." );
define( "_AM_IMPRESSION_SUB_NOFILESWAITING", "Não existem artigos que correspondam a este Critério" );
define( "_AM_IMPRESSION_SUB_NEWFILECREATED", "Novo artigo foi criado e banco de dados atualizado com sucesso" );
// Modifications
define( "_AM_IMPRESSION_MOD_TOTMODREQUESTS", "Total de modificação solicitadas: " );
define( "_AM_IMPRESSION_MOD_MODREQUESTS", "Artigos modificados" );
define( "_AM_IMPRESSION_MOD_MODREQUESTSINFO", "Informação sobre os artigos modificados" );
define( "_AM_IMPRESSION_MOD_MODID", "ID" );
define( "_AM_IMPRESSION_MOD_MODTITLE", "Título" );
define( "_AM_IMPRESSION_MOD_MODPOSTER", "Mensagem Original: " );
define( "_AM_IMPRESSION_MOD_DATE", "Enviado" );
define( "_AM_IMPRESSION_MOD_NOMODREQUEST", "Não existem pedidos que correspondem a esse Critério" );
define( "_AM_IMPRESSION_MOD_TITLE", "Título do Artigo: " );
define( "_AM_IMPRESSION_MOD_AID", "ID do Artigo: " );
define( "_AM_IMPRESSION_MOD_CID", "Categoria: " );
define( "_AM_IMPRESSION_MOD_PUBLISHER", "Publiscado: " );
define( "_AM_IMPRESSION_MOD_FORUMID", "Forum: " );
define( "_AM_IMPRESSION_MOD_SCREENSHOT", "Imagem Screenshot: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGE", "Página Principal: " );
define( "_AM_IMPRESSION_MOD_HOMEPAGETITLE", "Título da Página principal: " );
define( "_AM_IMPRESSION_MOD_SHOTIMAGE", "Screenshot da imagem: " );
define( "_AM_IMPRESSION_MOD_DESCRIPTION", "Descrição: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMITTER", "Apresentado por: " );
define( "_AM_IMPRESSION_MOD_MODIFYSUBMIT", "Enviado" );
define( "_AM_IMPRESSION_MOD_PROPOSED", "Detalhe Proposto para este artigo" );
define( "_AM_IMPRESSION_MOD_ORIGINAL", "Detalhe Orginal deste artigo" );
define( "_AM_IMPRESSION_MOD_REQDELETED", "Pedido de Modificação foi removido do banco de dados" );
define( "_AM_IMPRESSION_MOD_REQUPDATED", "Artigo Selecionado foi modificado e banco de dados atualizado com sucesso" );
define( '_AM_IMPRESSION_MOD_VIEW', 'Visualizar' );
define( "_AM_IMPRESSION_MOD_META_KEYWORDS", "Keywords:" );
define( "_AM_IMPRESSION_MOD_ITEM_TAG", "Tags:" );
// Article management
define( "_AM_IMPRESSION_ARTICLE_ID", "ID: " );
define( "_AM_IMPRESSION_ARTICLE_IP", "Endereço IP: " );
define( "_AM_IMPRESSION_ARTICLE_ALLOWEDAMIME", "<div style='padding-top: 4px; padding-bottom: 4px;'><b>Extensões de Artigo Permitido no admin</b>:</div>" );
define( "_AM_IMPRESSION_ARTICLE_MODIFYFILE", "Modificar Informações do Artigo" );
define( "_AM_IMPRESSION_ARTICLE_CREATENEWFILE", "Criar Novo Artigo" );
define( "_AM_IMPRESSION_ARTICLE_TITLE", "Título:" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT", "Texto de Introdução do Artigo:" );
define( "_AM_IMPRESSION_ARTICLE_INTROTEXT_DSC", "<br />O texto digitado aqui irá funcionar como a primeira parte do artigo e será exibido no bloco Spotlight" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION", "Texto principal do Artigo:" );
define( "_AM_IMPRESSION_ARTICLE_DESCRIPTION_DSC", "<br />O texto digitado aqui irá ser mostrado junto com o texto de introdução no final do artigo " );
define( "_AM_IMPRESSION_ARTICLE_CATEGORY", "Categoria Principal:" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS", "Escolha o Status deste artigo:" );
define( "_AM_IMPRESSION_ARTICLE_FILESSTATUS_DSC", "Definir o artigo como publicado/offline/rejeitado" );
define( "_AM_IMPRESSION_ARTICLE_SETASAPPROVED", "Definir status do artigo como aprovado?" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATE", "Publicar o artigo em:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE_DSC", "<small>Selecione a data de publicação</small>");
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATE", "Artigo deverá expirar:" );
define( "_AM_IMPRESSION_ARTICLE_CLEARPUBLISHDATE", "<br /><br />Remover data de Publicação:" );
define( "_AM_IMPRESSION_ARTICLE_CLEAREXPIREDATE", "<br /><br />Remover data de Expiração:" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHDATESET", " Publicar em: " );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEPUBLISH", " Definir uma data/hora para a publicação" );
define( "_AM_IMPRESSION_ARTICLE_SETDATETIMEEXPIRE", " Definir uma data/hora para expirar" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBLISHDATE", "<b>Definir data de publicação em: </b>" );
define( "_AM_IMPRESSION_ARTICLE_SETNEWPUBLISHDATE", "<b>Definir nova data de publicação em: </b><br />Publiscado:" );
define( "_AM_IMPRESSION_ARTICLE_SETPUBDATESETS", "<b>Data de publicação: </b><br />Publicado na data:" );
define( "_AM_IMPRESSION_ARTICLE_EXPIREDATESET", " Expirar na data definida: " );
define( "_AM_IMPRESSION_ARTICLE_SETEXPIREDATE", "<b>Definir data de expiração: </b>" );
define( "_AM_IMPRESSION_ARTICLE_DELEDITMESS", "Excluir relatório discriminando?<br /><br /><span style='font-weight: normal;'>Quando você escolhe <b>SIM</b> o relatório de artigos com problemas será excluído automaticamente e você estará confirmando que o artigo trabalha agora novamente.</span>" );
define( "_AM_IMPRESSION_ARTICLE_MUSTBEVALID", "Imagem de Screenshot deve ser uma imagem válida nos termos do artigo no diretório %s (ex. shot.gif). Deixe-o em branco se não houver uma imagem para o artigo." );
define( "_AM_IMPRESSION_ARTICLE_EDITAPPROVE", "Aprovar artigo:" );
define( "_AM_IMPRESSION_ARTICLE_NEWFILEUPLOAD", "Novo artigo atualizado e o banco de dados criado com sucesso" );
define( "_AM_IMPRESSION_ARTICLE_FILEMODIFIEDUPDATE", "Artigo escolhido foi modificado e banco de dados atualizado com sucesso" );
define( "_AM_IMPRESSION_ARTICLE_REALLYDELETEDTHIS", "Realmente deseja apagar o artigo selecionado?" );
define( "_AM_IMPRESSION_ARTICLE_FILEWASDELETED", "Artigo %s removido com êxito da base de dados!" );
define( "_AM_IMPRESSION_ARTICLE_FILEAPPROVED", "Artigo aprovado e banco de dados atualizado com sucesso" );
define( "_AM_IMPRESSION_ARTICLE_PUBLISHER", "Nome do editor:" );
// About defines
define( "_AM_IMPRESSION_BY", "por" );
// Block defines
define( "_AM_IMPRESSION_BADMIN", "Administração de Blocos" );
define( "_AM_IMPRESSION_BLKDESC", "Descrição" );
define( "_AM_IMPRESSION_TITLE", "Título" );
define( "_AM_IMPRESSION_SIDE", "Alinhamento" );
define( "_AM_IMPRESSION_WEIGHT", "Peso" );
define( "_AM_IMPRESSION_VISIBLE", "Visível" );
define( "_AM_IMPRESSION_ACTION", "Ação" );
define( "_AM_IMPRESSION_SBLEFT", "Esquerda" );
define( "_AM_IMPRESSION_SBRIGHT", "Direita" );
define( "_AM_IMPRESSION_CBLEFT", "Centro-Esq" );
define( "_AM_IMPRESSION_CBRIGHT", "Centro-Dir" );
define( "_AM_IMPRESSION_CBCENTER", "Centro-Centro" );
define( "_AM_IMPRESSION_ACTIVERIGHTS", "Direito de Ativar" );
define( "_AM_IMPRESSION_ACCESSRIGHTS", "Direito de Acessar" );
// image admin icon
define( "_AM_IMPRESSION_ICO_EDIT", "Editar este artigo" );
define( "_AM_IMPRESSION_ICO_DELETE", "Apagar este artigo" );
define( "_AM_IMPRESSION_ICO_RESOURCE", "Editar este recurso" );
define( "_AM_IMPRESSION_ICO_ONLINE", "Publicado" );
define( "_AM_IMPRESSION_ICO_OFFLINE", "Offline" );
define( "_AM_IMPRESSION_ICO_APPROVED", "Aprovado" );
define( "_AM_IMPRESSION_ICO_NOTAPPROVED", "Não aprovado" );
define( "_AM_IMPRESSION_ICO_ARTICLE", "Artigo relacionado" );
define( "_AM_IMPRESSION_ICO_URL", "Incluir URL relacionada" );
define( "_AM_IMPRESSION_ICO_ADD", "Inclui" );
define( "_AM_IMPRESSION_ICO_APPROVE", "Aprovar" );
define( "_AM_IMPRESSION_ICO_STATS", "Estatística" );
define( "_AM_IMPRESSION_ICO_VIEW", "Ver este item" );
define( "_AM_IMPRESSION_ICO_IGNORE", "Ignorar" );
define( "_AM_IMPRESSION_ICO_REJECTED", "Rejeitado" );
define( "_AM_IMPRESSION_ICO_SUBMITTED", "Enviado" );
define( "_AM_IMPRESSION_ICO_RES", "Editar Recurso/Artigo para este Item" );
// Alternate category
define( "_AM_IMPRESSION_ALTCAT_CREATEF", "Adicionar categoria alternativa" );
define( "_AM_IMPRESSION_MALTCAT", "Gestão de categoria alternativa" );
define( "_AM_IMPRESSION_ALTCAT_MODIFYF", "Modicar a gestão de categoria alternativa" );
define( "_AM_IMPRESSION_ALTCAT_INFOTEXT", "<ul><li>Categorias alternativas podem ser acrescentadas ou removidas facilmente através deste formulário.</li></ul>" );
define( '_AM_IMPRESSION_ALTCAT_CREATED', 'Categorias alternativa foi salva!' );

define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS", "Auto aprovar artigos" );
define( "_AM_IMPRESSION_PERM_AUTOPERMISSIONS_TEXT", "Selecione os grupos onde os novos artigos serão automaticamente aprovados, sem a intervenção do admin." );

define( "_AM_IMPRESSION_PERM_SPERMISSIONS", "Permissões dos Editores" );
define( "_AM_IMPRESSION_PERM_SPERMISSIONS_TEXT", "Selecione os grupos que podem apresentar novos artigos para as categorias selecionadas." );

define( "_AM_IMPRESSION_PERM_APERMISSIONS", "Grupo de Moderadores" );
define( "_AM_IMPRESSION_PERM_APERMISSIONS_TEXT", "Selecione os grupos que podem moderar os privilégios das categorias selecionadas." );

define( "_AM_IMPRESSION_TIME", "Tempo:" );
define( "_AM_IMPRESSION_KEYWORDS", "Palavras-chave:" );
define( "_AM_IMPRESSION_KEYWORDS_NOTE", "Palavras-chave devem ser separadas por uma vírgula <br /> (<i> palavra1, palavra2, palavra3, etc.</i>)" );
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION", "Meta descrição");
define( "_AM_IMPRESSION_ARTICLE_META_DESCRIPTION_DSC", "A fim de ajudar os motores de busca, você pode personalizar a meta descrição que você gostaria de usar para este artigo. Se você deixar este campo em branco durante a criação de uma categoria, será automaticamente preenchida com o campo Resumo do presente artigo.");

define("_AM_IMPRESSION_DATESUB_DSC", "Selecione a data de publicação");
define("_AM_IMPRESSION_DATESUB", "Publicado");
define("_AM_IMPRESSION_READS", "Leituras: ");

define( '_AM_IMPRESSION_PUBLISHED', 'Publicado' );
define( '_AM_IMPRESSION_OFFLINE', 'Offline' );
define( '_AM_IMPRESSION_REJECTED', 'Rejeitado' );
define( '_AM_IMPRESSION_SUBMITTED', 'Enviado' );
define( '_AM_IMPRESSION_INFOMATION', 'Informação' );
define( '_AM_IMPRESSION_NOTPUBLiSHED', 'Não Publicado' );

define( "_AM_IMPRESSION_IPAGE_SHOWLATEST", "Mostrar Últimas listagens?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL", "Quantos artigos será mostrado?" );
define( "_AM_IMPRESSION_IPAGE_LATESTTOTAL_DSC", "0(zero) MUDA esta opção para off." );

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
define( '_AM_IMPRESSION_PRUNEWARN', 'This form gives you the opportunity to delete articles that are published before the selected date.<br />Also comments associated with these articles will be deleted.<br />Please note that this action can <strong>NOT</strong> be undone. That\'s why it\'s advised to make a backup of your database first.' );
define( '_AM_IMPRESSION_PRUNEDELETED', 'Articles successfully removed from the database!' );
define( '_AM_IMPRESSION_PRUNEDATE', 'Select date:' );
define( '_AM_IMPRESSION_PRUNEDATEDSC', 'All articles before the selected date will be deleted.' );
define( '_AM_IMPRESSION_PRUNEFORM', 'Delete old articles' );
define( '_AM_IMPRESSION_NICEURL', 'Alternative title for url:' );
define( '_AM_IMPRESSION_NICEURLDSC', 'Enter an alternative title for the article to be used in the url. When the option <em>Use nice urls</em> from Preferences is selected and this field is left empty, than the title of the article will be used.' );
define( '_AM_IMPRESSION_ARTICLE_INBLOCKS', 'Display article in blocks?' );
define( '_AM_IMPRESSION_ARTICLE_INBLOCKS_DSC', 'Select <em>Yes</em> to have the article displayed in the Spotlight and Recent Headlines blocks. If you select <em>No</em> the article will not be displayed in the two blocks.' );
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
?>