<?php
require_once 'AppController.php';

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';

class AdminController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $user = new UserMapper();

        if(!isset($_SESSION['id']) or $_SESSION['role']!=='1')
        {


            $url = "http://$_SERVER[HTTP_HOST]/pai/?page=index";
            header("Location: {$url}");
            exit();
        }
        else
        {

        }
        $this->render('index', ['user' => $user->getUser($_SESSION['id'])]);
    }

    public function users(): void
    {
        $user = new UserMapper();

        header('Content-type: application/json');
        http_response_code(200);
        #var_dump($user->getUser());
        echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }

    public function userDelete(): void
    {
         if (!isset($_POST['id'])) {
             http_response_code(404);
             return;
         }

        $user = new UserMapper();
        $user->delete((int)$_POST['id']);

        http_response_code(200);
    }
}