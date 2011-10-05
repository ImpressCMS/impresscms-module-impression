<?php
/*************************************************************************/
# Waiting Contents Extensible                                            #
# Plugin for module WF-Links                                             #
#                                                                        #
# Author                                                                 #
# flying.tux     -   flying.tux@gmail.com                                #
#                                                                        #
# Last modified on 25.04.2005                                            #
/*************************************************************************/
# Since Impression 1.00                                                     #
# McDonald     -   pietjebell31@hotmail.com                              #
#                                                                        #
# Last modified on 21.05.2010                                            #
/*************************************************************************/	
	
function b_waiting_impression() {

	// name of installation folder Impression
	$impression_dirname = 'impression';

	$ret = array();
	
	// Impression waiting articles
	$block = array();
	$result = icms::$xoopsDB -> query ( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_articles' ) . ' WHERE status=3' );
	if ( $result ) {
		$block['adminlink'] = ICMS_URL . '/modules/' . $impression_dirname . '/admin/newarticles.php';
		list( $block['pendingnum'] ) = icms::$xoopsDB -> fetchRow( $result );
		$block['lang_linkname'] = _PI_WAITING_WAITINGS;
	}
	$ret[] = $block;

	// Impression modification requests
	$block = array();
	$result = icms::$xoopsDB -> query( 'SELECT COUNT(*) FROM ' . icms::$xoopsDB -> prefix( 'impression_mod' ) );
	if ( $result ) {
		$block['adminlink'] = ICMS_URL . '/modules/' . $impression_dirname . '/admin/modifications.php';
		list( $block['pendingnum'] ) = icms::$xoopsDB -> fetchRow( $result );
		$block['lang_linkname'] = _PI_WAITING_MODREQS;
	}
	$ret[] = $block;

	return $ret;
}
?>