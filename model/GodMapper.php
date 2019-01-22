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
    public function getGods($idGod)
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT g.name godName,g.description godDescription, r.name rName,m.name mName,com.name comName,cl.name clName 
FROM god g 
inner JOIN class_type cl on cl.idClassType=g.idClassType 
inner JOIN combat_type com on com.idCombatType=g.idCombatType 
INNER JOIN mythology m on m.idMythology=g.idMythology 
inner join role r on r.idRole=g.idRole
where g.idGod = :idGod;');
            $stmt->bindParam(':idGod', $idGod);
            $stmt->execute();

            $gods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $gods;
        }
        catch(PDOException $e) {
            die();
        }
    }
    public function getComments($idGod)
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT c.comment comm,u.nickname nick,c.timeCreated timee 
FROM comment c 
inner JOIN users u on c.idUser=u.idUser 
where c.idGod = :idGod;');
            $stmt->bindParam(':idGod', $idGod);
            $stmt->execute();

            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comments;
        }
        catch(PDOException $e) {
            die();
        }
    }
    public function saveComm($idGod,$idUser,$comment)
    {
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO comment (idComment, timeCreated, comment, idGod, idUser) VALUES (NULL, NULL, :comment, :idGod, :idUser);');
            $stmt->bindParam(':idGod', $idGod);
            $stmt->bindParam(':idUser', $idUser);
            $stmt->bindParam(':comment', $comment);
            $stmt->execute();

        }
        catch(PDOException $e) {
            die();
        }
    }
}