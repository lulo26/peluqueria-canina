<?php

class Servicios extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function servicios(){

        $data['page_id_name'] = "servicios";
        $data['page_title'] = "Servicios";
 
        $this->views->getView($this,"servicios", $data);
    }

    public function getServicios(){
        $servicios = $this->model->selectServicios();

        for ($i=0; $i <count($servicios) ; $i++) { 
            $servicios[$i]['options'] = "

                <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$servicios[$i]['id_servicio']."'>
                    <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' id='btnEditar'  data-action-type='update' rel='".$servicios[$i]['id_servicio']."'>
                    <i class='fas fa-pen'></i>
                </button>
            
            ";
        }

        echo json_encode($servicios, JSON_UNESCAPED_UNICODE);
        die();
    }



}