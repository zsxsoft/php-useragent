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
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36 114Browser/5.0', 16, '15820000/', '.gif'),
				array('15820000/16/browser/114browser.gif', '15820000/16/os/win-2.gif', '114Browser 5.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36 115Browser/5.1.3', 16, '15820000/', '.gif'),
				array('15820000/16/browser/115browser.gif', '15820000/16/os/win-2.gif', '115Browser 5.1.3', 'Windows XP'),
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
				array('img/16/browser/360se.gif', 'img/16/os/win-5.gif', '360 Explorer', 'Windows 8.1 x64'),
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
				array('img/24/browser/galaxy.gif', 'img/24/device/samsung.gif', 'Galaxy Nexus', 'Galaxy Nexus'),
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
				array('img/16/browser/chrome.png', 'img/16/os/win-4.png', 'Google Chrome Frame 32.0.1700.107', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET4.0C; .NET4.0E; GreenBrowser)', 16, null, null),
				array('img/16/browser/greenbrowser.png', 'img/16/os/win-4.png', 'GreenBrowser ', 'Windows 7 x64'),
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
				array('108130000/16/browser/msie-mobile.gif', '108130000/16/device/htc.gif', 'IEMobile 11.0', 'HTC 8S'),
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
				array('43710000/16/browser/msie10.gif', '43710000/16/os/windowsphone.gif', 'Internet Explorer 10.0', 'Windows Phone'),
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
				array('img/24/browser/msie9.png', 'img/24/os/win-5.png', 'Internet Explorer 11.0', 'Windows 10 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64; Trident/7.0; LCJB; rv:11.0) like Gecko', 24, null, null),
				array('img/24/browser/msie11.png', 'img/24/os/win-5.png', 'Internet Explorer 11.0', 'Windows 8 x64'),
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
				array('273090000/16/browser/msie4.png', '273090000/16/os/win-1.png', 'Internet Explorer 5.0', 'Windows 3.1'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 6.0; Trident/5.0)', 16, '94720000/', '.gif'),
				array('94720000/16/browser/msie4.gif', '94720000/16/os/win-3.gif', 'Internet Explorer 5.0', 'Windows Vista'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0)', 24, null, null),
				array('img/24/browser/msie4.png', 'img/24/os/win-1.png', 'Internet Explorer 5.5', 'Windows NT 4.0'),
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
				array('img/24/browser/msie7.gif', 'img/24/os/win-4.gif', 'Internet Explorer 8.0', 'Windows 7 x64'),
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
				array('img/16/browser/lunascape.png', 'img/16/os/win-4.png', 'Lunascape 6.9.3.27400', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.12 (KHTML, like Gecko) Maxthon/3.0 Chrome/18.0.966.0 Safari/535.12', 16, null, '.gif'),
				array('img/16/browser/maxthon.gif', 'img/16/os/win-4.gif', 'Maxthon 3.0', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/7.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E; Maxthon/3.0)', 24, '16240000/', '.gif'),
				array('16240000/24/browser/maxthon.gif', '16240000/24/os/win-4.gif', 'Maxthon 3.0', 'Windows 7 x64'),
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
				array('img/24/browser/maxthon.png', 'img/24/os/win-4.png', 'Maxthon 4.4.3.800', 'Windows 7 x64'),
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
				array('img/24/browser/opera-2.png', 'img/24/os/win-5.png', 'Opera 12.17', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.27 Safari/537.36 OPR/26.0.1656.8 (Edition beta)', 24, null, '.gif'),
				array('img/24/browser/opera-1.gif', 'img/24/os/win-4.gif', 'Opera 26.0.1656.8', 'Windows 7 x64'),
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
				array('img/24/browser/opera-2.png', 'img/24/os/windowsphone.png', 'Opera Mini 7.6.8', 'Windows Phone'),
			),
			array(
				array('Opera/9.80 (Android 2.3.6; Linux; Opera Mobi/ADR-1306261228) Presto/2.11.355 Version/12.10', 16, '205150000/', null),
				array('205150000/16/browser/opera-2.png', '205150000/16/os/android.png', 'Opera Mobile 12.10', 'Android 2.3.6'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.44 Safari/537.36 OPR/24.0.1558.25 (Edition Next)', 24, '243460000/', '.gif'),
				array('243460000/24/browser/opera-next.gif', '243460000/24/os/win-4.gif', 'Opera Next 24.0.1558.25', 'Windows 7 x64'),
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
				array('img/16/browser/saayaa.gif', 'img/16/os/win-5.gif', 'SaaYaa Explorer', 'Windows 8 x64'),
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
				array('img/24/browser/srwareiron.gif', 'img/24/os/win-4.gif', 'SRWare Iron 34.0.1850.0', 'Windows 7 x64'),
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
				array('112700000/16/browser/theworld.png', '112700000/16/os/win-5.png', 'TheWorld Browser', 'Windows 8 x64'),
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
				array('235390000/16/browser/ucbrowser.png', '235390000/16/os/windowsphone.png', 'UC Browser 2.9.0.263', 'Windows Phone'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 UBrowser/3.0.1084.0 Safari/537.36', 16, '226980000/', null),
				array('226980000/16/browser/ucbrowser.png', '226980000/16/os/win-4.png', 'UC Browser 3.0.1084.0', 'Windows 7 x64'),
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
				array('img/16/browser/yandex.png', 'img/16/os/win-5.png', 'Yandex.Browser 14.7.1916.15705', 'Windows 8.1 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0', null, null, null),
				array('img/16/browser/msie11.png', 'img/16/os/win-5.png', 'Internet Explorer Spartan 12.0', 'Windows 10 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.69 Safari/537.36 2345chrome v2.4.0.2847', null, null, null),
				array('img/16/browser/2345chrome.png', 'img/16/os/win-2.png', '2345Chrome v2.4.0.2847', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) MxNitro/1.0.1.600 Chrome/35.0.1849.0 Safari/537.36', null, null, null),
				array('img/16/browser/mxnitro.png', 'img/16/os/win-2.png', 'MxNitro 1.0.1.600', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.89 Vivaldi/1.0.94.2 Safari/537.36', 16, '15260000/', '.gif'),
				array('15260000/16/browser/vivaldi.gif', '15260000/16/os/win-5.gif', 'Vivaldi 1.0.94.2', 'Windows 10 x64'),
			), array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20100121 Firefox/3.5.6 Wyzo/3.5.6.1', 16, '249910000/', '.gif'),
				array('249910000/16/browser/Wyzo.gif', '249910000/16/os/win-4.gif', 'Wyzo 3.5.6.1', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; pt-BR) AppleWebKit/532.4 (KHTML, like Gecko) WeltweitimnetzBrowser/0.25 Safari/532.4', 24, '213750000/', '.gif'),
				array('213750000/24/browser/weltweitimnetzbrowser.gif', '213750000/24/os/win-2.gif', 'Weltweitimnetz Browser 0.25', 'Windows XP'),
			),
			array(
				array('w3m/0.5.2 (Linux i686; it; Debian-3.0.6-3)', 16, null, null),
				array('img/16/browser/w3m.png', 'img/16/os/debian.png', 'W3M 0.5.2', 'Debian GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1pre) Gecko/20090629 Vonkeror/1.0', 24, '83850000/', null),
				array('83850000/24/browser/null.png', '83850000/24/os/win-2.png', 'Vonkeror 1.0', 'Windows XP'),
			),
			array(
				array('Vimprobable/0.9.20.5', 24, '278790000/', null),
				array('278790000/24/browser/null.png', '278790000/24/browser/null.png', 'Vimprobable 0.9.20.5', 'Unknown'),
			),
			array(
				array('Uzbl (X11; U; Arch Linux; de-DE) Webkit/1.1.10', 24, '244050000/', null),
				array('244050000/24/browser/uzbl.png', '244050000/24/os/archlinux.png', 'uzbl', 'Arch Linux'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; uZardWeb/1.0; Server_JP)', 24, '480000/', '.gif'),
				array('480000/24/browser/uzardweb.gif', '480000/24/os/win-2.gif', 'uZardWeb 1.0', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; WOW64; SV1; uZardWeb/1.0; Server_CN)', 16, '202710000/', null),
				array('202710000/16/browser/uzardweb.png', '202710000/16/os/win-2.png', 'uZardWeb 1.0', 'Windows Server 2003 x64'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.2; WOW64; Trident/4.0; uZard/1.0; Server_KO_SKT)', 16, '93090000/', '.gif'),
				array('93090000/16/browser/uzardweb.gif', '93090000/16/os/win-2.gif', 'uZard 1.0', 'Windows Server 2003 x64'),
			),
			array(
				array('Ploetz + Zeller (http://www.ploetz-zeller.de) Link Validator v1.0 (support@p-und-z.de) for ARIS Business Architect', 24, null, null),
				array('img/24/browser/null.png', 'img/24/os/archlinux.png', 'Unknown', 'Arch Linux'),
			),
			array(
				array('curl/7.8 (i386-redhat-linux-gnu) libcurl 7.8 (OpenSSL 0.9.6b) (ipv6 enabled)', 24, '267300000/', '.gif'),
				array('267300000/24/browser/null.gif', '267300000/24/os/red-hat.gif', 'curl 7.8', 'Red Hat'),
			),
			array(
				array('Links (1.00pre3; SunOS 5.9 i86pc; 80x24)', 24, '194240000/', '.gif'),
				array('194240000/24/browser/null.gif', '194240000/24/os/solaris.gif', 'Links 1.00pre3', 'Solaris'),
			),
			array(
				array('Links 2.0 (http://gossamer-threads.com/scripts/links/)', 24, null, '.gif'),
				array('img/24/browser/null.gif', 'img/24/browser/null.gif', 'Links ', 'Unknown'),
			),
			array(
				array('Wget/1.9.1', 16, null, '.gif'),
				array('img/16/browser/null.gif', 'img/16/browser/null.gif', 'wget 1.9.1', 'Unknown'),
			),
			array(
				array('curl/7.19.6 (i686-pc-cygwin) libcurl/7.19.6 OpenSSL/0.9.8n zlib/1.2.3 libidn/1.18 libssh2/1.2', 16, '304080000/', '.gif'),
				array('304080000/16/browser/null.gif', '304080000/16/browser/null.gif', 'curl 7.19.6', 'Unknown'),
			),
			array(
				array('curl/7.19.5 (i586-pc-mingw32msvc) libcurl/7.19.5 zlib/1.2.3', 16, '101900000/', null),
				array('101900000/16/browser/null.png', '101900000/16/browser/null.png', 'curl 7.19.5', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; nl; rv:1.9.1.11) Gecko/20100714 openSUSE/3.0.6 Thunderbird/3.0.6 ThunderBrowse/3.3.2', 16, '128450000/', null),
				array('128450000/16/browser/thunderbird.png', '128450000/16/os/suse.png', 'Thunderbird 3.0.6', 'openSUSE x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1.10) Gecko/20100621 Fedora/3.0.5-1.fc13 Lightning/1.0b2pre Thunderbird/3.0.5', 16, '117380000/', null),
				array('117380000/16/browser/thunderbird.png', '117380000/16/os/fedora.png', 'Thunderbird 3.0.5', 'Fedora 13 x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; SunOS sun4u; en-US; rv:1.8.1.4) Gecko/20070622 Thunderbird/2.0.0.4', 16, '136670000/', null),
				array('136670000/16/browser/thunderbird.png', '136670000/16/os/solaris.png', 'Thunderbird 2.0.0.4', 'Solaris'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20130620 Thunderbird/17.0.7', 24, '107880000/', null),
				array('107880000/24/browser/thunderbird.png', '107880000/24/os/win-5.png', 'Thunderbird 17.0.7', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux i686; rv:16.0) Gecko/20121011 Thunderbird/16.0.1', 24, '22380000/', null),
				array('22380000/24/browser/thunderbird.png', '22380000/24/os/linux.png', 'Thunderbird 16.0.1', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr-FR; rv:1.7.10) Gecko/20050716 Thunderbird/1.0.6', 24, null, '.gif'),
				array('img/24/browser/thunderbird.gif', 'img/24/os/mac-3.gif', 'Thunderbird 1.0.6', 'Mac OS X Mach-O'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; (R1 1.6); .NET CLR 2.0.50727; TheWorld)', 16, null, '.gif'),
				array('img/16/browser/theworld.gif', 'img/16/os/win-2.gif', 'TheWorld Browser', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; PPC Mac OS X 10.4; rv:10.0.2) Gecko/20120217 Firefox/10.0.2 TenFourFox/G3', 24, null, null),
				array('img/24/browser/tenfourfox.png', 'img/24/os/mac-3.png', 'TenFourFox 10.0.2', 'Mac OS X 10.4'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; TencentTraveler 4.0; Trident/4.0; SLCC1; Media Center PC 5.0; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30618)', 16, '200880000/', null),
				array('200880000/16/browser/tencenttraveler.png', '200880000/16/os/win-3.png', 'Tencent Traveler 4.0', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en) AppleWebKit/418.9.1 (KHTML, like Gecko) Safari/419.3 TeaShark/0.8', 24, null, null),
				array('img/24/browser/teashark.png', 'img/24/os/mac-3.png', 'TeaShark 0.8', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.8.1.9) Gecko/20071110 Sylera/3.0.20 SeaMonkey/1.1.6', 16, null, null),
				array('img/16/browser/null.png', 'img/16/os/win-1.png', 'Sylera 3.0.20', 'Windows 2000'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9pre) Gecko/2008040318 Firefox/3.0pre (Swiftfox)', 24, null, '.gif'),
				array('img/24/browser/swiftfox.gif', 'img/24/os/linux.gif', 'Swiftfox ', 'GNU/Linux'),
			),
			array(
				array('Surf/0.4.1 (X11; U; Unix; en-US) AppleWebKit/531.2+ Compatible (Safari; MSIE 9.0)', 16, '150460000/', null),
				array('150460000/16/browser/surf.png', '150460000/16/os/unix.png', 'Surf 0.4.1', 'Unix'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-us) AppleWebKit/125.5.7 (KHTML, like Gecko) SunriseBrowser/0.895', 24, null, null),
				array('img/24/browser/sunrise.png', 'img/24/os/mac-3.png', 'Sunrise Browser', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X; fr) AppleWebKit/523.12.2 (KHTML, like Gecko) Sunrise/1.6.0 like Safari/523.12.2', 16, null, '.gif'),
				array('img/16/browser/sunrise.gif', 'img/16/os/mac-3.gif', 'Sunrise 1.6.0', 'Mac OS X'),
			),
			array(
				array('Sundance/0.9x(Compatible; Windows; U; en-US;)Version/0.9x', 16, '114360000/', '.gif'),
				array('114360000/16/browser/sundance.gif', '114360000/16/os/win-2.gif', 'Sundance 0.9x', 'Windows'),
			),
			array(
				array('Sundance(Compatible; Windows; U; en-US;) Version/0.9.0.36', 24, '64780000/', null),
				array('64780000/24/browser/sundance.png', '64780000/24/os/win-2.png', 'Sundance ', 'Windows'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Stainless/0.5.3 Safari/525.20.1', 24, null, null),
				array('img/24/browser/stainless.png', 'img/24/os/mac-3.png', 'Stainless 0.5.3', 'Mac OS X 10.5.6'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1250.0 Iron/22.0.2150.0 Safari/537.4', 24, '25350000/', null),
				array('25350000/24/browser/srwareiron.png', '25350000/24/os/win-4.png', 'SRWare Iron 22.0.2150.0', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; SlimBrowser)', 24, null, null),
				array('img/24/browser/slimbrowser.png', 'img/24/os/win-4.png', 'SlimBrowser ', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30618; .NET4.0C; .NET4.0E; Sleipnir/2.9.9)', 16, '125450000/', '.gif'),
				array('125450000/16/browser/sleipnir.gif', '125450000/16/os/win-3.gif', 'Sleipnir 2.9.9', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_7; en-us) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Safari/530.17 Skyfire/2.0', 16, '109810000/', '.gif'),
				array('109810000/16/browser/skyfire.gif', '109810000/16/os/mac-3.gif', 'Skyfire 2.0', 'Mac OS X 10.5.7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.50; Windows NT; SiteKiosk 4.9; SiteCoach 1.0)', 24, '126680000/', '.gif'),
				array('126680000/24/browser/sitekiosk.gif', '126680000/24/os/win-2.gif', 'SiteKiosk 4.9', 'Windows'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1.8pre) Gecko/20100112 Shiretoko/3.5.8pre', 16, '128990000/', '.gif'),
				array('128990000/16/browser/firefoxdevpre.gif', '128990000/16/os/linux.gif', 'Shiretoko 3.5.8pre', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-us) AppleWebKit/523.15.1 (KHTML, like Gecko) Shiira Safari/125', 24, '205080000/', null),
				array('205080000/24/browser/shiira.png', '205080000/24/os/mac-3.png', 'Shiira Safari', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; ja-jp) AppleWebKit/419 (KHTML, like Gecko) Shiira/1.2.3 Safari/125', 24, '160420000/', '.gif'),
				array('160420000/24/browser/shiira.gif', '160420000/24/os/mac-3.gif', 'Shiira 1.2.3', 'Mac OS X'),
			),
			array(
				array('SonyEricssonW800i/R1BD001/SEMC-Browser/4.2 Profile/MIDP-2.0 Configuration/CLDC-1.1', 16, null, '.gif'),
				array('img/16/browser/semcbrowser.gif', 'img/16/device/sonyericsson.gif', 'SEMC Browser 4.2', 'SonyEricsson W800i'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.2; RW; rv:7.0a1) Gecko/20091211 SeaMonkey/9.23a1pre', 24, null, '.gif'),
				array('img/24/browser/seamonkey.gif', 'img/24/os/win-2.gif', 'SeaMonkey 9.23a1pre', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1.11) Gecko/20100720 Fedora/2.0.6-1.fc12 SeaMonkey/2.0.6', 16, null, null),
				array('img/16/browser/seamonkey.png', 'img/16/os/fedora.png', 'SeaMonkey 2.0.6', 'Fedora 12 x64'),
			),
			array(
				array('Mozilla/5.0 (BeOS; U; BeOS BePC; en-US; rv:1.9a1) Gecko/20060702 SeaMonkey/1.5a', 24, null, null),
				array('img/24/browser/seamonkey.png', 'img/24/os/beos.png', 'SeaMonkey 1.5a', 'BeOS'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.9a1) Gecko/20060707 SeaMonkey/1.5a', 16, '47400000/', null),
				array('47400000/16/browser/seamonkey.png', '47400000/16/os/mac-3.png', 'SeaMonkey 1.5a', 'Mac OS X Mach-O'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.9a1) Gecko/20060206 SeaMonkey/1.5a', 24, null, null),
				array('img/24/browser/seamonkey.png', 'img/24/os/win-1.png', 'SeaMonkey 1.5a', 'Windows 2000'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9a4pre) Gecko/20070404 SeaMonkey/1.5a', 24, null, '.gif'),
				array('img/24/browser/seamonkey.gif', 'img/24/os/win-2.gif', 'SeaMonkey 1.5a', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.1) Gecko/20061101 SeaMonkey/1.1b', 24, null, '.gif'),
				array('img/24/browser/seamonkey.gif', 'img/24/os/win-1.gif', 'SeaMonkey 1.1b', 'Windows 98 SE'),
			),
			array(
				array('Mozilla/5.0 (AmigaOS; U; AmigaOS 1.3; en-US; rv:1.8.1.21) Gecko/20090303 SeaMonkey/1.1.15', 16, null, null),
				array('img/16/browser/seamonkey.png', 'img/16/os/amigaos.png', 'SeaMonkey 1.1.15', 'AmigaOS 1.3'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.8.0.14eol) Gecko/20120628 CentOS/1.0.9-40.el4.centos SeaMonkey/1.0.9', 16, null, null),
				array('img/16/browser/seamonkey.png', 'img/16/os/centos.png', 'SeaMonkey 1.0.9', 'CentOS 4 x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.14eol) Gecko/20101004 Red Hat/1.0.9-64.el4 SeaMonkey/1.0.9', 24, null, null),
				array('img/24/browser/seamonkey.png', 'img/24/os/red-hat.png', 'SeaMonkey 1.0.9', 'Red Hat Enterprise Linux 4'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.10) Gecko/20070223 Fedora/1.0.8-0.5.1.fc5 SeaMonkey/1.0.8', 24, null, null),
				array('img/24/browser/seamonkey.png', 'img/24/os/fedora.png', 'SeaMonkey 1.0.8', 'Fedora 5'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A', 24, '122360000/', '.gif'),
				array('122360000/24/browser/safari.gif', '122360000/24/os/mac-3.gif', 'Safari 7.0.3', 'Mac OS X 10.9.3'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25', 24, '209940000/', '.gif'),
				array('209940000/24/browser/safari.gif', '209940000/24/device/ipad.gif', 'Safari 6.0', 'iPad iOS 6.0'),
			),
			array(
				array('Mozilla/5.0 (iPod; U; CPU iPhone OS 4_2_1 like Mac OS X; he-il) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148 Safari/6533.18.5', 16, null, '.gif'),
				array('img/16/browser/safari.gif', 'img/16/device/iphone.gif', 'Safari 5.0.2', 'iPod iOS 4.2.1'),
			),
			array(
				array('Mozilla/5.0 (iPhone; U; ru; CPU iPhone OS 4_2_1 like Mac OS X; ru) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148a Safari/6533.18.5', 16, '136160000/', '.gif'),
				array('136160000/16/browser/safari.gif', '136160000/16/device/iphone.gif', 'Safari 5.0.2', 'iPhone iOS 4.2.1'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US) AppleWebKit/533.17.8 (KHTML, like Gecko) Version/5.0.1 Safari/533.17.8', 16, '43850000/', null),
				array('43850000/16/browser/safari.png', '43850000/16/os/win-2.png', 'Safari 5.0.1', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/531.2+', 24, '67260000/', '.gif'),
				array('67260000/24/browser/safari.gif', '67260000/24/os/linux.gif', 'Safari 5.0', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; HTC-P715a; en-ca) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16', 24, null, '.gif'),
				array('img/24/browser/safari.gif', 'img/24/device/htc.gif', 'Safari 5.0', 'HTC P715a'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en) AppleWebKit/521.32.1 (KHTML, like Gecko) Safari/521.32.1', 16, null, null),
				array('img/16/browser/safari.png', 'img/16/os/mac-3.png', 'Safari', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_7) AppleWebKit/534.24 (KHTML, like Gecko) RockMelt/0.9.58.494 Chrome/11.0.696.71 Safari/534.24', 16, '235510000/', '.gif'),
				array('235510000/16/browser/rockmelt.gif', '235510000/16/os/mac-3.gif', 'RockMelt 0.9.58.494', 'Mac OS X 10.6.7'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; ha) AppleWebKit/534.13 (KHTML, like Gecko) RockMelt/0.445.436.1326 Chrome/12.0.632.107 Safari/534.13', 24, '139080000/', '.gif'),
				array('139080000/24/browser/rockmelt.gif', '139080000/24/os/mac-3.gif', 'RockMelt 0.445.436.1326', 'Mac OS X 10.6.4'),
			),
			array(
				array('retawq/0.2.6c [en] (text)', 16, null, '.gif'),
				array('img/16/browser/terminal.gif', 'img/16/browser/null.gif', 'retawq 0.2.6c', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; cs-CZ) AppleWebKit/533.3 (KHTML, like Gecko) rekonq Safari/533.3', 24, null, null),
				array('img/24/browser/rekonq.png', 'img/24/os/linux.png', 'rekonq', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; pt-BR) AppleWebKit/533.3 (KHTML, like Gecko) QtWeb Internet Browser/3.7 http://www.QtWeb.net', 16, '3060000/', '.gif'),
				array('3060000/16/browser/qtwebinternetbrowser.gif', '3060000/16/os/win-2.gif', 'QtWeb Internet Browser 3.7', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en-US; rv:1.9.2.3) Gecko/20100402 Prism/1.0b4', 24, null, null),
				array('img/24/browser/prism.png', 'img/24/os/mac-3.png', 'Prism 1.0b4', 'Mac OS X 10.6'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080414 Firefox/2.0.0.13 Pogo/2.0.0.13.6866', 24, '322870000/', null),
				array('322870000/24/browser/pogo.png', '322870000/24/os/win-2.png', 'Pogo 2.0.0.13.6866', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.3a) Gecko/20021207 Phoenix/0.5', 24, '265180000/', null),
				array('265180000/24/browser/phoenix.png', '265180000/24/os/linux.png', 'Phoenix 0.5', 'GNU/Linux'),
			),
			array(
				array('(Windows NT 6.2; WOW64) KHTML/4.11 Gecko/20130308 Firefox/33.0 (PaleMoon/25.1)', 24, null, null),
				array('img/24/browser/palemoon.png', 'img/24/os/win-5.png', 'Pale Moon 25.1', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/1.10 [en] (Compatible; RISC OS 3.70; Oregano 1.10)', 24, '258650000/', null),
				array('258650000/24/browser/oregano.png', '258650000/24/browser/null.png', 'Oregano 1.10', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.1) Gecko/20090722 Firefox/3.5.1 Orca/1.2 build 2', 24, null, null),
				array('img/24/browser/orca.png', 'img/24/os/win-4.png', 'Orca 1.2', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; S60; SymbOS; Opera Mobi/SYB-1107071606; en) Opera 11.10', 16, null, null),
				array('img/16/browser/opera-2.png', 'img/16/os/symbian.png', 'Opera Mobile SYB', 'SymbianOS'),
			),
			array(
				array('Mozilla/5.0 (Android 2.2.2; Linux; Opera Mobi/ADR-1103311355; U; en; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6 Opera 11.00', 24, null, null),
				array('img/24/browser/opera-2.png', 'img/24/os/android.png', 'Opera Mobile ADR', 'Android 2.2.2'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Android 2.2.2; Linux; Opera Mobi/ADR-1103311355; en) Opera 11.00', 16, null, '.gif'),
				array('img/16/browser/opera-2.gif', 'img/16/os/android.gif', 'Opera Mobile ADR', 'Android 2.2.2'),
			),
			array(
				array('Mozilla/5.0 (Linux armv6l; Maemo; Opera Mobi/8; U; en-GB; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6 Opera 11.00', 16, null, null),
				array('img/16/browser/opera-2.png', 'img/16/os/linux.png', 'Opera Mobile 8', 'GNU/Linux'),
			),
			array(
				array('Opera/9.80 (Android 2.3.3; Linux; Opera Mobi/ADR-1111101157; U; es-ES) Presto/2.9.201 Version/11.50', 16, '184800000/', '.gif'),
				array('184800000/16/browser/opera-2.gif', '184800000/16/os/android.gif', 'Opera Mobile 11.50', 'Android 2.3.3'),
			),
			array(
				array('Mozilla/4.0 (compatible; Windows Mobile; WCE; Opera Mobi/WMD-50433; U; de) Presto/2.4.13 Version/10.00', 24, '309900000/', null),
				array('309900000/24/browser/opera-2.png', '309900000/24/device/htc.png', 'Opera Mobile 10.00', 'HTC Touch Pro2'),
			),
			array(
				array('Opera/9.80 (Windows Mobile; WCE; Opera Mobi/49; U; en) Presto/2.4.18 Version/10.00', 16, null, '.gif'),
				array('img/16/browser/opera-2.gif', 'img/16/os/win-2.gif', 'Opera Mobile 10.00', 'Windows'),
			),
			array(
				array('Opera/9.80 (Windows NT 6.1; Opera Mobi/49; U; en) Presto/2.4.18 Version/10.00', 16, null, null),
				array('img/16/browser/opera-2.png', 'img/16/os/win-4.png', 'Opera Mobile 10.00', 'Windows 7'),
			),
			array(
				array('Opera/9.80 (Windows NT 6.0; Opera Mobi/49; U; en) Presto/2.4.18 Version/10.00', 24, null, null),
				array('img/24/browser/opera-2.png', 'img/24/os/win-3.png', 'Opera Mobile 10.00', 'Windows Vista'),
			),
			array(
				array('Opera/9.80 (Windows NT 5.1; Opera Mobi/49; U; en) Presto/2.4.18 Version/10.00', 24, null, null),
				array('img/24/browser/opera-2.png', 'img/24/os/win-2.png', 'Opera Mobile 10.00', 'Windows XP'),
			),
			array(
				array('Opera/9.80 (J2ME/MIDP; Opera Mini/SymbianOS/22.478; U; en) Presto/2.5.25 Version/10.54', 24, '92810000/', '.gif'),
				array('92810000/24/browser/opera-2.gif', '92810000/24/os/symbian.gif', 'Opera Mini SymbianOS', 'SymbianOS'),
			),
			array(
				array('Opera/9.80 (J2ME/MIDP; Opera Mini/Nokia2730c-1/22.478; U; en) Presto/2.5.25 Version/10.54', 24, null, '.gif'),
				array('img/24/browser/opera-2.gif', 'img/24/device/nokia.gif', 'Opera Mini Nokia2730c', 'Nokia 2730'),
			),
			array(
				array('Opera/9.80 (iPhone; Opera Mini/7.1.32694/27.1407; U; en) Presto/2.8.119 Version/11.10', 16, null, null),
				array('img/16/browser/opera-2.png', 'img/16/device/iphone.png', 'Opera Mini 7.1.32694', 'iPhone'),
			),
			array(
				array('Opera/9.80 (iPad; Opera Mini/7.1.32694/27.1407; U; en) Presto/2.8.119 Version/11.10', 16, null, null),
				array('img/16/browser/opera-2.png', 'img/16/device/ipad.png', 'Opera Mini 7.1.32694', 'iPad'),
			),
			array(
				array('Opera/9.80 (Android; Opera Mini/7.0.29952/28.2075; U; es) Presto/2.8.119 Version/11.10', 24, null, null),
				array('img/24/browser/opera-2.png', 'img/24/os/android.png', 'Opera Mini 7.0.29952', 'Android'),
			),
			array(
				array('Opera/9.80 (J2ME/MIDP; Opera Mini/4.0.10031/22.453; U; en) Presto/2.5.25 Version/10.54', 24, '227070000/', null),
				array('227070000/24/browser/opera-2.png', '227070000/24/os/java.png', 'Opera Mini 4.0.10031', 'J2ME/MIDP Device'),
			),
			array(
				array('Opera/9.80 (J2ME/MIDP; Opera Mini/4.0 (compatible; MSIE 5.0; UNIX) Opera 6.12 [en]/24.838; U; en) Presto/2.5.25 Version/10.54', 16, '218700000/', null),
				array('218700000/16/browser/opera-2.png', '218700000/16/os/unix.png', 'Opera Mini 4.0', 'Unix'),
			),
			array(
				array('Opera/9.80 (J2ME/MIDP; Opera Mini/(Windows; U; Windows NT 5.1; en-US) AppleWebKit/23.411; U; en) Presto/2.5.25 Version/10.54', 16, '224260000/', '.gif'),
				array('224260000/16/browser/opera-2.gif', '224260000/16/os/win-2.gif', 'Opera Mini ', 'Windows XP'),
			),
			array(
				array('Opera/9.99 (Windows NT 5.1; U; pl) Presto/9.9.9', 24, '227120000/', '.gif'),
				array('227120000/24/browser/opera-1.gif', '227120000/24/os/win-2.gif', 'Opera 9.99', 'Windows XP'),
			),
			array(
				array('HTC_HD2_T8585 Opera/9.70 (Windows NT 5.1; U; de)', 16, null, null),
				array('img/16/browser/opera-1.png', 'img/16/device/htc.png', 'Opera 9.70', 'HTC HD2'),
			),
			array(
				array('Opera/9.64 (X11; Linux i686; U; Linux Mint; it) Presto/2.1.1', 24, null, '.gif'),
				array('img/24/browser/opera-1.gif', 'img/24/os/linuxmint.gif', 'Opera 9.64', 'Linux Mint'),
			),
			array(
				array('Opera/9.64(Windows NT 5.1; U; en) Presto/2.1.1', 16, '212910000/', '.gif'),
				array('212910000/16/browser/opera-1.gif', '212910000/16/os/win-2.gif', 'Opera 9.64', 'Windows XP'),
			),
			array(
				array('Opera/9.63 (X11; FreeBSD 7.1-RELEASE i386; U; en) Presto/2.1.1', 16, null, '.gif'),
				array('img/16/browser/opera-1.gif', 'img/16/os/freebsd.gif', 'Opera 9.63', 'FreeBSD'),
			),
			array(
				array('Opera/9.30 (Nintendo Wii; U; ; 2071; Wii Shop Channel/1.0; en)', 24, null, '.gif'),
				array('img/24/browser/opera-1.gif', 'img/24/device/nintendowii.gif', 'Opera 9.30', 'Nintendo Wii'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows CE; Sprint:PPC-6700) Opera 8.65 [en]', 16, null, '.gif'),
				array('img/16/browser/opera-1.gif', 'img/16/os/win-2.gif', 'Opera 8.65', 'Windows CE'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.0; UNIX) Opera 6.12 [en]', 16, null, '.gif'),
				array('img/16/browser/opera-1.gif', 'img/16/os/unix.gif', 'Opera 6.12', 'Unix'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.0; Windows 98) Opera 6.04 [en]', 24, '255210000/', '.gif'),
				array('255210000/24/browser/opera-1.gif', '255210000/24/os/win-1.gif', 'Opera 6.04', 'Windows 98'),
			),
			array(
				array('Opera/6.04 (Windows NT 4.0; U) [en]', 16, '146450000/', '.gif'),
				array('146450000/16/browser/opera-1.gif', '146450000/16/os/win-1.gif', 'Opera 6.04', 'Windows NT 4.0'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.0 [en]', 16, null, '.gif'),
				array('img/16/browser/opera-1.gif', 'img/16/os/win-1.gif', 'Opera 6.0', 'Windows 2000'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-US) AppleWebKit/528.16 (KHTML, like Gecko, Safari/528.16) OmniWeb/v622.8.0', 16, null, null),
				array('img/16/browser/omniweb.png', 'img/16/os/mac-3.png', 'OmniWeb v622.8.0', 'Mac OS X 10.5.6'),
			),
			array(
				array('Mozilla/4.5 (compatible; OmniWeb/4.1-v422; Mac_PowerPC)', 24, '78060000/', '.gif'),
				array('78060000/24/browser/omniweb.gif', '78060000/24/os/mac-1.gif', 'OmniWeb 4.1', 'Macintosh'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/522+ (KHTML, like Gecko) OmniWeb', 24, null, '.gif'),
				array('img/24/browser/omniweb.gif', 'img/24/os/mac-3.gif', 'OmniWeb ', 'Mac OS X'),
			),
			array(
				array('NokiaE5-00/SymbianOS/9.1 Series60/3.0 3gpp-gba', 16, null, null),
				array('img/16/browser/maemo.png', 'img/16/device/nokia.png', 'Nokia Web Browser', 'Nokia E5'),
			),
			array(
				array('NokiaN97/21.1.107 (SymbianOS/9.4; Series60/5.0 Mozilla/5.0; Profile/MIDP-2.1 Configuration/CLDC-1.1) AppleWebkit/525 (KHTML, like Gecko) BrowserNG/7.1.4', 24, null, null),
				array('img/24/browser/maemo.png', 'img/24/device/nokia.png', 'Nokia Web Browser', 'Nokia N97'),
			),
			array(
				array('NokiaN97i/SymbianOS/9.1 Series60/3.0', 24, null, null),
				array('img/24/browser/maemo.png', 'img/24/device/nokia.png', 'Nokia Web Browser', 'Nokia N97'),
			),
			array(
				array('Nokia5250/10.0.011 (SymbianOS/9.4; U; Series60/5.0 Mozilla/5.0; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/525 (KHTML, like Gecko) Safari/525 3gpp-gba', 24, '217890000/', '.gif'),
				array('217890000/24/browser/maemo.gif', '217890000/24/device/nokia.gif', 'Nokia Web Browser', 'Nokia 5250'),
			),
			array(
				array('NetSurf/2.0 (Linux; i686)', 16, '174770000/', null),
				array('174770000/16/browser/netsurf.png', '174770000/16/os/linux.png', 'NetSurf 2.0', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Win 9x 4.90; en-US; rv:1.8.1.8pre) Gecko/20071015 Firefox/2.0.0.7 Navigator/9.0', 24, null, null),
				array('img/24/browser/netscape.png', 'img/24/os/win-1.png', 'Netscape Navigator 9.0', 'Windows Me'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Win95; de-DE; rv:1.0.2) Gecko/20030208 Netscape/7.02', 24, null, null),
				array('img/24/browser/netscape.png', 'img/24/os/win-1.png', 'Netscape 7.02', 'Windows 95'),
			),
			array(
				array('Mozilla/3.0 (compatible; NetPositive/2.1.1; BeOS)', 16, null, '.gif'),
				array('img/16/browser/netpositive.gif', 'img/16/os/beos.gif', 'NetPositive 2.1.1', 'BeOS'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; de-de) AppleWebKit/531.22.7 (KHTML, like Gecko) NetNewsWire/3.2.7', 16, null, null),
				array('img/16/browser/netnewswire.png', 'img/16/os/mac-3.png', 'NetNewsWire 3.2.7', 'Mac OS X 10.6.3'),
			),
			array(
				array('Mozilla/4.0 (compatible; Linux 2.6.22) NetFront/3.4 Kindle/2.5 (screen 824x1200;rotate)', 16, '206370000/', null),
				array('206370000/16/browser/netfront.png', '206370000/16/device/kindle.png', 'NetFront 3.4', 'Kindle 2.5'),
			),
			array(
				array('SAMSUNG-C5212/C5212XDIK1 NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1', 24, '30360000/', '.gif'),
				array('30360000/24/browser/netfront.gif', '30360000/24/device/samsung.gif', 'NetFront 3.4', 'Samsung C5212'),
			),
			array(
				array('Mozilla/4.0 (compatible; Linux 2.6.10) NetFront/3.3 Kindle/1.0 (screen 600x800)', 24, null, '.gif'),
				array('img/24/browser/netfront.gif', 'img/24/device/kindle.gif', 'NetFront 3.3', 'Kindle 1.0'),
			),
			array(
				array('SonyEricssonK800c/R8BF Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1', 24, '252150000/', '.gif'),
				array('252150000/24/browser/netfront.gif', '252150000/24/device/sonyericsson.gif', 'NetFront 3.3', 'SonyEricsson K800c'),
			),
			array(
				array('SonyEricssonK530i/R6BA Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1', 16, '140310000/', null),
				array('140310000/16/browser/netfront.png', '140310000/16/device/sonyericsson.png', 'NetFront 3.3', 'SonyEricsson K530i'),
			),
			array(
				array('SonyEricssonK530c/R8BA Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1', 24, '237260000/', '.gif'),
				array('237260000/24/browser/netfront.gif', '237260000/24/device/sonyericsson.gif', 'NetFront 3.3', 'SonyEricsson K530c'),
			),
			array(
				array('SonyEricssonK510c/R4EA Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1', 16, '253670000/', '.gif'),
				array('253670000/16/browser/netfront.gif', '253670000/16/device/sonyericsson.gif', 'NetFront 3.3', 'SonyEricsson K510c'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2a2pre) Gecko/20090825 Namoroka/3.6a2pre', 16, null, null),
				array('img/16/browser/firefoxdevpre.png', 'img/16/os/linux.png', 'Namoroka 3.6a2pre', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.2pre) Gecko/20100312 Namoroka/3.6.2pre (.NET CLR 3.5.30729)', 16, null, '.gif'),
				array('img/16/browser/firefoxdevpre.gif', 'img/16/os/win-2.gif', 'Namoroka 3.6.2pre', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2) Gecko/20100206 Namoroka/3.6', 16, null, '.gif'),
				array('img/16/browser/firefoxdevpre.gif', 'img/16/os/linux.gif', 'Namoroka 3.6', 'GNU/Linux'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; MyIE2; .NET CLR 1.1.4322; InfoPath.1)', 16, null, null),
				array('img/16/browser/myie2.png', 'img/16/os/win-2.png', 'MyIE2 ', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:1.8.0.7) Gecko/20110321 MultiZilla/4.33.2.6a SeaMonkey/8.6.55', 16, '24250000/', '.gif'),
				array('24250000/16/browser/mozilla.gif', '24250000/16/os/win-4.gif', 'MultiZilla 4.33.2.6a', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.2; WOW64; rv:1.8.0.7) Gecko/20110321 MultiZilla/4.33.2.6a SeaMonkey/8.6.55', 24, '112820000/', null),
				array('112820000/24/browser/mozilla.png', '112820000/24/os/win-5.png', 'MultiZilla 4.33.2.6a', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64; rv:1.8.0.7) Gecko/20110321 MultiZilla/4.33.2.6a SeaMonkey/8.6.55', 16, null, null),
				array('img/16/browser/mozilla.png', 'img/16/os/win-5.png', 'MultiZilla 4.33.2.6a', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; RW; rv:1.8.0.7) Gecko/20110321 MultiZilla/4.33.2.6a SeaMonkey/8.6.55', 16, '266620000/', '.gif'),
				array('266620000/16/browser/mozilla.gif', '266620000/16/os/win-2.gif', 'MultiZilla 4.33.2.6a', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.19) Gecko/20081204 MultiZilla/1.8.3.5c SeaMonkey/1.1.14', 16, '126960000/', '.gif'),
				array('126960000/16/browser/mozilla.gif', '126960000/16/os/win-2.gif', 'MultiZilla 1.8.3.5c', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.1.23) Gecko/20090825 MultiZilla/1.8.3.4e SeaMonkey/1.1.18', 16, null, null),
				array('img/16/browser/mozilla.png', 'img/16/os/win-1.png', 'MultiZilla 1.8.3.4e', 'Windows 98 SE'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.12) Gecko/20080201 MultiZilla/1.8.3.4e SeaMonkey/1.1.8', 16, null, '.gif'),
				array('img/16/browser/mozilla.gif', 'img/16/os/win-2.gif', 'MultiZilla 1.8.3.4e', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.21) Gecko/20090403 MultiZilla/1.8.3.4e SeaMonkey/1.1.16', 16, null, '.gif'),
				array('img/16/browser/mozilla.gif', 'img/16/os/win-2.gif', 'MultiZilla 1.8.3.4e', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.16) Gecko/20080702 MultiZilla/1.8.3.4e SeaMonkey/1.1.11', 16, '188800000/', null),
				array('188800000/16/browser/mozilla.png', '188800000/16/os/win-2.png', 'MultiZilla 1.8.3.4e', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.8) Gecko/20061030 MultiZilla/1.8.3.0a SeaMonkey/1.0.6', 16, '196100000/', '.gif'),
				array('196100000/16/browser/mozilla.gif', '196100000/16/os/win-2.gif', 'MultiZilla 1.8.3.0a', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (OS/2; U; Warp 4.5; en-US; rv:1.8.0.7) Gecko/20060910 MultiZilla/1.8.2.0i SeaMonkey/1.0.5', 16, '1620000/', '.gif'),
				array('1620000/16/browser/mozilla.gif', '1620000/16/browser/null.gif', 'MultiZilla 1.8.2.0i', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (OS/2; U; Warp 4.5; en-US; rv:1.8.0.6) Gecko/20060730 MultiZilla/1.8.2.0i SeaMonkey/1.0.4', 24, '180120000/', null),
				array('180120000/24/browser/mozilla.png', '180120000/24/browser/null.png', 'MultiZilla 1.8.2.0i', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (OS/2; U; Warp 4.5; en-US; rv:1.9a1) Gecko/20051119 MultiZilla/1.8.1.0s SeaMonkey/1.5a', 24, '61290000/', null),
				array('61290000/24/browser/mozilla.png', '61290000/24/browser/null.png', 'MultiZilla 1.8.1.0s', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.7) Gecko/20060910 MultiZilla/1.7.9.0a SeaMonkey/1.0.5', 16, null, null),
				array('img/16/browser/mozilla.png', 'img/16/os/win-2.png', 'MultiZilla 1.7.9.0a', 'Windows XP'),
			),
			array(
				array('Mozilla/4.41 (BEOS; U ;Nav)', 16, null, '.gif'),
				array('img/16/browser/mozilla.gif', 'img/16/os/beos.gif', 'Mozilla Compatible', 'BeOS'),
			),
			array(
				array('Mozilla/4.8 [en] (FreeBSD; U)', 24, '269590000/', '.gif'),
				array('269590000/24/browser/mozilla.gif', '269590000/24/os/freebsd.gif', 'Mozilla Compatible', 'FreeBSD'),
			),
			array(
				array('Mozilla/4.8 [en] (X11; U; Linux 2.6.12-1.1372_FC3 i686; Nav)', 24, null, null),
				array('img/24/browser/mozilla.png', 'img/24/os/linux.png', 'Mozilla Compatible', 'GNU/Linux'),
			),
			array(
				array('Mozilla/4.04 [en] (X11; I; IRIX 5.3 IP22)', 16, '297320000/', '.gif'),
				array('297320000/16/browser/mozilla.gif', '297320000/16/os/irix.gif', 'Mozilla Compatible', 'IRIX Linux 5.3'),
			),
			array(
				array('Mozilla/4.76C-SGI [en] (X11; I; IRIX64 6.5 IP30)', 16, null, null),
				array('img/16/browser/mozilla.png', 'img/16/os/irix.png', 'Mozilla Compatible', 'IRIX Linux x64 6.5'),
			),
			array(
				array('Mozilla/4.8 [en] (X11; U; HP-UX B.11.00 9000/785)', 16, '208220000/', '.gif'),
				array('208220000/16/browser/mozilla.gif', '208220000/16/browser/null.gif', 'Mozilla Compatible', 'Unknown'),
			),
			array(
				array('Mozilla/4.8 [en] (Win98; U)', 16, null, null),
				array('img/16/browser/mozilla.png', 'img/16/os/win-1.png', 'Mozilla Compatible', 'Windows 98 SE'),
			),
			array(
				array('Mozilla/4.7 [fr] (Win95; I)', 24, '240350000/', '.gif'),
				array('240350000/24/browser/mozilla.gif', '240350000/24/os/win-1.gif', 'Mozilla Compatible', 'Windows 95'),
			),
			array(
				array('Mozilla/5.0 (PLAYSTATION 3; 3.55)', 16, null, null),
				array('img/16/browser/mozilla.png', 'img/16/device/playstation.png', 'Mozilla Compatible', 'PlayStation 3'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.7) Gecko/20050427 Red Hat/1.7.7-1.1.3.4', 16, '280670000/', null),
				array('280670000/16/browser/mozilla.png', '280670000/16/os/red-hat.png', 'Mozilla 1.7.7', 'Red Hat'),
			),
			array(
				array('NCSA_Mosaic/2.0 (Windows 3.1)', 24, '69860000/', null),
				array('69860000/24/browser/mosaic.png', '69860000/24/os/win-1.png', 'Mosaic 2.0', 'Windows 3.1'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.3) Gecko/2008092816 Mobile Safari 1.1.3', 24, '136320000/', '.gif'),
				array('136320000/24/browser/safari.gif', '136320000/24/os/linux.gif', 'Mobile Safari', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux arm7tdmi; rv:1.8.1.11) Gecko/20071130 Minimo/0.025', 24, null, '.gif'),
				array('img/24/browser/minimo.gif', 'img/24/os/linux.gif', 'Minimo 0.025', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:2.0b4pre) Gecko/20100815 Minefield/4.0b4pre', 16, null, '.gif'),
				array('img/16/browser/minefield.gif', 'img/16/os/win-4.gif', 'Minefield 4.0b4pre', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; fr-fr) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori/1.19', 16, null, '.gif'),
				array('img/16/browser/midori.gif', 'img/16/os/linux.gif', 'Midori 1.19', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; de-at) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori', 16, '25650000/', '.gif'),
				array('25650000/16/browser/midori.gif', '25650000/16/os/linux.gif', 'Midori ', 'GNU/Linux x64'),
			),
			array(
				array('MOT-L7/NA.ACR_RB MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1', 24, '230750000/', null),
				array('230750000/24/browser/mib.png', '230750000/24/device/motorola.png', 'MIB 2.2.1', 'Motorola L7'),
			),
			array(
				array('MOT-V300/0B.09.19R MIB/2.2 Profile/MIDP-2.0 Configuration/CLDC-1.0', 24, null, null),
				array('img/24/browser/mib.png', 'img/24/device/motorola.png', 'MIB 2.2', 'Motorola V300'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/533.1 (KHTML, like Gecko) Maxthon/3.0.8.2 Safari/533.1', 16, null, null),
				array('img/16/browser/maxthon.png', 'img/16/os/win-3.png', 'Maxthon 3.0.8.2', 'Windows Vista'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; MAXTHON 2.0)', 24, null, '.gif'),
				array('img/24/browser/maxthon.gif', 'img/24/os/win-2.gif', 'Maxthon 2.0', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; Maxthon; .NET CLR 2.0.50727; InfoPath.2; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', 24, '269160000/', null),
				array('269160000/24/browser/maxthon.png', '269160000/24/os/win-2.png', 'Maxthon ', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux armv7l; ru-RU; rv:1.9.2.3pre) Gecko/20100723 Firefox/3.5 Maemo Browser 1.7.4.8 RX-51 N900', 24, null, '.gif'),
				array('img/24/browser/maemo.gif', 'img/24/os/linux.gif', 'Maemo Browser 1.7.4.8', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en; rv:1.7.12) Gecko/20050928 Firefox/1.0.7 Madfox/3.0', 16, '89530000/', '.gif'),
				array('89530000/16/browser/madfox.gif', '89530000/16/os/mac-3.gif', 'Madfox 3.0', 'Mac OS X Mach-O'),
			),
			array(
				array('Lynx/2.8.1pre.9 libwww-FM/2.14', 16, null, '.gif'),
				array('img/16/browser/lynx.gif', 'img/16/browser/null.gif', 'Lynx 2.8.1pre.9', 'Unknown'),
			),
			array(
				array('Lynx (textmode)', 24, '120730000/', null),
				array('120730000/24/browser/lynx.png', '120730000/24/browser/null.png', 'Lynx ', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.28) Gecko/20120410 Firefox/3.6.28 Lunascape/6.7.1.25446', 16, '69190000/', null),
				array('69190000/16/browser/lunascape.png', '69190000/16/os/win-4.png', 'Lunascape 6.7.1.25446', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Lunascape 6.7.1.25446)', 16, null, null),
				array('img/16/browser/lunascape.png', 'img/16/os/win-4.png', 'Lunascape 6.7.1.25446', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; ko; rv:1.9.2.16) Gecko/20110325 Firefox/3.6.16 Lunascape/6.4.5.23569', 16, '141540000/', '.gif'),
				array('141540000/16/browser/lunascape.gif', '141540000/16/os/win-2.gif', 'Lunascape 6.4.5.23569', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Lunascape/6.4.2.23236 Safari/533.3', 16, null, '.gif'),
				array('img/16/browser/lunascape.gif', 'img/16/os/win-4.gif', 'Lunascape 6.4.2.23236', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.3pre) Gecko/20100403 Lorentz/3.6.3plugin2pre (.NET CLR 4.0.20506)', 24, '118680000/', '.gif'),
				array('118680000/24/browser/firefoxdevpre.gif', '118680000/24/os/win-4.gif', 'Lorentz 3.6.3plugin2pre', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-GB; rv:1.9.1.17) Gecko/20110123 Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.2) Gecko/20070225 lolifox/0.32', 24, null, '.gif'),
				array('img/24/browser/lolifox.gif', 'img/24/os/win-4.gif', 'lolifox 0.32', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows XP 5.1) Lobo/0.98.4', 16, null, '.gif'),
				array('img/16/browser/lobo.gif', 'img/16/os/win-2.gif', 'Lobo 0.98.4', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Linux 2.6.26-1-amd64) Lobo/0.98.3', 24, '44000000/', '.gif'),
				array('44000000/24/browser/lobo.gif', '44000000/24/os/linux.gif', 'Lobo 0.98.3', 'GNU/Linux'),
			),
			array(
				array('LeechCraft (X11; U; Linux; ru_RU) (LeechCraft/Poshuku 0.3.95-1-g84cc6b7; WebKit 4.7.1/4.7.1)', 16, '45800000/', null),
				array('45800000/16/browser/null.png', '45800000/16/os/linux.png', 'LeechCraft', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux 3.5.4-1-ARCH i686; es) KHTML/4.9.1 (like Gecko) Konqueror/4.9', 24, '153400000/', null),
				array('153400000/24/browser/konqueror.png', '153400000/24/os/archlinux.png', 'Konqueror 4.9', 'Arch Linux'),
			),
			array(
				array('Mozilla/5.0 (compatible; Konqueror/4.4; Linux 2.6.32-22-generic; X11; en_US) KHTML/4.4.3 (like Gecko) Kubuntu', 16, null, null),
				array('img/16/browser/konqueror.png', 'img/16/os/kubuntu-2.png', 'Konqueror 4.4', 'Kubuntu'),
			),
			array(
				array('Mozilla/5.0 (compatible; Konqueror/4.2; Linux) KHTML/4.2.4 (like Gecko) Slackware/13.0', 16, null, null),
				array('img/16/browser/konqueror.png', 'img/16/os/slackware.png', 'Konqueror 4.2', 'Slackware'),
			),
			array(
				array('Mozilla/5.0 (compatible; Konqueror/4.1; DragonFly) KHTML/4.1.4 (like Gecko)', 24, null, null),
				array('img/24/browser/konqueror.png', 'img/24/os/dragonflybsd.png', 'Konqueror 4.1', 'DragonFly BSD'),
			),
			array(
				array('Mozilla/5.0 (compatible; Konqueror/3.4; Linux) KHTML/3.4.3 (like Gecko) (Kubuntu package 4:3.4.3-0ubuntu2)', 24, '207680000/', '.gif'),
				array('207680000/24/browser/konqueror.gif', '207680000/24/os/kubuntu-2.gif', 'Konqueror 3.4', 'Kubuntu'),
			),
			array(
				array('Mozilla/5.0 (compatible; Konqueror/3.4; Linux) KHTML/3.4.3 (like Gecko) (Kubuntu package 4:3.4.3-0ubuntu1)', 24, null, null),
				array('img/24/browser/konqueror.png', 'img/24/os/kubuntu-2.png', 'Konqueror 3.4', 'Kubuntu'),
			),
			array(
				array('Mozilla/5.0 (compatible; Konqueror/3.4; SunOS) KHTML/3.4.1 (like Gecko)', 16, null, null),
				array('img/16/browser/konqueror.png', 'img/16/os/solaris.png', 'Konqueror 3.4', 'Solaris'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.1.4pre) Gecko/20070404 K-Ninja/2.1.3', 16, null, '.gif'),
				array('img/16/browser/kninja.gif', 'img/16/os/win-1.gif', 'K-Ninja 2.1.3', 'Windows 98 SE'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.8.1.19) Gecko/20081217 KMLite/1.1.2', 24, '42770000/', '.gif'),
				array('42770000/24/browser/kmeleon.gif', '42770000/24/os/win-1.gif', 'KMLite 1.1.2', 'Windows 2000'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.21pre) Gecko K-Meleon/1.7.0', 16, '20910000/', null),
				array('20910000/16/browser/kmeleon.png', '20910000/16/os/win-2.png', 'K-Meleon 1.7.0', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; KKMAN3.2; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', 24, null, '.gif'),
				array('img/24/browser/kkman.gif', 'img/24/os/win-4.gif', 'KKman 3.2', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.8) Gecko Fedora/1.9.0.8-1.fc10 Kazehakase/0.5.6', 16, '142240000/', null),
				array('142240000/16/browser/kazehakase.png', '142240000/16/os/fedora.png', 'Kazehakase 0.5.6', 'Fedora 10'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/20080705 Firefox/3.0 Kapiko/3.0', 24, null, null),
				array('img/24/browser/kapiko.png', 'img/24/os/win-2.png', 'Kapiko 3.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT; U; en) AppleWebKit/525.18.1 (KHTML, like Gecko) Version/3.1.1 Iris/1.1.7 Safari/525.20', 24, null, null),
				array('img/24/browser/iris.png', 'img/24/os/win-2.png', 'Iris 1.1.7', 'Windows'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/4.0; iRider 2.60.0008; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', 16, null, null),
				array('img/16/browser/irider.png', 'img/16/os/win-4.png', 'iRider 2.60.0008', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/4.0; GTB7.4; InfoPath.3; SV1; .NET CLR 3.1.76908; WOW64; en-US)', 16, '143220000/', null),
				array('143220000/16/browser/msie9.png', '143220000/16/os/win-3.png', 'Internet Explorer 9.0', 'Windows Vista x64'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 5.0; Trident/4.0; FBSMTWB; .NET CLR 2.0.34861; .NET CLR 3.0.3746.3218; .NET CLR 3.5.33652; msn OptimizedIE8;ENUS)', 24, '170780000/', null),
				array('170780000/24/browser/msie7.png', '170780000/24/os/win-1.png', 'Internet Explorer 8.0 (Compatibility Mode)', 'Windows 2000'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.2; .NET CLR 1.1.4322; .NET CLR 2.0.50727; InfoPath.2; .NET CLR 3.0.04506.30)', 16, '152240000/', null),
				array('152240000/16/browser/msie7.png', '152240000/16/os/win-2.png', 'Internet Explorer 7.0b', 'Windows Server 2003'),
			),
			array(
				array('Mozilla/4.0 (Mozilla/4.0; MSIE 7.0; Windows NT 5.1; FDM; SV1)', 24, null, null),
				array('img/24/browser/msie7.png', 'img/24/os/win-2.png', 'Internet Explorer 7.0', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1)', 16, null, null),
				array('img/16/browser/msie6.png', 'img/16/os/win-2.png', 'Internet Explorer 6.0', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible;MSIE 5.5; Windows 98)', 16, '5360000/', null),
				array('5360000/16/browser/msie4.png', '5360000/16/os/win-1.png', 'Internet Explorer 5.5', 'Windows 98'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.14; Mac_PowerPC)', 24, '41740000/', '.gif'),
				array('41740000/24/browser/msie4.gif', '41740000/24/os/mac-1.gif', 'Internet Explorer 5.14', 'Macintosh'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.05; Windows NT 3.51)', 24, null, null),
				array('img/24/browser/msie4.png', 'img/24/os/win-1.png', 'Internet Explorer 5.05', 'Windows NT 3.11'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.05; Windows NT 4.0)', 24, null, null),
				array('img/24/browser/msie4.png', 'img/24/os/win-1.png', 'Internet Explorer 5.05', 'Windows NT 4.0'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 4.01; Windows CE)', 16, '279530000/', null),
				array('279530000/16/browser/msie4.png', '279530000/16/os/win-2.png', 'Internet Explorer 4.01', 'Windows CE'),
			),
			array(
				array('Mozilla/5.0 (compatible, MSIE 11, Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', 16, '135880000/', null),
				array('135880000/16/browser/msie11.png', '135880000/16/os/win-5.png', 'Internet Explorer 11.0', 'Windows 8.1'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Macintosh; Intel Mac OS X 10_7_3; Trident/6.0)', 24, null, null),
				array('img/24/browser/msie10.png', 'img/24/os/mac-3.png', 'Internet Explorer 10.0', 'Mac OS X 10.7.3'),
			),
			array(
				array('Mozilla/6.0 (Future Star Technologies Corp. Star-Blade OS; U; en-US) iNet Browser 2.5', 16, null, '.gif'),
				array('img/16/browser/null.gif', 'img/16/browser/null.gif', 'iNet Browser 2.5', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0)', 16, '311520000/', '.gif'),
				array('311520000/16/browser/msie-mobile.gif', '311520000/16/os/wp7.gif', 'IEMobile 9.0', 'Windows Phone 7.5'),
			),
			array(
				array('HTC_Touch_3G Mozilla/4.0 (compatible; MSIE 6.0; Windows CE; IEMobile 7.11)', 16, '207800000/', '.gif'),
				array('207800000/16/browser/msie-mobile.gif', '207800000/16/device/htc.gif', 'IEMobile 7.11', 'HTC Touch'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.0; Trident/3.1; IEMobile/7.0; Nokia;N70)', 16, null, '.gif'),
				array('img/16/browser/msie-mobile.gif', 'img/16/device/nokia.gif', 'IEMobile 7.0', 'Nokia'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.9.0.7) Gecko/2009030814 Iceweasel Firefox/3.0.7 (Debian-3.0.7-1)', 16, '233310000/', '.gif'),
				array('233310000/16/browser/iceweasel.gif', '233310000/16/os/debian.gif', 'IceWeasel ', 'Debian GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux i686; rv:9.0a2) Gecko/20111104 Firefox/9.0a2 Iceweasel/9.0a2', 16, null, null),
				array('img/16/browser/iceweasel.png', 'img/16/os/linux.png', 'IceWeasel 9.0a2', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1.13) Gecko/20100916 Iceape/2.0.8', 24, '84500000/', '.gif'),
				array('84500000/24/browser/iceape.gif', '84500000/24/os/linux.gif', 'Iceape 2.0.8', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/533.21.1 (KHTML, like Gecko) iCab/4.8 Safari/533.16', 24, '288820000/', null),
				array('288820000/24/browser/icab.png', '288820000/24/os/mac-3.png', 'iCab 4.8', 'Mac OS X 10.6.8'),
			),
			array(
				array('iCab/4.5 (Macintosh; U; Mac OS X Leopard 10.5.8)', 24, '8680000/', '.gif'),
				array('8680000/24/browser/icab.gif', '8680000/24/os/mac-3.gif', 'iCab 4.5', 'Mac OS X Leopard 10.5.8'),
			),
			array(
				array('Mozilla/5.0 (compatible; IBrowse 3.0; AmigaOS4.0)', 16, null, '.gif'),
				array('img/16/browser/ibrowse.gif', 'img/16/os/amigaos.gif', 'IBrowse 3.0', 'AmigaOS'),
			),
			array(
				array('IBM WebExplorer /v0.94', 24, '157770000/', '.gif'),
				array('157770000/24/browser/ibmwebexplorer.gif', '157770000/24/browser/null.gif', 'IBM WebExplorer ', 'Unknown'),
			),
			array(
				array('HotJava/1.1.2 FCS', 24, '88640000/', null),
				array('88640000/24/browser/hotjava.png', '88640000/24/browser/null.png', 'HotJava 1.1.2', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/418.9 (KHTML, like Gecko) Hana/1.1', 24, '250960000/', '.gif'),
				array('250960000/24/browser/hana.gif', '250960000/24/os/mac-3.gif', 'Hana 1.1', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-us) AppleWebKit/146.1 (KHTML, like Gecko) osb-browser/0.5', 16, '105830000/', '.gif'),
				array('105830000/16/browser/null.gif', '105830000/16/os/linux.gif', 'Gtk+ WebCore 0.5', 'GNU/Linux'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; Trident/4.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.5.30729; InfoPath.2; .NET CLR 3.0.30729; GreenBrowser)', 24, '291520000/', '.gif'),
				array('291520000/24/browser/greenbrowser.gif', '291520000/24/os/win-3.gif', 'GreenBrowser ', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux ppc; en-US; rv:1.9a8) Gecko/2007100620 GranParadiso/3.1', 16, null, '.gif'),
				array('img/16/browser/firefoxdevpre.gif', 'img/16/os/linux.gif', 'GranParadiso 3.1', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0; chromeframe/13.0.782.215)', 16, null, '.gif'),
				array('img/16/browser/chrome.gif', 'img/16/os/win-4.gif', 'Google Chrome Frame 13.0.782.215', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; chromeframe; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; MAXTHON 2.0)', 16, '284380000/', '.gif'),
				array('284380000/16/browser/chrome.gif', '284380000/16/os/win-4.gif', 'Google Chrome Frame ', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36 Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.10', 24, null, null),
				array('img/24/browser/chrome.png', 'img/24/device/ipad.png', 'Google Chrome 34.0.1847.116', 'iPad iOS 3.2'),
			),
			array(
				array('Mozilla/5.0 (X11; CrOS i686 4319.74.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.57 Safari/537.36', 16, null, null),
				array('img/16/browser/chrome.png', 'img/16/os/chromeos.png', 'Google Chrome 29.0.1547.57', 'Google Chrome OS'),
			),
			array(
				array('Mozilla/5.0 (X11; NetBSD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 16, '302590000/', '.gif'),
				array('302590000/16/browser/chrome.gif', '302590000/16/os/netbsd.gif', 'Google Chrome 27.0.1453.116', 'NetBSD'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux i686) AppleWebKit/534.30 (KHTML, like Gecko) Slackware/Chrome/12.0.742.100 Safari/534.30', 16, null, null),
				array('img/16/browser/chrome.png', 'img/16/os/slackware.png', 'Google Chrome 12.0.742.100', 'Slackware'),
			),
			array(
				array('NokiaE66/GoBrowser/2.0.297', 24, '75450000/', '.gif'),
				array('75450000/24/browser/gobrowser.gif', '75450000/24/device/nokia.gif', 'GO Browser 2.0.297', 'Nokia E66'),
			),
			array(
				array('Nokia5800XpressMusic/GoBrowser/1.6.0.46', 16, null, '.gif'),
				array('img/16/browser/gobrowser.gif', 'img/16/device/nokia.gif', 'GO Browser 1.6.0.46', 'Nokia 5800'),
			),
			array(
				array('Mozilla/5.0 (Android 2.2; zh-cn; HTC Desire)/GoBrowser', 24, null, '.gif'),
				array('img/24/browser/gobrowser.gif', 'img/24/device/htc.gif', 'GO Browser ', 'HTC Desire'),
			),
			array(
				array('NokiaX6/GoBrowser', 24, '151150000/', '.gif'),
				array('151150000/24/browser/gobrowser.gif', '151150000/24/device/nokia.gif', 'GO Browser ', 'Nokia'),
			),
			array(
				array('NokiaN97_mini/GoBrowser', 24, '258260000/', null),
				array('258260000/24/browser/gobrowser.png', '258260000/24/device/nokia.png', 'GO Browser ', 'Nokia N97'),
			),
			array(
				array('NokiaC5-00/GoBrowser', 24, null, '.gif'),
				array('img/24/browser/gobrowser.gif', 'img/24/device/nokia.gif', 'GO Browser ', 'Nokia'),
			),
			array(
				array('Nokia6120c/GoBrowser', 16, '220950000/', '.gif'),
				array('220950000/16/browser/gobrowser.gif', '220950000/16/device/nokia.gif', 'GO Browser ', 'Nokia 6120'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; de; rv:1.9.2.13) Gecko/20101221 IceCat/3.6.13 (like Firefox/3.6.13) (Zenwalk GNU Linux)', 24, '194600000/', null),
				array('194600000/24/browser/icecat.png', '194600000/24/os/zenwalk.png', 'GNU IceCat 3.6.13', 'Zenwalk GNU Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.8) Gecko/20090327 Galeon/2.0.7', 24, null, '.gif'),
				array('img/24/browser/galeon.gif', 'img/24/os/linux.gif', 'Galeon 2.0.7', 'GNU/Linux'),
			),
			array(
				array('Galaxy/1.0 [en] (Mac OS X 10.5.6)', 24, null, null),
				array('img/24/browser/galaxy.png', 'img/24/os/mac-3.png', 'Galaxy 1.0', 'Mac OS X 10.5.6'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Flock/3.5.3.4628 Chrome/7.0.517.450 Safari/534.7', 24, null, null),
				array('img/24/browser/flock.png', 'img/24/os/mac-3.png', 'Flock 3.5.3.4628', 'Mac OS X 10.6.6'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Flock/3.5.2.4599 Chrome/7.0.517.442 Safari/534.7', 24, null, null),
				array('img/24/browser/flock.png', 'img/24/os/win-4.png', 'Flock 3.5.2.4599', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:2.0) Treco/20110515 Fireweb Navigator/2.4', 16, '112110000/', null),
				array('112110000/16/browser/firewebnavigator.png', '112110000/16/os/win-2.png', 'Fireweb Navigator 2.4', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:9.0a2) Gecko/20111101 Firefox/9.0a2', 24, null, null),
				array('img/24/browser/firefox.png', 'img/24/os/mac-3.png', 'Firefox 9.0a2', 'Mac OS X 10.6'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0', 24, null, '.gif'),
				array('img/24/browser/firefox.gif', 'img/24/os/win-5.gif', 'Firefox 36.0', 'Windows 8.1'),
			),
			array(
				array('Mozilla/5.0 (X11; U; DragonFly i386; de; rv:1.9.1b2) Gecko/20081201 Firefox/3.1b2', 16, '157180000/', null),
				array('157180000/16/browser/firefox.png', '157180000/16/os/dragonflybsd.png', 'Firefox 3.1b2', 'DragonFly BSD'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; tr-TR; rv:1.9.0) Gecko/2008061600 SUSE/3.0-1.2 Firefox/3.0', 24, '215320000/', null),
				array('215320000/24/browser/firefox.png', '215320000/24/os/suse.png', 'Firefox 3.0', 'openSUSE'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.0) Gecko/2008061600 SUSE/3.0-1.2 Firefox/3.0', 24, '125790000/', '.gif'),
				array('125790000/24/browser/firefox.gif', '125790000/24/os/suse.gif', 'Firefox 3.0', 'openSUSE x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; pl-PL; rv:1.9.0.5) Gecko/2008121622 Slackware/2.6.27-PiP Firefox/3.0', 16, null, '.gif'),
				array('img/16/browser/firefox.gif', 'img/16/os/slackware.gif', 'Firefox 3.0', 'Slackware'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.10) Gecko/20060410 Firefox/1.0.8 Mandriva/1.0.6-16.5.20060mdk (2006.0)', 16, '159690000/', null),
				array('159690000/16/browser/firefox.png', '159690000/16/os/mandriva.png', 'Firefox 1.0.8', 'Mandriva'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.5) Gecko/20041215 Firefox/1.0 Red Hat/1.0-12.EL4', 16, null, null),
				array('img/16/browser/firefox.png', 'img/16/os/red-hat.png', 'Firefox 1.0', 'Red Hat Enterprise Linux 4'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Gentoo Linux x86_64; pl-PL) Gecko Firefox', 24, null, '.gif'),
				array('img/24/browser/firefox.gif', 'img/24/os/gentoo.gif', 'Firefox ', 'Gentoo x64'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; x64; fr; rv:1.9.2.13) Gecko/20101203 Firebird/3.6.13', 16, null, null),
				array('img/16/browser/firebird.png', 'img/16/os/win-4.png', 'Firebird 3.6.13', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Android; Linux armv7l; rv:9.0) Gecko/20111216 Firefox/9.0 Fennec/9.0', 16, null, null),
				array('img/16/browser/fennec.png', 'img/16/os/android.png', 'Fennec 9.0', 'Android'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:7.0a1) Gecko/20110623 Firefox/7.0a1 Fennec/7.0a1', 24, null, null),
				array('img/24/browser/fennec.png', 'img/24/os/win-4.png', 'Fennec 7.0a1', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.23; Macintosh; PPC) Escape 5.1.8', 16, '153170000/', '.gif'),
				array('153170000/16/browser/espialtvbrowser.gif', '153170000/16/os/mac-1.gif', 'Escape 5.1.8', 'Macintosh'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Epiphany/2.30.6 Safari/534.7', 24, '188200000/', null),
				array('188200000/24/browser/epiphany.png', '188200000/24/os/linux.png', 'Epiphany 2.30.6', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-gb) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) epiphany-webkit', 16, null, null),
				array('img/16/browser/epiphany.png', 'img/16/os/linux.png', 'Epiphany ', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.9.0.13) Gecko/2009073022 EnigmaFox/3.0.13', 24, null, null),
				array('img/24/browser/null.png', 'img/24/os/win-3.png', 'EnigmaFox 3.0.13', 'Windows Vista'),
			),
			array(
				array('Enigma Browser', 16, '37490000/', '.gif'),
				array('37490000/16/browser/enigmabrowser.gif', '37490000/16/browser/null.gif', 'Enigma Browser ', 'Unknown'),
			),
			array(
				array('ELinks/0.9.3 (textmode; Linux 2.6.9-kanotix-8 i686; 127x41)', 16, null, null),
				array('img/16/browser/elinks.png', 'img/16/os/kanotix.png', 'Elinks 0.9.3', 'Kanotix'),
			),
			array(
				array('ELinks (0.11.3; Linux 2.6.23-gentoo-r6 i686; 128x48)', 24, '243420000/', null),
				array('243420000/24/browser/elinks.png', '243420000/24/os/gentoo.png', 'Elinks ', 'Gentoo'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533+ (KHTML, like Gecko) Element Browser 5.0', 16, null, '.gif'),
				array('img/16/browser/elementbrowser.gif', 'img/16/os/win-4.gif', 'Element Browser 5.0', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Mobile; Dorothy Browser; en-US) AppleWebKit/533.3 (KHTML, like Gecko) Version/3.1.2 Mobile Safari/533.3', 24, null, '.gif'),
				array('img/24/browser/dorothybrowser.gif', 'img/24/os/win-2.gif', 'Dorothy Browser', 'Windows'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows CE; Mobile; like Android; ko-kr) AppleWebKit/533.3 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.3 Dorothy', 16, null, '.gif'),
				array('img/16/browser/dorothybrowser.gif', 'img/16/os/android.gif', 'Dorothy ', 'Android'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows CE; Mobile; like iPhone; ko-kr) AppleWebKit/533.3 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.3 Dorothy', 16, '183110000/', '.gif'),
				array('183110000/16/browser/dorothybrowser.gif', '183110000/16/device/iphone.gif', 'Dorothy ', 'iPhone'),
			),
			array(
				array('Doris/1.15 [en] (Symbian)', 24, '145110000/', '.gif'),
				array('145110000/24/browser/doris.gif', '145110000/24/os/symbian.gif', 'Doris 1.15', 'SymbianOS'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/534.34 (KHTML, like Gecko) Dooble/1.40 Safari/534.34', 16, null, '.gif'),
				array('img/16/browser/dooble.gif', 'img/16/os/win-2.gif', 'Dooble 1.40', 'Windows XP'),
			),
			array(
				array('Dooble/0.07 (de_CH) WebKit', 24, null, null),
				array('img/24/browser/dooble.png', 'img/24/browser/null.png', 'Dooble 0.07', 'Unknown'),
			),
			array(
				array('Dillo/2.0', 16, '145360000/', '.gif'),
				array('145360000/16/browser/dillo.gif', '145360000/16/browser/null.gif', 'Dillo 2.0', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; pl-pl) AppleWebKit/312.8 (KHTML, like Gecko, Safari) DeskBrowse/1.0', 24, '256000000/', null),
				array('256000000/24/browser/deskbrowse.png', '256000000/24/os/mac-3.png', 'DeskBrowse 1.0', 'Mac OS X'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/4.0; Deepnet Explorer 1.5.3; Smart 2x2; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E)', 24, null, null),
				array('img/24/browser/deepnetexplorer.png', 'img/24/os/win-4.png', 'Deepnet Explorer 1.5.3', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Deepnet Explorer 1.5.3; Smart 2x2; .NET CLR 1.1.4322; InfoPath.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)', 16, null, null),
				array('img/16/browser/deepnetexplorer.png', 'img/16/os/win-2.png', 'Deepnet Explorer 1.5.3', 'Windows XP'),
			),
			array(
				array('Cyberdog/2.0 (Macintosh; PPC)', 24, null, null),
				array('img/24/browser/cyberdog.png', 'img/24/os/mac-1.png', 'Cyberdog 2.0', 'Macintosh'),
			),
			array(
				array('Cyberdog/2.0 (Macintosh; 68k)', 24, null, null),
				array('img/24/browser/cyberdog.png', 'img/24/os/mac-1.png', 'Cyberdog 2.0', 'Macintosh'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.0; SV1; Crazy Browser 9.0.04)', 16, null, '.gif'),
				array('img/16/browser/crazybrowser.gif', 'img/16/os/win-3.gif', 'Crazy Browser 9.0.04', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; Crazy Browser 3.1.0)', 16, '30800000/', null),
				array('30800000/16/browser/crazybrowser.png', '30800000/16/os/win-5.png', 'Crazy Browser 3.1.0', 'Windows 8'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; InfoPath.2; Crazy Browser 3.0.5)', 16, null, '.gif'),
				array('img/16/browser/crazybrowser.gif', 'img/16/os/win-2.gif', 'Crazy Browser 3.0.5', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 3.0.5) ; .NET CLR 3.0.04506.30; InfoPath.2; InfoPath.3; .NET CLR 1.1.4322; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727)', 24, null, '.gif'),
				array('img/24/browser/crazybrowser.gif', 'img/24/os/win-2.gif', 'Crazy Browser 3.0.5', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Q312461; Crazy Browser 1.0.5; .NET CLR 1.0.3705)', 16, '104670000/', '.gif'),
				array('104670000/16/browser/crazybrowser.gif', '104670000/16/os/win-1.gif', 'Crazy Browser 1.0.5', 'Windows 2000'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Q312461; Crazy Browser 1.0.5)', 16, '308680000/', '.gif'),
				array('308680000/16/browser/crazybrowser.gif', '308680000/16/os/win-2.gif', 'Crazy Browser 1.0.5', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Avant Browser [avantbrowser.com]; Crazy Browser 1.0.5)', 24, null, '.gif'),
				array('img/24/browser/crazybrowser.gif', 'img/24/os/win-2.gif', 'Crazy Browser .com', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1; rv:16.0) Gecko/20121010 conkeror/1.0pre', 16, '3970000/', '.gif'),
				array('3970000/16/browser/conkeror.gif', '3970000/16/os/win-4.gif', 'Conkeror 1.0pre', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux x86_64; rv:6.0.1) Gecko/20110831 conkeror/0.9.3', 24, '41240000/', '.gif'),
				array('41240000/24/browser/conkeror.gif', '41240000/24/os/linux.gif', 'Conkeror 0.9.3', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1.14) Gecko/20101020 Conkeror/0.9.2 (Debian-0.9.2+git100804-1)', 16, null, null),
				array('img/16/browser/conkeror.png', 'img/16/os/debian.png', 'Conkeror 0.9.2', 'Debian GNU/Linux x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2) AppleWebKit/535.7 (KHTML, like Gecko) Comodo_Dragon/16.1.1.0 Chrome/16.0.912.63 Safari/535.7', 24, null, '.gif'),
				array('img/24/browser/comodo-dragon.gif', 'img/24/os/win-5.gif', 'Comodo Dragon 16.1.1.0', 'Windows 8'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.0; it; rv:1.9.2.16) Gecko/20110325 Firefox/3.6.16 CometBird/3.6.16', 24, null, null),
				array('img/24/browser/cometbird.png', 'img/24/os/win-3.png', 'CometBird 3.6.16', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC; en-US; mimic; rv:9.3.0) Clecko/20120101 Classilla/CFM', 16, null, null),
				array('img/16/browser/classilla.png', 'img/16/os/mac-1.png', 'Classilla 9.3.0', 'Macintosh'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/534.14 (KHTML, like Gecko) Ubuntu/10.10 Chromium/9.0.600.0 Chrome/9.0.600.0 Safari/534.14', 24, null, null),
				array('img/24/browser/chromium.png', 'img/24/os/ubuntu-2.png', 'Chromium 9.0.600.0', 'Ubuntu 10.10 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.28.3 (KHTML, like Gecko) Version/3.2.3 ChromePlus/4.0.222.3 Chrome/4.0.222.3 Safari/525.28.3', 24, null, null),
				array('img/24/browser/chromeplus.png', 'img/24/os/win-2.png', 'ChromePlus 4.0.222.3', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US; rv:1.0.1) Gecko/20021111 Chimera/0.6', 24, '17400000/', null),
				array('17400000/24/browser/null.png', '17400000/24/os/mac-3.png', 'Chimera 0.6', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en) AppleWebKit/418.9 (KHTML, like Gecko, Safari) Cheshire/1.0.UNOFFICIAL', 16, null, null),
				array('img/16/browser/aol.png', 'img/16/os/mac-3.png', 'Cheshire 1.0.UNOFFICIAL', 'Mac OS X'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en) AppleWebKit/419 (KHTML, like Gecko, Safari/125) Cheshire/1.0.ALPHA', 16, '321620000/', '.gif'),
				array('321620000/16/browser/aol.gif', '321620000/16/os/mac-3.gif', 'Cheshire 1.0.ALPHA', 'Mac OS X'),
			),
			array(
				array('Mozilla/4.08 (Charon; Inferno)', 24, '254080000/', null),
				array('254080000/24/browser/null.png', '254080000/24/os/inferno.png', 'Charon ', 'Inferno'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.8; it; rv:1.93.26.2658) Gecko/20141026 Camino/2.176.223 (MultiLang) (like Firefox/3.64.2268)0', 16, '113630000/', null),
				array('113630000/16/browser/camino.png', '113630000/16/os/mac-3.png', 'Camino 2.176.223', 'Mac OS X 10.8'),
			),
			array(
				array('Bunjalloo/0.7.6(Nintendo DS;U;en)', 16, '250490000/', '.gif'),
				array('250490000/16/browser/bunjalloo.gif', '250490000/16/device/nintendods.gif', 'Bunjalloo 0.7.6', 'Nintendo DS'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 1.1.4322; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; Browzar)', 16, null, null),
				array('img/16/browser/browzar.png', 'img/16/os/win-2.png', 'Browzar ', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; nl; rv:1.8.1b2) Gecko/20060821 BonEcho/2.0b2 (Debian-1.99+2.0b2+dfsg-1)', 24, '186910000/', '.gif'),
				array('186910000/24/browser/firefoxdevpre.gif', '186910000/24/os/debian.gif', 'BonEcho 2.0b2', 'Debian GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; BOLT/2.340) AppleWebKit/530+ (KHTML, like Gecko) Version/4.0 Safari/530.17 UNTRUSTED/1.0 3gpp-gba', 16, '286870000/', null),
				array('286870000/16/browser/bolt.png', '286870000/16/os/win-2.png', 'Bolt 2.340', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows 95; PalmSource; Blazer 3.0) 16; 160x160', 24, '162120000/', null),
				array('162120000/24/browser/blazer.png', '162120000/24/device/palm.png', 'Blazer 3.0', 'Palm'),
			),
			array(
				array('Mozilla/5.0 (BlackBerry; U; BlackBerry 9900; en) AppleWebKit/534.11+ (KHTML, like Gecko) Version/7.1.0.346 Mobile Safari/534.11+', 24, null, null),
				array('img/24/browser/blackberry.png', 'img/24/device/blackberry.png', 'BlackBerry 9900', 'BlackBerry'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; WinNT; en; rv:1.0.2) Gecko/20030311 Beonex/0.8.2-stable', 16, '62710000/', '.gif'),
				array('62710000/16/browser/beonex.gif', '62710000/16/os/win-2.gif', 'Beonex 0.8.2', 'Windows'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', 16, null, '.gif'),
				array('img/16/browser/avantbrowser.gif', 'img/16/os/win-4.gif', 'Avant Browser ', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux; de-DE) AppleWebKit/527+ (KHTML, like Gecko, Safari/419.3) Arora/0.8.0', 16, '240690000/', '.gif'),
				array('240690000/16/browser/arora.gif', '240690000/16/os/linux.gif', 'Arora 0.8.0', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (X11; U; UNICOS lcLinux; en-US) Gecko/20140730 (KHTML, like Gecko, Safari/419.3) Arora/0.8.0', 16, '194270000/', '.gif'),
				array('194270000/16/browser/arora.gif', '194270000/16/os/linux.gif', 'Arora 0.8.0', 'GNU/Linux'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; AOL 9.7; AOLBuild 4343.27; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', 24, '150670000/', '.gif'),
				array('150670000/24/browser/aol.gif', '150670000/24/os/win-2.gif', 'AOL 9.7', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; AOL 7.0; Windows NT 5.0)', 24, null, null),
				array('img/24/browser/aol.png', 'img/24/os/win-1.png', 'AOL 7.0', 'Windows 2000'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; AOL 7.0; Windows 98; Win 9x 4.90; .NET CLR 1.1.4322)', 24, '261440000/', null),
				array('261440000/24/browser/aol.png', '261440000/24/os/win-1.png', 'AOL 7.0', 'Windows Me'),
			),
			array(
				array('Mozilla/5.0 (Android 2.2; Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.19.4 (KHTML, like Gecko) Version/5.0.3 Safari/533.19.4', 24, null, null),
				array('img/24/browser/android-webkit.png', 'img/24/os/android.png', 'Android Webkit 5.0.3', 'Android 2.2'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.3; ko-kr; LG-L160L Build/IML74K) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 24, '232640000/', '.gif'),
				array('232640000/24/browser/android-webkit.gif', '232640000/24/device/lg.gif', 'Android Webkit 4.0', 'LG L160L'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.3; de-ch; HTC Sensation Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 24, null, null),
				array('img/24/browser/android-webkit.png', 'img/24/device/htc.png', 'Android Webkit 4.0', 'HTC Sensation'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.3; en-us) AppleWebKit/999+ (KHTML, like Gecko) Safari/999.9', 16, null, null),
				array('img/16/browser/android-webkit.png', 'img/16/os/android.png', 'Android Webkit ', 'Android 2.3'),
			),
			array(
				array('AmigaVoyager/3.2 (AmigaOS/MC680x0)', 16, null, null),
				array('img/16/browser/amigavoyager.png', 'img/16/os/amigaos.png', 'Amiga Voyager 3.2', 'AmigaOS'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; America Online Browser 1.1; rev1.5; Windows NT 5.1; SV1; .NET CLR 1.1.4322; InfoPath.1)', 16, '205350000/', '.gif'),
				array('205350000/16/browser/aol.gif', '205350000/16/os/win-2.gif', 'America Online Browser 1.1', 'Windows XP'),
			),
			array(
				array('amaya/10 libwww/5.4.0', 24, null, null),
				array('img/24/browser/amaya.png', 'img/24/browser/null.png', 'Amaya 10', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; Acoo Browser 1.98.744; .NET CLR 3.5.30729)', 24, null, null),
				array('img/24/browser/acoobrowser.png', 'img/24/os/win-3.png', 'Acoo Browser 1.98.744', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (compatible; Teleca Q7; Brew 3.1.5; U; en) 480X800 LGE VX11000', 24, '202100000/', null),
				array('202100000/24/browser/obigo.png', '202100000/24/device/lg.png', 'Teleca Q7', 'LG VX11000'),
			), array(
				array('Mozilla/5.0 (Ubuntu; Mobile) WebKit/537.21', 16, null, '.gif'),
				array('img/16/browser/ubuntuwebbrowser.gif', 'img/16/device/ubuntutouch.gif', 'Ubuntu Web Browser', 'Ubuntu Phone'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; Acoo Browser 1.98.744; .NET CLR 3.5.30729)', 24, '119680000/', '.gif'),
				array('119680000/24/browser/acoobrowser.gif', '119680000/24/os/win-3.gif', 'Acoo Browser 1.98.744', 'Windows Vista'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; http://www.Abolimba.de; .NET CLR 1.1.4322)', 16, '280290000/', null),
				array('280290000/16/browser/abolimba.png', '280290000/16/os/win-2.png', 'Abolimba', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1 Alienforce/9.0.1', 24, null, null),
				array('img/24/browser/alienforce.png', 'img/24/os/win-5.png', 'Alienforce 9.0.1', 'Windows 8 x64'),
			),
			array(
				array('Amiga-AWeb/3.4.167SE', 16, null, '.gif'),
				array('img/16/browser/amiga-aweb.gif', 'img/16/browser/null.gif', 'Amiga AWeb 3.4.167SE', 'Unknown'),
			),
			array(
				array('BarcaPro/1.4.xxxx', 24, '123840000/', '.gif'),
				array('123840000/24/browser/barca.gif', '123840000/24/browser/null.gif', 'Barca Pro 1.4.xxxx', 'Unknown'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; SIMBARCA5238C3-B76C-4BCE-8B03-0CE1EA1E621D; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', 16, null, null),
				array('img/16/browser/barca.png', 'img/16/os/win-2.png', 'Barca 5238C3', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML like Gecko) Chrome/32.0.1700.77 Beamrise/32.2.1700.77 Safari/537.36', 16, null, null),
				array('img/16/browser/beamrise.png', 'img/16/os/win-5.png', 'Beamrise 32.2.1700.77', 'Windows 8'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.122 BIDUBrowser/7.0 Safari/537.36', 24, '168760000/', null),
				array('168760000/24/browser/bidubrowser.png', '168760000/24/os/win-2.png', 'Baidu Browser 7.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.1.1; ar-eg; BlackBird I9000 Build/IMM76D) AppleWebKit/534.30 (KHTML like Gecko) Version/4.0 Mobile Safari/534.30', 16, '316970000/', '.gif'),
				array('316970000/16/browser/blackbird.gif', '316970000/16/os/android.gif', 'Blackbird I9000', 'Android 4.1.1'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.3 (KHTML like Gecko) BlackHawk/1.0.195.0 Chrome/127.0.0.1 Safari/52916320.534', 16, null, null),
				array('img/16/browser/blackhawk.png', 'img/16/os/win-4.png', 'BlackHawk 1.0.195.0', 'Windows 7'),
			),
			array(
				array('Mozilla/4.61 [en] (X11; U; ) - BrowseX (2.0.0 Windows)', 24, '160290000/', null),
				array('160290000/24/browser/browsex.png', '160290000/24/os/win-2.png', 'BrowseX', 'Windows'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Coast/1.0.2.62956 Mobile/10B329 Safari/7534.48.3', 16, null, '.gif'),
				array('img/16/browser/coast.gif', 'img/16/device/ipad.gif', 'Coast 1.0.2.62956', 'iPad iOS 6.1.3'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/534.34 (KHTML like Gecko) Columbus/1.5.0.0 Safari/534.34', 24, null, '.gif'),
				array('img/24/browser/columbus.gif', 'img/24/os/win-5.gif', 'Columbus 1.5.0.0', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML like Gecko) coccocbrowser/42.0 CoRom/36.0.1985.149 Chrome/36.0.1985.149 Safari/537.36', 24, null, null),
				array('img/24/browser/corom.png', 'img/24/os/win-5.png', 'CoRom 36.0.1985.149', 'Windows 8.1'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.3; en-us; Transformer Prime TF201 Build/IML74K) AppleWebKit/535.7 (KHTML, like Gecko) CrMo/16.0.912.75 Safari/535.7', 24, '80220000/', '.gif'),
				array('80220000/24/browser/chrome.gif', '80220000/24/os/android.gif', 'Chrome Mobile 16.0.912.75', 'Android 4.0.3'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.3.7; en-gb; E15i Build/4.0.1.A.0.283; GingerCruzt) AppleWebKit/533.1 (KHTML like Gecko) Version/4.0 Mobile Safari/533.1', 16, '284950000/', null),
				array('284950000/16/browser/cruz.png', '284950000/16/os/android.png', 'Cruz t', 'Android 2.3.7'),
			),
			array(
				array('Mozilla/4.0 (compatible; DPlus 0.5a)', 24, null, '.gif'),
				array('img/24/browser/dillo.gif', 'img/24/browser/null.gif', 'D+ 0.5a', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 1056; en-us) AppleWebKit/525.27.1 (KHTML like Gecko) Demeter/1.0.9 Safari/125', 24, null, null),
				array('img/24/browser/demeter.png', 'img/24/os/mac-3.png', 'Demeter 1.0.9', 'Mac OS X 1056'),
			),
			array(
				array('Mozilla/3.01 (compatible; Netbox/3.5 R92; Linux 2.2)', 24, null, '.gif'),
				array('img/24/browser/netbox.gif', 'img/24/os/linux.gif', 'NetBox 3.5', 'GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.3a5) Gecko/20100610 MozillaDeveloperPreview/3.7a5', 24, null, '.gif'),
				array('img/24/browser/firefoxdevpre.gif', 'img/24/os/win-3.gif', 'Mozilla Developer Preview 3.7a5', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.20) Gecko/20081217 Firefox/2.0.0.20 Novarra-Vision/8.0', 24, null, null),
				array('img/24/browser/novarra.png', 'img/24/os/nova.png', 'Novarra Vision 8.0', 'Nova'),
			),
			array(
				array('Mozilla/4.7 (compatible; OffByOne; Windows )', 24, null, null),
				array('img/24/browser/offbyone.png', 'img/24/os/win-2.png', 'Off By One', 'Windows'),
			),
			array(
				array('OneBrowser/4.2.0/Adr(Linux; U; Android 4.1.2; cs-cz; C2105 Build/15.0.A.1.31) AppleWebKit/533.1 (KHTML, like Gecko) Mobile Safari/533.1', 16, null, '.gif'),
				array('img/16/browser/onebrowser.gif', 'img/16/os/android.gif', 'OneBrowser 4.2.0', 'Android 4.1.2'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.76 Safari/537.36 OPR/19.0.1326.39 (Edition Next)', 16, null, '.gif'),
				array('img/16/browser/opera-next.gif', 'img/16/os/mac-3.gif', 'Opera Next 19.0.1326.39', 'Mac OS X 10.9.1'),
			),
			array(
				array('Mozilla/5.0 (compatible; Origyn Web Browser; AmigaOS 4.1; PPC; U) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+)', 24, '285990000/', null),
				array('285990000/24/browser/owb.png', '285990000/24/os/amigaos.png', 'Oregano Web Browser', 'AmigaOS 4.1'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.4.3; Amazon Otter Build/KTU84M) AppleWebKit/537.36 (KHTML like Gecko) Version/4.0 Chrome/33.0.0.0 Safari/537.36', 24, '298950000/', '.gif'),
				array('298950000/24/browser/otter.gif', '298950000/24/os/android.gif', 'Otter Build', 'Android 4.4.3'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; cs-CZ) AppleWebKit/533.3 (KHTML, like Gecko) SlimBoat/1.0.8 Version/5.1 Safari/533.3', 24, '308910000/', '.gif'),
				array('308910000/24/browser/slimboat.gif', '308910000/24/os/win-4.gif', 'SlimBoat 1.0.8', 'Windows 7'),
			),
			array(
				array('KDDI-KC31 UP.Browser/6.2.0.5 (GUI) MMP/2.0', 16, null, '.gif'),
				array('img/16/browser/openwave.gif', 'img/16/browser/null.gif', 'Openwave Mobile Browser 6.2.0.5', 'Unknown'),
			),
			array(
				array('HTC-ST7377/1.59.502.3 (67150) Opera/9.50 (Windows NT 5.1; U; en) UP.Link/6.3.1.17.0', 16, null, null),
				array('img/16/browser/openwave.png', 'img/16/device/htc.png', 'Openwave Mobile Browser 6.3.1.17.0', 'HTC ST7377'),
			),
			array(
				array('Mozilla/5.0 (X11; Linux x86_64; rv:2.0) Gecko/20110318 WebianShell/0.', 24, '91590000/', '.gif'),
				array('91590000/24/browser/webianshell.gif', '91590000/24/os/linux.gif', 'Webian Shell 0.', 'GNU/Linux x64'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 1.7; GTB6.6; TencentTraveler 4.0; SLCC1; .NET CLR 2.0.50727; InfoPath.2; .NET CLR 3.5.30729; .NET CLR 3.0.30729)', 16, '126360000/', null),
				array('126360000/16/browser/tencenttraveler.png', '126360000/16/os/win-3.png', 'Tencent Traveler 4.0', 'Windows Vista'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Tjusig 2.40.164; Avant Browser; .NET CLR 1.1.4322; .NET CLR 2.0.50727)', 24, '211700000/', '.gif'),
				array('211700000/24/browser/tjusig.gif', '211700000/24/os/win-1.gif', 'Tjusig 2.40.164', 'Windows 98'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Tizen 2.0; en-us) AppleWebKit/537.1 (KHTML, like Gecko) Mobile TizenBrowser/2.0', 16, '171750000/', null),
				array('171750000/16/browser/tizen.png', '171750000/16/os/linux.png', 'Tizen 2.0', 'GNU/Linux'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; AspTear 1.5)', 16, null, null),
				array('img/16/browser/tear.png', 'img/16/os/win-1.png', 'Tear', 'Windows 2000'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.9) Gecko/20071110 Sylera/3.0.20 SeaMonkey/1.1.6', 24, null, '.gif'),
				array('img/24/browser/null.gif', 'img/24/os/win-4.gif', 'Sylera 3.0.20', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2) AppleWebKit/534.34 (KHTML like Gecko) SlimBoat/1.1.53 Chrome/25.0.1364.97 Version/5.1 Safari/534.34', 16, '100440000/', '.gif'),
				array('100440000/16/browser/slimboat.gif', '100440000/16/os/win-5.gif', 'SlimBoat 1.1.53', 'Windows 8'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-us; Silk/1.0.13.81_10003810) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16 Silk-Accelerated=true', 24, null, '.gif'),
				array('img/24/browser/silk.gif', 'img/24/os/mac-3.gif', 'Amazon Silk 1.0.13.81', 'Mac OS X 10.6.3'),
			),
			array(
				array('DoCoMo/2.0 F2051(c100;TD)', 24, null, null),
				array('img/24/browser/null.png', 'img/24/browser/null.png', 'DoCoMo 2.0', 'Unknown'),
			),
			array(
				array('DocZilla/1.0 (Windows; U; WinNT4.0; en-US; rv:1.0.0)', 16, '193880000/', null),
				array('193880000/16/browser/doczilla.png', '193880000/16/os/win-1.png', 'DocZilla 1.0', 'Windows NT 4.0'),
			),
			array(
				array('Mozilla/5.0 (iPad; CPU OS 613 like Mac OS X) AppleWebKit/536.26 (KHTML like Gecko) Mobile/10B329 Safari/6533.18.5 SecuredBrowser/jp.co.obayashi.clomosecuredbrowser', 16, null, '.gif'),
				array('img/16/browser/edbrowse.gif', 'img/16/device/ipad.gif', 'Edbrowse r', 'iPad iOS 613'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X 1095) AppleWebKit/537.36 (KHTML like Gecko) Chrome/34.0.1771.0 Safari/537.36 Epic', 16, null, '.gif'),
				array('img/16/browser/epicbrowser.gif', 'img/16/os/mac-3.gif', 'Epic ', 'Mac OS X 1095'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_1; nl-nl) AppleWebKit/532.3+ (KHTML, like Gecko) Fluid/0.9.6 Safari/532.3+', 16, null, '.gif'),
				array('img/16/browser/fluid.gif', 'img/16/os/mac-3.gif', 'Fluid 0.9.6', 'Mac OS X 10.6.1'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.10) Gecko/20100923 Firefox/3.6.10 compat GlobalMojo/2.0.7 GlobalMojoExt/2.0.7', 16, null, '.gif'),
				array('img/16/browser/globalmojo.gif', 'img/16/os/win-4.gif', 'GlobalMojo 2.0.7', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; GTB7.5; GOSURF; Foxy/1; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30618)', 24, null, null),
				array('img/24/browser/gosurf.png', 'img/24/os/win-3.png', 'GoSurf ', 'Windows Vista'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; en-us ; HV3 Build/JDQ39) AppleWebKit/533.1 (KHTML like Gecko) Version/4.0 Mobile Safari/533.1/UCBrowser/8.6.1.262/145/355', 16, null, '.gif'),
				array('img/16/browser/hv3.gif', 'img/16/os/android.gif', 'Hv3 Build', 'Android 4.2.2'),
			),
			array(
				array('Mozilla/5.0 (Java 1.6.0_01; Windows XP 5.1 x86; en) ICEbrowser/v6_1_2', 24, '313100000/', null),
				array('313100000/24/browser/icebrowser.png', '313100000/24/os/win-2.png', 'IceBrowser v6', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (iPhone; CPU iPhone OS 712 like Mac OS X) AppleWebKit/537.51.2 (KHTML like Gecko) Mobile/11D257 FBAN/FBIOS;FBAV/14.0.0.25.26;FBBV/4017285;FBDV/iPhone61;FBMD/iPhone;FBSN/iPhone OS;FBSV/7.1.2;FBSS/2; FBCR/Strata;FBID/phone;FBLC/enUS;FBOP/5', 16, '288650000/', null),
				array('288650000/16/browser/kirix-strata.png', '288650000/16/device/iphone.png', 'Kirix Strata ', 'iPhone iOS 712'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/31.0.1650.63 Safari/537.36', 16, '80810000/', null),
				array('80810000/16/browser/chrome.png', '80810000/16/os/win-5.png', 'Google Chrome 31.0.1650.63', 'Windows 8 x64'),
			),
			array(
				array('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; LEGALBROWSER)', 16, null, '.gif'),
				array('img/16/browser/lbrowser.gif', 'img/16/os/win-4.gif', 'LBrowser ', 'Windows 7 x64'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; cs; rv:1.9.2.6) Gecko/20100628 myibrow/4alpha2', 24, '71800000/', null),
				array('71800000/24/browser/my-internet-browser.png', '71800000/24/os/win-4.png', 'myibrow 4alpha2', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; ru-RU) AppleWebKit/533.3 (KHTML like Gecko) InternetSurfboard/0.4 Safari/533.3', 16, null, null),
				array('img/16/browser/internetsurfboard.png', 'img/16/os/win-4.png', 'InternetSurfboard 0.4', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (X11; U; Linux i686; en-US; SkipStone 0.8.3) Gecko/20020615 Debian/1.0.0-3', 16, '25400000/', '.gif'),
				array('25400000/16/browser/skipstone.gif', '25400000/16/os/debian.gif', 'SkipStone 0.8.3', 'Debian GNU/Linux'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 5.1; cs; rv:1.9.0.5) Gecko/2009021916 Songbird/1.1.2 (20090331142126)', 24, '197230000/', '.gif'),
				array('197230000/24/browser/songbird.gif', '197230000/24/os/win-2.gif', 'Songbird 1.1.2', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.12 (KHTML, like Gecko) Chrome/9.0.571.0 Safari/534.12 ZipZap 3.1', 24, '135930000/', null),
				array('135930000/24/browser/zipzap.png', '135930000/24/os/win-4.png', 'ZipZap 3.1', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; UltraBrowser 11.0; BTRS123574; InfoPath.2)', 24, '300570000/', null),
				array('300570000/24/browser/ultrabrowser.png', '300570000/24/os/win-2.png', 'UltraBrowser 11.0', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (en-us) AppleWebKit/537.36(KHTML like Gecko; Google-Adwords-DisplayAds-WebRender;) Chrome/27.0.1453Safari/537.36', 16, '107680000/', null),
				array('107680000/16/browser/webrender.png', '107680000/16/browser/null.png', 'Webrender', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; U; Intel Mac OS X 1067; it-it) AppleWebKit/533.20.25 (KHTML like Gecko) Mozilla/5.0 (Macintosh; U; Intel Mac OS X 1067; en) AppleWebKit/533.20.25 (KHTML like Gecko) "wKiosk for Mac"', 24, '227610000/', null),
				array('227610000/24/browser/wkiosk.png', '227610000/24/os/mac-3.png', 'wKiosk', 'Mac OS X 1067'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/534.34 (KHTML, like Gecko) Qt/4.8.2 Ryouko/1.2.4 Safari/534.34', 16, null, null),
				array('img/16/browser/ryouko.png', 'img/16/os/win-2.png', 'Ryouko 1.2.4', 'Windows XP'),
			),
			array(
				array('Mozilla/5.0 (Macintosh; Intel Mac OS X) AppleWebKit/534.34 (KHTML, like Gecko) QupZilla/1.4.3 Safari/534.34', 16, null, '.gif'),
				array('img/16/browser/qupzilla.gif', 'img/16/os/mac-3.gif', 'QupZilla 1.4.3', 'Mac OS X'),
			),
			array(
				array('Podkicker/1.0.3 Android/4.0.4', 16, null, null),
				array('img/16/browser/podkicker.png', 'img/16/os/android.png', 'Podkicker 1.0.3', 'Android 4.0.4'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; PhaseOut-www.phaseout.net)', 24, null, '.gif'),
				array('img/24/browser/phaseout.gif', 'img/24/os/win-2.gif', 'Phaseout', 'Windows XP'),
			),
			array(
				array('Mozilla/4.0 (BREW 3.1.5; U; en-us; Samsung; SPH_M330; POLARIS/6.1/WAP) MMP/2.0 Configuration/CLDC-1.1 Novarra-Vision/8.0', 16, '306130000/', '.gif'),
				array('306130000/16/browser/polaris.gif', '306130000/16/device/samsung.gif', 'Polaris 6.1', 'Samsung'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; cs-CZ) AppleWebKit/533.3 (KHTML, like Gecko) Patriott::Browser/1.0.0 Safari/533.3', 16, '276860000/', '.gif'),
				array('276860000/16/browser/patriott.gif', '276860000/16/os/win-4.gif', 'Patriott Browser 1.0.0', 'Windows 7'),
			),
			array(
				array('Mozilla/5.0 (Windows; U; Windows NT 6.1; fa-IR) AppleWebKit/532.4 (KHTML like Gecko) Usejump/0.10.4 Safari/532.4', 24, '66030000/', null),
				array('66030000/24/browser/usejump.png', '66030000/24/os/win-4.png', 'Usejump 0.10.4', 'Windows 7'),
			),
			array(
				array('Xiino/1.0.9E [en] (v. 3.5.2H6.0; 153x130; c8)', 24, '266900000/', null),
				array('266900000/24/browser/null.png', '266900000/24/browser/null.png', 'Xiino 1.0.9E', 'Unknown'),
			),
			array(
				array('X-Smiles/1.2-20081113', 24, null, '.gif'),
				array('img/24/browser/x-smiles.gif', 'img/24/browser/null.gif', 'X-Smiles 1.2', 'Unknown'),
			),
			array(
				array('Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.34 (KHTML, like Gecko) zBrowser/NigtSky-0.0.2 Safari/534.34', 16, '115310000/', null),
				array('115310000/16/browser/zbrowser.png', '115310000/16/os/win-4.png', 'zBrowser NigtSky', 'Windows 7'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 6.0; Windows CE; Opera/9.5) Alltel HTC Touch Pro', 24, null, '.gif'),
				array('img/24/browser/opera-1.gif', 'img/24/device/htc.gif', 'Opera 9.5', 'HTC Touch Pro'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.2.2; de-de; Dell Streak Build/FRG83G) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 24, null, null),
				array('img/24/browser/android-webkit.png', 'img/24/device/dell.png', 'Android Webkit 4.0', 'Dell Streak'),
			),
			array(
				array('Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.5; Trident/3.1; IEMobile/7.0; DELL; Venue Pro)', 24, '114620000/', null),
				array('114620000/24/browser/msie-mobile.png', '114620000/24/device/dell.png', 'IEMobile 7.0', 'Dell'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.0.3; de-ch; HTC Sensation Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 16, null, '.gif'),
				array('img/16/browser/android-webkit.gif', 'img/16/device/htc.gif', 'Android Webkit 4.0', 'HTC Sensation'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.2; fr-lu; HTC Legend Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 24, null, '.gif'),
				array('img/24/browser/android-webkit.gif', 'img/24/device/htc.gif', 'Android Webkit 4.0', 'HTC Legend'),
			),
			array(
				array('UA: Mozilla/5.0 (Linux; U; Android 1.6; es-es; HTC Tattoo 1.67.164.9 Build/DRC79) AppleWebKit/528.5+ (KHTML, like Gecko) Version/3.1.2 Mobile Safari/525.20.1', 24, null, '.gif'),
				array('img/24/browser/android-webkit.gif', 'img/24/device/htc.gif', 'Android Webkit 3.1.2', 'HTC Tattoo'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.2; xx-xx; lepad_001b Build/PQXU100.4.0097.042211) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 24, null, '.gif'),
				array('img/24/browser/android-webkit.gif', 'img/24/device/lenovo.gif', 'Android Webkit 4.0', 'Lenovo LePad'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.2; en-us; DROID2 GLOBAL Build/S273) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1', 24, null, '.gif'),
				array('img/24/browser/android-webkit.gif', 'img/24/device/motorola.gif', 'Android Webkit 4.0', 'Motorola Droid'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13', 16, '143690000/', '.gif'),
				array('143690000/16/browser/android-webkit.gif', '143690000/16/device/motorola.gif', 'Android Webkit 4.0', 'Motorola Xoom'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 2.1-update1; en-us; Milestone XT720 Build/STR_U2_01.18.2) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17', 16, null, null),
				array('img/16/browser/android-webkit.png', 'img/16/device/motorola.png', 'Android Webkit 4.0', 'Motorola XT720'),
			),
			array(
				array('Opera/9.50 (Nintendo DSi; Opera/483; U; en-US)', 24, '246700000/', '.gif'),
				array('246700000/24/browser/opera-1.gif', '246700000/24/device/nintendodsi.gif', 'Opera 9.50', 'Nintendo DSi'),
			),
			array(
				array('Mozilla/5.0 (Nintendo WiiU) AppleWebKit/534.52 (KHTML, like Gecko) NX/2.1.0.8.23 NintendoBrowser/1.1.0.7579.EU', 24, '193970000/', null),
				array('193970000/24/browser/mozilla.png', '193970000/24/device/nintendowiiu.png', 'Mozilla Compatible', 'Nintendo Wii U'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.1; xx-xx; ONDA MID Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', 16, null, null),
				array('img/16/browser/android-webkit.png', 'img/16/device/onda.png', 'Android Webkit 4.0', 'Onda'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-CN; OPPO R833T Build/baijiazai) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 UCBrowser/9.9.5.489 U3/0.8.0 Mobile Safari/533.1', 24, '313450000/', null),
				array('313450000/24/browser/ucbrowser.png', '313450000/24/device/oppo.png', 'UC Browser 9.9.5.489', 'OPPO'),
			),
			array(
				array('Mozilla/5.0 (webOS/1.3.5.1; U; xx-xx) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/1.0 Safari/525.27.1 Pixi/1.1', 16, '50130000/', '.gif'),
				array('50130000/16/browser/safari.gif', '50130000/16/device/palm.gif', 'Safari 1.0', 'Palm Pixi'),
			),
			array(
				array('Mozilla/5.0 (webOS/1.0; U; en-US) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/1.0 Safari/525.27.1 Pre/1.0', 16, '56000000/', null),
				array('56000000/16/browser/palmpre.png', '56000000/16/device/palm.png', 'Palm Pre 1.0', 'Palm Pre'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.2.2; zh-CN; Coolpad 8670 Build/JDQ39) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 UCBrowser/9.9.2.467 U3/0.8.0 Mobile Safari/533.1', 24, null, '.gif'),
				array('img/24/browser/ucbrowser.gif', 'img/24/device/coolpad.gif', 'UC Browser 9.9.2.467', 'CoolPad 8670'),
			),
			array(
				array('CoolPad8736_CMCC_TD/1.0 Linux/3.0.8 Android/4.2 Release/6.25.2013 Browser/AppleWebkit534.30', 24, '4730000/', '.gif'),
				array('4730000/24/browser/android-webkit.gif', '4730000/24/device/coolpad.gif', 'Android Webkit ', 'CoolPad 8736'),
			),
			array(
				array('Mozilla/5.0 (Ubuntu; Tablet) WebKit/537.21', 24, '268630000/', '.gif'),
				array('268630000/24/browser/ubuntuwebbrowser.gif', '268630000/24/device/ubuntutouch.gif', 'Ubuntu Web Browser', 'Ubuntu Tablet'),
			),
			array(
				array('UCWEB/2.0 (Linux; U; Android 4.2.1; zh-CN; vivo X3t) U2/1.0.0 UCBrowser/9.9.4.484 U2/1.0.0 Mobile', 16, '74490000/', null),
				array('74490000/16/browser/ucbrowser.png', '74490000/16/device/vivo.png', 'UC Browser 9.9.4.484', 'vivo X3t'),
			),
			array(
				array('Mozilla/5.0 (Linux; U; Android 4.3; zh-cn; vivo X3L Build/JLS36C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 16, '54610000/', '.gif'),
				array('54610000/16/browser/android-webkit.gif', '54610000/16/device/vivo.gif', 'Android Webkit 4.0', 'vivo X3L'),
			),
			array(
				array('HUAWEI_P6-T00_TD/5.0 Android/4.2.2 (Linux; U; Android 4.2.2; zh-cn) Release/03.20.2013 Browser/WAP2.0 (AppleWebKit/534.30) Mobile Safari/534.30', 24, null, null),
				array('img/24/browser/android-webkit.png', 'img/24/device/huawei.png', 'Android Webkit ', 'Huawei P6'),
			),
			array(
				array('Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19', 16, null, '.gif'),
				array('img/16/browser/chrome.gif', 'img/16/device/samsung.gif', 'Google Chrome 18.0.1025.133', 'Galaxy Nexus'),
			),
			array(
				array('Mozilla/5.0 (SmartHub; SMART-TV; U; Linux/SmartTV) AppleWebKit/531.2+ (KHTML, like Gecko) WebBrowser/1.0 SmartTV Safari/531.2+', 24, '233470000/', '.gif'),
				array('233470000/24/browser/maplebrowser.gif', '233470000/24/device/samsung.gif', 'Maple Browser 1.0', 'Samsung Smart TV'),
			),
			array(
				array('Mozilla/5.0 (SMART-TV; X11; Linux i686) AppleWebKit/535.20+ (KHTML, like Gecko) Version/5.0 Safari/535.20+', 24, null, '.gif'),
				array('img/24/browser/safari.gif', 'img/24/device/samsung.gif', 'Safari 5.0', 'Samsung Smart TV'),
			),
			array(
				array('Mozilla/5.0 (PlayStation Vita 1.50) AppleWebKit/531.22.8 (KHTML, like Gecko) Silk/3.2', 24, '186210000/', '.gif'),
				array('186210000/24/browser/silk.gif', '186210000/24/device/playstation.gif', 'Amazon Silk 3.2', 'PlayStation Vita'),
			),
			array(
				array('PSP (PlayStation Portable); 2.00', 24, '234250000/', '.gif'),
				array('234250000/24/browser/null.gif', '234250000/24/device/playstation.gif', 'Unknown', 'PlayStation Portable'),
			),
			array(
				array('Mozilla/4.0 (PSP (PlayStation Portable); 2.00)', 24, null, null),
				array('img/24/browser/mozilla.png', 'img/24/device/playstation.png', 'Mozilla Compatible', 'PlayStation Portable'),
			),
			array(
				array('Mozilla/5.0 (PlayStation 4 1.51) AppleWebKit/536.26 (KHTML, like Gecko)', 16, '255380000/', null),
				array('255380000/16/browser/webkit.png', '255380000/16/device/playstation.png', 'PS4 Web Browser', 'PlayStation 4'),
			),
		);

		foreach ($testList as $list) {
			$original = $list[0];
			$result = $list[1];
			$useragent = UserAgentFactory::analyze($original[0], $original[1], $original[2], $original[3]);
			echo 'Test: ' . $useragent->useragent . "\n";
			$this->assertEquals($useragent->browser['image'], $result[0]);
			$this->assertEquals($useragent->platform['image'], $result[1]);
			$this->assertEquals($useragent->browser['title'], $result[2]);
			$this->assertEquals($useragent->platform['title'], $result[3]);
		}
	}
}