<?php
/**
 * Useragent Class
 * @package php-useragent
 * @author zsx <zsx@zsxsoft.com>
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

Class UserAgentFactory {
/**
 * analyze
 * @static
 * @param  string $string         UserAgent String]
 * @param  string $imageSize      Image Size(16 / 24)
 * @param  string $imagePath      Image Path
 * @param  string $imageExtension Image Description
 * @return UserAgent
 */
	public static function analyze($string, $imageSize = null, $imagePath = null, $imageExtension = null) {
		$class = new UserAgent();
		$imageSize === null || $class->imageSize = $imageSize;
		$imagePath === null || $class->imagePath = $imagePath;
		$imageExtension === null || $class->imageExtension = $imageExtension;
		$class->analyze($string);
		return $class;
	}
}

class UserAgent {
	private $_imagePath = "";
	private $_imageSize = 16;
	private $_imageExtension = ".png";

	private $_data = array();

	public function __get($param) {
		$privateParam = '_' . $param;
		switch ($param) {
			case 'imagePath':
				return $this->_imagePath . $this->_imageSize . '/';
				break;
			default:
				if (isset($this->$privateParam)) {
					return $this->$privateParam;
				} else if (isset($this->_data[$param])) {
					return $this->_data[$param];
				}
				break;
		}
		return null;
	}

	public function __set($name, $value) {
		$trueName = '_' . $name;
		if (isset($this->$trueName)) {
			$this->$trueName = $value;
		}
	}

	public function __construct() {
		$this->_imagePath = 'img/';
	}

	private function _makeImage($dir, $code) {
		return $this->imagePath . $dir . '/' . $code . $this->imageExtension;
	}

	private function _makePlatform() {

		$this->_data['platform'] = &$this->_data['device'];
		if ($this->_data['device']['title'] != '') {
			$this->_data['platform'] = &$this->_data['device'];
		} else if ($this->_data['os']['title'] != '') {
			$this->_data['platform'] = &$this->_data['os'];
		} else {
			$this->_data['platform'] = array(
				"link" => "#",
				"title" => "Unknown",
				"code" => "null",
				"dir" => "browser",
				"image" => $this->_makeImage('browser', 'null'),
			);
		}

	}

	public static function __autoload($className) {
		$filePath = dirname(__file__) . '/lib/' . $className . '.php';
		if (is_file($filePath)) {
			require_once $filePath;
		}
	}

	public function analyze($string) {
		$this->_data['useragent'] = $string;
		$classList = array("device", "os", "browser");
		foreach ($classList as $value) {
			$class = "useragent_detect_" . $value;
			// Not support in PHP 5.2
			//$this->_data[$value] = $class::analyze($string);
			$this->_data[$value] = call_user_func($class . '::analyze', $string);
			$this->_data[$value]['image'] = $this->_makeImage($value, $this->_data[$value]['code']);

		}

		// platform
		$this->_makePlatform();
	}

}
spl_autoload_register(array('UserAgent', '__autoload'));