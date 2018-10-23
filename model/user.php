
<?php
class User
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;

    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }
  
}

?>
