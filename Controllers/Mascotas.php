<?php 

class Mascotas extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function mascotas(){

        $data['page_title'] = "Mascotas";
        $data['page_id_name'] = "mascotas";
        $data['page_functions_js'] = "mascotas/mascotas.js";
 
        $this->views->getView($this,"mascotas", $data);
    }

    public function getMascotas(){
        $arrData = $this->model->selectMascotas();

        for ($i=0; $i < count($arrData); $i++) { 
            $arrData[$i]['options'] = "

            <button type='button' class='btn btn-danger btn-circle' data-action-type='delete' rel='".$arrData[$i]['idMascotas']."'>
                <i class='fas fa-trash'></i>
                </button>

                <button type='button' class='btn btn-primary btn-circle' data-action-type='update' rel='".$arrData[$i]['idMascotas']."'>
                    <i class='fas fa-pen'></i>
                </button>
            ";
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getMascota($idMascota){

        $intIdMascota = intval(strClean($idMascota));

        if($intIdMascota > 0){
    
            $arrData = $this->model->selectMascotaID($intIdMascota);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setMascotas(){
        $idCliente = intval(strClean($_POST['nombreUsuario']));
        $idMascotas = intval(strClean($_POST['idMascotas']));
        $nombreMascota = strClean($_POST['nombreMascota']);
        $razaMascota = strClean($_POST['razaMascota']);
        $edadMascota = intval(strClean($_POST['edadMascota']));
        $comentarioMascota = strClean($_POST['comentarioMascota']);

        
        $arrPost = ['nombreMascota','razaMascota','edadMascota','comentarioMascota', 'nombreUsuario'];
        if (check_post($arrPost)) {
            if ($idMascotas == 0 || $idMascotas == ""){
                $requestModel = $this->model->insertarMascota($idCliente, $nombreMascota, $razaMascota, $edadMascota, $comentarioMascota);
                $option = 1;
            } else {
                $requestModel = $this->model->editarMascota($idMascotas ,$idCliente ,$nombreMascota, $razaMascota, $edadMascota, $comentarioMascota);
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

    public function eliminarMascota(){
        if ($_POST) {
            $idMascota = intval($_POST['idMascotas']);
            $requestDelete = $this->model->deleteMascota($idMascota);
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
