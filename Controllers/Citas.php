<?php 

class Citas extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function citas(){

        $data['page_id_name'] = "citas";
        $data['page_title'] = "Citas";

        $this->views->getView($this,"citas", $data);
    }

    public function getCitas(){
        $arrayData = $this->model->selectCitas();

        for ($i=0; $i <count($arrayData) ; $i++) { 
            $arrayData[$i]['options']="
            
            <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$arrayData[$i]['id_cita']."'>
                    <i class='fas fa-trash'></i>
            </button>

            <button type='button' class='btn btn-primary btn-circle' id='btnEditar'  data-action-type='update' rel='".$arrayData[$i]['id_cita']."'>
                    <i class='fas fa-pen'></i>
            </button>
            
            ";
        }

        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getServicios(){
        $arrayData = $this->model->selectServicios();
        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }


}
