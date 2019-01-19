<?php

require_once 'controllers/DefaultController.php';
require_once 'controllers/UploadController.php';
require_once 'controllers/PlayerController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/ValidateController.php';
require_once 'controllers/TRYY.php';

class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],
            'upload' => [
                'controller' => 'UploadController',
                'action' => 'upload'
            ],
            'player' => [
                'controller' => 'PlayerController',
                'action' => 'player'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'admin_users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'userDelete'
            ],
            'try' => [
                'controller' => 'TRYY',
                'action' => 'fajno'
            ],
            'register' => [
                'controller' => 'DefaultController',
                'action' => 'register'
            ],
            'validateNick' => [
                'controller' => 'ValidateController',
                'action' => 'validateNick'
            ],
            'validateEmail' => [
                'controller' => 'ValidateController',
                'action' => 'validateEmail'
            ]

        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
            && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'index';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}