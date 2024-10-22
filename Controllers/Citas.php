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

    public function setCitas(){
        $id_cita = strClean($_POST['id_cita']);
        $fecha_inicio = strClean($_POST['fecha_inicio']);
        $fecha_final = strClean($_POST['fecha_final']);
        $lugar_cita = strClean($_POST['lugar_cita']);
        $cliente_select  = intval($_POST['id_clciente']);
        $empleado_select = intval($_POST['id_empleado']);

        $array_post  = ["id_cita","fecha_inicio","fecha_final","lugar_cita","cliente_select","empleado_select"];

        if (!empty($_POST['servicios'])) {

            if (check_post($_POST['servicios'])) {
                $count_post++;
            }

        }else {
            $count_post=0;
        }
        
        if (check_post($array_post) && $count_post>0) {
            
        }else {
            $arrayResp = array('status'=>false,'msg'=>'Debe ingresar todos los datos');
        }

        echo json_encode($_POST['servicios'], JSON_UNESCAPED_UNICODE);
        die();
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

    public function getClientes(){
        $arrayData = $this->model->selectClientes();
        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getEmpleados(){
        $arrayData = $this->model->selectEmpleados();
        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }


}
