<?php

namespace Ember\App\Controllers;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';

    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;

        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            return $this->$method();
        } else {
            die('404');
        }
    }

    // Перенести в другой класс
    public function render($template, $params = [])
    {
        ob_start();
        extract($params);
        include getcwd() . '/src/Views/' .  $template . '.php';
        return ob_get_clean();
    }
}
