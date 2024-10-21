<?php 

class Roles extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function roles(){


        $data['page_title'] = "Roles";
        $data['page_name'] = "roles";
        $data['page_id_name'] = "roles";
        $this->views->getView($this,"roles", $data);
    }

    public function getRoles(){
        $arrData = $this->model->selectRoles();

        for($i = 0; $i < count($arrData); $i++){

            if($arrData[$i]['status_rol'] == 1){
                $arrData[$i]['status_rol'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status_rol'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            
            $arrData[$i]['options'] = "

                <button type='button' class='btn btn-primary btn-circle' data-action-type='permisos' rel='".$arrData[$i]['id_rol']."'>
                    <i class='fas fa-key'></i>
                </button>
                <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$arrData[$i]['id_rol']."'>
                    <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' data-action-type='update' rel='".$arrData[$i]['id_rol']."'>
                    <i class='fas fa-pen'></i>
                </button>
            ";
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getRol($idRol){

        $intIdRol = intval(strClean($idRol));

        if($intIdRol > 0){
    
            $arrData = $this->model->selectRol($intIdRol);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectRoles(){
        $htmlOptions = "";
        $arrData = $this->model->selectRoles();
        if (count($arrData) > 0) {
            for ($i=0; $i < count($arrData); $i++) { 
                $htmlOptions .= '<option value="' . $arrData[$i]['id_rol']. '">' . $arrData[$i]['nombre_rol'] . '</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function setRol(){
       $idRol = strClean($_POST['idRol']);
       $nombreRol = strClean($_POST['nombreRol']);
       $descripcionRol = strClean($_POST['descripcionRol']);
       $estadoRol = intval($_POST['estadoRol']);

       $arrPost = ['nombreRol', 'descripcionRol'];

       if (check_post($arrPost)) {
            if ($idRol == 0 || $idRol == "") {
                $requestModel = $this->model->insertarRol($nombreRol, $descripcionRol, $estadoRol);
                $option = 1;
            }else{
                $requestModel = $this->model->actualizarRol($idRol, $nombreRol, $descripcionRol, $estadoRol);
                $option = 2;
            }

            if ($option === 1) {
                if ($requestModel > 0 && $requestModel != "exist"){
                    $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else{
                    $arrRespuesta = array('status' => false, 'msg' => 'Atención: El Rol ya existe');
                }
            }

            if ($option === 2) {
                $arrRespuesta = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
            }
        }else{
        $arrRespuesta = array('status' => false, 'msg' => 'Debe ingresar todos los datos');
        }

       echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
       die();
    }

    public function eliminarRol(){

        if ($_POST) {
            $idRol = intval($_POST['idRol']);
            $requestDelete = $this->model->deleteRol($idRol);
            if($requestDelete == 'ok'){
                $arrResponse = array('status' => true, 'msg' => 'se ha eliminado el rol.');
            }else if($requestDelete == 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un rol asociado a un usuario.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el rol.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }else{
            //print_r($_POST);
        }
        die();
    }
}
