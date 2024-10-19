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

    public function selectServicioById($id_servicio){

        $id_servicio = intval(strClean($id_servicio));
        
        $arrayServicio = $this->model->selectServicioById($id_servicio);

        if(empty($arrayServicio)){
            $arrayResponse = array('status' => false, 'msg' => 'Datos no encontrados');
        }else{
            $arrayResponse = array('status' => true, 'data' => $arrayServicio);
        }
    
        echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setServicios(){
        $nombre = strClean($_POST['nombre']);
        $precio = intval($_POST['precio']);
        $descripcion = strClean($_POST['descripcion']);
        $id_servicio = intval(strClean($_POST['id_servicio']));

        $arrayPost = ['nombre','precio','descripcion'];

        if (check_post($arrayPost)) {

            if ($id_servicio == 0 || $id_servicio == "") {
                $requestModel = $this->model->insertarServicios($nombre, $precio, $descripcion);
                $action = "insert";
            }else{
                $requestModel = $this->model->actualizarServicios($nombre, $precio, $descripcion, $id_servicio);
                $action = "update";
            }

            switch ($action) {
                case 'insert':
                    if (is_numeric($requestModel) && $requestModel>0) {
                        $arrayResp = array('status'=>true,'msg'=>'Registro completo');
                    }elseif ($requestModel === "exist") {
                        $arrayResp = array('status'=>false,'msg'=>'Este servicio ya existe');
                    } else {
                        $arrayResp= array('status'=>false,'msg'=>'No se pudo registrar este servicio');
                    }
                    break;
                
                case 'update':

                    if ($requestModel === true ) {
                        $arrayResp = array('status'=>true,'msg'=>"Actualización completa");

                    }elseif ($requestModel === "exist") {
                        $arrayResp= array('status'=>false,'msg'=>'Este servicio ya existe');
                    } else{
                        $arrayResp= array('status'=>false,'msg'=>'No se pudo actualizar este cliente');
                    }
                    break;

                default:
                    $arrayResp= array('status'=>false,'msg'=>'Acción no reconocida');
                    break;
            }

        }else {
            $arrayResp = array('status'=>false,'msg'=>'Debe ingresar todos los datos');
        }

        echo json_encode($arrayResp,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function deleteServicios(){

        if ($_POST) {
            $id_servicio = intval($_POST['id_servicio']);
            $requestDelete = $this->model->deleteServicio($id_servicio);
            
            if ($requestDelete=='ok') {
                $arrayResponse = array('status' => true, 'msg' => 'Servicio eliminado correctamente.');
            }else{
                $arrayResponse = array('status' => true, 'msg' => 'No se pudo eliminar el servicio.');
            }

            echo json_encode($arrayResponse, JSON_UNESCAPED_UNICODE);
            
        }else {
            print_r($_POST);
        }

        die();

    }



}