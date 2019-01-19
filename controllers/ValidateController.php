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
            return;
        }
        else{

            http_response_code(400);

            return;}

    }
    public function validateEmail()
    {
        if(!isset($_POST['email'])){
            http_response_code(404);
            return;
        }


        $user = new UserMapper();
        if(empty(($user->getUser($_POST['email']))->getEmail()))
        {
            http_response_code(200);
            return;
        }
        else{

            http_response_code(400);

            return;}

    }
}