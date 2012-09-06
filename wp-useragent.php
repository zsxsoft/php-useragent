<?php
/*
Plugin Name: WP-UserAgent
Plugin URI: http://kyleabaker.com/goodies/coding/wp-useragent/
Description: A simple User-Agent detection plugin that lets you easily insert icons and/or textual web browser and operating system details with each comment.
Version: 1.0.0
Author: Kyle Baker
Author URI: http://kyleabaker.com/
//Author: Fernando Briano
//Author URI: http://picandocodigo.net
*/

/* Copyright 2008-2012  Kyle Baker  (email: kyleabaker@gmail.com)
	//Copyright 2008  Fernando Briano  (email : transformers.es@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Pre-2.6 compatibility
if(!defined('WP_CONTENT_URL'))
	define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if(!defined('WP_CONTENT_DIR'))
	define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if(!defined('WP_PLUGIN_URL'))
	define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if(!defined('WP_PLUGIN_DIR'))
	define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

// Plugin Options
$url_img=WP_PLUGIN_URL."/wp-useragent/img/";

$ua_doctype				= get_option('ua_doctype');
$ua_comment_size		= get_option('ua_comment_size');
$ua_track_size			= get_option('ua_track_size');
$ua_show_text			= get_option('ua_show_text');
$ua_image_style			= get_option('ua_image_style');
$ua_image_css			= get_option('ua_image_css');
$ua_text_surfing		= get_option('ua_text_surfing');
$ua_text_on				= get_option('ua_text_on');
$ua_text_via			= get_option('ua_text_via');
$ua_text_links			= get_option('ua_text_links');
$ua_show_ua_bool		= get_option('ua_show_ua_bool');
$ua_hide_unknown_bool	= get_option('ua_hide_unknown_bool');
$ua_output_location		= get_option('ua_output_location');

// Include our main UA detection functions
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-device.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-os.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-platform.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-trackback.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-webbrowser.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-webbrowser-version.php');

// Image generation function
function img($code, $type, $title)
{
	global $ua_comment_size, $ua_track_size, $ua_image_style, $ua_image_css, $ua_trackback, $url_img, $ua_doctype;

	// We need to default icons to size 16 or 24, we'll just use 16.
	if($ua_comment_size=="")
	{
		$ua_comment_size=16;
	}
	if($ua_track_size=="")
	{
		$ua_track_size=16;
	}

	// Set the style/class for icon appearance...
	if($ua_image_style=="1")
	{
		$img_style="style='border:0px;vertical-align:middle;'";
	}
	elseif($ua_image_style=="2")
	{
		$img_style="style='".$ua_image_css."'";
	}
	elseif($ua_image_style=="3")
	{
		$img_style="class='".$ua_image_css."'";
	}

	// Set the img to display browser/os/device
	// src=http://blogurl/plugins/plugin-name/size/net-os-device/code.png
	if($ua_trackback==1)
	{
		$img="<img src='".$url_img.$ua_track_size.$type.$code.".png' title='".$title."' ".$img_style." alt='".$title."'";
	}
	else
	{
		$img="<img src='".$url_img.$ua_comment_size.$type.$code.".png' title='".$title."' ".$img_style." alt='".$title."'";
	}

	// End the img tag following their specified html preference.
	if($ua_doctype=="html")
	{
		$img.=">";
	}
	elseif($ua_doctype=="xhtml")
	{
		$img.=" />";
	}

	return $img;
}

// Main function
function wp_useragent()
{
	global $comment, $useragent, $ua_output_location, $ua_trackback;

	// Default tracks to zero.
	$ua_trackback=0;

	// This grabs the ua and comment details per user.
	get_currentuserinfo();

	// Where should we display the useragent output?
	$useragent=$comment->comment_agent;
	if($ua_output_location=="before")
	{
		display_useragent();
		ua_comment();
		add_filter('comment_text', 'wp_useragent');
	}
	elseif($ua_output_location=="after")
	{
		ua_comment();
		display_useragent();
		add_filter('comment_text', 'wp_useragent');
	}
	elseif($ua_output_location=="custom")
	{
		display_useragent();
	}
}

// Function to form the final String
function display_useragent()
{
	global $comment, $ua_show_text, $ua_text_surfing, $ua_text_on, $ua_text_via, $ua_show_ua_bool, $ua_hide_unknown_bool, $ua_doctype;

	// Check if the comment is a trackback or a comment
	if($comment->comment_type=='trackback' || $comment->comment_type=='pingback')
	{
		// We've got a trackback...
		$trackback=detect_trackback();

		if($ua_show_text=="1" || $ua_show_text=="3")
		{
			if($ua_hide_unknown_bool=='true' && strpos($trackback,"Unknown"))
			{
				$ua="";
			}
			else
			{
				$ua="$ua_text_via $trackback";
			}
		}
		elseif($ua_show_text=="2")
		{
			if($ua_hide_unknown_bool=='true' && strpos($trackback,"Unknown"))
			{
				$ua="";
			}
			else
			{
				$ua=$trackback;
			}
		}
	}
	else
	{
		// We've got a comment...
		$webbrowser=detect_webbrowser();
		$platform=detect_platform();

		// Does the user want to display text, icons, or both?
		if($ua_show_text=="1" || $ua_show_text=="3")
		{
			if($ua_hide_unknown_bool=='true' && strpos($webbrowser,"Unknown") && strpos($platform,"Unknown"))
			{
				$ua="";
			}
			elseif($ua_hide_unknown_bool=='true' && strpos($webbrowser,"Unknown"))
			{
				$ua="$ua_text_on $platform";
			}
			elseif($ua_hide_unknown_bool=='true' && strpos($platform,"Unknown"))
			{
				$ua="$ua_text_surfing $webbrowser";
			}
			else
			{
				$ua="$ua_text_surfing $webbrowser $ua_text_on $platform";
			}
		}
		elseif($ua_show_text=="2")
		{
			if($ua_hide_unknown_bool=='true' && strpos($webbrowser,"Unknown") && strpos($platform,"Unknown"))
			{
				$ua="";
			}
			elseif($ua_hide_unknown_bool=='true' && strpos($webbrowser,"Unknown"))
			{
				$ua=$platform;
			}
			elseif($ua_hide_unknown_bool=='true' && strpos($platform,"Unknown"))
			{
				$ua=$webbrowser;
			}
			else
			{
				$ua=$webbrowser.$platform;
			}
		}
	}

	// Does the user want to display the full ua string?
	if($ua_show_ua_bool=='true')
	{
		if(strlen($ua) > 0)
		{
			if($ua_doctype=="html")
			{
				$ua.="<br>";
			}
			elseif($ua_doctype=="xhtml")
			{
				$ua.="<br />";
			}
		}

		// Attach the full ua string to the output.
		$ua.="<small>".htmlspecialchars($comment->comment_agent)."</small>";
	}

	// The following conditional will hopefully prevent a problem where
	// the echo statement will interrupt redirects from the comment page.
	if(empty($_POST['comment_post_ID']))
	{
		echo $ua;
	}
}

// Custom function for displaying the output in non-standard locations.
function useragent_output_custom(){
	global $ua_output_location, $useragent, $comment;

	if($ua_output_location=="custom")
	{
		get_currentuserinfo();
		$useragent=$comment->comment_agent;
		display_useragent();
	}
}

// Util functions for filters and stuff.
function ua_comment()
{
	global $comment;

	remove_filter('comment_text', 'wp_useragent');
	apply_filters('get_comment_text', $comment->comment_content);

	// The following conditional will hopefully prevent a problem where
	// the echo statement will interrupt redirects from the comment page.
	if(empty($_POST['comment_post_ID']))
	{
		echo apply_filters('comment_text', $comment->comment_content);
	}
}

// Add a link to our Options page for Admin users.
function add_option_page()
{
	add_options_page('WP-UserAgent', 'WP-UserAgent', 'manage_options','wp-useragent/wp-useragent-options.php');
}
add_action('admin_menu', 'add_option_page');

// If the user selected to display output in a standard location
// and not a custom location then lets add a filter here.
if($ua_output_location!='custom')
{
	add_filter('comment_text', 'wp_useragent');
}

// Add quick links to plugins page
$plugin=plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'my_plugin_actlinks' ); 
function my_plugin_actlinks( $links )
{ 
	// Add a link to this plugin's settings page
	$settings_link='<a href="options-general.php?page=wp-useragent/wp-useragent-options.php">Settings</a>'; 
	array_unshift( $links, $settings_link ); 
	return $links; 
}

?>
