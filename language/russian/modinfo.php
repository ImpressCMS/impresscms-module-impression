<?php
/**
 * $Id: modinfo.php 23000 2011-11-19 23:29:54Z mcdonald3072 $ Russian translation. Charset: utf-8 (without BOM)
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
define('_MI_IMPRESSION_POPULAR', 'Число популярности:');
define('_MI_IMPRESSION_POPULARDSC', 'Количество обращений к статьям до получения ими статуса полулярности.');

define("_MI_IMPRESSION_ICONDISPLAY","Отображение статусов статей:");
define("_MI_IMPRESSION_DISPLAYICONDSC", "Выбрать способ отображения статусов популярных и новых статей в списке.");
define("_MI_IMPRESSION_DISPLAYICON1", "Показывать как иконки");
define("_MI_IMPRESSION_DISPLAYICON2", "Показывать как текст");
define("_MI_IMPRESSION_DISPLAYICON3", "Не показывать");

define("_MI_IMPRESSION_DAYSNEW","Новизна статей:");
define("_MI_IMPRESSION_DAYSNEWDSC","Количество дней, в течение которых статьи считаются новыми.");

define("_MI_IMPRESSION_DAYSUPDATED","Обновленность статей:");
define("_MI_IMPRESSION_DAYSUPDATEDDSC","Количество дней, в течение которых статьи будут считаться обновленными.");

define('_MI_IMPRESSION_PERPAGE', 'Статей в списке:');
define('_MI_IMPRESSION_PERPAGEDSC', 'Количество статей, показываемых в каждом списке категории.');

define("_MI_IMPRESSION_ADMINPAGE", "Статей в списке для администратора:");
define("_MI_IMPRESSION_AMDMINPAGEDSC", "Количество новых статей, отображамое в списке для администратора.");

define("_MI_IMPRESSION_ARTICLESSORT", "Сортировка статей по:");
define("_MI_IMPRESSION_ARTICLESSORTDSC", "Выбор порядка сортировки статей в списке.");

define("_MI_IMPRESSION_SORTCATS", "Сортировка категорий по:");
define("_MI_IMPRESSION_SORTCATSDSC", "Выберите по какому параметру сортировать категории и подкатегории.");

define('_MI_IMPRESSION_SUBCATS', 'Показывать подкатегории?');
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

define('_MI_IMPRESSION_USESHOTS', 'Показывать образ экрана?');
define('_MI_IMPRESSION_USESHOTSDSC', 'Выбрать Да для показа образов экрана для каждой статьи');

define('_MI_IMPRESSION_USETHUMBS', 'Использовать наброски (контрольки)?');
define("_MI_IMPRESSION_USETHUMBSDSC", "Поддерживаемые типы файлов: JPG, GIF, PNG.<div style='padding-top: 8px;'>Impression будет использовать наброски для изображений. Установите 'Нет' для использования оригинального изображения в случае, если сервер не поддерживает эту опцию.</div>");

define("_MI_IMPRESSION_IMGUPDATE", "Обновлять наброски?");
define("_MI_IMPRESSION_IMGUPDATEDSC", "Если выбрать эту опцию, то изображения набросков будут обновляться при каждом обращении к странице, иначе всегда будет использоваться первое изображение. <br /><br />");

define('_MI_IMPRESSION_MAINIMGDIR','Основной каталог для изображений:');

define('_MI_IMPRESSION_CATEGORYIMG','Каталог для изображений категорий:');

define('_MI_IMPRESSION_DATEFORMAT', 'Формат даты:');
define('_MI_IMPRESSION_DATEFORMATDSC', 'Формат даты по умолчанию для Impression.<br />Смотрите <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP руководство</a>');

define('_MI_IMPRESSION_DATEFORMATADMIN', 'Формат даты для администратора:');
define('_MI_IMPRESSION_DATEFORMATADMINDSC', 'Формат даты для администратора в Impression.<br />Смотрите <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP руководство</a>');

define("_MI_IMPRESSION_TOTALCHARS", "Кол-во символов в описании:");
define("_MI_IMPRESSION_TOTALCHARSDSC", "Установить общее количестко символов для описания на индексной странице.");

define("_MI_IMPRESSION_OTHERARTICLES", "Показывать другие размещенные статьи издателя?");
define("_MI_IMPRESSION_OTHERARTICLESDSC", "Выберите Да, если хотите показывать другие размещенные статьи издателя.");

define("_MI_IMPRESSION_SHOWARTCOUNT", "Показывать счетчик статей в списке категории?");
define("_MI_IMPRESSION_SHOWARTCOUNTDSC", "Выберите Да, если хотите показывать количество статей в каждой категории.");

define("_MI_IMPRESSION_SHOWSBOOKMARKS", "Показывать социальные закладки?");
define("_MI_IMPRESSION_SHOWSBOOKMARKSDSC", "Выберите Да, если Вы желаете показывать иконки социальных закладов под статьей.");

define("_MI_IMPRESSION_USEMETADESCR", "Генерировать мета-тэг description?");
define("_MI_IMPRESSION_USEMETADSC", "При включении этой опции будет генерироваться мета-тэг description.");

define('_MI_IMPRESSION_SHOWDISCLAIMER', 'Показать предупреждение об ответственности перед размещением статьи?');
define('_MI_IMPRESSION_SHOWDISCLAIMERDSC', 'Перед тем, как пользователь сможет разместить статью могут быть показаны правила');

define('_MI_IMPRESSION_DISCLAIMER', 'Текст предупреждения об ответственности при размещении статьи:');

define('_MI_IMPRESSION_SHOWARTICLEDISCL', 'Показать сообщение об отвественности перед размещением статьи?');
define('_MI_IMPRESSION_SHOWARTICLEDISCLDSC', 'Показывать правила перед открытием статьи?');

define('_MI_IMPRESSION_ARTICLEDISCLAIMER', 'Текст предупреждения об ответственности при создании статьи:');

define('_MI_IMPRESSION_COPYRIGHT', 'Сообщение об авторском праве:');
define('_MI_IMPRESSION_COPYRIGHTDSC', 'Select to display a copyright notice on article page.');

//define('_MI_IMPRESSION_REFERERS', 'These sites can directly article to your videos <br />Separate with #');
//define("_MI_IMPRESSION_ANONPOST","Anonymous User Submission:");
//define("_MI_IMPRESSION_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
//define('_MI_IMPRESSION_AUTOAPPROVE','Auto Approve Submitted articles');
//define('_MI_IMPRESSION_AUTOAPPROVEDSC','Select to approve submitted articles without moderation.');

define('_MI_IMPRESSION_MAXFILESIZE','Размер загружаемого файла (KB)');
define('_MI_IMPRESSION_MAXFILESIZEDSC','Максимальный размер статьи, разрешенный для загрузки.');
define('_MI_IMPRESSION_IMGWIDTH','Ширина загружаемого изображения');
define('_MI_IMPRESSION_IMGWIDTHDSC','Максимальный размер файла изображения, разрешенный для загрузки изображения статей');
define('_MI_IMPRESSION_IMGHEIGHT','Высота загружаемого изображения');
define('_MI_IMPRESSION_IMGHEIGHTDSC','Максимальная высота изображения, зарешенная для загрузки изображения статьи');

define('_MI_IMPRESSION_UPLOADDIR','Каталог для загрузки (без завершающего слэша)');
define('_MI_IMPRESSION_ALLOWSUBMISS','Размещения пользователей:');
define('_MI_IMPRESSION_ALLOWSUBMISSDSC','Разрешить пользователям размещать статьи?');
define('_MI_IMPRESSION_ALLOWUPLOADS','Загрузок:');
define('_MI_IMPRESSION_ALLOWUPLOADSDSC','Разрешить пользователям загружать статьи напрямую на Ваш сайт');
define('_MI_IMPRESSION_SCREENSHOTS','Каталог для загрузки изображений экрана');

define("_MI_IMPRESSION_SUBMITART", "Размещение статьи:");
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
define('_MI_IMPRESSION_MODULE_SUPPORT', "Сайт поддержки");
define('_MI_IMPRESSION_MODULE_BUG', "Отчет об ошибках в этом модуле");
define('_MI_IMPRESSION_MODULE_FEATURE', "Предложение новых свойств для этого модуля");
define('_MI_IMPRESSION_MODULE_DISCLAIMER', "Предупреждение об ответственности");
define('_MI_IMPRESSION_RELEASE', "Дата релиза: ");
define('_MI_IMPRESSION_ICONS_CREDITS', "Иконки от:");

define("_MI_IMPRESSION_HEADERPRINT","Заголовок на печатной странице");
define("_MI_IMPRESSION_HEADERPRINTDSC","Заголовок, который будет печататься перед каждой статьей");
define("_MI_IMPRESSION_PRINTLOGOURL","Url логотипа на печатной странице");
define("_MI_IMPRESSION_PRINTLOGOURLDSC","Url логотипа, который будет выводиться вверху каждой печатной страницы");
define("_MI_IMPRESSION_FOOTERPRINT","Подпись на печатной странице");
define("_MI_IMPRESSION_FOOTERPRINTDSC","Подпись, которая будет присутствовать на каждой странице статьи при печати");
define("_MI_IMPRESSION_ITEMFOOTER_SEL", "Подписывать страницы статей?");
define("_MI_IMPRESSION_INDEXFOOTER_SEL","Подпиывать индексную страницу?");
define("_MI_IMPRESSION_BOTH_FOOTERS","Обе подписи");
define("_MI_IMPRESSION_NO_FOOTERS","Ничего");
define("_MI_IMPRESSION_ITEMFOOTER", "Подпись на странице статьи");

define('_MI_IMPRESSION_WARNINGTEXT', "ПРОГРАММНОЕ ОБЕСПЕЧЕНИЕ ПРЕДОСТАВЛЯЕТСЯ MCDONALD \"КАК ЕСТЬ\" И \"СО ВСЕМИ НЕДОСТАТКАМИ.\"
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

define('_MI_IMPRESSION_AUTHOR_CREDITSTEXT',"Группа WF-Projects. Based on the module WF-Links & MyTube, thanks to the dream-team for some code snippits.");
define('_MI_IMPRESSION_AUTHOR_BUGFIXES', "История утранения ошибок");

define('_MI_IMPRESSION_COPYRIGHTIMAGE', "");

define("_MI_IMPRESSION_KEYLENGTH", "Введите макс. количество символов для мета-тэга keywords:");
define("_MI_IMPRESSION_KEYLENGTHDSC", "по умолчанию 255 символов");
define("_MI_IMPRESSION_HEADLINES", "Заголовки" );
define("_MI_IMPRESSION_HEADLINESDSC", "Установка количества заголовков для показа.");
define("_MI_IMPRESSION_BTAGCLOUD", "Облако тэгов Impression");
define("_MI_IMPRESSION_BTOPTAG", "Топ тэгов Impression");
define("_MI_IMPRESSION_LINKEDTERMS", "Ссылаться на термины в глоссарии?" );
define("_MI_IMPRESSION_LINKEDTERMSDSC", "Для этого свойства необходимо установить и активировать модуль imGlossary." );
define("_MI_IMPRESSION_IMGLOSSARYDIR", "Имя каталога imGlossary:" );
define("_MI_IMPRESSION_IMGLOSSARYDIRDSC", "Имя каталога, где расположен модуль imGlossary.<br />По умолчанию: <em>imglossary</em>" );
define( '_MI_IMPRESSION_ABOUTLICENSE', 'GNU General Public License (GPL) - a copy of the GNU license is enclosed (license.txt).' );
define( '_MI_IMPRESSION_RSSFEED', 'RSS канал' );

define( '_MI_IMPRESSION_SHOWSUBMITTER', 'Show submitter?' );
define( '_MI_IMPRESSION_SHOWSUBMITTERDSC', 'Select <em>Yes</em> to have the submitters name printed above the artice.' );
define( '_MI_IMPRESSION_USERTAGDESCR', 'Пользователь может размещать тэги?' );
define( '_MI_IMPRESSION_USERTAGDSC', 'Выберите <em>Да</em>, если пользователю разрешено размещать тэги.' );
define( '_MI_IMPRESSION_NICEURL', 'Use nice urls?' );
define( '_MI_IMPRESSION_NICEURLDSC', 'Use nice urls for articles.' );

// Impression 1.1.0
define( '_MI_IMPRESSION_CAPTCHA', 'Use captcha in submit form?' );
define( '_MI_IMPRESSION_CAPTCHADSC', 'Select <em>Yes</em> to use captcha in the submit form.<br />Default: <em>Yes</em>' );
define( '_MI_IMPRESSION_BYTESYN', 'Display in footer:' );
define( '_MI_IMPRESSION_BYTESDESC', 'Displays extra information in the footer after <em>Read more</em>.' );
define( '_MI_IMPRESSION_BYTES', 'Bytes' );
define( '_MI_IMPRESSION_WORDS', 'Words' );
define( '_MI_IMPRESSION_CHARSF', 'Characters' );
define( '_MI_IMPRESSION_BNEWS', 'News by category');
define( '_MI_IMPRESSION_TEXTWIDTH', 'Set width of title boxes in administration:' );
define( '_MI_IMPRESSION_TEXTWIDTHDSC', 'Select the width of the text boxes used for titles in submit forms. Default is 128.' );

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

// Impression 1.12
define( '_MI_IMPRESSION_IPFTABLE', 'Use IPF table on admin main index page:' );
define( '_MI_IMPRESSION_IPFTABLEDSC', 'Using the IPF table will limit the amount of links listed per page.' );
define( '_MI_IMPRESSION_USELYTE', 'Use Lytebox for help tips:' );
define( '_MI_IMPRESSION_USELYTEDSC', 'Choose <i>Yes</i> for help tips in the forms. Choose <i>No</i> to disable this feature.' );
?>