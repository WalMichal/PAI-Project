<?php
require_once("AppController.php");
require_once ("model/ItemMapper.php");
class GodController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(!isset($_GET['id'])){
            $id = 1;
        }
        else{
            $id = $_GET['id'];
        }

        $gm = new ItemMapper();
        $god = $gm ->getItems($id);
        foreach ($god as $item)
        {
            $g = $item;
        }

        $this->render('index',['god' => $g]);
    }
}