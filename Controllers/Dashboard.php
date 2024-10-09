<?php 

class Dashboard extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function dashboard(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard - Home";
        $data['page_title'] = "Página de dashboard";
        $data['page_id_name'] = "dashboard";
        $this->views->getView($this,"dashboard", $data); //Llama la vista
    }
}
