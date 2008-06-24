<?php
/*
* About this RSSFit plug-in
*
* Author :
*   DuGris - http://www.dugris.info
*
* Requirements:
*   Module : RSSFit  - http://www.brandycoke.com
*   verision : 1.20
*
*   Module : Impression
*   Version : 1.00
*/ 

if( !defined('RSSFIT_ROOT_PATH') ){ exit(); }
class RssfitImpression{
	var $dirname = 'impression';
	var $modname;
        var $mid;
	var $grab;

	function RssfitImpression(){
	}

	function loadModule(){
		global $module_handler;
		$mod = $module_handler->getByDirname($this->dirname);
		if( !$mod || !$mod->getVar('isactive') ){
			return false;
		}
		$this->modname = $mod->getVar('name');
		$this->mid = $mod->getVar('mid');
		return $mod;
	}

	function grabEntries(&$obj){
		global $xoopsDB, $xoopsUser;

		$groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
		$gperm_handler = &xoops_gethandler( 'groupperm' );

		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$i = 0;
		$sql = "SELECT aid, cid, title, published, introtext FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published <= " . time() . " AND status = 0 ORDER BY published DESC";
		$result = $xoopsDB->query($sql, $this->grab, 0);
		while( $row = $xoopsDB->fetchArray($result) ){
                if ( $gperm_handler -> checkRight( 'ImpressionCatPerm', $row['cid'], $groups, $this->mid ) ) {
			//	required
				$ret[$i]['title'] = $row['title'];
				$ret[$i]['link'] = $ret[$i]['guid'] = XOOPS_URL.'/modules/'.$this->dirname.'/singlearticle.php?cid='.$row['cid'].'&amp;aid='.$row['aid'];
				$ret[$i]['timestamp'] = $row['published'];
				$ret[$i]['description'] = $row['introtext'];
			//	optional
				$ret[$i]['category'] = $this -> modname;
				$ret[$i]['domain'] = XOOPS_URL.'/modules/'.$this->dirname.'/';
				$i++;
			}
		}
		return $ret;
	}
}
?>