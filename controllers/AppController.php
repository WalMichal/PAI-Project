<?php
class AppController
{
    private $request= null;

    public function __construct()
    {
        $this->request = strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->request === 'get';
    }
    public function isPost()
    {
        return $this->request === 'post';
    }

    public function render(string $filename =null)
    {
        $path = $filename? 
        dirname(__DIR__).'\views\\'.get_class($this).'\\'.$filename.'php' : '';
    }

}
?>