<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : impression for sitemap
 *
 * Name					: 	xoopstube.php
 * Author				: 	DuGris (http://www.dugris.info), Modifications by McDonald for XoopsTube
 *
 * Necessary modules	:
 *								sitemap 1.30 (http://xoops.peak.ne.jp/)
 *								xoopstube 1.0.1 (http://members.lycos.nl/mcdonaldsstore/)
 *
 * -----------------------------------------------------------------------------
**/

function b_sitemap_impression(){
	global $sitemap_configs;
	global $xoopsDB, $xoopsUser, $xoopsModule;
	$myts = &MyTextSanitizer::getInstance();

	include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
	$mytree = new XoopsTree( $xoopsDB -> prefix( 'impression_cat' ), 'cid', 'pid' );

	$MyModule = &xoops_gethandler('module');
	$impressionModule = $MyModule -> getByDirname('impression');

	$MyConfig = &xoops_gethandler('config');
	$impressionConfig = $MyConfig -> getConfigsByCat(0, $impressionModule -> getVar('mid'));

	$groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
	$gperm_handler = &xoops_gethandler( 'groupperm' );

	$sitemap = array();
	$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'impression_cat' ) . " WHERE pid = 0 ORDER BY weight";
	$result = $xoopsDB -> queryF( $sql );
	while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
		if ( $gperm_handler -> checkRight( 'ImpressionCatPerm', $myrow['cid'], $groups, $impressionModule -> getVar('mid') ) ) {
        	$i = intval($myrow['cid']);
			$sitemap['parent'][$i]['id'] = intval($myrow['cid']);
			$sitemap['parent'][$i]['title'] = $myts -> makeTboxData4Show( $myrow['title'] );
			$sitemap['parent'][$i]['url'] = "catview.php?cid=" . intval($myrow['cid']);
			if ( $sitemap_configs["show_subcategoris"] ) {
				$arr = array();
				$arr = $mytree -> getFirstChild( $myrow['cid'], "title" );
				foreach( $arr as $key => $ele ) {
					if ( $gperm_handler -> checkRight( 'ImpressionCatPerm', $ele['cid'], $groups, $impressionModule -> getVar('mid') ) ) {
						$j = $key;
						$sitemap['parent'][$i]['child'][$j]['id'] = intval($ele['cid']);
						$sitemap['parent'][$i]['child'][$j]['title'] = $myts -> makeTboxData4Show( $ele['title'] );
						$sitemap['parent'][$i]['child'][$j]['image'] = 2;
						$sitemap['parent'][$i]['child'][$j]['url'] = "catview.php?cid=" . intval($ele['cid']);
					}
				}
			}
		}
	}
	return $sitemap;
}
?>