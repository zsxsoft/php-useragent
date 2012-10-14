<?php

// Detect Web Browser versions
function detect_browser_version($title)
{
	global $useragent;

	// Fix for Opera's UA string changes in v10.00+ (and others)
	$start=$title;
	if( (strtolower($title)==strtolower("Opera")
			|| strtolower($title)==strtolower("Opera Next") 
			|| strtolower($title)==strtolower("Opera Labs"))
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Opera Mobi")
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Safari")
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Pre")
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Android Webkit"))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Links"))
	{
		$start="Links (";
	}
	elseif(strtolower($title)==strtolower("UC Browser"))
	{
		$start="UC Browse";
	}
	elseif(strtolower($title)==strtolower("TenFourFox"))
	{
		$start=" rv";
	}
	elseif(strtolower($title)==strtolower("Classilla"))
	{
		$start=" rv";
	}
	elseif(strtolower($title)==strtolower("SmartTV"))
	{
		$start="WebBrowser";
	}

	// Grab the browser version if its present
	preg_match('/'.$start.'[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch);
	$version=$regmatch[1];

	// Return browser Title and Version, but first..some titles need to be changed
	if(strtolower($title)=="msie"
		&& strtolower($version)=="7.0"
		&& preg_match('/Trident\/4.0/i', $useragent))
	{
		return " 8.0 (Compatibility Mode)"; // Fix for IE8 quirky UA string with Compatibility Mode enabled
	}
	elseif(strtolower($title)=="msie")
	{
		return " ".$version;
	}
	elseif(strtolower($title)=="multi-browser")
	{
		return "Multi-Browser XP ".$version;
	}
	elseif(strtolower($title)=="nf-browser")
	{
		return "NetFront ".$version;
	}
	elseif(strtolower($title)=="semc-browser")
	{
		return "SEMC Browser ".$version;
	}
	elseif(strtolower($title)=="ucweb")
	{
		return "UC Browser ".$version;
	}
	elseif(strtolower($title)=="up.browser"
		|| strtolower($title)=="up.link")
	{
		return "Openwave Mobile Browser ".$version;
	}
	elseif(strtolower($title)=="chromeframe")
	{
		return "Google Chrome Frame ".$version;
	}
	elseif(strtolower($title)=="mozilladeveloperpreview")
	{
		return "Mozilla Developer Preview ".$version;
	}
	elseif(strtolower($title)=="multi-browser")
	{
		return "Multi-Browser XP ".$version;
	}
	elseif(strtolower($title)=="opera mobi")
	{
		return "Opera Mobile ".$version;
	}
	elseif(strtolower($title)=="osb-browser")
	{
		return "Gtk+ WebCore ".$version;
	}
	elseif(strtolower($title)=="tablet browser")
	{
		return "MicroB ".$version;
	}
	elseif(strtolower($title)=="tencenttraveler")
	{
		return "TT Explorer ".$version;
	}
	elseif(strtolower($title)=="crmo")
	{
		return "Chrome Mobile ".$version;
	}
	elseif(strtolower($title)=="smarttv")
	{
		return "Maple Browser ".$version;
	}
	elseif(strtolower($title)=="wp-android"
		|| strtolower($title)=="wp-iphone")
	{
		//TODO check into Android version being returned
		return "Wordpress App ".$version;
	}
	elseif(strtolower($title)=="atomicbrowser")
	{
		return "Atomic Web Browser ".$version;
	}
	elseif(strtolower($title)=="barcapro")
	{
		return "Barca Pro ".$version;
	}
	elseif(strtolower($title)=="dplus")
	{
		return "D+ ".$version;
	}
	elseif(strtolower($title)=="opera labs")
	{
		preg_match('/Edition\ Labs([\ ._0-9a-zA-Z]+);/i', $useragent, $regmatch);
		return $title.$regmatch[1]." ".$version;
	}
	else
	{
		return $title." ".$version;
	}
}

?>
