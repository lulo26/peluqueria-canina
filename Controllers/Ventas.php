<?php 

class Ventas extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(isset($_SESSION['login'])){
            header('Location: ' . base_url().'/dashboard' );
        }
    }

    //Muestra la view principal de citas
    public function ventas(){

        $data['page_title'] = "Ventas";
        $data['page_id_name'] = "ventas";
 
        $this->views->getView($this,"ventas", $data);
    }
}
