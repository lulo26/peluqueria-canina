<?php 

class Citas extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function citas(){

        $data['page_title'] = "Citas";
 
        $this->views->getView($this,"citas", $data);
    }
}
