<?php
/**
 * Detect $console or Mobile Device
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @author Kyle Baker <kyleabaker@gmail.com>
 * @author Fernando Briano <transformers.es@gmail.com>
 * @copyright Copyright 2014-2017 zsx
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
        $brand = '';
        $model = '';
        $image_url = '';

        // BenQ-Siemens (Openwave)
        /*elseif(preg_match('/[^M]SIE/i', $useragent))
        {
        $link = "http://en.wikipedia.org/wiki/BenQ-Siemens";
        $brand = "BenQ-Siemens";

        if(preg_match('/[^M]SIE-([.0-9a-zA-Z]+)\//i', $useragent, $regmatch))
        {
        $title .= " ".$regmatch[1];
        }

        $image_url = "benq-siemens";
        }*/

        // meizu
        if (preg_match('/MEIZU[ _-](MX|M9)|MX[0-9]{0,1}[; ]|M0(4|5)\d|M35\d|M\d note/i', $useragent)) {
            $link = "http://www.meizu.com/";
            $brand = "Meizu";
            $image_url = "meizu";

            if (preg_match('/(M35[0-9]+)|(M04\d)|(M05\d)/i', $useragent, $regmatch)) {
                $model = $regmatch[count($regmatch) - 1];
            } elseif (preg_match('/(MX[0-9]{0,1})/i', $useragent, $regmatch)) {
                $model = $regmatch[count($regmatch) - 1];
            } elseif (preg_match('/(m\d Note)/i', $useragent, $regmatch)) {
                $model = $regmatch[count($regmatch) - 1];
            }

        }

        // xiaomi
        elseif (preg_match('/MI-ONE|MI[ -]\d/i', $useragent)) {
            $link = "http://www.xiaomi.com/";
            $brand = "Xiaomi";

            if (preg_match('/HM NOTE ([A-Z0-9]+)/i', $useragent, $regmatch)) {
                $model = "HM-NOTE " . $regmatch[1];
            } elseif (preg_match('/MI-ONE/i', $useragent, $regmatch)) {
                $model = "1";
            } elseif (preg_match('/MI[ -]([A-Z0-9]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }

            $image_url = "xiaomi";
        }

        // redmi
        elseif (preg_match('/HM NOTE|HM \d|Redmi/i', $useragent)) {
            $link = "http://www.xiaomi.com/";
            $brand = "Redmi";

            if (preg_match('/HM NOTE ([A-Z0-9]+)/i', $useragent, $regmatch)) {
                $model = "Note " . $regmatch[1];
            } elseif (preg_match('/HM ([A-Z0-9]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            } elseif (preg_match('/RedMi Note ([A-Z0-9]+)/i', $useragent, $regmatch)) {
                $model = "Note " . $regmatch[1];
            }

            $image_url = "xiaomi";
        }

        // BlackBerry
        elseif (preg_match('/BlackBerry/i', $useragent)) {
            $link = "http://www.blackberry.com/";
            $brand = "BlackBerry";

            if (preg_match('/blackberry ?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }

            $image_url = "blackberry";
        }
        // Coolpad
        elseif (preg_match('/Coolpad/i', $useragent)) {
            $link = "http://www.coolpad.com/";
            $brand = "CoolPad";

            if (preg_match('/CoolPad( |\_)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[2];
            }

            $image_url = "coolpad";
        }

        // Dell
        elseif (preg_match('/Dell Streak/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Dell_Streak";
            $brand = "Dell Streak";
            $image_url = "dell";
        } elseif (preg_match('/Dell/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Dell";
            $brand = "Dell";
            $image_url = "dell";
        }
        // Google TV
        elseif (preg_match('/Google ?TV/i', $useragent)) {
            $link = "https://www.android.com/tv/";
            $brand = "Google TV";
            $image_url = "android";
        }

        // Hisense
        elseif (preg_match('/Hasee/i', $useragent)) {
            $link = "http://www.hasee.com/";
            $brand = "Hasee";
            $image_url = "hasee";
            if (preg_match('/Hasee (([^;\/]+) Build|([^;\/)]+)[);\/ ])/i', $useragent, $regmatch)) {
                $model = $regmatch[2];
            }
        }

        // HTC
        elseif (preg_match('/Desire/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/HTC_Desire";
            $brand = "HTC Desire";
            $image_url = "htc";
        } elseif (preg_match('/Rhodium/i', $useragent)
            || preg_match('/HTC[_|\ ]Touch[_|\ ]Pro2/i', $useragent)
            || preg_match('/WMD-50433/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/HTC_Touch_Pro2";
            $brand = "HTC Touch Pro2";
            $image_url = "htc";
        } elseif (preg_match('/HTC[_|\ ]Touch[_|\ ]Pro/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/HTC_Touch_Pro";
            $brand = "HTC Touch Pro";
            $image_url = "htc";
        } elseif (preg_match('/Windows Phone .+ by HTC/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation";
            $brand = "HTC";
            if (preg_match('/Windows Phone ([0-9A-Za-z]+) by HTC/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }
            $image_url = "htc";
        } elseif (preg_match('/HTC/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation";
            $brand = "HTC";

            if (preg_match('/HTC[\ |_|-]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            } elseif (preg_match('/HTC([._0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model .= str_replace("_", " ", $regmatch[1]);
            }

            $image_url = "htc";
        }

        // Hisense
        elseif (preg_match('/Hisense|HS-(?:U|EG?|I|T|X)[0-9]+[a-z0-9\-]*/i', $useragent)) {
            $link = "http://www.hisense.com/";
            $brand = "Hisense";
            $image_url = "hisense";
            if (preg_match('/(HS-(?:U|EG?|I|T|X)[0-9]+[a-z0-9\-]*)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }
        }

        // huawei
        elseif (preg_match('/Huawei/i', $useragent)) {
            $link = "http://www.huawei.com/cn/";
            $brand = "Huawei";
            $image_url = "huawei";
            if (preg_match('/HUAWEI( |\_)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[2];
            }
        } elseif (preg_match('/HONOR[\ ]?([A-Za-z0-9]{3,4}\-[A-Za-z0-9]{3,4})|(Che[0-9]{1}-[a-zA-Z0-9]{4})/i', $useragent, $regmatch)) {
            $link = "http://www.huawei.com/cn/";
            $brand = "Huawei";
            $model = $regmatch[count($regmatch) - 1];
            $image_url = "huawei";
        } elseif (preg_match('/(H60-L\d+)/i', $useragent, $regmatch)) {
            $link = "http://www.huawei.com/cn/";
            $brand = "Huawei";
            $model = $regmatch[count($regmatch) - 1];
            $image_url = "huawei";
        }

        // Kindle
        elseif (preg_match('/Kindle/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Amazon_Kindle";
            $brand = "Kindle";

            if (preg_match('/Kindle\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }

            $image_url = "kindle";
        }
        // K-Touch
        elseif (preg_match('/k-touch/i', $useragent)) {
            $link = "http://www.k-touch.cn/";
            $brand = "K-Touch";
            $image_url = "k-touch";
            if (preg_match('/k-touch[ _]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }
        }
        // Lenovo
        elseif (preg_match('/Lenovo|lepad|Yoga/i', $useragent)) {
            $link = "http://www.lenovo.com.cn";
            $brand = "Lenovo";

            if (preg_match('/Lenovo[\ |\-|\/|\_]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            } elseif (preg_match('/Yoga( Tablet)?[\ |\-|\/|\_]([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = "Yoga " . $regmatch[2];
            } elseif (preg_match('/lepad/i', $useragent)) {
                $model = 'LePad';
            }

            $image_url = "lenovo";

        }
        // Letv
        elseif (preg_match('/Letv/i', $useragent)) {
            $link = "http://www.letv.com";
            $brand = "Letv";

            if (preg_match('/Letv?([- \/])([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[2];
            }

            $image_url = "letv";
        }
        // LG
        elseif (preg_match('/LG/i', $useragent)) {
            $link = "http://www.lgmobile.com";
            $brand = "LG";

            if (preg_match('/LGE?([- \/])([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[2];
            }

            $image_url = "lg";
        }

        // Motorola
        elseif (preg_match('/\ Droid/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Motorola_Droid";
            $brand = "Motorola";
            $model = "Droid";
            $image_url = "motorola";
        } elseif (preg_match('/XT720/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Motorola";
            $brand = "Motorola";
            $model = "XT720";
            $image_url = "motorola";
        } elseif (preg_match('/MOT-/i', $useragent)
            || preg_match('/MIB/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Motorola";
            $brand = "Motorola";

            if (preg_match('/MOTO([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }
            if (preg_match('/MOT-([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }

            $image_url = "motorola";
        } elseif (preg_match('/XOOM/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Motorola_Xoom";
            $brand = "Motorola";
            $model = "Xoom";
            $image_url = "motorola";
        }

        // Microsoft
        elseif (preg_match('/Microsoft/i', $useragent)) {
            $link = "http://www.microsoft.com/";
            $brand = "Microsoft";
            $image_url = "microsoft";
            if (preg_match('/Lumia ([0-9]+)/i', $useragent, $regmatch)) {
                $model = "Lumia " . $regmatch[1];
            }
            //}
        }
        // Nintendo
        elseif (preg_match('/Nintendo/i', $useragent)) {
            $brand = "Nintendo";
            $link = "http://www.nintendo.com/";
            $image_url = "nintendo";

            if (preg_match('/Nintendo DSi/i', $useragent)) {
                $link = "http://www.nintendodsi.com/";
                $model = "DSi";
                $image_url = "nintendodsi";
            } elseif (preg_match('/Nintendo DS/i', $useragent)) {
                $link = "http://www.nintendo.com/ds";
                $model = "DS";
                $image_url = "nintendods";
            } elseif (preg_match('/Nintendo WiiU/i', $useragent)) {
                $link = "http://www.nintendo.com/wiiu";
                $model = "Wii U";
                $image_url = "nintendowiiu";
            } elseif (preg_match('/Nintendo Wii/i', $useragent)) {
                $link = "http://www.nintendo.com/wii";
                $model = "Wii";
                $image_url = "nintendowii";
            }
        }

        // Nokia
        elseif (preg_match('/Nokia/i', $useragent)) {
            /*if (!(/S(eries)?60/i.test(useragent)) || !/Symbian/i.test(useragent))
            {*/
            $link = "http://www.nokia.com/";
            $brand = "Nokia";
            $image_url = "nokia";
            if (preg_match('/Nokia(E|N| )?([0-9]+)/i', $useragent, $regmatch)) {
                if (preg_match('/IEMobile|WPDesktop|Edge/i', $useragent)) {
                    // Nokia Windows Phone
                    if ($regmatch[2] == '909') {
                        $regmatch[2] = '1020';
                    }
                    // Lumia 1020
                    $model = "Lumia " . $regmatch[2];
                } else {
                    $model = $regmatch[1] . $regmatch[2];
                }
            } elseif (preg_match('/Lumia ([0-9]+)/i', $useragent, $regmatch)) {
                $model = "Lumia " . $regmatch[1];
            }

            //}
        }

        // Onda
        elseif (preg_match('/onda/i', $useragent)) {
            $link = "http://www.onda.cn/";
            $brand = "Onda";
            $image_url = "onda";
        }
        // Onda
        elseif (preg_match('/oppo/i', $useragent)) {
            $link = "http://www.oppo.com/";
            $brand = "OPPO";
            $image_url = "oppo";
        }
        // Oneplus
        elseif (preg_match('/A0001|A2005|A3000|E1003|One [A-Z]\d{4}/i', $useragent)) {
            $link = "http://www.oneplus.cn/";
            $brand = "OnePlus";
            $image_url = "oneplus";

            if (preg_match('/A0001/i', $useragent)) {
                $model = "1";
            } elseif (preg_match('/A2005/i', $useragent)) {
                $model = "2";
            } elseif (preg_match('/E1003/i', $useragent)) {
                $model = "X";
            } elseif (preg_match('/A3000/i', $useragent)) {
                $model = "3";
            }
        }
        // Palm
        elseif (preg_match('/\ Pixi\//i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Palm_Pixi";
            $brand = "Palm Pixi";
            $image_url = "palm";
        } elseif (preg_match('/\ Pre\//i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Palm_Pre";
            $brand = "Palm Pre";
            $image_url = "palm";
        } elseif (preg_match('/Palm/i', $useragent)) {
            $link = "http://www.palm.com/";
            $brand = "Palm";
            $image_url = "palm";
        } elseif (preg_match('/webos/i', $useragent)) {
            $link = "http://www.palm.com/";
            $brand = "Palm";
            $image_url = "palm";
        }

        // Playstation
        elseif (preg_match('/PlayStation/i', $useragent)) {
            $brand = "PlayStation";

            if (preg_match('/[PS|PlayStation\ ]3/i', $useragent)) {
                $link = "http://www.us.playstation.com/PS3";
                $model = "3";
            } elseif (preg_match('/[PS|PlayStation\ ]4/i', $useragent)) {
                $link = "http://www.us.playstation.com/PS4";
                $model = "4";
            } elseif (preg_match('/PlayStation Portable|PSP/i', $useragent)) {
                $link = "http://www.us.playstation.com/PSP";
                $model = "Portable";
            } elseif (preg_match('/PlayStation Vita|PSVita/i', $useragent)) {
                $link = "http://us.playstation.com/psvita/";
                $model = "Vita";
            } else {
                $link = "http://www.us.playstation.com/";
            }

            $image_url = "playstation";
        }

        // Samsung
        elseif (preg_match('/Galaxy Nexus/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/Galaxy_Nexus";
            $brand = "Galaxy Nexus";
            $image_url = "samsung";
        } elseif (preg_match('/Smart-?TV/i', $useragent)) {
            $link = "http://www.samsung.com/us/experience/smart-tv/";
            $brand = "Samsung Smart TV";
            $image_url = "samsung";
        } elseif (preg_match('/Samsung|SM-|GT-|SCH-|SHV-/i', $useragent)) {
            $link = "http://www.samsungmobile.com/";
            $brand = "Samsung";

            if (preg_match('/(Samsung-|GT-|SM-|SCH-|SHV-)([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[2];
            }

            $image_url = "samsung";
        }

        // Sony Ericsson
        elseif (preg_match('/SonyEricsson/i', $useragent)) {
            $link = "http://en.wikipedia.org/wiki/SonyEricsson";
            $brand = "SonyEricsson";

            if (preg_match('/SonyEricsson([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }

            $image_url = "sonyericsson";
        }
        // vivo
        elseif (preg_match('/tcl/i', $useragent)) {
            $link = "http://www.tcl.com/";
            $brand = "TCL";
            $image_url = "tcl";
            if (preg_match('/TCL[\ |\-]([0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }
        }
        // vivo
        elseif (preg_match('/vivo/i', $useragent)) {
            $link = "http://www.vivo.com.cn/";
            $brand = "vivo";
            $image_url = "vivo";
            if (preg_match('/VIVO ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[1];
            }
        }

        // Xperia
        elseif (preg_match('/Xperia/i', $useragent)) {
            $link = "http://www.sonymobile.com/";
            $brand = "Xperia";
            $image_url = "xperia";
            if (preg_match('/Xperia(-T)?( |\_|\-)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[3];
            }
        }
        // ZTE
        elseif (preg_match('/zte/i', $useragent)) {
            $link = "http://www.zte.com.cn/cn/";
            $brand = "ZTE";
            $image_url = "zte";
            if (preg_match('/ZTE(-T)?( |\_|\-)?([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model = $regmatch[3];
            }
        }

        // Ubuntu Phone/Tablet
        elseif (preg_match('/Ubuntu\;\ Mobile/i', $useragent)) {
            $link = "http://www.ubuntu.com/phone";
            $brand = "Ubuntu Phone";
            $image_url = "ubuntutouch";
        } elseif (preg_match('/Ubuntu\;\ Tablet/i', $useragent)) {
            $link = "http://www.ubuntu.com/tablet";
            $brand = "Ubuntu Tablet";
            $image_url = "ubuntutouch";
        }

        // Google
        elseif (preg_match('/Nexus/i', $useragent)) {
            $link = "https://www.google.com/nexus/";
            $brand = "Google";
            $image_url = "google-nexusone";
            $model = "Nexus";
            if (preg_match('/Nexus ([.0-9a-zA-Z]+)/i', $useragent, $regmatch)) {
                $model .= " " . $regmatch[1];
            }
        }

        // Apple
        elseif (preg_match('/iPad/i', $useragent)) {
            $link = "http://www.apple.com/itunes";
            $model = "iPad";
            $brand = 'Apple';
            $image_url = "ipad";
        } elseif (preg_match('/iPod/i', $useragent)) {
            $link = "http://www.apple.com/itunes";
            $model = "iPod";
            $brand = 'Apple';
            $image_url = "iphone";
        } elseif (preg_match('/iPhone/i', $useragent)) {
            $link = "http://www.apple.com/iphone";
            $model = "iPhone";
            $brand = 'Apple';
            $image_url = "iphone";
        }

        //Some special UA..
        //is MSIE
        elseif (preg_match('/MSIE.+?Windows.+?Trident/i', $useragent) && !preg_match('/Windows ?Phone/i', $useragent)) {
            $link = "";
            $brand = "";
            $image_url = "null";
        }
        // No Device match
        else {
            $image_url = "null";
        }

        $title = $brand . ($model == '' ? '' : ' ' . $model);

        return array(
            'link' => $link,
            'title' => $title,
            'model' => $model,
            'brand' => $brand,
            'code' => $image_url,
            'dir' => 'device',
            'type' => 'device',
        );

    }
}
