<?php
/**
 * Test
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
include './useragent.class.php';

class UserAgentFactoryTest extends PHPUnit_Framework_TestCase {

	function testFunction() {
		$useragent = UserAgentFactory::analyze('test');
		$this->assertEquals($useragent->test, null);

	}

	function testCustomImage() {
		$useragent = UserAgentFactory::analyze('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36 114Browser/5.0', 16, '15820000/', '.gif');
		$this->assertEquals($useragent->browser['image'], '15820000/16/browser/114browser.gif');
		$this->assertEquals($useragent->platform['image'], '15820000/16/os/win-2.gif');
		$useragent = UserAgentFactory::analyze('Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36 115Browser/5.1.3', 24, null, null);
		$this->assertEquals($useragent->browser['image'], 'img/24/browser/115browser.png');
		$this->assertEquals($useragent->platform['image'], 'img/24/os/win-2.png');
	}

	function testUserAgent() {
		$testList = include './tests/UserAgentList.php';
		foreach ($testList as $list) {
			$original = $list[0];
			$result = $list[1];
			$useragent = UserAgentFactory::analyze($original[0]);
			$this->assertEquals($result[0], $useragent->browser['image'], $useragent->useragent);
			$this->assertEquals($result[1], $useragent->platform['image'], $useragent->useragent);
			$this->assertEquals($result[2], $useragent->browser['name'], $useragent->useragent);
			$this->assertEquals($result[3], $useragent->browser['version'], $useragent->useragent);
			$this->assertEquals($result[4], $useragent->browser['title'], $useragent->useragent);
			$this->assertEquals($result[5], $useragent->os['name'], $useragent->useragent);

			$this->assertEquals($result[6], $useragent->os['version'], $useragent->useragent);
			$this->assertEquals($result[7], $useragent->os['title'], $useragent->useragent);
			$this->assertEquals($result[8], $useragent->device['title'], $useragent->useragent);
			$this->assertEquals($result[9], $useragent->platform['type'], $useragent->useragent);

			$this->assertFileExists($useragent->browser['image']);
			$this->assertFileExists($useragent->platform['image']);
			$this->assertFileExists($useragent->os['image']);
			$this->assertFileExists(str_replace('img/16', 'img/24', $useragent->browser['image']));
			$this->assertFileExists(str_replace('img/16', 'img/24', $useragent->platform['image']));
			$this->assertFileExists(str_replace('img/16', 'img/24', $useragent->os['image']));
		}
	}
}