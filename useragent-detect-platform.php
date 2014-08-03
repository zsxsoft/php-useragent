<?php

// Detect Platform (check for Device, then OS if no device is found, else return null)
function detect_platform($useragent)
{
	$link = ''; $title = '';$code = '';$dir = '';

	$detected_platform = detect_device($useragent);
	if ($detected_platform['title'] != '')
	{
		return $detected_platform;
	}
	
	$detected_platform = detect_os($useragent);
	if ($detected_platform['title'] != '')
	{
		return $detected_platform;
	}

	else
	{
		$title = "Unknown";
		$link = "#";
		$code = "null";
		$dir = "net";
	}

	return array(
		'link' => $link,
		'title' => $title, 
		'image' => $code,
		'dir' => $dir
	);
}

?>
