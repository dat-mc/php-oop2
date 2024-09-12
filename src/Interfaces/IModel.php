<?php

namespace Ember\App\Interfaces;

interface IModel
{
    public static function find(int $id);
    public static function get();
    public function insert();
}
