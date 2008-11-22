<?php
/**
 * $Id: modinfo.php
 * Module: ImPression
 * Language: portuguesebr 
 * Format: UTF-8
 * Author: McDonald
 * Translator: GibaPhp - http://br.impresscms.org
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME","Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC","Um simples módulo para criar artigos.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT","Spotlight");
define("_MI_IMPRESSION_BNEW","As recentes manchetes");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1","Enviar Artigo");
define("_MI_IMPRESSION_SMNAME2","Popular");
define("_MI_IMPRESSION_SMNAME3","Melhores Avaliados");
define("_MI_IMPRESSION_SMNAME4","Últimos Artigos");

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX","Principal");
define("_MI_IMPRESSION_INDEXPAGE","Página inicial de gerenciamento");
define("_MI_IMPRESSION_MCATEGORY","Gestor de Categorias");
define("_MI_IMPRESSION_MARTICLES","Gestor de Artigos");
define("_MI_IMPRESSION_MUPLOADS","Enviar Imagem");
define("_MI_IMPRESSION_PERMISSIONS","Permissões");
define("_MI_IMPRESSION_BLOCKADMIN","Blocos");

// Title of config items
define('_MI_IMPRESSION_POPULAR', 'Artigo Popular');
define('_MI_IMPRESSION_POPULARDSC', 'O número de leituras que um artigo será considerado como Popular no seu site.');

define("_MI_IMPRESSION_ICONDISPLAY","Artigo popular e novo:");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Selecione como você irá mostrar os ícones populares e os novos na sua lista de artigos.");
define("_MI_IMPRESSION_DISPLAYICON1", "Mostrar com ícones");
define("_MI_IMPRESSION_DISPLAYICON2", "Mostrar com Texto");
define("_MI_IMPRESSION_DISPLAYICON3", "Não mostrar");

define("_MI_IMPRESSION_DAYSNEW","Artigos novos do dia:");
define("_MI_IMPRESSION_DAYSNEWDSC","O número de dias que iremos considerar no status do artigo para mostrar ainda como sendo novo.");

define("_MI_IMPRESSION_DAYSUPDATED","Dias para Artigos atualizados:");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","O número de dias necessário para que um artigo seja considerado como Atualizado.");

define('_MI_IMPRESSION_PERPAGE', 'Número de Artigos na lista:');
define('_MI_IMPRESSION_PERPAGEDSC', 'Número de Artigos que será mostrado em cada categoria por padrão.');

define("_MI_IMPRESSION_ADMINPAGE", "Quantidade de artigos na página principal:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Número de novos artigos para exibição na área de admin do módulo.");

define("_MI_IMPRESSION_ARTICLESSORT", "Ordem padrão dos artigos:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Selecione o padrão para que as listatgens de artigos.");

define("_MI_IMPRESSION_SORTCATS", "Ordenar categorias por:");
define("_MI_IMPRESSION_SORTCATSDSC", "Seleccione como as categorias e subcategorias serão ordenadas.");

define('_MI_IMPRESSION_SUBCATS', 'Sub-categorias:');
define('_MI_IMPRESSION_SUBCATSDSC', 'Escolha <b>Sim</b> para exibir sub-categorias. Caso a sua opção seja Não, vai esconder Seleção de sub-categorias nas listagens');

define('_MI_IMPRESSION_EDITOR', "Editor para uso (admin):");
define('_MI_IMPRESSION_EDITORCHOICE', "Selecione o editor a ser utilizado na administração. Se você tem apenas o 'simples', você poderá instalar (por exemplo, uma classe de editores extra, fornecido no pacote padrão do sistema), ou então você pode simplesmente selecionar DHTML e compacto caso não exista outros tipos.");
define('_MI_IMPRESSION_EDITORUSER', "Editor para uso (lado do usuário):");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "Selecione o editor a ser utilizado no lado do usuário. Se você tem apenas o 'simples', você poderá instalar (por exemplo, uma classe de editores extra, fornecido no pacote padrão do sistema), ou então você pode simplesmente selecionar DHTML e compacto caso não exista outros tipos. Não esqueça de ajustar as permissões de outros editores no setor de grupos.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extendido");
define("_MI_IMPRESSION_FORM_COMPACT","Compacto");
define("_MI_IMPRESSION_FORM_HTMLAREA","Editor HtmlArea");
define("_MI_IMPRESSION_FORM_FCK","Editor FCK");
define("_MI_IMPRESSION_FORM_KOIVI","Editor Koivi");
define("_MI_IMPRESSION_FORM_TINYEDITOR","TinyEditor");
define('_MI_IMPRESSION_FORM_TINYMCE','TinyMCE');

define('_MI_IMPRESSION_USESHOTS', 'Mostrar Screenshot de Imagens?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Selecione sim para exibir ScreenShot (miniaturas) de imagens para cada artigo');

define('_MI_IMPRESSION_USETHUMBS', 'Usar miniaturas:');
define("_MI_IMPRESSION_USETHUMBSDSC", "Tipos suportados: JPG, GIF, PNG.<div style='padding-top: 8px;'>ImPression vai usar thumbnails (miniaturas) nas imagens. Escolha  'Não' para usar a imagem original se o servidor não suportar esta opção.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "Atualizar Miniaturas?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "Se as miniaturas de imagens estiver selecionada, será atualizado cada página, caso isto não esteja ativo, a primeira imagem em miniatura será usada de qualquer forma. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Diretório Principal de Imagens');

define('_MI_IMPRESSION_CATEGORYIMG','Diretório da Categoria de envio de Imagens');

define('_MI_IMPRESSION_DATEFORMAT', 'Timestamp:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'O padrão para datas é o timestamp no impression.<br />Veja também o <a href="http://jp.php.net/manual/pt_BR/function.date.php" target="_blank">Manual do PHP</a>');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Administração do Timestamp:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', 'O padrão para datas é o timestamp no impression.<br />Veja também o <a href="http://jp.php.net/manual/pt_BR/function.date.php" target="_blank">Manual do PHP</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Informe o total de caracteres para a descrição do artigo?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Definir o total de caracteres para a descrição dos artigos na página principal.");

define("_MI_IMPRESSION_OTHERARTICLES", "Mostrar outros artigos submetidos pelo mesmo autor?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Selecione Sim, se outros artigos do mesmo autor deve ser exibido.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Total de artigos na listagem de categorias?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Escolha Sim se pretender que a quantidade de artigos por categoria seja mostrado também. Esta opção executa processamento extra.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Mostrar bookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Selecione Sim caso queira os ícones do Social Bookmark  para ser exibido no âmbito deste artigo.");

define("_MI_IMPRESSION_USEMETADESCR", "Gerar meta descrição:");
define("_MI_IMPRESSION_USEMETADSC", "Com esta opção a meta descrição será baseado no artigo de introdução ou sumário.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Mostrar Termos de Uso antes de enviar o artigo?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Antes dos usuários incluirem um novo artigo, iremos mostrar o regulamento sobre como proceder e também o nosso regulamento.');

define('_MI_IMPRESSION_DISCLAIMER', 'Digite o texto para os termos de uso:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Mostrar termos de uso antes do usuário ver o artigo?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Mostra os termos de uso sobre o artigo antes que seja feito a abertura do artigo. Funciona muito bem para sites que desejam que seu conteúdo seja protegido contra robôs?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Digite o texto para os termos de uso para o artigo:');

define('_MI_IMPRESSION_COPYRIGHT', 'Aviso sobre Copyright:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Selecione esta opção para exibir um aviso sobre os direitos autorais deste artigo.');

//define('_MI_IMPRESSION_REFERERS', 'Esses sites podem enviar diretamente artigos para os seus vídeos <br />Separado com #');
//define("_MI_IMPRESSION_ANONPOST","Visitantes/Convidados podem enviar:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Permite que usuários anônimos/visitantes possam submeter ou enviar para o seu site?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto aprovar artigos submetidos');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Escolha este opção para aprovar artigos submetidos sem moderação. Use isto por sua conta e risco.');

define('_MI_IMPRESSION_MAXFILESIZE','Tamanho do Upload em (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Tamanho máximo de arquivo permitido para os arquivos enviados.');
define('_MI_IMPRESSION_IMGWIDTH','Comprimento da Imagem no Upload');
define('_MI_IMPRESSION_IMGWIDTHDSC','Comprimento máximo da imagem quando se envia arquivo de imagem.');
define('_MI_IMPRESSION_IMGHEIGHT','Altura da Imagem no Upload');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Altura máxima da imagem quando se envia para um arquivo do artigo');

define('_MI_IMPRESSION_UPLOADDIR','Pasta de Uploads (Sem barra no final)');
define('_MI_IMPRESSION_ALLOWSUBMISS','Sugestão de Usuários:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Permitir que os usuários possam enviar novos artigos');
define('_MI_IMPRESSION_ALLOWUPLOADS','Uploads de usuários:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Permitir aos usuários enviar artigos diretamente para o seu site');
define('_MI_IMPRESSION_SCREENSHOTS','Diretório de Screenshots para upload');

define("_MI_IMPRESSION_SUBMITART", "Enviar Artigos:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Selecionar os grupos que possam apresentar novos artigos.");

define("_MI_IMPRESSION_QUALITY", "Qualidade das miniaturas:");
define("_MI_IMPRESSION_QUALITYDSC", "Qualidade baixa:0 Maior:100");
define("_MI_IMPRESSION_KEEPASPECT", "Manter a relação de aspecto da imagem?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Título");
define("_MI_IMPRESSION_WEIGHT", "Peso");
define("_MI_IMPRESSION_POPULARITY", "Leituras");
define("_MI_IMPRESSION_SUBMITTED2", "Data de apresentação");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Global');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'Opções globais de notificações.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Categoria');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Opções de notificações correspondentes apenas à categoria corrente.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'Artigo');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Opções de notificações aplicadas ao artigo atual.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nova Categoria');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Avise-me quando uma nova categoria de artigo for criada.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receber uma notificação sobre todo pedidos para uma nova categoria de artigo for criada.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Nova categoria de artigo');

define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFY', 'Pedido de modificação do artigo');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYCAP', 'Avise-me quando qualquer modificação de artigo for enviada.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYDSC', 'Receber notificações para todo pedido de modificação de artigo.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Novo pedido de modificação de artigo');

define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFY', 'Notificação de Artigo corrompindo');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYCAP', 'Avise-me sobre relatórios de artigos quebrados.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYDSC', 'Receber notificações quando qualquer relatório de artigo quebrado for enviado.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Relatório de Artigo quebrado');

define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'Artigo Enviado');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Avise-me sobre todos os Artigos enviados (aguardando aprovação).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Receber notificação de todo artigo enviado (aguardando aprovação).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Novo artigo enviado');

define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'Novo Artigo');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Avise-me de todos novos Artigo for publicado.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Receber notificação de todo novo Artigo for publicado.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Novo artigo');

define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'Artigo Enviado');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Avise-me quando um novo Artigo for enviado (aguardando aprovação) para a categoria atual.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receber notificação quando novo Artigo for enviado (aguardando aprovação) para a categoria atual.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Novo Artigo enviado na categoria');

define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'Novo Artigo');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'Avise-me quando um novo Artigo for incluido na categoria atual.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Receber notificação quando um novo artigo for incluido na categoria atual.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Novo artigo na categoria');

define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Artigo Aprovado');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'Avise-me quando o artigo for aprovado.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Receber notificação quando o artigo for aprovado.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Notificação-Automática : Artigo Aprovado');

define('_MI_IMPRESSION_AUTHOR_INFO', "Informação do desenvolvedor");
define('_MI_IMPRESSION_AUTHOR_NAME', "Desenvolvedor");
define('_MI_IMPRESSION_AUTHOR_DEVTEAM', "Equipe de desenvolvimento");
define('_MI_IMPRESSION_AUTHOR_WEBSITE', "Site do desenvolvedor");
define('_MI_IMPRESSION_AUTHOR_EMAIL', "E-mail do desenvolvedor");
define('_MI_IMPRESSION_AUTHOR_CREDITS', "Créditos");
define('_MI_IMPRESSION_MODULE_INFO', "Informação do desenvolvimento do Módulo");
define('_MI_IMPRESSION_MODULE_STATUS', "Status do Desenvolvimento");
define('_MI_IMPRESSION_MODULE_DEMO', "Site de demonstração");
define('_MI_IMPRESSION_MODULE_SUPPORT', "Site de suporte oficial");
define('_MI_IMPRESSION_MODULE_BUG', "Relatar um erro");
define('_MI_IMPRESSION_MODULE_FEATURE', "Sugerir uma nova característica para este módulo");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Termos de uso");
define('_MI_IMPRESSION_RELEASE', "Data de lançamento: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Ícones por:");

define("_MI_IMPRESSION_HEADERPRINT","[PRINT OPTIONS] Imprimir cabeçalho da página");
define("_MI_IMPRESSION_HEADERPRINTDSC","Cabeçalho que será impresso para cada artigo");
define("_MI_IMPRESSION_PRINTLOGOURL","[PRINT OPTIONS] Imprimir url do Logo");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url do logotipo que será impresso na parte superior da página");
define("_MI_IMPRESSION_FOOTERPRINT","[PRINT OPTIONS] Imprimir página do rodapé");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Rodapé que vai ser impresso em cada artigo");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Item Rodapé");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Índice de rodapé");
define("_MI_IMPRESSION_BOTH_FOOTERS","Ambos os rodapés");
define("_MI_IMPRESSION_NO_FOOTERS","Nenhum");
define("_MI_IMPRESSION_ITEMFOOTER", "[PRINT OPTIONS] Item de rodapé");

define('_MI_IMPRESSION_WARNINGTEXT', "O SOFTWARE ESTÁ SENDO FORNECIDO PELO MCDONALD COMO ELE ESTÁ AGORA E COM TODAS AS FALHAS. 
 MCDONALD NÃO FORNECE SUPORTE OU GARANTIAR DE QUALQUER ESPÉCIE RELATIVAS A QUALIDADE, 
 SEGURANÇA OU ADEQUAÇÃO DESTE SOFTWARE, EXPRESSAS OU IMPLÍCITA, INCLUINDO, SEM LIMITAÇÃO, 
 QUAISQUER GARANTIAS IMPLÍCITAS DE COMERCIALIZAÇÃO, ADEQUAÇÃO A UM DETERMINADO FIM, OU NÃO VIOLAÇÃO. 
 ADEMAIS, MCDONALD NÃO FAZ REPRESENTAÇÕES OU GARANTIAS QUANTO À VERDADE, 
 EXATIDÃO OU INTEGRIDADE DE QUAISQUER DECLARAÇÕES, INFORMAÇÕES OU MATERIAIS 
 SOBRE ESTE SOFTWARE QUE ESTÁ CONTIDO NO SISTE DA LOJA McDonalds. 
 EM NENHUM ENVENTO MCDONALD VAI SER RESPONSABILIZADO POR QUAISQUER PROBLEMAS DIRETOS OU INDIRETOS, 
 PUNIÇÕES, ESPECIAIS, INCIDENTAIS OU CONSEQUENTES, NO ENTANTO, PODEM SURGIR, E MESMO SE MCDONALD 
 TENHA SIDO PREVIAMENTE INFORMADO SOBRE A POSSIBILIDADE DE TAIS DANOS..");

define('_MI_IMPRESSION_AUTHOR_CREDITSTEXT',"WF-Projects Equipe. Baseado no módulo WF-Links & MyTube, graças ao sonho-time para alguns códigos snippits.");
define('_MI_IMPRESSION_AUTHOR_BUGFIXES', "Histórico sobre correções de erros");

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "");

define("_MI_IMPRESSION_KEYLENGTH", "Digite o número máximo de caracteres para a meta palavras-chave:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "padrão é de 255 caracteres");
define("_MI_IMPRESSION_HEADLINES", "Em destaque" );
define("_MI_IMPRESSION_HEADLINESDSC", "Definir o número de manchetes para mostrar.");
define("_MI_IMPRESSION_BTAGCLOUD", "Tag Cloud");
define("_MI_IMPRESSION_BTOPTAG", "Top Tags");
define("_MI_IMPRESSION_LINKEDTERMS", "Link para termos no glossário?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "O módulo imGlossary precisa estar instalado e activo para este recurso funcionar corretamente." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Nome da pasta onde está o ImGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "O nome da pasta dentro de <b>modules</b> onde está o módulo imGlossary <br /> O Padrão é: <em>imglossary</em>" );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - uma cópia da licença GNU está amexada no arquivo (license.txt), presente neste módulo.' );
define( "_MI_IMPRESSION_CAPTCHA", "Usar captcha nos formulários de envio?" );
define( "_MI_IMPRESSION_CAPTCHADSC", "Escolha <em>Sim</em> para usar captcha quando o usuário for enviar uma informação para o site no formulário.<br />Padrão: <em>Sim</em>" );
define( '_MI_IMPRESSION_RSSFEED', 'RSS Feed' );
?>