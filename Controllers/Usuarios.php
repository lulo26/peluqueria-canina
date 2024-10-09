<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function usuarios(){

        $data['page_title'] = "Usuarios";
 
        $this->views->getView($this,"usuarios", $data);
    }
}
