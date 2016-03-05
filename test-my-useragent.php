<?php
/**
 * Test Useragent
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include dirname(__FILE__) . '/useragent.class.php';
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
    <p>Device: <img src="<?php echo $useragent->device['image'] ?>"/><?php echo $useragent->device['title'] ?>(Brand: <?php echo $useragent->device['brand'] ?>, Model: <?php echo $useragent->device['model'] ?>) </p>
    <p>OS: <img src="<?php echo $useragent->os['image'] ?>"/><?php echo $useragent->os['title'] ?> (Name = <?php echo $useragent->os['name'] ?>, Version = <?php echo $useragent->os['version'] ?>)</p>
    <p>Browser: <img src="<?php echo $useragent->browser['image'] ?>"/><?php echo $useragent->browser['title'] ?> (Name = <?php echo $useragent->browser['name'] ?>, Version = <?php echo $useragent->browser['version'] ?>)</p>

</body>
</html>