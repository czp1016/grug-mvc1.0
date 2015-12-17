<?php
namespace Grug;

class Factory {
    static function getModel($name) {
        $class = '\\App\\Models\\'.$name;
        $model = new $class;
        return $model;
    }
    static function getSingletonModel($name) { //使用单例模式获取实例
        $key = 'model_'.$name;
        $model = Register::get($key);
        if (!$model) {
            $class = '\\App\\Models\\'.$name;
            $model = new $class;
            Register::set($key, $model);
        }
        return $model;
    }
}