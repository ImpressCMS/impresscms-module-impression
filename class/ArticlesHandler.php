<?php
/**
* Impression - a light article management module for ImpressCMS
*
* Based upon WF-Links
*
* File: /class/ArticlesHandler.php
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

class mod_impression_ArticlesHandler extends icms_ipf_Handler {

	public function __construct( &$db ) {
		parent::__construct( $db, 'articles', 'aid', 'title', 'introtext', basename( dirname( dirname( __FILE__ ) ) ) );
	}
	
	public function changeOnlineStatus( $aid, $field ) {
		$visibility = $entryObj = '';
		$entryObj = $this -> get( $aid );
		if ( $entryObj -> getVar( $field, 'e' ) == false ) {
			$entryObj -> setVar( $field, 1 );
			$visibility = 1;
		} else {
			$entryObj -> setVar( $field, 0 );
			$visibility = 0;
		}
		$this -> insert( $entryObj, true );
		return $visibility;
	}
}