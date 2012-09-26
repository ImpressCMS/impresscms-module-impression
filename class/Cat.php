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

class mod_impression_Cat extends icms_ipf_seo_Object {

	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'cid', XOBJ_DTYPE_INT, true );
		$this -> quickInitVar( 'pid', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'title', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'imgurl', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'description', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'total', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'weight', XOBJ_DTYPE_INT, true, false, false, 0 );
		$this -> quickInitVar( 'inblocks', XOBJ_DTYPE_INT, false, '', '', 1 );
	}

}