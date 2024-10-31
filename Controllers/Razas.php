<?php

class Razas extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start(); 
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
    }

    public function razas(){

        $data['page_title'] = "razas";
        $data['page_id_name'] = "razas";
        $data['page_functions_js'] = "razas/razas.js";

        $this->views->getView($this,"razas", $data);
    }

    public function getRazas(){
        $arrData = $this->model->selectRazas();
        for ($i=0; $i < count($arrData); $i++) { 
            $arrData[$i]['options'] = "

            <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$arrData[$i]['idRaza']."'>
                <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' data-action-type='update' rel='".$arrData[$i]['idRaza']."'>
                    <i class='fas fa-pen'></i>
                </button>
            ";
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getRaza($idRaza){

        $intIdRaza = intval(strClean($idRaza));

        if($intIdRaza > 0){
    
            $arrData = $this->model->selectRazaID($intIdRaza);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setRaza(){
        $idRaza = intval(strClean($_POST['idRaza']));
        $nombreRaza = strClean($_POST['nombreRaza']);
        $sizeRaza = strClean($_POST['sizeRaza']);

        
        $arrPost = ['nombreRaza','sizeRaza'];
        if (check_post($arrPost)) {
            if ($idRaza == 0 || $idRaza == ""){
                $requestModel = $this->model->insertarRaza($nombreRaza, $sizeRaza);
                $option = 1;
            } else {
                $requestModel = $this->model->editarRaza($idRaza ,$nombreRaza, $sizeRaza);
                $option = 2;
            }
           // echo($option);
            if($requestModel > 0) {
                if($option === 1){
                $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }
            }else{
                $arrRespuesta = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
        }else{
            $arrRespuesta = array('status' => false, 'msg' => 'Debe ingresar todos los datos');
        }
        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminarRaza(){
        if ($_POST) {
            $idRaza = intval($_POST['idRaza']);
            $requestDelete = $this->model->deleteRaza($idRaza);
            if($requestDelete == 'empty'){
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la mascota.');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'se ha eliminado la mascota.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }else{
            print_r($_POST);
        }
        die();
    }

}

?>