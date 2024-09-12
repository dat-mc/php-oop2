<?php
include __DIR__ . "/../vendor/autoload.php";

use Ember\App\Blog\{Post, User};

$controllerName = $_GET['c'] ?? 'posts';
$actionName = $_GET['a'] ?? '';

$controllerClass = "Ember\App\Controllers\\" . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    echo $controller->runAction($actionName);
} else {
    die('Нет такого контроллера');
}
