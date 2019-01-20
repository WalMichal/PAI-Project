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
            $url = "http://$_SERVER[HTTP_HOST]/pai/?page=index";
            header("Location: {$url}");
            exit();
        }

        $user = null;
        if($this->isPost()){
            if(isset($_POST['email'])){

            $user = new UserMapper();
            $newUser = $user ->getUser($_POST['email']);
            if(empty($newUser->getEmail()))
            {
                $url = "http://$_SERVER[HTTP_HOST]/pai/?page=login";
                $message = "User with this email does not exitst.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>location.href='$url' </script>";
            }


            if(hash("sha256",$_POST['password']) ===$newUser->getPassword()){
                $_SESSION['id'] = $newUser ->getEmail();
                $_SESSION['role'] = $newUser ->getRole();
                $url = "http://$_SERVER[HTTP_HOST]/pai/?page=index";
                echo "<script type='text/javascript'>location.href='$url' </script>";
            }
            else{
                $url = "http://$_SERVER[HTTP_HOST]/pai/?page=login";
                $message = "Invalid password.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>location.href='$url' </script>";

            }
        }

        }

        $this->render('login');

    }
    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('index', ['text' => 'You have been successfully logged out!']);

    }
    public function register()
    {

        if(isset($_SESSION['id']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/pai/?page=index";
            header("Location: {$url}");

        }


        $this->render('register');

    }
    public function addUser()
    {
        $url = "http://$_SERVER[HTTP_HOST]/pai/?page=register";


        if(!isset($_POST['email']) or !isset($_POST['nickname']) or !isset($_POST['password']) ){
        header("Location: {$url}");
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
                $message = "User with this nickname already exitst. Try change nickname :)";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>location.href='$url' </script>";
            }

        }
        else{
            $message = "User with this email already exitst. Use other email :)";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>location.href='$url' </script>";
            #header("Location: {$url}");
            #exit();
        }

    }
    public function statute()
    {
        $this->render('statute');
    }
}