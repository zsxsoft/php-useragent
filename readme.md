# PHP-UserAgent
[![Build Status](https://travis-ci.org/zsxsoft/php-useragent.svg)](https://travis-ci.org/zsxsoft/php-useragent)
[![Latest Stable Version](https://poser.pugx.org/zsxsoft/php-useragent/v/stable.png)](https://packagist.org/packages/zsxsoft/php-useragent)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/ade685edac6c4b86913c1b9785612a10)](https://www.codacy.com/app/zsxsoft/php-useragent)
[![Packagist](https://img.shields.io/packagist/dt/zsxsoft/php-useragent.svg)](https://packagist.org/packages/zsxsoft/php-useragent)

A User-agent analyze project.

## Try it

http://www.zsxsoft.com/php-useragent/test-my-useragent.php

## JavaScript Edition

[https://github.com/zsxsoft/useragent.js/ ](https://github.com/zsxsoft/useragent.js)

## Contributors
zsx(http://www.zsxsoft.com)

The project is based on [kyleabaker](http://www.kyleabaker.com/goodies/coding/wp-useragent/)'s "wp-useragent".

## Supported Browsers/Platforms

[Click here to see full list.](http://project.zsxsoft.com/useragent.js/supported.html)

Tested Browsers: Amazon Silk / Android Webkit / Avant Browser / Comodo Dragon / curl / Firefox / Google Chrome / Internet Explorer / Microsoft Edge / Links / Lynx / Maxthon / MxNitro / Opera / QQBrowser / Safari SRWare Iron / Teleca Q7 / UC Browser / Vivaldi / W3M / wget / Yandex.Browser and so on.. 

OS: Android / Arch Linux / CentOS / Chrome OS / Debain / Fedora / FreeBSD / OSX / Red Hat / openSUSE / SymbianOS / Unix / Palm webOS / Windows 3.1 - 10 / Ubuntu / Linux and so on..

Devices: Xiaomi / BlackBerry / Nexus / HTC / Huawei / Kindle / Lenovo / LG / Motorola / Nokia / OnePlus / PlayStation / Samsung / Sony Xperia / ZTE / Ubuntu / Windows Phone / Apple Family and so on.


## Example &amp; API
```php
<?php
/**
 * Test Useragent
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include './useragent.class.php';
$useragent = UserAgentFactory::analyze($_SERVER['HTTP_USER_AGENT']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UserAgent</title>
</head>
<body>
    <h1>Test UserAgent</h1>
    <p>UserAgent: <?php echo $useragent->useragent; ?></p>
    <p>Platform Type: <?php echo $useragent->platform['type'] ?>
    <p>Device: <img src="<?php echo $useragent->device['image'] ?>"/><?php echo $useragent->device['title'] ?> </p>
    <p>OS: <img src="<?php echo $useragent->os['image'] ?>"/><?php echo $useragent->os['title'] ?> (Name = <?php echo $useragent->os['name'] ?>, Version = <?php echo $useragent->os['version'] ?>)</p>
    <p>Browser: <img src="<?php echo $useragent->browser['image'] ?>"/><?php echo $useragent->browser['title'] ?> (Name = <?php echo $useragent->browser['name'] ?>, Version = <?php echo $useragent->browser['version'] ?>)</p>

</body>
</html>
```

##License
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
