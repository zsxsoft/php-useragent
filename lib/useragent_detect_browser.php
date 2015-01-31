<?php
/**
 * Detect Web Browsers
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
 * Detect Web Browsers
 */

class useragent_detect_browser {

	public static function analyze($useragent) {
		$link = '';
		$title = '';
		$code = '';

		$web_browser = '';
		$mobile = 0;
		if (preg_match('/115Browser/i', $useragent)) {
			$link = "http://ie.114la.com/";
			$title = self::detect_browser_version("115Browser", $useragent);
			$code = "114browser";
		} elseif (preg_match('/2345Explorer/i', $useragent)) {
			$link = "http://ie.2345.com/";
			$title = self::detect_browser_version("2345Explorer", $useragent);
			$code = "2345explorer";
		} elseif (preg_match('/2345chrome/i', $useragent)) {
			$link = "http://chrome.2345.com/";
			$title = self::detect_browser_version("2345Chrome", $useragent);
			$code = "2345chrome";
		} elseif (preg_match('/360se|360ee/i', $useragent)) {
			$link = "http://se.360.cn/";
			$title = "360 Explorer";
			$code = "360se";
		} elseif (preg_match('/360\ aphone\ browser/i', $useragent)) {
			$link = "http://mse.360.cn/index.html";
			$title = "360 Aphone Browser";
			$code = "360se";
		} elseif (preg_match('/Abolimba/i', $useragent)) {
			$link = "http://www.aborange.de/products/freeware/abolimba-multibrowser.php";
			$title = "Abolimba";
			$code = "abolimba";
		} elseif (preg_match('/Acoo\ Browser/i', $useragent)) {
			$link = "http://www.acoobrowser.com/";
			$title = "Acoo " . self::detect_browser_version("Browser", $useragent);
			$code = "acoobrowser";
		} elseif (preg_match('/Alienforce/i', $useragent)) {
			$link = "http://sourceforge.net/projects/alienforce/";
			$title = self::detect_browser_version("Alienforce", $useragent);
			$code = "alienforce";
		} elseif (preg_match('/Amaya/i', $useragent)) {
			$link = "http://www.w3.org/Amaya/";
			$title = self::detect_browser_version("Amaya", $useragent);
			$code = "amaya";
		} elseif (preg_match('/Amiga-AWeb/i', $useragent)) {
			$link = "http://aweb.sunsite.dk/";
			$title = "Amiga " . self::detect_browser_version("AWeb", $useragent);
			$code = "amiga-aweb";
		} elseif (preg_match('/MRCHROME/i', $useragent)) {
			$link = "http://amigo.mail.ru/";
			$title = "Amigo";
			$code = "amigo";
		} elseif (preg_match('/America\ Online\ Browser/i', $useragent)) {
			$link = "http://downloads.channel.aol.com/browser";
			$title = "America Online " . self::detect_browser_version("Browser", $useragent);
			$code = "aol";
		} elseif (preg_match('/AmigaVoyager/i', $useragent)) {
			$link = "http://v3.vapor.com/voyager/";
			$title = "Amiga " . self::detect_browser_version("Voyager", $useragent);
			$code = "amigavoyager";
		} elseif (preg_match('/AOL/i', $useragent)) {
			$link = "http://downloads.channel.aol.com/browser";
			$title = self::detect_browser_version("AOL", $useragent);
			$code = "aol";
		} elseif (preg_match('/Arora/i', $useragent)) {
			$link = "http://code.google.com/p/arora/";
			$title = self::detect_browser_version("Arora", $useragent);
			$code = "arora";
		} elseif (preg_match('/AtomicBrowser/i', $useragent)) {
			$link = "http://www.atomicwebbrowser.com/";
			$title = self::detect_browser_version("AtomicBrowser", $useragent);
			$code = "atomicwebbrowser";
		} elseif (preg_match('/BarcaPro/i', $useragent)) {
			$link = "http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27";
			$title = self::detect_browser_version("BarcaPro", $useragent);
			$code = "barca";
		} elseif (preg_match('/Barca/i', $useragent)) {
			$link = "http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27";
			$title = self::detect_browser_version("Barca", $useragent);
			$code = "barca";
		} elseif (preg_match('/Beamrise/i', $useragent)) {
			$link = "http://www.beamrise.com/";
			$title = self::detect_browser_version("Beamrise", $useragent);
			$code = "beamrise";
		} elseif (preg_match('/Beonex/i', $useragent)) {
			$link = "http://www.beonex.com/";
			$title = self::detect_browser_version("Beonex", $useragent);
			$code = "beonex";
		} elseif (preg_match('/BA?IDUBrowser|BaiduHD/i', $useragent)) {
			$link = "http://browser.baidu.com/";
			$title = self::detect_browser_version("BA?IDUBrowser|BaiduHD", $useragent);
			$code = "bidubrowser";
		} elseif (preg_match('/BlackBerry/i', $useragent)) {
			$link = "http://www.blackberry.com/";
			$title = self::detect_browser_version("BlackBerry", $useragent);
			$code = "blackberry";
		} elseif (preg_match('/Blackbird/i', $useragent)) {
			$link = "http://www.blackbirdbrowser.com/";
			$title = self::detect_browser_version("Blackbird", $useragent);
			$code = "blackbird";
		} elseif (preg_match('/BlackHawk/i', $useragent)) {
			$link = "http://www.netgate.sk/blackhawk/help/welcome-to-blackhawk-web-browser.html";
			$title = self::detect_browser_version("BlackHawk", $useragent);
			$code = "blackhawk";
		} elseif (preg_match('/Blazer/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Blazer_(web_browser)";
			$title = self::detect_browser_version("Blazer", $useragent);
			$code = "blazer";
		} elseif (preg_match('/Bolt/i', $useragent)) {
			$link = "http://www.boltbrowser.com/";
			$title = self::detect_browser_version("Bolt", $useragent);
			$code = "bolt";
		} elseif (preg_match('/BonEcho/i', $useragent)) {
			$link = "http://www.mozilla.org/projects/minefield/";
			$title = self::detect_browser_version("BonEcho", $useragent);
			$code = "firefoxdevpre";
		} elseif (preg_match('/BrowseX/i', $useragent)) {
			$link = "http://pdqi.com/browsex/";
			$title = "BrowseX";
			$code = "browsex";
		} elseif (preg_match('/Browzar/i', $useragent)) {
			$link = "http://www.browzar.com/";
			$title = self::detect_browser_version("Browzar", $useragent);
			$code = "browzar";
		} elseif (preg_match('/Bunjalloo/i', $useragent)) {
			$link = "http://code.google.com/p/quirkysoft/";
			$title = self::detect_browser_version("Bunjalloo", $useragent);
			$code = "bunjalloo";
		} elseif (preg_match('/Camino/i', $useragent)) {
			$link = "http://www.caminobrowser.org/";
			$title = self::detect_browser_version("Camino", $useragent);
			$code = "camino";
		} elseif (preg_match('/Cayman\ Browser/i', $useragent)) {
			$link = "http://www.caymanbrowser.com/";
			$title = "Cayman " . self::detect_browser_version("Browser", $useragent);
			$code = "caymanbrowser";
		} elseif (preg_match('/Charon/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Charon_(web_browser)";
			$title = self::detect_browser_version("Charon", $useragent);
			$code = "null";
		} elseif (preg_match('/Cheshire/i', $useragent)) {
			$link = "http://downloads.channel.aol.com/browser";
			$title = self::detect_browser_version("Cheshire", $useragent);
			$code = "aol";
		} elseif (preg_match('/Chimera/i', $useragent)) {
			$link = "http://www.chimera.org/";
			$title = self::detect_browser_version("Chimera", $useragent);
			$code = "null";
		} elseif (preg_match('/chromeframe/i', $useragent)) {
			$link = "http://code.google.com/chrome/chromeframe/";
			$title = self::detect_browser_version("chromeframe", $useragent);
			$code = "chrome";
		} elseif (preg_match('/ChromePlus/i', $useragent)) {
			$link = "http://www.chromeplus.org/";
			$title = self::detect_browser_version("ChromePlus", $useragent);
			$code = "chromeplus";
		} elseif (preg_match('/Iron/i', $useragent)) {
			$link = "http://www.srware.net/";
			$title = "SRWare " . self::detect_browser_version("Iron", $useragent);
			$code = "srwareiron";
		} elseif (preg_match('/Chromium/i', $useragent)) {
			$link = "http://www.chromium.org/";
			$title = self::detect_browser_version("Chromium", $useragent);
			$code = "chromium";
		} elseif (preg_match('/Classilla/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Classilla";
			$title = self::detect_browser_version("Classilla", $useragent);
			$code = "classilla";
		} elseif (preg_match('/Coast/i', $useragent)) {
			$link = "http://coastbyopera.com/";
			$title = self::detect_browser_version("Coast", $useragent);
			$code = "coast";
		} elseif (preg_match('/Columbus/i', $useragent)) {
			$link = "http://www.columbus-browser.com/";
			$title = self::detect_browser_version("Columbus", $useragent);
			$code = "columbus";
		} elseif (preg_match('/CometBird/i', $useragent)) {
			$link = "http://www.cometbird.com/";
			$title = self::detect_browser_version("CometBird", $useragent);
			$code = "cometbird";
		} elseif (preg_match('/Comodo_Dragon/i', $useragent)) {
			$link = "http://www.comodo.com/home/internet-security/browser.php";
			$title = "Comodo " . self::detect_browser_version("Dragon", $useragent);
			$code = "comodo-dragon";
		} elseif (preg_match('/Conkeror/i', $useragent)) {
			$link = "http://www.conkeror.org/";
			$title = self::detect_browser_version("Conkeror", $useragent);
			$code = "conkeror";
		} elseif (preg_match('/CoolNovo/i', $useragent)) {
			$link = "http://www.coolnovo.com/";
			$title = self::detect_browser_version("CoolNovo", $useragent);
			$code = "coolnovo";
		} elseif (preg_match('/CoRom/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/C%E1%BB%9D_R%C3%B4m%2B_(browser)";
			$title = self::detect_browser_version("CoRom", $useragent);
			$code = "corom";
		} elseif (preg_match('/Crazy\ Browser/i', $useragent)) {
			$link = "http://www.crazybrowser.com/";
			$title = "Crazy " . self::detect_browser_version("Browser", $useragent);
			$code = "crazybrowser";
		} elseif (preg_match('/CrMo/i', $useragent)) {
			$link = "http://www.google.com/chrome";
			$title = self::detect_browser_version("CrMo", $useragent);
			$code = "chrome";
		} elseif (preg_match('/Cruz/i', $useragent)) {
			$link = "http://www.cruzapp.com/";
			$title = self::detect_browser_version("Cruz", $useragent);
			$code = "cruz";
		} elseif (preg_match('/Cyberdog/i', $useragent)) {
			$link = "http://www.cyberdog.org/about/cyberdog/cyberbrowse.html";
			$title = self::detect_browser_version("Cyberdog", $useragent);
			$code = "cyberdog";
		} elseif (preg_match('/DPlus/i', $useragent)) {
			$link = "http://dplus-browser.sourceforge.net/";
			$title = self::detect_browser_version("DPlus", $useragent);
			$code = "dillo";
		} elseif (preg_match('/Deepnet\ Explorer/i', $useragent)) {
			$link = "http://www.deepnetexplorer.com/";
			$title = self::detect_browser_version("Deepnet Explorer", $useragent);
			$code = "deepnetexplorer";
		} elseif (preg_match('/Demeter/i', $useragent)) {
			$link = "http://www.hurrikenux.com/Demeter/";
			$title = self::detect_browser_version("Demeter", $useragent);
			$code = "demeter";
		} elseif (preg_match('/DeskBrowse/i', $useragent)) {
			$link = "http://www.deskbrowse.org/";
			$title = self::detect_browser_version("DeskBrowse", $useragent);
			$code = "deskbrowse";
		} elseif (preg_match('/Dillo/i', $useragent)) {
			$link = "http://www.dillo.org/";
			$title = self::detect_browser_version("Dillo", $useragent);
			$code = "dillo";
		} elseif (preg_match('/DoCoMo/i', $useragent)) {
			$link = "http://www.nttdocomo.com/";
			$title = self::detect_browser_version("DoCoMo", $useragent);
			$code = "null";
		} elseif (preg_match('/DocZilla/i', $useragent)) {
			$link = "http://www.doczilla.com/";
			$title = self::detect_browser_version("DocZilla", $useragent);
			$code = "doczilla";
		} elseif (preg_match('/Dolfin/i', $useragent)) {
			$link = "http://www.samsungmobile.com/";
			$title = self::detect_browser_version("Dolfin", $useragent);
			$code = "samsung";
		} elseif (preg_match('/Dooble/i', $useragent)) {
			$link = "http://dooble.sourceforge.net/";
			$title = self::detect_browser_version("Dooble", $useragent);
			$code = "dooble";
		} elseif (preg_match('/Doris/i', $useragent)) {
			$link = "http://www.anygraaf.fi/browser/indexe.htm";
			$title = self::detect_browser_version("Doris", $useragent);
			$code = "doris";
		} elseif (preg_match('/Dorothy/i', $useragent)) {
			$link = "http://www.dorothybrowser.com/";
			$title = self::detect_browser_version("Dorothy", $useragent);
			$code = "dorothybrowser";
		} elseif (preg_match('/DPlus/i', $useragent)) {
			$link = "http://dplus-browser.sourceforge.net/";
			$title = self::detect_browser_version("DPlus", $useragent);
			$code = "dillo";
		} elseif (preg_match('/Edbrowse/i', $useragent)) {
			$link = "http://edbrowse.sourceforge.net/";
			$title = self::detect_browser_version("Edbrowse", $useragent);
			$code = "edbrowse";
		} elseif (preg_match('/Elinks/i', $useragent)) {
			$link = "http://elinks.or.cz/";
			$title = self::detect_browser_version("Elinks", $useragent);
			$code = "elinks";
		} elseif (preg_match('/Element\ Browser/i', $useragent)) {
			$link = "http://www.elementsoftware.co.uk/software/elementbrowser/";
			$title = "Element " . self::detect_browser_version("Browser", $useragent);
			$code = "elementbrowser";
		} elseif (preg_match('/Enigma\ Browser/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Enigma_Browser";
			$title = "Enigma " . self::detect_browser_version("Browser", $useragent);
			$code = "enigmabrowser";
		} elseif (preg_match('/EnigmaFox/i', $useragent)) {
			$link = "#";
			$title = self::detect_browser_version("EnigmaFox", $useragent);
			$code = "null";
		} elseif (preg_match('/Epic/i', $useragent)) {
			$link = "http://www.epicbrowser.com/";
			$title = self::detect_browser_version("Epic", $useragent);
			$code = "epicbrowser";
		} elseif (preg_match('/Epiphany/i', $useragent)) {
			$link = "http://gnome.org/projects/epiphany/";
			$title = self::detect_browser_version("Epiphany", $useragent);
			$code = "epiphany";
		} elseif (preg_match('/Escape/i', $useragent)) {
			$link = "http://www.espial.com/products/evo_browser/";
			$title = "Espial TV Browser - " . self::detect_browser_version("Escape", $useragent);
			$code = "espialtvbrowser";
		} elseif (preg_match('/Fennec/i', $useragent)) {
			$link = "https://wiki.mozilla.org/Fennec";
			$title = self::detect_browser_version("Fennec", $useragent);
			$code = "fennec";
		} elseif (preg_match('/Firebird/i', $useragent)) {
			$link = "http://seb.mozdev.org/firebird/";
			$title = self::detect_browser_version("Firebird", $useragent);
			$code = "firebird";
		} elseif (preg_match('/Fireweb\ Navigator/i', $useragent)) {
			$link = "http://www.arsslensoft.tk/?q=node/7";
			$title = self::detect_browser_version("Fireweb Navigator", $useragent);
			$code = "firewebnavigator";
		} elseif (preg_match('/Flock/i', $useragent)) {
			$link = "http://www.flock.com/";
			$title = self::detect_browser_version("Flock", $useragent);
			$code = "flock";
		} elseif (preg_match('/Fluid/i', $useragent)) {
			$link = "http://www.fluidapp.com/";
			$title = self::detect_browser_version("Fluid", $useragent);
			$code = "fluid";
		} elseif (preg_match('/Galaxy/i', $useragent)
			&& !preg_match('/Chrome/i', $useragent)) {
			$link = "http://www.traos.org/";
			$title = self::detect_browser_version("Galaxy", $useragent);
			$code = "galaxy";
		} elseif (preg_match('/Galeon/i', $useragent)) {
			$link = "http://galeon.sourceforge.net/";
			$title = self::detect_browser_version("Galeon", $useragent);
			$code = "galeon";
		} elseif (preg_match('/GlobalMojo/i', $useragent)) {
			$link = "http://www.globalmojo.com/";
			$title = self::detect_browser_version("GlobalMojo", $useragent);
			$code = "globalmojo";
		} elseif (preg_match('/GoBrowser/i', $useragent)) {
			$link = "http://www.gobrowser.cn/";
			$title = "GO " . self::detect_browser_version("Browser", $useragent);
			$code = "gobrowser";
		} elseif (preg_match('/Google\ Wireless\ Transcoder/i', $useragent)) {
			$link = "http://google.com/gwt/n";
			$title = "Google Wireless Transcoder";
			$code = "google";
		} elseif (preg_match('/GoSurf/i', $useragent)) {
			$link = "http://gosurfbrowser.com/?ln=en";
			$title = self::detect_browser_version("GoSurf", $useragent);
			$code = "gosurf";
		} elseif (preg_match('/GranParadiso/i', $useragent)) {
			$link = "http://www.mozilla.org/";
			$title = self::detect_browser_version("GranParadiso", $useragent);
			$code = "firefoxdevpre";
		} elseif (preg_match('/GreenBrowser/i', $useragent)) {
			$link = "http://www.morequick.com/";
			$title = self::detect_browser_version("GreenBrowser", $useragent);
			$code = "greenbrowser";
		} elseif (preg_match('/Hana/i', $useragent)) {
			$link = "http://www.alloutsoftware.com/";
			$title = self::detect_browser_version("Hana", $useragent);
			$code = "hana";
		} elseif (preg_match('/HotJava/i', $useragent)) {
			$link = "http://java.sun.com/products/archive/hotjava/";
			$title = self::detect_browser_version("HotJava", $useragent);
			$code = "hotjava";
		} elseif (preg_match('/Hv3/i', $useragent)) {
			$link = "http://tkhtml.tcl.tk/hv3.html";
			$title = self::detect_browser_version("Hv3", $useragent);
			$code = "hv3";
		} elseif (preg_match('/Hydra\ Browser/i', $useragent)) {
			$link = "http://www.hydrabrowser.com/";
			$title = "Hydra Browser";
			$code = "hydrabrowser";
		} elseif (preg_match('/Iris/i', $useragent)) {
			$link = "http://www.torchmobile.com/";
			$title = self::detect_browser_version("Iris", $useragent);
			$code = "iris";
		} elseif (preg_match('/IBM\ WebExplorer/i', $useragent)) {
			$link = "http://www.networking.ibm.com/WebExplorer/";
			$title = "IBM " . self::detect_browser_version("WebExplorer", $useragent);
			$code = "ibmwebexplorer";
		} elseif (preg_match('/JuziBrowser/i', $useragent)) {
			$link = "http://www.123juzi.com/";
			$title = "JuziBrowser";
			$code = "juzibrowser";
		} elseif (preg_match('/MiuiBrowser/i', $useragent)) {
			$link = "http://www.xiaomi.com/";
			$title = self::detect_browser_version("MiuiBrowser", $useragent);
			$code = "miuibrowser";
		} elseif (preg_match('/IBrowse/i', $useragent)) {
			$link = "http://www.ibrowse-dev.net/";
			$title = self::detect_browser_version("IBrowse", $useragent);
			$code = "ibrowse";
		} elseif (preg_match('/iCab/i', $useragent)) {
			$link = "http://www.icab.de/";
			$title = self::detect_browser_version("iCab", $useragent);
			$code = "icab";
		} elseif (preg_match('/Ice Browser/i', $useragent)) {
			$link = "http://www.icesoft.com/products/icebrowser.html";
			$title = self::detect_browser_version("Ice Browser", $useragent);
			$code = "icebrowser";
		} elseif (preg_match('/Iceape/i', $useragent)) {
			$link = "http://packages.debian.org/iceape";
			$title = self::detect_browser_version("Iceape", $useragent);
			$code = "iceape";
		} elseif (preg_match('/IceCat/i', $useragent)) {
			$link = "http://gnuzilla.gnu.org/";
			$title = "GNU " . self::detect_browser_version("IceCat", $useragent);
			$code = "icecat";
		} elseif (preg_match('/IceWeasel/i', $useragent)) {
			$link = "http://www.geticeweasel.org/";
			$title = self::detect_browser_version("IceWeasel", $useragent);
			$code = "iceweasel";
		} elseif (preg_match('/iNet\ Browser/i', $useragent)) {
			$link = "http://alexanderjbeston.wordpress.com/";
			$title = "iNet " . self::detect_browser_version("Browser", $useragent);
			$code = "null";
		} elseif (preg_match('/iRider/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/IRider";
			$title = self::detect_browser_version("iRider", $useragent);
			$code = "irider";
		} elseif (preg_match('/Iron/i', $useragent)) {
			$link = "http://www.srware.net/en/software_srware_iron.php";
			$title = self::detect_browser_version("Iron", $useragent);
			$code = "iron";
		} elseif (preg_match('/InternetSurfboard/i', $useragent)) {
			$link = "http://inetsurfboard.sourceforge.net/";
			$title = self::detect_browser_version("InternetSurfboard", $useragent);
			$code = "internetsurfboard";
		} elseif (preg_match('/Jasmine/i', $useragent)) {
			$link = "http://www.samsungmobile.com/";
			$title = self::detect_browser_version("Jasmine", $useragent);
			$code = "samsung";
		} elseif (preg_match('/K-Meleon/i', $useragent)) {
			$link = "http://kmeleon.sourceforge.net/";
			$title = self::detect_browser_version("K-Meleon", $useragent);
			$code = "kmeleon";
		} elseif (preg_match('/K-Ninja/i', $useragent)) {
			$link = "http://k-ninja-samurai.en.softonic.com/";
			$title = self::detect_browser_version("K-Ninja", $useragent);
			$code = "kninja";
		} elseif (preg_match('/Kapiko/i', $useragent)) {
			$link = "http://ufoxlab.googlepages.com/cooperation";
			$title = self::detect_browser_version("Kapiko", $useragent);
			$code = "kapiko";
		} elseif (preg_match('/Kazehakase/i', $useragent)) {
			$link = "http://kazehakase.sourceforge.jp/";
			$title = self::detect_browser_version("Kazehakase", $useragent);
			$code = "kazehakase";
		} elseif (preg_match('/Strata/i', $useragent)) {
			$link = "http://www.kirix.com/";
			$title = "Kirix " . self::detect_browser_version("Strata", $useragent);
			$code = "kirix-strata";
		} elseif (preg_match('/KKman/i', $useragent)) {
			$link = "http://www.kkman.com.tw/";
			$title = self::detect_browser_version("KKman", $useragent);
			$code = "kkman";
		} elseif (preg_match('/KMail/i', $useragent)) {
			$link = "http://kontact.kde.org/kmail/";
			$title = self::detect_browser_version("KMail", $useragent);
			$code = "kmail";
		} elseif (preg_match('/KMLite/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/K-Meleon";
			$title = self::detect_browser_version("KMLite", $useragent);
			$code = "kmeleon";
		} elseif (preg_match('/Konqueror/i', $useragent)) {
			$link = "http://konqueror.kde.org/";
			$title = self::detect_browser_version("Konqueror", $useragent);
			$code = "konqueror";
		} elseif (preg_match('/Kylo/i', $useragent)) {
			$link = "http://kylo.tv/";
			$title = self::detect_browser_version("Kylo", $useragent);
			$code = "kylo";
		} elseif (preg_match('/LBrowser/i', $useragent)) {
			$link = "http://wiki.freespire.org/index.php/Web_Browser";
			$title = self::detect_browser_version("LBrowser", $useragent);
			$code = "lbrowser";
		} elseif (preg_match('/LBBrowser/i', $useragent)) {
			$link = "http://www.liebao.cn/";
			$title = "Liebao Browser";
			$code = "lbbrowser";
		} elseif (preg_match('/Liebaofast/i', $useragent)) {
			$link = "http://m.liebao.cn/";
			$title = self::detect_browser_version("Liebaofast", $useragent);
			$code = "lbbrowser";
		} elseif (preg_match('/LeechCraft/i', $useragent)) {
			$link = "http://leechcraft.org/";
			$title = "LeechCraft";
			$code = "null";
		} elseif (preg_match('/Links/i', $useragent)
			&& !preg_match('/online\ link\ validator/i', $useragent)) {
			$link = "http://links.sourceforge.net/";
			$title = self::detect_browser_version("Links", $useragent);
			$code = "links";
		} elseif (preg_match('/Lobo/i', $useragent)) {
			$link = "http://www.lobobrowser.org/";
			$title = self::detect_browser_version("Lobo", $useragent);
			$code = "lobo";
		} elseif (preg_match('/lolifox/i', $useragent)) {
			$link = "http://www.lolifox.com/";
			$title = self::detect_browser_version("lolifox", $useragent);
			$code = "lolifox";
		} elseif (preg_match('/Lorentz/i', $useragent)) {
			$link = "http://news.softpedia.com/news/Firefox-Codenamed-Lorentz-Drops-in-March-2010-130855.shtml";
			$title = self::detect_browser_version("Lorentz", $useragent);
			$code = "firefoxdevpre";
		} elseif (preg_match('/Lunascape/i', $useragent)) {
			$link = "http://www.lunascape.tv";
			$title = self::detect_browser_version("Lunascape", $useragent);
			$code = "lunascape";
		} elseif (preg_match('/Lynx/i', $useragent)) {
			$link = "http://lynx.browser.org/";
			$title = self::detect_browser_version("Lynx", $useragent);
			$code = "lynx";
		} elseif (preg_match('/Madfox/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Madfox";
			$title = self::detect_browser_version("Madfox", $useragent);
			$code = "madfox";
		} elseif (preg_match('/Maemo\ Browser/i', $useragent)) {
			$link = "http://maemo.nokia.com/features/maemo-browser/";
			$title = self::detect_browser_version("Maemo Browser", $useragent);
			$code = "maemo";
		} elseif (preg_match('/Maxthon/i', $useragent)) {
			$link = "http://www.maxthon.com/";
			$title = self::detect_browser_version("Maxthon", $useragent);
			$code = "maxthon";
		} elseif (preg_match('/\ MIB\//i', $useragent)) {
			$link = "http://www.motorola.com/content.jsp?globalObjectId=1827-4343";
			$title = self::detect_browser_version("MIB", $useragent);
			$code = "mib";
		} elseif (preg_match('/Tablet\ browser/i', $useragent)) {
			$link = "http://browser.garage.maemo.org/";
			$title = self::detect_browser_version("Tablet browser", $useragent);
			$code = "microb";
		} elseif (preg_match('/Midori/i', $useragent)) {
			$link = "http://www.twotoasts.de/index.php?/pages/midori_summary.html";
			$title = self::detect_browser_version("Midori", $useragent);
			$code = "midori";
		} elseif (preg_match('/Minefield/i', $useragent)) {
			$link = "http://www.mozilla.org/projects/minefield/";
			$title = self::detect_browser_version("Minefield", $useragent);
			$code = "minefield";
		} elseif (preg_match('/MiniBrowser/i', $useragent)) {
			$link = "http://dmkho.tripod.com/";
			$title = self::detect_browser_version("MiniBrowser", $useragent);
			$code = "minibrowser";
		} elseif (preg_match('/Minimo/i', $useragent)) {
			$link = "http://www-archive.mozilla.org/projects/minimo/";
			$title = self::detect_browser_version("Minimo", $useragent);
			$code = "minimo";
		} elseif (preg_match('/Mosaic/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Mosaic_(web_browser)";
			$title = self::detect_browser_version("Mosaic", $useragent);
			$code = "mosaic";
		} elseif (preg_match('/MozillaDeveloperPreview/i', $useragent)) {
			$link = "http://www.mozilla.org/projects/devpreview/releasenotes/";
			$title = self::detect_browser_version("MozillaDeveloperPreview", $useragent);
			$code = "firefoxdevpre";
		} elseif (preg_match('/MQQBrowser/i', $useragent)) {
			$link = "http://browser.qq.com/";
			$title = self::detect_browser_version("MQQBrowser", $useragent);
			$code = "qqbrowser";
		} elseif (preg_match('/Multi-Browser/i', $useragent)) {
			$link = "http://www.multibrowser.de/";
			$title = self::detect_browser_version("Multi-Browser", $useragent);
			$code = "multi-browserxp";
		} elseif (preg_match('/MultiZilla/i', $useragent)) {
			$link = "http://multizilla.mozdev.org/";
			$title = self::detect_browser_version("MultiZilla", $useragent);
			$code = "mozilla";
		} elseif (preg_match('/myibrow/i', $useragent)
			&& preg_match('/My\ Internet\ Browser/i', $useragent)) {
			$link = "http://myinternetbrowser.webove-stranky.org/";
			$title = self::detect_browser_version("myibrow", $useragent);
			$code = "my-internet-browser";
		} elseif (preg_match('/MyIE2/i', $useragent)) {
			$link = "http://www.myie2.com/";
			$title = self::detect_browser_version("MyIE2", $useragent);
			$code = "myie2";
		} elseif (preg_match('/Namoroka/i', $useragent)) {
			$link = "https://wiki.mozilla.org/Firefox/Namoroka";
			$title = self::detect_browser_version("Namoroka", $useragent);
			$code = "firefoxdevpre";
		} elseif (preg_match('/Navigator/i', $useragent)) {
			$link = "http://netscape.aol.com/";
			$title = "Netscape " . self::detect_browser_version("Navigator", $useragent);
			$code = "netscape";
		} elseif (preg_match('/NetBox/i', $useragent)) {
			$link = "http://www.netgem.com/";
			$title = self::detect_browser_version("NetBox", $useragent);
			$code = "netbox";
		} elseif (preg_match('/NetCaptor/i', $useragent)) {
			$link = "http://www.netcaptor.com/";
			$title = self::detect_browser_version("NetCaptor", $useragent);
			$code = "netcaptor";
		} elseif (preg_match('/NetFront/i', $useragent)) {
			$link = "http://www.access-company.com/";
			$title = self::detect_browser_version("NetFront", $useragent);
			$code = "netfront";
		} elseif (preg_match('/NetNewsWire/i', $useragent)) {
			$link = "http://www.newsgator.com/individuals/netnewswire/";
			$title = self::detect_browser_version("NetNewsWire", $useragent);
			$code = "netnewswire";
		} elseif (preg_match('/NetPositive/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/NetPositive";
			$title = self::detect_browser_version("NetPositive", $useragent);
			$code = "netpositive";
		} elseif (preg_match('/Netscape/i', $useragent)) {
			$link = "http://netscape.aol.com/";
			$title = self::detect_browser_version("Netscape", $useragent);
			$code = "netscape";
		} elseif (preg_match('/NetSurf/i', $useragent)) {
			$link = "http://www.netsurf-browser.org/";
			$title = self::detect_browser_version("NetSurf", $useragent);
			$code = "netsurf";
		} elseif (preg_match('/NF-Browser/i', $useragent)) {
			$link = "http://www.access-company.com/";
			$title = self::detect_browser_version("NF-Browser", $useragent);
			$code = "netfront";
		} elseif (preg_match('/NintendoBrowser/i', $useragent)) {
			$link = "http://www.netsurf-browser.org/";
			$title = "Nintendo " . self::detect_browser_version("Browser", $useragent);
			$code = "nintendobrowser";
		} elseif (preg_match('/NokiaBrowser/i', $useragent)) {
			$link = "http://browser.nokia.com/";
			$title = "Nokia " . self::detect_browser_version("Browser", $useragent);
			$code = "nokia";
		} elseif (preg_match('/Novarra-Vision/i', $useragent)) {
			$link = "http://www.novarra.com/";
			$title = "Novarra " . self::detect_browser_version("Vision", $useragent);
			$code = "novarra";
		} elseif (preg_match('/Obigo/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Obigo_Browser";
			$title = self::detect_browser_version("Obigo", $useragent);
			$code = "obigo";
		} elseif (preg_match('/OffByOne/i', $useragent)) {
			$link = "http://www.offbyone.com/";
			$title = "Off By One";
			$code = "offbyone";
		} elseif (preg_match('/OmniWeb/i', $useragent)) {
			$link = "http://www.omnigroup.com/applications/omniweb/";
			$title = self::detect_browser_version("OmniWeb", $useragent);
			$code = "omniweb";
		} elseif (preg_match('/OneBrowser/i', $useragent)) {
			$link = "http://one-browser.com/";
			$title = self::detect_browser_version("OneBrowser", $useragent);
			$code = "onebrowser";
		} elseif (preg_match('/Opera Mini/i', $useragent)) {
			$link = "http://www.opera.com/mini/";
			$title = self::detect_browser_version("Opera Mini", $useragent);
			$code = "opera-2";
		} elseif (preg_match('/Opera Mobi/i', $useragent)) {
			$link = "http://www.opera.com/mobile/";
			$title = self::detect_browser_version("Opera Mobi", $useragent);
			$code = "opera-2";
		} elseif (preg_match('/Opera Labs/i', $useragent)
			|| (preg_match('/Opera/i', $useragent)
				&& preg_match('/Edition Labs/i', $useragent))) {
			$link = "http://labs.opera.com/";
			$title = self::detect_browser_version("Opera Labs", $useragent);
			$code = "opera-next";
		} elseif (preg_match('/Opera Next/i', $useragent)
			|| (preg_match('/Opera/i', $useragent)
				&& preg_match('/Edition Next/i', $useragent))) {
			$link = "http://www.opera.com/support/kb/view/991/";
			$title = self::detect_browser_version("Opera Next", $useragent);
			$code = "opera-next";
		} elseif (preg_match('/Opera/i', $useragent)) {
			$link = "http://www.opera.com/";
			$title = self::detect_browser_version("Opera", $useragent);
			$code = "opera-1";
			if (preg_match('/Version/i', $useragent)) {
				$code = "opera-2";
			}

		} elseif (preg_match('/OPR/i', $useragent)) {
			$link = "http://www.opera.com/";
			if (preg_match('/(Edition Next)/i', $useragent)) {
				$title = self::detect_browser_version("Opera Next", $useragent);
				$code = "opera-next";
			} elseif (preg_match('/(Edition Developer)/i', $useragent)) {
				$title = self::detect_browser_version("Opera Developer", $useragent);
				$code = "opera-developer";
			} else {
				$title = self::detect_browser_version("Opera", $useragent);
				$code = "opera-1";
			}
		} elseif (preg_match('/Orca/i', $useragent)) {
			$link = "http://www.orcabrowser.com/";
			$title = self::detect_browser_version("Orca", $useragent);
			$code = "orca";
		} elseif (preg_match('/Oregano/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Oregano_(web_browser)";
			$title = self::detect_browser_version("Oregano", $useragent);
			$code = "oregano";
		} elseif (preg_match('/Origyn\ Web\ Browser/i', $useragent)) {
			$link = "http://www.sand-labs.org/owb";
			$title = "Oregano Web Browser";
			$code = "owb";
		} elseif (preg_match('/osb-browser/i', $useragent)) {
			$link = "http://gtk-webcore.sourceforge.net/";
			$title = self::detect_browser_version("osb-browser", $useragent);
			$code = "null";
		} elseif (preg_match('/Otter/i', $useragent)) {
			$link = "http://otter-browser.org/";
			$title = self::detect_browser_version("Otter", $useragent);
			$code = "otter";
		} elseif (preg_match('/\ Pre\//i', $useragent)) {
			$link = "http://www.palm.com/us/products/phones/pre/index.html";
			$title = "Palm " . self::detect_browser_version("Pre", $useragent);
			$code = "palmpre";
		} elseif (preg_match('/Palemoon/i', $useragent)) {
			$link = "http://www.palemoon.org/";
			$title = "Pale " . self::detect_browser_version("Moon", $useragent);
			$code = "palemoon";
		} elseif (preg_match('/Patriott\:\:Browser/i', $useragent)) {
			$link = "http://madgroup.x10.mx/patriott1.php";
			$title = "Patriott " . self::detect_browser_version("Browser", $useragent);
			$code = "patriott";
		} elseif (preg_match('/Perk/i', $useragent)) {
			$link = "http://www.perk.com/";
			$title = self::detect_browser_version("Perk", $useragent);
			$code = "perk";
		} elseif (preg_match('/Phaseout/i', $useragent)) {
			$link = "http://www.phaseout.net/";
			$title = "Phaseout";
			$code = "phaseout";
		} elseif (preg_match('/Phoenix/i', $useragent)) {
			$link = "http://www.mozilla.org/projects/phoenix/phoenix-release-notes.html";
			$title = self::detect_browser_version("Phoenix", $useragent);
			$code = "phoenix";
		} elseif (preg_match('/PlayStation\ 4/i', $useragent)) {
			$link = "http://us.playstation.com/";
			$title = "PS4 Web Browser";
			$code = "webkit";
		} elseif (preg_match('/Podkicker/i', $useragent)) {
			$link = "http://www.podkicker.com/";
			$title = self::detect_browser_version("Podkicker", $useragent);
			$code = "podkicker";
		} elseif (preg_match('/Podkicker\ Pro/i', $useragent)) {
			$link = "http://www.podkicker.com/";
			$title = self::detect_browser_version("Podkicker Pro", $useragent);
			$code = "podkicker";
		} elseif (preg_match('/Pogo/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/AT%26T_Pogo";
			$title = self::detect_browser_version("Pogo", $useragent);
			$code = "pogo";
		} elseif (preg_match('/Polaris/i', $useragent)) {
			$link = "http://www.infraware.co.kr/eng/01_product/product02.asp";
			$title = self::detect_browser_version("Polaris", $useragent);
			$code = "polaris";
		} elseif (preg_match('/Prism/i', $useragent)) {
			$link = "http://prism.mozillalabs.com/";
			$title = self::detect_browser_version("Prism", $useragent);
			$code = "prism";
		} elseif (preg_match('/QQBrowser/i', $useragent)) {
			$link = "http://browser.qq.com/";
			$title = self::detect_browser_version("QQBrowser", $useragent);
			$code = "qqbrowser";
		} elseif (preg_match('/QQ(?!Download|Pinyin)/i', $useragent)) {
			$link = "http://im.qq.com/";
			$title = self::detect_browser_version("QQ", $useragent);
			$code = "qq";
		} elseif (preg_match('/QtWeb\ Internet\ Browser/i', $useragent)) {
			$link = "http://www.qtweb.net/";
			$title = "QtWeb Internet " . self::detect_browser_version("Browser", $useragent);
			$code = "qtwebinternetbrowser";
		} elseif (preg_match('/QupZilla/i', $useragent)) {
			$link = "http://www.qupzilla.com/";
			$title = self::detect_browser_version("QupZilla", $useragent);
			$code = "qupzilla";
		} elseif (preg_match('/rekonq/i', $useragent)) {
			$link = "http://rekonq.sourceforge.net/";
			$title = "rekonq";
			$code = "rekonq";
		} elseif (preg_match('/retawq/i', $useragent)) {
			$link = "http://retawq.sourceforge.net/";
			$title = self::detect_browser_version("retawq", $useragent);
			$code = "terminal";
		} elseif (preg_match('/RockMelt/i', $useragent)) {
			$link = "http://www.rockmelt.com/";
			$title = self::detect_browser_version("RockMelt", $useragent);
			$code = "rockmelt";
		} elseif (preg_match('/Ryouko/i', $useragent)) {
			$link = "http://sourceforge.net/projects/ryouko/";
			$title = self::detect_browser_version("Ryouko", $useragent);
			$code = "ryouko";
		} elseif (preg_match('/SaaYaa/i', $useragent)) {
			$link = "http://www.saayaa.com/";
			$title = "SaaYaa Explorer";
			$code = "saayaa";
		} elseif (preg_match('/SeaMonkey/i', $useragent)) {
			$link = "http://www.seamonkey-project.org/";
			$title = self::detect_browser_version("SeaMonkey", $useragent);
			$code = "seamonkey";
		} elseif (preg_match('/SEMC-Browser/i', $useragent)) {
			$link = "http://www.sonyericsson.com/";
			$title = self::detect_browser_version("SEMC-Browser", $useragent);
			$code = "semcbrowser";
		} elseif (preg_match('/SEMC-java/i', $useragent)) {
			$link = "http://www.sonyericsson.com/";
			$title = self::detect_browser_version("SEMC-java", $useragent);
			$code = "semcbrowser";
		} elseif (preg_match('/Series60/i', $useragent)
			&& !preg_match('/Symbian/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Web_Browser_for_S60";
			$title = "Nokia " . self::detect_browser_version("Series60", $useragent);
			$code = "s60";
		} elseif (preg_match('/S60/i', $useragent)
			&& !preg_match('/Symbian/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Web_Browser_for_S60";
			$title = "Nokia " . self::detect_browser_version("S60", $useragent);
			$code = "s60";
		} elseif (preg_match('/SE\ /i', $useragent)
			&& preg_match('/MetaSr/i', $useragent)) {
			$link = "http://ie.sogou.com/";
			$title = "Sogou Explorer";
			$code = "sogou";
		} elseif (preg_match('/Shiira/i', $useragent)) {
			$link = "http://www.shiira.jp/en.php";
			$title = self::detect_browser_version("Shiira", $useragent);
			$code = "shiira";
		} elseif (preg_match('/Shiretoko/i', $useragent)) {
			$link = "http://www.mozilla.org/";
			$title = self::detect_browser_version("Shiretoko", $useragent);
			$code = "firefoxdevpre";
		} elseif (preg_match('/Silk/i', $useragent)
			&& !preg_match('/PlayStation/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Amazon_Silk";
			$title = "Amazon " . self::detect_browser_version("Silk", $useragent);
			$code = "silk";
		} elseif (preg_match('/SiteKiosk/i', $useragent)) {
			$link = "http://www.sitekiosk.com/SiteKiosk/Default.aspx";
			$title = self::detect_browser_version("SiteKiosk", $useragent);
			$code = "sitekiosk";
		} elseif (preg_match('/SkipStone/i', $useragent)) {
			$link = "http://www.muhri.net/skipstone/";
			$title = self::detect_browser_version("SkipStone", $useragent);
			$code = "skipstone";
		} elseif (preg_match('/Skyfire/i', $useragent)) {
			$link = "http://www.skyfire.com/";
			$title = self::detect_browser_version("Skyfire", $useragent);
			$code = "skyfire";
		} elseif (preg_match('/Sleipnir/i', $useragent)) {
			$link = "http://www.fenrir-inc.com/other/sleipnir/";
			$title = self::detect_browser_version("Sleipnir", $useragent);
			$code = "sleipnir";
		} elseif (preg_match('/SlimBoat/i', $useragent)) {
			$link = "http://slimboat.com/";
			$title = self::detect_browser_version("SlimBoat", $useragent);
			$code = "slimboat";
		} elseif (preg_match('/SlimBrowser/i', $useragent)) {
			$link = "http://www.flashpeak.com/sbrowser/";
			$title = self::detect_browser_version("SlimBrowser", $useragent);
			$code = "slimbrowser";
		} elseif (preg_match('/SmartTV/i', $useragent)) {
			$link = "http://www.freethetvchallenge.com/details/faq";
			$title = self::detect_browser_version("SmartTV", $useragent);
			$code = "maplebrowser";
		} elseif (preg_match('/Songbird/i', $useragent)) {
			$link = "http://www.getsongbird.com/";
			$title = self::detect_browser_version("Songbird", $useragent);
			$code = "songbird";
		} elseif (preg_match('/Stainless/i', $useragent)) {
			$link = "http://www.stainlessapp.com/";
			$title = self::detect_browser_version("Stainless", $useragent);
			$code = "stainless";
		} elseif (preg_match('/SubStream/i', $useragent)) {
			$link = "http://itunes.apple.com/us/app/substream/id389906706?mt=8";
			$title = self::detect_browser_version("SubStream", $useragent);
			$code = "substream";
		} elseif (preg_match('/Sulfur/i', $useragent)) {
			$link = "http://www.flock.com/";
			$title = "Flock " . self::detect_browser_version("Sulfur", $useragent);
			$code = "flock";
		} elseif (preg_match('/Sundance/i', $useragent)) {
			$link = "http://digola.com/sundance.html";
			$title = self::detect_browser_version("Sundance", $useragent);
			$code = "sundance";
		} elseif (preg_match('/Sunrise/i', $useragent)) {
			$link = "http://www.sundialbrowser.com/";
			$title = self::detect_browser_version("Sundial", $useragent);
			$code = "sundial";
		} elseif (preg_match('/Sunrise/i', $useragent)) {
			$link = "http://www.sunrisebrowser.com/";
			$title = self::detect_browser_version("Sunrise", $useragent);
			$code = "sunrise";
		} elseif (preg_match('/Surf/i', $useragent)) {
			$link = "http://surf.suckless.org/";
			$title = self::detect_browser_version("Surf", $useragent);
			$code = "surf";
		} elseif (preg_match('/Swiftfox/i', $useragent)) {
			$link = "http://www.getswiftfox.com/";
			$title = self::detect_browser_version("Swiftfox", $useragent);
			$code = "swiftfox";
		} elseif (preg_match('/Swiftweasel/i', $useragent)) {
			$link = "http://swiftweasel.tuxfamily.org/";
			$title = self::detect_browser_version("Swiftweasel", $useragent);
			$code = "swiftweasel";
		} elseif (preg_match('/Sylera/i', $useragent)) {
			$link = "http://dombla.net/sylera/";
			$title = self::detect_browser_version("Sylera", $useragent);
			$code = "null";
		} elseif (preg_match('/TaoBrowser/i', $useragent)) {
			$link = "http://browser.taobao.com/";
			$title = self::detect_browser_version("TaoBrowser", $useragent);
			$code = "taobrowser";
		} elseif (preg_match('/tear/i', $useragent)) {
			$link = "http://wiki.maemo.org/Tear";
			$title = "Tear";
			$code = "tear";
		} elseif (preg_match('/TeaShark/i', $useragent)) {
			$link = "http://www.teashark.com/";
			$title = self::detect_browser_version("TeaShark", $useragent);
			$code = "teashark";
		} elseif (preg_match('/Teleca/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Obigo_Browser/";
			$title = self::detect_browser_version(" Teleca", $useragent);
			$code = "obigo";
		} elseif (preg_match('/TencentTraveler/i', $useragent)) {
			$link = "http://www.tencent.com/en-us/index.shtml";
			$title = "Tencent " . self::detect_browser_version("Traveler", $useragent);
			$code = "tencenttraveler";
		} elseif (preg_match('/TenFourFox/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/TenFourFox";
			$title = self::detect_browser_version("TenFourFox", $useragent);
			$code = "tenfourfox";
		} elseif (preg_match('/TheWorld/i', $useragent)) {
			$link = "http://www.ioage.com/";
			$title = "TheWorld Browser";
			$code = "theworld";
		} elseif (preg_match('/Thunderbird/i', $useragent)) {
			$link = "http://www.mozilla.com/thunderbird/";
			$title = self::detect_browser_version("Thunderbird", $useragent);
			$code = "thunderbird";
		} elseif (preg_match('/Tizen/i', $useragent)) {
			$link = "https://www.tizen.org/";
			$title = self::detect_browser_version("Tizen", $useragent);
			$code = "tizen";
		} elseif (preg_match('/Tjusig/i', $useragent)) {
			$link = "http://www.tjusig.cz/";
			$title = self::detect_browser_version("Tjusig", $useragent);
			$code = "tjusig";
		} elseif (preg_match('/TencentTraveler/i', $useragent)) {
			$link = "http://tt.qq.com/";
			$title = self::detect_browser_version("TencentTraveler", $useragent);
			$code = "tt-explorer";
		} elseif (preg_match('/UC?Browser/i', $useragent)) {
			$link = "http://www.uc.cn/";
			$title = self::detect_browser_version("UC?Browser", $useragent);
			$code = "ucbrowser";
		} elseif ((preg_match('/Ubuntu\;\ Mobile/i', $useragent) || preg_match('/Ubuntu\;\ Tablet/i', $useragent) &&
			preg_match('/WebKit/i', $useragent))) {
			$link = "https://launchpad.net/webbrowser-app";
			$title = "Ubuntu Web Browser";
			$code = "ubuntuwebbrowser";
		} elseif (preg_match('/UC\ Browser/i', $useragent)) {
			$link = "http://www.uc.cn/English/index.shtml";
			$title = self::detect_browser_version("UC Browser", $useragent);
			$code = "ucbrowser";
		} elseif (preg_match('/UCWEB/i', $useragent)) {
			$link = "http://www.ucweb.com/English/product.shtml";
			$title = self::detect_browser_version("UCWEB", $useragent);
			$code = "ucbrowser";
		} elseif (preg_match('/UltraBrowser/i', $useragent)) {
			$link = "http://www.ultrabrowser.com/";
			$title = self::detect_browser_version("UltraBrowser", $useragent);
			$code = "ultrabrowser";
		} elseif (preg_match('/UP.Browser/i', $useragent)) {
			$link = "http://www.openwave.com/";
			$title = self::detect_browser_version("UP.Browser", $useragent);
			$code = "openwave";
		} elseif (preg_match('/UP.Link/i', $useragent)) {
			$link = "http://www.openwave.com/";
			$title = self::detect_browser_version("UP.Link", $useragent);
			$code = "openwave";
		} elseif (preg_match('/Usejump/i', $useragent)) {
			$link = "http://www.usejump.com/";
			$title = self::detect_browser_version("Usejump", $useragent);
			$code = "usejump";
		} elseif (preg_match('/uZardWeb/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/UZard_Web";
			$title = self::detect_browser_version("uZardWeb", $useragent);
			$code = "uzardweb";
		} elseif (preg_match('/uZard/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/UZard_Web";
			$title = self::detect_browser_version("uZard", $useragent);
			$code = "uzardweb";
		} elseif (preg_match('/uzbl/i', $useragent)) {
			$link = "http://www.uzbl.org/";
			$title = "uzbl";
			$code = "uzbl";
		} elseif (preg_match('/Vimprobable/i', $useragent)) {
			$link = "http://www.vimprobable.org/";
			$title = self::detect_browser_version("Vimprobable", $useragent);
			$code = "null";
		} elseif (preg_match('/Vonkeror/i', $useragent)) {
			$link = "http://zzo38computer.cjb.net/vonkeror/";
			$title = self::detect_browser_version("Vonkeror", $useragent);
			$code = "null";
		} elseif (preg_match('/w3m/i', $useragent)) {
			$link = "http://w3m.sourceforge.net/";
			$title = self::detect_browser_version("W3M", $useragent);
			$code = "w3m";
		} elseif (preg_match('/IEMobile/i', $useragent)) {
			$link = "http://www.microsoft.com/windowsmobile/en-us/downloads/microsoft/internet-explorer-mobile.mspx";
			$title = self::detect_browser_version("IEMobile", $useragent);
			$code = "msie-mobile";
		} elseif (preg_match('/AppleWebkit/i', $useragent)
			&& preg_match('/Android/i', $useragent)
			&& !preg_match('/Chrome/i', $useragent)) {
			$link = "http://developer.android.com/reference/android/webkit/package-summary.html";
			$title = self::detect_browser_version("Android Webkit", $useragent);
			$code = "android-webkit";
		} elseif (preg_match('/WebianShell/i', $useragent)) {
			$link = "http://webian.org/shell/";
			$title = "Webian " . self::detect_browser_version("Shell", $useragent);
			$code = "webianshell";
		} elseif (preg_match('/Webrender/i', $useragent)) {
			$link = "http://webrender.99k.org/";
			$title = "Webrender";
			$code = "webrender";
		} elseif (preg_match('/WeltweitimnetzBrowser/i', $useragent)) {
			$link = "http://weltweitimnetz.de/software/Browser.en.page";
			$title = "Weltweitimnetz " . self::detect_browser_version("Browser", $useragent);
			$code = "weltweitimnetzbrowser";
		} elseif (preg_match('/wKiosk/i', $useragent)) {
			$link = "http://www.app4mac.com/store/index.php?target=products&product_id=9";
			$title = "wKiosk";
			$code = "wkiosk";
		} elseif (preg_match('/WorldWideWeb/i', $useragent)) {
			$link = "http://www.w3.org/People/Berners-Lee/WorldWideWeb.html";
			$title = self::detect_browser_version("WorldWideWeb", $useragent);
			$code = "worldwideweb";
		} elseif (preg_match('/wp-android/i', $useragent)) {
			$link = "http://android.wordpress.org/";
			$title = self::detect_browser_version("wp-android", $useragent);
			$code = "wordpress";
		} elseif (preg_match('/wp-blackberry/i', $useragent)) {
			$link = "http://blackberry.wordpress.org/";
			$title = self::detect_browser_version("wp-blackberry", $useragent);
			$code = "wordpress";
		} elseif (preg_match('/wp-iphone/i', $useragent)) {
			$link = "http://ios.wordpress.org/";
			$title = self::detect_browser_version("wp-iphone", $useragent);
			$code = "wordpress";
		} elseif (preg_match('/wp-nokia/i', $useragent)) {
			$link = "http://nokia.wordpress.org/";
			$title = self::detect_browser_version("wp-nokia", $useragent);
			$code = "wordpress";
		} elseif (preg_match('/wp-webos/i', $useragent)) {
			$link = "http://webos.wordpress.org/";
			$title = self::detect_browser_version("wp-webos", $useragent);
			$code = "wordpress";
		} elseif (preg_match('/wp-windowsphone/i', $useragent)) {
			$link = "http://windowsphone.wordpress.org/";
			$title = self::detect_browser_version("wp-windowsphone", $useragent);
			$code = "wordpress";
		} elseif (preg_match('/Wyzo/i', $useragent)) {
			$link = "http://www.wyzo.com/";
			$title = self::detect_browser_version("Wyzo", $useragent);
			$code = "Wyzo";
		} elseif (preg_match('/X-Smiles/i', $useragent)) {
			$link = "http://www.xsmiles.org/";
			$title = self::detect_browser_version("X-Smiles", $useragent);
			$code = "x-smiles";
		} elseif (preg_match('/Xiino/i', $useragent)) {
			$link = "#";
			$title = self::detect_browser_version("Xiino", $useragent);
			$code = "null";
		} elseif (preg_match('/YaBrowser/i', $useragent)) {
			$link = "http://browser.yandex.com/";
			$title = "Yandex." . self::detect_browser_version("Browser", $useragent);
			$code = "yandex";
		} elseif (preg_match('/zBrowser/i', $useragent)) {
			$link = "http://sites.google.com/site/zeromusparadoxe01/zbrowser";
			$title = self::detect_browser_version("zBrowser", $useragent);
			$code = "zbrowser";
		} elseif (preg_match('/ZipZap/i', $useragent)) {
			$link = "http://www.zipzaphome.com/";
			$title = self::detect_browser_version("ZipZap", $useragent);
			$code = "zipzap";
		}

		// Pulled out of order to help ensure better detection for above browsers
		elseif (preg_match('/ABrowse/i', $useragent)) {
			$link = "http://abrowse.sourceforge.net/";
			$title = self::detect_browser_version("ABrowse", $useragent);
			$code = "abrowse";
		} elseif (preg_match('/Avant\ Browser/i', $useragent)) {
			$link = "http://www.avantbrowser.com/";
			$title = "Avant " . self::detect_browser_version("Browser", $useragent);
			$code = "avantbrowser";
		} elseif (preg_match('/Chrome/i', $useragent)) {

			// Note: For IE11 Experimental Web Platform Features in Windows 10
			// Spartan? Who knows.
			if (preg_match('/Windows NT 1.+Edge/i', $useragent)) {
				$link = "http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
				$title = "Internet Explorer " . self::detect_browser_version("Spartan", $useragent);
				$code = "msie11";
			} else {
				$link = "http://google.com/chrome/";
				$title = "Google " . self::detect_browser_version("Chrome", $useragent);
				$code = "chrome";
			}
		} elseif (preg_match('/Safari/i', $useragent)
			&& !preg_match('/Nokia/i', $useragent)) {
			$link = "http://www.apple.com/safari/";
			$title = "Safari";

			if (preg_match('/Version/i', $useragent)) {
				$title = self::detect_browser_version("Safari", $useragent);
			}

			if (preg_match('/Mobile Safari/i', $useragent)) {
				$title = "Mobile " . $title;
			}

			$code = "safari";
		} elseif (preg_match('/Nokia/i', $useragent) && !preg_match('/Trident/i', $useragent)) {
			$link = "http://www.nokia.com/browser";
			$title = "Nokia Web Browser";
			$code = "maemo";
		} elseif (preg_match('/Firefox/i', $useragent)) {
			$link = "http://www.mozilla.org/";
			$title = self::detect_browser_version("Firefox", $useragent);
			$code = "firefox";
		} elseif (preg_match('/MSIE/i', $useragent) || preg_match('/Trident/i', $useragent)) {
			$link = "http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
			$title = "Internet Explorer" . self::detect_browser_version("MSIE", $useragent);

			if (preg_match('/MSIE[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				// We have IE10 or older
			} elseif (preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				// We have IE11 or newer
			}

			if (count($regmatch) > 0) {
				if ($regmatch[1] >= 11) {
					$code = "msie11";
				} elseif ($regmatch[1] >= 10) {
					$code = "msie10";
				} elseif ($regmatch[1] >= 9) {
					$code = "msie9";
				} elseif ($regmatch[1] >= 7) {
					// also ie8
					$code = "msie7";
				} elseif ($regmatch[1] >= 6) {
					$code = "msie6";
				} elseif ($regmatch[1] >= 4) {
					// also ie5
					$code = "msie4";
				} elseif ($regmatch[1] >= 3) {
					$code = "msie3";
				} elseif ($regmatch[1] >= 2) {
					$code = "msie2";
				} elseif ($regmatch[1] >= 1) {
					$code = "msie1";
				}
			}
			if ($code == '') {
				$code = "msie";
			}
		} elseif (preg_match('/Mozilla/i', $useragent)) {
			$link = "http://www.mozilla.org/";
			$title = "Mozilla Compatible";

			if (preg_match('/rv:([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title = "Mozilla " . $regmatch[1];
			}

			$code = "mozilla";
		} else {
			$link = "#";
			$title = "Unknown";
			$code = "null";
		}

		return array(
			'link' => $link,
			'title' => $title,
			'code' => $code,
		);
	}

/**
 * Detect Web Browser versions
 */
	static function detect_browser_version($title, $useragent) {
		$lower_title = strtolower($title);
		$return = '';
		// Fix for Opera's UA string changes in v10.00+ (and others)
		$start = $title;
		if (($lower_title == strtolower("Opera")
			|| $lower_title == strtolower("Opera Next")
			|| $lower_title == strtolower("Opera Labs"))
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif (($lower_title == strtolower("Opera")
			|| $lower_title == strtolower("Opera Next")
			|| $lower_title == strtolower("Opera Developer"))
			&& preg_match('/OPR/i', $useragent)) {
			$start = "OPR";
		} elseif ($lower_title == strtolower("Opera Mobi")
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif ($lower_title == strtolower("Safari")
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif ($lower_title == strtolower("Pre")
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif ($lower_title == strtolower("Android Webkit")) {
			$start = "Version";
		} elseif ($lower_title == strtolower("Links")) {
			$start = "Links (";
		} elseif ($lower_title == strtolower("UC Browser")) {
			$start = "UC Browse";
		} elseif ($lower_title == strtolower("TenFourFox")) {
			$start = " rv";
		} elseif ($lower_title == strtolower("Classilla")) {
			$start = " rv";
		} elseif ($lower_title == strtolower("SmartTV")) {
			$start = "WebBrowser";
		} elseif ($lower_title == strtolower("MSIE") && preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $useragent)) {
			// We have IE11 or newer
			$start = " rv";
		} elseif ($lower_title == "spartan") {
			$start = "edge";
		}

		// Grab the browser version if its present
		$version = '';
		if (preg_match('/' . $start . '[\ |\/|\:]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
			if (count($regmatch) > 1) {
				$version = $regmatch[1];
			}

		}

		// $return = browser Title and Version, but first..some titles need to be changed
		if ($lower_title == "msie"
			&& strtolower($version) == "7.0"
			&& preg_match('/Trident\/4.0/i', $useragent)) {
			$return = " 8.0 (Compatibility Mode)"; // Fix for IE8 quirky UA string with Compatibility Mode enabled
		} elseif ($lower_title == "msie") {
			$return = " " . $version;
		} elseif ($lower_title == "multi-browser") {
			$return = "Multi-Browser XP " . $version;
		} elseif ($lower_title == "nf-browser") {
			$return = "NetFront " . $version;
		} elseif ($lower_title == "semc-browser") {
			$return = "SEMC Browser " . $version;
		} elseif ($lower_title == "ucweb" || $lower_title == "uc?browser") {
			$return = "UC Browser " . $version;
		} elseif ($lower_title == "ba?idubrowser|baiduhd") {
			$return = "Baidu Browser " . $version;
		} elseif ($lower_title == "up.browser"
			|| $lower_title == "up.link") {
			$return = "Openwave Mobile Browser " . $version;
		} elseif ($lower_title == "chromeframe") {
			$return = "Google Chrome Frame " . $version;
		} elseif ($lower_title == "mozilladeveloperpreview") {
			$return = "Mozilla Developer Preview " . $version;
		} elseif ($lower_title == "multi-browser") {
			$return = "Multi-Browser XP " . $version;
		} elseif ($lower_title == "opera mobi") {
			$return = "Opera Mobile " . $version;
		} elseif ($lower_title == "osb-browser") {
			$return = "Gtk+ WebCore " . $version;
		} elseif ($lower_title == "tablet browser") {
			$return = "MicroB " . $version;
		} elseif ($lower_title == "tencenttraveler") {
			$return = "TT Explorer " . $version;
		} elseif ($lower_title == "crmo") {
			$return = "Chrome Mobile " . $version;
		} elseif ($lower_title == "smarttv") {
			$return = "Maple Browser " . $version;
		} elseif ($lower_title == "wp-android"
			|| $lower_title == "wp-iphone") {
			//TODO check into Android version being $return =ed
			$return = "Wordpress App " . $version;
		} elseif ($lower_title == "atomicbrowser") {
			$return = "Atomic Web Browser " . $version;
		} elseif ($lower_title == "barcapro") {
			$return = "Barca Pro " . $version;
		} elseif ($lower_title == "dplus") {
			$return = "D+ " . $version;
		} elseif ($lower_title == "opera labs") {
			preg_match('/Edition\ Labs([\ ._0-9a-zA-Z]+);/i', $useragent, $regmatch);
			$return = $title . $regmatch[1] . " " . $version;
		} else {
			$return = $title . " " . $version;
		}

		return $return;
	}

}
?>
