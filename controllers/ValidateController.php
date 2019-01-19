<?php
require_once("AppController.php");
require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
class ValidateController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function validateNick()
    {
        if(!isset($_POST['nickname'])){
            http_response_code(404);
            return;
        }


        $user = new UserMapper();
        if(empty(($user->getUserByNickname($_POST['nickname']))->getNickname()))
        {
            http_response_code(200);

            echo(json_encode(array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5)));
            return;
        }
        else
            http_response_code(400);
            return;


        ###wut?
        #header('Content-type: application/json');
        #http_response_code(200);
        #echo $user->getUserByNickname($_POST['nickname']) ? json_encode($user->getUserByNickname($_POST['nickname'])) : '';
    }
}