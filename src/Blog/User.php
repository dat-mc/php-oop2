<?php

namespace Ember\App\Blog;

class User extends Model
{
    public $id;
    public $email;
    public $password;

    public function getTableName()
    {
        return 'users';
    }

}