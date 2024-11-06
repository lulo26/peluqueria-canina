<?php

class Inventario extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if(empty($_SESSION['login'])){
            header('Location: ' . base_url().'/login' );
        }
        getPermisos(12);
    }
    public function inventario(){

        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() );
        }

        $data['page_title'] = "Inventario del producto";
        $data['page_name'] = "inventario";
        $data['page_id_name'] = "inventario";
        $data['page_functions_js'] = "inventario/inventario.js";
        $this->views->getView($this,"inventario", $data);
    }

    public function getInventario(){
        $arrData = $this->model->selectInventario();
        for($i = 0; $i < count($arrData); $i++){
            $btnCreate = '';
            $btnDelete = '';

            if ($_SESSION['permisosMod']['w']) {
                $btnCreate = "<button type='button' class='btn btn-primary btn-circle' data-action-type='sumar' rel='".$arrData[$i]['idInventario']."'>
                    <i class='fas fa-plus'></i>
                </button>";
            }

            if ($_SESSION['permisosMod']['d']) {
                $btnDelete = "<button type='button' class='btn btn-danger btn-circle' data-action-type='restar' rel='".$arrData[$i]['idInventario']."'>
                    <i class='fas fa-minus'></i>
                </button>";
            }
            
            $arrData[$i]['options'] = $btnCreate . " " . $btnDelete;
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getInventarioById($id){
        $intId = intval($id);
        $arrData = $this->model->selectProducto($intId);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setInventario(){
        $arrPost = ['cantidadProducto', 'inventarioSumaResta'];

        if (check_post($arrPost)) {
            $intCantidad = intval($_POST['cantidadProducto']);
            $intId = intval($_POST['idProducto']);
            $strSumaResta = strClean($_POST['inventarioSumaResta']);
            try {

                $totalUpdate;
                $cantidadPdoducto = $this->model->selectCantidadProducto($intId);
                $cantidadPdoducto = intval($cantidadPdoducto[0]['cantidadProducto']);

                if (strval($strSumaResta) == "suma") {
                    $totalUpdate = $intCantidad + $cantidadPdoducto;
                    $this->model->updateProducto($intId, $totalUpdate);
                    $arrResponse = array("status" => true, "msg" => 'Productos ingresados correctamente.');
                }elseif(strval($strSumaResta) == "resta" && $cantidadPdoducto >= $intCantidad){
                    $totalUpdate =  $cantidadPdoducto - $intCantidad;
                    $this->model->updateProducto($intId, $totalUpdate);
                    $arrResponse = array("status" => true, "msg" => 'Productos egresados correctamente.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No se permite inventario negativo.');
                }

            } catch (\Throwable $th) {
                $arrResponse = array("status" => false, "msg" => "Error al intentar ejecutar la consulta: ". $th);
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        } 

    }
}