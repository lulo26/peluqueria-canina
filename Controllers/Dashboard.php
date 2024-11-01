<?php 

class Dashboard extends Controllers{
    
    public function __construct(){
        parent::__construct();

        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
        getPermisos(1);
    }

    public function dashboard(){
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard - Home";
        $data['page_title'] = "Página de dashboard";
        $data['page_id_name'] = "dashboard";
        $this->views->getView($this,"dashboard", $data); //Llama la vista
    }
}
