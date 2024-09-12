<?php

namespace Ember\App\Traits;

trait Tsingletone
{
    private static $instanse = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if (is_null(static::$instanse)) {
            static::$instanse = new static();
        }
        return static::$instanse;
    }
}