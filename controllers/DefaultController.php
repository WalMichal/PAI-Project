<?php

require_once("AppController.php");
require_once ("model/User.php");
require_once __DIR__.'/../Database.php';

class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        if(isset($_SESSION['id'])){
            echo "fajno";
        }
        $this->render('login');
        if($this->isPost()){
            if($_POST['email'] == 'aa@aa.aa'){
                echo "hej";


                $_SESSION['id'] = 10;
            }
            if($_POST['email'] == 'bb@bb.bb'){
                echo "o ty kuwa goju";
                session_destroy();
            }
        }

    }
    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('index', ['text' => 'You have been successfully logged out!']);

    }
    public function register()
    {
        #$message = "wrong answer";
        #echo "<script type='text/javascript'>alert('$message');</script>";
        if(isset($_SESSION['id']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/pai/?page=logout";
            header("Location: {$url}");

        }


        $this->render('register');
       /* if($this->isPost()  and isset($_POST['email'])and !empty($_POST['email'])){
            $email = $_POST['email'];

            $this->database = new Database();
            try {
                $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE User_mail = :email;');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                var_dump($user);
                if(!empty($user['Login'])){
                    echo "JEST TAKI PIZDO-i co tam goje?".$user['Login'];
                }
                else {
                    echo "nie ma takiego-z takim mailem";
                }
            }
            catch(PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }*/
    }
    public function addUser()
    {
        $url = "http://$_SERVER[HTTP_HOST]/pai/?page=register";


        if(!isset($_POST['email']) or !isset($_POST['nickname']) or !isset($_POST['password']) ){
        header("Location: {$url}");
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    }


        $user = new UserMapper();
        if(empty(($user->getUser($_POST['email']))->getEmail()))
        {
            if(empty(($user->getUserByNickname($_POST['nickname'])->getEmail())))
            {
                $newUs = new User($_POST['nickname'],$_POST['email'],hash( "sha256", $_POST['password']));
                $user->saveUser($newUs);

                $_SESSION['id'] = $_POST['email'];
                $_SESSION['role'] = 2;
                $url = "http://$_SERVER[HTTP_HOST]/pai/?page=index";
                header("Location: {$url}");
            }
            else {
                header("Location: {$url}");
                $message = "wrong answer1";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

        }
        else{
            header("Location: {$url}");
            $message = "wrong answer";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }





        #to nie koniecznie
        #$this->render('newUser');
    }
}