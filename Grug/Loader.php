<?php
namespace Grug;

class Loader {
	static function autoload($class) {
		require_once BASEDIR."/".str_replace("\\", "/", $class).".php";
	}
}