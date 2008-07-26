<?php
/**
 * $Id: about.php
 * Module: Impression
 */

include 'admin_header.php';

global $xoopsModule;

xoops_cp_header();

$module_handler = &xoops_gethandler( 'module' );
$versioninfo = &$module_handler -> get( $xoopsModule -> getVar( 'mid' ) );

impression_adminmenu( '' );
// Left headings...
echo "<img src='" . ICMS_URL . "/modules/" . $xoopsModule -> getVar('dirname') . "/" . $versioninfo -> getInfo( 'image' ) . "' alt='' hspace='10' vspace='0' /></a>\n
<div style='margin-top: 10px; color: #33538e; margin-bottom: 4px; font-size: 18px; line-height: 18px; font-weight: bold; display: block;'>" . $versioninfo -> getInfo( 'name' ) . " version " . $versioninfo -> getInfo( 'version' ) . "</div>\n

<div>\n";
if ( $versioninfo -> getInfo( 'author_realname' ) != '' ) {
  $author_name = $versioninfo -> getInfo( 'author' ) . " (" . $versioninfo -> getInfo( 'author_realname' ) . ")";
} else {
   $author_name = "<em>" . $versioninfo -> getInfo( 'author' ) . "</em>";
} 
echo "
		</div>\n
		<div>" . _MI_IMPRESSION_RELEASE . " " . $versioninfo -> getInfo( 'releasedate' ) . "</div>\n
		<div>" . _AM_IMPRESSION_BY . " " . $author_name . "</div>\n
		<div>" . $versioninfo -> getInfo( 'license' ) . "</div><br />\n";

// Author Information
$sform = new XoopsThemeForm( _MI_IMPRESSION_AUTHOR_INFO, "", "" );
$sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_AUTHOR_NAME, $author_name ) );

$sform -> display();

// Author Information
$sform = new XoopsThemeForm( _MI_IMPRESSION_MODULE_INFO, "", "" );
$sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_MODULE_STATUS, $versioninfo -> getInfo( 'status' ) ) );
$sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_MODULE_SUPPORT, "<a href='" . $versioninfo -> getInfo( 'support_site_url' ) . "' target='_blank'>" . $versioninfo -> getInfo( 'support_site_name' ) . "</a>" ) );
$sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_MODULE_BUG, "<a href='" . $versioninfo -> getInfo( 'submit_bug' ) . "' target='_blank'>" . "Submit a Bug" . "</a>" ) );
$sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_MODULE_FEATURE, "<a href='" . $versioninfo -> getInfo( 'submit_feature' ) . "' target='_blank'>" . "Request a new feature" . "</a>" ) );
$sform -> display();

// Credits
$sform = new XoopsThemeForm( _MI_IMPRESSION_AUTHOR_CREDITS, "", "" );
$sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_ICONS_CREDITS, "<a href='http://www.famfamfam.com' target='_blank'>famfamfam.com</a>" ) );
$sform -> display();

global $impressionmyts;

$file='../changelog.txt';
if ( @file_exists( $file ) ) {
    $fp = @fopen( $file, "r" );
    $bugtext = @fread( $fp, filesize( $file ) );
    @fclose( $file );
} 

$sform = new XoopsThemeForm( _MI_IMPRESSION_AUTHOR_BUGFIXES, "", "" );
ob_start();
  echo "<div class='even'><small>" . $impressionmyts -> displayTarea( $bugtext ) . "</small></div>";
  $sform -> addElement( new XoopsFormLabel( _MI_IMPRESSION_AUTHOR_BUGFIXES, ob_get_contents(), 0 ) );
ob_end_clean();
$sform -> display();
unset( $file );

echo "<div style='text-align: center;'>" . _MI_IMPRESSION_COPYRIGHTIMAGE . "</div>\n";
xoops_cp_footer();

?>