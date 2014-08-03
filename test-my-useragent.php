<?php
/**
 * Test Useragent
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);

// Include our main UA detection functions
include('./useragent-detect-device.php');
include('./useragent-detect-os.php');
include('./useragent-detect-platform.php');
include('./useragent-detect-webbrowser.php');
include('./useragent-detect-webbrowser-version.php');

$useragent = $_SERVER['HTTP_USER_AGENT'];
var_dump($useragent);
$webbrowser = detect_webbrowser($useragent);
$platform = detect_platform($useragent);
echo "\n" . '<br/><img src="img/24/net/' . $webbrowser['image'] . '.png" />' . $webbrowser['title'];
echo "\n" . '<br/><img src="img/24/' . $platform['dir'] . '/' . $platform['image'] . '.png" />' . $platform['title'];

exit;
