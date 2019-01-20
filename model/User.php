<?php

class User
{
    private $id;
    private $nickname;
    private $email;
    private $password;
    private $role;
    #1-admin
    #2-user

    public function __construct($nickname, $email, $password,$role = 2)
    {
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;

    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = md5($password);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}