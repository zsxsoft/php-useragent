<?php
/**
 * Detect Platform
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @author Kyle Baker <kyleabaker@gmail.com>
 * @author Fernando Briano <transformers.es@gmail.com>
 * @copyright Copyright 2014 zsx
 * @copyright Copyright 2008-2014 Kyle Baker (email: kyleabaker@gmail.com)
 * @copyright 2008 Fernando Briano (email : transformers.es@gmail.com)
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Detect Platform (check for Device, then OS if no device is found, else return null)
 */

function detect_platform($useragent) {
	$link = '';
	$title = '';
	$code = '';
	$dir = '';

	$detected_platform = detect_device($useragent);
	if ($detected_platform['title'] != '') {
		return $detected_platform;
	}

	$detected_platform = detect_os($useragent);
	if ($detected_platform['title'] != '') {
		return $detected_platform;
	} else {
		$title = "Unknown";
		$link = "#";
		$code = "null";
		$dir = "net";
	}

	return array(
		'link' => $link,
		'title' => $title,
		'image' => $code,
		'dir' => $dir,
	);
}

?>
