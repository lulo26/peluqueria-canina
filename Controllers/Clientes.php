<?php 

class Clientes extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function clientes(){

        $data['page_id_name'] = "clientes";
        $data['page_title'] = "Clientes";
 
        $this->views->getView($this,"clientes", $data);
    }
}
