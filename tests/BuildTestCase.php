<?php
/**
 * Test Useragent
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_NOTICE);
include '../useragent.class.php';
$list = explode("\n", file_get_contents("useragentstring.txt"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UserAgent</title>
</head>
<body>
	<!--<table>
		<tr>
			<th>Browser</th>
			<th>OS</th>
			<th>Device</th>
			<th>Platform</th>
			<th>UserAgent</th>
		</tr>-->
		<?php
foreach ($list as $value) {
	//var_dump(trim($value));exit;
	//$imageSize = rand(1, 2) == 2 ? 24 : 16;
	//$imagePath = rand(1, 2) == 2 ? ((string) ((int) (rand() * 10000))) . '/' : null;
	//$imageExtension = rand(1, 2) == 2 ? ".gif" : null;
	$useragent = UserAgentFactory::analyze(trim($value)); //, $imageSize, $imagePath, $imageExtension);
	?>
<pre>			array(
					array('<?php echo $useragent->useragent ?>'),
					array('<?php echo $useragent->browser['image'] ?>', '<?php echo $useragent->platform['image'] ?>', '<?php echo $useragent->browser['name'] ?>', '<?php echo $useragent->browser['version'] ?>', '<?php echo $useragent->browser['title'] ?>', '<?php echo $useragent->os['name'] ?>', '<?php echo $useragent->os['version'] ?>', '<?php echo $useragent->os['title'] ?>', '<?php echo $useragent->device['title'] ?>', '<?php echo $useragent->platform['type'] ?>')
				),
</pre><!--
		<tr>
			<td>
				<img src="<?php echo $useragent->browser['image'] ?>"/><?php echo $useragent->browser['title'] ?></td>
			<td>
				<img src="<?php echo $useragent->os['image'] ?>"/><?php echo $useragent->os['title'] ?></td>
			<td>
				<img src="<?php echo $useragent->device['image'] ?>"/><?php echo $useragent->device['title'] ?></td>
			<td>
				<img src="<?php echo $useragent->platform['image'] ?>"/><?php echo $useragent->platform['title'] ?></td>
			<td>
				<?php echo $useragent->useragent ?></td>
		</tr>
-->
		<?php //exit;
}
?><!--</table>-->

</body>
</html>