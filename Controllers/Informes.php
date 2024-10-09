<?php 

class Informes extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function informes(){

        $data['page_title'] = "Informes y estadísticas";
        $data['page_id_name'] = "informes";
 
        $this->views->getView($this,"informes", $data);
    }
}
