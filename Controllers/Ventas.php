<?php 

class Ventas extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/dashboard' );
        }
    }

    //Muestra la view principal de citas
    public function ventas(){

        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }

        $data['page_title'] = "Ventas";
        $data['page_id_name'] = "ventas";
 
        $this->views->getView($this,"ventas", $data);
    }
}
