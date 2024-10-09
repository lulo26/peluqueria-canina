<?php 

class Mascotas extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function mascotas(){

        $data['page_title'] = "Mascotas";
        $data['page_id_name'] = "mascotas";
 
        $this->views->getView($this,"mascotas", $data);
    }
}
