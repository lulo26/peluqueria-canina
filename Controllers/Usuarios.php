<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function usuarios(){

        $data['page_title'] = "Usuarios";
        $data['page_id_name'] = "usuarios";
 
        $this->views->getView($this,"usuarios", $data);
    }
}

// hash("SHA256", $_POST['']) : hash("SHA256", passgeneratos())