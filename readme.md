# PHP-UserAgent

A simple project that allows you to display details about a computer's operating system or web browser with a user-agent.

## Try it

http://www.zsxsoft.com/php-useragent/test-my-useragent.php

## Contributors
zsx(http://www.zsxsoft.com)

This project based on [kyleabaker](http://www.kyleabaker.com/goodies/coding/wp-useragent/)'s "wp-useragent".

## Supported Browsers/Platforms

This list has omission.

Browsers: 115Browser（115浏览器） / 2345Explorer（2345浏览器） / Alienforce / Amaya AWeb Browser Voyager / AOL / Arora / AtomicBrowser / BarcaPro / Barca / Beamrise / Beonex / BaiduBrowser（百度浏览器、百度手机浏览器） / BlackBerry / Blackbird / BlackHawk / Blazer / Bolt / BonEcho / Browzar / Bunjalloo / Camino Browser / Charon / Cheshire / Chimera / chromeframe / ChromePlus Iron / Chromium / Classilla / Coast / Columbus / CometBird Dragon / Conkeror / CoolNovo / CoRom Browser / CrMo / Cruz / Cyberdog / DPlus / Deepnet Explorer / Demeter / DeskBrowse / Dillo / DoCoMo / DocZilla / Dolfin / Dooble / Doris / Dorothy / DPlus / Edbrowse / Elinks Browser Browser / EnigmaFox / Epic / Epiphany Escape / Fennec / Firebird / Fireweb Navigator / Flock / Fluid / Galaxy / Galeon / GlobalMojo Browser / GoSurf / GranParadiso / GreenBrowser / Hana / HotJava / Hv3 / Iris WebExplorer / MiuiBrowser（MIUI浏览器） / IBrowse / iCab / Ice Browser / Iceape IceCat / IceWeasel Browser / iRider / Iron / InternetSurfboard / Jasmine / K-Meleon / K-Ninja / Kapiko / Kazehakase Strata / KKman / KMail / KMLite / Konqueror / Kylo / LBrowser（猎豹浏览器） / Liebaofast / Links / Lobo / lolifox / Lorentz / Lunascape / Lynx / Madfox / Maemo Browser / Maxthon（傲游浏览器） / MIB / Tablet browser / Midori / Minefield / MiniBrowser / Minimo / Mosaic / MozillaDeveloperPreview / MQQBrowser（手机QQ浏览器） / Multi-Browser / MultiZilla / myibrow / MyIE2 / Namoroka Navigator / NetBox / NetCaptor / NetFront / NetNewsWire / NetPositive / Netscape / NetSurf / NF-Browser Browser Browser Vision / Obigo / OmniWeb / OneBrowser / Opera / Orca / Oregano / osb-browser / Otter Pre Moon Browser / Perk / Phoenix / Podkicker / Podkicker Pro / Pogo / Polaris / Prism / QQBrowser（QQ浏览器） / QupZilla / retawq / RockMelt / Ryouko / SeaMonkey / SEMC-Browser / SEMC-java Series60 S60 / Shiira / Shiretoko Silk / SiteKiosk / SkipStone / Skyfire / Sleipnir / SlimBoat / SlimBrowser / SmartTV / Songbird / Stainless / SubStream Sulfur / Sundance / Sundial / Sunrise / Surf / Swiftfox / Swiftweasel / Sylera / Sogou Explorer（搜狗浏览器） / Saayaa Explorer（闪游浏览器） / TaoBrowser（淘宝浏览器） / TeaShark / Teleca Traveler / TenFourFox / Thunderbird / Tizen / Tjusig / TencentTraveler（腾讯TT浏览器） / UC Browser（UC浏览器） / UCWEB / UltraBrowser / UP.Browser / UP.Link / Usejump / uZardWeb / uZard / Vimprobable / Vonkeror / W3M / IEMobile / Android Webkit Shell Browser / WorldWideWeb / Wyzo / X-Smiles / Xiino Browser / zBrowser / ZipZap / ABrowse Browser Chrome / Safari / Firefox / MSIE

OS: AmigaOS / Android / Arch Linux / BeOS / CentOS / Chakra Linux / Google Chrome OS / Crunchbang / Debian GNU/Linux / DragonFly BSD / Edubuntu / Fedora / Foresight Linux / FreeBSD / Gentoo / Inferno / IRIX Linux / Kanotix / Knoppix / Kubuntu / LindowsOS / Linspire / Linux Mint / Lubuntu / Mac OS Darwin / Macintosh / Mageia / Mandriva / moonOS / MorphOS / NetBSD / Nova / OpenBSD / Oracle / Pardus / PCLinuxOS / Red Hat / Rosa Linux / Sabayon Linux / Slackware / Solaris / Solaris / openSUSE / SymbianOS / Unix / VectorLinux / Venenux GNU Linux / Palm webOS / Windows 10 x64 Edition / Windows 10 / Windows 8.1 x64 Edition / Windows 8.1 / Windows 8 x64 Edition / Windows 8 / Windows 7 x64 Edition / Windows 7 / Windows Vista / Windows XP x64 Edition / Windows Server 2003 x64 Edition / Windows Server 2003 / Windows XP / Windows 2000, Service Pack 1 (SP1) / Windows 2000 / Microsoft Windows NT 4.0 / Microsoft Windows NT 3.11 / Microsoft Windows 3.11 / Microsoft Windows 3.1 / Windows Millennium Edition (Windows Me) / Windows 98 SE / Windows 98 / Windows 95 / Windows CE / Windows Mobile 5 / Windows Mobile / Windows / Xandros / Xubuntu / Zenwalk GNU Linux / Ubuntu / GNU/Linux / J2ME/MIDP Device


Platforms: BenQ-Siemens / Meizu（魅族） / Xiaomi（小米） / BlackBerry / CoolPad（酷派） / Dell / Nexus / HTC HTC / Huawei（华为） / Kindle / K-Touch（天语） / Lenovo（联想） / LG / Motorola / Nintendo / Nokia / Onda（昂达） / OPPO / OLPC (XO) / Palm / PlayStation / Samsung / SonyEricsson / vivo / ZTE（中兴） / Ubuntu Phone / Ubuntu Tablet / Windows Phone / iPad / iPod / iPhone



## Example
```php
<?php
/**
 * Test Useragent
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include './useragent.class.php';
$useragent = UserAgentFactory::analyze($_SERVER['HTTP_USER_AGENT']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UserAgent</title>
</head>
<body>
	<h1>Test UserAgent</h1>
	<p>UserAgent: <?php echo $useragent->useragent;?></p>
	<p>Platform: <img src="<?php echo $useragent->platform['image']?>"/><?php echo $useragent->platform['title']?></p>
	<p>Web Browser: <img src="<?php echo $useragent->browser['image']?>"/><?php echo $useragent->browser['title']?></p>
	<p>OS: <img src="<?php echo $useragent->os['image']?>"/><?php echo $useragent->os['title']?></p>

</body>
</html>
```
##License
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
