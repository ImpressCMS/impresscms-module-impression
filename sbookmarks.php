<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: sbookmarks.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		Impression
* @since		1.00
* @author		McDonald
* @version		$Id$
*/

function impression_sbmarks( $aid, $title ) { 
	$sbmark_title = htmlspecialchars( $title );
	$sbmark_link = ICMS_URL . '/modules/' . icms::$module -> getVar( 'dirname' ) . '/singlearticle.php?aid=' . intval( $aid );

//Definitions for social bookmarks

//Backflip
$sbmarks['blackflip'] = '<a href="http://www.backflip.com/add_page_pop.ihtml?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/backflip.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'BackFlip" alt="" /></a>';

//Bibsonomy
$sbmark['bibsonomy'] = '<a href="http://www.bibsonomy.org/ShowBookmarkEntry?c=b&jump=yes&url=' . $sbmark_link . '&description=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/bibsonomy.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Bibsonomy alt="" /></a>';

//BlinkList
$sbmarks['blinklist'] = '<a href="http://www.blinklist.com/index.php?Action=Blink/addblink.php&Quick=true&Url=' . $sbmark_link . '&Title=' . $sbmark_title . '&Pop=yes" target="_blank"><img border="0" src="images/sbookmarks/blinklist.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'BlinkList" alt="" /></a>';

//Blogmark
$sbmark['blogmark'] = '<a href="http://blogmarks.net/my/new.php?title=' . $sbmark_title . '&url=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/blogmarks.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'BlogMarks" alt="" /></a>';

//CiteUlike
$sbmark['citeulike'] = '<a href="http://www.citeulike.org/posturl?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/citeulike.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'CiteUlike" alt="" /></a>';

//Connotea
$sbmarks['connotea'] = '<a href="http://www.connotea.org/add?continue=return&uri=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/connotea.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Connotea" alt="" /></a>';

//del.icio.us
$sbmarks['delicio'] = '<a href="http://del.icio.us/post?v=4&noui&jump=close&url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/del.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'del.icio.us" alt="" /></a>';

//Digg
$sbmarks['digg'] = '<a href="http://digg.com/submit?phase=2&url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/digg.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Digg" alt="" /></a>';

//Diigo
$sbmarks['diigo'] = '<a href="http://www.diigo.com/post?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/diigo.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Diigo" alt="" /></a>';

//DZone
$sbmarks['dzone'] = '<a href="http://www.dzone.com/links/add.html?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/dzone.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'DZone" alt="" /></a>';

//Earthlink
$sbmarks['earthlink'] = '<a href="http://myfavorites.earthlink.net/my/add_favorite?v=1&url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/earthlink.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'EarthLink MyFavorites" alt="" /></a>';

//EatMyHamster
$sbmarks['eatmyhamster'] = '<a href="http://www.eatmyhamster.com/post?u=' . $sbmark_link . '&h=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/eatmyhamster.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'EatMyHamster" alt="" /></a>';

//FaceBook
$sbmarks['facebook'] ='<a href="http://www.facebook.com/sharer.php?u=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"> <img border="0" src="images/sbookmarks/facebook.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Facebook" alt="" /></a>';

//Fantacular
$sbmarks['fantacular'] = '<a href="http://fantacular.com/add.asp?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/fantacular.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Fantacular" alt="" /></a>';

//Fark
$sbmarks['fark'] = '<a href="http://cgi.fark.com/cgi/fark/edit.pl?new_url=' . $sbmark_link . '&new_comment=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/fark.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Fark" alt="' . _MD_IMPRESSION_ADDTO . 'Fark"></a>';

//FeedMarker
$sbmarks['feedmarker'] = '<a href="http://www.feedmarker.com/admin.php?do=bookmarklet_mark&url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/feedmarker.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'FeedMarker" alt="" /></a>';

//FeedMeLinks
$sbmarks['feedmelinks'] = '<a href="http://feedmelinks.com/categorize?from=toolbar&op=submit&name=' . $sbmark_title . '&url=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/feedmelinks.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'FeedMeLinks" alt="" /></a>';

//Furl
$sbmarks['furl'] = '<a href="http://www.furl.net/storeIt.jsp?t=' . $sbmark_title . '&u=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/furl.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Furl" alt="" /></a>';

//Google
$sbmarks['google'] = '<a href="http://www.google.com/bookmarks/mark?op=edit&output=popup&bkmk=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/google.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Google" alt="" /></a>';

//Gravee
$sbmarks['gravee'] = '<a href="http://www.gravee.com/account/bookmarkpop?u=' . $sbmark_link . '&t=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/gravee.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Gravee" alt="" /></a>';

//igooi
$sbmarks['igooi'] = '<a href="http://www.igooi.com/addnewitem.aspx?self=1&noui=yes&jump=close&url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/igooi.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'igooi" alt="" /></a>';

//iTalkNews
$sbmarks['italknews'] = '<a href="http://italknews.com/member/write_link.php?content=' . $sbmark_link . '&headline=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/italknews.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'iTalkNews" alt="" /></a>';

//Jookster
$sbmarks['jookster'] = '<a href="http://www.jookster.com/JookThis.aspx?url=' . $sbmark_link . '"' . 'target="_blank"><img border="0" src="images/sbookmarks/jookster.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Jookster" alt="" /></a>';

//Kinja
$sbmarks['kinja'] = '<a href="http://kinja.com/id.knj?url=' . $sbmark_link . '"' . 'target="_blank"><img border="0" src="images/sbookmarks/kinja.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Kinja" alt="" /></a>';

//Linkagogo
$sbmarks['linkagogo'] = '<a href="http://www.linkagogo.com/go/AddNoPopup?title=' . $sbmark_title . '&url=' . $sbmark_link . '"' . 'target="_blank"><img border="0" src="images/sbookmarks/linkagogo.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Linkagogo" alt="" /></a>';

//LinkRoll
$sbmarks['linkroll'] = '<a href="http://linkroll.com/insert.php?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/linkroll.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'LinkRoll" alt="" /></a>';

//linuxquestions.org
$sbmarks['linuxquestions'] = '<a href="http://bookmarks.linuxquestions.org/linux/post?uri=' . $sbmark_link . '&title=' . $sbmark_title . '&when_done=go_back"' . 'target="_blank"><img border="0" src="images/sbookmarks/linuxquestions.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'linuxquestions.org" alt="" /></a>';

//LookMarks
$sbmarks['lookmarks'] = '<a href="http://www.lookmarks.com/AddLinkFrame.aspx?Url=' . $sbmark_link . '&Title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/lookmarks.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'LookMarks" alt="" /></a>';

//Lycos
$sbmarks['lycos'] = '<a href="http://iq.lycos.co.uk/lili/my/add?url=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/lycos.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Lycos" alt="" /></a>';

//Windows Live
$sbmarks['live'] = '<a href="https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&title=' . $sbmark_title . '&url=' . $sbmark_link . '&top=1' . '"' . 'target="_blank"><img border="0" src="images/sbookmarks/windows_live.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Windows Live" alt="" /></a>';

//Magnolia
$sbmarks['magnolia'] = '<a href="http://ma.gnolia.com/bookmarklet/add?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/magnolia.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Ma.gnolia" alt="" /></a>';

//Markabboo
$sbmarks['markabboo'] = '<a href="http://www.markaboo.com/resources/new?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/markabboo.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Markabboo" alt="" /></a>';

//Netscape
$sbmarks['netscape'] = '<a href="http://www.netscape.com/submit/?U=' . $sbmark_link . '&T=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/netscape.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Netscape" alt="" /></a>';

//Netvouz
$sbmarks['netvouz'] = '<a href="http://www.netvouz.com/action/submitBookmark?url=' . $sbmark_link . '&title=' . $sbmark_title . '&popup=no"' . ' target="_blank"><img border="0" src="images/sbookmarks/netvouz.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Netvouz" alt="" /></a>';

//Newsvine
$sbmarks['newsvine'] = '<a href="http://www.newsvine.com/_tools/seed&save?u=' . $sbmark_link . '&h=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/newsvine.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Newsvine" alt="" /></a>';

//Ning
$sbmarks['ning'] = '<a href="http://bookmarks.ning.com/addItem.php?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/ning.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Ning" alt="" /></a>';

//NowPublic
$sbmarks['nowpublic'] = '<a href="http://view.nowpublic.com/?src=' . $sbmark_link . '&t=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/nowpublic.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'NowPublic" alt="" /></a>';

//RawSugar
$sbmarks['rawsugar'] = '<a href="http://www.rawsugar.com/pages/tagger.faces?turl=' . $sbmark_link . '&tttl=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/rawsugar.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'RawSugar" alt="" /></a>';

//Reddit
$sbmarks['reddit'] = '<a href="http://reddit.com/submit?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/reddit.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'reddit" alt="" /></a>';

//Riffs
$sbmarks['riffs'] = '<a href="http://www.riffs.com/item.cgi?section=init_url&url=' . $sbmark_link . '&name=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/riffs.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Riffs" alt="" /></a>';

//Rojo
$sbmarks['rojo'] = '<a href="http://www.rojo.com/submit/?title=' . $sbmark_title . '&url=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/rojo.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Rojo" alt="" /></a>';

//Shadows
$sbmarks['shadow'] = '<a href="http://www.shadows.com/features/tcr.htm?title=' . $sbmark_title . '&url=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/shadows.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Shadows" alt="" /></a>';

//Squidoo
$sbmarks['squidoo'] = '<a href="http://www.squidoo.com/lensmaster/bookmark?' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/squidoo.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Squidoo" alt="" /></a>';

//StumbleUpon
$sbmarks['stumble'] = '<a href="http://www.stumbleupon.com/submit?url=' . $sbmark_link . '&title=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/stumbleupon.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'StumbleUpon" alt="" /></a>';

//tagtooga
$sbmarks['tagtooga'] = '<a href="http://www.tagtooga.com/tapp/db.exe?c=jsEntryForm&b=fx&title=' . $sbmark_title . '&url=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/tagtooga.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'tagtooga" alt="" /></a>';

//Technorati
$sbmarks['techno'] = '<a="http://www.technorati.com/faves?add=' . $sbmark_link . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/technorati.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Technorati" alt="" /></a>';

//Wink
$sbmarks['wink'] = '<a href="http://www.wink.com/_/tag?url=' . $sbmark_link . '&doctitle=' . $sbmark_title . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/wink.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Wink" alt="" /></a>';

// Yahoo
$sbmarks['yahoo'] = '<a href="http://myweb2.search.yahoo.com/myresults/bookmarklet?t=' . $sbmark_title . '&u=' . $sbmark_link . '"' . ' target="_blank"><img border="0" src="images/sbookmarks/yahoo.gif" style="vertical-align: middle;" title="' . _MD_IMPRESSION_ADDTO . 'Yahoo MyWeb" alt="" /></a>';

//Information
$sbmarks['info'] = '<a href="http://en.wikipedia.org/wiki/Social_bookmarking" target="_blank"><img border="0" src="images/sbookmarks/what.gif" style="vertical-align: middle;" title="Information" alt="" /></a>';

// Make list of selected social bookmarks
// Comment out thosr social bookmarks which should not be visible

$sbmarks['sbmarks'] =	//$sbmarks['blackflip'] . " " .
						//$sbmark['bibsonomy'] . " " .
						$sbmarks['blinklist'] . " " .
						//$sbmark['blogmark'] . " " .
						//$sbmark['citeulike'] . " " .
						//$sbmarks['connotea'] . " " .
						$sbmarks['delicio'] . " " .
						$sbmarks['digg'] . " " .
						//$sbmarks['diigo'] . " " .
						//$sbmarks['dzone'] . " " .
						//$sbmarks['earthlink'] . " " .
						//$sbmarks['eatmyhamster'] . " " .
						$sbmarks['facebook'] . " " .
						//$sbmarks['fantacular'] . " " .
						//$sbmarks['fark'] . " " .
						//$sbmarks['feedmarker'] . " " .
						//$sbmarks['feedmelinks'] . " " .
						$sbmarks['furl'] . " " .
						$sbmarks['google'] . " " .
						//$sbmarks['gravee'] . " " .
						//$sbmarks['igooi'] . " " .
						//$sbmarks['italknews'] . " " .
						//$sbmarks['jookster'] . " " .
						//$sbmarks['kinja'] . " " .
						//$sbmarks['linkagogo'] . " " .
						//$sbmarks['linkroll'] . " " .
						//$sbmarks['linuxquestions'] . " " .
						//$sbmarks['live'] . " " .         <==== Don't use doesn't work properly
						//$sbmarks['lookmarks'] . " " .
						//$sbmarks['lycos'] . " " .
						//$sbmarks['magnolia'] . " " .
						//$sbmarks['markabboo'] . " " .
						//$sbmarks['netscape'] . " " .
						//$sbmarks['netvouz'] . " " .
						//$sbmarks['newsvine'] . " " .
						//$sbmarks['ning'] . " " .
						//$sbmarks['nowpublic'] . " " .
						//$sbmarks['rawsugar'] . " " .
						$sbmarks['reddit'] . " " .
						//$sbmarks['riffs'] . " " .
						//$sbmarks['rojo'] . " " .
						//$sbmarks['shadow'] . " " .
						//$sbmarks['squidoo'] . " " .
						$sbmarks['stumble'] . " " .
						//$sbmarks['tagtooga'] . " " .
						//$sbmarks['techno'] . " " .
						$sbmarks['wink'] . " " .
						$sbmarks['yahoo'] . " " .
						$sbmarks['info'];

return $sbmarks['sbmarks'];
}
?>