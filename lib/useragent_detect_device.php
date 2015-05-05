<?php
/**
 * Detect $console or Mobile Device
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
 * Detect $console or Mobile Device
 */
class UserAgent_Detect_Device {
	public static function analyze($useragent) {
		$link = '';
		$title = '';
		$code = '';

		// BenQ-Siemens (Openwave)
		/*elseif(preg_match('/[^M]SIE/i', $useragent))
		{
		$link = "http://en.wikipedia.org/wiki/BenQ-Siemens";
		$title = "BenQ-Siemens";

		if(preg_match('/[^M]SIE-([.0-9a-zA-Z]+)\//i', $useragent, $regmatch))
		{
		$title .= " ".$regmatch[1];
		}

		$code = "benq-siemens";
		}*/

		// meizu
		if (preg_match('/(MEIZU (MX|M9)|M030)|MX-3/i', $useragent)) {
			$link = "http://www.meizu.com/";
			$title = "Meizu";
			$code = "meizu";
		}

		// xiaomi
		elseif (preg_match('/MI-ONE|MI \d|HM NOTE/i', $useragent)) {
			$link = "http://www.xiaomi.com/";
			$title = "Xiaomi";

			if (preg_match('/HM NOTE ([A-Z0-9]+)/i', $useragent, $regmatch)) {
				$title .= " HM-NOTE " . $regmatch[1];
			} else if (preg_match('/MI ([A-Z0-9]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			} else if (preg_match('/MI-ONE/i', $useragent, $regmatch)) {
				$title .= " 1";
			}

			$code = "xiaomi";
		}

		// BlackBerry
		elseif (preg_match('/BlackBerry/i', $useragent)) {
			$link = "http://www.blackberry.com/";
			$title = "BlackBerry";

			if (preg_match('/blackberry ?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "blackberry";
		}
		// Coolpad
		elseif (preg_match('/Coolpad/i', $useragent)) {
			$link = "http://www.coolpad.com/";
			$title = "CoolPad";

			if (preg_match('/CoolPad( |\_)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[2];
			}

			$code = "coolpad";
		}

		// Dell
		elseif (preg_match('/Dell Streak/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Dell_Streak";
			$title = "Dell Streak";
			$code = "dell";
		} elseif (preg_match('/Dell/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Dell";
			$title = "Dell";
			$code = "dell";
		}

		// HTC
		elseif (preg_match('/Desire/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/HTC_Desire";
			$title = "HTC Desire";
			$code = "htc";
		} elseif (preg_match('/Rhodium/i', $useragent)
			|| preg_match('/HTC[_|\ ]Touch[_|\ ]Pro2/i', $useragent)
			|| preg_match('/WMD-50433/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/HTC_Touch_Pro2";
			$title = "HTC Touch Pro2";
			$code = "htc";
		} elseif (preg_match('/HTC[_|\ ]Touch[_|\ ]Pro/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/HTC_Touch_Pro";
			$title = "HTC Touch Pro";
			$code = "htc";
		} elseif (preg_match('/Windows Phone .+ by HTC/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation";
			$title = "HTC";
			if (preg_match('/Windows Phone ([0-9A-Za-z]+) by HTC/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}
			$code = "htc";
		} elseif (preg_match('/HTC/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation";
			$title = "HTC";

			if (preg_match('/HTC[\ |_|-]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			} elseif (preg_match('/HTC([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= str_replace("_", " ", $regmatch[1]);
			}

			$code = "htc";
		}
		// huawei
		elseif (preg_match('/Huawei/i', $useragent)) {
			$link = "http://www.huawei.com/cn/";
			$title = "Huawei";
			$code = "huawei";
			if (preg_match('/HUAWEI( |\_)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[2];
			}
		}
		// Kindle
		elseif (preg_match('/Kindle/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Amazon_Kindle";
			$title = "Kindle";

			if (preg_match('/Kindle\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "kindle";
		}
		// K-Touch
		elseif (preg_match('/k-touch/i', $useragent)) {
			$link = "http://www.k-touch.cn/";
			$title = "K-Touch";
			$code = "k-touch";
			if (preg_match('/k-touch[ _]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}
		}
		// Lenovo
		elseif (preg_match('/Lenovo|lepad/i', $useragent)) {
			$link = "http://www.lenovo.com.cn";
			$title = "Lenovo";

			if (preg_match('/Lenovo[\ |\-|\/|\_]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			} else if (preg_match('/lepad/i', $useragent)) {
				$title .= ' LePad';
			}

			$code = "lenovo";

		}
		// LG
		elseif (preg_match('/LG/i', $useragent)) {
			$link = "http://www.lgmobile.com";
			$title = "LG";

			if (preg_match('/LGE?([- \/])([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[2];
			}

			$code = "lg";
		}

		// Motorola
		elseif (preg_match('/\ Droid/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Motorola_Droid";
			$title .= "Motorola Droid";
			$code = "motorola";
		} elseif (preg_match('/XT720/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Motorola";
			$title .= "Motorola XT720";
			$code = "motorola";
		} elseif (preg_match('/MOT-/i', $useragent)
			|| preg_match('/MIB/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Motorola";
			$title = "Motorola";

			if (preg_match('/MOTO([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}
			if (preg_match('/MOT-([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "motorola";
		} elseif (preg_match('/XOOM/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Motorola_Xoom";
			$title .= "Motorola Xoom";
			$code = "motorola";
		}

		// Nintendo
		elseif (preg_match('/Nintendo/i', $useragent)) {
			$title = "Nintendo";
			$link = "http://www.nintendo.com/";
			$code = "nintendo";

			if (preg_match('/Nintendo DSi/i', $useragent)) {
				$link = "http://www.nintendodsi.com/";
				$title .= " DSi";
				$code = "nintendodsi";
			} elseif (preg_match('/Nintendo DS/i', $useragent)) {
				$link = "http://www.nintendo.com/ds";
				$title .= " DS";
				$code = "nintendods";
			} elseif (preg_match('/Nintendo WiiU/i', $useragent)) {
				$link = "http://www.nintendo.com/wiiu";
				$title .= " Wii U";
				$code = "nintendowiiu";
			} elseif (preg_match('/Nintendo Wii/i', $useragent)) {
				$link = "http://www.nintendo.com/wii";
				$title .= " Wii";
				$code = "nintendowii";
			}
		}

		// Nokia
		elseif (preg_match('/Nokia/i', $useragent)) {
			/*if (!(/S(eries)?60/i.test(useragent)) || !/Symbian/i.test(useragent))
			{*/
			$link = "http://www.nokia.com/";
			$title = "Nokia";
			$code = "nokia";
			if (preg_match('/Nokia(E|N| )?([0-9]+)/i', $useragent, $regmatch)) {
				if (preg_match('/IEMobile|WPDesktop|Edge/i', $useragent)) {
					// Nokia Windows Phone
					if ($regmatch[2] == '909') {
						$regmatch[2] = '1020';
					}
					// Lumia 1020
					$title .= " Lumia " . $regmatch[2];
				} else {
					$title .= " " . $regmatch[1] . $regmatch[2];
				}
			} elseif (preg_match('/Lumia ([0-9]+)/i', $useragent, $regmatch)) {
				$title .= " Lumia " . $regmatch[1];
			}

			//}
		}

		// Onda
		elseif (preg_match('/onda/i', $useragent)) {
			$link = "http://www.onda.cn/";
			$title = "Onda";
			$code = "onda";
		}
		// Oppo
		elseif (preg_match('/oppo/i', $useragent)) {
			$link = "http://www.oppo.com/";
			$title = "OPPO";
			$code = "oppo";
		}

		// Palm
		elseif (preg_match('/\ Pixi\//i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Palm_Pixi";
			$title = "Palm Pixi";
			$code = "palm";
		} elseif (preg_match('/\ Pre\//i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Palm_Pre";
			$title = "Palm Pre";
			$code = "palm";
		} elseif (preg_match('/Palm/i', $useragent)) {
			$link = "http://www.palm.com/";
			$title = "Palm";
			$code = "palm";
		} elseif (preg_match('/webos/i', $useragent)) {
			$link = "http://www.palm.com/";
			$title = "Palm";
			$code = "palm";
		}

		// Playstation
		elseif (preg_match('/PlayStation/i', $useragent)) {
			$title = "PlayStation";

			if (preg_match('/[PS|PlayStation\ ]3/i', $useragent)) {
				$link = "http://www.us.playstation.com/PS3";
				$title .= " 3";
			} elseif (preg_match('/[PS|PlayStation\ ]4/i', $useragent)) {
				$link = "http://www.us.playstation.com/PS4";
				$title .= " 4";
			} elseif (preg_match('/PlayStation Portable|PSP/i', $useragent)) {
				$link = "http://www.us.playstation.com/PSP";
				$title .= " Portable";
			} elseif (preg_match('/PlayStation Vita|PSVita/i', $useragent)) {
				$link = "http://us.playstation.com/psvita/";
				$title .= " Vita";
			} else {
				$link = "http://www.us.playstation.com/";
			}

			$code = "playstation";
		}

		// Samsung
		elseif (preg_match('/Galaxy Nexus/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/Galaxy_Nexus";
			$title = "Galaxy Nexus";
			$code = "samsung";
		} elseif (preg_match('/Smart-?TV/i', $useragent)) {
			$link = "http://www.samsung.com/us/experience/smart-tv/";
			$title = "Samsung Smart TV";
			$code = "samsung";
		} elseif (preg_match('/GT-/i', $useragent)) {
			$link = "http://www.samsungmobile.com/";
			$title = "Samsung";

			if (preg_match('/GT-([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "samsung";
		} elseif (preg_match('/Samsung/i', $useragent)) {
			$link = "http://www.samsungmobile.com/";
			$title = "Samsung";

			if (preg_match('/Samsung-([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "samsung";
		}

		// Sony Ericsson
		elseif (preg_match('/SonyEricsson/i', $useragent)) {
			$link = "http://en.wikipedia.org/wiki/SonyEricsson";
			$title = "SonyEricsson";

			if (preg_match('/SonyEricsson([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}

			$code = "sonyericsson";
		}

		// vivo
		elseif (preg_match('/vivo/i', $useragent)) {
			$link = "http://www.vivo.com.cn/";
			$title = "vivo";
			$code = "vivo";
			if (preg_match('/VIVO ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}
		}

		// Xperia
		elseif (preg_match('/Xperia/i', $useragent)) {
			$link = "http://www.sonymobile.com/";
			$title = "Xperia";
			$code = "xperia";
			if (preg_match('/Xperia(-T)?( |\_|\-)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[3];
			}
		}
		// ZTE
		elseif (preg_match('/zte/i', $useragent)) {
			$link = "http://www.zte.com.cn/cn/";
			$title = "ZTE";
			$code = "zte";
			if (preg_match('/ZTE(-T)?( |\_|\-)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[3];
			}
		}

		// Ubuntu Phone/Tablet
		elseif (preg_match('/Ubuntu\;\ Mobile/i', $useragent)) {
			$link = "http://www.ubuntu.com/phone";
			$title = "Ubuntu Phone";
			$code = "ubuntutouch";
		} elseif (preg_match('/Ubuntu\;\ Tablet/i', $useragent)) {
			$link = "http://www.ubuntu.com/tablet";
			$title = "Ubuntu Tablet";
			$code = "ubuntutouch";
		}

		// Google
		elseif (preg_match('/Nexus/i', $useragent)) {
			$link = "https://www.google.com/nexus/";
			$title = "Nexus";
			$code = "google-nexusone";
			if (preg_match('/Nexus ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " " . $regmatch[1];
			}
		}

		// Apple
		elseif (preg_match('/iPad/i', $useragent)) {
			$link = "http://www.apple.com/itunes";
			$title = "iPad";

			if (preg_match('/CPU\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " iOS " . str_replace("_", ".", $regmatch[1]);
			}

			$code = "ipad";
		} elseif (preg_match('/iPod/i', $useragent)) {
			$link = "http://www.apple.com/itunes";
			$title = "iPod";

			if (preg_match('/iPod\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " iOS " . str_replace("_", ".", $regmatch[1]);
			}

			$code = "ipod";
		} elseif (preg_match('/iPhone/i', $useragent)) {
			$link = "http://www.apple.com/iphone";
			$title = "iPhone";

			if (preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
				$title .= " iOS " . str_replace("_", ".", $regmatch[1]);
			}

			$code = "iphone";
		}

		//Some special UA..
		// 华为荣耀
		elseif (preg_match('/HONOR[\ ]?([A-Za-z0-9]{3,4}\-[A-Za-z0-9]{3,4})|(Che[0-9]{1}-[a-zA-Z0-9]{4})/i', $useragent,$regmatch)) {
		    $link = "http://www.huawei.com/cn/";
		    $title = "Huawei ".$regmatch[count($regmatch)-1];
		    $code = "huawei";
		}
		elseif (preg_match('/(H60-L\d+)/i', $useragent,$regmatch)) {
		    $link = "http://www.huawei.com/cn/";
		    $title = "Huawei ".$regmatch[count($regmatch)-1];
		    $code = "huawei";
		}
		// 三星
		elseif (preg_match('/(SCH-[0-9a-z]+)|(SHV-[0-9a-z]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.samsungmobile.com/";
		    $title = "Samsung ".$regmatch[count($regmatch)-1];
		    $code = "samsung";
		}
		elseif (preg_match('/(SM-[0-9a-z]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.samsungmobile.com/";
		    $title = "Samsung ".$regmatch[count($regmatch)-1];
		    $code = "samsung";
		}
		elseif (preg_match('/Galaxy S III/i', $useragent)) {
		    $link = "http://www.samsungmobile.com/";
		    $title = "Samsung GalaxyS3";
		    $code = "samsung";
		}
		// 金立
		elseif (preg_match('/(GN[0-9]+)|GiONEE-([a-zA-Z0-9]{2,4})|GIO-GiONEE\_([a-zA-Z0-9]{2,4})|(E7)/i', $useragent,$regmatch)) {
		    $link = "http://www.gionee.com/";
		    $title = "Gionee ".$regmatch[count($regmatch)-1];
		    $code = "gionee";
		}
		// 海信
		elseif (preg_match('/HS-(EG[0-9]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.hisense.com/";
		    $title = "Hisense EG".$regmatch[count($regmatch)-1];
		    $code = "hisense";
		}
		// 魅族
		elseif (preg_match('/(M35[0-9]+)|(M040)|(M045)/i', $useragent,$regmatch)) {
		    $link = "http://www.meizu.com/";
			$title = "Meizu ".$regmatch[count($regmatch)-1];
			$code = "meizu";
		}
		elseif (preg_match('/(MX[0-9]{1})/i', $useragent,$regmatch)) {
		    $link = "http://www.meizu.com/";
		    $title = "Meizu ".$regmatch[count($regmatch)-1];
		    $code = "meizu";
		}
		// 小米
		elseif (preg_match('/(2013[0-9]{3})|(2014[0-9]{3})|(HM\ 1SC)|(HM\ 1SW)|(M35c)|(M[0-9]{1})/', $useragent,$regmatch)) {
		    $link = "http://www.xiaomi.com/";
		    $title = "Xiaomi ".$regmatch[count($regmatch)-1];
		    $code = "xiaomi";
		}
		// 蓝天
		elseif (preg_match('/MX X1/i', $useragent,$regmatch)) {
		    $link = "#";
		    $title = "蓝天 MX X1";
		    $code = "蓝天";
		}
		// 中国移动
		elseif (preg_match('/(M601)|(M701)|(M811)|(M812)/i', $useragent,$regmatch)) {
		    $link = "http://www.10086.cn";
		    $title = "ChinaMobile ".$regmatch[count($regmatch)-1];
		    $code = "chinamobile";
		}
		// Oppo
		elseif (preg_match('/(X\d{3,4}[a-z]?)|(R\d{3,4}[a-z]?)|(N\d{3,4}[a-z]?)|(1107)|(N1T)/', $useragent,$regmatch)) {
		    $link = "http://www.oppo.com/";
		    $title = "OPPO ".$regmatch[count($regmatch)-1];
		    $code = "oppo";
		}
		// TCL
		elseif (preg_match('/TCL/', $useragent)) {
		    $link = "http://www.tcl.com";
		    $title = "TCL";
		
		    if (preg_match('/TCL[\ |\-]([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
		        $title .= " " . $regmatch[count($regmatch)-1];
		    }
		
		    $code = "tcl";
		}
		// 易派
		elseif (preg_match('/epade/i', $useragent)) {
		    $link = "#";
		    $title = "Epade";
		
		    if (preg_match('/epade\ ([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
		        $title .= " " . $regmatch[count($regmatch)-1];
		    }
		
		    $code = "epade";
		}
		// 亿通
		elseif (preg_match('/eton/i', $useragent)) {
		    $link = "#";
		    $title = "Eton";
		
		    if (preg_match('/eton\ ([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
		        $title .= " " . $regmatch[count($regmatch)-1];
		    }
		
		    $code = "eton";
		}
		// Sony
		elseif (preg_match('/([A-Z]{1}[0-9]{2}[a-zA-Z]{1})|([A-Z]{1}[0-9]{4})|(Z3)/', $useragent,$regmatch)) {
		    $link = "http://www.sonymobile.com/cn/";
		    $title = "Sony ".$regmatch[count($regmatch)-1];
		    $code = "sony";
		}
		// 语信
		elseif (preg_match('/YUSUN([\ |\_]*[A-Z0-9]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.yusun.com.cn/";
		    $title = "Yusun ".$regmatch[count($regmatch)-1];
		    $code = "yusun";
		}
		// 黑米
		elseif (preg_match('/HMI_([0-9a-zA-Z]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.hmiphone.com/";
		    $title = "Hmi ".$regmatch[count($regmatch)-1];
		    $code = "hmi";
		}
		// 优米
		elseif (preg_match('/UMI[\-]?([0-9a-zA-Z]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.91umi.com/";
		    $title = "Umi ".$regmatch[count($regmatch)-1];
		    $code = "umi";
		}
		// 爱派尔
		elseif (preg_match('/IPH-([0-9a-zA-Z]+)/i', $useragent,$regmatch)) {
		    $link = "http://iphchina.com/index.html";
		    $title = "IPH ".$regmatch[count($regmatch)-1];
		    $code = "iph";
		}
		// 美图
		elseif (preg_match('/meitu([0-9a-zA-Z]+)/i', $useragent,$regmatch)) {
		    $link = "http://www.meitu.com";
		    $title = "Meitu ".$regmatch[count($regmatch)-1];
		    $code = "meitu";
		}
		// 摩托罗拉
		elseif (preg_match('/([A-Z]{2}[0-9+]{3,4})/i', $useragent,$regmatch)) {
		    $link = "http://www.motorola.com.cn";
		    $title = "Motorola ".$regmatch[count($regmatch)-1];
		    $code = "motorola";
		}
		// 维卡
		elseif (preg_match('/VIKA-([0-9A-Za-z])/i', $useragent,$regmatch)) {
		    $link = "http://www.vikamobile.com/";
		    $title = "Vika ".$regmatch[count($regmatch)-1];
		    $code = "vika";
		}
		// Vivo
		elseif (preg_match('/(X3)/', $useragent,$regmatch)) {
		    $link = "http://www.vivo.com/cn/";
		    $title = "Vivo ".$regmatch[count($regmatch)-1];
		    $code = "vivo";
		}
		// 酷派
		elseif (preg_match('/(8060)/', $useragent,$regmatch)) {
		    $link = "http://www.coolpad.com/";
		    $title = "Coolpad ".$regmatch[count($regmatch)-1];
		    $code = "coolpad";
		}
		//联想
		elseif (preg_match('/(K3)/i', $useragent,$regmatch)) {
		    $link = "http://www.lenovo.com.cn";
		    $title = "Lenovo ".$regmatch[count($regmatch)-1];
		    $code = "lenovo";
		
		}
		//is MSIE
		elseif (preg_match('/MSIE.+?Windows.+?Trident/i', $useragent) && !preg_match('/Windows ?Phone/i', $useragent)) {
			$link = "";
			$title = "";
			$code = "null";
		}
		// No Device match
		else {
			$code = "null";
		}

		return array(
			'link' => $link,
			'title' => $title,
			'code' => $code,
			'dir' => 'device',
		);

	}
}
?>
