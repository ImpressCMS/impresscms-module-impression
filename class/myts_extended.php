<?php
/**
 * $Id: myts_extended.php
 * Module: Impression
 */

class impressionTextSanitizer extends MyTextSanitizer
{
    function impressionTextSanitizer() {
    } 

	function htmlSpecialCharsStrip( $text )
    {
		return $this -> htmlSpecialChars( $this -> stripSlashesGPC( $text) );
    } 
} 

?>