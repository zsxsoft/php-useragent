<?php
/**
 * Test
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
include './useragent.class.php';
class UserAgentFactoryTest extends PHPUnit_Framework_TestCase {
	function testUserAgent() {
		$testList = array(
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36 115Browser/5.0', 16, '15820000/', '.gif'),
				array('15820000/16/browser/114browser.gif', '15820000/16/os/win-2.gif', '115Browser 5.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; 2345Explorer 3.4.0.12519)', 16, '168440000/', null),
				array('168440000/16/browser/2345explorer.png', '168440000/16/os/win-5.png', '2345Explorer 3.4.0.12519', 'Windows 8'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-cn; HM NOTE 1W Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30; 360browser(securitypay,securityinstalled); 360(android,uppayplugin); 360 Aphone Browser (5.4.1)', 16, null, '.gif'),
				array('img/16/browser/360se.gif', 'img/16/device/xiaomi.gif', '360 Aphone Browser', 'Xiaomi HM-NOTE 1W'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko se5_i) Chrome/31.0.1650.63 Safari/537.36 QIHU 360SE', 16, null, '.gif'),
				array('img/16/browser/360se.gif', 'img/16/os/win-5.gif', '360 Explorer', 'Windows 8.1 x64 Edition'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; America Online Browser 1.1; rev1.2; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 24, null, null),
				array('img/24/browser/aol.png', 'img/24/os/win-2.png', 'America Online Browser 1.1', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Linux;u;Android 2.3.7;zh-cn;HTC Desire Build) AppleWebKit/533.1 (KHTML,like Gecko) Version/4.0 Mobile Safari/533.1', 16, '165100000/', null),
				array('165100000/16/browser/android-webkit.png', '165100000/16/device/htc.png', 'Android Webkit 4.0', 'HTC Desire'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-cn; HUAWEI Y516-T00 Build/HUAWEIY516-T00) AppleWebKit/534.24 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.24 T5/2.0 baiduboxapp/6.0.1 (Baidu; P1 4.2.2)', 16, '10770000/', null),
				array('10770000/16/browser/android-webkit.png', '10770000/16/device/huawei.png', 'Android Webkit 4.0', 'Huawei Y516'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-cn; K-Touch T60 Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 MxBrowser/4.3.2.2000', 24, '230710000/', null),
				array('230710000/24/browser/android-webkit.png', '230710000/24/device/k-touch.png', 'Android Webkit 4.0', 'K-Touch T60'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.3.5; zh-cn; Lenovo A520/S101) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 16, '288690000/', null),
				array('288690000/16/browser/android-webkit.png', '288690000/16/device/lenovo.png', 'Android Webkit 4.0', 'Lenovo A520'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.3; zh-cn; LG-P880 Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 24, '164640000/', '.gif'),
				array('164640000/24/browser/android-webkit.gif', '164640000/24/device/lg.gif', 'Android Webkit 4.0', 'LG P880'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 24, '208840000/', null),
				array('208840000/24/browser/android-webkit.png', '208840000/24/device/google-nexusone.png', 'Android Webkit 4.0', 'Nexus One'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Ubuntu Chromium/25.0.1364.160 Chrome/25.0.1364.160 Safari/537.22', 24, null, '.gif'),
				array('img/24/browser/chromium.gif', 'img/24/os/ubuntu-2.gif', 'Chromium 25.0.1364.160', 'Ubuntu'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7 CoolNovo/2.0.0.9', 16, '59130000/', '.gif'),
				array('59130000/16/browser/coolnovo.gif', '59130000/16/os/win-2.gif', 'CoolNovo 2.0.0.9', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Deepnet Explorer)', 24, '39560000/', '.gif'),
				array('39560000/24/browser/deepnetexplorer.gif', '39560000/24/os/win-2.gif', 'Deepnet Explorer ', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:20.0) Gecko/20100101 Firefox/20.0', 16, null, null),
				array('img/16/browser/firefox.png', 'img/16/os/ubuntu-2.png', 'Firefox 20.0', 'Ubuntu x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.2.10) Gecko/20100922 Ubuntu/10.10 (maverick) Firefox/3.6.10', 16, null, '.gif'),
				array('img/16/browser/firefox.gif', 'img/16/os/ubuntu-2.gif', 'Firefox 3.6.10', 'Ubuntu 10.10'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.15) Gecko/20110303 Firefox/3.6.15', 16, null, null),
				array('img/16/browser/firefox.png', 'img/16/os/win-2.png', 'Firefox 3.6.15', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (X11; FreeBSD amd64; rv:31.0) Gecko/20100101 Firefox/31.0', 16, null, null),
				array('img/16/browser/firefox.png', 'img/16/os/freebsd.png', 'Firefox 31.0', 'FreeBSD'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:31.0) Gecko/20100101 Firefox/31.0', 24, '174930000/', null),
				array('174930000/24/browser/firefox.png', '174930000/24/os/mac-3.png', 'Firefox 31.0', 'Mac OS X 10.8'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-cn; Galaxy Nexus Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/5.0 Mb2345Browser/4.0 Mobile Safari/534.30', 24, null, '.gif'),
				array('img/24/browser/galaxy.gif', 'img/24/device/google-nexusone.gif', 'Galaxy Nexus', 'Nexus Build'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.3; zh-cn; SAMSUNG-SCH-P709E Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.5 Chrome/28.0.1500.94 Mobile Safari/537.36', 16, '239440000/', null),
				array('239440000/16/browser/chrome.png', '239440000/16/device/samsung.png', 'Google Chrome 28.0.1500.94', 'Samsung SCH-P709E'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.4.2; HTC One Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36 QvodPlayerBrowser:3.4.19 Mobile-Ser:10086', 16, null, '.gif'),
				array('img/16/browser/chrome.gif', 'img/16/device/htc.gif', 'Google Chrome 30.0.0.0', 'HTC One'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.4.4; Nexus 4 Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36', 24, null, '.gif'),
				array('img/24/browser/chrome.gif', 'img/24/device/google-nexusone.gif', 'Google Chrome 33.0.0.0', 'Nexus 4'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.4.4; MI 4W Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36 MxBrowser/4.3.5.2000', 16, '244960000/', null),
				array('244960000/16/browser/chrome.png', '244960000/16/device/xiaomi.png', 'Google Chrome 33.0.0.0', 'Xiaomi 4W'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 16, '327050000/', '.gif'),
				array('327050000/16/browser/chrome.gif', '327050000/16/os/win-2.gif', 'Google Chrome 39.0.2171.95', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; chromeframe/30.0.1599.101; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET4.0C; .NET4.0E)', 16, '232390000/', null),
				array('232390000/16/browser/chrome.png', '232390000/16/os/win-2.png', 'Google Chrome Frame 30.0.1599.101', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; MRA 8.0 (build 6019); QQDownload 760; chromeframe/32.0.1700.107; SLCC2; .NET CLR 2.0.50727; InfoPath.2; .NET4.0C; .NET4.0E; .NET CLR 3.5.30729; .NET CLR 3.0.30729; QQBrowser/7.7.26717.400)', 16, null, null),
				array('img/16/browser/chrome.png', 'img/16/os/win-4.png', 'Google Chrome Frame 32.0.1700.107', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET4.0C; .NET4.0E; GreenBrowser)', 16, null, null),
				array('img/16/browser/greenbrowser.png', 'img/16/os/win-4.png', 'GreenBrowser ', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux x86_64; rv:31.0) Gecko/20100101 Firefox/31.0 Iceweasel/31.2.0', 24, '70180000/', null),
				array('70180000/24/browser/iceweasel.png', '70180000/24/os/linux.png', 'IceWeasel 31.2.0', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Nokia 920)', 24, null, null),
				array('img/24/browser/msie-mobile.png', 'img/24/device/nokia.png', 'IEMobile 10.0', 'Nokia Lumia 920'),
			),
			array(
				array('Mozilla/5.0 (Mobile; Windows Phone 8.1; Android 4.0; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; HTC; Windows Phone 8S by HTC) like iPhone OS 7_0_3 Mac OS X AppleWebKit/537 (KHTML, like Gecko) Mobile Safari/537', 16, '108130000/', '.gif'),
				array('108130000/16/browser/msie-mobile.gif', '108130000/16/device/htc.gif', 'IEMobile 11.0', 'HTC 8.1; Android 4.0; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; HTC; Windows Phone 8S'),
			),
			array(
				array('Mozilla/5.0 (Windows Phone 8.1; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Nokia 909) like Gecko', 16, '86550000/', '.gif'),
				array('86550000/16/browser/msie-mobile.gif', '86550000/16/device/nokia.gif', 'IEMobile 11.0', 'Nokia Lumia 1020'),
			),
			array(
				array('Mozilla/5.0 (Windows Phone 8.1; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Lumia 1520) like Gecko', 16, null, '.gif'),
				array('img/16/browser/msie-mobile.gif', 'img/16/device/nokia.gif', 'IEMobile 11.0', 'Nokia Lumia 1520'),
			),
			array(
				array('Mozilla/5.0 (Mobile; Windows Phone 8.1; Android 4.0; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; NOKIA; Nokia 920) like iPhone OS 7_0_3 Mac OS X AppleWebKit/537 (KHTML, like Gecko) Mobile Safari/537', 24, null, null),
				array('img/24/browser/msie-mobile.png', 'img/24/device/nokia.png', 'IEMobile 11.0', 'Nokia Lumia 920'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; ARM; Touch; WPDesktop)', 16, '43710000/', '.gif'),
				array('43710000/16/browser/msie10.gif', '43710000/16/device/windowsphone.gif', 'Internet Explorer 10.0', 'Windows Phone'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; ARM; Trident/7.0; Touch; rv:11.0; WPDesktop; HTC; Windows Phone 8X by HTC) like Gecko', 16, null, null),
				array('img/16/browser/msie11.png', 'img/16/device/htc.png', 'Internet Explorer 11.0', 'HTC 8X'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; ARM; Trident/7.0; Touch; rv:11.0; WPDesktop; Nokia 920) like Gecko', 24, null, null),
				array('img/24/browser/msie11.png', 'img/24/device/nokia.png', 'Internet Explorer 11.0', 'Nokia Lumia 920'),
			),
			array(
				array('Mozilla/5.0 (MSIE 9.0; Windows NT 6.4; WOW64; Trident/7.0; rv:11.0) like Gecko', 24, null, null),
				array('img/24/browser/msie9.png', 'img/24/os/win-5.png', 'Internet Explorer 11.0', 'Windows 10 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64; Trident/7.0; LCJB; rv:11.0) like Gecko', 24, null, null),
				array('img/24/browser/msie11.png', 'img/24/os/win-5.png', 'Internet Explorer 11.0', 'Windows 8 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (MSIE 7.0; Windows NT 6.0; Trident/7.0; rv:11.0) like Gecko', 16, null, '.gif'),
				array('img/16/browser/msie7.gif', 'img/16/os/win-3.gif', 'Internet Explorer 11.0', 'Windows Vista'),
			),
			array(
				array('Mozilla/1.22 (compatible; MSIE 2.0; Windows 95)', 24, '202070000/', null),
				array('202070000/24/browser/msie2.png', '202070000/24/os/win-1.png', 'Internet Explorer 2.0', 'Windows 95'),
			),
			array(
				array('Mozilla/1.22 (compatible; MSIE 2.0d; Windows NT)', 16, null, null),
				array('img/16/browser/msie2.png', 'img/16/os/win-2.png', 'Internet Explorer 2.0d', 'Windows'),
			),
			array(
				array('Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; 240x320)', 24, null, '.gif'),
				array('img/24/browser/msie3.gif', 'img/24/os/win-2.gif', 'Internet Explorer 3.02', 'Windows CE'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 4.0; Windows NT 6.0; Trident/5.0)', 16, null, null),
				array('img/16/browser/msie4.png', 'img/16/os/win-3.png', 'Internet Explorer 4.0', 'Windows Vista'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.0; Windows 3.1)', 16, '273090000/', null),
				array('273090000/16/browser/msie4.png', '273090000/16/os/win-1.png', 'Internet Explorer 5.0', 'Microsoft Windows 3.1'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 6.0; Trident/5.0)', 16, '94720000/', '.gif'),
				array('94720000/16/browser/msie4.gif', '94720000/16/os/win-3.gif', 'Internet Explorer 5.0', 'Windows Vista'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0)', 24, null, null),
				array('img/24/browser/msie4.png', 'img/24/os/win-1.png', 'Internet Explorer 5.5', 'Microsoft Windows NT 4.0'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.5; Windows 95)', 24, '155960000/', null),
				array('155960000/24/browser/msie4.png', '155960000/24/os/win-1.png', 'Internet Explorer 5.5', 'Windows 95'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)', 24, null, '.gif'),
				array('img/24/browser/msie6.gif', 'img/24/os/win-1.gif', 'Internet Explorer 6.0', 'Windows 2000'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2)', 24, null, null),
				array('img/24/browser/msie6.png', 'img/24/os/win-2.png', 'Internet Explorer 6.0', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.2; Trident/6.0)', 24, '135940000/', '.gif'),
				array('135940000/24/browser/msie7.gif', '135940000/24/os/win-5.gif', 'Internet Explorer 7.0', 'Windows 8'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; SV1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022)', 16, '272940000/', null),
				array('272940000/16/browser/msie7.png', '272940000/16/os/win-4.png', 'Internet Explorer 8.0', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET4.0C; .NET4.0E)', 24, null, '.gif'),
				array('img/24/browser/msie7.gif', 'img/24/os/win-4.gif', 'Internet Explorer 8.0', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 9.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)', 16, null, null),
				array('img/16/browser/msie9.png', 'img/16/os/win-2.png', 'Internet Explorer 9.0', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; JuziBrowser)', 16, '227530000/', '.gif'),
				array('227530000/16/browser/juzibrowser.gif', '227530000/16/os/win-2.gif', 'JuziBrowser', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KKman2.0)', 24, '195400000/', '.gif'),
				array('195400000/24/browser/kkman.gif', '195400000/24/os/win-2.gif', 'KKman 2.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; rv:24.0) Gecko/20140105 Firefox/24.0 K-Meleon/74.0', 24, null, '.gif'),
				array('img/24/browser/kmeleon.gif', 'img/24/os/win-4.gif', 'K-Meleon 74.0', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0) LBBROWSER', 16, '6560000/', '.gif'),
				array('6560000/16/browser/lbbrowser.gif', '6560000/16/os/win-3.gif', 'Liebao Browser', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.4.2; MI 3C) AppleWebKit/535.19 (KHTML, like Gecko) LieBaoFast/2.8.0 Mobile Safari/535.19', 16, null, null),
				array('img/16/browser/lbbrowser.png', 'img/16/device/xiaomi.png', 'Liebaofast 2.8.0', 'Xiaomi 3C'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E; Lunascape 6.9.3.27400)', 16, null, null),
				array('img/16/browser/lunascape.png', 'img/16/os/win-4.png', 'Lunascape 6.9.3.27400', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.12 (KHTML, like Gecko) Maxthon/3.0 Chrome/18.0.966.0 Safari/535.12', 16, null, '.gif'),
				array('img/16/browser/maxthon.gif', 'img/16/os/win-4.gif', 'Maxthon 3.0', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/7.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E; Maxthon/3.0)', 24, '16240000/', '.gif'),
				array('16240000/24/browser/maxthon.gif', '16240000/24/os/win-4.gif', 'Maxthon 3.0', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; Avant Browser; Maxthon/3.0)', 24, '314260000/', '.gif'),
				array('314260000/24/browser/maxthon.gif', '314260000/24/os/win-2.gif', 'Maxthon 3.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.1 (KHTML, like Gecko) Maxthon/4.1.0.3000 Chrome/26.0.1410.43 Safari/537.1', 16, null, '.gif'),
				array('img/16/browser/maxthon.gif', 'img/16/os/win-2.gif', 'Maxthon 4.1.0.3000', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Maxthon/4.4.3.800 Chrome/30.0.1599.101 Safari/537.36', 24, null, null),
				array('img/24/browser/maxthon.png', 'img/24/os/win-4.png', 'Maxthon 4.4.3.800', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn; MI 2SC Build/JRO03L) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Mobile Safari/537.36 XiaoMi/MiuiBrowser/2.1.1', 24, '293150000/', null),
				array('293150000/24/browser/miuibrowser.png', '293150000/24/device/xiaomi.png', 'MiuiBrowser 2.1.1', 'Xiaomi 2SC'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.2; fr-fr; Desire_A8181 Build/FRF91) App3leWebKit/53.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 24, null, '.gif'),
				array('img/24/browser/safari.gif', 'img/24/device/htc.gif', 'Mobile Safari 4.0', 'HTC Desire'),
			),
			array(
				array('Mozilla/5.0 (iPhone; CPU iPhone OS 5_1 like Mac OS X) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Oupeng/10.0.1.82018 Mobile Safari/534.30', 24, '110570000/', '.gif'),
				array('110570000/24/browser/safari.gif', '110570000/24/device/iphone.gif', 'Mobile Safari 4.0', 'iPhone iOS 5.1'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/534.34 (KHTML, like Gecko) Qt/4.8.2', 16, null, '.gif'),
				array('img/16/browser/mozilla.gif', 'img/16/os/linux.gif', 'Mozilla Compatible', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU iPad OS 7.1.2 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/7.1.2 Mobile/9B179 kuaiyongbrowser/1.3', 24, null, '.gif'),
				array('img/24/browser/mozilla.gif', 'img/24/device/ipad.gif', 'Mozilla Compatible', 'iPad'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Mobile/11D167', 16, null, '.gif'),
				array('img/16/browser/mozilla.gif', 'img/16/device/ipad.gif', 'Mozilla Compatible', 'iPad iOS 7.1'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.1.2; zh-cn; MI-ONE Plus Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQQBrowser/5.4 Mobile Safari/537.36', 24, null, null),
				array('img/24/browser/qqbrowser.png', 'img/24/device/xiaomi.png', 'MQQBrowser 5.4', 'Xiaomi 1'),
			),
			array(
				array('Mozilla/5.0 (Symbian/3; Series60/5.3 Nokia701/111.030.0609; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/533.4 (KHTML, like Gecko) NokiaBrowser/7.4.2.6 Mobile Safari/533.4 3gpp-gba', 24, null, '.gif'),
				array('img/24/browser/nokia.gif', 'img/24/device/nokia.gif', 'Nokia Browser 7.4.2.6', 'Nokia 701'),
			),
			array(
				array('Mozilla/5.0 (MeeGo; NokiaN9) AppleWebKit/534.13 (KHTML, like Gecko) NokiaBrowser/8.5.0 Mobile Safari/534.13', 16, '82910000/', '.gif'),
				array('82910000/16/browser/nokia.gif', '82910000/16/device/nokia.gif', 'Nokia Browser 8.5.0', 'Nokia N9'),
			),
			array(
				array('Nokia5320di', 16, null, '.gif'),
				array('img/16/browser/maemo.gif', 'img/16/device/nokia.gif', 'Nokia Web Browser', 'Nokia 5320'),
			),
			array(
				array('Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.17', 24, null, null),
				array('img/24/browser/opera-2.png', 'img/24/os/win-5.png', 'Opera 12.17', 'Windows 8 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.27 Safari/537.36 OPR/26.0.1656.8 (Edition beta)', 24, null, '.gif'),
				array('img/24/browser/opera-1.gif', 'img/24/os/win-4.gif', 'Opera 26.0.1656.8', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2236.0 Safari/537.36 OPR/28.0.1719.0 (Edition developer)', 16, null, '.gif'),
				array('img/16/browser/opera-developer.gif', 'img/16/os/mac-3.gif', 'Opera Developer 28.0.1719.0', 'Mac OS X 10.10.1'),
			),
			array(
				array('Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.13400/34.2508; U; zh) Presto/2.8.119 Version/11.10', 24, '263570000/', null),
				array('263570000/24/browser/opera-2.png', '263570000/24/os/java.png', 'Opera Mini 4.2.13400', 'J2ME/MIDP Device'),
			),
			array(
				array('Opera/9.80 (Android; Opera Mini/7.5.33361/35.6050; U; fa) Presto/2.8.119 Version/11.10', 16, '220530000/', null),
				array('220530000/16/browser/opera-2.png', '220530000/16/os/android.png', 'Opera Mini 7.5.33361', 'Android'),
			),
			array(
				array('Opera/9.80 (Windows Phone; Opera Mini/7.6.8/35.4970; U; zh) Presto/2.8.119 Version/11.10', 24, null, null),
				array('img/24/browser/opera-2.png', 'img/24/device/windowsphone.png', 'Opera Mini 7.6.8', 'Windows Phone'),
			),
			array(
				array('Opera/9.80 (Android 2.3.6; Linux; Opera Mobi/ADR-1306261228) Presto/2.11.355 Version/12.10', 16, '205150000/', null),
				array('205150000/16/browser/opera-2.png', '205150000/16/os/android.png', 'Opera Mobile 12.10', 'Android 2.3.6'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.44 Safari/537.36 OPR/24.0.1558.25 (Edition Next)', 24, '243460000/', '.gif'),
				array('243460000/24/browser/opera-next.gif', '243460000/24/os/win-4.gif', 'Opera Next 24.0.1558.25', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20141021 Firefox/24.9 PaleMoon/25.0.2', 16, '16970000/', null),
				array('16970000/16/browser/palemoon.png', '16970000/16/os/win-4.png', 'Pale Moon 25.0.2', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Mobile/11D257 IPadQQ/4.1.1.14', 24, '232560000/', '.gif'),
				array('232560000/24/browser/qq.gif', '232560000/24/device/ipad.gif', 'QQ 4.1.1.14', 'iPad iOS 7.1.2'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-cn; iOCEAN X7 Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 V1_AND_SQ_5.0.0_146_YYB_D QQ/5.0.0.2215', 24, null, null),
				array('img/24/browser/qq.png', 'img/24/os/android.png', 'QQ 5.0.0.2215', 'Android 4.2.2'),
			),
			array(
				array('Mozilla/5.0 (iPhone; CPU iPhone OS 8_1_1 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Mobile/12B435 QQ/5.1.1.97', 24, '258310000/', null),
				array('258310000/24/browser/qq.png', '258310000/24/device/iphone.png', 'QQ 5.1.1.97', 'iPhone iOS 8.1.1'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.48 Safari/537.36 QQBrowser/7.7.31721.400', 16, null, '.gif'),
				array('img/16/browser/qqbrowser.gif', 'img/16/os/win-4.gif', 'QQBrowser 7.7.31721.400', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0; QQBrowser/8.0.2820.400)', 16, '22290000/', '.gif'),
				array('22290000/16/browser/qqbrowser.gif', '22290000/16/os/win-4.gif', 'QQBrowser 8.0.2820.400', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64; Trident/7.0; LENW8; rv:11.0; SaaYaa) like Gecko', 16, null, '.gif'),
				array('img/16/browser/saayaa.gif', 'img/16/os/win-5.gif', 'SaaYaa Explorer', 'Windows 8 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Unknown; Linux x86_64) AppleWebKit/534.34 (KHTML, like Gecko) CasperJS/1.0.2+Phantomjs/1.9.2 Safari/534.34', 24, '208700000/', null),
				array('208700000/24/browser/safari.png', '208700000/24/os/linux.png', 'Safari', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1; zh-CN) AppleWebKit/537.36 (KHTML, like Gecko) Version/5.0.1 Safari/537.36', 16, null, '.gif'),
				array('img/16/browser/safari.gif', 'img/16/os/win-2.gif', 'Safari 5.0.1', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU OS 8_1_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12B440 Safari/600.1.4', 24, null, '.gif'),
				array('img/24/browser/safari.gif', 'img/24/device/ipad.gif', 'Safari 8.0', 'iPad iOS 8.1.2'),
			),
			array(
				array('Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4', 24, null, '.gif'),
				array('img/24/browser/safari.gif', 'img/24/device/iphone.gif', 'Safari 8.0', 'iPhone iOS 8.0'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5', 24, null, null),
				array('img/24/browser/safari.png', 'img/24/os/mac-3.png', 'Safari 8.0.2', 'Mac OS X 10.10.1'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1; rv:33.0) Gecko/20100101 Firefox/33.0 SeaMonkey/2.30', 16, '315710000/', null),
				array('315710000/16/browser/seamonkey.png', '315710000/16/os/win-2.png', 'SeaMonkey 2.30', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; GTB7.0; SE 2.X MetaSr 1.0)', 16, null, null),
				array('img/16/browser/sogou.png', 'img/16/os/win-2.png', 'Sogou Explorer', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Iron/34.0.1850.0 Chrome/34.0.1850.0 Safari/537.36', 24, null, '.gif'),
				array('img/24/browser/srwareiron.gif', 'img/24/os/win-4.gif', 'SRWare Iron 34.0.1850.0', 'Windows 7 x64 Edition'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.11 TaoBrowser/3.2 Safari/536.11', 16, null, '.gif'),
				array('img/16/browser/taobrowser.gif', 'img/16/os/win-2.gif', 'TaoBrowser 3.2', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; TencentTraveler 4.0)', 16, '77620000/', null),
				array('77620000/16/browser/tencenttraveler.png', '77620000/16/os/win-2.png', 'Tencent Traveler 4.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.2; WOW64; Trident/6.0; qihu theworld)', 16, '112700000/', null),
				array('112700000/16/browser/theworld.png', '112700000/16/os/win-5.png', 'TheWorld Browser', 'Windows 8 x64 Edition'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; TheWorld)', 16, '278530000/', '.gif'),
				array('278530000/16/browser/theworld.gif', '278530000/16/os/win-2.gif', 'TheWorld Browser', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.4; en-US; ZTE V970 Build/IMM76D) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 UCBrowser/10.0.0.488 U3/0.8.0 Mobile Safari/533.1', 16, '261090000/', '.gif'),
				array('261090000/16/browser/ucbrowser.gif', '261090000/16/device/zte.gif', 'UC Browser 10.0.0.488', 'ZTE V970'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; ARM; Touch; WPDesktop) UCBrowser/2.9.0.263', 16, '235390000/', null),
				array('235390000/16/browser/ucbrowser.png', '235390000/16/device/windowsphone.png', 'UC Browser 2.9.0.263', 'Windows Phone'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 UBrowser/3.0.1084.0 Safari/537.36', 16, '226980000/', null),
				array('226980000/16/browser/ucbrowser.png', '226980000/16/os/win-4.png', 'UC Browser 3.0.1084.0', 'Windows 7 x64 Edition'),
			),
			array(
				array('JUC(Linux;U;2.3.7;Zh_cn;lenovo a60;320*480;)UCWEB7.8.1.96/139/800', 16, '1400000/', null),
				array('1400000/16/browser/ucbrowser.png', '1400000/16/device/lenovo.png', 'UC Browser 7.8.1.96', 'Lenovo a60'),
			),
			array(
				array('NOKIAN95/UCWEB8.9.0.253/28/999', 24, '106310000/', '.gif'),
				array('106310000/24/browser/ucbrowser.gif', '106310000/24/device/nokia.gif', 'UC Browser 8.9.0.253', 'Nokia N95'),
			),
			array(
				array('NokiaC1-02i/2.0 (04.10) Profile/MIDP-2.1 Configuration/CLDC-1.1 UCWEB/2.0 (Java; U; MIDP-2.0; zh-CN; nokiac1-02i) U2/1.0.0 UCBrowser/9.0.0.261 U2/1.0.0 Mobile UNTRUSTED/1.0', 24, '267240000/', null),
				array('267240000/24/browser/ucbrowser.png', '267240000/24/device/nokia.png', 'UC Browser 9.0.0.261', 'Nokia'),
			),
			array(
				array('Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X; zh-CN) AppleWebKit/537.51.2 (KHTML, like Gecko) CriOS/23.0.1271.100 Mobile/11D257 Safari/7534.48.3 UCBrowser/9.9.2.490', 24, '21320000/', '.gif'),
				array('21320000/24/browser/ucbrowser.gif', '21320000/24/device/iphone.gif', 'UC Browser 9.9.2.490', 'iPhone iOS 7.1.2'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.3; zh-CN; K-Touch T619+ Build/MocorDroid2.3.5) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/9.9.8.511 U3/0.8.0 Mobile Safari/534.30', 16, '83960000/', null),
				array('83960000/16/browser/ucbrowser.png', '83960000/16/device/k-touch.png', 'UC Browser 9.9.8.511', 'K-Touch T619'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 YaBrowser/14.7.1916.15705 Safari/537.36', 16, null, null),
				array('img/16/browser/yandex.png', 'img/16/os/win-5.png', 'Yandex.Browser 14.7.1916.15705', 'Windows 8.1 x64 Edition'),
			),
		);

		foreach ($testList as $list) {
			$original = $list[0];
			$result = $list[1];
			$useragent = UserAgentFactory::analyze($original[0], $original[1], $original[2], $original[3]);
			$this->assertEquals($useragent->browser['image'], $result[0]);
			$this->assertEquals($useragent->platform['image'], $result[1]);
			$this->assertEquals($useragent->browser['title'], $result[2]);
			$this->assertEquals($useragent->platform['title'], $result[3]);
		}
	}
}