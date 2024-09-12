<?php

namespace Ember\App\Services;

use Ember\App\Blog\Post;

class PostService
{
    public function index(): array
    {
        // Предположим что тут много много логики
        return Post::get();
    }

    public function show(int $id): Post
    {
        // И ТУТ ТОЖЕ
        return Post::find($id);
    }

    public function update(int $id)
    {
        $post = Post::find($id);

        $post->title = 'NEW TITLE';

        echo '<pre>';
        print_r($post);
        echo '</pre>';
        // return $post;
    }
}
