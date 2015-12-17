<?php
namespace Grug;

class Application {
    public $base_dir;
    protected static $instance;
    public static $config;

    protected function __construct($base_dir) {
        $this->base_dir = $base_dir;
        self::$config = new Config($base_dir.'/Conf'); //设置配置文件路径
        //var_dump(self::$config->offsetGet('database')) ;
    }

    static function getInstance($base_dir = '') {
        if (empty(self::$instance)) {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }

    public function dispatch() {
        $uri = $_SERVER['REQUEST_URI']; //获取URL链接
        $uri_arr = explode('/', trim($uri, '/'));
        $method_param = array_pop($uri_arr);
        $method = array_shift(explode('?', $method_param));
        $controller = array_pop($uri_arr);
        $controller_low = strtolower($controller);
        $controller = ucwords($controller_low);
        $class = '\\App\\Controllers\\'.$controller.'Controller';
        $obj = new $class($controller, $method);
        if (method_exists($obj,'init')) {
            $obj->init();
        }
        $return_value = $obj->$method();
    }
}