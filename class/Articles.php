<?php
/**
* Impression - a light article management module for ImpressCMS
*
* Based upon WF-Links
*
* File: /class/Articles.php
*
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links
* @since		1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links
* @since		1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

defined( 'ICMS_ROOT_PATH' ) or die ( 'ICMS root path not defined' );

class mod_impression_Articles extends icms_ipf_seo_Object {

	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'aid', XOBJ_DTYPE_INT, true );
		$this -> quickInitVar( 'cid', XOBJ_DTYPE_INT, true );
		$this -> quickInitVar( 'title', XOBJ_DTYPE_TXTBOX, true );
		$this -> quickInitVar( 'uid', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'uname', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'publisher', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'status', XOBJ_DTYPE_INT, true, false, false, true );
		$this -> quickInitVar( 'date', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'hits', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'published', XOBJ_DTYPE_LTIME, false, '', '', 1033141070 );
		$this -> quickInitVar( 'introtext', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'description', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'ipaddress', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'meta_keywords', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'item_tag', XOBJ_DTYPE_TXTAREA, false );
		$this -> quickInitVar( 'comments', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'notifypub', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'nice_url', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'inblocks', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'source', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'sourceurl', XOBJ_DTYPE_TXTBOX, false );
		
		$this -> setControl( 'status', 'yesno' );
	}
	
	public function getVar( $key, $format = 's' ) {
		if ( $format == 's' && in_array( $key, array( 'uid', 'status', 'published', 'cid' ) ) ) {
			return call_user_func( array( $this, $key ) );
		}
		return parent::getVar( $key, $format );
	}

	function uid() {
		return icms_member_user_Handler::getUserLink( $this -> getVar( 'uid', 'e' ) );
	}
	
	function status() {
		$status = $button = '';
		$status = $this -> getVar( 'status', 'e' );
		$buttona = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/admin/articles.php?op=changestatus&amp;aid=' . $this -> getVar( 'aid' ) . '">';
		if ( $status == 0 ) {
			$buttona .= '<img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/on.png" alt="" title="' . _AM_IMPRESSION_ICO_ONLINE . '" /></a>';
			$button = $buttona;
		} elseif ( $status == 1 ) {
			$buttona .= '<img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/off.png" alt="" title="' . _AM_IMPRESSION_ICO_OFFLINE . '" /></a>';
			$button = $buttona;
		} elseif ( $status == 2 ) {
			$button .= '<img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/cross.png" alt="" title="' . _AM_IMPRESSION_ICO_REJECTED . '" />';
		}
		return $button;
	}
	
	function published() {
		$publish =  ( $this -> getVar( 'published', 'e' ) > 0 ) ? impression_time( formatTimestamp( $this -> getVar( 'published', 'e' ), icms::$module -> config['dateformatadmin'] ) ) : _AM_IMPRESSION_NOTPUBLiSHED;
		return $publish;
	}
	
	function cid() {
		$ret = impression_cattitle( $this -> getVar( 'cid', 'e' ) );
		return $ret;
	}
	
	function ViewArticle() {
		if ( $this -> getVar( 'inblocks' ) ) {
			$icon = '<img src="../images/icon/box_green.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKY . '" />';
		} else {
			$icon = '<img src="../images/icon/box_orange.png" alt="" title="' . _AM_IMPRESSION_ICO_INBLOCKN . '" />';
		}
		$nice_link = impression_nicelink( $this -> getVar( 'title' ), $this -> getVar( 'nice_url' ) );
		if ( icms::$module -> config['niceurl'] ) {
			$title = $icon . '&nbsp;<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/singlearticle.php?aid=' . $this -> getVar( 'aid' ) . '&amp;title=' . $nice_link . '">' . icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( trim( $this -> getVar( 'title' ) ) ) ) . '</a>';
		} else {
			$title = $icon . '&nbsp;<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/singlearticle.php?aid=' . $this -> getVar( 'aid' ) . '">' . icms_core_DataFilter::htmlSpecialChars( icms_core_DataFilter::stripSlashesGPC( trim( $this -> getVar( 'title' ) ) ) ) . '</a>';
		}
		// $ret = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/singlearticle.php?aid=' . $this -> getVar( 'aid' ) . '">' . $title . '</a>';
		return $title;
	}
	
	function getEditArticle() {
		$ret = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/admin/articles.php?op=edit&amp;aid=' . $this -> getVar( 'aid' ) . '"><img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/page_edit.png" alt="" title="' . _AM_IMPRESSION_ICO_EDIT . '" /></a>';
		return $ret;
	}
	
	function getDeleteArticle() {
		$ret = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/admin/articles.php?op=delete&amp;aid=' . $this -> getVar( 'aid' ) . '"><img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/page_delete.png" alt="" title="' . _AM_IMPRESSION_ICO_DELETE . '" /></a>';
		return $ret;
	}
	
	function getCloneArticle() {
		$ret = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/admin/articles.php?op=clone&amp;aid=' . $this -> getVar( 'aid' ) . '"><img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/page_clone.png" alt="" title="' . _AM_IMPRESSION_ICO_CLONE . '" /></a>';
		return $ret;
	}
	
	function getAltcatArticle() {
		$ret = '<a href="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/admin/altcat.php?op=main&amp;aid=' . $this -> getVar( 'aid' ) . '"><img src="' . ICMS_URL . '/modules/' . basename( dirname( dirname( __FILE__ ) ) ) . '/images/icon/folder_add.png" alt="" title="' . _AM_IMPRESSION_ALTCAT_CREATEF . '" /></a>';
		return $ret;
	}

}