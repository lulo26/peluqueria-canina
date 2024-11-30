<?php 

class Citas extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start(); 
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
    }

    //Muestra la view principal de citas
    public function citas(){

        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }

        $data['page_id_name'] = "citas";
        $data['page_title'] = "Citas";
        $data['page_functions_js'] = "citas/citas.js";

        $this->views->getView($this,"citas", $data);
    }

    public function getCitas(){
        $arrayData = $this->model->selectCitas();

        for ($i=0; $i <count($arrayData) ; $i++) { 
            $btn_delete='';
            $btn_view='';
            $btn_edit='';

            if ($_SESSION['permisosMod']['d']) {
                $btn_delete = "
                <button type='button' id='btnBorrar' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$arrayData[$i]['id_cita']."'>
                    <i class='fas fa-trash'></i>
                </button>
                ";
            }

            if ($_SESSION['permisosMod']['u']) {
                $btn_edit = "
                <button type='button' class='btn btn-primary btn-circle' id='btnEditar'  data-action-type='update' rel='".$arrayData[$i]['id_cita']."'>
                    <i class='fas fa-pen'></i>
                </button>
                ";
            }

            if ($_SESSION['permisosMod']['r']) {
                $btn_view = "
                <button type='button' class='btn btn-secondary btn-circle' data-action-type='view' data-id='".$arrayData[$i]['id_cita']."'>
                    <i class='fas fa-info'></i>
                </button>
                ";
            }


            $arrayData[$i]['options']= $btn_delete . " " . $btn_edit . " " . $btn_view;
        }

        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getCitasByID($id_cita){
            $id_cita = intval($id_cita);
            
            $arrCita = $this->model->selectCitasByID($id_cita);

            if(empty($id_cita)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrCita);
            }
        
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setCitas(){
        $id_cita = intval($_POST['id_cita']);
        $dia_cita = strClean($_POST['dia_cita']);
        $hora_inicio = strClean($_POST['hora_inicio']);
        $hora_final = strClean($_POST['hora_final']);
        $lugar_cita = strClean($_POST['lugar_cita']);
        $id_mascota  = intval($_POST['id_mascota']);
        $id_empleado = intval($_POST['id_empleado']);
        
        $array_post  = ["dia_cita","hora_inicio","hora_final","lugar_cita","id_mascota","id_empleado"];

        $count_post = 0;

        $array_repetidos = array();
        

        if (!empty($_POST['servicios'])) {
            foreach ($_POST['servicios'] as $selected) {
                if (isset($selected) && !empty(intval($selected)) && $selected>0) {
                    $count_post++;
                    
                    if (!in_array($selected,$array_repetidos)) {
                        $array_repetidos[]=$selected;
                    }else {
                        $array_repetidos[]="exist";
                    }
                }
            }
        }

        if ($id_cita === 0 || $id_cita === "") {
            $action = "insert";
        }else {
            $action= "update";
        }

        switch ($action) {
            case 'insert':
                if (check_post($array_post) && $count_post>0 && $id_mascota > 0 && $id_empleado > 0) {

                    if ($hora_final>$hora_inicio) {

                        if (!in_array("exist",$array_repetidos)) {
                           
                            $requestModel = $this->model->insertarCitas($dia_cita,$hora_inicio,$hora_final,$lugar_cita,$id_mascota,$id_empleado);
                
                            foreach ($_POST['servicios'] as $selected) {
                                $insertPivote = $this->model->insertarCitaServicios($selected);
                            }
    
                            $arrayResp = array('status'=>true,'msg'=>'Cita registrada');
        
                        }else {
                            $arrayResp = array('status'=>false,'msg'=>'Seleccionaste dos veces un mismo servicio');
                        }

                    }else {
                        $arrayResp = array('status'=>false,'msg'=>'Horas incorrectas');
                    }
                    

                }else {
                    $arrayResp = array('status'=>false,'msg'=>'Debe ingresar todos los datos');
                }
                break;

            case 'update':
                if (check_post($array_post) && $id_mascota > 0 && $id_empleado > 0) {

                    if ($hora_final>$hora_inicio) {
                        $requestModel = $this->model->actualizarCitas($dia_cita,$hora_inicio,$hora_final,$lugar_cita,$id_mascota,$id_empleado,$id_cita);

                        $arrayResp = array('status'=>true,'msg'=>'Cita actualizada');

                    }else {
                        $arrayResp = array('status'=>false,'msg'=>'Horas incorrectas');
                    }

                    

                }else {
                    $arrayResp = array('status'=>false,'msg'=>'Debe ingresar todos los datos');
                }
                break;

            default:
                break;
        }
        
        /* if (check_post($array_post) && $count_post>0 && $id_mascota > 0 && $id_empleado > 0) {

            if ($hora_inicio<=$hora_final) {
                
                if (!in_array("exist",$array_repetidos)) {

                    if ($id_cita === 0 || $id_cita === "") {
                        $requestModel = $this->model->insertarCitas($dia_cita,$hora_inicio,$hora_final,$lugar_cita,$id_mascota,$id_empleado);
        
                        foreach ($_POST['servicios'] as $selected) {
                            $insertPivote = $this->model->insertarCitaServicios($selected);
                        }
        
                        $action = "insert";
                        
                    } else {
    
                        $requestModel = $this->model->actualizarCitas($dia_cita,$hora_inicio,$hora_final,$lugar_cita,$id_mascota,$id_empleado,$id_cita);
                    
                        $action = "update";
                    }
        
                    switch ($action) {
                        case 'insert':
                            $arrayResp = array('status'=>true,'msg'=>'Cita registrada');
                            break;
                        
                        case 'update':
                            $arrayResp = array('status'=>true,'msg'=>'Cita actualizada');
                            break;
    
                        default:
                            break;
                    }

                }else {
                    $arrayResp = array('status'=>false,'msg'=>'Seleccionaste dos veces un mismo servicio');
                }

            }else {
                $arrayResp = array('status'=>false,'msg'=>'Horas incorrectas');
            }
            
            
            
        }else {
            $arrayResp = array('status'=>false,'msg'=>'Debe ingresar todos los datos');
        } */

        echo json_encode($arrayResp, JSON_UNESCAPED_UNICODE);
        die();
    }

    
    public function deleteCitas(){
        if ($_POST) {
            $id_cita = intval($_POST['id_cita']);
            $requestDelete = $this->model->deleteCitas($id_cita);
            
            if ($requestDelete=='ok') {
                $arrayResponse = array('status' => true, 'msg' => 'Cita eliminada correctamente.');
            }else{
                $arrayResponse = array('status' => false, 'msg' => 'No se pudo eliminar la cita.');
            }
            echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);

        }else {
            print_r($_POST);
        }

        die();
    }

    public function ViewCita(int $id_cita){
        $id_cita = intval($id_cita);
        $arrayData = $this->model->ViewCita($id_cita);

        if(empty($id_cita)){
            $arrayResponse = array('status' => false, 'msg' => 'Datos no encontrados');
        }else{
            $arrayResponse = array('status' => true, 'data' => $arrayData);
        }
        
        echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getServicios(){
        $arrayData = $this->model->selectServicios();
        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getMascotas(){
        $arrayData = $this->model->selectMascotas();
        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getEmpleados(){
        $arrayData = $this->model->selectEmpleados();
        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getServiciosByID($id_cita){
            $id_cita = intval($id_cita);
            $arrayData = $this->model->selectServiciosByID($id_cita);

            if(empty($id_cita)){
                $arrayResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrayResponse = array('status' => true, 'data' => $arrayData);
            }
            
        echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);
        die();
    }


}
