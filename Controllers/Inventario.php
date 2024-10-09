<?php 

class Inventario extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function inventario(){

        $data['page_title'] = "Inventario de productos";
 
        $this->views->getView($this,"inventario", $data);
    }
}
