<?php
namespace Grug;

class Config implements \ArrayAccess {
	protected $path;
	protected $configs = array();
	public function __construct($path) {
		$this->path = $path;
	}

	public function offsetGet($key) {
		if (empty($this->configs[$key])) {
			$file_path = $this->path.'/'.$key.'.php';
			$config = require $file_path;
			$this->configs[$key] = $config;
		}
		return $this->configs[$key];
	}

	public function offsetSet($key, $value) {
		throw new \Exception("cannot write config file.");
	}

	public function offsetExists($key) {
		return isset($this->configs[$key]);
	}

	public function offsetUnset($key) {
		unset($this->configs[$key]);
	}
}