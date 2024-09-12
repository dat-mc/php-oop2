<?php

namespace Ember\App\Blog;

use Ember\App\Core\Db;
use Ember\App\Interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function find(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function get()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insert()
    {
        //TODO реализовать INSERT
        //$sql = "INSERT INTO posts (title, text) VALUES ('$title', '$text')"
        foreach ($this as $key => $value) {
            echo $key . ' => ' . $value . "\n";
        }
    }

    abstract public function getTableName();
}