<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /blocks/impression_block_tag.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since			1.00
* @author		McDonald
* @version		$Id$
*/

function impression_tag_block_cloud_show( $options ) {
        $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
	include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
	return tag_block_cloud_show( $options, $mydirname );
}

function impression_tag_block_cloud_edit( $options ) {
	include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
	return tag_block_cloud_edit( $options );
}

function impression_tag_block_top_show( $options ) {
        $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
	include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
	return tag_block_top_show( $options, $mydirname );
}

function impression_tag_block_top_edit( $options ) {
        include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
	return tag_block_top_edit( $options );
}

?>