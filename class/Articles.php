<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: class/Articles.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since		1.1
* @author		McDonald
* @version		$Id$
*/

defined( 'ICMS_ROOT_PATH' ) or die ( 'ICMS root path not defined' );

class mod_impression_Articles extends icms_ipf_seo_Object {

	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'aid', XOBJ_DTYPE_INT, true );
		$this -> quickInitVar( 'cid', XOBJ_DTYPE_INT, true, '', '', 0 );
		$this -> quickInitVar( 'title', XOBJ_DTYPE_TXTBOX, true );
		$this -> quickInitVar( 'uid', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'uname', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'publisher', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'status', XOBJ_DTYPE_INT, true, '', '', 0 );
		$this -> quickInitVar( 'date', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'hits', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'published', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'introtext', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'description', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'ipaddress', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'meta_keywords', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'item_tag', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'comments', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'notifypub', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'nice_url', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'inblocks', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'source', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'sourceurl', XOBJ_DTYPE_TXTBOX, false );
	}
}