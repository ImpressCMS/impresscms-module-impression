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

		$this -> quickInitVar( 'aid', XOBJ_DTYPE_INT, TRUE );
		$this -> quickInitVar( 'cid', XOBJ_DTYPE_INT, TRUE );
		$this -> quickInitVar( 'title', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'uid', XOBJ_DTYPE_INT, TRUE, FALSE, FALSE, 1 );
		$this -> quickInitVar( 'uname', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'publisher', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'status', XOBJ_DTYPE_INT, FALSE );
		$this -> quickInitVar( 'date', XOBJ_DTYPE_INT, FALSE );
		$this -> quickInitVar( 'hits', XOBJ_DTYPE_INT, FALSE );
		$this -> quickInitVar( 'published', XOBJ_DTYPE_INT, FALSE );
		$this -> quickInitVar( 'introtext', XOBJ_DTYPE_TXTAREA, FALSE );
		$this -> quickInitVar( 'description', XOBJ_DTYPE_TXTAREA, FALSE );
		$this -> quickInitVar( 'ipaddress', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'meta_keywords', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'item_tag', XOBJ_DTYPE_TXTAREA, FALSE );
		$this -> quickInitVar( 'comments', XOBJ_DTYPE_INT, FALSE, 0 );
		$this -> quickInitVar( 'notifypub', XOBJ_DTYPE_INT, FALSE, 0 );
		$this -> quickInitVar( 'nice_url', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'inblocks', XOBJ_DTYPE_INT, TRUE, FALSE, FALSE, 1 );
		$this -> quickInitVar( 'source', XOBJ_DTYPE_TXTBOX );
		$this -> quickInitVar( 'sourceurl', XOBJ_DTYPE_TXTBOX );
	}
}