<?php
namespace Grug;

class Register {
	protected static $objects;
	static function set($alias, $object){
		self::$objects[$alias] = $object; 
	}
	static function get($name){
		return isset(self::$objects[$name]) ? self::$objects[$name] : null;
	}
	public function _unset($alias){
		unset(self::$objects[$alias]);
	}
}