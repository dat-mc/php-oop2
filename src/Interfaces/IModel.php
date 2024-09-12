<?php

namespace Ember\App\Interfaces;

interface IModel
{
    public function find(int $id);
    public function get();
}
