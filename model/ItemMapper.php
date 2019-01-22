<?php

require_once 'God.php';
require_once __DIR__.'/../Database.php';

class ItemMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }
    public function getItemNames()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT name,idItem FROM item;');
            $stmt->execute();

            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $items;
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function getItems($idItem)
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT i.name iName,i.description iDescription, cl.name clName 
FROM item i 
inner JOIN class_type cl on cl.idClassType=i.idClassType 
where i.idItem = :idItem;');
            $stmt->bindParam(':idItem', $idItem);
            $stmt->execute();

            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $items;
        }

        catch(PDOException $e) {
        die();
        }
    }
}