<?php 

class Mascotas extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //Muestra la view principal de citas
    public function mascotas(){

        $data['page_title'] = "Mascotas";
        $data['page_id_name'] = "mascotas";
 
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

    public function setMascotas(){
        $nombreUsuario = strClean($_POST['nombreUsuario']);
        $nombreMascota = strClean($_POST['nombreMascota']);
        $razaMascota = strClean($_POST['razaMascota']);
        $edadMascota = strClean($_POST['edadMascota']);
        $comentarioMascota = strClean($_POST['comentarioMascota']);

        $arrPost = ['nombreUsuario','nombreMascota','razaMascota','edadMascota','comentarioMascota'];
        if (check_post($arrPost)) {
            $requestModel = $this->model->insertarMascota($nombreUsuario, $nombreMascota, $razaMascota, $edadMascota, $comentarioMascota);
            if($requestModel > 0) {
                $arrRespuesta = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }
        } else{
            $arrRespuesta = array('status' => false, 'msg' => 'Debe ingresar todos los datos');
        }

        echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
        die();
    }
}
