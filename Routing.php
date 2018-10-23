<?php
require_once('controllers/DefaultController.php');
class Routing
{
    public $routes = [];
    public function __construct()
    {
        $this->routes = [
            'index' => [
                'action'=>'index',
                'controller'=>'DefaultController'
            ],
            'login' => [
                'action'=>'login',
                'controller'=>'DefaultController'
            ]
        ];
    }
    public function run()
    {
        //localhost::8000?=login
        $page = isset($_GET['page'])
                        && isset($this->routes[$_GET['page']])?$_GET['page']:'index';
        if($this->routes[$page]){
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];
            $object = new $controller;
            $object -> $action();
        }


    }
}
?>