==============
IMPRESSION 1.1
==============


Installation
------------
You can install the module Impression as any other ImpressCMS module.
Upon installing the uploads/impression will be created automatically upon installation.
For instructions about installing modules see the ImpressCMS Wiki: http://wiki.impresscms.org/index.php?title=Adding_Modules


Waiting
-------
The 'plugins' contains a plugin for the Waiting Contents block.


imGlossary
----------
To have words linked to imGlossary this module has to be installed.
You can download the latest version from the ImpressCMS Addons website or McDonalds Store.


Tags
----
To use the tag feature with Impression your installation needs the following:
- Frameworks library installed
    http://addons.impresscms.org/modules/wfdownloads/singlefile.php?lid=170
- Xoops Tag module installed and active, for example version 1.6. 
    http://addons.impresscms.org/modules/wfdownloads/singlefile.php?cid=8&lid=1333

Make sure that you use versions for Xoops 2.0.18 and not for Xoops 2.3
If the Tag module is installed and active, an extra form for entering the tags will be visible in the submit forms.

Note: Do NOT use the blocks Top Tag and Tag Cloud when the Tag module is not installed.


Open Graph
----------
When an article (singlearticle.php) is being read Impression passes the following two Open Graph properties to the theme header:
- image
- url
For this it is advised to add the following to the header of the file theme.html of your theme. Preferbly after the meta-tags.

<!-- Open Graph -->
	<meta property="og:title" content="<{if $icms_pagetitle !=''}><{$icms_pagetitle}><{else}><{$icms_sitename}><{/if}>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<{$icms_meta_description}>" />
	<meta property="og:site_name" content="<{$icms_sitename}>" />
	<meta property="og:locale" content="en_US" />
	<{if $og_image !=''}><meta property="og:image" content="<{$og_image}>" /><{else}><meta property="og:image" content="<{$icms_url}>/images/s_poweredby.gif" /><{/if}>
	<{if $og_url !=''}><meta property="og:url" content="<{$og_url}>" /><{/if}>
	
In case you're using a module on the frontpage, for example Impression, and the url to your website looks like www.website.com/modules/impression/ the last line should look like this:

	<{if $og_url !=''}><meta property="og:url" content="<{$og_url}>" /><{else}><meta property="og:url" content="<{$icms_url}>/modules/impression/" /><{/if}>
	
To test if the above code is working you can test it by passing the website url and an url to an Impression article to the Facebook Debugger: http://developers.facebook.com/tools/debug

Further, in the file theme.html you have to replace this line

	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$icms_langcode}>">
	
with this one:

	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" xml:lang="<{$icms_langcode}>">


More information about the Open Graph Protocol can be found here:
- http://ogp.me/
- http://developers.facebook.com/docs/beta/



.::McDonald::.

http://code.google.com/p/mcdonaldsstore/downloads/list