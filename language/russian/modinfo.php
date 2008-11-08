<?php
/**
 * $Id$ Russian translation. Charset: utf-8 (without BOM)
 * Module: Impression
 * Language: Russian
 * Format: UTF-8 
 * Author: McDonald
 */

// Module Info
// The name of this module
define("_MI_IMPRESSION_NAME","Impression");

// A brief description of this module
define("_MI_IMPRESSION_DESC","Простой модуль для создания статей.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_IMPRESSION_BSPOT","Первый план");
define("_MI_IMPRESSION_BNEW","Последние заголовки");

// Sub menu titles
define("_MI_IMPRESSION_SMNAME1","Разместить статью");
define("_MI_IMPRESSION_SMNAME2","Популярные");
define("_MI_IMPRESSION_SMNAME3","Топ оцененных");
define("_MI_IMPRESSION_SMNAME4","Новые");

// Names of admin menu items
define("_MI_IMPRESSION_BINDEX","Индекс");
define("_MI_IMPRESSION_INDEXPAGE","Индексная страница");
define("_MI_IMPRESSION_MCATEGORY","Категории");
define("_MI_IMPRESSION_MARTICLES","Статьи");
define("_MI_IMPRESSION_MUPLOADS","Изображения");
define("_MI_IMPRESSION_PERMISSIONS","Права доступа");
define("_MI_IMPRESSION_BLOCKADMIN","Блоки");

// Title of config items
define('_MI_IMPRESSION_POPULAR', 'Число популярности');
define('_MI_IMPRESSION_POPULARDSC', 'Количество обращений к статье до получения ей статуса полулярности.');

define("_MI_IMPRESSION_ICONDISPLAY","Отображение статей");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Выбрать способ отображения популярных и новых иконок в списке статей.");
define("_MI_IMPRESSION_DISPLAYICON1", "Показывать как иконки");
define("_MI_IMPRESSION_DISPLAYICON2", "Показывать как текст");
define("_MI_IMPRESSION_DISPLAYICON3", "Не показывать");

define("_MI_IMPRESSION_DAYSNEW","Новизна статьи");
define("_MI_IMPRESSION_DAYSNEWDSC","Количество дней, в течение которых статья считается новой.");

define("_MI_IMPRESSION_DAYSUPDATED","Обновленность статьи");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","Количество дней, в течение которых статья будет считаться обновленной.");

define('_MI_IMPRESSION_PERPAGE', 'Статей в списке');
define('_MI_IMPRESSION_PERPAGEDSC', 'Количество статей, показываемых в каждом списке категории.');

define("_MI_IMPRESSION_ADMINPAGE", "Admin index articles count:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Number of new articles to display in module admin area.");

define("_MI_IMPRESSION_ARTICLESSORT", "Default article order:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Select the default order for the article listings.");

define("_MI_IMPRESSION_SORTCATS", "Сортировать категории по:");
define("_MI_IMPRESSION_SORTCATSDSC", "Выберите по какому параметру сортировать категории и подкатегории.");

define('_MI_IMPRESSION_SUBCATS', 'Наличие подкатегорий');
define('_MI_IMPRESSION_SUBCATSDSC', 'Выберите Да для отображения подкатегорий. Выберите Нет, чтобы не показывать подкатегории в списке');

define('_MI_IMPRESSION_EDITOR', "Редактор для администратора:");
define('_MI_IMPRESSION_EDITORCHOICE', "Выбор редактора, который будет использовать администратор.");
define('_MI_IMPRESSION_EDITORUSER', "Редактор для пользователя:");
define('_MI_IMPRESSION_EDITORCHOICEUSER', "Выбор редактора, который будут использовать пользователи.");
define("_MI_IMPRESSION_FORM_DHTML","DHTML");
define("_MI_IMPRESSION_FORM_DHTMLEXT", "DHTML Extended");
define("_MI_IMPRESSION_FORM_COMPACT","Compact");
define("_MI_IMPRESSION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_IMPRESSION_FORM_FCK","FCK Editor");
define("_MI_IMPRESSION_FORM_KOIVI","Koivi Editor");
define("_MI_IMPRESSION_FORM_TINYEDITOR","TinyEditor");
define('_MI_IMPRESSION_FORM_TINYMCE','TinyMCE');

define('_MI_IMPRESSION_USESHOTS', 'Показывать картинку образа экрана?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Выбрать Да для показа образов экрана для каждой статьи');

define('_MI_IMPRESSION_USETHUMBS', 'Использовать наброски (контрольки)?');
define("_MI_IMPRESSION_USETHUMBSDSC", "Поддерживаемые типы файлов: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression будет использовать наброски для изображений. Установите 'Нет' для использования оригинального изображения в случае, если сервер не поддерживает эту опцию.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "Обновлять наброски?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Основное изображение каталога');

define('_MI_IMPRESSION_CATEGORYIMG','Каталог для загрузки изображений категории');

define('_MI_IMPRESSION_DATEFORMAT', 'Timestamp:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Default timestamp for Impression.<br />See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Формат даты для администратора:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', 'Формат даты для администратора в Impression.<br />Смотрите <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP руководство</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Set total amount of characters for description?");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Set total amount of characters for description on Index Page.");

define("_MI_IMPRESSION_OTHERARTICLES", "Show other articles submitted by Submitter?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Select Yes if other articles of the submitter should be displayed.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Show article count in category list?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Select Yes if you want the amount of articles per category have displayed.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Show social bookmarks?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Select Yes if you want Social Bookmark icons to be displayed under article.");

define("_MI_IMPRESSION_USEMETADESCR", "Generate meta description:");
define("_MI_IMPRESSION_USEMETADSC", "With this option the meta description will be based on the article introtext.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Показать предупреждение об ответственности перед размещением статьи?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Перед тем, как пользователь сможет разместить статью могут быть показаны правила');

define('_MI_IMPRESSION_DISCLAIMER', 'Текст предупреждения об ответственности при размещении статьи:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Показать сообщение об отвественности перед размещением статьи?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Show article regulations перед открытием статьи?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Текст предупреждения об ответственности при создании статьи:');

define('_MI_IMPRESSION_COPYRIGHT', 'Copyright notice:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Select to display a copyright notice on article page.');

//define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
//define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Размер загружаемого файла (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Максимальный размер статьи, разрешенный для загрузки.');
define('_MI_IMPRESSION_IMGWIDTH','Ширина загружаемой картинки');
define('_MI_IMPRESSION_IMGWIDTHDSC','Максимальный размер файла картинки, разрешенный для загрузки изображения статей');
define('_MI_IMPRESSION_IMGHEIGHT','Высота загружаемой картинки');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Максимальная высота картинки, зарешенная для загрузки изображения статьи');

define('_MI_IMPRESSION_UPLOADDIR','Каталог для загрузки (без завершающего слэша)');
define('_MI_IMPRESSION_ALLOWSUBMISS','User submissions:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Разрешить пользователям размещать статьи?');
define('_MI_IMPRESSION_ALLOWUPLOADS','User uploads:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Разрешить пользователям загружать статьи напрямую на Ваш сайт');
define('_MI_IMPRESSION_SCREENSHOTS','Каталог для загрузки изображений экрана');

define("_MI_IMPRESSION_SUBMITART", "Article submission:");
define("_MI_IMPRESSION_SUBMITARTDSC", "Вбрать группы, пользователи которых могут размещать новые статьи.");

define("_MI_IMPRESSION_QUALITY", "Качество набросков:");
define("_MI_IMPRESSION_QUALITYDSC", "Низшее: 0, Высшее: 100");
define("_MI_IMPRESSION_KEEPASPECT", "Сохранять пропорции изображения?");
define("_MI_IMPRESSION_KEEPASPECTDSC", "");

define("_MI_IMPRESSION_TITLE", "Заголовок");
define("_MI_IMPRESSION_WEIGHT", "Вес");
define("_MI_IMPRESSION_POPULARITY", "Прочтения");
define("_MI_IMPRESSION_SUBMITTED2", "Дата размещения");

// Text for notifications
define('_MI_IMPRESSION_GLOBAL_NOTIFY', 'Общие');
define('_MI_IMPRESSION_GLOBAL_NOTIFYDSC', 'Общие опции оповещений.');
define('_MI_IMPRESSION_CATEGORY_NOTIFY', 'Категория');
define('_MI_IMPRESSION_CATEGORY_NOTIFYDSC', 'Опции оповещений, которые добавляются к текущей категории статей.');
define('_MI_IMPRESSION_ARTICLE_NOTIFY', 'Статья');
define('_MI_IMPRESSION_FILE_NOTIFYDSC', 'Опции оповещений, которые добавляются к текущей статье.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFY', 'Новая категория');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Оповестить меня, когда будет создана новая категория статей.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Получить оповещение, когда будет создана новая категория статей.');
define('_MI_IMPRESSION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Новая категория статей');

define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFY', 'Запрос о редактировании статьи');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYCAP', 'Оповестить меня о запросе на редактирование любой статьи.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYDSC', 'Получить оповещение, когда будет размещен запрос на редактирование любой статьи.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Запрос на редактирование статьи');

define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFY', 'Обнаружена некорректная статья');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYCAP', 'Оповестить меня, когда будет сообщено о любой некоррктной статье.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYDSC', 'Получить оповещение, когда будет размещен запрос о любой некорректной статье.');
define('_MI_IMPRESSION_GLOBAL_ARTICLEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Сообщение о некорректной статье');

define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFY', 'Размещено видео');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYCAP', 'Notify me when any new video is submitted (awaiting approval).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYDSC', 'Receive notification when any new video is submitted (awaiting approval).');
define('_MI_IMPRESSION_GLOBAL_ARTICLESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Разещено новое видео');

define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFY', 'Новое видео');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYCAP', 'Notify me when any new video is posted.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYDSC', 'Receive notification when any new video is posted.');
define('_MI_IMPRESSION_GLOBAL_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Новое видео');

define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFY', 'Размещено видео');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notify me when a new video is submitted (awaiting approval) to the current category.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new video is submitted (awaiting approval) to the current category.');
define('_MI_IMPRESSION_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : В категории размещено новое видео');

define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFY', 'Новое видео');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYCAP', 'Notify me when a new video is posted to the current category.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYDSC', 'Receive notification when a new video is posted to the current category.');
define('_MI_IMPRESSION_CATEGORY_NEWARTICLE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Новое видео в категории');

define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFY', 'Видео одобрено');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYCAP', 'Notify me when this Video is approved.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYDSC', 'Receive notification when this video is approved.');
define('_MI_IMPRESSION_ARTICLE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автооповещение : Видео одобрено');

define('_MI_IMPRESSION_AUTHOR_INFO', "Информация о разработчиках");
define('_MI_IMPRESSION_AUTHOR_NAME', "Разработчик");
define('_MI_IMPRESSION_AUTHOR_DEVTEAM', "Команда разработчиков");
define('_MI_IMPRESSION_AUTHOR_WEBSITE', "Вэбсайт разработчиков");
define('_MI_IMPRESSION_AUTHOR_EMAIL', "Email разработчика");
define('_MI_IMPRESSION_AUTHOR_CREDITS', "Участники");
define('_MI_IMPRESSION_MODULE_INFO', "Информация о разработке модуля");
define('_MI_IMPRESSION_MODULE_STATUS', "Статус разработки");
define('_MI_IMPRESSION_MODULE_DEMO', "Демо сайт");
define('_MI_IMPRESSION_MODULE_SUPPORT', "Официальный сайт поддержки");
define('_MI_IMPRESSION_MODULE_BUG', "Report a bug for this module");
define('_MI_IMPRESSION_MODULE_FEATURE', "Предложение новых свойств для этого модуля");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Предупреждение об ответственности");
define('_MI_IMPRESSION_RELEASE', "Дата релиза: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Иконки от:");

define("_MI_IMPRESSION_HEADERPRINT","Заголовок на печатной странице");
define("_MI_IMPRESSION_HEADERPRINTDSC","Header that will be printed for each article");
define("_MI_IMPRESSION_PRINTLOGOURL","Url логотипа на печатной странице");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url of the logo that will be printed at the top of the page");
define("_MI_IMPRESSION_FOOTERPRINT","Подпись на печатной странице");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Подпись, которая будет присутствовать на каждой странице статьи при печати");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Подписывать страницы статей?");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Подпиывать индексную страницу?");
define("_MI_IMPRESSION_BOTH_FOOTERS","Обе подписи");
define("_MI_IMPRESSION_NO_FOOTERS","Ничего");
define("_MI_IMPRESSION_ITEMFOOTER", "Подпись на странице статьи");

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

define("_MI_IMPRESSION_KEYLENGTH", "Enter max. characters for meta keywords:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "default is 255 characters");
define("_MI_IMPRESSION_HEADLINES", "Заголовки" );
define("_MI_IMPRESSION_HEADLINESDSC", "Set the number of headlines to show.");
define("_MI_IMPRESSION_BTAGCLOUD", "Облако тэгов Impression");
define("_MI_IMPRESSION_BTOPTAG", "Топ тэгов Impression");
define("_MI_IMPRESSION_LINKEDTERMS", "Ссылаться на термины в глоссарии?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "The module imGlossary needs to be installed and active for this feature." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Имя каталога imGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "The name of the folder where imGlossary is in.<br />Default: <em>imglossary</em>" );
define( '_MI_IMPRESSION_SELECTFEED', 'Использовать ICMS RSS канал?' );
define( '_MI_IMPRESSION_SELECTFEED_DSC', 'Select <em>Yes</em> to use ImpressCMS RSS feed. Select <em>No</em> to use Brandycoke\'s RSSfit module (subfeed needs to be activated).'  );
define( '_MI_IMPRESSION_FEEDSTOTAL', 'Какое количество статей показывать в RSS канале' );
define( '_MI_IMPRESSION_FEEDSTOTALDSC', 'Это число имеет эффект только для ImpressCMS RSS канала. По умолчанию: <em>15</em>' );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - a copy of the GNU license is enclosed (license.txt).' );
?>