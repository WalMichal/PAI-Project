<?php

require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(
        string $email
    ):User {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email = :email;');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($user['nickname'], $user['email'], $user['password'],$user['idPermission']);
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getUsers()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email != :email;');
            $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM users WHERE idUser = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

        ###PROBA!!!!
    public function getUserByNickname(
        string $nickname
    ):User {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE nickname = :nickname;');
            $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($user['nickname'], $user['email'], $user['password']);
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    /**
     * @param $user User
     *
     */
    public function saveUser($user){
        try{
            $stmt = $this->database->connect()->prepare('INSERT INTO users (idUser, nickname, password, email, idPermission) VALUES (NULL, :nickname, :password, :email, :role);');
            $stmt->bindParam(':nickname', $user->getNickname(), PDO::PARAM_STR);
            $stmt->bindParam(':password', $user->getPassword());
            $stmt->bindParam(':email', $user->getEmail());
            $stmt->bindParam(':role', $user->getRole());
            $stmt->execute();


        }

        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}