<?php
Class UserAgentFactory {
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
				} else {
					return null;
				}
				break;
		}
	}

	public function __set($name, $value) {
		$trueName = '_' . $name;
		if (isset($this->$trueName)) {
			$this->$trueName = $value;
			return true;
		} else {
			return false;
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
		require_once './lib/' . $className . '.php';
	}

	public function analyze($string) {
		$this->_data['useragent'] = $string;
		$classList = array("device", "os", "browser");
		foreach ($classList as $value) {
			$class = "useragent_detect_" . $value;
			$this->_data[$value] = $class::analyze($string);
			$this->_data[$value]['image'] = $this->_makeImage($value, $this->_data[$value]['code']);
		}

		// platform
		$this->_makePlatform();
	}

}
spl_autoload_register(array('UserAgent', '__autoload'));