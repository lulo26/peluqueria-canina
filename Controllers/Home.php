<?php 

class Home extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function home(){

        $data['page_id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "Página principal";
        $data['page_name'] = "home";
        $data['page_content'] = "esto es un contenido largo porque me da pereza buscar un texto random en internet que ni siquiera está en español";
        $this->views->getView($this,"home", $data);
    }
}
