<?php

// Detect Trackbacks...
function detect_trackback()
{
	global $useragent, $ua_trackback, $ua_show_text, $ua_text_links, $ua_hide_unknown_bool;

	$ua_trackback=0;

	if(preg_match('/Drupal/i', $useragent))
	{
		$link="http://www.drupal.org/";
		$title="Drupal";
		$code="drupal";
	}
	elseif(preg_match('/Feedburner/i', $useragent))
	{
		$link="http://www.feedburner.com/";
		$title="FeedBurner";
		$code="feedburner";
	}
	elseif(preg_match('/laconica|statusnet/i', $useragent))
	{
		$link="http://status.net/";
		$title="StatusNet";
		$code="laconica";
	}
	elseif(preg_match('/libwww-perl\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://search.cpan.org/dist/libwww-perl/";
		$title="libwww-perl";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/meneame/i', $useragent))
	{
		$link="http://www.meneame.net/";
		$title="Meneame";
		$code="meneame";
	}
	elseif(preg_match('/MovableType\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://www.movabletype.org/";
		$title="MovableType";
		$code="movabletype";
		$version=$regmatch[1];
	}
	elseif(preg_match('/Peach\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://www.psych.neu.edu/faculty/y.petrov/Software/PEACH/";
		$title="Peach";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/pligg/i', $useragent))
	{
		$link="http://www.pligg.com/";
		$title="Pligg";
		$code="pligg";
	}
	elseif(preg_match('/Python-urllib\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://docs.python.org/library/urllib.html";
		$title="Python-urllib";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/Snoopy\ v([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://sourceforge.net/projects/snoopy/";
		$title="Snoopy";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/SOAP::/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/SOAP";
		$title="SOAP (Simple Object Access Protocol)";
		$code.="null";
	}
	elseif(preg_match('/Typepad/i', $useragent))
	{
		$link="http://www.typepad.com/";
		$title="Typepad";
		$code.="typepad";
	}
	elseif(preg_match('/vBSEO/i', $useragent))
	{
		$link="http://www.vbseo.com/";
		$title="vBSEO (VBulletin)";
		$code.="vbseo";
	}
	elseif(preg_match('/WordPress\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://www.wordpress.org/";
		$title="WordPress";
		$code="wordpress";
		$version=$regmatch[1];
	}
	elseif(preg_match('/XML-RPC/i', $useragent))
	{
		$link="http://www.xmlrpc.com/";
		$title="XML-RPC";
		$code.="null";
	}
	else
	{
		$link="#";
		$title="Unknown";
		$code="null";

		if($ua_hide_unknown_bool=='true'
			&& $ua_show_text==2)
		{
			return $title;
		}
	}

	$title.=" ".$version;

	// How should we display this?
	if($ua_show_text=="1"
		&& $ua_text_links!="0")
	{	//image and linked text
		$detected_tb=img($code, "/trackback/", $title)." <a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	}
	elseif($ua_show_text=="1")
	{	//image and text
		$detected_tb=img($code, "/trackback/", $title)." ".$title;
	}
	else if($ua_show_text=="2")
	{	//image only
		$detected_tb=img($code, "/trackback/", $title);
	}
	else if($ua_show_text=="3"
		&& $ua_text_links!="0")
	{	//linked text only
		$detected_tb="<a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	}
	else if($ua_show_text=="3")
	{	//text only
		$detected_tb=$title;
	}

	return $detected_tb;
}

?>
