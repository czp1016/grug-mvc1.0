<?php
namespace App\Models;
use Grug\Model; //引入基类Model

class TestModel extends Model{
    const TAB_NAME = "user";
    const DB_CONF  = "db_1_conf";
    const CON_TYPE  = "IMysqli";
    public function __construct() {

        parent::__construct(self::DB_CONF, self::TAB_NAME, self::CON_TYPE);
    }
    public function getInfo() {
        return '瓜哥';
    }

    public function getData() {  
        //$where[] = array('field' => 'name', 'condition' => 'test');
        $arr = $this->findAll();    
        return $arr;
    }
    public function addUser($data) {
        return $this->insert($data);
    }
    public function deleteUser($id) {
        $where[] = array('field' => 'id', 'condition' => $id);
        return $this->delete($where);
    }
}