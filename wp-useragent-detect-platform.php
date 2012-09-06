<?php

// Detect Platform (check for Device, then OS if no device is found, else return null)
function detect_platform()
{
	global $useragent, $ua_show_text, $ua_text_links, $ua_hide_unknown_bool;

	if(strlen($detected_platform=detect_device()) > 0)
	{
		return $detected_platform;
	}
	elseif(strlen($detected_platform=detect_os()) > 0)
	{
		return $detected_platform;
	}
	else
	{
		$title="Unknown";
		$link="#";
		$code="null";

		if($ua_hide_unknown_bool=='true'
			&& $ua_show_text==2)
		{
			return $title;
		}
	}

	// How should we display this?
	if($ua_show_text=="1"
		&& $ua_text_links!="0")
	{	//image and linked text
		$detected_os=img($code, "/os/", $title)." <a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	}
	else if($ua_show_text=="1")
	{	//image and text
		$detected_os=img($code, "/os/", $title)." ".$title;
	}
	else if($ua_show_text=="2")
	{	//image only
		$detected_os=img($code, "/os/", $title);
	}
	else if($ua_show_text=="3"
		&& $ua_text_links!="0")
	{	//linked text only
		$detected_os="<a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	}
	else if($ua_show_text=="3")
	{	//text only
		$detected_os=$title;
	}

	return $detected_os;
}

?>
