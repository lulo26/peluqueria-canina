<?php 

class Inventario extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function inventario(){

        $data['page_title'] = "Inventario de productos";
        $data['page_id_name'] = "inventario";
 
        $this->views->getView($this,"inventario", $data);
    }
}
