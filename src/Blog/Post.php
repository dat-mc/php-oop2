<?php

namespace Ember\App\Blog;

class Post extends Model
{
    public $id;
    public $title;
    public $text;

    //TODO сделать конструктор

    public function getTableName()
    {
        return 'posts';
    }


}
