<?php

class Tienda extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function tienda(){
        $data['page_title'] = "Página Tienda";
        $data['page_name'] = "tienda";
        $data['page_id_name'] = "tienda";
        $data['page_tag'] = "Tienda";
        $this->views->getView($this, "tienda", $data);
    }

    public function productoTienda($id){
        $data['page_functions_js'] = "tienda/productoTienda.js";
        $intId = intval(strClean($id));
        $data = $this->model->selectProducto($id);
        $this->views->getView($this, "productoTienda", $data);
    }

    public function listarProductos(){
        $arrData = $this->model->selectProductos();
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'datos no encontrados');
        }else{
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        $data = json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        echo $data;
    }

    public function selectProductosLimit(){
        $arrData = $this->model->selectProductosLimit();
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'datos no encontrados');
        }else{
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        $data = json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        echo $data;
    }
}
