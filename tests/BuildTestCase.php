<?php
/**
 * Test Useragent
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_NOTICE);
require_once dirname(__FILE__) . '/../vendor/autoload.php';
$list = explode("\n", file_get_contents(dirname(__FILE__) . "/useragentstring.txt"));
foreach ($list as $value) {
	$useragent = UserAgentFactory::analyze(trim($value));
?>
array(
	array('<?php echo $useragent->useragent ?>'),
	array('<?php echo $useragent->browser['image'] ?>', '<?php echo $useragent->platform['image'] ?>', '<?php echo $useragent->browser['name'] ?>', '<?php echo $useragent->browser['version'] ?>', '<?php echo $useragent->browser['title'] ?>', '<?php echo $useragent->os['name'] ?>', '<?php echo $useragent->os['version'] ?>', '<?php echo $useragent->os['title'] ?>', '<?php echo $useragent->device['title'] ?>', '<?php echo $useragent->platform['type'] ?>'),
),
<?php //exit;
}
?>
