<?php
/**
* imGlossary - a multicategory glossary for ImpressCMS
*
* Based upon Wordbook 1.16
*
* File: class/Cats.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Wordbook - a multicategory glossary
* @since		1.16
* @author		hsalazar
* ----------------------------------------------------------------------------------------------------------
* 				imGlossary - a multicategory glossary
* @since		1.03
* @author		modified by McDonald
* @version		$Id$
*/

defined( 'ICMS_ROOT_PATH' ) or die ( 'ICMS root path not defined' );

class mod_impression_Mod extends icms_ipf_seo_Object {

	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'requestid', XOBJ_DTYPE_INT, true );
		$this -> quickInitVar( 'aid', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'cid', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'title', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'uid', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'uname', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'publisher', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'status', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'date', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'hits', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'published', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'introtext', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'description', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'ipaddress', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'meta_keywords', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'item_tag', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'comments', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'notifypub', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'nice_url', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'inblocks', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'source', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'sourceurl', XOBJ_DTYPE_TXTBOX, false );
	}

}