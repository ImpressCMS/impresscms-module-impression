===================
IMPRESSION 1.0 RC-3
===================


This document describes minor fixes to be made to have Impression 1.0 RC-3 working correctly with ImpressCMS 1.1 Final.



RSS Feed
--------
Open the file /class/icmsfeed.php in a texteditor and replace these lines:

	function render () {
		//header ('Content-Type:text/xml; charset='._CHARSET);
		$xoopsOption['template_main'] = "db:system_rss.html";
		$tpl = new XoopsTpl();
		
With these lines:

	function render () {
		include_once ICMS_ROOT_PATH . '/class/template.php';
		//header ('Content-Type:text/xml; charset='._CHARSET);
		$xoopsOption['template_main'] = "db:system_rss.html";
		$tpl = new XoopsTpl();
		

		
TinyMCE
-------
This is a fix to have the captions visible when TinyMCE is selected as editor in Impression -> Preferences.
Open the file /editors/tinymce/formtinymce.php and find this line:

	$this->XoopsFormTextArea ( "", @$this->_name, @$this->_value );

Replace it with this one:

	$this->XoopsFormTextArea ( @$this->_caption, @$this->_name, @$this->_value );




    .::McDonald::.

    http://members.lycos.nl/mcdonaldsstore/
    
