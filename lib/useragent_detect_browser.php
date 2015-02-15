<?php
/**
 * Detect Web Browsers
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @author Kyle Baker <kyleabaker@gmail.com>
 * @author Fernando Briano <transformers.es@gmail.com>
 * @copyright Copyright 2014-2015 zsx
 * @copyright Copyright 2008-2014 Kyle Baker (email: kyleabaker@gmail.com)
 * @copyright 2008 Fernando Briano (email : transformers.es@gmail.com)
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Detect Web Browsers
 */

class useragent_detect_browser {

	private static $browserRegEx = array(
		'11(4|5)Browser',
		'2345(Explorer|chrome)',
		'360se|360ee|360\ aphone\ browser',
		'Abolimba',
		'Acoo\ Browser',
		'Alienforce',
		'Amaya',
		'Amiga-AWeb',
		'MRCHROME',
		'America\ Online\ Browser',
		'AmigaVoyager',
		'AOL',
		'Arora',
		'AtomicBrowser',
		'BarcaPro',
		'Barca',
		'Beamrise',
		'Beonex',
		'BA?IDUBrowser|BaiduHD',
		'BlackBerry',
		'Blackbird',
		'BlackHawk',
		'Blazer',
		'Bolt',
		'BonEcho',
		'BrowseX',
		'Browzar',
		'Bunjalloo',
		'Camino',
		'Cayman\ Browser',
		'Charon',
		'Cheshire',
		'Chimera',
		'chromeframe',
		'ChromePlus',
		'curl',
		'Iron',
		'Chromium',
		'Classilla',
		'Coast',
		'Columbus',
		'CometBird',
		'Comodo_Dragon',
		'Conkeror',
		'CoolNovo',
		'CoRom',
		'Crazy\ Browser',
		'CrMo',
		'Cruz',
		'Cyberdog',
		'DPlus',
		'Deepnet\ Explorer',
		'Demeter',
		'DeskBrowse',
		'Dillo',
		'DoCoMo',
		'DocZilla',
		'Dolfin',
		'Dooble',
		'Doris',
		'Dorothy',
		'DPlus',
		'Edbrowse',
		'E?links',
		'Element\ Browser',
		'Enigma\ Browser',
		'EnigmaFox',
		'Epic',
		'Epiphany',
		'Escape',
		'Fennec',
		'Firebird',
		'Fireweb\ Navigator',
		'Flock',
		'Fluid',
		'Galeon',
		'GlobalMojo',
		'GoBrowser',
		'Google\ Wireless\ Transcoder',
		'GoSurf',
		'GranParadiso',
		'GreenBrowser',
		'Hana',
		'HotJava',
		'Hv3',
		'Hydra\ Browser',
		'Iris',
		'IBM\ WebExplorer',
		'JuziBrowser',
		'MiuiBrowser',
		'MxNitro',
		'IBrowse',
		'iCab',
		'IceBrowser',
		'Iceape',
		'IceCat',
		'IceWeasel',
		'iNet\ Browser',
		'iRider',
		'InternetSurfboard',
		'Jasmine',
		'K-Meleon',
		'K-Ninja',
		'Kapiko',
		'Kazehakase',
		'Strata',
		'KKman',
		'KMail',
		'KMLite',
		'Konqueror',
		'Kylo',
		'LBrowser',
		'LBBrowser|Liebaofast',
		'LeechCraft',
		'Lobo',
		'lolifox',
		'Lorentz',
		'Lunascape',
		'Lynx',
		'Madfox',
		'Maemo\ Browser',
		'Maxthon',
		'\ MIB\/',
		'Tablet\ browser',
		'Midori',
		'Minefield',
		'MiniBrowser',
		'Minimo',
		'Mosaic',
		'MozillaDeveloperPreview',
		'Multi-Browser',
		'MultiZilla',
		'MyIE2',
		'myibrow',
		'Namoroka',
		'Navigator',
		'NetBox',
		'NetCaptor',
		'NetFront',
		'NetNewsWire',
		'NetPositive',
		'Netscape',
		'NetSurf',
		'NF-Browser',
		'NokiaBrowser',
		'Novarra-Vision',
		'Obigo',
		'OffByOne',
		'OmniWeb',
		'OneBrowser',
		'Orca',
		'Oregano',
		'Origyn\ Web\ Browser',
		'osb-browser',
		'Otter',
		'\ Pre\/',
		'Palemoon',
		'Patriott\:\:Browser',
		'Perk',
		'Phaseout',
		'Phoenix',
		'PlayStation\ 4',
		'Podkicker',
		'Podkicker\ Pro',
		'Pogo',
		'Polaris',
		'Prism',
		'M?QQBrowser',
		'QQ(?!Download|Pinyin)',
		'QtWeb\ Internet\ Browser',
		'QupZilla',
		'rekonq',
		'retawq',
		'RockMelt',
		'Ryouko',
		'SaaYaa',
		'SeaMonkey',
		'SEMC-Browser',
		'SEMC-java',
		'Shiira',
		'Shiretoko',
		'SiteKiosk',
		'SkipStone',
		'Skyfire',
		'Sleipnir',
		'Silk',
		'SlimBoat',
		'SlimBrowser',
		'SmartTV',
		'Songbird',
		'Stainless',
		'SubStream',
		'Sulfur',
		'Sundance',
		'Sunrise',
		'Sunrise',
		'Surf',
		'Swiftfox',
		'Swiftweasel',
		'Sylera',
		'TaoBrowser',
		'tear',
		'TeaShark',
		'Teleca',
		'TenFourFox',
		'TheWorld',
		'Thunderbird',
		'Tizen',
		'Tjusig',
		'TencentTraveler',
		'UC?\ ?Browser|UCWEB',
		'UltraBrowser',
		'UP.Browser',
		'UP.Link',
		'Usejump',
		'uZardWeb',
		'uZard',
		'uzbl',
		'Vimprobable',
		'Vivaldi',
		'Vonkeror',
		'w3m',
		'IEMobile',
		'WebianShell',
		'Webrender',
		'WeltweitimnetzBrowser',
		'wKiosk',
		'WorldWideWeb',
		'wget',
		'Wyzo',
		'X-Smiles',
		'Xiino',
		'YaBrowser',
		'zBrowser',
		'ZipZap');

	private static $browserList = array(
		'114browser' => array(
			'link' => 'http://ie.114la.com/',
			'title' => '{%114Browser%}',
			'code' => '114browser',
		),
		'115browser' => array(
			'link' => 'http://ie.115.com/',
			'title' => '{%115Browser%}',
			'code' => '115browser',
		),
		'2345explorer' => array(
			'link' => 'http://ie.2345.com/',
			'title' => '{%2345Explorer%}',
			'code' => '2345explorer',
		),
		'2345chrome' => array(
			'link' => 'http://chrome.2345.com/',
			'title' => '{%2345Chrome%}',
			'code' => '2345chrome',
		),
		'360se' => array(
			'link' => 'http://se.360.cn/',
			'title' => '360 Explorer',
			'code' => '360se',
		),
		'360ee' => array(
			'link' => 'http://chrome.360.cn/',
			'title' => '360 Chrome',
			'code' => '360se',
		),
		'360 aphone browser' => array(
			'link' => 'http://mse.360.cn/index.html',
			'title' => '360 Aphone Browser',
			'code' => '360se',
		),
		'abolimba' => array(
			'link' => 'http://www.aborange.de/products/freeware/abolimba-multibrowser.php',
			'title' => 'Abolimba',
			'code' => 'abolimba',
		),
		'acoo browser' => array(
			'link' => 'http://www.acoobrowser.com/',
			'title' => 'Acoo {%Browser%}',
			'code' => 'acoobrowser',
		),
		'alienforce' => array(
			'link' => 'http://sourceforge.net/projects/alienforce/',
			'title' => '{%Alienforce%}',
			'code' => 'alienforce',
		),
		'amaya' => array(
			'link' => 'http://www.w3.org/Amaya/',
			'title' => '{%Amaya%}',
			'code' => 'amaya',
		),
		'amiga-aweb' => array(
			'link' => 'http://aweb.sunsite.dk/',
			'title' => 'Amiga {%AWeb%}',
			'code' => 'amiga-aweb',
		),
		'mrchrome' => array(
			'link' => 'http://amigo.mail.ru/',
			'title' => 'Amigo',
			'code' => 'amigo',
		),
		'myibrow' => array(
			'link' => 'http://myinternetbrowser.webove-stranky.org/',
			'title' => '{%myibrow%}',
			'code' => 'my-internet-browser',
		),
		'america online browser' => array(
			'link' => 'http://downloads.channel.aol.com/browser',
			'title' => 'America Online {%Browser%}',
			'code' => 'aol',
		),
		'amigavoyager' => array(
			'link' => 'http://v3.vapor.com/voyager/',
			'title' => 'Amiga {%Voyager%}',
			'code' => 'amigavoyager',
		),
		'aol' => array(
			'link' => 'http://downloads.channel.aol.com/browser',
			'title' => '{%AOL%}',
			'code' => 'aol',
		),
		'arora' => array(
			'link' => 'http://code.google.com/p/arora/',
			'title' => '{%Arora%}',
			'code' => 'arora',
		),
		'atomicbrowser' => array(
			'link' => 'http://www.atomicwebbrowser.com/',
			'title' => '{%AtomicBrowser%}',
			'code' => 'atomicwebbrowser',
		),
		'barcapro' => array(
			'link' => 'http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27',
			'title' => '{%BarcaPro%}',
			'code' => 'barca',
		),
		'barca' => array(
			'link' => 'http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27',
			'title' => '{%Barca%}',
			'code' => 'barca',
		),
		'beamrise' => array(
			'link' => 'http://www.beamrise.com/',
			'title' => '{%Beamrise%}',
			'code' => 'beamrise',
		),
		'beonex' => array(
			'link' => 'http://www.beonex.com/',
			'title' => '{%Beonex%}',
			'code' => 'beonex',
		),
		'baidubrowser' => array(
			'link' => 'http://browser.baidu.com/',
			'title' => '{%baidubrowser%}',
			'code' => 'bidubrowser',
		),
		'bidubrowser' => array(
			'link' => 'http://browser.baidu.com/',
			'title' => '{%bidubrowser%}',
			'code' => 'bidubrowser',
		),
		'baiduhd' => array(
			'link' => 'http://browser.baidu.com/',
			'title' => '{%BaiduHD%}',
			'code' => 'bidubrowser',
		),
		'blackberry' => array(
			'link' => 'http://www.blackberry.com/',
			'title' => '{%BlackBerry%}',
			'code' => 'blackberry',
		),
		'blackbird' => array(
			'link' => 'http://www.blackbirdbrowser.com/',
			'title' => '{%Blackbird%}',
			'code' => 'blackbird',
		),
		'blackhawk' => array(
			'link' => 'http://www.netgate.sk/blackhawk/help/welcome-to-blackhawk-web-browser.html',
			'title' => '{%BlackHawk%}',
			'code' => 'blackhawk',
		),
		'blazer' => array(
			'link' => 'http://en.wikipedia.org/wiki/Blazer_(web_browser)',
			'title' => '{%Blazer%}',
			'code' => 'blazer',
		),
		'bolt' => array(
			'link' => 'http://www.boltbrowser.com/',
			'title' => '{%Bolt%}',
			'code' => 'bolt',
		),
		'bonecho' => array(
			'link' => 'http://www.mozilla.org/projects/minefield/',
			'title' => '{%BonEcho%}',
			'code' => 'firefoxdevpre',
		),
		'browsex' => array(
			'link' => 'http://pdqi.com/browsex/',
			'title' => 'BrowseX',
			'code' => 'browsex',
		),
		'browzar' => array(
			'link' => 'http://www.browzar.com/',
			'title' => '{%Browzar%}',
			'code' => 'browzar',
		),
		'bunjalloo' => array(
			'link' => 'http://code.google.com/p/quirkysoft/',
			'title' => '{%Bunjalloo%}',
			'code' => 'bunjalloo',
		),
		'camino' => array(
			'link' => 'http://www.caminobrowser.org/',
			'title' => '{%Camino%}',
			'code' => 'camino',
		),
		'cayman browser' => array(
			'link' => 'http://www.caymanbrowser.com/',
			'title' => 'Cayman {%Browser%}',
			'code' => 'caymanbrowser',
		),
		'charon' => array(
			'link' => 'http://en.wikipedia.org/wiki/Charon_(web_browser)',
			'title' => '{%Charon%}',
			'code' => 'null',
		),
		'cheshire' => array(
			'link' => 'http://downloads.channel.aol.com/browser',
			'title' => '{%Cheshire%}',
			'code' => 'aol',
		),
		'chimera' => array(
			'link' => 'http://www.chimera.org/',
			'title' => '{%Chimera%}',
			'code' => 'null',
		),
		'chromeframe' => array(
			'link' => 'http://code.google.com/chrome/chromeframe/',
			'title' => '{%chromeframe%}',
			'code' => 'chrome',
		),
		'chromeplus' => array(
			'link' => 'http://www.chromeplus.org/',
			'title' => '{%ChromePlus%}',
			'code' => 'chromeplus',
		),
		'iron' => array(
			'link' => 'http://www.srware.net/',
			'title' => 'SRWare {%Iron%}',
			'code' => 'srwareiron',
		),
		'chromium' => array(
			'link' => 'http://www.chromium.org/',
			'title' => '{%Chromium%}',
			'code' => 'chromium',
		),
		'classilla' => array(
			'link' => 'http://en.wikipedia.org/wiki/Classilla',
			'title' => '{%Classilla%}',
			'code' => 'classilla',
		),
		'coast' => array(
			'link' => 'http://coastbyopera.com/',
			'title' => '{%Coast%}',
			'code' => 'coast',
		),
		'columbus' => array(
			'link' => 'http://www.columbus-browser.com/',
			'title' => '{%Columbus%}',
			'code' => 'columbus',
		),
		'cometbird' => array(
			'link' => 'http://www.cometbird.com/',
			'title' => '{%CometBird%}',
			'code' => 'cometbird',
		),
		'comodo_dragon' => array(
			'link' => 'http://www.comodo.com/home/internet-security/browser.php',
			'title' => 'Comodo {%Dragon%}',
			'code' => 'comodo-dragon',
		),
		'conkeror' => array(
			'link' => 'http://www.conkeror.org/',
			'title' => '{%Conkeror%}',
			'code' => 'conkeror',
		),
		'coolnovo' => array(
			'link' => 'http://www.coolnovo.com/',
			'title' => '{%CoolNovo%}',
			'code' => 'coolnovo',
		),
		'corom' => array(
			'link' => 'http://en.wikipedia.org/wiki/C%E1%BB%9D_R%C3%B4m%2B_(browser)',
			'title' => '{%CoRom%}',
			'code' => 'corom',
		),
		'crazy browser' => array(
			'link' => 'http://www.crazybrowser.com/',
			'title' => 'Crazy {%Browser%}',
			'code' => 'crazybrowser',
		),
		'crmo' => array(
			'link' => 'http://www.google.com/chrome',
			'title' => '{%CrMo%}',
			'code' => 'chrome',
		),
		'cruz' => array(
			'link' => 'http://www.cruzapp.com/',
			'title' => '{%Cruz%}',
			'code' => 'cruz',
		),
		'cyberdog' => array(
			'link' => 'http://www.cyberdog.org/about/cyberdog/cyberbrowse.html',
			'title' => '{%Cyberdog%}',
			'code' => 'cyberdog',
		),
		'dplus' => array(
			'link' => 'http://dplus-browser.sourceforge.net/',
			'title' => '{%DPlus%}',
			'code' => 'dillo',
		),
		'deepnet explorer' => array(
			'link' => 'http://www.deepnetexplorer.com/',
			'title' => '{%Deepnet Explorer%}',
			'code' => 'deepnetexplorer',
		),
		'demeter' => array(
			'link' => 'http://www.hurrikenux.com/Demeter/',
			'title' => '{%Demeter%}',
			'code' => 'demeter',
		),
		'deskbrowse' => array(
			'link' => 'http://www.deskbrowse.org/',
			'title' => '{%DeskBrowse%}',
			'code' => 'deskbrowse',
		),
		'dillo' => array(
			'link' => 'http://www.dillo.org/',
			'title' => '{%Dillo%}',
			'code' => 'dillo',
		),
		'docomo' => array(
			'link' => 'http://www.nttdocomo.com/',
			'title' => '{%DoCoMo%}',
			'code' => 'null',
		),
		'doczilla' => array(
			'link' => 'http://www.doczilla.com/',
			'title' => '{%DocZilla%}',
			'code' => 'doczilla',
		),
		'dolfin' => array(
			'link' => 'http://www.samsungmobile.com/',
			'title' => '{%Dolfin%}',
			'code' => 'samsung',
		),
		'dooble' => array(
			'link' => 'http://dooble.sourceforge.net/',
			'title' => '{%Dooble%}',
			'code' => 'dooble',
		),
		'doris' => array(
			'link' => 'http://www.anygraaf.fi/browser/indexe.htm',
			'title' => '{%Doris%}',
			'code' => 'doris',
		),
		'dorothy' => array(
			'link' => 'http://www.dorothybrowser.com/',
			'title' => '{%Dorothy%}',
			'code' => 'dorothybrowser',
		),
		'dplus' => array(
			'link' => 'http://dplus-browser.sourceforge.net/',
			'title' => '{%DPlus%}',
			'code' => 'dillo',
		),
		'edbrowse' => array(
			'link' => 'http://edbrowse.sourceforge.net/',
			'title' => '{%Edbrowse%}',
			'code' => 'edbrowse',
		),
		'elinks' => array(
			'link' => 'http://elinks.or.cz/',
			'title' => '{%Elinks%}',
			'code' => 'elinks',
		),
		'element browser' => array(
			'link' => 'http://www.elementsoftware.co.uk/software/elementbrowser/',
			'title' => 'Element {%Browser%}',
			'code' => 'elementbrowser',
		),
		'enigma browser' => array(
			'link' => 'http://en.wikipedia.org/wiki/Enigma_Browser',
			'title' => 'Enigma {%Browser%}',
			'code' => 'enigmabrowser',
		),
		'enigmafox' => array(
			'link' => '#',
			'title' => '{%EnigmaFox%}',
			'code' => 'null',
		),
		'epic' => array(
			'link' => 'http://www.epicbrowser.com/',
			'title' => '{%Epic%}',
			'code' => 'epicbrowser',
		),
		'epiphany' => array(
			'link' => 'http://gnome.org/projects/epiphany/',
			'title' => '{%Epiphany%}',
			'code' => 'epiphany',
		),
		'escape' => array(
			'link' => 'http://www.espial.com/products/evo_browser/',
			'title' => '{%Escape%}',
			'code' => 'espialtvbrowser',
		),
		'fennec' => array(
			'link' => 'https://wiki.mozilla.org/Fennec',
			'title' => '{%Fennec%}',
			'code' => 'fennec',
		),
		'firebird' => array(
			'link' => 'http://seb.mozdev.org/firebird/',
			'title' => '{%Firebird%}',
			'code' => 'firebird',
		),
		'fireweb navigator' => array(
			'link' => 'http://www.arsslensoft.tk/?q=node/7',
			'title' => '{%Fireweb Navigator%}',
			'code' => 'firewebnavigator',
		),
		'flock' => array(
			'link' => 'http://www.flock.com/',
			'title' => '{%Flock%}',
			'code' => 'flock',
		),
		'fluid' => array(
			'link' => 'http://www.fluidapp.com/',
			'title' => '{%Fluid%}',
			'code' => 'fluid',
		),
		'galeon' => array(
			'link' => 'http://galeon.sourceforge.net/',
			'title' => '{%Galeon%}',
			'code' => 'galeon',
		),
		'globalmojo' => array(
			'link' => 'http://www.globalmojo.com/',
			'title' => '{%GlobalMojo%}',
			'code' => 'globalmojo',
		),
		'gobrowser' => array(
			'link' => 'http://www.gobrowser.cn/',
			'title' => 'GO {%Browser%}',
			'code' => 'gobrowser',
		),
		'google wireless transcoder' => array(
			'link' => 'http://google.com/gwt/n',
			'title' => 'Google Wireless Transcoder',
			'code' => 'google',
		),
		'gosurf' => array(
			'link' => 'http://gosurfbrowser.com/?ln=en',
			'title' => '{%GoSurf%}',
			'code' => 'gosurf',
		),
		'granparadiso' => array(
			'link' => 'http://www.mozilla.org/',
			'title' => '{%GranParadiso%}',
			'code' => 'firefoxdevpre',
		),
		'greenbrowser' => array(
			'link' => 'http://www.morequick.com/',
			'title' => '{%GreenBrowser%}',
			'code' => 'greenbrowser',
		),
		'hana' => array(
			'link' => 'http://www.alloutsoftware.com/',
			'title' => '{%Hana%}',
			'code' => 'hana',
		),
		'hotjava' => array(
			'link' => 'http://java.sun.com/products/archive/hotjava/',
			'title' => '{%HotJava%}',
			'code' => 'hotjava',
		),
		'hv3' => array(
			'link' => 'http://tkhtml.tcl.tk/hv3.html',
			'title' => '{%Hv3%}',
			'code' => 'hv3',
		),
		'hydra browser' => array(
			'link' => 'http://www.hydrabrowser.com/',
			'title' => 'Hydra Browser',
			'code' => 'hydrabrowser',
		),
		'iris' => array(
			'link' => 'http://www.torchmobile.com/',
			'title' => '{%Iris%}',
			'code' => 'iris',
		),
		'ibm webexplorer' => array(
			'link' => 'http://www.networking.ibm.com/WebExplorer/',
			'title' => 'IBM {%WebExplorer%}',
			'code' => 'ibmwebexplorer',
		),
		'juzibrowser' => array(
			'link' => 'http://www.123juzi.com/',
			'title' => 'JuziBrowser',
			'code' => 'juzibrowser',
		),
		'miuibrowser' => array(
			'link' => 'http://www.xiaomi.com/',
			'title' => '{%MiuiBrowser%}',
			'code' => 'miuibrowser',
		),
		'mxnitro' => array(
			'link' => 'http://www.maxthon.com/nitro/',
			'title' => '{%MxNitro%}',
			'code' => 'mxnitro',
		),
		'ibrowse' => array(
			'link' => 'http://www.ibrowse-dev.net/',
			'title' => '{%IBrowse%}',
			'code' => 'ibrowse',
		),
		'icab' => array(
			'link' => 'http://www.icab.de/',
			'title' => '{%iCab%}',
			'code' => 'icab',
		),
		'icebrowser' => array(
			'link' => 'http://www.icesoft.com/products/icebrowser.html',
			'title' => '{%IceBrowser%}',
			'code' => 'icebrowser',
		),
		'iceape' => array(
			'link' => 'http://packages.debian.org/iceape',
			'title' => '{%Iceape%}',
			'code' => 'iceape',
		),
		'icecat' => array(
			'link' => 'http://gnuzilla.gnu.org/',
			'title' => 'GNU {%IceCat%}',
			'code' => 'icecat',
		),
		'iceweasel' => array(
			'link' => 'http://www.geticeweasel.org/',
			'title' => '{%IceWeasel%}',
			'code' => 'iceweasel',
		),
		'inet browser' => array(
			'link' => 'http://alexanderjbeston.wordpress.com/',
			'title' => 'iNet {%Browser%}',
			'code' => 'null',
		),
		'irider' => array(
			'link' => 'http://en.wikipedia.org/wiki/IRider',
			'title' => '{%iRider%}',
			'code' => 'irider',
		),
		'internetsurfboard' => array(
			'link' => 'http://inetsurfboard.sourceforge.net/',
			'title' => '{%InternetSurfboard%}',
			'code' => 'internetsurfboard',
		),
		'jasmine' => array(
			'link' => 'http://www.samsungmobile.com/',
			'title' => '{%Jasmine%}',
			'code' => 'samsung',
		),
		'k-meleon' => array(
			'link' => 'http://kmeleon.sourceforge.net/',
			'title' => '{%K-Meleon%}',
			'code' => 'kmeleon',
		),
		'k-ninja' => array(
			'link' => 'http://k-ninja-samurai.en.softonic.com/',
			'title' => '{%K-Ninja%}',
			'code' => 'kninja',
		),
		'kapiko' => array(
			'link' => 'http://ufoxlab.googlepages.com/cooperation',
			'title' => '{%Kapiko%}',
			'code' => 'kapiko',
		),
		'kazehakase' => array(
			'link' => 'http://kazehakase.sourceforge.jp/',
			'title' => '{%Kazehakase%}',
			'code' => 'kazehakase',
		),
		'strata' => array(
			'link' => 'http://www.kirix.com/',
			'title' => 'Kirix {%Strata%}',
			'code' => 'kirix-strata',
		),
		'kkman' => array(
			'link' => 'http://www.kkman.com.tw/',
			'title' => '{%KKman%}',
			'code' => 'kkman',
		),
		'kmail' => array(
			'link' => 'http://kontact.kde.org/kmail/',
			'title' => '{%KMail%}',
			'code' => 'kmail',
		),
		'kmlite' => array(
			'link' => 'http://en.wikipedia.org/wiki/K-Meleon',
			'title' => '{%KMLite%}',
			'code' => 'kmeleon',
		),
		'konqueror' => array(
			'link' => 'http://konqueror.kde.org/',
			'title' => '{%Konqueror%}',
			'code' => 'konqueror',
		),
		'kylo' => array(
			'link' => 'http://kylo.tv/',
			'title' => '{%Kylo%}',
			'code' => 'kylo',
		),
		'lbrowser' => array(
			'link' => 'http://wiki.freespire.org/index.php/Web_Browser',
			'title' => '{%LBrowser%}',
			'code' => 'lbrowser',
		),
		'links' => array(
			'link' => 'http://links.twibright.com/',
			'title' => '{%Links%}',
			'code' => 'null',
		),
		'lbbrowser' => array(
			'link' => 'http://www.liebao.cn/',
			'title' => 'Liebao Browser',
			'code' => 'lbbrowser',
		),
		'liebaofast' => array(
			'link' => 'http://m.liebao.cn/',
			'title' => '{%Liebaofast%}',
			'code' => 'lbbrowser',
		),
		'leechcraft' => array(
			'link' => 'http://leechcraft.org/',
			'title' => 'LeechCraft',
			'code' => 'null',
		),
		'lobo' => array(
			'link' => 'http://www.lobobrowser.org/',
			'title' => '{%Lobo%}',
			'code' => 'lobo',
		),
		'lolifox' => array(
			'link' => 'http://www.lolifox.com/',
			'title' => '{%lolifox%}',
			'code' => 'lolifox',
		),
		'lorentz' => array(
			'link' => 'http://news.softpedia.com/news/Firefox-Codenamed-Lorentz-Drops-in-March-2010-130855.shtml',
			'title' => '{%Lorentz%}',
			'code' => 'firefoxdevpre',
		),
		'lunascape' => array(
			'link' => 'http://www.lunascape.tv',
			'title' => '{%Lunascape%}',
			'code' => 'lunascape',
		),
		'lynx' => array(
			'link' => 'http://lynx.browser.org/',
			'title' => '{%Lynx%}',
			'code' => 'lynx',
		),
		'madfox' => array(
			'link' => 'http://en.wikipedia.org/wiki/Madfox',
			'title' => '{%Madfox%}',
			'code' => 'madfox',
		),
		'maemo browser' => array(
			'link' => 'http://maemo.nokia.com/features/maemo-browser/',
			'title' => '{%Maemo Browser%}',
			'code' => 'maemo',
		),
		'maxthon' => array(
			'link' => 'http://www.maxthon.com/',
			'title' => '{%Maxthon%}',
			'code' => 'maxthon',
		),
		' mib/' => array(
			'link' => 'http://www.motorola.com/content.jsp?globalObjectId=1827-4343',
			'title' => '{%MIB%}',
			'code' => 'mib',
		),
		'tablet browser' => array(
			'link' => 'http://browser.garage.maemo.org/',
			'title' => '{%Tablet browser%}',
			'code' => 'microb',
		),
		'midori' => array(
			'link' => 'http://www.twotoasts.de/index.php?/pages/midori_summary.html',
			'title' => '{%Midori%}',
			'code' => 'midori',
		),
		'minefield' => array(
			'link' => 'http://www.mozilla.org/projects/minefield/',
			'title' => '{%Minefield%}',
			'code' => 'minefield',
		),
		'minibrowser' => array(
			'link' => 'http://dmkho.tripod.com/',
			'title' => '{%MiniBrowser%}',
			'code' => 'minibrowser',
		),
		'minimo' => array(
			'link' => 'http://www-archive.mozilla.org/projects/minimo/',
			'title' => '{%Minimo%}',
			'code' => 'minimo',
		),
		'mosaic' => array(
			'link' => 'http://en.wikipedia.org/wiki/Mosaic_(web_browser)',
			'title' => '{%Mosaic%}',
			'code' => 'mosaic',
		),
		'mozilladeveloperpreview' => array(
			'link' => 'http://www.mozilla.org/projects/devpreview/releasenotes/',
			'title' => '{%MozillaDeveloperPreview%}',
			'code' => 'firefoxdevpre',
		),
		'mqqbrowser' => array(
			'link' => 'http://browser.qq.com/',
			'title' => '{%MQQBrowser%}',
			'code' => 'qqbrowser',
		),
		'multi-browser' => array(
			'link' => 'http://www.multibrowser.de/',
			'title' => '{%Multi-Browser%}',
			'code' => 'multi-browserxp',
		),
		'multizilla' => array(
			'link' => 'http://multizilla.mozdev.org/',
			'title' => '{%MultiZilla%}',
			'code' => 'mozilla',
		),
		'myie2' => array(
			'link' => 'http://www.myie2.com/',
			'title' => '{%MyIE2%}',
			'code' => 'myie2',
		),
		'namoroka' => array(
			'link' => 'https://wiki.mozilla.org/Firefox/Namoroka',
			'title' => '{%Namoroka%}',
			'code' => 'firefoxdevpre',
		),
		'navigator' => array(
			'link' => 'http://netscape.aol.com/',
			'title' => 'Netscape {%Navigator%}',
			'code' => 'netscape',
		),
		'netbox' => array(
			'link' => 'http://www.netgem.com/',
			'title' => '{%NetBox%}',
			'code' => 'netbox',
		),
		'netcaptor' => array(
			'link' => 'http://www.netcaptor.com/',
			'title' => '{%NetCaptor%}',
			'code' => 'netcaptor',
		),
		'netfront' => array(
			'link' => 'http://www.access-company.com/',
			'title' => '{%NetFront%}',
			'code' => 'netfront',
		),
		'netnewswire' => array(
			'link' => 'http://www.newsgator.com/individuals/netnewswire/',
			'title' => '{%NetNewsWire%}',
			'code' => 'netnewswire',
		),
		'netpositive' => array(
			'link' => 'http://en.wikipedia.org/wiki/NetPositive',
			'title' => '{%NetPositive%}',
			'code' => 'netpositive',
		),
		'netscape' => array(
			'link' => 'http://netscape.aol.com/',
			'title' => '{%Netscape%}',
			'code' => 'netscape',
		),
		'netsurf' => array(
			'link' => 'http://www.netsurf-browser.org/',
			'title' => '{%NetSurf%}',
			'code' => 'netsurf',
		),
		'nf-browser' => array(
			'link' => 'http://www.access-company.com/',
			'title' => '{%NF-Browser%}',
			'code' => 'netfront',
		),
		'nokiabrowser' => array(
			'link' => 'http://browser.nokia.com/',
			'title' => 'Nokia {%Browser%}',
			'code' => 'nokia',
		),
		'novarra-vision' => array(
			'link' => 'http://www.novarra.com/',
			'title' => 'Novarra {%Vision%}',
			'code' => 'novarra',
		),
		'obigo' => array(
			'link' => 'http://en.wikipedia.org/wiki/Obigo_Browser',
			'title' => '{%Obigo%}',
			'code' => 'obigo',
		),
		'offbyone' => array(
			'link' => 'http://www.offbyone.com/',
			'title' => 'Off By One',
			'code' => 'offbyone',
		),
		'omniweb' => array(
			'link' => 'http://www.omnigroup.com/applications/omniweb/',
			'title' => '{%OmniWeb%}',
			'code' => 'omniweb',
		),
		'onebrowser' => array(
			'link' => 'http://one-browser.com/',
			'title' => '{%OneBrowser%}',
			'code' => 'onebrowser',
		),
		'orca' => array(
			'link' => 'http://www.orcabrowser.com/',
			'title' => '{%Orca%}',
			'code' => 'orca',
		),
		'oregano' => array(
			'link' => 'http://en.wikipedia.org/wiki/Oregano_(web_browser)',
			'title' => '{%Oregano%}',
			'code' => 'oregano',
		),
		'origyn web browser' => array(
			'link' => 'http://www.sand-labs.org/owb',
			'title' => 'Oregano Web Browser',
			'code' => 'owb',
		),
		'osb-browser' => array(
			'link' => 'http://gtk-webcore.sourceforge.net/',
			'title' => '{%osb-browser%}',
			'code' => 'null',
		),
		'otter' => array(
			'link' => 'http://otter-browser.org/',
			'title' => '{%Otter%}',
			'code' => 'otter',
		),
		' pre/' => array(
			'link' => 'http://www.palm.com/us/products/phones/pre/index.html',
			'title' => 'Palm {%Pre%}',
			'code' => 'palmpre',
		),
		'palemoon' => array(
			'link' => 'http://www.palemoon.org/',
			'title' => 'Pale {%Moon%}',
			'code' => 'palemoon',
		),
		'patriott::browser' => array(
			'link' => 'http://madgroup.x10.mx/patriott1.php',
			'title' => 'Patriott {%Browser%}',
			'code' => 'patriott',
		),
		'perk' => array(
			'link' => 'http://www.perk.com/',
			'title' => '{%Perk%}',
			'code' => 'perk',
		),
		'phaseout' => array(
			'link' => 'http://www.phaseout.net/',
			'title' => 'Phaseout',
			'code' => 'phaseout',
		),
		'phoenix' => array(
			'link' => 'http://www.mozilla.org/projects/phoenix/phoenix-release-notes.html',
			'title' => '{%Phoenix%}',
			'code' => 'phoenix',
		),
		'playstation 4' => array(
			'link' => 'http://us.playstation.com/',
			'title' => 'PS4 Web Browser',
			'code' => 'webkit',
		),
		'podkicker' => array(
			'link' => 'http://www.podkicker.com/',
			'title' => '{%Podkicker%}',
			'code' => 'podkicker',
		),
		'podkicker pro' => array(
			'link' => 'http://www.podkicker.com/',
			'title' => '{%Podkicker Pro%}',
			'code' => 'podkicker',
		),
		'pogo' => array(
			'link' => 'http://en.wikipedia.org/wiki/AT%26T_Pogo',
			'title' => '{%Pogo%}',
			'code' => 'pogo',
		),
		'polaris' => array(
			'link' => 'http://www.infraware.co.kr/eng/01_product/product02.asp',
			'title' => '{%Polaris%}',
			'code' => 'polaris',
		),
		'prism' => array(
			'link' => 'http://prism.mozillalabs.com/',
			'title' => '{%Prism%}',
			'code' => 'prism',
		),
		'qqbrowser' => array(
			'link' => 'http://browser.qq.com/',
			'title' => '{%QQBrowser%}',
			'code' => 'qqbrowser',
		),
		'qq' => array(
			'link' => 'http://im.qq.com/',
			'title' => '{%QQ%}',
			'code' => 'qq',
		),
		'qtweb internet browser' => array(
			'link' => 'http://www.qtweb.net/',
			'title' => 'QtWeb Internet {%Browser%}',
			'code' => 'qtwebinternetbrowser',
		),
		'qupzilla' => array(
			'link' => 'http://www.qupzilla.com/',
			'title' => '{%QupZilla%}',
			'code' => 'qupzilla',
		),
		'rekonq' => array(
			'link' => 'http://rekonq.sourceforge.net/',
			'title' => 'rekonq',
			'code' => 'rekonq',
		),
		'retawq' => array(
			'link' => 'http://retawq.sourceforge.net/',
			'title' => '{%retawq%}',
			'code' => 'terminal',
		),
		'rockmelt' => array(
			'link' => 'http://www.rockmelt.com/',
			'title' => '{%RockMelt%}',
			'code' => 'rockmelt',
		),
		'ryouko' => array(
			'link' => 'http://sourceforge.net/projects/ryouko/',
			'title' => '{%Ryouko%}',
			'code' => 'ryouko',
		),
		'saayaa' => array(
			'link' => 'http://www.saayaa.com/',
			'title' => 'SaaYaa Explorer',
			'code' => 'saayaa',
		),
		'seamonkey' => array(
			'link' => 'http://www.seamonkey-project.org/',
			'title' => '{%SeaMonkey%}',
			'code' => 'seamonkey',
		),
		'semc-browser' => array(
			'link' => 'http://www.sonyericsson.com/',
			'title' => '{%SEMC-Browser%}',
			'code' => 'semcbrowser',
		),
		'semc-java' => array(
			'link' => 'http://www.sonyericsson.com/',
			'title' => '{%SEMC-java%}',
			'code' => 'semcbrowser',
		),
		'shiira' => array(
			'link' => 'http://www.shiira.jp/en.php',
			'title' => '{%Shiira%}',
			'code' => 'shiira',
		),
		'shiretoko' => array(
			'link' => 'http://www.mozilla.org/',
			'title' => '{%Shiretoko%}',
			'code' => 'firefoxdevpre',
		),
		'sitekiosk' => array(
			'link' => 'http://www.sitekiosk.com/SiteKiosk/Default.aspx',
			'title' => '{%SiteKiosk%}',
			'code' => 'sitekiosk',
		),
		'skipstone' => array(
			'link' => 'http://www.muhri.net/skipstone/',
			'title' => '{%SkipStone%}',
			'code' => 'skipstone',
		),
		'skyfire' => array(
			'link' => 'http://www.skyfire.com/',
			'title' => '{%Skyfire%}',
			'code' => 'skyfire',
		),
		'sleipnir' => array(
			'link' => 'http://www.fenrir-inc.com/other/sleipnir/',
			'title' => '{%Sleipnir%}',
			'code' => 'sleipnir',
		),
		'silk' => array(
			'link' => 'http://en.wikipedia.org/wiki/Amazon_Silk/',
			'title' => 'Amazon {%Silk%}',
			'code' => 'silk',
		),
		'slimboat' => array(
			'link' => 'http://slimboat.com/',
			'title' => '{%SlimBoat%}',
			'code' => 'slimboat',
		),
		'slimbrowser' => array(
			'link' => 'http://www.flashpeak.com/sbrowser/',
			'title' => '{%SlimBrowser%}',
			'code' => 'slimbrowser',
		),
		'smarttv' => array(
			'link' => 'http://www.freethetvchallenge.com/details/faq',
			'title' => '{%SmartTV%}',
			'code' => 'maplebrowser',
		),
		'songbird' => array(
			'link' => 'http://www.getsongbird.com/',
			'title' => '{%Songbird%}',
			'code' => 'songbird',
		),
		'stainless' => array(
			'link' => 'http://www.stainlessapp.com/',
			'title' => '{%Stainless%}',
			'code' => 'stainless',
		),
		'substream' => array(
			'link' => 'http://itunes.apple.com/us/app/substream/id389906706?mt=8',
			'title' => '{%SubStream%}',
			'code' => 'substream',
		),
		'sulfur' => array(
			'link' => 'http://www.flock.com/',
			'title' => 'Flock {%Sulfur%}',
			'code' => 'flock',
		),
		'sundance' => array(
			'link' => 'http://digola.com/sundance.html',
			'title' => '{%Sundance%}',
			'code' => 'sundance',
		),
		'sunrise' => array(
			'link' => 'http://www.sundialbrowser.com/',
			'title' => '{%Sundial%}',
			'code' => 'sundial',
		),
		'sunrise' => array(
			'link' => 'http://www.sunrisebrowser.com/',
			'title' => '{%Sunrise%}',
			'code' => 'sunrise',
		),
		'surf' => array(
			'link' => 'http://surf.suckless.org/',
			'title' => '{%Surf%}',
			'code' => 'surf',
		),
		'swiftfox' => array(
			'link' => 'http://www.getswiftfox.com/',
			'title' => '{%Swiftfox%}',
			'code' => 'swiftfox',
		),
		'swiftweasel' => array(
			'link' => 'http://swiftweasel.tuxfamily.org/',
			'title' => '{%Swiftweasel%}',
			'code' => 'swiftweasel',
		),
		'sylera' => array(
			'link' => 'http://dombla.net/sylera/',
			'title' => '{%Sylera%}',
			'code' => 'null',
		),
		'taobrowser' => array(
			'link' => 'http://browser.taobao.com/',
			'title' => '{%TaoBrowser%}',
			'code' => 'taobrowser',
		),
		'tear' => array(
			'link' => 'http://wiki.maemo.org/Tear',
			'title' => 'Tear',
			'code' => 'tear',
		),
		'teashark' => array(
			'link' => 'http://www.teashark.com/',
			'title' => '{%TeaShark%}',
			'code' => 'teashark',
		),
		'teleca' => array(
			'link' => 'http://en.wikipedia.org/wiki/Obigo_Browser/',
			'title' => '{%Teleca%}',
			'code' => 'obigo',
		),
		'tencenttraveler' => array(
			'link' => 'http://www.tencent.com/en-us/index.shtml',
			'title' => 'Tencent {%Traveler%}',
			'code' => 'tencenttraveler',
		),
		'tenfourfox' => array(
			'link' => 'http://en.wikipedia.org/wiki/TenFourFox',
			'title' => '{%TenFourFox%}',
			'code' => 'tenfourfox',
		),
		'theworld' => array(
			'link' => 'http://www.ioage.com/',
			'title' => 'TheWorld Browser',
			'code' => 'theworld',
		),
		'thunderbird' => array(
			'link' => 'http://www.mozilla.com/thunderbird/',
			'title' => '{%Thunderbird%}',
			'code' => 'thunderbird',
		),
		'tizen' => array(
			'link' => 'https://www.tizen.org/',
			'title' => '{%Tizen%}',
			'code' => 'tizen',
		),
		'tjusig' => array(
			'link' => 'http://www.tjusig.cz/',
			'title' => '{%Tjusig%}',
			'code' => 'tjusig',
		),
		'ubrowser' => array(
			'link' => 'http://www.uc.cn/',
			'title' => '{%UBrowser%}',
			'code' => 'ucbrowser',
		),
		'ucbrowser' => array(
			'link' => 'http://www.uc.cn/',
			'title' => '{%UCBrowser%}',
			'code' => 'ucbrowser',
		),
		'uc browser' => array(
			'link' => 'http://www.uc.cn/English/index.shtml',
			'title' => '{%UC Browser%}',
			'code' => 'ucbrowser',
		),
		'ucweb' => array(
			'link' => 'http://www.ucweb.com/English/product.shtml',
			'title' => '{%UCWEB%}',
			'code' => 'ucbrowser',
		),
		'ultrabrowser' => array(
			'link' => 'http://www.ultrabrowser.com/',
			'title' => '{%UltraBrowser%}',
			'code' => 'ultrabrowser',
		),
		'up.browser' => array(
			'link' => 'http://www.openwave.com/',
			'title' => '{%UP.Browser%}',
			'code' => 'openwave',
		),
		'up.link' => array(
			'link' => 'http://www.openwave.com/',
			'title' => '{%UP.Link%}',
			'code' => 'openwave',
		),
		'usejump' => array(
			'link' => 'http://www.usejump.com/',
			'title' => '{%Usejump%}',
			'code' => 'usejump',
		),
		'uzardweb' => array(
			'link' => 'http://en.wikipedia.org/wiki/UZard_Web',
			'title' => '{%uZardWeb%}',
			'code' => 'uzardweb',
		),
		'uzard' => array(
			'link' => 'http://en.wikipedia.org/wiki/UZard_Web',
			'title' => '{%uZard%}',
			'code' => 'uzardweb',
		),
		'uzbl' => array(
			'link' => 'http://www.uzbl.org/',
			'title' => 'uzbl',
			'code' => 'uzbl',
		),
		'vimprobable' => array(
			'link' => 'http://www.vimprobable.org/',
			'title' => '{%Vimprobable%}',
			'code' => 'null',
		),
		'vivaldi' => array(
			'link' => 'http://www.vivaldi.com',
			'title' => '{%Vivaldi%}',
			'code' => 'vivaldi',
		),
		'vonkeror' => array(
			'link' => 'http://zzo38computer.cjb.net/vonkeror/',
			'title' => '{%Vonkeror%}',
			'code' => 'null',
		),
		'w3m' => array(
			'link' => 'http://w3m.sourceforge.net/',
			'title' => '{%W3M%}',
			'code' => 'w3m',
		),
		'wget' => array(
			'link' => 'https://www.gnu.org/software/wget/',
			'title' => '{%wget%}',
			'code' => 'null',
		),
		'curl' => array(
			'link' => 'http://curl.haxx.se/',
			'title' => '{%curl%}',
			'code' => 'null',
		),
		'iemobile' => array(
			'link' => 'http://www.microsoft.com/windowsmobile/en-us/downloads/microsoft/internet-explorer-mobile.mspx',
			'title' => '{%IEMobile%}',
			'code' => 'msie-mobile',
		),
		'webianshell' => array(
			'link' => 'http://webian.org/shell/',
			'title' => 'Webian {%Shell%}',
			'code' => 'webianshell',
		),
		'webrender' => array(
			'link' => 'http://webrender.99k.org/',
			'title' => 'Webrender',
			'code' => 'webrender',
		),
		'weltweitimnetzbrowser' => array(
			'link' => 'http://weltweitimnetz.de/software/Browser.en.page',
			'title' => 'Weltweitimnetz {%Browser%}',
			'code' => 'weltweitimnetzbrowser',
		),
		'wkiosk' => array(
			'link' => 'http://www.app4mac.com/store/index.php?target=products&product_id=9',
			'title' => 'wKiosk',
			'code' => 'wkiosk',
		),
		'worldwideweb' => array(
			'link' => 'http://www.w3.org/People/Berners-Lee/WorldWideWeb.html',
			'title' => '{%WorldWideWeb%}',
			'code' => 'worldwideweb',
		),
		'wyzo' => array(
			'link' => 'http://www.wyzo.com/',
			'title' => '{%Wyzo%}',
			'code' => 'Wyzo',
		),
		'x-smiles' => array(
			'link' => 'http://www.xsmiles.org/',
			'title' => '{%X-Smiles%}',
			'code' => 'x-smiles',
		),
		'xiino' => array(
			'link' => '#',
			'title' => '{%Xiino%}',
			'code' => 'null',
		),
		'yabrowser' => array(
			'link' => 'http://browser.yandex.com/',
			'title' => 'Yandex.{%Browser%}',
			'code' => 'yandex',
		),
		'zbrowser' => array(
			'link' => 'http://sites.google.com/site/zeromusparadoxe01/zbrowser',
			'title' => '{%zBrowser%}',
			'code' => 'zbrowser',
		),
		'zipzap' => array(
			'link' => 'http://www.zipzaphome.com/',
			'title' => '{%ZipZap%}',
			'code' => 'zipzap',
		),
		'abrowse' => array(
			'link' => 'http://abrowse.sourceforge.net/',
			'title' => 'ABrowse {%Browser%}',
			'code' => 'abrowse',
		),
		'firefox' => array(
			'link' => 'http://www.mozilla.org/',
			'title' => '{%Firefox%}',
			'code' => 'firefox',
		),
		'none' => array(
			'link' => '#',
			'title' => 'Unknown',
			'code' => 'unknown',
		),

	);
	private static $useragent;

	public static function analyze($useragent) {
		self::$useragent = $useragent;

		$link = '';
		$title = '';
		$code = '';
		$web_browser = '';
		$mobile = 0;

		$result = array();
		$regExList = '/(' . implode('|', self::$browserRegEx) . ')/i';

		if (preg_match($regExList, $useragent, $result)) {
			$name = strtolower($result[1]);
			if (isset(self::$browserList[$name])) {
				$result = self::$browserList[$name];
				$result['title'] = preg_replace_callback('/\{\%(.+)\%\}/', array('useragent_detect_browser', 'detect_browser_version'), $result['title']);
				return $result;
			} else {
				return self::$browserList['none'];
			}
		} elseif (preg_match('/Galaxy/i', $useragent)
			&& !preg_match('/Chrome/i', $useragent)) {
			$link = "http://www.traos.org/";
			$title = self::detect_browser_version(array('', 'Galaxy'));
			$code = "galaxy";
		} elseif (preg_match('/Opera Mini/i', $useragent)) {
			$link = "http://www.opera.com/mini/";
			$title = self::detect_browser_version(array('', 'Opera Mini'));
			$code = "opera-2";
		} elseif (preg_match('/Opera Mobi/i', $useragent)) {
			$link = "http://www.opera.com/mobile/";
			$title = self::detect_browser_version(array('', 'Opera Mobi'));
			$code = "opera-2";
		} elseif (preg_match('/Opera Labs/i', $useragent)
			|| (preg_match('/Opera/i', $useragent)
				&& preg_match('/Edition Labs/i', $useragent))) {
			$link = "http://labs.opera.com/";
			$title = self::detect_browser_version(array('', 'Opera Labs'));
			$code = "opera-next";
		} elseif (preg_match('/Opera Next/i', $useragent)
			|| (preg_match('/Opera/i', $useragent)
				&& preg_match('/Edition Next/i', $useragent))) {
			$link = "http://www.opera.com/support/kb/view/991/";
			$title = self::detect_browser_version(array('', 'Opera Next'));
			$code = "opera-next";
		} elseif (preg_match('/Opera/i', $useragent)) {
			$link = "http://www.opera.com/";
			$title = self::detect_browser_version(array('', 'Opera'));
			$code = "opera-1";
			if (preg_match('/Version/i', $useragent)) {
				$code = "opera-2";
			}

		} elseif (preg_match('/OPR/i', $useragent)) {
			$link = "http://www.opera.com/";
			if (preg_match('/(Edition Next)/i', $useragent)) {
				$title = self::detect_browser_version(array('', 'Opera Next'));
				$code = "opera-next";
			} elseif (preg_match('/(Edition Developer)/i', $useragent)) {
				$title = self::detect_browser_version(array('', 'Opera Developer'));
				$code = "opera-developer";
			} else {
				$title = self::detect_browser_version(array('', 'Opera'));
				$code = "opera-1";
			}

		} elseif (preg_match('/Series60/i', $useragent)
			&& !preg_match('/Symbian/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Web_Browser_for_S60";
			$title = "Nokia " . self::detect_browser_version(array('', 'Series60'));
			$code = "s60";
		} elseif (preg_match('/S60/i', $useragent)
			&& !preg_match('/Symbian/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Web_Browser_for_S60";
			$title = "Nokia " . self::detect_browser_version(array('', 'S60'));
			$code = "s60";
		} elseif (preg_match('/SE\ /i', $useragent)
			&& preg_match('/MetaSr/i', $useragent)) {
			$link = "http://ie.sogou.com/";
			$title = "Sogou Explorer";
			$code = "sogou";

		} elseif ((preg_match('/Ubuntu\;\ Mobile/i', $useragent) || preg_match('/Ubuntu\;\ Tablet/i', $useragent) &&
			preg_match('/WebKit/i', $useragent))) {
			$link = "https://launchpad.net/webbrowser-app";
			$title = "Ubuntu Web Browser";
			$code = "ubuntuwebbrowser";
			$code = "ubuntuwebbrowser";

		} elseif (preg_match('/Avant\ Browser/i', $useragent)) {
			$link = "http://www.avantbrowser.com/";
			$title = "Avant " . self::detect_browser_version(array('', 'Browser'));
			$code = "avantbrowser";
		} elseif (preg_match('/AppleWebkit/i', $useragent)
			&& preg_match('/Android/i', $useragent)
			&& !preg_match('/Chrome/i', $useragent)) {
			$link = "http://developer.android.com/reference/android/webkit/package-summary.html";
			$title = self::detect_browser_version(array('', 'Android Webkit'));
			$code = "android-webkit";
		} elseif (preg_match('/Chrome|crios/i', $useragent)) {

			// Note: For IE11 Experimental Web Platform Features in Windows 10
			// Spartan? Who knows.
			if (preg_match('/Windows NT 1.+Edge/i', $useragent)) {
				$link = "http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
				$title = "Internet Explorer " . self::detect_browser_version(array('', 'Spartan'));
				$code = "msie11";
			} else if (preg_match('/crios/i', $useragent)) {
				$link = "http://google.com/chrome/";
				$title = "Google " . self::detect_browser_version(array('', 'CriOS'));
				$code = "chrome";
			} else {
				$link = "http://google.com/chrome/";
				$title = "Google " . self::detect_browser_version(array('', 'Chrome'));
				$code = "chrome";
			}
		} elseif (preg_match('/Safari/i', $useragent)
			&& !preg_match('/Nokia/i', $useragent)) {
			$link = "http://www.apple.com/safari/";
			$title = "Safari";

			if (preg_match('/Version/i', $useragent)) {
				$title = self::detect_browser_version(array('', 'Safari'));
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
			$title = self::detect_browser_version(array('', 'Firefox'));
			$code = "firefox";
		} elseif (preg_match('/MSIE/i', $useragent) || preg_match('/Trident/i', $useragent)) {
			$link = "http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
			$title = "Internet Explorer" . self::detect_browser_version(array('', 'MSIE'));

			if (preg_match('/MSIE[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				// We have IE10 or older
			} elseif (preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				// We have IE11 or newer
			}
			$code = "msie";

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
				}
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
	static function detect_browser_version($object) {
		$useragent = self::$useragent;
		$title = $object[1];
		$lower_title = strtolower($title);
		$return = '';
		// Fix for Opera's UA string changes in v10.00+ (and others)
		$start = $title;
		if (($lower_title == "opera"
			|| $lower_title == "opera next"
			|| $lower_title == "opera labs")
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif (($lower_title == "opera"
			|| $lower_title == "opera next"
			|| $lower_title == "opera developer")
			&& preg_match('/OPR/i', $useragent)) {
			$start = "OPR";
		} elseif ($lower_title == "opera mobi"
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif ($lower_title == "safari"
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif ($lower_title == "pre"
			&& preg_match('/Version/i', $useragent)) {
			$start = "Version";
		} elseif ($lower_title == "android webkit") {
			$start = "Version";
		} elseif ($lower_title == "links") {
			$start = "Links (";
		} elseif ($lower_title == "uc browser") {
			$start = "UC Browser";
		} elseif ($lower_title == "tenfourfox") {
			$start = " rv";
		} elseif ($lower_title == "classilla") {
			$start = " rv";
		} elseif ($lower_title == "smarttv") {
			$start = "WebBrowser";
		} elseif ($lower_title == "ucweb"
			&& preg_match('/UCBrowser/i', $useragent)) {
			$start = "UCBrowser";
		} elseif ($lower_title == "msie" && preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $useragent)) {
			// We have IE11 or newer
			$start = " rv";
		} elseif ($lower_title == "spartan") {
			$start = "edge";
		}

		// Grab the browser version if its present
		$version = '';

		$start = preg_quote($start);
		if (preg_match('/' . $start . '[\ |\/|\:]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
			if (count($regmatch) > 1) {
				$version = $regmatch[1];
			}
		}

		// $return = browser Title and Version, but first..some titles need to be changed
		if ($lower_title == "msie"
			&& $version == "7.0"
			&& preg_match('/Trident\/4.0/i', $useragent)) {
			$return = " 8.0 (Compatibility Mode)"; // Fix for IE8 quirky UA string with Compatibility Mode enabled
		} elseif ($lower_title == "msie") {
			$return = " " . $version;
		} elseif ($lower_title == "nf-browser") {
			$return = "NetFront " . $version;
		} elseif ($lower_title == "semc-browser") {
			$return = "SEMC Browser " . $version;
		} elseif ($lower_title == "ucweb" || $lower_title == "ubrowser" || $lower_title == "ucbrowser" || $lower_title == "uc browser") {
			$return = "UC Browser " . $version;
		} elseif ($lower_title == "bidubrowser" || $lower_title == "baidubrowser" || $lower_title == "baiduhd") {
			$return = "Baidu Browser " . $version;
		} elseif ($lower_title == "up.browser"
			|| $lower_title == "up.link") {
			$return = "Openwave Mobile Browser " . $version;
		} elseif ($lower_title == "chromeframe") {
			$return = "Google Chrome Frame " . $version;
		} elseif ($lower_title == "mozilladeveloperpreview") {
			$return = "Mozilla Developer Preview " . $version;
		} elseif ($lower_title == "opera mobi") {
			$return = "Opera Mobile " . $version;
		} elseif ($lower_title == "osb-browser") {
			$return = "Gtk+ WebCore " . $version;
		} elseif ($lower_title == "tablet browser") {
			$return = "MicroB " . $version;
		} elseif ($lower_title == "crmo") {
			$return = "Chrome Mobile " . $version;
		} elseif ($lower_title == "smarttv") {
			$return = "Maple Browser " . $version;
		} elseif ($lower_title == "atomicbrowser") {
			$return = "Atomic Web Browser " . $version;
		} elseif ($lower_title == "barcapro") {
			$return = "Barca Pro " . $version;
		} elseif ($lower_title == "dplus") {
			$return = "D+ " . $version;
		} elseif ($lower_title == "opera labs") {
			preg_match('/Edition\ Labs([\ ._0-9a-zA-Z]+);/i', $useragent, $regmatch);
			$return = $title . $regmatch[1] . " " . $version;
		} elseif ($lower_title == "iceweasel") {
			if ($version == "Firefox") {
				$version = "";
			}

			$return = $title . " " . $version;
		} else {
			$return = $title . " " . $version;
		}

		return $return;
	}

}
?>
