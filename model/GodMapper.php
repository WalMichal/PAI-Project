<?php

require_once 'God.php';
require_once __DIR__.'/../Database.php';

class GodMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }
    public function getGodsNames()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT name,idGod FROM god;');
            $stmt->execute();

            $gods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $gods;
        }
        catch(PDOException $e) {
            die();
        }
    }
    public function getGods()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM god;');
            $stmt->execute();

            $gods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $gods;
        }
        catch(PDOException $e) {
            die();
        }
    }
    public function getComments()
    {

    }
}