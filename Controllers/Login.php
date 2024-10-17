<?php

class Login extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function login(){


        $data['page_title'] = "Página Login";
        $data['page_name'] = "login";
        $data['page_id_name'] = "login";
        $this->views->getView($this,"login", $data);
    }
}