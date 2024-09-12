<?php

namespace Ember\App\Blog;

class Post extends Model
{
    protected $id;

    protected $props = [
        'category_id' => false,
        'title' => false,
        'text' => false,
        'preview' => false,
        'user_id' => false,
    ];

    public function __construct(
        protected $category_id = null,
        protected $title = null,
        protected $text = null,
        protected $preview = null,
        protected $user_id = null
    ) {}

    public static function getTableName()
    {
        return 'posts';
    }
}
