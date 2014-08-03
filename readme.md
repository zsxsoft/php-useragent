# PHP-UserAgent

A simple project that allows you to display details about a computer's operating system or web browser with a user-agent.

## Contributors
zsx(http://www.zsxsoft.com)

This project based on [kyleabaker](http://www.kyleabaker.com/goodies/coding/wp-useragent/)'s "wp-useragent".

## Example
```php
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
```
##License
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
