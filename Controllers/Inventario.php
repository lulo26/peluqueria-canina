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

        $arrData = $this->model->selectProducto($id);

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setInventario(){
        
    }
}