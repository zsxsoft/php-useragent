<?php

// Detect Web Browser versions
function detect_browser_version($title, $useragent)
{
	$lower_title = strtolower($title);
	$return = '';
	// Fix for Opera's UA string changes in v10.00+ (and others)
	$start=$title;
	if( ($lower_title == strtolower("Opera")
			|| $lower_title == strtolower("Opera Next") 
			|| $lower_title == strtolower("Opera Labs"))
		&& preg_match('/Version/i', $useragent))
	{
		$start = "Version";
	}
	elseif( ($lower_title == strtolower("Opera")
			|| $lower_title == strtolower("Opera Next") 
			|| $lower_title == strtolower("Opera Developer"))
		&& preg_match('/OPR/i', $useragent))
	{
		$start = "OPR";
	}
	elseif($lower_title == strtolower("Opera Mobi")
		&& preg_match('/Version/i', $useragent))
	{
		$start = "Version";
	}
	elseif($lower_title == strtolower("Safari")
		&& preg_match('/Version/i', $useragent))
	{
		$start = "Version";
	}
	elseif($lower_title == strtolower("Pre")
		&& preg_match('/Version/i', $useragent))
	{
		$start = "Version";
	}
	elseif($lower_title == strtolower("Android Webkit"))
	{
		$start = "Version";
	}
	elseif($lower_title == strtolower("Links"))
	{
		$start = "Links (";
	}
	elseif($lower_title == strtolower("UC Browser"))
	{
		$start = "UC Browse";
	}
	elseif($lower_title == strtolower("TenFourFox"))
	{
		$start = " rv";
	}
	elseif($lower_title == strtolower("Classilla"))
	{
		$start = " rv";
	}
	elseif($lower_title == strtolower("SmartTV"))
	{
		$start = "WebBrowser";
	}
	elseif($lower_title == strtolower("MSIE") && preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $useragent))
	{
		// We have IE11 or newer
		$start = " rv";
	}

	// Grab the browser version if its present
	$version = '';
	if (preg_match('/'.$start.'[\ |\/|\:]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$version = $regmatch[1];
	}
	
	// $return = browser Title and Version, but first..some titles need to be changed
	if($lower_title == "msie"
		&& strtolower($version) == "7.0"
		&& preg_match('/Trident\/4.0/i', $useragent))
	{
		$return = " 8.0 (Compatibility Mode)"; // Fix for IE8 quirky UA string with Compatibility Mode enabled
	}
	elseif($lower_title == "msie")
	{
		$return = " ".$version;
	}
	elseif($lower_title == "multi-browser")
	{
		$return = "Multi-Browser XP ".$version;
	}
	elseif($lower_title == "nf-browser")
	{
		$return = "NetFront ".$version;
	}
	elseif($lower_title == "semc-browser")
	{
		$return = "SEMC Browser ".$version;
	}
	elseif($lower_title == "ucweb" || $lower_title == "uc?browser")
	{
		$return = "UC Browser ".$version;
	}
	elseif($lower_title == "ba?idubrowser")
	{
		$return = "Baidu Browser ".$version;
	}
	elseif($lower_title == "up.browser"
		|| $lower_title == "up.link")
	{
		$return = "Openwave Mobile Browser ".$version;
	}
	elseif($lower_title == "chromeframe")
	{
		$return = "Google Chrome Frame ".$version;
	}
	elseif($lower_title == "mozilladeveloperpreview")
	{
		$return = "Mozilla Developer Preview ".$version;
	}
	elseif($lower_title == "multi-browser")
	{
		$return = "Multi-Browser XP ".$version;
	}
	elseif($lower_title == "opera mobi")
	{
		$return = "Opera Mobile ".$version;
	}
	elseif($lower_title == "osb-browser")
	{
		$return = "Gtk+ WebCore ".$version;
	}
	elseif($lower_title == "tablet browser")
	{
		$return = "MicroB ".$version;
	}
	elseif($lower_title == "tencenttraveler")
	{
		$return = "TT Explorer ".$version;
	}
	elseif($lower_title == "crmo")
	{
		$return = "Chrome Mobile ".$version;
	}
	elseif($lower_title == "smarttv")
	{
		$return = "Maple Browser ".$version;
	}
	elseif($lower_title == "wp-android"
		|| $lower_title == "wp-iphone")
	{
		//TODO check into Android version being $return =ed
		$return = "Wordpress App ".$version;
	}
	elseif($lower_title == "atomicbrowser")
	{
		$return = "Atomic Web Browser ".$version;
	}
	elseif($lower_title == "barcapro")
	{
		$return = "Barca Pro ".$version;
	}
	elseif($lower_title == "dplus")
	{
		$return = "D+ ".$version;
	}
	elseif($lower_title == "opera labs")
	{
		preg_match('/Edition\ Labs([\ ._0-9a-zA-Z]+);/i', $useragent, $regmatch);
		$return = $title.$regmatch[1]." ".$version;
	}
	else
	{
		$return = $title." ".$version;
	}
	
	return $return;
}

?>
