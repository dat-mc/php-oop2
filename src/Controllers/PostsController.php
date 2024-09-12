<?php

namespace Ember\App\Controllers;

use Ember\App\Services\PostService;

class PostsController extends Controller
{
    private PostService $postService;

    public function __construct()
    {
        $this->postService = new PostService();
    }

    public function actionIndex()
    {
        return $this->render(
            'index',
            [
                'posts' => $this->postService->index(),
            ]
        );
    }

    public function actionShow()
    {
        return $this->render(
            'post',
            [
                'post' => $this->postService->show((int) $_GET['id']),
            ]
        );
    }

    public function actionUpdate()
    {
        return $this->render(
            'post',
            [
                'post' => $this->postService->update((int) $_GET['id']),
            ]
        );
    }
}
