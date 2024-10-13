<?php 

class Dashboard extends Controllers{
    
    public function __construct(){
        parent::__construct();
        //aquí va la validacion de inicio se sesion
        /*
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' )
        }
        */

    }

    public function dashboard(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard - Home";
        $data['page_title'] = "Página de dashboard";
        $data['page_id_name'] = "dashboard";
        $this->views->getView($this,"dashboard", $data); //Llama la vista
    }
}
