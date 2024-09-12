<?php

namespace Ember\App\Blog;

use Ember\App\Core\Db;
use Ember\App\Interfaces\IModel;

abstract class Model implements IModel
{
    protected $props = [];

    public function __set($name, $value)
    {
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public static function find(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function get()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[':' . $key] = $this->$key;
            $columns[] = $key;
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ($columns) VALUES ($values);";

        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    // TODO: Update method

    abstract public static function getTableName();
}
