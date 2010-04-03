<?php
/*
Plugin Name: WP-UserAgent
Plugin URI: http://kyleabaker.com/goodies/coding/wp-useragent/
Description: A simple User-Agent detection plugin that lets you easily insert icons and/or textual web browser and operating system details with each comment.
Version: 0.9.5
Author: Kyle Baker
Author URI: http://kyleabaker.com/
//Author: Fernando Briano
//Author URI: http://picandocodigo.net
*/

/* Copyright 2008-2010  Kyle Baker  (email: kyleabaker@gmail.com)
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

//Plugin Options
$url_img=WP_PLUGIN_URL."/wp-useragent/img/";

$ua_doctype=get_option('ua_doctype');
$ua_comment_size=get_option('ua_comment_size');
$ua_track_size=get_option('ua_track_size');
$ua_show_text=get_option('ua_show_text');
$ua_image_style=get_option('ua_image_style');
$ua_image_css=get_option('ua_image_css');
$ua_text_surfing=get_option('ua_text_surfing');
$ua_text_on=get_option('ua_text_on');
$ua_show_ua_bool=get_option('ua_show_ua_bool');
$ua_output_location=get_option('ua_output_location');

//Detect webbrowser versions
function detect_browser_version($title){
	global $useragent;

	//fix for Opera's UA string changes in v10.00
	$start=$title;
	if (strtolower($title)==strtolower("Opera") && preg_match('/Version/i', $useragent))
		$start="Version";
	elseif (strtolower($title)==strtolower("Safari") && preg_match('/Version/i', $useragent))
		$start="Version";
	elseif (strtolower($title)==strtolower("Pre") && preg_match('/Version/i', $useragent))
		$start="Version";
	elseif (strtolower($title)==strtolower("ucweb"))
		$start="ucwe";
	elseif (strtolower($title)==strtolower("BlackBerry"))
		$start="/";

	if (strtolower($title)==strtolower("Maxthon") && preg_match('/Maxthon;/i', $useragent))
		$version=""; //quick hack to fix detection of Maxthon when no version is listed
	elseif (strtolower($title)==strtolower("BlackBerry"))
		$version=substr(strtolower($useragent),strpos(strtolower($useragent),strtolower($start))+strlen($start));
	else
		$version=substr(strtolower($useragent),strpos(strtolower($useragent),strtolower($start))+strlen($start)+1);


	//chop the remainder following ";" (MSIE uses this, maybe some others -> Maxathon;)
	if(strpos($version,"/")) //fix for Opera Mini
		$version=substr($version,0,strpos($version,"/"));
	elseif(strpos($version,";"))
		$version=substr($version,0,strpos($version,";"));
	elseif(strpos($version,")"))
		$version=substr($version,0,strpos($version,")"));
	


	//check to see if the version ends the user agent string, if not then chop the remainder
	if(strpos($version," "))
		$version=substr($version,0,strpos($version," "));

	if(strtolower($title)=="msie")
		return " ".$version;
	elseif(strtolower($title)=="nf-browser")
		return "NetFront ".$version;
	elseif(strtolower($title)=="semc-browser")
		return "SEMC Browser ".$version;
	elseif(strtolower($title)=="ucweb")
		return "UC Browser ".$version;
	elseif(strtolower($title)=="up.browser")
		return "Openwave Mobile Browser ".$version;
	else
		return $title." ".$version;
}

//Detect webbrowsers
function detect_webbrowser(){
	global $useragent, $ua_show_text;
	$mobile=0;
	if(preg_match('/ABrowse/i', $useragent)){
		$link="http://abrowse.sourceforge.net/";
		$title=detect_browser_version("ABrowse");
		$code="abrowse";
	}elseif(preg_match('/Acoo\ Browser/i', $useragent)){
		$link="http://www.acoobrowser.com/";
		$title="Acoo ".detect_browser_version("Browser");
		$code="acoobrowser";
	}elseif(preg_match('/Amaya/i', $useragent)){
		$link="http://www.w3.org/Amaya/";
		$title=detect_browser_version("Amaya");
		$code="amaya";
	}elseif(preg_match('/America\ Online\ Browser/i', $useragent)){
		$link="http://downloads.channel.aol.com/browser";
		$title="America Online ".detect_browser_version("Browser");
		$code="aol";
	}elseif(preg_match('/AmigaVoyager/i', $useragent)){
		$link="http://v3.vapor.com/voyager/";
		$title="Amiga ".detect_browser_version("Voyager");
		$code="amigavoyager";
	}elseif(preg_match('/AOL/i', $useragent)){
		$link="http://downloads.channel.aol.com/browser";
		$title=detect_browser_version("AOL");
		$code="aol";
	}elseif(preg_match('/Arora/i', $useragent)){
		$link="http://code.google.com/p/arora/";
		$title=detect_browser_version("Arora");
		$code="arora";
	}elseif(preg_match('/Avant\ Browser/i', $useragent)){
		$link="http://www.avantbrowser.com/";
		$title="Avant ".detect_browser_version("Browser");
		$code="avantbrowser";
	}elseif(preg_match('/Beonex/i', $useragent)){
		$link="http://www.beonex.com/";
		$title=detect_browser_version("Beonex");
		$code="beonex";
	}elseif(preg_match('/BlackBerry/i', $useragent)){
		$link="http://www.blackberry.com/";
		$title=detect_browser_version("BlackBerry");
		$code="blackberry";
	}elseif(preg_match('/Blazer/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Blazer_(web_browser)";
		$title=detect_browser_version("Blazer");
		$code="blazer";
	}elseif(preg_match('/Bolt/i', $useragent)){
		$link="http://www.boltbrowser.com/";
		$title=detect_browser_version("Bolt");
		$code="bolt";
	}elseif(preg_match('/BonEcho/i', $useragent)){
		$link="http://www.mozilla.org/projects/minefield/";
		$title=detect_browser_version("BonEcho");
		$code="bonecho";
	}elseif(preg_match('/Camino/i', $useragent)){
		$link="http://www.caminobrowser.org/";
		$title=detect_browser_version("Camino");
		$code="camino";
	}elseif(preg_match('/Cayman\ Browser/i', $useragent)){
		$link="http://www.caymanbrowser.com/";
		$title="Cayman ".detect_browser_version("Browser");
		$code="caymanbrowser";
	}elseif(preg_match('/Cheshire/i', $useragent)){
		$link="http://downloads.channel.aol.com/browser";
		$title=detect_browser_version("Cheshire");
		$code="aol";
	}elseif(preg_match('/Chimera/i', $useragent)){
		$link="http://www.chimera.org/";
		$title=detect_browser_version("Chimera");
		//$code="chimera";
		$code="null";
	}elseif(preg_match('/Chrome/i', $useragent)){
		$link="http://google.com/chrome/";
		$title="Google ".detect_browser_version("Chrome");
		$code="chrome";
	}elseif(preg_match('/CometBird/i', $useragent)){
		$link="http://www.cometbird.com/";
		$title=detect_browser_version("CometBird");
		$code="cometbird";
	}elseif(preg_match('/Crazy\ Browser/i', $useragent)){
		$link="http://www.crazybrowser.com/";
		$title="Crazy ".detect_browser_version("Browser");
		$code="crazybrowser";
	}elseif(preg_match('/Cruz/i', $useragent)){
		$link="http://www.cruzapp.com/";
		$title=detect_browser_version("Cruz");
		$code="cruz";
	}elseif(preg_match('/Cyberdog/i', $useragent)){
		$link="http://www.cyberdog.org/about/cyberdog/cyberbrowse.html";
		$title=detect_browser_version("Cyberdog");
		$code="cyberdog";
	}elseif(preg_match('/Deepnet\ Explorer/i', $useragent)){
		$link="http://www.deepnetexplorer.com/";
		$title=detect_browser_version("Deepnet Explorer");
		$code="deepnetexplorer";
	}elseif(preg_match('/Dillo/i', $useragent)){
		$link="http://www.dillo.org/";
		$title=detect_browser_version("Dillo");
		$code="dillo";
	}elseif(preg_match('/Dolfin/i', $useragent)){
		$link="http://www.samsungmobile.com/";
		$title=detect_browser_version("Dolfin");
		$code="samsung";
	}elseif(preg_match('/Elinks/i', $useragent)){
		$link="http://elinks.or.cz/";
		$title=detect_browser_version("Elinks");
		$code="elinks";
	}elseif(preg_match('/Enigma\ Browser/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Enigma_Browser";
		$title="Enigma ".detect_browser_version("Browser");
		$code="enigmabrowser";
	}elseif(preg_match('/Epiphany/i', $useragent)){
		$link="http://gnome.org/projects/epiphany/";
		$title=detect_browser_version("Epiphany");
		$code="epiphany";
	}elseif(preg_match('/Fennec/i', $useragent)){
		$link="https://wiki.mozilla.org/Fennec";
		$title=detect_browser_version("Fennec");
		$code="fennec";
	}elseif(preg_match('/Firebird/i', $useragent)){
		$link="http://seb.mozdev.org/firebird/";
		$title=detect_browser_version("Firebird");
		$code="firebird";
	}elseif(preg_match('/Flock/i', $useragent)){
		$link="http://www.flock.com/";
		$title=detect_browser_version("Flock");
		$code="flock";
	}elseif(preg_match('/Fluid/i', $useragent)){
		$link="http://www.fluidapp.com/";
		$title=detect_browser_version("Fluid");
		$code="fluid";
	}elseif(preg_match('/Galaxy/i', $useragent)){
		$link="http://www.traos.org/";
		$title=detect_browser_version("Galaxy");
		$code="galaxy";
	}elseif(preg_match('/Galeon/i', $useragent)){
		$link="http://galeon.sourceforge.net/";
		$title=detect_browser_version("Galeon");
		$code="galeon";
	}elseif(preg_match('/GoSurf/i', $useragent)){
		$link="http://gosurfbrowser.com/?ln=en";
		$title=detect_browser_version("GoSurf");
		$code="gosurf";
	}elseif(preg_match('/GranParadiso/i', $useragent)){
		$link="http://www.mozilla.org/";
		$title=detect_browser_version("GranParadiso");
		$code="granparadiso";
	}elseif(preg_match('/GreenBrowser/i', $useragent)){
		$link="http://www.morequick.com/";
		$title=detect_browser_version("GreenBrowser");
		$code="greenbrowser";
	}elseif(preg_match('/Hana/i', $useragent)){
		$link="http://www.alloutsoftware.com/";
		$title=detect_browser_version("Hana");
		$code="hana";
	}elseif(preg_match('/Iris/i', $useragent)){
		$link="http://www.torchmobile.com/";
		$title=detect_browser_version("Iris");
		$code="iris";
	}elseif(preg_match('/HotJava/i', $useragent)){
		$link="http://java.sun.com/products/archive/hotjava/";
		$title=detect_browser_version("HotJava");
		$code="hotjava";
	}elseif(preg_match('/IBM\ WebExplorer/i', $useragent)){
		$link="http://www.networking.ibm.com/WebExplorer/";
		$title="IBM ".detect_browser_version("WebExplorer");
		$code="ibmwebexplorer";
	}elseif(preg_match('/IBrowse/i', $useragent)){
		$link="http://www.ibrowse-dev.net/";
		$title=detect_browser_version("IBrowse");
		$code="ibrowse";
	}elseif(preg_match('/iCab/i', $useragent)){
		$link="http://www.icab.de/";
		$title=detect_browser_version("iCab");
		$code="icab";
	}elseif(preg_match('/IceApe/i', $useragent)){
		$link="http://packages.debian.org/iceape";
		$title=detect_browser_version("IceApe");
		$code="iceape";
	}elseif(preg_match('/IceCat/i', $useragent)){
		$link="http://gnuzilla.gnu.org/";
		$title="GNU ".detect_browser_version("IceCat");
		$code="icecat";
	}elseif(preg_match('/IceWeasel/i', $useragent)){
		$link="http://www.geticeweasel.org/";
		$title=detect_browser_version("IceWeasel");
		$code="iceweasel";
	}elseif(preg_match('/IEMobile/i', $useragent)){
		$link="http://www.microsoft.com/windowsmobile/en-us/downloads/microsoft/internet-explorer-mobile.mspx";
		$title=detect_browser_version("IEMobile");
		$code="msie-mobile";
	}elseif(preg_match('/Iron/i', $useragent)){
		$link="http://www.srware.net/en/software_srware_iron.php";
		$title=detect_browser_version("Iron");
		$code="iron";
	}elseif(preg_match('/Jasmine/i', $useragent)){
		$link="http://www.samsungmobile.com/";
		$title=detect_browser_version("Jasmine");
		$code="samsung";
	}elseif(preg_match('/K-Meleon/i', $useragent)){
		$link="http://kmeleon.sourceforge.net/";
		$title=detect_browser_version("K-Meleon");
		$code="kmeleon";
	}elseif(preg_match('/K-Ninja/i', $useragent)){
		$link="http://k-ninja-samurai.en.softonic.com/";
		$title=detect_browser_version("K-Ninja");
		$code="kninja";
	}elseif(preg_match('/Kapiko/i', $useragent)){
		$link="http://ufoxlab.googlepages.com/cooperation";
		$title=detect_browser_version("Kapiko");
		$code="kapiko";
	}elseif(preg_match('/Kazehakase/i', $useragent)){
		$link="http://kazehakase.sourceforge.jp/";
		$title=detect_browser_version("Kazehakase");
		$code="kazehakase";
	}elseif(preg_match('/KKman/i', $useragent)){
		$link="http://www.kkman.com.tw/";
		$title=detect_browser_version("KKman");
		$code="kkman";
	}elseif(preg_match('/KMail/i', $useragent)){
		$link="http://kontact.kde.org/kmail/";
		$title=detect_browser_version("KMail");
		$code="kmail";
	}elseif(preg_match('/KMLite/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/K-Meleon";
		$title=detect_browser_version("KMLite");
		//$code="kmlite";
		$code="kmeleon";
	}elseif(preg_match('/Konqueror/i', $useragent)){
		$link="http://konqueror.kde.org/";
		$title=detect_browser_version("Konqueror");
		$code="konqueror";
	}elseif(preg_match('/Links/i', $useragent)){
		$link="http://links.sourceforge.net/";
		$title=detect_browser_version("Links");
		$code="links";
	}elseif(preg_match('/Lobo/i', $useragent)){
		$link="http://www.lobobrowser.org/";
		$title=detect_browser_version("Lobo");
		$code="lobo";
	}elseif(preg_match('/lolifox/i', $useragent)){
		$link="http://www.lolifox.com/";
		$title=detect_browser_version("lolifox");
		$code="lolifox";
	}elseif(preg_match('/Lunascape/i', $useragent)){
		$link="http://www.lunascape.tv";
		$title=detect_browser_version("Lunascape");
		$code="lunascape";
	}elseif(preg_match('/Lynx/i', $useragent)){
		$link="http://lynx.browser.org/";
		$title=detect_browser_version("Lynx");
		$code="lynx";
	}elseif(preg_match('/Maxthon/i', $useragent)){
		$link="http://www.maxthon.com/";
		$title=detect_browser_version("Maxthon");
		$code="maxthon";
	}elseif(preg_match('#\ MIB/#i', $useragent)){
		$link="http://www.motorola.com/content.jsp?globalObjectId=1827-4343";
		$title=detect_browser_version("MIB");
		$code="mib";
	}elseif(preg_match('/Midori/i', $useragent)){
		$link="http://www.twotoasts.de/index.php?/pages/midori_summary.html";
		$title=detect_browser_version("Midori");
		$code="midori";
	}elseif(preg_match('/Minefield/i', $useragent)){
		$link="http://www.mozilla.org/projects/minefield/";
		$title=detect_browser_version("Minefield");
		$code="minefield";
	}elseif(preg_match('/Minimo/i', $useragent)){
		$link="http://www-archive.mozilla.org/projects/minimo/";
		$title=detect_browser_version("Minimo");
		$code="minimo";
	}elseif(preg_match('/Mosaic/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Mosaic_(web_browser) ";
		$title=detect_browser_version("Mosaic");
		$code="mosaic";
	}elseif(preg_match('/MultiZilla/i', $useragent)){
		$link="http://multizilla.mozdev.org/";
		$title=detect_browser_version("MultiZilla");
		$code="mozilla";
	}elseif(preg_match('/MyIE2/i', $useragent)){
		$link="http://www.myie2.com/";
		$title=detect_browser_version("MyIE2");
		$code="myie2";
	}elseif(preg_match('/Namoroka/i', $useragent)){
		$link="https://wiki.mozilla.org/Firefox/Namoroka";
		$title=detect_browser_version("Namoroka");
		$code="shiretoko";
	}elseif(preg_match('/Navigator/i', $useragent)){
		$link="http://netscape.aol.com/";
		$title="Netscape ".detect_browser_version("Navigator");
		$code="netscape";
	}elseif(preg_match('/NetFront/i', $useragent)){
		$link="http://www.access-company.com/";
		$title=detect_browser_version("NetFront");
		$code="netfront";
	}elseif(preg_match('/NetNewsWire/i', $useragent)){
		$link="http://www.newsgator.com/individuals/netnewswire/";
		$title=detect_browser_version("NetNewsWire");
		$code="netnewswire";
	}elseif(preg_match('/NetPositive/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/NetPositive";
		$title=detect_browser_version("NetPositive");
		$code="netpositive";
	}elseif(preg_match('/Netscape/i', $useragent)){
		$link="http://netscape.aol.com/";
		$title=detect_browser_version("Netscape");
		$code="netscape";
	}elseif(preg_match('/NetSurf/i', $useragent)){
		$link="http://www.netsurf-browser.org/";
		$title=detect_browser_version("NetSurf");
		$code="netsurf";
	}elseif(preg_match('/NF-Browser/i', $useragent)){
		$link="http://www.access-company.com/";
		$title=detect_browser_version("NF-Browser");
		$code="netfront";
	}elseif(preg_match('/Nokia/i', $useragent)){
		$link="http://www.nokia.com/browser";
		$title="Nokia Web Browser";
		$code="nokia"; 
	}elseif(preg_match('/Novarra-Vision/i', $useragent)){
		$link="http://www.novarra.com/";
		$title="Novarra ".detect_browser_version("Vision");
		$code="novarra";
	}elseif(preg_match('/Obigo/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Obigo_Browser";
		$title=detect_browser_version("Obigo");
		$code="obigo";
	}elseif(preg_match('/OmniWeb/i', $useragent)){
		$link="http://www.omnigroup.com/applications/omniweb/";
		$title=detect_browser_version("OmniWeb");
		$code="omniweb";
	}elseif(preg_match('/Opera Mini/i', $useragent)){
		$link="http://www.opera.com/mini/";
		$title=detect_browser_version("Opera Mini");
		$code="opera-2";
	}elseif(preg_match('/Opera Mobi/i', $useragent)){
		$link="http://www.opera.com/mobile/";
		$title=detect_browser_version("Opera Mobi");
		$code="opera-2";
	}elseif(preg_match('/Opera/i', $useragent)){
		$link="http://www.opera.com/";
		$title=detect_browser_version("Opera");
		$code="opera-1";
		if(preg_match('/Version/i', $useragent))
			$code="opera-2";
	}elseif(preg_match('/Orca/i', $useragent)){
		$link="http://www.orcabrowser.com/";
		$title=detect_browser_version("Orca");
		$code="orca";
	}elseif(preg_match('/Oregano/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Oregano_(web_browser)";
		$title=detect_browser_version("Oregano");
		$code="oregano";
	}elseif(preg_match('#\ Pre/#i', $useragent)){
		$link="http://www.palm.com/us/products/phones/pre/index.html";
		$title="Palm ".detect_browser_version("Pre");
		$code="palmpre";
	}elseif(preg_match('/Phoenix/i', $useragent)){
		$link="http://www.mozilla.org/projects/phoenix/phoenix-release-notes.html";
		$title=detect_browser_version("Phoenix");
		$code="phoenix";
	}elseif(preg_match('/Polaris/i', $useragent)){
		$link="http://www.infraware.co.kr/eng/01_product/product02.asp";
		$title=detect_browser_version("Polaris");
		$code="polaris";
	}elseif(preg_match('/QtWeb\ Internet\ Browser/i', $useragent)){
		$link="http://www.qtweb.net/";
		$title="QtWeb Internet ".detect_browser_version("Browser");
		$code="qtwebinternetbrowser";
	}elseif(preg_match('/retawq/i', $useragent)){
		$link="http://retawq.sourceforge.net/";
		$title=detect_browser_version("retawq");
		//$code="retawq";
		$code="null";
	}elseif(preg_match('/Safari/i', $useragent)){
		$link="http://www.apple.com/safari/";
		$title=detect_browser_version("Safari");
		$code="safari";
	}elseif(preg_match('/SeaMonkey/i', $useragent)){
		$link="http://www.seamonkey-project.org/";
		$title=detect_browser_version("SeaMonkey");
		$code="seamonkey";
	}elseif(preg_match('/SEMC-Browser/i', $useragent)){
		$link="http://www.sonyericsson.com/";
		$title=detect_browser_version("SEMC-Browser");
		$code="semcbrowser";
	}elseif(preg_match('/SEMC-java/i', $useragent)){
		$link="http://www.sonyericsson.com/";
		$title=detect_browser_version("SEMC-java");
		$code="semcbrowser";
	}elseif(preg_match('/Shiira/i', $useragent)){
		$link="http://www.shiira.jp/en.php";
		$title=detect_browser_version("Shiira");
		$code="shiira";
	}elseif(preg_match('/Shiretoko/i', $useragent)){
		$link="http://www.mozilla.org/";
		$title=detect_browser_version("Shiretoko");
		$code="shiretoko";
	}elseif(preg_match('/Sleipnir/i', $useragent)){
		$link="http://www.fenrir-inc.com/other/sleipnir/";
		$title=detect_browser_version("Sleipnir");
		$code="sleipnir";
	}elseif(preg_match('/SlimBrowser/i', $useragent)){
		$link="http://www.flashpeak.com/sbrowser/";
		$title=detect_browser_version("SlimBrowser");
		$code="slimbrowser";
	}elseif(preg_match('/Songbird/i', $useragent)){
		$link="http://www.getsongbird.com/";
		$title=detect_browser_version("Songbird");
		$code="songbird";
	}elseif(preg_match('/Stainless/i', $useragent)){
		$link="http://www.stainlessapp.com/";
		$title=detect_browser_version("Stainless");
		$code="stainless";
	}elseif(preg_match('/Sunrise/i', $useragent)){
		$link="http://www.sunrisebrowser.com/";
		$title=detect_browser_version("Sunrise");
		$code="sunrise";
	}elseif(preg_match('/Swiftfox/i', $useragent)){
		$link="http://www.getswiftfox.com/";
		$title=detect_browser_version("Swiftfox");
		$code="swiftfox";
	}elseif(preg_match('/TeaShark/i', $useragent)){
		$link="http://www.teashark.com/";
		$title=detect_browser_version("TeaShark");
		$code="teashark";
	}elseif(preg_match('/Teleca/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Obigo_Browser/";
		$title=detect_browser_version(" Teleca");
		$code="obigo";
	}elseif(preg_match('/TheWorld/i', $useragent)){
		$link="http://www.ioage.com/";
		$title=detect_browser_version("TheWorld");
		$code="theworld";
	}elseif(preg_match('/Thunderbird/i', $useragent)){
		$link="http://www.mozilla.com/thunderbird/";
		$title=detect_browser_version("Thunderbird");
		$code="thunderbird";
	}elseif(preg_match('/uBrowser/i', $useragent)){
		$link="http://www.ubrowser.com/";
		$title=detect_browser_version("uBrowser");
		$code="ubrowser";
	}elseif(preg_match('/UCWEB/i', $useragent)){
		$link="http://www.ucweb.com/English/product.shtml";
		$title=detect_browser_version("UCWEB");
		$code="ucweb";
	}elseif(preg_match('/UP\.Browser/i', $useragent)){
		$link="http://www.openwave.com/";
		$title=detect_browser_version("UP.Browser");
		$code="openwave";
	}elseif(preg_match('/w3m/i', $useragent)){
		$link="http://w3m.sourceforge.net/";
		$title=detect_browser_version("W3M");
		$code="w3m";
	}elseif(preg_match('/WorldWideWeb/i', $useragent)){
		$link="http://www.w3.org/People/Berners-Lee/WorldWideWeb.html";
		$title=detect_browser_version("WorldWideWeb");
		//$code="worldwideweb";
		$code="null";
	}elseif(preg_match('/Wyzo/i', $useragent)){
		$link="http://www.wyzo.com/";
		$title=detect_browser_version("Wyzo");
		$code="Wyzo";

	//Pulled out of order to help ensure better detection for above browsers
	}elseif(preg_match('/Firefox/i', $useragent)){
		$link="http://www.mozilla.org/";
		$title=detect_browser_version("Firefox");
		$code="firefox";
	}elseif(preg_match('/MSIE/', $useragent)){
		$link="http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
		$title="Internet Explorer".detect_browser_version("MSIE");
		$code="msie";
	}elseif(preg_match('/Mozilla/i', $useragent)){
		$link="http://www.mozilla.org/";
		$title="Mozilla Compatible";
		if(preg_match('/rv:([.0-9a-zA-Z]+)/i',$useragent,$regmatch))
			$title="Mozilla ".$regmatch[1];
		$code="mozilla";
	}else{
		$link="#";
		$title="Unknown";
		$code="null";
	}
	if($ua_show_text=="1")
		$web_browser=img($code, "/net/", $title)." <a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	else if($ua_show_text=="2")
		$web_browser=img($code, "/net/", $title);
	else if($ua_show_text=="3")
		$web_browser="<a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	return $web_browser;
}

//Detect Operating System and/or Devices
function detect_os(){
	global $useragent, $ua_show_text;
	if(preg_match('/Android/', $useragent)){
		$link="http://www.android.com/";
		$title="Android";
		$code="android";
	}elseif(preg_match('/Arch/', $useragent)){
		$link="http://www.archlinux.org/";
		$title="Arch Linux";
		$code="archlinux";
	}elseif(preg_match('/BeOS/', $useragent)){
		$link="http://en.wikipedia.org/wiki/BeOS";
		$title="BeOS";
		$code="beos";
	}elseif(preg_match('/BlackBerry/', $useragent)){
		$link="http://www.blackberry.com/";
		$title="BlackBerry";
		if(preg_match('#blackberry([.0-9a-zA-Z]+)\/#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="blackberry";
	}elseif(preg_match('/CentOS/', $useragent)){
		$link="http://www.centos.org/";
		$title="CentOS";
		if(preg_match('#\.el([.0-9a-zA-Z]+).centos#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="centos";
	}elseif(preg_match('/CrOS/', $useragent)){
		$link="http://en.wikipedia.org/wiki/Google_Chrome_OS";
		$title="Google Chrome OS";
		$code="chromeos";
	}elseif(preg_match('/Debian/i', $useragent)){
		$link="http://www.debian.org/";
		$title="Debian GNU/Linux";
		//if(preg_match('#Debian-([.\-0-9a-zA-Z]+)#i',$useragent,$regmatch))
			//$title=" ".$regmatch[1];
		$code="debian";
	}elseif(preg_match('/DragonFly/i', $useragent)){
		$link="http://www.dragonflybsd.org/";
		$title="DragonFly BSD";
		$code="dragonflybsd";
	}elseif(preg_match('/Edubuntu/i', $useragent)){
		$link="http://www.edubuntu.org/";
		$title="Edubuntu";
		if(preg_match('#Edubuntu/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="edubuntu";
	}elseif(preg_match('/Fedora/i', $useragent)){
		$link="http://www.fedoraproject.org/";
		$title="Fedora";
		if(preg_match('#\.fc([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="fedora";
	}elseif(preg_match('/FreeBSD/i', $useragent)){
		$link="http://www.freebsd.org/";
		$title="FreeBSD";
		$code="freebsd";
	}elseif(preg_match('/Gentoo/i', $useragent)){
		$link="http://www.gentoo.org/";
		$title="Gentoo";
		$code="gentoo";
	}elseif(preg_match('/iPod/i', $useragent)){
		$link="http://www.apple.com/itunes";
		$title="iPod";
		if(preg_match('#iPhone\ OS\ ([.\_0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" OS ".str_replace("_", ".", $regmatch[1]);
		$code="iphone";
	}elseif(preg_match('/iPhone/i', $useragent)){
		$link="http://www.apple.com/iphone";
		$title="iPhone";
		if(preg_match('#iPhone\ OS\ ([.\_0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" OS ".str_replace("_", ".", $regmatch[1]);
		$code="iphone";
	}elseif(preg_match('/Kanotix/i', $useragent)){
		$link="http://www.kanotix.com/";
		$title="Kanotix";
		$code="kanotix";
	}elseif(preg_match('/Knoppix/i', $useragent)){
		$link="http://www.knoppix.net/";
		$title="Knoppix";
		$code="knoppix";
	}elseif(preg_match('/Kubuntu/i', $useragent)){
		$link="http://www.kubuntu.org/";
		$title="Kubuntu";
		if(preg_match('#Kubuntu/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="kubuntu";
	}elseif(preg_match('/LG/i', $useragent)){
		$link="http://www.lgmobile.com";
		$title = "LG";
		$code="lg";
	}elseif(preg_match('/LindowsOS/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Lsongs";
		$title = "LindowsOS";
		$code="lindowsos";
	}elseif(preg_match('/Linspire/i', $useragent)){
		$link="http://www.linspire.com/";
		$title = "Linspire";
		$code="lindowsos";
	}elseif(preg_match('/Linux\ Mint/i', $useragent)){
		$link="http://www.linuxmint.com/";
		$title = "Linux Mint";
		if(preg_match('#Linux\ Mint/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="linuxmint";
	}elseif(preg_match('/Lubuntu/i', $useragent)){
		$link="http://www.lubuntu.net/";
		$title="Lubuntu";
		if(preg_match('#Lubuntu/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="lubuntu";
	}elseif(preg_match('/Mac/i', $useragent) || preg_match('/Darwin/i', $useragent)){
		$link="http://www.apple.com/macosx/";
		if(preg_match('/Mac OS X/i', $useragent)){
			$title=substr($useragent, strpos(strtolower($useragent), strtolower("Mac OS X")));
			$title=substr($title, 0, strpos($title, ";"));
			$title=str_replace("_", ".", $title); 
			$code="mac-3";
		}elseif(preg_match('/Mac OSX/i', $useragent)){
			$title=substr($useragent, strpos(strtolower($useragent), strtolower("Mac OSX")));
			$title=substr($title, 0, strpos($title, ";"));
			$title=str_replace("_", ".", $title); 
			$code="mac-2";
		}elseif(preg_match('/Darwin/i', $useragent)){
			$title="Mac OS Darwin";
			$code="mac-1";
		}else {
			$title="Macintosh";
			$code="mac-1";
		}
	}elseif(preg_match('/Mandriva/i', $useragent)){
		$link="http://www.mandriva.com/";
		$title = "Mandriva";
		if(preg_match('/mdv([.0-9a-zA-Z]+)/i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="mandriva";
	}elseif(preg_match('/MOT\-/i', $useragent) || preg_match('/MIB/i', $useragent)){
		$link="http://www.motorola.com/";
		$title = "Motorola";
		$code="motorola";
	}elseif(preg_match('/NetBSD/i', $useragent)){
		$link="http://www.netbsd.org/";
		$title = "NetBSD";
		$code="netbsd";
	}elseif(preg_match('/Nintendo DSi/i', $useragent)){
		$link="http://www.nintendodsi.com/";
		$title = "Nintendo DSi";
		$code="nintendodsi";
	}elseif(preg_match('/Nintendo Wii/i', $useragent)){
		$link="http://www.nintendo.com/wii";
		$title = "Nintendo Wii";
		$code="nintendowii";
	}elseif(preg_match('/Nokia/i', $useragent)){
		$link="http://www.nokia.com/";
		$title = "Nokia";
		$code="nokia";
	}elseif(preg_match('/OLPC/i', $useragent)){
		$link="http://www.laptop.org/";
		$title="OLPC (XO)";
		$code="olpc";
	}elseif(preg_match('/OpenBSD/i', $useragent)){
		$link="http://www.openbsd.org/";
		$title="OpenBSD";
		$code="openbsd";
	}elseif(preg_match('/Oracle/i', $useragent)){
		$link="http://www.oracle.com/us/technologies/linux/";
		$title="Oracle";
		if(preg_match('#\.el([._0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" Enterprise Linux ".str_replace("_", ".", $regmatch[1]);
		else
			$title.=" Linux";
		$code="oracle";
	}elseif(preg_match('/Palm/i', $useragent)){
		$link="http://www.palm.com/";
		$title="Palm";
		$code="palm";
	}elseif(preg_match('/Playstation/i', $useragent)){
		if(preg_match('/Playstation 3/i', $useragent) || preg_match('/PS3/i', $useragent)){
			$link="http://www.us.playstation.com/PS3";
			$title="Playstation 3";
		}elseif(preg_match('/Playstation Portable/i', $useragent) || preg_match('/PSP/i', $useragent)){
			$link="http://www.us.playstation.com/PSP";
			$title="Playstation Portable";
		}
		$code="playstation";
	}elseif(preg_match('/Red\ Hat/i', $useragent) || preg_match('/RedHat/i', $useragent)){
		$link="http://www.redhat.com/";
		$title = "Red Hat";
		if(preg_match('#\.el([._0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" Enterprise Linux ".str_replace("_", ".", $regmatch[1]);
		$code="mandriva";
	}elseif(preg_match('/Sabayon/i', $useragent)){
		$link="http://www.sabayonlinux.org/";
		$title="Sabayon Linux";
		$code="sabayon";
	}elseif(preg_match('/Samsung/i', $useragent)){
		$link="http://www.samsungmobile.com/";
		$title="Samsung";
		$code="samsung";
	}elseif(preg_match('/Slackware/i', $useragent)){
		$link="http://www.slackware.com/";
		$title="Slackware";
		$code="slackware";
	}elseif(preg_match('/Solaris/i', $useragent)){
		$link="http://www.sun.com/software/solaris/";
		$title="Solaris";
		$code="solaris";
	}elseif(preg_match('/SonyEricsson/i', $useragent)){
		$link="http://www.SonyEricsson.com/";
		$title="SonyEricsson";
		$code="sonyericsson";
	}elseif(preg_match('/SunOS/i', $useragent)){
		$link="http://www.sun.com/software/solaris/";
		$title="Solaris";
		$code="solaris";
	}elseif(preg_match('/Suse/i', $useragent)){
		$link="http://www.opensuse.org/";
		$title="SuSE";
		$code="suse";
	}elseif(preg_match('/SymbianOS/i', $useragent)){
		$link="http://www.symbianos.org/";
		$title="SymbianOS";
		if(preg_match('#SymbianOS/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="symbianos";
	}elseif(preg_match('/Ubuntu/i', $useragent)){
		$link="http://www.ubuntu.com/";
		$title="Ubuntu";
		if(preg_match('#Ubuntu/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="ubuntu";
	}elseif(preg_match('/VectorLinux/i', $useragent)){
		$link="http://www.vectorlinux.com/";
		$title="VectorLinux";
		$code="vectorlinux";
	}elseif(preg_match('/Venenux/i', $useragent)){
		$link="http://www.venenux.org/";
		$title="Venenux GNU Linux";
		$code="venenux";
	}elseif(preg_match('/webOS/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/WebOS";
		$title="Palm webOS";
		$code="palm";
	}elseif(preg_match('/Windows/i', $useragent) || preg_match('/WinNT/i', $useragent) || preg_match('/Win32/i', $useragent)){
		$link="http://www.microsoft.com/windows/";
		if(preg_match('/Windows NT 6.1; Win64; x64;/i', $useragent) || preg_match('/Windows NT 6.1; WOW64;/i', $useragent)){
			$title="Windows 7 x64 Edition";
			$code="win-4";
		}elseif(preg_match('/Windows NT 6.1/i', $useragent)){
			$title="Windows 7";
			$code="win-4";
		}elseif(preg_match('/Windows NT 6.0/i', $useragent)){
			$title="Windows Vista";
			$code="win-3";
		}elseif(preg_match('/Windows NT 5.2 x64/i', $useragent)){
			$title="Windows XP x64 Edition";
			$code="win-2";
		}elseif(preg_match('/Windows NT 5.2/i', $useragent)){
			$title="Windows Server 2003";
			$code="win-2";
		}elseif(preg_match('/Windows NT 5.1/i', $useragent) || preg_match('/Windows XP/i', $useragent)){
			$title="Windows XP";
			$code="win-2";
		}elseif(preg_match('/Windows NT 5.01/i', $useragent)){
			$title="Windows 2000, Service Pack 1 (SP1)";
			$code="win-1";
		}elseif(preg_match('/Windows NT 5.0/i', $useragent) || preg_match('/Windows 2000/i', $useragent)){
			$title="Windows 2000";
			$code="win-1";
		}elseif(preg_match('/Windows NT 4.0/i', $useragent) || preg_match('/WinNT4.0/i', $useragent)){
			$title="Microsoft Windows NT 4.0";
			$code="win-1";
		}elseif(preg_match('/Windows NT 3.51/i', $useragent) || preg_match('/WinNT3.51/i', $useragent)){
			$title="Microsoft Windows NT 3.11";
			$code="win-1";
		}elseif(preg_match('/Windows 3.11/i', $useragent) || preg_match('/Win3.11/i', $useragent) || preg_match('/Win16/i', $useragent)){
			$title="Microsoft Windows 3.11";
			$code="win-1";
		}elseif(preg_match('/Windows 3.1/i', $useragent)){
			$title="Microsoft Windows 3.1";
			$code="win-1";
		}elseif(preg_match('/Windows 98; Win 9x 4.90/i', $useragent) || preg_match('/Win 9x 4.90/i', $useragent) || preg_match('/Windows ME/i', $useragent)){
			$title="Windows Millennium Edition (Windows Me)";
			$code="win-1";
		}elseif(preg_match('/Win98/i', $useragent)){
			$title="Windows 98 SE";
			$code="win-1";
		}elseif(preg_match('/Windows 98/i', $useragent) || preg_match('/Windows\ 4.10/i', $useragent)){
			$title="Windows 98";
			$code="win-1";
		}elseif(preg_match('/Windows 95/i', $useragent) || preg_match('/Win95/i', $useragent)){
			$title="Windows 95";
			$code="win-1";
		}elseif(preg_match('/Windows CE/i', $useragent)){
			$title="Windows CE";
			$code="win-2";
		}elseif(preg_match('/WM5/i', $useragent)){
			$title="Windows Mobile 5";
			$code="win-phone";
		}elseif(preg_match('/WindowsMobile/i', $useragent)){
			$title="Windows Mobile";
			$code="win-phone";
		}else{
			$title="Windows";
			$code="win-2";
		}
	}elseif(preg_match('/Xubuntu/i', $useragent)){
		$link="http://www.xubuntu.org/";
		$title="Xubuntu";
		if(preg_match('#Xubuntu/([.0-9a-zA-Z]+)#i',$useragent,$regmatch))
			$title.=" ".$regmatch[1];
		$code="xubuntu";
	}elseif(preg_match('/Zenwalk/i', $useragent)){
		$link="http://www.zenwalk.org/";
		$title="Zenwalk GNU Linux";
		$code="zenwalk";
	}elseif(preg_match('/Linux/i', $useragent)){
		$link="http://www.linux.org/";
		$title="GNU/Linux";
		$code="linux";
		if(preg_match('/x86_64/i', $useragent))
			$title.=" x64";
	}else{
		$title="Unknown";
		$code="null";
	}
	if($ua_show_text=="1")
		$detected_os=img($code, "/os/", $title)." <a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	else if($ua_show_text=="2")
		$detected_os=img($code, "/os/", $title);
	else if($ua_show_text=="3")
		$detected_os="<a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	return $detected_os;
}

//Detect Trackbacks -- Check if it works...
function detect_trackback(){
	global $useragent, $ua_trackback, $ua_show_text;
	$ua_trackback=0;
	if(preg_match('/Feedburner/i',$useragent,$regmatch)){
		$link="http://www.feedburner.com/";
		$title="FeedBurner";
		$code="feedburner";
		$version="";
	}elseif(preg_match('/laconica|statusnet/i', $useragent, $regmatch)){
		$link="http://status.net/";
		$title="StatusNet";
		$code="laconica";
		$version="";
	}elseif(preg_match('/meneame/i', $useragent, $regmatch)){
		$link="http://www.meneame.net/";
		$title="Meneame";
		$code="meneame";
		$version="";
	}elseif(preg_match('#MovableType/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$link="http://www.movabletype.org/";
		$title="MovableType";
		$code="movabletype";
		$version=$regmatch[1];
	}elseif(preg_match('/pligg/i',$useragent,$regmatch)){
		$link="http://www.pligg.com/";
		$title="Pligg";
		$code="pligg";
		$version="";
	}elseif (preg_match('/vBSEO/i', $useragent, $regmatch)){
		$link="http://www.vbseo.com/";
		$title="vBSEO (VBulletin)";
		$code.="vbseo";
	}elseif(preg_match('#WordPress/([.0-9a-zA-Z]+)#i',$useragent,$regmatch)){
		$link="http://www.wordpress.org/";
		$title="WordPress";
		$code="wordpress";
		$version=$regmatch[1];
	}else{
		$link="";
		$title="Unknown";
		$code="null";
		$version="";
	}
	$title.=" ".$version;
	if($ua_show_text=="1")
		$detected_tb=img($code, "/net/", $title)." <a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	else if($ua_show_text=="2")
		$detected_tb=img($code, "/net/", $title);
	else if($ua_show_text=="3")
		$detected_tb="<a href='".$link."' title='".$title."' rel='nofollow'>".$title."</a>";
	return $detected_tb;
}

//Image generation function
function img($code, $type, $title){
	global $ua_comment_size, $ua_track_size, $ua_image_style, $ua_image_css, $ua_trackback, $url_img, $ua_doctype;
	if($ua_comment_size=="")
		$ua_comment_size=16;
	if($ua_track_size=="")
		$ua_track_size=16;

	if($ua_image_style=="1")
		$img_style="style='border:0px;'";
	elseif($ua_image_style=="2")
		$img_style="style='".$ua_image_css."'";
	elseif($ua_image_style=="3")
		$img_style="class='".$ua_image_css."'";

	//Set the img to display browser/os
	//src=http://blogurl/plugins/plugin-name/size/os-net/code.png
	if($ua_trackback==1)
		$img="<img src='".$url_img.$ua_track_size.$type.$code.".png' title='".$title."' ".$img_style." alt='".$title."'";
	else
		$img="<img src='".$url_img.$ua_comment_size.$type.$code.".png' title='".$title."' ".$img_style." alt='".$title."'";

	if($ua_doctype=="html")
		$img.=">";
	elseif($ua_doctype=="xhtml")
		$img.=" />";

	return $img;
}

//Main function
function wp_useragent(){
	global $comment, $useragent, $ua_output_location, $ua_trackback;
		$ua_trackback=0;
	get_currentuserinfo();
	$useragent=$comment->comment_agent;
	if($ua_output_location=="before"){
		display_useragent();
		ua_comment();
		add_filter('comment_text', 'wp_useragent');
	}elseif($ua_output_location=="after"){
		ua_comment();
		display_useragent();
		add_filter('comment_text', 'wp_useragent');
	}elseif($ua_output_location=="custom"){
		display_useragent();
	}
}

//Function to form the final String
function display_useragent(){
	global $comment, $ua_show_text, $ua_text_surfing, $ua_text_on, $ua_show_ua_bool, $ua_doctype;
	//Check if the comment is a trackback.
	if($comment->comment_type=='trackback' || $comment->comment_type=='pingback'){
		$ua=detect_trackback();
	}else{
		if($ua_show_text=="1" || $ua_show_text=="3")
			$ua="$ua_text_surfing ".detect_webbrowser()." $ua_text_on ".detect_os();
		elseif($ua_show_text=="2")
			$ua=detect_webbrowser().detect_os();
	}

	if($ua_show_ua_bool=='true'){
		if($ua_doctype=="html")
			$ua.="<br><small>".htmlspecialchars($comment->comment_agent)."</small>";
		elseif($ua_doctype=="xhtml")
			$ua.="<br /><small>".htmlspecialchars($comment->comment_agent)."</small>";
	}

	// The following conditional will hopefully prevent a problem where
	// the echo statement will interrupt redirects from the comment page.
	if(empty($_POST['comment_post_ID']))
		echo $ua;
}

//Custom function
function useragent_output_custom(){
	global $ua_output_location, $useragent, $comment;
	if($ua_output_location=="custom"){
		get_currentuserinfo();
		$useragent= $comment->comment_agent;
		display_useragent();
	}
}

//Util functions for filters and stuff.
function ua_comment(){
	global $comment;
	remove_filter('comment_text', 'wp_useragent');
	apply_filters('get_comment_text', $comment->comment_content);
	if(empty($_POST['comment_post_ID']))
		echo apply_filters('comment_text', $comment->comment_content);
}

function add_option_page(){
	add_options_page('WP-UserAgent', 'WP-UserAgent', 'manage_options','wp-useragent/wp-useragent-options.php');
}

add_action('admin_menu', 'add_option_page');
if ($ua_output_location!='custom'){
	add_filter('comment_text', 'wp_useragent');
}

//Add quick links to plugins page
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'my_plugin_actlinks' ); 
function my_plugin_actlinks( $links ) { 
 // Add a link to this plugin's settings page
 $settings_link = '<a href="options-general.php?page=wp-useragent/wp-useragent-options.php">Settings</a>'; 
 array_unshift( $links, $settings_link ); 
 return $links; 
}
?>
