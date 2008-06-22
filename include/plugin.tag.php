<?php
/**
 * Tag info
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

/**
 * Get item fields:
 * title
 * content
 * time
 * link
 * uid
 * uname
 * tags
 *
 * @var		array	$items	associative array of items: [modid][catid][itemid]
 *
 * @return	boolean
 * 
 */

function impression_tag_iteminfo(&$items)
{
    if(empty($items) || !is_array($items)){ 
        return false; 
    } 

    global $xoopsDB;
    $myts =& MyTextSanitizer::getInstance(); 

    $items_id = array(); 

    foreach(array_keys($items) as $cat_id){ 
        // Some handling here to build the link upon catid 
            // If catid is not used, just skip it 
        foreach(array_keys($items[$cat_id]) as $item_id){ 
            // In article, the item_id is "art_id" 
            $items_id[] = intval($item_id); 
        } 
    } 

    foreach(array_keys($items) as $cat_id){ 
        foreach(array_keys($items[$cat_id]) as $item_id){ 
            $sql = "SELECT l.aid, l.cid as lcid, l.title as ltitle, l.published, l.submitter, l.introtext, l.item_tag, c.title as ctitle FROM ".$xoopsDB->prefix('impression_articles')." l, ".$xoopsDB->prefix('impression_cat')." c WHERE l.aid=".$item_id." AND l.cid=c.cid AND l.status>0 ORDER BY l.date DESC";
            $result = $xoopsDB -> query($sql);
            $row = $xoopsDB -> fetchArray($result);
            $lcid = $row['lcid'];
            $items[$cat_id][$item_id] = array(
                "title"      => $row['ltitle'],
                "uid"        => $row['submitter'],
                "link"       => "singlearticle.php?cid=$lcid&amp;aid=$item_id",
                "time"       => $row['published'],
                "tags"       => $row['item_tag'],
                "content"    => $row['introtext']
            ); 
        } 
    } 
}

/** Remove orphan tag-item links **/
function impression_tag_synchronization($mid)
{
  // Optional
}
?>