<?php
/**
 * $Id: config.php
 * Module: Impression
 */
 
// WARNING: ONCE SET DO NOT CHANGE! Improper use will render this module useless and unworkable.
// Only Change if you know what you are doing.

$mydirname = basename( dirname(  dirname( __FILE__ ) ) );

if ( !defined( "impression_cat" ) ) define( "impression_cat", "impression_cat" );
if ( !defined( "impression_articles" ) ) define( "impression_articles", "impression_articles" );
if ( !defined( "impression_mod" ) ) define( "impression_mod", "impression_mod" );
if ( !defined( "impression_indexpage" ) ) define( "impression_indexpage", "impression_indexpage" );
if ( !defined( "impression_altcat" ) ) define( "impression_altcat", "impression_altcat" );
if ( !defined( "impression_url" ) ) define( "impression_url", XOOPS_URL . "/modules/" . $mydirname . "/" );

?>