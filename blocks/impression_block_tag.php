<?php

function impression_tag_block_cloud_show($options) {
        $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
	include_once ICMS_ROOT_PATH."/modules/tag/blocks/block.php";
	return tag_block_cloud_show($options, $mydirname);
}

function impression_tag_block_cloud_edit($options) {
	include_once ICMS_ROOT_PATH."/modules/tag/blocks/block.php";
	return tag_block_cloud_edit($options);
}

function impression_tag_block_top_show($options) {
        $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
	include_once ICMS_ROOT_PATH."/modules/tag/blocks/block.php";
	return tag_block_top_show($options, $mydirname);
}

function impression_tag_block_top_edit($options) {
        include_once ICMS_ROOT_PATH."/modules/tag/blocks/block.php";
	return tag_block_top_edit($options);
}

?>