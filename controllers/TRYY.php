<?php

require_once("AppController.php");
class TRYY extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋'.phpversion();

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        $this->render('login');
    }
    public function fajno()
    {
        $this->render('fajno');
    }
}