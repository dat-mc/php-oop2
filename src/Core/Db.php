<?php

namespace Ember\App\Core;

use Ember\App\Traits\Tsingletone;
use PDO;

class Db
{
    use Tsingletone;

    private $config = [
        'driver' => 'pgsql',
        'host' => 'localhost',
        'login' => 'postgres',
        'password' => 'password',
        'port' => '5432',
        'database' => 'blog'
    ];

    private $connection = null;

    private function getConnection(): PDO
    {
        if (is_null($this->connection)) {
            $this->connection = new PDO($this->getDSN());
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function getDSN()
    {
        return sprintf(
            "%s:host=%s;port=%s;dbname=%s;user=%s;password=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['port'],
            $this->config['database'],
            $this->config['login'],
            $this->config['password']
        );
    }

    private function query($sql, $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute($sql, $params = [])
    {
        //тут будут выполняться insert delete
    }

    public function lastInsertId()
    {
        //вернуть id
    }

    //select where id=1
    public function queryOne($sql, $params)
    {
        return $this->query($sql, $params)->fetch();
    }

    //select * from posts;
    public function queryAll($sql)
    {
        return $this->query($sql)->fetchAll();
    }

    public function __toString()
    {
        return "Db";
    }
}
