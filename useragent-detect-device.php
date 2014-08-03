<?php

// Detect $console or Mobile Device
function detect_device($useragent)
{
	$link = ''; $title = '';$code = '';
	
	// Apple
	if(preg_match('/iPad/i', $useragent))
	{
		$link = "http://www.apple.com/itunes";
		$title = "iPad";

		if(preg_match('/CPU\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " iOS ".str_replace("_", ".", $regmatch[1]);
		}

		$code = "ipad";
	}
	elseif(preg_match('/iPod/i', $useragent))
	{
		$link = "http://www.apple.com/itunes";
		$title = "iPod";

		if(preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " iOS ".str_replace("_", ".", $regmatch[1]);
		}

		$code = "iphone";
	}
	elseif(preg_match('/iPhone/i', $useragent))
	{
		$link = "http://www.apple.com/iphone";
		$title = "iPhone";

		if(preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " iOS ".str_replace("_", ".", $regmatch[1]);
		}

		$code = "iphone";
	}

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
    elseif(preg_match('/(MEIZU (MX|M9)|M030)|MX-3/i', $useragent))
    {
        $link = "http://www.meizu.com/";
        $title = "MeiZu";
        $code = "meizu";
    }

	// xiaomi
    elseif(preg_match('/MI-ONE|MI \d|xiaomi|HM NOTE/i', $useragent))
    {
        $link = "http://www.xiaomi.com/";
        $title = "XiaoMi";
        $code = "xiaomi";
    }

	// BlackBerry
	elseif(preg_match('/BlackBerry/i', $useragent))
	{
		$link = "http://www.blackberry.com/";
		$title = "BlackBerry";

		if(preg_match('/blackberry([.0-9a-zA-Z]+)\//i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}

		$code = "blackberry";
	}
	// Coolpad
	elseif(preg_match('/Coolpad/i', $useragent))
	{
		$link = "http://www.coolpad.com/";
		$title = "CoolPad";

		if(preg_match('/CoolPad ?([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}

		$code = "coolpad";
	}

	// Dell
	elseif(preg_match('/Dell Mini 5/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Dell_Streak";
		$title = "Dell Mini 5";
		$code = "dell";
	}
	elseif(preg_match('/Dell Streak/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Dell_Streak";
		$title = "Dell Streak";
		$code = "dell";
	}
	elseif(preg_match('/Dell/i', $useragent)){
		$link = "http://en.wikipedia.org/wiki/Dell";
		$title = "Dell";
		$code = "dell";
	}

	// Google
	elseif(preg_match('/Nexus/i', $useragent))
	{
		$link = "https://www.google.com/nexus/";
		$title = "Nexus";
		$code = "google-nexusone";
		if(preg_match('/Nexus ([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}
	}

	// HTC
	elseif(preg_match('/Desire/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/HTC_Desire";
		$title = "HTC Desire";
		$code = "htc";
	}
	elseif(preg_match('/Rhodium/i', $useragent)
		|| preg_match('/HTC[_|\ ]Touch[_|\ ]Pro2/i', $useragent)
		|| preg_match('/WMD-50433/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/HTC_Touch_Pro2";
		$title = "HTC Touch Pro2";
		$code = "htc";
	}
	elseif(preg_match('/HTC[_|\ ]Touch[_|\ ]Pro/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/HTC_Touch_Pro";
		$title = "HTC Touch Pro";
		$code = "htc";
	}
	elseif(preg_match('/HTC/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation";
		$title = "HTC";

		if(preg_match('/HTC[\ |_|-]8500/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Startrek";
			$title .= " Startrek";
		}
		elseif(preg_match('/HTC[\ |_|-]Hero/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Hero";
			$title .= " Hero";
		}
		elseif(preg_match('/HTC[\ |_|-]Legend/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Legend";
			$title .= " Legend";
		}
		elseif(preg_match('/HTC[\ |_|-]Magic/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Magic";
			$title .= " Magic";
		}
		elseif(preg_match('/HTC[\ |_|-]P3450/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Touch";
			$title .= " Touch";
		}
		elseif(preg_match('/HTC[\ |_|-]P3650/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Polaris";
			$title .= " Polaris";
		}
		elseif(preg_match('/HTC[\ |_|-]S710/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_S710";
			$title .= " S710";
		}
		elseif(preg_match('/HTC[\ |_|-]Tattoo/i', $useragent))
		{
			$link = "http://en.wikipedia.org/wiki/HTC_Tattoo";
			$title .= " Tattoo";
		}
		elseif(preg_match('/HTC[\ |_|-]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}
		elseif(preg_match('/HTC([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= str_replace("_", " ", $regmatch[1]);
		}

		$code = "htc";
	}
	// huawei
	elseif(preg_match('/Huawei/i', $useragent))
	{
		$link = "http://www.huawei.com/cn/";
		$title = "HuaWei";
		$code = "huawei";
		if(preg_match('/HUAWEI([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[1];
		}
	}
	// Kindle
	elseif(preg_match('/Kindle/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Amazon_Kindle";
		$title = "Kindle";

		if(preg_match('/Kindle\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}

		$code = "kindle";
	}
	//ZTE
    elseif(preg_match('/k-touch/i', $useragent))
    {
        $link = "http://www.k-touch.cn/";
        $title = "K-Touch";
        $code = "k-touch";
		if(preg_match('/k-touch[ _]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[1];
		}
    }
    // Lenovo
    elseif(preg_match('/Lenovo|lepad/i', $useragent))
    {
        $link = "http://www.lenovo.com.cn";
        $title = "Lenovo";
		
		if(preg_match('/Lenovo[\ |-|\/]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[1];
		}
		else if (preg_match('/lepad/i', $useragent))
		{
			$title .= ' LePad';
		}

        $code = "lenovo";

    }
	// LG
	elseif(preg_match('/LG/i', $useragent))
	{
		$link = "http://www.lgmobile.com";
		$title = "LG";

		if(preg_match('/LGE?([- \/])([0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[2];
		}

		$code = "lg";
	}

	// Microsoft
	elseif(preg_match('/Windows Phone OS 7.0/i', $useragent)
		|| preg_match('/ZuneWP7/i', $useragent)
		|| preg_match('/WP7/i', $useragent))
	{
		$link = "http://www.microsoft.com/windowsphone/";
		$title .= "Windows Phone 7";
		$code = "wp7";
	}

	// Motorola
	elseif(preg_match('/\ Droid/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Motorola_Droid";
		$title .= "Motorola Droid";
		$code = "motorola";
	}
	elseif(preg_match('/XT720/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Motorola";
		$title .= "Motorola Motoroi (XT720)";
		$code = "motorola";
	}
	elseif(preg_match('/MOT-/i', $useragent)
		|| preg_match('/MIB/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Motorola";
		$title = "Motorola";

		if(preg_match('/MOTO([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}
		if(preg_match('/MOT-([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}

		$code = "motorola";
	}
	elseif(preg_match('/XOOM/i', $useragent)){
		$link = "http://en.wikipedia.org/wiki/Motorola_Xoom";
		$title .= "Motorola Xoom";
		$code = "motorola";
	}

	// Nintendo
	elseif(preg_match('/Nintendo/i', $useragent))
	{
		$title = "Nintendo";

		if(preg_match('/Nintendo DSi/i', $useragent))
		{
			$link = "http://www.nintendodsi.com/";
			$title .= " DSi";
			$code = "nintendodsi";
		}
		elseif(preg_match('/Nintendo DS/i', $useragent))
		{
			$link = "http://www.nintendo.com/ds";
			$title .= " DS";
			$code = "nintendods";
		}
		elseif(preg_match('/Nintendo WiiU/i', $useragent))
		{
			$link = "http://www.nintendo.com/wiiu";
			$title .= " Wii U";
			$code = "nintendowiiu";
		}
		elseif(preg_match('/Nintendo Wii/i', $useragent))
		{
			$link = "http://www.nintendo.com/wii";
			$title .= " Wii";
			$code = "nintendowii";
		}
		else
		{
			$link = "http://www.nintendo.com/";
			$code = "nintendo";
		}
	}

	// Nokia
    elseif(preg_match('/Nokia/i', $useragent))
    {
		/*if (!(/S(eries)?60/i.test(useragent)) || !/Symbian/i.test(useragent))
		{*/
		$link = "http://www.nokia.com/";
		$title = "Nokia";
		$code = "nokia";
		if(preg_match('/Nokia(E|N| )?([0-9]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[1] . $regmatch[2];
		}
		elseif(preg_match('/Lumia ([0-9]+)/i', $useragent, $regmatch))
		{
			$title .= " Lumia " . $regmatch[1];
		}
		//}
    }
	
    // Onda
    elseif(preg_match('/onda/i', $useragent))
    {
        $link = "http://www.onda.cn/";
        $title = "Onda";
        $code = "onda";
    }
    // Onda
    elseif(preg_match('/oppo/i', $useragent))
    {
        $link = "http://www.oppo.com/";
        $title = "OPPO";
        $code = "oppo";
    }
	
	// OLPC (One Laptop Per $child)
	elseif(preg_match('/OLPC/i', $useragent))
	{
		$link = "http://www.laptop.org/";
		$title = "OLPC (XO)";
		$code = "olpc";
	}

	// Palm
	elseif(preg_match('/\ Pixi\//i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Palm_Pixi";
		$title = "Palm Pixi";
		$code = "palm";
	}
	elseif(preg_match('/\ Pre\//i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Palm_Pre";
		$title = "Palm Pre";
		$code = "palm";
	}
	elseif(preg_match('/Palm/i', $useragent))
	{
		$link = "http://www.palm.com/";
		$title = "Palm";
		$code = "palm";
	}
	elseif(preg_match('/wp-webos/i', $useragent))
	{
		$link = "http://www.palm.com/";
		$title = "Palm";
		$code = "palm";
	}

	// Playstation
	elseif(preg_match('/PlayStation/i', $useragent))
	{
		$title = "PlayStation";

		if(preg_match('/[PS|PlayStation\ ]3/i', $useragent))
		{
			$link = "http://www.us.playstation.com/PS3";
			$title .= " 3";
		}
		elseif(preg_match('/[PS|PlayStation\ ]4/i', $useragent))
		{
			$link = "http://www.us.playstation.com/PS4";
			$title .= " 4";
		}
		elseif(preg_match('/[PlayStation Portable|PSP]/i', $useragent))
		{
			$link = "http://www.us.playstation.com/PSP";
			$title .= " Portable";
		}
		elseif(preg_match('/[PlayStation Vita|PSVita]/i', $useragent))
		{
			$link = "http://us.playstation.com/psvita/";
			$title .= " Vita";
		}
		else
		{
			$link = "http://www.us.playstation.com/";
		}

		$code = "playstation";
	}

	// Samsung
	elseif(preg_match('/Galaxy Nexus/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/Galaxy_Nexus";
		$title = "Galaxy Nexus";
		$code = "samsung";
	}
	elseif(preg_match('/SmartTV/i', $useragent))
	{
		$link = "http://www.freethetvchallenge.com/details/faq";
		$title = "Samsung Smart TV";
		$code = "samsung";
	}
	elseif(preg_match('/Samsung/i', $useragent))
	{
		$link = "http://www.samsungmobile.com/";
		$title = "Samsung";

		if(preg_match('/Samsung-([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " ".$regmatch[1];
		}

		$code = "samsung";
	}

	// Sony Ericsson
	elseif(preg_match('/SonyEricsson/i', $useragent))
	{
		$link = "http://en.wikipedia.org/wiki/SonyEricsson";
		$title = "SonyEricsson";

		if(preg_match('/SonyEricsson([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			if(strtolower($regmatch[1])==strtolower("U20i"))
			{
				$title .= " Xperia X10 Mini Pro";
			}
			else
			{
				$title .= " ".$regmatch[1];
			}
		}

		$code = "sonyericsson";
	}

	//ZTE
    elseif(preg_match('/vivo/i', $useragent))
    {
        $link = "http://www.vivo.com.cn/";
        $title = "VIVO";
        $code = "vivo";
		if(preg_match('/VIVO ([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[1];
		}
    }

	//ZTE
    elseif(preg_match('/zte/i', $useragent))
    {
        $link = "http://www.zte.com.cn/cn/";
        $title = "ZTE";
        $code = "zte";
		if(preg_match('/ZTE(-T)? ?([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= " " . $regmatch[2];
		}
    }

	
	// Ubuntu Phone/Tablet
	elseif(preg_match('/Ubuntu\;\ Mobile/i', $useragent))
	{
		$link = "http://www.ubuntu.com/phone";
		$title = "Ubuntu Phone";
		$code = "ubuntutouch";
	}
	elseif(preg_match('/Ubuntu\;\ Tablet/i', $useragent))
	{
		$link = "http://www.ubuntu.com/tablet";
		$title = "Ubuntu Tablet";
		$code = "ubuntutouch";
	}

	// Windows Phone
	elseif(preg_match('/Windows Phone|WPDesktop/i', $useragent))
	{
		$link = "http://www.windowsphone.com/";
		$title = "Windows Phone";
		$code = "windowsphone";
	}

	//Some special UA..
	//is MSIE
	elseif(preg_match('/MSIE.+?Windows.+?Trident/i', $useragent) && !preg_match('/Windows ?Phone/i', $useragent))
	{
		$link = "";
		$title = "";
		$code = "";		
	}
	// No Device match
	else
	{
		
	}
	
	return array(
		'link' => $link,
		'title' => $title, 
		'image' => $code,
		'dir' => 'device'
	);

}

?>
