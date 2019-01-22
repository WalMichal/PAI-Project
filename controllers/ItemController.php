<?php
require_once("AppController.php");
require_once ("model/ItemMapper.php");
class ItemController extends AppController
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
        $Item = $gm ->getItems($id);
        $i=null;
        foreach ($Item as $item)
        {
            $i = $item;
        }

        $this->render('index',['item' => $i]);
    }
    public function items()
    {
        $im = new ItemMapper();
        $items = $im->getItemNames();
        $this->render('items',['items'=>$items]);
    }
}