<?php
require_once("AppController.php");
require_once ("model/GodMapper.php");
class GodController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $this->render('index');
    }
}