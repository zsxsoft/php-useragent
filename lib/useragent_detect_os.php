<?php
/**
 * Detect Operating System
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
 * Detect Operating System
 */

class useragent_detect_os {

	public static function analyze($useragent) {

		$result = array();

		// Check if is AMD64
		$x64 = false;
		if (preg_match('/x86_64|Win64; x64|WOW64/i', $useragent)) {
			$x64 = true;
		}

		// Check Linux
		if (preg_match('/Windows|Win(NT|32|95|98|16)|ZuneWP7|WPDesktop/i', $useragent)) {
			$result = self::analyzeWindows($useragent);
		} else if (preg_match('/Linux/i', $useragent) && !preg_match('/Android|ADR/', $useragent)) {
			$result = self::analyzeLinux($useragent);
		} else {
			$result = self::analyzeOther($useragent);
		}
		if ($x64) {
			$result['title'] .= ' x64';
		}

		return $result;
	}

	public static function analyzeWindows($useragent) {
		$link = "http://www.microsoft.com/windows/";
		$title = 'Windows';
		$code = 'win-2';

		if (preg_match('/Windows Phone|WPDesktop|ZuneWP7|WP7/i', $useragent)) {
			$link = "http://www.windowsphone.com/";
			$title .= ' Phone';
			$code = "windowsphone";
			if (preg_match('/Windows Phone (OS )?([0-9\.]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[2];
				if ((int) $regmatch[2] == 7) {
					$code = "wp7";
				}
			}
		} elseif (preg_match('/Windows NT (6.4|10.0)/i', $useragent)) {
			$title .= " 10";
			$code = "win-5";
		} elseif (preg_match('/Windows NT 6.3/i', $useragent)) {
			$title .= " 8.1";
			$code = "win-5";
		} elseif (preg_match('/Windows NT 6.2/i', $useragent)) {
			$title .= " 8";
			$code = "win-5";
		} elseif (preg_match('/Windows NT 6.1/i', $useragent)) {
			$title .= " 7";
			$code = "win-4";
		} elseif (preg_match('/Windows NT 6.0/i', $useragent)) {
			$title .= " Vista";
			$code = "win-3";
		} elseif (preg_match('/Windows NT 5.2/i', $useragent)) {
			$title .= " Server 2003";
			$code = "win-2";
		} elseif (preg_match('/Windows (NT 5.1|XP)/i', $useragent)) {
			$title .= " XP";
			$code = "win-2";
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/Windows NT 5.01/i', $useragent)) {
			$title .= " 2000 Service Pack 1";
			$code = "win-1";
			// @codeCoverageIgnoreEnd
		} elseif (preg_match('/Windows (NT 5.0|2000)/i', $useragent)) {
			$title .= " 2000";
			$code = "win-1";
		} elseif (preg_match('/Windows NT 4.0/i', $useragent)
			|| preg_match('/WinNT4.0/i', $useragent)) {
			$title .= " NT 4.0";
			$code = "win-1";
		} elseif (preg_match('/Win(dows )?NT ?3.51/i', $useragent)
			|| preg_match('/WinNT3.51/i', $useragent)) {
			$title .= " NT 3.11";
			$code = "win-1";
		} elseif (preg_match('/Win(dows )?3.11|Win16/i', $useragent)) {
			$title .= " 3.11";
			$code = "win-1";
		} elseif (preg_match('/Windows 3.1/i', $useragent)) {
			$title .= " 3.1";
			$code = "win-1";
		} elseif (preg_match('/Win 9x 4.90|Windows ME/i', $useragent)) {
			$title .= " Me";
			$code = "win-1";
		} elseif (preg_match('/Win98/i', $useragent)) {
			$title .= " 98 SE";
			$code = "win-1";
		} elseif (preg_match('/Windows (98|4\.10)/i', $useragent)) {
			$title .= " 98";
			$code = "win-1";
		} elseif (preg_match('/Windows 95/i', $useragent)
			|| preg_match('/Win95/i', $useragent)) {
			$title .= " 95";
			$code = "win-1";
		} elseif (preg_match('/Windows CE|Windows .+Mobile/i', $useragent)) {
			$title .= " CE";
			$code = "win-2";
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/WM5/i', $useragent)) {
			$title .= " Mobile 5";
			$code = "win-phone";
		} elseif (preg_match('/WindowsMobile/i', $useragent)) {
			$title .= " Mobile";
			$code = "win-phone";
		}
		// @codeCoverageIgnoreEnd

		return array(
			'link' => $link,
			'title' => $title,
			'code' => $code,
			'dir' => 'os',
		);
	}

	public static function analyzeLinux($useragent) {
		$link = '';
		$title = '';
		$code = '';
		$version = '';

		if (preg_match('/[^A-Za-z]Arch/i', $useragent)) {
			$link = "http://www.archlinux.org/";
			$title = "Arch Linux";
			$code = "archlinux";
		} elseif (preg_match('/CentOS/i', $useragent)) {
			$link = "http://www.centos.org/";
			$title = "CentOS";

			if (preg_match('/.el([.0-9a-zA-Z]+).centos/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "centos";
// @codeCoverageIgnoreStart
		} elseif (preg_match('/Chakra/i', $useragent)) {
			$link = "http://www.chakra-linux.org/";
			$title = "Chakra Linux";
			$code = "chakra";
// @codeCoverageIgnoreEnd
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/Crunchbang/i', $useragent)) {
			$link = "http://www.crunchbanglinux.org/";
			$title = "Crunchbang";
			$code = "crunchbang";
// @codeCoverageIgnoreEnd
		} elseif (preg_match('/Debian/i', $useragent)) {
			$link = "http://www.debian.org/";
			$title = "Debian GNU/Linux";
			$code = "debian";
// @codeCoverageIgnoreStart
		} elseif (preg_match('/Edubuntu/i', $useragent)) {
			$link = "http://www.edubuntu.org/";
			$title = "Edubuntu";

			if (preg_match('/Edubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$version .= " " . $regmatch[1];
			}

			if ($regmatch[1] < 10) {
				$code = "edubuntu-1";
			} else {
				$code = "edubuntu-2";
			}

			if (strlen($version) > 1) {
				$title .= $version;
			}
// @codeCoverageIgnoreEnd
		} elseif (preg_match('/Fedora/i', $useragent)) {
			$link = "http://www.fedoraproject.org/";
			$title = "Fedora";

			if (preg_match('/.fc([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "fedora";
		} elseif (preg_match('/Foresight\ Linux/i', $useragent)) {
			$link = "http://www.foresightlinux.org/";
			$title = "Foresight Linux";

			if (preg_match('/Foresight\ Linux\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "foresight";
		} elseif (preg_match('/Gentoo/i', $useragent)) {
			$link = "http://www.gentoo.org/";
			$title = "Gentoo";
			$code = "gentoo";

		} elseif (preg_match('/Kanotix/i', $useragent)) {
			$link = "http://www.kanotix.com/";
			$title = "Kanotix";
			$code = "kanotix";
// @codeCoverageIgnoreStart
		} elseif (preg_match('/Knoppix/i', $useragent)) {
			$link = "http://www.knoppix.net/";
			$title = "Knoppix";
			$code = "knoppix";
// @codeCoverageIgnoreEnd
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/Kubuntu/i', $useragent)) {
			$link = "http://www.kubuntu.org/";
			$title = "Kubuntu";

			if (preg_match('/Kubuntu[\/|\ ]([.0-9]+)/i', $useragent, $regmatch)) {
				$version .= " " . $regmatch[1];

				if ($regmatch[1] < 10) {
					$code = "kubuntu-1";
				} else {
					$code = "kubuntu-2";
				}
			} else {
				$code = "kubuntu-2";
			}

			if (strlen($version) > 1) {
				$title .= $version;
			}
// @codeCoverageIgnoreEnd
		} elseif (preg_match('/LindowsOS/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Lsongs";
			$title = "LindowsOS";
			$code = "lindowsos";

		} elseif (preg_match('/Linspire/i', $useragent)) {
			$link = "http://www.linspire.com/";
			$title = "Linspire";
			$code = "lindowsos";

		} elseif (preg_match('/Linux\ Mint/i', $useragent)) {
			$link = "http://www.linuxmint.com/";
			$title = "Linux Mint";

			if (preg_match('/Linux\ Mint\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "linuxmint";
// @codeCoverageIgnoreStart

		} elseif (preg_match('/Lubuntu/i', $useragent)) {
			$link = "http://www.lubuntu.net/";
			$title = "Lubuntu";

			if (preg_match('/Lubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$version .= " " . $regmatch[1];
			}

			if ($regmatch[1] < 10) {
				$code = "lubuntu-1";
			} else {
				$code = "lubuntu-2";
			}

			if (strlen($version) > 1) {
				$title .= $version;
			}
// @codeCoverageIgnoreEnd

// @codeCoverageIgnoreStart

		} elseif (preg_match('/Mageia/i', $useragent)) {
			$link = "http://www.mageia.org/";
			$title = "Mageia";
			$code = "mageia";
// @codeCoverageIgnoreEnd
		} elseif (preg_match('/Mandriva/i', $useragent)) {
			$link = "http://www.mandriva.com/";
			$title = "Mandriva";
// @codeCoverageIgnoreStart

			if (preg_match('/mdv([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}
// @codeCoverageIgnoreEnd

			$code = "mandriva";

		} elseif (preg_match('/moonOS/i', $useragent)) {
			$link = "http://www.moonos.org/";
			$title = "moonOS";

			if (preg_match('/moonOS\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "moonos";
		} elseif (preg_match('/Nova/i', $useragent)) {
			$link = "http://www.nova.cu";
			$title = "Nova";

			if (preg_match('/Nova[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$version .= " " . $regmatch[1];
			}

			if (strlen($version) > 1) {
				$title .= $version;
			}

			$code = "nova";
// @codeCoverageIgnoreStart

		} elseif (preg_match('/Oracle/i', $useragent)) {
			$link = "http://www.oracle.com/us/technologies/linux/";
			$title = "Oracle";

			if (preg_match('/.el([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " Enterprise Linux " . str_replace("_", ".", $regmatch[1]);
			} else {
				$title .= " Linux";
			}
			$code = "oracle";
// @codeCoverageIgnoreEnd

		} elseif (preg_match('/Pardus/i', $useragent)) {
			$link = "http://www.pardus.org.tr/en/";
			$title = "Pardus";
			$code = "pardus";
// @codeCoverageIgnoreStart

		} elseif (preg_match('/PCLinuxOS/i', $useragent)) {
			$link = "http://www.pclinuxos.com/";
			$title = "PCLinuxOS";

			if (preg_match('/PCLinuxOS\/[.\-0-9a-zA-Z]+pclos([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . str_replace("_", ".", $regmatch[1]);
			}

			$code = "pclinuxos";
// @codeCoverageIgnoreEnd

		} elseif (preg_match('/Red\ Hat/i', $useragent)
			|| preg_match('/RedHat/i', $useragent)) {
			$link = "http://www.redhat.com/";
			$title = "Red Hat";

			if (preg_match('/.el([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " Enterprise Linux " . str_replace("_", ".", $regmatch[1]);
			}

			$code = "red-hat";
// @codeCoverageIgnoreStart

		} elseif (preg_match('/Rosa/i', $useragent)) {
			$link = "http://www.rosalab.com/";
			$title = "Rosa Linux";
			$code = "rosa";
// @codeCoverageIgnoreEnd

// @codeCoverageIgnoreStart

		} elseif (preg_match('/Sabayon/i', $useragent)) {
			$link = "http://www.sabayonlinux.org/";
			$title = "Sabayon Linux";
			$code = "sabayon";
// @codeCoverageIgnoreEnd

		} elseif (preg_match('/Slackware/i', $useragent)) {
			$link = "http://www.slackware.com/";
			$title = "Slackware";
			$code = "slackware";
		} elseif (preg_match('/Suse/i', $useragent)) {
			$link = "http://www.opensuse.org/";
			$title = "openSUSE";
			$code = "suse";
// @codeCoverageIgnoreStart
		} elseif (preg_match('/VectorLinux/i', $useragent)) {
			$link = "http://www.vectorlinux.com/";
			$title = "VectorLinux";
			$code = "vectorlinux";
// @codeCoverageIgnoreEnd
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/Venenux/i', $useragent)) {
			$link = "http://www.venenux.org/";
			$title = "Venenux GNU Linux";
			$code = "venenux";
// @codeCoverageIgnoreEnd
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/Xandros/i', $useragent)) {
			$link = "http://www.xandros.com/";
			$title = "Xandros";
			$code = "xandros";
// @codeCoverageIgnoreEnd
			// @codeCoverageIgnoreStart
		} elseif (preg_match('/Xubuntu/i', $useragent)) {
			$link = "http://www.xubuntu.org/";
			$title = "Xubuntu";

			if (preg_match('/Xubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$version .= " " . $regmatch[1];
			}

			if ($regmatch[1] < 10) {
				$code = "xubuntu-1";
			} else {
				$code = "xubuntu-2";
			}

			if (strlen($version) > 1) {
				$title .= $version;
			}
// @codeCoverageIgnoreEnd
		} elseif (preg_match('/Zenwalk/i', $useragent)) {
			$link = "http://www.zenwalk.org/";
			$title = "Zenwalk GNU Linux";
			$code = "zenwalk";
		}

		// Pulled out of order to help ensure better detection for above platforms
		elseif (preg_match('/Ubuntu/i', $useragent)) {
			$link = "http://www.ubuntu.com/";
			$title = "Ubuntu";

			if (preg_match('/Ubuntu[\/|\ ]([.0-9]+[.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$version .= " " . $regmatch[1];
				if ($regmatch[1] < 10) {
					$code = "ubuntu-1";
				}
			}

			if ($code == '') {
				$code = "ubuntu-2";
			}

			if (strlen($version) > 1) {
				$title .= $version;
			}

		} else {
			$link = "http://www.linux.org/";
			$title = "GNU/Linux";
			$code = "linux";
		}

		return array(
			'link' => $link,
			'title' => $title,
			'code' => $code,
			'dir' => 'os',
		);
	}

	public static function analyzeOther($useragent) {
		$link = '';
		$title = '';
		$code = '';
		$version = '';

		// Opera's Useragent does not contains 'Linux'
		if (preg_match('/Android|ADR /i', $useragent)) {
			$link = "http://www.android.com/";
			$title = "Android";
			$code = "android";

			if (preg_match('/(Android|Adr)[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$version = $regmatch[2];
				$title .= " " . $version;
			}
		} elseif (preg_match('/AmigaOS/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/AmigaOS";
			$title = "AmigaOS";

			if (preg_match('/AmigaOS\ ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "amigaos";
		} elseif (preg_match('/BB10/i', $useragent)) {
			$link = "http://www.blackberry.com/";
			$title = "BlackBerry OS 10";
			$code = "blackberry";

		} elseif (preg_match('/BeOS/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/BeOS";
			$title = "BeOS";
			$code = "beos";

		} elseif (preg_match('/\b(?!Mi)CrOS(?!oft)/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Google_Chrome_OS";
			$title = "Google Chrome OS";
			$code = "chromeos";
		} elseif (preg_match('/DragonFly/i', $useragent)) {
			$link = "http://www.dragonflybsd.org/";
			$title = "DragonFly BSD";
			$code = "dragonflybsd";

		} elseif (preg_match('/FreeBSD/i', $useragent)) {
			$link = "http://www.freebsd.org/";
			$title = "FreeBSD";
			$code = "freebsd";

		} elseif (preg_match('/Inferno/i', $useragent)) {
			$link = "http://www.vitanuova.com/inferno/";
			$title = "Inferno";
			$code = "inferno";

		} elseif (preg_match('/IRIX/i', $useragent)) {
			$link = "http://www.sgi.com/partners/?/technology/irix/";
			$title = "IRIX";

			if (preg_match('/IRIX(64)?\ ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				if ($regmatch[1]) {
					$title .= " x" . $regmatch[1];
				}
				if ($regmatch[2]) {
					$title .= " " . $regmatch[2];
				}
			}

			$code = "irix";

		} 
		//Apple iOS
		elseif (preg_match('/iPad/i', $useragent)) {
		    $link = "http://www.apple.com/itunes";
		
		    if (preg_match('/CPU\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
		        $title = " iOS " . str_replace("_", ".", $regmatch[1]);
		    }
		
		    $code = "ipad";
		} elseif (preg_match('/iPod/i', $useragent)) {
		    $link = "http://www.apple.com/itunes";
		
		    if (preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
		        $title = " iOS " . str_replace("_", ".", $regmatch[1]);
		    }
		
		    $code = "ipod";
		} elseif (preg_match('/iPhone/i', $useragent)) {
		    $link = "http://www.apple.com/iphone";
		
		    if (preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
		        $title = " iOS " . str_replace("_", ".", $regmatch[1]);
		    }
		
		    $code = "iphone";
		}
		//Apple Mac
		elseif (preg_match('/Mac/i', $useragent)
			|| preg_match('/Darwin/i', $useragent)) {
			$link = "http://www.apple.com/macosx/";

			if (preg_match('/(Mac OS ?X)/i', $useragent, $regmatch)) {
				$title = substr($useragent, strpos(strtolower($useragent), strtolower($regmatch[1])));
				$title = substr($title, 0, strpos($title, ")"));

				if (strpos($title, ";")) {
					$title = substr($title, 0, strpos($title, ";"));
				}

				$title = str_replace("_", ".", $title);
				$title = str_replace("OSX", "OS X", $title);

				$code = $regmatch[1] == "Mac OSX" ? "mac-2" : "mac-3";
			} elseif (preg_match('/Darwin/i', $useragent)) {
				$title = "Mac OS Darwin";
				$code = "mac-1";
			} else {
				$title = "Macintosh";
				$code = "mac-1";
			}
		} elseif (preg_match('/MorphOS/i', $useragent)) {
			$link = "http://www.morphos-team.net/";
			$title = "MorphOS";
			$code = "morphos";

		} elseif (preg_match('/NetBSD/i', $useragent)) {
			$link = "http://www.netbsd.org/";
			$title = "NetBSD";
			$code = "netbsd";

		} elseif (preg_match('/OpenBSD/i', $useragent)) {
			$link = "http://www.openbsd.org/";
			$title = "OpenBSD";
			$code = "openbsd";
		} elseif (preg_match('/RISC OS/i', $useragent)) {
			$link = "https://www.riscosopen.org/";
			$title = "RISC OS";
			$code = "risc";

			if (preg_match('/RISC OS ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

		} elseif (preg_match('/Solaris|SunOS/i', $useragent)) {
			$link = "http://www.sun.com/software/solaris/";
			$title = "Solaris";
			$code = "solaris";

		} elseif (preg_match('/Symb(ian)?(OS)?/i', $useragent)) {
			$link = "http://www.symbianos.org/";
			$title = "SymbianOS";

			if (preg_match('/Symb(ian)?(OS)?\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[3];
			}

			$code = "symbian";

		} elseif (preg_match('/Unix/i', $useragent)) {
			$link = "http://www.unix.org/";
			$title = "Unix";
			$code = "unix";
// @codeCoverageIgnoreStart

		} elseif (preg_match('/webOS/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/WebOS";
			$title = "Palm webOS";
			$code = "palm";
		} elseif (preg_match('/J2ME\/MIDP/i', $useragent)) {
			$link = "http://java.sun.com/javame/";
			$title = "J2ME/MIDP Device";
			$code = "java";
		} else {
			$code = "null";
		}

		return array(
			'link' => $link,
			'title' => $title,
			'code' => $code,
			'dir' => 'os',
		);
	}
}
?>