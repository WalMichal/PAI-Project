
<?php
function test(array $aha)
{
    //for($i=0; $i<5;$i++)
   // {
   //     echo $aha[$i];
   // }
   foreach($aha as $a)
   {
       echo $a.'<br>';
   }
}
$tab = ['a'=>'ahab','b'=>1,'c'=>24,'z'];
var_dump($tab);
// i wanna
//die;
test($tab);
echo '<br>';
$koka = 'swojeimie';
echo md5($koka);


class User
{
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

$user = new User("Drewno");
echo '<br>'.$user -> getName();
?>
