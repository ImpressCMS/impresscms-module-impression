<?php
// impression_articles.php,v 1
//  ---------------------------------------------------------------- //
// Author: Bruno Barthez	                                           //
// ----------------------------------------------------------------- //

include_once XOOPS_ROOT_PATH."/class/xoopsobject.php";
/**
* impression_articles class.  
* $this class is responsible for providing data access mechanisms to the data source 
* of XOOPS user class objects.
*/


class impression_articles extends XoopsObject
{ 
	var $db;

// constructor
	function impression_articles ($id=null)
	{
		$this->db =& Database::getInstance();
		$this->initVar("aid",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("cid",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("title",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("introtext",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("display_summary",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("description",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("submitter",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("publisher",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("date",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("published",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("expired",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("updated",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("offline",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("status",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("screenshot",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("hits",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("rating",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("votes",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("weight",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("dohtml",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("dosmiley",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("doxcode",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("doimage",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("dobr",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("cancomment",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("comments",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("notifypub",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("meta_keywords",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("meta_description",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("short_url",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("partial_view",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("item_tag",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("ipaddress",XOBJ_DTYPE_TXTBOX, null, false);
		if ( !empty($id) ) {
			if ( is_array($id) ) {
				$this->assignVars($id);
			} else {
					$this->load(intval($id));
			}
		} else {
			$this->setNew();
		}
		
	}

	function load($id)
	{
		$sql = 'SELECT * FROM '.$this->db->prefix("impression_articles").' WHERE aid='.$id;
		$myrow = $this->db->fetchArray($this->db->query($sql));
		$this->assignVars($myrow);
		if (!$myrow) {
			$this->setNew();
		}
	}

	function getAllimpression_articless($criteria=array(), $asobject=false, $sort="aid", $order="ASC", $limit=0, $start=0)
	{
		$db =& Database::getInstance();
		$ret = array();
		$where_query = "";
		if ( is_array($criteria) && count($criteria) > 0 ) {
			$where_query = " WHERE";
			foreach ( $criteria as $c ) {
				$where_query .= " $c AND";
			}
			$where_query = substr($where_query, 0, -4);
		} elseif ( !is_array($criteria) && $criteria) {
			$where_query = " WHERE ".$criteria;
		}
		if ( !$asobject ) {
			$sql = "SELECT aid FROM ".$db->prefix("impression_articles")."$where_query ORDER BY $sort $order";
			$result = $db->query($sql,$limit,$start);
			while ( $myrow = $db->fetchArray($result) ) {
				$ret[] = $myrow['impression_articles_id'];
			}
		} else {
			$sql = "SELECT * FROM ".$db->prefix("impression_articles")."$where_query ORDER BY $sort $order";
			$result = $db->query($sql,$limit,$start);
			while ( $myrow = $db->fetchArray($result) ) {
				$ret[] = new impression_articles ($myrow);
			}
		}
		return $ret;
	}
}
// -------------------------------------------------------------------------
// ------------------impression_articles user handler class -------------------
// -------------------------------------------------------------------------
/**
* impression_articleshandler class.  
* This class provides simple mecanisme for impression_articles object
*/

class Xoopsimpression_articlesHandler extends XoopsObjectHandler
{

	/**
	* create a new impression_articles
	* 
	* @param bool $isNew flag the new objects as "new"?
	* @return object impression_articles
	*/
	function &create($isNew = true)	{
		$impression_articles = new impression_articles();
		if ($isNew) {
			$impression_articles->setNew();
		}
		return $impression_articles;
	}

	/**
	* retrieve a impression_articles
	* 
	* @param int $id of the impression_articles
	* @return mixed reference to the {@link impression_articles} object, FALSE if failed
	*/
	function &get($id)	{
			$sql = 'SELECT * FROM '.$this->db->prefix('impression_articles').' WHERE aid='.$id;
			if (!$result = $this->db->query($sql)) {
				return false;
			}
			$numrows = $this->db->getRowsNum($result);
			if ($numrows == 1) {
				$impression_articles = new impression_articles();
				$impression_articles->assignVars($this->db->fetchArray($result));
				return $impression_articles;
			}
				return false;
	}

/**
* insert a new impression_articles in the database
* 
* @param object $impression_articles reference to the {@link impression_articles} object
* @param bool $force
* @return bool FALSE if failed, TRUE if already present and unchanged or successful
*/
	function insert(&$impression_articles, $force = false) {
		Global $xoopsConfig;
		if (get_class($impression_articles) != 'impression_articles') {
				return false;
		}
		if (!$impression_articles->isDirty()) {
				return true;
		}
		if (!$impression_articles->cleanVars()) {
				return false;
		}
		foreach ($impression_articles->cleanVars as $k => $v) {
				${$k} = $v;
		}
		$now = "date_add(now(), interval ".$xoopsConfig['server_TZ']." hour)";
		if ($impression_articles->isNew()) {
			// ajout/modification d'un impression_articles
			$impression_articles = new impression_articles();
			$format = "INSERT INTO %s (aid, cid, title, introtext, display_summary, description, submitter, publisher, date, published, expired, updated, offline, status, screenshot, hits, rating, votes, weight, dohtml, dosmiley, doxcode, doimage, dobr, cancomment, comments, notifypub, meta_keywords, meta_description, short_url, partial_view, item_tag, ipaddress)";
			$format .= "VALUES (%u, %u, %s, %s, %u, %s, %u, %s, %u, %u, %u, %u, %u, %u, %s, %u, %s, %u, %u, %u, %u, %u, %u, %u, %u, %u, %u, %s, %s, %s, %s, %s, %s)";
			$sql = sprintf($format , 
			$this->db->prefix('impression_articles'), 
			$aid
			,$cid
			,$this->db->quoteString($title)
			,$this->db->quoteString($introtext)
			,$display_summary
			,$this->db->quoteString($description)
			,$submitter
			,$this->db->quoteString($publisher)
			,$date
			,$published
			,$expired
			,$updated
			,$offline
			,$status
			,$this->db->quoteString($screenshot)
			,$hits
			,$this->db->quoteString($rating)
			,$votes
			,$weight
			,$dohtml
			,$dosmiley
			,$doxcode
			,$doimage
			,$dobr
			,$cancomment
			,$comments
			,$notifypub
			,$this->db->quoteString($meta_keywords)
			,$this->db->quoteString($meta_description)
			,$this->db->quoteString($short_url)
			,$this->db->quoteString($partial_view)
			,$this->db->quoteString($item_tag)
			,$this->db->quoteString($ipaddress)
			);
			$force = true;
		} else {
			$format = "UPDATE %s SET ";
			$format .="aid=%u, cid=%u, title=%s, introtext=%s, display_summary=%u, description=%s, submitter=%u, publisher=%s, date=%u, published=%u, expired=%u, updated=%u, offline=%u, status=%u, screenshot=%s, hits=%u, rating=%s, votes=%u, weight=%u, dohtml=%u, dosmiley=%u, doxcode=%u, doimage=%u, dobr=%u, cancomment=%u, comments=%u, notifypub=%u, meta_keywords=%s, meta_description=%s, short_url=%s, partial_view=%s, item_tag=%s, ipaddress=%s";
			$format .=" WHERE aid = %u";
			$sql = sprintf($format, $this->db->prefix('impression_articles'),
			$aid
			,$cid
			,$this->db->quoteString($title)
			,$this->db->quoteString($introtext)
			,$display_summary
			,$this->db->quoteString($description)
			,$submitter
			,$this->db->quoteString($publisher)
			,$date
			,$published
			,$expired
			,$updated
			,$offline
			,$status
			,$this->db->quoteString($screenshot)
			,$hits
			,$this->db->quoteString($rating)
			,$votes
			,$weight
			,$dohtml
			,$dosmiley
			,$doxcode
			,$doimage
			,$dobr
			,$cancomment
			,$comments
			,$notifypub
			,$this->db->quoteString($meta_keywords)
			,$this->db->quoteString($meta_description)
			,$this->db->quoteString($short_url)
			,$this->db->quoteString($partial_view)
			,$this->db->quoteString($item_tag)
			,$this->db->quoteString($ipaddress)
			, $aid);
		}
		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}
		if (!$result) {
			return false;
		}
		if (empty($aid)) {
			$aid = $this->db->getInsertId();
		}
		$impression_articles->assignVar('aid', $aid);
		return true;
	}

	/**
	 * delete a impression_articles from the database
	 * 
	 * @param object $impression_articles reference to the impression_articles to delete
	 * @param bool $force
	 * @return bool FALSE if failed.
	 */
	function delete(&$impression_articles, $force = false)
	{
		if (get_class($impression_articles) != 'impression_articles') {
			return false;
		}
		$sql = sprintf("DELETE FROM %s WHERE aid = %u", $this->db->prefix("impression_articles"), $impression_articles->getVar('aid'));
		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}
		if (!$result) {
			return false;
		}
		return true;
	}

	/**
	* retrieve impression_articless from the database
	* 
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param bool $id_as_key use the UID as key for the array?
	* @return array array of {@link impression_articles} objects
	*/
	function &getObjects($criteria = null, $id_as_key = false)
	{
		$ret = array();
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('impression_articles');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		if ($criteria->getSort() != '') {
			$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
		}
		$limit = $criteria->getLimit();
		$start = $criteria->getStart();
		}
		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		while ($myrow = $this->db->fetchArray($result)) {
			$impression_articles = new impression_articles();
			$impression_articles->assignVars($myrow);
			if (!$id_as_key) {
				$ret[] =& $impression_articles;
			} else {
				$ret[$myrow['aid']] =& $impression_articles;
			}
			unset($impression_articles);
		}
		return $ret;
	}

	/**
	* count impression_articless matching a condition
	* 
	* @param object $criteria {@link CriteriaElement} to match
	* @return int count of impression_articless
	*/
	function getCount($criteria = null)
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->db->prefix('impression_articles');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		$result = $this->db->query($sql);
		if (!$result) {
			return 0;
		}
		list($count) = $this->db->fetchRow($result);
		return $count;
	} 

	/**
	* delete impression_articless matching a set of conditions
	* 
	* @param object $criteria {@link CriteriaElement} 
	* @return bool FALSE if deletion failed
	*/
	function deleteAll($criteria = null)
	{
		$sql = 'DELETE FROM '.$this->db->prefix('impression_articles');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
		}
		return true;
	}
}


?>