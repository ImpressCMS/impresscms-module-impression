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

class mod_impression_Configs extends icms_ipf_seo_Object {

	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'id', XOBJ_DTYPE_INT, true );
		$this -> quickInitVar( 'rssactive', XOBJ_DTYPE_INT, false, '', '' , 1 );
		$this -> quickInitVar( 'rsstitle', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsslink', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssdsc', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssimgurl', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsswidth', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rssheight', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rssimgtitle', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssimglink', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssttl', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rsswebmaster', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsseditor', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsscategory', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssgenerator', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsscopyright', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsstotal', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rssofftitle', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssoffdsc', XOBJ_DTYPE_TXTBOX, false );
	}

}