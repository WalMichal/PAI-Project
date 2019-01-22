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
        if(!isset($_GET['id'])){
            $id = 1;
        }
        else{
            $id = $_GET['id'];
        }
        $gm = new GodMapper();
        if(isset($_GET['comment'])and isset($_SESSION['id']) and isset($_GET['com'])){
            echo $_GET['comment'];
            $gm->saveComm($_GET['id'],$_SESSION['id'],$_GET['comment']);
        }


        $god = $gm ->getGods($id);
        foreach ($god as $item)
        {
            $g = $item;
        }
        $com = $gm->getComments($id);
        $this->render('index',['god' => $g,'com' =>$com]);
    }
}