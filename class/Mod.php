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
		$this -> quickInitVar( 'publisher', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'status', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'date', XOBJ_DTYPE_LTIME, false, '', '', 1033141070 );
		$this -> quickInitVar( 'hits', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'published', XOBJ_DTYPE_LTIME, false, '', '', 1033141070 );
		$this -> quickInitVar( 'introtext', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'description', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'ipaddress', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'meta_keywords', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'item_tag', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'comments', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'notifypub', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'nice_url', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'inblocks', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'modifysubmitter', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'requestdate', XOBJ_DTYPE_LTIME, false, '', '', 1033141070 );
		$this -> quickInitVar( 'source', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'sourceurl', XOBJ_DTYPE_TXTBOX, false );
	
		$this -> setControl( 'status', 'yesno' );
	}
	
	public function getVar( $key, $format = 's' ) {
		if ( $format == 's' && in_array( $key, array( 'modifysubmitter', 'requestdate' ) ) ) {
			return call_user_func( array( $this, $key ) );
		}
		return parent::getVar( $key, $format );
	}

	function modifysubmitter() {
		return icms_member_user_Handler::getUserLink( $this -> getVar( 'modifysubmitter', 'e' ) );
	}
	
	function requestdate() {
		$publish = formatTimestamp( $this -> getVar( 'requestdate', 'e' ), icms::$module -> config['dateformatadmin'] );
		return $publish;
	}
	
	function ViewArticle() {
		$title = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/modifications.php?op=listmodreqshow&requestid=' . $this -> getVar( 'requestid' ) . '">' . icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( trim( $this -> getVar( 'title' ) ) ) ) . '</a>';
		return $title;
	}
	
	function getListModReqShow() {
		$ret = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/admin/modifications.php?op=listmodreqshow&amp;requestid=' . $this -> getVar( 'requestid' ) . '"><img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/find.png" alt="" title="' . _AM_IMPRESSION_ICO_VIEW . '" /></a>';
		return $ret;
	}

}