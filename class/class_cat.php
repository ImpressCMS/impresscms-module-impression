<?php
// impression_cat.php,v 1
//  ---------------------------------------------------------------- //
// Author: Bruno Barthez	                                           //
// ----------------------------------------------------------------- //

include_once ICMS_ROOT_PATH."/class/xoopsobject.php";
/**
* impression_cat class.  
* $this class is responsible for providing data access mechanisms to the data source 
* of XOOPS user class objects.
*/


class impression_cat extends XoopsObject
{ 
	var $db;

// constructor
	function impression_cat ($id=null)
	{
		$this->db =& Database::getInstance();
		$this->initVar("cid",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("pid",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("title",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("description",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("imgurl",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("total",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("weight",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("meta_keywords",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("meta_description",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("short_url",XOBJ_DTYPE_TXTBOX, null, false);
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
		$sql = 'SELECT * FROM '.$this->db->prefix("impression_cat").' WHERE cid='.$id;
		$myrow = $this->db->fetchArray($this->db->query($sql));
		$this->assignVars($myrow);
		if (!$myrow) {
			$this->setNew();
		}
	}

	function getAllimpression_cats($criteria=array(), $asobject=false, $sort="cid", $order="ASC", $limit=0, $start=0)
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
			$sql = "SELECT cid FROM ".$db->prefix("impression_cat")."$where_query ORDER BY $sort $order";
			$result = $db->query($sql,$limit,$start);
			while ( $myrow = $db->fetchArray($result) ) {
				$ret[] = $myrow['impression_cat_id'];
			}
		} else {
			$sql = "SELECT * FROM ".$db->prefix("impression_cat")."$where_query ORDER BY $sort $order";
			$result = $db->query($sql,$limit,$start);
			while ( $myrow = $db->fetchArray($result) ) {
				$ret[] = new impression_cat ($myrow);
			}
		}
		return $ret;
	}
}
// -------------------------------------------------------------------------
// ------------------impression_cat user handler class -------------------
// -------------------------------------------------------------------------
/**
* impression_cathandler class.  
* This class provides simple mecanisme for impression_cat object
*/

class Xoopsimpression_catHandler extends XoopsObjectHandler
{

	/**
	* create a new impression_cat
	* 
	* @param bool $isNew flag the new objects as "new"?
	* @return object impression_cat
	*/
	function &create($isNew = true)	{
		$impression_cat = new impression_cat();
		if ($isNew) {
			$impression_cat->setNew();
		}
		return $impression_cat;
	}

	/**
	* retrieve a impression_cat
	* 
	* @param int $id of the impression_cat
	* @return mixed reference to the {@link impression_cat} object, FALSE if failed
	*/
	function &get($id)	{
			$sql = 'SELECT * FROM '.$this->db->prefix('impression_cat').' WHERE cid='.$id;
			if (!$result = $this->db->query($sql)) {
				return false;
			}
			$numrows = $this->db->getRowsNum($result);
			if ($numrows == 1) {
				$impression_cat = new impression_cat();
				$impression_cat->assignVars($this->db->fetchArray($result));
				return $impression_cat;
			}
				return false;
	}

/**
* insert a new impression_cat in the database
* 
* @param object $impression_cat reference to the {@link impression_cat} object
* @param bool $force
* @return bool FALSE if failed, TRUE if already present and unchanged or successful
*/
	function insert(&$impression_cat, $force = false) {
		Global $xoopsConfig;
		if (get_class($impression_cat) != 'impression_cat') {
				return false;
		}
		if (!$impression_cat->isDirty()) {
				return true;
		}
		if (!$impression_cat->cleanVars()) {
				return false;
		}
		foreach ($impression_cat->cleanVars as $k => $v) {
				${$k} = $v;
		}
		$now = "date_add(now(), interval ".$xoopsConfig['server_TZ']." hour)";
		if ($impression_cat->isNew()) {
			// ajout/modification d'un impression_cat
			$impression_cat = new impression_cat();
			$format = "INSERT INTO %s (cid, pid, title, description, imgurl, total, weight, meta_keywords, meta_description, short_url)";
			$format .= "VALUES (%u, %u, %s, %s, %s, %u, %u, %s, %s, %s)";
			$sql = sprintf($format , 
			$this->db->prefix('impression_cat'), 
			$cid
			,$pid
			,$this->db->quoteString($title)
			,$this->db->quoteString($description)
			,$this->db->quoteString($imgurl)
			,$total
			,$weight
			,$this->db->quoteString($meta_keywords)
			,$this->db->quoteString($meta_description)
			,$this->db->quoteString($short_url)
			);
			$force = true;
		} else {
			$format = "UPDATE %s SET ";
			$format .="cid=%u, pid=%u, title=%s, description=%s, imgurl=%s, total=%u, weight=%u, meta_keywords=%s, meta_description=%s, short_url=%s";
			$format .=" WHERE cid = %u";
			$sql = sprintf($format, $this->db->prefix('impression_cat'),
			$cid
			,$pid
			,$this->db->quoteString($title)
			,$this->db->quoteString($description)
			,$this->db->quoteString($imgurl)
			,$total
			,$weight
			,$this->db->quoteString($meta_keywords)
			,$this->db->quoteString($meta_description)
			,$this->db->quoteString($short_url)
			, $cid);
		}
		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}
		if (!$result) {
			return false;
		}
		if (empty($cid)) {
			$cid = $this->db->getInsertId();
		}
		$impression_cat->assignVar('cid', $cid);
		return true;
	}

	/**
	 * delete a impression_cat from the database
	 * 
	 * @param object $impression_cat reference to the impression_cat to delete
	 * @param bool $force
	 * @return bool FALSE if failed.
	 */
	function delete(&$impression_cat, $force = false)
	{
		if (get_class($impression_cat) != 'impression_cat') {
			return false;
		}
		$sql = sprintf("DELETE FROM %s WHERE cid = %u", $this->db->prefix("impression_cat"), $impression_cat->getVar('cid'));
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
	* retrieve impression_cats from the database
	* 
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param bool $id_as_key use the UID as key for the array?
	* @return array array of {@link impression_cat} objects
	*/
	function &getObjects($criteria = null, $id_as_key = false)
	{
		$ret = array();
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('impression_cat');
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
			$impression_cat = new impression_cat();
			$impression_cat->assignVars($myrow);
			if (!$id_as_key) {
				$ret[] =& $impression_cat;
			} else {
				$ret[$myrow['cid']] =& $impression_cat;
			}
			unset($impression_cat);
		}
		return $ret;
	}

	/**
	* count impression_cats matching a condition
	* 
	* @param object $criteria {@link CriteriaElement} to match
	* @return int count of impression_cats
	*/
	function getCount($criteria = null)
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->db->prefix('impression_cat');
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
	* delete impression_cats matching a set of conditions
	* 
	* @param object $criteria {@link CriteriaElement} 
	* @return bool FALSE if deletion failed
	*/
	function deleteAll($criteria = null)
	{
		$sql = 'DELETE FROM '.$this->db->prefix('impression_cat');
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