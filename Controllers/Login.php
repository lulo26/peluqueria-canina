<?php 

class Login extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function notFound(){
        $this->views->getView($this,"login");
    }
}

$notFound = new Errors();
$notFound->notFound();