<?php

class Register extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function register(){


        $data['page_title'] = "Página Register";
        $data['page_name'] = "register";
        $data['page_id_name'] = "register";
        $this->views->getView($this,"register", $data);
    }
}