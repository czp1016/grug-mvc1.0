<?php
namespace Grug;

class Model extends Db{

    public function __construct($connect_info, $table, $connect_type) {
        parent::__construct($connect_info, $table, $connect_type);
    }
    /**
     * 获取model对象
     * @param string $model_name
     * 
     * @return obj
     */
    public function M($model_name) {
        $model = $model_name.'Model';
        return Factory::getModel($model);
    }
    /**
     * 单例模式获取model对象
     * @param string $model_name
     * 
     * @return obj
     */
    public function S($model_name) {
        $model = $model_name.'Model';
        return Factory::getSingletonModel($model);
    }

}