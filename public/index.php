<?php
include __DIR__ . "/../vendor/autoload.php";

/*include "../src/Interfaces/IModel.php";
include "../src/Blog/Model.php";
include "../src/Blog/Post.php";
include "../src/Blog/User.php";
include "../src/Core/Db.php";*/

use Ember\App\Blog\{Post, User};

//TODO сделать так $post = Post::find(1);

$post = new Post();
// $post->insert();
print_r($post->find(3));
// print_r(Post::get());



//echo $post->find(1);



//Active Record
//CRUD
//INSERT
//$post = new Post("title","text");
//$post->save();
//создаст $post->id = 1

//READ
//
//$post = Post::find(1);

//UPDATE
//$post = Post::find(1);
//$post->title = "новый заголовок";
//$post->save();

//DELETE
//$post = Post::find(1);
//$post->delete();

//$posts = Post::get();