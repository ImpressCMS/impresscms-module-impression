<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: class/Altcat.php
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

class mod_impression_Altcat extends icms_ipf_seo_Object {
	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'aid', XOBJ_DTYPE_INT );
		$this -> quickInitVar( 'cid', XOBJ_DTYPE_INT );
	}
}